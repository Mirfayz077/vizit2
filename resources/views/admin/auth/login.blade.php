@extends('admin.layout')

@section('title', 'Gentech Secure Login')

@section('content')
    <main class="gentech-auth-page" data-auth-page>
        <div class="gentech-auth-orbit gentech-auth-orbit--one" aria-hidden="true"></div>
        <div class="gentech-auth-orbit gentech-auth-orbit--two" aria-hidden="true"></div>
        <div class="gentech-auth-circuit" aria-hidden="true">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
        </div>

        <section class="gentech-auth-hero" aria-labelledby="gentech-auth-title">
            <a href="{{ route('home') }}" class="gentech-brand" aria-label="Gentech home">
                <span class="gentech-brand__mark" aria-hidden="true">
                    <svg viewBox="0 0 72 72" fill="none">
                        <path d="M36 5L63 20.5V51.5L36 67L9 51.5V20.5L36 5Z" stroke="currentColor" stroke-width="3.2" />
                        <path d="M48 28.5C45.4 23.8 41.2 21.4 35.5 21.4C27.5 21.4 21.5 27.4 21.5 35.8C21.5 44.3 27.6 50.6 36.2 50.6C42.5 50.6 47.4 47.2 49.4 41.8H36.6V34.4H57.2V37.7C57.2 49.7 48.5 58.8 36.1 58.8C22.8 58.8 13.2 49.1 13.2 35.9C13.2 22.7 22.8 13.3 35.7 13.3C44.7 13.3 52 17.8 55.8 25.1L48 28.5Z" fill="currentColor" />
                    </svg>
                </span>

                <span class="gentech-brand__copy">
                    <strong>Gentech</strong>
                    <small>Innovate. Secure. Elevate.</small>
                </span>
            </a>

            <div class="gentech-hero-copy">
                <div class="gentech-hero-bars" aria-hidden="true">
                    <span></span>
                    <span></span>
                </div>

                <p class="gentech-eyebrow">Enterprise secure system</p>

                <h1 id="gentech-auth-title" class="gentech-hero-title">
                    Secure Access
                    <span>for Modern Teams</span>
                </h1>

                <p class="gentech-hero-lead">
                    Empowering innovation through secure technology, seamless collaboration, and premium digital experiences.
                </p>

                <div class="gentech-hero-line" aria-hidden="true"></div>

            </div>

            <figure class="gentech-city-scene" aria-label="Gentech futuristic city skyline">
                <img src="{{ asset('images/gentech-city-skyline.jpg') }}" alt="">
            </figure>
        </section>

        <section class="gentech-auth-panel" aria-label="Login form">
            <div class="gentech-login-card">
                <div class="gentech-lock-badge" aria-hidden="true">
                    <svg viewBox="0 0 24 24" fill="none">
                        <path d="M7 10V8.2C7 5.3 9.1 3.2 12 3.2C14.9 3.2 17 5.3 17 8.2V10" stroke="currentColor" stroke-linecap="round" stroke-width="1.9" />
                        <path d="M6 10H18V19H6V10Z" stroke="currentColor" stroke-linejoin="round" stroke-width="1.9" />
                        <path d="M12 14V16.5" stroke="currentColor" stroke-linecap="round" stroke-width="1.9" />
                    </svg>
                </div>

                <div class="gentech-login-head">
                    <h2>Welcome back</h2>
                    <p><span></span> Sign in to continue to Gentech <span></span></p>
                </div>

                @if ($errors->any())
                    <div class="gentech-auth-alert" role="alert">
                        <svg viewBox="0 0 24 24" fill="none" aria-hidden="true">
                            <path d="M12 8V12.5" stroke="currentColor" stroke-linecap="round" stroke-width="2" />
                            <path d="M12 16H12.01" stroke="currentColor" stroke-linecap="round" stroke-width="2.4" />
                            <path d="M10.4 4.9L3.7 16.4C3 17.7 3.9 19.3 5.4 19.3H18.6C20.1 19.3 21 17.7 20.3 16.4L13.6 4.9C12.9 3.7 11.1 3.7 10.4 4.9Z" stroke="currentColor" stroke-linejoin="round" stroke-width="1.8" />
                        </svg>
                        <span>{{ $errors->first() }}</span>
                    </div>
                @endif

                <form method="POST" action="{{ route('admin.login.store') }}" class="gentech-login-form" data-auth-form>
                    @csrf

                    <div class="gentech-field">
                        <label for="login">Login</label>
                        <div class="gentech-input-wrap">
                            <svg viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                <path d="M12 12C14.2 12 16 10.2 16 8C16 5.8 14.2 4 12 4C9.8 4 8 5.8 8 8C8 10.2 9.8 12 12 12Z" stroke="currentColor" stroke-width="1.8" />
                                <path d="M5 20C5.7 16.8 8.2 15 12 15C15.8 15 18.3 16.8 19 20" stroke="currentColor" stroke-linecap="round" stroke-width="1.8" />
                            </svg>
                            <input
                                id="login"
                                type="text"
                                name="login"
                                value="{{ old('login') }}"
                                autocomplete="username"
                                placeholder="Enter your email or username"
                                required
                                autofocus
                            >
                        </div>
                        @error('login')
                            <small>{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="gentech-field">
                        <label for="password">Password</label>
                        <div class="gentech-input-wrap">
                            <svg viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                <path d="M7 10V8.2C7 5.4 9 3.5 12 3.5C15 3.5 17 5.4 17 8.2V10" stroke="currentColor" stroke-linecap="round" stroke-width="1.8" />
                                <path d="M6 10H18V19.5H6V10Z" stroke="currentColor" stroke-linejoin="round" stroke-width="1.8" />
                                <path d="M12 14V16.4" stroke="currentColor" stroke-linecap="round" stroke-width="1.8" />
                            </svg>
                            <input
                                id="password"
                                type="password"
                                name="password"
                                autocomplete="current-password"
                                placeholder="Enter your password"
                                required
                            >
                            <button type="button" class="gentech-password-toggle" data-password-toggle aria-controls="password" aria-label="Show password">
                                <svg viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                    <path d="M3.5 12C5.6 8.6 8.4 6.9 12 6.9C15.6 6.9 18.4 8.6 20.5 12C18.4 15.4 15.6 17.1 12 17.1C8.4 17.1 5.6 15.4 3.5 12Z" stroke="currentColor" stroke-linejoin="round" stroke-width="1.8" />
                                    <path d="M12 14.4C13.3 14.4 14.4 13.3 14.4 12C14.4 10.7 13.3 9.6 12 9.6C10.7 9.6 9.6 10.7 9.6 12C9.6 13.3 10.7 14.4 12 14.4Z" stroke="currentColor" stroke-width="1.8" />
                                </svg>
                            </button>
                        </div>
                        @error('password')
                            <small>{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="gentech-form-row">
                        <label class="gentech-remember">
                            <input type="checkbox" name="remember" value="1" @checked(old('remember'))>
                            <span aria-hidden="true">
                                <svg viewBox="0 0 18 18" fill="none">
                                    <path d="M4 9.2L7.3 12.5L14 5.8" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                </svg>
                            </span>
                            Remember me
                        </label>

                        <a href="mailto:hello@gentech.uz?subject=Admin%20password%20reset" class="gentech-forgot-link">Forgot password?</a>
                    </div>

                    <button type="submit" class="gentech-submit" data-auth-submit>
                        <span class="gentech-submit__idle">Sign In</span>
                        <span class="gentech-submit__loading">Signing in...</span>
                        <svg viewBox="0 0 24 24" fill="none" aria-hidden="true">
                            <path d="M5 12H19" stroke="currentColor" stroke-linecap="round" stroke-width="2" />
                            <path d="M13 6L19 12L13 18" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                        </svg>
                    </button>
                </form>

                <div class="gentech-security-note">
                    <span aria-hidden="true">
                        <svg viewBox="0 0 24 24" fill="none">
                            <path d="M12 3L19 6.2V11.7C19 15.3 16.6 18.4 12 21C7.4 18.4 5 15.3 5 11.7V6.2L12 3Z" stroke="currentColor" stroke-linejoin="round" stroke-width="1.8" />
                            <path d="M9.3 12L11.2 13.9L15 10.1" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" />
                        </svg>
                    </span>
                    Protected by enterprise-grade security
                </div>
            </div>
        </section>
    </main>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const password = document.getElementById('password');
            const passwordToggle = document.querySelector('[data-password-toggle]');
            const form = document.querySelector('[data-auth-form]');
            const submit = document.querySelector('[data-auth-submit]');

            if (password && passwordToggle) {
                passwordToggle.addEventListener('click', () => {
                    const isVisible = password.type === 'text';

                    password.type = isVisible ? 'password' : 'text';
                    passwordToggle.classList.toggle('is-visible', !isVisible);
                    passwordToggle.setAttribute('aria-label', isVisible ? 'Show password' : 'Hide password');
                });
            }

            if (form && submit) {
                form.addEventListener('submit', () => {
                    submit.classList.add('is-loading');
                    submit.setAttribute('aria-busy', 'true');
                });
            }
        });
    </script>
@endsection
