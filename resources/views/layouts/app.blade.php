<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'ProductLife')</title>

    <!-- Bootstrap -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
        rel="stylesheet">

    <!-- Google Font -->
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">

    <style>

        * {
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            margin: 0;
            font-family: 'Inter', sans-serif;
            background:
                radial-gradient(
                    circle at top left,
                    rgba(220, 252, 231, 0.75),
                    transparent 32%
                ),
                radial-gradient(
                    circle at bottom right,
                    rgba(219, 234, 254, 0.75),
                    transparent 32%
                ),
                #f6f9fc;

            color: #172033;
            font-size: 15px;
            line-height: 1.6;
        }

        a {
            text-decoration: none;
        }

        /* =====================================================
           SIDEBAR
        ===================================================== */

        .app-sidebar {

            position: fixed;

            top: 0;
            left: 0;

            width: 270px;
            height: 100vh;

            background: rgba(255, 255, 255, 0.96);

            border-right: 1px solid #e6ebf1;

            padding: 26px 18px;

            z-index: 2000;

            overflow-y: auto;

            box-shadow: 8px 0 30px rgba(15, 23, 42, 0.03);
        }

        /* LOGO */

        .sidebar-brand {

            display: flex;

            align-items: center;

            padding: 5px 10px 26px;

            margin-bottom: 10px;

            border-bottom: 1px solid #eef1f5;
        }

        .sidebar-logo {

            width: 145px;
            height: auto;

            display: block;
        }

        /* MENU LABEL */

        .sidebar-label {

            padding: 18px 13px 9px;

            font-size: 11px;

            font-weight: 800;

            color: #98a2b3;

            text-transform: uppercase;

            letter-spacing: 1.2px;
        }

        /* NAV ITEM */

        .sidebar-link {

            position: relative;

            display: flex;

            align-items: center;

            gap: 13px;

            width: 100%;

            padding: 12px 14px;

            margin-bottom: 5px;

            border-radius: 12px;

            color: #667085;

            font-size: 14px;

            font-weight: 600;

            transition: all 0.22s ease;
        }

        .sidebar-link i {

            width: 22px;

            text-align: center;

            font-size: 18px;

            flex-shrink: 0;
        }

        .sidebar-link:hover {

            background: #f0fdf4;

            color: #15803d;

            transform: translateX(2px);
        }

        .sidebar-link.active {

            background:
                linear-gradient(
                    135deg,
                    #ecfdf3,
                    #dcfce7
                );

            color: #15803d;

            font-weight: 700;

            box-shadow:
                inset 3px 0 0 #16a34a;
        }

        /* BADGE */

        .sidebar-badge {

            margin-left: auto;

            min-width: 22px;

            height: 22px;

            padding: 0 6px;

            display: inline-flex;

            align-items: center;

            justify-content: center;

            border-radius: 20px;

            background: #dcfce7;

            color: #15803d;

            font-size: 10px;

            font-weight: 800;
        }

        /* SIDEBAR BOTTOM */

        .sidebar-bottom {

            margin-top: 30px;

            padding-top: 15px;

            border-top: 1px solid #eef1f5;
        }

        .logout-button {

            border: 0;

            background: transparent;

            cursor: pointer;

            text-align: left;
        }

        /* =====================================================
           MAIN AREA
        ===================================================== */

        .app-main {

            margin-left: 270px;

            min-height: 100vh;

            padding: 0 38px 50px;
        }

        /* =====================================================
           TOPBAR
        ===================================================== */

        .app-topbar {

            position: sticky;

            top: 0;

            z-index: 1000;

            height: 82px;

            display: flex;

            align-items: center;

            justify-content: space-between;

            background: rgba(246, 249, 252, 0.90);

            backdrop-filter: blur(16px);

            border-bottom: 1px solid rgba(226, 232, 240, 0.8);
        }

        .topbar-left {

            display: flex;

            align-items: center;

            gap: 15px;
        }

        .mobile-menu-btn {

            width: 42px;
            height: 42px;

            border: 1px solid #e3e8ef;

            border-radius: 12px;

            background: white;

            color: #344054;

            display: none;

            align-items: center;

            justify-content: center;

            font-size: 20px;
        }

        .page-heading h1 {

            margin: 0;

            font-size: 28px;

            line-height: 1.2;

            font-weight: 800;

            letter-spacing: -0.7px;

            color: #172033;
        }

        .page-heading p {

            margin: 5px 0 0;

            color: #7a8595;

            font-size: 13px;

            font-weight: 500;
        }

        /* =====================================================
           USER PROFILE TOPBAR
        ===================================================== */

        .topbar-user {

            display: flex;

            align-items: center;

            gap: 11px;

            padding: 6px 12px 6px 7px;

            border: 1px solid #e4e9ef;

            border-radius: 40px;

            background: rgba(255,255,255,.92);

            box-shadow:
                0 5px 20px rgba(15,23,42,.04);
        }

        .user-avatar {

            width: 43px;
            height: 43px;

            border-radius: 50%;

            display: flex;

            align-items: center;

            justify-content: center;

            background:
                linear-gradient(
                    135deg,
                    #15803d,
                    #4ade80
                );

            color: white;

            font-size: 15px;

            font-weight: 800;

            box-shadow:
                0 7px 16px rgba(34,197,94,.20);
        }

        .user-info {

            line-height: 1.25;
        }

        .user-name {

            font-size: 13px;

            font-weight: 800;

            color: #172033;
        }

        .user-role {

            margin-top: 3px;

            color: #98a2b3;

            font-size: 10px;

            font-weight: 600;
        }

        /* =====================================================
           CONTENT
        ===================================================== */

        .page-content {

            padding-top: 30px;
        }

        /* =====================================================
           CARDS
        ===================================================== */

        .modern-card {

            background: rgba(255,255,255,.94);

            border: 1px solid #e7edf3;

            border-radius: 20px;

            box-shadow:
                0 10px 30px rgba(15,23,42,.045);
        }

        /* =====================================================
           BUTTON
        ===================================================== */

        .btn-productlife {

            display: inline-flex;

            align-items: center;

            justify-content: center;

            gap: 8px;

            padding: 11px 18px;

            border: 0;

            border-radius: 11px;

            background:
                linear-gradient(
                    135deg,
                    #16a34a,
                    #22c55e
                );

            color: white;

            font-size: 13px;

            font-weight: 700;

            box-shadow:
                0 8px 18px rgba(34,197,94,.18);

            transition: .2s ease;
        }

        .btn-productlife:hover {

            color: white;

            transform: translateY(-2px);

            box-shadow:
                0 12px 24px rgba(34,197,94,.25);
        }

        /* =====================================================
           MOBILE OVERLAY
        ===================================================== */

        .sidebar-overlay {

            display: none;

            position: fixed;

            inset: 0;

            background: rgba(15,23,42,.35);

            z-index: 1900;
        }

        /* =====================================================
           RESPONSIVE
        ===================================================== */

        @media(max-width: 1000px) {

            .app-sidebar {

                transform: translateX(-100%);

                transition: transform .25s ease;
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

        @media(max-width: 600px) {

            .app-main {

                padding-left: 15px;

                padding-right: 15px;
            }

            .app-topbar {

                height: 72px;
            }

            .page-heading h1 {

                font-size: 22px;
            }

            .page-heading p {

                display: none;
            }

            .topbar-user {

                padding: 5px;
            }

            .user-info {

                display: none;
            }

            .user-avatar {

                width: 39px;
                height: 39px;
            }

            .page-content {

                padding-top: 22px;
            }
        }

    </style>

    @stack('styles')

</head>

<body>

    <!-- SIDEBAR OVERLAY -->
    <div class="sidebar-overlay" id="sidebarOverlay"></div>


    <!-- =====================================================
         SIDEBAR
    ====================================================== -->

    <aside class="app-sidebar" id="appSidebar">

        <!-- LOGO -->

        <a href="{{ route('dashboard') }}"
           class="sidebar-brand">

            <img
                src="{{ asset('images/logo.png') }}"
                alt="ProductLife"
                class="sidebar-logo">

        </a>


        <!-- MAIN MENU -->

        <div class="sidebar-label">
            Main Menu
        </div>


        <!-- Dashboard -->

        <a href="{{ route('dashboard') }}"
           class="sidebar-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">

            <i class="bi bi-grid-1x2-fill"></i>

            <span>Dashboard</span>

        </a>


        <!-- Products -->

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


        <!-- Add Product -->

        <a
            href="{{ route('products.create') }}"
            class="sidebar-link {{ request()->routeIs('products.create') ? 'active' : '' }}"
        >

            <i class="bi bi-plus-square"></i>

            <span>Add Product</span>

        </a>


        <!-- Warranty -->

        <a href="{{ route('products.index') }}"
           class="sidebar-link">

            <i class="bi bi-shield-check"></i>

            <span>Warranty</span>

        </a>


        <!-- Maintenance -->

        <a href="{{ route('products.index') }}"
           class="sidebar-link">

            <i class="bi bi-calendar2-check"></i>

            <span>Maintenance</span>

        </a>


        <!-- Repair -->

        <a href="{{ route('products.index') }}"
           class="sidebar-link">

            <i class="bi bi-tools"></i>

            <span>Repair Requests</span>

        </a>


        <!-- PASSPORT -->

        <div class="sidebar-label">
            Product Lifecycle
        </div>


        <a href="{{ route('products.index') }}"
           class="sidebar-link">

            <i class="bi bi-postcard"></i>

            <span>Digital Passport</span>

        </a>


        <a href="{{ route('products.index') }}"
           class="sidebar-link">

            <i class="bi bi-clock-history"></i>

            <span>Repair History</span>

        </a>


        <!-- ACCOUNT -->

        <div class="sidebar-label">
            Account
        </div>


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


        <!-- LOGOUT -->

        <div class="sidebar-bottom">

            <form
                method="POST"
                action="{{ route('logout') }}">

                @csrf

                <button
                    type="submit"
                    class="sidebar-link logout-button w-100">

                    <i class="bi bi-box-arrow-right"></i>

                    <span>Logout</span>

                </button>

            </form>

        </div>

    </aside>


    <!-- =====================================================
         MAIN
    ====================================================== -->

    <main class="app-main">


        <!-- TOPBAR -->

        <header class="app-topbar">

            <div class="topbar-left">

                <button
                    class="mobile-menu-btn"
                    id="mobileMenuBtn">

                    <i class="bi bi-list"></i>

                </button>


                <div class="page-heading">

                    <h1>
                        @yield('page_title', 'Dashboard')
                    </h1>

                    <p>
                        @yield(
                            'page_subtitle',
                            'Manage your complete product lifecycle from one place.'
                        )
                    </p>

                </div>

            </div>


            <!-- USER -->

            <div class="topbar-user">

                <div class="user-avatar">

                    {{ strtoupper(
                        substr(Auth::user()->name, 0, 1)
                    ) }}

                </div>


                <div class="user-info">

                    <div class="user-name">

                        {{ Auth::user()->name }}

                    </div>

                    <div class="user-role">

                        Product Owner

                    </div>

                </div>

            </div>

        </header>


        <!-- PAGE CONTENT -->

        <div class="page-content">

            @yield('content')

        </div>

    </main>


    <!-- Bootstrap JS -->

    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
    </script>


    <!-- Sidebar Mobile -->

    <script>

        const sidebar =
            document.getElementById('appSidebar');

        const overlay =
            document.getElementById('sidebarOverlay');

        const menuBtn =
            document.getElementById('mobileMenuBtn');


        if (menuBtn) {

            menuBtn.addEventListener('click', function () {

                sidebar.classList.toggle('show');

                overlay.classList.toggle('show');

            });

        }


        if (overlay) {

            overlay.addEventListener('click', function () {

                sidebar.classList.remove('show');

                overlay.classList.remove('show');

            });

        }

    </script>


    @stack('scripts')

</body>

</html>