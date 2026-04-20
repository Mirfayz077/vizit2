import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/sass/app.scss', 'resources/js/app.js'],
            refresh: true,
        }),
        tailwindcss(),
    ],
    build: {
        rollupOptions: {
            output: {
                manualChunks(id) {
                    const normalizedId = id.replace(/\\/g, '/');

                    if (normalizedId.includes('/vendor/livewire/')) {
                        return 'livewire';
                    }

                    if (normalizedId.includes('/node_modules/flowbite/')) {
                        return 'flowbite';
                    }

                    if (normalizedId.includes('/node_modules/swiper/')) {
                        return 'swiper';
                    }

                    if (normalizedId.includes('/node_modules/alpinejs/')) {
                        return 'alpine';
                    }

                    if (normalizedId.includes('/node_modules/axios/')) {
                        return 'http';
                    }

                    if (normalizedId.includes('/node_modules/')) {
                        return 'vendor';
                    }
                },
            },
        },
    },
});
