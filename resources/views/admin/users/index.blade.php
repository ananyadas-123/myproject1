
@extends('admin.layouts.app')

@section('title', 'User Management')
@section('page-heading', 'User Management')
@section('page-subtitle', 'View and search registered ProductLife users.')

@push('styles')
<style>
    /* STATISTICS CARDS */

    .stat-card,
    .content-card {
        background: #ffffff;
        border: 1px solid #e7eaf4;
        border-radius: 19px;
        box-shadow: 0 8px 26px rgba(32, 40, 85, .055);
    }

    .stat-card {
        position: relative;
        padding: 23px;
        margin-bottom: 24px;
        overflow: hidden;
        transition: all .3s ease;
    }

    .stat-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 14px 30px rgba(32, 40, 85, .11);
    }

    .stat-card::after {
        content: "";
        position: absolute;
        width: 100px;
        height: 100px;
        border-radius: 50%;
        right: -35px;
        top: -40px;
        background: var(--stat-glow);
        opacity: .7;
    }

    .stat-card.purple {
        --stat-color: #6846e8;
        --stat-glow: #e8e0ff;
    }

    .stat-card.blue {
        --stat-color: #2385e8;
        --stat-glow: #dceeff;
    }

    .stat-icon {
        width: 47px;
        height: 47px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 14px;
        background: var(--stat-glow);
        color: var(--stat-color);
        font-size: 22px;
        margin-bottom: 17px;
    }

    .stat-label {
        color: #77839b;
        font-size: 10px;
        font-weight: 900;
        letter-spacing: .8px;
    }

    .stat-value {
        color: #202944;
        font-size: 30px;
        font-weight: 900;
        margin-top: 6px;
    }

    /* CONTENT CARD */

    .content-card {
        overflow: hidden;
    }

    .card-header-custom {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 18px;
        padding: 24px 25px;
        border-bottom: 1px solid #edf0f6;
    }

    .card-header-custom h2 {
        font-size: 17px;
        font-weight: 900;
        color: #202944;
        margin: 0 0 6px;
    }

    .card-header-custom h2 i {
        color: #6949e9;
    }

    .card-header-custom p {
        margin: 0;
        font-size: 11px;
        color: #8792a7;
    }

    /* SEARCH BOX */

    .search-box {
        display: flex;
        gap: 8px;
        width: min(100%, 370px);
    }

    .search-box input {
        flex: 1;
        min-width: 0;
        border: 1px solid #e0e6f0;
        border-radius: 11px;
        padding: 11px 13px;
        font-size: 11px;
        color: #28324d;
        outline: none;
        background: #fbfcff;
        transition: .2s;
    }

    .search-box input:focus {
        border-color: #7150e9;
        background: #ffffff;
        box-shadow: 0 0 0 4px rgba(105, 73, 233, .10);
    }

    .search-btn {
        border: none;
        border-radius: 11px;
        background: linear-gradient(135deg, #7551ec, #416ef1);
        color: white;
        padding: 0 17px;
        font-size: 14px;
        transition: .2s;
    }

    .search-btn:hover {
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 6px 15px rgba(101, 70, 232, .28);
    }

    .clear-btn {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 40px;
        border-radius: 11px;
        color: #df4961;
        background: #fff;
        border: 1px solid #f0dfe4;
    }

    .clear-btn:hover {
        color: #c72f49;
        background: #fff0f3;
    }

    /* TABLE */

    .table-responsive {
        padding: 0 20px;
    }

    table {
        min-width: 760px;
    }

    .table {
        --bs-table-bg: transparent;
        --bs-table-hover-bg: #f7f6ff;
        margin-bottom: 0;
    }

    .table thead th {
        background: #f7f8fd;
        color: #77839a;
        font-size: 10px;
        font-weight: 900;
        letter-spacing: .8px;
        padding: 17px 12px;
        border-bottom: 1px solid #e8ecf4;
        white-space: nowrap;
    }

    .table tbody td {
        padding: 17px 12px;
        vertical-align: middle;
        font-size: 11px;
        font-weight: 600;
        color: #59647c;
        border-bottom: 1px solid #eff1f6;
    }

    .table tbody tr {
        transition: background .2s;
    }

    .table tbody tr:hover {
        background: #f8f7ff;
    }

    /* USER INFORMATION */

    .user-cell {
        display: flex;
        align-items: center;
        gap: 11px;
        min-width: 190px;
    }

    .avatar {
        width: 42px;
        height: 42px;
        border-radius: 13px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: linear-gradient(135deg, #e8e1ff, #dce9ff);
        color: #6244d8;
        font-weight: 900;
        font-size: 15px;
        flex-shrink: 0;
        border: 1px solid #e2dcff;
    }

    .user-name {
        font-size: 12px;
        font-weight: 900;
        color: #25304c;
    }

    .user-email {
        font-size: 10px;
        color: #8993a7;
        margin-top: 4px;
        overflow-wrap: anywhere;
    }

    /* STATUS BADGES */

    .status-badge {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 7px 11px;
        border-radius: 30px;
        background: #fff0e2;
        color: #d17a19;
        font-size: 10px;
        font-weight: 900;
        white-space: nowrap;
    }

    .status-badge::before {
        content: "";
        width: 6px;
        height: 6px;
        border-radius: 50%;
        background: currentColor;
    }

    .status-badge.active {
        background: #e1f8ed;
        color: #109b66;
    }

    /* EMPTY STATE */

    .empty-state {
        text-align: center;
        padding: 60px 20px;
        color: #8590a6;
    }

    .empty-state i {
        display: block;
        font-size: 43px;
        color: #9982ee;
        margin-bottom: 14px;
    }

    .empty-state strong {
        display: block;
        font-size: 15px;
        font-weight: 900;
        color: #303a57;
    }

    .empty-state div {
        font-size: 11px;
    }

    /* PAGINATION */

    .pagination-wrap {
        padding: 20px 25px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 15px;
        flex-wrap: wrap;
        border-top: 1px solid #edf0f6;
    }

    .pagination-wrap .pagination {
        margin: 0;
    }

    .pagination {
        --bs-pagination-color: #6246dc;
        --bs-pagination-hover-color: #ffffff;
        --bs-pagination-hover-bg: #7454e8;
        --bs-pagination-active-bg: #6546e8;
        --bs-pagination-active-border-color: #6546e8;
        --bs-pagination-border-color: #e9eafa;
        --bs-pagination-focus-box-shadow: 0 0 0 .2rem rgba(101,70,232,.13);
    }

    .pagination .page-link {
        font-size: 11px;
        font-weight: 700;
        border-radius: 8px;
        margin: 0 3px;
    }

    /* SUCCESS MESSAGE */

    .alert-success {
        border: 1px solid #b9eed4;
        border-radius: 13px;
        background: #e6fbf0;
        color: #087c4d;
        padding: 14px 18px;
        font-size: 12px;
        font-weight: 700;
        margin-bottom: 22px;
    }

    /* BACK BUTTON */

    .back-btn {
        display: inline-flex;
        align-items: center;
        gap: 9px;
        padding: 12px 17px;
        border: 1px solid #e4e7f0;
        border-radius: 11px;
        color: #4b5671;
        background: white;
        text-decoration: none;
        font-size: 11px;
        font-weight: 800;
        transition: all .2s;
        box-shadow: 0 4px 12px rgba(35, 43, 80, .035);
    }

    .back-btn:hover {
        color: white;
        background: linear-gradient(110deg, #6546e8, #4778ef);
        border-color: transparent;
        transform: translateY(-2px);
        box-shadow: 0 6px 16px rgba(101, 70, 232, .22);
    }

    /* RESPONSIVE */

    @media (max-width: 650px) {
        .card-header-custom {
            align-items: flex-start;
            flex-direction: column;
            padding: 20px;
        }

        .search-box {
            width: 100%;
        }

        .table-responsive {
            padding: 0 10px;
        }

        .pagination-wrap {
            padding: 17px;
        }

        .stat-card {
            padding: 19px;
        }
    }
</style>
@endpush

@section('content')

    {{-- STATISTICS --}}

    <div class="row">
        <div class="col-md-6 col-xl-4">
            <div class="stat-card purple">
                <div class="stat-icon">
                    <i class="bi bi-people-fill"></i>
                </div>
                <div class="stat-label">TOTAL REGISTERED USERS</div>
                <div class="stat-value">{{ number_format($totalUsers) }}</div>
            </div>
        </div>

        <div class="col-md-6 col-xl-4">
            <div class="stat-card blue">
                <div class="stat-icon">
                    <i class="bi bi-person-lines-fill"></i>
                </div>
                <div class="stat-label">USERS ON THIS PAGE</div>
                <div class="stat-value">{{ $users->count() }}</div>
            </div>
        </div>
    </div>

    {{-- SUCCESS MESSAGE --}}

    @if(session('success'))
        <div class="alert alert-success">
            <i class="bi bi-check-circle-fill me-2"></i>
            {{ session('success') }}
        </div>
    @endif

    {{-- REGISTERED USERS --}}

    <section class="content-card">

        <div class="card-header-custom">
            <div>
                <h2>
                    <i class="bi bi-people-fill me-2"></i>
                    Registered Users
                </h2>

                <p>
                    Showing {{ $users->firstItem() ?? 0 }}–{{ $users->lastItem() ?? 0 }}
                    of {{ $users->total() }} results
                </p>
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
                    <a href="{{ route('admin.users.index') }}" class="btn clear-btn" title="Clear search">
                        <i class="bi bi-x-lg"></i>
                    </a>
                @endif
            </form>
        </div>

        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">

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
                                        <div class="user-name">
                                            {{ $user->name }}
                                        </div>

                                        <div class="user-email">
                                            {{ $user->email }}
                                        </div>
                                    </div>
                                </div>
                            </td>

                            <td>
                                {{ $user->phone ?: 'Not provided' }}
                            </td>

                            <td>
                                {{ \Illuminate\Support\Str::limit($user->address ?? 'Not provided', 35) }}
                            </td>

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
                                    <div class="mt-2">
                                        Try a different name, email or phone number.
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>

            </table>
        </div>

        {{-- PAGINATION --}}

        <div class="pagination-wrap">
            <div class="text-secondary small">
                Page {{ $users->currentPage() }} of {{ $users->lastPage() }}
            </div>

            <div>
                {{ $users->links('pagination::bootstrap-5') }}
            </div>
        </div>

    </section>

    {{-- BACK TO DASHBOARD --}}

    <div class="mt-4">
        <a href="{{ route('admin.dashboard') }}" class="back-btn">
            <i class="bi bi-arrow-left"></i>
            Back to Dashboard
        </a>
    </div>

@endsection
