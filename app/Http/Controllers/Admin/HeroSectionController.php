<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HeroSection;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HeroSectionController extends Controller
{
    public function edit(): View
    {
        return view('admin.hero.edit', [
            'hero' => HeroSection::singleton(),
        ]);
    }

    public function update(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'specialist_name' => ['required', 'string', 'max:120'],
            'eyebrow' => ['nullable', 'string', 'max:160'],
            'headline' => ['required', 'string', 'max:180'],
            'bio' => ['required', 'string', 'max:1200'],
            'hero_image' => ['nullable', 'string', 'max:255'],
            'primary_cta_label' => ['required', 'string', 'max:80'],
            'primary_cta_url' => ['required', 'string', 'max:255'],
            'secondary_cta_label' => ['required', 'string', 'max:80'],
            'secondary_cta_url' => ['required', 'string', 'max:255'],
            'tertiary_cta_label' => ['required', 'string', 'max:80'],
            'tertiary_cta_url' => ['required', 'string', 'max:255'],
            'achievement_one_value' => ['required', 'string', 'max:40'],
            'achievement_one_label' => ['required', 'string', 'max:120'],
            'achievement_two_value' => ['required', 'string', 'max:40'],
            'achievement_two_label' => ['required', 'string', 'max:120'],
            'achievement_three_value' => ['required', 'string', 'max:40'],
            'achievement_three_label' => ['required', 'string', 'max:120'],
        ]);

        HeroSection::singleton()->update($validated);

        return back()->with('status', 'Hero ma\'lumotlari yangilandi.');
    }
}
