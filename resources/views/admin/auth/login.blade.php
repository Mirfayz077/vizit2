@extends('admin.layout')

@section('title', 'Admin Login')

@section('content')
    <div class="admin-auth-shell">
        <div class="admin-auth-card">
            <div class="admin-brand">
                <span class="admin-brand__mark" aria-hidden="true">
                    <svg viewBox="0 0 64 64" fill="none" width="26" height="26">
                        <circle cx="32" cy="32" r="29" stroke="currentColor" stroke-width="2.5" />
                        <path d="M18 39L28.5 22H35L25 42" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="3" />
                        <path d="M30 42L39 22H46L36.5 42" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="3" />
                    </svg>
                </span>

                <span class="admin-brand__copy">
                    <strong>Mirsaar Admin</strong>
                    <small>secure access</small>
                </span>
            </div>

            <p class="admin-eyebrow">secure access</p>
            <h1 class="admin-auth-title">Admin kirish</h1>
            <p class="admin-auth-copy">
                Murojaatlar, xizmatlar va premium lead oqimini shu paneldan boshqarasiz.
            </p>

            <form method="POST" action="{{ route('admin.login.store') }}" class="admin-form-grid">
                @csrf

                <div class="admin-field">
                    <label for="login">Login</label>
                    <input id="login" type="text" name="login" value="{{ old('login') }}" required autofocus>
                    @error('login')
                        <div class="admin-error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="admin-field">
                    <label for="password">Parol</label>
                    <input id="password" type="password" name="password" required>
                    @error('password')
                        <div class="admin-error">{{ $message }}</div>
                    @enderror
                </div>

                <label style="display:flex; align-items:center; gap:.55rem; color:var(--admin-muted); font-size:.9rem;">
                    <input type="checkbox" name="remember" value="1">
                    Eslab qolish
                </label>

                <button type="submit" class="admin-button">Panelga kirish</button>
            </form>
        </div>
    </div>
@endsection
