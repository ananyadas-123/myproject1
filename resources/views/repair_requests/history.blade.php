
@extends('layouts.app')

@section('title', 'Repair History')
@section('page_title', 'Repair History')
@section('page_subtitle', 'Track all your product repair requests.')

@section('content')

@push('styles')
<style>
    .repair-history-page {
        --rh-navy: #172554;
        --rh-purple: #6d28d9;
        --rh-blue: #2563eb;
        --rh-green: #059669;
        --rh-text: #243247;
        --rh-muted: #64748b;
        color: var(--rh-text);
    }

    /* Page Header */
    .repair-history-page .history-header {
        position: relative;
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 18px;
        flex-wrap: wrap;
        padding: 27px 28px;
        margin-bottom: 25px;
        overflow: hidden;
        border-radius: 18px;
        background: linear-gradient(115deg, #172554, #4338ca 55%, #087e8b);
        box-shadow: 0 10px 28px rgba(49, 46, 129, .22);
    }

    .repair-history-page .history-header::before,
    .repair-history-page .history-header::after {
        content: "";
        position: absolute;
        border-radius: 50%;
        background: rgba(255, 255, 255, .07);
        pointer-events: none;
    }

    .repair-history-page .history-header::before {
        width: 210px;
        height: 210px;
        right: 12%;
        top: -130px;
    }

    .repair-history-page .history-header::after {
        width: 140px;
        height: 140px;
        right: 35%;
        bottom: -100px;
    }

    .repair-history-page .history-header > * {
        position: relative;
        z-index: 1;
    }

    .repair-history-page .history-header h3 {
        color: #fff;
        font-size: 25px;
        font-weight: 850;
        margin: 0 0 7px;
        letter-spacing: -.4px;
    }

    .repair-history-page .history-header p {
        color: #dbeafe;
        font-size: 13px;
        margin: 0;
    }

    .repair-history-page .btn-productlife {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        padding: 12px 18px;
        color: #422006;
        background: linear-gradient(135deg, #fbbf24, #f97316);
        border: 0;
        border-radius: 10px;
        font-size: 13px;
        font-weight: 850;
        text-decoration: none;
        box-shadow: 0 5px 15px rgba(249, 115, 22, .25);
        transition: all .25s ease;
    }

    .repair-history-page .btn-productlife:hover {
        color: #fff;
        background: linear-gradient(135deg, #ea580c, #c2410c);
        transform: translateY(-2px);
        box-shadow: 0 9px 20px rgba(234, 88, 12, .3);
    }

    /* Success Alert */
    .repair-history-page .history-success {
        padding: 14px 18px;
        margin-bottom: 20px;
        color: #065f46;
        background: #d1fae5;
        border: 1px solid #6ee7b7;
        border-left: 5px solid #059669;
        border-radius: 11px;
        font-size: 13px;
        font-weight: 700;
    }

    /* Main Repair Card */
    .repair-history-page .repair-history-card {
        position: relative;
        padding: 23px;
        margin-bottom: 22px;
        background: #fff;
        border: 1px solid #e2e8f0;
        border-left: 5px solid #0d9488;
        border-radius: 17px;
        box-shadow: 0 7px 25px rgba(15, 23, 42, .065);
        overflow: hidden;
        transition: all .25s ease;
    }

    .repair-history-page .repair-history-card:hover {
        border-left-color: #6d28d9;
        transform: translateY(-3px);
        box-shadow: 0 14px 33px rgba(15, 23, 42, .11);
    }

    /* Card Top */
    .repair-history-page .repair-card-top {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        gap: 18px;
        padding-bottom: 19px;
        border-bottom: 1px solid #e8edf5;
    }

    .repair-history-page .repair-id {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 6px 10px;
        color: #087e75;
        background: #d7faf1;
        border: 1px solid #a5f3e5;
        border-radius: 7px;
        font-size: 11px;
        font-weight: 850;
    }

    .repair-history-page .repair-card-top h5 {
        color: #172554;
        font-size: 18px;
        font-weight: 850;
        line-height: 1.45;
        margin: 11px 0 7px;
        overflow-wrap: anywhere;
    }

    .repair-history-page .repair-date {
        display: flex;
        align-items: center;
        gap: 6px;
        color: #64748b;
        font-size: 12px;
        margin: 0;
    }

    .repair-history-page .repair-date i {
        color: #2563eb;
    }

    /* Status Badges */
    .repair-history-page .repair-status {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 6px;
        padding: 8px 13px;
        border-radius: 30px;
        font-size: 11px;
        font-weight: 850;
        white-space: nowrap;
        border: 1px solid transparent;
    }

    .repair-history-page .status-pending {
        color: #92400e;
        background: #fef3c7;
        border-color: #fcd34d;
    }

    .repair-history-page .status-assigned {
        color: #1d4ed8;
        background: #dbeafe;
        border-color: #93c5fd;
    }

    .repair-history-page .status-progress {
        color: #6d28d9;
        background: #ede9fe;
        border-color: #c4b5fd;
    }

    .repair-history-page .status-completed {
        color: #047857;
        background: #d1fae5;
        border-color: #6ee7b7;
    }

    .repair-history-page .status-rejected {
        color: #be123c;
        background: #ffe4e6;
        border-color: #fda4af;
    }

    .repair-history-page .status-quoted {
        color: #7e22ce;
        background: #f3e8ff;
        border-color: #d8b4fe;
    }

    .repair-history-page .status-confirmed {
        color: #0e7490;
        background: #cffafe;
        border-color: #67e8f9;
    }

    /* Information Grid */
    .repair-history-page .repair-card-body {
        display: grid;
        grid-template-columns: repeat(3, minmax(0, 1fr));
        gap: 13px;
        padding: 21px 0;
    }

    .repair-history-page .repair-info {
        min-width: 0;
        padding: 14px;
        background: #eff6ff;
        border: 1px solid #dbeafe;
        border-radius: 11px;
        transition: all .2s ease;
    }

    .repair-history-page .repair-info:nth-child(2) {
        background: #fff7ed;
        border-color: #fed7aa;
    }

    .repair-history-page .repair-info:nth-child(3) {
        background: #f5f3ff;
        border-color: #ddd6fe;
    }

    .repair-history-page .repair-info:hover {
        transform: translateY(-2px);
    }

    .repair-history-page .info-heading {
        display: flex;
        align-items: center;
        gap: 8px;
        margin-bottom: 9px;
    }

    .repair-history-page .info-icon {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 29px;
        height: 29px;
        flex-shrink: 0;
        color: #2563eb;
        background: #dbeafe;
        border-radius: 8px;
        font-size: 13px;
    }

    .repair-history-page .repair-info:nth-child(2) .info-icon {
        color: #c2410c;
        background: #ffedd5;
    }

    .repair-history-page .repair-info:nth-child(3) .info-icon {
        color: #6d28d9;
        background: #ede9fe;
    }

    .repair-history-page .repair-info span {
        display: block;
        color: #64748b;
        font-size: 10px;
        font-weight: 850;
        text-transform: uppercase;
        letter-spacing: .6px;
        margin-bottom: 5px;
    }

    .repair-history-page .repair-info strong {
        display: block;
        color: #1e3a5f;
        font-size: 13px;
        font-weight: 800;
        line-height: 1.5;
        overflow-wrap: anywhere;
    }

    .repair-history-page .repair-info:nth-child(2) strong {
        color: #9a3412;
    }

    .repair-history-page .repair-info:nth-child(3) strong {
        color: #5b21b6;
    }

    /* Choose Technician */
    .repair-history-page .technician-action {
        margin: 0 0 19px;
    }

    .repair-history-page .choose-technician-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        padding: 10px 16px;
        color: #fff;
        background: linear-gradient(120deg, #2563eb, #6d28d9);
        border: 0;
        border-radius: 9px;
        font-size: 12px;
        font-weight: 800;
        text-decoration: none;
        box-shadow: 0 5px 13px rgba(79, 70, 229, .2);
        transition: all .2s ease;
    }

    .repair-history-page .choose-technician-btn:hover {
        color: #fff;
        transform: translateY(-2px);
        box-shadow: 0 8px 18px rgba(79, 70, 229, .3);
    }

    /* Problem Description */
    .repair-history-page .repair-description {
        padding: 16px;
        background: linear-gradient(120deg, #eff6ff, #f0fdfa);
        border: 1px solid #cbdff5;
        border-left: 4px solid #2563eb;
        border-radius: 11px;
    }

    .repair-history-page .repair-description strong {
        display: block;
        color: #1e40af;
        font-size: 13px;
        font-weight: 850;
        margin-bottom: 8px;
    }

    .repair-history-page .repair-description p {
        color: #475569;
        font-size: 13px;
        line-height: 1.75;
        margin: 0;
        overflow-wrap: anywhere;
    }

    /* Problem Image */
    .repair-history-page .repair-image-section {
        margin-top: 17px;
        padding: 15px;
        background: #faf5ff;
        border: 1px solid #e9d5ff;
        border-radius: 11px;
    }

    .repair-history-page .repair-image-section > strong {
        display: block;
        color: #7e22ce;
        font-size: 13px;
        font-weight: 850;
        margin-bottom: 11px;
    }

    .repair-history-page .repair-image-section img {
        width: 125px;
        height: 100px;
        object-fit: cover;
        border: 3px solid #fff;
        border-radius: 10px;
        box-shadow: 0 4px 14px rgba(109, 40, 217, .17);
        transition: all .25s ease;
    }

    .repair-history-page .repair-image-section img:hover {
        transform: scale(1.05);
        box-shadow: 0 8px 20px rgba(109, 40, 217, .25);
    }

    /* Quotations */
    .repair-history-page .quotation-section {
        margin-top: 21px;
        padding-top: 19px;
        border-top: 1px solid #e8edf5;
    }

    .repair-history-page .quotation-section h6 {
        display: flex;
        align-items: center;
        gap: 9px;
        color: #6d28d9;
        font-size: 14px;
        font-weight: 850;
        margin: 0 0 14px;
    }

    .repair-history-page .quotation-section h6 i {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 32px;
        height: 32px;
        color: #6d28d9;
        background: #ede9fe;
        border-radius: 9px;
    }

    .repair-history-page .quotation-row {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 15px;
        padding: 14px;
        margin-bottom: 10px;
        background: #f5f3ff;
        border: 1px solid #ddd6fe;
        border-left: 4px solid #8b5cf6;
        border-radius: 11px;
        transition: all .2s ease;
    }

    .repair-history-page .quotation-row:hover {
        background: #ede9fe;
        transform: translateX(3px);
    }

    .repair-history-page .quotation-details {
        min-width: 0;
    }

    .repair-history-page .quotation-details strong {
        display: block;
        color: #312e81;
        font-size: 13px;
        font-weight: 850;
        overflow-wrap: anywhere;
    }

    .repair-history-page .quotation-details small {
        display: block;
        color: #64748b;
        font-size: 11px;
        line-height: 1.6;
        margin-top: 5px;
        overflow-wrap: anywhere;
    }

    .repair-history-page .quotation-price {
        flex-shrink: 0;
        padding: 9px 12px;
        color: #047857;
        background: #d1fae5;
        border: 1px solid #a7f3d0;
        border-radius: 9px;
        text-align: right;
        font-size: 14px;
        font-weight: 900;
        white-space: nowrap;
    }

    .repair-history-page .quotation-price small {
        display: block;
        color: #065f46;
        font-size: 10px;
        font-weight: 800;
        margin-top: 4px;
    }

    /* No Quotation */
    .repair-history-page .no-quotation {
        display: flex;
        align-items: center;
        gap: 9px;
        margin-top: 17px;
        padding: 13px 15px;
        color: #92400e;
        background: #fffbeb;
        border: 1px solid #fde68a;
        border-left: 4px solid #f59e0b;
        border-radius: 10px;
        font-size: 12px;
        font-weight: 750;
    }

    .repair-history-page .no-quotation i {
        color: #d97706;
        font-size: 16px;
    }

    /* Empty State */
    .repair-history-page .empty-history {
        padding: 62px 22px;
        text-align: center;
        background: linear-gradient(145deg, #fff, #eff6ff);
        border: 1px solid #cbdcf5;
        border-radius: 19px;
        box-shadow: 0 10px 30px rgba(37, 99, 235, .07);
    }

    .repair-history-page .empty-history-icon {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 88px;
        height: 88px;
        color: #fff;
        background: linear-gradient(135deg, #0d9488, #2563eb, #6d28d9);
        border-radius: 25px;
        font-size: 39px;
        box-shadow: 0 8px 20px rgba(37, 99, 235, .22);
    }

    .repair-history-page .empty-history h4 {
        color: #172554;
        font-size: 21px;
        font-weight: 850;
        margin: 19px 0 9px;
    }

    .repair-history-page .empty-history p {
        max-width: 480px;
        margin: 0 auto 22px;
        color: #64748b;
        font-size: 13px;
        line-height: 1.75;
    }

    /* Pagination */
    .repair-history-page .pagination {
        gap: 5px;
        flex-wrap: wrap;
    }

    .repair-history-page .pagination .page-link {
        color: #4338ca;
        background: #fff;
        border: 1px solid #d4e2f4;
        border-radius: 8px;
        font-size: 12px;
        font-weight: 750;
        transition: all .2s ease;
    }

    .repair-history-page .pagination .page-link:hover {
        color: #fff;
        background: #4338ca;
        border-color: #4338ca;
    }

    .repair-history-page .pagination .active .page-link {
        color: #fff;
        background: linear-gradient(135deg, #6d28d9, #2563eb);
        border-color: #6d28d9;
    }

    .repair-history-page .pagination .disabled .page-link {
        color: #94a3b8;
        background: #f1f5f9;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .repair-history-page .history-header {
            padding: 21px;
        }

        .repair-history-page .history-header h3 {
            font-size: 22px;
        }

        .repair-history-page .repair-card-body {
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }
    }

    @media (max-width: 600px) {
        .repair-history-page .history-header {
            align-items: flex-start;
            flex-direction: column;
        }

        .repair-history-page .history-header .btn-productlife {
            width: 100%;
        }

        .repair-history-page .repair-history-card {
            padding: 16px;
        }

        .repair-history-page .repair-card-top {
            flex-direction: column;
        }

        .repair-history-page .repair-card-body {
            grid-template-columns: 1fr;
            gap: 10px;
        }

        .repair-history-page .quotation-row {
            align-items: flex-start;
            flex-direction: column;
        }

        .repair-history-page .quotation-price {
            text-align: left;
        }

        .repair-history-page .quotation-price small {
            text-align: left;
        }

        .repair-history-page .empty-history {
            padding: 42px 17px;
        }
    }

    @media (max-width: 380px) {
        .repair-history-page .history-header h3 {
            font-size: 20px;
        }

        .repair-history-page .repair-card-top h5 {
            font-size: 16px;
        }
    }
</style>
@endpush

<div class="container-fluid px-0 repair-history-page">

    {{-- PAGE HEADER --}}
    <div class="history-header">
        <div>
            <h3>My Repair History</h3>
            <p>
                <i class="bi bi-tools me-1"></i>
                View your repair requests, assigned technicians and quotations.
            </p>
        </div>

        <a href="{{ route('products.index') }}" class="btn-productlife">
            <i class="bi bi-plus-circle"></i>
            New Repair Request
        </a>
    </div>

    {{-- SUCCESS MESSAGE --}}
    @if(session('success'))
        <div class="history-success">
            <i class="bi bi-check-circle-fill me-2"></i>
            {{ session('success') }}
        </div>
    @endif

    {{-- REPAIR REQUESTS --}}
    @forelse($repairRequests as $repair)

        @php
            $status = strtolower($repair->status ?? 'pending');

            $statusClass = match($status) {
                'completed' => 'status-completed',
                'assigned' => 'status-assigned',
                'quoted' => 'status-quoted',
                'confirmed' => 'status-confirmed',
                'in_progress' => 'status-progress',
                'cancelled' => 'status-rejected',
                default => 'status-pending',
            };
        @endphp

        <div class="repair-history-card">

            {{-- CARD HEADER --}}
            <div class="repair-card-top">

                <div>
                    <span class="repair-id">
                        <i class="bi bi-hash"></i>
                        Repair Request #{{ $repair->id }}
                    </span>

                    <h5>{{ $repair->problem_title }}</h5>

                    <p class="repair-date">
                        <i class="bi bi-calendar3"></i>
                        Requested on {{ $repair->created_at->format('d M Y') }}
                    </p>
                </div>

                <span class="repair-status {{ $statusClass }}">
                    @if($status === 'completed')
                        <i class="bi bi-check-circle-fill"></i>
                    @elseif($status === 'cancelled')
                        <i class="bi bi-x-circle-fill"></i>
                    @elseif($status === 'in_progress')
                        <i class="bi bi-arrow-repeat"></i>
                    @elseif($status === 'assigned')
                        <i class="bi bi-person-check-fill"></i>
                    @elseif($status === 'quoted')
                        <i class="bi bi-receipt"></i>
                    @elseif($status === 'confirmed')
                        <i class="bi bi-patch-check-fill"></i>
                    @else
                        <i class="bi bi-clock-fill"></i>
                    @endif

                    {{ ucwords(str_replace('_', ' ', $status)) }}
                </span>

            </div>

            {{-- PRODUCT / PRIORITY / TECHNICIAN --}}
            <div class="repair-card-body">

                <div class="repair-info">
                    <div class="info-heading">
                        <span class="info-icon">
                            <i class="bi bi-box-seam"></i>
                        </span>
                        <span>Product</span>
                    </div>

                    <strong>
                        {{ $repair->product->brand ?? 'Product' }}
                        {{ $repair->product->model ?? '' }}
                    </strong>
                </div>

                <div class="repair-info">
                    <div class="info-heading">
                        <span class="info-icon">
                            <i class="bi bi-flag-fill"></i>
                        </span>
                        <span>Priority</span>
                    </div>

                    <strong>
                        {{ ucfirst($repair->priority ?? 'Normal') }}
                    </strong>
                </div>

                <div class="repair-info">
                    <div class="info-heading">
                        <span class="info-icon">
                            <i class="bi bi-person-gear"></i>
                        </span>
                        <span>Technician</span>
                    </div>

                    <strong>
                        {{ $repair->technician->name ?? 'Not assigned yet' }}
                    </strong>
                </div>

            </div>

            {{-- CHOOSE TECHNICIAN --}}
            @if($repair->status === 'pending')
                <div class="technician-action">
                    <a href="{{ route('technicians.index', $repair) }}"
                       class="choose-technician-btn">
                        <i class="bi bi-person-check-fill"></i>
                        Choose Technician
                    </a>
                </div>
            @endif

            {{-- PROBLEM DESCRIPTION --}}
            <div class="repair-description">
                <strong>
                    <i class="bi bi-card-text me-1"></i>
                    Problem Description
                </strong>

                <p>
                    {{ $repair->problem_description ?: 'No description provided.' }}
                </p>
            </div>

            {{-- PROBLEM IMAGE --}}
            @if($repair->problem_image)
                <div class="repair-image-section">
                    <strong>
                        <i class="bi bi-image me-1"></i>
                        Problem Image
                    </strong>

                    <div>
                        <a href="{{ asset('storage/' . $repair->problem_image) }}"
                           target="_blank"
                           rel="noopener noreferrer">
                            <img
                                src="{{ asset('storage/' . $repair->problem_image) }}"
                                alt="Repair Problem">
                        </a>
                    </div>
                </div>
            @endif

            {{-- QUOTATIONS --}}
            @if($repair->quotes->isNotEmpty())

                <div class="quotation-section">

                    <h6>
                        <i class="bi bi-receipt-cutoff"></i>
                        Repair Quotations
                    </h6>

                    @foreach($repair->quotes as $quote)

                        <div class="quotation-row">

                            <div class="quotation-details">
                                <strong>
                                    <i class="bi bi-person-circle me-1"></i>
                                    {{ $quote->technician->name ?? 'Technician' }}
                                </strong>

                                <small>
                                    {{ $quote->description ?? 'No additional details.' }}
                                </small>
                            </div>

                            <div class="quotation-price">
                                ₹{{ number_format((float)$quote->estimated_cost, 2) }}

                                <small>
                                    {{ ucfirst($quote->status) }}
                                </small>
                            </div>

                        </div>

                    @endforeach

                </div>

            @else

                <div class="no-quotation">
                    <i class="bi bi-info-circle-fill"></i>
                    No quotation received yet.
                </div>

            @endif

        </div>

    @empty

        {{-- EMPTY STATE --}}
        <div class="empty-history">

            <div class="empty-history-icon">
                <i class="bi bi-tools"></i>
            </div>

            <h4>No Repair History Yet</h4>

            <p>
                You haven't submitted any repair requests.
                Start by selecting one of your products and submitting a repair request.
            </p>

            <a href="{{ route('products.index') }}" class="btn-productlife">
                <i class="bi bi-box-seam"></i>
                View My Products
            </a>

        </div>

    @endforelse

    {{-- PAGINATION --}}
    <div class="mt-4">
        {{ $repairRequests->links() }}
    </div>

</div>

@endsection
