@extends('admin.layout')

@section('title', 'Profil')

@section('content')
    <div class="admin-topbar">
        <div>
            <p class="admin-eyebrow">account settings</p>
            <h1>User Profile</h1>
            <p>Admin akkaunt ma'lumotlari, login, email va parol shu yerdan boshqariladi.</p>
        </div>

        <div class="admin-topbar__actions">
            <a href="{{ route('admin.dashboard') }}" class="admin-button admin-button--ghost">Dashboard</a>
        </div>
    </div>

    <section class="admin-form-layout">
        <article class="admin-card">
            <div class="admin-section-head">
                <div>
                    <h2>Profil ma'lumotlari</h2>
                    <p class="admin-note">Bu ma'lumotlar yuqori o'ng burchakdagi user profile ichida ko'rinadi.</p>
                </div>
            </div>

            <form method="POST" action="{{ route('admin.profile.update') }}" class="admin-form-grid">
                @csrf
                @method('PUT')

                <div class="admin-field">
                    <label for="name">Ism</label>
                    <input id="name" type="text" name="name" value="{{ old('name', $user->name) }}" required>
                    @error('name')
                        <div class="admin-error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="admin-form-grid admin-form-grid--compact">
                    <div class="admin-field">
                        <label for="login">Login</label>
                        <input id="login" type="text" name="login" value="{{ old('login', $user->login) }}" required>
                        @error('login')
                            <div class="admin-error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="admin-field">
                        <label for="email">Email</label>
                        <input id="email" type="email" name="email" value="{{ old('email', $user->email) }}" required>
                        @error('email')
                            <div class="admin-error">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="admin-actions">
                    <button type="submit" class="admin-button">Profilni saqlash</button>
                </div>
            </form>
        </article>

        <div class="admin-stack">
            <article class="admin-card" id="profile-password">
                <div class="admin-section-head">
                    <div>
                        <h2>Parolni almashtirish</h2>
                        <p class="admin-note">Xavfsizlik uchun kamida 8 belgi, harf va raqam ishlating.</p>
                    </div>
                </div>

                <form method="POST" action="{{ route('admin.profile.password') }}" class="admin-form-grid">
                    @csrf
                    @method('PUT')

                    <div class="admin-field">
                        <label for="current_password">Hozirgi parol</label>
                        <input id="current_password" type="password" name="current_password" autocomplete="current-password" required>
                        @error('current_password')
                            <div class="admin-error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="admin-field">
                        <label for="password">Yangi parol</label>
                        <input id="password" type="password" name="password" autocomplete="new-password" required>
                        @error('password')
                            <div class="admin-error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="admin-field">
                        <label for="password_confirmation">Yangi parolni tasdiqlash</label>
                        <input id="password_confirmation" type="password" name="password_confirmation" autocomplete="new-password" required>
                    </div>

                    <div class="admin-actions">
                        <button type="submit" class="admin-button">Parolni yangilash</button>
                    </div>
                </form>
            </article>

            <article class="admin-card">
                <div class="admin-section-head">
                    <div>
                        <h2>Auth holati</h2>
                        <p class="admin-note">Joriy sessiya ma'lumotlari.</p>
                    </div>
                </div>

                <div class="admin-hint-list">
                    <article class="admin-table-card">
                        <strong>{{ $user->name }}</strong>
                        <div class="admin-meta">{{ $user->email }}</div>
                    </article>

                    <article class="admin-table-card">
                        <strong>Login</strong>
                        <div class="admin-meta admin-mono">{{ $user->login }}</div>
                    </article>

                    <article class="admin-table-card">
                        <strong>Role</strong>
                        <div class="admin-meta">{{ $user->is_admin ? 'Super Administrator' : 'User' }}</div>
                    </article>
                </div>
            </article>
        </div>
    </section>
@endsection
