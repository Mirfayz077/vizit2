<div class="mirsaar-page" id="home" x-data="{ mobileOpen: false }">
    <div class="mirsaar-orb mirsaar-orb--left" aria-hidden="true"></div>
    <div class="mirsaar-orb mirsaar-orb--right" aria-hidden="true"></div>

    <div class="mirsaar-shell">
        <section class="mirsaar-hero">
            <div class="mirsaar-nav-shell">
                <header class="mirsaar-nav">
                    <a href="#home" class="mirsaar-brand" aria-label="Mirsaar">
                        <span class="mirsaar-brand-mark" aria-hidden="true">
                            <svg viewBox="0 0 64 64" fill="none" role="presentation">
                                <circle cx="32" cy="32" r="29" stroke="currentColor" stroke-width="2.5" />
                                <path d="M18 39L28.5 22H35L25 42" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="3" />
                                <path d="M30 42L39 22H46L36.5 42" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="3" />
                            </svg>
                        </span>

                        <span class="mirsaar-brand-copy">
                            <strong>Mirsaar</strong>
                            <small>premium experience</small>
                        </span>
                    </a>

                    <nav class="mirsaar-nav-links" aria-label="Primary navigation">
                        @foreach ($navItems as $item)
                            <a href="{{ $item['href'] }}" class="mirsaar-nav-link">{{ $item['label'] }}</a>
                        @endforeach
                    </nav>

                    <div class="mirsaar-nav-side">
                        <span class="mirsaar-nav-chip">Luxury UI</span>

                        <div class="mirsaar-lang-switch" aria-label="Language switcher">
                            @foreach ($languages as $language)
                                <button
                                    type="button"
                                    class="mirsaar-lang-pill {{ $language['active'] ? 'is-active' : '' }}"
                                    aria-pressed="{{ $language['active'] ? 'true' : 'false' }}"
                                >
                                    {{ $language['label'] }}
                                </button>
                            @endforeach
                        </div>

                        <button
                            type="button"
                            class="mirsaar-menu-toggle"
                            aria-controls="mobile-menu"
                            :aria-expanded="mobileOpen.toString()"
                            @click="mobileOpen = !mobileOpen"
                        >
                            <span class="sr-only">Open menu</span>
                            <svg viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                <path d="M4 7H20" stroke="currentColor" stroke-linecap="round" stroke-width="2" />
                                <path d="M4 12H20" stroke="currentColor" stroke-linecap="round" stroke-width="2" />
                                <path d="M8 17H20" stroke="currentColor" stroke-linecap="round" stroke-width="2" />
                            </svg>
                        </button>
                    </div>
                </header>

                <div
                    id="mobile-menu"
                    class="mirsaar-mobile-menu"
                    x-cloak
                    x-show="mobileOpen"
                    x-transition.opacity.duration.300ms
                    x-transition.scale.origin.top.duration.300ms
                    @click.outside="mobileOpen = false"
                >
                    @foreach ($navItems as $item)
                        <a href="{{ $item['href'] }}" class="mirsaar-mobile-link" @click="mobileOpen = false">
                            {{ $item['label'] }}
                        </a>
                    @endforeach

                    <div class="mirsaar-mobile-lang-row">
                        @foreach ($languages as $language)
                            <button
                                type="button"
                                class="mirsaar-lang-pill {{ $language['active'] ? 'is-active' : '' }}"
                                aria-pressed="{{ $language['active'] ? 'true' : 'false' }}"
                            >
                                {{ $language['label'] }}
                            </button>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="mirsaar-hero-grid">
                <div class="mirsaar-copy">
                    <p class="mirsaar-kicker mirsaar-reveal">
                        <span class="mirsaar-kicker-dot" aria-hidden="true"></span>
                        premium header / icon motion / full screen feel
                    </p>

                    <h1 class="mirsaar-title mirsaar-reveal mirsaar-reveal--delay-1">
                        <span>Premium</span>
                        <em>Mirsaar</em>
                        <span>taassuroti uchun full-screen intro.</span>
                    </h1>

                    <p class="mirsaar-lead mirsaar-reveal mirsaar-reveal--delay-2">
                        Header qismi screenshot ruhida saqlandi, lekin ko'rinish ancha boyitildi:
                        oltin aksentlar, premium iconlar, yumshoq glow, chuqur glass layerlar va silliq
                        animatsiyalar bilan brend birinchi ekrandanoq kuchli ko'rinadi.
                    </p>

                    <div class="mirsaar-chip-row mirsaar-reveal mirsaar-reveal--delay-2">
                        @foreach ($heroTags as $tag)
                            <span class="mirsaar-info-chip">{{ $tag }}</span>
                        @endforeach
                    </div>

                    <div class="mirsaar-cta-row mirsaar-reveal mirsaar-reveal--delay-3">
                        <a href="#contact" class="mirsaar-button mirsaar-button--primary">
                            Loyihani boshlash
                            <svg viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                <path d="M7 17L17 7" stroke="currentColor" stroke-linecap="round" stroke-width="2" />
                                <path d="M9 7H17V15" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                            </svg>
                        </a>

                        <a href="#projects" class="mirsaar-button mirsaar-button--secondary">
                            Previewni ko'rish
                        </a>
                    </div>

                    <div class="mirsaar-stat-grid mirsaar-reveal mirsaar-reveal--delay-4">
                        @foreach ($stats as $stat)
                            <article class="mirsaar-stat-card">
                                <p class="mirsaar-stat-value">{{ $stat['value'] }}</p>
                                <p class="mirsaar-stat-label">{{ $stat['label'] }}</p>
                            </article>
                        @endforeach
                    </div>
                </div>

                <div class="mirsaar-stage mirsaar-reveal mirsaar-reveal--delay-2">
                    <article class="mirsaar-float-card mirsaar-float-card--top">
                        <span class="mirsaar-float-icon" aria-hidden="true">
                            <svg viewBox="0 0 24 24" fill="none">
                                <path d="M12 3L19 7V17L12 21L5 17V7L12 3Z" stroke="currentColor" stroke-linejoin="round" stroke-width="1.8" />
                                <path d="M12 8V12L15 14" stroke="currentColor" stroke-linecap="round" stroke-width="1.8" />
                            </svg>
                        </span>
                        <div>
                            <p class="mirsaar-float-label">Fast Contact</p>
                            <strong>One tap NFC</strong>
                        </div>
                    </article>

                    <article class="mirsaar-stage-main">
                        <div class="mirsaar-stage-top">
                            <div class="mirsaar-stage-status">
                                <span></span>
                                <span></span>
                                <span></span>
                                <p>Signature arrival</p>
                            </div>

                            <span class="mirsaar-stage-badge">MIRSAAR</span>
                        </div>

                        <div class="mirsaar-stage-body">
                            <div class="mirsaar-stage-heading">
                                <p class="mirsaar-stage-overline">Luxury landing system</p>
                                <h2 class="mirsaar-stage-title">Premium header with visual depth.</h2>
                            </div>

                            <div class="mirsaar-stage-emblem" aria-hidden="true">
                                <div class="mirsaar-stage-core">
                                    <svg viewBox="0 0 72 72" fill="none">
                                        <circle cx="36" cy="36" r="31" stroke="currentColor" stroke-width="2.4" />
                                        <path d="M22 44L32.5 25H39L29.5 48" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="3.4" />
                                        <path d="M34 48L43.5 25H50L40.5 48" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="3.4" />
                                    </svg>
                                </div>
                            </div>

                            <ul class="mirsaar-stage-list">
                                <li>
                                    <span class="mirsaar-list-icon" aria-hidden="true">
                                        <svg viewBox="0 0 24 24" fill="none">
                                            <path d="M4 12H20" stroke="currentColor" stroke-linecap="round" stroke-width="1.8" />
                                            <path d="M12 4V20" stroke="currentColor" stroke-linecap="round" stroke-width="1.8" />
                                        </svg>
                                    </span>
                                    <div>
                                        <strong>Luxury navbar</strong>
                                        <p>Screenshot kayfiyati saqlangan, ammo premiumroq ishlab chiqilgan.</p>
                                    </div>
                                </li>
                                <li>
                                    <span class="mirsaar-list-icon" aria-hidden="true">
                                        <svg viewBox="0 0 24 24" fill="none">
                                            <path d="M12 3L20 7.5V16.5L12 21L4 16.5V7.5L12 3Z" stroke="currentColor" stroke-linejoin="round" stroke-width="1.8" />
                                            <path d="M8.5 12L11 14.5L15.5 10" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" />
                                        </svg>
                                    </span>
                                    <div>
                                        <strong>Icon va glow effects</strong>
                                        <p>Depth, light va motion birinchi ko'rinishni qimmatlashtiradi.</p>
                                    </div>
                                </li>
                                <li>
                                    <span class="mirsaar-list-icon" aria-hidden="true">
                                        <svg viewBox="0 0 24 24" fill="none">
                                            <path d="M6 18L18 6" stroke="currentColor" stroke-linecap="round" stroke-width="1.8" />
                                            <path d="M9 6H18V15" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" />
                                        </svg>
                                    </span>
                                    <div>
                                        <strong>Responsive first-screen</strong>
                                        <p>Desktopda sahnali kompozitsiya, mobil qurilmada toza stacked hero.</p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </article>

                    <article class="mirsaar-float-card mirsaar-float-card--side">
                        <span class="mirsaar-float-icon" aria-hidden="true">
                            <svg viewBox="0 0 24 24" fill="none">
                                <path d="M7 10.5H10L8.5 18H5.5L7 10.5ZM14 10.5H17L15.5 18H12.5L14 10.5ZM8.5 10C8.5 7.5 9.5 5.5 12 4M15.5 10C15.5 7.5 16.5 5.5 19 4" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" />
                            </svg>
                        </span>
                        <div>
                            <p class="mirsaar-float-label">Client feeling</p>
                            <strong>Premium first impression</strong>
                        </div>
                    </article>

                    <article class="mirsaar-float-card mirsaar-float-card--bottom">
                        <span class="mirsaar-float-icon" aria-hidden="true">
                            <svg viewBox="0 0 24 24" fill="none">
                                <path d="M4 7.5C4 6.12 5.12 5 6.5 5H17.5C18.88 5 20 6.12 20 7.5V16.5C20 17.88 18.88 19 17.5 19H6.5C5.12 19 4 17.88 4 16.5V7.5Z" stroke="currentColor" stroke-width="1.8" />
                                <path d="M6 8L12 12.5L18 8" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" />
                            </svg>
                        </span>
                        <div>
                            <p class="mirsaar-float-label">Ready to launch</p>
                            <strong>hello@mirsaar.uz</strong>
                        </div>
                    </article>

                    <div class="mirsaar-stage-ring" aria-hidden="true"></div>
                </div>
            </div>

            <div class="mirsaar-scroll-hint">
                <span aria-hidden="true"></span>
                premium details pastda davom etadi
            </div>
        </section>

        <section class="mirsaar-detail-section">
            <article class="mirsaar-brand-showcase">
                <div class="mirsaar-brand-pattern mirsaar-brand-pattern--tl" aria-hidden="true">
                    <svg viewBox="0 0 64 64" fill="none">
                        <circle cx="32" cy="32" r="29" stroke="currentColor" stroke-width="1.8" />
                        <path d="M18 39L28.5 22H35L25 42" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.4" />
                        <path d="M30 42L39 22H46L36.5 42" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.4" />
                    </svg>
                </div>
                <div class="mirsaar-brand-pattern mirsaar-brand-pattern--tr" aria-hidden="true">
                    <svg viewBox="0 0 64 64" fill="none">
                        <circle cx="32" cy="32" r="29" stroke="currentColor" stroke-width="1.8" />
                        <path d="M18 39L28.5 22H35L25 42" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.4" />
                        <path d="M30 42L39 22H46L36.5 42" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.4" />
                    </svg>
                </div>
                <div class="mirsaar-brand-pattern mirsaar-brand-pattern--bl" aria-hidden="true">
                    <svg viewBox="0 0 64 64" fill="none">
                        <circle cx="32" cy="32" r="29" stroke="currentColor" stroke-width="1.8" />
                        <path d="M18 39L28.5 22H35L25 42" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.4" />
                        <path d="M30 42L39 22H46L36.5 42" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.4" />
                    </svg>
                </div>
                <div class="mirsaar-brand-pattern mirsaar-brand-pattern--br" aria-hidden="true">
                    <svg viewBox="0 0 64 64" fill="none">
                        <circle cx="32" cy="32" r="29" stroke="currentColor" stroke-width="1.8" />
                        <path d="M18 39L28.5 22H35L25 42" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.4" />
                        <path d="M30 42L39 22H46L36.5 42" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.4" />
                    </svg>
                </div>

                <div class="mirsaar-brand-showcase-inner">
                    <span class="mirsaar-brand-showcase-mark" aria-hidden="true">
                        <svg viewBox="0 0 64 64" fill="none">
                            <circle cx="32" cy="32" r="29" stroke="currentColor" stroke-width="2.5" />
                            <path d="M18 39L28.5 22H35L25 42" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="3" />
                            <path d="M30 42L39 22H46L36.5 42" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="3" />
                        </svg>
                    </span>

                    <p class="mirsaar-brand-showcase-kicker">signature premium section</p>

                    <h2 class="mirsaar-brand-showcase-title">
                        <span>MIRSAAR</span>
                    </h2>

                    <p class="mirsaar-brand-showcase-copy">
                        Brendingiz uchun premium saytlar, NFC vizitkalar va taassurot qoldiradigan
                        digital tajriba yaratamiz. Har bir detalda aniqlik, premium ritm va vizual daraja saqlanadi.
                    </p>

                    <div class="mirsaar-brand-showcase-actions">
                        <a href="#contact" class="mirsaar-showcase-button mirsaar-showcase-button--primary">
                            Loyihani boshlash
                        </a>
                        <a href="#services" class="mirsaar-showcase-button mirsaar-showcase-button--secondary">
                            Xizmatlar
                        </a>
                        <a href="#reviews" class="mirsaar-showcase-button mirsaar-showcase-button--dark">
                            Sharhlar
                        </a>
                    </div>
                </div>
            </article>

            <article class="mirsaar-story-section" id="services">
                <div class="mirsaar-story-pattern mirsaar-story-pattern--left" aria-hidden="true">
                    <svg viewBox="0 0 64 64" fill="none">
                        <circle cx="32" cy="32" r="29" stroke="currentColor" stroke-width="1.8" />
                        <path d="M18 39L28.5 22H35L25 42" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.4" />
                        <path d="M30 42L39 22H46L36.5 42" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.4" />
                    </svg>
                </div>
                <div class="mirsaar-story-pattern mirsaar-story-pattern--right" aria-hidden="true">
                    <svg viewBox="0 0 64 64" fill="none">
                        <circle cx="32" cy="32" r="29" stroke="currentColor" stroke-width="1.8" />
                        <path d="M18 39L28.5 22H35L25 42" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.4" />
                        <path d="M30 42L39 22H46L36.5 42" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.4" />
                    </svg>
                </div>

                <div class="mirsaar-story-grid">
                    <div class="mirsaar-story-copy">
                        <p class="mirsaar-section-kicker">about studio</p>
                        <h2 class="mirsaar-story-title">Raqamli tajribada nafislik va aniqlik birga ishlaydi.</h2>
                        <p class="mirsaar-story-lead">
                            Bu qism oldingi premium kayfiyatni davom ettiradi, lekin kontentni ortiqcha
                            ko'paytirmaydi. Biz dizayn, texnik asos va premium taqdimotni bitta sokin ritmda birlashtiramiz.
                        </p>

                        <article class="mirsaar-story-note">
                            <span class="mirsaar-story-note-icon" aria-hidden="true">
                                <svg viewBox="0 0 24 24" fill="none">
                                    <path d="M12 4L14.3 8.2L19 8.8L15.6 12.1L16.4 16.8L12 14.5L7.6 16.8L8.4 12.1L5 8.8L9.7 8.2L12 4Z" stroke="currentColor" stroke-linejoin="round" stroke-width="1.8" />
                                </svg>
                            </span>
                            <p>
                                Mirsaar premium web-yechimlar yaratadi: ko'rinish faqat chiroyli emas,
                                balki brendni qimmatroq his qildiradigan aniqlik bilan quriladi.
                            </p>
                        </article>

                        <article class="mirsaar-story-quote" id="reviews">
                            <p>
                                "Yaxshi sahifa shunchaki bezak emas. U foydalanuvchiga ishonch,
                                brendga esa daraja beradi."
                            </p>
                        </article>

                        <div class="mirsaar-story-points">
                            @foreach ($storyMetrics as $metric)
                                <article class="mirsaar-story-point" id="{{ $metric['id'] }}">
                                    <strong>{{ $metric['value'] }}</strong>
                                    <span>{{ $metric['label'] }}</span>
                                </article>
                            @endforeach
                        </div>
                    </div>

                    <div class="mirsaar-story-visual">
                        <div class="mirsaar-story-glow" aria-hidden="true"></div>

                        <article class="mirsaar-device-stage">
                            <div class="mirsaar-visual-badge">premium composition</div>

                            <div class="mirsaar-device-desktop">
                                <div class="mirsaar-device-topbar">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </div>
                                <div class="mirsaar-device-hero-band"></div>
                                <div class="mirsaar-device-grid">
                                    <div class="mirsaar-device-panel mirsaar-device-panel--large"></div>
                                    <div class="mirsaar-device-panel"></div>
                                    <div class="mirsaar-device-panel"></div>
                                </div>
                            </div>

                            <div class="mirsaar-device-tablet">
                                <div class="mirsaar-device-screen">
                                    <div class="mirsaar-device-line"></div>
                                    <div class="mirsaar-device-line"></div>
                                    <div class="mirsaar-device-line mirsaar-device-line--short"></div>
                                </div>
                            </div>

                            <div class="mirsaar-device-phone">
                                <div class="mirsaar-device-screen">
                                    <div class="mirsaar-device-dot"></div>
                                    <div class="mirsaar-device-stack"></div>
                                    <div class="mirsaar-device-stack mirsaar-device-stack--small"></div>
                                </div>
                            </div>
                        </article>
                    </div>
                </div>
            </article>

            <article class="mirsaar-craft-section" id="support">
                <div class="mirsaar-craft-pattern mirsaar-craft-pattern--left" aria-hidden="true">
                    <svg viewBox="0 0 64 64" fill="none">
                        <circle cx="32" cy="32" r="29" stroke="currentColor" stroke-width="1.8" />
                        <path d="M18 39L28.5 22H35L25 42" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.4" />
                        <path d="M30 42L39 22H46L36.5 42" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.4" />
                    </svg>
                </div>
                <div class="mirsaar-craft-pattern mirsaar-craft-pattern--right" aria-hidden="true">
                    <svg viewBox="0 0 64 64" fill="none">
                        <circle cx="32" cy="32" r="29" stroke="currentColor" stroke-width="1.8" />
                        <path d="M18 39L28.5 22H35L25 42" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.4" />
                        <path d="M30 42L39 22H46L36.5 42" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.4" />
                    </svg>
                </div>

                <div class="mirsaar-craft-grid">
                    <div class="mirsaar-craft-copy">
                        <p class="mirsaar-section-kicker">about company</p>
                        <h2 class="mirsaar-craft-title">Raqam ichida san'at, taqdimotda esa premium sokinlik.</h2>
                        <p class="mirsaar-craft-lead">
                            Screenshot kayfiyatidagi ushbu blok Mirsaar uslubiga moslashtirildi: kontent ixcham,
                            CTA bitta, lekin ranglar, qatlamlar va mayin motionlar hisobiga sahifa qimmat va nazoratli ko'rinadi.
                        </p>

                        <div class="mirsaar-craft-stack">
                            <article class="mirsaar-craft-card">
                                <span class="mirsaar-feature-icon" aria-hidden="true">
                                    <svg viewBox="0 0 24 24" fill="none">
                                        <path d="M12 4L14.3 8.2L19 8.8L15.6 12.1L16.4 16.8L12 14.5L7.6 16.8L8.4 12.1L5 8.8L9.7 8.2L12 4Z" stroke="currentColor" stroke-linejoin="round" stroke-width="1.8" />
                                    </svg>
                                </span>
                                <div>
                                    <small>premium composition</small>
                                    <strong>Kamroq tugma, ko'proq ishonch</strong>
                                    <p>Foydalanuvchi ortiqcha tanlovda qolmaydi, sahifa esa boshqarilgan va premium his beradi.</p>
                                </div>
                            </article>

                            <article class="mirsaar-craft-card is-featured">
                                <span class="mirsaar-feature-icon" aria-hidden="true">
                                    <svg viewBox="0 0 24 24" fill="none">
                                        <path d="M12 3L20 7.5V16.5L12 21L4 16.5V7.5L12 3Z" stroke="currentColor" stroke-linejoin="round" stroke-width="1.8" />
                                        <path d="M12 8V12L15 14" stroke="currentColor" stroke-linecap="round" stroke-width="1.8" />
                                    </svg>
                                </span>
                                <div>
                                    <small>signature direction</small>
                                    <strong>Dizayn va texnika bir tempda ishlaydi</strong>
                                    <p>Tipografika, rang, glow va animatsiya bir-birini to'ldirib, brendni qimmatroq ko'rsatadi.</p>
                                </div>
                            </article>

                            <article class="mirsaar-craft-card">
                                <span class="mirsaar-feature-icon" aria-hidden="true">
                                    <svg viewBox="0 0 24 24" fill="none">
                                        <path d="M12 3L19 6V11.8C19 15.1 16.9 18.1 12 21C7.1 18.1 5 15.1 5 11.8V6L12 3Z" stroke="currentColor" stroke-linejoin="round" stroke-width="1.8" />
                                        <path d="M9 12.2L11.2 14.4L15.2 10.4" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" />
                                    </svg>
                                </span>
                                <div>
                                    <small>stable delivery</small>
                                    <strong>Web va NFC bitta premium oqimga ulanadi</strong>
                                    <p>Vizitka, landing va aloqa jarayoni uzilmaydi, shu sabab first impression kuchliroq qoladi.</p>
                                </div>
                            </article>
                        </div>

                        <a href="#contact" class="mirsaar-button mirsaar-button--primary mirsaar-craft-button">
                            Yondashuv haqida ko'proq
                            <svg viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                <path d="M7 17L17 7" stroke="currentColor" stroke-linecap="round" stroke-width="2" />
                                <path d="M9 7H17V15" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                            </svg>
                        </a>
                    </div>

                    <div class="mirsaar-craft-visual">
                        <div class="mirsaar-craft-glow" aria-hidden="true"></div>

                        <div class="mirsaar-craft-stage">
                            <div class="mirsaar-craft-pill-row" aria-hidden="true">
                                <span>Art direction</span>
                                <span>UX clarity</span>
                                <span>NFC ready</span>
                            </div>

                            <article class="mirsaar-craft-desktop">
                                <div class="mirsaar-craft-desktop-top">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                    <p>mirsaar signature layout</p>
                                </div>

                                <div class="mirsaar-craft-screen">
                                    <div class="mirsaar-craft-screen-sidebar">
                                        <div class="mirsaar-craft-line"></div>
                                        <div class="mirsaar-craft-line"></div>
                                        <div class="mirsaar-craft-line mirsaar-craft-line--short"></div>
                                    </div>

                                    <div class="mirsaar-craft-main">
                                        <div class="mirsaar-craft-hero-band"></div>

                                        <div class="mirsaar-craft-preview-grid">
                                            <div class="mirsaar-craft-preview-panel mirsaar-craft-preview-panel--xl"></div>
                                            <div class="mirsaar-craft-preview-panel"></div>
                                            <div class="mirsaar-craft-preview-panel mirsaar-craft-preview-panel--accent"></div>
                                        </div>
                                    </div>
                                </div>
                            </article>

                            <article class="mirsaar-craft-mobile">
                                <div class="mirsaar-craft-mobile-screen">
                                    <div class="mirsaar-craft-mobile-hero"></div>
                                    <div class="mirsaar-craft-mobile-stack"></div>
                                    <div class="mirsaar-craft-mobile-stack mirsaar-craft-mobile-stack--small"></div>
                                    <div class="mirsaar-craft-mobile-stack mirsaar-craft-mobile-stack--small"></div>
                                </div>
                            </article>

                            <article class="mirsaar-craft-float mirsaar-craft-float--left">
                                <strong>Art in digital</strong>
                                <p>Premium motion va sokin kompozitsiya.</p>
                            </article>

                            <article class="mirsaar-craft-float mirsaar-craft-float--right">
                                <strong>01 main action</strong>
                                <p>Foydalanuvchi yo'li ortiqcha chalg'imaydi.</p>
                            </article>

                            <div class="mirsaar-craft-ring" aria-hidden="true"></div>
                        </div>
                    </div>
                </div>
            </article>

            <article class="mirsaar-works-section" id="projects">
                <div class="mirsaar-works-head mirsaar-reveal">
                    <p class="mirsaar-works-kicker">bizning ishlar</p>
                    <h2 class="mirsaar-works-title">BIZNING ISHLAR</h2>
                    <p class="mirsaar-works-lead">
                        Dasturlash va web-product yo'nalishidagi chiroyli project previewlar 2 ta yo'lakda ko'rinadi.
                        Endi kartalar ichida haqiqiy portfolio rasmlari ishlaydi, shu sabab showcase ancha jonli ko'rinadi.
                    </p>
                </div>

                <div class="mirsaar-works-marquee">
                    @foreach ($portfolioRows as $rowIndex => $projects)
                        <div class="mirsaar-works-row {{ $rowIndex % 2 === 1 ? 'is-reverse' : '' }}">
                            <div class="mirsaar-works-track">
                                @for ($copy = 0; $copy < 2; $copy++)
                                    @foreach ($projects as $project)
                                        <article
                                            class="mirsaar-work-card mirsaar-work-card--{{ $project['theme'] }} mirsaar-work-card--{{ $project['layout'] }}"
                                            @if ($copy === 1) aria-hidden="true" @endif
                                        >
                                            <div class="mirsaar-work-card__copy">
                                                <p class="mirsaar-work-card__label">{{ $project['label'] }}</p>
                                                <h3 class="mirsaar-work-card__title">{{ $project['title'] }}</h3>
                                            </div>

                                            <div class="mirsaar-work-card__preview" aria-hidden="true">
                                                <div class="mirsaar-work-card__desktop">
                                                    <div class="mirsaar-work-card__desktop-top">
                                                        <span></span>
                                                        <span></span>
                                                        <span></span>
                                                    </div>

                                                    <div class="mirsaar-work-card__desktop-screen">
                                                        <img
                                                            src="{{ asset($project['image']) }}"
                                                            alt="{{ $project['title'] }} preview"
                                                            class="mirsaar-work-card__image"
                                                            loading="lazy"
                                                        >
                                                    </div>
                                                </div>

                                                <div class="mirsaar-work-card__phone">
                                                    <div class="mirsaar-work-card__phone-screen">
                                                        <img
                                                            src="{{ asset($project['image']) }}"
                                                            alt=""
                                                            class="mirsaar-work-card__phone-image"
                                                            loading="lazy"
                                                        >
                                                    </div>
                                                </div>
                                            </div>
                                        </article>
                                    @endforeach
                                @endfor
                            </div>
                        </div>
                    @endforeach
                </div>
            </article>

            <article class="mirsaar-service-promo">
                <div class="mirsaar-brand-pattern mirsaar-brand-pattern--tl" aria-hidden="true">
                    <svg viewBox="0 0 64 64" fill="none">
                        <circle cx="32" cy="32" r="29" stroke="currentColor" stroke-width="1.8" />
                        <path d="M18 39L28.5 22H35L25 42" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.4" />
                        <path d="M30 42L39 22H46L36.5 42" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.4" />
                    </svg>
                </div>
                <div class="mirsaar-brand-pattern mirsaar-brand-pattern--tr" aria-hidden="true">
                    <svg viewBox="0 0 64 64" fill="none">
                        <circle cx="32" cy="32" r="29" stroke="currentColor" stroke-width="1.8" />
                        <path d="M18 39L28.5 22H35L25 42" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.4" />
                        <path d="M30 42L39 22H46L36.5 42" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.4" />
                    </svg>
                </div>
                <div class="mirsaar-brand-pattern mirsaar-brand-pattern--bl" aria-hidden="true">
                    <svg viewBox="0 0 64 64" fill="none">
                        <circle cx="32" cy="32" r="29" stroke="currentColor" stroke-width="1.8" />
                        <path d="M18 39L28.5 22H35L25 42" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.4" />
                        <path d="M30 42L39 22H46L36.5 42" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.4" />
                    </svg>
                </div>
                <div class="mirsaar-brand-pattern mirsaar-brand-pattern--br" aria-hidden="true">
                    <svg viewBox="0 0 64 64" fill="none">
                        <circle cx="32" cy="32" r="29" stroke="currentColor" stroke-width="1.8" />
                        <path d="M18 39L28.5 22H35L25 42" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.4" />
                        <path d="M30 42L39 22H46L36.5 42" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.4" />
                    </svg>
                </div>

                <div class="mirsaar-service-promo-card">
                    <h2 class="mirsaar-service-promo-title">Наши Услуги</h2>
                    <p class="mirsaar-service-promo-copy">
                        От разработки брендинга до продвижения в топовые позиции.
                    </p>

                    <a href="#services" class="mirsaar-showcase-button mirsaar-showcase-button--primary">
                        Смотреть все услуги
                        <svg viewBox="0 0 24 24" fill="none" aria-hidden="true">
                            <path d="M7 12H17" stroke="currentColor" stroke-linecap="round" stroke-width="2" />
                            <path d="M12 7L17 12L12 17" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                        </svg>
                    </a>
                </div>
            </article>

            <footer class="mirsaar-footer" id="contact">
                <div class="mirsaar-footer__grid">
                    <div class="mirsaar-footer__brand mirsaar-reveal">
                        <a href="#home" class="mirsaar-footer__brand-link" aria-label="Mirsaar">
                            <span class="mirsaar-footer__mark" aria-hidden="true">
                                <svg viewBox="0 0 64 64" fill="none">
                                    <circle cx="32" cy="32" r="29" stroke="currentColor" stroke-width="2.5" />
                                    <path d="M18 39L28.5 22H35L25 42" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="3" />
                                    <path d="M30 42L39 22H46L36.5 42" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="3" />
                                </svg>
                            </span>

                            <span class="mirsaar-footer__brand-copy">
                                <strong>Mirsaar</strong>
                                <small>premium web studio</small>
                            </span>
                        </a>

                        <p class="mirsaar-footer__lead">
                            Premium saytlar, NFC vizitkalar va kuchli first impression beradigan
                            raqamli taqdimotlar yaratamiz. Har bir detal brend qadrini oshirishi uchun ishlanadi.
                        </p>

                        <a href="mailto:hello@mirsaar.uz" class="mirsaar-footer__cta">
                            hello@mirsaar.uz
                        </a>
                    </div>

                    <div class="mirsaar-footer__menu mirsaar-reveal mirsaar-reveal--delay-1">
                        <p class="mirsaar-footer__title">Menyu</p>

                        <nav class="mirsaar-footer__links" aria-label="Footer navigation">
                            @foreach ($footerMenu as $item)
                                <a href="{{ $item['href'] }}" class="mirsaar-footer__link">
                                    {{ $item['label'] }}
                                </a>
                            @endforeach
                        </nav>
                    </div>

                    <div class="mirsaar-footer__contact mirsaar-reveal mirsaar-reveal--delay-2">
                        <p class="mirsaar-footer__title">Aloqa</p>

                        <div class="mirsaar-footer__contact-list">
                            @foreach ($footerContacts as $item)
                                <a href="{{ $item['href'] }}" class="mirsaar-footer__contact-item">
                                    <span class="mirsaar-footer__contact-icon" aria-hidden="true">
                                        @if ($item['icon'] === 'mail')
                                            <svg viewBox="0 0 24 24" fill="none">
                                                <path d="M4 7H20V17H4V7Z" stroke="currentColor" stroke-linejoin="round" stroke-width="1.8" />
                                                <path d="M5 8L12 13L19 8" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" />
                                            </svg>
                                        @elseif ($item['icon'] === 'shield')
                                            <svg viewBox="0 0 24 24" fill="none">
                                                <path d="M12 3L19 6V11.8C19 15.1 16.9 18.1 12 21C7.1 18.1 5 15.1 5 11.8V6L12 3Z" stroke="currentColor" stroke-linejoin="round" stroke-width="1.8" />
                                                <path d="M9.4 11.8L11.3 13.7L14.8 10.2" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" />
                                            </svg>
                                        @else
                                            <svg viewBox="0 0 24 24" fill="none">
                                                <path d="M12 4L14.2 8.4L19 9.1L15.5 12.5L16.3 17.2L12 14.9L7.7 17.2L8.5 12.5L5 9.1L9.8 8.4L12 4Z" stroke="currentColor" stroke-linejoin="round" stroke-width="1.8" />
                                            </svg>
                                        @endif
                                    </span>

                                    <span class="mirsaar-footer__contact-copy">
                                        <small>{{ $item['label'] }}</small>
                                        <strong>{{ $item['value'] }}</strong>
                                    </span>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="mirsaar-footer__bottom">
                    <p>&copy; {{ now()->year }} Mirsaar. Barcha huquqlar himoyalangan.</p>
                    <span class="mirsaar-footer__pill">Maxfiylik va sifat standarti</span>
                </div>
            </footer>
        </section>
    </div>
</div>
