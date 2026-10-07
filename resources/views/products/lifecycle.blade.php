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

/* =========================================================
   PAGE
========================================================= */

.lifecycle-page {
    width: 100%;
    max-width: 1180px;
    margin: 0 auto;
}


/* =========================================================
   PRODUCT HERO
========================================================= */

.product-hero {
    position: relative;

    display: flex;
    align-items: center;

    gap: 28px;

    padding: 28px;

    margin-bottom: 30px;

    background:
        linear-gradient(
            135deg,
            rgba(255,255,255,.98),
            rgba(248,252,250,.96)
        );

    border: 1px solid #e4ebe7;

    border-radius: 24px;

    box-shadow:
        0 12px 35px rgba(15,23,42,.055);

    overflow: hidden;
}

.product-hero::after {
    content: "";

    position: absolute;

    width: 240px;
    height: 240px;

    right: -100px;
    top: -120px;

    border-radius: 50%;

    background: rgba(22,163,74,.055);

    pointer-events: none;
}


/* =========================================================
   PRODUCT IMAGE
========================================================= */

.product-visual {
    position: relative;

    width: 155px;
    height: 155px;

    flex-shrink: 0;

    display: flex;
    align-items: center;
    justify-content: center;

    overflow: hidden;

    border-radius: 22px;

    background:
        linear-gradient(
            145deg,
            #f3f7f5,
            #e9f0ed
        );

    border: 1px solid #e1e9e5;

    color: #94a3b8;

    font-size: 46px;

    z-index: 1;
}

.product-visual img {
    width: 100%;
    height: 100%;

    object-fit: cover;
}

.no-product-image {
    display: flex;
    align-items: center;
    justify-content: center;

    width: 100%;
    height: 100%;
}


/* =========================================================
   PRODUCT INFO
========================================================= */

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

    padding: 6px 11px;

    margin-bottom: 9px;

    border-radius: 30px;

    background: #ecfdf3;

    color: #15803d;

    font-size: 10px;
    font-weight: 800;

    text-transform: uppercase;
    letter-spacing: .5px;
}

.product-main-info h1 {
    margin: 0 0 8px;

    color: #172033;

    font-size: 31px;
    line-height: 1.2;

    font-weight: 800;

    letter-spacing: -.5px;
}

.serial-line {
    display: flex;
    align-items: center;

    gap: 7px;

    margin: 0;

    color: #8a94a3;

    font-size: 13px;
}

.serial-line i {
    color: #667085;
    font-size: 14px;
}

.serial-line strong {
    color: #475467;
    font-weight: 800;
}


/* =========================================================
   HERO STATUS
========================================================= */

.hero-status {
    display: inline-flex;
    align-items: center;

    gap: 7px;

    padding: 8px 12px;

    border-radius: 30px;

    background: #ecfdf3;

    border: 1px solid #d1fae5;

    color: #15803d;

    font-size: 11px;
    font-weight: 800;

    white-space: nowrap;
}

.status-dot {
    width: 7px;
    height: 7px;

    border-radius: 50%;

    background: #22c55e;

    box-shadow: 0 0 0 4px rgba(34,197,94,.12);
}


/* =========================================================
   META
========================================================= */

.product-meta-row {
    display: flex;
    align-items: center;
    flex-wrap: wrap;

    gap: 24px;

    margin-top: 24px;

    padding-top: 18px;

    border-top: 1px solid #edf1ef;
}

.meta-item {
    display: flex;
    flex-direction: column;

    gap: 4px;
}

.meta-item span {
    color: #98a2b3;

    font-size: 9px;
    font-weight: 800;

    text-transform: uppercase;
    letter-spacing: .55px;
}

.meta-item strong {
    color: #344054;

    font-size: 13px;
    font-weight: 800;
}

.meta-item .active-status {
    color: #16a34a;
}

.meta-divider {
    width: 1px;
    height: 28px;

    background: #e8edf0;
}


/* =========================================================
   SECTION HEADING
========================================================= */

.section-heading {
    display: flex;
    align-items: flex-end;
    justify-content: space-between;

    gap: 25px;

    margin-bottom: 18px;
}

.section-label {
    display: flex;
    align-items: center;

    gap: 6px;

    margin-bottom: 6px;

    color: #15803d;

    font-size: 10px;
    font-weight: 800;

    letter-spacing: .7px;
}

.section-label i {
    font-size: 12px;
}

.section-heading h2 {
    margin: 0;

    color: #172033;

    font-size: 24px;
    font-weight: 800;

    letter-spacing: -.3px;
}

.section-heading p {
    margin: 5px 0 0;

    color: #98a2b3;

    font-size: 13px;
}


/* =========================================================
   PROGRESS
========================================================= */

.lifecycle-progress {
    min-width: 180px;

    display: flex;
    align-items: center;

    gap: 9px;

    padding-bottom: 2px;
}

.lifecycle-progress span {
    color: #98a2b3;

    font-size: 10px;
    font-weight: 700;
}

.lifecycle-progress strong {
    color: #344054;

    font-size: 11px;
    font-weight: 800;
}

.progress-track {
    flex: 1;

    height: 5px;

    overflow: hidden;

    border-radius: 10px;

    background: #e8eee9;
}

.progress-fill {
    width: 66.66%;
    height: 100%;

    border-radius: inherit;

    background: linear-gradient(
        90deg,
        #176b4d,
        #22a06b
    );
}


/* =========================================================
   LIFECYCLE GRID
========================================================= */

.lifecycle-grid {
    display: grid;

    grid-template-columns:
        repeat(2, minmax(0, 1fr));

    gap: 18px;
}


/* =========================================================
   LIFECYCLE CARD
========================================================= */

.lifecycle-card {
    position: relative;

    display: flex;

    gap: 17px;

    min-height: 218px;

    padding: 24px;

    overflow: hidden;

    border: 1px solid #e6ebef;

    border-radius: 21px;

    background: #ffffff;

    text-decoration: none;
    color: inherit;

    transition:
        transform .25s ease,
        box-shadow .25s ease,
        border-color .25s ease;

    box-shadow:
        0 8px 25px rgba(15,23,42,.035);
}

.lifecycle-card::after {
    content: "";

    position: absolute;

    width: 125px;
    height: 125px;

    right: -45px;
    bottom: -50px;

    border-radius: 50%;

    background: rgba(22,163,74,.035);

    pointer-events: none;
}

.lifecycle-card:hover {
    transform: translateY(-5px);

    border-color: #cfe2d7;

    box-shadow:
        0 18px 38px rgba(15,23,42,.085);
}


/* =========================================================
   STEP NUMBER
========================================================= */

.step-number {
    position: absolute;

    top: 17px;
    right: 20px;

    color: #d8dee5;

    font-size: 22px;
    line-height: 1;

    font-weight: 900;

    letter-spacing: -.8px;
}


/* =========================================================
   CARD ICON
========================================================= */

.card-icon {
    width: 54px;
    height: 54px;

    flex-shrink: 0;

    display: flex;
    align-items: center;
    justify-content: center;

    border-radius: 16px;

    font-size: 21px;
}

.passport-card .card-icon {
    background: #ecfdf3;
    color: #15803d;
}

.warranty-card .card-icon {
    background: #eff6ff;
    color: #2563eb;
}

.maintenance-card .card-icon {
    background: #fff7ed;
    color: #ea580c;
}

.repair-card .card-icon {
    background: #fef2f2;
    color: #dc2626;
}

.history-card .card-icon {
    background: #faf5ff;
    color: #9333ea;
}

.recycle-card .card-icon {
    background: #f0fdf4;
    color: #16a34a;
}


/* =========================================================
   CARD CONTENT
========================================================= */

.card-content {
    position: relative;
    z-index: 2;

    flex: 1;

    padding-right: 18px;
}

.card-step {
    display: block;

    margin-bottom: 7px;

    color: #98a2b3;

    font-size: 9px;
    font-weight: 800;

    letter-spacing: .65px;
}

.card-content h3 {
    margin: 0 0 8px;

    color: #172033;

    font-size: 18px;
    line-height: 1.3;

    font-weight: 800;
}

.card-content p {
    max-width: 410px;

    margin: 0 0 17px;

    color: #7a8595;

    font-size: 12px;
    line-height: 1.7;
}

.card-action {
    display: inline-flex;
    align-items: center;

    gap: 7px;

    color: #15803d;

    font-size: 11px;
    font-weight: 800;
}

.card-action i {
    transition: transform .2s ease;
}

.lifecycle-card:hover .card-action i {
    transform: translateX(4px);
}

.card-action.disabled {
    color: #98a2b3;
}


/* =========================================================
   DISABLED CARDS
========================================================= */

.disabled-card {
    cursor: default;

    background:
        linear-gradient(
            135deg,
            #ffffff,
            #fafbfc
        );
}

.disabled-card:hover {
    transform: none;

    border-color: #e6ebef;

    box-shadow:
        0 8px 25px rgba(15,23,42,.035);
}


/* =========================================================
   BOTTOM ACTIONS
========================================================= */

.bottom-actions {
    display: flex;
    align-items: center;
    justify-content: space-between;

    gap: 12px;

    margin-top: 25px;

    padding-bottom: 5px;
}

.back-btn,
.details-btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;

    gap: 8px;

    padding: 12px 18px;

    border-radius: 12px;

    text-decoration: none;

    font-size: 12px;
    font-weight: 800;

    transition: .2s ease;
}

.back-btn {
    color: #475467;

    background: #ffffff;

    border: 1px solid #e2e8f0;
}

.details-btn {
    color: #ffffff;

    background: #176b4d;

    border: 1px solid #176b4d;

    box-shadow:
        0 7px 16px rgba(23,107,77,.14);
}

.back-btn:hover {
    background: #f8fafc;
    color: #344054;

    transform: translateY(-1px);
}

.details-btn:hover {
    background: #12583e;
    color: #ffffff;

    transform: translateY(-1px);

    box-shadow:
        0 10px 20px rgba(23,107,77,.18);
}


/* =========================================================
   RESPONSIVE
========================================================= */

@media (max-width: 900px) {

    .lifecycle-grid {
        grid-template-columns: 1fr;
    }

    .product-hero {
        align-items: flex-start;
    }

    .lifecycle-progress {
        min-width: 160px;
    }
}


@media (max-width: 700px) {

    .hero-top-row {
        flex-direction: column;
        gap: 12px;
    }

    .hero-status {
        align-self: flex-start;
    }

    .section-heading {
        align-items: flex-start;
        flex-direction: column;
    }

    .lifecycle-progress {
        width: 100%;
        max-width: 260px;
    }
}


@media (max-width: 600px) {

    .product-hero {
        flex-direction: column;

        padding: 21px;

        gap: 20px;
    }

    .product-visual {
        width: 120px;
        height: 120px;
    }

    .product-main-info h1 {
        font-size: 25px;
    }

    .product-meta-row {
        gap: 15px;
    }

    .meta-divider {
        display: none;
    }

    .lifecycle-card {
        min-height: auto;

        padding: 21px;
    }

    .card-content {
        padding-right: 5px;
    }

    .step-number {
        right: 17px;
    }

    .bottom-actions {
        flex-direction: column;
        align-items: stretch;
    }

    .back-btn,
    .details-btn {
        width: 100%;
    }
}

</style>

@endpush