<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Inquiry;
use App\Models\Service;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class ServiceController extends Controller
{
    public function index(): View
    {
        $services = Service::query()
            ->withCount('inquiries')
            ->orderBy('sort_order')
            ->orderBy('title')
            ->paginate(12);

        $stats = [
            'total' => Service::query()->count(),
            'active' => Service::query()->where('is_active', true)->count(),
            'inactive' => Service::query()->where('is_active', false)->count(),
            'linked_inquiries' => Inquiry::query()->whereNotNull('service_id')->count(),
        ];

        return view('admin.services.index', compact('services', 'stats'));
    }

    public function create(): View
    {
        return view('admin.services.form', [
            'service' => new Service([
                'sort_order' => Service::query()->max('sort_order') + 1,
                'is_active' => true,
            ]),
            'mode' => 'create',
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        Service::query()->create($this->validated($request));

        return redirect()
            ->route('admin.services.index')
            ->with('status', 'Xizmat yaratildi.');
    }

    public function edit(Service $service): View
    {
        return view('admin.services.form', [
            'service' => $service,
            'mode' => 'edit',
        ]);
    }

    public function update(Request $request, Service $service): RedirectResponse
    {
        $service->update($this->validated($request, $service));

        return redirect()
            ->route('admin.services.index')
            ->with('status', 'Xizmat yangilandi.');
    }

    public function destroy(Service $service): RedirectResponse
    {
        $service->delete();

        return redirect()
            ->route('admin.services.index')
            ->with('status', 'Xizmat o\'chirildi.');
    }

    protected function validated(Request $request, ?Service $service = null): array
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:120'],
            'slug' => [
                'nullable',
                'string',
                'max:120',
                Rule::unique('services', 'slug')->ignore($service?->id),
            ],
            'description' => ['nullable', 'string', 'max:1000'],
            'price' => ['nullable', 'string', 'max:80'],
            'icon' => ['nullable', 'string', 'max:60'],
            'benefit' => ['nullable', 'string', 'max:255'],
            'sort_order' => ['required', 'integer', 'min:0', 'max:9999'],
            'is_active' => ['nullable', 'boolean'],
        ]);

        $baseSlug = Str::slug($validated['slug'] ?: $validated['title']);

        $validated['slug'] = $this->makeUniqueSlug($baseSlug !== '' ? $baseSlug : 'service', $service);
        $validated['price'] = $validated['price'] ?: null;
        $validated['icon'] = $validated['icon'] ?: null;
        $validated['benefit'] = $validated['benefit'] ?: null;
        $validated['is_active'] = $request->boolean('is_active');

        return $validated;
    }

    protected function makeUniqueSlug(string $slug, ?Service $service = null): string
    {
        $candidate = $slug;
        $counter = 2;

        while (
            Service::query()
                ->where('slug', $candidate)
                ->when($service, fn ($query) => $query->whereKeyNot($service->id))
                ->exists()
        ) {
            $candidate = "{$slug}-{$counter}";
            $counter++;
        }

        return $candidate;
    }
}
