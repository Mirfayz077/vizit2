@extends('admin.layout')

@section('title', 'Xizmatlar')

@section('content')
    <div class="admin-topbar">
        <div>
            <p class="admin-eyebrow">service management</p>
            <h1>Xizmatlar</h1>
            <p>Public form select va admin oqimi shu ro'yxatdagi aktiv xizmatlarga tayanadi.</p>
        </div>

        <div class="admin-topbar__actions">
            <a href="{{ route('admin.services.create') }}" class="admin-button">Yangi xizmat</a>
            <a href="{{ route('admin.dashboard') }}" class="admin-button admin-button--ghost">Dashboard</a>
        </div>
    </div>

    <section class="admin-summary-grid">
        <article class="admin-card">
            <div class="admin-kpi__label">Jami</div>
            <div class="admin-kpi__value">{{ $stats['total'] }}</div>
            <div class="admin-kpi__meta">Barcha xizmatlar</div>
        </article>

        <article class="admin-card">
            <div class="admin-kpi__label">Aktiv</div>
            <div class="admin-kpi__value">{{ $stats['active'] }}</div>
            <div class="admin-kpi__meta">Public formda ko'rinadi</div>
        </article>

        <article class="admin-card">
            <div class="admin-kpi__label">Yashirin</div>
            <div class="admin-kpi__value">{{ $stats['inactive'] }}</div>
            <div class="admin-kpi__meta">Vaqtincha o'chirilgan</div>
        </article>

        <article class="admin-card">
            <div class="admin-kpi__label">Bog'langan leadlar</div>
            <div class="admin-kpi__value">{{ $stats['linked_inquiries'] }}</div>
            <div class="admin-kpi__meta">Xizmat tanlangan murojaatlar</div>
        </article>
    </section>

    <article class="admin-card">
        <div class="admin-section-head">
            <div>
                <h2>Xizmatlar ro'yxati</h2>
                <p class="admin-note">Aktiv xizmatlar forma ichida `sort_order` bo'yicha chiqadi.</p>
            </div>
        </div>

        <div class="admin-stack">
            @forelse ($services as $service)
                <article class="admin-table-card">
                    <div class="admin-row admin-row--spread">
                        <div>
                            <strong>{{ $service->title }}</strong>
                            <div class="admin-meta admin-mono">/{{ $service->slug }}</div>
                        </div>

                        <span class="admin-badge {{ $service->is_active ? 'is-active' : 'is-inactive' }}">
                            {{ $service->is_active ? 'Aktiv' : 'Yashirin' }}
                        </span>
                    </div>

                    <p class="admin-note">{{ $service->description ?: 'Tavsif kiritilmagan.' }}</p>

                    @if ($service->benefit)
                        <p class="admin-note"><strong>Benefit:</strong> {{ $service->benefit }}</p>
                    @endif

                    <div class="admin-chip-row">
                        <span class="admin-chip">{{ $service->price ?: 'Narx kiritilmagan' }}</span>
                        <span class="admin-chip">Icon: {{ $service->icon ?: 'default' }}</span>
                        <span class="admin-chip">Tartib: {{ $service->sort_order }}</span>
                        <span class="admin-chip">So'rovlar: {{ $service->inquiries_count }}</span>
                        <span class="admin-chip">{{ $service->updated_at?->format('d.m.Y') }}</span>
                    </div>

                    <div class="admin-actions">
                        <a href="{{ route('admin.services.edit', $service) }}" class="admin-button admin-button--ghost admin-button--small">Tahrirlash</a>

                        <form method="POST" action="{{ route('admin.services.destroy', $service) }}" onsubmit="return confirm('Xizmatni o\\'chirishni tasdiqlaysizmi?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="admin-button admin-button--danger admin-button--small">O'chirish</button>
                        </form>
                    </div>
                </article>
            @empty
                <div class="admin-empty">Hali xizmat qo'shilmagan.</div>
            @endforelse
        </div>
    </article>

    <div class="admin-pagination">
        {{ $services->links() }}
    </div>
@endsection
