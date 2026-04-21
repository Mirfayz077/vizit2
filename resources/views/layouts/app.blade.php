<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="silk">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="color-scheme" content="light dark">
    <meta name="theme-color" content="#050505">

    <title>{{ $title ?? config('app.name', 'Vizitka') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=playfair-display:500,600,700,800|sora:400,500,600,700,800" rel="stylesheet" />
    <link rel="icon" type="image/svg+xml" href="{{ asset('favicon.svg') }}">
    <link rel="alternate icon" href="{{ asset('favicon.ico') }}">

    @vite(['resources/css/app.css', 'resources/sass/app.scss', 'resources/js/app.js'])
    @livewireStyles

    <style>
        /* =========================
           PRELOADER (MODERN 2026)
        ========================== */

        #preloader {
            position: fixed;
            inset: 0;
            z-index: 99999;
            display: flex;
            align-items: center;
            justify-content: center;
            background: radial-gradient(circle at center, #050505, #000);
            overflow: hidden;
            transition: opacity .8s ease, visibility .8s ease;
        }

        #preloader.hide {
            opacity: 0;
            visibility: hidden;
        }

        /* glowing orb */
        .orb {
            position: absolute;
            width: 320px;
            height: 320px;
            background: radial-gradient(circle, rgba(255,255,255,0.15), transparent 70%);
            filter: blur(45px);
            animation: floatOrb 6s ease-in-out infinite;
        }

        @keyframes floatOrb {
            0%,100% { transform: translateY(-20px) scale(1); }
            50% { transform: translateY(20px) scale(1.1); }
        }

        .loader-inner {
            text-align: center;
            color: white;
            z-index: 2;
        }

        .brand {
            font-size: clamp(34px, 6vw, 70px);
            letter-spacing: 0.25em;
            font-weight: 700;
            font-family: 'Playfair Display', serif;
            animation: fadeUp 1.2s ease;
        }

        .sub {
            margin-top: 10px;
            font-size: 12px;
            letter-spacing: 0.35em;
            opacity: 0.5;
            font-family: 'Sora', sans-serif;
            animation: fadeUp 1.6s ease;
        }

        .progress-wrap {
            margin-top: 25px;
            width: 240px;
            margin-inline: auto;
            animation: fadeUp 2s ease;
        }

        .progress-bar {
            width: 100%;
            height: 3px;
            background: rgba(255,255,255,0.08);
            border-radius: 50px;
            overflow: hidden;
        }

        #progressFill {
            height: 100%;
            width: 0%;
            background: linear-gradient(90deg, #ffffff, #8a8a8a, #ffffff);
            transition: width .2s ease;
        }

        .percent {
            margin-top: 10px;
            font-size: 12px;
            opacity: 0.6;
        }

        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(20px); filter: blur(8px); }
            to { opacity: 1; transform: translateY(0); filter: blur(0); }
        }

        /* =========================
           PAGE BASE (OPTIONAL CLEAN)
        ========================== */

        body {
            margin: 0;
            background: #fff;
            font-family: 'Sora', sans-serif;
        }
    </style>
</head>

<body class="antialiased">

<!-- PRELOADER -->
<div id="preloader">

    <div class="orb"></div>

    <div class="loader-inner">
        <div class="brand">MIRSAAR</div>
        <div class="sub">сознание сети синхронизируется…</div>

        <div class="progress-wrap">
            <div class="progress-bar">
                <div id="progressFill"></div>
            </div>

            <div class="percent">
                <span id="loadPercent">0</span>%
            </div>
        </div>
    </div>

</div>

<!-- PAGE CONTENT -->
{{ $slot }}

<!-- LOADING SCRIPT -->
<script>
document.addEventListener("DOMContentLoaded", () => {

    let percent = 0;
    const el = document.getElementById("loadPercent");
    const fill = document.getElementById("progressFill");
    const preloader = document.getElementById("preloader");

    const duration = 2000;
    const interval = 30;
    const steps = duration / interval;
    let step = 0;

    const loader = setInterval(() => {

        step++;
        percent = Math.min(100, Math.floor((step / steps) * 100));

        el.innerText = percent;
        fill.style.width = percent + "%";

        if (percent >= 100) {
            clearInterval(loader);

            setTimeout(() => {
                preloader.classList.add("hide");

                setTimeout(() => {
                    preloader.remove();
                }, 800);

            }, 300);
        }

    }, interval);

});
</script>

@livewireScriptConfig
</body>
</html>