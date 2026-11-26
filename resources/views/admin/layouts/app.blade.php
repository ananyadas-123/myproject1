
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Admin Panel') - ProductLife</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        * {
            box-sizing: border-box;
        }

        :root {
            --primary: #4f46e5;
            --primary-dark: #3730a3;
            --sidebar: #111827;
            --sidebar-light: #1e293b;
            --text-dark: #172033;
            --text-muted: #64748b;
            --border: #e2e8f0;
            --surface: #ffffff;
            --background: #f1f5fb;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            margin: 0;
            font-family: 'Inter', sans-serif;
            background:
                radial-gradient(circle at 85% 5%, rgba(99,102,241,.08), transparent 25%),
                var(--background);
            color: var(--text-dark);
            min-height: 100vh;
        }

        /* =========================
           SIDEBAR
        ========================= */

        .sidebar {
            position: fixed;
            inset: 0 auto 0 0;
            width: 260px;
            padding: 26px 17px 20px;
            background: linear-gradient(180deg, #111827 0%, #172554 55%, #1e1b4b 100%);
            color: #fff;
            display: flex;
            flex-direction: column;
            z-index: 1000;
            overflow-y: auto;
            box-shadow: 8px 0 30px rgba(15, 23, 42, .12);
            scrollbar-width: thin;
            scrollbar-color: #475569 transparent;
        }

        .sidebar::-webkit-scrollbar {
            width: 5px;
        }

        .sidebar::-webkit-scrollbar-thumb {
            background: #475569;
            border-radius: 10px;
        }

        /* Brand */

        .brand {
            font-size: 25px;
            font-weight: 800;
            letter-spacing: -1.1px;
            padding: 8px 12px 30px;
            color: #ffffff;
            display: flex;
            align-items: center;
        }

        .brand span {
            background: linear-gradient(90deg, #5eead4, #60a5fa);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }

        /* Menu labels */

        .menu-label {
            margin: 13px 12px 12px;
            color: #94a3b8;
            font-size: 10px;
            font-weight: 800;
            letter-spacing: 1.6px;
            text-transform: uppercase;
        }

        /* Menu links */

        .menu-link {
            position: relative;
            display: flex;
            align-items: center;
            gap: 13px;
            padding: 13px 14px;
            margin-bottom: 7px;
            border-radius: 12px;
            color: #cbd5e1;
            text-decoration: none;
            font-size: 12.5px;
            font-weight: 600;
            border: 1px solid transparent;
            transition: all .25s ease;
            cursor: pointer;
        }

        .menu-link i {
            font-size: 18px;
            width: 22px;
            text-align: center;
            transition: transform .25s ease;
        }

        .menu-link:hover {
            background: rgba(255, 255, 255, .09);
            color: #ffffff;
            border-color: rgba(255, 255, 255, .08);
            transform: translateX(4px);
        }

        .menu-link:hover i {
            transform: scale(1.12);
        }

        .menu-link.active {
            background: linear-gradient(110deg, #4f46e5, #7c3aed);
            color: #ffffff;
            border-color: rgba(255, 255, 255, .15);
            box-shadow: 0 6px 18px rgba(79, 70, 229, .35);
        }

        .menu-link.active::before {
            content: "";
            position: absolute;
            left: -17px;
            top: 25%;
            width: 4px;
            height: 50%;
            background: #5eead4;
            border-radius: 0 5px 5px 0;
        }

        .menu-link.active i {
            color: #a5f3fc;
        }

        /* Sidebar bottom */

        .sidebar-bottom {
            margin-top: auto;
            padding-top: 18px;
            border-top: 1px solid rgba(255, 255, 255, .10);
        }

        .sidebar-bottom form {
            margin: 0;
        }

        .sidebar-bottom .menu-link {
            background: rgba(239, 68, 68, .09);
            color: #fca5a5;
            width: 100%;
            text-align: left;
        }

        .sidebar-bottom .menu-link:hover {
            background: #dc2626;
            color: #ffffff;
            border-color: #ef4444;
        }

        /* =========================
           MAIN CONTENT
        ========================= */

        .main {
            margin-left: 260px;
            padding: 30px 34px;
            min-height: 100vh;
        }

        /* =========================
           TOPBAR
        ========================= */

        .topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 18px;
            margin-bottom: 30px;
            padding: 19px 23px;
            background: rgba(255, 255, 255, .92);
            border: 1px solid rgba(226, 232, 240, .9);
            border-radius: 18px;
            box-shadow: 0 6px 25px rgba(15, 23, 42, .045);
            backdrop-filter: blur(12px);
        }

        .topbar h1 {
            margin: 0 0 7px;
            font-size: 25px;
            font-weight: 800;
            letter-spacing: -.7px;
            color: #172554;
        }

        .muted {
            color: #64748b;
            font-size: 12px;
            font-weight: 500;
        }

        /* Admin profile */

        .admin-pill {
            display: flex;
            align-items: center;
            gap: 12px;
            background: linear-gradient(135deg, #f8fafc, #eef2ff);
            border: 1px solid #e0e7ff;
            padding: 9px 15px 9px 9px;
            border-radius: 14px;
            box-shadow: 0 3px 12px rgba(79, 70, 229, .06);
            font-size: 13px;
            font-weight: 800;
            color: #1e293b;
            flex-shrink: 0;
        }

        .admin-avatar {
            display: grid;
            place-items: center;
            width: 42px;
            height: 42px;
            border-radius: 13px;
            background: linear-gradient(135deg, #4f46e5, #9333ea);
            color: #ffffff;
            font-size: 20px;
            box-shadow: 0 4px 12px rgba(79, 70, 229, .25);
        }

        .admin-pill .muted {
            color: #64748b;
        }

        /* =========================
           GLOBAL CONTENT STYLING
        ========================= */

        .main .card {
            border: 1px solid #e2e8f0;
            border-radius: 16px;
            box-shadow: 0 5px 20px rgba(15, 23, 42, .045);
        }

        .main .card-header {
            background: #ffffff;
            border-bottom: 1px solid #e2e8f0;
            color: #172554;
            font-weight: 800;
        }

        .main .table {
            color: #334155;
            vertical-align: middle;
        }

        .main .table thead th {
            background: #eef2ff;
            color: #3730a3;
            font-size: 11px;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: .6px;
            padding: 14px;
            border-bottom: 1px solid #c7d2fe;
        }

        .main .table tbody td {
            padding: 13px 14px;
            border-color: #edf2f7;
            font-size: 13px;
        }

        .main .table tbody tr {
            transition: background .2s ease;
        }

        .main .table tbody tr:hover {
            background: #f5f7ff;
        }

        .main .form-control,
        .main .form-select {
            border: 1px solid #cbd5e1;
            border-radius: 10px;
            padding: 10px 13px;
            color: #172033;
            font-size: 13px;
        }

        .main .form-control:focus,
        .main .form-select:focus {
            border-color: #6366f1;
            box-shadow: 0 0 0 4px rgba(99, 102, 241, .12);
        }

        .main .btn {
            border-radius: 9px;
            font-weight: 700;
            transition: all .22s ease;
        }

        .main .btn:hover {
            transform: translateY(-2px);
        }

        .main .btn-primary {
            background: linear-gradient(135deg, #4f46e5, #7c3aed);
            border: none;
            box-shadow: 0 4px 12px rgba(79, 70, 229, .2);
        }

        .main .btn-primary:hover {
            background: linear-gradient(135deg, #4338ca, #6d28d9);
        }

        .main .btn-success {
            background: linear-gradient(135deg, #059669, #0d9488);
            border: none;
        }

        .main .btn-danger {
            background: linear-gradient(135deg, #dc2626, #e11d48);
            border: none;
        }

        /* Footer */

        .main > .text-center.text-secondary {
            color: #94a3b8 !important;
            font-size: 11px !important;
            letter-spacing: .2px;
        }

        /* =========================
           RESPONSIVE
        ========================= */

        @media (max-width: 1000px) {
            .main {
                padding: 24px 20px;
            }

            .sidebar {
                width: 235px;
            }

            .main {
                margin-left: 235px;
            }
        }

        @media (max-width: 700px) {
            .sidebar {
                position: relative;
                width: 100%;
                min-height: auto;
                padding: 15px;
                overflow: visible;
            }

            .brand {
                padding: 5px 10px 15px;
            }

            .menu-label {
                margin-top: 8px;
            }

            .sidebar-bottom {
                margin-top: 12px;
            }

            .menu-link.active::before {
                display: none;
            }

            .main {
                margin-left: 0;
                padding: 18px 13px;
            }

            .topbar {
                align-items: flex-start;
                flex-direction: column;
                padding: 17px;
                margin-bottom: 20px;
            }

            .topbar h1 {
                font-size: 21px;
            }

            .admin-pill {
                width: 100%;
            }
        }

        @media (max-width: 420px) {
            .main {
                padding: 14px 10px;
            }

            .topbar h1 {
                font-size: 19px;
            }

            .brand {
                font-size: 22px;
            }
        }
    </style>

    @stack('styles')
</head>

<body>

<aside class="sidebar">

    <div class="brand">Product<span>Life.</span></div>

    <div class="menu-label">Main Menu</div>

    <a href="{{ route('admin.dashboard') }}"
       class="menu-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
        <i class="bi bi-grid-1x2-fill"></i> Dashboard
    </a>

    <a href="{{ route('admin.users.index') }}"
       class="menu-link {{ request()->routeIs('admin.users.*') ? 'active' : '' }}">
        <i class="bi bi-people"></i> Users Management
    </a>

    <a href="{{ route('admin.products.index') }}"
       class="menu-link {{ request()->routeIs('admin.products.*') ? 'active' : '' }}">
        <i class="bi bi-box-seam"></i> Products Management
    </a>

    <a href="{{ route('admin.technicians.index') }}"
       class="menu-link {{ request()->routeIs('admin.technicians.*') ? 'active' : '' }}">
        <i class="bi bi-tools"></i> Technicians
    </a>

    <a href="{{ route('admin.repairs.index') }}"
       class="menu-link {{ request()->routeIs('admin.repairs.*') ? 'active' : '' }}">
        <i class="bi bi-wrench-adjustable-circle"></i> Repair Requests
    </a>

    <div class="sidebar-bottom">
        <div class="menu-label">Account</div>

        <form action="{{ route('admin.logout') }}" method="POST">
            @csrf
            <button type="submit" class="menu-link w-100"
                    style="background:transparent;text-align:left;">
                <i class="bi bi-box-arrow-left"></i> Logout
            </button>
        </form>
    </div>

</aside>

<main class="main">

    <header class="topbar">
        <div>
            <h1>@yield('page-heading', 'Admin Dashboard')</h1>
            <div class="muted">@yield('page-subtitle', 'Manage your ProductLife ecosystem.')</div>
        </div>

        <div class="admin-pill">
            <div class="admin-avatar">
                <i class="bi bi-shield-check"></i>
            </div>

            <div>
                <div>{{ auth('admin')->user()->name }}</div>
                <div class="muted" style="font-size:11px">Administrator</div>
            </div>
        </div>
    </header>

    @yield('content')

    <div class="text-center text-secondary small mt-5">
        ProductLife Admin Panel · Complete Product Lifecycle & Repair Ecosystem
    </div>

</main>

@stack('scripts')

</body>
</html>
