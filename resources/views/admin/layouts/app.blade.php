<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', 'ProductLife Admin')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
          rel="stylesheet">

    <style>
        body {
            margin: 0;
            background: #f4f7fb;
            color: #172033;
            font-family: Arial, sans-serif;
        }

        .sidebar {
            position: fixed;
            inset: 0 auto 0 0;
            width: 250px;
            padding: 25px 18px;
            background: #123f30;
            color: white;
        }

        .brand {
            font-size: 23px;
            font-weight: bold;
            padding: 8px 12px 30px;
        }

        .brand span { color: #86efac; }

        .menu-link {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 13px 14px;
            margin-bottom: 7px;
            border-radius: 10px;
            color: #e0eee7;
            text-decoration: none;
        }

        .menu-link:hover,
        .menu-link.active {
            background: #23654d;
            color: white;
        }

        .main {
            margin-left: 250px;
            padding: 30px;
        }

        .topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 28px;
            gap: 15px;
        }

        .topbar h1 {
            font-size: 27px;
            font-weight: bold;
        }

        .muted { color: #78859a; font-size: 13px; }

        @media(max-width: 700px) {
            .sidebar {
                position: relative;
                width: 100%;
            }

            .main {
                margin-left: 0;
                padding: 18px;
            }

            .topbar {
                align-items: flex-start;
                flex-direction: column;
            }
        }
    </style>
</head>
<body>

<aside class="sidebar">
    <div class="brand">Product<span>Life.</span></div>

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

    <hr>

    <form action="{{ route('admin.logout') }}" method="POST">
        @csrf
        <button type="submit" class="menu-link border-0 w-100"
                style="background:transparent">
            <i class="bi bi-box-arrow-left"></i> Logout
        </button>
    </form>
</aside>

<main class="main">
    <header class="topbar">
        <div>
            <h1>@yield('page_title', 'Admin Dashboard')</h1>
            <div class="muted">
                @yield('page_subtitle', 'Manage your ProductLife ecosystem.')
            </div>
        </div>

        <div>
            <i class="bi bi-shield-check"></i>
            {{ auth('admin')->user()->name ?? 'Administrator' }}
        </div>
    </header>

    @yield('content')
</main>

</body>
</html>