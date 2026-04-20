let swiperLoader;

const loadSwiper = async () => {
    swiperLoader ??= Promise.all([
        import('swiper'),
        import('swiper/modules'),
        import('swiper/css'),
        import('swiper/css/navigation'),
        import('swiper/css/pagination'),
    ]).then(([swiperModule, modules]) => ({
        Swiper: swiperModule.default,
        Autoplay: modules.Autoplay,
        Navigation: modules.Navigation,
        Pagination: modules.Pagination,
    }));

    return swiperLoader;
};

const initSwipers = async () => {
    const elements = [...document.querySelectorAll('[data-swiper]')];

    if (elements.length === 0) {
        return;
    }

    const { Swiper, Autoplay, Navigation, Pagination } = await loadSwiper();

    elements.forEach((element) => {
        if (element.swiper) {
            element.swiper.destroy(true, true);
        }

        const variant = element.dataset.swiperVariant;
        const root = element.closest('[data-swiper-root]') ?? element.parentElement;
        const nextEl = root?.querySelector('[data-swiper-next]');
        const prevEl = root?.querySelector('[data-swiper-prev]');
        const paginationEl = root?.querySelector('[data-swiper-pagination]');

        const reviewBreakpoints = {
            768: {
                slidesPerView: 2,
                spaceBetween: 24,
            },
            1200: {
                slidesPerView: 3,
                spaceBetween: 28,
            },
        };

        const defaultBreakpoints = {
            768: {
                slidesPerView: 2,
                spaceBetween: 24,
            },
            1200: {
                slidesPerView: 2.4,
                spaceBetween: 28,
            },
        };

        new Swiper(element, {
            modules: [Autoplay, Navigation, Pagination],
            slidesPerView: 1.1,
            spaceBetween: 20,
            loop: true,
            speed: 900,
            autoplay: {
                delay: 3200,
                disableOnInteraction: false,
                pauseOnMouseEnter: true,
            },
            pagination: paginationEl
                ? {
                      el: paginationEl,
                      clickable: true,
                  }
                : undefined,
            navigation: nextEl && prevEl ? { nextEl, prevEl } : undefined,
            breakpoints: variant === 'reviews' ? reviewBreakpoints : defaultBreakpoints,
        });
    });
};

const bootSwiper = () => {
    const run = () => {
        void initSwipers();
    };

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', run, { once: true });
    } else {
        run();
    }

    document.addEventListener('livewire:navigated', run);
};

export { bootSwiper };
