@extends('layouts.app')

@section('title', 'Repair History')

@section('page_title', 'Repair History')

@section('page_subtitle', 'Track all your product repair requests.')

@section('content')

<div class="container-fluid px-0">

    {{-- PAGE HEADER --}}
    <div class="history-header mb-4">
        <div>
            <h3>My Repair History</h3>
            <p>View your repair requests, assigned technicians and quotations.</p>
        </div>

        <a href="{{ route('products.index') }}" class="btn btn-productlife">
            <i class="bi bi-plus-circle"></i>
            New Repair Request
        </a>
    </div>

    {{-- SUCCESS MESSAGE --}}
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    {{-- REPAIR REQUESTS --}}
    @forelse($repairRequests as $repair)

        <div class="repair-history-card mb-4">

            <div class="repair-card-top">

                <div>
                    <span class="repair-id">
                        Repair Request #{{ $repair->id }}
                    </span>

                    <h5>
                        {{ $repair->problem_title }}
                    </h5>

                    <p class="repair-date">
                        <i class="bi bi-calendar3"></i>
                        Requested on
                        {{ $repair->created_at->format('d M Y') }}
                    </p>
                </div>

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

                <span class="repair-status {{ $statusClass }}">
                    {{ ucwords(str_replace('_', ' ', $status)) }}
                </span>

            </div>

            <div class="repair-card-body">

                <div class="repair-info">
                    <span>Product</span>

                    <strong>
                        {{ $repair->product->brand ?? 'Product' }}
                        {{ $repair->product->model ?? '' }}
                    </strong>
                </div>

                <div class="repair-info">
                    <span>Priority</span>

                    <strong>
                        {{ ucfirst($repair->priority ?? 'Normal') }}
                    </strong>
                </div>

                <div class="repair-info">
                    <span>Technician</span>

                    <strong>
                        {{ $repair->technician->name ?? 'Not assigned yet' }}
                    </strong>
                </div>

            </div>

            <div class="repair-description">
                <strong>Problem Description</strong>

                <p>
                    {{ $repair->problem_description ?: 'No description provided.' }}
                </p>
            </div>

            @if($repair->problem_image)
                <div class="repair-image-section">
                    <strong>Problem Image</strong>

                    <div>
                        <a href="{{ asset('storage/' . $repair->problem_image) }}"
                           target="_blank">
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
                        <i class="bi bi-receipt"></i>
                        Repair Quotations
                    </h6>

                    @foreach($repair->quotes as $quote)

                        <div class="quotation-row">

                            <div>
                                <strong>
                                    {{ $quote->technician->name ?? 'Technician' }}
                                </strong>

                                <small>
                                    {{ $quote->description ?? 'No additional details.' }}
                                </small>
                            </div>

                            <div class="quotation-price">
                                ₹{{ number_format($quote->estimated_cost, 2) }}

                                <small>
                                    {{ ucfirst($quote->status) }}
                                </small>
                            </div>

                        </div>

                    @endforeach

                </div>

            @else

                <div class="no-quotation">
                    <i class="bi bi-info-circle"></i>
                    No quotation received yet.
                </div>

            @endif

        </div>

    @empty

        <div class="empty-history">

            <i class="bi bi-tools"></i>

            <h4>No Repair History Yet</h4>

            <p>
                You haven't submitted any repair requests.
                Start by selecting one of your products.
            </p>

            <a href="{{ route('products.index') }}" class="btn btn-productlife">
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


@push('styles')
<style>
/* =====================================
   PRODUCTLIFE - REPAIR HISTORY
===================================== */

.container-fluid.px-0 {
    color: #243247;
}

/* Page Header */
.history-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 18px;
    flex-wrap: wrap;
    padding: 24px 26px;
    margin-bottom: 25px !important;
    background: linear-gradient(120deg, #073b4c, #087e8b, #2563eb);
    border-radius: 18px;
    box-shadow: 0 10px 25px rgba(8, 126, 139, .18);
    position: relative;
    overflow: hidden;
}

.history-header::after {
    content: "";
    position: absolute;
    width: 180px;
    height: 180px;
    border-radius: 50%;
    background: rgba(255,255,255,.08);
    right: 15%;
    top: -100px;
}

.history-header > div,
.history-header > a {
    position: relative;
    z-index: 1;
}

.history-header h3 {
    color: #ffffff;
    font-size: 24px;
    font-weight: 850;
    margin-bottom: 7px;
}

.history-header p {
    color: #d4f3f7;
    font-size: 13px;
    margin: 0;
}

.btn-productlife {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    background: linear-gradient(135deg, #fbbf24, #f97316);
    color: #422006 !important;
    border: none;
    border-radius: 10px;
    padding: 11px 18px;
    font-size: 13px;
    font-weight: 800;
    text-decoration: none;
    box-shadow: 0 5px 14px rgba(249, 115, 22, .25);
    transition: all .25s ease;
}

.btn-productlife:hover {
    color: #ffffff !important;
    background: linear-gradient(135deg, #ea580c, #c2410c);
    transform: translateY(-2px);
    box-shadow: 0 8px 18px rgba(234, 88, 12, .3);
}

/* Success Message */
.container-fluid.px-0 > .alert-success {
    color: #065f46;
    background: #d1fae5;
    border: 1px solid #6ee7b7;
    border-left: 5px solid #059669;
    border-radius: 12px;
    padding: 14px 18px;
    font-weight: 650;
}

/* Repair History Card */
.repair-history-card {
    position: relative;
    background: #ffffff;
    border: 1px solid #dce6f2;
    border-left: 5px solid #0d9488;
    border-radius: 17px;
    padding: 24px;
    box-shadow: 0 7px 24px rgba(15, 23, 42, .07);
    transition: all .25s ease;
    overflow: hidden;
}

.repair-history-card:hover {
    transform: translateY(-3px);
    box-shadow: 0 13px 32px rgba(15, 23, 42, .12);
    border-left-color: #2563eb;
}

/* Card Header */
.repair-card-top {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    gap: 18px;
    padding-bottom: 19px;
    border-bottom: 1px solid #e5edf7;
}

.repair-id {
    display: inline-block;
    color: #087e75;
    background: #d7faf1;
    border: 1px solid #a5f3e5;
    border-radius: 7px;
    padding: 5px 10px;
    font-size: 11px;
    font-weight: 850;
}

.repair-card-top h5 {
    color: #173b70;
    margin: 10px 0 7px;
    font-size: 18px;
    font-weight: 850;
    overflow-wrap: anywhere;
}

.repair-date {
    color: #64748b;
    font-size: 12px;
    margin: 0;
}

.repair-date i {
    color: #2563eb;
    margin-right: 4px;
}

/* Status Badges */
.repair-status {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    padding: 8px 14px;
    border-radius: 30px;
    font-size: 11px;
    font-weight: 850;
    white-space: nowrap;
    border: 1px solid transparent;
}

.status-pending {
    background: #fff3cd;
    color: #92400e;
    border-color: #fcd34d;
}

.status-assigned {
    background: #dbeafe;
    color: #1d4ed8;
    border-color: #93c5fd;
}

.status-progress {
    background: #ede9fe;
    color: #6d28d9;
    border-color: #c4b5fd;
}

.status-completed {
    background: #d1fae5;
    color: #047857;
    border-color: #6ee7b7;
}

.status-rejected {
    background: #ffe4e6;
    color: #be123c;
    border-color: #fda4af;
}

.status-quoted {
    background: #f3e8ff;
    color: #7e22ce;
    border-color: #d8b4fe;
}

.status-confirmed {
    background: #cffafe;
    color: #0e7490;
    border-color: #67e8f9;
}

/* Product / Priority / Technician Information */
.repair-card-body {
    display: grid;
    grid-template-columns: repeat(3, minmax(0, 1fr));
    gap: 15px;
    padding: 21px 0;
}

.repair-info {
    background: #f0f7ff;
    border: 1px solid #d7e7fb;
    border-radius: 11px;
    padding: 13px 14px;
    min-width: 0;
    transition: all .2s ease;
}

.repair-info:nth-child(2) {
    background: #fff7e8;
    border-color: #fde2ae;
}

.repair-info:nth-child(3) {
    background: #f4efff;
    border-color: #ddd0ff;
}

.repair-info:hover {
    transform: translateY(-2px);
}

.repair-info span,
.repair-info strong {
    display: block;
    overflow-wrap: anywhere;
}

.repair-info span {
    color: #52739c;
    font-size: 11px;
    font-weight: 750;
    margin-bottom: 7px;
}

.repair-info:nth-child(2) span {
    color: #a16207;
}

.repair-info:nth-child(3) span {
    color: #6d28d9;
}

.repair-info strong {
    color: #1e3a5f;
    font-size: 13px;
    font-weight: 800;
}

/* Problem Description */
.repair-description {
    background: linear-gradient(120deg, #eff6ff, #f0fdfa);
    border: 1px solid #cbdff5;
    border-left: 4px solid #2563eb;
    border-radius: 12px;
    padding: 16px;
}

.repair-description strong,
.repair-image-section > strong {
    display: block;
    color: #1e40af;
    font-size: 13px;
    font-weight: 850;
}

.repair-description p {
    color: #475569;
    font-size: 13px;
    line-height: 1.7;
    margin: 8px 0 0;
    overflow-wrap: anywhere;
}

/* Problem Image */
.repair-image-section {
    margin-top: 19px;
    padding: 14px;
    background: #faf5ff;
    border: 1px solid #e9d5ff;
    border-radius: 12px;
}

.repair-image-section > strong {
    color: #7e22ce;
}

.repair-image-section img {
    width: 110px;
    height: 90px;
    object-fit: cover;
    border-radius: 10px;
    margin-top: 10px;
    border: 3px solid #ffffff;
    box-shadow: 0 4px 12px rgba(109, 40, 217, .18);
    transition: all .25s ease;
}

.repair-image-section img:hover {
    transform: scale(1.06);
    box-shadow: 0 7px 18px rgba(109, 40, 217, .25);
}

/* Quotations Section */
.quotation-section {
    margin-top: 20px;
    padding-top: 18px;
    border-top: 1px solid #e5edf7;
}

.quotation-section h6 {
    display: flex;
    align-items: center;
    gap: 8px;
    color: #6d28d9;
    font-size: 14px;
    font-weight: 850;
    margin-bottom: 14px;
}

.quotation-section h6 i {
    background: #ede9fe;
    padding: 8px;
    border-radius: 8px;
    font-size: 15px;
}

.quotation-row {
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 15px;
    padding: 14px;
    background: #f5f3ff;
    border: 1px solid #ddd6fe;
    border-left: 4px solid #8b5cf6;
    border-radius: 11px;
    margin-bottom: 9px;
    transition: all .2s ease;
}

.quotation-row:hover {
    background: #ede9fe;
    transform: translateX(3px);
}

.quotation-row strong,
.quotation-row small {
    display: block;
}

.quotation-row strong {
    color: #312e81;
    font-size: 13px;
    font-weight: 850;
}

.quotation-row small {
    color: #64748b;
    font-size: 11px;
    margin-top: 5px;
    overflow-wrap: anywhere;
}

.quotation-price {
    color: #047857;
    background: #d1fae5;
    border: 1px solid #a7f3d0;
    border-radius: 9px;
    padding: 9px 12px;
    text-align: right;
    font-size: 14px;
    font-weight: 900;
    white-space: nowrap;
}

.quotation-price small {
    color: #065f46;
    font-size: 10px;
    font-weight: 800;
    text-align: right;
}

/* No Quotation */
.no-quotation {
    display: flex;
    align-items: center;
    gap: 9px;
    margin-top: 16px;
    padding: 13px 15px;
    color: #92400e;
    background: #fffbeb;
    border: 1px solid #fde68a;
    border-left: 4px solid #f59e0b;
    border-radius: 10px;
    font-size: 12px;
    font-weight: 700;
}

.no-quotation i {
    color: #d97706;
    font-size: 16px;
}

/* Empty History */
.empty-history {
    text-align: center;
    background: linear-gradient(145deg, #ffffff, #eff6ff);
    padding: 60px 22px;
    border: 1px solid #cbdcf5;
    border-radius: 20px;
    box-shadow: 0 10px 30px rgba(37, 99, 235, .08);
}

.empty-history > i {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 85px;
    height: 85px;
    font-size: 38px;
    color: #ffffff;
    background: linear-gradient(135deg, #0d9488, #2563eb);
    border-radius: 25px;
    box-shadow: 0 8px 20px rgba(37, 99, 235, .22);
}

.empty-history h4 {
    color: #173b70;
    font-size: 21px;
    font-weight: 850;
    margin: 18px 0 9px;
}

.empty-history p {
    color: #64748b;
    font-size: 13px;
    line-height: 1.7;
    margin-bottom: 22px;
}

/* Pagination */
.container-fluid.px-0 .pagination {
    gap: 5px;
}

.container-fluid.px-0 .pagination .page-link {
    color: #2563eb;
    background: #ffffff;
    border: 1px solid #d4e2f4;
    border-radius: 8px;
    font-weight: 700;
    transition: all .2s ease;
}

.container-fluid.px-0 .pagination .page-link:hover {
    color: #ffffff;
    background: #2563eb;
    border-color: #2563eb;
}

.container-fluid.px-0 .pagination .active .page-link {
    color: #ffffff;
    background: linear-gradient(135deg, #0d9488, #2563eb);
    border-color: #2563eb;
}

.container-fluid.px-0 .pagination .disabled .page-link {
    color: #94a3b8;
    background: #f1f5f9;
}

/* Responsive */
@media (max-width: 768px) {
    .history-header {
        padding: 20px;
    }

    .history-header h3 {
        font-size: 21px;
    }

    .repair-card-body {
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 12px;
    }
}

@media (max-width: 650px) {
    .repair-card-body {
        grid-template-columns: 1fr;
        gap: 10px;
    }

    .repair-card-top {
        flex-direction: column;
    }

    .repair-history-card {
        padding: 16px;
    }

    .quotation-row {
        align-items: flex-start;
        flex-direction: column;
    }

    .quotation-price {
        text-align: left;
    }

    .quotation-price small {
        text-align: left;
    }
}

@media (max-width: 480px) {
    .history-header {
        align-items: flex-start;
        flex-direction: column;
    }

    .history-header .btn-productlife {
        width: 100%;
    }

    .empty-history {
        padding: 40px 16px;
    }
}
</style>
@endpush
