<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SiteSettingController extends Controller
{
    public function edit(): View
    {
        return view('admin.settings.edit', [
            'settings' => SiteSetting::singleton(),
        ]);
    }

    public function update(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'phone' => ['required', 'string', 'max:40'],
            'telegram' => ['required', 'string', 'max:255'],
            'instagram' => ['required', 'string', 'max:255'],
            'whatsapp' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:160'],
            'location' => ['required', 'string', 'max:160'],
            'consultation_link' => ['required', 'string', 'max:255'],
        ]);

        SiteSetting::singleton()->update($validated);

        return redirect()
            ->route('admin.settings.edit')
            ->with('status', 'Kontakt sozlamalari yangilandi.');
    }
}
