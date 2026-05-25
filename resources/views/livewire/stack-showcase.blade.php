<!DOCTYPE html>
<html lang="uz">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Mirsaar — SMM Mutaxassis</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,600;1,300;1,400&family=Syne:wght@400;500;600;700;800&family=DM+Sans:wght@300;400;500&display=swap" rel="stylesheet">
<style>
  *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
  
  :root {
    --gold: #C9A84C;
    --gold-light: #E8C97A;
    --gold-dim: #7A6130;
    --amber: #F0A500;
    --bg-void: #060608;
    --bg-dark: #0C0D10;
    --bg-panel: #11121A;
    --bg-card: #161820;
    --bg-glass: rgba(22,24,32,0.72);
    --border-gold: rgba(201,168,76,0.22);
    --border-subtle: rgba(255,255,255,0.06);
    --border-mid: rgba(255,255,255,0.1);
    --text-white: #F5F3EE;
    --text-muted: rgba(245,243,238,0.48);
    --text-dim: rgba(245,243,238,0.28);
    --accent-orange: #E8782A;
    --accent-glow: rgba(201,168,76,0.15);
    --font-display: 'Cormorant Garamond', serif;
    --font-ui: 'Syne', sans-serif;
    --font-body: 'DM Sans', sans-serif;
    --r-sm: 8px;
    --r-md: 14px;
    --r-lg: 22px;
    --r-xl: 32px;
    --shadow-gold: 0 0 60px rgba(201,168,76,0.12), 0 0 120px rgba(201,168,76,0.06);
    --shadow-card: 0 24px 80px rgba(0,0,0,0.6), 0 4px 20px rgba(0,0,0,0.4);
    --shadow-float: 0 40px 120px rgba(0,0,0,0.8), 0 8px 32px rgba(0,0,0,0.5);
  }

  html { scroll-behavior: smooth; }
  body {
    background: var(--bg-void);
    color: var(--text-white);
    font-family: var(--font-body);
    font-size: 16px;
    line-height: 1.65;
    overflow-x: hidden;
    -webkit-font-smoothing: antialiased;
  }

  /* ── NOISE OVERLAY ── */
  body::before {
    content: '';
    position: fixed; inset: 0;
    background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='0.04'/%3E%3C/svg%3E");
    pointer-events: none; z-index: 9999; opacity: 0.5;
  }

  /* ── NAV ── */
  .nav {
    position: fixed; top: 0; left: 0; right: 0; z-index: 1000;
    display: flex; align-items: center; justify-content: space-between;
    padding: 0 48px;
    height: 72px;
    background: rgba(6,6,8,0.7);
    backdrop-filter: blur(24px) saturate(1.4);
    border-bottom: 0.5px solid var(--border-gold);
  }
  .nav-brand {
    display: flex; align-items: center; gap: 14px;
    text-decoration: none; color: inherit;
  }
  .nav-logo {
    width: 38px; height: 38px;
    border: 1.5px solid var(--gold);
    border-radius: 50%;
    display: flex; align-items: center; justify-content: center;
    background: rgba(201,168,76,0.06);
    flex-shrink: 0;
  }
  .nav-logo svg { width: 22px; height: 22px; color: var(--gold); }
  .nav-brand-text strong {
    display: block;
    font-family: var(--font-ui);
    font-size: 15px; font-weight: 700;
    letter-spacing: 0.06em;
    color: var(--text-white);
  }
  .nav-brand-text small {
    font-size: 10px; letter-spacing: 0.12em; text-transform: uppercase;
    color: var(--gold); font-family: var(--font-body); font-weight: 300;
  }
  .nav-links { display: flex; align-items: center; gap: 36px; }
  .nav-links a {
    font-family: var(--font-ui); font-size: 12px; letter-spacing: 0.1em;
    text-transform: uppercase; text-decoration: none;
    color: var(--text-muted);
    transition: color 0.3s;
  }
  .nav-links a:hover { color: var(--gold); }
  .nav-side { display: flex; align-items: center; gap: 16px; }
  .nav-admin {
    font-family: var(--font-ui); font-size: 11px; letter-spacing: 0.1em;
    text-transform: uppercase; text-decoration: none;
    padding: 8px 20px;
    border: 1px solid var(--border-gold);
    border-radius: 100px;
    color: var(--gold);
    background: rgba(201,168,76,0.05);
    transition: all 0.3s;
  }
  .nav-admin:hover { background: rgba(201,168,76,0.14); border-color: var(--gold); }
  .lang-pill {
    font-family: var(--font-ui); font-size: 11px; letter-spacing: 0.1em;
    cursor: pointer; border: none;
    padding: 6px 12px; border-radius: 100px;
    background: transparent; color: var(--text-dim);
    transition: all 0.25s;
  }
  .lang-pill.is-active { color: var(--gold); background: rgba(201,168,76,0.1); }

  /* ── HERO ── */
  .hero {
    min-height: 100vh;
    position: relative;
    display: flex; align-items: center;
    padding: 140px 48px 80px;
    overflow: hidden;
  }

  /* Background orbs */
  .hero-bg {
    position: absolute; inset: 0; pointer-events: none;
  }
  .orb {
    position: absolute; border-radius: 50%;
    filter: blur(120px);
  }
  .orb-1 {
    width: 700px; height: 700px;
    background: radial-gradient(circle, rgba(201,168,76,0.12) 0%, transparent 70%);
    top: -200px; left: -200px;
    animation: orbFloat 12s ease-in-out infinite alternate;
  }
  .orb-2 {
    width: 500px; height: 500px;
    background: radial-gradient(circle, rgba(232,120,42,0.09) 0%, transparent 70%);
    top: 30%; right: -100px;
    animation: orbFloat 16s ease-in-out infinite alternate-reverse;
  }
  .orb-3 {
    width: 400px; height: 400px;
    background: radial-gradient(circle, rgba(201,168,76,0.07) 0%, transparent 70%);
    bottom: -100px; left: 40%;
    animation: orbFloat 10s ease-in-out infinite alternate;
  }
  @keyframes orbFloat {
    from { transform: translate(0,0) scale(1); }
    to   { transform: translate(40px,30px) scale(1.08); }
  }

  /* Grid lines */
  .hero-grid-lines {
    position: absolute; inset: 0;
    background-image:
      linear-gradient(rgba(201,168,76,0.03) 1px, transparent 1px),
      linear-gradient(90deg, rgba(201,168,76,0.03) 1px, transparent 1px);
    background-size: 80px 80px;
    mask-image: radial-gradient(ellipse 80% 80% at 50% 50%, black, transparent);
  }

  .hero-content {
    position: relative; z-index: 2;
    display: grid; grid-template-columns: 1fr 440px;
    gap: 80px; align-items: center;
    max-width: 1320px; margin: 0 auto; width: 100%;
  }

  .hero-eyebrow {
    display: inline-flex; align-items: center; gap: 10px;
    font-family: var(--font-ui); font-size: 11px; letter-spacing: 0.18em;
    text-transform: uppercase; color: var(--gold);
    margin-bottom: 28px;
    opacity: 0; animation: fadeUp 0.8s 0.2s forwards;
  }
  .eyebrow-dot {
    width: 6px; height: 6px; border-radius: 50%;
    background: var(--gold);
    box-shadow: 0 0 12px var(--gold);
    animation: pulse 2s ease-in-out infinite;
  }
  @keyframes pulse {
    0%,100% { opacity: 1; box-shadow: 0 0 8px var(--gold); }
    50% { opacity: 0.5; box-shadow: 0 0 20px var(--gold); }
  }

  .hero-title {
    font-family: var(--font-display);
    font-size: clamp(52px, 6vw, 88px);
    font-weight: 300;
    line-height: 1.0;
    letter-spacing: -0.01em;
    margin-bottom: 28px;
    opacity: 0; animation: fadeUp 0.8s 0.4s forwards;
  }
  .hero-title span { display: block; color: var(--text-white); }
  .hero-title em {
    display: block;
    font-style: italic;
    background: linear-gradient(135deg, var(--gold-light), var(--gold), var(--accent-orange));
    -webkit-background-clip: text; -webkit-text-fill-color: transparent;
    background-clip: text;
  }

  .hero-lead {
    font-size: 16px; line-height: 1.75;
    color: var(--text-muted);
    max-width: 520px;
    margin-bottom: 28px;
    font-weight: 300;
    opacity: 0; animation: fadeUp 0.8s 0.55s forwards;
  }

  .chips {
    display: flex; flex-wrap: wrap; gap: 8px;
    margin-bottom: 36px;
    opacity: 0; animation: fadeUp 0.8s 0.65s forwards;
  }
  .chip {
    font-family: var(--font-ui); font-size: 11px; letter-spacing: 0.08em;
    padding: 6px 14px; border-radius: 100px;
    border: 1px solid var(--border-gold);
    color: var(--gold); background: rgba(201,168,76,0.06);
  }

  .cta-row {
    display: flex; align-items: center; gap: 16px; flex-wrap: wrap;
    margin-bottom: 56px;
    opacity: 0; animation: fadeUp 0.8s 0.75s forwards;
  }

  .btn {
    display: inline-flex; align-items: center; gap: 10px;
    font-family: var(--font-ui); font-size: 12px; font-weight: 600;
    letter-spacing: 0.1em; text-transform: uppercase;
    text-decoration: none; border: none; cursor: pointer;
    padding: 14px 28px; border-radius: 100px;
    transition: all 0.35s cubic-bezier(0.16, 1, 0.3, 1);
    position: relative; overflow: hidden;
  }
  .btn::before {
    content: ''; position: absolute; inset: 0;
    background: linear-gradient(135deg, rgba(255,255,255,0.15), transparent);
    opacity: 0; transition: opacity 0.3s;
  }
  .btn:hover::before { opacity: 1; }

  .btn-primary {
    background: linear-gradient(135deg, var(--gold-light), var(--gold), #A87B2A);
    color: #0C0D10;
    box-shadow: 0 4px 24px rgba(201,168,76,0.35), 0 0 0 0 rgba(201,168,76,0.3);
  }
  .btn-primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 40px rgba(201,168,76,0.5), 0 0 60px rgba(201,168,76,0.2);
  }
  .btn-primary svg { width: 16px; height: 16px; }

  .btn-secondary {
    background: transparent;
    border: 1px solid var(--border-gold);
    color: var(--text-white);
  }
  .btn-secondary:hover {
    border-color: var(--gold);
    background: rgba(201,168,76,0.08);
    transform: translateY(-2px);
  }

  .btn-text {
    background: transparent; border: none;
    color: var(--text-muted); padding: 14px 0;
    font-size: 12px;
    text-decoration: underline; text-decoration-color: transparent;
  }
  .btn-text:hover { color: var(--gold); text-decoration-color: var(--gold); }

  .stats-grid {
    display: grid; grid-template-columns: repeat(3, 1fr); gap: 1px;
    background: var(--border-subtle);
    border: 1px solid var(--border-subtle);
    border-radius: var(--r-md);
    overflow: hidden;
    opacity: 0; animation: fadeUp 0.8s 0.9s forwards;
  }
  .stat-card {
    background: var(--bg-card);
    padding: 24px 20px;
    text-align: center;
    transition: background 0.3s;
  }
  .stat-card:hover { background: rgba(201,168,76,0.05); }
  .stat-value {
    font-family: var(--font-display);
    font-size: 36px; font-weight: 600;
    background: linear-gradient(135deg, var(--gold-light), var(--gold));
    -webkit-background-clip: text; -webkit-text-fill-color: transparent;
    background-clip: text; line-height: 1;
    margin-bottom: 6px;
  }
  .stat-label {
    font-size: 11px; letter-spacing: 0.08em;
    color: var(--text-muted); font-family: var(--font-ui);
    text-transform: uppercase;
  }

  @keyframes fadeUp {
    from { opacity: 0; transform: translateY(28px); }
    to   { opacity: 1; transform: translateY(0); }
  }

  /* ── PROFILE CARD ── */
  .profile-stage {
    position: relative;
    opacity: 0; animation: fadeUp 0.9s 0.5s forwards;
  }

  .profile-card {
    background: var(--bg-card);
    border: 1px solid var(--border-gold);
    border-radius: var(--r-xl);
    overflow: hidden;
    box-shadow: var(--shadow-float), var(--shadow-gold);
    position: relative;
  }
  .profile-card::before {
    content: '';
    position: absolute; top: 0; left: 0; right: 0; height: 1px;
    background: linear-gradient(90deg, transparent, var(--gold), transparent);
  }
  .profile-img {
    width: 100%; aspect-ratio: 4/3; object-fit: cover;
    display: block;
    background: linear-gradient(135deg, #1a1b22, #23242e);
  }
  .profile-img-fallback {
    width: 100%; aspect-ratio: 4/3;
    background: linear-gradient(135deg, #1a1b22 0%, #23242e 50%, #1a1b22 100%);
    display: flex; align-items: center; justify-content: center;
    font-family: var(--font-display);
    font-size: 96px; font-weight: 300;
    color: var(--gold-dim);
    letter-spacing: -0.04em;
  }
  .profile-body {
    padding: 24px 28px;
    background: linear-gradient(180deg, rgba(22,24,32,0) 0%, var(--bg-card) 30%);
    margin-top: -60px; position: relative;
    display: flex; flex-direction: column; gap: 4px;
  }
  .profile-label {
    font-family: var(--font-ui); font-size: 10px; letter-spacing: 0.14em;
    text-transform: uppercase; color: var(--gold); font-weight: 600;
  }
  .profile-name {
    font-family: var(--font-display); font-size: 24px; font-weight: 400;
    color: var(--text-white);
  }
  .profile-role { font-size: 13px; color: var(--text-muted); }

  .float-badge {
    position: absolute;
    background: var(--bg-glass);
    backdrop-filter: blur(20px);
    border: 1px solid var(--border-gold);
    border-radius: var(--r-lg);
    padding: 14px 20px;
    display: flex; align-items: center; gap: 14px;
    box-shadow: var(--shadow-card);
  }
  .float-badge-icon {
    width: 36px; height: 36px; border-radius: 10px;
    background: linear-gradient(135deg, var(--gold), #A87B2A);
    display: flex; align-items: center; justify-content: center;
    font-family: var(--font-ui); font-size: 11px; font-weight: 700;
    color: #0C0D10; flex-shrink: 0;
  }
  .float-badge-text strong { display: block; font-size: 13px; font-weight: 500; color: var(--text-white); }
  .float-badge-text small { font-size: 11px; color: var(--text-muted); }
  .float-top { top: -24px; right: -32px; }
  .float-bottom { bottom: 60px; left: -32px; }

  /* ── SECTION SHELL ── */
  .section { padding: 120px 48px; max-width: 1320px; margin: 0 auto; }

  .section-kicker {
    font-family: var(--font-ui); font-size: 10px; letter-spacing: 0.2em;
    text-transform: uppercase; color: var(--gold);
    display: inline-flex; align-items: center; gap: 10px;
    margin-bottom: 20px;
  }
  .section-kicker::before {
    content: ''; display: block;
    width: 32px; height: 1px; background: var(--gold);
  }

  /* ── BRAND SHOWCASE ── */
  .brand-showcase {
    position: relative; overflow: hidden;
    background: var(--bg-panel);
    border: 1px solid var(--border-gold);
    border-radius: var(--r-xl);
    padding: 80px;
    text-align: center;
    box-shadow: var(--shadow-gold);
  }
  .brand-showcase::before {
    content: '';
    position: absolute; top: 0; left: 0; right: 0; height: 1px;
    background: linear-gradient(90deg, transparent, var(--gold), transparent);
  }
  .showcase-logo {
    width: 72px; height: 72px; margin: 0 auto 36px;
    border: 2px solid var(--gold);
    border-radius: 50%;
    display: flex; align-items: center; justify-content: center;
    background: rgba(201,168,76,0.08);
    box-shadow: 0 0 60px rgba(201,168,76,0.2), inset 0 0 30px rgba(201,168,76,0.05);
  }
  .showcase-logo svg { width: 42px; height: 42px; color: var(--gold); }
  .showcase-tag {
    font-family: var(--font-ui); font-size: 10px; letter-spacing: 0.2em;
    text-transform: uppercase; color: var(--gold);
    margin-bottom: 20px; display: block;
  }
  .showcase-title {
    font-family: var(--font-display);
    font-size: clamp(48px, 5vw, 76px);
    font-weight: 300; line-height: 1.05;
    margin-bottom: 24px;
  }
  .showcase-title span { color: var(--text-white); }
  .showcase-title em {
    font-style: italic;
    background: linear-gradient(135deg, var(--gold-light), var(--gold), var(--accent-orange));
    -webkit-background-clip: text; -webkit-text-fill-color: transparent;
    background-clip: text;
  }
  .showcase-copy {
    max-width: 560px; margin: 0 auto 44px;
    font-size: 16px; line-height: 1.75;
    color: var(--text-muted); font-weight: 300;
  }
  .showcase-actions { display: flex; justify-content: center; gap: 14px; flex-wrap: wrap; }

  .brand-corner {
    position: absolute; opacity: 0.07;
    width: 100px; height: 100px;
  }
  .brand-corner svg { width: 100%; height: 100%; color: var(--gold); }
  .bc-tl { top: 20px; left: 20px; }
  .bc-tr { top: 20px; right: 20px; }
  .bc-bl { bottom: 20px; left: 20px; }
  .bc-br { bottom: 20px; right: 20px; }

  /* ── SERVICES ── */
  .services-section { padding: 120px 48px; }
  .services-wrapper { max-width: 1320px; margin: 0 auto; }
  .services-grid-layout {
    display: grid; grid-template-columns: 380px 1fr;
    gap: 80px; align-items: start;
  }
  .services-copy-title {
    font-family: var(--font-display);
    font-size: clamp(32px, 3vw, 44px);
    font-weight: 300; line-height: 1.2;
    margin-bottom: 20px;
  }
  .services-copy-lead {
    font-size: 15px; color: var(--text-muted);
    line-height: 1.75; font-weight: 300;
    margin-bottom: 36px;
  }
  .story-note {
    background: var(--bg-card);
    border: 1px solid var(--border-subtle);
    border-left: 3px solid var(--gold);
    border-radius: var(--r-md);
    padding: 20px 24px;
    font-size: 14px; color: var(--text-muted);
    line-height: 1.7;
    margin-bottom: 36px;
  }
  .metrics-row { display: grid; grid-template-columns: repeat(3, 1fr); gap: 1px; background: var(--border-subtle); border-radius: var(--r-md); overflow: hidden; }
  .metric-item { background: var(--bg-card); padding: 20px 16px; text-align: center; }
  .metric-val {
    font-family: var(--font-display); font-size: 28px; font-weight: 600;
    background: linear-gradient(135deg, var(--gold-light), var(--gold));
    -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;
  }
  .metric-lbl { font-size: 11px; color: var(--text-muted); margin-top: 4px; font-family: var(--font-ui); letter-spacing: 0.06em; }

  .service-cards { display: grid; grid-template-columns: repeat(2, 1fr); gap: 16px; }
  .service-card {
    background: var(--bg-card);
    border: 1px solid var(--border-subtle);
    border-radius: var(--r-lg);
    padding: 28px;
    position: relative; overflow: hidden;
    transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
    cursor: default;
  }
  .service-card::before {
    content: ''; position: absolute;
    top: 0; left: 0; right: 0; height: 1px;
    background: linear-gradient(90deg, transparent, rgba(201,168,76,0.3), transparent);
    opacity: 0; transition: opacity 0.3s;
  }
  .service-card:hover {
    border-color: var(--border-gold);
    transform: translateY(-4px);
    box-shadow: 0 20px 60px rgba(0,0,0,0.4), 0 0 40px rgba(201,168,76,0.06);
    background: rgba(22,24,32,0.95);
  }
  .service-card:hover::before { opacity: 1; }
  .service-card-top {
    display: flex; align-items: flex-start; justify-content: space-between;
    margin-bottom: 16px;
  }
  .service-icon {
    width: 44px; height: 44px; border-radius: 12px;
    background: linear-gradient(135deg, rgba(201,168,76,0.15), rgba(201,168,76,0.05));
    border: 1px solid var(--border-gold);
    display: flex; align-items: center; justify-content: center;
    font-family: var(--font-ui); font-size: 12px; font-weight: 700;
    color: var(--gold);
  }
  .service-price {
    font-family: var(--font-display); font-size: 20px; font-weight: 600;
    background: linear-gradient(135deg, var(--gold-light), var(--gold));
    -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;
  }
  .service-name {
    font-family: var(--font-ui); font-size: 15px; font-weight: 600;
    color: var(--text-white); margin-bottom: 10px;
  }
  .service-desc { font-size: 13px; color: var(--text-muted); line-height: 1.65; margin-bottom: 16px; }
  .service-benefit {
    display: inline-block;
    font-size: 11px; letter-spacing: 0.06em;
    padding: 5px 12px; border-radius: 100px;
    background: rgba(201,168,76,0.08); border: 1px solid var(--border-gold);
    color: var(--gold); font-family: var(--font-ui);
  }

  /* ── WORKS / PORTFOLIO ── */
  .works-section { padding: 120px 48px; background: var(--bg-dark); position: relative; }
  .works-section::before {
    content: ''; position: absolute; top: 0; left: 0; right: 0; height: 1px;
    background: linear-gradient(90deg, transparent, var(--border-gold), transparent);
  }
  .works-wrapper { max-width: 1320px; margin: 0 auto; }
  .works-header { text-align: center; margin-bottom: 72px; }
  .works-title {
    font-family: var(--font-display);
    font-size: clamp(48px, 5vw, 72px);
    font-weight: 300; letter-spacing: -0.01em;
    background: linear-gradient(135deg, var(--text-white) 40%, var(--gold));
    -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;
    margin-bottom: 16px;
  }
  .works-lead { font-size: 15px; color: var(--text-muted); max-width: 560px; margin: 0 auto; font-weight: 300; }

  /* Featured case */
  .feature-case {
    display: grid; grid-template-columns: 1fr 1fr;
    gap: 60px; align-items: center;
    background: var(--bg-card);
    border: 1px solid var(--border-gold);
    border-radius: var(--r-xl);
    padding: 56px;
    margin-bottom: 56px;
    position: relative; overflow: hidden;
    box-shadow: var(--shadow-gold);
  }
  .feature-case::before {
    content: ''; position: absolute;
    top: 0; left: 0; right: 0; height: 1px;
    background: linear-gradient(90deg, transparent, var(--gold), transparent);
  }
  .case-eyebrow {
    font-family: var(--font-ui); font-size: 10px; letter-spacing: 0.18em;
    text-transform: uppercase; color: var(--gold); margin-bottom: 16px;
    display: flex; align-items: center; gap: 8px;
  }
  .case-eyebrow::before { content: ''; display: block; width: 20px; height: 1px; background: var(--gold); }
  .case-title {
    font-family: var(--font-display);
    font-size: clamp(26px, 2.5vw, 36px); font-weight: 300;
    color: var(--text-white); margin-bottom: 16px; line-height: 1.2;
  }
  .case-lead { font-size: 14px; color: var(--text-muted); line-height: 1.75; margin-bottom: 24px; font-weight: 300; }
  .case-meta { display: flex; flex-wrap: wrap; gap: 10px; margin-bottom: 32px; }
  .case-tag {
    font-size: 11px; padding: 6px 14px; border-radius: 100px;
    border: 1px solid var(--border-gold); color: var(--gold);
    background: rgba(201,168,76,0.06); font-family: var(--font-ui);
  }
  .case-steps { display: flex; flex-direction: column; gap: 12px; }
  .case-step {
    background: rgba(255,255,255,0.03);
    border: 1px solid var(--border-subtle);
    border-radius: var(--r-md); padding: 16px 20px;
  }
  .case-step span {
    display: block; font-family: var(--font-ui); font-size: 10px;
    letter-spacing: 0.14em; text-transform: uppercase;
    color: var(--gold); margin-bottom: 6px;
  }
  .case-step p { font-size: 13px; color: var(--text-muted); line-height: 1.6; }
  .case-window {
    background: var(--bg-panel);
    border: 1px solid var(--border-subtle);
    border-radius: var(--r-lg); overflow: hidden;
    box-shadow: var(--shadow-card);
  }
  .case-window-bar {
    height: 38px; padding: 0 14px;
    display: flex; align-items: center; gap: 7px;
    background: rgba(255,255,255,0.03);
    border-bottom: 1px solid var(--border-subtle);
  }
  .case-window-bar span { width: 10px; height: 10px; border-radius: 50%; }
  .case-window-bar span:nth-child(1) { background: #FF5F57; }
  .case-window-bar span:nth-child(2) { background: #FEBC2E; }
  .case-window-bar span:nth-child(3) { background: #28C840; }
  .case-image-placeholder {
    width: 100%; aspect-ratio: 16/10;
    background: linear-gradient(135deg, #161820, #1e2030, #161820);
    display: flex; align-items: center; justify-content: center;
    font-family: var(--font-display); font-size: 64px; font-weight: 300;
    color: rgba(201,168,76,0.15);
    letter-spacing: -0.04em;
  }
  .case-image-placeholder img { width: 100%; height: 100%; object-fit: cover; }
  .case-badge {
    position: absolute; top: 40px; right: 40px;
    background: linear-gradient(135deg, var(--gold-light), var(--gold));
    color: #0C0D10;
    font-family: var(--font-ui); font-size: 10px; font-weight: 700;
    letter-spacing: 0.1em; text-transform: uppercase;
    padding: 8px 16px; border-radius: 100px;
    box-shadow: 0 4px 20px rgba(201,168,76,0.4);
  }

  /* Gallery marquee */
  .gallery-marquee { overflow: hidden; margin-bottom: 0; }
  .gallery-row { position: relative; margin-bottom: 20px; }
  .gallery-track {
    display: flex; gap: 20px;
    animation: marquee 30s linear infinite;
    width: max-content;
  }
  .gallery-row.is-reverse .gallery-track { animation-direction: reverse; }
  @keyframes marquee {
    from { transform: translateX(0); }
    to   { transform: translateX(-50%); }
  }
  .gallery-card {
    flex-shrink: 0; width: 360px;
    background: var(--bg-card);
    border: 1px solid var(--border-subtle);
    border-radius: var(--r-lg); overflow: hidden;
    transition: border-color 0.3s;
  }
  .gallery-card:hover { border-color: var(--border-gold); }
  .gallery-card-frame {
    width: 100%; aspect-ratio: 16/9; overflow: hidden;
    background: linear-gradient(135deg, #1a1b22, #1e2030);
    display: flex; align-items: center; justify-content: center;
  }
  .gallery-card-frame img { width: 100%; height: 100%; object-fit: cover; }
  .gallery-placeholder {
    font-family: var(--font-display); font-size: 48px; font-weight: 300;
    color: rgba(201,168,76,0.1); letter-spacing: -0.04em;
  }
  .gallery-caption { padding: 20px 22px; }
  .gallery-label {
    font-family: var(--font-ui); font-size: 10px; letter-spacing: 0.14em;
    text-transform: uppercase; color: var(--gold); margin-bottom: 6px;
  }
  .gallery-title { font-family: var(--font-ui); font-size: 14px; font-weight: 600; color: var(--text-white); margin-bottom: 10px; }
  .gallery-meta { display: flex; justify-content: space-between; align-items: center; }
  .gallery-niche { font-size: 12px; color: var(--text-muted); }
  .gallery-result { font-size: 12px; color: var(--gold); font-weight: 500; }

  /* ── CONTACTS ── */
  .contact-section { padding: 120px 48px; }
  .contact-wrapper { max-width: 1320px; margin: 0 auto; }
  .contact-header { margin-bottom: 56px; }
  .contact-title {
    font-family: var(--font-display);
    font-size: clamp(32px, 3.5vw, 52px); font-weight: 300;
    color: var(--text-white); margin-bottom: 16px; line-height: 1.15;
  }
  .contact-lead { font-size: 15px; color: var(--text-muted); max-width: 560px; font-weight: 300; line-height: 1.75; }
  .contact-cards { display: grid; grid-template-columns: repeat(auto-fit, minmax(240px, 1fr)); gap: 16px; }
  .contact-card {
    background: var(--bg-card);
    border: 1px solid var(--border-subtle);
    border-radius: var(--r-lg);
    padding: 28px;
    text-decoration: none;
    display: flex; align-items: flex-start; gap: 18px;
    transition: all 0.35s cubic-bezier(0.16, 1, 0.3, 1);
    position: relative; overflow: hidden;
  }
  .contact-card::before {
    content: ''; position: absolute;
    top: 0; left: 0; right: 0; height: 1px;
    background: linear-gradient(90deg, transparent, rgba(201,168,76,0.4), transparent);
    opacity: 0; transition: opacity 0.3s;
  }
  .contact-card:hover {
    border-color: var(--border-gold);
    transform: translateY(-4px);
    box-shadow: 0 20px 60px rgba(0,0,0,0.4), 0 0 40px rgba(201,168,76,0.06);
  }
  .contact-card:hover::before { opacity: 1; }
  .contact-avatar {
    width: 48px; height: 48px; border-radius: 14px; flex-shrink: 0;
    background: linear-gradient(135deg, rgba(201,168,76,0.2), rgba(201,168,76,0.05));
    border: 1px solid var(--border-gold);
    display: flex; align-items: center; justify-content: center;
    font-family: var(--font-ui); font-size: 14px; font-weight: 700;
    color: var(--gold);
  }
  .contact-role { font-size: 11px; letter-spacing: 0.1em; text-transform: uppercase; color: var(--gold); font-family: var(--font-ui); margin-bottom: 4px; }
  .contact-name { font-family: var(--font-ui); font-size: 14px; font-weight: 600; color: var(--text-white); margin-bottom: 4px; }
  .contact-value { font-size: 13px; color: var(--gold); font-weight: 500; margin-bottom: 4px; }
  .contact-meta { font-size: 12px; color: var(--text-muted); }

  /* ── REVIEWS ── */
  .reviews-section { padding: 120px 48px; background: var(--bg-dark); position: relative; }
  .reviews-section::before {
    content: ''; position: absolute; top: 0; left: 0; right: 0; height: 1px;
    background: linear-gradient(90deg, transparent, var(--border-gold), transparent);
  }
  .reviews-wrapper { max-width: 1320px; margin: 0 auto; }
  .reviews-head {
    display: flex; align-items: flex-end; justify-content: space-between;
    margin-bottom: 56px;
  }
  .reviews-title {
    font-family: var(--font-display);
    font-size: clamp(40px, 4vw, 60px); font-weight: 300; color: var(--text-white);
    margin-bottom: 12px;
  }
  .reviews-lead { font-size: 15px; color: var(--text-muted); max-width: 480px; font-weight: 300; }
  .reviews-controls { display: flex; gap: 10px; }
  .review-btn {
    width: 48px; height: 48px; border-radius: 50%;
    border: 1px solid var(--border-gold);
    background: rgba(201,168,76,0.04);
    color: var(--gold); cursor: pointer;
    display: flex; align-items: center; justify-content: center;
    transition: all 0.3s;
  }
  .review-btn:hover { background: rgba(201,168,76,0.14); border-color: var(--gold); }
  .review-btn svg { width: 20px; height: 20px; }

  .reviews-track-outer { overflow: hidden; }
  .reviews-track { display: flex; gap: 20px; transition: transform 0.6s cubic-bezier(0.16, 1, 0.3, 1); }
  .review-card {
    flex-shrink: 0; width: calc(33.333% - 14px);
    background: var(--bg-card);
    border: 1px solid var(--border-subtle);
    border-radius: var(--r-lg);
    padding: 36px;
    position: relative;
    transition: border-color 0.3s;
  }
  .review-card:hover { border-color: var(--border-gold); }
  .stars { display: flex; gap: 4px; margin-bottom: 20px; }
  .stars svg { width: 16px; height: 16px; color: var(--gold); }
  .review-quote-mark {
    position: absolute; top: 28px; right: 28px;
    font-family: var(--font-display); font-size: 72px; line-height: 1;
    font-weight: 600; color: rgba(201,168,76,0.1);
    pointer-events: none;
  }
  .review-text { font-size: 14px; color: var(--text-muted); line-height: 1.75; margin-bottom: 28px; font-style: italic; font-family: var(--font-display); font-size: 17px; }
  .review-author strong { display: block; font-size: 14px; font-weight: 500; color: var(--text-white); margin-bottom: 2px; }
  .review-author span { display: block; font-size: 12px; color: var(--gold); margin-bottom: 2px; }
  .review-author small { font-size: 11px; color: var(--text-dim); }
  .reviews-dots { display: flex; gap: 8px; justify-content: center; margin-top: 36px; }
  .dot {
    width: 8px; height: 8px; border-radius: 100px;
    background: var(--border-mid); cursor: pointer;
    transition: all 0.3s;
  }
  .dot.is-active { background: var(--gold); width: 24px; box-shadow: 0 0 12px rgba(201,168,76,0.5); }

  /* ── FORM / SUPPORT ── */
  .support-section { padding: 120px 48px; }
  .support-wrapper { max-width: 1320px; margin: 0 auto; }
  .support-layout {
    display: grid; grid-template-columns: 380px 1fr;
    gap: 80px; align-items: start;
  }
  .support-title {
    font-family: var(--font-display);
    font-size: clamp(28px, 2.8vw, 40px); font-weight: 300;
    color: var(--text-white); line-height: 1.2;
    margin-bottom: 20px;
  }
  .support-lead { font-size: 14px; color: var(--text-muted); line-height: 1.75; margin-bottom: 36px; font-weight: 300; }
  .support-points { display: flex; flex-direction: column; gap: 20px; }
  .support-point {
    padding-left: 20px;
    border-left: 2px solid rgba(201,168,76,0.3);
  }
  .support-point strong { display: block; font-size: 14px; font-weight: 500; color: var(--text-white); margin-bottom: 4px; }
  .support-point span { font-size: 13px; color: var(--text-muted); line-height: 1.6; }

  .form-card {
    background: var(--bg-card);
    border: 1px solid var(--border-gold);
    border-radius: var(--r-xl);
    padding: 48px;
    box-shadow: var(--shadow-gold);
    position: relative; overflow: hidden;
  }
  .form-card::before {
    content: ''; position: absolute;
    top: 0; left: 0; right: 0; height: 1px;
    background: linear-gradient(90deg, transparent, var(--gold), transparent);
  }
  .form-head { margin-bottom: 36px; }
  .form-head h3 {
    font-family: var(--font-display); font-size: 30px; font-weight: 300;
    color: var(--text-white); margin-bottom: 8px;
  }
  .form-head p { font-size: 13px; color: var(--text-muted); line-height: 1.65; }

  .form-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 16px; margin-bottom: 16px; }
  .field { display: flex; flex-direction: column; gap: 6px; }
  .field label {
    font-family: var(--font-ui); font-size: 10px; letter-spacing: 0.14em;
    text-transform: uppercase; color: var(--text-muted);
  }
  .field input, .field select, .field textarea {
    background: rgba(255,255,255,0.04);
    border: 1px solid var(--border-subtle);
    border-radius: var(--r-sm);
    padding: 12px 16px;
    font-family: var(--font-body); font-size: 14px;
    color: var(--text-white);
    transition: border-color 0.3s, box-shadow 0.3s;
    outline: none; width: 100%;
    appearance: none; -webkit-appearance: none;
  }
  .field input::placeholder, .field textarea::placeholder { color: var(--text-dim); }
  .field select option { background: var(--bg-card); color: var(--text-white); }
  .field input:focus, .field select:focus, .field textarea:focus {
    border-color: rgba(201,168,76,0.5);
    box-shadow: 0 0 0 3px rgba(201,168,76,0.08);
  }
  .field textarea { resize: vertical; min-height: 120px; }
  .field-full { grid-column: 1 / -1; }

  .form-success {
    background: rgba(40,200,64,0.08); border: 1px solid rgba(40,200,64,0.2);
    border-radius: var(--r-md); padding: 16px 20px;
    font-size: 14px; color: #28C840; margin-bottom: 20px;
  }

  /* ── FOOTER ── */
  footer {
    background: var(--bg-panel);
    border-top: 1px solid var(--border-gold);
    padding: 80px 48px 40px;
  }
  .footer-inner { max-width: 1320px; margin: 0 auto; }
  .footer-grid { display: grid; grid-template-columns: 1fr 200px 280px; gap: 60px; margin-bottom: 60px; }
  .footer-brand-link { display: flex; align-items: center; gap: 14px; text-decoration: none; color: inherit; margin-bottom: 20px; }
  .footer-mark { width: 36px; height: 36px; border: 1px solid var(--gold); border-radius: 50%; display: flex; align-items: center; justify-content: center; }
  .footer-mark svg { width: 20px; height: 20px; color: var(--gold); }
  .footer-brand-copy strong { display: block; font-family: var(--font-ui); font-size: 14px; font-weight: 700; letter-spacing: 0.06em; }
  .footer-brand-copy small { font-size: 10px; color: var(--gold); letter-spacing: 0.1em; text-transform: uppercase; font-weight: 300; }
  .footer-lead { font-size: 13px; color: var(--text-muted); line-height: 1.75; margin-bottom: 20px; font-weight: 300; }
  .footer-email { font-family: var(--font-ui); font-size: 13px; color: var(--gold); text-decoration: none; display: inline-block; padding: 8px 0; border-bottom: 1px solid rgba(201,168,76,0.3); transition: border-color 0.3s; }
  .footer-email:hover { border-color: var(--gold); }
  .footer-col-title { font-family: var(--font-ui); font-size: 10px; letter-spacing: 0.18em; text-transform: uppercase; color: var(--gold); margin-bottom: 20px; display: block; }
  .footer-links { display: flex; flex-direction: column; gap: 12px; }
  .footer-links a { font-size: 13px; color: var(--text-muted); text-decoration: none; transition: color 0.25s; }
  .footer-links a:hover { color: var(--gold); }
  .footer-contacts { display: flex; flex-direction: column; gap: 14px; }
  .footer-contact-item { display: flex; align-items: center; gap: 12px; text-decoration: none; }
  .footer-contact-icon { width: 34px; height: 34px; border-radius: 10px; border: 1px solid var(--border-subtle); background: rgba(255,255,255,0.03); display: flex; align-items: center; justify-content: center; flex-shrink: 0; }
  .footer-contact-icon svg { width: 16px; height: 16px; color: var(--gold); }
  .footer-contact-copy small { display: block; font-size: 10px; color: var(--text-dim); letter-spacing: 0.08em; text-transform: uppercase; margin-bottom: 2px; }
  .footer-contact-copy strong { display: block; font-size: 13px; color: var(--text-white); }
  .footer-bottom {
    padding-top: 28px;
    border-top: 1px solid var(--border-subtle);
    display: flex; align-items: center; justify-content: space-between;
    flex-wrap: wrap; gap: 12px;
  }
  .footer-bottom p { font-size: 12px; color: var(--text-dim); }
  .footer-pill {
    font-family: var(--font-ui); font-size: 10px; letter-spacing: 0.1em; text-transform: uppercase;
    padding: 6px 16px; border-radius: 100px;
    border: 1px solid var(--border-gold); color: var(--gold);
    background: rgba(201,168,76,0.04);
  }

  /* ── SCROLL REVEAL ── */
  .reveal {
    opacity: 0; transform: translateY(36px);
    transition: opacity 0.8s cubic-bezier(0.16, 1, 0.3, 1), transform 0.8s cubic-bezier(0.16, 1, 0.3, 1);
  }
  .reveal.is-visible { opacity: 1; transform: translateY(0); }
  .reveal-d1 { transition-delay: 0.1s; }
  .reveal-d2 { transition-delay: 0.2s; }
  .reveal-d3 { transition-delay: 0.3s; }
  .reveal-d4 { transition-delay: 0.4s; }

  /* ── DIVIDER ── */
  .gold-divider {
    height: 1px;
    background: linear-gradient(90deg, transparent, var(--border-gold), transparent);
    max-width: 1320px; margin: 0 auto;
  }

  /* ── SCROLL HINT ── */
  .scroll-hint {
    position: absolute; bottom: 36px; left: 50%; transform: translateX(-50%);
    display: flex; flex-direction: column; align-items: center; gap: 10px;
    font-family: var(--font-ui); font-size: 10px; letter-spacing: 0.16em;
    text-transform: uppercase; color: var(--text-dim);
    animation: scrollBounce 2s ease-in-out infinite;
  }
  .scroll-hint::before {
    content: '';
    width: 1px; height: 40px;
    background: linear-gradient(180deg, var(--gold), transparent);
  }
  @keyframes scrollBounce {
    0%,100% { transform: translateX(-50%) translateY(0); }
    50% { transform: translateX(-50%) translateY(8px); }
  }

  /* ── MOBILE ── */
  .mobile-menu {
    display: none; position: fixed; top: 72px; left: 0; right: 0; bottom: 0;
    background: rgba(6,6,8,0.95); backdrop-filter: blur(24px);
    z-index: 999; padding: 40px 32px;
    flex-direction: column; gap: 4px;
    border-top: 1px solid var(--border-gold);
  }
  .mobile-menu.open { display: flex; }
  .mobile-link {
    font-family: var(--font-ui); font-size: 24px; font-weight: 700;
    color: var(--text-muted); text-decoration: none;
    padding: 12px 0; border-bottom: 1px solid var(--border-subtle);
    transition: color 0.25s;
  }
  .mobile-link:hover, .mobile-link.admin { color: var(--gold); }
  .mobile-lang { display: flex; gap: 10px; margin-top: 20px; }
  .menu-toggle {
    display: none; background: transparent; border: none;
    color: var(--text-white); cursor: pointer; padding: 4px;
  }
  .menu-toggle svg { width: 24px; height: 24px; }

  @media (max-width: 1024px) {
    .nav { padding: 0 24px; }
    .nav-links { display: none; }
    .menu-toggle { display: flex; }
    .hero { padding: 120px 24px 80px; }
    .hero-content { grid-template-columns: 1fr; gap: 48px; }
    .profile-stage { display: none; }
    .section { padding: 80px 24px; }
    .services-section, .works-section, .contact-section, .reviews-section, .support-section { padding: 80px 24px; }
    .services-grid-layout { grid-template-columns: 1fr; gap: 48px; }
    .service-cards { grid-template-columns: 1fr; }
    .feature-case { grid-template-columns: 1fr; gap: 36px; padding: 36px; }
    .reviews-head { flex-direction: column; align-items: flex-start; gap: 20px; }
    .review-card { width: calc(100% - 0px); min-width: 280px; }
    .support-layout { grid-template-columns: 1fr; gap: 48px; }
    .form-grid { grid-template-columns: 1fr; }
    .footer-grid { grid-template-columns: 1fr; gap: 40px; }
    footer { padding: 60px 24px 32px; }
    .brand-showcase { padding: 48px 24px; }
    .stats-grid { grid-template-columns: repeat(3, 1fr); }
    .metrics-row { grid-template-columns: repeat(3, 1fr); }
  }
  @media (max-width: 600px) {
    .hero-title { font-size: 42px; }
    .stats-grid { grid-template-columns: 1fr; }
    .service-cards { grid-template-columns: 1fr; }
    .form-grid { grid-template-columns: 1fr; }
    .cta-row { flex-direction: column; align-items: flex-start; }
  }
</style>
</head>
<body>

<!-- NAV -->
<nav class="nav" id="nav">
  <a href="#home" class="nav-brand" aria-label="Mirsaar">
    <div class="nav-logo">
      <svg viewBox="0 0 64 64" fill="none">
        <circle cx="32" cy="32" r="29" stroke="currentColor" stroke-width="2.5"/>
        <path d="M18 39L28.5 22H35L25 42" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="3"/>
        <path d="M30 42L39 22H46L36.5 42" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="3"/>
      </svg>
    </div>
    <div class="nav-brand-text">
      <strong>Mirsaar</strong>
      <small>просто. точно. мощно.</small>
    </div>
  </a>
  <nav class="nav-links">
    <a href="#services">Xizmatlar</a>
    <a href="#projects">Keyslar</a>
    <a href="#contact">Kontakt</a>
    <a href="#reviews">Sharhlar</a>
    <a href="#support">Brief</a>
  </nav>
  <div class="nav-side">
    <a href="/admin/login" class="nav-admin">Admin</a>
    <button class="lang-pill is-active">UZ</button>
    <button class="lang-pill">RU</button>
    <button class="menu-toggle" id="menuToggle" aria-label="Menu">
      <svg viewBox="0 0 24 24" fill="none">
        <path d="M4 7H20" stroke="currentColor" stroke-linecap="round" stroke-width="2"/>
        <path d="M4 12H20" stroke="currentColor" stroke-linecap="round" stroke-width="2"/>
        <path d="M8 17H20" stroke="currentColor" stroke-linecap="round" stroke-width="2"/>
      </svg>
    </button>
  </div>
</nav>

<!-- MOBILE MENU -->
<div class="mobile-menu" id="mobileMenu">
  <a href="#services" class="mobile-link">Xizmatlar</a>
  <a href="#projects" class="mobile-link">Keyslar</a>
  <a href="#contact" class="mobile-link">Kontakt</a>
  <a href="#reviews" class="mobile-link">Sharhlar</a>
  <a href="#support" class="mobile-link">Brief</a>
  <a href="/admin/login" class="mobile-link admin">Admin panel</a>
  <div class="mobile-lang">
    <button class="lang-pill is-active">UZ</button>
    <button class="lang-pill">RU</button>
  </div>
</div>

<!-- HERO -->
<section class="hero" id="home">
  <div class="hero-bg">
    <div class="orb orb-1"></div>
    <div class="orb orb-2"></div>
    <div class="orb orb-3"></div>
    <div class="hero-grid-lines"></div>
  </div>

  <div class="hero-content">
    <div class="hero-copy">
      <div class="hero-eyebrow">
        <span class="eyebrow-dot"></span>
        SMM Mutaxassis / Social Media Growth System
      </div>

      <h1 class="hero-title">
        <span>Mirsaar</span>
        <em>digital</em>
      </h1>

      <p class="hero-lead">
        Instagram, TikTok va Telegram uchun strategiya, kontent, target reklama va analitika — 
        barchasi bitta aniq tizimda. Har bir qaror biznes maqsadga bog'liq.
      </p>

      <div class="chips">
        <span class="chip">Kontent strategiya</span>
        <span class="chip">Target reklama</span>
        <span class="chip">Reels & Stories</span>
        <span class="chip">Brand building</span>
        <span class="chip">Analitika</span>
      </div>

      <div class="cta-row">
        <a href="#support" class="btn btn-primary">
          Konsultatsiya
          <svg viewBox="0 0 24 24" fill="none">
            <path d="M7 17L17 7" stroke="currentColor" stroke-linecap="round" stroke-width="2"/>
            <path d="M9 7H17V15" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
          </svg>
        </a>
        <a href="#projects" class="btn btn-secondary">Keyslar</a>
        <a href="#services" class="btn btn-text">Xizmatlar →</a>
      </div>

      <div class="stats-grid">
        <article class="stat-card">
          <p class="stat-value">120+</p>
          <p class="stat-label">Mijozlar</p>
        </article>
        <article class="stat-card">
          <p class="stat-value">3.2M</p>
          <p class="stat-label">Umumiy Reach</p>
        </article>
        <article class="stat-card">
          <p class="stat-value">4.8★</p>
          <p class="stat-label">Reyting</p>
        </article>
      </div>
    </div>

    <!-- Profile card -->
    <div class="profile-stage">
      <article class="profile-card">
        <div class="profile-img-fallback">M</div>
        <div class="profile-body">
          <p class="profile-label">SMM growth system</p>
          <p class="profile-name">Mirsaar</p>
          <p class="profile-role">Social Media Mutaxassis</p>
        </div>
      </article>

      <div class="float-badge float-top">
        <div class="float-badge-icon">IG</div>
        <div class="float-badge-text">
          <strong>Kontent strategiya</strong>
          <small>post, reels, stories ritmi</small>
        </div>
      </div>

      <div class="float-badge float-bottom">
        <div class="float-badge-icon">ROI</div>
        <div class="float-badge-text">
          <strong>Lead va reach</strong>
          <small>analitika asosida o'sish</small>
        </div>
      </div>
    </div>
  </div>

  <div class="scroll-hint">portfolio va xizmatlar pastda</div>
</section>

<div class="gold-divider"></div>

<!-- BRAND SHOWCASE -->
<section style="padding: 120px 48px; background: var(--bg-dark);">
  <div class="section" style="padding: 0;">
    <article class="brand-showcase reveal">
      <div class="brand-corner bc-tl">
        <svg viewBox="0 0 64 64" fill="none"><circle cx="32" cy="32" r="29" stroke="currentColor" stroke-width="1.8"/><path d="M18 39L28.5 22H35L25 42" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.4"/><path d="M30 42L39 22H46L36.5 42" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.4"/></svg>
      </div>
      <div class="brand-corner bc-tr"><svg viewBox="0 0 64 64" fill="none"><circle cx="32" cy="32" r="29" stroke="currentColor" stroke-width="1.8"/><path d="M18 39L28.5 22H35L25 42" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.4"/><path d="M30 42L39 22H46L36.5 42" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.4"/></svg></div>
      <div class="brand-corner bc-bl"><svg viewBox="0 0 64 64" fill="none"><circle cx="32" cy="32" r="29" stroke="currentColor" stroke-width="1.8"/><path d="M18 39L28.5 22H35L25 42" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.4"/><path d="M30 42L39 22H46L36.5 42" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.4"/></svg></div>
      <div class="brand-corner bc-br"><svg viewBox="0 0 64 64" fill="none"><circle cx="32" cy="32" r="29" stroke="currentColor" stroke-width="1.8"/><path d="M18 39L28.5 22H35L25 42" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.4"/><path d="M30 42L39 22H46L36.5 42" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.4"/></svg></div>

      <div class="showcase-logo">
        <svg viewBox="0 0 64 64" fill="none"><circle cx="32" cy="32" r="29" stroke="currentColor" stroke-width="2.5"/><path d="M18 39L28.5 22H35L25 42" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="3"/><path d="M30 42L39 22H46L36.5 42" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="3"/></svg>
      </div>

      <span class="showcase-tag">nima uchun SMM bilan ishlashadi</span>

      <h2 class="showcase-title">
        <span>SMM</span>
        <em>growth</em>
      </h2>

      <p class="showcase-copy">
        Strategiya, kontent plan, reels, target reklama va analitika bitta ritmda ishlaydi.
        Har bir post va kampaniya biznes maqsadga ulanadi: reach, lead, sotuv yoki personal brand.
      </p>

      <div class="showcase-actions">
        <a href="#support" class="btn btn-primary">Konsultatsiya olish</a>
        <a href="#services" class="btn btn-secondary">Xizmatlar</a>
        <a href="#projects" class="btn btn-secondary" style="border-color: rgba(255,255,255,0.1); color: var(--text-muted);">Keyslar</a>
      </div>
    </article>
  </div>
</section>

<!-- SERVICES -->
<section class="services-section" id="services">
  <div class="services-wrapper">
    <div class="services-grid-layout">
      <div class="services-copy reveal">
        <p class="section-kicker">xizmatlar</p>
        <h2 class="services-copy-title">SMM strategiya, kontent va reklamani bitta aniq tizimga yig'amiz.</h2>
        <p class="services-copy-lead">
          Xizmatlar admin paneldan boshqariladi: nomi, narxi, icon kaliti, benefit va aktiv holati o'zgarsa, asosiy sahifa ham darhol yangilanadi.
        </p>
        <div class="story-note">
          Har bir xizmat biznes maqsadga bog'lanadi: reach, lead, sotuv, personal brand yoki auditoriya ishonchi.
        </div>
        <div class="metrics-row">
          <div class="metric-item">
            <div class="metric-val">120+</div>
            <div class="metric-lbl">Mijozlar</div>
          </div>
          <div class="metric-item">
            <div class="metric-val">3.2M</div>
            <div class="metric-lbl">Reach</div>
          </div>
          <div class="metric-item">
            <div class="metric-val">98%</div>
            <div class="metric-lbl">Mamnun</div>
          </div>
        </div>
      </div>

      <div class="service-cards reveal reveal-d2">
        <!-- Service cards rendered from admin — showing sample 4 -->
        <article class="service-card">
          <div class="service-card-top">
            <div class="service-icon">KO</div>
            <span class="service-price">$200/oy</span>
          </div>
          <h3 class="service-name">Kontent Strategiya</h3>
          <p class="service-desc">Oylik kontent plan, post kaloriy, stories va reels jadvaliga asoslangan to'liq strategiya.</p>
          <span class="service-benefit">Reach + Brand</span>
        </article>

        <article class="service-card">
          <div class="service-card-top">
            <div class="service-icon">TA</div>
            <span class="service-price">$300/oy</span>
          </div>
          <h3 class="service-name">Target Reklama</h3>
          <p class="service-desc">Facebook Ads va Instagram Ads orqali aniq auditoriyaga yo'naltirilgan kampaniyalar.</p>
          <span class="service-benefit">Leads + Sales</span>
        </article>

        <article class="service-card">
          <div class="service-card-top">
            <div class="service-icon">RE</div>
            <span class="service-price">$150/oy</span>
          </div>
          <h3 class="service-name">Reels Production</h3>
          <p class="service-desc">Viral reels va stories skript, montaj va publish — oyiga 8-12 video.</p>
          <span class="service-benefit">Viral Reach</span>
        </article>

        <article class="service-card">
          <div class="service-card-top">
            <div class="service-icon">AN</div>
            <span class="service-price">$100/oy</span>
          </div>
          <h3 class="service-name">Analitika & Hisobot</h3>
          <p class="service-desc">Har oyda to'liq analitika: reach, engagement, lead va ROI hisoboti.</p>
          <span class="service-benefit">Data-driven</span>
        </article>
      </div>
    </div>
  </div>
</section>

<!-- WORKS / PORTFOLIO -->
<section class="works-section" id="projects">
  <div class="works-wrapper">
    <div class="works-header reveal">
      <p class="section-kicker" style="justify-content: center;">keyslar / portfolio</p>
      <h2 class="works-title">SMM Case Study</h2>
      <p class="works-lead">Admin paneldan boshqariladigan portfolio: klient niche, oldingi holat, qilingan ish, platforma va natija.</p>
    </div>

    <!-- Featured case -->
    <div class="feature-case reveal reveal-d1">
      <div class="case-copy">
        <p class="case-eyebrow">Instagram / Featured Case</p>
        <h3 class="case-title">Beauty Salon — Followers'dan Sales'ga</h3>
        <p class="case-lead">3 oy davomida 0 dan 15,000 follower va oylik 40+ lead olgan kampaniya. Kontent + reklama + CRM integratsiyasi.</p>
        <div class="case-meta">
          <span class="case-tag">Beauty & Wellness</span>
          <span class="case-tag">Instagram</span>
          <span class="case-tag">+412% Reach</span>
        </div>
        <div class="case-steps">
          <article class="case-step">
            <span>Oldingi holat</span>
            <p>800 follower, kundalik post yo'q, reklama byudjeti sarflangan lekin natija yo'q.</p>
          </article>
          <article class="case-step">
            <span>Qilingan ish</span>
            <p>Oylik kontent plan, haftalik 3 reels, target reklama + stories funnel, CRM integratsiya.</p>
          </article>
        </div>
      </div>
      <div style="position: relative;">
        <div class="case-window">
          <div class="case-window-bar">
            <span></span><span></span><span></span>
          </div>
          <div class="case-image-placeholder">
            <span style="font-family: var(--font-display); font-size: 80px; font-weight: 300; color: rgba(201,168,76,0.1); letter-spacing: -0.04em;">IG</span>
          </div>
        </div>
        <div class="case-badge">+412% Reach</div>
      </div>
    </div>

    <!-- Marquee gallery -->
    <div class="gallery-marquee">
      <div class="gallery-row reveal">
        <div class="gallery-track" id="track1">
          <!-- Row 1 cards (duplicated in JS) -->
          <article class="gallery-card">
            <div class="gallery-card-frame"><div class="gallery-placeholder">TK</div></div>
            <div class="gallery-caption">
              <p class="gallery-label">TikTok</p>
              <h3 class="gallery-title">Restoran — Viral Content</h3>
              <div class="gallery-meta"><span class="gallery-niche">F&B</span><strong class="gallery-result">2.1M views</strong></div>
            </div>
          </article>
          <article class="gallery-card">
            <div class="gallery-card-frame"><div class="gallery-placeholder">IG</div></div>
            <div class="gallery-caption">
              <p class="gallery-label">Instagram</p>
              <h3 class="gallery-title">Fitnes Club — Lead Gen</h3>
              <div class="gallery-meta"><span class="gallery-niche">Health</span><strong class="gallery-result">+240 leads</strong></div>
            </div>
          </article>
          <article class="gallery-card">
            <div class="gallery-card-frame"><div class="gallery-placeholder">TG</div></div>
            <div class="gallery-caption">
              <p class="gallery-label">Telegram</p>
              <h3 class="gallery-title">Online Kurs — Subscriber</h3>
              <div class="gallery-meta"><span class="gallery-niche">Education</span><strong class="gallery-result">8,400 sub</strong></div>
            </div>
          </article>
          <article class="gallery-card">
            <div class="gallery-card-frame"><div class="gallery-placeholder">IG</div></div>
            <div class="gallery-caption">
              <p class="gallery-label">Instagram</p>
              <h3 class="gallery-title">Fashion Brand — Sales</h3>
              <div class="gallery-meta"><span class="gallery-niche">Fashion</span><strong class="gallery-result">×3.8 ROAS</strong></div>
            </div>
          </article>
          <article class="gallery-card">
            <div class="gallery-card-frame"><div class="gallery-placeholder">TK</div></div>
            <div class="gallery-caption">
              <p class="gallery-label">TikTok</p>
              <h3 class="gallery-title">Clinic — Brand Awareness</h3>
              <div class="gallery-meta"><span class="gallery-niche">Medical</span><strong class="gallery-result">1.5M reach</strong></div>
            </div>
          </article>
        </div>
      </div>

      <div class="gallery-row is-reverse reveal reveal-d2">
        <div class="gallery-track" id="track2">
          <article class="gallery-card">
            <div class="gallery-card-frame"><div class="gallery-placeholder">IG</div></div>
            <div class="gallery-caption">
              <p class="gallery-label">Instagram</p>
              <h3 class="gallery-title">Real Estate — Leads</h3>
              <div class="gallery-meta"><span class="gallery-niche">Property</span><strong class="gallery-result">+180 leads</strong></div>
            </div>
          </article>
          <article class="gallery-card">
            <div class="gallery-card-frame"><div class="gallery-placeholder">TG</div></div>
            <div class="gallery-caption">
              <p class="gallery-label">Telegram</p>
              <h3 class="gallery-title">Finance Coach — Community</h3>
              <div class="gallery-meta"><span class="gallery-niche">Finance</span><strong class="gallery-result">12K sub</strong></div>
            </div>
          </article>
          <article class="gallery-card">
            <div class="gallery-card-frame"><div class="gallery-placeholder">TK</div></div>
            <div class="gallery-caption">
              <p class="gallery-label">TikTok</p>
              <h3 class="gallery-title">Kids Brand — Viral</h3>
              <div class="gallery-meta"><span class="gallery-niche">Children</span><strong class="gallery-result">4.7M views</strong></div>
            </div>
          </article>
          <article class="gallery-card">
            <div class="gallery-card-frame"><div class="gallery-placeholder">IG</div></div>
            <div class="gallery-caption">
              <p class="gallery-label">Instagram</p>
              <h3 class="gallery-title">Photography — Portfolio</h3>
              <div class="gallery-meta"><span class="gallery-niche">Creative</span><strong class="gallery-result">+22K followers</strong></div>
            </div>
          </article>
          <article class="gallery-card">
            <div class="gallery-card-frame"><div class="gallery-placeholder">TG</div></div>
            <div class="gallery-caption">
              <p class="gallery-label">Telegram</p>
              <h3 class="gallery-title">Tech Blog — Growth</h3>
              <div class="gallery-meta"><span class="gallery-niche">Technology</span><strong class="gallery-result">6.2K sub</strong></div>
            </div>
          </article>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- CONTACTS -->
<section class="contact-section" id="contact">
  <div class="contact-wrapper">
    <div class="contact-header reveal">
      <p class="section-kicker">kontaktlar</p>
      <h2 class="contact-title">Qaysi kanal qulay bo'lsa,<br>shu yerdan bog'laning.</h2>
      <p class="contact-lead">Telegram, Instagram, WhatsApp, email va lokatsiya admin paneldagi kontakt sozlamalaridan olinadi. Konsultatsiya yoki brief uchun eng qulay kanalni tanlang.</p>
    </div>
    <div class="contact-cards">
      <a href="https://t.me/mirsaar" class="contact-card reveal">
        <div class="contact-avatar">TG</div>
        <div class="contact-copy">
          <p class="contact-role">Telegram</p>
          <h3 class="contact-name">Mirsaar SMM</h3>
          <strong class="contact-value">@mirsaar_smm</strong>
          <p class="contact-meta">Tezkor javob • 24/7</p>
        </div>
      </a>
      <a href="https://instagram.com/mirsaar" class="contact-card reveal reveal-d1">
        <div class="contact-avatar">IG</div>
        <div class="contact-copy">
          <p class="contact-role">Instagram</p>
          <h3 class="contact-name">Mirsaar SMM</h3>
          <strong class="contact-value">@mirsaar.smm</strong>
          <p class="contact-meta">Keyslar & Portfolio</p>
        </div>
      </a>
      <a href="https://wa.me/998900000000" class="contact-card reveal reveal-d2">
        <div class="contact-avatar">WA</div>
        <div class="contact-copy">
          <p class="contact-role">WhatsApp</p>
          <h3 class="contact-name">Mirsaar</h3>
          <strong class="contact-value">+998 90 000 00 00</strong>
          <p class="contact-meta">Brief & Konsultatsiya</p>
        </div>
      </a>
      <a href="mailto:hello@mirsaar.uz" class="contact-card reveal reveal-d3">
        <div class="contact-avatar">ML</div>
        <div class="contact-copy">
          <p class="contact-role">Email</p>
          <h3 class="contact-name">Mirsaar Studio</h3>
          <strong class="contact-value">hello@mirsaar.uz</strong>
          <p class="contact-meta">Rasmiy murojaat</p>
        </div>
      </a>
    </div>
  </div>
</section>

<div class="gold-divider" style="padding: 0 48px; max-width: 100%;"></div>

<!-- REVIEWS -->
<section class="reviews-section" id="reviews">
  <div class="reviews-wrapper">
    <div class="reviews-head reveal">
      <div>
        <p class="section-kicker">sharhlar</p>
        <h2 class="reviews-title">Mijozlar fikri</h2>
        <p class="reviews-lead">Har bir mijoz bilan ishlangan natija — bu shunchaki raqam emas, balki ishonch va aloqa.</p>
      </div>
      <div class="reviews-controls">
        <button class="review-btn" id="prevBtn">
          <svg viewBox="0 0 24 24" fill="none"><path d="M15 6L9 12L15 18" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/></svg>
        </button>
        <button class="review-btn" id="nextBtn">
          <svg viewBox="0 0 24 24" fill="none"><path d="M9 6L15 12L9 18" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/></svg>
        </button>
      </div>
    </div>

    <div class="reviews-track-outer">
      <div class="reviews-track" id="reviewsTrack">
        <div class="review-card">
          <div class="stars">
            <svg viewBox="0 0 24 24" fill="currentColor"><path d="M12 4L14.3 8.6L19.3 9.35L15.65 12.9L16.5 17.95L12 15.55L7.5 17.95L8.35 12.9L4.7 9.35L9.7 8.6L12 4Z"/></svg>
            <svg viewBox="0 0 24 24" fill="currentColor"><path d="M12 4L14.3 8.6L19.3 9.35L15.65 12.9L16.5 17.95L12 15.55L7.5 17.95L8.35 12.9L4.7 9.35L9.7 8.6L12 4Z"/></svg>
            <svg viewBox="0 0 24 24" fill="currentColor"><path d="M12 4L14.3 8.6L19.3 9.35L15.65 12.9L16.5 17.95L12 15.55L7.5 17.95L8.35 12.9L4.7 9.35L9.7 8.6L12 4Z"/></svg>
            <svg viewBox="0 0 24 24" fill="currentColor"><path d="M12 4L14.3 8.6L19.3 9.35L15.65 12.9L16.5 17.95L12 15.55L7.5 17.95L8.35 12.9L4.7 9.35L9.7 8.6L12 4Z"/></svg>
            <svg viewBox="0 0 24 24" fill="currentColor"><path d="M12 4L14.3 8.6L19.3 9.35L15.65 12.9L16.5 17.95L12 15.55L7.5 17.95L8.35 12.9L4.7 9.35L9.7 8.6L12 4Z"/></svg>
          </div>
          <span class="review-quote-mark">❝</span>
          <p class="review-text">Mirsaar bilan ishlash bizning Instagram'imizni to'liq o'zgartirdi. 3 oy ichida 15,000 follower va har oylik 40+ lead — bu kutganimizdan ancha yuqori natija.</p>
          <div class="review-author">
            <strong>Aziza Karimova</strong>
            <span>Beauty Palace Salon</span>
            <small>2024-yil, Noyabr</small>
          </div>
        </div>

        <div class="review-card">
          <div class="stars">
            <svg viewBox="0 0 24 24" fill="currentColor"><path d="M12 4L14.3 8.6L19.3 9.35L15.65 12.9L16.5 17.95L12 15.55L7.5 17.95L8.35 12.9L4.7 9.35L9.7 8.6L12 4Z"/></svg>
            <svg viewBox="0 0 24 24" fill="currentColor"><path d="M12 4L14.3 8.6L19.3 9.35L15.65 12.9L16.5 17.95L12 15.55L7.5 17.95L8.35 12.9L4.7 9.35L9.7 8.6L12 4Z"/></svg>
            <svg viewBox="0 0 24 24" fill="currentColor"><path d="M12 4L14.3 8.6L19.3 9.35L15.65 12.9L16.5 17.95L12 15.55L7.5 17.95L8.35 12.9L4.7 9.35L9.7 8.6L12 4Z"/></svg>
            <svg viewBox="0 0 24 24" fill="currentColor"><path d="M12 4L14.3 8.6L19.3 9.35L15.65 12.9L16.5 17.95L12 15.55L7.5 17.95L8.35 12.9L4.7 9.35L9.7 8.6L12 4Z"/></svg>
            <svg viewBox="0 0 24 24" fill="currentColor"><path d="M12 4L14.3 8.6L19.3 9.35L15.65 12.9L16.5 17.95L12 15.55L7.5 17.95L8.35 12.9L4.7 9.35L9.7 8.6L12 4Z"/></svg>
          </div>
          <span class="review-quote-mark">❝</span>
          <p class="review-text">TikTok'da reels strategiyasi bizning restoran uchun 2.1 million ko'rishga olib keldi. Reklama va kontent birgalikda ishlashini birinchi marta his qildim.</p>
          <div class="review-author">
            <strong>Jasur Toshmatov</strong>
            <span>Diyor Restaurant</span>
            <small>2024-yil, Oktyabr</small>
          </div>
        </div>

        <div class="review-card">
          <div class="stars">
            <svg viewBox="0 0 24 24" fill="currentColor"><path d="M12 4L14.3 8.6L19.3 9.35L15.65 12.9L16.5 17.95L12 15.55L7.5 17.95L8.35 12.9L4.7 9.35L9.7 8.6L12 4Z"/></svg>
            <svg viewBox="0 0 24 24" fill="currentColor"><path d="M12 4L14.3 8.6L19.3 9.35L15.65 12.9L16.5 17.95L12 15.55L7.5 17.95L8.35 12.9L4.7 9.35L9.7 8.6L12 4Z"/></svg>
            <svg viewBox="0 0 24 24" fill="currentColor"><path d="M12 4L14.3 8.6L19.3 9.35L15.65 12.9L16.5 17.95L12 15.55L7.5 17.95L8.35 12.9L4.7 9.35L9.7 8.6L12 4Z"/></svg>
            <svg viewBox="0 0 24 24" fill="currentColor"><path d="M12 4L14.3 8.6L19.3 9.35L15.65 12.9L16.5 17.95L12 15.55L7.5 17.95L8.35 12.9L4.7 9.35L9.7 8.6L12 4Z"/></svg>
            <svg viewBox="0 0 24 24" fill="currentColor"><path d="M12 4L14.3 8.6L19.3 9.35L15.65 12.9L16.5 17.95L12 15.55L7.5 17.95L8.35 12.9L4.7 9.35L9.7 8.6L12 4Z"/></svg>
          </div>
          <span class="review-quote-mark">❝</span>
          <p class="review-text">Online kursimiz uchun Telegram kanalini 8,400 ga olib keldi va bu orqali har oyda $3,000+ daromad qilyapmiz. Analitika va strategiya juda aniq.</p>
          <div class="review-author">
            <strong>Malika Yusupova</strong>
            <span>ProLearn Academy</span>
            <small>2024-yil, Sentyabr</small>
          </div>
        </div>

        <div class="review-card">
          <div class="stars">
            <svg viewBox="0 0 24 24" fill="currentColor"><path d="M12 4L14.3 8.6L19.3 9.35L15.65 12.9L16.5 17.95L12 15.55L7.5 17.95L8.35 12.9L4.7 9.35L9.7 8.6L12 4Z"/></svg>
            <svg viewBox="0 0 24 24" fill="currentColor"><path d="M12 4L14.3 8.6L19.3 9.35L15.65 12.9L16.5 17.95L12 15.55L7.5 17.95L8.35 12.9L4.7 9.35L9.7 8.6L12 4Z"/></svg>
            <svg viewBox="0 0 24 24" fill="currentColor"><path d="M12 4L14.3 8.6L19.3 9.35L15.65 12.9L16.5 17.95L12 15.55L7.5 17.95L8.35 12.9L4.7 9.35L9.7 8.6L12 4Z"/></svg>
            <svg viewBox="0 0 24 24" fill="currentColor"><path d="M12 4L14.3 8.6L19.3 9.35L15.65 12.9L16.5 17.95L12 15.55L7.5 17.95L8.35 12.9L4.7 9.35L9.7 8.6L12 4Z"/></svg>
            <svg viewBox="0 0 24 24" fill="currentColor"><path d="M12 4L14.3 8.6L19.3 9.35L15.65 12.9L16.5 17.95L12 15.55L7.5 17.95L8.35 12.9L4.7 9.35L9.7 8.6L12 4Z"/></svg>
          </div>
          <span class="review-quote-mark">❝</span>
          <p class="review-text">Fashion brendimiz uchun Instagram ads + kontent kombinatsiyasida ROAS 3.8x ga yetkazildi. Har bir xarajat o'z samarasini berdi.</p>
          <div class="review-author">
            <strong>Sherzod Nazarov</strong>
            <span>UrbanStyle Brand</span>
            <small>2024-yil, Avgust</small>
          </div>
        </div>
      </div>
    </div>
    <div class="reviews-dots" id="reviewsDots"></div>
  </div>
</section>

<!-- SUPPORT / FORM -->
<section class="support-section" id="support">
  <div class="support-wrapper">
    <div class="support-layout">
      <div class="support-copy reveal">
        <p class="section-kicker">murojaat formasi</p>
        <h2 class="support-title">SMM briefni to'ldiring, murojaat admin panelga tushadi.</h2>
        <p class="support-lead">Ism, telefon, biznes niche, kerakli platforma, asosiy maqsad va byudjetni yuboring. Admin panelda har bir murojaat status bilan kuzatiladi.</p>
        <div class="support-points">
          <div class="support-point">
            <strong>Platforma aniq</strong>
            <span>Instagram, TikTok yoki Telegram bo'yicha ehtiyoj alohida saqlanadi.</span>
          </div>
          <div class="support-point">
            <strong>Maqsad aniq</strong>
            <span>Followers, sales, leads yoki brand awareness admin panelda ko'rinadi.</span>
          </div>
          <div class="support-point">
            <strong>Brief tayyor</strong>
            <span>Byudjet va izoh bilan lead keyingi suhbatga tayyor bo'ladi.</span>
          </div>
        </div>
      </div>

      <div class="form-card reveal reveal-d2" id="contact-form">
        <div class="form-head">
          <p class="section-kicker">brief form</p>
          <h3>Murojaat qoldiring</h3>
          <p>Xizmat turini tanlang, kontakt qoldiring va loyiha haqida yozing.</p>
        </div>

        <div class="form-grid">
          <div class="field">
            <label>Xizmat turi</label>
            <select>
              <option value="">Tanlang</option>
              <option>Kontent Strategiya</option>
              <option>Target Reklama</option>
              <option>Reels Production</option>
              <option>Analitika & Hisobot</option>
            </select>
          </div>
          <div class="field">
            <label>Ism</label>
            <input type="text" placeholder="Ismingiz">
          </div>
          <div class="field">
            <label>Telefon</label>
            <input type="text" placeholder="+998 90 700 00 00">
          </div>
          <div class="field">
            <label>Biznes / niche</label>
            <input type="text" placeholder="Beauty salon, kurs, cafe...">
          </div>
          <div class="field">
            <label>Platforma</label>
            <select>
              <option>Instagram</option>
              <option>TikTok</option>
              <option>Telegram</option>
            </select>
          </div>
          <div class="field">
            <label>Maqsad</label>
            <select>
              <option>Followers</option>
              <option>Sales</option>
              <option>Leads</option>
              <option>Brand awareness</option>
            </select>
          </div>
          <div class="field">
            <label>Qulay aloqa</label>
            <select>
              <option>Telefon</option>
              <option>Telegram</option>
              <option>Email</option>
            </select>
          </div>
          <div class="field">
            <label>Byudjet</label>
            <input type="text" placeholder="Masalan: 300$ dan">
          </div>
          <div class="field field-full">
            <label>Email</label>
            <input type="email" placeholder="ixtiyoriy">
          </div>
        </div>

        <div class="field" style="margin-bottom: 16px;">
          <label>Izoh</label>
          <textarea rows="5" placeholder="Biznesingiz, hozirgi holat va kutayotgan natijangizni yozing."></textarea>
        </div>
        <div class="field" style="margin-bottom: 28px;">
          <label>Qo'shimcha eslatma</label>
          <textarea rows="3" placeholder="Ixtiyoriy"></textarea>
        </div>

        <button type="submit" class="btn btn-primary" style="width: 100%; justify-content: center; border-radius: 12px; padding: 16px;">
          Yuborish
          <svg viewBox="0 0 24 24" fill="none" style="width:18px;height:18px;">
            <path d="M7 17L17 7" stroke="currentColor" stroke-linecap="round" stroke-width="2"/>
            <path d="M9 7H17V15" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
          </svg>
        </button>
      </div>
    </div>
  </div>
</section>

<!-- FOOTER -->
<footer id="footer">
  <div class="footer-inner">
    <div class="footer-grid">
      <div>
        <a href="#home" class="footer-brand-link">
          <div class="footer-mark">
            <svg viewBox="0 0 64 64" fill="none"><circle cx="32" cy="32" r="29" stroke="currentColor" stroke-width="2.5"/><path d="M18 39L28.5 22H35L25 42" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="3"/><path d="M30 42L39 22H46L36.5 42" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="3"/></svg>
          </div>
          <div class="footer-brand-copy">
            <strong>Mirsaar</strong>
            <small>SMM mutaxassis vizitkasi</small>
          </div>
        </a>
        <p class="footer-lead">Instagram, TikTok va Telegram uchun strategiya, kontent, target reklama va analitika. Xizmatlar, keyslar, kontaktlar va murojaatlar admin paneldan boshqariladi.</p>
        <a href="mailto:hello@mirsaar.uz" class="footer-email">hello@mirsaar.uz</a>
      </div>

      <div>
        <span class="footer-col-title">menu</span>
        <nav class="footer-links">
          <a href="#home">Bosh sahifa</a>
          <a href="#services">Xizmatlar</a>
          <a href="#projects">Keyslar</a>
          <a href="#contact">Kontakt</a>
          <a href="#reviews">Sharhlar</a>
          <a href="#support">Brief</a>
        </nav>
      </div>

      <div>
        <span class="footer-col-title">kontakt</span>
        <div class="footer-contacts">
          <a href="mailto:hello@mirsaar.uz" class="footer-contact-item">
            <div class="footer-contact-icon">
              <svg viewBox="0 0 24 24" fill="none"><path d="M4 7H20V17H4V7Z" stroke="currentColor" stroke-linejoin="round" stroke-width="1.8"/><path d="M5 8L12 13L19 8" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"/></svg>
            </div>
            <div class="footer-contact-copy">
              <small>Email</small>
              <strong>hello@mirsaar.uz</strong>
            </div>
          </a>
          <a href="https://t.me/mirsaar" class="footer-contact-item">
            <div class="footer-contact-icon">
              <svg viewBox="0 0 24 24" fill="none"><path d="M12 3L19 6V11.8C19 15.1 16.9 18.1 12 21C7.1 18.1 5 15.1 5 11.8V6L12 3Z" stroke="currentColor" stroke-linejoin="round" stroke-width="1.8"/><path d="M9.4 11.8L11.3 13.7L14.8 10.2" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"/></svg>
            </div>
            <div class="footer-contact-copy">
              <small>Telegram</small>
              <strong>@mirsaar_smm</strong>
            </div>
          </a>
        </div>
      </div>
    </div>

    <div class="footer-bottom">
      <p>© 2025 Mirsaar. Barcha huquqlar himoyalangan.</p>
      <span class="footer-pill">Premium SMM Studio</span>
    </div>
  </div>
</footer>

<script>
  // Mobile menu
  const toggle = document.getElementById('menuToggle');
  const menu = document.getElementById('mobileMenu');
  toggle.addEventListener('click', () => menu.classList.toggle('open'));
  menu.querySelectorAll('a').forEach(a => a.addEventListener('click', () => menu.classList.remove('open')));

  // Scroll reveal
  const revealEls = document.querySelectorAll('.reveal');
  const observer = new IntersectionObserver((entries) => {
    entries.forEach(e => { if (e.isIntersecting) { e.target.classList.add('is-visible'); observer.unobserve(e.target); } });
  }, { threshold: 0.12, rootMargin: '0px 0px -40px 0px' });
  revealEls.forEach(el => observer.observe(el));

  // Reviews slider
  const track = document.getElementById('reviewsTrack');
  const cards = track.querySelectorAll('.review-card');
  const dotsContainer = document.getElementById('reviewsDots');
  let current = 0;
  const visibleCount = window.innerWidth < 768 ? 1 : 3;
  const total = cards.length;
  const maxIndex = total - visibleCount;

  cards.forEach((_, i) => {
    const d = document.createElement('div');
    d.className = 'dot' + (i === 0 ? ' is-active' : '');
    d.addEventListener('click', () => goTo(i));
    dotsContainer.appendChild(d);
  });

  function goTo(idx) {
    current = Math.max(0, Math.min(idx, maxIndex));
    const w = cards[0].offsetWidth + 20;
    track.style.transform = `translateX(-${current * w}px)`;
    dotsContainer.querySelectorAll('.dot').forEach((d, i) => d.classList.toggle('is-active', i === current));
  }

  document.getElementById('prevBtn').addEventListener('click', () => goTo(current - 1));
  document.getElementById('nextBtn').addEventListener('click', () => goTo(current + 1));

  // Auto-advance
  setInterval(() => goTo(current >= maxIndex ? 0 : current + 1), 5000);

  // Duplicate marquee cards
  ['track1', 'track2'].forEach(id => {
    const t = document.getElementById(id);
    if (!t) return;
    const clone = t.innerHTML;
    t.innerHTML = clone + clone;
  });

  // Nav bg on scroll
  const nav = document.getElementById('nav');
  window.addEventListener('scroll', () => {
    nav.style.background = window.scrollY > 60 ? 'rgba(6,6,8,0.92)' : 'rgba(6,6,8,0.7)';
  });

  // Parallax orbs
  window.addEventListener('mousemove', e => {
    const x = (e.clientX / window.innerWidth - 0.5) * 30;
    const y = (e.clientY / window.innerHeight - 0.5) * 20;
    document.querySelectorAll('.orb').forEach((orb, i) => {
      const factor = (i + 1) * 0.4;
      orb.style.transform = `translate(${x * factor}px, ${y * factor}px)`;
    });
  });
</script>
</body>
</html>
