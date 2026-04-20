const FLOWBITE_SELECTORS = [
    '[data-modal-toggle]',
    '[data-modal-target]',
    '[data-collapse-toggle]',
    '[data-dropdown-toggle]',
    '[data-carousel]',
    '[data-drawer-target]',
    '[data-tabs-toggle]',
    '[data-accordion]',
    '[data-tooltip-target]',
    '[data-popover-target]',
];

let flowbiteLoader;

const shouldLoadFlowbite = (root = document) =>
    FLOWBITE_SELECTORS.some((selector) => root.querySelector(selector));

const loadFlowbite = async () => {
    flowbiteLoader ??= import('flowbite').then((module) => module.initFlowbite);

    return flowbiteLoader;
};

const init = async () => {
    if (!shouldLoadFlowbite()) {
        return;
    }

    const initFlowbite = await loadFlowbite();

    initFlowbite();
};

const bootFlowbite = () => {
    const run = () => {
        void init();
    };

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', run, { once: true });
    } else {
        run();
    }

    document.addEventListener('livewire:navigated', run);
};

export { bootFlowbite };
