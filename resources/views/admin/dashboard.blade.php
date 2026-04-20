@extends('admin.layout')

@section('title', 'Dashboard')

@section('content')
    <div class="admin-topbar">
        <div>
            <p class="admin-eyebrow">lead control room</p>
            <h1>Dashboard</h1>
            <p>Lead oqimi, xizmatlar va so'nggi murojaatlar bir joyga jamlandi. Shu yerdan tez kirib, kerakli bo'limga o'tishingiz mumkin.</p>
        </div>

        <div class="admin-topbar__actions">
            <a href="{{ route('admin.services.create') }}" class="admin-button">Yangi xizmat</a>

            <form method="POST" action="{{ route('admin.logout') }}">
                @csrf
                <button type="submit" class="admin-button admin-button--ghost">Chiqish</button>
            </form>
        </div>
    </div>

    <section class="admin-kpi-grid">
        <article class="admin-card">
            <div class="admin-kpi__label">Jami murojaat</div>
            <div class="admin-kpi__value">{{ $stats['total_inquiries'] }}</div>
            <div class="admin-kpi__meta">Barcha kelgan leadlar</div>
        </article>

        <article class="admin-card">
            <div class="admin-kpi__label">Yangi</div>
            <div class="admin-kpi__value">{{ $stats['new_inquiries'] }}</div>
            <div class="admin-kpi__meta">Hali ishlov berilmaganlar</div>
        </article>

        <article class="admin-card">
            <div class="admin-kpi__label">Ko'rilmoqda</div>
            <div class="admin-kpi__value">{{ $stats['reviewing_inquiries'] }}</div>
            <div class="admin-kpi__meta">Jarayondagi leadlar</div>
        </article>

        <article class="admin-card">
            <div class="admin-kpi__label">Bugun</div>
            <div class="admin-kpi__value">{{ $stats['today_inquiries'] }}</div>
            <div class="admin-kpi__meta">Bugungi oqim</div>
        </article>

        <article class="admin-card">
            <div class="admin-kpi__label">Aktiv xizmat</div>
            <div class="admin-kpi__value">{{ $stats['active_services'] }}</div>
            <div class="admin-kpi__meta">Yashirin: {{ $stats['inactive_services'] }}</div>
        </article>
    </section>

    <section class="admin-grid admin-grid--two">
        <article class="admin-card">
            <div class="admin-section-head">
                <div>
                    <h2>So'nggi murojaatlar</h2>
                    <p class="admin-note">Oxirgi kelgan leadlarni shu yerdan tez ochishingiz mumkin.</p>
                </div>

                <a href="{{ route('admin.inquiries.index') }}" class="admin-button admin-button--ghost admin-button--small">Barchasi</a>
            </div>

            <div class="admin-stack">
                @forelse ($recentInquiries as $inquiry)
                    <article class="admin-table-card">
                        <div class="admin-row admin-row--spread">
                            <div>
                                <strong>{{ $inquiry->name }}</strong>
                                <div class="admin-meta">
                                    {{ $inquiry->service?->title ?? 'Xizmat tanlanmagan' }} / {{ $inquiry->phone }}
                                </div>
                            </div>

                            <span class="admin-pill" data-status="{{ $inquiry->status }}">
                                {{ \App\Models\Inquiry::statusOptions()[$inquiry->status] ?? $inquiry->status }}
                            </span>
                        </div>

                        <p class="admin-note">{{ \Illuminate\Support\Str::limit($inquiry->project_summary, 140) }}</p>

                        <div class="admin-row admin-row--spread">
                            <div class="admin-meta">
                                {{ $inquiry->company ?: "Kompaniya ko'rsatilmagan" }} / {{ $inquiry->created_at?->format('d.m.Y H:i') }}
                            </div>

                            <div class="admin-actions">
                                <a href="{{ route('admin.inquiries.show', $inquiry) }}" class="admin-button admin-button--ghost admin-button--small">Ochish</a>
                            </div>
                        </div>
                    </article>
                @empty
                    <div class="admin-empty">Hali murojaatlar kelmagan.</div>
                @endforelse
            </div>
        </article>

        <div class="admin-stack">
            <article class="admin-card">
                <div class="admin-section-head">
                    <div>
                        <h2>Pipeline holati</h2>
                        <p class="admin-note">Status bo'yicha leadlar taqsimoti.</p>
                    </div>
                </div>

                <div class="admin-summary-grid">
                    @foreach ($pipeline as $status => $item)
                        <article class="admin-table-card">
                            <div class="admin-kpi__label">{{ $item['label'] }}</div>
                            <div class="admin-kpi__value">{{ $item['count'] }}</div>
                            <span class="admin-pill" data-status="{{ $status }}">{{ $status }}</span>
                        </article>
                    @endforeach
                </div>
            </article>

            <article class="admin-card">
                <div class="admin-section-head">
                    <div>
                        <h2>Xizmatlar kesimi</h2>
                        <p class="admin-note">Qaysi xizmatga ko'proq murojaat tushayotgani ko'rinadi.</p>
                    </div>

                    <a href="{{ route('admin.services.index') }}" class="admin-button admin-button--ghost admin-button--small">Xizmatlar</a>
                </div>

                <div class="admin-stack">
                    @forelse ($serviceBreakdown as $service)
                        <article class="admin-table-card">
                            <div class="admin-row admin-row--spread">
                                <div>
                                    <strong>{{ $service->title }}</strong>
                                    <div class="admin-meta">{{ $service->description ?: 'Tavsif kiritilmagan.' }}</div>
                                </div>

                                <span class="admin-badge {{ $service->is_active ? 'is-active' : 'is-inactive' }}">
                                    {{ $service->inquiries_count }} so'rov
                                </span>
                            </div>
                        </article>
                    @empty
                        <div class="admin-empty">Xizmatlar bazasi hali tayyor emas.</div>
                    @endforelse
                </div>
            </article>
        </div>
    </section>
@endsection
