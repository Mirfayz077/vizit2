<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;
use Illuminate\View\View;

class ProfileController extends Controller
{
    public function show(Request $request): View
    {
        return view('admin.profile.show', [
            'user' => $request->user(),
        ]);
    }

    public function update(Request $request): RedirectResponse
    {
        $user = $request->user();

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:120'],
            'login' => [
                'required',
                'string',
                'alpha_dash:ascii',
                'max:80',
                Rule::unique('users', 'login')->ignore($user->id),
            ],
            'email' => [
                'required',
                'email',
                'max:120',
                Rule::unique('users', 'email')->ignore($user->id),
            ],
        ]);

        $user->update($validated);

        return back()->with('status', 'Profil ma\'lumotlari yangilandi.');
    }

    public function updatePassword(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'current_password' => ['required', 'current_password'],
            'password' => ['required', 'confirmed', Password::min(8)->letters()->numbers()],
        ]);

        $request->user()->update([
            'password' => Hash::make($validated['password']),
        ]);

        $request->session()->regenerate();

        return back()->with('status', 'Parol yangilandi.');
    }
}
