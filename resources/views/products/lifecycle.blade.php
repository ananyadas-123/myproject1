
@extends('layouts.app')

@section('title', 'Product Lifecycle - ProductLife')
@section('page_title', 'Product Lifecycle')
@section('page_subtitle', 'Manage the complete lifecycle of your product.')

@section('content')

<div class="lifecycle-page">

    {{-- PRODUCT HERO --}}
    <div class="product-hero">

        <div class="product-visual">
            @if($product->image)
                <img
                    src="{{ asset('storage/' . $product->image) }}"
                    alt="{{ $product->brand }} {{ $product->model }}"
                >
            @else
                <div class="no-product-image">
                    <i class="bi bi-box-seam"></i>
                </div>
            @endif
        </div>

        <div class="product-main-info">

            <div class="hero-top-row">
                <div>
                    <span class="product-category">
                        <i class="bi bi-tag-fill"></i>
                        {{ $product->category }}
                    </span>

                    <h1>{{ $product->brand }} {{ $product->model }}</h1>

                    <p class="serial-line">
                        <i class="bi bi-upc-scan"></i>
                        Serial Number:
                        <strong>{{ $product->serial_number }}</strong>
                    </p>
                </div>

                <div class="hero-status">
                    <span class="status-dot"></span>
                    {{ ucfirst($product->status ?? 'Active') }}
                </div>
            </div>

            <div class="product-meta-row">

                <div class="meta-item">
                    <span><i class="bi bi-calendar3"></i> Purchase Date</span>
                    <strong>
                        @if($product->purchase_date)
                            {{ \Carbon\Carbon::parse($product->purchase_date)->format('d M Y') }}
                        @else
                            Not available
                        @endif
                    </strong>
                </div>

                <div class="meta-divider"></div>

                <div class="meta-item">
                    <span><i class="bi bi-stars"></i> Condition</span>
                    <strong>{{ ucfirst($product->condition ?? 'Not specified') }}</strong>
                </div>

                <div class="meta-divider"></div>

                <div class="meta-item">
                    <span><i class="bi bi-activity"></i> Product Status</span>
                    <strong class="active-status">
                        {{ ucfirst($product->status ?? 'Active') }}
                    </strong>
                </div>

            </div>
        </div>
    </div>


    {{-- SECTION HEADING --}}
    <div class="section-heading">

        <div class="heading-content">
            <div class="section-label">
                <i class="bi bi-diagram-3-fill"></i>
                PRODUCT JOURNEY
            </div>

            <h2>Product Lifecycle</h2>

            <p>
                Manage every stage of your product journey from one place.
            </p>
        </div>

        <div class="lifecycle-progress">
            <div class="progress-info">
                <span>Lifecycle Progress</span>
                <strong>4 / 6 Steps</strong>
            </div>

            <div class="progress-track">
                <div class="progress-fill"></div>
            </div>

            <small>Explore all stages of your product lifecycle</small>
        </div>

    </div>


    {{-- LIFECYCLE GRID --}}
    <div class="lifecycle-grid">

        {{-- STEP 01 --}}
        <a href="{{ route('products.passport', $product->id) }}"
           class="lifecycle-card passport-card">

            <span class="step-number">01</span>

            <div class="card-icon">
                <i class="bi bi-fingerprint"></i>
            </div>

            <div class="card-content">
                <span class="card-step">DIGITAL IDENTITY</span>

                <h3>Digital Product Passport</h3>

                <p>
                    View product identity, lifecycle records,
                    warranty and sustainability information.
                </p>

                <span class="card-action">
                    Open Passport
                    <i class="bi bi-arrow-right"></i>
                </span>
            </div>
        </a>


        {{-- STEP 02 --}}
        <a href="{{ route('warranties.create', $product->id) }}"
           class="lifecycle-card warranty-card">

            <span class="step-number">02</span>

            <div class="card-icon">
                <i class="bi bi-shield-check"></i>
            </div>

            <div class="card-content">
                <span class="card-step">PROTECTION</span>

                <h3>Warranty</h3>

                <p>
                    Add and manage your product warranty
                    information and coverage details.
                </p>

                <span class="card-action">
                    Manage Warranty
                    <i class="bi bi-arrow-right"></i>
                </span>
            </div>
        </a>


        {{-- STEP 03 --}}
        <a href="{{ route('maintenances.create', $product->id) }}"
           class="lifecycle-card maintenance-card">

            <span class="step-number">03</span>

            <div class="card-icon">
                <i class="bi bi-calendar2-check"></i>
            </div>

            <div class="card-content">
                <span class="card-step">CARE & SERVICE</span>

                <h3>Maintenance</h3>

                <p>
                    Schedule maintenance and keep your
                    product in good working condition.
                </p>

                <span class="card-action">
                    Schedule Maintenance
                    <i class="bi bi-arrow-right"></i>
                </span>
            </div>
        </a>


        {{-- STEP 04 --}}
        <a href="{{ route('repair_requests.create', $product->id) }}"
           class="lifecycle-card repair-card">

            <span class="step-number">04</span>

            <div class="card-icon">
                <i class="bi bi-tools"></i>
            </div>

            <div class="card-content">
                <span class="card-step">SERVICE</span>

                <h3>Repair Request</h3>

                <p>
                    Report a problem and start the repair
                    process for your product.
                </p>

                <span class="card-action">
                    Request Repair
                    <i class="bi bi-arrow-right"></i>
                </span>
            </div>
        </a>


        {{-- STEP 05 --}}
        <div class="lifecycle-card history-card disabled-card">

            <span class="step-number">05</span>

            <div class="card-icon">
                <i class="bi bi-clock-history"></i>
            </div>

            <div class="card-content">
                <span class="card-step">SERVICE RECORD</span>

                <h3>Repair History</h3>

                <p>
                    Track previous repair requests and
                    product service history.
                </p>

                <span class="card-action disabled">
                    Coming from Repair Records
                    <i class="bi bi-clock"></i>
                </span>
            </div>
        </div>


        {{-- STEP 06 --}}
        <div class="lifecycle-card recycle-card disabled-card">

            <span class="step-number">06</span>

            <div class="card-icon">
                <i class="bi bi-recycle"></i>
            </div>

            <div class="card-content">
                <span class="card-step">END OF LIFE</span>

                <h3>Reuse / Recycle</h3>

                <p>
                    Extend product life through reuse,
                    resale, donation or responsible recycling.
                </p>

                <span class="card-action disabled">
                    Lifecycle End
                    <i class="bi bi-recycle"></i>
                </span>
            </div>
        </div>

    </div>


    {{-- BOTTOM ACTIONS --}}
    <div class="bottom-actions">

        <a href="{{ route('products.index') }}" class="back-btn">
            <i class="bi bi-arrow-left"></i>
            Back to My Products
        </a>

        <a href="{{ route('products.show', $product->id) }}" class="details-btn">
            <i class="bi bi-info-circle-fill"></i>
            Product Details
        </a>

    </div>

</div>

@endsection


@push('styles')
<style>
/* ==========================================
   PRODUCTLIFE - PREMIUM LIFECYCLE PAGE
   Purple / Blue / Emerald Theme
========================================== */

.lifecycle-page {
    width: 100%;
    max-width: 1250px;
    margin: 0 auto;
    padding-bottom: 35px;
    color: #172554;
}

/* ==========================================
   PRODUCT HERO
========================================== */

.product-hero {
    position: relative;
    display: flex;
    align-items: center;
    gap: 30px;
    padding: 30px;
    margin-bottom: 38px;
    overflow: hidden;
    background: linear-gradient(120deg, #ffffff 0%, #f3f1ff 55%, #edf5ff 100%);
    border: 1px solid #ddd6fe;
    border-radius: 23px;
    box-shadow: 0 12px 35px rgba(49, 46, 129, .09);
}

.product-hero::before {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    width: 6px;
    height: 100%;
    background: linear-gradient(180deg, #7c3aed, #2563eb, #059669);
}

.product-hero::after {
    content: "";
    position: absolute;
    width: 300px;
    height: 300px;
    right: -110px;
    top: -170px;
    border-radius: 50%;
    background: rgba(124, 58, 237, .07);
    pointer-events: none;
}

.product-visual {
    position: relative;
    z-index: 1;
    width: 170px;
    height: 170px;
    flex-shrink: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: hidden;
    border-radius: 20px;
    background: linear-gradient(145deg, #e9e3ff, #dbeafe);
    border: 1px solid #c4b5fd;
    color: #6d28d9;
    font-size: 48px;
    box-shadow: 0 8px 22px rgba(79, 70, 229, .13);
}

.product-visual img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform .4s ease;
}

.product-hero:hover .product-visual img {
    transform: scale(1.06);
}

.no-product-image {
    width: 100%;
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
}

.product-main-info {
    position: relative;
    z-index: 2;
    flex: 1;
    min-width: 0;
}

.hero-top-row {
    display: flex;
    align-items: flex-start;
    justify-content: space-between;
    gap: 20px;
}

.product-category {
    display: inline-flex;
    align-items: center;
    gap: 7px;
    padding: 7px 12px;
    margin-bottom: 10px;
    border-radius: 7px;
    background: #ede9fe;
    color: #5b21b6;
    font-size: 10px;
    font-weight: 900;
    text-transform: uppercase;
    letter-spacing: .7px;
}

.product-main-info h1 {
    margin: 0 0 10px;
    color: #1e1b4b;
    font-size: 31px;
    line-height: 1.25;
    font-weight: 850;
    letter-spacing: -.8px;
    overflow-wrap: anywhere;
}

.serial-line {
    display: flex;
    align-items: center;
    flex-wrap: wrap;
    gap: 7px;
    margin: 0;
    color: #64748b;
    font-size: 13px;
}

.serial-line i {
    color: #6d28d9;
    font-size: 15px;
}

.serial-line strong {
    color: #312e81;
    font-weight: 800;
    overflow-wrap: anywhere;
}

/* Status */

.hero-status {
    display: inline-flex;
    align-items: center;
    gap: 9px;
    padding: 9px 15px;
    border-radius: 30px;
    background: #dcfce7;
    border: 1px solid #86efac;
    color: #166534;
    font-size: 11px;
    font-weight: 900;
    white-space: nowrap;
}

.status-dot {
    width: 8px;
    height: 8px;
    border-radius: 50%;
    background: #16a34a;
    box-shadow: 0 0 0 4px rgba(22, 163, 74, .14);
}

/* Product meta */

.product-meta-row {
    display: flex;
    align-items: center;
    flex-wrap: wrap;
    gap: 26px;
    margin-top: 26px;
    padding-top: 20px;
    border-top: 1px solid #ddd6fe;
}

.meta-item {
    display: flex;
    flex-direction: column;
    gap: 7px;
}

.meta-item span {
    color: #64748b;
    font-size: 10px;
    font-weight: 800;
    text-transform: uppercase;
    letter-spacing: .5px;
}

.meta-item span i {
    margin-right: 4px;
    color: #7c3aed;
}

.meta-item strong {
    color: #1e1b4b;
    font-size: 14px;
    font-weight: 850;
}

.meta-item .active-status {
    color: #059669;
}

.meta-divider {
    width: 1px;
    height: 32px;
    background: #ddd6fe;
}

/* ==========================================
   SECTION HEADING
========================================== */

.section-heading {
    display: flex;
    align-items: flex-end;
    justify-content: space-between;
    gap: 25px;
    margin-bottom: 23px;
}

.section-label {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    margin-bottom: 9px;
    color: #6d28d9;
    font-size: 11px;
    font-weight: 900;
    letter-spacing: 1px;
}

.section-label i {
    font-size: 15px;
}

.section-heading h2 {
    margin: 0;
    color: #1e1b4b;
    font-size: 27px;
    font-weight: 850;
    letter-spacing: -.6px;
}

.section-heading p {
    margin: 7px 0 0;
    color: #64748b;
    font-size: 13px;
    line-height: 1.6;
}

/* ==========================================
   PROGRESS
========================================== */

.lifecycle-progress {
    width: 260px;
    flex-shrink: 0;
    padding: 15px 17px;
    background: #ffffff;
    border: 1px solid #ddd6fe;
    border-radius: 13px;
    box-shadow: 0 5px 16px rgba(49, 46, 129, .06);
}

.progress-info {
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 10px;
    margin-bottom: 11px;
}

.progress-info span {
    color: #475569;
    font-size: 11px;
    font-weight: 800;
}

.progress-info strong {
    color: #6d28d9;
    font-size: 12px;
    font-weight: 900;
    white-space: nowrap;
}

.progress-track {
    width: 100%;
    height: 9px;
    overflow: hidden;
    border-radius: 20px;
    background: #e9e5f7;
}

.progress-fill {
    width: 66.66%;
    height: 100%;
    border-radius: inherit;
    background: linear-gradient(90deg, #7c3aed, #2563eb, #10b981);
    box-shadow: 0 0 10px rgba(124, 58, 237, .2);
}

.lifecycle-progress small {
    display: block;
    margin-top: 9px;
    color: #64748b;
    font-size: 10px;
}

/* ==========================================
   LIFECYCLE GRID
========================================== */

.lifecycle-grid {
    display: grid;
    grid-template-columns: repeat(2, minmax(0, 1fr));
    gap: 21px;
}

/* ==========================================
   LIFECYCLE CARDS
========================================== */

.lifecycle-card {
    position: relative;
    display: flex;
    align-items: flex-start;
    gap: 18px;
    min-height: 220px;
    padding: 26px;
    overflow: hidden;
    border: 1px solid #e0e7ff;
    border-radius: 19px;
    background: #ffffff;
    text-decoration: none;
    color: inherit;
    box-shadow: 0 7px 23px rgba(49, 46, 129, .065);
    transition: transform .28s ease, box-shadow .28s ease, border-color .28s ease;
}

.lifecycle-card::before {
    content: "";
    position: absolute;
    left: 0;
    top: 0;
    width: 4px;
    height: 100%;
    background: var(--card-accent, #7c3aed);
    opacity: .9;
    transition: width .25s ease;
}

.lifecycle-card::after {
    content: "";
    position: absolute;
    width: 150px;
    height: 150px;
    right: -65px;
    bottom: -75px;
    border-radius: 50%;
    background: var(--card-glow, rgba(124, 58, 237, .06));
    pointer-events: none;
}

.lifecycle-card:not(.disabled-card):hover {
    transform: translateY(-6px);
    border-color: var(--card-accent, #7c3aed);
    box-shadow: 0 17px 36px rgba(49, 46, 129, .14);
}

.lifecycle-card:not(.disabled-card):hover::before {
    width: 6px;
}

/* Card color identities */

.passport-card {
    --card-accent: #059669;
    --card-glow: rgba(5, 150, 105, .09);
}

.warranty-card {
    --card-accent: #2563eb;
    --card-glow: rgba(37, 99, 235, .09);
}

.maintenance-card {
    --card-accent: #d97706;
    --card-glow: rgba(217, 119, 6, .09);
}

.repair-card {
    --card-accent: #dc2626;
    --card-glow: rgba(220, 38, 38, .08);
}

.history-card {
    --card-accent: #9333ea;
    --card-glow: rgba(147, 51, 234, .07);
}

.recycle-card {
    --card-accent: #0891b2;
    --card-glow: rgba(8, 145, 178, .08);
}

/* Step number */

.step-number {
    position: absolute;
    top: 17px;
    right: 20px;
    color: #e2e8f0;
    font-size: 25px;
    line-height: 1;
    font-weight: 950;
    letter-spacing: -1px;
}

/* ==========================================
   CARD ICONS
========================================== */

.card-icon {
    position: relative;
    z-index: 2;
    width: 59px;
    height: 59px;
    flex-shrink: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 16px;
    font-size: 23px;
    transition: transform .28s ease;
}

.lifecycle-card:not(.disabled-card):hover .card-icon {
    transform: translateY(-3px) scale(1.06);
}

.passport-card .card-icon {
    background: #d1fae5;
    color: #047857;
    border: 1px solid #a7f3d0;
}

.warranty-card .card-icon {
    background: #dbeafe;
    color: #1d4ed8;
    border: 1px solid #bfdbfe;
}

.maintenance-card .card-icon {
    background: #ffedd5;
    color: #c2410c;
    border: 1px solid #fed7aa;
}

.repair-card .card-icon {
    background: #fee2e2;
    color: #b91c1c;
    border: 1px solid #fecaca;
}

.history-card .card-icon {
    background: #f3e8ff;
    color: #7e22ce;
    border: 1px solid #e9d5ff;
}

.recycle-card .card-icon {
    background: #cffafe;
    color: #0e7490;
    border: 1px solid #a5f3fc;
}

/* ==========================================
   CARD CONTENT
========================================== */

.card-content {
    position: relative;
    z-index: 2;
    flex: 1;
    min-width: 0;
    padding-right: 12px;
}

.card-step {
    display: block;
    margin-bottom: 8px;
    color: var(--card-accent, #7c3aed);
    font-size: 10px;
    font-weight: 900;
    letter-spacing: .85px;
}

.card-content h3 {
    margin: 0 0 10px;
    color: #1e1b4b;
    font-size: 19px;
    line-height: 1.35;
    font-weight: 850;
}

.card-content p {
    max-width: 410px;
    min-height: 42px;
    margin: 0 0 19px;
    color: #526078;
    font-size: 12px;
    line-height: 1.75;
}

.card-action {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    color: var(--card-accent, #7c3aed);
    font-size: 12px;
    font-weight: 900;
}

.card-action i {
    transition: transform .25s ease;
}

.lifecycle-card:not(.disabled-card):hover .card-action i {
    transform: translateX(5px);
}

.card-action.disabled {
    color: #64748b;
}

/* ==========================================
   DISABLED CARDS
========================================== */

.disabled-card {
    cursor: default;
    background: linear-gradient(135deg, #ffffff, #f5f7fb);
    border-style: dashed;
    border-color: #cbd5e1;
}

.disabled-card::before {
    opacity: .65;
}

.disabled-card:hover {
    transform: none;
    border-color: #cbd5e1;
    box-shadow: 0 7px 23px rgba(49, 46, 129, .065);
}

.disabled-card .card-content h3 {
    color: #334155;
}

.disabled-card .card-content p {
    color: #64748b;
}

/* ==========================================
   BOTTOM ACTIONS
========================================== */

.bottom-actions {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 14px;
    margin-top: 30px;
    padding-top: 21px;
    border-top: 1px solid #e0e7ff;
}

.back-btn,
.details-btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 9px;
    padding: 13px 19px;
    border-radius: 11px;
    text-decoration: none;
    font-size: 12px;
    font-weight: 850;
    transition: all .25s ease;
}

.back-btn {
    color: #3730a3;
    background: #ffffff;
    border: 1px solid #c7d2fe;
}

.back-btn:hover {
    background: #eef2ff;
    color: #4338ca;
    border-color: #818cf8;
    transform: translateY(-2px);
}

.details-btn {
    color: #ffffff;
    background: linear-gradient(135deg, #6d28d9, #2563eb);
    border: 1px solid #5b21b6;
    box-shadow: 0 7px 17px rgba(79, 70, 229, .22);
}

.details-btn:hover {
    color: #ffffff;
    background: linear-gradient(135deg, #5b21b6, #1d4ed8);
    transform: translateY(-2px);
    box-shadow: 0 11px 23px rgba(79, 70, 229, .3);
}

/* ==========================================
   RESPONSIVE
========================================== */

@media (max-width: 1000px) {
    .lifecycle-grid {
        gap: 16px;
    }

    .lifecycle-card {
        padding: 22px;
    }

    .product-visual {
        width: 145px;
        height: 145px;
    }
}

@media (max-width: 800px) {
    .product-hero {
        align-items: flex-start;
    }

    .section-heading {
        align-items: flex-start;
        flex-direction: column;
    }

    .lifecycle-progress {
        width: 100%;
        max-width: 350px;
    }

    .lifecycle-grid {
        grid-template-columns: 1fr;
    }
}

@media (max-width: 600px) {
    .product-hero {
        flex-direction: column;
        padding: 23px;
        gap: 20px;
    }

    .product-visual {
        width: 125px;
        height: 125px;
    }

    .hero-top-row {
        flex-direction: column;
        gap: 13px;
    }

    .hero-status {
        align-self: flex-start;
    }

    .product-main-info h1 {
        font-size: 25px;
    }

    .product-meta-row {
        gap: 18px;
    }

    .meta-divider {
        display: none;
    }

    .section-heading h2 {
        font-size: 23px;
    }

    .lifecycle-card {
        min-height: 195px;
        padding: 21px;
        gap: 14px;
    }

    .card-icon {
        width: 49px;
        height: 49px;
        font-size: 20px;
    }

    .card-content h3 {
        font-size: 17px;
    }

    .card-content p {
        min-height: auto;
    }

    .step-number {
        right: 15px;
        top: 15px;
        font-size: 21px;
    }

    .bottom-actions {
        flex-direction: column;
        align-items: stretch;
    }

    .back-btn,
    .details-btn {
        width: 100%;
        min-height: 45px;
    }
}

@media (prefers-reduced-motion: reduce) {
    .lifecycle-card,
    .card-icon,
    .card-action i,
    .product-visual img,
    .back-btn,
    .details-btn {
        transition: none !important;
    }
}
</style>
@endpush
