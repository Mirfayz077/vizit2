import { Alpine, Livewire } from '../../../vendor/livewire/livewire/dist/livewire.esm';

const startLivewire = () => {
    window.Alpine = Alpine;
    Livewire.start();
};

export { Alpine, Livewire, startLivewire };
