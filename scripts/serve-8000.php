<?php

$host = getenv('APP_SERVE_HOST') ?: '127.0.0.1';
$port = 8000;

function windowsCommand(string $command): array
{
    $output = [];
    $exitCode = 0;

    exec($command, $output, $exitCode);

    return [$output, $exitCode];
}

function powershellCommand(string $script): array
{
    $script = '$ProgressPreference = "SilentlyContinue"; ' . $script;
    $encoded = base64_encode(iconv('UTF-8', 'UTF-16LE', $script));

    return windowsCommand('powershell -NoProfile -NonInteractive -ExecutionPolicy Bypass -EncodedCommand ' . $encoded);
}

function windowsListeningPids(int $port): array
{
    [$lines] = windowsCommand('netstat -ano -p tcp');
    $pids = [];

    foreach ($lines as $line) {
        if (! str_contains($line, 'LISTENING')) {
            continue;
        }

        $columns = preg_split('/\s+/', trim($line));

        if (count($columns) < 5) {
            continue;
        }

        $localAddress = $columns[1];
        $pid = (int) $columns[4];

        if (preg_match('/:' . preg_quote((string) $port, '/') . '$/', $localAddress) && $pid > 0) {
            $pids[$pid] = $pid;
        }
    }

    return array_values($pids);
}

function windowsArtisanServePids(int $port): array
{
    $scriptPid = getmypid();
    $script = "Get-CimInstance Win32_Process -Filter \"name = 'php.exe'\" | " .
        "Where-Object { \$_.ProcessId -ne {$scriptPid} -and \$_.CommandLine -match 'artisan serve' -and \$_.CommandLine -match '--port={$port}' } | " .
        'ForEach-Object { $_.ProcessId }';

    [$lines] = powershellCommand($script);
    $pids = [];

    foreach ($lines as $line) {
        $pid = (int) trim($line);

        if ($pid > 0) {
            $pids[$pid] = $pid;
        }
    }

    return array_values($pids);
}

function stopWindowsPids(array $pids): void
{
    foreach (array_unique($pids) as $pid) {
        if ($pid <= 0 || $pid === getmypid()) {
            continue;
        }

        echo "Stopping process on port 8000: PID {$pid}\n";
        windowsCommand('taskkill /F /T /PID ' . (int) $pid . ' 2>NUL');
    }
}

function stopPortUsers(int $port): void
{
    if (PHP_OS_FAMILY === 'Windows') {
        stopWindowsPids(array_merge(
            windowsListeningPids($port),
            windowsArtisanServePids($port)
        ));

        return;
    }

    $pids = [];
    exec('lsof -ti tcp:' . (int) $port . ' 2>/dev/null', $pids);

    foreach ($pids as $pid) {
        $pid = (int) $pid;

        if ($pid > 0 && $pid !== getmypid()) {
            echo "Stopping process on port 8000: PID {$pid}\n";
            exec('kill -9 ' . $pid . ' 2>/dev/null');
        }
    }
}

stopPortUsers($port);

$check = @stream_socket_server("tcp://{$host}:{$port}", $errno, $errstr);

if ($check === false) {
    fwrite(STDERR, "Port {$port} is still busy: {$errstr}\n");
    exit(1);
}

fclose($check);

echo "Starting Laravel on http://{$host}:{$port}\n";

$artisan = realpath(__DIR__ . '/../artisan');

$process = proc_open([
    PHP_BINARY,
    $artisan,
    'serve',
    '--host=' . $host,
    '--port=' . $port,
], [
    0 => ['file', 'php://stdin', 'r'],
    1 => ['file', 'php://stdout', 'w'],
    2 => ['file', 'php://stderr', 'w'],
], $pipes, dirname($artisan));

if (! is_resource($process)) {
    fwrite(STDERR, "Could not start Laravel server.\n");
    exit(1);
}

exit(proc_close($process));
