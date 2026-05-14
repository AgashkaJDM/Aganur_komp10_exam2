<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin') — Supra</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,400;0,9..40,500;0,9..40,600;0,9..40,700;1,9..40,400&family=Outfit:wght@500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-icons.min.css') }}">
    <style>
        :root {
            --supra-bg: #0f0e0d;
            --supra-surface: #1c1a18;
            --supra-elevated: #252220;
            --supra-border: rgba(255, 248, 240, 0.08);
            --supra-text: #f7f2eb;
            --supra-muted: #9c948a;
            --supra-accent: #ff7a3d;
            --supra-accent-dim: rgba(255, 122, 61, 0.15);
            --supra-success: #4ade80;
            --supra-warning: #fbbf24;
        }

        body.admin-app {
            font-family: "DM Sans", system-ui, sans-serif;
            background: var(--supra-bg);
            color: var(--supra-text);
            min-height: 100vh;
        }

        .admin-shell {
            min-height: 100vh;
        }

        .admin-sidebar {
            width: 260px;
            background: var(--supra-surface);
            border-right: 1px solid var(--supra-border);
            display: flex;
            flex-direction: column;
            position: sticky;
            top: 0;
            align-self: flex-start;
            min-height: 100vh;
        }

        .admin-brand {
            font-family: Outfit, system-ui, sans-serif;
            font-weight: 700;
            font-size: 1.35rem;
            letter-spacing: -0.02em;
            padding: 1.5rem 1.25rem;
            border-bottom: 1px solid var(--supra-border);
            color: var(--supra-text);
        }

        .admin-brand span {
            color: var(--supra-accent);
        }

        .admin-nav {
            padding: 1rem 0.75rem;
            flex: 1;
        }

        .admin-nav a {
            display: flex;
            align-items: center;
            gap: 0.65rem;
            padding: 0.65rem 0.85rem;
            border-radius: 10px;
            color: var(--supra-muted);
            text-decoration: none;
            font-weight: 500;
            font-size: 0.95rem;
            transition: background 0.15s, color 0.15s;
        }

        .admin-nav a:hover {
            color: var(--supra-text);
            background: var(--supra-elevated);
        }

        .admin-nav a.active {
            color: var(--supra-text);
            background: var(--supra-accent-dim);
            border: 1px solid rgba(255, 122, 61, 0.25);
        }

        .admin-nav a i {
            font-size: 1.15rem;
            opacity: 0.9;
        }

        .admin-sidebar-footer {
            padding: 1rem 1.25rem 1.5rem;
            border-top: 1px solid var(--supra-border);
        }

        .admin-main {
            background: linear-gradient(145deg, #121110 0%, var(--supra-bg) 45%);
            min-width: 0;
        }

        .admin-topbar {
            padding: 1rem 1.75rem;
            border-bottom: 1px solid var(--supra-border);
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            justify-content: space-between;
            gap: 1rem;
            background: rgba(15, 14, 13, 0.72);
            backdrop-filter: blur(10px);
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .admin-topbar h1 {
            font-family: Outfit, sans-serif;
            font-size: 1.35rem;
            font-weight: 600;
            margin: 0;
            letter-spacing: -0.02em;
        }

        .admin-user {
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .admin-user-name {
            font-size: 0.9rem;
            color: var(--supra-muted);
        }

        .btn-supra {
            background: var(--supra-accent);
            border: none;
            color: #1a1008;
            font-weight: 600;
            padding: 0.45rem 1rem;
            border-radius: 9px;
            font-size: 0.875rem;
        }

        .btn-supra:hover {
            filter: brightness(1.08);
            color: #1a1008;
        }

        .btn-supra-outline {
            background: transparent;
            border: 1px solid var(--supra-border);
            color: var(--supra-muted);
            font-weight: 500;
            padding: 0.45rem 1rem;
            border-radius: 9px;
            font-size: 0.875rem;
        }

        .btn-supra-outline:hover {
            border-color: var(--supra-muted);
            color: var(--supra-text);
        }

        .admin-content {
            padding: 1.75rem;
        }

        .stat-card {
            background: var(--supra-surface);
            border: 1px solid var(--supra-border);
            border-radius: 16px;
            padding: 1.25rem 1.35rem;
            height: 100%;
            transition: border-color 0.2s, transform 0.2s;
        }

        .stat-card:hover {
            border-color: rgba(255, 122, 61, 0.22);
        }

        .stat-card .label {
            font-size: 0.8rem;
            text-transform: uppercase;
            letter-spacing: 0.06em;
            color: var(--supra-muted);
            margin-bottom: 0.35rem;
        }

        .stat-card .value {
            font-family: Outfit, sans-serif;
            font-size: 1.65rem;
            font-weight: 600;
            letter-spacing: -0.02em;
        }

        .stat-card .hint {
            font-size: 0.82rem;
            color: var(--supra-muted);
            margin-top: 0.35rem;
        }

        .panel {
            background: var(--supra-surface);
            border: 1px solid var(--supra-border);
            border-radius: 16px;
            overflow: hidden;
        }

        .panel-header {
            padding: 1rem 1.25rem;
            border-bottom: 1px solid var(--supra-border);
            font-family: Outfit, sans-serif;
            font-weight: 600;
            font-size: 1rem;
        }

        .table-darkish {
            --bs-table-bg: transparent;
            --bs-table-color: var(--supra-text);
            margin: 0;
        }

        .table-darkish thead th {
            font-size: 0.72rem;
            text-transform: uppercase;
            letter-spacing: 0.08em;
            color: var(--supra-muted);
            font-weight: 600;
            border-bottom-color: var(--supra-border);
            padding: 0.85rem 1.25rem;
        }

        .table-darkish tbody td {
            padding: 0.85rem 1.25rem;
            border-color: var(--supra-border);
            vertical-align: middle;
        }

        .table-darkish tbody tr:hover td {
            background: rgba(255, 255, 255, 0.02);
        }

        .badge-status {
            font-weight: 600;
            font-size: 0.72rem;
            padding: 0.35em 0.65em;
            border-radius: 6px;
            text-transform: capitalize;
        }

        .badge-pending {
            background: rgba(251, 191, 36, 0.2);
            color: var(--supra-warning);
        }

        .badge-delivered,
        .badge-completed {
            background: rgba(74, 222, 128, 0.18);
            color: var(--supra-success);
        }

        .badge-cancelled {
            background: rgba(248, 113, 113, 0.18);
            color: #fca5a5;
        }

        .badge-default {
            background: var(--supra-elevated);
            color: var(--supra-muted);
        }

        .empty-state {
            text-align: center;
            padding: 2.5rem 1.5rem;
            color: var(--supra-muted);
        }

        .empty-state i {
            font-size: 2.5rem;
            opacity: 0.35;
            margin-bottom: 0.75rem;
        }

        @media (max-width: 991.98px) {
            .admin-sidebar {
                width: 100%;
                min-height: unset;
                position: relative;
                border-right: none;
                border-bottom: 1px solid var(--supra-border);
            }

            .admin-shell {
                flex-direction: column;
            }
        }
    </style>
    @stack('styles')
</head>

<body class="admin-app">
    <div class="admin-shell d-flex flex-column flex-lg-row">
        <aside class="admin-sidebar">
            <div class="admin-brand">Supra <span>Admin</span></div>
            <nav class="admin-nav">
                <a href="{{ route('admin.dashboard') }}" class="@if (request()->routeIs('admin.dashboard')) active @endif">
                    <i class="bi bi-grid-1x2-fill"></i> Dashboard
                </a>
            </nav>
            <div class="admin-sidebar-footer">
                <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <button type="submit" class="btn-supra-outline w-100">Sign out</button>
                </form>
            </div>
        </aside>
        <div class="admin-main flex-grow-1 d-flex flex-column">
            <header class="admin-topbar">
                <h1>@yield('page_title', 'Dashboard')</h1>
                <div class="admin-user">
                    <span class="admin-user-name">{{ Auth::user()->name ?? Auth::user()->username }}</span>
                    <span class="rounded-circle d-inline-flex align-items-center justify-content-center text-dark fw-bold"
                        style="width:38px;height:38px;background:var(--supra-accent);font-size:0.85rem;">
                        {{ strtoupper(substr(Auth::user()->name ?? Auth::user()->username ?? '?', 0, 1)) }}
                    </span>
                </div>
            </header>
            <main class="admin-content flex-grow-1">
                @yield('content')
            </main>
        </div>
    </div>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    @stack('scripts')
</body>

</html>
