<div class="mirsaar-page" id="home" x-data="{ mobileOpen: false }">
    <div class="mirsaar-orb mirsaar-orb--left" aria-hidden="true"></div>
    <div class="mirsaar-orb mirsaar-orb--right" aria-hidden="true"></div>
    <div class="mirsaar-tech-sky" aria-hidden="true">
        <div class="mirsaar-tech-sky__mesh"></div>
        <div class="mirsaar-tech-sky__beam mirsaar-tech-sky__beam--one"></div>
        <div class="mirsaar-tech-sky__beam mirsaar-tech-sky__beam--two"></div>
        <div class="mirsaar-tech-sky__beam mirsaar-tech-sky__beam--three"></div>
        <div class="mirsaar-tech-panel mirsaar-tech-panel--left">
            <span>const pipeline = leads.sync('mirsaar')</span>
            <span>deploy.crm({ latency: 'low', uptime: '24/7' })</span>
            <span>animate.hero({ mode: 'premium', depth: 3 })</span>
        </div>
        <div class="mirsaar-tech-panel mirsaar-tech-panel--right">
            <span>&lt;Dashboard /&gt; ready for launch</span>
            <span>git commit -m "ship premium flow"</span>
            <span>admin.monitor({ services, inquiries, reviews })</span>
        </div>
        <div class="mirsaar-tech-orbit"></div>
    </div>

    <div class="mirsaar-shell">
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
                            <small>просто. точно. мощно.</small>
                        </span>
                    </a>

                    <nav class="mirsaar-nav-links" aria-label="Primary navigation">
                        @foreach ($navItems as $item)
                            <a href="{{ $item['href'] }}" class="mirsaar-nav-link">{{ $item['label'] }}</a>
                        @endforeach
                    </nav>

                    <div class="mirsaar-nav-side">
                        <a href="{{ route('admin.login') }}" class="mirsaar-admin-link">Admin</a>

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

                    <a href="{{ route('admin.login') }}" class="mirsaar-mobile-link mirsaar-mobile-link--admin" @click="mobileOpen = false">
                        Admin panel
                    </a>

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

        <section class="mirsaar-hero mirsaar-hero--smm">
            <div class="mirsaar-hero-grid">
                <div class="mirsaar-copy">
                    <p class="mirsaar-kicker mirsaar-reveal">
                        <span class="mirsaar-kicker-dot" aria-hidden="true"></span>
                        {{ $hero['eyebrow'] }}
                    </p>

                    <h1 class="mirsaar-title mirsaar-title--smm mirsaar-reveal mirsaar-reveal--delay-1">
                        <span>{{ $hero['specialist_name'] }}</span>
                        <em>{{ $hero['headline'] }}</em>
                    </h1>

                    <p class="mirsaar-lead mirsaar-reveal mirsaar-reveal--delay-2">
                        {{ $hero['bio'] }}
                    </p>

                    <div class="mirsaar-chip-row mirsaar-reveal mirsaar-reveal--delay-2">
                        @foreach ($heroTags as $tag)
                            <span class="mirsaar-info-chip">{{ $tag }}</span>
                        @endforeach
                    </div>

                    <div class="mirsaar-cta-row mirsaar-reveal mirsaar-reveal--delay-3">
                        <a href="{{ $hero['primary_cta_url'] }}" class="mirsaar-button mirsaar-button--primary">
                            {{ $hero['primary_cta_label'] }}
                            <svg viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                <path d="M7 17L17 7" stroke="currentColor" stroke-linecap="round" stroke-width="2" />
                                <path d="M9 7H17V15" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                            </svg>
                        </a>

                        <a href="{{ $hero['secondary_cta_url'] }}" class="mirsaar-button mirsaar-button--secondary">
                            {{ $hero['secondary_cta_label'] }}
                        </a>

                        <a href="{{ $hero['tertiary_cta_url'] }}" class="mirsaar-button mirsaar-button--text">
                            {{ $hero['tertiary_cta_label'] }}
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

                <div class="mirsaar-profile-stage mirsaar-reveal mirsaar-reveal--delay-2">
                    <article class="mirsaar-profile-card">
                        <div class="mirsaar-profile-card__media">
                            @if ($hero['hero_image_url'])
                                <img src="{{ $hero['hero_image_url'] }}" alt="{{ $hero['specialist_name'] }}">
                            @else
                                <div class="mirsaar-profile-card__fallback" aria-hidden="true">
                                    {{ strtoupper(mb_substr($hero['specialist_name'], 0, 1)) }}
                                </div>
                            @endif
                        </div>

                        <div class="mirsaar-profile-card__body">
                            <p>SMM growth system</p>
                            <strong>{{ $hero['specialist_name'] }}</strong>
                            <span>{{ $hero['headline'] }}</span>
                        </div>
                    </article>

                    <article class="mirsaar-profile-floating mirsaar-profile-floating--top">
                        <span>IG</span>
                        <div>
                            <strong>Kontent strategiya</strong>
                            <small>post, reels, stories ritmi</small>
                        </div>
                    </article>

                    <article class="mirsaar-profile-floating mirsaar-profile-floating--bottom">
                        <span>ROI</span>
                        <div>
                            <strong>Lead va reach</strong>
                            <small>analitika asosida o'sish</small>
                        </div>
                    </article>
                </div>
            </div>

            <div class="mirsaar-scroll-hint">
                <span aria-hidden="true"></span>
                portfolio va xizmatlar pastda davom etadi
            </div>
        </section>

        @if (false)
        <section class="mirsaar-hero mirsaar-hero--legacy" hidden>
            <div class="mirsaar-hero-grid">
                <div class="mirsaar-copy">
                    <p class="mirsaar-kicker mirsaar-reveal">
                        <span class="mirsaar-kicker-dot" aria-hidden="true"></span>
                        software studio / движение кода / эффект полного погружения
                    </p>

                    <h1 class="mirsaar-title mirsaar-reveal mirsaar-reveal--delay-1">

                        <span>MIRSAAR</span>
                        <em>digital</em>
                        <span>решения для современного бизнеса.</span>
                    </h1>

                    <p class="mirsaar-lead mirsaar-reveal mirsaar-reveal--delay-2">
                        MIRSAAR — это команда специалистов в области веб-разработки, дизайна и цифровых технологий.
                    Мы помогаем компаниям выходить на новый уровень с помощью современных IT-решений.
                    Наша цель — не просто создать продукт, а дать бизнесу инструмент, который реально работает и приносит прибыль.
                    Мы используем современные технологии, такие как:

                        <span>Software</span>
                        <em>Mirsaar</em>
                        <span>для премиального первого экрана</span>
                    </h1>

                    <div class="mirsaar-chip-row mirsaar-reveal mirsaar-reveal--delay-2">
                        @foreach ($heroTags as $tag)
                            <span class="mirsaar-info-chip">{{ $tag }}</span>
                        @endforeach
                    </div>

                    <div class="mirsaar-cta-row mirsaar-reveal mirsaar-reveal--delay-3">
                        <a href="#contact" class="mirsaar-button mirsaar-button--primary">
                            Начать проект
                            <svg viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                <path d="M7 17L17 7" stroke="currentColor" stroke-linecap="round" stroke-width="2" />
                                <path d="M9 7H17V15" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                            </svg>
                        </a>

                        <a href="#projects" class="mirsaar-button mirsaar-button--secondary">
                            Посмотреть проекты
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
                            <p class="mirsaar-float-label">Быстрый запуск</p>
                            <strong>Мгновенный деплой</strong>
                        </div>
                    </article>


                    <article class="mirsaar-stage-main">
                        <div class="mirsaar-stage-top">
                            <div class="mirsaar-stage-status">
                                <span></span>
                                <span></span>
                                <span></span>
                                <p>Сборка активна</p>
                            </div>

                            <span class="mirsaar-stage-badge">MIRSAAR</span>
                        </div>

                        <div class="mirsaar-stage-body">
                            <div class="mirsaar-stage-heading">
                                <p class="mirsaar-stage-overline">Система запуска ПО</p>
                                <h2 class="mirsaar-stage-title">Полноэкранный header с анимацией на основе кода</h2>
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
                                        <strong>Полноширинный navbar</strong>
                                        <p>Улучшена sticky-навигация, вход в админ-панель перенесён в правый верхний угол.</p>
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
                                        <strong>Анимации кода и glow-эффекты</strong>
                                        <p>Beam, панели и grid-анимации в стиле разработки усиливают визуальное восприятие.</p>
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
                                        <strong>Адаптивный первый экран</strong>
                                        <p>На десктопе — сценическая композиция, на мобильных — аккуратный stacked hero.</p>
                                    </div>
                                </li>
                            </ul>
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

        @endif

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

                    <p class="mirsaar-brand-showcase-kicker">nima uchun SMM bilan ishlashadi</p>

                    <h2 class="mirsaar-brand-showcase-title">
                        <span>SMM</span>
                        <em>growth</em>
                    </h2>

                    <p class="mirsaar-brand-showcase-copy">
                        Strategiya, kontent plan, reels, target reklama va analitika bitta ritmda ishlaydi.
                        Har bir post va kampaniya biznes maqsadga ulanadi: reach, lead, sotuv yoki personal brand.
                    </p>

                    <div class="mirsaar-brand-showcase-actions">
                        <a href="#contact-form" class="mirsaar-showcase-button mirsaar-showcase-button--primary">
                            Konsultatsiya olish
                        </a>
                        <a href="#services" class="mirsaar-showcase-button mirsaar-showcase-button--secondary">
                            Xizmatlar
                        </a>
                        <a href="#projects" class="mirsaar-showcase-button mirsaar-showcase-button--dark">
                            Keyslar
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

                <div class="mirsaar-story-grid mirsaar-smm-services">
                    <div class="mirsaar-story-copy">
                        <p class="mirsaar-section-kicker">xizmatlar</p>
                        <h2 class="mirsaar-story-title">SMM strategiya, kontent va reklamani bitta aniq tizimga yig'amiz.</h2>
                        <p class="mirsaar-story-lead">
                            Xizmatlar admin paneldan boshqariladi: nomi, narxi, icon kaliti, benefit va aktiv holati o'zgarsa,
                            asosiy sahifa ham darhol yangilanadi.
                        </p>

                        <article class="mirsaar-story-note">
                            <span class="mirsaar-story-note-icon" aria-hidden="true">
                                <svg viewBox="0 0 24 24" fill="none">
                                    <path d="M5 12H19" stroke="currentColor" stroke-linecap="round" stroke-width="1.8" />
                                    <path d="M12 5V19" stroke="currentColor" stroke-linecap="round" stroke-width="1.8" />
                                </svg>
                            </span>
                            <p>
                                Har bir xizmat biznes maqsadga bog'lanadi: reach, lead, sotuv, personal brand yoki auditoriya ishonchi.
                            </p>
                        </article>

                        <div class="mirsaar-story-points">
                            @foreach ($stats as $metric)
                                <article class="mirsaar-story-point">
                                    <strong>{{ $metric['value'] }}</strong>
                                    <span>{{ $metric['label'] }}</span>
                                </article>
                            @endforeach
                        </div>
                    </div>

                    <div class="mirsaar-service-grid">
                        @foreach ($services as $service)
                            <article class="mirsaar-service-card">
                                <div class="mirsaar-service-card__top">
                                    <span class="mirsaar-service-card__icon">{{ strtoupper(mb_substr($service['icon'] ?? $service['title'], 0, 2)) }}</span>
                                    @if (! empty($service['price']))
                                        <strong class="mirsaar-service-card__price">{{ $service['price'] }}</strong>
                                    @endif
                                </div>

                                <h3>{{ $service['title'] }}</h3>

                                @if (! empty($service['description']))
                                    <p>{{ $service['description'] }}</p>
                                @endif

                                @if (! empty($service['benefit']))
                                    <span class="mirsaar-service-card__benefit">{{ $service['benefit'] }}</span>
                                @endif
                            </article>
                        @endforeach
                    </div>
                </div>

                @if (false)
                <div class="mirsaar-story-grid">
                    <div class="mirsaar-story-copy">
                        <p class="mirsaar-section-kicker">about studio</p>
                        <h2 class="mirsaar-story-title">Изысканность и точность работают вместе в цифровом опыте.</h2>
                        <p class="mirsaar-story-lead">
                            Этот раздел продолжает премиальное настроение, не перегружая контент. Мы объединяем дизайн, 
                            техническую основу и презентацию в едином спокойном ритме
                        </p>

                        <article class="mirsaar-story-note">
                            <span class="mirsaar-story-note-icon" aria-hidden="true">
                                <svg viewBox="0 0 24 24" fill="none">
                                    <path d="M12 4L14.3 8.2L19 8.8L15.6 12.1L16.4 16.8L12 14.5L7.6 16.8L8.4 12.1L5 8.8L9.7 8.2L12 4Z" stroke="currentColor" stroke-linejoin="round" stroke-width="1.8" />
                                </svg>
                            </span>
                            <p>
                               Mirsaar создаёт премиальные веб-решения: визуал — это не просто эстетика,
                             а продуманная система, которая усиливает восприятие бренда и делает его дороже в глазах клиента.
                            </p>
                        </article>

                        <article class="mirsaar-story-quote">
                            <p>
                                «Хорошая страница — это не просто оформление.
                                Она создаёт доверие у пользователя и формирует уровень бренда.»
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
                @endif
            </article>

            @if (false)
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
                                    <small>премиальная композиция</small>
                                    <strong>Меньше кнопок — больше доверия</strong>
                                    <p>Пользователь не перегружен выбором, а интерфейс остаётся управляемым и создаёт ощущение премиальности.</p>
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
                                    <small>фирменное направление</small>
                                    <strong>Дизайн и технология работают в одном ритме</strong>
                                    <p>Типографика, цвет, glow и анимации дополняют друг друга, усиливая ощущение ценности бренда.</p>
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
                                    <small>signature direction</small>
                                    <strong>Единый ритм дизайна и технологий</strong>
                                    <p>Шрифты, цвета и анимации синхронизированы, формируя цельный и более дорогой визуальный образ.</p>
                                </div>
                            </article>
                        </div>

                        <a href="#contact" class="mirsaar-button mirsaar-button--primary mirsaar-craft-button">
                            Подробнее о подходе
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
                                <span>Code motion</span>
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
                                <strong>Искусство в цифре</strong>
                                <p>Премиальная анимация и спокойная композиция</p>
                            </article>

                            <article class="mirsaar-craft-float mirsaar-craft-float--right">
                                <strong>01 основное действие</strong>
                                <p>Пользовательский путь остаётся чистым и без лишних отвлечений</p>
                            </article>

                            <div class="mirsaar-craft-ring" aria-hidden="true"></div>
                        </div>
                    </div>
                </div>
            </article>
            @endif

            <article class="mirsaar-works-section" id="projects">
                <div class="mirsaar-works-head mirsaar-reveal">
                    <p class="mirsaar-works-kicker">keyslar / portfolio</p>
                    <h2 class="mirsaar-works-title">SMM CASE STUDY</h2>
                    <p class="mirsaar-works-lead">
                        Admin paneldan boshqariladigan portfolio: klient niche, oldingi holat,
                        qilingan ish, platforma va natija sahifada case-study formatida chiqadi.
                    </p>
                </div>

                @php($projectItems = collect($portfolioRows)->flatten(1))
                @php($crmProject = $projectItems->firstWhere('is_featured', true) ?? $projectItems->first())

                @if ($crmProject)
                <div class="mirsaar-crm-feature mirsaar-reveal mirsaar-reveal--delay-1">
                    <div class="mirsaar-crm-feature__copy">
                        <p class="mirsaar-crm-feature__eyebrow">{{ $crmProject['platform'] ?? $crmProject['label'] }}</p>
                        <h3 class="mirsaar-crm-feature__title">{{ $crmProject['title'] }}</h3>
                        <p class="mirsaar-crm-feature__lead">
                           {{ $crmProject['description'] ?? 'Case preview yirik blokda ko\'rinadi, pastdagi lenta esa SMM natijalarini premium uslubda davom ettiradi.' }}
                        </p>
                        

                        <div class="mirsaar-crm-feature__meta">
                            @if (! empty($crmProject['client_niche']))
                                <span>{{ $crmProject['client_niche'] }}</span>
                            @endif
                            @if (! empty($crmProject['platform']))
                                <span>{{ $crmProject['platform'] }}</span>
                            @endif
                            @if (! empty($crmProject['result']))
                                <span>{{ $crmProject['result'] }}</span>
                            @endif
                        </div>

                        <div class="mirsaar-case-steps">
                            @if (! empty($crmProject['before_state']))
                                <article class="mirsaar-case-step">
                                    <span>Oldingi holat</span>
                                    <p>{{ $crmProject['before_state'] }}</p>
                                </article>
                            @endif
                            @if (! empty($crmProject['work_done']))
                                <article class="mirsaar-case-step">
                                    <span>Qilingan ish</span>
                                    <p>{{ $crmProject['work_done'] }}</p>
                                </article>
                            @endif
                        </div>

                        @if (false)
                  <div class="mirsaar-crm-feature__meta">
                            <span>Воронка продаж</span>
                            <span>Отслеживание лидов</span>
                            <span>Активность клиентов</span>
                    </div>
                        @endif
                    </div>

                    <div class="mirsaar-crm-feature__stage">
                        <div class="mirsaar-crm-feature__window">
                            <div class="mirsaar-crm-feature__window-bar" aria-hidden="true">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>

                            <div class="mirsaar-crm-feature__window-screen">
                                <img
                                    src="{{ asset($crmProject['image'] ?? 'images/projects/devsuite-crm.svg') }}"
                                    alt="{{ $crmProject['title'] }} preview"
                                    class="mirsaar-crm-feature__image"
                                    loading="lazy"
                                >
                            </div>
                        </div>

                        <div class="mirsaar-crm-feature__badge">{{ $crmProject['result'] ?? 'case study' }}</div>
                    </div>
                </div>
                @endif

                <div class="mirsaar-crm-gallery">
                    @foreach ($portfolioRows as $rowIndex => $projects)
                        <div class="mirsaar-crm-gallery-row {{ $rowIndex % 2 === 1 ? 'is-reverse' : '' }}">
                            <div class="mirsaar-crm-gallery-track">
                                @for ($copy = 0; $copy < 2; $copy++)
                                    @foreach ($projects as $project)
                                        <article
                                            class="mirsaar-crm-gallery-card mirsaar-work-card--{{ $project['theme'] ?? 'bronze' }}"
                                            @if ($copy === 1) aria-hidden="true" @endif
                                        >
                                            <div class="mirsaar-crm-gallery-card__frame">
                                                <img
                                                    src="{{ asset($project['image'] ?? 'images/projects/devsuite-crm.svg') }}"
                                                    alt="{{ $project['title'] }} preview"
                                                    class="mirsaar-crm-gallery-card__image"
                                                    loading="lazy"
                                                >
                                            </div>

                                            <div class="mirsaar-crm-gallery-card__caption">
                                                <p class="mirsaar-crm-gallery-card__label">{{ $project['platform'] ?? $project['label'] }}</p>
                                                <h3 class="mirsaar-crm-gallery-card__title">{{ $project['title'] }}</h3>
                                                <div class="mirsaar-crm-gallery-card__meta">
                                                    @if (! empty($project['client_niche']))
                                                        <span>{{ $project['client_niche'] }}</span>
                                                    @endif
                                                    @if (! empty($project['result']))
                                                        <strong>{{ $project['result'] }}</strong>
                                                    @endif
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

            <article class="mirsaar-contact-strip" id="contact">
                <div class="mirsaar-contact-strip__head">
                    <p class="mirsaar-section-kicker">kontaktlar</p>
                    <h2 class="mirsaar-contact-strip__title">Qaysi kanal qulay bo'lsa, shu yerdan bog'laning.</h2>
                    <p class="mirsaar-contact-strip__lead">
                        Telegram, Instagram, WhatsApp, email va lokatsiya admin paneldagi kontakt sozlamalaridan olinadi.
                        Konsultatsiya yoki brief uchun eng qulay kanalni tanlang.
                    </p>

                    @if (false)
                    <p class="mirsaar-section-kicker">контактные профили</p>
                    <h2 class="mirsaar-contact-strip__title">Готовые контактные карточки для быстрого связи</h2>
                    <p class="mirsaar-contact-strip__lead">
                        После карусели основные точки контакта представлены в формате профилей:
                        понятно, кому писать, с какого потока начать и с какой скоростью ожидать ответ.
                    </p>
                    @endif
                </div>

                <div class="mirsaar-contact-strip__grid">
                    @foreach ($contactCards as $card)
                        <a href="{{ $card['href'] }}" class="mirsaar-contact-card">
                            <span class="mirsaar-contact-card__avatar">{{ $card['initials'] }}</span>

                            <div class="mirsaar-contact-card__copy">
                                <p class="mirsaar-contact-card__role">{{ $card['role'] }}</p>
                                <h3 class="mirsaar-contact-card__title">{{ $card['title'] }}</h3>
                                <strong class="mirsaar-contact-card__value">{{ $card['value'] }}</strong>
                                <p class="mirsaar-contact-card__meta">{{ $card['meta'] }}</p>
                            </div>
                        </a>
                    @endforeach
                </div>
            </article>

            <article class="mirsaar-reviews-section" id="reviews" data-swiper-root>
                <div class="mirsaar-reviews-section__head">
                    <div>
                        <p class="mirsaar-section-kicker">отзывы клиентов</p>
                        <h2 class="mirsaar-reviews-section__title">Отзывы</h2>
                        <p class="mirsaar-reviews-section__lead">
                            Для главной страницы реализован премиальный слайдер: 
                            стрелки навигации, мягкий autoplay и лёгкая глубина в карточках.
                        </p>
                    </div>

                    <div class="mirsaar-reviews-section__controls">
                        <button type="button" class="mirsaar-reviews-button" data-swiper-prev aria-label="Oldingi sharh">
                            <svg viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                <path d="M15 6L9 12L15 18" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                            </svg>
                        </button>

                        <button type="button" class="mirsaar-reviews-button is-next" data-swiper-next aria-label="Keyingi sharh">
                            <svg viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                <path d="M9 6L15 12L9 18" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                            </svg>
                        </button>
                    </div>
                </div>

                <div class="swiper mirsaar-reviews-swiper" data-swiper data-swiper-variant="reviews">
                    <div class="swiper-wrapper">
                        @foreach ($testimonials as $review)
                            <div class="swiper-slide">
                                <article class="mirsaar-review-card">
                                    <div class="mirsaar-review-card__stars" aria-label="{{ $review['rating'] }} yulduz">
                                        @for ($star = 1; $star <= 5; $star++)
                                            <svg viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                                <path d="M12 4L14.25 8.6L19.3 9.35L15.65 12.9L16.5 17.95L12 15.55L7.5 17.95L8.35 12.9L4.7 9.35L9.75 8.6L12 4Z" fill="currentColor" />
                                            </svg>
                                        @endfor
                                    </div>

                                    <span class="mirsaar-review-card__quote-mark" aria-hidden="true">99</span>

                                    <p class="mirsaar-review-card__quote">{{ $review['quote'] }}</p>

                                    <div class="mirsaar-review-card__author">
                                        <strong>{{ $review['author'] }}</strong>
                                        <span>{{ $review['company'] }}</span>
                                        <small>{{ $review['date'] }}</small>
                                    </div>
                                </article>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="mirsaar-reviews-section__pagination" data-swiper-pagination></div>
            </article>

            <article class="mirsaar-support-panel" id="support">
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

                <div class="mirsaar-support-panel__grid">
                    <div class="mirsaar-support-panel__copy">
                        <p class="mirsaar-section-kicker">murojaat formasi</p>
                        <h2 class="mirsaar-support-panel__title">SMM briefni to'ldiring, murojaat admin panelga tushadi.</h2>
                        <p class="mirsaar-support-panel__lead">
                            Ism, telefon, biznes niche, kerakli platforma, asosiy maqsad va byudjetni yuboring.
                            Admin panelda har bir murojaat status bilan kuzatiladi.
                        </p>

                        <div class="mirsaar-support-panel__points">
                            <article>
                                <strong>Platforma aniq</strong>
                                <span>Instagram, TikTok yoki Telegram bo'yicha ehtiyoj alohida saqlanadi.</span>
                            </article>
                            <article>
                                <strong>Maqsad aniq</strong>
                                <span>Followers, sales, leads yoki brand awareness admin panelda ko'rinadi.</span>
                            </article>
                            <article>
                                <strong>Brief tayyor</strong>
                                <span>Byudjet va izoh bilan lead keyingi suhbatga tayyor bo'ladi.</span>
                            </article>
                        </div>

                        @if (false)
                        <p class="mirsaar-section-kicker">обращение к нам</p>
                        <h2 class="mirsaar-support-panel__title">обращение к нам</h2>
                        <p class="mirsaar-support-panel__lead">
                            Оставьте имя, телефон, тип услуги и краткое описание проекта.
                            Каждое обращение отображается в админ-панели и отслеживается по статусу.
                        </p>

                        <div class="mirsaar-support-panel__points">
                            <article>
                                <strong>Быстрый ответ</strong>
                                <span>Новый лид сразу поступает в систему, и администратор его видит мгновенно</span>
                            </article>
                            <article>
                                <strong>Выбор услуги</strong>
                                <span>Вы можете корректно выбрать: лендинг, CRM, админ-панель или поддержку.</span>
                            </article>
                            <article>
                                <strong>Премиальный поток</strong>
                                <span>Форма, база и админ-часть работают в едином ритме</span>
                            </article>
                        </div>
                        @endif
                    </div>

                    <div class="mirsaar-support-panel__form-card" id="contact-form">
                        <div class="mirsaar-support-panel__form-head">
                            <p class="mirsaar-section-kicker">brief form</p>
                            <h3>Murojaat qoldiring</h3>
                            <p>
                                Xizmat turini tanlang, kontakt qoldiring va loyiha haqida yozing.
                                Qolgan oqimni shu formdan keyin birga yig'amiz.
                            </p>
                        </div>

                        @if ($inquirySent)
                            <div class="mirsaar-support-success">
                               Murojaatingiz yuborildi. U admin paneldagi murojaatlar bo'limiga tushdi.
                            </div>

                            @if (false)
                            <div class="mirsaar-support-success">
                               Отправлено. Скоро мы с вами свяжемся.
                            </div>
                            @endif
                        @endif

                        @error('form')
                            <div class="mirsaar-support-error">{{ $message }}</div>
                        @enderror

                        <form wire:submit="submitInquiry" class="mirsaar-support-form">
                            <div class="mirsaar-support-form__grid">
                                <label class="mirsaar-support-field">
                                    <span>Xizmat turi</span>
                                    <select wire:model="service_id">
                                        <option value="">Tanlang</option>
                                        @foreach ($serviceOptions as $service)
                                            <option value="{{ $service['id'] }}">{{ $service['title'] }}</option>
                                        @endforeach
                                    </select>
                                    @error('service_id')
                                        <small>{{ $message }}</small>
                                    @enderror
                                </label>

                                <label class="mirsaar-support-field">
                                    <span>Ism</span>
                                    <input type="text" wire:model="name" placeholder="Ismingiz">
                                    @error('name')
                                        <small>{{ $message }}</small>
                                    @enderror
                                </label>

                                <label class="mirsaar-support-field">
                                    <span>Telefon</span>
                                    <input type="text" wire:model="phone" placeholder="+998 90 700 00 00">
                                    @error('phone')
                                        <small>{{ $message }}</small>
                                    @enderror
                                </label>

                                <label class="mirsaar-support-field">
                                    <span>Biznes / niche</span>
                                    <input type="text" wire:model="business_niche" placeholder="Beauty salon, kurs, cafe...">
                                    @error('business_niche')
                                        <small>{{ $message }}</small>
                                    @enderror
                                </label>

                                <label class="mirsaar-support-field">
                                    <span>Platforma</span>
                                    <select wire:model="platform">
                                        <option value="instagram">Instagram</option>
                                        <option value="tiktok">TikTok</option>
                                        <option value="telegram">Telegram</option>
                                    </select>
                                    @error('platform')
                                        <small>{{ $message }}</small>
                                    @enderror
                                </label>

                                <label class="mirsaar-support-field">
                                    <span>Maqsad</span>
                                    <select wire:model="goal">
                                        <option value="followers">Followers</option>
                                        <option value="sales">Sales</option>
                                        <option value="leads">Leads</option>
                                        <option value="brand_awareness">Brand awareness</option>
                                    </select>
                                    @error('goal')
                                        <small>{{ $message }}</small>
                                    @enderror
                                </label>

                                <label class="mirsaar-support-field">
                                    <span>Qulay aloqa</span>
                                    <select wire:model="preferred_contact">
                                        <option value="phone">Telefon</option>
                                        <option value="telegram">Telegram</option>
                                        <option value="email">Email</option>
                                    </select>
                                    @error('preferred_contact')
                                        <small>{{ $message }}</small>
                                    @enderror
                                </label>

                                <label class="mirsaar-support-field">
                                    <span>Byudjet</span>
                                    <input type="text" wire:model="budget_range" placeholder="Masalan: 300$ dan">
                                    @error('budget_range')
                                        <small>{{ $message }}</small>
                                    @enderror
                                </label>

                                <label class="mirsaar-support-field">
                                    <span>Email</span>
                                    <input type="email" wire:model="email" placeholder="ixtiyoriy">
                                    @error('email')
                                        <small>{{ $message }}</small>
                                    @enderror
                                </label>
                            </div>

                            <label class="mirsaar-support-field">
                                <span>Izoh</span>
                                <textarea wire:model="project_summary" rows="6" placeholder="Biznesingiz, hozirgi holat va kutayotgan natijangizni yozing."></textarea>
                                @error('project_summary')
                                    <small>{{ $message }}</small>
                                @enderror
                            </label>

                            <label class="mirsaar-support-field">
                                <span>Qo'shimcha eslatma</span>
                                <textarea wire:model="note" rows="3" placeholder="Ixtiyoriy"></textarea>
                                @error('note')
                                    <small>{{ $message }}</small>
                                @enderror
                            </label>

                            <button type="submit" class="mirsaar-button mirsaar-button--primary mirsaar-support-submit">
                                Yuborish
                                <svg viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                    <path d="M7 17L17 7" stroke="currentColor" stroke-linecap="round" stroke-width="2" />
                                    <path d="M9 7H17V15" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                </svg>
                            </button>
                        </form>

                        @if (false)
                        <form wire:submit="submitInquiry" class="mirsaar-support-form">
                            <div class="mirsaar-support-form__grid">
                                <label class="mirsaar-support-field">
                                    <span>Услуга или раздел</span>
                                    <select wire:model="service_id">
                                        <option value="">Выберите</option>
                                        @foreach ($serviceOptions as $service)
                                            <option value="{{ $service['id'] }}">{{ $service['title'] }}</option>
                                        @endforeach
                                    </select>
                                    @error('service_id')
                                        <small>{{ $message }}</small>
                                    @enderror
                                </label>

                                <label class="mirsaar-support-field">
                                    <span>Ism</span>
                                    <input type="text" wire:model="name" placeholder="Ваше имя">
                                    @error('name')
                                        <small>{{ $message }}</small>
                                    @enderror
                                </label>

                                <label class="mirsaar-support-field">
                                    <span>Telefon</span>
                                    <input type="text" wire:model="phone" placeholder="+998 90 700 00 00...">
                                    @error('phone')
                                        <small>{{ $message }}</small>
                                    @enderror
                                </label>

                                <label class="mirsaar-support-field">
                                    <span>Email</span>
                                    <input type="email" wire:model="email" placeholder="hello@example.com">
                                    @error('email')
                                        <small>{{ $message }}</small>
                                    @enderror
                                </label>

                                <label class="mirsaar-support-field">
                                    <span>компании</span>
                                    <input type="text" wire:model="company" placeholder="Название компании">
                                    @error('company')
                                        <small>{{ $message }}</small>
                                    @enderror
                                </label>

                                <label class="mirsaar-support-field">
                                    <span>Удобная связь</span>
                                    <select wire:model="preferred_contact">
                                        <option value="phone">Телефон</option>
                                        <option value="telegram">Telegram для связи</option>
                                        <option value="email">Email</option>
                                    </select>
                                    @error('preferred_contact')
                                        <small>{{ $message }}</small>
                                    @enderror
                                </label>

                       <label class="mirsaar-support-field">
                                <span>Примерный бюджет</span>
                                <select wire:model="budget_range">
                                    <option value="flexible">Индивидуальный расчёт</option>
                                </select>
                                @error('budget_range')
                                    <small>{{ $message }}</small>
                                @enderror
                            </label>
                            </div>

                            <label class="mirsaar-support-field">
                                <span>Proekt haqida</span>
                                <textarea wire:model="project_summary" rows="6" placeholder="Цель проекта, нужные разделы и дедлайн."></textarea>
                                @error('project_summary')
                                    <small>{{ $message }}</small>
                                @enderror
                            </label>

                            <button type="submit" class="mirsaar-button mirsaar-button--primary mirsaar-support-submit">
                                Отправить
                                <svg viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                    <path d="M7 17L17 7" stroke="currentColor" stroke-linecap="round" stroke-width="2" />
                                    <path d="M9 7H17V15" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                </svg>
                            </button>
                        </form>
                        @endif
                    </div>
                </div>

            </article>

            <footer class="mirsaar-footer" id="footer">
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
                                <small>SMM mutaxassis vizitkasi</small>
                            </span>
                        </a>

                 <p class="mirsaar-footer__lead">
                     Instagram, TikTok va Telegram uchun strategiya, kontent, target reklama va analitika.
                     Xizmatlar, keyslar, kontaktlar va murojaatlar admin paneldan boshqariladi.
                 </p>

                 @if (false)
                 <p class="mirsaar-footer__lead">
                     Создаём премиальные сайты, CRM-системы и цифровые презентации 
                     с сильным первым впечатлением. Каждый элемент прорабатывается для усиления 
                     ценности бренда.
                 </p>
                 @endif

                        <a href="mailto:{{ $siteSettings['email'] ?? 'hello@smm.uz' }}" class="mirsaar-footer__cta">
                            {{ $siteSettings['email'] ?? 'hello@smm.uz' }}
                        </a>
                    </div>

                    <div class="mirsaar-footer__menu mirsaar-reveal mirsaar-reveal--delay-1">
                        <p class="mirsaar-footer__title">menu</p>

                        @if (false)
                        <p class="mirsaar-footer__title">меню</p>

                        @endif

                        <nav class="mirsaar-footer__links" aria-label="Footer navigation">
                            @foreach ($footerMenu as $item)
                                <a href="{{ $item['href'] }}" class="mirsaar-footer__link">
                                    {{ $item['label'] }}
                                </a>
                            @endforeach
                        </nav>
                    </div>

                    <div class="mirsaar-footer__contact mirsaar-reveal mirsaar-reveal--delay-2">
                        <p class="mirsaar-footer__title">kontakt</p>

                        @if (false)
                        <p class="mirsaar-footer__title">Связь</p>

                        @endif

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
                    <p>&copy; {{ now()->year }} Mirsaar. Все права защищены.</p>
                    <span class="mirsaar-footer__pill">Стандарт конфиденциальности и качества</span>
                </div>
            </footer>
        </section>
    </div>
</div>
