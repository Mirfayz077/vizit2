    <!DOCTYPE html>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="silk">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="color-scheme" content="light dark">
        <meta name="theme-color" content="#1f140b">

        <title>{{ $title ?? config('app.name', 'Vizitka') }}</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=cormorant-garamond:500,600,700|manrope:400,500,600,700,800" rel="stylesheet" />
        <link rel="icon" type="image/svg+xml" href="{{ asset('favicon.svg') }}">
        <link rel="alternate icon" href="{{ asset('favicon.ico') }}">

        @vite(['resources/css/app.css', 'resources/sass/app.scss', 'resources/js/app.js'])
        @livewireStyles

        <style>
            /* ===== PRELOADER BASE ===== */
            #preloader {
                position: fixed;
                inset: 0;
                z-index: 99999;
                display: flex;
                align-items: center;
                justify-content: center;
                background: radial-gradient(circle at center, #0a0a0a, #000);
                backdrop-filter: blur(18px);
                transition: opacity .8s ease, visibility .8s ease;
            }

            #preloader.hide {
                opacity: 0;
                visibility: hidden;
            }

            /* ===== BRAND ===== */
            .brand {
                font-size: clamp(32px, 6vw, 64px);
                font-weight: 700;
                letter-spacing: 0.22em;
                text-align: center;
                font-family: 'Cormorant Garamond', serif;

                background: linear-gradient(90deg, #fff, #aaa, #fff);
                background-size: 200% 100%;
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;

                animation: shimmer 2.5s infinite linear, glow 2s ease-in-out infinite;
            }

            @keyframes shimmer {
                0% { background-position: 0% }
                100% { background-position: 200% }
            }

            @keyframes glow {
                0%,100% { filter: drop-shadow(0 0 8px rgba(255,255,255,0.2)); }
                50% { filter: drop-shadow(0 0 20px rgba(255,255,255,0.5)); }
            }

            /* ===== SUB TEXT ===== */
            .sub {
                margin-top: 10px;
                font-size: 12px;
                letter-spacing: 0.3em;
                opacity: 0.6;
                text-align: center;
                font-family: 'Manrope', sans-serif;
            }

            /* ===== BAR ===== */
            .bar {
                width: 240px;
                height: 2px;
                margin: 20px auto;
                background: rgba(255,255,255,0.1);
                overflow: hidden;
                border-radius: 999px;
                position: relative;
            }

            .bar::before {
                content: "";
                position: absolute;
                width: 40%;
                height: 100%;
                background: white;
                animation: move 1.2s infinite ease-in-out;
            }

            @keyframes move {
                0% { left: -40%; }
                50% { left: 30%; }
                100% { left: 100%; }
            }

            /* ===== PERCENT ===== */
            .percent {
                text-align: center;
                font-size: 13px;
                opacity: 0.7;
                font-family: 'Manrope', sans-serif;
            }

            @media (max-width: 480px) {
                .bar { width: 180px; }
            }
        </style>
    </head>

    <body class="antialiased">

    <!-- PRELOADER -->
    <div id="preloader">
        <div>
            <div class="brand">MIRSAAR</div>
            <div class="sub">DIGITAL STUDIO</div>
            <div class="bar"></div>
            <div class="percent"><span id="loadPercent">0</span>%</div>
        </div>
    </div>

    {{ $slot }}

    <script>
    document.addEventListener("DOMContentLoaded", () => {

        let percent = 0;
        const el = document.getElementById("loadPercent");
        const preloader = document.getElementById("preloader");

        const duration = 2200;
        const interval = 50;
        const steps = duration / interval;
        let step = 0;

        const loader = setInterval(() => {

            step++;
            percent = Math.min(100, Math.floor((step / steps) * 100));

            el.innerText = percent;

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
