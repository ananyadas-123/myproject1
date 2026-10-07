@extends('layouts.app')

@section('title', 'Dashboard - ProductLife')

@section('page_title', 'Dashboard')

@section(
    'page_subtitle',
    'Manage your complete product lifecycle from one place.'
)

@section('content')


<!-- =====================================================
     WELCOME
====================================================== -->
<div class="welcome-card">

    <div class="welcome-content">

        <span class="welcome-label">
            <i class="bi bi-stars"></i>
            Welcome to ProductLife
        </span>

        <h2>
            Hello, {{ Auth::user()->name }} 👋
        </h2>

        <p>
            Manage your products, warranty, maintenance and repair
            journey from one simple dashboard.
        </p>

        <a href="{{ route('products.index') }}" class="welcome-btn">
            <i class="bi bi-box-seam"></i>
            View My Products
        </a>

    </div>

</div>


<!-- =====================================================
     STATISTICS
====================================================== -->

<div class="stats-grid">


    <!-- PRODUCTS -->

    <div class="stat-card">

        <div class="stat-top">

            <div class="stat-icon green">

                <i class="bi bi-box-seam"></i>

            </div>

        </div>

        <div class="stat-label">
            TOTAL PRODUCTS
        </div>

        <div class="stat-number">

            {{
                \App\Models\Product::where(
                    'user_id',
                    Auth::id()
                )->count()
            }}

        </div>

    </div>


    <!-- WARRANTY -->

    <div class="stat-card">

        <div class="stat-top">

            <div class="stat-icon blue">

                <i class="bi bi-shield-check"></i>

            </div>

        </div>

        <div class="stat-label">
            ACTIVE WARRANTIES
        </div>

        <div class="stat-number">
            0
        </div>

    </div>


    <!-- REPAIR -->

    <div class="stat-card">

        <div class="stat-top">

            <div class="stat-icon orange">

                <i class="bi bi-tools"></i>

            </div>

        </div>

        <div class="stat-label">
            REPAIR REQUESTS
        </div>

        <div class="stat-number">
            0
        </div>

    </div>


    <!-- MAINTENANCE -->

    <div class="stat-card">

        <div class="stat-top">

            <div class="stat-icon purple">

                <i class="bi bi-calendar2-check"></i>

            </div>

        </div>

        <div class="stat-label">
            MAINTENANCE DUE
        </div>

        <div class="stat-number">
            0
        </div>

    </div>

</div>


<!-- =====================================================
     MAIN GRID
====================================================== -->

<div class="content-grid">


    <!-- =================================================
         RECENT PRODUCTS
    ================================================== -->

    <div class="panel">

        <div class="panel-header">

            <div>

                <h3 class="panel-title">
                    Recent Products
                </h3>

                <p class="panel-subtitle">
                    Your latest registered products
                </p>

            </div>


            <a
                href="{{ route('products.index') }}"
                class="panel-link">

                View All

                <i class="bi bi-arrow-right"></i>

            </a>

        </div>


        @php

            $recentProducts =
                \App\Models\Product::where(
                    'user_id',
                    Auth::id()
                )
                ->latest()
                ->take(3)
                ->get();

        @endphp


        @forelse($recentProducts as $product)


            <div class="product-item">


                <!-- IMAGE -->

                @if($product->image)

                    <img
                        src="{{ asset('storage/' . $product->image) }}"
                        class="product-img"
                        alt="{{ $product->brand }}">

                @else

                    <div class="product-img">

                        <i class="bi bi-box-seam"></i>

                    </div>

                @endif


                <!-- INFO -->

                <div class="product-info">

                    <a
                        href="{{ route('products.lifecycle', $product->id) }}"
                        class="product-name product-name-link"
                    >
                        {{ $product->brand }}
                        {{ $product->model }}
                    </a>

                    <div class="product-meta">

                        {{ $product->category }}

                        <span>•</span>

                        {{ $product->serial_number }}

                    </div>

                </div>


                <!-- STATUS -->

                <span class="status">

                    {{ ucfirst($product->status) }}

                </span>

            </div>


        @empty


            <div class="empty-state">

                <div class="empty-icon">

                    <i class="bi bi-box-seam"></i>

                </div>

                <h4>
                    No products yet
                </h4>

                <p>
                    Register your first product to start
                    tracking its lifecycle.
                </p>

                <a
                    href="{{ route('products.create') }}"
                    class="btn-productlife">

                    <i class="bi bi-plus-lg"></i>

                    Add Product

                </a>

            </div>


        @endforelse


        <!-- QUICK ACTIONS -->

        <div class="quick-actions">

            <div class="panel-header mb-3">

                <div>

                    <h3 class="panel-title">
                        Quick Actions
                    </h3>

                </div>

            </div>


            <div class="actions-grid">


                <a
                    href="{{ route('products.create') }}"
                    class="action">

                    <i class="bi bi-plus-circle"></i>

                    <span>
                        Add Product
                    </span>

                </a>


                <a
                    href="{{ route('products.index') }}"
                    class="action">

                    <i class="bi bi-box"></i>

                    <span>
                        My Products
                    </span>

                </a>


                <a
                    href="{{ route('products.index') }}"
                    class="action">

                    <i class="bi bi-tools"></i>

                    <span>
                        Request Repair
                    </span>

                </a>

            </div>

        </div>

    </div>


    <!-- =================================================
         ACTIVITY
    ================================================== -->

    <div class="panel">

        <div class="panel-header">

            <div>

                <h3 class="panel-title">
                    Recent Activity
                </h3>

                <p class="panel-subtitle">
                    Your product lifecycle activity
                </p>

            </div>

            <i
                class="bi bi-three-dots"
                style="color:#98a2b3;font-size:20px;">
            </i>

        </div>


        <!-- ACTIVITY 1 -->

        <div class="activity">

            <div class="activity-icon">

                <i class="bi bi-person-check"></i>

            </div>

            <div>

                <div class="activity-title">
                    Welcome to ProductLife
                </div>

                <div class="activity-time">
                    Your account is ready to use
                </div>

            </div>

        </div>


        <!-- ACTIVITY 2 -->

        <div class="activity">

            <div class="activity-icon">

                <i class="bi bi-box-seam"></i>

            </div>

            <div>

                <div class="activity-title">
                    Product lifecycle starts here
                </div>

                <div class="activity-time">
                    Register your first product
                </div>

            </div>

        </div>


        <!-- ACTIVITY 3 -->

        <div class="activity">

            <div class="activity-icon">

                <i class="bi bi-shield-check"></i>

            </div>

            <div>

                <div class="activity-title">
                    Track your warranty
                </div>

                <div class="activity-time">
                    Keep warranty information organized
                </div>

            </div>

        </div>


        <!-- ACTIVITY 4 -->

        <div class="activity">

            <div class="activity-icon">

                <i class="bi bi-arrow-repeat"></i>

            </div>

            <div>

                <div class="activity-title">
                    Extend product life
                </div>

                <div class="activity-time">
                    Maintain, repair and reuse products
                </div>

            </div>

        </div>


        <!-- LIFECYCLE -->

        <div class="lifecycle-mini">

            <div class="lifecycle-title">
                Product Lifecycle
            </div>

            <div class="lifecycle-steps">

                <span>
                    <i class="bi bi-cart-check"></i>
                    Purchase
                </span>

                <i class="bi bi-arrow-right"></i>

                <span>
                    <i class="bi bi-shield-check"></i>
                    Warranty
                </span>

                <i class="bi bi-arrow-right"></i>

                <span>
                    <i class="bi bi-tools"></i>
                    Repair
                </span>

                <i class="bi bi-arrow-right"></i>

                <span>
                    <i class="bi bi-recycle"></i>
                    Reuse
                </span>

            </div>

        </div>

    </div>

</div>


@endsection


@push('styles')

<style>

    /* =====================================================
       DASHBOARD
    ===================================================== */
   .welcome-card {
    position: relative;
    overflow: hidden;
    min-height: 250px;
    border-radius: 24px;
    padding: 38px;
    display: flex;
    align-items: center;

    background-image:
        linear-gradient(
            90deg,
            rgba(8, 32, 27, 0.94) 0%,
            rgba(8, 32, 27, 0.82) 42%,
            rgba(8, 32, 27, 0.30) 100%
        ),
        url("{{ asset('images/product-lifecycle-bg.png') }}");

    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;

    color: #fff;

    box-shadow:
        0 18px 45px rgba(0, 0, 0, 0.12);
}

.welcome-content {
    position: relative;
    z-index: 2;
    max-width: 650px;
}

.welcome-label {
    display: inline-flex;
    align-items: center;
    gap: 7px;

    margin-bottom: 12px;

    color: #bbf7d0;

    font-size: 13px;
    font-weight: 700;
}

.welcome-card h2 {
    margin: 0 0 10px;

    color: #ffffff;

    font-size: 32px;
    font-weight: 800;
    line-height: 1.2;
}

.welcome-card p {
    max-width: 600px;

    margin: 0 0 22px;

    color: rgba(255,255,255,0.88);

    font-size: 16px;
    line-height: 1.7;
}

.welcome-btn {
    display: inline-flex;
    align-items: center;
    gap: 8px;

    padding: 12px 20px;

    border-radius: 12px;

    background: #ffffff;
    color: #176b4d;

    font-size: 14px;
    font-weight: 700;

    text-decoration: none;

    transition: .25s ease;
}

.welcome-btn:hover {
    transform: translateY(-2px);

    color: #0f5138;

    box-shadow:
        0 8px 20px rgba(0,0,0,.15);
}

    .dashboard-btn {

        display: inline-flex;

        align-items: center;

        gap: 8px;

        margin-top: 20px;

        padding: 11px 18px;

        border-radius: 11px;

        background: white;

        color: #17633e;

        font-size: 13px;

        font-weight: 800;

        transition: .2s ease;
    }

    .dashboard-btn:hover {

        color: #17633e;

        transform: translateY(-2px);

        box-shadow:
            0 8px 20px rgba(0,0,0,.12);
    }


    /* =====================================================
       STATS
    ===================================================== */

    .stats-grid {

        display: grid;

        grid-template-columns:
            repeat(4, minmax(0, 1fr));

        gap: 17px;

        margin-bottom: 26px;
    }

    .stat-card {

        background:
            rgba(255,255,255,.94);

        border: 1px solid #e8edf3;

        border-radius: 18px;

        padding: 22px;

        transition: .2s ease;
    }

    .stat-card:hover {

        transform: translateY(-4px);

        box-shadow:
            0 14px 30px rgba(16,24,40,.07);
    }

    .stat-top {

        display: flex;

        justify-content: space-between;

        align-items: center;
    }

    .stat-icon {

        width: 46px;
        height: 46px;

        border-radius: 13px;

        display: flex;

        align-items: center;

        justify-content: center;

        font-size: 19px;
    }

    .green {

        background: #ecfdf3;

        color: #16a34a;
    }

    .blue {

        background: #eff6ff;

        color: #2563eb;
    }

    .orange {

        background: #fff7ed;

        color: #ea580c;
    }

    .purple {

        background: #faf5ff;

        color: #9333ea;
    }

    .stat-label {

        margin-top: 16px;

        color: #7a8595;

        font-size: 11px;

        font-weight: 800;

        letter-spacing: .5px;
    }

    .stat-number {

        margin-top: 3px;

        font-size: 29px;

        line-height: 1.2;

        font-weight: 800;

        color: #172033;
    }


    /* =====================================================
       CONTENT GRID
    ===================================================== */

    .content-grid {

        display: grid;

        grid-template-columns:
            minmax(0, 1.35fr)
            minmax(360px, 1fr);

        gap: 22px;
    }

    .panel {

        background:
            rgba(255,255,255,.94);

        border: 1px solid #e8edf3;

        border-radius: 20px;

        padding: 24px;

        box-shadow:
            0 10px 30px rgba(15,23,42,.04);
    }

    .panel-header {

        display: flex;

        align-items: center;

        justify-content: space-between;

        gap: 15px;

        margin-bottom: 20px;
    }

    .panel-title {

        margin: 0;

        font-size: 17px;

        font-weight: 800;

        color: #172033;
    }

    .panel-subtitle {

        margin: 4px 0 0;

        color: #98a2b3;

        font-size: 11px;

        font-weight: 500;
    }

    .panel-link {

        display: inline-flex;

        align-items: center;

        gap: 5px;

        color: #16a34a;

        font-size: 12px;

        font-weight: 800;
    }

    .panel-link:hover {

        color: #15803d;
    }


    /* =====================================================
       PRODUCTS
    ===================================================== */

    .product-item {

        display: flex;

        align-items: center;

        gap: 14px;

        padding: 13px;

        border: 1px solid #edf0f4;

        border-radius: 15px;

        margin-bottom: 11px;

        transition: .2s ease;
    }

    .product-item:hover {

        border-color: #d5e8db;

        background: #fbfffc;

        transform: translateY(-1px);
    }

    .product-img {

        width: 62px;
        height: 62px;

        border-radius: 13px;

        background: #f4f7f8;

        object-fit: cover;

        display: flex;

        align-items: center;

        justify-content: center;

        color: #98a2b3;

        font-size: 22px;

        flex-shrink: 0;
    }

    .product-info {

        flex: 1;

        min-width: 0;
    }

    .product-name {

        font-size: 14px;

        font-weight: 800;

        color: #344054;

        margin-bottom: 4px;
    }

    .product-name-link {
        display: block;
        text-decoration: none;
        transition: .2s ease;
    }

    .product-name-link:hover {
        color: #16a34a;
    }

    .product-meta {

        color: #8a94a3;

        font-size: 11px;

        font-weight: 500;

        white-space: nowrap;

        overflow: hidden;

        text-overflow: ellipsis;
    }

    .product-meta span {

        margin: 0 4px;

        color: #c1c7d0;
    }

    .status {

        padding: 6px 10px;

        border-radius: 20px;

        background: #ecfdf3;

        color: #15803d;

        font-size: 10px;

        font-weight: 800;

        white-space: nowrap;
    }


    /* =====================================================
       EMPTY STATE
    ===================================================== */

    .empty-state {

        text-align: center;

        padding: 28px 15px 32px;
    }

    .empty-icon {

        width: 62px;
        height: 62px;

        margin: auto;

        display: flex;

        align-items: center;

        justify-content: center;

        border-radius: 18px;

        background: #f1f5f9;

        color: #94a3b8;

        font-size: 25px;
    }

    .empty-state h4 {

        margin: 14px 0 5px;

        font-size: 15px;

        font-weight: 800;
    }

    .empty-state p {

        margin: 0 auto 18px;

        max-width: 300px;

        color: #98a2b3;

        font-size: 12px;
    }


    /* =====================================================
       QUICK ACTIONS
    ===================================================== */

    .quick-actions {

        margin-top: 27px;

        padding-top: 22px;

        border-top: 1px solid #edf0f4;
    }

    .actions-grid {

        display: grid;

        grid-template-columns:
            repeat(3, minmax(0,1fr));

        gap: 11px;
    }

    .action {

        padding: 16px 10px;

        border: 1px solid #edf0f4;

        border-radius: 14px;

        text-decoration: none;

        color: #344054;

        text-align: center;

        transition: .2s ease;
    }

    .action:hover {

        border-color: #bbf7d0;

        background: #f0fdf4;

        color: #15803d;

        transform: translateY(-2px);
    }

    .action i {

        display: block;

        font-size: 21px;

        margin-bottom: 7px;
    }

    .action span {

        font-size: 11px;

        font-weight: 800;
    }


    /* =====================================================
       ACTIVITY
    ===================================================== */

    .activity {

        display: flex;

        gap: 13px;

        padding-bottom: 17px;

        margin-bottom: 17px;

        border-bottom: 1px solid #eef1f4;
    }

    .activity:last-of-type {

        margin-bottom: 0;

    }

    .activity-icon {

        width: 39px;
        height: 39px;

        border-radius: 11px;

        display: flex;

        align-items: center;

        justify-content: center;

        flex-shrink: 0;

        background: #ecfdf3;

        color: #16a34a;

        font-size: 16px;
    }

    .activity-title {

        font-size: 12px;

        font-weight: 800;

        color: #344054;

        margin-bottom: 3px;
    }

    .activity-time {

        font-size: 10px;

        color: #9aa3af;

        line-height: 1.5;
    }


    /* =====================================================
       LIFECYCLE MINI
    ===================================================== */

    .lifecycle-mini {

        margin-top: 24px;

        padding: 18px;

        border-radius: 15px;

        background:
            linear-gradient(
                135deg,
                #f0fdf4,
                #eff6ff
            );

        border: 1px solid #e2eee7;
    }

    .lifecycle-title {

        font-size: 12px;

        font-weight: 800;

        color: #344054;

        margin-bottom: 13px;
    }

    .lifecycle-steps {

        display: flex;

        align-items: center;

        flex-wrap: wrap;

        gap: 8px;

        color: #64748b;

        font-size: 10px;

        font-weight: 700;
    }

    .lifecycle-steps span {

        display: inline-flex;

        align-items: center;

        gap: 5px;

        padding: 6px 8px;

        border-radius: 8px;

        background: white;
    }

    .lifecycle-steps span i {

        color: #16a34a;

        font-size: 13px;
    }

    .lifecycle-steps > i {

        color: #94a3b8;

        font-size: 11px;
    }


    /* =====================================================
       RESPONSIVE
    ===================================================== */

    @media(max-width: 1200px) {

        .stats-grid {

            grid-template-columns:
                repeat(2, minmax(0,1fr));
        }

        .content-grid {

            grid-template-columns: 1fr;
        }
    }

    @media(max-width: 700px) {

        .stats-grid {

            grid-template-columns: 1fr;
        }

        .welcome-card {

            padding: 27px;
        }

        .welcome-title {

            font-size: 25px;
        }

        .content-grid {

            display: block;
        }

        .panel {

            margin-bottom: 18px;
        }

        .actions-grid {

            grid-template-columns:
                repeat(2, minmax(0,1fr));
        }
    }

    @media(max-width: 450px) {

        .product-item {

            align-items: flex-start;

        }

        .status {

            display: none;
        }

        .lifecycle-steps {

            flex-direction: column;

            align-items: flex-start;
        }

        .lifecycle-steps > i {

            display: none;
        }
    }

</style>

@endpush