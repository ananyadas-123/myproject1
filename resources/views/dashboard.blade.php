
@extends('layouts.app')

@section('title', 'Dashboard - ProductLife')

@section('page_title', 'Dashboard')

@section('page_subtitle', 'Manage your complete product lifecycle from one place.')

@section('content')

@php
    $user = Auth::user();

    $totalProducts = \App\Models\Product::where('user_id', Auth::id())->count();

    $recentProducts = \App\Models\Product::where('user_id', Auth::id())
        ->latest()
        ->take(3)
        ->get();
@endphp

<div class="pl-dashboard">

    {{-- WELCOME BANNER --}}
    <section class="welcome-card">
        <div class="welcome-decoration welcome-decoration-one"></div>
        <div class="welcome-decoration welcome-decoration-two"></div>
        <div class="welcome-decoration welcome-decoration-three"></div>

        <div class="welcome-content">
            <span class="welcome-label">
                <i class="bi bi-stars"></i>
                WELCOME TO PRODUCTLIFE
            </span>

            <h2>Hello, {{ $user->name }} 👋</h2>

            <p>
                Manage your products, warranty, maintenance and repair
                journey from one simple dashboard.
            </p>

            <a href="{{ route('products.index') }}" class="welcome-btn">
                <i class="bi bi-box-seam"></i>
                View My Products
                <i class="bi bi-arrow-right"></i>
            </a>
        </div>

        <div class="welcome-art">
            <div class="art-circle">
                <i class="bi bi-box-seam"></i>
            </div>
            <span class="art-badge art-badge-one">
                <i class="bi bi-shield-check"></i>
                Product Safety
            </span>
            <span class="art-badge art-badge-two">
                <i class="bi bi-arrow-repeat"></i>
                Lifecycle Care
            </span>
        </div>
    </section>


    {{-- STATISTICS --}}
    <section class="stats-grid">

        <div class="stat-card stat-green">
            <div class="stat-top">
                <div class="stat-icon">
                    <i class="bi bi-box-seam"></i>
                </div>
                <span class="stat-caption">MY INVENTORY</span>
            </div>
            <div class="stat-label">TOTAL PRODUCTS</div>
            <div class="stat-number">{{ $totalProducts }}</div>
            <div class="stat-footer">
                <i class="bi bi-check-circle-fill"></i>
                Registered products
            </div>
            <div class="stat-decoration"></div>
        </div>

        <div class="stat-card stat-blue">
            <div class="stat-top">
                <div class="stat-icon">
                    <i class="bi bi-shield-check"></i>
                </div>
                <span class="stat-caption">PROTECTION</span>
            </div>
            <div class="stat-label">ACTIVE WARRANTIES</div>
            <div class="stat-number">0</div>
            <div class="stat-footer">
                <i class="bi bi-shield-fill-check"></i>
                Warranty tracking
            </div>
            <div class="stat-decoration"></div>
        </div>

        <div class="stat-card stat-orange">
            <div class="stat-top">
                <div class="stat-icon">
                    <i class="bi bi-tools"></i>
                </div>
                <span class="stat-caption">SERVICE</span>
            </div>
            <div class="stat-label">REPAIR REQUESTS</div>
            <div class="stat-number">0</div>
            <div class="stat-footer">
                <i class="bi bi-wrench-adjustable"></i>
                Repair management
            </div>
            <div class="stat-decoration"></div>
        </div>

        <div class="stat-card stat-purple">
            <div class="stat-top">
                <div class="stat-icon">
                    <i class="bi bi-calendar2-check"></i>
                </div>
                <span class="stat-caption">CARE PLAN</span>
            </div>
            <div class="stat-label">MAINTENANCE DUE</div>
            <div class="stat-number">0</div>
            <div class="stat-footer">
                <i class="bi bi-calendar-check-fill"></i>
                Maintenance tracking
            </div>
            <div class="stat-decoration"></div>
        </div>

    </section>


    {{-- MAIN CONTENT --}}
    <section class="content-grid">

        {{-- LEFT PANEL --}}
        <div class="panel products-panel">

            <div class="panel-header">
                <div class="panel-heading">
                    <span class="section-icon section-icon-green">
                        <i class="bi bi-box-seam"></i>
                    </span>
                    <div>
                        <h3 class="panel-title">Recent Products</h3>
                        <p class="panel-subtitle">Your latest registered products</p>
                    </div>
                </div>

                <a href="{{ route('products.index') }}" class="panel-link">
                    View All
                    <i class="bi bi-arrow-up-right"></i>
                </a>
            </div>

            @forelse($recentProducts as $product)

                <div class="product-item">

                    @if($product->image)
                        <img
                            src="{{ asset('storage/' . $product->image) }}"
                            class="product-img"
                            alt="{{ $product->brand }}">
                    @else
                        <div class="product-img product-img-placeholder">
                            <i class="bi bi-box-seam"></i>
                        </div>
                    @endif

                    <div class="product-info">
                        <a
                            href="{{ route('products.lifecycle', $product->id) }}"
                            class="product-name product-name-link">
                            {{ $product->brand }}
                            {{ $product->model }}
                        </a>

                        <div class="product-meta">
                            <span>{{ $product->category }}</span>
                            <span class="meta-dot">•</span>
                            <span>SN: {{ $product->serial_number }}</span>
                        </div>
                    </div>

                    <span class="status">
                        {{ ucfirst($product->status) }}
                    </span>

                </div>

            @empty

                <div class="empty-state">
                    <div class="empty-icon">
                        <i class="bi bi-box-seam"></i>
                    </div>

                    <h4>No products yet</h4>

                    <p>
                        Register your first product to start
                        tracking its lifecycle.
                    </p>

                    <a href="{{ route('products.create') }}" class="btn-productlife">
                        <i class="bi bi-plus-lg"></i>
                        Add Your First Product
                    </a>
                </div>

            @endforelse


            {{-- QUICK ACTIONS --}}
            <div class="quick-actions">

                <div class="quick-heading">
                    <div>
                        <h3 class="panel-title">Quick Actions</h3>
                        <p class="panel-subtitle">Get things done faster</p>
                    </div>
                    <span class="quick-heading-icon">
                        <i class="bi bi-lightning-charge-fill"></i>
                    </span>
                </div>

                <div class="actions-grid">

                    <a href="{{ route('products.create') }}" class="action action-green">
                        <span class="action-icon">
                            <i class="bi bi-plus-circle"></i>
                        </span>
                        <span class="action-title">Add Product</span>
                        <span class="action-description">Register a new item</span>
                    </a>

                    <a href="{{ route('products.index') }}" class="action action-blue">
                        <span class="action-icon">
                            <i class="bi bi-collection"></i>
                        </span>
                        <span class="action-title">My Products</span>
                        <span class="action-description">Manage your items</span>
                    </a>

                    <a href="{{ route('products.index') }}" class="action action-orange">
                        <span class="action-icon">
                            <i class="bi bi-tools"></i>
                        </span>
                        <span class="action-title">Request Repair</span>
                        <span class="action-description">Get product support</span>
                    </a>

                </div>
            </div>

        </div>


        {{-- RIGHT PANEL --}}
        <div class="panel activity-panel">

            <div class="panel-header">
                <div class="panel-heading">
                    <span class="section-icon section-icon-purple">
                        <i class="bi bi-activity"></i>
                    </span>
                    <div>
                        <h3 class="panel-title">Recent Activity</h3>
                        <p class="panel-subtitle">Your product lifecycle activity</p>
                    </div>
                </div>

                <span class="activity-live">
                    <span></span>
                    OVERVIEW
                </span>
            </div>

            <div class="activity-list">

                <div class="activity">
                    <div class="activity-icon activity-green">
                        <i class="bi bi-person-check"></i>
                    </div>
                    <div class="activity-info">
                        <div class="activity-title">Welcome to ProductLife</div>
                        <div class="activity-time">Your account is ready to use</div>
                    </div>
                    <i class="bi bi-check-circle-fill activity-check"></i>
                </div>

                <div class="activity">
                    <div class="activity-icon activity-blue">
                        <i class="bi bi-box-seam"></i>
                    </div>
                    <div class="activity-info">
                        <div class="activity-title">Product lifecycle starts here</div>
                        <div class="activity-time">Register your first product</div>
                    </div>
                    <i class="bi bi-arrow-right activity-arrow"></i>
                </div>

                <div class="activity">
                    <div class="activity-icon activity-purple">
                        <i class="bi bi-shield-check"></i>
                    </div>
                    <div class="activity-info">
                        <div class="activity-title">Track your warranty</div>
                        <div class="activity-time">Keep warranty information organized</div>
                    </div>
                    <i class="bi bi-arrow-right activity-arrow"></i>
                </div>

                <div class="activity">
                    <div class="activity-icon activity-orange">
                        <i class="bi bi-arrow-repeat"></i>
                    </div>
                    <div class="activity-info">
                        <div class="activity-title">Extend product life</div>
                        <div class="activity-time">Maintain, repair and reuse products</div>
                    </div>
                    <i class="bi bi-arrow-right activity-arrow"></i>
                </div>

            </div>


            {{-- LIFECYCLE --}}
            <div class="lifecycle-mini">
                <div class="lifecycle-header">
                    <div>
                        <span class="lifecycle-overline">PRODUCT JOURNEY</span>
                        <h4 class="lifecycle-title">Product Lifecycle</h4>
                    </div>
                    <span class="lifecycle-main-icon">
                        <i class="bi bi-recycle"></i>
                    </span>
                </div>

                <div class="lifecycle-steps">

                    <div class="lifecycle-step">
                        <span class="step-icon step-purchase">
                            <i class="bi bi-cart-check"></i>
                        </span>
                        <span>Purchase</span>
                    </div>

                    <i class="bi bi-arrow-right step-arrow"></i>

                    <div class="lifecycle-step">
                        <span class="step-icon step-warranty">
                            <i class="bi bi-shield-check"></i>
                        </span>
                        <span>Warranty</span>
                    </div>

                    <i class="bi bi-arrow-right step-arrow"></i>

                    <div class="lifecycle-step">
                        <span class="step-icon step-repair">
                            <i class="bi bi-tools"></i>
                        </span>
                        <span>Repair</span>
                    </div>

                    <i class="bi bi-arrow-right step-arrow"></i>

                    <div class="lifecycle-step">
                        <span class="step-icon step-reuse">
                            <i class="bi bi-recycle"></i>
                        </span>
                        <span>Reuse</span>
                    </div>

                </div>
            </div>

        </div>

    </section>

</div>

@endsection


@push('styles')
<style>
/* =========================================
   PRODUCTLIFE - PREMIUM USER DASHBOARD
========================================= */

.pl-dashboard {
    --pl-text: #172554;
    --pl-muted: #64748b;
    --pl-border: #e2e8f0;
    --pl-purple: #7c3aed;
    --pl-blue: #2563eb;
    --pl-green: #059669;
    --pl-orange: #ea580c;

    padding-bottom: 35px;
    color: var(--pl-text);
}

.pl-dashboard * {
    box-sizing: border-box;
}

/* WELCOME BANNER */

.welcome-card {
    position: relative;
    isolation: isolate;
    display: flex;
    align-items: center;
    justify-content: space-between;
    overflow: hidden;
    min-height: 270px;
    padding: 38px 42px;
    margin-bottom: 26px;
    border: 1px solid rgba(255,255,255,.15);
    border-radius: 25px;
    background:
        linear-gradient(110deg, #111b46 0%, #3730a3 48%, #2563eb 100%);
    color: #fff;
    box-shadow: 0 20px 45px rgba(49, 46, 129, .23);
    transition: box-shadow .3s ease, transform .3s ease;
}

.welcome-card:hover {
    transform: translateY(-3px);
    box-shadow: 0 27px 55px rgba(49, 46, 129, .29);
}

.welcome-content {
    position: relative;
    z-index: 3;
    max-width: 620px;
}

.welcome-label {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 8px 14px;
    margin-bottom: 17px;
    border: 1px solid rgba(255,255,255,.25);
    border-radius: 30px;
    background: rgba(255,255,255,.13);
    color: #dbeafe;
    font-size: 11px;
    font-weight: 850;
    letter-spacing: 1px;
    backdrop-filter: blur(10px);
}

.welcome-label i {
    color: #fbbf24;
}

.welcome-card h2 {
    margin: 0 0 12px;
    color: #fff;
    font-size: clamp(26px, 3vw, 36px);
    font-weight: 850;
    letter-spacing: -.8px;
    line-height: 1.25;
}

.welcome-card p {
    max-width: 540px;
    margin: 0 0 24px;
    color: #e0e7ff;
    font-size: 14px;
    line-height: 1.8;
}

.welcome-btn {
    position: relative;
    display: inline-flex;
    align-items: center;
    gap: 10px;
    padding: 13px 19px;
    border: 1px solid rgba(255,255,255,.7);
    border-radius: 12px;
    background: #fff;
    color: #3730a3;
    font-size: 13px;
    font-weight: 850;
    text-decoration: none;
    box-shadow: 0 8px 20px rgba(0,0,0,.17);
    transition: .25s ease;
}

.welcome-btn:hover {
    transform: translateY(-3px);
    background: #eff6ff;
    color: #1d4ed8;
    box-shadow: 0 13px 26px rgba(0,0,0,.22);
}

.welcome-decoration {
    position: absolute;
    z-index: -1;
    border: 1px solid rgba(255,255,255,.12);
    border-radius: 50%;
    pointer-events: none;
}

.welcome-decoration-one {
    width: 350px;
    height: 350px;
    right: 100px;
    top: -220px;
    background: rgba(255,255,255,.055);
}

.welcome-decoration-two {
    width: 270px;
    height: 270px;
    right: -80px;
    bottom: -170px;
    background: rgba(129,140,248,.18);
}

.welcome-decoration-three {
    width: 160px;
    height: 160px;
    right: 32%;
    bottom: -120px;
    background: rgba(56,189,248,.13);
}

/* WELCOME ILLUSTRATION */

.welcome-art {
    position: relative;
    z-index: 2;
    width: 220px;
    height: 190px;
    flex-shrink: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-right: 30px;
}

.art-circle {
    width: 145px;
    height: 145px;
    display: flex;
    align-items: center;
    justify-content: center;
    border: 1px solid rgba(255,255,255,.3);
    border-radius: 40px;
    background: linear-gradient(145deg, rgba(255,255,255,.23), rgba(255,255,255,.07));
    color: #fff;
    font-size: 66px;
    transform: rotate(-8deg);
    box-shadow: 0 20px 45px rgba(0,0,0,.18);
    backdrop-filter: blur(12px);
}

.art-badge {
    position: absolute;
    display: inline-flex;
    align-items: center;
    gap: 7px;
    padding: 10px 12px;
    border: 1px solid rgba(255,255,255,.25);
    border-radius: 12px;
    background: rgba(15,23,42,.72);
    color: #fff;
    font-size: 10px;
    font-weight: 800;
    white-space: nowrap;
    box-shadow: 0 8px 20px rgba(0,0,0,.17);
    backdrop-filter: blur(10px);
}

.art-badge-one {
    top: 7px;
    right: -25px;
}

.art-badge-one i {
    color: #6ee7b7;
}

.art-badge-two {
    bottom: 8px;
    left: -28px;
}

.art-badge-two i {
    color: #fbbf24;
}

/* STATISTICS */

.stats-grid {
    display: grid;
    grid-template-columns: repeat(4, minmax(0, 1fr));
    gap: 19px;
    margin-bottom: 27px;
}

.stat-card {
    position: relative;
    isolation: isolate;
    overflow: hidden;
    min-width: 0;
    padding: 22px;
    border: 1px solid var(--pl-border);
    border-radius: 20px;
    background: #fff;
    box-shadow: 0 8px 23px rgba(15,23,42,.065);
    transition: transform .3s ease, box-shadow .3s ease;
}

.stat-card:hover {
    transform: translateY(-7px);
    box-shadow: 0 18px 35px rgba(15,23,42,.12);
}

.stat-card::before {
    content: "";
    position: absolute;
    z-index: -1;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
}

.stat-green::before {
    background: linear-gradient(90deg, #059669, #34d399);
}

.stat-blue::before {
    background: linear-gradient(90deg, #2563eb, #38bdf8);
}

.stat-orange::before {
    background: linear-gradient(90deg, #ea580c, #fb923c);
}

.stat-purple::before {
    background: linear-gradient(90deg, #7c3aed, #c084fc);
}

.stat-top {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 8px;
}

.stat-icon {
    width: 49px;
    height: 49px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 15px;
    font-size: 21px;
    transition: transform .3s ease;
}

.stat-card:hover .stat-icon {
    transform: rotate(-8deg) scale(1.08);
}

.stat-green .stat-icon {
    background: #d1fae5;
    color: #047857;
}

.stat-blue .stat-icon {
    background: #dbeafe;
    color: #1d4ed8;
}

.stat-orange .stat-icon {
    background: #ffedd5;
    color: #c2410c;
}

.stat-purple .stat-icon {
    background: #f3e8ff;
    color: #7e22ce;
}

.stat-caption {
    color: #64748b;
    font-size: 9px;
    font-weight: 850;
    letter-spacing: .7px;
}

.stat-label {
    margin-top: 18px;
    color: #475569;
    font-size: 10px;
    font-weight: 850;
    letter-spacing: .8px;
}

.stat-number {
    margin-top: 5px;
    color: #172554;
    font-size: 35px;
    font-weight: 900;
    line-height: 1.2;
    letter-spacing: -1.5px;
}

.stat-footer {
    display: flex;
    align-items: center;
    gap: 7px;
    margin-top: 11px;
    color: #64748b;
    font-size: 10px;
    font-weight: 700;
}

.stat-green .stat-footer i { color: #059669; }
.stat-blue .stat-footer i { color: #2563eb; }
.stat-orange .stat-footer i { color: #ea580c; }
.stat-purple .stat-footer i { color: #9333ea; }

.stat-decoration {
    position: absolute;
    z-index: -1;
    width: 115px;
    height: 115px;
    right: -55px;
    bottom: -62px;
    border-radius: 50%;
    background: rgba(99,102,241,.045);
}

/* MAIN GRID */

.content-grid {
    display: grid;
    grid-template-columns: minmax(0, 1.35fr) minmax(0, 1fr);
    gap: 23px;
    align-items: start;
}

.panel {
    min-width: 0;
    padding: 25px;
    border: 1px solid #e2e8f0;
    border-radius: 21px;
    background: #fff;
    box-shadow: 0 10px 28px rgba(15,23,42,.065);
    transition: box-shadow .3s ease;
}

.panel:hover {
    box-shadow: 0 16px 36px rgba(15,23,42,.095);
}

.panel-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 12px;
    padding-bottom: 19px;
    margin-bottom: 20px;
    border-bottom: 1px solid #e8edf4;
}

.panel-heading {
    display: flex;
    align-items: center;
    gap: 12px;
    min-width: 0;
}

.section-icon {
    width: 43px;
    height: 43px;
    flex-shrink: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 13px;
    font-size: 18px;
}

.section-icon-green {
    background: #d1fae5;
    color: #047857;
}

.section-icon-purple {
    background: #ede9fe;
    color: #6d28d9;
}

.panel-title {
    margin: 0;
    color: #172554;
    font-size: 16px;
    font-weight: 850;
    letter-spacing: -.3px;
}

.panel-subtitle {
    margin: 5px 0 0;
    color: #64748b;
    font-size: 11px;
    line-height: 1.5;
}

.panel-link {
    display: inline-flex;
    align-items: center;
    gap: 7px;
    flex-shrink: 0;
    padding: 9px 12px;
    border: 1px solid #bfdbfe;
    border-radius: 10px;
    background: #eff6ff;
    color: #1d4ed8;
    font-size: 11px;
    font-weight: 850;
    text-decoration: none;
    transition: .25s ease;
}

.panel-link:hover {
    background: #2563eb;
    border-color: #2563eb;
    color: #fff;
    transform: translateY(-2px);
}

/* PRODUCTS */

.product-item {
    display: flex;
    align-items: center;
    gap: 13px;
    min-width: 0;
    padding: 13px;
    margin-bottom: 12px;
    border: 1px solid #e2e8f0;
    border-radius: 15px;
    background: #fff;
    transition: .25s ease;
}

.product-item:hover {
    transform: translateX(4px);
    border-color: #86efac;
    background: #f0fdf4;
    box-shadow: 0 8px 18px rgba(5,150,105,.08);
}

.product-img {
    width: 58px;
    height: 58px;
    flex-shrink: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    border: 1px solid #e2e8f0;
    border-radius: 13px;
    background: #f8fafc;
    object-fit: cover;
    color: #2563eb;
    font-size: 23px;
}

.product-img-placeholder {
    background: #dbeafe;
    border-color: #bfdbfe;
    color: #1d4ed8;
}

.product-info {
    flex: 1;
    min-width: 0;
}

.product-name {
    display: block;
    overflow: hidden;
    margin-bottom: 6px;
    color: #172554;
    font-size: 13px;
    font-weight: 850;
    text-overflow: ellipsis;
    white-space: nowrap;
}

.product-name-link {
    text-decoration: none;
    transition: color .2s ease;
}

.product-name-link:hover {
    color: #2563eb;
}

.product-meta {
    display: flex;
    align-items: center;
    gap: 6px;
    overflow: hidden;
    color: #64748b;
    font-size: 10px;
    white-space: nowrap;
}

.product-meta span {
    overflow: hidden;
    text-overflow: ellipsis;
}

.meta-dot {
    flex-shrink: 0;
    color: #94a3b8;
}

.status {
    flex-shrink: 0;
    padding: 6px 10px;
    border: 1px solid #bbf7d0;
    border-radius: 30px;
    background: #dcfce7;
    color: #166534;
    font-size: 9px;
    font-weight: 850;
    white-space: nowrap;
}

/* EMPTY STATE */

.empty-state {
    padding: 32px 15px;
    text-align: center;
}

.empty-icon {
    width: 68px;
    height: 68px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 14px;
    border: 1px solid #bfdbfe;
    border-radius: 21px;
    background: linear-gradient(145deg, #dbeafe, #eff6ff);
    color: #2563eb;
    font-size: 27px;
}

.empty-state h4 {
    margin: 0 0 8px;
    color: #172554;
    font-size: 16px;
    font-weight: 850;
}

.empty-state p {
    max-width: 300px;
    margin: 0 auto 18px;
    color: #64748b;
    font-size: 12px;
    line-height: 1.7;
}

.btn-productlife {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 11px 17px;
    border: 1px solid #047857;
    border-radius: 10px;
    background: linear-gradient(135deg, #059669, #047857);
    color: #fff;
    font-size: 11px;
    font-weight: 850;
    text-decoration: none;
    box-shadow: 0 7px 16px rgba(5,150,105,.2);
    transition: .25s ease;
}

.btn-productlife:hover {
    transform: translateY(-3px);
    background: #065f46;
    color: #fff;
    box-shadow: 0 11px 22px rgba(5,150,105,.28);
}

/* QUICK ACTIONS */

.quick-actions {
    padding-top: 23px;
    margin-top: 27px;
    border-top: 1px solid #e8edf4;
}

.quick-heading {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 17px;
}

.quick-heading-icon {
    width: 35px;
    height: 35px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 11px;
    background: #fef3c7;
    color: #d97706;
    font-size: 16px;
}

.actions-grid {
    display: grid;
    grid-template-columns: repeat(3, minmax(0, 1fr));
    gap: 11px;
}

.action {
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    min-width: 0;
    padding: 15px 12px;
    border: 1px solid #e2e8f0;
    border-radius: 15px;
    background: #fff;
    text-decoration: none;
    transition: .25s ease;
}

.action:hover {
    transform: translateY(-5px);
    box-shadow: 0 12px 23px rgba(15,23,42,.09);
}

.action-icon {
    width: 39px;
    height: 39px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 12px;
    border-radius: 12px;
    font-size: 18px;
}

.action-green .action-icon {
    background: #d1fae5;
    color: #047857;
}

.action-blue .action-icon {
    background: #dbeafe;
    color: #1d4ed8;
}

.action-orange .action-icon {
    background: #ffedd5;
    color: #c2410c;
}

.action-green:hover { border-color: #86efac; background: #f0fdf4; }
.action-blue:hover { border-color: #93c5fd; background: #eff6ff; }
.action-orange:hover { border-color: #fdba74; background: #fff7ed; }

.action-title {
    color: #172554;
    font-size: 11px;
    font-weight: 850;
}

.action-description {
    margin-top: 5px;
    color: #64748b;
    font-size: 9px;
    line-height: 1.5;
}

/* ACTIVITY */

.activity-live {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    padding: 6px 9px;
    border: 1px solid #bbf7d0;
    border-radius: 30px;
    background: #f0fdf4;
    color: #166534;
    font-size: 8px;
    font-weight: 900;
    letter-spacing: .6px;
}

.activity-live span {
    width: 7px;
    height: 7px;
    border-radius: 50%;
    background: #16a34a;
    box-shadow: 0 0 0 3px rgba(22,163,74,.13);
}

.activity-list {
    display: flex;
    flex-direction: column;
}

.activity {
    display: flex;
    align-items: center;
    gap: 12px;
    padding: 13px 9px;
    border-bottom: 1px solid #e8edf4;
    border-radius: 11px;
    transition: background .2s ease;
}

.activity:hover {
    background: #f8fafc;
}

.activity-icon {
    width: 42px;
    height: 42px;
    flex-shrink: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 13px;
    font-size: 17px;
}

.activity-green {
    background: #d1fae5;
    color: #047857;
}

.activity-blue {
    background: #dbeafe;
    color: #1d4ed8;
}

.activity-purple {
    background: #ede9fe;
    color: #6d28d9;
}

.activity-orange {
    background: #ffedd5;
    color: #c2410c;
}

.activity-info {
    flex: 1;
    min-width: 0;
}

.activity-title {
    margin-bottom: 5px;
    color: #172554;
    font-size: 11px;
    font-weight: 850;
}

.activity-time {
    color: #64748b;
    font-size: 10px;
    line-height: 1.5;
}

.activity-check {
    color: #059669;
    font-size: 14px;
}

.activity-arrow {
    color: #94a3b8;
    font-size: 13px;
}

/* LIFECYCLE */

.lifecycle-mini {
    overflow: hidden;
    padding: 19px;
    margin-top: 23px;
    border: 1px solid #c7d2fe;
    border-radius: 17px;
    background:
        radial-gradient(circle at top right, rgba(129,140,248,.19), transparent 48%),
        linear-gradient(135deg, #eef2ff, #f5f3ff 55%, #eff6ff);
}

.lifecycle-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 17px;
}

.lifecycle-overline {
    color: #6d28d9;
    font-size: 8px;
    font-weight: 900;
    letter-spacing: 1px;
}

.lifecycle-title {
    margin: 5px 0 0;
    color: #312e81;
    font-size: 14px;
    font-weight: 900;
}

.lifecycle-main-icon {
    width: 38px;
    height: 38px;
    display: flex;
    align-items: center;
    justify-content: center;
    border: 1px solid #c4b5fd;
    border-radius: 12px;
    background: #fff;
    color: #7c3aed;
    font-size: 19px;
}

.lifecycle-steps {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 5px;
}

.lifecycle-step {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 7px;
    min-width: 0;
    color: #3730a3;
    font-size: 9px;
    font-weight: 850;
}

.step-icon {
    width: 38px;
    height: 38px;
    display: flex;
    align-items: center;
    justify-content: center;
    border: 1px solid rgba(255,255,255,.9);
    border-radius: 12px;
    background: #fff;
    box-shadow: 0 4px 10px rgba(49,46,129,.08);
    font-size: 16px;
}

.step-purchase { color: #059669; }
.step-warranty { color: #2563eb; }
.step-repair { color: #ea580c; }
.step-reuse { color: #7c3aed; }

.step-arrow {
    margin-top: -19px;
    color: #818cf8;
    font-size: 12px;
}

/* RESPONSIVE */

@media (max-width: 1200px) {
    .stats-grid {
        grid-template-columns: repeat(2, minmax(0, 1fr));
    }

    .content-grid {
        grid-template-columns: 1fr;
    }

    .welcome-art {
        margin-right: 10px;
    }
}

@media (max-width: 768px) {
    .welcome-card {
        min-height: auto;
        padding: 28px;
        border-radius: 20px;
    }

    .welcome-art {
        width: 135px;
        height: 135px;
        margin-right: 0;
    }

    .art-circle {
        width: 95px;
        height: 95px;
        border-radius: 28px;
        font-size: 43px;
    }

    .art-badge {
        padding: 7px 8px;
        font-size: 8px;
    }

    .art-badge-one {
        right: -12px;
    }

    .art-badge-two {
        left: -18px;
    }

    .panel {
        padding: 20px;
        border-radius: 18px;
    }

    .stats-grid {
        gap: 13px;
    }

    .actions-grid {
        gap: 9px;
    }
}

@media (max-width: 560px) {
    .welcome-card {
        padding: 24px 21px;
    }

    .welcome-art {
        display: none;
    }

    .welcome-card h2 {
        font-size: 26px;
    }

    .welcome-card p {
        font-size: 12px;
    }

    .stats-grid {
        grid-template-columns: repeat(2, minmax(0, 1fr));
    }

    .stat-card {
        padding: 17px;
        border-radius: 16px;
    }

    .stat-icon {
        width: 42px;
        height: 42px;
        border-radius: 12px;
        font-size: 18px;
    }

    .stat-caption {
        font-size: 7px;
    }

    .stat-label {
        font-size: 9px;
    }

    .stat-number {
        font-size: 29px;
    }

    .stat-footer {
        font-size: 8px;
    }

    .panel {
        padding: 16px;
    }

    .panel-title {
        font-size: 14px;
    }

    .panel-subtitle {
        font-size: 10px;
    }

    .panel-link {
        padding: 8px 9px;
        font-size: 9px;
    }

    .product-item {
        gap: 9px;
        padding: 10px;
    }

    .product-img {
        width: 46px;
        height: 46px;
    }

    .product-name {
        font-size: 11px;
    }

    .product-meta {
        font-size: 8px;
    }

    .status {
        padding: 5px 7px;
        font-size: 8px;
    }

    .actions-grid {
        grid-template-columns: repeat(2, minmax(0, 1fr));
    }

    .lifecycle-mini {
        padding: 14px 10px;
    }

    .lifecycle-step {
        font-size: 8px;
    }

    .step-icon {
        width: 32px;
        height: 32px;
        font-size: 14px;
    }

    .step-arrow {
        font-size: 9px;
    }
}

@media (max-width: 360px) {
    .stats-grid {
        grid-template-columns: 1fr;
    }

    .activity-live {
        font-size: 7px;
    }

    .product-item {
        flex-wrap: wrap;
    }

    .status {
        margin-left: 55px;
    }
}

/* ACCESSIBILITY */

.pl-dashboard a:focus-visible {
    outline: 3px solid rgba(37,99,235,.4);
    outline-offset: 3px;
}

@media (prefers-reduced-motion: reduce) {
    .pl-dashboard *,
    .pl-dashboard *::before,
    .pl-dashboard *::after {
        transition-duration: .01ms !important;
        animation-duration: .01ms !important;
    }
}
</style>
@endpush
