@extends('admin.layout')

@section('title', 'Murojaatlar')

@section('content')
    <div class="admin-topbar">
        <div>
            <p class="admin-eyebrow">lead inbox</p>
            <h1>Murojaatlar</h1>
            <p>Leadlarni qidiring, statusini almashtiring va tafsilotlarni bir necha klikda oching.</p>
        </div>

        <div class="admin-topbar__actions">
            <a href="{{ route('admin.dashboard') }}" class="admin-button admin-button--ghost">Dashboard</a>
            <a href="{{ route('admin.services.index') }}" class="admin-button admin-button--ghost">Xizmatlar</a>
        </div>
    </div>

    <section class="admin-summary-grid">
        @foreach ($statuses as $status => $label)
            <article class="admin-card">
                <div class="admin-kpi__label">{{ $label }}</div>
                <div class="admin-kpi__value">{{ $summary[$status] ?? 0 }}</div>
                <span class="admin-pill" data-status="{{ $status }}">{{ $status }}</span>
            </article>
        @endforeach
    </section>

    <form method="GET" class="admin-card">
        <div class="admin-toolbar">
            <div class="admin-field">
                <label for="search">Qidiruv</label>
                <input id="search" type="text" name="search" value="{{ request('search') }}" placeholder="Ism, telefon, email, kompaniya...">
            </div>

            <div class="admin-field">
                <label for="status">Status</label>
                <select id="status" name="status">
                    <option value="">Barchasi</option>
                    @foreach ($statuses as $value => $label)
                        <option value="{{ $value }}" @selected(request('status') === $value)>{{ $label }}</option>
                    @endforeach
                </select>
            </div>

            <div class="admin-actions">
                <button type="submit" class="admin-button">Filterlash</button>
                <a href="{{ route('admin.inquiries.index') }}" class="admin-button admin-button--ghost">Tozalash</a>
            </div>
        </div>
    </form>

    <div class="admin-stack">
        @forelse ($inquiries as $inquiry)
            <article class="admin-table-card">
                <div class="admin-row admin-row--spread">
                    <div>
                        <strong>{{ $inquiry->name }}</strong>
                        <div class="admin-meta">
                            {{ $inquiry->service?->title ?? 'Xizmat tanlanmagan' }} / {{ $inquiry->phone }}
                        </div>
                    </div>

                    <span class="admin-pill" data-status="{{ $inquiry->status }}">
                        {{ $statuses[$inquiry->status] ?? $inquiry->status }}
                    </span>
                </div>

                <div class="admin-chip-row">
                    <span class="admin-chip">{{ $inquiry->company ?: "Kompaniya yo'q" }}</span>
                    <span class="admin-chip">Бюджет: {{ $inquiry->budget_range ?: "Noma'lum" }}</span>
                    <span class="admin-chip">Связь: {{ ucfirst($inquiry->preferred_contact) }}</span>
                    @if ($inquiry->email)
                        <span class="admin-chip">{{ $inquiry->email }}</span>
                    @endif
                </div>

                <p class="admin-note">{{ \Illuminate\Support\Str::limit($inquiry->project_summary, 180) }}</p>

                <div class="admin-row admin-row--spread">
                    <div class="admin-meta">{{ $inquiry->created_at?->format('d.m.Y H:i') }}</div>

                    <div class="admin-actions">
                        <form method="POST" action="{{ route('admin.inquiries.status', $inquiry) }}">
                            @csrf
                            @method('PATCH')
                            <input type="hidden" name="status" value="reviewing">
                            <button type="submit" class="admin-button admin-button--ghost admin-button--small">Ko'rilmoqda</button>
                        </form>

                        <a href="{{ route('admin.inquiries.show', $inquiry) }}" class="admin-button admin-button--small">Ochish</a>
                    </div>
                </div>
            </article>
        @empty
            <div class="admin-empty">So'rov topilmadi.</div>
        @endforelse
    </div>

    <div class="admin-pagination">
        {{ $inquiries->links() }}
    </div>
@endsection
