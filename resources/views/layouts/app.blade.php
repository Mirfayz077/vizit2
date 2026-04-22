<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
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

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    @livewireStyles

    <style>
        #preloader {
            position: fixed;
            inset: 0;
            z-index: 99999;
            display: flex;
            align-items: center;
            justify-content: center;
            background: radial-gradient(circle at center, #050505, #000);
            overflow: hidden;
            transition: opacity 0.8s ease, visibility 0.8s ease;
        }

        #preloader.is-hidden {
            opacity: 0;
            visibility: hidden;
        }

        .preloader-orb {
            position: absolute;
            width: 320px;
            height: 320px;
            background: radial-gradient(circle, rgba(255, 255, 255, 0.15), transparent 70%);
            filter: blur(45px);
            animation: preloaderOrbFloat 6s ease-in-out infinite;
        }

        .preloader-panel {
            position: relative;
            text-align: center;
            color: white;
            z-index: 2;
        }

        .preloader-brand {
            font-family: 'Playfair Display', serif;
            font-size: clamp(34px, 6vw, 70px);
            font-weight: 700;
            letter-spacing: 0.25em;
        }

        .preloader-copy {
            margin-top: 10px;
            font-size: 12px;
            letter-spacing: 0.35em;
            opacity: 0.5;
            font-family: 'Sora', sans-serif;
        }

        .preloader-progress {
            margin: 25px auto 0;
            width: 240px;
        }

        .preloader-bar {
            width: 100%;
            height: 3px;
            overflow: hidden;
            border-radius: 50px;
            background: rgba(255, 255, 255, 0.08);
        }

        .preloader-fill {
            height: 100%;
            width: 0;
            background: linear-gradient(90deg, #ffffff, #8a8a8a, #ffffff);
            transition: width 0.2s ease;
        }

        .preloader-note {
            margin-top: 10px;
            font-size: 12px;
            opacity: 0.6;
        }

        @keyframes preloaderOrbFloat {
            0%,
            100% {
                transform: translateY(-20px) scale(1);
            }

            50% {
                transform: translateY(20px) scale(1.1);
            }
        }

        body {
            margin: 0;
            background: #fff;
            font-family: 'Sora', sans-serif;
        }

        body.is-preloading {
            overflow: hidden;
        }

        body.is-preloading::before {
            opacity: 0;
        }

        @media (max-width: 640px) {
            .preloader-progress {
                width: min(240px, calc(100vw - 96px));
            }
        }
    </style>
</head>

<body class="is-preloading">
<div id="preloader" aria-hidden="true">
    <div class="preloader-orb"></div>

    <div class="preloader-panel">
        <div class="preloader-brand">MIRSAAR</div>
        <div class="preloader-copy">сознание сети синхронизируется…</div>
        <div class="preloader-progress">
            <div class="preloader-bar">
                <div class="preloader-fill" id="progressFill"></div>
            </div>
        </div>
        <div class="preloader-note"><span id="loadPercent">0</span>%</div>
    </div>
</div>

{{ $slot }}

<script>
document.addEventListener('DOMContentLoaded', () => {
    const preloader = document.getElementById('preloader');
    const loadPercent = document.getElementById('loadPercent');
    const progressFill = document.getElementById('progressFill');

    if (!preloader || !loadPercent || !progressFill) {
        return;
    }

    let percent = 0;
    const duration = 2000;
    const interval = 30;
    const steps = duration / interval;
    let step = 0;

    const loader = window.setInterval(() => {
        step++;
        percent = Math.min(100, Math.floor((step / steps) * 100));
        loadPercent.textContent = percent;
        progressFill.style.width = `${percent}%`;

        if (percent >= 100) {
            window.clearInterval(loader);

            window.setTimeout(() => {
                preloader.classList.add('is-hidden');
                document.body.classList.remove('is-preloading');

                window.setTimeout(() => {
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
