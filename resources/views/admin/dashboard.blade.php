
@extends('admin.layouts.app')

@section('title', 'Dashboard')
@section('page-heading', 'Admin Dashboard')
@section('page-subtitle', 'Monitor your ProductLife ecosystem.')

@push('styles')
<style>
/* ================================
   DASHBOARD PREMIUM DESIGN
================================ */

.welcome {
    position: relative;
    overflow: hidden;
    padding: 35px;
    border-radius: 22px;
    color: #ffffff;
    background: linear-gradient(115deg, #312e81 0%, #4f46e5 48%, #7c3aed 100%);
    margin-bottom: 32px;
    box-shadow: 0 12px 30px rgba(79, 70, 229, .22);
}

.welcome::before {
    content: "";
    position: absolute;
    width: 240px;
    height: 240px;
    border-radius: 50%;
    background: rgba(255,255,255,.09);
    right: 5%;
    top: -115px;
}

.welcome::after {
    content: "";
    position: absolute;
    width: 150px;
    height: 150px;
    border-radius: 50%;
    background: rgba(255,255,255,.07);
    right: 24%;
    bottom: -100px;
}

.welcome h2 {
    position: relative;
    z-index: 1;
    font-size: 26px;
    font-weight: 800;
    margin-bottom: 12px;
    letter-spacing: -.6px;
}

.welcome p {
    position: relative;
    z-index: 1;
    margin: 0;
    max-width: 650px;
    color: #e0e7ff;
    font-size: 13px;
    line-height: 1.9;
}

/* Section headings */

.section-title {
    position: relative;
    margin: 0 0 19px;
    padding-left: 14px;
    font-size: 18px;
    font-weight: 800;
    color: #172554;
}

.section-title::before {
    content: "";
    position: absolute;
    left: 0;
    top: 3px;
    height: 19px;
    width: 4px;
    border-radius: 5px;
    background: linear-gradient(180deg, #4f46e5, #a855f7);
}

/* ================================
   STATISTICS CARDS
================================ */

.stats {
    display: grid;
    grid-template-columns: repeat(4, minmax(0, 1fr));
    gap: 19px;
    margin-bottom: 34px;
}

.stat-card {
    position: relative;
    overflow: hidden;
    min-height: 175px;
    padding: 23px;
    border-radius: 18px;
    color: #ffffff;
    border: 0;
    box-shadow: 0 8px 22px rgba(15, 23, 42, .10);
    transition: all .28s ease;
}

.stat-card:nth-child(1) {
    background: linear-gradient(135deg, #2563eb, #4f46e5);
}

.stat-card:nth-child(2) {
    background: linear-gradient(135deg, #059669, #0d9488);
}

.stat-card:nth-child(3) {
    background: linear-gradient(135deg, #7c3aed, #a855f7);
}

.stat-card:nth-child(4) {
    background: linear-gradient(135deg, #ea580c, #f59e0b);
}

.stat-card::after {
    content: "";
    position: absolute;
    width: 140px;
    height: 140px;
    border-radius: 50%;
    right: -45px;
    bottom: -65px;
    background: rgba(255,255,255,.12);
    transition: transform .3s ease;
}

.stat-card:hover {
    transform: translateY(-7px);
    box-shadow: 0 15px 28px rgba(15, 23, 42, .16);
}

.stat-card:hover::after {
    transform: scale(1.35);
}

.stat-icon {
    position: relative;
    z-index: 1;
    display: grid;
    place-items: center;
    width: 47px;
    height: 47px;
    border-radius: 14px;
    background: rgba(255,255,255,.19);
    border: 1px solid rgba(255,255,255,.20);
    color: #ffffff;
    font-size: 21px;
    margin-bottom: 20px;
}

.stat-card h3 {
    position: relative;
    z-index: 1;
    font-size: 30px;
    font-weight: 800;
    margin: 0 0 6px;
    color: #ffffff;
    letter-spacing: -.7px;
}

.stat-card p {
    position: relative;
    z-index: 1;
    color: rgba(255,255,255,.88);
    font-size: 12px;
    font-weight: 600;
    margin: 0;
}

/* ================================
   MANAGEMENT SHORTCUTS
================================ */

.quick-grid {
    display: grid;
    grid-template-columns: repeat(3, minmax(0, 1fr));
    gap: 17px;
}

.quick-link {
    position: relative;
    display: flex;
    align-items: center;
    gap: 14px;
    min-height: 100px;
    padding: 20px;
    background: #ffffff;
    border: 1px solid #e2e8f0;
    border-radius: 16px;
    text-decoration: none;
    color: #172033;
    overflow: hidden;
    transition: all .25s ease;
    box-shadow: 0 5px 17px rgba(15, 23, 42, .045);
}

.quick-link::after {
    content: "";
    position: absolute;
    left: 0;
    bottom: 0;
    width: 0;
    height: 3px;
    background: linear-gradient(90deg, #4f46e5, #06b6d4);
    transition: width .3s ease;
}

.quick-link:hover {
    transform: translateY(-5px);
    border-color: #c7d2fe;
    box-shadow: 0 12px 25px rgba(79, 70, 229, .11);
    color: #172033;
}

.quick-link:hover::after {
    width: 100%;
}

.quick-link i {
    display: grid;
    place-items: center;
    width: 48px;
    height: 48px;
    flex-shrink: 0;
    border-radius: 14px;
    font-size: 21px;
    transition: transform .25s ease;
}

.quick-link:hover i {
    transform: scale(1.1) rotate(-4deg);
}

/* Individual shortcut colors */

.quick-link:nth-child(1) i {
    background: #dbeafe;
    color: #2563eb;
}

.quick-link:nth-child(2) i {
    background: #d1fae5;
    color: #059669;
}

.quick-link:nth-child(3) i {
    background: #ede9fe;
    color: #7c3aed;
}

.quick-link:nth-child(4) i {
    background: #ffedd5;
    color: #ea580c;
}

.quick-link:nth-child(5) i {
    background: #fce7f3;
    color: #db2777;
}

.quick-link:nth-child(6) i {
    background: #cffafe;
    color: #0891b2;
}

.quick-link strong {
    display: block;
    font-size: 13px;
    font-weight: 800;
    color: #172554;
    margin-bottom: 6px;
}

.quick-link small {
    display: block;
    color: #64748b;
    font-size: 11px;
    line-height: 1.6;
}

/* ================================
   RESPONSIVE
================================ */

@media (max-width: 1100px) {
    .stats {
        grid-template-columns: repeat(2, minmax(0, 1fr));
    }

    .quick-grid {
        grid-template-columns: repeat(2, minmax(0, 1fr));
    }
}

@media (max-width: 700px) {
    .stats,
    .quick-grid {
        grid-template-columns: 1fr;
    }

    .welcome {
        padding: 25px 22px;
        border-radius: 17px;
    }

    .welcome h2 {
        font-size: 21px;
    }

    .stat-card {
        min-height: 155px;
    }

    .quick-link {
        padding: 17px;
    }
}

@media (max-width: 420px) {
    .welcome h2 {
        font-size: 19px;
    }

    .stat-card h3 {
        font-size: 27px;
    }
}
</style>
@endpush

@section('content')

    {{-- Welcome Banner --}}
    <section class="welcome">
        <h2>Welcome back, {{ auth('admin')->user()->name }} 👋</h2>
        <p>
            Here is your administration overview. Manage users, products,
            technicians and repair services from one place.
        </p>
    </section>

    {{-- System Overview --}}
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

    {{-- Management Shortcuts --}}
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
        <a href="{{ route('admin.products.index') }}" class="quick-link">
            <i class="bi bi-box-seam"></i>
            <div>
                <strong>Product Management</strong>
                <small>View and manage products</small>
            </div>
        </a>

        {{-- Technician Management --}}
        <a href="{{ route('admin.technicians.index') }}" class="quick-link">
            <i class="bi bi-person-gear"></i>
            <div>
                <strong>Technician Management</strong>
                <small>Add, edit and verify technicians</small>
            </div>
        </a>

        {{-- Repair Requests --}}
        <a href="{{ route('admin.repairs.index') }}" class="quick-link">
            <i class="bi bi-wrench-adjustable-circle"></i>
            <div>
                <strong>Repair Requests</strong>
                <small>Review and update repair service requests</small>
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

@endsection
