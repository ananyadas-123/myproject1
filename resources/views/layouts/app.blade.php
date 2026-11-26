
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'ProductLife')</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">

    <style>
        :root {
            --navy: #11152f;
            --navy-light: #1c2145;
            --purple: #7c3aed;
            --blue: #2563eb;
            --cyan: #06b6d4;
            --emerald: #10b981;
            --text-dark: #172033;
            --text-muted: #64748b;
            --border: #e2e8f0;
            --surface: #ffffff;
            --page-bg: #f4f6fc;
        }

        * {
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            margin: 0;
            min-height: 100vh;
            font-family: 'Inter', sans-serif;
            color: var(--text-dark);
            font-size: 14px;
            line-height: 1.6;
            background:
                radial-gradient(circle at 10% 0%, rgba(129, 140, 248, .10), transparent 28%),
                radial-gradient(circle at 100% 100%, rgba(6, 182, 212, .08), transparent 30%),
                var(--page-bg);
        }

        a {
            text-decoration: none;
        }

        button,
        input,
        select,
        textarea {
            font-family: inherit;
        }

        /* =========================================
           SIDEBAR
        ========================================= */

        .app-sidebar {
            position: fixed;
            top: 0;
            left: 0;
            width: 270px;
            height: 100vh;
            padding: 24px 17px;
            z-index: 2000;
            overflow-y: auto;
            overflow-x: hidden;
            background:
                radial-gradient(circle at top right, rgba(124, 58, 237, .25), transparent 34%),
                linear-gradient(180deg, #171a3b 0%, #11152f 55%, #10152b 100%);
            border-right: 1px solid rgba(255,255,255,.08);
            box-shadow: 12px 0 35px rgba(15, 23, 42, .13);
            scrollbar-width: thin;
            scrollbar-color: #454b79 transparent;
        }

        .app-sidebar::-webkit-scrollbar {
            width: 5px;
        }

        .app-sidebar::-webkit-scrollbar-thumb {
            background: #454b79;
            border-radius: 10px;
        }

        /* Brand */

        .sidebar-brand {
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 75px;
            padding: 8px 12px 23px;
            margin-bottom: 13px;
            border-bottom: 1px solid rgba(255,255,255,.11);
        }

        .sidebar-logo {
            width: 150px;
            max-height: 65px;
            object-fit: contain;
            display: block;
            filter: drop-shadow(0 5px 12px rgba(0,0,0,.15));
        }

        /* Menu Label */

        .sidebar-label {
            padding: 19px 13px 9px;
            color: #929bc4;
            font-size: 10px;
            font-weight: 900;
            text-transform: uppercase;
            letter-spacing: 1.5px;
        }

        /* Sidebar Links */

        .sidebar-link {
            position: relative;
            display: flex;
            align-items: center;
            gap: 13px;
            width: 100%;
            min-height: 46px;
            padding: 11px 14px;
            margin-bottom: 5px;
            border: 1px solid transparent;
            border-radius: 11px;
            color: #c2c9e3;
            background: transparent;
            font-size: 13px;
            font-weight: 600;
            text-align: left;
            cursor: pointer;
            transition: all .23s ease;
        }

        .sidebar-link i {
            width: 22px;
            flex-shrink: 0;
            text-align: center;
            font-size: 17px;
            color: #929cc6;
            transition: all .23s ease;
        }

        .sidebar-link:hover {
            color: #ffffff;
            background: rgba(255,255,255,.09);
            border-color: rgba(255,255,255,.07);
            transform: translateX(3px);
        }

        .sidebar-link:hover i {
            color: #67e8f9;
        }

        .sidebar-link.active {
            color: #ffffff;
            font-weight: 800;
            background: linear-gradient(110deg, #6d28d9, #4f46e5, #2563eb);
            border-color: rgba(255,255,255,.17);
            box-shadow: 0 7px 19px rgba(79, 70, 229, .34);
        }

        .sidebar-link.active i {
            color: #ffffff;
        }

        .sidebar-link.active::before {
            content: "";
            position: absolute;
            left: -1px;
            top: 9px;
            bottom: 9px;
            width: 3px;
            border-radius: 0 5px 5px 0;
            background: #67e8f9;
        }

        .sidebar-badge {
            margin-left: auto;
            min-width: 22px;
            height: 22px;
            padding: 0 6px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 20px;
            color: #ffffff;
            background: linear-gradient(135deg, #0891b2, #06b6d4);
            font-size: 10px;
            font-weight: 900;
        }

        /* Sidebar Bottom */

        .sidebar-bottom {
            margin-top: 27px;
            padding-top: 15px;
            border-top: 1px solid rgba(255,255,255,.12);
        }

        .logout-button {
            background: rgba(239, 68, 68, .08);
            border-color: rgba(248, 113, 113, .12);
            color: #fca5a5;
        }

        .logout-button i {
            color: #f87171;
        }

        .logout-button:hover {
            color: #ffffff;
            background: linear-gradient(110deg, #dc2626, #b91c1c);
            border-color: transparent;
        }

        .logout-button:hover i {
            color: #ffffff;
        }

        /* =========================================
           MAIN AREA
        ========================================= */

        .app-main {
            min-height: 100vh;
            margin-left: 270px;
            padding: 0 38px 45px;
        }

        /* =========================================
           TOPBAR
        ========================================= */

        .app-topbar {
            position: sticky;
            top: 0;
            z-index: 1000;
            min-height: 85px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 15px;
            background: rgba(244, 246, 252, .90);
            backdrop-filter: blur(18px);
            border-bottom: 1px solid rgba(226,232,240,.85);
        }

        .topbar-left {
            display: flex;
            align-items: center;
            gap: 15px;
            min-width: 0;
        }

        .mobile-menu-btn {
            width: 43px;
            height: 43px;
            flex-shrink: 0;
            display: none;
            align-items: center;
            justify-content: center;
            border: 1px solid #dbe2ef;
            border-radius: 12px;
            background: #ffffff;
            color: #3730a3;
            font-size: 21px;
            box-shadow: 0 3px 10px rgba(15,23,42,.05);
            transition: all .2s ease;
        }

        .mobile-menu-btn:hover {
            color: #ffffff;
            background: linear-gradient(135deg, #6d28d9, #2563eb);
            border-color: transparent;
        }

        .page-heading h1 {
            margin: 0;
            color: #171b3b;
            font-size: 27px;
            line-height: 1.25;
            font-weight: 900;
            letter-spacing: -.8px;
        }

        .page-heading p {
            margin: 5px 0 0;
            color: #718096;
            font-size: 12px;
            font-weight: 600;
        }

        /* =========================================
           USER PROFILE
        ========================================= */

        .topbar-user {
            display: flex;
            align-items: center;
            gap: 11px;
            padding: 6px 13px 6px 7px;
            border: 1px solid #e1e6f0;
            border-radius: 40px;
            background: #ffffff;
            box-shadow: 0 5px 18px rgba(15,23,42,.05);
            transition: all .2s ease;
        }

        .topbar-user:hover,
        .topbar-user.show {
            border-color: #a5b4fc;
            box-shadow: 0 7px 20px rgba(79,70,229,.11);
        }

        .topbar-user::after {
            margin-left: 3px;
            color: #64748b;
        }

        .user-avatar {
            width: 43px;
            height: 43px;
            flex-shrink: 0;
            border: 2px solid #ffffff;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            object-fit: cover;
            background: linear-gradient(135deg, #6d28d9, #2563eb, #0891b2);
            color: #ffffff;
            font-size: 16px;
            font-weight: 900;
            box-shadow: 0 4px 12px rgba(79,70,229,.22);
        }

        .user-info {
            line-height: 1.25;
            text-align: left;
        }

        .user-name {
            color: #172033;
            font-size: 12px;
            font-weight: 900;
        }

        .user-role {
            margin-top: 4px;
            color: #7c8499;
            font-size: 10px;
            font-weight: 700;
        }

        /* Profile Dropdown */

        .profile-dropdown {
            min-width: 205px;
            margin-top: 10px !important;
            padding: 8px;
            border: 1px solid #e2e8f0;
            border-radius: 14px;
            background: #ffffff;
            box-shadow: 0 15px 35px rgba(15,23,42,.13);
        }

        .profile-dropdown .dropdown-item {
            padding: 10px 12px;
            border-radius: 9px;
            color: #334155;
            font-size: 12px;
            font-weight: 700;
            transition: all .2s ease;
        }

        .profile-dropdown .dropdown-item:hover {
            color: #4338ca;
            background: #eef2ff;
        }

        .profile-dropdown .dropdown-item.text-danger {
            color: #dc2626 !important;
        }

        .profile-dropdown .dropdown-item.text-danger:hover {
            background: #fee2e2;
        }

        .profile-dropdown .dropdown-divider {
            border-color: #e2e8f0;
        }

        /* =========================================
           PAGE CONTENT
        ========================================= */

        .page-content {
            padding-top: 29px;
            min-width: 0;
        }

        /* =========================================
           GLOBAL CARDS
        ========================================= */

        .modern-card {
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 19px;
            box-shadow: 0 9px 28px rgba(15,23,42,.045);
        }

        /* =========================================
           GLOBAL BUTTON
        ========================================= */

        .btn-productlife {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            padding: 11px 19px;
            border: none;
            border-radius: 11px;
            background: linear-gradient(135deg, #6d28d9, #4f46e5, #2563eb);
            color: #ffffff;
            font-size: 13px;
            font-weight: 800;
            box-shadow: 0 7px 17px rgba(79,70,229,.22);
            transition: all .23s ease;
        }

        .btn-productlife:hover {
            color: #ffffff;
            transform: translateY(-2px);
            box-shadow: 0 11px 24px rgba(79,70,229,.30);
        }

        /* =========================================
           MOBILE OVERLAY
        ========================================= */

        .sidebar-overlay {
            display: none;
            position: fixed;
            inset: 0;
            background: rgba(10, 14, 35, .60);
            backdrop-filter: blur(3px);
            z-index: 1900;
        }

        /* =========================================
           RESPONSIVE
        ========================================= */

        @media (max-width: 1100px) {
            .app-main {
                padding-left: 25px;
                padding-right: 25px;
            }
        }

        @media (max-width: 1000px) {
            .app-sidebar {
                transform: translateX(-105%);
                transition: transform .28s ease;
            }

            .app-sidebar.show {
                transform: translateX(0);
            }

            .sidebar-overlay.show {
                display: block;
            }

            .app-main {
                margin-left: 0;
                padding-left: 22px;
                padding-right: 22px;
            }

            .mobile-menu-btn {
                display: flex;
            }
        }

        @media (max-width: 600px) {
            .app-main {
                padding-left: 14px;
                padding-right: 14px;
                padding-bottom: 30px;
            }

            .app-topbar {
                min-height: 72px;
            }

            .topbar-left {
                gap: 10px;
            }

            .mobile-menu-btn {
                width: 39px;
                height: 39px;
            }

            .page-heading h1 {
                font-size: 20px;
            }

            .page-heading p {
                display: none;
            }

            .topbar-user {
                padding: 4px;
                gap: 5px;
            }

            .topbar-user::after {
                margin-right: 4px;
            }

            .user-info {
                display: none;
            }

            .user-avatar {
                width: 37px;
                height: 37px;
            }

            .page-content {
                padding-top: 20px;
            }
        }

        @media (max-width: 380px) {
            .page-heading h1 {
                font-size: 18px;
            }

            .app-sidebar {
                width: 260px;
            }
        }
    </style>

    @stack('styles')
</head>

<body>

    <!-- SIDEBAR OVERLAY -->
    <div class="sidebar-overlay" id="sidebarOverlay"></div>

    <!-- SIDEBAR -->
    <aside class="app-sidebar" id="appSidebar">

        <a href="{{ route('dashboard') }}" class="sidebar-brand">
            <img
                src="{{ asset('images/logo.png') }}"
                alt="ProductLife"
                class="sidebar-logo">
        </a>

        <div class="sidebar-label">Main Menu</div>

        <a href="{{ route('dashboard') }}"
           class="sidebar-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
            <i class="bi bi-grid-1x2-fill"></i>
            <span>Dashboard</span>
        </a>

        <a href="{{ route('products.index') }}"
           class="sidebar-link {{
                request()->routeIs('products.index') ||
                request()->routeIs('products.show') ||
                request()->routeIs('products.lifecycle')
                    ? 'active'
                    : ''
            }}">
            <i class="bi bi-box-seam"></i>
            <span>My Products</span>
        </a>

        <a href="{{ route('products.create') }}"
           class="sidebar-link {{ request()->routeIs('products.create') ? 'active' : '' }}">
            <i class="bi bi-plus-square"></i>
            <span>Add Product</span>
        </a>

        <a href="{{ route('warranties.index') }}"
           class="sidebar-link {{ request()->routeIs('warranties.*') ? 'active' : '' }}">
            <i class="bi bi-shield-check"></i>
            <span>Warranty</span>
        </a>

        <a href="{{ route('maintenances.index') }}"
           class="sidebar-link {{ request()->routeIs('maintenances.*') ? 'active' : '' }}">
            <i class="bi bi-calendar2-check"></i>
            <span>Maintenance</span>
        </a>

        <a href="{{ route('repair.history') }}"
           class="sidebar-link {{ request()->routeIs('repair.history') ? 'active' : '' }}">
            <i class="bi bi-clock-history"></i>
            <span>Repair History</span>
        </a>

        <div class="sidebar-label">Product Lifecycle</div>

        <a href="{{ route('products.index') }}"
           class="sidebar-link {{ request()->routeIs('products.passport') ? 'active' : '' }}">
            <i class="bi bi-postcard"></i>
            <span>Digital Passport</span>
        </a>

        <div class="sidebar-label">Account</div>

        <a href="{{ route('profile.edit') }}"
           class="sidebar-link {{ request()->routeIs('profile.edit') ? 'active' : '' }}">
            <i class="bi bi-person-circle"></i>
            <span>My Profile</span>
        </a>

        <a href="#"
           class="sidebar-link">
            <i class="bi bi-bell"></i>
            <span>Notifications</span>
        </a>

        <div class="sidebar-bottom">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="sidebar-link logout-button w-100">
                    <i class="bi bi-box-arrow-right"></i>
                    <span>Logout</span>
                </button>
            </form>
        </div>

    </aside>

    <!-- MAIN -->
    <main class="app-main">

        <!-- TOPBAR -->
        <header class="app-topbar">

            <div class="topbar-left">

                <button
                    type="button"
                    class="mobile-menu-btn"
                    id="mobileMenuBtn"
                    aria-label="Open navigation menu"
                    aria-expanded="false">
                    <i class="bi bi-list"></i>
                </button>

                <div class="page-heading">
                    <h1>@yield('page_title', 'Dashboard')</h1>
                    <p>
                        @yield(
                            'page_subtitle',
                            'Manage your complete product lifecycle from one place.'
                        )
                    </p>
                </div>

            </div>

            <!-- USER PROFILE DROPDOWN -->
            <div class="dropdown">

                <button
                    class="topbar-user dropdown-toggle"
                    type="button"
                    data-bs-toggle="dropdown"
                    aria-expanded="false">

                    @if(Auth::user()->image)

                        <img
                            src="{{ asset('storage/' . Auth::user()->image) }}"
                            alt="Profile Image"
                            class="user-avatar">

                    @else

                        <div class="user-avatar">
                            {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                        </div>

                    @endif

                    <div class="user-info">
                        <div class="user-name">{{ Auth::user()->name }}</div>
                        <div class="user-role">Product Owner</div>
                    </div>

                </button>

                <ul class="dropdown-menu dropdown-menu-end profile-dropdown">

                    <li>
                        <a class="dropdown-item" href="{{ route('profile.edit') }}">
                            <i class="bi bi-person-circle me-2"></i>
                            My Profile
                        </a>
                    </li>

                    <li>
                        <a class="dropdown-item" href="{{ route('profile.edit') }}">
                            <i class="bi bi-pencil-square me-2"></i>
                            Edit Profile
                        </a>
                    </li>

                    <li><hr class="dropdown-divider"></li>

                    <li>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="dropdown-item text-danger">
                                <i class="bi bi-box-arrow-right me-2"></i>
                                Logout
                            </button>
                        </form>
                    </li>

                </ul>

            </div>

        </header>

        <!-- PAGE CONTENT -->
        <div class="page-content">
            @yield('content')
        </div>

    </main>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Sidebar Mobile -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {

            const sidebar = document.getElementById('appSidebar');
            const overlay = document.getElementById('sidebarOverlay');
            const menuBtn = document.getElementById('mobileMenuBtn');

            function openSidebar() {
                sidebar.classList.add('show');
                overlay.classList.add('show');
                menuBtn.setAttribute('aria-expanded', 'true');
                document.body.style.overflow = 'hidden';
            }

            function closeSidebar() {
                sidebar.classList.remove('show');
                overlay.classList.remove('show');
                menuBtn.setAttribute('aria-expanded', 'false');
                document.body.style.overflow = '';
            }

            if (menuBtn && sidebar && overlay) {

                menuBtn.addEventListener('click', function () {
                    if (sidebar.classList.contains('show')) {
                        closeSidebar();
                    } else {
                        openSidebar();
                    }
                });

                overlay.addEventListener('click', closeSidebar);

                sidebar.querySelectorAll('a.sidebar-link').forEach(function (link) {
                    link.addEventListener('click', function () {
                        if (window.innerWidth <= 1000) {
                            closeSidebar();
                        }
                    });
                });

                document.addEventListener('keydown', function (event) {
                    if (event.key === 'Escape') {
                        closeSidebar();
                    }
                });

                window.addEventListener('resize', function () {
                    if (window.innerWidth > 1000) {
                        closeSidebar();
                    }
                });
            }

        });
    </script>

    @stack('scripts')

</body>
</html>
