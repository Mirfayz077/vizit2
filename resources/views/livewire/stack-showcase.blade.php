
<div class="stack-showcase-page">
<style>
  @import url('https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@300;400;500;600;700&family=DM+Sans:wght@300;400;500;600;700&family=Syne:wght@400;500;600;700;800&display=swap');
  *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
  
  :root {
    --gold: #D4AF37;
    --gold-light: #F3D56B;
    --gold-dim: #8A6A1F;
    --amber: #B5121B;
    --bg-void: #080304;
    --bg-dark: #120507;
    --bg-panel: #18080B;
    --bg-card: #1E0B0F;
    --bg-glass: rgba(30,11,15,0.74);
    --border-gold: rgba(212,175,55,0.30);
    --border-subtle: rgba(255,255,255,0.06);
    --border-mid: rgba(255,255,255,0.1);
    --text-white: #F5F3EE;
    --text-muted: rgba(245,243,238,0.48);
    --text-dim: rgba(245,243,238,0.28);
    --accent-orange: #B5121B;
    --accent-glow: rgba(181,18,27,0.18);
    --font-display: 'Cormorant Garamond', serif;
    --font-ui: 'Syne', sans-serif;
    --font-body: 'DM Sans', sans-serif;
    --r-sm: 8px;
    --r-md: 14px;
    --r-lg: 22px;
    --r-xl: 32px;
    --shadow-gold: 0 0 60px rgba(212,175,55,0.16), 0 0 120px rgba(181,18,27,0.10);
    --shadow-card: 0 24px 80px rgba(0,0,0,0.6), 0 4px 20px rgba(0,0,0,0.4);
    --shadow-float: 0 40px 120px rgba(0,0,0,0.8), 0 8px 32px rgba(0,0,0,0.5);
  }

  html { scroll-behavior: smooth; }
  .mirsaar-page {
    min-height: 100vh;
    position: relative;
    isolation: isolate;
    background: var(--bg-void);
    color: var(--text-white);
    font-family: var(--font-body);
    font-size: 16px;
    line-height: 1.65;
    overflow-x: hidden;
    -webkit-font-smoothing: antialiased;
  }

  /* ── NOISE OVERLAY ── */
  .mirsaar-page::before {
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
    background: rgba(181,18,27,0.10);
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
    background: rgba(181,18,27,0.09);
    transition: all 0.3s;
  }
  .nav-admin:hover { background: rgba(181,18,27,0.18); border-color: var(--gold); }
  .lang-pill {
    font-family: var(--font-ui); font-size: 11px; letter-spacing: 0.1em;
    cursor: pointer; border: none;
    padding: 6px 12px; border-radius: 100px;
    background: transparent; color: var(--text-dim);
    transition: all 0.25s;
  }
  .lang-pill.is-active { color: var(--gold); background: rgba(181,18,27,0.14); }

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
    background: radial-gradient(circle, rgba(181,18,27,0.16) 0%, transparent 70%);
    top: -200px; left: -200px;
    animation: orbFloat 12s ease-in-out infinite alternate;
  }
  .orb-2 {
    width: 500px; height: 500px;
    background: radial-gradient(circle, rgba(212,175,55,0.12) 0%, transparent 70%);
    top: 30%; right: -100px;
    animation: orbFloat 16s ease-in-out infinite alternate-reverse;
  }
  .orb-3 {
    width: 400px; height: 400px;
    background: radial-gradient(circle, rgba(181,18,27,0.12) 0%, transparent 70%);
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
      linear-gradient(rgba(212,175,55,0.04) 1px, transparent 1px),
      linear-gradient(90deg, rgba(212,175,55,0.04) 1px, transparent 1px);
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
    color: var(--gold); background: rgba(181,18,27,0.10);
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
    background: linear-gradient(135deg, var(--gold-light), var(--gold), #8B0F17);
    color: #0C0D10;
    box-shadow: 0 4px 24px rgba(181,18,27,0.38), 0 0 0 0 rgba(212,175,55,0.36);
  }
  .btn-primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 40px rgba(212,175,55,0.52), 0 0 60px rgba(212,175,55,0.24);
  }
  .btn-primary svg { width: 16px; height: 16px; }

  .btn-secondary {
    background: transparent;
    border: 1px solid var(--border-gold);
    color: var(--text-white);
  }
  .btn-secondary:hover {
    border-color: var(--gold);
    background: rgba(181,18,27,0.14);
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
  .stat-card:hover { background: rgba(181,18,27,0.09); }
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
    background: linear-gradient(135deg, var(--gold), #8B0F17);
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
    background: rgba(181,18,27,0.14);
    box-shadow: 0 0 60px rgba(212,175,55,0.24), inset 0 0 30px rgba(181,18,27,0.09);
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
    background: linear-gradient(90deg, transparent, rgba(212,175,55,0.36), transparent);
    opacity: 0; transition: opacity 0.3s;
  }
  .service-card:hover {
    border-color: var(--border-gold);
    transform: translateY(-4px);
    box-shadow: 0 20px 60px rgba(0,0,0,0.4), 0 0 40px rgba(181,18,27,0.10);
    background: rgba(22,24,32,0.95);
  }
  .service-card:hover::before { opacity: 1; }
  .service-card-top {
    display: flex; align-items: flex-start; justify-content: space-between;
    margin-bottom: 16px;
  }
  .service-icon {
    width: 44px; height: 44px; border-radius: 12px;
    background: linear-gradient(135deg, rgba(181,18,27,0.16), rgba(181,18,27,0.09));
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
    background: rgba(181,18,27,0.14); border: 1px solid var(--border-gold);
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
    background: rgba(181,18,27,0.10); font-family: var(--font-ui);
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
    color: rgba(181,18,27,0.16);
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
    box-shadow: 0 4px 20px rgba(212,175,55,0.42);
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
    color: rgba(181,18,27,0.14); letter-spacing: -0.04em;
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
    background: linear-gradient(90deg, transparent, rgba(212,175,55,0.42), transparent);
    opacity: 0; transition: opacity 0.3s;
  }
  .contact-card:hover {
    border-color: var(--border-gold);
    transform: translateY(-4px);
    box-shadow: 0 20px 60px rgba(0,0,0,0.4), 0 0 40px rgba(181,18,27,0.10);
  }
  .contact-card:hover::before { opacity: 1; }
  .contact-avatar {
    width: 48px; height: 48px; border-radius: 14px; flex-shrink: 0;
    background: linear-gradient(135deg, rgba(212,175,55,0.24), rgba(181,18,27,0.09));
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
    background: rgba(181,18,27,0.08);
    color: var(--gold); cursor: pointer;
    display: flex; align-items: center; justify-content: center;
    transition: all 0.3s;
  }
  .review-btn:hover { background: rgba(181,18,27,0.18); border-color: var(--gold); }
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
    font-weight: 600; color: rgba(181,18,27,0.14);
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
  .dot.is-active { background: var(--gold); width: 24px; box-shadow: 0 0 12px rgba(212,175,55,0.52); }

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
    border-left: 2px solid rgba(212,175,55,0.36);
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
    border-color: rgba(212,175,55,0.52);
    box-shadow: 0 0 0 3px rgba(181,18,27,0.14);
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
  .footer-email { font-family: var(--font-ui); font-size: 13px; color: var(--gold); text-decoration: none; display: inline-block; padding: 8px 0; border-bottom: 1px solid rgba(212,175,55,0.36); transition: border-color 0.3s; }
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
    background: rgba(181,18,27,0.08);
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

  /* ── EXTRA FIXES FOR LIVEWIRE / MOBILE ── */
  .mirsaar-page a, .mirsaar-page button { -webkit-tap-highlight-color: transparent; }
  .mirsaar-page img, .mirsaar-page svg { max-width: 100%; }
  .mirsaar-page .btn { white-space: nowrap; }

  @media (max-width: 768px) {
    .nav { height: 66px; padding: 0 16px; }
    .mobile-menu { top: 66px; padding: 28px 22px; }
    .nav-brand-text strong { font-size: 13px; }
    .nav-brand-text small { font-size: 8px; }
    .nav-logo { width: 34px; height: 34px; }
    .hero { padding: 104px 18px 64px; min-height: auto; }
    .hero-lead { font-size: 14px; }
    .chips { gap: 7px; }
    .chip { font-size: 10px; padding: 5px 10px; }
    .btn { width: 100%; justify-content: center; padding: 13px 20px; }
    .btn-text { width: auto; justify-content: flex-start; padding-left: 0; }
    .brand-showcase { padding: 40px 18px; }
    .showcase-title { font-size: 40px; }
    .showcase-copy { font-size: 14px; }
    .services-section, .works-section, .contact-section, .reviews-section, .support-section, .section { padding-left: 18px; padding-right: 18px; }
    .feature-case { padding: 24px 18px; }
    .case-badge { top: 18px; right: 18px; }
    .gallery-card { width: 280px; }
    .review-card { padding: 26px 22px; }
    .form-card { padding: 28px 20px; }
    .footer-bottom { align-items: flex-start; flex-direction: column; }
    .scroll-hint { display: none; }
  }

  @media (max-width: 480px) {
    .nav-admin, .nav-side > .lang-pill { display: none; }
    .nav-brand { gap: 10px; }
    .hero-title { font-size: 38px; }
    .hero-eyebrow { font-size: 9px; letter-spacing: 0.12em; }
    .showcase-actions, .cta-row { width: 100%; }
    .metrics-row { grid-template-columns: 1fr; }
    .contact-card { padding: 22px; }
    .reviews-controls { width: 100%; }
    .review-btn { width: 44px; height: 44px; }
  }



  /* ── RED + GOLD PREMIUM THEME OVERRIDES ── */
  .btn-primary, .case-badge, .float-badge-icon {
    background: linear-gradient(135deg, var(--gold-light), var(--gold), #B5121B);
  }
  .hero-title em, .showcase-title em, .works-title, .stat-value, .metric-val, .service-price {
    background: linear-gradient(135deg, var(--gold-light), var(--gold), #B5121B);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
  }
  .service-card:hover, .contact-card:hover, .review-card:hover {
    box-shadow: 0 20px 60px rgba(0,0,0,0.45), 0 0 48px rgba(181,18,27,0.12);
  }
  .nav, footer, .works-section, .reviews-section {
    background: linear-gradient(180deg, rgba(18,5,7,0.94), rgba(8,3,4,0.96));
  }

</style>
<div class="mirsaar-page">

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
      <small>IT решения для бизнеса</small>
    </div>
  </a>
  <nav class="nav-links">
    <a href="#services">Услуги</a>
    <a href="#projects">Проекты</a>
    <a href="#contact">Контакты</a>
    <a href="#reviews">Отзывы</a>
    <a href="#support">Заявка</a>
  </nav>
  <div class="nav-side">
    <a href="/admin/login" class="nav-admin">Admin</a>
    <button class="lang-pill is-active">RU</button>
    <button class="lang-pill">UZ</button>
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
  <a href="#services" class="mobile-link">Услуги</a>
  <a href="#projects" class="mobile-link">Проекты</a>
  <a href="#contact" class="mobile-link">Контакты</a>
  <a href="#reviews" class="mobile-link">Отзывы</a>
  <a href="#support" class="mobile-link">Заявка</a>
  <a href="/admin/login" class="mobile-link admin">Панель администратора</a>
  <div class="mobile-lang">
    <button class="lang-pill is-active">RU</button>
    <button class="lang-pill">UZ</button>
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
        IT разработка / CRM / готовые программы / спецзаказы
      </div>

      <h1 class="hero-title">
        <span>Mirsaar</span>
        <em>IT Solutions</em>
      </h1>

      <p class="hero-lead">
        Разрабатываем готовые программы и индивидуальные IT решения для ресторанов, клиник, аптек и малого бизнеса. CRM системы, Telegram боты, бухгалтерия, NFC карты и проекты под специальный заказ.
      </p>

      <div class="chips">
        <span class="chip">CRM системы</span>
        <span class="chip">Telegram боты</span>
        <span class="chip">Программы для ресторанов</span>
        <span class="chip">NFC карты</span>
        <span class="chip">Бухгалтерия</span>
      </div>

      <div class="cta-row">
        <a href="#support" class="btn btn-primary">
          Получить консультацию
          <svg viewBox="0 0 24 24" fill="none">
            <path d="M7 17L17 7" stroke="currentColor" stroke-linecap="round" stroke-width="2"/>
            <path d="M9 7H17V15" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
          </svg>
        </a>
        <a href="#projects" class="btn btn-secondary">Проекты</a>
        <a href="#services" class="btn btn-text">Услуги →</a>
      </div>

      <div class="stats-grid">
        <article class="stat-card">
          <p class="stat-value">120+</p>
          <p class="stat-label">Клиентов</p>
        </article>
        <article class="stat-card">
          <p class="stat-value">3.2M</p>
          <p class="stat-label">Готовых решений</p>
        </article>
        <article class="stat-card">
          <p class="stat-value">4.8★</p>
          <p class="stat-label">Рейтинг</p>
        </article>
      </div>
    </div>

    <!-- Profile card -->
    <div class="profile-stage">
      <article class="profile-card">
        <div class="profile-img-fallback">M</div>
        <div class="profile-body">
          <p class="profile-label">IT business system</p>
          <p class="profile-name">Mirsaar</p>
          <p class="profile-role">Разработка программ и автоматизация</p>
        </div>
      </article>

      <div class="float-badge float-top">
        <div class="float-badge-icon">CRM</div>
        <div class="float-badge-text">
          <strong>CRM системы</strong>
          <small>заказы, клиенты, склад, отчеты</small>
        </div>
      </div>

      <div class="float-badge float-bottom">
        <div class="float-badge-icon">BOT</div>
        <div class="float-badge-text">
          <strong>Telegram автоматизация</strong>
          <small>боты для заявок и продаж</small>
        </div>
      </div>
    </div>
  </div>

  <div class="scroll-hint">ниже проекты и услуги</div>
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

      <span class="showcase-tag">почему бизнес выбирает Mirsaar</span>

      <h2 class="showcase-title">
        <span>IT</span>
        <em>automation</em>
      </h2>

      <p class="showcase-copy">
        CRM, Telegram боты, ресторанные программы, бухгалтерские модули, NFC карты и специальные IT заказы работают как единая система. Мы делаем решения, которые упрощают учет, продажи, обслуживание клиентов и управление бизнесом.
      </p>

      <div class="showcase-actions">
        <a href="#support" class="btn btn-primary">Получить консультацию</a>
        <a href="#services" class="btn btn-secondary">Услуги</a>
        <a href="#projects" class="btn btn-secondary" style="border-color: rgba(255,255,255,0.1); color: var(--text-muted);">Проекты</a>
      </div>
    </article>
  </div>
</section>

<!-- SERVICES -->
<section class="services-section" id="services">
  <div class="services-wrapper">
    <div class="services-grid-layout">
      <div class="services-copy reveal">
        <p class="section-kicker">услуги</p>
        <h2 class="services-copy-title">Создаем IT решения, которые помогают бизнесу работать быстрее, удобнее и точнее.</h2>
        <p class="services-copy-lead">
          Разрабатываем готовые программы и индивидуальные системы под задачи бизнеса: от CRM и Telegram ботов до ресторанных, медицинских и аптечных программ.
        </p>
        <div class="story-note">
          Каждый проект создается под реальную задачу: учет клиентов, заказы, склад, продажи, отчеты, автоматизация персонала и удобное управление.
        </div>
        <div class="metrics-row">
          <div class="metric-item">
            <div class="metric-val">120+</div>
            <div class="metric-lbl">Клиентов</div>
          </div>
          <div class="metric-item">
            <div class="metric-val">3.2M</div>
            <div class="metric-lbl">Проекты</div>
          </div>
          <div class="metric-item">
            <div class="metric-val">98%</div>
            <div class="metric-lbl">Довольны</div>
          </div>
        </div>
      </div>

      <div class="service-cards reveal reveal-d2">
        <!-- Service cards rendered from admin — showing sample 4 -->
        <article class="service-card">
          <div class="service-card-top">
            <div class="service-icon">CRM</div>
            <span class="service-price">от $300</span>
          </div>
          <h3 class="service-name">CRM для бизнеса</h3>
          <p class="service-desc">CRM система для учета клиентов, заказов, сотрудников, задач, оплат, склада и отчетов.</p>
          <span class="service-benefit">Учет + Контроль</span>
        </article>

        <article class="service-card">
          <div class="service-card-top">
            <div class="service-icon">BOT</div>
            <span class="service-price">от $150</span>
          </div>
          <h3 class="service-name">Telegram бот</h3>
          <p class="service-desc">Боты для приема заявок, онлайн заказов, уведомлений, оплаты, записи и поддержки клиентов.</p>
          <span class="service-benefit">Заявки + Продажи</span>
        </article>

        <article class="service-card">
          <div class="service-card-top">
            <div class="service-icon">RES</div>
            <span class="service-price">от $400</span>
          </div>
          <h3 class="service-name">Программы для ресторанов</h3>
          <p class="service-desc">Готовые и индивидуальные решения для меню, заказов, столов, кухни, доставки, кассы и отчетов.</p>
          <span class="service-benefit">Ресторан + Касса</span>
        </article>

        <article class="service-card">
          <div class="service-card-top">
            <div class="service-icon">ACC</div>
            <span class="service-price">от $250</span>
          </div>
          <h3 class="service-name">Бухгалтерия и учет</h3>
          <p class="service-desc">Программы для учета финансов, расходов, доходов, сотрудников, зарплат, отчетов и документов.</p>
          <span class="service-benefit">Финансы + Отчеты</span>
        </article>

        <article class="service-card">
          <div class="service-card-top">
            <div class="service-icon">NFC</div>
            <span class="service-price">от $80</span>
          </div>
          <h3 class="service-name">NFC карты</h3>
          <p class="service-desc">Цифровые визитки, карты сотрудников, быстрый переход на сайт, контакты, меню или профиль компании.</p>
          <span class="service-benefit">Одно касание</span>
        </article>

        <article class="service-card">
          <div class="service-card-top">
            <div class="service-icon">MED</div>
            <span class="service-price">от $500</span>
          </div>
          <h3 class="service-name">Клиника и аптека</h3>
          <p class="service-desc">Программы для записи пациентов, учета услуг, склада лекарств, продаж, отчетов и клиентской базы.</p>
          <span class="service-benefit">Медицина + Учет</span>
        </article>
      </div>
    </div>
  </div>
</section>

<!-- WORKS / PORTFOLIO -->
<section class="works-section" id="projects">
  <div class="works-wrapper">
    <div class="works-header reveal">
      <p class="section-kicker" style="justify-content: center;">проекты / портфолио</p>
      <h2 class="works-title">IT проекты для бизнеса</h2>
      <p class="works-lead">Примеры решений: CRM, ресторанные системы, Telegram боты, NFC карты, программы для клиник, аптек и спецзаказы.</p>
    </div>

    <!-- Featured case -->
    <div class="feature-case reveal reveal-d1">
      <div class="case-copy">
        <p class="case-eyebrow">CRM / Главный проект</p>
        <h3 class="case-title">Ресторан — CRM, меню, заказы и кухня в одной системе</h3>
        <p class="case-lead">Для ресторана была создана система приема заказов, управления столами, меню, кухней, доставкой, оплатами и ежедневными отчетами.</p>
        <div class="case-meta">
          <span class="case-tag">Restaurant Tech</span>
          <span class="case-tag">CRM система</span>
          <span class="case-tag">Готовое решение</span>
        </div>
        <div class="case-steps">
          <article class="case-step">
            <span>До внедрения</span>
            <p>Заказы велись вручную, отчеты собирались отдельно, персонал тратил много времени на повторные действия.</p>
          </article>
          <article class="case-step">
            <span>Что сделали</span>
            <p>Разработали CRM, электронное меню, модуль заказов, кухонный экран, Telegram уведомления и отчетность.</p>
          </article>
        </div>
      </div>
      <div style="position: relative;">
        <div class="case-window">
          <div class="case-window-bar">
            <span></span><span></span><span></span>
          </div>
          <div class="case-image-placeholder">
            <span style="font-family: var(--font-display); font-size: 80px; font-weight: 300; color: rgba(212,175,55,0.18); letter-spacing: -0.04em;">CRM</span>
          </div>
        </div>
        <div class="case-badge">Готовое решение</div>
      </div>
    </div>

    <!-- Marquee gallery -->
    <div class="gallery-marquee">
      <div class="gallery-row reveal">
        <div class="gallery-track" id="track1">
          <!-- Row 1 cards (duplicated in JS) -->
          <article class="gallery-card">
            <div class="gallery-card-frame"><div class="gallery-placeholder">BOT</div></div>
            <div class="gallery-caption">
              <p class="gallery-label">Telegram бот</p>
              <h3 class="gallery-title">Ресторан — онлайн заказы</h3>
              <div class="gallery-meta"><span class="gallery-niche">HoReCa</span><strong class="gallery-result">заказы 24/7</strong></div>
            </div>
          </article>
          <article class="gallery-card">
            <div class="gallery-card-frame"><div class="gallery-placeholder">MED</div></div>
            <div class="gallery-caption">
              <p class="gallery-label">CRM система</p>
              <h3 class="gallery-title">Клиника — запись пациентов</h3>
              <div class="gallery-meta"><span class="gallery-niche">Clinic</span><strong class="gallery-result">онлайн запись</strong></div>
            </div>
          </article>
          <article class="gallery-card">
            <div class="gallery-card-frame"><div class="gallery-placeholder">PHR</div></div>
            <div class="gallery-caption">
              <p class="gallery-label">Telegram</p>
              <h3 class="gallery-title">Аптека — склад и продажи</h3>
              <div class="gallery-meta"><span class="gallery-niche">Pharmacy</span><strong class="gallery-result">учет товара</strong></div>
            </div>
          </article>
          <article class="gallery-card">
            <div class="gallery-card-frame"><div class="gallery-placeholder">NFC</div></div>
            <div class="gallery-caption">
              <p class="gallery-label">CRM система</p>
              <h3 class="gallery-title">NFC визитки и карты</h3>
              <div class="gallery-meta"><span class="gallery-niche">NFC</span><strong class="gallery-result">быстрый контакт</strong></div>
            </div>
          </article>
          <article class="gallery-card">
            <div class="gallery-card-frame"><div class="gallery-placeholder">CLN</div></div>
            <div class="gallery-caption">
              <p class="gallery-label">Telegram бот</p>
              <h3 class="gallery-title">Клиника — CRM и регистратура</h3>
              <div class="gallery-meta"><span class="gallery-niche">Clinic</span><strong class="gallery-result">единая база</strong></div>
            </div>
          </article>
        </div>
      </div>

      <div class="gallery-row is-reverse reveal reveal-d2">
        <div class="gallery-track" id="track2">
          <article class="gallery-card">
            <div class="gallery-card-frame"><div class="gallery-placeholder">ACC</div></div>
            <div class="gallery-caption">
              <p class="gallery-label">CRM система</p>
              <h3 class="gallery-title">Бухгалтерия — доходы и расходы</h3>
              <div class="gallery-meta"><span class="gallery-niche">Accounting</span><strong class="gallery-result">финансовый учет</strong></div>
            </div>
          </article>
          <article class="gallery-card">
            <div class="gallery-card-frame"><div class="gallery-placeholder">BOT</div></div>
            <div class="gallery-caption">
              <p class="gallery-label">Telegram</p>
              <h3 class="gallery-title">Telegram бот — заявки</h3>
              <div class="gallery-meta"><span class="gallery-niche">Automation</span><strong class="gallery-result">быстрые заявки</strong></div>
            </div>
          </article>
          <article class="gallery-card">
            <div class="gallery-card-frame"><div class="gallery-placeholder">CUS</div></div>
            <div class="gallery-caption">
              <p class="gallery-label">Telegram бот</p>
              <h3 class="gallery-title">Спецзаказ — программа под бизнес</h3>
              <div class="gallery-meta"><span class="gallery-niche">Custom IT</span><strong class="gallery-result">под ключ</strong></div>
            </div>
          </article>
          <article class="gallery-card">
            <div class="gallery-card-frame"><div class="gallery-placeholder">NFC</div></div>
            <div class="gallery-caption">
              <p class="gallery-label">CRM система</p>
              <h3 class="gallery-title">NFC карты — цифровой профиль</h3>
              <div class="gallery-meta"><span class="gallery-niche">Digital Cards</span><strong class="gallery-result">одним касанием</strong></div>
            </div>
          </article>
          <article class="gallery-card">
            <div class="gallery-card-frame"><div class="gallery-placeholder">CRM</div></div>
            <div class="gallery-caption">
              <p class="gallery-label">Telegram</p>
              <h3 class="gallery-title">CRM — управление клиентами</h3>
              <div class="gallery-meta"><span class="gallery-niche">CRM</span><strong class="gallery-result">контроль данных</strong></div>
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
      <p class="section-kicker">контакты</p>
      <h2 class="contact-title">Свяжитесь с нами удобным способом<br>и расскажите о вашем проекте.</h2>
      <p class="contact-lead">Напишите нам в Telegram, WhatsApp или на email. Обсудим вашу задачу, подберем подходящее решение и подготовим понятный план разработки.</p>
    </div>
    <div class="contact-cards">
      <a href="https://t.me/mirsaar" class="contact-card reveal">
        <div class="contact-avatar">NFC</div>
        <div class="contact-copy">
          <p class="contact-role">Telegram</p>
          <h3 class="contact-name">Mirsaar IT</h3>
          <strong class="contact-value">@mirsaar</strong>
          <p class="contact-meta">Быстрый ответ</p>
        </div>
      </a>
      <a href="https://instagram.com/mirsaar" class="contact-card reveal reveal-d1">
        <div class="contact-avatar">CRM</div>
        <div class="contact-copy">
          <p class="contact-role">Портфолио</p>
          <h3 class="contact-name">Mirsaar IT</h3>
          <strong class="contact-value">@mirsaar.digital</strong>
          <p class="contact-meta">Проекты и портфолио</p>
        </div>
      </a>
      <a href="https://wa.me/998900000000" class="contact-card reveal reveal-d2">
        <div class="contact-avatar">WA</div>
        <div class="contact-copy">
          <p class="contact-role">WhatsApp</p>
          <h3 class="contact-name">Mirsaar</h3>
          <strong class="contact-value">+998 90 000 00 00</strong>
          <p class="contact-meta">Заявка и консультация</p>
        </div>
      </a>
      <a href="mailto:mirsar@gmail.com" class="contact-card reveal reveal-d3">
        <div class="contact-avatar">ML</div>
        <div class="contact-copy">
          <p class="contact-role">Email</p>
          <h3 class="contact-name">Mirsaar IT Studio</h3>
          <strong class="contact-value">mirsar@gmail.com</strong>
          <p class="contact-meta">Официальное обращение</p>
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
        <p class="section-kicker">отзывы</p>
        <h2 class="reviews-title">Отзывы клиентов</h2>
        <p class="reviews-lead">Каждый проект для нас это не просто код, а удобный инструмент для бизнеса и понятный результат для клиента.</p>
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
          <p class="review-text">Mirsaar создал для нашего ресторана удобную систему заказов и отчетов. Теперь администратор, кухня и касса работают быстрее и без лишней путаницы.</p>
          <div class="review-author">
            <strong>Анна Каримова</strong>
            <span>Family Restaurant</span>
            <small>Ноябрь 2024</small>
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
          <p class="review-text">Нам сделали Telegram бот для заявок. Клиенты выбирают услугу, оставляют данные, а менеджер сразу получает уведомление и быстро отвечает.</p>
          <div class="review-author">
            <strong>Жасур Тошматов</strong>
            <span>Diyor Service</span>
            <small>Октябрь 2024</small>
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
          <p class="review-text">Для нашей клиники разработали программу записи пациентов и учета посещений. Администраторам стало удобнее работать, а база клиентов теперь в одном месте.</p>
          <div class="review-author">
            <strong>Малика Юсупова</strong>
            <span>Medline Clinic</span>
            <small>Сентябрь 2024</small>
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
          <p class="review-text">NFC карты для сотрудников и клиентов получились очень удобными. Контакты, сайт и социальные сети открываются одним касанием.</p>
          <div class="review-author">
            <strong>Шерзод Назаров</strong>
            <span>Nova Business</span>
            <small>Август 2024</small>
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
        <p class="section-kicker">форма заявки</p>
        <h2 class="support-title">Оставьте заявку, и мы обсудим ваш IT проект.</h2>
        <p class="support-lead">Укажите тип проекта, сферу бизнеса, контакты и короткое описание задачи. Мы свяжемся с вами и предложим удобное решение.</p>
        <div class="support-points">
          <div class="support-point">
            <strong>Задача понятна</strong>
            <span>CRM, Telegram бот, ресторанная программа, клиника, аптека, NFC карта или индивидуальный заказ фиксируются отдельно.</span>
          </div>
          <div class="support-point">
            <strong>Цель понятна</strong>
            <span>Автоматизация, учет, продажи, заявки или управление бизнесом отражаются в заявке.</span>
          </div>
          <div class="support-point">
            <strong>Заявка готова</strong>
            <span>Бюджет и описание помогают быстрее подготовить предложение.</span>
          </div>
        </div>
      </div>

      <form class="form-card reveal reveal-d2" id="contact-form" wire:submit.prevent="submitInquiry">
        <div class="form-head">
          <p class="section-kicker">форма заявки</p>
          <h3>Оставьте заявку</h3>
          <p>Выберите услугу, оставьте контакт и напишите коротко о проекте.</p>
        </div>

        <div class="form-grid">
          <div class="field">
            <label>Тип услуги</label>
            <select wire:model="service_id">
              <option value="">Выберите</option>
              @foreach ($serviceOptions as $option)
                <option value="{{ $option['id'] }}">{{ $option['title'] }}</option>
              @endforeach
            </select>
          </div>
          <div class="field">
            <label>Имя</label>
            <input type="text" wire:model="name" placeholder="Ваше имя">
          </div>
          <div class="field">
            <label>Телефон</label>
            <input type="text" wire:model="phone" placeholder="+998 90 700 00 00">
          </div>
          <div class="field">
            <label>Бизнес / сфера</label>
            <input type="text" wire:model="business_niche" placeholder="Ресторан, клиника, аптека, магазин...">
          </div>
          <div class="field">
            <label>Проект</label>
            <select wire:model="platform"><option value="instagram">Instagram</option><option value="telegram">Telegram</option><option value="tiktok">TikTok</option><option value="website">Website</option><option value="other">Other</option></select>
          </div>
          <div class="field">
            <label>Цель</label>
            <select wire:model="goal"><option value="sales">Sales</option><option value="leads">Leads</option><option value="awareness">Awareness</option><option value="community">Community</option></select>
          </div>
          <div class="field">
            <label>Удобная связь</label>
            <select wire:model="preferred_contact"><option value="phone">Phone</option><option value="telegram">Telegram</option><option value="email">Email</option></select>
          </div>
          <div class="field">
            <label>Бюджет</label>
            <input type="text" wire:model="budget_range" placeholder="Например: от 300$">
          </div>
          <div class="field field-full">
            <label>Email</label>
            <input type="email" wire:model="email" placeholder="необязательно">
          </div>
        </div>

        <div class="field" style="margin-bottom: 16px;">
          <label>Комментарий</label>
          <textarea rows="5" wire:model="project_summary" placeholder="Опишите ваш бизнес, текущую ситуацию и нужный результат."></textarea>
        </div>
        <div class="field" style="margin-bottom: 28px;">
          <label>Дополнительное сообщение</label>
          <textarea rows="3" wire:model="note" placeholder="Необязательно"></textarea>
        </div>

        @if ($inquirySent)
          <div class="form-success" id="formSuccess" style="display:block;">Ваша заявка принята. Мы скоро свяжемся с вами.</div>
        @endif

        <button type="submit" class="btn btn-primary" wire:loading.attr="disabled" style="width: 100%; justify-content: center; border-radius: 12px; padding: 16px;">
          Отправить заявку
          <svg viewBox="0 0 24 24" fill="none" style="width:18px;height:18px;">
            <path d="M7 17L17 7" stroke="currentColor" stroke-linecap="round" stroke-width="2"/>
            <path d="M9 7H17V15" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
          </svg>
        </button>
      </form>
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
            <small>IT разработка и автоматизация</small>
          </div>
        </a>
        <p class="footer-lead">CRM системы, Telegram боты, программы для ресторанов, бухгалтерия, NFC карты, решения для клиник и аптек, а также индивидуальная разработка под заказ.</p>
        <a href="mailto:mirsar@gmail.com" class="footer-email">mirsar@gmail.com</a>
      </div>

      <div>
        <span class="footer-col-title">меню</span>
        <nav class="footer-links">
          <a href="#home">Главная</a>
          <a href="#services">Услуги</a>
          <a href="#projects">Проекты</a>
          <a href="#contact">Контакты</a>
          <a href="#reviews">Отзывы</a>
          <a href="#support">Заявка</a>
        </nav>
      </div>

      <div>
        <span class="footer-col-title">контакт</span>
        <div class="footer-contacts">
          <a href="+998-90-715-00-51" class="footer-contact-item">
            <div class="footer-contact-icon">
              <svg viewBox="0 0 24 24" fill="none"><path d="M4 7H20V17H4V7Z" stroke="currentColor" stroke-linejoin="round" stroke-width="1.8"/><path d="M5 8L12 13L19 8" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"/></svg>
            </div>
            <div class="footer-contact-copy">
              <small>Телефон</small>
              <strong>+998-90-715-00-51</strong>
            </div>
          </a>
          <a href="https://t.me/Mirfayzz07" class="footer-contact-item">
            <div class="footer-contact-icon">
              <svg viewBox="0 0 24 24" fill="none"><path d="M12 3L19 6V11.8C19 15.1 16.9 18.1 12 21C7.1 18.1 5 15.1 5 11.8V6L12 3Z" stroke="currentColor" stroke-linejoin="round" stroke-width="1.8"/><path d="M9.4 11.8L11.3 13.7L14.8 10.2" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"/></svg>
            </div>
            <div class="footer-contact-copy">
              <small>Telegram</small>
              <strong>mirsaarr</strong>
            </div>
          </a>
        </div>
      </div>
    </div>

    <div class="footer-bottom">
      <p>© 2025 Mirsaar. Все права защищены.</p>
      <span class="footer-pill">Premium IT Studio</span>
    </div>
  </div>
</footer>
</div>
<script>
(function () {
  function initMirsaarLanding() {
    const root = document.querySelector('.mirsaar-page');
    if (!root) return;

    // Mobile menu
    const toggle = root.querySelector('#menuToggle');
    const mobileMenu = root.querySelector('#mobileMenu');
    if (toggle && mobileMenu) {
      toggle.onclick = function () {
        mobileMenu.classList.toggle('open');
      };
      mobileMenu.querySelectorAll('a').forEach(function (link) {
        link.onclick = function () { mobileMenu.classList.remove('open'); };
      });
    }
    // Scroll reveal
    const revealEls = root.querySelectorAll('.reveal');
    if ('IntersectionObserver' in window) {
      const observer = new IntersectionObserver(function (entries) {
        entries.forEach(function (entry) {
          if (entry.isIntersecting) {
            entry.target.classList.add('is-visible');
            observer.unobserve(entry.target);
          }
        });
      }, { threshold: 0.12, rootMargin: '0px 0px -40px 0px' });
      revealEls.forEach(function (el) { observer.observe(el); });
    } else {
      revealEls.forEach(function (el) { el.classList.add('is-visible'); });
    }

    // Reviews slider
    const track = root.querySelector('#reviewsTrack');
    const dotsContainer = root.querySelector('#reviewsDots');
    const prevBtn = root.querySelector('#prevBtn');
    const nextBtn = root.querySelector('#nextBtn');
    if (track && dotsContainer && prevBtn && nextBtn && !track.dataset.ready) {
      track.dataset.ready = '1';
      const cards = Array.from(track.querySelectorAll('.review-card'));
      let current = 0;

      function getVisibleCount() {
        if (window.innerWidth < 768) return 1;
        if (window.innerWidth < 1100) return 2;
        return 3;
      }

      function maxIndex() {
        return Math.max(0, cards.length - getVisibleCount());
      }

      function buildDots() {
        dotsContainer.innerHTML = '';
        const count = maxIndex() + 1;
        for (let i = 0; i < count; i++) {
          const d = document.createElement('div');
          d.className = 'dot' + (i === current ? ' is-active' : '');
          d.addEventListener('click', function () { goTo(i); });
          dotsContainer.appendChild(d);
        }
      }

      function goTo(idx) {
        current = Math.max(0, Math.min(idx, maxIndex()));
        const gap = 20;
        const width = cards[0] ? cards[0].offsetWidth + gap : 0;
        track.style.transform = 'translateX(-' + (current * width) + 'px)';
        dotsContainer.querySelectorAll('.dot').forEach(function (d, i) {
          d.classList.toggle('is-active', i === current);
        });
      }

      buildDots();
      goTo(0);
      prevBtn.onclick = function () { goTo(current - 1); };
      nextBtn.onclick = function () { goTo(current + 1); };
      window.addEventListener('resize', function () { buildDots(); goTo(current); });
      setInterval(function () { goTo(current >= maxIndex() ? 0 : current + 1); }, 5000);
    }

    // Duplicate marquee cards once
    ['track1', 'track2'].forEach(function (id) {
      const t = root.querySelector('#' + id);
      if (!t || t.dataset.ready) return;
      t.dataset.ready = '1';
      t.innerHTML = t.innerHTML + t.innerHTML;
    });

    // Nav background on scroll
    const nav = root.querySelector('#nav');
    if (nav) {
      const updateNav = function () {
        nav.style.background = window.scrollY > 60 ? 'rgba(6,6,8,0.92)' : 'rgba(6,6,8,0.7)';
      };
      updateNav();
      window.addEventListener('scroll', updateNav, { passive: true });
    }

    // Parallax orbs desktop only
    if (window.innerWidth > 768 && !root.dataset.parallaxReady) {
      root.dataset.parallaxReady = '1';
      window.addEventListener('mousemove', function (e) {
        const x = (e.clientX / window.innerWidth - 0.5) * 30;
        const y = (e.clientY / window.innerHeight - 0.5) * 20;
        root.querySelectorAll('.orb').forEach(function (orb, i) {
          const factor = (i + 1) * 0.4;
          orb.style.transform = 'translate(' + (x * factor) + 'px, ' + (y * factor) + 'px)';
        });
      }, { passive: true });
    }
  }

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initMirsaarLanding);
  } else {
    initMirsaarLanding();
  }
  document.addEventListener('livewire:navigated', initMirsaarLanding);
  document.addEventListener('livewire:load', initMirsaarLanding);
})();
</script>
</div>

