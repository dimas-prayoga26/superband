@extends('admin.layout', ['title' => 'Dashboard'])

@section('content')
    <section class="content">
        <div class="hero">
            <div class="hero-text">
                <span class="eyebrow">{{ now()->translatedFormat('l, d F Y') }}</span>
                <h1 class="hero-title">Welcome back, <span class="accent">{{ auth()->user()?->name ?? 'Admin' }}</span></h1>
                <p class="hero-sub">
                    Pantau pendaftaran Indonesia Superband Competition dari satu panel ringkas.
                    Total peserta saat ini <strong>{{ number_format($totalRegistrations) }}</strong> pendaftar.
                </p>
            </div>
            <div class="hero-actions">
                <a class="btn btn--ghost" href="{{ route('home') }}">
                    <svg viewBox="0 0 24 24" aria-hidden="true">
                        <path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"></path>
                        <path d="M15 3h6v6" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"></path>
                        <path d="M10 14 21 3" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg>
                    Website
                </a>
                <a class="btn btn--primary" href="{{ route('admin.participants') }}">
                    <svg viewBox="0 0 24 24" aria-hidden="true">
                        <path d="M17 21v-2a4 4 0 0 0-4-4H7a4 4 0 0 0-4 4v2" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"></path>
                        <circle cx="10" cy="7" r="4" fill="none" stroke="currentColor"></circle>
                    </svg>
                    Lihat Peserta
                </a>
            </div>
        </div>

        <div class="kpi-grid">
            <div class="kpi-card">
                <div class="kpi-head">
                    <span class="kpi-icon green">
                        <svg viewBox="0 0 24 24" aria-hidden="true">
                            <path d="M17 21v-2a4 4 0 0 0-4-4H7a4 4 0 0 0-4 4v2" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"></path>
                            <circle cx="10" cy="7" r="4" fill="none" stroke="currentColor"></circle>
                        </svg>
                    </span>
                    <span class="kpi-label">Total Peserta</span>
                </div>
                <div class="kpi-value">{{ number_format($totalRegistrations) }}</div>
                <div class="kpi-foot">Semua pendaftar yang masuk</div>
            </div>

            <div class="kpi-card">
                <div class="kpi-head">
                    <span class="kpi-icon red">
                        <svg viewBox="0 0 24 24" aria-hidden="true">
                            <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"></path>
                            <path d="M14 2v6h6" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg>
                    </span>
                    <span class="kpi-label">Submitted</span>
                </div>
                <div class="kpi-value">{{ number_format($submittedRegistrations) }}</div>
                <div class="kpi-foot">Data siap ditinjau panitia</div>
            </div>

            <div class="kpi-card">
                <div class="kpi-head">
                    <span class="kpi-icon purple">
                        <svg viewBox="0 0 24 24" aria-hidden="true">
                            <path d="M3 21h18" fill="none" stroke="currentColor" stroke-linecap="round"></path>
                            <path d="M5 21V7l8-4v18" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"></path>
                            <path d="M19 21V11l-6-3" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg>
                    </span>
                    <span class="kpi-label">Sekolah</span>
                </div>
                <div class="kpi-value">{{ number_format($schoolCount) }}</div>
                <div class="kpi-foot">Asal sekolah berbeda</div>
            </div>

            <div class="kpi-card">
                <div class="kpi-head">
                    <span class="kpi-icon blue">
                        <svg viewBox="0 0 24 24" aria-hidden="true">
                            <path d="M9 18V5l12-2v13" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"></path>
                            <circle cx="6" cy="18" r="3" fill="none" stroke="currentColor"></circle>
                            <circle cx="18" cy="16" r="3" fill="none" stroke="currentColor"></circle>
                        </svg>
                    </span>
                    <span class="kpi-label">Kategori</span>
                </div>
                <div class="kpi-value">{{ number_format($positionCount) }}</div>
                <div class="kpi-foot">Posisi audisi terisi</div>
            </div>
        </div>

        <div class="grid" style="margin-top: 20px;">
            <section class="card col-6">
                <div class="card-head">
                    <div class="card-title-wrap">
                        <span class="eyebrow">AUDISI</span>
                        <h2 class="card-title">Sebaran Kategori</h2>
                    </div>
                </div>

                @if ($positions->isEmpty())
                    <div class="isc-page-empty">Belum ada data kategori audisi.</div>
                @else
                    <div class="isc-stat-line">
                        @foreach ($positions as $position)
                            <div class="isc-stat-item">
                                <div class="isc-stat-head">
                                    <span class="isc-stat-name">{{ $position['audition_position'] }}</span>
                                    <span class="isc-stat-value">{{ $position['total'] }} peserta - {{ $position['percentage'] }}%</span>
                                </div>
                                <div class="isc-progress" aria-hidden="true">
                                    <span style="width: {{ max($position['percentage'], 4) }}%"></span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </section>

            <section class="card col-6">
                <div class="card-head">
                    <div class="card-title-wrap">
                        <span class="eyebrow">TERBARU</span>
                        <h2 class="card-title">Pendaftar Masuk</h2>
                    </div>
                    <a class="card-action" href="{{ route('admin.participants') }}">Lihat semua</a>
                </div>

                <div class="table-scroll">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Peserta</th>
                                <th>Kategori</th>
                                <th>Status</th>
                                <th>Tanggal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($latestRegistrations as $registration)
                                @php
                                    $participantPhotoUrl = $registration->photo_path ? asset('storage/'.$registration->photo_path) : null;
                                @endphp
                                <tr>
                                    <td>
                                        <div class="isc-photo-cell">
                                            @if ($participantPhotoUrl)
                                                <span class="isc-avatar is-photo">
                                                    <img src="{{ $participantPhotoUrl }}" alt="Foto {{ $registration->full_name }}">
                                                </span>
                                            @else
                                                <span class="isc-avatar">{{ strtoupper(substr($registration->full_name, 0, 1)) }}</span>
                                            @endif
                                            <span>
                                                <span class="cell-name">{{ $registration->stage_name ?: $registration->full_name }}</span>
                                                <span class="cell-date">{{ $registration->school }} - Kelas {{ $registration->grade }}</span>
                                            </span>
                                        </div>
                                    </td>
                                    <td>{{ $registration->audition_position }}</td>
                                    <td><span class="tag t-active">{{ ucfirst($registration->status) }}</span></td>
                                    <td class="cell-date">{{ $registration->created_at?->format('d M Y') }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4">
                                        <div class="isc-page-empty">Belum ada peserta yang mendaftar.</div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </section>
        </div>
    </section>
@endsection
