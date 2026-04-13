import Swiper from 'swiper';
import { Autoplay, Navigation, Pagination } from 'swiper/modules';
import 'swiper/css';
import 'swiper/css/navigation';
import 'swiper/css/pagination';

const initSwipers = () => {
    document.querySelectorAll('[data-swiper]').forEach((element) => {
        if (element.swiper) {
            element.swiper.destroy(true, true);
        }

        const root = element.closest('[data-swiper-root]') ?? element.parentElement;
        const nextEl = root?.querySelector('[data-swiper-next]');
        const prevEl = root?.querySelector('[data-swiper-prev]');
        const paginationEl = root?.querySelector('[data-swiper-pagination]');

        new Swiper(element, {
            modules: [Autoplay, Navigation, Pagination],
            slidesPerView: 1.1,
            spaceBetween: 20,
            loop: true,
            speed: 900,
            autoplay: {
                delay: 3200,
                disableOnInteraction: false,
            },
            pagination: paginationEl
                ? {
                      el: paginationEl,
                      clickable: true,
                  }
                : undefined,
            navigation: nextEl && prevEl ? { nextEl, prevEl } : undefined,
            breakpoints: {
                768: {
                    slidesPerView: 2,
                    spaceBetween: 24,
                },
                1200: {
                    slidesPerView: 2.4,
                    spaceBetween: 28,
                },
            },
        });
    });
};

const bootSwiper = () => {
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initSwipers, { once: true });
    } else {
        initSwipers();
    }

    document.addEventListener('livewire:navigated', initSwipers);
};

export { bootSwiper };
