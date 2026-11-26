
@extends('layouts.app')

@section('page_title', 'My Warranties')
@section('page_subtitle', 'View and manage your product warranties')

@section('content')
<div class="container-fluid warranty-index-page">

    @if(session('success'))
        <div class="alert alert-success warranty-success-alert">
            <i class="bi bi-check-circle-fill me-2"></i>
            {{ session('success') }}
        </div>
    @endif

    <div class="warranty-main-card">

        <div class="warranty-card-header">
            <div class="warranty-heading">
                <div class="warranty-heading-icon">
                    <i class="bi bi-shield-check"></i>
                </div>
                <div>
                    <h5>Warranty Records</h5>
                    <p>Your registered product warranties</p>
                </div>
            </div>

            <form method="GET" action="{{ route('warranties.index') }}" class="warranty-search-form">
                <div class="warranty-search-input">
                    <i class="bi bi-search"></i>
                    <input
                        type="text"
                        name="search"
                        placeholder="Search brand or model..."
                        value="{{ $search }}"
                    >
                </div>
                <button type="submit" class="warranty-search-btn">
                    Search <i class="bi bi-arrow-right ms-1"></i>
                </button>
            </form>
        </div>

        <div class="warranty-card-body">

            @forelse($warranties as $product)
                @php
                    $warranty = $product->warranty;
                    $today = \Carbon\Carbon::today();
                    $endDate = \Carbon\Carbon::parse($warranty->end_date);

                    if ($endDate->lt($today)) {
                        $status = 'Expired';
                        $statusClass = 'danger';
                    } elseif ($today->diffInDays($endDate) <= 30) {
                        $status = 'Expiring Soon';
                        $statusClass = 'warning';
                    } else {
                        $status = 'Active';
                        $statusClass = 'success';
                    }
                @endphp

                <div class="warranty-record-card">
                    <div class="warranty-record-accent"></div>

                    <div class="warranty-record-content">

                        <div class="warranty-product-info">
                            <div class="warranty-product-heading">
                                <div class="warranty-product-icon">
                                    <i class="bi bi-box-seam"></i>
                                </div>
                                <div>
                                    <h6>{{ $product->brand }} {{ $product->model }}</h6>
                                    <span class="warranty-category">
                                        <i class="bi bi-tag-fill me-1"></i>
                                        {{ $product->category ?? 'Product' }}
                                    </span>
                                </div>
                            </div>

                            <div class="warranty-details-grid">
                                <div class="warranty-detail-item">
                                    <span class="detail-icon provider-icon">
                                        <i class="bi bi-building"></i>
                                    </span>
                                    <div>
                                        <small>Warranty Provider</small>
                                        <strong>{{ $warranty->warranty_provider ?? 'Not specified' }}</strong>
                                    </div>
                                </div>

                                <div class="warranty-detail-item">
                                    <span class="detail-icon type-icon">
                                        <i class="bi bi-patch-check"></i>
                                    </span>
                                    <div>
                                        <small>Warranty Type</small>
                                        <strong>{{ $warranty->warranty_type ?? 'Not specified' }}</strong>
                                    </div>
                                </div>

                                <div class="warranty-detail-item warranty-period-item">
                                    <span class="detail-icon period-icon">
                                        <i class="bi bi-calendar-range"></i>
                                    </span>
                                    <div>
                                        <small>Warranty Period</small>
                                        <strong>
                                            {{ \Carbon\Carbon::parse($warranty->start_date)->format('d M Y') }}
                                            <span class="period-separator">→</span>
                                            {{ $endDate->format('d M Y') }}
                                        </strong>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="warranty-record-actions">

                            <span class="warranty-status status-{{ $statusClass }}">
                                <span class="status-dot"></span>
                                {{ $status }}
                            </span>

                            <div class="warranty-action-buttons">
                                <a href="{{ route('products.passport', $product) }}"
                                   class="passport-btn">
                                    <i class="bi bi-person-vcard-fill"></i>
                                    View Passport
                                </a>

                                @if($warranty->warranty_document)
                                    <a href="{{ asset('storage/'.$warranty->warranty_document) }}"
                                       target="_blank"
                                       class="document-btn">
                                        <i class="bi bi-file-earmark-pdf-fill"></i>
                                        View Document
                                    </a>
                                @endif
                            </div>
                        </div>

                    </div>
                </div>

            @empty
                <div class="warranty-empty-state">
                    <div class="empty-icon">
                        <i class="bi bi-shield-exclamation"></i>
                    </div>
                    <h5>No Warranties Found</h5>
                    <p>
                        You haven't registered any warranty records yet.
                        Add warranty information from your product's lifecycle page.
                    </p>
                    <a href="{{ route('products.index') }}" class="empty-products-btn">
                        <i class="bi bi-box-seam me-2"></i>
                        View My Products
                        <i class="bi bi-arrow-right ms-2"></i>
                    </a>
                </div>
            @endforelse

            @if($warranties->count() > 0)
                <div class="warranty-pagination">
                    {{ $warranties->links('pagination::bootstrap-5') }}
                </div>
            @endif

        </div>
    </div>
</div>
@endsection


@push('styles')
<style>
/* =========================================
   WARRANTY INDEX - PREMIUM NAVY & PURPLE
========================================= */

.warranty-index-page {
    color: #172033;
    padding-bottom: 25px;
}

/* Main Card */

.warranty-index-page .warranty-main-card {
    background: #ffffff;
    border: 1px solid #dce3f0;
    border-radius: 22px;
    overflow: hidden;
    box-shadow: 0 12px 40px rgba(30, 41, 90, 0.09);
}

/* Header */

.warranty-index-page .warranty-card-header {
    padding: 27px 30px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    gap: 22px;
    background: linear-gradient(120deg, #f8faff, #f3f1ff, #effaff);
    border-bottom: 1px solid #e2e8f0;
}

.warranty-index-page .warranty-heading {
    display: flex;
    align-items: center;
    gap: 15px;
}

.warranty-index-page .warranty-heading-icon {
    width: 54px;
    height: 54px;
    flex-shrink: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 16px;
    background: linear-gradient(135deg, #312e81, #6d28d9, #2563eb);
    color: #ffffff;
    font-size: 25px;
    box-shadow: 0 7px 18px rgba(79, 70, 229, 0.25);
}

.warranty-index-page .warranty-heading h5 {
    color: #172554;
    font-size: 22px;
    font-weight: 850;
    margin: 0 0 5px;
    letter-spacing: -0.5px;
}

.warranty-index-page .warranty-heading p {
    color: #64748b;
    font-size: 13px;
    font-weight: 500;
    margin: 0;
}

/* Search */

.warranty-index-page .warranty-search-form {
    display: flex;
    align-items: center;
    gap: 9px;
    width: 100%;
    max-width: 440px;
}

.warranty-index-page .warranty-search-input {
    position: relative;
    flex: 1;
}

.warranty-index-page .warranty-search-input i {
    position: absolute;
    left: 14px;
    top: 50%;
    transform: translateY(-50%);
    color: #64748b;
    font-size: 15px;
}

.warranty-index-page .warranty-search-input input {
    width: 100%;
    height: 46px;
    padding: 0 14px 0 40px;
    border: 1.5px solid #cbd5e1;
    border-radius: 11px;
    background: #ffffff;
    color: #172033;
    font-size: 13px;
    font-weight: 600;
    outline: none;
    transition: all 0.25s ease;
}

.warranty-index-page .warranty-search-input input::placeholder {
    color: #94a3b8;
}

.warranty-index-page .warranty-search-input input:focus {
    border-color: #6366f1;
    box-shadow: 0 0 0 4px rgba(99, 102, 241, 0.13);
}

.warranty-index-page .warranty-search-btn {
    height: 46px;
    padding: 0 20px;
    border: none;
    border-radius: 11px;
    background: linear-gradient(135deg, #4338ca, #6d28d9, #2563eb);
    color: #ffffff;
    font-size: 13px;
    font-weight: 800;
    white-space: nowrap;
    box-shadow: 0 5px 14px rgba(79, 70, 229, 0.22);
    transition: all 0.25s ease;
}

.warranty-index-page .warranty-search-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 19px rgba(79, 70, 229, 0.3);
}

/* Body */

.warranty-index-page .warranty-card-body {
    padding: 27px 30px;
}

/* Success Alert */

.warranty-index-page .warranty-success-alert {
    border: 1px solid #86efac;
    border-left: 5px solid #16a34a;
    border-radius: 12px;
    background: linear-gradient(120deg, #dcfce7, #bbf7d0);
    color: #14532d;
    padding: 14px 18px;
    font-weight: 700;
    margin-bottom: 20px;
}

/* Warranty Record */

.warranty-index-page .warranty-record-card {
    position: relative;
    overflow: hidden;
    background: #ffffff;
    border: 1px solid #dbe4f0;
    border-radius: 17px;
    margin-bottom: 18px;
    box-shadow: 0 4px 14px rgba(15, 23, 42, 0.045);
    transition: all 0.28s ease;
}

.warranty-index-page .warranty-record-card:hover {
    transform: translateY(-3px);
    border-color: #a5b4fc;
    box-shadow: 0 12px 28px rgba(79, 70, 229, 0.11);
}

.warranty-index-page .warranty-record-accent {
    height: 4px;
    background: linear-gradient(90deg, #312e81, #7c3aed, #2563eb, #06b6d4, #10b981);
}

.warranty-index-page .warranty-record-content {
    padding: 22px 24px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 25px;
}

/* Product Heading */

.warranty-index-page .warranty-product-heading {
    display: flex;
    align-items: center;
    gap: 13px;
    margin-bottom: 21px;
}

.warranty-index-page .warranty-product-icon {
    width: 47px;
    height: 47px;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
    border-radius: 13px;
    background: linear-gradient(135deg, #e0e7ff, #ede9fe);
    color: #4f46e5;
    font-size: 22px;
}

.warranty-index-page .warranty-product-heading h6 {
    color: #172554;
    font-size: 17px;
    font-weight: 850;
    margin: 0 0 5px;
    letter-spacing: -0.3px;
}

.warranty-index-page .warranty-category {
    color: #64748b;
    font-size: 12px;
    font-weight: 700;
}

/* Details Grid */

.warranty-index-page .warranty-details-grid {
    display: flex;
    flex-wrap: wrap;
    gap: 12px;
}

.warranty-index-page .warranty-detail-item {
    display: flex;
    align-items: center;
    gap: 10px;
    min-width: 175px;
    padding: 11px 13px;
    border: 1px solid #e2e8f0;
    border-radius: 11px;
    background: #f8faff;
}

.warranty-index-page .detail-icon {
    width: 34px;
    height: 34px;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
    border-radius: 9px;
    font-size: 15px;
}

.warranty-index-page .provider-icon {
    color: #0369a1;
    background: #e0f2fe;
}

.warranty-index-page .type-icon {
    color: #7c3aed;
    background: #ede9fe;
}

.warranty-index-page .period-icon {
    color: #047857;
    background: #d1fae5;
}

.warranty-index-page .warranty-detail-item small {
    display: block;
    color: #64748b;
    font-size: 10px;
    font-weight: 800;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    margin-bottom: 4px;
}

.warranty-index-page .warranty-detail-item strong {
    display: block;
    color: #1e293b;
    font-size: 12px;
    font-weight: 800;
    line-height: 1.5;
}

.warranty-index-page .period-separator {
    color: #6366f1;
    margin: 0 3px;
}

/* Actions */

.warranty-index-page .warranty-record-actions {
    min-width: 175px;
    display: flex;
    flex-direction: column;
    align-items: flex-end;
    gap: 19px;
}

.warranty-index-page .warranty-status {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 9px 15px;
    border-radius: 30px;
    font-size: 11px;
    font-weight: 900;
    letter-spacing: 0.5px;
    text-transform: uppercase;
    white-space: nowrap;
}

.warranty-index-page .status-dot {
    width: 8px;
    height: 8px;
    border-radius: 50%;
    background: currentColor;
}

.warranty-index-page .status-success {
    color: #166534;
    background: #dcfce7;
    border: 1px solid #86efac;
}

.warranty-index-page .status-warning {
    color: #92400e;
    background: #fef3c7;
    border: 1px solid #fcd34d;
}

.warranty-index-page .status-danger {
    color: #991b1b;
    background: #fee2e2;
    border: 1px solid #fca5a5;
}

/* Action Buttons */

.warranty-index-page .warranty-action-buttons {
    display: flex;
    flex-direction: column;
    align-items: stretch;
    gap: 9px;
    width: 100%;
}

.warranty-index-page .passport-btn,
.warranty-index-page .document-btn {
    min-height: 39px;
    padding: 9px 13px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    border-radius: 9px;
    text-decoration: none;
    font-size: 12px;
    font-weight: 800;
    white-space: nowrap;
    transition: all 0.25s ease;
}

.warranty-index-page .passport-btn {
    color: #ffffff;
    background: linear-gradient(135deg, #4338ca, #6d28d9);
    box-shadow: 0 4px 11px rgba(79, 70, 229, 0.2);
}

.warranty-index-page .passport-btn:hover {
    color: #ffffff;
    background: linear-gradient(135deg, #312e81, #5b21b6);
    transform: translateY(-2px);
    box-shadow: 0 7px 15px rgba(79, 70, 229, 0.27);
}

.warranty-index-page .document-btn {
    color: #0369a1;
    background: #e0f2fe;
    border: 1px solid #7dd3fc;
}

.warranty-index-page .document-btn:hover {
    color: #ffffff;
    background: #0284c7;
    border-color: #0284c7;
    transform: translateY(-2px);
}

/* Empty State */

.warranty-index-page .warranty-empty-state {
    text-align: center;
    padding: 55px 20px;
    border: 1px dashed #a5b4fc;
    border-radius: 18px;
    background: linear-gradient(135deg, #eff6ff, #f5f3ff, #ecfeff);
}

.warranty-index-page .empty-icon {
    width: 76px;
    height: 76px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 18px;
    border-radius: 23px;
    background: linear-gradient(135deg, #312e81, #7c3aed, #2563eb);
    color: #ffffff;
    font-size: 34px;
    box-shadow: 0 9px 22px rgba(79, 70, 229, 0.23);
}

.warranty-index-page .warranty-empty-state h5 {
    color: #1e1b4b;
    font-size: 21px;
    font-weight: 900;
    margin-bottom: 9px;
}

.warranty-index-page .warranty-empty-state p {
    max-width: 480px;
    margin: 0 auto 22px;
    color: #475569;
    font-size: 13px;
    line-height: 1.8;
}

.warranty-index-page .empty-products-btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    padding: 12px 22px;
    border-radius: 11px;
    background: linear-gradient(135deg, #0f766e, #2563eb, #6d28d9);
    color: #ffffff;
    font-size: 13px;
    font-weight: 800;
    text-decoration: none;
    box-shadow: 0 6px 15px rgba(37, 99, 235, 0.22);
    transition: all 0.25s ease;
}

.warranty-index-page .empty-products-btn:hover {
    color: #ffffff;
    transform: translateY(-3px);
    box-shadow: 0 10px 21px rgba(37, 99, 235, 0.3);
}

/* Pagination */

.warranty-index-page .warranty-pagination {
    margin-top: 25px;
    padding-top: 20px;
    border-top: 1px solid #e2e8f0;
}

.warranty-index-page .pagination {
    gap: 5px;
    flex-wrap: wrap;
}

.warranty-index-page .pagination .page-link {
    border: 1px solid #dbe4f0;
    border-radius: 8px !important;
    padding: 8px 13px;
    color: #4338ca;
    background: #ffffff;
    font-size: 13px;
    font-weight: 750;
    transition: all 0.2s ease;
}

.warranty-index-page .pagination .page-link:hover {
    color: #312e81;
    background: #e0e7ff;
    border-color: #818cf8;
}

.warranty-index-page .pagination .page-item.active .page-link {
    color: #ffffff;
    background: linear-gradient(135deg, #4338ca, #7c3aed);
    border-color: #4338ca;
}

.warranty-index-page .pagination .page-item.disabled .page-link {
    color: #94a3b8;
    background: #f1f5f9;
}

/* Responsive */

@media (max-width: 992px) {
    .warranty-index-page .warranty-record-content {
        align-items: flex-start;
    }

    .warranty-index-page .warranty-details-grid {
        gap: 9px;
    }

    .warranty-index-page .warranty-detail-item {
        min-width: 155px;
    }
}

@media (max-width: 768px) {
    .warranty-index-page .warranty-card-header {
        padding: 21px;
    }

    .warranty-index-page .warranty-card-body {
        padding: 19px;
    }

    .warranty-index-page .warranty-search-form {
        max-width: 100%;
    }

    .warranty-index-page .warranty-record-content {
        flex-direction: column;
        align-items: stretch;
        padding: 19px;
        gap: 18px;
    }

    .warranty-index-page .warranty-record-actions {
        width: 100%;
        min-width: 0;
        align-items: flex-start;
        border-top: 1px solid #e2e8f0;
        padding-top: 17px;
    }

    .warranty-index-page .warranty-action-buttons {
        flex-direction: row;
        flex-wrap: wrap;
    }

    .warranty-index-page .warranty-action-buttons a {
        flex: 1;
    }

    .warranty-index-page .warranty-details-grid {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
    }

    .warranty-index-page .warranty-detail-item {
        min-width: 0;
    }
}

@media (max-width: 480px) {
    .warranty-index-page .warranty-card-header {
        padding: 17px;
    }

    .warranty-index-page .warranty-heading-icon {
        width: 45px;
        height: 45px;
        font-size: 21px;
    }

    .warranty-index-page .warranty-heading h5 {
        font-size: 19px;
    }

    .warranty-index-page .warranty-search-form {
        flex-direction: column;
        align-items: stretch;
    }

    .warranty-index-page .warranty-search-btn {
        width: 100%;
    }

    .warranty-index-page .warranty-card-body {
        padding: 13px;
    }

    .warranty-index-page .warranty-details-grid {
        grid-template-columns: 1fr;
    }

    .warranty-index-page .warranty-detail-item {
        width: 100%;
    }

    .warranty-index-page .warranty-action-buttons {
        flex-direction: column;
    }

    .warranty-index-page .warranty-action-buttons a {
        width: 100%;
    }

    .warranty-index-page .warranty-empty-state {
        padding: 38px 15px;
    }
}
</style>
@endpush
