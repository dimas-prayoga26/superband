@php
    $pageTitle = $title ?? 'Dashboard';
    $userName = auth()->user()?->name ?? 'Admin';
    $initials = collect(explode(' ', $userName))
        ->filter()
        ->map(fn (string $part): string => strtoupper(substr($part, 0, 1)))
        ->take(2)
        ->implode('');
@endphp
<!DOCTYPE html>
<html lang="id" data-theme="light">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $pageTitle }} | ISC Admin</title>
    <link rel="icon" href="{{ asset('assets/img/logo.png') }}" type="image/png">
    <link rel="stylesheet" href="{{ asset('assets/adminator/style.css') }}">
    <style>
        .isc-brand-logo {
            background: transparent;
            box-shadow: none;
            height: 42px;
            width: 42px;
        }

        .isc-brand-logo img {
            height: 42px;
            object-fit: contain;
            width: 42px;
        }

        .isc-topbar-logo {
            display: none;
        }

        .isc-page-empty {
            align-items: center;
            color: var(--t-muted);
            display: flex;
            justify-content: center;
            min-height: 160px;
            text-align: center;
        }

        .isc-stat-line {
            display: grid;
            gap: 12px;
        }

        .isc-stat-item {
            display: grid;
            gap: 7px;
        }

        .isc-stat-head {
            align-items: center;
            display: flex;
            gap: 14px;
            justify-content: space-between;
        }

        .isc-stat-name {
            color: var(--t-base);
            font-size: 13px;
            font-weight: 700;
        }

        .isc-stat-value {
            color: var(--t-muted);
            font-family: JetBrains Mono, monospace;
            font-size: 11px;
        }

        .isc-progress {
            background: var(--bg-muted);
            border-radius: 999px;
            height: 8px;
            overflow: hidden;
        }

        .isc-progress span {
            background: linear-gradient(90deg, var(--primary), var(--purple));
            border-radius: inherit;
            display: block;
            height: 100%;
            min-width: 8px;
        }

        .isc-photo-cell {
            align-items: center;
            display: flex;
            gap: 10px;
            min-width: 180px;
        }

        .isc-avatar {
            background: var(--primary-soft);
            border-radius: 50%;
            color: var(--primary);
            display: grid;
            flex: 0 0 auto;
            font-weight: 800;
            height: 34px;
            place-items: center;
            width: 34px;
        }

        .isc-logout {
            background: transparent;
            border: 0;
            color: var(--danger);
            cursor: pointer;
            font: inherit;
            width: 100%;
        }

        .pagination {
            align-items: center;
            display: flex;
            flex-wrap: wrap;
            gap: 6px;
            justify-content: flex-end;
            margin: 18px 0 0;
        }

        .pagination .page-link,
        .pagination .page-item span {
            background: var(--bg-card);
            border: 1px solid var(--border);
            border-radius: 8px;
            color: var(--t-muted);
            display: inline-flex;
            font-size: 12px;
            font-weight: 600;
            min-width: 34px;
            padding: 7px 10px;
        }

        .pagination .active .page-link,
        .pagination .active span {
            background: var(--primary);
            border-color: var(--primary);
            color: #fff;
        }

        @media (max-width: 720px) {
            .isc-topbar-logo {
                display: block;
                height: 30px;
                object-fit: contain;
                width: 30px;
            }
        }
    </style>
</head>
<body>
    <div class="drawer-backdrop" data-drawer-close></div>

    <div class="shell">
        @include('admin.partials.sidebar')

        <main class="main">
            @include('admin.partials.header')

            @yield('content')

            @include('admin.partials.footer')
        </main>
    </div>
</body>
</html>
