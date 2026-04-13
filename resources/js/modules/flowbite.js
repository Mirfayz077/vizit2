import { initFlowbite } from 'flowbite';

const init = () => {
    initFlowbite();
};

const bootFlowbite = () => {
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', init, { once: true });
    } else {
        init();
    }

    document.addEventListener('livewire:navigated', init);
};

export { bootFlowbite };
