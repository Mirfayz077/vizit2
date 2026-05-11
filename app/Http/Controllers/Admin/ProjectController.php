<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class ProjectController extends Controller
{
    public function index(): View
    {
        $projects = Project::query()
            ->orderByDesc('is_featured')
            ->orderBy('row')
            ->orderBy('sort_order')
            ->orderBy('title')
            ->paginate(12);

        $stats = [
            'total' => Project::query()->count(),
            'active' => Project::query()->where('is_active', true)->count(),
            'inactive' => Project::query()->where('is_active', false)->count(),
            'featured' => Project::query()->where('is_featured', true)->count(),
        ];

        return view('admin.projects.index', compact('projects', 'stats'));
    }

    public function create(): View
    {
        return view('admin.projects.form', [
            'project' => new Project([
                'row' => 1,
                'sort_order' => (int) Project::query()->max('sort_order') + 1,
                'theme' => 'bronze',
                'layout' => 'centered',
                'is_active' => true,
            ]),
            'mode' => 'create',
            'themeOptions' => Project::THEMES,
            'layoutOptions' => Project::LAYOUTS,
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $project = Project::query()->create($this->validated($request));
        $this->syncFeaturedProject($project);

        return redirect()
            ->route('admin.projects.index')
            ->with('status', 'Proekt yaratildi.');
    }

    public function edit(Project $project): View
    {
        return view('admin.projects.form', [
            'project' => $project,
            'mode' => 'edit',
            'themeOptions' => Project::THEMES,
            'layoutOptions' => Project::LAYOUTS,
        ]);
    }

    public function update(Request $request, Project $project): RedirectResponse
    {
        $project->update($this->validated($request, $project));
        $this->syncFeaturedProject($project);

        return redirect()
            ->route('admin.projects.index')
            ->with('status', 'Proekt yangilandi.');
    }

    public function destroy(Project $project): RedirectResponse
    {
        $project->delete();

        return redirect()
            ->route('admin.projects.index')
            ->with('status', 'Proekt o\'chirildi.');
    }

    protected function validated(Request $request, ?Project $project = null): array
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:120'],
            'slug' => [
                'nullable',
                'string',
                'max:140',
                Rule::unique('projects', 'slug')->ignore($project?->id),
            ],
            'label' => ['nullable', 'string', 'max:80'],
            'client_niche' => ['nullable', 'string', 'max:120'],
            'description' => ['nullable', 'string', 'max:1200'],
            'before_state' => ['nullable', 'string', 'max:1600'],
            'work_done' => ['nullable', 'string', 'max:1600'],
            'result' => ['nullable', 'string', 'max:140'],
            'platform' => ['nullable', 'string', 'max:80'],
            'image' => ['nullable', 'string', 'max:255'],
            'theme' => ['required', Rule::in(Project::THEMES)],
            'layout' => ['required', Rule::in(Project::LAYOUTS)],
            'row' => ['required', 'integer', 'min:1', 'max:2'],
            'sort_order' => ['required', 'integer', 'min:0', 'max:9999'],
            'is_featured' => ['nullable', 'boolean'],
            'is_active' => ['nullable', 'boolean'],
        ]);

        $baseSlug = Str::slug($validated['slug'] ?: $validated['title']);

        $validated['slug'] = $this->makeUniqueSlug($baseSlug !== '' ? $baseSlug : 'project', $project);
        $validated['label'] = $validated['label'] ?: null;
        $validated['client_niche'] = $validated['client_niche'] ?: null;
        $validated['description'] = $validated['description'] ?: null;
        $validated['before_state'] = $validated['before_state'] ?: null;
        $validated['work_done'] = $validated['work_done'] ?: null;
        $validated['result'] = $validated['result'] ?: null;
        $validated['platform'] = $validated['platform'] ?: null;
        $validated['image'] = $validated['image'] ?: null;
        $validated['is_featured'] = $request->boolean('is_featured');
        $validated['is_active'] = $request->boolean('is_active');

        return $validated;
    }

    protected function makeUniqueSlug(string $slug, ?Project $project = null): string
    {
        $candidate = $slug;
        $counter = 2;

        while (
            Project::query()
                ->where('slug', $candidate)
                ->when($project, fn ($query) => $query->whereKeyNot($project->id))
                ->exists()
        ) {
            $candidate = "{$slug}-{$counter}";
            $counter++;
        }

        return $candidate;
    }

    protected function syncFeaturedProject(Project $project): void
    {
        if (! $project->is_featured) {
            return;
        }

        Project::query()
            ->whereKeyNot($project->id)
            ->update(['is_featured' => false]);
    }
}
