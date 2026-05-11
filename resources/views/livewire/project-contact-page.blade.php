<div class="mirsaar-contact-page">
    <div class="mirsaar-contact-page__bg" aria-hidden="true"></div>

    <section class="mirsaar-contact-page__shell">
        <header class="mirsaar-contact-page__topbar">
            <a href="{{ route('home') }}" class="mirsaar-contact-page__brand" aria-label="Mirsaar home">
                <span class="mirsaar-contact-page__brand-mark" aria-hidden="true">
                    <svg viewBox="0 0 64 64" fill="none">
                        <circle cx="32" cy="32" r="29" stroke="currentColor" stroke-width="2.5" />
                        <path d="M18 39L28.5 22H35L25 42" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="3" />
                        <path d="M30 42L39 22H46L36.5 42" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="3" />
                    </svg>
                </span>

                <span class="mirsaar-contact-page__brand-copy">
                    <strong>Mirsaar</strong>
                    <small>SMM brief</small>
                </span>
            </a>

            <nav class="mirsaar-contact-page__nav" aria-label="Contacts page navigation">
                @foreach ($navItems as $item)
                    <a href="{{ $item['href'] }}">{{ $item['label'] }}</a>
                @endforeach
            </nav>

            <a href="{{ route('home') }}" class="mirsaar-contact-page__back-link">Bosh sahifa</a>
            @if (false)

            <a href="{{ route('home') }}" class="mirsaar-contact-page__back-link">На главную</a>
            @endif
        </header>

        <div class="mirsaar-contact-page__card">
            <div class="mirsaar-contact-page__head">
                <h1 class="mirsaar-contact-page__title">SMM konsultatsiya uchun brief</h1>
                @if (false)
                <h1 class="mirsaar-contact-page__title">Свяжитесь с Нами</h1>
                @endif
            </div>

            <div class="mirsaar-contact-page__content">
                <div class="mirsaar-contact-page__faq-column">
                    <div class="mirsaar-contact-page__section-head">
                        <h2 class="mirsaar-contact-page__section-title">SMM bo'yicha savollar</h2>
                        @if (false)
                        <h2 class="mirsaar-contact-page__section-title">Частые вопросы (FAQ)</h2>
                        @endif
                        <span class="mirsaar-contact-page__section-line" aria-hidden="true"></span>
                    </div>

                    <div class="mirsaar-contact-page__faq-list">
                        @foreach ($faqItems as $faq)
                            <details class="mirsaar-contact-faq" @if ($loop->first) open @endif>
                                <summary>
                                    <span class="mirsaar-contact-faq__icon" aria-hidden="true">
                                        @switch($faq['icon'])
                                            @case('coins')
                                                <svg viewBox="0 0 24 24" fill="none">
                                                    <ellipse cx="12" cy="7" rx="5.5" ry="2.5" stroke="currentColor" stroke-width="1.8" />
                                                    <path d="M6.5 7V12.5C6.5 13.9 9 15 12 15C15 15 17.5 13.9 17.5 12.5V7" stroke="currentColor" stroke-width="1.8" />
                                                    <path d="M12 10.2V18" stroke="currentColor" stroke-linecap="round" stroke-width="1.8" />
                                                </svg>
                                                @break
                                            @case('calendar')
                                                <svg viewBox="0 0 24 24" fill="none">
                                                    <rect x="4.5" y="6" width="15" height="13" rx="3" stroke="currentColor" stroke-width="1.8" />
                                                    <path d="M8 4.5V8" stroke="currentColor" stroke-linecap="round" stroke-width="1.8" />
                                                    <path d="M16 4.5V8" stroke="currentColor" stroke-linecap="round" stroke-width="1.8" />
                                                    <path d="M4.5 10H19.5" stroke="currentColor" stroke-width="1.8" />
                                                </svg>
                                                @break
                                            @case('shield')
                                                <svg viewBox="0 0 24 24" fill="none">
                                                    <path d="M12 4L18 6.4V11.7C18 15.2 15.6 18.4 12 19.5C8.4 18.4 6 15.2 6 11.7V6.4L12 4Z" stroke="currentColor" stroke-linejoin="round" stroke-width="1.8" />
                                                    <path d="M9.5 12L11.2 13.7L14.8 10.1" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" />
                                                </svg>
                                                @break
                                            @case('card')
                                                <svg viewBox="0 0 24 24" fill="none">
                                                    <rect x="3.8" y="6.3" width="16.4" height="11.4" rx="2.6" stroke="currentColor" stroke-width="1.8" />
                                                    <path d="M3.8 10H20.2" stroke="currentColor" stroke-width="1.8" />
                                                    <path d="M7.5 14.2H10.7" stroke="currentColor" stroke-linecap="round" stroke-width="1.8" />
                                                </svg>
                                                @break
                                            @case('rocket')
                                                <svg viewBox="0 0 24 24" fill="none">
                                                    <path d="M13.7 5.1C15.8 5.1 18 6 19.6 7.6C19.6 10.4 18.6 13.1 16.6 15.1L13 18.7L9.3 15L12.9 11.4C14.3 10 15.1 8.1 15.1 6.1C14.6 5.4 14.1 5.1 13.7 5.1Z" stroke="currentColor" stroke-linejoin="round" stroke-width="1.8" />
                                                    <path d="M8.6 14.4L5.5 17.5" stroke="currentColor" stroke-linecap="round" stroke-width="1.8" />
                                                    <path d="M6.2 10.7L9.3 7.6" stroke="currentColor" stroke-linecap="round" stroke-width="1.8" />
                                                </svg>
                                                @break
                                            @case('search')
                                                <svg viewBox="0 0 24 24" fill="none">
                                                    <circle cx="11" cy="11" r="5.2" stroke="currentColor" stroke-width="1.8" />
                                                    <path d="M15.2 15.2L19 19" stroke="currentColor" stroke-linecap="round" stroke-width="1.8" />
                                                    <path d="M11 8.8V13.2" stroke="currentColor" stroke-linecap="round" stroke-width="1.8" />
                                                    <path d="M8.8 11H13.2" stroke="currentColor" stroke-linecap="round" stroke-width="1.8" />
                                                </svg>
                                                @break
                                            @case('nfc')
                                                <svg viewBox="0 0 24 24" fill="none">
                                                    <rect x="7.5" y="4.8" width="9" height="14.4" rx="2.6" stroke="currentColor" stroke-width="1.8" />
                                                    <path d="M10 8.2C11.4 9.1 12.2 10.5 12.2 12C12.2 13.5 11.4 14.9 10 15.8" stroke="currentColor" stroke-linecap="round" stroke-width="1.8" />
                                                    <path d="M13.2 6.8C15.2 8.2 16.3 10 16.3 12C16.3 14 15.2 15.8 13.2 17.2" stroke="currentColor" stroke-linecap="round" stroke-width="1.8" />
                                                </svg>
                                                @break
                                            @case('support')
                                                <svg viewBox="0 0 24 24" fill="none">
                                                    <path d="M6.3 12.3V10.8C6.3 7.7 8.9 5.2 12 5.2C15.1 5.2 17.7 7.7 17.7 10.8V12.3" stroke="currentColor" stroke-width="1.8" />
                                                    <rect x="4.3" y="11.6" width="3.4" height="5.6" rx="1.4" stroke="currentColor" stroke-width="1.8" />
                                                    <rect x="16.3" y="11.6" width="3.4" height="5.6" rx="1.4" stroke="currentColor" stroke-width="1.8" />
                                                    <path d="M12 18.8H14.8C16.1 18.8 17.2 17.7 17.2 16.4V16" stroke="currentColor" stroke-linecap="round" stroke-width="1.8" />
                                                </svg>
                                                @break
                                        @endswitch
                                    </span>

                                    <span class="mirsaar-contact-faq__question">{{ $faq['question'] }}</span>
                                    <span class="mirsaar-contact-faq__toggle" aria-hidden="true"></span>
                                </summary>

                                <p>{{ $faq['answer'] }}</p>
                            </details>
                        @endforeach
                    </div>
                </div>

                <div class="mirsaar-contact-page__form-column">
                    <div class="mirsaar-contact-page__form-card" id="contact-form">
                        @if ($inquirySent)
                            <div class="mirsaar-support-success">
                                Murojaatingiz yuborildi. U admin paneldagi murojaatlar bo'limiga tushdi.
                            </div>
                        @endif

                        @error('form')
                            <div class="mirsaar-support-error">{{ $message }}</div>
                        @enderror

                        <form wire:submit="submitInquiry" class="mirsaar-contact-form">
                            <div class="mirsaar-contact-form__meta">
                                <strong>Brief forma</strong>
                                <p>SMM xizmat, platforma, maqsad va byudjet bo'yicha murojaat admin panelga yuboriladi.</p>
                            </div>

                            <div class="mirsaar-contact-form__grid">
                                <label class="mirsaar-contact-form__field">
                                    <span>Xizmat turi</span>
                                    <select wire:model="service_id" aria-label="Xizmat turi">
                                        <option value="">Tanlang</option>
                                        @foreach ($serviceOptions as $service)
                                            <option value="{{ $service['id'] }}">{{ $service['title'] }}</option>
                                        @endforeach
                                    </select>
                                    @error('service_id')
                                        <small>{{ $message }}</small>
                                    @enderror
                                </label>

                                <label class="mirsaar-contact-form__field">
                                    <span>Ism</span>
                                    <input type="text" wire:model="name" placeholder="Ismingiz" aria-label="Ism">
                                    @error('name')
                                        <small>{{ $message }}</small>
                                    @enderror
                                </label>

                                <label class="mirsaar-contact-form__field">
                                    <span>Telefon</span>
                                    <input type="text" wire:model="phone" placeholder="+998 ..." aria-label="Telefon">
                                    @error('phone')
                                        <small>{{ $message }}</small>
                                    @enderror
                                </label>

                                <label class="mirsaar-contact-form__field">
                                    <span>Biznes / niche</span>
                                    <input type="text" wire:model="business_niche" placeholder="Beauty salon, kurs, cafe..." aria-label="Biznes yoki niche">
                                    @error('business_niche')
                                        <small>{{ $message }}</small>
                                    @enderror
                                </label>

                                <label class="mirsaar-contact-form__field">
                                    <span>Platforma</span>
                                    <select wire:model="platform" aria-label="Platforma">
                                        <option value="instagram">Instagram</option>
                                        <option value="tiktok">TikTok</option>
                                        <option value="telegram">Telegram</option>
                                    </select>
                                    @error('platform')
                                        <small>{{ $message }}</small>
                                    @enderror
                                </label>

                                <label class="mirsaar-contact-form__field">
                                    <span>Maqsad</span>
                                    <select wire:model="goal" aria-label="Maqsad">
                                        <option value="followers">Followers</option>
                                        <option value="sales">Sales</option>
                                        <option value="leads">Leads</option>
                                        <option value="brand_awareness">Brand awareness</option>
                                    </select>
                                    @error('goal')
                                        <small>{{ $message }}</small>
                                    @enderror
                                </label>

                                <label class="mirsaar-contact-form__field">
                                    <span>Email</span>
                                    <input type="email" wire:model="email" placeholder="ixtiyoriy" aria-label="Email">
                                    @error('email')
                                        <small>{{ $message }}</small>
                                    @enderror
                                </label>

                                <label class="mirsaar-contact-form__field">
                                    <span>Qulay aloqa</span>
                                    <select wire:model="preferred_contact" aria-label="Qulay aloqa">
                                        <option value="phone">Telefon</option>
                                        <option value="telegram">Telegram</option>
                                        <option value="email">Email</option>
                                    </select>
                                    @error('preferred_contact')
                                        <small>{{ $message }}</small>
                                    @enderror
                                </label>

                                <label class="mirsaar-contact-form__field">
                                    <span>Taxminiy byudjet</span>
                                    <small class="mirsaar-contact-form__hint">Summani USD ($) da kiriting.</small>
                                    <input type="text" wire:model="budget_range" inputmode="decimal" placeholder="Masalan: 300$ dan" aria-label="Taxminiy byudjet">
                                    @error('budget_range')
                                        <small>{{ $message }}</small>
                                    @enderror
                                </label>
                            </div>

                            <label class="mirsaar-contact-form__field">
                                <span>Izoh</span>
                                <textarea wire:model="project_summary" rows="6" placeholder="Biznesingiz, hozirgi holat va kutayotgan natijangizni yozing" aria-label="Izoh"></textarea>
                                @error('project_summary')
                                    <small>{{ $message }}</small>
                                @enderror
                            </label>

                            <label class="mirsaar-contact-form__field">
                                <span>Qo'shimcha eslatma</span>
                                <textarea wire:model="note" rows="3" placeholder="Ixtiyoriy" aria-label="Qo'shimcha eslatma"></textarea>
                                @error('note')
                                    <small>{{ $message }}</small>
                                @enderror
                            </label>

                            <button type="submit" class="mirsaar-contact-form__submit">
                                Yuborish
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="mirsaar-contact-page__map-card" id="contact-map">
                <iframe
                    title="Ташкент на карте"
                    src="https://www.openstreetmap.org/export/embed.html?bbox=69.214%2C41.285%2C69.304%2C41.339&layer=mapnik"
                    loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"
                ></iframe>
            </div>
        </div>

        <footer class="mirsaar-contact-page__footer">
            <div class="mirsaar-contact-page__footer-hero">
                <div class="mirsaar-contact-page__footer-brand">
                    <a href="{{ route('home') }}" class="mirsaar-contact-page__footer-brand-link" aria-label="Mirsaar home">
                        <span class="mirsaar-contact-page__footer-mark" aria-hidden="true">
                            <svg viewBox="0 0 64 64" fill="none">
                                <circle cx="32" cy="32" r="29" stroke="currentColor" stroke-width="2.5" />
                                <path d="M18 39L28.5 22H35L25 42" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="3" />
                                <path d="M30 42L39 22H46L36.5 42" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="3" />
                            </svg>
                        </span>

                        <span class="mirsaar-contact-page__footer-brand-copy">
                            <strong>Mirsaar</strong>
                            <small>premium contact hub</small>
                        </span>
                    </a>

                    <p class="mirsaar-contact-page__footer-lead">
                        Sayt, CRM va admin oqimlari uchun murojaatlar premium formatda yig'iladi va admin panelda tartibli kuzatiladi.
                    </p>

                    <div class="mirsaar-contact-page__footer-badges">
                        <span class="mirsaar-contact-page__footer-badge">24/7 premium support</span>
                        <span class="mirsaar-contact-page__footer-badge">Brief -> Admin dashboard</span>
                    </div>

                    <div class="mirsaar-contact-page__footer-actions">
                        <a href="mailto:hello@mirsaar.uz" class="mirsaar-contact-page__footer-action">
                            <span aria-hidden="true">
                                <svg viewBox="0 0 24 24" fill="none">
                                    <path d="M4 7H20V17H4V7Z" stroke="currentColor" stroke-linejoin="round" stroke-width="1.8" />
                                    <path d="M5 8L12 13L19 8" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" />
                                </svg>
                            </span>
                            <span>hello@mirsaar.uz</span>
                        </a>

                        <a href="{{ route('admin.login') }}" class="mirsaar-contact-page__footer-action is-secondary">
                            <span aria-hidden="true">
                                <svg viewBox="0 0 24 24" fill="none">
                                    <path d="M12 3L19 6V11.8C19 15.1 16.9 18.1 12 21C7.1 18.1 5 15.1 5 11.8V6L12 3Z" stroke="currentColor" stroke-linejoin="round" stroke-width="1.8" />
                                    <path d="M9.4 11.8L11.3 13.7L14.8 10.2" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" />
                                </svg>
                            </span>
                            <span>Admin panel</span>
                        </a>
                    </div>
                </div>

                <div class="mirsaar-contact-page__footer-menu">
                    <p class="mirsaar-contact-page__footer-title">Menyu</p>

                    <nav class="mirsaar-contact-page__footer-links" aria-label="Footer navigation">
                        @foreach ($footerMenu as $item)
                            <a href="{{ $item['href'] }}">
                                <span aria-hidden="true"></span>
                                <span>{{ $item['label'] }}</span>
                            </a>
                        @endforeach
                    </nav>
                </div>

                <div class="mirsaar-contact-page__footer-contacts">
                    <p class="mirsaar-contact-page__footer-title">Kontaktlar</p>

                    <div class="mirsaar-contact-page__footer-contact-list">
                        @foreach ($contactMeta as $item)
                            <a href="{{ $item['href'] }}" class="mirsaar-contact-page__footer-contact-card">
                                <span class="mirsaar-contact-page__footer-contact-icon" aria-hidden="true">
                                    @if ($loop->first)
                                        <svg viewBox="0 0 24 24" fill="none">
                                            <path d="M4 7H20V17H4V7Z" stroke="currentColor" stroke-linejoin="round" stroke-width="1.8" />
                                            <path d="M5 8L12 13L19 8" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" />
                                        </svg>
                                    @elseif ($loop->iteration === 2)
                                        <svg viewBox="0 0 24 24" fill="none">
                                            <path d="M7.5 12.8L10.2 15.5L16.5 9.2" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" />
                                            <path d="M12 4L19 7.2V12.4C19 15.8 16.9 18.8 12 21C7.1 18.8 5 15.8 5 12.4V7.2L12 4Z" stroke="currentColor" stroke-linejoin="round" stroke-width="1.8" />
                                        </svg>
                                    @else
                                        <svg viewBox="0 0 24 24" fill="none">
                                            <path d="M12 20C16.2 16.1 18.5 13.1 18.5 10.1C18.5 6.7 15.8 4 12.5 4C9.2 4 6.5 6.7 6.5 10.1C6.5 13.1 8.8 16.1 13 20H12Z" stroke="currentColor" stroke-linejoin="round" stroke-width="1.8" />
                                            <circle cx="12.5" cy="10" r="2.2" stroke="currentColor" stroke-width="1.8" />
                                        </svg>
                                    @endif
                                </span>

                                <span class="mirsaar-contact-page__footer-contact-copy">
                                    <small>{{ $item['label'] }}</small>
                                    <strong>{{ $item['value'] }}</strong>
                                </span>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="mirsaar-contact-page__footer-bottom">
                <p>&copy; {{ now()->year }} Mirsaar. Barcha huquqlar himoyalangan.</p>

                <div class="mirsaar-contact-page__footer-pills">
                    <span class="mirsaar-contact-page__footer-pill">Premium contact flow</span>
                    <span class="mirsaar-contact-page__footer-pill">Maxfiylik va sifat standarti</span>
                </div>
            </div>
        </footer>
    </section>
</div>
