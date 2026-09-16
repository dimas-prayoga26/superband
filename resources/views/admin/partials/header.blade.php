<header class="d-topbar">
    <button class="hamburger" type="button" data-drawer-open aria-label="Buka menu admin">
        <svg viewBox="0 0 24 24" aria-hidden="true">
            <path d="M4 6h16M4 12h16M4 18h16" fill="none" stroke="currentColor" stroke-linecap="round" stroke-width="2"></path>
        </svg>
    </button>
    <div class="crumbs">
        <img class="isc-topbar-logo" src="{{ asset('assets/img/logo.png') }}" alt="">
        <span>Admin</span>
        <span class="sep">/</span>
        <span class="current">{{ $pageTitle }}</span>
    </div>
    <div class="topbar-actions">
        <a class="cmd" href="{{ route('home') }}">
            <svg viewBox="0 0 24 24" aria-hidden="true">
                <path d="M3 10.5 12 3l9 7.5" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"></path>
                <path d="M5 9.5V21h14V9.5" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"></path>
            </svg>
            <span>Lihat website</span>
        </a>
        <div class="dd-wrap" data-profile-menu>
            <button class="avatar" type="button" data-profile-toggle>{{ $initials ?: 'AD' }}</button>
            <div class="dd-menu dd-profile">
                <div class="dd-profile-head">
                    <div class="dd-profile-name">{{ $userName }}</div>
                    <div class="dd-profile-email">{{ auth()->user()?->email }}</div>
                </div>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="dd-menu-item danger isc-logout" type="submit">
                        <svg viewBox="0 0 24 24" aria-hidden="true">
                            <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"></path>
                            <path d="M16 17l5-5-5-5" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"></path>
                            <path d="M21 12H9" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg>
                        Logout
                    </button>
                </form>
            </div>
        </div>
    </div>
</header>
