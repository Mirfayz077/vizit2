<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class AuthController extends Controller
{
    public function create(): View|RedirectResponse
    {
        if (Auth::check()) {
            return redirect()->route('admin.dashboard');
        }

        return view('admin.auth.login');
    }

    public function store(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'login' => ['required', 'string', 'max:120'],
            'password' => ['required', 'string'],
        ]);

        $throttleKey = $this->throttleKey($request, $credentials['login']);

        if (RateLimiter::tooManyAttempts($throttleKey, 5)) {
            $seconds = RateLimiter::availableIn($throttleKey);

            throw ValidationException::withMessages([
                'login' => "Juda ko'p urinish bo'ldi. {$seconds} soniyadan keyin qayta urinib ko'ring.",
            ]);
        }

        $remember = $request->boolean('remember');

        $loginField = filter_var($credentials['login'], FILTER_VALIDATE_EMAIL) ? 'email' : 'login';

        if (! Auth::attempt([
            $loginField => $credentials['login'],
            'password' => $credentials['password'],
            'is_admin' => true,
        ], $remember)) {
            RateLimiter::hit($throttleKey, 60);

            return back()
                ->withErrors([
                    'login' => 'Login yoki parol noto\'g\'ri.',
                ])
                ->onlyInput('login');
        }

        RateLimiter::clear($throttleKey);

        $request->session()->regenerate();

        return redirect()->intended(route('admin.dashboard'));
    }

    public function destroy(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.login');
    }

    private function throttleKey(Request $request, string $login): string
    {
        return Str::lower($login).'|'.$request->ip();
    }
}
