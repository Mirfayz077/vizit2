@extends('admin.layout')

@section('title', $mode === 'create' ? 'Yangi proekt' : 'Proektni tahrirlash')

@section('content')
    <div class="admin-topbar">
        <div>
            <p class="admin-eyebrow">project editor</p>
            <h1>{{ $mode === 'create' ? 'Yangi proekt' : 'Proektni tahrirlash' }}</h1>
            <p>Bu ma'lumot public portfolio lentasida va katta preview blokida ishlatiladi.</p>
        </div>

        <div class="admin-topbar__actions">
            <a href="{{ route('admin.projects.index') }}" class="admin-button admin-button--ghost">Orqaga</a>
        </div>
    </div>

    <section class="admin-form-layout">
        <article class="admin-card">
            <form
                method="POST"
                action="{{ $mode === 'create' ? route('admin.projects.store') : route('admin.projects.update', $project) }}"
                class="admin-form-grid"
            >
                @csrf
                @if ($mode === 'edit')
                    @method('PUT')
                @endif

                <div class="admin-field">
                    <label for="title">Proekt nomi</label>
                    <input id="title" type="text" name="title" value="{{ old('title', $project->title) }}" required>
                    @error('title')
                        <div class="admin-error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="admin-field">
                    <label for="slug">Slug</label>
                    <input id="slug" type="text" name="slug" value="{{ old('slug', $project->slug) }}" placeholder="auto yaratiladi">
                    @error('slug')
                        <div class="admin-error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="admin-field">
                    <label for="label">Kichik label</label>
                    <input id="label" type="text" name="label" value="{{ old('label', $project->label) }}" placeholder="crm platform">
                    @error('label')
                        <div class="admin-error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="admin-field">
                    <label for="client_niche">Klient niche</label>
                    <input id="client_niche" type="text" name="client_niche" value="{{ old('client_niche', $project->client_niche) }}" placeholder="Beauty salon, online kurs, cafe">
                    @error('client_niche')
                        <div class="admin-error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="admin-field">
                    <label for="image">Rasm path</label>
                    <input id="image" type="text" name="image" value="{{ old('image', $project->image) }}" placeholder="images/projects/devsuite-crm.svg">
                    @error('image')
                        <div class="admin-error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="admin-field">
                    <label for="description">Tavsif</label>
                    <textarea id="description" name="description" placeholder="Katta preview uchun qisqa matn">{{ old('description', $project->description) }}</textarea>
                    @error('description')
                        <div class="admin-error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="admin-field">
                    <label for="before_state">Oldingi holat</label>
                    <textarea id="before_state" name="before_state" placeholder="Ish boshlanishidan oldingi muammo">{{ old('before_state', $project->before_state) }}</textarea>
                    @error('before_state')
                        <div class="admin-error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="admin-field">
                    <label for="work_done">Qilingan ish</label>
                    <textarea id="work_done" name="work_done" placeholder="Nimalar qilindi">{{ old('work_done', $project->work_done) }}</textarea>
                    @error('work_done')
                        <div class="admin-error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="admin-form-grid admin-form-grid--compact">
                    <div class="admin-field">
                        <label for="result">Natija</label>
                        <input id="result" type="text" name="result" value="{{ old('result', $project->result) }}" placeholder="+43% reach, 120 ta lead">
                        @error('result')
                            <div class="admin-error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="admin-field">
                        <label for="platform">Platforma</label>
                        <input id="platform" type="text" name="platform" value="{{ old('platform', $project->platform) }}" placeholder="Instagram / TikTok / Telegram">
                        @error('platform')
                            <div class="admin-error">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="admin-form-grid admin-form-grid--compact">
                    <div class="admin-field">
                        <label for="row">Qator</label>
                        <input id="row" type="number" name="row" min="1" max="2" value="{{ old('row', $project->row ?? 1) }}" required>
                        @error('row')
                            <div class="admin-error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="admin-field">
                        <label for="sort_order">Tartib</label>
                        <input id="sort_order" type="number" name="sort_order" min="0" value="{{ old('sort_order', $project->sort_order ?? 0) }}" required>
                        @error('sort_order')
                            <div class="admin-error">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="admin-form-grid admin-form-grid--compact">
                    <div class="admin-field">
                        <label for="theme">Theme</label>
                        <select id="theme" name="theme" required>
                            @foreach ($themeOptions as $theme)
                                <option value="{{ $theme }}" @selected(old('theme', $project->theme ?? 'bronze') === $theme)>{{ $theme }}</option>
                            @endforeach
                        </select>
                        @error('theme')
                            <div class="admin-error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="admin-field">
                        <label for="layout">Layout</label>
                        <select id="layout" name="layout" required>
                            @foreach ($layoutOptions as $layout)
                                <option value="{{ $layout }}" @selected(old('layout', $project->layout ?? 'centered') === $layout)>{{ $layout }}</option>
                            @endforeach
                        </select>
                        @error('layout')
                            <div class="admin-error">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <label style="display:flex; align-items:center; gap:.65rem; color:var(--admin-muted); font-size:.94rem;">
                    <input type="checkbox" name="is_featured" value="1" @checked(old('is_featured', $project->is_featured ?? false))>
                    Katta preview sifatida ko'rsatish
                </label>

                <label style="display:flex; align-items:center; gap:.65rem; color:var(--admin-muted); font-size:.94rem;">
                    <input type="checkbox" name="is_active" value="1" @checked(old('is_active', $project->is_active ?? true))>
                    Aktiv holatda saqlash
                </label>

                <div class="admin-actions">
                    <button type="submit" class="admin-button">Saqlash</button>
                    <a href="{{ route('admin.projects.index') }}" class="admin-button admin-button--ghost">Bekor qilish</a>
                </div>
            </form>

            @if ($mode === 'edit')
                <form method="POST" action="{{ route('admin.projects.destroy', $project) }}" style="margin-top: 1rem;" onsubmit="return confirm('Proektni o\\'chirishni tasdiqlaysizmi?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="admin-button admin-button--danger">Proektni o'chirish</button>
                </form>
            @endif
        </article>

        <div class="admin-stack">
            <article class="admin-card">
                <div class="admin-section-head">
                    <div>
                        <h2>Qisqa eslatma</h2>
                        <p class="admin-note">Portfolio lentasi toza chiqishi uchun asosiy qoidalar.</p>
                    </div>
                </div>

                <div class="admin-hint-list">
                    <article class="admin-table-card">
                        <strong>Rasm path</strong>
                        <p class="admin-note">Rasm `public` papkaga nisbatan yoziladi: masalan, `images/projects/devsuite-crm.svg`.</p>
                    </article>

                    <article class="admin-table-card">
                        <strong>Featured</strong>
                        <p class="admin-note">Faqat bitta featured proekt katta preview blokida birinchi bo'lib chiqadi.</p>
                    </article>

                    <article class="admin-table-card">
                        <strong>Case study</strong>
                        <p class="admin-note">Niche, oldingi holat, qilingan ish, natija va platforma public portfolio kartalarida chiqadi.</p>
                    </article>

                    <article class="admin-table-card">
                        <strong>Qator va tartib</strong>
                        <p class="admin-note">Qator 1 yoki 2 bo'ladi. Kichik tartib soni oldinroq ko'rinadi.</p>
                    </article>
                </div>
            </article>

            <article class="admin-card">
                <div class="admin-section-head">
                    <div>
                        <h2>Preview</h2>
                        <p class="admin-note">Saqlanadigan asosiy qiymatlar.</p>
                    </div>
                </div>

                <div class="admin-hint-list">
                    <article class="admin-table-card">
                        <strong>{{ old('title', $project->title ?: 'Proekt nomi') }}</strong>
                        <div class="admin-meta">{{ old('label', $project->label ?: 'label') }} / {{ old('client_niche', $project->client_niche ?: 'niche') }}</div>
                    </article>

                    <article class="admin-table-card">
                        <strong>Status</strong>
                        <div class="admin-meta">{{ old('is_active', $project->is_active ?? true) ? 'Aktiv' : 'Yashirin' }} / {{ old('is_featured', $project->is_featured ?? false) ? 'Featured' : 'Oddiy' }}</div>
                    </article>

                    <article class="admin-table-card">
                        <strong>Visual</strong>
                        <div class="admin-meta">{{ old('theme', $project->theme ?: 'bronze') }} / {{ old('layout', $project->layout ?: 'centered') }}</div>
                    </article>

                    <article class="admin-table-card">
                        <strong>Natija</strong>
                        <div class="admin-meta">{{ old('result', $project->result ?: 'Kiritilmagan') }}</div>
                    </article>
                </div>
            </article>
        </div>
    </section>
@endsection
