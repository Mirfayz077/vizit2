import './bootstrap';
import { Alpine, startLivewire } from './modules/livewire';
import { registerThemePanel } from './modules/theme-panel';
import { bootFlowbite } from './modules/flowbite';
import { bootSwiper } from './modules/swiper';

registerThemePanel(Alpine);
bootFlowbite();
bootSwiper();
startLivewire();
