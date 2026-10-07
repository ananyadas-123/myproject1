@extends('layouts.app')

@section('page_title', 'Digital Product Passport')
@section('page_subtitle', 'Complete identity and lifecycle record of your product')

@section('content')

<style>
    .passport-page {
        padding-bottom: 35px;
    }

    .passport-hero {
        position: relative;
        overflow: hidden;
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 25px;
        padding: 30px;
        margin-bottom: 22px;
        border-radius: 24px;
        background: linear-gradient(135deg, #123f30, #176b4d 55%, #23966b);
        color: #fff;
        box-shadow: 0 14px 35px rgba(23, 107, 77, .18);
    }

    .passport-hero::after {
        content: "";
        position: absolute;
        width: 230px;
        height: 230px;
        border-radius: 50%;
        right: -80px;
        top: -100px;
        background: rgba(255,255,255,.08);
    }

    .passport-label {
        display: inline-flex;
        align-items: center;
        gap: 7px;
        padding: 7px 11px;
        border-radius: 999px;
        background: rgba(255,255,255,.12);
        font-size: 11px;
        font-weight: 800;
        letter-spacing: .4px;
        margin-bottom: 12px;
    }

    .passport-hero h1 {
        margin: 0 0 7px;
        font-size: 30px;
        font-weight: 850;
        letter-spacing: -.6px;
    }

    .passport-hero p {
        margin: 0;
        max-width: 650px;
        color: rgba(255,255,255,.78);
        font-size: 13px;
        line-height: 1.7;
    }

    .passport-icon {
        position: relative;
        z-index: 2;
        flex-shrink: 0;
        width: 82px;
        height: 82px;
        border-radius: 23px;
        background: rgba(255,255,255,.13);
        border: 1px solid rgba(255,255,255,.16);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 37px;
    }

    .passport-number {
        margin-top: 16px;
        font-size: 11px;
        color: rgba(255,255,255,.68);
    }

    .passport-number strong {
        color: #fff;
        letter-spacing: .8px;
    }

    .passport-grid {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 20px;
        margin-bottom: 20px;
    }

    .passport-card {
        background: #fff;
        border: 1px solid #e7eee9;
        border-radius: 20px;
        padding: 22px;
        box-shadow: 0 8px 26px rgba(25,60,45,.06);
    }

    .card-heading {
        display: flex;
        align-items: center;
        gap: 9px;
        padding-bottom: 15px;
        margin-bottom: 5px;
        border-bottom: 1px solid #edf2ef;
        color: #19382d;
        font-size: 15px;
        font-weight: 800;
    }

    .card-heading i {
        color: #23966b;
        font-size: 18px;
    }

    .passport-row {
        display: flex;
        justify-content: space-between;
        gap: 20px;
        padding: 12px 0;
        border-bottom: 1px solid #f0f3f1;
        font-size: 12px;
    }

    .passport-row:last-child {
        border-bottom: 0;
    }

    .passport-row span {
        color: #84918b;
    }

    .passport-row strong {
        color: #30473d;
        text-align: right;
        word-break: break-word;
    }

    .status-active {
        color: #15803d !important;
    }

    .status-inactive {
        color: #dc2626 !important;
    }

    .full-card {
        margin-bottom: 20px;
    }

    .lifecycle-list {
        margin-top: 18px;
    }

    .timeline-item {
        display: flex;
        align-items: flex-start;
        gap: 14px;
        position: relative;
        padding-bottom: 22px;
    }

    .timeline-item:last-child {
        padding-bottom: 0;
    }

    .timeline-icon {
        position: relative;
        z-index: 2;
        width: 40px;
        height: 40px;
        flex-shrink: 0;
        border-radius: 12px;
        background: #ecfdf5;
        color: #176b4d;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 17px;
    }

    .timeline-item:not(:last-child)::after {
        content: "";
        position: absolute;
        left: 19px;
        top: 40px;
        width: 2px;
        height: calc(100% - 18px);
        background: #dcebe4;
    }

    .timeline-content {
        padding-top: 2px;
    }

    .timeline-content strong {
        display: block;
        color: #263f34;
        font-size: 13px;
        margin-bottom: 4px;
    }

    .timeline-content span {
        color: #8a9791;
        font-size: 11px;
    }

    .empty-record {
        padding: 18px;
        margin-top: 16px;
        border-radius: 13px;
        background: #f8faf9;
        color: #839088;
        text-align: center;
        font-size: 12px;
    }

    .record-list {
        margin-top: 15px;
    }

    .record-item {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 15px;
        padding: 14px 0;
        border-bottom: 1px solid #edf2ef;
    }

    .record-item:last-child {
        border-bottom: 0;
    }

    .record-title {
        color: #30473d;
        font-size: 12px;
        font-weight: 750;
    }

    .record-date {
        color: #8a9791;
        font-size: 10px;
        margin-top: 3px;
    }

    .record-badge {
        padding: 6px 9px;
        border-radius: 999px;
        background: #f0fdf4;
        color: #15803d;
        font-size: 9px;
        font-weight: 800;
        text-transform: uppercase;
    }

    .passport-actions {
        display: flex;
        justify-content: space-between;
        gap: 12px;
        margin-top: 22px;
    }

    .btn-back,
    .btn-product {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        padding: 12px 17px;
        border-radius: 12px;
        text-decoration: none;
        font-size: 12px;
        font-weight: 800;
        transition: .2s ease;
    }

    .btn-back {
        background: #fff;
        color: #53645c;
        border: 1px solid #dfe8e3;
    }

    .btn-back:hover {
        color: #19382d;
        background: #f8faf9;
    }

    .btn-product {
        background: #176b4d;
        color: #fff;
        border: 1px solid #176b4d;
    }

    .btn-product:hover {
        color: #fff;
        background: #12583e;
        transform: translateY(-1px);
    }

    @media (max-width: 800px) {
        .passport-grid {
            grid-template-columns: 1fr;
        }

        .passport-hero {
            padding: 24px;
        }

        .passport-hero h1 {
            font-size: 24px;
        }
    }

    @media (max-width: 600px) {
        .passport-icon {
            display: none;
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
            gap: 5px;
        }

        .passport-row strong {
            text-align: left;
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