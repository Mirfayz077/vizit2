@extends('admin.layout')

@section('title', 'Hero sozlamalari')

@section('content')
    <div class="admin-topbar">
        <div>
            <p class="admin-eyebrow">homepage hero</p>
            <h1>Hero sozlamalari</h1>
            <p>SMM mutaxassisning asosiy ekrani: ism, headline, bio, rasm, CTA va achievementlar shu yerdan boshqariladi.</p>
        </div>

        <div class="admin-topbar__actions">
            <a href="{{ route('home') }}" class="admin-button admin-button--ghost">Saytni ko'rish</a>
        </div>
    </div>

    <section class="admin-form-layout">
        <article class="admin-card">
            <form method="POST" action="{{ route('admin.hero.update') }}" class="admin-form-grid">
                @csrf
                @method('PUT')

                <div class="admin-field">
                    <label for="specialist_name">SMM mutaxassis ismi</label>
                    <input id="specialist_name" type="text" name="specialist_name" value="{{ old('specialist_name', $hero->specialist_name) }}" required>
                    @error('specialist_name')
                        <div class="admin-error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="admin-field">
                    <label for="eyebrow">Kichik label</label>
                    <input id="eyebrow" type="text" name="eyebrow" value="{{ old('eyebrow', $hero->eyebrow) }}" placeholder="SMM strategist / content creator">
                    @error('eyebrow')
                        <div class="admin-error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="admin-field">
                    <label for="headline">Headline</label>
                    <input id="headline" type="text" name="headline" value="{{ old('headline', $hero->headline) }}" required>
                    @error('headline')
                        <div class="admin-error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="admin-field">
                    <label for="bio">Qisqa bio</label>
                    <textarea id="bio" name="bio" rows="5" required>{{ old('bio', $hero->bio) }}</textarea>
                    @error('bio')
                        <div class="admin-error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="admin-field">
                    <label for="hero_image">Professional rasm path yoki URL</label>
                    <input id="hero_image" type="text" name="hero_image" value="{{ old('hero_image', $hero->hero_image) }}" placeholder="images/smm-hero.svg">
                    @error('hero_image')
                        <div class="admin-error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="admin-form-grid admin-form-grid--compact">
                    <div class="admin-field">
                        <label for="primary_cta_label">CTA 1 matni</label>
                        <input id="primary_cta_label" type="text" name="primary_cta_label" value="{{ old('primary_cta_label', $hero->primary_cta_label) }}" required>
                        @error('primary_cta_label')
                            <div class="admin-error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="admin-field">
                        <label for="primary_cta_url">CTA 1 link</label>
                        <input id="primary_cta_url" type="text" name="primary_cta_url" value="{{ old('primary_cta_url', $hero->primary_cta_url) }}" required>
                        @error('primary_cta_url')
                            <div class="admin-error">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="admin-form-grid admin-form-grid--compact">
                    <div class="admin-field">
                        <label for="secondary_cta_label">CTA 2 matni</label>
                        <input id="secondary_cta_label" type="text" name="secondary_cta_label" value="{{ old('secondary_cta_label', $hero->secondary_cta_label) }}" required>
                        @error('secondary_cta_label')
                            <div class="admin-error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="admin-field">
                        <label for="secondary_cta_url">CTA 2 link</label>
                        <input id="secondary_cta_url" type="text" name="secondary_cta_url" value="{{ old('secondary_cta_url', $hero->secondary_cta_url) }}" required>
                        @error('secondary_cta_url')
                            <div class="admin-error">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="admin-form-grid admin-form-grid--compact">
                    <div class="admin-field">
                        <label for="tertiary_cta_label">CTA 3 matni</label>
                        <input id="tertiary_cta_label" type="text" name="tertiary_cta_label" value="{{ old('tertiary_cta_label', $hero->tertiary_cta_label) }}" required>
                        @error('tertiary_cta_label')
                            <div class="admin-error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="admin-field">
                        <label for="tertiary_cta_url">CTA 3 link</label>
                        <input id="tertiary_cta_url" type="text" name="tertiary_cta_url" value="{{ old('tertiary_cta_url', $hero->tertiary_cta_url) }}" required>
                        @error('tertiary_cta_url')
                            <div class="admin-error">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="admin-form-grid admin-form-grid--compact">
                    <div class="admin-field">
                        <label for="achievement_one_value">Achievement 1 qiymat</label>
                        <input id="achievement_one_value" type="text" name="achievement_one_value" value="{{ old('achievement_one_value', $hero->achievement_one_value) }}" required>
                        @error('achievement_one_value')
                            <div class="admin-error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="admin-field">
                        <label for="achievement_one_label">Achievement 1 label</label>
                        <input id="achievement_one_label" type="text" name="achievement_one_label" value="{{ old('achievement_one_label', $hero->achievement_one_label) }}" required>
                        @error('achievement_one_label')
                            <div class="admin-error">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="admin-form-grid admin-form-grid--compact">
                    <div class="admin-field">
                        <label for="achievement_two_value">Achievement 2 qiymat</label>
                        <input id="achievement_two_value" type="text" name="achievement_two_value" value="{{ old('achievement_two_value', $hero->achievement_two_value) }}" required>
                        @error('achievement_two_value')
                            <div class="admin-error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="admin-field">
                        <label for="achievement_two_label">Achievement 2 label</label>
                        <input id="achievement_two_label" type="text" name="achievement_two_label" value="{{ old('achievement_two_label', $hero->achievement_two_label) }}" required>
                        @error('achievement_two_label')
                            <div class="admin-error">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="admin-form-grid admin-form-grid--compact">
                    <div class="admin-field">
                        <label for="achievement_three_value">Achievement 3 qiymat</label>
                        <input id="achievement_three_value" type="text" name="achievement_three_value" value="{{ old('achievement_three_value', $hero->achievement_three_value) }}" required>
                        @error('achievement_three_value')
                            <div class="admin-error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="admin-field">
                        <label for="achievement_three_label">Achievement 3 label</label>
                        <input id="achievement_three_label" type="text" name="achievement_three_label" value="{{ old('achievement_three_label', $hero->achievement_three_label) }}" required>
                        @error('achievement_three_label')
                            <div class="admin-error">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="admin-actions">
                    <button type="submit" class="admin-button">Hero'ni saqlash</button>
                </div>
            </form>
        </article>

        <div class="admin-stack">
            <article class="admin-card">
                <div class="admin-section-head">
                    <div>
                        <h2>Preview</h2>
                        <p class="admin-note">Saqlangandan keyin homepage birinchi ekrani shu ma'lumotlardan foydalanadi.</p>
                    </div>
                </div>

                <div class="admin-hint-list">
                    <article class="admin-table-card">
                        <strong>{{ old('specialist_name', $hero->specialist_name) }}</strong>
                        <div class="admin-meta">{{ old('headline', $hero->headline) }}</div>
                    </article>

                    <article class="admin-table-card">
                        <strong>CTA</strong>
                        <div class="admin-meta">
                            {{ old('primary_cta_label', $hero->primary_cta_label) }} /
                            {{ old('secondary_cta_label', $hero->secondary_cta_label) }} /
                            {{ old('tertiary_cta_label', $hero->tertiary_cta_label) }}
                        </div>
                    </article>

                    <article class="admin-table-card">
                        <strong>Achievementlar</strong>
                        <div class="admin-meta">
                            {{ old('achievement_one_value', $hero->achievement_one_value) }},
                            {{ old('achievement_two_value', $hero->achievement_two_value) }},
                            {{ old('achievement_three_value', $hero->achievement_three_value) }}
                        </div>
                    </article>
                </div>
            </article>

            <article class="admin-card">
                <div class="admin-section-head">
                    <div>
                        <h2>Rasm eslatmasi</h2>
                        <p class="admin-note">Path `public` papkaga nisbatan yoziladi. Masalan: `images/smm-hero.svg`. To'liq URL ham ishlaydi.</p>
                    </div>
                </div>
            </article>
        </div>
    </section>
@endsection
