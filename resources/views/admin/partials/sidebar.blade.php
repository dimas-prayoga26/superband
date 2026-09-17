<aside class="d-sidebar" aria-label="Admin sidebar">
    <a class="brand" href="{{ route('admin.dashboard') }}">
        <span class="brand-logo isc-brand-logo">
            <img src="{{ asset('assets/img/logo.png') }}" alt="Indonesia Superband Competition">
        </span>
        <span class="brand-text">
            <span class="brand-name">ISC Admin</span>
            <span class="brand-tag">SUPERBAND</span>
        </span>
    </a>

    <nav class="nav-section" aria-label="Admin menu">
        <span class="nav-label">Menu</span>
        <a class="nav-link {{ request()->routeIs('admin.dashboard') ? 'is-active' : '' }}" href="{{ route('admin.dashboard') }}">
            <svg viewBox="0 0 24 24" aria-hidden="true">
                <path d="M3 10.5 12 3l9 7.5"></path>
                <path d="M5 9.5V21h14V9.5"></path>
                <path d="M9 21v-6h6v6"></path>
            </svg>
            <span>Dashboard</span>
        </a>
        <a class="nav-link {{ request()->routeIs('admin.participants') ? 'is-active' : '' }}" href="{{ route('admin.participants') }}">
            <svg viewBox="0 0 24 24" aria-hidden="true">
                <path d="M17 21v-2a4 4 0 0 0-4-4H7a4 4 0 0 0-4 4v2"></path>
                <circle cx="10" cy="7" r="4"></circle>
                <path d="M21 21v-2a4 4 0 0 0-3-3.87"></path>
                <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
            </svg>
            <span>Peserta</span>
        </a>
    </nav>

    <div class="sidebar-footer">
        <div class="workspace">
            <span class="workspace-avatar is-photo">
                <img src="{{ $adminProfilePhoto }}" alt="{{ $userName }}">
            </span>
            <span class="workspace-text">
                <span class="workspace-name">{{ $userName }}</span>
                <span class="workspace-role">{{ ucfirst($panelRole ?? 'admin') }}</span>
            </span>
            <svg class="workspace-chev" viewBox="0 0 24 24" width="16" height="16" aria-hidden="true">
                <path d="m6 9 6 6 6-6" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path>
            </svg>
        </div>
    </div>
</aside>
