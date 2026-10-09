<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Admin Dashboard - ProductLife</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        * { box-sizing: border-box; }

        body {
            margin: 0;
            font-family: 'Inter', sans-serif;
            background: #f4f7fb;
            color: #172033;
        }

        .sidebar {
            position: fixed;
            inset: 0 auto 0 0;
            width: 250px;
            padding: 28px 18px;
            background: #123f30;
            color: white;
            display: flex;
            flex-direction: column;
            z-index: 10;
        }

        .brand {
            font-size: 23px;
            font-weight: 800;
            padding: 8px 12px 30px;
        }

        .brand span { color: #86efac; }

        .menu-label {
            margin: 12px 12px;
            color: #a8c8ba;
            font-size: 11px;
            font-weight: 800;
            letter-spacing: 1px;
            text-transform: uppercase;
        }

        .menu-link {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 13px 14px;
            margin-bottom: 6px;
            border-radius: 11px;
            color: #e0eee7;
            text-decoration: none;
            font-size: 13px;
            font-weight: 600;
        }

        .menu-link.active,
        .menu-link:hover {
            background: #23654d;
            color: #ffffff;
        }

        .menu-link i { font-size: 18px; }

        .sidebar-bottom {
            margin-top: auto;
        }

        .main {
            margin-left: 250px;
            padding: 30px;
        }

        .topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            margin-bottom: 28px;
        }

        .topbar h1 {
            margin: 0 0 7px;
            font-size: 27px;
            font-weight: 800;
        }

        .muted {
            color: #78859a;
            font-size: 13px;
        }

        .admin-pill {
            display: flex;
            align-items: center;
            gap: 10px;
            background: white;
            padding: 10px 15px;
            border-radius: 14px;
            box-shadow: 0 4px 18px #17203308;
            font-size: 13px;
            font-weight: 700;
        }

        .admin-avatar {
            display: grid;
            place-items: center;
            width: 38px;
            height: 38px;
            border-radius: 12px;
            background: #dcfce7;
            color: #166534;
            font-size: 19px;
        }

        .welcome {
            padding: 30px;
            border-radius: 20px;
            color: white;
            background: linear-gradient(120deg, #176b4d, #21845d);
            margin-bottom: 28px;
        }

        .welcome h2 {
            font-size: 25px;
            font-weight: 800;
            margin-bottom: 10px;
        }

        .welcome p {
            margin: 0;
            max-width: 620px;
            color: #e0f2e9;
            font-size: 14px;
            line-height: 1.8;
        }

        .section-title {
            margin: 0 0 18px;
            font-size: 18px;
            font-weight: 800;
        }

        .stats {
            display: grid;
            grid-template-columns: repeat(4, minmax(0, 1fr));
            gap: 18px;
            margin-bottom: 30px;
        }

        .stat-card {
            background: white;
            border: 1px solid #edf0f5;
            border-radius: 17px;
            padding: 22px;
            box-shadow: 0 5px 20px #17203305;
        }

        .stat-icon {
            display: grid;
            place-items: center;
            width: 44px;
            height: 44px;
            border-radius: 13px;
            background: #dcfce7;
            color: #15803d;
            font-size: 20px;
            margin-bottom: 20px;
        }

        .stat-card h3 {
            font-size: 28px;
            font-weight: 800;
            margin: 0 0 7px;
        }

        .stat-card p {
            color: #78859a;
            font-size: 12px;
            margin: 0;
        }

        .quick-grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 16px;
        }

        .quick-link {
            display: flex;
            align-items: center;
            gap: 14px;
            padding: 21px;
            background: white;
            border: 1px solid #edf0f5;
            border-radius: 16px;
            text-decoration: none;
            color: #172033;
            transition: .2s;
        }

        .quick-link:hover {
            transform: translateY(-3px);
            border-color: #86efac;
        }

        .quick-link i {
            display: grid;
            place-items: center;
            width: 44px;
            height: 44px;
            flex-shrink: 0;
            background: #ecfdf5;
            color: #15803d;
            border-radius: 12px;
            font-size: 20px;
        }

        .quick-link strong {
            display: block;
            font-size: 13px;
            margin-bottom: 5px;
        }

        .quick-link small {
            color: #78859a;
            font-size: 11px;
        }

        .footer-note {
            margin-top: 30px;
            text-align: center;
            color: #94a3b8;
            font-size: 11px;
        }

        @media (max-width: 1100px) {
            .stats { grid-template-columns: repeat(2, minmax(0, 1fr)); }
            .quick-grid { grid-template-columns: repeat(2, minmax(0, 1fr)); }
        }

        @media (max-width: 700px) {
            .sidebar {
                position: static;
                width: 100%;
                padding: 15px;
            }

            .brand { padding-bottom: 12px; }
            .menu-label { margin-top: 8px; }
            .sidebar-bottom { margin-top: 10px; }

            .main {
                margin-left: 0;
                padding: 20px 15px;
            }

            .topbar {
                align-items: flex-start;
                flex-direction: column;
            }

            .stats,
            .quick-grid {
                grid-template-columns: 1fr;
            }

            .welcome { padding: 23px; }
            .topbar h1 { font-size: 23px; }
        }
    </style>
</head>
<body>

<aside class="sidebar">
    <div class="brand">
        Product<span>Life.</span>
    </div>

    <div class="menu-label">Main Menu</div>

    <a href="{{ route('admin.dashboard') }}" class="menu-link active">
        <i class="bi bi-grid-1x2-fill"></i>
        Dashboard
    </a>

    <a href="#users" class="menu-link">
        <i class="bi bi-people"></i>
        Users Management
    </a>

    <a href="#products" class="menu-link">
        <i class="bi bi-box-seam"></i>
        Products Management
    </a>

    <a href="#technicians" class="menu-link">
        <i class="bi bi-tools"></i>
        Technicians
    </a>

    <a href="#repairs" class="menu-link">
        <i class="bi bi-wrench-adjustable-circle"></i>
        Repair Requests
    </a>

    <div class="sidebar-bottom">
        <div class="menu-label">Account</div>

        <form action="{{ route('admin.logout') }}" method="POST">
            @csrf
            <button type="submit"
                    class="menu-link w-100 border-0 text-start"
                    style="background:transparent">
                <i class="bi bi-box-arrow-left"></i>
                Logout
            </button>
        </form>
    </div>
</aside>

<main class="main">

    <header class="topbar">
        <div>
            <h1>Admin Dashboard</h1>
            <div class="muted">Monitor your ProductLife ecosystem.</div>
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

    <section class="welcome">
        <h2>Welcome back, {{ auth('admin')->user()->name }} 👋</h2>
        <p>
            Here is your administration overview. Manage users, products,
            technicians and repair services from one place.
        </p>
    </section>

    <h2 class="section-title">System Overview</h2>

    <section class="stats">

        <div class="stat-card">
            <div class="stat-icon"><i class="bi bi-people"></i></div>
            <h3>{{ $totalUsers }}</h3>
            <p>Registered Users</p>
        </div>

        <div class="stat-card">
            <div class="stat-icon"><i class="bi bi-box-seam"></i></div>
            <h3>{{ $totalProducts }}</h3>
            <p>Total Products</p>
        </div>

        <div class="stat-card">
            <div class="stat-icon"><i class="bi bi-tools"></i></div>
            <h3>{{ $totalTechnicians }}</h3>
            <p>Technicians</p>
        </div>

        <div class="stat-card">
            <div class="stat-icon"><i class="bi bi-wrench-adjustable"></i></div>
            <h3>{{ $totalRepairRequests }}</h3>
            <p>Repair Requests</p>
        </div>

    </section>

    <h2 class="section-title">Management Shortcuts</h2>

    <section class="quick-grid">

        {{-- User Management --}}
        <a href="{{ route('admin.users.index') }}" class="quick-link">
            <i class="bi bi-people"></i>
            <div>
                <strong>User Management</strong>
                <small>Registered customer management</small>
            </div>
        </a>

        {{-- Product Management --}}
        <a href="#products" class="quick-link">
            <i class="bi bi-box-seam"></i>
            <div>
                <strong>Product Management</strong>
                <small>View and manage products</small>
            </div>
        </a>

        {{-- Technician Management --}}
        <a href="#technicians" class="quick-link">
            <i class="bi bi-person-gear"></i>
            <div>
                <strong>Technician Management</strong>
                <small>Technician verification and availability</small>
            </div>
        </a>

        {{-- Repair Requests --}}
        <a href="#repairs" class="quick-link">
            <i class="bi bi-wrench-adjustable-circle"></i>
            <div>
                <strong>Repair Requests</strong>
                <small>Review repair service requests</small>
            </div>
        </a>

        {{-- Warranty Management --}}
        <a href="#warranty" class="quick-link">
            <i class="bi bi-patch-check"></i>
            <div>
                <strong>Warranty Management</strong>
                <small>Warranty administration</small>
            </div>
        </a>

        {{-- Reports & Analytics --}}
        <a href="#reports" class="quick-link">
            <i class="bi bi-graph-up-arrow"></i>
            <div>
                <strong>Reports &amp; Analytics</strong>
                <small>Lifecycle and service insights</small>
            </div>
        </a>

    </section>

    <div class="footer-note">
        ProductLife Admin Panel · Complete Product Lifecycle & Repair Ecosystem
    </div>

</main>

</body>
</html>