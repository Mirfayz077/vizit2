@extends('admin.layout')

@section('title', $mode === 'create' ? 'Yangi xizmat' : 'Xizmatni tahrirlash')

@section('content')
    <div class="admin-topbar">
        <div>
            <p class="admin-eyebrow">service editor</p>
            <h1>{{ $mode === 'create' ? 'Yangi xizmat' : 'Xizmatni tahrirlash' }}</h1>
            <p>Bu ma'lumot public forma select'ida va admin ro'yxatlarida ishlatiladi.</p>
        </div>

        <div class="admin-topbar__actions">
            <a href="{{ route('admin.services.index') }}" class="admin-button admin-button--ghost">Orqaga</a>
        </div>
    </div>

    <section class="admin-form-layout">
        <article class="admin-card">
            <form
                method="POST"
                action="{{ $mode === 'create' ? route('admin.services.store') : route('admin.services.update', $service) }}"
                class="admin-form-grid"
            >
                @csrf
                @if ($mode === 'edit')
                    @method('PUT')
                @endif

                <div class="admin-field">
                    <label for="title">Xizmat nomi</label>
                    <input id="title" type="text" name="title" value="{{ old('title', $service->title) }}" required>
                    @error('title')
                        <div class="admin-error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="admin-field">
                    <label for="slug">Slug</label>
                    <input id="slug" type="text" name="slug" value="{{ old('slug', $service->slug) }}" placeholder="auto yaratiladi">
                    @error('slug')
                        <div class="admin-error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="admin-field">
                    <label for="description">Tavsif</label>
                    <textarea id="description" name="description" placeholder="Xizmat haqida qisqacha yozing">{{ old('description', $service->description) }}</textarea>
                    @error('description')
                        <div class="admin-error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="admin-form-grid admin-form-grid--compact">
                    <div class="admin-field">
                        <label for="price">Narx</label>
                        <input id="price" type="text" name="price" value="{{ old('price', $service->price) }}" placeholder="300$ dan">
                        @error('price')
                            <div class="admin-error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="admin-field">
                        <label for="icon">Icon kaliti</label>
                        <input id="icon" type="text" name="icon" value="{{ old('icon', $service->icon) }}" placeholder="strategy, instagram, target">
                        @error('icon')
                            <div class="admin-error">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="admin-field">
                    <label for="benefit">Qisqa benefit</label>
                    <input id="benefit" type="text" name="benefit" value="{{ old('benefit', $service->benefit) }}" placeholder="Mijoz uchun asosiy foyda">
                    @error('benefit')
                        <div class="admin-error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="admin-field">
                    <label for="sort_order">Tartib</label>
                    <input id="sort_order" type="number" name="sort_order" min="0" value="{{ old('sort_order', $service->sort_order ?? 0) }}" required>
                    @error('sort_order')
                        <div class="admin-error">{{ $message }}</div>
                    @enderror
                </div>

                <label style="display:flex; align-items:center; gap:.65rem; color:var(--admin-muted); font-size:.94rem;">
                    <input type="checkbox" name="is_active" value="1" @checked(old('is_active', $service->is_active ?? true))>
                    Aktiv holatda saqlash
                </label>

                <div class="admin-actions">
                    <button type="submit" class="admin-button">Saqlash</button>
                    <a href="{{ route('admin.services.index') }}" class="admin-button admin-button--ghost">Bekor qilish</a>
                </div>
            </form>

            @if ($mode === 'edit')
                <form method="POST" action="{{ route('admin.services.destroy', $service) }}" style="margin-top: 1rem;" onsubmit="return confirm('Xizmatni o\\'chirishni tasdiqlaysizmi?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="admin-button admin-button--danger">Xizmatni o'chirish</button>
                </form>
            @endif
        </article>

        <div class="admin-stack">
            <article class="admin-card">
                <div class="admin-section-head">
                    <div>
                        <h2>Qisqa eslatma</h2>
                        <p class="admin-note">Toza strukturani ushlab turish uchun asosiy qoidalar.</p>
                    </div>
                </div>

                <div class="admin-hint-list">
                    <article class="admin-table-card">
                        <strong>Slug</strong>
                        <p class="admin-note">Bo'sh qoldirilsa xizmat nomidan avtomatik yaratiladi va unique holatga keltiriladi.</p>
                    </article>

                    <article class="admin-table-card">
                        <strong>Aktiv xizmat</strong>
                        <p class="admin-note">Faqat aktiv xizmatlar public form ichidagi select ro'yxatida ko'rinadi.</p>
                    </article>

                    <article class="admin-table-card">
                        <strong>Narx va benefit</strong>
                        <p class="admin-note">Narx, icon va benefit asosiy sahifadagi xizmat kartalarida chiqadi.</p>
                    </article>

                    <article class="admin-table-card">
                        <strong>Tartib</strong>
                        <p class="admin-note">Kichikroq son oldinroq chiqadi. Admin va front bir xil tartibdan foydalanadi.</p>
                    </article>
                </div>
            </article>

            <article class="admin-card">
                <div class="admin-section-head">
                    <div>
                        <h2>Joriy holat</h2>
                        <p class="admin-note">Saqlanadigan asosiy qiymatlar.</p>
                    </div>
                </div>

                <div class="admin-hint-list">
                    <article class="admin-table-card">
                        <strong>Status</strong>
                        <div class="admin-meta">{{ old('is_active', $service->is_active ?? true) ? 'Aktiv' : 'Yashirin' }}</div>
                    </article>

                    <article class="admin-table-card">
                        <strong>Slug preview</strong>
                        <div class="admin-meta admin-mono">{{ old('slug', $service->slug ?: 'auto-generated') }}</div>
                    </article>

                    <article class="admin-table-card">
                        <strong>Tartib</strong>
                        <div class="admin-meta">{{ old('sort_order', $service->sort_order ?? 0) }}</div>
                    </article>

                    <article class="admin-table-card">
                        <strong>Narx</strong>
                        <div class="admin-meta">{{ old('price', $service->price ?: 'Kiritilmagan') }}</div>
                    </article>
                </div>
            </article>
        </div>
    </section>
@endsection
