import './bootstrap';
import { Alpine, startLivewire } from './modules/livewire';
import { registerThemePanel } from './modules/theme-panel';
import { bootFlowbite } from './modules/flowbite';
import { bootSwiper } from './modules/swiper';
import './modules/mirsaar-particles';

registerThemePanel(Alpine);
bootFlowbite();
bootSwiper();
startLivewire();

// ═══════════════════════════════════════
//  MIRSAAR — Brand Particles (yulduzlar o'rniga)
//  initStars() ni shu bilan almashtiring
//  Foydalanish: resources/js/app.js ichiga qo'shing
// ═══════════════════════════════════════

function initMirsaarParticles() {
    const BRAND = 'MIRSAAR';

    const THEMES = [
        { bg: '#08090f', orbA: 'rgba(30,35,80,0.85)',  orbB: 'rgba(18,22,55,0.75)',  text: 'linear-gradient(135deg,rgba(190,200,240,0.82),rgba(140,155,220,0.46))', dot: 'rgba(140,155,220,0.7)', col: [140, 155, 220] },
        { bg: '#090b10', orbA: 'rgba(20,45,70,0.88)',  orbB: 'rgba(15,35,65,0.78)',  text: 'linear-gradient(135deg,rgba(170,210,240,0.82),rgba(110,170,220,0.48))', dot: 'rgba(110,170,220,0.7)', col: [110, 170, 220] },
        { bg: '#0a0a10', orbA: 'rgba(45,30,80,0.82)',  orbB: 'rgba(35,20,70,0.72)',  text: 'linear-gradient(135deg,rgba(200,185,240,0.84),rgba(155,130,215,0.50))', dot: 'rgba(155,130,215,0.7)', col: [155, 130, 215] },
        { bg: '#090c0e', orbA: 'rgba(15,50,55,0.85)',  orbB: 'rgba(12,40,45,0.75)',  text: 'linear-gradient(135deg,rgba(165,220,225,0.82),rgba(100,190,200,0.46))', dot: 'rgba(100,190,200,0.7)', col: [100, 190, 200] },
        { bg: '#0b0b0b', orbA: 'rgba(40,40,45,0.82)',  orbB: 'rgba(28,28,33,0.72)',  text: 'linear-gradient(135deg,rgba(210,210,218,0.86),rgba(165,165,180,0.52))', dot: 'rgba(165,165,180,0.7)', col: [165, 165, 180] },
        { bg: '#090a0d', orbA: 'rgba(22,38,65,0.88)',  orbB: 'rgba(35,20,60,0.75)',  text: 'linear-gradient(135deg,rgba(180,195,238,0.86),rgba(130,150,225,0.50))', dot: 'rgba(130,150,225,0.7)', col: [130, 150, 225] },
    ];

    // ── Canvas yaratish ──
    const canvas = document.createElement('canvas');
    canvas.style.position      = 'fixed';
    canvas.style.inset         = '0';
    canvas.style.zIndex        = '0';
    canvas.style.pointerEvents = 'none';
    document.body.prepend(canvas);

    const ctx = canvas.getContext('2d');

    // ── Particles ──
    let particles = [];
    let curTheme  = 0;

    function createParticles() {
        particles = Array.from({ length: 55 }, (_, i) => ({
            letter:    BRAND[i % BRAND.length],
            x:         Math.random() * canvas.width,
            y:         Math.random() * canvas.height,
            size:      Math.random() * 18 + 8,
            baseAlpha: Math.random() * 0.28 + 0.06,
            phase:     Math.random() * Math.PI * 2,
            speed:     Math.random() * 0.22 + 0.04,
            drift:     (Math.random() - 0.5) * 0.12,
            spin:      (Math.random() - 0.5) * 0.004,
            angle:     Math.random() * Math.PI * 2,
        }));
    }

    function resize() {
        canvas.width  = window.innerWidth;
        canvas.height = window.innerHeight;
        createParticles();
    }

    window.addEventListener('resize', resize);
    resize();

    // ── Tema almashtirish ──
    function applyTheme(idx) {
        const t = THEMES[idx];

        // Fon rangi
        document.body.style.transition = 'background 1.8s cubic-bezier(0.4,0,0.2,1)';
        document.body.style.background = t.bg;

        // Agar sizda .mirsaar-bg-orb--a, --b elementlar bo'lsa:
        const orbA = document.querySelector('.mirsaar-bg-orb--a');
        const orbB = document.querySelector('.mirsaar-bg-orb--b');
        if (orbA) orbA.style.background = t.orbA;
        if (orbB) orbB.style.background = t.orbB;

        // Agar sizda .mirsaar-bg-wordmark bo'lsa:
        const wordmark = document.querySelector('.mirsaar-bg-wordmark');
        if (wordmark) wordmark.style.backgroundImage = t.text;

        // Ticker nuqtalar
        document.querySelectorAll('.mirsaar-bg-dot').forEach((d, i) => {
            d.classList.toggle('is-active', i === idx);
        });

        // Status dot
        const sdot = document.querySelector('.mirsaar-bg-status-dot');
        if (sdot) sdot.style.background = t.dot;
    }

    applyTheme(0);

    setInterval(() => {
        curTheme = (curTheme + 1) % THEMES.length;
        applyTheme(curTheme);
    }, 3500);

    // ── Draw loop ──
    function draw(time) {
        // Cinematic trail fade
        ctx.fillStyle = 'rgba(0, 0, 0, 0.28)';
        ctx.fillRect(0, 0, canvas.width, canvas.height);

        const [r, g, b] = THEMES[curTheme].col;

        particles.forEach(p => {
            const glow  = Math.sin(time * 0.001 + p.phase) * 0.5 + 0.5;
            const alpha = p.baseAlpha * glow;

            // Harakat
            p.y     += p.speed;
            p.x     += p.drift;
            p.angle += p.spin;

            if (p.y > canvas.height + 30) p.y = -30;
            if (p.x > canvas.width  + 20) p.x = -20;
            if (p.x < -20) p.x = canvas.width + 20;

            ctx.save();
            ctx.translate(p.x, p.y);
            ctx.rotate(p.angle);

            // Yumshoq halo (glow doira)
            const halo = ctx.createRadialGradient(0, 0, 0, 0, 0, p.size * 2.2);
            halo.addColorStop(0,   `rgba(${r},${g},${b},${alpha * 0.35})`);
            halo.addColorStop(0.5, `rgba(${r},${g},${b},${alpha * 0.10})`);
            halo.addColorStop(1,   'rgba(0,0,0,0)');

            ctx.fillStyle = halo;
            ctx.beginPath();
            ctx.arc(0, 0, p.size * 2.2, 0, Math.PI * 2);
            ctx.fill();

            // Harf
            ctx.font         = `100 ${p.size}px -apple-system, "Helvetica Neue", sans-serif`;
            ctx.textAlign    = 'center';
            ctx.textBaseline = 'middle';
            ctx.shadowColor  = `rgba(${r},${g},${b},${alpha * 0.9})`;
            ctx.shadowBlur   = 12;
            ctx.fillStyle    = `rgba(${r},${g},${b},${alpha})`;
            ctx.fillText(p.letter, 0, 0);
            ctx.shadowBlur   = 0;

            ctx.restore();
        });

        requestAnimationFrame(draw);
    }

    requestAnimationFrame(draw);
}

document.addEventListener('DOMContentLoaded', initMirsaarParticles);