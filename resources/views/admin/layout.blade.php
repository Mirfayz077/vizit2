<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#09111d">
    <title>@yield('title', 'Admin') - Mirsaar</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=jetbrains-mono:400,500,700|playfair-display:500,600,700,800|sora:400,500,600,700,800" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/sass/app.scss', 'resources/js/app.js'])
    <style>
        :root {
            --admin-bg: #070d17;
            --admin-panel: rgba(10, 17, 30, 0.82);
            --admin-panel-strong: rgba(13, 21, 36, 0.94);
            --admin-panel-soft: rgba(255, 255, 255, 0.04);
            --admin-line: rgba(181, 212, 255, 0.12);
            --admin-line-strong: rgba(181, 212, 255, 0.22);
            --admin-gold: #d4a35a;
            --admin-blue: #8ec9ff;
            --admin-cyan: #d9efff;
            --admin-ink: #f5f8ff;
            --admin-muted: rgba(217, 239, 255, 0.68);
            --admin-shadow: 0 32px 70px rgba(2, 7, 16, 0.38);
        }

        * {
            box-sizing: border-box;
        }

        body.admin-ui {
            margin: 0;
            min-height: 100vh;
            color: var(--admin-ink);
            font-family: 'Sora', sans-serif;
            background:
                radial-gradient(circle at top left, rgba(212, 163, 90, 0.18), transparent 24rem),
                radial-gradient(circle at top right, rgba(142, 201, 255, 0.16), transparent 26rem),
                linear-gradient(180deg, #050a12 0%, #0a101b 52%, #060911 100%);
        }

        body.admin-ui::before {
            content: '';
            position: fixed;
            inset: 0;
            pointer-events: none;
            background-image:
                linear-gradient(rgba(142, 201, 255, 0.06) 1px, transparent 1px),
                linear-gradient(90deg, rgba(142, 201, 255, 0.06) 1px, transparent 1px);
            background-size: 82px 82px;
            mask-image: linear-gradient(180deg, rgba(0, 0, 0, 0.74), transparent 88%);
            opacity: 0.4;
        }

        a {
            color: inherit;
            text-decoration: none;
        }

        .admin-auth-shell {
            display: grid;
            place-items: center;
            min-height: 100vh;
            padding: 1.2rem;
        }

        .admin-auth-card,
        .admin-card,
        .admin-table-card {
            border: 1px solid var(--admin-line);
            background: linear-gradient(180deg, rgba(14, 22, 37, 0.94), rgba(8, 13, 24, 0.9));
            box-shadow: var(--admin-shadow);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
        }

        .admin-auth-card {
            width: min(29rem, 100%);
            padding: 1.5rem;
            border-radius: 1.9rem;
        }

        .admin-brand {
            display: flex;
            align-items: center;
            gap: 0.95rem;
        }

        .admin-brand__mark {
            display: grid;
            place-items: center;
            width: 3.4rem;
            height: 3.4rem;
            border-radius: 1.1rem;
            color: #fff4e4;
            background: radial-gradient(circle at 30% 30%, #f6d7a7, #bc7f35 62%, #5f3d18 100%);
            box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.3);
        }

        .admin-brand__copy strong {
            display: block;
            font-size: 1.24rem;
            font-weight: 800;
        }

        .admin-brand__copy small {
            color: var(--admin-muted);
            letter-spacing: 0.18em;
            text-transform: uppercase;
        }

        .admin-auth-title,
        .admin-topbar h1 {
            margin: 0;
            font-family: 'Playfair Display', serif;
        }

        .admin-auth-title {
            margin-top: 1.35rem;
            font-size: clamp(2.2rem, 5vw, 3.1rem);
        }

        .admin-auth-copy,
        .admin-topbar p,
        .admin-note {
            color: var(--admin-muted);
        }

        .admin-auth-copy {
            margin: 0.75rem 0 1.5rem;
        }

        .admin-form-grid,
        .admin-stack {
            display: grid;
            gap: 0.95rem;
        }

        .admin-field label,
        .admin-field span {
            display: block;
            margin-bottom: 0.45rem;
            color: var(--admin-muted);
            font-size: 0.86rem;
        }

        .admin-field input,
        .admin-field select,
        .admin-field textarea {
            width: 100%;
            padding: 0.95rem 1rem;
            border: 1px solid var(--admin-line);
            border-radius: 1rem;
            color: var(--admin-ink);
            background: rgba(255, 255, 255, 0.04);
            font: inherit;
        }

        .admin-field textarea {
            min-height: 10rem;
            resize: vertical;
        }

        .admin-field input:focus,
        .admin-field select:focus,
        .admin-field textarea:focus {
            outline: none;
            border-color: rgba(142, 201, 255, 0.36);
            box-shadow: 0 0 0 3px rgba(142, 201, 255, 0.14);
        }

        .admin-error {
            margin-top: 0.4rem;
            color: #ffbea8;
            font-size: 0.82rem;
        }

        .admin-layout {
            display: grid;
            grid-template-columns: 19.5rem minmax(0, 1fr);
            gap: 1rem;
            min-height: 100vh;
            padding: 1rem;
        }

        .admin-sidebar {
            position: sticky;
            top: 1rem;
            align-self: start;
            display: flex;
            flex-direction: column;
            gap: 1.2rem;
            min-height: calc(100svh - 2rem);
            padding: 1.25rem;
            border: 1px solid var(--admin-line);
            border-radius: 1.9rem;
            background: linear-gradient(180deg, rgba(12, 20, 34, 0.95), rgba(7, 12, 23, 0.92));
            box-shadow: var(--admin-shadow);
            backdrop-filter: blur(18px);
            -webkit-backdrop-filter: blur(18px);
        }

        .admin-sidebar__intro,
        .admin-sidebar__meta {
            padding: 1rem;
            border: 1px solid rgba(255, 255, 255, 0.06);
            border-radius: 1.3rem;
            background: rgba(255, 255, 255, 0.04);
        }

        .admin-sidebar__intro p,
        .admin-sidebar__meta p {
            margin: 0.55rem 0 0;
            color: var(--admin-muted);
            font-size: 0.9rem;
            line-height: 1.7;
        }

        .admin-sidebar__nav {
            display: grid;
            gap: 0.6rem;
        }

        .admin-nav-link {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 0.75rem;
            min-height: 3.2rem;
            padding: 0.85rem 1rem;
            border: 1px solid transparent;
            border-radius: 1rem;
            color: var(--admin-muted);
            transition:
                border-color 220ms ease,
                background 220ms ease,
                transform 220ms ease,
                color 220ms ease;
        }

        .admin-nav-link::after {
            content: '';
            width: 0.5rem;
            height: 0.5rem;
            border-radius: 50%;
            background: rgba(142, 201, 255, 0.2);
            box-shadow: 0 0 0 0 rgba(142, 201, 255, 0);
        }

        .admin-nav-link.is-active,
        .admin-nav-link:hover {
            color: var(--admin-ink);
            border-color: var(--admin-line-strong);
            background: rgba(255, 255, 255, 0.06);
            transform: translateX(2px);
        }

        .admin-nav-link.is-active::after,
        .admin-nav-link:hover::after {
            background: var(--admin-gold);
            box-shadow: 0 0 0 6px rgba(212, 163, 90, 0.12);
        }

        .admin-sidebar__eyebrow,
        .admin-eyebrow {
            margin: 0;
            color: var(--admin-gold);
            font-size: 0.76rem;
            font-weight: 800;
            letter-spacing: 0.22em;
            text-transform: uppercase;
        }

        .admin-main {
            display: grid;
            align-content: start;
            gap: 1rem;
            padding-bottom: 1rem;
        }

        .admin-topbar {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            gap: 1rem;
            padding: 1.25rem 1.3rem;
            border: 1px solid var(--admin-line);
            border-radius: 1.7rem;
            background: linear-gradient(180deg, rgba(14, 22, 37, 0.92), rgba(10, 16, 27, 0.88));
            box-shadow: var(--admin-shadow);
        }

        .admin-topbar h1 {
            font-size: clamp(2rem, 4vw, 3rem);
        }

        .admin-topbar p {
            margin: 0.45rem 0 0;
            max-width: 42rem;
        }

        .admin-topbar__actions,
        .admin-actions {
            display: flex;
            align-items: center;
            gap: 0.65rem;
            flex-wrap: wrap;
        }

        .admin-button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.55rem;
            min-height: 3.15rem;
            padding-inline: 1.2rem;
            border: 0;
            border-radius: 999px;
            color: #07101b;
            background: linear-gradient(135deg, #f6d8a5, #ca8d3b);
            font-weight: 800;
            cursor: pointer;
            text-decoration: none;
            transition:
                transform 220ms ease,
                box-shadow 220ms ease,
                opacity 220ms ease;
        }

        .admin-button:hover,
        .admin-button:focus-visible {
            transform: translateY(-1px);
            box-shadow: 0 18px 30px rgba(11, 17, 28, 0.22);
        }

        .admin-button--ghost {
            color: var(--admin-ink);
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid var(--admin-line);
        }

        .admin-button--danger {
            color: #ffeae7;
            background: linear-gradient(135deg, #9f4638, #6a231a);
        }

        .admin-button--small {
            min-height: 2.65rem;
            padding-inline: 1rem;
            font-size: 0.86rem;
        }

        .admin-grid {
            display: grid;
            gap: 1rem;
        }

        .admin-grid--two {
            grid-template-columns: minmax(0, 1.16fr) minmax(20rem, 0.84fr);
        }

        .admin-kpi-grid,
        .admin-summary-grid {
            display: grid;
            gap: 1rem;
        }

        .admin-kpi-grid {
            grid-template-columns: repeat(5, minmax(0, 1fr));
        }

        .admin-summary-grid {
            grid-template-columns: repeat(4, minmax(0, 1fr));
        }

        .admin-card {
            padding: 1.15rem;
            border-radius: 1.55rem;
        }

        .admin-table-card {
            padding: 1rem;
            border-radius: 1.35rem;
        }

        .admin-kpi__label {
            color: var(--admin-muted);
            font-size: 0.8rem;
            letter-spacing: 0.18em;
            text-transform: uppercase;
        }

        .admin-kpi__value {
            margin-top: 0.7rem;
            font-size: clamp(1.95rem, 3.6vw, 2.8rem);
            font-weight: 800;
            line-height: 1;
        }

        .admin-kpi__meta {
            margin-top: 0.55rem;
            color: var(--admin-muted);
            font-size: 0.9rem;
        }

        .admin-section-head {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 1rem;
            margin-bottom: 1rem;
        }

        .admin-section-head h2,
        .admin-card h2 {
            margin: 0;
            font-size: 1.15rem;
        }

        .admin-row {
            display: flex;
            align-items: center;
            gap: 0.8rem;
            justify-content: space-between;
        }

        .admin-row--spread {
            align-items: flex-start;
        }

        .admin-meta {
            color: var(--admin-muted);
            font-size: 0.88rem;
            line-height: 1.7;
        }

        .admin-note {
            margin: 0;
            line-height: 1.75;
        }

        .admin-pill,
        .admin-badge,
        .admin-chip {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-height: 2rem;
            padding-inline: 0.8rem;
            border-radius: 999px;
            font-size: 0.76rem;
            font-weight: 800;
        }

        .admin-pill {
            text-transform: uppercase;
            letter-spacing: 0.12em;
            background: rgba(255, 255, 255, 0.06);
        }

        .admin-pill[data-status="new"] {
            color: #f4d59d;
            background: rgba(244, 213, 157, 0.14);
        }

        .admin-pill[data-status="reviewing"] {
            color: #c9e6ff;
            background: rgba(142, 201, 255, 0.16);
        }

        .admin-pill[data-status="contacted"] {
            color: #caefcf;
            background: rgba(111, 202, 131, 0.14);
        }

        .admin-pill[data-status="closed"] {
            color: #ffd1cc;
            background: rgba(255, 158, 149, 0.14);
        }

        .admin-badge {
            border: 1px solid var(--admin-line);
            background: rgba(255, 255, 255, 0.05);
        }

        .admin-badge.is-active {
            color: #cff0d6;
            border-color: rgba(111, 202, 131, 0.2);
            background: rgba(111, 202, 131, 0.14);
        }

        .admin-badge.is-inactive {
            color: #f5d39c;
            border-color: rgba(212, 163, 90, 0.18);
            background: rgba(212, 163, 90, 0.12);
        }

        .admin-chip-row {
            display: flex;
            flex-wrap: wrap;
            gap: 0.6rem;
        }

        .admin-chip {
            color: var(--admin-ink);
            background: rgba(255, 255, 255, 0.06);
        }

        .admin-toolbar {
            display: flex;
            flex-wrap: wrap;
            gap: 0.9rem;
            align-items: flex-end;
        }

        .admin-toolbar .admin-field {
            flex: 1 1 15rem;
        }

        .admin-detail-grid,
        .admin-form-layout {
            display: grid;
            gap: 1rem;
            grid-template-columns: minmax(0, 1.08fr) minmax(20rem, 0.92fr);
        }

        .admin-detail-copy {
            margin: 1rem 0 0;
            white-space: pre-line;
            line-height: 1.85;
        }

        .admin-hint-list {
            display: grid;
            gap: 0.85rem;
        }

        .admin-flash {
            padding: 0.95rem 1rem;
            border: 1px solid rgba(111, 202, 131, 0.24);
            border-radius: 1rem;
            color: #d7f3df;
            background: rgba(83, 160, 102, 0.14);
        }

        .admin-empty {
            padding: 1rem;
            border: 1px dashed rgba(255, 255, 255, 0.1);
            border-radius: 1rem;
            color: var(--admin-muted);
            text-align: center;
        }

        .admin-mono {
            font-family: 'JetBrains Mono', monospace;
        }

        .admin-pagination {
            display: flex;
            justify-content: flex-end;
        }

        @media (max-width: 1220px) {
            .admin-kpi-grid {
                grid-template-columns: repeat(3, minmax(0, 1fr));
            }

            .admin-summary-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }
        }

        @media (max-width: 980px) {
            .admin-layout,
            .admin-grid--two,
            .admin-detail-grid,
            .admin-form-layout {
                grid-template-columns: 1fr;
            }

            .admin-sidebar {
                position: static;
                min-height: auto;
            }

            .admin-topbar {
                flex-direction: column;
            }
        }

        @media (max-width: 720px) {
            .admin-layout {
                padding: 0.75rem;
            }

            .admin-kpi-grid,
            .admin-summary-grid {
                grid-template-columns: 1fr;
            }

            .admin-row,
            .admin-row--spread {
                flex-direction: column;
                align-items: flex-start;
            }

            .admin-topbar__actions,
            .admin-actions {
                width: 100%;
            }

            .admin-button,
            .admin-button--small {
                width: 100%;
            }
        }
    </style>
</head>
<body class="admin-ui">
    @auth
        <div class="admin-layout">
            <aside class="admin-sidebar">
                <div class="admin-brand">
                    <span class="admin-brand__mark" aria-hidden="true">
                        <svg viewBox="0 0 64 64" fill="none" width="26" height="26">
                            <circle cx="32" cy="32" r="29" stroke="currentColor" stroke-width="2.5" />
                            <path d="M18 39L28.5 22H35L25 42" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="3" />
                            <path d="M30 42L39 22H46L36.5 42" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="3" />
                        </svg>
                    </span>

                    <span class="admin-brand__copy">
                        <strong>Mirsaar Admin</strong>
                        <small>control room</small>
                    </span>
                </div>

                <div class="admin-sidebar__intro">
                    <p class="admin-sidebar__eyebrow">live flow</p>
                    <p>Public formdan kelgan leadlar, xizmatlar va statuslar shu panel orqali boshqariladi.</p>
                </div>

                <nav class="admin-sidebar__nav">
                    <a href="{{ route('admin.dashboard') }}" class="admin-nav-link {{ request()->routeIs('admin.dashboard') ? 'is-active' : '' }}">Dashboard</a>
                    <a href="{{ route('admin.inquiries.index') }}" class="admin-nav-link {{ request()->routeIs('admin.inquiries.*') ? 'is-active' : '' }}">Murojaatlar</a>
                    <a href="{{ route('admin.services.index') }}" class="admin-nav-link {{ request()->routeIs('admin.services.*') ? 'is-active' : '' }}">Xizmatlar</a>
                </nav>

                <div class="admin-sidebar__meta">
                    <p class="admin-sidebar__eyebrow">session</p>
                    <p><strong>{{ auth()->user()->name }}</strong></p>
                    <p class="admin-mono">{{ auth()->user()->login }}</p>
                </div>
            </aside>

            <main class="admin-main">
                @if (session('status'))
                    <div class="admin-flash">{{ session('status') }}</div>
                @endif

                @yield('content')
            </main>
        </div>
    @else
        @yield('content')
    @endauth
</body>
</html>
