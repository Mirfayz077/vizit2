function initStars() {
    if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
        return;
    }

    const canvas = document.createElement('canvas');

    canvas.style.position = 'fixed';
    canvas.style.inset = '0';
    canvas.style.zIndex = '0';
    canvas.style.pointerEvents = 'none';

    document.body.prepend(canvas);

    const ctx = canvas.getContext('2d');

    if (!ctx) {
        return;
    }

    const colors = [
        '139, 92, 246',
        '56, 189, 248',
        '52, 211, 153',
        '248, 113, 113',
        '251, 191, 36',
    ];

    let settings;
    let stars = [];
    let frame = 0;

    function getSettings() {
        const isMobile = window.matchMedia('(max-width: 768px), (pointer: coarse)').matches;
        const lowPowerDevice = typeof navigator.deviceMemory === 'number' && navigator.deviceMemory <= 4;

        return {
            width: window.innerWidth,
            height: window.innerHeight,
            isMobile,
            density: Math.min(window.devicePixelRatio || 1, isMobile ? 1 : 1.5),
            starCount: isMobile ? (lowPowerDevice ? 24 : 36) : 90,
            glowRadius: isMobile ? 0 : 6,
            frameStep: isMobile ? 2 : 1,
            speedBoost: isMobile ? 0.7 : 1,
        };
    }

    function randomColor() {
        return colors[Math.floor(Math.random() * colors.length)];
    }

    function createStars() {
        stars = Array.from({ length: settings.starCount }, () => ({
            x: Math.random() * settings.width,
            y: Math.random() * settings.height,
            r: settings.isMobile ? Math.random() * 1.1 + 0.25 : Math.random() * 1.8 + 0.3,
            baseAlpha: Math.random() * (settings.isMobile ? 0.3 : 0.5) + 0.24,
            color: randomColor(),
            speed: (Math.random() * 0.3 + 0.05) * settings.speedBoost,
            phase: Math.random() * Math.PI * 2,
        }));
    }

    function resize() {
        settings = getSettings();
        canvas.width = Math.floor(settings.width * settings.density);
        canvas.height = Math.floor(settings.height * settings.density);
        canvas.style.width = `${settings.width}px`;
        canvas.style.height = `${settings.height}px`;
        ctx.setTransform(settings.density, 0, 0, settings.density, 0, 0);
        createStars();
    }

    window.addEventListener('resize', resize);
    resize();

    function draw(time) {
        frame = (frame + 1) % settings.frameStep;

        if (frame !== 0) {
            requestAnimationFrame(draw);
            return;
        }

        ctx.clearRect(0, 0, settings.width, settings.height);

        stars.forEach((star) => {
            const glow = Math.sin(time * 0.002 + star.phase) * 0.5 + 0.5;
            const alpha = star.baseAlpha * glow;

            star.y += star.speed;

            if (star.y > settings.height) {
                star.y = 0;
            }

            ctx.beginPath();
            ctx.arc(star.x, star.y, star.r, 0, Math.PI * 2);
            ctx.fillStyle = `rgba(${star.color}, ${alpha})`;
            ctx.fill();

            if (settings.glowRadius === 0) {
                return;
            }

            const gradient = ctx.createRadialGradient(
                star.x,
                star.y,
                0,
                star.x,
                star.y,
                star.r * settings.glowRadius,
            );

            gradient.addColorStop(0, `rgba(${star.color}, ${alpha * 0.4})`);
            gradient.addColorStop(1, 'rgba(0,0,0,0)');

            ctx.beginPath();
            ctx.fillStyle = gradient;
            ctx.arc(star.x, star.y, star.r * settings.glowRadius, 0, Math.PI * 2);
            ctx.fill();
        });

        requestAnimationFrame(draw);
    }

    requestAnimationFrame(draw);
}

function bootStars() {
    const run = () => {
        if ('requestIdleCallback' in window) {
            window.requestIdleCallback(initStars, { timeout: 1200 });
        } else {
            window.setTimeout(initStars, 250);
        }
    };

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', run, { once: true });
    } else {
        run();
    }
}

bootStars();
