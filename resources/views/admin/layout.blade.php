<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#09111d">
    <title>@yield('title', 'Admin') - Mirsaar</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=cormorant-garamond:500,600,700|jetbrains-mono:400,500,700|outfit:400,500,600,700,800|playfair-display:500,600,700,800|sora:400,500,600,700,800" rel="stylesheet" />
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

        button,
        input,
        select,
        textarea {
            font: inherit;
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

        body.admin-ui .phpdebugbar,
        body.admin-ui #phpdebugbar {
            display: none !important;
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

        .admin-form-grid--compact {
            grid-template-columns: repeat(2, minmax(0, 1fr));
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
            grid-template-columns: repeat(auto-fit, minmax(11rem, 1fr));
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

        .admin-row--top {
            justify-content: flex-start;
        }

        .admin-project-preview {
            flex: 0 0 7.4rem;
            width: 7.4rem;
            height: 5.2rem;
            display: grid;
            place-items: center;
            overflow: hidden;
            border: 1px solid var(--admin-line);
            border-radius: 1rem;
            color: var(--admin-gold);
            background:
                radial-gradient(circle at 30% 15%, rgba(212, 163, 90, 0.2), transparent 38%),
                rgba(255, 255, 255, 0.04);
            font-weight: 900;
        }

        .admin-project-preview img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .admin-project-main {
            flex: 1 1 auto;
            min-width: 0;
            display: grid;
            gap: 0.8rem;
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

        .gentech-auth-page {
            --gentech-cream: #f5edd8;
            --gentech-champagne: #efe2c6;
            --gentech-gold: #d4a853;
            --gentech-gold-soft: #f3ca74;
            --gentech-caramel: #c8863a;
            --gentech-mocha: #2a1c17;
            --gentech-panel: #1e1512;
            --gentech-text: #181512;
            position: relative;
            z-index: 1;
            display: grid;
            grid-template-columns: minmax(0, 1.02fr) minmax(25rem, 0.92fr);
            align-items: center;
            gap: clamp(1.5rem, 4.2vw, 5.4rem);
            min-height: 100svh;
            overflow: hidden;
            padding: clamp(1.5rem, 3.7vw, 4.2rem) clamp(1rem, 4.7vw, 5rem);
            color: var(--gentech-text);
            font-family: 'Outfit', 'Sora', sans-serif;
            background:
                radial-gradient(circle at 9% 12%, rgba(255, 255, 255, 0.92), transparent 18rem),
                radial-gradient(circle at 78% 12%, rgba(212, 168, 83, 0.28), transparent 22rem),
                radial-gradient(circle at 18% 88%, rgba(200, 134, 58, 0.24), transparent 24rem),
                linear-gradient(135deg, #fff7e8 0%, var(--gentech-cream) 46%, var(--gentech-champagne) 100%);
            isolation: isolate;
        }

        .gentech-auth-page::before {
            content: '';
            position: absolute;
            inset: 0;
            z-index: -3;
            pointer-events: none;
            background-image:
                linear-gradient(rgba(212, 168, 83, 0.1) 1px, transparent 1px),
                linear-gradient(90deg, rgba(212, 168, 83, 0.1) 1px, transparent 1px);
            background-size: 86px 86px;
            mask-image: linear-gradient(90deg, rgba(0, 0, 0, 0.18), rgba(0, 0, 0, 0.72), rgba(0, 0, 0, 0.2));
            opacity: 0.38;
            animation: gentechGridDrift 28s linear infinite;
        }

        .gentech-auth-page::after {
            content: '';
            position: absolute;
            right: -12%;
            bottom: -22%;
            z-index: -2;
            width: 72rem;
            height: 34rem;
            border-radius: 50%;
            border: 1px solid rgba(212, 168, 83, 0.22);
            background:
                repeating-radial-gradient(ellipse at center, transparent 0 18px, rgba(212, 168, 83, 0.14) 19px 20px),
                radial-gradient(circle, rgba(255, 255, 255, 0.4), transparent 66%);
            transform: rotate(-8deg);
            opacity: 0.42;
        }

        .gentech-auth-orbit {
            position: absolute;
            z-index: -1;
            border-radius: 999px;
            pointer-events: none;
            filter: blur(34px);
            opacity: 0.58;
            animation: gentechOrbFloat 12s ease-in-out infinite;
        }

        .gentech-auth-orbit--one {
            top: 12%;
            left: 43%;
            width: 18rem;
            height: 18rem;
            background: rgba(255, 255, 255, 0.68);
        }

        .gentech-auth-orbit--two {
            right: 10%;
            bottom: 8%;
            width: 20rem;
            height: 20rem;
            background: rgba(212, 168, 83, 0.24);
            animation-delay: -5s;
        }

        .gentech-auth-circuit {
            position: absolute;
            inset: 0;
            z-index: -1;
            pointer-events: none;
            overflow: hidden;
            opacity: 0.42;
        }

        .gentech-auth-circuit span {
            position: absolute;
            display: block;
            background: rgba(212, 168, 83, 0.6);
            box-shadow: 0 0 16px rgba(212, 168, 83, 0.24);
            animation: gentechCircuitPulse 8s ease-in-out infinite;
        }

        .gentech-auth-circuit span:nth-child(1) {
            top: 18%;
            left: 38%;
            width: 12rem;
            height: 1px;
        }

        .gentech-auth-circuit span:nth-child(2) {
            top: 18%;
            left: calc(38% + 12rem);
            width: 1px;
            height: 5rem;
            animation-delay: -2s;
        }

        .gentech-auth-circuit span:nth-child(3) {
            right: 3rem;
            top: 5rem;
            width: 7rem;
            height: 7rem;
            background:
                radial-gradient(circle, rgba(200, 134, 58, 0.8) 1.5px, transparent 2px);
            background-size: 16px 16px;
            box-shadow: none;
            animation-delay: -4s;
        }

        .gentech-auth-circuit span:nth-child(4) {
            right: 2.2rem;
            top: 11rem;
            width: 1px;
            height: 9rem;
            animation-delay: -1s;
        }

        .gentech-auth-circuit span:nth-child(5) {
            left: 0.5rem;
            bottom: 17rem;
            width: 5rem;
            height: 5rem;
            background:
                radial-gradient(circle, rgba(200, 134, 58, 0.42) 1.5px, transparent 2px);
            background-size: 12px 12px;
            box-shadow: none;
            animation-delay: -3s;
        }

        .gentech-auth-circuit span:nth-child(6) {
            left: 40%;
            bottom: 23%;
            width: 17rem;
            height: 1px;
            animation-delay: -6s;
        }

        .gentech-auth-hero {
            position: relative;
            display: grid;
            align-content: center;
            min-height: min(42rem, calc(100svh - 7rem));
            padding-bottom: clamp(5rem, 8vw, 8rem);
        }

        .gentech-brand {
            display: inline-flex;
            align-items: center;
            gap: 1rem;
            width: fit-content;
            color: #a87527;
        }

        .gentech-brand__mark {
            display: inline-grid;
            place-items: center;
            width: clamp(4rem, 6vw, 5.4rem);
            height: clamp(4rem, 6vw, 5.4rem);
            color: var(--gentech-gold);
            filter: drop-shadow(0 16px 28px rgba(122, 78, 25, 0.18));
        }

        .gentech-brand__mark svg {
            width: 100%;
            height: 100%;
        }

        .gentech-brand__copy {
            display: grid;
            gap: 0.25rem;
        }

        .gentech-brand__copy strong {
            color: #171310;
            font-family: 'Cormorant Garamond', 'Playfair Display', serif;
            font-size: clamp(2.25rem, 4.3vw, 3.65rem);
            font-weight: 700;
            line-height: 0.9;
            letter-spacing: 0.22em;
            text-transform: uppercase;
        }

        .gentech-brand__copy small {
            color: #a87527;
            font-size: clamp(0.72rem, 1.05vw, 0.94rem);
            font-weight: 700;
            letter-spacing: 0.42em;
            text-transform: uppercase;
        }

        .gentech-hero-copy {
            position: relative;
            z-index: 1;
            max-width: 48rem;
            margin-top: clamp(2.7rem, 6.3vw, 5.2rem);
            animation: gentechHeroIn 720ms ease both;
        }

        .gentech-hero-bars {
            display: flex;
            gap: 1rem;
            margin-bottom: 1.6rem;
        }

        .gentech-hero-bars span {
            width: 2.5rem;
            height: 0.18rem;
            border-radius: 999px;
            background: var(--gentech-gold);
        }

        .gentech-eyebrow {
            margin: 0 0 0.7rem;
            color: #a87527;
            font-size: 0.78rem;
            font-weight: 800;
            letter-spacing: 0.28em;
            text-transform: uppercase;
        }

        .gentech-hero-title {
            margin: 0;
            color: #15110f;
            font-family: 'Cormorant Garamond', 'Playfair Display', serif;
            font-size: clamp(3.9rem, 6.8vw, 6.35rem);
            font-weight: 700;
            line-height: 0.88;
            letter-spacing: -0.035em;
        }

        .gentech-hero-title span {
            display: block;
            color: #b47b2f;
        }

        .gentech-hero-lead {
            max-width: 43rem;
            margin: 1.8rem 0 0;
            color: rgba(24, 21, 18, 0.72);
            font-size: clamp(1rem, 1.4vw, 1.22rem);
            line-height: 1.65;
        }

        .gentech-hero-line {
            position: relative;
            width: min(100%, 44rem);
            height: 1px;
            margin: 1.8rem 0;
            background: linear-gradient(90deg, #b98232, rgba(212, 168, 83, 0.2));
        }

        .gentech-hero-line::after {
            content: '';
            position: absolute;
            right: 0;
            top: 50%;
            width: 0.5rem;
            height: 0.5rem;
            border-radius: 50%;
            background: var(--gentech-caramel);
            transform: translateY(-50%);
        }

        .gentech-city-scene {
            position: absolute;
            left: clamp(-2.6rem, -3vw, -0.75rem);
            bottom: clamp(-2.4rem, -2.2vw, -0.9rem);
            z-index: 0;
            width: min(48rem, 62vw);
            height: clamp(15.5rem, 24vw, 22rem);
            margin: 0;
            overflow: hidden;
            border-radius: 0 12rem 0 0;
            opacity: 0.86;
            pointer-events: none;
            mix-blend-mode: multiply;
            mask-image:
                linear-gradient(90deg, #000 0%, rgba(0, 0, 0, 0.94) 56%, transparent 100%),
                linear-gradient(180deg, transparent 0%, #000 20%, #000 78%, transparent 100%);
            -webkit-mask-image:
                linear-gradient(90deg, #000 0%, rgba(0, 0, 0, 0.94) 56%, transparent 100%),
                linear-gradient(180deg, transparent 0%, #000 20%, #000 78%, transparent 100%);
            mask-composite: intersect;
            -webkit-mask-composite: source-in;
        }

        .gentech-city-scene::before,
        .gentech-city-scene::after {
            content: '';
            position: absolute;
            inset: 0;
            pointer-events: none;
        }

        .gentech-city-scene::before {
            z-index: 1;
            background:
                radial-gradient(circle at 25% 14%, rgba(255, 244, 216, 0.48), transparent 34%),
                linear-gradient(180deg, rgba(245, 237, 216, 0.1), rgba(245, 237, 216, 0.58) 82%, rgba(245, 237, 216, 0.86));
        }

        .gentech-city-scene::after {
            z-index: 2;
            background:
                repeating-linear-gradient(118deg, transparent 0 18px, rgba(255, 255, 255, 0.22) 19px 20px, transparent 21px 40px),
                linear-gradient(135deg, rgba(212, 168, 83, 0.28), rgba(245, 237, 216, 0.62));
            mix-blend-mode: screen;
            opacity: 0.82;
        }

        .gentech-city-scene img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: 50% 58%;
            filter: sepia(0.92) saturate(1.55) hue-rotate(344deg) brightness(1.23) contrast(0.95);
            transform: scale(1.08);
        }

        .gentech-auth-panel {
            display: grid;
            place-items: start center;
            align-self: stretch;
            justify-self: end;
            width: 100%;
            padding-top: clamp(1.25rem, 4.4vw, 4.6rem);
        }

        .gentech-login-card {
            position: relative;
            width: min(100%, 42rem);
            padding: clamp(1.35rem, 3.2vw, 3.7rem);
            border: 1px solid rgba(212, 168, 83, 0.42);
            border-radius: clamp(1.6rem, 3vw, 3.1rem);
            color: rgba(255, 247, 235, 0.92);
            background:
                radial-gradient(circle at 70% 0%, rgba(212, 168, 83, 0.2), transparent 18rem),
                radial-gradient(circle at 5% 100%, rgba(200, 134, 58, 0.12), transparent 16rem),
                linear-gradient(145deg, rgba(45, 31, 25, 0.88), rgba(22, 15, 13, 0.92));
            box-shadow:
                inset 0 1px 0 rgba(255, 230, 184, 0.18),
                0 30px 80px rgba(42, 28, 23, 0.35);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            overflow: hidden;
            animation: gentechCardIn 760ms ease both;
            transition:
                border-color 220ms ease,
                box-shadow 220ms ease,
                transform 220ms ease;
        }

        .gentech-login-card:hover {
            border-color: rgba(243, 202, 116, 0.68);
            box-shadow:
                inset 0 1px 0 rgba(255, 230, 184, 0.22),
                0 34px 86px rgba(42, 28, 23, 0.4),
                0 0 34px rgba(212, 168, 83, 0.16);
        }

        .gentech-login-card::before {
            content: '';
            position: absolute;
            inset: 0;
            pointer-events: none;
            background-image:
                radial-gradient(circle, rgba(212, 168, 83, 0.2) 1px, transparent 1.6px),
                linear-gradient(135deg, transparent 0 78%, rgba(212, 168, 83, 0.12) 78.2%, transparent 78.6%);
            background-size: 18px 18px, 100% 100%;
            opacity: 0.28;
        }

        .gentech-lock-badge,
        .gentech-login-head,
        .gentech-auth-alert,
        .gentech-login-form,
        .gentech-security-note {
            position: relative;
            z-index: 1;
        }

        .gentech-lock-badge {
            display: grid;
            place-items: center;
            width: 4.9rem;
            height: 4.9rem;
            margin: 0 auto 1.4rem;
            border: 1px solid rgba(212, 168, 83, 0.36);
            border-radius: 50%;
            color: #f3ca74;
            background: rgba(255, 255, 255, 0.04);
            box-shadow: 0 0 0 0 rgba(212, 168, 83, 0.22);
            animation: gentechLockPulse 3s ease-in-out infinite;
        }

        .gentech-lock-badge svg {
            width: 2rem;
            height: 2rem;
        }

        .gentech-login-head {
            text-align: center;
        }

        .gentech-login-head h2 {
            margin: 0;
            color: #fffaf2;
            font-family: 'Cormorant Garamond', 'Playfair Display', serif;
            font-size: clamp(2.75rem, 5vw, 4.25rem);
            font-weight: 600;
            line-height: 1;
        }

        .gentech-login-head p {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 1rem;
            margin: 0.75rem 0 0;
            color: rgba(255, 247, 235, 0.66);
            font-size: clamp(0.95rem, 1.35vw, 1.12rem);
        }

        .gentech-login-head p span {
            width: 2.2rem;
            height: 1px;
            background: rgba(212, 168, 83, 0.56);
        }

        .gentech-auth-alert {
            display: flex;
            align-items: flex-start;
            gap: 0.75rem;
            margin-top: 1.35rem;
            padding: 0.9rem 1rem;
            border: 1px solid rgba(255, 190, 168, 0.3);
            border-radius: 1rem;
            color: #ffddcf;
            background: rgba(139, 47, 29, 0.18);
            line-height: 1.45;
        }

        .gentech-auth-alert svg {
            width: 1.2rem;
            height: 1.2rem;
            flex: 0 0 auto;
            margin-top: 0.1rem;
        }

        .gentech-login-form {
            display: grid;
            gap: 1.25rem;
            margin-top: 2rem;
        }

        .gentech-field {
            display: grid;
            gap: 0.55rem;
        }

        .gentech-field label {
            color: #f3ca74;
            font-size: 1rem;
            font-weight: 600;
        }

        .gentech-field small {
            color: #ffbea8;
            font-size: 0.84rem;
        }

        .gentech-input-wrap {
            position: relative;
            display: flex;
            align-items: center;
        }

        .gentech-input-wrap > svg {
            position: absolute;
            left: 1.25rem;
            width: 1.35rem;
            height: 1.35rem;
            color: rgba(255, 247, 235, 0.72);
            pointer-events: none;
        }

        .gentech-input-wrap input {
            width: 100%;
            min-height: 4.35rem;
            padding: 1rem 3.6rem 1rem 3.9rem;
            border: 1px solid rgba(239, 226, 198, 0.34);
            border-radius: 1rem;
            color: #fffaf2;
            background: rgba(255, 255, 255, 0.025);
            outline: none;
            transition:
                border-color 220ms ease,
                box-shadow 220ms ease,
                background 220ms ease;
        }

        .gentech-input-wrap input::placeholder {
            color: rgba(255, 247, 235, 0.46);
        }

        .gentech-input-wrap input:focus {
            border-color: rgba(243, 202, 116, 0.9);
            background: rgba(255, 255, 255, 0.045);
            box-shadow:
                0 0 0 3px rgba(212, 168, 83, 0.16),
                0 0 28px rgba(212, 168, 83, 0.12);
        }

        .gentech-password-toggle {
            position: absolute;
            right: 1.05rem;
            display: inline-grid;
            place-items: center;
            width: 2.3rem;
            height: 2.3rem;
            border: 0;
            border-radius: 50%;
            color: rgba(255, 247, 235, 0.7);
            background: transparent;
            cursor: pointer;
            transition:
                color 200ms ease,
                background 200ms ease,
                transform 200ms ease;
        }

        .gentech-password-toggle:hover,
        .gentech-password-toggle:focus-visible,
        .gentech-password-toggle.is-visible {
            color: #f3ca74;
            background: rgba(212, 168, 83, 0.12);
            transform: translateY(-1px);
            outline: none;
        }

        .gentech-password-toggle svg {
            width: 1.35rem;
            height: 1.35rem;
        }

        .gentech-form-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 1rem;
        }

        .gentech-remember {
            display: inline-flex;
            align-items: center;
            gap: 0.7rem;
            color: rgba(255, 247, 235, 0.88);
            cursor: pointer;
            user-select: none;
        }

        .gentech-remember input {
            position: absolute;
            opacity: 0;
            pointer-events: none;
        }

        .gentech-remember span {
            display: inline-grid;
            place-items: center;
            width: 1.65rem;
            height: 1.65rem;
            border: 1px solid rgba(243, 202, 116, 0.72);
            border-radius: 0.28rem;
            color: transparent;
            background: rgba(255, 255, 255, 0.03);
            box-shadow: 0 0 0 0 rgba(212, 168, 83, 0);
            transition:
                color 200ms ease,
                background 200ms ease,
                box-shadow 200ms ease;
        }

        .gentech-remember span svg {
            width: 1rem;
            height: 1rem;
        }

        .gentech-remember input:checked + span {
            color: #1b120f;
            background: linear-gradient(135deg, var(--gentech-gold), var(--gentech-gold-soft));
            box-shadow: 0 0 18px rgba(212, 168, 83, 0.24);
        }

        .gentech-remember input:focus-visible + span {
            box-shadow: 0 0 0 3px rgba(212, 168, 83, 0.22);
        }

        .gentech-forgot-link {
            color: #f3ca74;
            font-weight: 600;
            text-decoration: underline;
            text-underline-offset: 0.2rem;
            transition: color 200ms ease;
        }

        .gentech-forgot-link:hover,
        .gentech-forgot-link:focus-visible {
            color: #ffe1a0;
            outline: none;
        }

        .gentech-submit {
            position: relative;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.85rem;
            min-height: 4.3rem;
            margin-top: 0.6rem;
            padding: 1rem 1.35rem;
            border: 1px solid rgba(255, 231, 179, 0.34);
            border-radius: 1rem;
            color: #16110e;
            background: linear-gradient(135deg, #d4a853, #f3ca74, #c8863a);
            box-shadow:
                0 0 30px rgba(212, 168, 83, 0.35),
                inset 0 1px 0 rgba(255, 255, 255, 0.38);
            font-size: 1.25rem;
            font-weight: 700;
            cursor: pointer;
            overflow: hidden;
            transition:
                transform 220ms ease,
                box-shadow 220ms ease,
                filter 220ms ease;
        }

        .gentech-submit::before {
            content: '';
            position: absolute;
            inset: 0 auto 0 -40%;
            width: 36%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.42), transparent);
            transform: skewX(-18deg);
            transition: left 420ms ease;
        }

        .gentech-submit:hover,
        .gentech-submit:focus-visible {
            transform: translateY(-2px);
            filter: saturate(1.06);
            box-shadow:
                0 0 42px rgba(212, 168, 83, 0.48),
                0 20px 36px rgba(18, 10, 6, 0.24),
                inset 0 1px 0 rgba(255, 255, 255, 0.42);
            outline: none;
        }

        .gentech-submit:hover::before,
        .gentech-submit:focus-visible::before {
            left: 108%;
        }

        .gentech-submit svg {
            width: 1.55rem;
            height: 1.55rem;
            transition: transform 220ms ease;
        }

        .gentech-submit:hover svg,
        .gentech-submit:focus-visible svg {
            transform: translateX(4px);
        }

        .gentech-submit__loading {
            display: none;
        }

        .gentech-submit.is-loading {
            pointer-events: none;
            opacity: 0.78;
        }

        .gentech-submit.is-loading .gentech-submit__idle {
            display: none;
        }

        .gentech-submit.is-loading .gentech-submit__loading {
            display: inline;
        }

        .gentech-submit.is-loading svg {
            animation: gentechSubmitSpin 900ms linear infinite;
        }

        .gentech-security-note {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.8rem;
            margin-top: 2.05rem;
            padding-top: 1.35rem;
            border-top: 1px solid rgba(212, 168, 83, 0.28);
            color: rgba(255, 247, 235, 0.62);
            font-size: 1rem;
            text-align: center;
        }

        .gentech-security-note span {
            display: inline-grid;
            place-items: center;
            width: 1.7rem;
            height: 1.7rem;
            color: #f3ca74;
        }

        .gentech-security-note svg {
            width: 100%;
            height: 100%;
        }

        @keyframes gentechCardIn {
            from {
                opacity: 0;
                transform: translateY(24px) scale(0.98);
            }

            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        @keyframes gentechHeroIn {
            from {
                opacity: 0;
                transform: translateX(-18px);
            }

            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes gentechLockPulse {
            0%,
            100% {
                box-shadow: 0 0 0 0 rgba(212, 168, 83, 0.18);
            }

            50% {
                box-shadow: 0 0 0 14px rgba(212, 168, 83, 0);
            }
        }

        @keyframes gentechGridDrift {
            from {
                background-position: 0 0;
            }

            to {
                background-position: 86px 86px;
            }
        }

        @keyframes gentechOrbFloat {
            0%,
            100% {
                transform: translate3d(0, 0, 0) scale(1);
            }

            50% {
                transform: translate3d(0, 1.2rem, 0) scale(1.05);
            }
        }

        @keyframes gentechCircuitPulse {
            0%,
            100% {
                opacity: 0.22;
            }

            50% {
                opacity: 0.72;
            }
        }

        @keyframes gentechSubmitSpin {
            to {
                transform: rotate(360deg);
            }
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

            .gentech-auth-page {
                grid-template-columns: 1fr;
                align-content: start;
                gap: 1.25rem;
                min-height: 100svh;
                overflow-y: auto;
                padding: 1.25rem;
            }

            .gentech-auth-hero {
                display: contents;
            }

            .gentech-brand {
                order: 1;
                justify-self: center;
            }

            .gentech-auth-panel {
                order: 2;
                place-items: center;
                align-self: auto;
                width: 100%;
                padding-top: 0;
            }

            .gentech-hero-copy {
                order: 3;
                justify-self: center;
                max-width: 40rem;
                margin: 0.65rem auto 0;
                text-align: center;
            }

            .gentech-hero-bars,
            .gentech-hero-line,
            .gentech-city-scene {
                display: none;
            }

            .gentech-hero-title {
                font-size: clamp(2.5rem, 11vw, 4rem);
                line-height: 0.95;
            }

            .gentech-hero-lead {
                max-width: 34rem;
                margin: 1rem auto 0;
                font-size: 0.98rem;
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

            .admin-form-grid--compact {
                grid-template-columns: 1fr;
            }

            .admin-project-preview {
                width: 100%;
                flex-basis: auto;
                height: 9rem;
            }

            .admin-project-main {
                width: 100%;
            }

            .admin-topbar__actions,
            .admin-actions {
                width: 100%;
            }

            .admin-button,
            .admin-button--small {
                width: 100%;
            }

            .gentech-auth-page {
                padding: 1rem;
            }

            .gentech-brand {
                gap: 0.75rem;
            }

            .gentech-brand__mark {
                width: 3.4rem;
                height: 3.4rem;
            }

            .gentech-brand__copy strong {
                font-size: clamp(1.7rem, 8vw, 2.35rem);
                letter-spacing: 0.16em;
            }

            .gentech-brand__copy small {
                font-size: 0.62rem;
                letter-spacing: 0.24em;
            }

            .gentech-login-card {
                border-radius: 1.45rem;
                padding: 1.1rem;
            }

            .gentech-lock-badge {
                width: 3.75rem;
                height: 3.75rem;
                margin-bottom: 1rem;
            }

            .gentech-login-head h2 {
                font-size: clamp(2.25rem, 12vw, 3rem);
            }

            .gentech-login-head p {
                gap: 0.6rem;
                font-size: 0.92rem;
            }

            .gentech-login-head p span {
                width: 1.35rem;
            }

            .gentech-login-form {
                gap: 1rem;
                margin-top: 1.35rem;
            }

            .gentech-input-wrap input {
                min-height: 3.75rem;
                padding-left: 3.3rem;
                padding-right: 3.2rem;
            }

            .gentech-input-wrap > svg {
                left: 1rem;
            }

            .gentech-password-toggle {
                right: 0.7rem;
            }

            .gentech-form-row {
                align-items: flex-start;
                flex-direction: column;
                gap: 0.8rem;
            }

            .gentech-submit {
                width: 100%;
                min-height: 3.85rem;
                font-size: 1.08rem;
            }

            .gentech-security-note {
                margin-top: 1.35rem;
                font-size: 0.9rem;
            }

        }

        @media (min-width: 561px) and (max-width: 980px) {
            .gentech-auth-page {
                display: grid;
                grid-template-columns: minmax(0, 0.92fr) minmax(18.5rem, 0.98fr);
                align-items: center;
                align-content: center;
                gap: clamp(0.75rem, 2vw, 1.2rem);
                overflow: hidden;
                padding: clamp(0.75rem, 2vw, 1.15rem);
            }

            .gentech-auth-hero {
                display: grid;
                align-content: center;
                min-height: calc(100svh - 2rem);
                padding-bottom: clamp(4.7rem, 13vw, 6.5rem);
            }

            .gentech-brand {
                order: 0;
                justify-self: start;
                gap: 0.55rem;
            }

            .gentech-brand__mark {
                width: clamp(2.8rem, 7vw, 3.45rem);
                height: clamp(2.8rem, 7vw, 3.45rem);
            }

            .gentech-brand__copy strong {
                font-size: clamp(1.55rem, 5.3vw, 2.35rem);
                letter-spacing: 0.16em;
            }

            .gentech-brand__copy small {
                font-size: clamp(0.52rem, 1.5vw, 0.62rem);
                letter-spacing: 0.23em;
            }

            .gentech-auth-panel {
                order: 0;
                place-items: center;
                align-self: center;
                justify-self: end;
                width: 100%;
                padding-top: 0;
            }

            .gentech-hero-copy {
                order: 0;
                justify-self: stretch;
                max-width: none;
                margin: clamp(1.5rem, 3vw, 2.2rem) 0 0;
                text-align: left;
            }

            .gentech-hero-bars {
                display: flex;
                gap: 0.55rem;
                margin-bottom: 0.75rem;
            }

            .gentech-hero-bars span {
                width: 1.55rem;
                height: 0.14rem;
            }

            .gentech-eyebrow {
                margin-bottom: 0.45rem;
                font-size: clamp(0.48rem, 1.45vw, 0.6rem);
                letter-spacing: 0.18em;
            }

            .gentech-hero-title {
                font-size: clamp(2.35rem, 8.4vw, 3.9rem);
                line-height: 0.88;
            }

            .gentech-hero-lead {
                max-width: 20rem;
                margin-top: 0.85rem;
                font-size: clamp(0.66rem, 1.75vw, 0.86rem);
                line-height: 1.48;
            }

            .gentech-hero-line {
                display: block;
                width: 100%;
                margin: 0.95rem 0;
            }

            .gentech-city-scene {
                display: block;
                left: -1.2rem;
                bottom: -2.9rem;
                width: clamp(16rem, 50vw, 28rem);
                height: clamp(7.5rem, 24vw, 12.5rem);
                border-radius: 0 4rem 0 0;
                opacity: 0.7;
            }

            .gentech-login-card {
                width: 100%;
                padding: clamp(0.75rem, 2vw, 1.1rem);
                border-radius: clamp(1.15rem, 3vw, 1.65rem);
            }

            .gentech-lock-badge {
                width: clamp(2.7rem, 7vw, 3.25rem);
                height: clamp(2.7rem, 7vw, 3.25rem);
                margin-bottom: 0.7rem;
            }

            .gentech-lock-badge svg {
                width: 1.35rem;
                height: 1.35rem;
            }

            .gentech-login-head h2 {
                font-size: clamp(2.05rem, 6vw, 2.75rem);
            }

            .gentech-login-head p {
                gap: 0.45rem;
                margin-top: 0.45rem;
                font-size: clamp(0.68rem, 1.8vw, 0.78rem);
            }

            .gentech-login-head p span {
                width: 1.25rem;
            }

            .gentech-login-form {
                gap: 0.68rem;
                margin-top: 1rem;
            }

            .gentech-field {
                gap: 0.32rem;
            }

            .gentech-field label {
                font-size: clamp(0.68rem, 1.8vw, 0.76rem);
            }

            .gentech-input-wrap input {
                min-height: clamp(2.65rem, 8vw, 3.25rem);
                padding: 0.6rem 2.5rem 0.6rem 2.7rem;
                border-radius: 0.75rem;
                font-size: clamp(0.68rem, 1.8vw, 0.82rem);
            }

            .gentech-input-wrap > svg {
                left: 0.82rem;
                width: 1rem;
                height: 1rem;
            }

            .gentech-password-toggle {
                right: 0.55rem;
                width: 1.9rem;
                height: 1.9rem;
            }

            .gentech-password-toggle svg {
                width: 1.05rem;
                height: 1.05rem;
            }

            .gentech-form-row {
                align-items: center;
                flex-direction: row;
                gap: 0.6rem;
                font-size: clamp(0.62rem, 1.6vw, 0.76rem);
            }

            .gentech-remember {
                gap: 0.45rem;
            }

            .gentech-remember span {
                width: 1.18rem;
                height: 1.18rem;
                border-radius: 0.2rem;
            }

            .gentech-remember span svg {
                width: 0.75rem;
                height: 0.75rem;
            }

            .gentech-submit {
                min-height: clamp(2.85rem, 8vw, 3.4rem);
                margin-top: 0.1rem;
                border-radius: 0.75rem;
                font-size: clamp(0.9rem, 2.7vw, 1.08rem);
            }

            .gentech-submit svg {
                width: 1.15rem;
                height: 1.15rem;
            }

            .gentech-security-note {
                gap: 0.45rem;
                margin-top: 0.95rem;
                padding-top: 0.82rem;
                font-size: clamp(0.62rem, 1.6vw, 0.76rem);
            }

            .gentech-security-note span {
                width: 1.15rem;
                height: 1.15rem;
            }
        }

        @media (min-width: 561px) and (max-width: 980px) and (max-height: 520px) {
            .gentech-auth-page {
                gap: 0.7rem;
                padding: 0.6rem;
            }

            .gentech-auth-hero {
                min-height: calc(100svh - 1.2rem);
                padding-bottom: 2.7rem;
            }

            .gentech-brand__mark {
                width: 2.6rem;
                height: 2.6rem;
            }

            .gentech-brand__copy strong {
                font-size: 1.65rem;
            }

            .gentech-brand__copy small {
                font-size: 0.5rem;
            }

            .gentech-hero-copy {
                margin-top: 0.9rem;
            }

            .gentech-hero-bars {
                margin-bottom: 0.45rem;
            }

            .gentech-eyebrow {
                margin-bottom: 0.3rem;
                font-size: 0.48rem;
            }

            .gentech-hero-title {
                font-size: clamp(2.1rem, 7.6vw, 3.25rem);
            }

            .gentech-hero-lead {
                max-width: 18rem;
                margin-top: 0.55rem;
                font-size: 0.64rem;
                line-height: 1.4;
            }

            .gentech-hero-line {
                margin: 0.62rem 0;
            }

            .gentech-city-scene {
                bottom: -2.6rem;
                height: 7.2rem;
                opacity: 0.5;
            }

            .gentech-login-card {
                padding: 0.65rem;
                border-radius: 1.15rem;
            }

            .gentech-lock-badge {
                width: 2.35rem;
                height: 2.35rem;
                margin-bottom: 0.42rem;
            }

            .gentech-lock-badge svg {
                width: 1.05rem;
                height: 1.05rem;
            }

            .gentech-login-head h2 {
                font-size: 1.9rem;
            }

            .gentech-login-head p {
                margin-top: 0.26rem;
                font-size: 0.62rem;
            }

            .gentech-login-form {
                gap: 0.44rem;
                margin-top: 0.58rem;
            }

            .gentech-field label {
                font-size: 0.62rem;
            }

            .gentech-input-wrap input {
                min-height: 2.28rem;
                padding: 0.45rem 2.2rem 0.45rem 2.35rem;
                border-radius: 0.65rem;
                font-size: 0.66rem;
            }

            .gentech-input-wrap > svg {
                left: 0.72rem;
                width: 0.88rem;
                height: 0.88rem;
            }

            .gentech-password-toggle {
                right: 0.42rem;
                width: 1.7rem;
                height: 1.7rem;
            }

            .gentech-form-row {
                font-size: 0.6rem;
            }

            .gentech-remember span {
                width: 1.05rem;
                height: 1.05rem;
            }

            .gentech-submit {
                min-height: 2.5rem;
                font-size: 0.86rem;
            }

            .gentech-security-note {
                margin-top: 0.58rem;
                padding-top: 0.45rem;
                font-size: 0.58rem;
            }
        }

        @media (prefers-reduced-motion: reduce) {
            .gentech-auth-page::before,
            .gentech-auth-orbit,
            .gentech-auth-circuit span,
            .gentech-hero-copy,
            .gentech-login-card,
            .gentech-lock-badge,
            .gentech-submit.is-loading svg {
                animation: none;
            }

            .gentech-login-card,
            .gentech-hero-copy {
                opacity: 1;
                transform: none;
            }
        }

        /* Aurum-style admin shell */
        body.admin-ui {
            color: #1f1a14;
            background:
                radial-gradient(circle at 76% 7%, rgba(226, 190, 114, 0.18), transparent 22rem),
                linear-gradient(180deg, #fbf4e7 0%, #f5ead5 54%, #efe0c3 100%);
        }

        body.admin-ui::before {
            display: none;
        }

        .admin-layout {
            display: grid;
            grid-template-columns: 17.8rem minmax(0, 1fr);
            gap: 0;
            min-height: 100vh;
            padding: 0;
            color: #221b14;
            background:
                radial-gradient(circle at 52% 0%, rgba(255, 255, 255, 0.72), transparent 28rem),
                #f7ecd8;
        }

        .admin-workspace {
            min-width: 0;
            display: grid;
            grid-template-rows: auto minmax(0, 1fr) auto;
        }

        .admin-sidebar {
            position: sticky;
            top: 0;
            align-self: start;
            min-height: 100vh;
            height: 100vh;
            padding: 2rem 1.45rem 1.35rem;
            border: 0;
            border-right: 1px solid rgba(210, 167, 87, 0.26);
            border-radius: 0;
            background:
                radial-gradient(circle at 40% 5%, rgba(212, 168, 83, 0.2), transparent 12rem),
                radial-gradient(circle at 95% 88%, rgba(212, 168, 83, 0.18), transparent 12rem),
                linear-gradient(180deg, #16110a 0%, #070603 100%);
            box-shadow: 18px 0 46px rgba(44, 29, 10, 0.18);
            color: #f8edd5;
        }

        .admin-sidebar::after {
            content: '';
            position: absolute;
            inset: auto 0 0 0;
            height: 12rem;
            pointer-events: none;
            opacity: 0.5;
            background:
                repeating-linear-gradient(105deg, transparent 0 12px, rgba(212, 168, 83, 0.09) 13px, transparent 14px),
                linear-gradient(180deg, transparent, rgba(212, 168, 83, 0.12));
            mask-image: linear-gradient(180deg, transparent, #000);
        }

        .admin-brand {
            position: relative;
            z-index: 1;
            gap: 0.9rem;
            min-height: 4.8rem;
        }

        .admin-brand__mark {
            width: 4.15rem;
            height: 4.15rem;
            border-radius: 0;
            color: #f5c970;
            background: transparent;
            box-shadow: none;
        }

        .admin-brand__copy strong {
            font-family: 'Cormorant Garamond', serif;
            font-size: 1.38rem;
            font-weight: 700;
            line-height: 1;
            letter-spacing: 0.18em;
            color: #fff2d1;
            text-transform: uppercase;
        }

        .admin-brand__copy small {
            margin-top: 0.3rem;
            color: rgba(245, 201, 112, 0.78);
            font-size: 0.72rem;
            letter-spacing: 0.36em;
        }

        .admin-sidebar__intro {
            display: none;
        }

        .admin-sidebar__nav {
            position: relative;
            z-index: 1;
            gap: 1rem;
            margin-top: 1.5rem;
        }

        .admin-nav-link {
            min-height: 4.1rem;
            padding: 1rem 1.1rem;
            border: 1px solid transparent;
            border-radius: 0.75rem;
            color: rgba(255, 246, 226, 0.82);
            font-size: 1.02rem;
            font-weight: 600;
            background: transparent;
        }

        .admin-nav-link__label {
            display: inline-flex;
            align-items: center;
            gap: 1rem;
        }

        .admin-nav-link svg {
            width: 1.45rem;
            height: 1.45rem;
            color: #e4b95e;
        }

        .admin-nav-link::after {
            width: 0.55rem;
            height: 0.55rem;
            border: solid currentColor;
            border-width: 0 2px 2px 0;
            border-radius: 0;
            background: transparent;
            box-shadow: none;
            transform: rotate(-45deg);
            opacity: 0;
        }

        .admin-nav-link.is-active,
        .admin-nav-link:hover {
            color: #fff5dc;
            border-color: rgba(226, 185, 94, 0.55);
            background:
                radial-gradient(circle at 28% 15%, rgba(226, 185, 94, 0.22), transparent 52%),
                rgba(226, 185, 94, 0.08);
            box-shadow:
                inset 0 0 0 1px rgba(255, 229, 170, 0.06),
                0 0 30px rgba(212, 168, 83, 0.22);
            transform: none;
        }

        .admin-nav-link.is-active::after,
        .admin-nav-link:hover::after {
            background: transparent;
            box-shadow: none;
            opacity: 1;
        }

        .admin-sidebar__meta {
            position: relative;
            z-index: 1;
            margin-top: auto;
            padding: 1.45rem;
            border: 1px solid rgba(226, 185, 94, 0.36);
            border-radius: 0.75rem;
            background:
                radial-gradient(circle at 50% 8%, rgba(226, 185, 94, 0.2), transparent 4rem),
                linear-gradient(145deg, rgba(30, 23, 12, 0.96), rgba(7, 6, 3, 0.94));
            box-shadow: 0 18px 42px rgba(0, 0, 0, 0.22);
            overflow: hidden;
        }

        .admin-sidebar__meta::before {
            content: '';
            display: block;
            width: 2.85rem;
            height: 2.85rem;
            margin: 0 auto 1rem;
            border: 1px solid rgba(226, 185, 94, 0.34);
            border-radius: 50%;
            background:
                radial-gradient(circle, rgba(226, 185, 94, 0.24), transparent 60%),
                url("data:image/svg+xml,%3Csvg width='36' height='36' viewBox='0 0 24 24' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M12 3L19 6V11C19 15.5 16.2 18.7 12 21C7.8 18.7 5 15.5 5 11V6L12 3Z' stroke='%23e4b95e' stroke-width='1.4'/%3E%3Cpath d='M9 12L11 14L15.5 9.5' stroke='%23e4b95e' stroke-width='1.4' stroke-linecap='round' stroke-linejoin='round'/%3E%3C/svg%3E") center / 1.55rem no-repeat;
        }

        .admin-sidebar__meta p {
            margin: 0;
            color: rgba(255, 246, 226, 0.74);
            font-size: 0.86rem;
            text-align: center;
        }

        .admin-sidebar__meta strong {
            display: block;
            margin-bottom: 0.4rem;
            font-family: 'Cormorant Garamond', serif;
            color: #fff5dc;
            font-size: 1.25rem;
        }

        .admin-sidebar__eyebrow,
        .admin-eyebrow {
            color: #bd8533;
            letter-spacing: 0.18em;
        }

        .admin-shell-topbar {
            min-height: 6.15rem;
            display: grid;
            grid-template-columns: 3rem minmax(16rem, 32rem) auto;
            align-items: center;
            gap: 1.35rem;
            padding: 1rem 2rem;
            border-bottom: 1px solid rgba(90, 64, 32, 0.14);
            background: rgba(255, 249, 238, 0.62);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
        }

        .admin-shell-menu,
        .admin-shell-icon {
            display: grid;
            place-items: center;
            width: 2.65rem;
            height: 2.65rem;
            border: 0;
            border-radius: 50%;
            color: #2b2117;
            background: transparent;
        }

        .admin-shell-search {
            justify-self: center;
            width: min(32rem, 100%);
            display: grid;
            grid-template-columns: auto 1fr auto;
            align-items: center;
            gap: 0.7rem;
            min-height: 3.25rem;
            padding: 0 1rem;
            border: 1px solid rgba(97, 71, 39, 0.16);
            border-radius: 1rem;
            color: rgba(42, 31, 21, 0.56);
            background: rgba(255, 252, 244, 0.52);
            box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.72);
        }

        .admin-shell-search input {
            width: 100%;
            border: 0;
            outline: 0;
            color: #2b2117;
            background: transparent;
        }

        .admin-shell-search input::placeholder {
            color: rgba(42, 31, 21, 0.52);
        }

        .admin-shell-kbd {
            display: inline-flex;
            align-items: center;
            gap: 0.25rem;
            min-height: 1.8rem;
            padding: 0 0.65rem;
            border: 1px solid rgba(97, 71, 39, 0.14);
            border-radius: 0.65rem;
            color: rgba(42, 31, 21, 0.62);
            background: rgba(255, 255, 255, 0.48);
            font-size: 0.82rem;
        }

        .admin-shell-userbar {
            justify-self: end;
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .admin-shell-notification {
            position: relative;
        }

        .admin-shell-notification::after {
            content: '3';
            position: absolute;
            top: -0.1rem;
            right: -0.1rem;
            display: grid;
            place-items: center;
            width: 1.05rem;
            height: 1.05rem;
            border-radius: 50%;
            color: #3a2410;
            background: #ddb76a;
            font-size: 0.66rem;
            font-weight: 800;
        }

        .admin-shell-user {
            display: flex;
            align-items: center;
            gap: 0.85rem;
        }

        .admin-shell-avatar {
            width: 3.2rem;
            height: 3.2rem;
            display: grid;
            place-items: center;
            border-radius: 50%;
            border: 3px solid rgba(255, 255, 255, 0.72);
            color: #fff3d7;
            background:
                radial-gradient(circle at 35% 25%, rgba(255, 255, 255, 0.22), transparent 30%),
                linear-gradient(145deg, #5a4637, #17100c);
            box-shadow: 0 10px 22px rgba(66, 42, 16, 0.18);
            font-weight: 800;
        }

        .admin-shell-user strong,
        .admin-shell-user small {
            display: block;
        }

        .admin-shell-user strong {
            color: #17120e;
            font-weight: 800;
        }

        .admin-shell-user small {
            margin-top: 0.1rem;
            color: rgba(42, 31, 21, 0.6);
            font-size: 0.82rem;
        }

        .admin-profile-menu {
            position: relative;
        }

        .admin-profile-menu summary {
            list-style: none;
            cursor: pointer;
        }

        .admin-profile-menu summary::-webkit-details-marker {
            display: none;
        }

        .admin-profile-chevron {
            display: grid;
            place-items: center;
            color: rgba(42, 31, 21, 0.74);
            transition: transform 180ms ease;
        }

        .admin-profile-menu[open] .admin-profile-chevron {
            transform: rotate(180deg);
        }

        .admin-profile-dropdown {
            position: absolute;
            top: calc(100% + 0.8rem);
            right: 0;
            z-index: 20;
            width: 17rem;
            display: grid;
            gap: 0.35rem;
            padding: 0.75rem;
            border: 1px solid rgba(122, 86, 45, 0.16);
            border-radius: 1rem;
            color: #211710;
            background: rgba(255, 251, 241, 0.96);
            box-shadow: 0 24px 54px rgba(74, 48, 17, 0.16);
            backdrop-filter: blur(18px);
            -webkit-backdrop-filter: blur(18px);
        }

        .admin-profile-dropdown::before {
            content: '';
            position: absolute;
            top: -0.45rem;
            right: 1.4rem;
            width: 0.9rem;
            height: 0.9rem;
            border-left: 1px solid rgba(122, 86, 45, 0.16);
            border-top: 1px solid rgba(122, 86, 45, 0.16);
            background: rgba(255, 251, 241, 0.96);
            transform: rotate(45deg);
        }

        .admin-profile-dropdown__head {
            padding: 0.75rem 0.8rem;
            border-radius: 0.75rem;
            background: rgba(226, 185, 94, 0.11);
        }

        .admin-profile-dropdown__head strong,
        .admin-profile-dropdown__head span {
            display: block;
        }

        .admin-profile-dropdown__head span {
            margin-top: 0.2rem;
            color: rgba(42, 31, 21, 0.6);
            font-size: 0.82rem;
        }

        .admin-profile-dropdown a,
        .admin-profile-dropdown button {
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: space-between;
            min-height: 2.65rem;
            padding: 0 0.8rem;
            border: 0;
            border-radius: 0.75rem;
            color: #2b2117;
            background: transparent;
            font: inherit;
            font-weight: 700;
            text-align: left;
            cursor: pointer;
        }

        .admin-profile-dropdown a:hover,
        .admin-profile-dropdown button:hover {
            color: #5f3d18;
            background: rgba(226, 185, 94, 0.14);
        }

        .admin-main {
            display: grid;
            align-content: start;
            gap: 1.25rem;
            min-width: 0;
            padding: 1.25rem 2.1rem 1.6rem;
        }

        .admin-flash {
            border-color: rgba(54, 140, 82, 0.22);
            color: #245b34;
            background: rgba(88, 171, 112, 0.12);
        }

        .admin-topbar {
            position: relative;
            min-height: 17.6rem;
            padding: 2.6rem 3rem;
            border: 1px solid rgba(151, 105, 45, 0.15);
            border-radius: 1.45rem;
            overflow: hidden;
            color: #20160f;
            background:
                radial-gradient(circle at 25% 10%, rgba(255, 255, 255, 0.9), transparent 24rem),
                linear-gradient(110deg, rgba(255, 250, 239, 0.94), rgba(243, 227, 197, 0.74));
            box-shadow: 0 22px 60px rgba(75, 52, 21, 0.12);
        }

        .admin-topbar::before {
            content: 'A';
            position: absolute;
            inset: 0 12% auto auto;
            color: rgba(120, 83, 37, 0.05);
            font-family: 'Cormorant Garamond', serif;
            font-size: 20rem;
            font-weight: 700;
            line-height: 0.78;
            pointer-events: none;
        }

        .admin-topbar::after {
            content: '';
            position: absolute;
            inset: auto -6rem -7rem 0;
            height: 14rem;
            pointer-events: none;
            opacity: 0.58;
            background:
                repeating-radial-gradient(ellipse at 55% 100%, transparent 0 15px, rgba(206, 160, 75, 0.18) 16px, transparent 17px);
        }

        .admin-topbar > * {
            position: relative;
            z-index: 1;
        }

        .admin-topbar h1 {
            max-width: 48rem;
            margin-top: 1.4rem;
            font-family: 'Cormorant Garamond', serif;
            font-size: clamp(3rem, 5vw, 5.25rem);
            font-weight: 700;
            line-height: 0.92;
            letter-spacing: 0;
        }

        .admin-topbar p:not(.admin-eyebrow) {
            max-width: 38rem;
            color: rgba(35, 27, 20, 0.63);
            font-size: 1.05rem;
            line-height: 1.75;
        }

        .admin-topbar__actions {
            align-self: flex-end;
            justify-content: flex-end;
            max-width: 34rem;
        }

        .admin-button {
            min-height: 3.1rem;
            border: 1px solid rgba(94, 67, 32, 0.18);
            border-radius: 0.72rem;
            color: #fff1c8;
            background:
                radial-gradient(circle at 18% 0%, rgba(255, 229, 164, 0.18), transparent 42%),
                linear-gradient(135deg, #171008, #2a1a0d 60%, #8d5e1d);
            box-shadow: 0 14px 28px rgba(79, 50, 12, 0.18);
        }

        .admin-button--ghost {
            color: #4c351d;
            background: rgba(255, 250, 238, 0.45);
            border-color: rgba(94, 67, 32, 0.18);
            box-shadow: none;
        }

        .admin-button--danger {
            color: #fff6ec;
            background: linear-gradient(135deg, #8e3b24, #4b160c);
        }

        .admin-card,
        .admin-table-card {
            border: 1px solid rgba(122, 86, 45, 0.14);
            color: #221912;
            background:
                linear-gradient(145deg, rgba(255, 252, 244, 0.78), rgba(246, 235, 216, 0.64));
            box-shadow: 0 18px 42px rgba(74, 48, 17, 0.08);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
        }

        .admin-card {
            border-radius: 1.05rem;
        }

        .admin-table-card {
            border-radius: 0.8rem;
        }

        .admin-kpi-grid {
            grid-template-columns: repeat(4, minmax(0, 1fr));
        }

        .admin-kpi-grid .admin-card {
            position: relative;
            min-height: 7.2rem;
            padding-left: 6.5rem;
        }

        .admin-kpi-grid .admin-card::before {
            content: '';
            position: absolute;
            left: 1.45rem;
            top: 50%;
            width: 4rem;
            height: 4rem;
            border-radius: 50%;
            background:
                radial-gradient(circle at 30% 20%, #fff0bd, transparent 34%),
                linear-gradient(145deg, #f1cb73, #af7626);
            box-shadow: 0 14px 24px rgba(148, 95, 32, 0.26);
            transform: translateY(-50%);
        }

        .admin-kpi__label {
            color: rgba(52, 37, 24, 0.52);
            font-size: 0.72rem;
            letter-spacing: 0.08em;
        }

        .admin-kpi__value {
            color: #1d1510;
            font-family: 'Cormorant Garamond', serif;
            font-size: clamp(2.2rem, 3vw, 3rem);
            font-weight: 700;
        }

        .admin-kpi__meta,
        .admin-meta,
        .admin-note,
        .admin-topbar p,
        .admin-auth-copy {
            color: rgba(42, 31, 21, 0.62);
        }

        .admin-section-head h2,
        .admin-card h2 {
            color: #211710;
            font-family: 'Cormorant Garamond', serif;
            font-size: 1.45rem;
        }

        .admin-field label,
        .admin-field span {
            color: rgba(42, 31, 21, 0.64);
        }

        .admin-field input,
        .admin-field select,
        .admin-field textarea {
            border-color: rgba(122, 86, 45, 0.16);
            color: #221912;
            background: rgba(255, 253, 247, 0.72);
        }

        .admin-field input:focus,
        .admin-field select:focus,
        .admin-field textarea:focus {
            border-color: rgba(188, 132, 48, 0.46);
            box-shadow: 0 0 0 4px rgba(212, 168, 83, 0.16);
        }

        .admin-chip,
        .admin-badge,
        .admin-pill {
            border: 1px solid rgba(126, 89, 48, 0.13);
            color: #5d3c17;
            background: rgba(255, 249, 235, 0.68);
        }

        .admin-badge.is-active,
        .admin-pill[data-status="contacted"] {
            color: #24683f;
            border-color: rgba(64, 142, 87, 0.18);
            background: rgba(80, 174, 105, 0.13);
        }

        .admin-badge.is-inactive,
        .admin-pill[data-status="closed"] {
            color: #8a5128;
            border-color: rgba(199, 127, 52, 0.2);
            background: rgba(218, 164, 91, 0.14);
        }

        .admin-pill[data-status="new"] {
            color: #875913;
            background: rgba(226, 185, 94, 0.18);
        }

        .admin-pill[data-status="reviewing"] {
            color: #4f3a15;
            background: rgba(190, 143, 57, 0.14);
        }

        .admin-empty {
            border-color: rgba(122, 86, 45, 0.18);
            color: rgba(42, 31, 21, 0.62);
            background: rgba(255, 251, 241, 0.5);
        }

        .admin-project-preview {
            border-color: rgba(122, 86, 45, 0.16);
            color: #a66d20;
            background:
                radial-gradient(circle at 30% 15%, rgba(212, 163, 90, 0.2), transparent 38%),
                rgba(255, 252, 244, 0.7);
        }

        .admin-pagination nav,
        .admin-pagination div,
        .admin-pagination span,
        .admin-pagination a {
            color: #3d2c1b;
        }

        .admin-shell-footer {
            min-height: 5.8rem;
            display: grid;
            grid-template-columns: 1fr auto 1fr;
            align-items: center;
            gap: 1rem;
            padding: 1.15rem 2rem;
            color: rgba(255, 242, 216, 0.64);
            background:
                radial-gradient(circle at 12% 0%, rgba(212, 168, 83, 0.14), transparent 14rem),
                linear-gradient(90deg, #0b0804, #151006 55%, #090704);
        }

        .admin-shell-footer strong {
            color: #e4b95e;
        }

        .admin-shell-footer__brand,
        .admin-shell-footer__links {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .admin-shell-footer__center {
            display: flex;
            align-items: center;
            gap: 1.2rem;
            color: rgba(245, 201, 112, 0.68);
            white-space: nowrap;
        }

        .admin-shell-footer__line {
            width: 7rem;
            height: 1px;
            background: linear-gradient(90deg, transparent, rgba(226, 185, 94, 0.52), transparent);
        }

        .admin-shell-footer__links {
            justify-self: end;
            color: rgba(255, 242, 216, 0.74);
        }

        @media (max-width: 1220px) {
            .admin-kpi-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }

            .admin-shell-topbar {
                grid-template-columns: auto 1fr auto;
            }
        }

        @media (max-width: 980px) {
            .admin-layout {
                display: block;
            }

            .admin-sidebar {
                position: relative;
                height: auto;
                min-height: auto;
                padding: 1.1rem;
            }

            .admin-sidebar__nav {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }

            .admin-sidebar__meta {
                margin-top: 1rem;
            }

            .admin-shell-topbar {
                grid-template-columns: auto 1fr;
            }

            .admin-shell-search {
                order: 3;
                grid-column: 1 / -1;
                width: 100%;
            }

            .admin-shell-userbar {
                justify-self: end;
            }

            .admin-main {
                padding: 1rem;
            }

            .admin-topbar {
                min-height: auto;
                padding: 1.6rem;
            }

            .admin-shell-footer {
                grid-template-columns: 1fr;
                text-align: center;
            }

            .admin-shell-footer__brand,
            .admin-shell-footer__center,
            .admin-shell-footer__links {
                justify-content: center;
                justify-self: center;
                flex-wrap: wrap;
            }
        }

        @media (max-width: 720px) {
            .admin-shell-topbar {
                padding: 0.85rem 1rem;
            }

            .admin-shell-user small,
            .admin-shell-kbd {
                display: none;
            }

            .admin-shell-avatar {
                width: 2.6rem;
                height: 2.6rem;
            }

            .admin-sidebar__nav,
            .admin-kpi-grid {
                grid-template-columns: 1fr;
            }

            .admin-topbar h1 {
                font-size: clamp(2.4rem, 13vw, 3.6rem);
            }

            .admin-kpi-grid .admin-card {
                padding-left: 5.8rem;
            }

            .admin-shell-footer__line {
                width: 4rem;
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
                        <svg viewBox="0 0 72 72" fill="none" width="58" height="58">
                            <path d="M36 7L65 60H52L45.8 48.4H26.2L20 60H7L36 7Z" stroke="currentColor" stroke-linejoin="round" stroke-width="3" />
                            <path d="M36 22L46 60H26L36 22Z" stroke="currentColor" stroke-linejoin="round" stroke-width="3" />
                            <path d="M17 54L36 12L55 54" stroke="rgba(255, 244, 212, .45)" stroke-linecap="round" stroke-width="1.6" />
                        </svg>
                    </span>

                    <span class="admin-brand__copy">
                        <strong>Gentech</strong>
                        <small>Admin</small>
                    </span>
                </div>

                <div class="admin-sidebar__intro">
                    <p class="admin-sidebar__eyebrow">live flow</p>
                    <p>Public formdan kelgan leadlar, xizmatlar va statuslar shu panel orqali boshqariladi.</p>
                </div>

                <nav class="admin-sidebar__nav">
                    <a href="{{ route('admin.dashboard') }}" class="admin-nav-link {{ request()->routeIs('admin.dashboard') ? 'is-active' : '' }}">
                        <span class="admin-nav-link__label">
                            <svg viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                <path d="M4 4H10V10H4V4Z M14 4H20V10H14V4Z M4 14H10V20H4V14Z M14 14H20V20H14V14Z" stroke="currentColor" stroke-width="1.8" stroke-linejoin="round" />
                            </svg>
                            Dashboard
                        </span>
                    </a>
                    <a href="{{ route('admin.inquiries.index') }}" class="admin-nav-link {{ request()->routeIs('admin.inquiries.*') ? 'is-active' : '' }}">
                        <span class="admin-nav-link__label">
                            <svg viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                <path d="M12 12C14.2 12 16 10.2 16 8C16 5.8 14.2 4 12 4C9.8 4 8 5.8 8 8C8 10.2 9.8 12 12 12Z" stroke="currentColor" stroke-width="1.8" />
                                <path d="M4.5 20C5.5 16.9 8.2 15 12 15C15.8 15 18.5 16.9 19.5 20" stroke="currentColor" stroke-linecap="round" stroke-width="1.8" />
                            </svg>
                            Murojaatlar
                        </span>
                    </a>
                    <a href="{{ route('admin.hero.edit') }}" class="admin-nav-link {{ request()->routeIs('admin.hero.*') ? 'is-active' : '' }}">
                        <span class="admin-nav-link__label">
                            <svg viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                <path d="M5 19V5H19V19H5Z" stroke="currentColor" stroke-linejoin="round" stroke-width="1.8" />
                                <path d="M8 15L10.8 11.8L13 14L15.4 10.6L18 15" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" />
                                <path d="M9.2 8.5H9.21" stroke="currentColor" stroke-linecap="round" stroke-width="2.8" />
                            </svg>
                            Hero
                        </span>
                    </a>
                    <a href="{{ route('admin.services.index') }}" class="admin-nav-link {{ request()->routeIs('admin.services.*') ? 'is-active' : '' }}">
                        <span class="admin-nav-link__label">
                            <svg viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                <path d="M7 3H15L19 7V21H7V3Z" stroke="currentColor" stroke-linejoin="round" stroke-width="1.8" />
                                <path d="M14 3V8H19" stroke="currentColor" stroke-linejoin="round" stroke-width="1.8" />
                                <path d="M10 12H16M10 16H16" stroke="currentColor" stroke-linecap="round" stroke-width="1.8" />
                            </svg>
                            Xizmatlar
                        </span>
                    </a>
                    <a href="{{ route('admin.projects.index') }}" class="admin-nav-link {{ request()->routeIs('admin.projects.*') ? 'is-active' : '' }}">
                        <span class="admin-nav-link__label">
                            <svg viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                <path d="M5 19V11M10 19V7M15 19V4M20 19V13" stroke="currentColor" stroke-linecap="round" stroke-width="1.9" />
                                <path d="M4 20H21" stroke="currentColor" stroke-linecap="round" stroke-width="1.9" />
                            </svg>
                            Proektlar
                        </span>
                    </a>
                    <a href="{{ route('admin.profile.show') }}" class="admin-nav-link {{ request()->routeIs('admin.profile.*') ? 'is-active' : '' }}">
                        <span class="admin-nav-link__label">
                            <svg viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                <path d="M12 15.5A3.5 3.5 0 1 0 12 8.5A3.5 3.5 0 0 0 12 15.5Z" stroke="currentColor" stroke-width="1.8" />
                                <path d="M19.4 15A8.2 8.2 0 0 0 20 12L22 10.5L20 7L17.6 8A8.2 8.2 0 0 0 15 6.5L14.7 4H10.7L10.4 6.5A8.2 8.2 0 0 0 7.8 8L5.4 7L3.4 10.5L5.4 12A8.2 8.2 0 0 0 6 15L4 16.5L6 20L8.4 19A8.2 8.2 0 0 0 11 20.5L11.3 23H15.3L15.6 20.5A8.2 8.2 0 0 0 18.2 19L20.6 20L22.6 16.5L20.6 15H19.4Z" stroke="currentColor" stroke-linejoin="round" stroke-width="1.3" />
                            </svg>
                            Profil
                        </span>
                    </a>
                    <a href="{{ route('admin.settings.edit') }}" class="admin-nav-link {{ request()->routeIs('admin.settings.*') ? 'is-active' : '' }}">
                        <span class="admin-nav-link__label">
                            <svg viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                <path d="M4 6H20M4 12H20M4 18H20" stroke="currentColor" stroke-linecap="round" stroke-width="1.8" />
                                <path d="M9 6A2 2 0 1 0 9.01 6M15 12A2 2 0 1 0 15.01 12M11 18A2 2 0 1 0 11.01 18" stroke="currentColor" stroke-linecap="round" stroke-width="1.8" />
                            </svg>
                            Kontaktlar
                        </span>
                    </a>
                </nav>

                <div class="admin-sidebar__meta">
                    <p><strong>System Status</strong></p>
                    <p><span style="color:#32d36b;">●</span> All systems operational</p>
                </div>
            </aside>

            <div class="admin-workspace">
                <header class="admin-shell-topbar">
                    <button class="admin-shell-menu" type="button" aria-label="Menu">
                        <svg viewBox="0 0 24 24" fill="none" width="23" height="23" aria-hidden="true">
                            <path d="M5 7H19M5 12H14M5 17H19" stroke="currentColor" stroke-linecap="round" stroke-width="1.8" />
                        </svg>
                    </button>

                    <label class="admin-shell-search">
                        <svg viewBox="0 0 24 24" fill="none" width="20" height="20" aria-hidden="true">
                            <path d="M11 19A8 8 0 1 0 11 3A8 8 0 0 0 11 19Z" stroke="currentColor" stroke-width="1.8" />
                            <path d="M21 21L16.7 16.7" stroke="currentColor" stroke-linecap="round" stroke-width="1.8" />
                        </svg>
                        <input type="search" placeholder="Search anything..." aria-label="Search anything">
                        <span class="admin-shell-kbd">⌘ K</span>
                    </label>

                    <div class="admin-shell-userbar">
                        <button class="admin-shell-icon admin-shell-notification" type="button" aria-label="Notifications">
                            <svg viewBox="0 0 24 24" fill="none" width="23" height="23" aria-hidden="true">
                                <path d="M18 9A6 6 0 0 0 6 9C6 16 3.5 17 3.5 17H20.5C20.5 17 18 16 18 9Z" stroke="currentColor" stroke-linejoin="round" stroke-width="1.8" />
                                <path d="M10 20C10.5 20.8 11.2 21.2 12 21.2C12.8 21.2 13.5 20.8 14 20" stroke="currentColor" stroke-linecap="round" stroke-width="1.8" />
                            </svg>
                        </button>

                        <details class="admin-profile-menu">
                            <summary class="admin-shell-user">
                                <span class="admin-shell-avatar">{{ strtoupper(substr(auth()->user()->name, 0, 1)) }}</span>
                                <span>
                                    <strong>{{ auth()->user()->name ?: 'Admin User' }}</strong>
                                    <small>Super Administrator</small>
                                </span>
                                <span class="admin-profile-chevron" aria-hidden="true">
                                    <svg viewBox="0 0 24 24" fill="none" width="20" height="20">
                                        <path d="M7 10L12 15L17 10" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" />
                                    </svg>
                                </span>
                            </summary>

                            <div class="admin-profile-dropdown">
                                <div class="admin-profile-dropdown__head">
                                    <strong>{{ auth()->user()->name ?: 'Admin User' }}</strong>
                                    <span>{{ auth()->user()->email }}</span>
                                </div>

                                <a href="{{ route('admin.profile.show') }}">Profil sozlamalari</a>
                                <a href="{{ route('admin.profile.show') }}#profile-password">Parolni almashtirish</a>
                                <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                                <a href="{{ route('admin.inquiries.index') }}">Murojaatlar</a>

                                <form method="POST" action="{{ route('admin.logout') }}">
                                    @csrf
                                    <button type="submit">Chiqish</button>
                                </form>
                            </div>
                        </details>
                    </div>
                </header>

                <main class="admin-main">
                    @if (session('status'))
                        <div class="admin-flash">{{ session('status') }}</div>
                    @endif

                    @yield('content')
                </main>

                <footer class="admin-shell-footer">
                    <div class="admin-shell-footer__brand">
                        <span class="admin-brand__mark" aria-hidden="true" style="width:2.5rem;height:2.5rem;">
                            <svg viewBox="0 0 72 72" fill="none" width="38" height="38">
                                <path d="M36 7L65 60H52L45.8 48.4H26.2L20 60H7L36 7Z" stroke="currentColor" stroke-linejoin="round" stroke-width="3" />
                                <path d="M36 22L46 60H26L36 22Z" stroke="currentColor" stroke-linejoin="round" stroke-width="3" />
                            </svg>
                        </span>
                        <span>© 2026 <strong>Gentech Admin.</strong> All rights reserved.</span>
                    </div>

                    <div class="admin-shell-footer__center">
                        <span class="admin-shell-footer__line"></span>
                        <span>Crafted with precision. Built for excellence.</span>
                        <span class="admin-shell-footer__line"></span>
                    </div>

                    <div class="admin-shell-footer__links">
                        <span>v1.0.0</span>
                        <span>•</span>
                        <a href="{{ route('admin.dashboard') }}">Privacy Policy</a>
                        <span>•</span>
                        <a href="{{ route('admin.dashboard') }}">Terms of Service</a>
                    </div>
                </footer>
            </div>
        </div>
    @else
        @yield('content')
    @endauth
</body>
</html>
