function initStars() {
    const canvas = document.createElement('canvas');

    canvas.style.position = 'fixed';
    canvas.style.inset = '0';
    canvas.style.zIndex = '0';
    canvas.style.pointerEvents = 'none';

    document.body.prepend(canvas);

    const ctx = canvas.getContext('2d');

    const COLORS = [
        '139, 92, 246',   // purple
        '56, 189, 248',   // cyan
        '52, 211, 153',   // green
        '248, 113, 113',  // coral
        '251, 191, 36'    // amber
    ];

    let stars = [];

    function randomColor() {
        return COLORS[Math.floor(Math.random() * COLORS.length)];
    }

    function createStars() {
        stars = Array.from({ length: 120 }, () => ({
            x: Math.random() * canvas.width,
            y: Math.random() * canvas.height,
            r: Math.random() * 1.8 + 0.3,
            baseAlpha: Math.random() * 0.5 + 0.3,
            color: randomColor(),
            speed: Math.random() * 0.3 + 0.05,
            phase: Math.random() * Math.PI * 2
        }));
    }

    function resize() {
        canvas.width = window.innerWidth;
        canvas.height = window.innerHeight;
        createStars();
    }

    window.addEventListener('resize', resize);
    resize();

    function draw(time) {
        ctx.clearRect(0, 0, canvas.width, canvas.height);

        stars.forEach(s => {
            // ✨ TWINKLE EFFECT
            const glow = Math.sin(time * 0.002 + s.phase) * 0.5 + 0.5;
            const alpha = s.baseAlpha * glow;

            // soft movement (floating)
            s.y += s.speed;
            if (s.y > canvas.height) s.y = 0;

            // MAIN STAR
            ctx.beginPath();
            ctx.arc(s.x, s.y, s.r, 0, Math.PI * 2);
            ctx.fillStyle = `rgba(${s.color}, ${alpha})`;
            ctx.fill();

            // 🌟 GLOW EFFECT (premium look)
            const gradient = ctx.createRadialGradient(
                s.x, s.y, 0,
                s.x, s.y, s.r * 6
            );

            gradient.addColorStop(0, `rgba(${s.color}, ${alpha * 0.4})`);
            gradient.addColorStop(1, 'rgba(0,0,0,0)');

            ctx.beginPath();
            ctx.fillStyle = gradient;
            ctx.arc(s.x, s.y, s.r * 6, 0, Math.PI * 2);
            ctx.fill();
        });

        requestAnimationFrame(draw);
    }

    requestAnimationFrame(draw);
}

document.addEventListener('DOMContentLoaded', initStars);