@extends('admin.layout')

@section('title', 'Proektlar')

@section('content')
    <div class="admin-topbar">
        <div>
            <p class="admin-eyebrow">portfolio management</p>
            <h1>Proektlar</h1>
            <p>Public sahifadagi portfolio lentasi va asosiy preview shu ro'yxatdan boshqariladi.</p>
        </div>

        <div class="admin-topbar__actions">
            <a href="{{ route('admin.projects.create') }}" class="admin-button">Yangi proekt</a>
            <a href="{{ route('admin.dashboard') }}" class="admin-button admin-button--ghost">Dashboard</a>
        </div>
    </div>

    <section class="admin-summary-grid">
        <article class="admin-card">
            <div class="admin-kpi__label">Jami</div>
            <div class="admin-kpi__value">{{ $stats['total'] }}</div>
            <div class="admin-kpi__meta">Barcha proektlar</div>
        </article>

        <article class="admin-card">
            <div class="admin-kpi__label">Aktiv</div>
            <div class="admin-kpi__value">{{ $stats['active'] }}</div>
            <div class="admin-kpi__meta">Public sahifada ko'rinadi</div>
        </article>

        <article class="admin-card">
            <div class="admin-kpi__label">Yashirin</div>
            <div class="admin-kpi__value">{{ $stats['inactive'] }}</div>
            <div class="admin-kpi__meta">Vaqtincha o'chirilgan</div>
        </article>

        <article class="admin-card">
            <div class="admin-kpi__label">Featured</div>
            <div class="admin-kpi__value">{{ $stats['featured'] }}</div>
            <div class="admin-kpi__meta">Yuqoridagi katta preview</div>
        </article>
    </section>

    <article class="admin-card">
        <div class="admin-section-head">
            <div>
                <h2>Proektlar ro'yxati</h2>
                <p class="admin-note">Aktiv proektlar public lentada `row` va `sort_order` bo'yicha chiqadi.</p>
            </div>
        </div>

        <div class="admin-stack">
            @forelse ($projects as $project)
                <article class="admin-table-card">
                    <div class="admin-row admin-row--spread admin-row--top">
                        <div class="admin-project-preview">
                            @if ($project->image)
                                <img src="{{ asset($project->image) }}" alt="{{ $project->title }} preview">
                            @else
                                <span>{{ strtoupper(substr($project->title, 0, 1)) }}</span>
                            @endif
                        </div>

                        <div class="admin-project-main">
                            <div class="admin-row admin-row--spread">
                                <div>
                                    <strong>{{ $project->title }}</strong>
                                    <div class="admin-meta admin-mono">/{{ $project->slug }}</div>
                                </div>

                                <div class="admin-chip-row">
                                    @if ($project->is_featured)
                                        <span class="admin-badge is-active">Featured</span>
                                    @endif
                                    <span class="admin-badge {{ $project->is_active ? 'is-active' : 'is-inactive' }}">
                                        {{ $project->is_active ? 'Aktiv' : 'Yashirin' }}
                                    </span>
                                </div>
                            </div>

                            <p class="admin-note">{{ $project->description ?: 'Tavsif kiritilmagan.' }}</p>

                            @if ($project->before_state || $project->work_done)
                                <p class="admin-note">
                                    <strong>Oldin:</strong> {{ $project->before_state ?: 'Kiritilmagan' }}
                                    <br>
                                    <strong>Ish:</strong> {{ $project->work_done ?: 'Kiritilmagan' }}
                                </p>
                            @endif

                            <div class="admin-chip-row">
                                <span class="admin-chip">{{ $project->label ?: 'label yo\'q' }}</span>
                                <span class="admin-chip">{{ $project->client_niche ?: 'niche yo\'q' }}</span>
                                <span class="admin-chip">{{ $project->platform ?: 'platforma yo\'q' }}</span>
                                <span class="admin-chip">{{ $project->result ?: 'natija yo\'q' }}</span>
                                <span class="admin-chip">Qator: {{ $project->row }}</span>
                                <span class="admin-chip">Tartib: {{ $project->sort_order }}</span>
                                <span class="admin-chip">Theme: {{ $project->theme }}</span>
                                <span class="admin-chip">{{ $project->updated_at?->format('d.m.Y') }}</span>
                            </div>

                            <div class="admin-actions">
                                <a href="{{ route('admin.projects.edit', $project) }}" class="admin-button admin-button--ghost admin-button--small">Tahrirlash</a>

                                <form method="POST" action="{{ route('admin.projects.destroy', $project) }}" onsubmit="return confirm('Proektni o\\'chirishni tasdiqlaysizmi?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="admin-button admin-button--danger admin-button--small">O'chirish</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </article>
            @empty
                <div class="admin-empty">Hali proekt qo'shilmagan.</div>
            @endforelse
        </div>
    </article>

    <div class="admin-pagination">
        {{ $projects->links() }}
    </div>
@endsection
