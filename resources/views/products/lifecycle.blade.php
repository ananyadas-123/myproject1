@extends('layouts.app')

@section('title', 'Product Lifecycle - ProductLife')

@section('page_title', 'Product Lifecycle')

@section('page_subtitle', 'Manage the complete lifecycle of your product.')

@section('content')

<div class="lifecycle-page">

    {{-- =========================
        PRODUCT HERO
    ========================== --}}
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
                        {{ $product->category }}
                    </span>

                    <h1>
                        {{ $product->brand }} {{ $product->model }}
                    </h1>

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
                    <span>Purchase Date</span>

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
                    <span>Condition</span>

                    <strong>
                        {{ ucfirst($product->condition ?? 'Not specified') }}
                    </strong>
                </div>

                <div class="meta-divider"></div>

                <div class="meta-item">
                    <span>Product Status</span>

                    <strong class="active-status">
                        {{ ucfirst($product->status ?? 'Active') }}
                    </strong>
                </div>

            </div>

        </div>

    </div>


    {{-- =========================
        SECTION HEADER
    ========================== --}}
    <div class="section-heading">

        <div>
            <div class="section-label">
                <i class="bi bi-diagram-3"></i>
                PRODUCT JOURNEY
            </div>

            <h2>
                Product Lifecycle
            </h2>

            <p>
                Manage every stage of your product journey from one place.
            </p>
        </div>

        <div class="lifecycle-progress">
            <span>Lifecycle</span>

            <div class="progress-track">
                <div class="progress-fill"></div>
            </div>

            <strong>4 / 6</strong>
        </div>

    </div>


    {{-- =========================
        LIFECYCLE GRID
    ========================== --}}
    <div class="lifecycle-grid">


        {{-- STEP 01 : DIGITAL PASSPORT --}}
        <a
            href="{{ route('products.passport', $product->id) }}"
            class="lifecycle-card passport-card"
        >

            <div class="step-number">
                01
            </div>

            <div class="card-icon">
                <i class="bi bi-fingerprint"></i>
            </div>

            <div class="card-content">

                <span class="card-step">
                    DIGITAL IDENTITY
                </span>

                <h3>
                    Digital Product Passport
                </h3>

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


        {{-- STEP 02 : WARRANTY --}}
        <a
            href="{{ route('warranties.create', $product->id) }}"
            class="lifecycle-card warranty-card"
        >

            <div class="step-number">
                02
            </div>

            <div class="card-icon">
                <i class="bi bi-shield-check"></i>
            </div>

            <div class="card-content">

                <span class="card-step">
                    PROTECTION
                </span>

                <h3>
                    Warranty
                </h3>

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


        {{-- STEP 03 : MAINTENANCE --}}
        <a
            href="{{ route('maintenances.create', $product->id) }}"
            class="lifecycle-card maintenance-card"
        >

            <div class="step-number">
                03
            </div>

            <div class="card-icon">
                <i class="bi bi-calendar2-check"></i>
            </div>

            <div class="card-content">

                <span class="card-step">
                    CARE & SERVICE
                </span>

                <h3>
                    Maintenance
                </h3>

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


        {{-- STEP 04 : REPAIR --}}
        <a
            href="{{ route('repair_requests.create', $product->id) }}"
            class="lifecycle-card repair-card"
        >

            <div class="step-number">
                04
            </div>

            <div class="card-icon">
                <i class="bi bi-tools"></i>
            </div>

            <div class="card-content">

                <span class="card-step">
                    SERVICE
                </span>

                <h3>
                    Repair Request
                </h3>

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


        {{-- STEP 05 : REPAIR HISTORY --}}
        <div class="lifecycle-card history-card disabled-card">

            <div class="step-number">
                05
            </div>

            <div class="card-icon">
                <i class="bi bi-clock-history"></i>
            </div>

            <div class="card-content">

                <span class="card-step">
                    SERVICE RECORD
                </span>

                <h3>
                    Repair History
                </h3>

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


        {{-- STEP 06 : REUSE / RECYCLE --}}
        <div class="lifecycle-card recycle-card disabled-card">

            <div class="step-number">
                06
            </div>

            <div class="card-icon">
                <i class="bi bi-recycle"></i>
            </div>

            <div class="card-content">

                <span class="card-step">
                    END OF LIFE
                </span>

                <h3>
                    Reuse / Recycle
                </h3>

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


    {{-- =========================
        BOTTOM ACTIONS
    ========================== --}}
    <div class="bottom-actions">

        <a
            href="{{ route('products.index') }}"
            class="back-btn"
        >
            <i class="bi bi-arrow-left"></i>
            Back to My Products
        </a>

        <a
            href="{{ route('products.show', $product->id) }}"
            class="details-btn"
        >
            <i class="bi bi-info-circle"></i>
            Product Details
        </a>

    </div>

</div>

@endsection


@push('styles')
<style>
/* ==========================================
   PRODUCTLIFE - LIFECYCLE PAGE
   Premium Emerald UI
========================================== */

.lifecycle-page {
    width: 100%;
    max-width: 1180px;
    margin: 0 auto;
    padding-bottom: 35px;
    color: #172b22;
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
    background: linear-gradient(125deg, #ffffff 0%, #f2f8f4 100%);
    border: 1px solid #d8e7dc;
    border-radius: 23px;
    box-shadow: 0 12px 35px rgba(17, 60, 38, .09);
    overflow: hidden;
}

.product-hero::before {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    width: 6px;
    height: 100%;
    background: linear-gradient(180deg, #087443, #34b36d);
}

.product-hero::after {
    content: "";
    position: absolute;
    width: 280px;
    height: 280px;
    right: -100px;
    top: -150px;
    border-radius: 50%;
    background: rgba(22, 163, 74, .055);
    pointer-events: none;
}

/* Product image */

.product-visual {
    position: relative;
    width: 170px;
    height: 170px;
    flex-shrink: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: hidden;
    border-radius: 20px;
    background: linear-gradient(145deg, #e1f2e6, #f4faf5);
    border: 1px solid #cfe3d4;
    color: #087443;
    font-size: 48px;
    box-shadow: 0 8px 22px rgba(15, 75, 42, .10);
    z-index: 1;
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

/* Product information */

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
    padding: 7px 12px;
    margin-bottom: 10px;
    border-radius: 7px;
    background: #dcfce7;
    color: #14532d;
    font-size: 10px;
    font-weight: 900;
    text-transform: uppercase;
    letter-spacing: .7px;
}

.product-main-info h1 {
    margin: 0 0 10px;
    color: #123b29;
    font-size: 31px;
    line-height: 1.25;
    font-weight: 850;
    letter-spacing: -.8px;
}

.serial-line {
    display: flex;
    align-items: center;
    flex-wrap: wrap;
    gap: 7px;
    margin: 0;
    color: #64756a;
    font-size: 13px;
}

.serial-line i {
    color: #087443;
    font-size: 15px;
}

.serial-line strong {
    color: #263f31;
    font-weight: 800;
}

/* Status */

.hero-status {
    display: inline-flex;
    align-items: center;
    gap: 9px;
    padding: 9px 15px;
    border-radius: 30px;
    background: #dcfce7;
    border: 1px solid #86d6a1;
    color: #14532d;
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
    border-top: 1px solid #dce8df;
}

.meta-item {
    display: flex;
    flex-direction: column;
    gap: 6px;
}

.meta-item span {
    color: #64756a;
    font-size: 10px;
    font-weight: 800;
    text-transform: uppercase;
    letter-spacing: .6px;
}

.meta-item strong {
    color: #183d2b;
    font-size: 14px;
    font-weight: 850;
}

.meta-item .active-status {
    color: #087443;
}

.meta-divider {
    width: 1px;
    height: 32px;
    background: #dce8df;
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
    color: #087443;
    font-size: 11px;
    font-weight: 900;
    letter-spacing: 1px;
}

.section-label i {
    font-size: 15px;
}

.section-heading h2 {
    margin: 0;
    color: #123b29;
    font-size: 27px;
    font-weight: 850;
    letter-spacing: -.6px;
}

.section-heading p {
    margin: 7px 0 0;
    color: #64756a;
    font-size: 13px;
    line-height: 1.6;
}

/* ==========================================
   LIFECYCLE PROGRESS
========================================== */

.lifecycle-progress {
    min-width: 205px;
    display: flex;
    align-items: center;
    gap: 11px;
    padding: 13px 15px;
    background: #ffffff;
    border: 1px solid #dce8df;
    border-radius: 12px;
    box-shadow: 0 4px 14px rgba(15, 60, 35, .05);
}

.lifecycle-progress span {
    color: #52675b;
    font-size: 11px;
    font-weight: 800;
}

.lifecycle-progress strong {
    color: #087443;
    font-size: 12px;
    font-weight: 900;
    white-space: nowrap;
}

.progress-track {
    flex: 1;
    height: 8px;
    overflow: hidden;
    border-radius: 20px;
    background: #e3ece5;
}

.progress-fill {
    width: 66.66%;
    height: 100%;
    border-radius: inherit;
    background: linear-gradient(90deg, #087443, #31b66c);
    box-shadow: 0 0 9px rgba(22, 163, 74, .25);
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
    border: 1px solid #dce7df;
    border-radius: 19px;
    background: #ffffff;
    text-decoration: none;
    color: inherit;
    box-shadow: 0 7px 23px rgba(20, 60, 40, .065);
    transition: transform .28s ease, box-shadow .28s ease, border-color .28s ease;
}

.lifecycle-card::before {
    content: "";
    position: absolute;
    left: 0;
    top: 0;
    width: 4px;
    height: 100%;
    background: var(--card-accent, #087443);
    opacity: .85;
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
    background: var(--card-glow, rgba(22, 163, 74, .055));
    pointer-events: none;
}

.lifecycle-card:hover {
    transform: translateY(-6px);
    border-color: var(--card-accent, #087443);
    box-shadow: 0 17px 36px rgba(15, 70, 40, .13);
}

.lifecycle-card:hover::before {
    width: 6px;
}

/* Card color identities */

.passport-card {
    --card-accent: #16834a;
    --card-glow: rgba(22, 163, 74, .09);
}

.warranty-card {
    --card-accent: #2563eb;
    --card-glow: rgba(37, 99, 235, .08);
}

.maintenance-card {
    --card-accent: #d97706;
    --card-glow: rgba(217, 119, 6, .08);
}

.repair-card {
    --card-accent: #dc4545;
    --card-glow: rgba(220, 69, 69, .08);
}

.history-card {
    --card-accent: #9333ea;
    --card-glow: rgba(147, 51, 234, .06);
}

.recycle-card {
    --card-accent: #0d9488;
    --card-glow: rgba(13, 148, 136, .08);
}

/* Step number */

.step-number {
    position: absolute;
    top: 17px;
    right: 20px;
    color: #dce5df;
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

.lifecycle-card:hover .card-icon {
    transform: translateY(-3px) scale(1.06);
}

.passport-card .card-icon {
    background: #dcfce7;
    color: #087443;
    border: 1px solid #b7ebc7;
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
    background: #ccfbf1;
    color: #0f766e;
    border: 1px solid #99f6e4;
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
    color: var(--card-accent, #087443);
    font-size: 10px;
    font-weight: 900;
    letter-spacing: .85px;
}

.card-content h3 {
    margin: 0 0 10px;
    color: #163b29;
    font-size: 19px;
    line-height: 1.35;
    font-weight: 850;
}

.card-content p {
    max-width: 410px;
    min-height: 42px;
    margin: 0 0 19px;
    color: #52675b;
    font-size: 12px;
    line-height: 1.75;
}

.card-action {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    color: var(--card-accent, #087443);
    font-size: 12px;
    font-weight: 900;
}

.card-action i {
    transition: transform .25s ease;
}

.lifecycle-card:hover .card-action i {
    transform: translateX(5px);
}

.card-action.disabled {
    color: #64756a;
}

/* ==========================================
   DISABLED CARDS
========================================== */

.disabled-card {
    cursor: default;
    background: linear-gradient(135deg, #ffffff, #f7f9f8);
    border-style: dashed;
}

.disabled-card::before {
    opacity: .5;
}

.disabled-card .card-icon {
    opacity: .9;
}

.disabled-card .card-content h3 {
    color: #34483b;
}

.disabled-card .card-content p {
    color: #64756a;
}

.disabled-card:hover {
    transform: none;
    border-color: #dce7df;
    box-shadow: 0 7px 23px rgba(20, 60, 40, .065);
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
    border-top: 1px solid #dce8df;
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
    color: #344b3b;
    background: #ffffff;
    border: 1px solid #cbdacf;
}

.back-btn:hover {
    background: #edf7ef;
    color: #14532d;
    border-color: #86c99c;
    transform: translateY(-2px);
}

.details-btn {
    color: #ffffff;
    background: linear-gradient(135deg, #075b38, #12864e);
    border: 1px solid #075b38;
    box-shadow: 0 7px 17px rgba(5, 100, 55, .19);
}

.details-btn:hover {
    color: #ffffff;
    background: #06472d;
    transform: translateY(-2px);
    box-shadow: 0 11px 23px rgba(5, 100, 55, .26);
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
        max-width: 300px;
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
