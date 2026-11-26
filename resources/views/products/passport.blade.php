
@extends('layouts.app')

@section('title', 'Digital Product Passport - ProductLife')
@section('page_title', 'Digital Product Passport')
@section('page_subtitle', 'Complete identity and lifecycle record of your product')

@section('content')

<div class="passport-page">

    {{-- ==========================================
         PASSPORT HERO
    =========================================== --}}
    <div class="passport-hero">

        <div class="hero-decoration hero-decoration-one"></div>
        <div class="hero-decoration hero-decoration-two"></div>

        <div class="passport-hero-content">

            <span class="passport-label">
                <i class="bi bi-patch-check-fill"></i>
                DIGITAL PRODUCT PASSPORT
            </span>

            <h1>{{ $product->brand }} {{ $product->model }}</h1>

            <p>
                Your product identity, ownership and lifecycle information
                securely organised in one place.
            </p>

            <div class="passport-number">
                <span><i class="bi bi-fingerprint"></i> Passport ID</span>
                <strong>{{ $passport->passport_number }}</strong>
            </div>

        </div>

        <div class="passport-icon">
            <i class="bi bi-postcard-fill"></i>
            <span class="passport-icon-check">
                <i class="bi bi-check-lg"></i>
            </span>
        </div>

    </div>


    {{-- ==========================================
         PRODUCT IDENTITY + PASSPORT
    =========================================== --}}
    <div class="passport-grid">

        {{-- PRODUCT IDENTITY --}}
        <div class="passport-card identity-card">

            <div class="card-heading">
                <div class="heading-icon">
                    <i class="bi bi-box-seam-fill"></i>
                </div>

                <div>
                    <h3>Product Identity</h3>
                    <p>Basic product identification details</p>
                </div>
            </div>

            <div class="passport-row">
                <span>Brand</span>
                <strong>{{ $product->brand }}</strong>
            </div>

            <div class="passport-row">
                <span>Model</span>
                <strong>{{ $product->model }}</strong>
            </div>

            <div class="passport-row">
                <span>Category</span>
                <strong>{{ $product->category }}</strong>
            </div>

            <div class="passport-row">
                <span>Serial Number</span>
                <strong>{{ $product->serial_number }}</strong>
            </div>

            <div class="passport-row">
                <span>Product Status</span>
                <strong class="text-status">
                    {{ ucfirst($product->status ?? 'Active') }}
                </strong>
            </div>

        </div>


        {{-- PASSPORT INFORMATION --}}
        <div class="passport-card passport-info-card">

            <div class="card-heading">
                <div class="heading-icon">
                    <i class="bi bi-shield-lock-fill"></i>
                </div>

                <div>
                    <h3>Passport Information</h3>
                    <p>Digital passport registration details</p>
                </div>
            </div>

            <div class="passport-row">
                <span>Passport Number</span>
                <strong>{{ $passport->passport_number }}</strong>
            </div>

            <div class="passport-row">
                <span>Status</span>

                <strong class="{{ $passport->status === 'active' ? 'status-active' : 'status-inactive' }}">
                    {{ ucfirst($passport->status ?? 'Unknown') }}
                </strong>
            </div>

            <div class="passport-row">
                <span>Created</span>

                <strong>
                    {{ $passport->created_at?->format('d M Y') }}
                </strong>
            </div>

            <div class="passport-row">
                <span>Description</span>

                <strong>
                    {{ $passport->description ?? 'Digital Product Passport' }}
                </strong>
            </div>

        </div>

    </div>


    {{-- ==========================================
         PURCHASE INFORMATION
    =========================================== --}}
    <div class="passport-card full-card purchase-card">

        <div class="card-heading">
            <div class="heading-icon">
                <i class="bi bi-cart-check-fill"></i>
            </div>

            <div>
                <h3>Purchase Information</h3>
                <p>Product purchase and pricing details</p>
            </div>
        </div>

        <div class="passport-grid inner-grid">

            <div class="info-highlight purchase-date-box">
                <span class="highlight-icon">
                    <i class="bi bi-calendar-event"></i>
                </span>

                <div>
                    <small>Purchase Date</small>
                    <strong>
                        {{ $product->purchase_date?->format('d M Y') ?? 'Not available' }}
                    </strong>
                </div>
            </div>

            <div class="info-highlight purchase-price-box">
                <span class="highlight-icon">
                    <i class="bi bi-currency-rupee"></i>
                </span>

                <div>
                    <small>Purchase Price</small>
                    <strong>
                        ₹{{ number_format($product->purchase_price ?? 0, 2) }}
                    </strong>
                </div>
            </div>

        </div>

    </div>


    {{-- ==========================================
         WARRANTY INFORMATION
    =========================================== --}}
    <div class="passport-card full-card warranty-card">

        <div class="card-heading">
            <div class="heading-icon">
                <i class="bi bi-shield-check"></i>
            </div>

            <div>
                <h3>Warranty Information</h3>
                <p>Product protection and warranty coverage</p>
            </div>
        </div>

        @if($warranty)

            <div class="passport-row">
                <span>Warranty Status</span>
                <strong class="status-active">Active</strong>
            </div>

            @if(isset($warranty->start_date))
                <div class="passport-row">
                    <span>Start Date</span>

                    <strong>
                        {{ \Carbon\Carbon::parse($warranty->start_date)->format('d M Y') }}
                    </strong>
                </div>
            @endif

            @if(isset($warranty->end_date))
                <div class="passport-row">
                    <span>End Date</span>

                    <strong>
                        {{ \Carbon\Carbon::parse($warranty->end_date)->format('d M Y') }}
                    </strong>
                </div>
            @endif

        @else

            <div class="empty-record">
                <div class="empty-record-icon">
                    <i class="bi bi-shield-exclamation"></i>
                </div>

                <div>
                    <strong>No Warranty Information</strong>
                    <p>No warranty information has been added yet.</p>
                </div>
            </div>

        @endif

    </div>


    {{-- ==========================================
         MAINTENANCE HISTORY
    =========================================== --}}
    <div class="passport-card full-card maintenance-card">

        <div class="card-heading">
            <div class="heading-icon">
                <i class="bi bi-calendar2-check-fill"></i>
            </div>

            <div>
                <h3>Maintenance History</h3>
                <p>Recorded maintenance and product care activities</p>
            </div>

            <span class="record-count">
                {{ $maintenances->count() }} Records
            </span>
        </div>

        @if($maintenances->count())

            <div class="record-list">

                @foreach($maintenances as $maintenance)

                    <div class="record-item">

                        <div class="record-left">
                            <div class="record-icon">
                                <i class="bi bi-wrench-adjustable-circle"></i>
                            </div>

                            <div>
                                <div class="record-title">
                                    {{ $maintenance->title ?? 'Maintenance Record' }}
                                </div>

                                <div class="record-date">
                                    <i class="bi bi-calendar3"></i>
                                    {{ $maintenance->created_at?->format('d M Y') }}
                                </div>
                            </div>
                        </div>

                        <span class="record-badge">
                            {{ ucfirst($maintenance->status ?? 'Recorded') }}
                        </span>

                    </div>

                @endforeach

            </div>

        @else

            <div class="empty-record">
                <div class="empty-record-icon">
                    <i class="bi bi-calendar-x"></i>
                </div>

                <div>
                    <strong>No Maintenance Records</strong>
                    <p>No maintenance activities have been recorded yet.</p>
                </div>
            </div>

        @endif

    </div>


    {{-- ==========================================
         REPAIR HISTORY
    =========================================== --}}
    <div class="passport-card full-card repair-card">

        <div class="card-heading">
            <div class="heading-icon">
                <i class="bi bi-tools"></i>
            </div>

            <div>
                <h3>Repair History</h3>
                <p>Product repair requests and service records</p>
            </div>

            <span class="record-count">
                {{ $repairRequests->count() }} Records
            </span>
        </div>

        @if($repairRequests->count())

            <div class="record-list">

                @foreach($repairRequests as $repair)

                    <div class="record-item">

                        <div class="record-left">
                            <div class="record-icon">
                                <i class="bi bi-tools"></i>
                            </div>

                            <div>
                                <div class="record-title">
                                    {{ $repair->issue_title ?? $repair->title ?? 'Repair Request' }}
                                </div>

                                <div class="record-date">
                                    <i class="bi bi-calendar3"></i>
                                    {{ $repair->created_at?->format('d M Y') }}
                                </div>
                            </div>
                        </div>

                        <span class="record-badge repair-badge">
                            {{ ucfirst($repair->status ?? 'Requested') }}
                        </span>

                    </div>

                @endforeach

            </div>

        @else

            <div class="empty-record">
                <div class="empty-record-icon">
                    <i class="bi bi-tools"></i>
                </div>

                <div>
                    <strong>No Repair History</strong>
                    <p>No repair requests have been recorded yet.</p>
                </div>
            </div>

        @endif

    </div>


    {{-- ==========================================
         PRODUCT LIFECYCLE TIMELINE
    =========================================== --}}
    <div class="passport-card full-card timeline-card">

        <div class="card-heading">
            <div class="heading-icon">
                <i class="bi bi-diagram-3-fill"></i>
            </div>

            <div>
                <h3>Product Lifecycle</h3>
                <p>A quick overview of your product journey</p>
            </div>
        </div>

        <div class="lifecycle-list">

            <div class="timeline-item">

                <div class="timeline-icon purchase-timeline-icon">
                    <i class="bi bi-bag-check-fill"></i>
                </div>

                <div class="timeline-content">
                    <strong>Product Purchased</strong>

                    <span>
                        {{ $product->purchase_date?->format('d M Y') ?? 'Purchase date unavailable' }}
                    </span>
                </div>

                <span class="timeline-tag">PRODUCT</span>

            </div>


            <div class="timeline-item">

                <div class="timeline-icon passport-timeline-icon">
                    <i class="bi bi-postcard-fill"></i>
                </div>

                <div class="timeline-content">
                    <strong>Digital Passport Created</strong>

                    <span>
                        Passport {{ $passport->passport_number }}
                    </span>
                </div>

                <span class="timeline-tag">IDENTITY</span>

            </div>


            <div class="timeline-item">

                <div class="timeline-icon warranty-timeline-icon">
                    <i class="bi bi-shield-check"></i>
                </div>

                <div class="timeline-content">
                    <strong>Warranty</strong>

                    <span>
                        {{ $warranty ? 'Warranty record available' : 'No warranty record yet' }}
                    </span>
                </div>

                <span class="timeline-tag">PROTECTION</span>

            </div>


            <div class="timeline-item">

                <div class="timeline-icon service-timeline-icon">
                    <i class="bi bi-tools"></i>
                </div>

                <div class="timeline-content">
                    <strong>Maintenance & Repair</strong>

                    <span>
                        {{ $maintenances->count() + $repairRequests->count() }}
                        lifecycle record(s)
                    </span>
                </div>

                <span class="timeline-tag">SERVICE</span>

            </div>

        </div>

    </div>


    {{-- ==========================================
         BOTTOM ACTIONS
    =========================================== --}}
    <div class="passport-actions">

        <a
            href="{{ route('products.lifecycle', $product->id) }}"
            class="btn-back"
        >
            <i class="bi bi-arrow-left"></i>
            Back to Lifecycle
        </a>

        <a
            href="{{ route('products.show', $product->id) }}"
            class="btn-product"
        >
            View Product
            <i class="bi bi-arrow-right"></i>
        </a>

    </div>

</div>

@endsection


@push('styles')
<style>

/* ==========================================
   PRODUCTLIFE - DIGITAL PASSPORT
   Premium Purple / Blue / Emerald Theme
========================================== */

.passport-page {
    width: 100%;
    max-width: 1250px;
    margin: 0 auto;
    padding: 10px 0 40px;
    color: #1e1b4b;
}

/* ==========================================
   HERO
========================================== */

.passport-hero {
    position: relative;
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 25px;
    padding: 36px;
    margin-bottom: 24px;
    overflow: hidden;
    border-radius: 23px;
    background: linear-gradient(120deg, #1e1b4b 0%, #4c1d95 48%, #2563eb 100%);
    color: #ffffff;
    box-shadow: 0 14px 35px rgba(49, 46, 129, .23);
}

.passport-hero::before {
    content: "";
    position: absolute;
    inset: 0;
    background: linear-gradient(110deg, transparent 45%, rgba(255,255,255,.07));
    pointer-events: none;
}

.hero-decoration {
    position: absolute;
    border-radius: 50%;
    border: 35px solid rgba(255,255,255,.07);
    pointer-events: none;
}

.hero-decoration-one {
    width: 280px;
    height: 280px;
    right: 70px;
    bottom: -205px;
}

.hero-decoration-two {
    width: 220px;
    height: 220px;
    right: -75px;
    top: -120px;
    background: rgba(255,255,255,.06);
    border: 0;
}

.passport-hero-content {
    position: relative;
    z-index: 2;
    min-width: 0;
}

.passport-label {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 8px 13px;
    margin-bottom: 15px;
    border-radius: 30px;
    background: rgba(255,255,255,.15);
    border: 1px solid rgba(255,255,255,.25);
    color: #ffffff;
    font-size: 10px;
    font-weight: 900;
    letter-spacing: .8px;
}

.passport-hero h1 {
    margin: 0 0 10px;
    color: #ffffff;
    font-size: 31px;
    font-weight: 900;
    letter-spacing: -.7px;
    line-height: 1.3;
    overflow-wrap: anywhere;
}

.passport-hero p {
    max-width: 650px;
    margin: 0;
    color: #e0e7ff;
    font-size: 13px;
    line-height: 1.8;
}

.passport-number {
    display: inline-flex;
    align-items: center;
    flex-wrap: wrap;
    gap: 10px;
    margin-top: 19px;
    padding: 10px 14px;
    border-radius: 10px;
    background: rgba(15, 23, 42, .23);
    border: 1px solid rgba(255,255,255,.17);
    color: #dbeafe;
    font-size: 11px;
    font-weight: 700;
}

.passport-number strong {
    color: #ffffff;
    letter-spacing: 1px;
    overflow-wrap: anywhere;
}

.passport-icon {
    position: relative;
    z-index: 2;
    flex-shrink: 0;
    width: 92px;
    height: 92px;
    border-radius: 24px;
    background: rgba(255,255,255,.15);
    border: 1px solid rgba(255,255,255,.27);
    display: flex;
    align-items: center;
    justify-content: center;
    color: #ffffff;
    font-size: 41px;
    box-shadow: 0 8px 24px rgba(0,0,0,.12);
    backdrop-filter: blur(8px);
}

.passport-icon-check {
    position: absolute;
    right: -8px;
    bottom: -8px;
    width: 30px;
    height: 30px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 50%;
    background: #10b981;
    border: 3px solid #4c1d95;
    color: #ffffff;
    font-size: 15px;
}

/* ==========================================
   GRID AND CARDS
========================================== */

.passport-grid {
    display: grid;
    grid-template-columns: repeat(2, minmax(0, 1fr));
    gap: 20px;
    margin-bottom: 20px;
}

.passport-card {
    position: relative;
    overflow: hidden;
    padding: 24px;
    background: #ffffff;
    border: 1px solid #e0e7ff;
    border-top: 4px solid var(--accent, #7c3aed);
    border-radius: 17px;
    box-shadow: 0 7px 23px rgba(49, 46, 129, .065);
    transition: transform .25s ease, box-shadow .25s ease;
}

.passport-card:hover {
    transform: translateY(-3px);
    box-shadow: 0 13px 28px rgba(49, 46, 129, .11);
}

.identity-card {
    --accent: #059669;
    background: linear-gradient(145deg, #ffffff, #f0fdf7);
}

.passport-info-card {
    --accent: #2563eb;
    background: linear-gradient(145deg, #ffffff, #eff6ff);
}

.full-card {
    margin-bottom: 20px;
}

.purchase-card {
    --accent: #d97706;
    background: linear-gradient(145deg, #ffffff, #fffbeb);
}

.warranty-card {
    --accent: #059669;
    background: linear-gradient(145deg, #ffffff, #f0fdf7);
}

.maintenance-card {
    --accent: #2563eb;
    background: linear-gradient(145deg, #ffffff, #eff6ff);
}

.repair-card {
    --accent: #e04f62;
    background: linear-gradient(145deg, #ffffff, #fff5f6);
}

.timeline-card {
    --accent: #9333ea;
    background: linear-gradient(145deg, #ffffff, #faf5ff);
}

/* ==========================================
   CARD HEADINGS
========================================== */

.card-heading {
    display: flex;
    align-items: center;
    gap: 12px;
    padding-bottom: 16px;
    margin-bottom: 7px;
    border-bottom: 1px solid #e5e7eb;
}

.card-heading > div:nth-child(2) {
    flex: 1;
    min-width: 0;
}

.heading-icon {
    width: 42px;
    height: 42px;
    flex-shrink: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 12px;
    background: color-mix(in srgb, var(--accent) 13%, white);
    color: var(--accent);
    font-size: 19px;
}

.card-heading h3 {
    margin: 0;
    color: #1e1b4b;
    font-size: 15px;
    font-weight: 900;
}

.card-heading p {
    margin: 4px 0 0;
    color: #64748b;
    font-size: 10px;
    line-height: 1.5;
}

/* ==========================================
   INFORMATION ROWS
========================================== */

.passport-row {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    gap: 20px;
    padding: 13px 2px;
    border-bottom: 1px solid #e5eaf2;
    font-size: 12px;
}

.passport-row:last-child {
    border-bottom: 0;
}

.passport-row span {
    color: #64748b;
    font-weight: 700;
}

.passport-row strong {
    color: #1e293b;
    text-align: right;
    font-size: 12px;
    font-weight: 850;
    overflow-wrap: anywhere;
}

.text-status {
    color: #059669 !important;
}

.status-active,
.status-inactive {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    padding: 5px 10px;
    border-radius: 7px;
    font-size: 10px !important;
    font-weight: 900 !important;
}

.status-active {
    color: #047857 !important;
    background: #d1fae5;
    border: 1px solid #a7f3d0;
}

.status-inactive {
    color: #be123c !important;
    background: #ffe4e6;
    border: 1px solid #fecdd3;
}

/* ==========================================
   PURCHASE HIGHLIGHTS
========================================== */

.inner-grid {
    margin: 0;
    gap: 14px;
}

.info-highlight {
    display: flex;
    align-items: center;
    gap: 13px;
    min-width: 0;
    padding: 17px;
    border-radius: 13px;
    border: 1px solid #e5e7eb;
    background: #ffffff;
}

.highlight-icon {
    width: 44px;
    height: 44px;
    flex-shrink: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 12px;
    font-size: 19px;
}

.purchase-date-box .highlight-icon {
    background: #dbeafe;
    color: #2563eb;
}

.purchase-price-box .highlight-icon {
    background: #d1fae5;
    color: #059669;
}

.info-highlight small {
    display: block;
    margin-bottom: 5px;
    color: #64748b;
    font-size: 10px;
    font-weight: 800;
    text-transform: uppercase;
    letter-spacing: .5px;
}

.info-highlight strong {
    display: block;
    color: #1e1b4b;
    font-size: 16px;
    font-weight: 900;
    overflow-wrap: anywhere;
}

/* ==========================================
   EMPTY RECORD
========================================== */

.empty-record {
    display: flex;
    align-items: center;
    gap: 13px;
    padding: 19px;
    margin-top: 15px;
    border-radius: 13px;
    background: #f8fafc;
    border: 1px dashed #cbd5e1;
}

.empty-record-icon {
    width: 42px;
    height: 42px;
    flex-shrink: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 12px;
    background: #ede9fe;
    color: #6d28d9;
    font-size: 19px;
}

.empty-record strong {
    display: block;
    color: #334155;
    font-size: 12px;
    font-weight: 900;
}

.empty-record p {
    margin: 4px 0 0;
    color: #64748b;
    font-size: 11px;
}

/* ==========================================
   RECORD LIST
========================================== */

.record-count {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    padding: 7px 11px;
    border-radius: 30px;
    background: #dbeafe;
    color: #1d4ed8;
    border: 1px solid #bfdbfe;
    font-size: 10px;
    font-weight: 900;
    white-space: nowrap;
}

.maintenance-card .record-count {
    background: #dbeafe;
    color: #1d4ed8;
    border-color: #bfdbfe;
}

.repair-card .record-count {
    background: #ffe4e6;
    color: #be123c;
    border-color: #fecdd3;
}

.record-list {
    margin-top: 10px;
}

.record-item {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 15px;
    padding: 15px 4px;
    border-bottom: 1px solid #e5eaf2;
}

.record-item:last-child {
    border-bottom: 0;
}

.record-left {
    display: flex;
    align-items: center;
    gap: 12px;
    min-width: 0;
}

.record-icon {
    width: 42px;
    height: 42px;
    flex-shrink: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 12px;
    background: #dbeafe;
    color: #2563eb;
    font-size: 17px;
}

.repair-card .record-icon {
    background: #ffe4e6;
    color: #e11d48;
}

.record-title {
    color: #1e293b;
    font-size: 13px;
    font-weight: 850;
    overflow-wrap: anywhere;
}

.record-date {
    display: flex;
    align-items: center;
    gap: 5px;
    margin-top: 5px;
    color: #64748b;
    font-size: 10px;
    font-weight: 650;
}

.record-badge {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    padding: 7px 11px;
    border-radius: 30px;
    background: #dbeafe;
    color: #1d4ed8;
    border: 1px solid #bfdbfe;
    font-size: 9px;
    font-weight: 900;
    text-transform: uppercase;
    letter-spacing: .4px;
    white-space: nowrap;
}

.repair-badge {
    background: #ffe4e6;
    color: #be123c;
    border-color: #fecdd3;
}

/* ==========================================
   LIFECYCLE TIMELINE
========================================== */

.lifecycle-list {
    margin-top: 20px;
    padding-left: 3px;
}

.timeline-item {
    display: flex;
    align-items: center;
    gap: 15px;
    position: relative;
    padding-bottom: 26px;
}

.timeline-item:last-child {
    padding-bottom: 0;
}

.timeline-icon {
    position: relative;
    z-index: 2;
    width: 45px;
    height: 45px;
    flex-shrink: 0;
    border-radius: 13px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 18px;
}

.timeline-icon.purchase-timeline-icon {
    background: #d1fae5;
    border: 1px solid #a7f3d0;
    color: #047857;
}

.timeline-icon.passport-timeline-icon {
    background: #ede9fe;
    border: 1px solid #ddd6fe;
    color: #6d28d9;
}

.timeline-icon.warranty-timeline-icon {
    background: #dbeafe;
    border: 1px solid #bfdbfe;
    color: #1d4ed8;
}

.timeline-icon.service-timeline-icon {
    background: #ffedd5;
    border: 1px solid #fed7aa;
    color: #c2410c;
}

.timeline-item:not(:last-child)::after {
    content: "";
    position: absolute;
    left: 21px;
    top: 45px;
    width: 2px;
    height: calc(100% - 17px);
    background: linear-gradient(180deg, #a5b4fc, #c4b5fd);
}

.timeline-content {
    flex: 1;
    min-width: 0;
}

.timeline-content strong {
    display: block;
    color: #1e1b4b;
    font-size: 13px;
    font-weight: 900;
    margin-bottom: 5px;
}

.timeline-content span {
    color: #64748b;
    font-size: 11px;
    font-weight: 650;
}

.timeline-tag {
    display: inline-flex;
    padding: 6px 9px;
    border-radius: 7px;
    background: #f1f5f9;
    color: #475569;
    font-size: 9px;
    font-weight: 900;
    letter-spacing: .5px;
    white-space: nowrap;
}

/* ==========================================
   BOTTOM ACTIONS
========================================== */

.passport-actions {
    display: flex;
    justify-content: space-between;
    gap: 14px;
    margin-top: 24px;
    padding-top: 20px;
    border-top: 1px solid #e0e7ff;
}

.btn-back,
.btn-product {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 9px;
    padding: 13px 19px;
    border-radius: 12px;
    text-decoration: none !important;
    font-size: 12px;
    font-weight: 850;
    transition: all .22s ease;
}

.btn-back {
    background: #eef2ff;
    color: #4338ca !important;
    border: 1px solid #c7d2fe;
}

.btn-back:hover {
    color: #3730a3 !important;
    background: #e0e7ff;
    border-color: #818cf8;
    transform: translateY(-2px);
}

.btn-product {
    background: linear-gradient(120deg, #6d28d9, #2563eb);
    color: #ffffff !important;
    border: 1px solid #5b21b6;
    box-shadow: 0 6px 16px rgba(79, 70, 229, .23);
}

.btn-product:hover {
    color: #ffffff !important;
    background: linear-gradient(120deg, #5b21b6, #1d4ed8);
    transform: translateY(-2px);
    box-shadow: 0 10px 22px rgba(79, 70, 229, .3);
}

/* ==========================================
   RESPONSIVE
========================================== */

@media (max-width: 800px) {

    .passport-grid {
        grid-template-columns: 1fr;
    }

    .passport-hero {
        padding: 28px;
    }

    .passport-hero h1 {
        font-size: 26px;
    }

    .section-heading {
        align-items: flex-start;
    }
}

@media (max-width: 600px) {

    .passport-hero {
        padding: 24px 20px;
    }

    .passport-icon {
        display: none;
    }

    .passport-hero h1 {
        font-size: 23px;
    }

    .passport-card {
        padding: 19px 17px;
    }

    .passport-actions {
        flex-direction: column;
    }

    .btn-back,
    .btn-product {
        width: 100%;
        min-height: 45px;
    }

    .passport-row {
        flex-direction: column;
        gap: 6px;
    }

    .passport-row strong {
        text-align: left;
    }

    .inner-grid {
        grid-template-columns: 1fr;
    }

    .record-item {
        align-items: flex-start;
    }

    .record-count {
        padding: 6px 8px;
        font-size: 9px;
    }

    .card-heading {
        flex-wrap: wrap;
    }

    .timeline-item {
        gap: 11px;
    }

    .timeline-icon {
        width: 40px;
        height: 40px;
    }

    .timeline-item:not(:last-child)::after {
        left: 19px;
        top: 40px;
    }

    .timeline-tag {
        display: none;
    }
}

@media (prefers-reduced-motion: reduce) {
    .passport-card,
    .btn-back,
    .btn-product {
        transition: none !important;
    }
}

</style>
@endpush
