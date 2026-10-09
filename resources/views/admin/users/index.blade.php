<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>User Management - ProductLife</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        * { box-sizing: border-box; }

        body {
            margin: 0;
            background: #f4f7fb;
            color: #172033;
            font-family: 'Inter', sans-serif;
        }

        .sidebar {
            width: 250px;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            padding: 28px 18px;
            background: #103e2e;
            color: white;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 5px 10px 30px;
            font-size: 23px;
            font-weight: 800;
        }

        .brand i { color: #86efac; }

        .nav-label {
            color: #a7c8b8;
            font-size: 10px;
            font-weight: 800;
            letter-spacing: 1.5px;
            padding: 12px 12px;
        }

        .nav-link-custom {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 13px 14px;
            margin-bottom: 7px;
            color: #d7e8df;
            text-decoration: none;
            border-radius: 12px;
            font-size: 13px;
            font-weight: 600;
        }

        .nav-link-custom:hover,
        .nav-link-custom.active {
            color: white;
            background: #21664b;
        }

        .nav-link-custom i { font-size: 17px; }

        .main {
            margin-left: 250px;
            padding: 35px;
            min-height: 100vh;
        }

        .topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
            margin-bottom: 30px;
        }

        .eyebrow {
            color: #16804e;
            font-size: 11px;
            font-weight: 800;
            letter-spacing: 1.4px;
            text-transform: uppercase;
        }

        h1 {
            font-size: 29px;
            font-weight: 800;
            margin: 7px 0;
        }

        .subtitle {
            color: #778397;
            font-size: 13px;
        }

        .admin-chip {
            background: white;
            border: 1px solid #e8edf3;
            padding: 11px 15px;
            border-radius: 14px;
            font-size: 12px;
            font-weight: 700;
            white-space: nowrap;
        }

        .stat-card, .content-card {
            background: white;
            border: 1px solid #e9eef5;
            border-radius: 19px;
            box-shadow: 0 7px 24px rgba(24, 39, 75, .035);
        }

        .stat-card {
            padding: 22px;
            margin-bottom: 24px;
        }

        .stat-icon {
            width: 43px;
            height: 43px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 13px;
            background: #e5f7ec;
            color: #16804e;
            font-size: 21px;
            margin-bottom: 17px;
        }

        .stat-label {
            color: #7b8798;
            font-size: 12px;
            font-weight: 600;
        }

        .stat-value {
            font-size: 28px;
            font-weight: 800;
            margin-top: 5px;
        }

        .content-card { overflow: hidden; }

        .card-header-custom {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 18px;
            padding: 23px 25px;
            border-bottom: 1px solid #edf1f6;
        }

        .card-header-custom h2 {
            font-size: 17px;
            font-weight: 800;
            margin: 0 0 5px;
        }

        .card-header-custom p {
            margin: 0;
            font-size: 12px;
            color: #8390a1;
        }

        .search-box {
            display: flex;
            gap: 8px;
            width: min(100%, 360px);
        }

        .search-box input {
            min-width: 0;
            border: 1px solid #e0e7ef;
            border-radius: 10px;
            padding: 11px 13px;
            font-size: 12px;
            outline: none;
        }

        .search-box input:focus {
            border-color: #16804e;
            box-shadow: 0 0 0 3px #16804e15;
        }

        .search-btn {
            border: 0;
            border-radius: 10px;
            background: #176b4d;
            color: white;
            padding: 0 15px;
        }

        .table-responsive { padding: 0 20px; }

        table { min-width: 760px; }

        .table thead th {
            background: #f8fafc;
            color: #7b8798;
            font-size: 10px;
            letter-spacing: .7px;
            padding: 16px 12px;
            border-bottom: 1px solid #e9eef5;
            white-space: nowrap;
        }

        .table tbody td {
            padding: 17px 12px;
            vertical-align: middle;
            font-size: 12px;
            border-bottom: 1px solid #f0f3f7;
        }

        .user-cell {
            display: flex;
            align-items: center;
            gap: 11px;
            min-width: 170px;
        }

        .avatar {
            width: 39px;
            height: 39px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #e4f5eb;
            color: #176b4d;
            font-weight: 800;
            font-size: 14px;
            flex-shrink: 0;
        }

        .user-name {
            font-size: 12px;
            font-weight: 800;
            color: #202b3c;
        }

        .user-email {
            font-size: 11px;
            color: #8792a2;
            margin-top: 4px;
            overflow-wrap: anywhere;
        }

        .status-badge {
            display: inline-block;
            padding: 6px 10px;
            border-radius: 20px;
            background: #eef2f6;
            color: #536174;
            font-size: 10px;
            font-weight: 800;
        }

        .status-badge.active {
            background: #e5f8ed;
            color: #16804e;
        }

        .empty-state {
            text-align: center;
            padding: 55px 20px;
            color: #8591a2;
        }

        .empty-state i {
            display: block;
            font-size: 36px;
            margin-bottom: 12px;
        }

        .pagination-wrap {
            padding: 20px 25px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            flex-wrap: wrap;
        }

        .pagination-wrap .pagination {
            margin: 0;
        }

        .pagination {
            --bs-pagination-color: #176b4d;
            --bs-pagination-hover-color: #12583e;
            --bs-pagination-active-bg: #176b4d;
            --bs-pagination-active-border-color: #176b4d;
        }

        .pagination .page-link {
            font-size: 12px;
        }

        .back-btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 11px 15px;
            border: 1px solid #e3eaf1;
            border-radius: 11px;
            color: #354256;
            background: white;
            text-decoration: none;
            font-size: 12px;
            font-weight: 700;
        }

        @media (max-width: 900px) {
            .sidebar { width: 75px; padding: 25px 10px; }
            .brand { justify-content: center; padding: 5px 0 30px; }
            .brand span, .nav-link-custom span, .nav-label { display: none; }
            .nav-link-custom { justify-content: center; padding: 14px 8px; }
            .main { margin-left: 75px; padding: 25px 18px; }
        }

        @media (max-width: 600px) {
            .main { padding: 20px 12px; }
            .topbar { align-items: flex-start; }
            h1 { font-size: 24px; }
            .admin-chip { display: none; }
            .card-header-custom { align-items: flex-start; flex-direction: column; }
            .search-box { width: 100%; }
            .pagination-wrap { padding: 17px; }
        }
    </style>
</head>

<body>

<aside class="sidebar">
    <div class="brand">
        <i class="bi bi-recycle"></i>
        <span>ProductLife</span>
    </div>

    <div class="nav-label">ADMIN MENU</div>

    <a href="{{ route('admin.dashboard') }}" class="nav-link-custom">
        <i class="bi bi-grid-1x2"></i>
        <span>Dashboard</span>
    </a>

    <a href="{{ route('admin.users.index') }}" class="nav-link-custom active">
        <i class="bi bi-people"></i>
        <span>User Management</span>
    </a>

    <a href="{{ route('admin.dashboard') }}" class="nav-link-custom">
        <i class="bi bi-box-seam"></i>
        <span>Products</span>
    </a>

    <a href="{{ route('admin.dashboard') }}" class="nav-link-custom">
        <i class="bi bi-tools"></i>
        <span>Technicians</span>
    </a>

    <a href="{{ route('admin.dashboard') }}" class="nav-link-custom">
        <i class="bi bi-wrench-adjustable"></i>
        <span>Repair Requests</span>
    </a>

    <div class="nav-label mt-4">ACCOUNT</div>

    <form action="{{ route('admin.logout') }}" method="POST">
        @csrf
        <button type="submit" class="nav-link-custom w-100 border-0" style="background:transparent;text-align:left;">
            <i class="bi bi-box-arrow-left"></i>
            <span>Logout</span>
        </button>
    </form>
</aside>

<main class="main">

    <div class="topbar">
        <div>
            <div class="eyebrow">Administration / Users</div>
            <h1>User Management</h1>
            <div class="subtitle">View and search registered ProductLife users.</div>
        </div>

        <div class="admin-chip">
            <i class="bi bi-shield-check text-success me-2"></i>
            {{ auth('admin')->user()->name }}
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 col-xl-4">
            <div class="stat-card">
                <div class="stat-icon"><i class="bi bi-people"></i></div>
                <div class="stat-label">TOTAL REGISTERED USERS</div>
                <div class="stat-value">{{ number_format($totalUsers) }}</div>
            </div>
        </div>

        <div class="col-md-6 col-xl-4">
            <div class="stat-card">
                <div class="stat-icon"><i class="bi bi-person-lines-fill"></i></div>
                <div class="stat-label">USERS ON THIS PAGE</div>
                <div class="stat-value">{{ $users->count() }}</div>
            </div>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <section class="content-card">

        <div class="card-header-custom">
            <div>
                <h2><i class="bi bi-people-fill text-success me-2"></i>Registered Users</h2>
                <p>Showing {{ $users->firstItem() ?? 0 }}–{{ $users->lastItem() ?? 0 }} of {{ $users->total() }} results</p>
            </div>

            <form action="{{ route('admin.users.index') }}" method="GET" class="search-box">
                <input
                    type="text"
                    name="search"
                    value="{{ $search }}"
                    placeholder="Search name, email or phone..."
                    aria-label="Search users"
                >
                <button type="submit" class="search-btn" aria-label="Search">
                    <i class="bi bi-search"></i>
                </button>

                @if($search)
                    <a href="{{ route('admin.users.index') }}" class="btn btn-light border" title="Clear search">
                        <i class="bi bi-x-lg"></i>
                    </a>
                @endif
            </form>
        </div>

        <div class="table-responsive">
            <table class="table align-middle mb-0">
                <thead>
                    <tr>
                        <th>USER</th>
                        <th>PHONE</th>
                        <th>ADDRESS</th>
                        <th>STATUS</th>
                        <th>REGISTERED</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($users as $user)
                        @php
                            $statusText = (string) ($user->status ?? 'Active');
                            $isActive = in_array(strtolower($statusText), ['active', '1', 'approved', 'enabled']);
                        @endphp

                        <tr>
                            <td>
                                <div class="user-cell">
                                    <div class="avatar">
                                        {{ strtoupper(substr($user->name ?? 'U', 0, 1)) }}
                                    </div>
                                    <div>
                                        <div class="user-name">{{ $user->name }}</div>
                                        <div class="user-email">{{ $user->email }}</div>
                                    </div>
                                </div>
                            </td>

                            <td>{{ $user->phone ?: 'Not provided' }}</td>

                            <td>{{ \Illuminate\Support\Str::limit($user->address ?? 'Not provided', 35) }}</td>

                            <td>
                                <span class="status-badge {{ $isActive ? 'active' : '' }}">
                                    {{ $statusText ?: 'Unknown' }}
                                </span>
                            </td>

                            <td>
                                {{ $user->created_at ? $user->created_at->format('d M Y') : '—' }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5">
                                <div class="empty-state">
                                    <i class="bi bi-person-x"></i>
                                    <strong>No users found</strong>
                                    <div class="mt-2">Try a different name, email or phone number.</div>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="pagination-wrap">
            <div class="text-secondary small">
                Page {{ $users->currentPage() }} of {{ $users->lastPage() }}
            </div>

            <div>
                {{ $users->links('pagination::bootstrap-5') }}
            </div>
        </div>

    </section>

    <div class="mt-4">
        <a href="{{ route('admin.dashboard') }}" class="back-btn">
            <i class="bi bi-arrow-left"></i>
            Back to Dashboard
        </a>
    </div>

</main>

</body>
</html>