<div class="stack-page">
    <div class="mx-auto flex min-h-screen w-full max-w-7xl flex-col gap-8 px-4 py-6 sm:px-6 lg:px-8 lg:py-10">
        <section x-data="themePanel" class="glass-panel mesh-card rounded-[2rem] p-5 sm:p-7 lg:p-10">
            <div class="flex flex-col gap-8">
                <div class="flex flex-col gap-6 lg:flex-row lg:items-start lg:justify-between">
                    <div class="max-w-3xl">
                        <div class="mb-4 flex flex-wrap gap-2 text-xs font-semibold uppercase tracking-[0.24em] text-amber-800/80">
                            <span class="stack-badge rounded-full px-3 py-1">Laravel 12</span>
                            <span class="stack-badge rounded-full px-3 py-1">All-local assets</span>
                            <span class="stack-badge rounded-full px-3 py-1">Vite build</span>
                        </div>

                        <h1 class="max-w-4xl font-serif text-4xl leading-tight text-stone-900 sm:text-5xl lg:text-7xl">
                            Vizitka loyihasi uchun yangi Laravel stack lokal holatda tayyor.
                        </h1>

                        <p class="mt-5 max-w-2xl text-base leading-7 text-stone-700 sm:text-lg">
                            Tailwind CSS, Sass, Livewire, Alpine.js, Flowbite, daisyUI va Swiper bitta loyiha
                            ichida npm/composer orqali o`rnatildi va Vite orqali lokal buildga ulandi.
                        </p>
                    </div>

                    <div class="soft-panel w-full max-w-sm rounded-[1.75rem] p-5">
                        <p class="text-sm font-semibold uppercase tracking-[0.22em] text-stone-500">Theme switcher</p>
                        <div class="mt-4 flex flex-wrap gap-2">
                            <template x-for="item in themes" :key="item">
                                <button
                                    type="button"
                                    class="btn btn-sm rounded-full"
                                    :class="isActive(item) ? 'btn-primary' : 'btn-ghost'"
                                    @click="applyTheme(item)"
                                    x-text="item"
                                ></button>
                            </template>
                        </div>
                        <p class="mt-4 text-sm leading-6 text-stone-600">
                            Tema tanlovi `localStorage` ichida saqlanadi va Alpine orqali boshqariladi.
                        </p>
                    </div>
                </div>

                <div class="grid gap-4 md:grid-cols-3">
                    <div class="soft-panel rounded-[1.5rem] p-5">
                        <p class="text-sm uppercase tracking-[0.2em] text-stone-500">Installed stack</p>
                        <p class="mt-3 hero-number text-5xl font-semibold text-stone-900">9</p>
                        <p class="mt-2 text-sm leading-6 text-stone-600">Asosiy kutubxona va build vositalari ulandi.</p>
                    </div>

                    <div class="soft-panel rounded-[1.5rem] p-5">
                        <p class="text-sm uppercase tracking-[0.2em] text-stone-500">Local-only</p>
                        <p class="mt-3 text-2xl font-semibold text-stone-900">CDN ishlatilmagan</p>
                        <p class="mt-2 text-sm leading-6 text-stone-600">JS va CSS paketlari Vite orqali lokal buildga yig`iladi.</p>
                    </div>

                    <div class="soft-panel rounded-[1.5rem] p-5">
                        <p class="text-sm uppercase tracking-[0.2em] text-stone-500">Live preview</p>
                        <p class="mt-3 text-2xl font-semibold text-stone-900">Bitta demo sahifa</p>
                        <p class="mt-2 text-sm leading-6 text-stone-600">Flowbite, daisyUI, Swiper va Livewire bir joyda ko`rsatilgan.</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="grid gap-6 lg:grid-cols-[1.05fr_0.95fr]">
            <div class="glass-panel rounded-[2rem] p-5 sm:p-7">
                <div class="flex items-start justify-between gap-4">
                    <div>
                        <p class="text-sm font-semibold uppercase tracking-[0.22em] text-stone-500">Paketlar</p>
                        <h2 class="mt-2 text-2xl font-semibold text-stone-900 sm:text-3xl">Frontend va full-stack jamlanma</h2>
                    </div>
                    <span class="badge badge-warning badge-outline px-4 py-3">composer + npm</span>
                </div>

                <div class="mt-6 flex flex-wrap gap-3">
                    @foreach ($packages as $package)
                        <div class="stack-badge rounded-2xl px-4 py-3">
                            <p class="font-semibold text-stone-800">{{ $package['name'] }}</p>
                            <p class="mt-1 text-xs uppercase tracking-[0.18em] text-stone-500">{{ $package['type'] }}</p>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="glass-panel rounded-[2rem] p-5 sm:p-7">
                <p class="text-sm font-semibold uppercase tracking-[0.22em] text-stone-500">Livewire + Alpine</p>
                <h2 class="mt-2 text-2xl font-semibold text-stone-900 sm:text-3xl">Holat boshqaruvi</h2>

                <div x-data="{ synced: $wire.entangle('count').live }" class="mt-6 space-y-5">
                    <div class="rounded-[1.5rem] bg-stone-900 px-5 py-6 text-stone-50">
                        <p class="text-xs uppercase tracking-[0.22em] text-stone-400">Counter</p>
                        <p class="mt-3 hero-number text-6xl font-semibold" x-text="synced"></p>
                        <p class="mt-2 text-sm text-stone-300">
                            Alpine ichidagi qiymat Livewire property bilan real vaqtda bog`langan.
                        </p>
                    </div>

                    <div class="flex flex-wrap gap-3">
                        <button type="button" class="btn btn-outline rounded-full" @click="synced = Math.max(0, synced - 1)">Alpine -1</button>
                        <button type="button" class="btn btn-primary rounded-full" @click="synced++">Alpine +1</button>
                        <button type="button" class="btn btn-secondary rounded-full" wire:click="increment">
                            Livewire +1
                            <span wire:loading wire:target="increment" class="loading loading-bars loading-xs"></span>
                        </button>
                        <button type="button" class="btn btn-ghost rounded-full" wire:click="resetCounter">Reset</button>
                    </div>

                    <div class="rounded-[1.5rem] border border-stone-200/80 bg-white/80 p-4 text-sm leading-6 text-stone-600">
                        Server tomondagi hozirgi qiymat:
                        <span class="font-semibold text-stone-900">{{ $count }}</span>
                    </div>
                </div>
            </div>
        </section>

        <section wire:ignore class="glass-panel rounded-[2rem] p-5 sm:p-7">
            <div class="flex flex-col gap-4 md:flex-row md:items-end md:justify-between">
                <div>
                    <p class="text-sm font-semibold uppercase tracking-[0.22em] text-stone-500">Flowbite</p>
                    <h2 class="mt-2 text-2xl font-semibold text-stone-900 sm:text-3xl">Interactive modal lokal JS bilan</h2>
                </div>

                <button
                    type="button"
                    class="btn btn-primary rounded-full"
                    data-modal-target="stack-flowbite-modal"
                    data-modal-toggle="stack-flowbite-modal"
                >
                    Modalni ochish
                </button>
            </div>

            <div class="mt-6 grid gap-4 md:grid-cols-3">
                <div class="soft-panel rounded-[1.5rem] p-5">
                    <p class="text-sm uppercase tracking-[0.18em] text-stone-500">JS init</p>
                    <p class="mt-2 text-lg font-semibold text-stone-900">`initFlowbite()`</p>
                </div>
                <div class="soft-panel rounded-[1.5rem] p-5">
                    <p class="text-sm uppercase tracking-[0.18em] text-stone-500">Source</p>
                    <p class="mt-2 text-lg font-semibold text-stone-900">`node_modules/flowbite`</p>
                </div>
                <div class="soft-panel rounded-[1.5rem] p-5">
                    <p class="text-sm uppercase tracking-[0.18em] text-stone-500">Mode</p>
                    <p class="mt-2 text-lg font-semibold text-stone-900">CDN yo`q</p>
                </div>
            </div>

            <div
                id="stack-flowbite-modal"
                tabindex="-1"
                aria-hidden="true"
                class="fixed inset-0 z-50 hidden h-[calc(100%-1rem)] max-h-full w-full overflow-y-auto overflow-x-hidden p-4 md:inset-0"
            >
                <div class="relative mx-auto max-h-full w-full max-w-2xl">
                    <div class="relative rounded-[1.75rem] bg-white shadow-2xl">
                        <div class="flex items-center justify-between border-b border-stone-200 px-6 py-5">
                            <div>
                                <h3 class="text-xl font-semibold text-stone-900">Flowbite modal</h3>
                                <p class="mt-1 text-sm text-stone-500">Bu modal lokal `flowbite` paketi orqali ishlayapti.</p>
                            </div>
                            <button
                                type="button"
                                class="inline-flex h-10 w-10 items-center justify-center rounded-full text-stone-500 transition hover:bg-stone-100 hover:text-stone-900"
                                data-modal-hide="stack-flowbite-modal"
                            >
                                <span class="sr-only">Close modal</span>
                                <svg class="h-4 w-4" viewBox="0 0 14 14" fill="none" aria-hidden="true">
                                    <path d="M1 1L13 13M13 1L1 13" stroke="currentColor" stroke-linecap="round" stroke-width="1.5" />
                                </svg>
                            </button>
                        </div>

                        <div class="space-y-4 px-6 py-6 text-sm leading-7 text-stone-600">
                            <p>
                                `resources/js/modules/flowbite.js` ichida `initFlowbite()` chaqirildi.
                            </p>
                            <p>
                                Tailwind v4 ichida `@plugin "flowbite/plugin"` va `@source "../../node_modules/flowbite"`
                                ishlatilmoqda.
                            </p>
                        </div>

                        <div class="flex flex-wrap gap-3 border-t border-stone-200 px-6 py-5">
                            <button type="button" class="btn btn-primary rounded-full" data-modal-hide="stack-flowbite-modal">Yopish</button>
                            <button type="button" class="btn btn-outline rounded-full" data-modal-hide="stack-flowbite-modal">Tushundim</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section wire:ignore data-swiper-root class="glass-panel swiper-shell rounded-[2rem] p-5 sm:p-7">
            <div class="flex flex-col gap-4 md:flex-row md:items-end md:justify-between">
                <div>
                    <p class="text-sm font-semibold uppercase tracking-[0.22em] text-stone-500">Swiper</p>
                    <h2 class="mt-2 text-2xl font-semibold text-stone-900 sm:text-3xl">Slider lokal modul sifatida ulandi</h2>
                </div>

                <div class="flex gap-2">
                    <button type="button" class="btn btn-circle btn-sm btn-outline" data-swiper-prev aria-label="Previous slide">‹</button>
                    <button type="button" class="btn btn-circle btn-sm btn-outline" data-swiper-next aria-label="Next slide">›</button>
                </div>
            </div>

            <div data-swiper class="swiper mt-7">
                <div class="swiper-wrapper">
                    @foreach ($slides as $slide)
                        <article class="swiper-slide">
                            <div class="soft-panel accent-grid flex h-full flex-col justify-between rounded-[1.75rem] p-6">
                                <div>
                                    <p class="text-sm uppercase tracking-[0.2em] text-stone-500">Slide {{ $loop->iteration }}</p>
                                    <h3 class="mt-3 text-2xl font-semibold text-stone-900">{{ $slide['title'] }}</h3>
                                </div>
                                <p class="mt-6 text-base leading-7 text-stone-700">{{ $slide['copy'] }}</p>
                            </div>
                        </article>
                    @endforeach
                </div>
            </div>

            <div data-swiper-pagination class="swiper-pagination"></div>
        </section>

        <section class="grid gap-6 lg:grid-cols-[0.92fr_1.08fr]">
            <div class="glass-panel rounded-[2rem] p-5 sm:p-7">
                <p class="text-sm font-semibold uppercase tracking-[0.22em] text-stone-500">Sass</p>
                <h2 class="mt-2 text-2xl font-semibold text-stone-900 sm:text-3xl">Qo`shimcha lokal uslublar</h2>

                <div class="mt-6 space-y-4 text-sm leading-7 text-stone-600">
                    <p>`resources/sass/app.scss` ichida sahifa fonlari, glass-panellar va Swiper skin yozildi.</p>
                    <p>`vite.config.js` ga Sass entry qo`shildi va layout ichida alohida yuklanadi.</p>
                    <p>Tashqi font yoki CDN ishlatilmagan, hammasi lokal build bilan tayyor.</p>
                </div>
            </div>

            <div class="glass-panel rounded-[2rem] p-5 sm:p-7">
                <p class="text-sm font-semibold uppercase tracking-[0.22em] text-stone-500">Qisqa eslatma</p>
                <h2 class="mt-2 text-2xl font-semibold text-stone-900 sm:text-3xl">Loyiha strukturasida qayerga joylandi?</h2>

                <div class="mt-6 grid gap-3 text-sm text-stone-700 sm:grid-cols-2">
                    <div class="rounded-2xl border border-stone-200/80 bg-white/80 p-4">
                        <p class="font-semibold text-stone-900">CSS</p>
                        <p class="mt-2">`resources/css/app.css`</p>
                    </div>
                    <div class="rounded-2xl border border-stone-200/80 bg-white/80 p-4">
                        <p class="font-semibold text-stone-900">Sass</p>
                        <p class="mt-2">`resources/sass/app.scss`</p>
                    </div>
                    <div class="rounded-2xl border border-stone-200/80 bg-white/80 p-4">
                        <p class="font-semibold text-stone-900">JS modules</p>
                        <p class="mt-2">`resources/js/modules/*`</p>
                    </div>
                    <div class="rounded-2xl border border-stone-200/80 bg-white/80 p-4">
                        <p class="font-semibold text-stone-900">Livewire page</p>
                        <p class="mt-2">`app/Livewire` va `resources/views/livewire`</p>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
