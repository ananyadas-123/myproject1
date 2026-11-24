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
/* ==========================================
   PRODUCTLIFE - PREMIUM DASHBOARD
========================================== */

:root {
    --pl-green: #059669;
    --pl-dark: #064e3b;
    --pl-text: #172b25;
    --pl-muted: #84928c;
    --pl-border: #e7eee9;
    --pl-shadow:
        0 12px 30px rgba(16, 40, 29, .08),
        0 3px 8px rgba(16, 40, 29, .04);
    --pl-shadow-hover:
        0 22px 48px rgba(16, 40, 29, .13),
        0 8px 18px rgba(5, 150, 105, .09);
}

/* Dashboard background */
body {
    background: #f4f8f5;
}

/* ==========================================
   WELCOME BANNER
========================================== */

.welcome-card {
    position: relative;
    isolation: isolate;
    overflow: hidden;
    min-height: 270px;
    padding: 42px;
    margin-bottom: 28px;
    border: 1px solid rgba(255,255,255,.2);
    border-radius: 26px;

    background-image:
        linear-gradient(
            110deg,
            rgba(3, 35, 25, .96) 0%,
            rgba(5, 78, 55, .88) 48%,
            rgba(5, 100, 65, .48) 100%
        ),
        url("{{ asset('images/product-lifecycle-bg.png') }}");

    background-size: cover;
    background-position: center;
    color: #fff;

    box-shadow:
        0 24px 55px rgba(4, 78, 55, .24),
        0 8px 20px rgba(4, 78, 55, .12);
    transition: .35s ease;
}

.welcome-card::before {
    content: "";
    position: absolute;
    z-index: -1;
    width: 300px;
    height: 300px;
    right: -75px;
    top: -130px;
    border-radius: 50%;
    background: rgba(110, 231, 183, .15);
    filter: blur(5px);
}

.welcome-card::after {
    content: "";
    position: absolute;
    z-index: -1;
    width: 220px;
    height: 220px;
    right: 120px;
    bottom: -170px;
    border-radius: 50%;
    background: rgba(255,255,255,.10);
    filter: blur(8px);
}

.welcome-card:hover {
    box-shadow:
        0 30px 65px rgba(4, 78, 55, .29),
        0 10px 25px rgba(4, 78, 55, .15);
    transform: translateY(-3px);
}

.welcome-content {
    position: relative;
    z-index: 2;
    max-width: 650px;
}

.welcome-label {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 8px 14px;
    margin-bottom: 17px;
    border: 1px solid rgba(255,255,255,.2);
    border-radius: 30px;
    background: rgba(255,255,255,.12);
    color: #bbf7d0;
    font-size: 12px;
    font-weight: 700;
    backdrop-filter: blur(10px);
}

.welcome-card h2 {
    margin: 0 0 12px;
    color: #fff;
    font-size: 34px;
    font-weight: 800;
    letter-spacing: -.8px;
    line-height: 1.2;
}

.welcome-card p {
    max-width: 570px;
    margin: 0 0 25px;
    color: rgba(255,255,255,.86);
    font-size: 15px;
    line-height: 1.8;
}

.welcome-btn {
    display: inline-flex;
    align-items: center;
    gap: 9px;
    padding: 13px 21px;
    border: 1px solid rgba(255,255,255,.7);
    border-radius: 13px;
    background: linear-gradient(135deg, #fff, #e9fff2);
    color: #08734d;
    font-size: 13px;
    font-weight: 800;
    text-decoration: none;
    box-shadow: 0 8px 22px rgba(0,0,0,.15);
    transition: .3s ease;
}

.welcome-btn:hover {
    transform: translateY(-4px);
    color: #064e3b;
    box-shadow: 0 14px 28px rgba(0,0,0,.22);
}

/* ==========================================
   STATISTICS CARDS
========================================== */

.stats-grid {
    display: grid;
    grid-template-columns: repeat(4, minmax(0, 1fr));
    gap: 20px;
    margin-bottom: 28px;
}

.stat-card {
    position: relative;
    overflow: hidden;
    padding: 24px;
    border: 1px solid #e7eee9;
    border-radius: 21px;
    background: linear-gradient(145deg, #fff 0%, #fafffc 100%);
    box-shadow: var(--pl-shadow);
    transition: transform .3s ease, box-shadow .3s ease, border-color .3s ease;
}

.stat-card::before {
    content: "";
    position: absolute;
    top: 0;
    left: 22px;
    right: 22px;
    height: 3px;
    border-radius: 0 0 8px 8px;
    background: linear-gradient(90deg, #059669, #6ee7b7);
    opacity: .75;
}

.stat-card::after {
    content: "";
    position: absolute;
    width: 110px;
    height: 110px;
    right: -48px;
    bottom: -55px;
    border-radius: 50%;
    background: rgba(16, 185, 129, .045);
    pointer-events: none;
}

.stat-card:hover {
    transform: translateY(-8px);
    border-color: #b7e8ce;
    box-shadow: var(--pl-shadow-hover);
}

.stat-top {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.stat-icon {
    width: 51px;
    height: 51px;
    border-radius: 16px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 21px;
    box-shadow: 0 7px 16px rgba(0,0,0,.06);
    transition: .3s ease;
}

.stat-card:hover .stat-icon {
    transform: rotate(-7deg) scale(1.08);
}

.green {
    background: linear-gradient(135deg, #dcfce7, #bbf7d0);
    color: #15803d;
}

.blue {
    background: linear-gradient(135deg, #dbeafe, #bfdbfe);
    color: #2563eb;
}

.orange {
    background: linear-gradient(135deg, #ffedd5, #fed7aa);
    color: #ea580c;
}

.purple {
    background: linear-gradient(135deg, #f3e8ff, #e9d5ff);
    color: #9333ea;
}

.stat-label {
    margin-top: 19px;
    color: #829087;
    font-size: 11px;
    font-weight: 800;
    letter-spacing: .8px;
}

.stat-number {
    margin-top: 5px;
    color: #153c2c;
    font-size: 34px;
    font-weight: 850;
    line-height: 1.2;
    letter-spacing: -1px;
}

/* ==========================================
   MAIN CONTENT GRID
========================================== */

.content-grid {
    display: grid;
    grid-template-columns: minmax(0, 1.35fr) minmax(0, 1fr);
    gap: 24px;
    align-items: start;
}

.panel {
    min-width: 0;
    padding: 26px;
    border: 1px solid #e6eee8;
    border-radius: 23px;
    background: #fff;
    box-shadow:
        0 14px 35px rgba(16, 40, 29, .075),
        0 3px 10px rgba(16, 40, 29, .035);
    transition: box-shadow .3s ease, transform .3s ease;
}

.panel:hover {
    box-shadow:
        0 20px 45px rgba(16, 40, 29, .10),
        0 6px 16px rgba(5, 150, 105, .06);
}

.panel-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 15px;
    margin-bottom: 22px;
}

.panel-title {
    margin: 0;
    color: #163b2c;
    font-size: 18px;
    font-weight: 800;
    letter-spacing: -.35px;
}

.panel-subtitle {
    margin: 6px 0 0;
    color: #95a29a;
    font-size: 12px;
}

.panel-link {
    display: inline-flex;
    align-items: center;
    gap: 7px;
    padding: 8px 12px;
    border-radius: 10px;
    background: #effaf3;
    color: #07804f;
    font-size: 12px;
    font-weight: 800;
    text-decoration: none;
    transition: .25s ease;
}

.panel-link:hover {
    background: #d9f8e5;
    color: #065f46;
    transform: translateX(3px);
}

/* ==========================================
   PRODUCT ITEMS
========================================== */

.product-item {
    display: flex;
    align-items: center;
    gap: 15px;
    padding: 15px;
    margin-bottom: 13px;
    border: 1px solid #edf2ee;
    border-radius: 17px;
    background: linear-gradient(135deg, #fff, #fbfefc);
    box-shadow: 0 4px 12px rgba(16,40,29,.035);
    transition: .3s ease;
}

.product-item:hover {
    transform: translateY(-4px);
    border-color: #b9e9cc;
    background: #fff;
    box-shadow:
        0 13px 26px rgba(5,150,105,.10),
        0 4px 10px rgba(16,40,29,.04);
}

.product-img {
    width: 65px;
    height: 65px;
    flex-shrink: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    border: 1px solid #e6f1e9;
    border-radius: 15px;
    background: linear-gradient(145deg, #f0fdf4, #e6f7ed);
    color: #15945e;
    font-size: 24px;
    object-fit: cover;
    box-shadow: 0 5px 13px rgba(5,150,105,.07);
}

.product-info {
    flex: 1;
    min-width: 0;
}

.product-name {
    margin-bottom: 5px;
    color: #243c30;
    font-size: 14px;
    font-weight: 800;
}

.product-name-link {
    display: block;
    text-decoration: none;
    transition: .2s ease;
}

.product-name-link:hover {
    color: #059669;
}

.product-meta {
    overflow: hidden;
    color: #8b9990;
    font-size: 11px;
    white-space: nowrap;
    text-overflow: ellipsis;
}

.product-meta span {
    margin: 0 5px;
    color: #c4d1c8;
}

.status {
    padding: 7px 12px;
    border: 1px solid #c9f0d7;
    border-radius: 30px;
    background: #edfff3;
    color: #138044;
    font-size: 10px;
    font-weight: 800;
    white-space: nowrap;
}

/* ==========================================
   EMPTY STATE
========================================== */

.empty-state {
    padding: 38px 15px;
    text-align: center;
}

.empty-icon {
    width: 70px;
    height: 70px;
    margin: auto;
    display: flex;
    align-items: center;
    justify-content: center;
    border: 1px solid #d9f1e1;
    border-radius: 22px;
    background: linear-gradient(145deg, #effdf4, #e2f8e9);
    color: #15945e;
    font-size: 28px;
    box-shadow: 0 8px 20px rgba(5,150,105,.09);
}

.empty-state h4 {
    margin: 16px 0 7px;
    color: #244335;
    font-size: 16px;
    font-weight: 800;
}

.empty-state p {
    max-width: 310px;
    margin: 0 auto 20px;
    color: #8b9990;
    font-size: 12px;
    line-height: 1.7;
}

.btn-productlife {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 11px 18px;
    border-radius: 11px;
    background: linear-gradient(135deg, #059669, #047857);
    color: #fff;
    font-size: 12px;
    font-weight: 800;
    text-decoration: none;
    box-shadow: 0 7px 17px rgba(5,150,105,.22);
    transition: .25s ease;
}

.btn-productlife:hover {
    color: #fff;
    transform: translateY(-3px);
    box-shadow: 0 12px 24px rgba(5,150,105,.3);
}

/* ==========================================
   QUICK ACTIONS
========================================== */

.quick-actions {
    margin-top: 30px;
    padding-top: 24px;
    border-top: 1px solid #edf2ee;
}

.actions-grid {
    display: grid;
    grid-template-columns: repeat(3, minmax(0,1fr));
    gap: 13px;
}

.action {
    position: relative;
    overflow: hidden;
    padding: 19px 10px;
    border: 1px solid #e6eee8;
    border-radius: 17px;
    background: linear-gradient(145deg, #fff, #f7fcf8);
    color: #345044;
    text-align: center;
    text-decoration: none;
    box-shadow: 0 5px 14px rgba(16,40,29,.045);
    transition: .3s ease;
}

.action:hover {
    transform: translateY(-6px);
    border-color: #a9e5c1;
    background: linear-gradient(145deg, #f0fff5, #e4f8eb);
    color: #08784d;
    box-shadow: 0 14px 28px rgba(5,150,105,.13);
}

.action i {
    display: block;
    margin-bottom: 10px;
    color: #0b9961;
    font-size: 25px;
    transition: .3s ease;
}

.action:hover i {
    transform: scale(1.13);
}

.action span {
    font-size: 11px;
    font-weight: 800;
}

/* ==========================================
   RECENT ACTIVITY
========================================== */

.activity {
    position: relative;
    display: flex;
    gap: 14px;
    padding: 4px 0 20px;
    margin-bottom: 17px;
    border-bottom: 1px solid #edf2ee;
}

.activity-icon {
    width: 43px;
    height: 43px;
    flex-shrink: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    border: 1px solid #d8f1e1;
    border-radius: 14px;
    background: linear-gradient(145deg, #effdf4, #ddf8e7);
    color: #0b9961;
    font-size: 18px;
    box-shadow: 0 5px 12px rgba(5,150,105,.07);
    transition: .25s ease;
}

.activity:hover .activity-icon {
    transform: scale(1.08) rotate(-5deg);
    box-shadow: 0 8px 18px rgba(5,150,105,.14);
}

.activity-title {
    margin-bottom: 5px;
    color: #294536;
    font-size: 13px;
    font-weight: 800;
}

.activity-time {
    color: #93a098;
    font-size: 11px;
    line-height: 1.6;
}

/* ==========================================
   LIFECYCLE MINI
========================================== */

.lifecycle-mini {
    position: relative;
    overflow: hidden;
    margin-top: 27px;
    padding: 21px;
    border: 1px solid #cfeedd;
    border-radius: 18px;
    background:
        radial-gradient(circle at top right, rgba(110,231,183,.23), transparent 45%),
        linear-gradient(135deg, #f0fdf4, #effaf7 55%, #f0f7ff);
    box-shadow: 0 8px 20px rgba(5,150,105,.065);
}

.lifecycle-title {
    margin-bottom: 15px;
    color: #174832;
    font-size: 13px;
    font-weight: 850;
}

.lifecycle-steps {
    display: flex;
    align-items: center;
    flex-wrap: wrap;
    gap: 8px;
    color: #668075;
    font-size: 10px;
    font-weight: 750;
}

.lifecycle-steps span {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    padding: 8px 10px;
    border: 1px solid rgba(255,255,255,.9);
    border-radius: 10px;
    background: rgba(255,255,255,.85);
    color: #365a47;
    box-shadow: 0 3px 8px rgba(16,40,29,.045);
}

.lifecycle-steps span i {
    color: #059669;
    font-size: 13px;
}

.lifecycle-steps > i {
    color: #8bb5a0;
    font-size: 11px;
}

/* ==========================================
   RESPONSIVE DESIGN
========================================== */

@media (max-width: 1200px) {
    .stats-grid {
        grid-template-columns: repeat(2, minmax(0,1fr));
    }

    .content-grid {
        grid-template-columns: 1fr;
    }
}

@media (max-width: 700px) {
    .welcome-card {
        min-height: 240px;
        padding: 27px;
        border-radius: 20px;
    }

    .welcome-card h2 {
        font-size: 26px;
    }

    .welcome-card p {
        font-size: 13px;
    }

    .stats-grid {
        gap: 13px;
    }

    .stat-card {
        padding: 19px;
        border-radius: 17px;
    }

    .panel {
        padding: 19px;
        margin-bottom: 18px;
        border-radius: 19px;
    }

    .actions-grid {
        grid-template-columns: repeat(2, minmax(0,1fr));
    }
}

@media (max-width: 450px) {
    .stats-grid {
        grid-template-columns: 1fr;
    }

    .product-item {
        align-items: flex-start;
        gap: 10px;
        padding: 12px;
    }

    .product-img {
        width: 52px;
        height: 52px;
    }

    .status {
        padding: 5px 8px;
        font-size: 9px;
    }

    .lifecycle-steps {
        align-items: flex-start;
    }

    .lifecycle-steps > i {
        display: none;
    }

    .lifecycle-steps span {
        margin: 2px;
    }
}

/* Accessibility */
.welcome-btn:focus-visible,
.panel-link:focus-visible,
.action:focus-visible,
.product-name-link:focus-visible {
    outline: 3px solid rgba(5,150,105,.35);
    outline-offset: 3px;
}

@media (prefers-reduced-motion: reduce) {
    .welcome-card,
    .stat-card,
    .panel,
    .product-item,
    .action,
    .activity-icon {
        transition: none !important;
    }
}


/* ==========================================
   EXTRA PREMIUM VISUAL ENHANCEMENTS
========================================== */

/* Premium dashboard spacing */
.content-grid {
    gap: 26px;
}

/* Elegant glowing stat cards */
.stat-card {
    isolation: isolate;
}

.stat-card:hover {
    box-shadow:
        0 25px 50px rgba(5, 150, 105, .15),
        0 10px 22px rgba(15, 23, 42, .08),
        inset 0 1px 0 #ffffff;
}

.stat-number {
    text-shadow: 0 2px 8px rgba(5, 150, 105, .08);
}

/* Premium panel border */
.panel {
    position: relative;
    overflow: hidden;
}

.panel::before {
    content: "";
    position: absolute;
    top: 0;
    left: 25px;
    right: 25px;
    height: 3px;
    border-radius: 0 0 10px 10px;
    background: linear-gradient(
        90deg,
        transparent,
        #10b981,
        #a7f3d0,
        transparent
    );
    opacity: .75;
}

/* Product card premium highlight */
.product-item {
    position: relative;
    overflow: hidden;
}

.product-item::before {
    content: "";
    position: absolute;
    left: 0;
    top: 15%;
    bottom: 15%;
    width: 3px;
    border-radius: 5px;
    background: #10b981;
    opacity: 0;
    transition: .3s ease;
}

.product-item:hover::before {
    opacity: 1;
}

.product-img {
    transition: .35s ease;
}

.product-item:hover .product-img {
    transform: scale(1.06);
    box-shadow: 0 10px 22px rgba(5, 150, 105, .17);
}

/* Quick action glow */
.action {
    min-height: 100px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
}

.action:hover {
    box-shadow:
        0 16px 30px rgba(5, 150, 105, .15),
        inset 0 1px 0 #ffffff;
}

/* Activity timeline effect */
.activity {
    padding-left: 5px;
}

.activity-icon {
    position: relative;
    z-index: 1;
}

.activity-title {
    transition: color .25s ease;
}

.activity:hover .activity-title {
    color: #059669;
}

/* Lifecycle premium glass */
.lifecycle-mini {
    backdrop-filter: blur(12px);
    box-shadow:
        0 12px 28px rgba(5, 150, 105, .09),
        inset 0 1px 0 rgba(255,255,255,.9);
}

.lifecycle-steps span {
    transition: .25s ease;
}

.lifecycle-steps span:hover {
    transform: translateY(-3px);
    box-shadow: 0 8px 18px rgba(5, 150, 105, .12);
}

/* Welcome button shine */
.welcome-btn {
    position: relative;
    overflow: hidden;
}

.welcome-btn::before {
    content: "";
    position: absolute;
    top: 0;
    left: -120%;
    width: 70%;
    height: 100%;
    transform: skewX(-25deg);
    background: rgba(255,255,255,.55);
    transition: .55s ease;
}

.welcome-btn:hover::before {
    left: 150%;
}

/* Better selection highlight */
::selection {
    background: #bbf7d0;
    color: #064e3b;
}

/* Smooth premium interaction */
.stat-card,
.panel,
.product-item,
.action,
.lifecycle-mini {
    will-change: transform;
}

/* Small screen shadow refinement */
@media (max-width: 700px) {
    .stat-card,
    .panel {
        box-shadow:
            0 9px 24px rgba(16, 40, 29, .075),
            0 2px 7px rgba(16, 40, 29, .035);
    }

    .panel::before {
        left: 18px;
        right: 18px;
    }
}


/* =========================================
   PRODUCTLIFE DASHBOARD - FINAL POLISH
   Keep existing HTML, images and icons
========================================= */

/* Main welcome section */
.welcome-card {
    border: 1px solid rgba(255, 255, 255, 0.18);
    box-shadow:
        0 24px 55px rgba(0, 75, 48, 0.20),
        0 8px 20px rgba(0, 0, 0, 0.08);
    transition: box-shadow 0.35s ease, transform 0.35s ease;
}

.welcome-card:hover {
    box-shadow: 0 30px 65px rgba(0, 75, 48, 0.26);
}

.welcome-label {
    backdrop-filter: blur(12px);
    -webkit-backdrop-filter: blur(12px);
    border: 1px solid rgba(255, 255, 255, 0.22);
    letter-spacing: 0.2px;
}

.welcome-btn {
    box-shadow: 0 8px 22px rgba(0, 0, 0, 0.12);
    transition: all 0.3s ease;
}

.welcome-btn:hover {
    transform: translateY(-3px);
    box-shadow: 0 12px 28px rgba(0, 0, 0, 0.20);
}

/* Statistics cards */
.stat-card {
    position: relative;
    overflow: hidden;
    border: 1px solid rgba(16, 185, 129, 0.10);
    box-shadow: 0 8px 25px rgba(15, 55, 40, 0.07);
    transition: all 0.3s ease;
}

.stat-card::after {
    content: "";
    position: absolute;
    width: 130px;
    height: 130px;
    right: -65px;
    bottom: -75px;
    border-radius: 50%;
    background: rgba(16, 185, 129, 0.045);
    transition: all 0.35s ease;
    pointer-events: none;
}

.stat-card:hover {
    transform: translateY(-7px);
    border-color: rgba(16, 185, 129, 0.28);
    box-shadow: 0 18px 35px rgba(15, 75, 50, 0.13);
}

.stat-card:hover::after {
    transform: scale(1.5);
}

.stat-icon {
    transition: transform 0.3s ease;
}

.stat-card:hover .stat-icon {
    transform: rotate(-7deg) scale(1.08);
}

.stat-number {
    letter-spacing: -1.5px;
    font-weight: 800;
}

/* Content panels */
.panel {
    border: 1px solid rgba(16, 185, 129, 0.10);
    box-shadow: 0 10px 30px rgba(20, 55, 40, 0.065);
    transition: box-shadow 0.3s ease;
}

.panel:hover {
    box-shadow: 0 16px 38px rgba(20, 55, 40, 0.10);
}

.panel-header {
    padding-bottom: 18px;
    border-bottom: 1px solid #edf3ef;
}

.panel-title {
    letter-spacing: -0.5px;
}

/* Product rows */
.product-item {
    border: 1px solid transparent;
    border-radius: 15px;
    padding: 12px;
    transition: all 0.25s ease;
}

.product-item:hover {
    background: #f5fbf7;
    border-color: #d9f1e3;
    transform: translateX(4px);
}

.product-img {
    border-radius: 13px;
    overflow: hidden;
}

.product-img img {
    transition: transform 0.35s ease;
}

.product-item:hover .product-img img {
    transform: scale(1.07);
}

.product-name-link {
    transition: color 0.2s ease;
}

.product-name-link:hover {
    color: #079447;
}

/* Status badges */
.status {
    border-radius: 30px;
    font-weight: 700;
    letter-spacing: 0.2px;
    padding: 5px 11px;
}

/* Quick action cards */
.action {
    border: 1px solid #e7f0ea;
    border-radius: 16px;
    transition: all 0.25s ease;
}

.action:hover {
    background: #f0fbf4;
    border-color: #a9e7c2;
    transform: translateY(-5px);
    box-shadow: 0 10px 22px rgba(16, 120, 65, 0.09);
}

/* Recent activity */
.activity {
    border-radius: 13px;
    padding: 12px;
    transition: background 0.25s ease;
}

.activity:hover {
    background: #f5faf7;
}

.activity-icon {
    transition: transform 0.25s ease;
}

.activity:hover .activity-icon {
    transform: scale(1.1);
}

/* Lifecycle section */
.lifecycle-mini {
    border: 1px solid #e5f1e9;
    border-radius: 17px;
    background: linear-gradient(135deg, #f7fcf8, #ffffff);
}

.lifecycle-steps {
    gap: 12px;
}

/* Buttons and links */
.panel-link {
    transition: all 0.25s ease;
}

.panel-link:hover {
    transform: translateX(3px);
}

/* Smooth focus */
a:focus-visible,
button:focus-visible {
    outline: 3px solid rgba(16, 185, 129, 0.35);
    outline-offset: 3px;
}

/* Responsive refinements */
@media (max-width: 768px) {
    .welcome-card {
        border-radius: 18px;
    }

    .stat-card:hover,
    .action:hover {
        transform: translateY(-3px);
    }

    .panel {
        border-radius: 17px;
    }

    .product-item:hover {
        transform: none;
    }
}

@media (prefers-reduced-motion: reduce) {
    .welcome-card,
    .welcome-btn,
    .stat-card,
    .stat-icon,
    .panel,
    .product-item,
    .action,
    .activity-icon {
        transition: none !important;
    }
}


/* =====================================
   PRODUCTLIFE - HIGH CONTRAST FIX
===================================== */

/* Main dashboard background */
body {
    color: #172b22 !important;
}

.stat-card,
.panel {
    background: #ffffff !important;
    border: 1px solid #d5e2d9 !important;
}

/* Dashboard headings */
.panel-title,
.product-name,
.product-name-link,
.activity-title,
.lifecycle-title {
    color: #173b2b !important;
    font-weight: 750 !important;
}

.panel-subtitle,
.product-meta,
.activity-time {
    color: #66766c !important;
}

/* Statistics cards */
.stat-card {
    box-shadow: 0 8px 22px rgba(15, 55, 35, 0.10) !important;
}

.stat-label {
    color: #52665a !important;
    font-weight: 750 !important;
    opacity: 1 !important;
}

.stat-number {
    color: #064e32 !important;
    font-size: 36px !important;
    font-weight: 850 !important;
}

/* Stat icons - stronger colors */
.stat-icon.green {
    background: #bbf7d0 !important;
    color: #04752f !important;
}

.stat-icon.blue {
    background: #bfdbfe !important;
    color: #0754c7 !important;
}

.stat-icon.orange {
    background: #fed7aa !important;
    color: #c2410c !important;
}

.stat-icon.purple {
    background: #e9d5ff !important;
    color: #7e22ce !important;
}

/* Product rows */
.product-item {
    background: #ffffff !important;
    border: 1px solid #e0e9e2 !important;
}

.product-item:hover {
    background: #ecfdf3 !important;
    border-color: #16a34a !important;
}

.product-name-link {
    color: #14532d !important;
}

.product-meta {
    color: #64756a !important;
}

/* Panel headers */
.panel-header {
    border-bottom: 1px solid #dce8df !important;
}

.panel-link {
    background: #dcfce7 !important;
    color: #08783d !important;
    font-weight: 800 !important;
}

/* Quick action cards */
.action {
    background: #ffffff !important;
    border: 1px solid #d7e5da !important;
    color: #17452e !important;
}

.action:hover {
    background: #dcfce7 !important;
    border-color: #16a34a !important;
}

/* Activity section */
.activity {
    background: #ffffff !important;
    border: 1px solid #edf2ee !important;
}

.activity:hover {
    background: #f0fdf4 !important;
}

/* Lifecycle */
.lifecycle-mini {
    background: #f0fdf4 !important;
    border: 1px solid #b7e4c7 !important;
}

/* Status visibility */
.status {
    font-weight: 800 !important;
    opacity: 1 !important;
}

/* Empty state */
.empty-state {
    color: #52665a !important;
}

.empty-icon {
    opacity: 1 !important;
}

/* Stronger hover */
.stat-card:hover,
.panel:hover {
    box-shadow: 0 14px 30px rgba(15, 70, 40, 0.15) !important;
}

</style>
@endpush
