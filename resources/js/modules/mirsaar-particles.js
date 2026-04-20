function initMirsaarParticles() {
    const canvas = document.createElement('canvas');
    canvas.style.position = 'fixed';
    canvas.style.inset = '0';
    canvas.style.zIndex = '0';
    canvas.style.pointerEvents = 'none';
    document.body.prepend(canvas);

    const ctx = canvas.getContext('2d');

    const THEMES = [
        { bg: '#0b0f1a', col: [90, 120, 200] },
        { bg: '#0a0a10', col: [120, 140, 220] },
        { bg: '#0d1117', col: [80, 180, 200] },
    ];

    let current = 0;

    let particles = [];

    function createParticles() {
        particles = Array.from({ length: 15 }, () => ({
            x: Math.random() * canvas.width,
            y: Math.random() * canvas.height,
            r: Math.random() * 2.5 + 1,
            s: Math.random() * 0.6 + 0.2
        }));
    }

    function resize() {
        canvas.width = window.innerWidth;
        canvas.height = window.innerHeight;
        createParticles();
    }

    window.addEventListener('resize', resize);
    resize();

    function applyTheme(i) {
        document.body.style.background = THEMES[i].bg;
    }

    applyTheme(0);

    setInterval(() => {
        current = (current + 1) % THEMES.length;
        applyTheme(current);
    }, 9000);

    function draw() {
        ctx.fillStyle = 'rgba(0,0,0,0.12)';
        ctx.fillRect(0, 0, canvas.width, canvas.height);

        const [r, g, b] = THEMES[current].col;

        particles.forEach(p => {
            p.y += p.s;

            if (p.y > canvas.height) {
                p.y = 0;
                p.x = Math.random() * canvas.width;
            }

            ctx.beginPath();
            ctx.fillStyle = `rgba(${r},${g},${b},0.6)`;
            ctx.arc(p.x, p.y, p.r, 0, Math.PI * 2);
            ctx.fill();
        });

        requestAnimationFrame(draw);
    }

    requestAnimationFrame(draw);
}

document.addEventListener('DOMContentLoaded', initMirsaarParticles);