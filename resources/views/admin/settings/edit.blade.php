@extends('admin.layout')

@section('title', 'Kontakt sozlamalari')

@section('content')
    <div class="admin-topbar">
        <div>
            <p class="admin-eyebrow">site contacts</p>
            <h1>Kontakt sozlamalari</h1>
            <p>Telefon, Telegram, Instagram, WhatsApp, email, lokatsiya va konsultatsiya linki public sahifada ishlatiladi.</p>
        </div>

        <div class="admin-topbar__actions">
            <a href="{{ route('home') }}#contact" class="admin-button admin-button--ghost">Saytda ko'rish</a>
        </div>
    </div>

    <section class="admin-form-layout">
        <article class="admin-card">
            <form method="POST" action="{{ route('admin.settings.update') }}" class="admin-form-grid">
                @csrf
                @method('PUT')

                <div class="admin-form-grid admin-form-grid--compact">
                    <div class="admin-field">
                        <label for="phone">Telefon</label>
                        <input id="phone" type="text" name="phone" value="{{ old('phone', $settings->phone) }}" required>
                        @error('phone') <div class="admin-error">{{ $message }}</div> @enderror
                    </div>

                    <div class="admin-field">
                        <label for="email">Email</label>
                        <input id="email" type="email" name="email" value="{{ old('email', $settings->email) }}" required>
                        @error('email') <div class="admin-error">{{ $message }}</div> @enderror
                    </div>
                </div>

                <div class="admin-field">
                    <label for="telegram">Telegram link</label>
                    <input id="telegram" type="text" name="telegram" value="{{ old('telegram', $settings->telegram) }}" required>
                    @error('telegram') <div class="admin-error">{{ $message }}</div> @enderror
                </div>

                <div class="admin-field">
                    <label for="instagram">Instagram link</label>
                    <input id="instagram" type="text" name="instagram" value="{{ old('instagram', $settings->instagram) }}" required>
                    @error('instagram') <div class="admin-error">{{ $message }}</div> @enderror
                </div>

                <div class="admin-field">
                    <label for="whatsapp">WhatsApp link</label>
                    <input id="whatsapp" type="text" name="whatsapp" value="{{ old('whatsapp', $settings->whatsapp) }}" required>
                    @error('whatsapp') <div class="admin-error">{{ $message }}</div> @enderror
                </div>

                <div class="admin-field">
                    <label for="location">Location</label>
                    <input id="location" type="text" name="location" value="{{ old('location', $settings->location) }}" required>
                    @error('location') <div class="admin-error">{{ $message }}</div> @enderror
                </div>

                <div class="admin-field">
                    <label for="consultation_link">Konsultatsiya linki</label>
                    <input id="consultation_link" type="text" name="consultation_link" value="{{ old('consultation_link', $settings->consultation_link) }}" required>
                    @error('consultation_link') <div class="admin-error">{{ $message }}</div> @enderror
                </div>

                <div class="admin-actions">
                    <button type="submit" class="admin-button">Kontaktlarni saqlash</button>
                </div>
            </form>
        </article>

        <div class="admin-stack">
            <article class="admin-card">
                <div class="admin-section-head">
                    <div>
                        <h2>Preview</h2>
                        <p class="admin-note">Public sahifadagi kontakt kartalar shu ma'lumotlardan yig'iladi.</p>
                    </div>
                </div>

                <div class="admin-hint-list">
                    <article class="admin-table-card">
                        <strong>Telegram</strong>
                        <div class="admin-meta">{{ old('telegram', $settings->telegram) }}</div>
                    </article>
                    <article class="admin-table-card">
                        <strong>Instagram</strong>
                        <div class="admin-meta">{{ old('instagram', $settings->instagram) }}</div>
                    </article>
                    <article class="admin-table-card">
                        <strong>Location</strong>
                        <div class="admin-meta">{{ old('location', $settings->location) }}</div>
                    </article>
                </div>
            </article>
        </div>
    </section>
@endsection
