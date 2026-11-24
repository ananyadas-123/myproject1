@extends('layouts.app')

@section('page_title', 'Digital Product Passport')
@section('page_subtitle', 'Complete identity and lifecycle record of your product')

@section('content')

<style>

/* ===== MAIN PAGE ===== */
.passport-page {
    padding: 10px 0 40px;
    color: #263b32;
}

/* ===== HERO ===== */
.passport-hero {
    position: relative;
    overflow: hidden;
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 25px;
    padding: 34px;
    margin-bottom: 24px;
    border-radius: 22px;
    background: linear-gradient(125deg, #103c30, #087b59 55%, #13a477);
    color: #fff !important;
    box-shadow: 0 14px 35px rgba(8, 100, 68, .22);
}

.passport-hero::before {
    content: "";
    position: absolute;
    width: 260px;
    height: 260px;
    right: 80px;
    bottom: -190px;
    border: 35px solid rgba(255,255,255,.08);
    border-radius: 50%;
}

.passport-hero::after {
    content: "";
    position: absolute;
    width: 220px;
    height: 220px;
    right: -65px;
    top: -110px;
    border-radius: 50%;
    background: rgba(255,255,255,.08);
}

.passport-hero > div:first-child {
    position: relative;
    z-index: 2;
}

.passport-label {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 8px 13px;
    margin-bottom: 15px;
    border-radius: 30px;
    background: rgba(255,255,255,.16);
    border: 1px solid rgba(255,255,255,.25);
    color: #fff !important;
    font-size: 11px;
    font-weight: 800;
    letter-spacing: .5px;
}

.passport-hero h1 {
    margin: 0 0 10px;
    color: #fff !important;
    font-size: 30px;
    font-weight: 850;
    letter-spacing: -.7px;
    line-height: 1.3;
}

.passport-hero p {
    margin: 0;
    max-width: 650px;
    color: #e0f5e9 !important;
    font-size: 13px;
    line-height: 1.8;
}

.passport-number {
    margin-top: 18px;
    color: #d0eadc !important;
    font-size: 11px;
    font-weight: 600;
}

.passport-number strong {
    color: #fff !important;
    letter-spacing: 1px;
    margin-left: 5px;
}

.passport-icon {
    position: relative;
    z-index: 2;
    flex-shrink: 0;
    width: 88px;
    height: 88px;
    border-radius: 23px;
    background: rgba(255,255,255,.16);
    border: 1px solid rgba(255,255,255,.28);
    display: flex;
    align-items: center;
    justify-content: center;
    color: #fff !important;
    font-size: 39px;
    box-shadow: 0 8px 24px rgba(0,0,0,.12);
}

/* ===== TWO COLUMN GRID ===== */
.passport-grid {
    display: grid;
    grid-template-columns: repeat(2, minmax(0, 1fr));
    gap: 20px;
    margin-bottom: 20px;
}

/* ===== ALL CARDS ===== */
.passport-card {
    position: relative;
    overflow: hidden;
    padding: 23px;
    background: #fff;
    border: 1px solid #dce8e0;
    border-top: 4px solid #12a477;
    border-radius: 17px;
    box-shadow: 0 7px 23px rgba(25, 65, 43, .07);
    transition: .25s ease;
}

.passport-card:hover {
    transform: translateY(-3px);
    box-shadow: 0 13px 28px rgba(25, 65, 43, .12);
}

.passport-grid .passport-card:first-child {
    border-top-color: #10a477;
    background: linear-gradient(145deg, #fff, #f0fbf5);
}

.passport-grid .passport-card:nth-child(2) {
    border-top-color: #4285e8;
    background: linear-gradient(145deg, #fff, #f1f6ff);
}

.full-card {
    margin-bottom: 20px;
}

.full-card:nth-of-type(4) {
    border-top-color: #e5a12b;
    background: linear-gradient(145deg, #fff, #fffbf1);
}

.full-card:nth-of-type(5) {
    border-top-color: #16a477;
    background: linear-gradient(145deg, #fff, #f1fcf6);
}

.full-card:nth-of-type(6) {
    border-top-color: #e46c50;
    background: linear-gradient(145deg, #fff, #fff6f3);
}

.full-card:nth-of-type(7) {
    border-top-color: #8962d5;
    background: linear-gradient(145deg, #fff, #f8f5ff);
}

/* ===== CARD HEADINGS ===== */
.card-heading {
    display: flex;
    align-items: center;
    gap: 11px;
    padding-bottom: 15px;
    margin-bottom: 7px;
    border-bottom: 1px solid #e4ece7;
    color: #19392d !important;
    font-size: 15px;
    font-weight: 850;
}

.card-heading i {
    width: 37px;
    height: 37px;
    flex-shrink: 0;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    border-radius: 11px;
    background: #d9f6e5;
    color: #07834f !important;
    font-size: 18px;
}

.passport-grid .passport-card:nth-child(2) .card-heading i {
    background: #dceaff;
    color: #2868c5 !important;
}

.full-card:nth-of-type(4) .card-heading i {
    background: #fff0ce;
    color: #bd7a0c !important;
}

.full-card:nth-of-type(5) .card-heading i {
    background: #d8f7e6;
    color: #07834f !important;
}

.full-card:nth-of-type(6) .card-heading i {
    background: #ffe4dc;
    color: #d35438 !important;
}

.full-card:nth-of-type(7) .card-heading i {
    background: #eee5ff;
    color: #7950bd !important;
}

/* ===== INFORMATION ROWS ===== */
.passport-row {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    gap: 20px;
    padding: 13px 2px;
    border-bottom: 1px solid #e6eee8;
    font-size: 12px;
}

.passport-row:last-child {
    border-bottom: 0;
}

.passport-row span {
    color: #53695c !important;
    font-weight: 650;
}

.passport-row strong {
    color: #203e30 !important;
    text-align: right;
    font-size: 12px;
    font-weight: 800;
    word-break: break-word;
}

.status-active {
    color: #087b4c !important;
    background: #d9f8e7;
    padding: 4px 9px;
    border-radius: 7px;
}

.status-inactive {
    color: #c52e3b !important;
    background: #ffe3e5;
    padding: 4px 9px;
    border-radius: 7px;
}

/* ===== EMPTY RECORD ===== */
.empty-record {
    padding: 20px 16px;
    margin-top: 16px;
    border-radius: 13px;
    background: linear-gradient(120deg, #eff9f3, #edf4ff);
    border: 1px dashed #b8d7c5;
    color: #435e4c !important;
    text-align: center;
    font-size: 12px;
    font-weight: 600;
}

.empty-record i {
    color: #16865d;
}

/* ===== RECORD LIST ===== */
.record-list {
    margin-top: 13px;
}

.record-item {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 15px;
    padding: 15px 4px;
    border-bottom: 1px solid #e6eee8;
}

.record-item:last-child {
    border-bottom: 0;
}

.record-title {
    color: #263f32 !important;
    font-size: 13px;
    font-weight: 800;
}

.record-date {
    color: #64766b !important;
    font-size: 11px;
    font-weight: 600;
    margin-top: 5px;
}

.record-badge {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    padding: 7px 11px;
    border-radius: 30px;
    background: #dcf7e8;
    color: #087344 !important;
    border: 1px solid #b8e9cc;
    font-size: 9px;
    font-weight: 850;
    text-transform: uppercase;
    letter-spacing: .4px;
    white-space: nowrap;
}

/* ===== TIMELINE ===== */
.lifecycle-list {
    margin-top: 20px;
    padding-left: 3px;
}

.timeline-item {
    display: flex;
    align-items: flex-start;
    gap: 15px;
    position: relative;
    padding-bottom: 25px;
}

.timeline-item:last-child {
    padding-bottom: 0;
}

.timeline-icon {
    position: relative;
    z-index: 2;
    width: 43px;
    height: 43px;
    flex-shrink: 0;
    border-radius: 13px;
    background: #d9f8e7;
    border: 1px solid #b8e9cc;
    color: #07834f !important;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 18px;
}

.timeline-item:nth-child(2) .timeline-icon {
    background: #e2ecff;
    border-color: #c3d5ff;
    color: #2868c5 !important;
}

.timeline-item:nth-child(3) .timeline-icon {
    background: #fff0ce;
    border-color: #f4dda3;
    color: #b87913 !important;
}

.timeline-item:nth-child(4) .timeline-icon {
    background: #eee5ff;
    border-color: #d9c8ff;
    color: #7950bd !important;
}

.timeline-item:not(:last-child)::after {
    content: "";
    position: absolute;
    left: 20px;
    top: 43px;
    width: 2px;
    height: calc(100% - 17px);
    background: #cbded2;
}

.timeline-content {
    padding-top: 3px;
}

.timeline-content strong {
    display: block;
    color: #263f32 !important;
    font-size: 13px;
    font-weight: 850;
    margin-bottom: 5px;
}

.timeline-content span {
    color: #617469 !important;
    font-size: 11px;
    font-weight: 600;
}

/* ===== BOTTOM BUTTONS ===== */
.passport-actions {
    display: flex;
    justify-content: space-between;
    gap: 14px;
    margin-top: 24px;
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
    background: #edf7f1;
    color: #176b4d !important;
    border: 1px solid #b9dcca;
}

.btn-back:hover {
    color: #075c40 !important;
    background: #d9f3e4;
    border-color: #83c7a0;
    transform: translateY(-2px);
}

.btn-product {
    background: linear-gradient(120deg, #087b59, #12a477);
    color: #fff !important;
    border: 1px solid #087b59;
    box-shadow: 0 6px 16px rgba(8, 123, 89, .23);
}

.btn-product:hover {
    color: #fff !important;
    background: linear-gradient(120deg, #075c43, #087b59);
    transform: translateY(-2px);
}

/* ===== RESPONSIVE ===== */
@media (max-width: 800px) {
    .passport-grid {
        grid-template-columns: 1fr;
    }

    .passport-hero {
        padding: 27px;
    }

    .passport-hero h1 {
        font-size: 25px;
    }
}

@media (max-width: 600px) {
    .passport-hero {
        padding: 23px 20px;
    }

    .passport-icon {
        display: none;
    }

    .passport-hero h1 {
        font-size: 22px;
    }

    .passport-actions {
        flex-direction: column;
    }

    .btn-back,
    .btn-product {
        width: 100%;
    }

    .passport-row {
        flex-direction: column;
        gap: 6px;
    }

    .passport-row strong {
        text-align: left;
    }

    .record-item {
        align-items: flex-start;
    }

    .passport-card {
        padding: 19px 17px;
    }
}
</style>


<div class="passport-page">

    {{-- Hero --}}
    <div class="passport-hero">

        <div>

            <span class="passport-label">
                <i class="bi bi-patch-check-fill"></i>
                Digital Product Passport
            </span>

            <h1>
                {{ $product->brand }} {{ $product->model }}
            </h1>

            <p>
                Your product identity, ownership and lifecycle information
                securely organised in one place.
            </p>

            <div class="passport-number">
                Passport ID:
                <strong>{{ $passport->passport_number }}</strong>
            </div>

        </div>

        <div class="passport-icon">
            <i class="bi bi-postcard"></i>
        </div>

    </div>


    {{-- Product + Passport --}}
    <div class="passport-grid">

        {{-- Product Identity --}}
        <div class="passport-card">

            <div class="card-heading">
                <i class="bi bi-box-seam"></i>
                Product Identity
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
                <strong>{{ $product->status ?? 'Active' }}</strong>
            </div>

        </div>


        {{-- Passport Information --}}
        <div class="passport-card">

            <div class="card-heading">
                <i class="bi bi-shield-check"></i>
                Passport Information
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


    {{-- Purchase Information --}}
    <div class="passport-card full-card">

        <div class="card-heading">
            <i class="bi bi-cart-check"></i>
            Purchase Information
        </div>

        <div class="passport-grid" style="margin:0;">

            <div>
                <div class="passport-row">
                    <span>Purchase Date</span>

                    <strong>
                        {{ $product->purchase_date?->format('d M Y') ?? 'Not available' }}
                    </strong>
                </div>
            </div>

            <div>
                <div class="passport-row">
                    <span>Purchase Price</span>

                    <strong>
                        ₹{{ number_format($product->purchase_price ?? 0, 2) }}
                    </strong>
                </div>
            </div>

        </div>

    </div>


    {{-- Warranty --}}
    <div class="passport-card full-card">

        <div class="card-heading">
            <i class="bi bi-shield-check"></i>
            Warranty Information
        </div>

        @if($warranty)

            <div class="passport-row">
                <span>Warranty Status</span>
                <strong class="status-active">
                    Active
                </strong>
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
                <i class="bi bi-info-circle me-1"></i>
                No warranty information has been added yet.
            </div>

        @endif

    </div>


    {{-- Maintenance --}}
    <div class="passport-card full-card">

        <div class="card-heading">
            <i class="bi bi-calendar2-check"></i>
            Maintenance History
        </div>

        @if($maintenances->count())

            <div class="record-list">

                @foreach($maintenances as $maintenance)

                    <div class="record-item">

                        <div>
                            <div class="record-title">
                                {{ $maintenance->title ?? 'Maintenance Record' }}
                            </div>

                            <div class="record-date">
                                {{ $maintenance->created_at?->format('d M Y') }}
                            </div>
                        </div>

                        <span class="record-badge">
                            {{ $maintenance->status ?? 'Recorded' }}
                        </span>

                    </div>

                @endforeach

            </div>

        @else

            <div class="empty-record">
                <i class="bi bi-calendar-x me-1"></i>
                No maintenance records available.
            </div>

        @endif

    </div>


    {{-- Repair --}}
    <div class="passport-card full-card">

        <div class="card-heading">
            <i class="bi bi-tools"></i>
            Repair History
        </div>

        @if($repairRequests->count())

            <div class="record-list">

                @foreach($repairRequests as $repair)

                    <div class="record-item">

                        <div>
                            <div class="record-title">
                                {{ $repair->issue_title ?? $repair->title ?? 'Repair Request' }}
                            </div>

                            <div class="record-date">
                                {{ $repair->created_at?->format('d M Y') }}
                            </div>
                        </div>

                        <span class="record-badge">
                            {{ $repair->status ?? 'Requested' }}
                        </span>

                    </div>

                @endforeach

            </div>

        @else

            <div class="empty-record">
                <i class="bi bi-tools me-1"></i>
                No repair requests recorded yet.
            </div>

        @endif

    </div>


    {{-- Lifecycle Timeline --}}
    <div class="passport-card full-card">

        <div class="card-heading">
            <i class="bi bi-diagram-3"></i>
            Product Lifecycle
        </div>

        <div class="lifecycle-list">

            <div class="timeline-item">

                <div class="timeline-icon">
                    <i class="bi bi-bag-check"></i>
                </div>

                <div class="timeline-content">
                    <strong>Product Purchased</strong>

                    <span>
                        {{ $product->purchase_date?->format('d M Y') ?? 'Purchase date unavailable' }}
                    </span>
                </div>

            </div>


            <div class="timeline-item">

                <div class="timeline-icon">
                    <i class="bi bi-postcard"></i>
                </div>

                <div class="timeline-content">
                    <strong>Digital Passport Created</strong>

                    <span>
                        Passport {{ $passport->passport_number }}
                    </span>
                </div>

            </div>


            <div class="timeline-item">

                <div class="timeline-icon">
                    <i class="bi bi-shield-check"></i>
                </div>

                <div class="timeline-content">
                    <strong>Warranty</strong>

                    <span>
                        {{ $warranty ? 'Warranty record available' : 'No warranty record yet' }}
                    </span>
                </div>

            </div>


            <div class="timeline-item">

                <div class="timeline-icon">
                    <i class="bi bi-tools"></i>
                </div>

                <div class="timeline-content">
                    <strong>Maintenance & Repair</strong>

                    <span>
                        {{ $maintenances->count() + $repairRequests->count() }}
                        lifecycle record(s)
                    </span>
                </div>

            </div>

        </div>

    </div>


    {{-- Actions --}}
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