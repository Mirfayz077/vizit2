@extends('admin.layout')

@section('title', 'Murojaat tafsiloti')

@section('content')
    <div class="admin-topbar">
        <div>
            <p class="admin-eyebrow">lead detail</p>
            <h1>{{ $inquiry->name }}</h1>
            <p>{{ $inquiry->service?->title ?? 'Xizmat tanlanmagan' }} / {{ $inquiry->created_at?->format('d.m.Y H:i') }}</p>
        </div>

        <div class="admin-topbar__actions">
            <a href="{{ route('admin.inquiries.index') }}" class="admin-button admin-button--ghost">Orqaga</a>
        </div>
    </div>

    <section class="admin-detail-grid">
        <article class="admin-card">
            <div class="admin-section-head">
                <div>
                    <h2>Proekt briefi</h2>
                    <p class="admin-note">Lead yuborgan asosiy izoh va talablar.</p>
                </div>

                <span class="admin-pill" data-status="{{ $inquiry->status }}">
                    {{ $statuses[$inquiry->status] ?? $inquiry->status }}
                </span>
            </div>

            <div class="admin-chip-row">
                <span class="admin-chip">{{ $inquiry->service?->title ?? 'Xizmat tanlanmagan' }}</span>
                <span class="admin-chip">Byudjet: {{ $inquiry->budget_range ?: 'Belgilanmagan' }}</span>
                <span class="admin-chip">Aloqa: {{ ucfirst($inquiry->preferred_contact) }}</span>
            </div>

            <p class="admin-detail-copy">{{ $inquiry->project_summary }}</p>
        </article>

        <div class="admin-stack">
            <article class="admin-card">
                <div class="admin-section-head">
                    <div>
                        <h2>Aloqa ma'lumotlari</h2>
                        <p class="admin-note">Bog'lanish uchun tayyor ma'lumotlar.</p>
                    </div>
                </div>

                <div class="admin-stack">
                    <article class="admin-table-card">
                        <strong>Telefon</strong>
                        <div class="admin-meta"><a href="tel:{{ $inquiry->phone }}">{{ $inquiry->phone }}</a></div>
                    </article>

                    <article class="admin-table-card">
                        <strong>Email</strong>
                        <div class="admin-meta">
                            @if ($inquiry->email)
                                <a href="mailto:{{ $inquiry->email }}">{{ $inquiry->email }}</a>
                            @else
                                Kiritilmagan
                            @endif
                        </div>
                    </article>

                    <article class="admin-table-card">
                        <strong>Kompaniya</strong>
                        <div class="admin-meta">{{ $inquiry->company ?: 'Kiritilmagan' }}</div>
                    </article>
                </div>

                <div class="admin-actions" style="margin-top: 1rem;">
                    <a href="tel:{{ $inquiry->phone }}" class="admin-button admin-button--ghost admin-button--small">Qo'ng'iroq</a>

                    @if ($inquiry->email)
                        <a href="mailto:{{ $inquiry->email }}" class="admin-button admin-button--ghost admin-button--small">Email</a>
                    @endif
                </div>
            </article>

            <article class="admin-card">
                <div class="admin-section-head">
                    <div>
                        <h2>Statusni yangilash</h2>
                        <p class="admin-note">Lead pipeline holatini shu yerdan boshqaring.</p>
                    </div>
                </div>

                <form method="POST" action="{{ route('admin.inquiries.status', $inquiry) }}" class="admin-form-grid">
                    @csrf
                    @method('PATCH')

                    <div class="admin-field">
                        <label for="status">Holat</label>
                        <select id="status" name="status">
                            @foreach ($statuses as $value => $label)
                                <option value="{{ $value }}" @selected($inquiry->status === $value)>{{ $label }}</option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit" class="admin-button">Saqlash</button>
                </form>
            </article>
        </div>
    </section>
@endsection
