@extends('admin.layout', ['title' => 'Peserta'])

@section('content')
    <section class="content">
        <div class="hero">
            <div class="hero-text">
                <span class="eyebrow">PESERTA</span>
                <h1 class="hero-title">Data Peserta Audisi</h1>
                <p class="hero-sub">
                    Daftar peserta yang sudah mengirim form registrasi. Total data saat ini
                    <strong>{{ number_format($totalRegistrations) }}</strong> peserta.
                </p>
            </div>
            <div class="hero-actions">
                <a class="btn btn--ghost" href="{{ route('admin.dashboard') }}">
                    <svg viewBox="0 0 24 24" aria-hidden="true">
                        <path d="M3 10.5 12 3l9 7.5" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"></path>
                        <path d="M5 9.5V21h14V9.5" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg>
                    Dashboard
                </a>
            </div>
        </div>

        <section class="card">
            <div class="card-head">
                <div class="card-title-wrap">
                    <span class="eyebrow">REGISTRASI</span>
                    <h2 class="card-title">List Peserta</h2>
                </div>
                <span class="tag t-info">{{ $registrations->total() }} data</span>
            </div>

            <div class="table-scroll">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Sekolah</th>
                            <th>Kelas</th>
                            <th>Kategori</th>
                            <th>WhatsApp</th>
                            <th>Status</th>
                            <th>Masuk</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($registrations as $registration)
                            <tr>
                                <td>
                                    <div class="isc-photo-cell">
                                        <span class="isc-avatar">{{ strtoupper(substr($registration->full_name, 0, 1)) }}</span>
                                        <span>
                                            <span class="cell-name">{{ $registration->full_name }}</span>
                                            <span class="cell-date">{{ $registration->stage_name ?: 'Tanpa stage name' }}</span>
                                        </span>
                                    </div>
                                </td>
                                <td>{{ $registration->school }}</td>
                                <td>{{ $registration->grade }}</td>
                                <td>{{ $registration->audition_position }}</td>
                                <td>{{ $registration->whatsapp }}</td>
                                <td><span class="tag t-active">{{ ucfirst($registration->status) }}</span></td>
                                <td class="cell-date">{{ $registration->created_at?->format('d M Y H:i') }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7">
                                    <div class="isc-page-empty">Belum ada peserta yang mendaftar.</div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{ $registrations->onEachSide(1)->links('pagination::bootstrap-4') }}
        </section>
    </section>
@endsection
