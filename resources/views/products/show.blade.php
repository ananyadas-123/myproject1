
@extends('layouts.app')

@section('page_title', 'Product Details')
@section('page_subtitle', 'View product information and manage its lifecycle')

@section('content')

<div class="product-details-page">

    {{-- Breadcrumb --}}
    <div class="breadcrumb-area">
        <a href="{{ route('products.index') }}">
            <i class="bi bi-grid"></i>
            My Products
        </a>
        <i class="bi bi-chevron-right"></i>
        <span>Product Details</span>
    </div>

    {{-- Main Product Card --}}
    <div class="product-card">

        {{-- Header --}}
        <div class="product-header">

            <div class="product-title-area">

                <div class="product-title-icon">
                    <i class="bi bi-box-seam"></i>
                </div>

                <div>
                    <span class="product-overline">PRODUCT INFORMATION</span>

                    <h1>
                        {{ $product->brand }} {{ $product->model }}
                    </h1>

                    <div class="product-category">
                        <i class="bi bi-tag-fill"></i>
                        {{ $product->category }}
                    </div>
                </div>

            </div>

            <div class="status-badge">
                <span class="status-dot"></span>
                {{ ucfirst($product->status) }}
            </div>

        </div>

        {{-- Product Content --}}
        <div class="product-content">

            <div class="row g-4 align-items-stretch">

                {{-- Product Image --}}
                <div class="col-lg-5">

                    <div class="image-panel">

                        <div class="image-label">
                            <i class="bi bi-image"></i>
                            PRODUCT PREVIEW
                        </div>

                        @if($product->image)

                            <img
                                src="{{ asset('storage/' . $product->image) }}"
                                class="product-image"
                                alt="{{ $product->brand }} {{ $product->model }}"
                            >

                        @else

                            <div class="no-image">
                                <div class="no-image-icon">
                                    <i class="bi bi-box-seam"></i>
                                </div>

                                <strong>No Product Image</strong>

                                <span>
                                    No product image available
                                </span>
                            </div>

                        @endif

                        <div class="image-bottom-tag">
                            <i class="bi bi-patch-check-fill"></i>
                            Product Registered
                        </div>

                    </div>

                </div>

                {{-- Product Information --}}
                <div class="col-lg-7">

                    <div class="info-heading">
                        <div>
                            <span>OVERVIEW</span>
                            <h3>Product Specifications</h3>
                        </div>

                        <div class="info-heading-icon">
                            <i class="bi bi-card-list"></i>
                        </div>
                    </div>

                    <div class="info-grid">

                        {{-- Serial --}}
                        <div class="info-box full serial-box">

                            <div class="info-top">
                                <div class="info-icon serial-icon">
                                    <i class="bi bi-upc-scan"></i>
                                </div>

                                <span class="label">Serial Number</span>
                            </div>

                            <div class="value serial-value">
                                {{ $product->serial_number }}
                            </div>

                        </div>

                        {{-- Brand --}}
                        <div class="info-box brand-box">

                            <div class="info-top">
                                <div class="info-icon brand-icon">
                                    <i class="bi bi-award"></i>
                                </div>

                                <span class="label">Brand</span>
                            </div>

                            <div class="value">
                                {{ $product->brand }}
                            </div>

                        </div>

                        {{-- Model --}}
                        <div class="info-box model-box">

                            <div class="info-top">
                                <div class="info-icon model-icon">
                                    <i class="bi bi-cpu"></i>
                                </div>

                                <span class="label">Model</span>
                            </div>

                            <div class="value">
                                {{ $product->model }}
                            </div>

                        </div>

                        {{-- Condition --}}
                        <div class="info-box condition-box">

                            <div class="info-top">
                                <div class="info-icon condition-icon">
                                    <i class="bi bi-shield-check"></i>
                                </div>

                                <span class="label">Condition</span>
                            </div>

                            <div class="value">
                                {{ ucfirst($product->condition) }}
                            </div>

                        </div>

                        {{-- Purchase Date --}}
                        <div class="info-box date-box">

                            <div class="info-top">
                                <div class="info-icon date-icon">
                                    <i class="bi bi-calendar3"></i>
                                </div>

                                <span class="label">Purchase Date</span>
                            </div>

                            <div class="value">

                                @if($product->purchase_date)
                                    {{ \Carbon\Carbon::parse($product->purchase_date)->format('d M Y') }}
                                @else
                                    Not provided
                                @endif

                            </div>

                        </div>

                        {{-- Purchase Price --}}
                        <div class="info-box full price-box">

                            <div class="info-top">
                                <div class="info-icon price-icon">
                                    <i class="bi bi-currency-rupee"></i>
                                </div>

                                <span class="label">Purchase Price</span>
                            </div>

                            <div class="value price-value">

                                @if($product->purchase_price)
                                    ₹{{ number_format($product->purchase_price, 2) }}
                                @else
                                    <span class="not-provided">Not provided</span>
                                @endif

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        {{-- Lifecycle Actions --}}
        <div class="action-area">

            <div class="action-description">

                <div class="action-icon">
                    <i class="bi bi-diagram-3"></i>
                </div>

                <div>
                    <strong>Manage Product Lifecycle</strong>

                    <span>
                        Access your digital passport, warranty,
                        maintenance and repair journey.
                    </span>
                </div>

            </div>

            <div class="action-buttons">

                <a
                    href="{{ route('products.lifecycle', $product) }}"
                    class="lifecycle-btn"
                >
                    <i class="bi bi-diagram-3"></i>
                    Product Lifecycle
                </a>

                <a
                    href="{{ route('products.passport', $product) }}"
                    class="passport-btn"
                >
                    <i class="bi bi-journal-richtext"></i>
                    Digital Passport
                </a>

                <a
                    href="{{ route('products.index') }}"
                    class="back-btn"
                >
                    <i class="bi bi-arrow-left"></i>
                    Back
                </a>

            </div>

        </div>

    </div>

    {{-- Quick Lifecycle Overview --}}
    <div class="quick-section">

        <div class="section-heading">

            <div class="section-heading-content">
                <span class="section-eyebrow">
                    <i class="bi bi-stars"></i>
                    PRODUCT JOURNEY
                </span>

                <h2>Manage every stage in one place</h2>

                <p>
                    Continue managing this product from purchase
                    to maintenance and repair.
                </p>
            </div>

            <div class="section-heading-icon">
                <i class="bi bi-boxes"></i>
            </div>

        </div>

        <div class="quick-grid">

            {{-- Passport --}}
            <a
                href="{{ route('products.passport', $product) }}"
                class="quick-card passport-card"
            >

                <div class="quick-card-top">
                    <div class="quick-icon green">
                        <i class="bi bi-person-vcard"></i>
                    </div>

                    <i class="bi bi-arrow-up-right quick-arrow"></i>
                </div>

                <div class="quick-content">
                    <h3>Digital Passport</h3>

                    <p>
                        View the product's digital identity,
                        records and lifecycle information.
                    </p>
                </div>

                <div class="quick-card-footer">
                    <span>Explore Passport</span>
                    <i class="bi bi-arrow-right"></i>
                </div>

            </a>

            {{-- Warranty --}}
            <a
                href="{{ route('warranties.create', $product) }}"
                class="quick-card warranty-card"
            >

                <div class="quick-card-top">
                    <div class="quick-icon blue">
                        <i class="bi bi-shield-check"></i>
                    </div>

                    <i class="bi bi-arrow-up-right quick-arrow"></i>
                </div>

                <div class="quick-content">
                    <h3>Warranty</h3>

                    <p>
                        Add and manage warranty information
                        for this product.
                    </p>
                </div>

                <div class="quick-card-footer">
                    <span>Manage Warranty</span>
                    <i class="bi bi-arrow-right"></i>
                </div>

            </a>

            {{-- Maintenance --}}
            <a
                href="{{ route('maintenances.create', $product) }}"
                class="quick-card maintenance-card"
            >

                <div class="quick-card-top">
                    <div class="quick-icon orange">
                        <i class="bi bi-tools"></i>
                    </div>

                    <i class="bi bi-arrow-up-right quick-arrow"></i>
                </div>

                <div class="quick-content">
                    <h3>Maintenance</h3>

                    <p>
                        Record maintenance activities and
                        keep your product healthy.
                    </p>
                </div>

                <div class="quick-card-footer">
                    <span>Record Maintenance</span>
                    <i class="bi bi-arrow-right"></i>
                </div>

            </a>

            {{-- Repair --}}
            <a
                href="{{ route('repair_requests.create', $product) }}"
                class="quick-card repair-card"
            >

                <div class="quick-card-top">
                    <div class="quick-icon red">
                        <i class="bi bi-wrench-adjustable-circle"></i>
                    </div>

                    <i class="bi bi-arrow-up-right quick-arrow"></i>
                </div>

                <div class="quick-content">
                    <h3>Repair Request</h3>

                    <p>
                        Create a repair request and continue
                        the technician workflow.
                    </p>
                </div>

                <div class="quick-card-footer">
                    <span>Request Repair</span>
                    <i class="bi bi-arrow-right"></i>
                </div>

            </a>

        </div>

    </div>

</div>

@endsection


@push('styles')

<style>

/* =========================================
   PRODUCT DETAILS - MAIN
========================================= */

.product-details-page {
    max-width: 1180px;
    margin: 0 auto;
    color: #172033;
}

/* BREADCRUMB */

.product-details-page .breadcrumb-area {
    display: flex;
    align-items: center;
    flex-wrap: wrap;
    gap: 11px;
    margin-bottom: 23px;
    color: #64748b;
    font-size: 12px;
    font-weight: 700;
}

.product-details-page .breadcrumb-area a {
    display: inline-flex;
    align-items: center;
    gap: 7px;
    color: #5b43d6;
    text-decoration: none;
    font-weight: 850;
    transition: .2s ease;
}

.product-details-page .breadcrumb-area a:hover {
    color: #3730a3;
}

.product-details-page .breadcrumb-area > i {
    color: #94a3b8;
    font-size: 10px;
}

.product-details-page .breadcrumb-area span {
    color: #334155;
    font-weight: 800;
}

/* MAIN CARD */

.product-details-page .product-card {
    background: #fff;
    border: 1px solid #dfe5f1;
    border-radius: 23px;
    overflow: hidden;
    box-shadow: 0 15px 40px rgba(30, 41, 75, .09);
}

/* =========================================
   PRODUCT HEADER
========================================= */

.product-details-page .product-header {
    position: relative;
    overflow: hidden;
    padding: 30px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 20px;
    background: linear-gradient(
        115deg,
        #111b46 0%,
        #3730a3 48%,
        #6545db 78%,
        #2563eb 100%
    );
}

.product-details-page .product-header::before {
    content: "";
    position: absolute;
    width: 270px;
    height: 270px;
    right: 120px;
    top: -190px;
    border: 35px solid rgba(255,255,255,.09);
    border-radius: 50%;
}

.product-details-page .product-header::after {
    content: "";
    position: absolute;
    width: 190px;
    height: 190px;
    right: -55px;
    bottom: -125px;
    background: rgba(255,255,255,.08);
    border-radius: 50%;
}

.product-details-page .product-title-area,
.product-details-page .status-badge {
    position: relative;
    z-index: 2;
}

.product-details-page .product-title-area {
    display: flex;
    align-items: center;
    gap: 17px;
    min-width: 0;
}

.product-details-page .product-title-icon {
    width: 59px;
    height: 59px;
    border-radius: 17px;
    background: linear-gradient(135deg, #a5f3fc, #67e8f9);
    color: #164e63;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 26px;
    flex-shrink: 0;
    box-shadow: 0 8px 20px rgba(0,0,0,.18);
}

.product-details-page .product-overline {
    display: block;
    margin-bottom: 5px;
    color: #c4b5fd;
    font-size: 9px;
    font-weight: 900;
    letter-spacing: 1.7px;
}

.product-details-page .product-title-area h1 {
    margin: 0;
    color: #fff;
    font-size: 27px;
    font-weight: 900;
    letter-spacing: -.6px;
    line-height: 1.3;
    word-break: break-word;
}

.product-details-page .product-category {
    display: inline-flex;
    align-items: center;
    gap: 7px;
    margin-top: 9px;
    padding: 6px 12px;
    border-radius: 30px;
    background: rgba(255,255,255,.13);
    border: 1px solid rgba(255,255,255,.2);
    color: #e0e7ff;
    font-size: 11px;
    font-weight: 800;
}

.product-details-page .product-category i {
    color: #67e8f9;
}

/* STATUS */

.product-details-page .status-badge {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    padding: 11px 17px;
    border-radius: 50px;
    background: #fff;
    color: #047857;
    font-size: 11px;
    font-weight: 900;
    white-space: nowrap;
    box-shadow: 0 6px 17px rgba(0,0,0,.14);
}

.product-details-page .status-dot {
    width: 9px;
    height: 9px;
    border-radius: 50%;
    background: #10b981;
    box-shadow: 0 0 0 4px #d1fae5;
}

/* =========================================
   PRODUCT CONTENT
========================================= */

.product-details-page .product-content {
    padding: 30px;
}

/* IMAGE PANEL */

.product-details-page .image-panel {
    min-height: 410px;
    height: 100%;
    padding: 28px;
    border: 1px solid #c7d2fe;
    border-radius: 20px;
    background: linear-gradient(
        145deg,
        #e0e7ff 0%,
        #eff6ff 48%,
        #f5f3ff 100%
    );
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    position: relative;
    overflow: hidden;
}

.product-details-page .image-panel::before {
    content: "";
    position: absolute;
    width: 230px;
    height: 230px;
    right: -90px;
    top: -95px;
    background: rgba(99,102,241,.13);
    border-radius: 50%;
}

.product-details-page .image-panel::after {
    content: "";
    position: absolute;
    width: 180px;
    height: 180px;
    left: -75px;
    bottom: -80px;
    background: rgba(6,182,212,.13);
    border-radius: 50%;
}

.product-details-page .image-label {
    position: absolute;
    top: 18px;
    left: 19px;
    z-index: 3;
    display: inline-flex;
    align-items: center;
    gap: 7px;
    padding: 7px 11px;
    border-radius: 8px;
    background: rgba(255,255,255,.9);
    color: #4338ca;
    font-size: 9px;
    font-weight: 900;
    letter-spacing: .8px;
}

.product-details-page .product-image {
    width: 100%;
    max-width: 410px;
    height: 335px;
    object-fit: contain;
    position: relative;
    z-index: 2;
    border-radius: 15px;
    transition: .35s ease;
}

.product-details-page .image-panel:hover .product-image {
    transform: scale(1.045);
}

.product-details-page .image-bottom-tag {
    position: absolute;
    z-index: 3;
    bottom: 17px;
    left: 50%;
    transform: translateX(-50%);
    display: inline-flex;
    align-items: center;
    gap: 7px;
    padding: 8px 13px;
    border: 1px solid #a7f3d0;
    border-radius: 30px;
    background: #ecfdf5;
    color: #047857;
    font-size: 10px;
    font-weight: 850;
    white-space: nowrap;
}

.product-details-page .no-image {
    width: 100%;
    max-width: 410px;
    height: 335px;
    border-radius: 17px;
    background: linear-gradient(135deg, #dbeafe, #ede9fe);
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    position: relative;
    z-index: 2;
}

.product-details-page .no-image-icon {
    width: 90px;
    height: 90px;
    margin-bottom: 16px;
    border-radius: 25px;
    background: linear-gradient(135deg, #4f46e5, #7c3aed);
    color: #fff;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 40px;
    box-shadow: 0 10px 25px rgba(79,70,229,.25);
}

.product-details-page .no-image strong {
    color: #312e81;
    font-size: 15px;
    font-weight: 900;
}

.product-details-page .no-image span {
    margin-top: 6px;
    color: #6366a5;
    font-size: 11px;
    font-weight: 700;
}

/* =========================================
   INFORMATION GRID
========================================= */

.product-details-page .info-heading {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 16px;
}

.product-details-page .info-heading > div:first-child > span {
    display: block;
    margin-bottom: 4px;
    color: #6366f1;
    font-size: 9px;
    font-weight: 900;
    letter-spacing: 1.4px;
}

.product-details-page .info-heading h3 {
    margin: 0;
    color: #172033;
    font-size: 17px;
    font-weight: 900;
}

.product-details-page .info-heading-icon {
    width: 39px;
    height: 39px;
    border-radius: 12px;
    background: #ede9fe;
    color: #6d28d9;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 17px;
}

.product-details-page .info-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 13px;
    height: calc(100% - 58px);
}

.product-details-page .info-box {
    min-height: 94px;
    padding: 15px;
    border: 1px solid #e2e8f0;
    border-radius: 15px;
    background: #f8fafc;
    transition: .23s ease;
}

.product-details-page .info-box:hover {
    transform: translateY(-3px);
    box-shadow: 0 9px 19px rgba(31,41,55,.08);
}

.product-details-page .info-box.full {
    grid-column: span 2;
}

.product-details-page .info-top {
    display: flex;
    align-items: center;
    gap: 9px;
    margin-bottom: 9px;
}

.product-details-page .info-icon {
    width: 29px;
    height: 29px;
    border-radius: 9px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 14px;
    flex-shrink: 0;
}

.product-details-page .label {
    color: #64748b;
    font-size: 9px;
    font-weight: 900;
    letter-spacing: .75px;
    text-transform: uppercase;
}

.product-details-page .value {
    color: #1e293b;
    font-size: 13px;
    font-weight: 850;
    word-break: break-word;
}

/* SERIAL */

.product-details-page .serial-box {
    background: linear-gradient(120deg, #ecfdf5, #d1fae5);
    border-color: #86efac;
}

.product-details-page .serial-icon {
    background: #a7f3d0;
    color: #047857;
}

.product-details-page .serial-value {
    color: #047857;
    font-family: "Courier New", monospace;
    font-size: 15px;
    letter-spacing: .7px;
}

/* BRAND */

.product-details-page .brand-box {
    background: #eff6ff;
    border-color: #bfdbfe;
}

.product-details-page .brand-icon {
    background: #dbeafe;
    color: #2563eb;
}

/* MODEL */

.product-details-page .model-box {
    background: #f5f3ff;
    border-color: #ddd6fe;
}

.product-details-page .model-icon {
    background: #ede9fe;
    color: #7c3aed;
}

/* CONDITION */

.product-details-page .condition-box {
    background: #ecfdf5;
    border-color: #a7f3d0;
}

.product-details-page .condition-icon {
    background: #d1fae5;
    color: #059669;
}

/* DATE */

.product-details-page .date-box {
    background: #fff7ed;
    border-color: #fed7aa;
}

.product-details-page .date-icon {
    background: #ffedd5;
    color: #ea580c;
}

/* PRICE */

.product-details-page .price-box {
    background: linear-gradient(120deg, #eff6ff, #ecfdf5);
    border-color: #bfdbfe;
}

.product-details-page .price-icon {
    background: #dbeafe;
    color: #2563eb;
}

.product-details-page .price-value {
    color: #047857;
    font-size: 19px;
    font-weight: 950;
}

.product-details-page .not-provided {
    color: #64748b;
    font-size: 12px;
    font-weight: 700;
}

/* =========================================
   LIFECYCLE ACTION AREA
========================================= */

.product-details-page .action-area {
    padding: 23px 30px;
    border-top: 1px solid #e0e7ff;
    background: linear-gradient(110deg, #eef2ff, #f5f3ff 55%, #ecfeff);
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 20px;
}

.product-details-page .action-description {
    display: flex;
    align-items: center;
    gap: 13px;
}

.product-details-page .action-icon {
    width: 47px;
    height: 47px;
    border-radius: 14px;
    background: linear-gradient(135deg, #4f46e5, #7c3aed);
    color: #fff;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 20px;
    flex-shrink: 0;
    box-shadow: 0 7px 16px rgba(79,70,229,.23);
}

.product-details-page .action-description strong {
    display: block;
    color: #312e81;
    font-size: 13px;
    font-weight: 900;
}

.product-details-page .action-description span {
    display: block;
    margin-top: 5px;
    color: #52617d;
    font-size: 11px;
    line-height: 1.6;
}

.product-details-page .action-buttons {
    display: flex;
    align-items: center;
    gap: 9px;
    flex-shrink: 0;
}

.product-details-page .lifecycle-btn,
.product-details-page .passport-btn,
.product-details-page .back-btn {
    min-height: 45px;
    padding: 0 15px;
    border-radius: 11px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    text-decoration: none;
    font-size: 10.5px;
    font-weight: 900;
    white-space: nowrap;
    transition: .22s ease;
}

/* LIFECYCLE BUTTON */

.product-details-page .lifecycle-btn {
    color: #fff;
    background: linear-gradient(120deg, #047857, #10b981);
    border: 1px solid #059669;
    box-shadow: 0 6px 15px rgba(5,150,105,.2);
}

.product-details-page .lifecycle-btn:hover {
    color: #fff;
    background: linear-gradient(120deg, #065f46, #047857);
    transform: translateY(-3px);
}

/* PASSPORT BUTTON */

.product-details-page .passport-btn {
    color: #fff;
    background: linear-gradient(120deg, #4f46e5, #8b5cf6);
    border: 1px solid #6366f1;
    box-shadow: 0 6px 15px rgba(99,102,241,.2);
}

.product-details-page .passport-btn:hover {
    color: #fff;
    background: linear-gradient(120deg, #3730a3, #6d28d9);
    transform: translateY(-3px);
}

/* BACK BUTTON */

.product-details-page .back-btn {
    color: #334155;
    background: #fff;
    border: 1px solid #cbd5e1;
}

.product-details-page .back-btn:hover {
    color: #3730a3;
    background: #eef2ff;
    border-color: #a5b4fc;
}

/* =========================================
   QUICK LIFECYCLE SECTION
========================================= */

.product-details-page .quick-section {
    margin-top: 32px;
}

.product-details-page .section-heading {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 15px;
    margin-bottom: 19px;
    padding: 19px 21px;
    border: 1px solid #e0e7ff;
    border-left: 5px solid #6366f1;
    border-radius: 14px;
    background: linear-gradient(110deg, #eef2ff, #fff 75%);
}

.product-details-page .section-eyebrow {
    display: inline-flex;
    align-items: center;
    gap: 7px;
    margin-bottom: 7px;
    color: #5b43d6;
    font-size: 9px;
    font-weight: 950;
    letter-spacing: 1.4px;
}

.product-details-page .section-heading h2 {
    margin: 0;
    color: #172033;
    font-size: 21px;
    font-weight: 950;
    letter-spacing: -.4px;
}

.product-details-page .section-heading p {
    margin: 7px 0 0;
    color: #64748b;
    font-size: 11.5px;
    line-height: 1.6;
}

.product-details-page .section-heading-icon {
    width: 48px;
    height: 48px;
    border-radius: 15px;
    background: linear-gradient(135deg, #c4b5fd, #818cf8);
    color: #312e81;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 22px;
    flex-shrink: 0;
}

/* QUICK GRID */

.product-details-page .quick-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 15px;
}

.product-details-page .quick-card {
    min-height: 205px;
    padding: 19px;
    border: 1px solid #e2e8f0;
    border-radius: 17px;
    text-decoration: none;
    position: relative;
    overflow: hidden;
    box-shadow: 0 7px 20px rgba(31,41,55,.055);
    transition: .27s ease;
}

.product-details-page .quick-card::after {
    content: "";
    position: absolute;
    width: 115px;
    height: 115px;
    right: -50px;
    bottom: -55px;
    border-radius: 50%;
    opacity: .55;
    transition: .3s ease;
}

.product-details-page .quick-card:hover {
    transform: translateY(-6px);
    box-shadow: 0 15px 30px rgba(31,41,55,.12);
}

.product-details-page .quick-card:hover::after {
    transform: scale(1.6);
}

.product-details-page .quick-card-top {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 16px;
}

.product-details-page .quick-icon {
    width: 47px;
    height: 47px;
    border-radius: 14px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 21px;
    transition: .25s ease;
}

.product-details-page .quick-card:hover .quick-icon {
    transform: rotate(-5deg) scale(1.08);
}

.product-details-page .quick-arrow {
    color: #94a3b8;
    font-size: 15px;
    transition: .2s ease;
}

.product-details-page .quick-card:hover .quick-arrow {
    transform: translate(3px, -3px);
}

.product-details-page .quick-content h3 {
    margin: 0;
    color: #1e293b;
    font-size: 13.5px;
    font-weight: 950;
}

.product-details-page .quick-content p {
    margin: 8px 0 0;
    color: #52617a;
    font-size: 10.5px;
    line-height: 1.7;
}

.product-details-page .quick-card-footer {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 8px;
    margin-top: 15px;
    padding-top: 11px;
    border-top: 1px solid rgba(148,163,184,.25);
    font-size: 10px;
    font-weight: 900;
}

.product-details-page .quick-card-footer i {
    font-size: 13px;
    transition: .2s ease;
}

.product-details-page .quick-card:hover .quick-card-footer i {
    transform: translateX(4px);
}

/* PASSPORT CARD */

.product-details-page .passport-card {
    background: linear-gradient(145deg, #fff, #ecfdf5);
    border-color: #a7f3d0;
}

.product-details-page .quick-icon.green {
    color: #047857;
    background: linear-gradient(135deg, #bbf7d0, #6ee7b7);
}

.product-details-page .passport-card::after {
    background: rgba(16,185,129,.12);
}

.product-details-page .passport-card .quick-card-footer {
    color: #047857;
}

.product-details-page .passport-card:hover {
    border-color: #10b981;
}

/* WARRANTY CARD */

.product-details-page .warranty-card {
    background: linear-gradient(145deg, #fff, #eff6ff);
    border-color: #bfdbfe;
}

.product-details-page .quick-icon.blue {
    color: #1d4ed8;
    background: linear-gradient(135deg, #bfdbfe, #60a5fa);
}

.product-details-page .warranty-card::after {
    background: rgba(59,130,246,.12);
}

.product-details-page .warranty-card .quick-card-footer {
    color: #1d4ed8;
}

.product-details-page .warranty-card:hover {
    border-color: #3b82f6;
}

/* MAINTENANCE CARD */

.product-details-page .maintenance-card {
    background: linear-gradient(145deg, #fff, #fff7ed);
    border-color: #fed7aa;
}

.product-details-page .quick-icon.orange {
    color: #c2410c;
    background: linear-gradient(135deg, #fed7aa, #fb923c);
}

.product-details-page .maintenance-card::after {
    background: rgba(249,115,22,.13);
}

.product-details-page .maintenance-card .quick-card-footer {
    color: #c2410c;
}

.product-details-page .maintenance-card:hover {
    border-color: #f97316;
}

/* REPAIR CARD */

.product-details-page .repair-card {
    background: linear-gradient(145deg, #fff, #fff1f2);
    border-color: #fecdd3;
}

.product-details-page .quick-icon.red {
    color: #be123c;
    background: linear-gradient(135deg, #fecdd3, #fb7185);
}

.product-details-page .repair-card::after {
    background: rgba(244,63,94,.12);
}

.product-details-page .repair-card .quick-card-footer {
    color: #be123c;
}

.product-details-page .repair-card:hover {
    border-color: #f43f5e;
}

/* =========================================
   RESPONSIVE DESIGN
========================================= */

@media (max-width: 1100px) {

    .product-details-page .quick-grid {
        grid-template-columns: repeat(2, 1fr);
    }

    .product-details-page .action-area {
        align-items: flex-start;
        flex-direction: column;
    }

    .product-details-page .action-buttons {
        width: 100%;
    }

    .product-details-page .lifecycle-btn,
    .product-details-page .passport-btn,
    .product-details-page .back-btn {
        flex: 1;
    }

}

@media (max-width: 767px) {

    .product-details-page .product-header {
        padding: 23px 20px;
        align-items: flex-start;
        flex-direction: column;
    }

    .product-details-page .product-title-area h1 {
        font-size: 22px;
    }

    .product-details-page .product-content {
        padding: 20px;
    }

    .product-details-page .image-panel {
        min-height: 340px;
    }

    .product-details-page .product-image,
    .product-details-page .no-image {
        height: 270px;
    }

    .product-details-page .action-area {
        padding: 21px;
    }

    .product-details-page .action-buttons {
        width: 100%;
        flex-wrap: wrap;
    }

}

@media (max-width: 560px) {

    .product-details-page .info-grid {
        grid-template-columns: 1fr;
    }

    .product-details-page .info-box.full {
        grid-column: span 1;
    }

    .product-details-page .quick-grid {
        grid-template-columns: 1fr;
    }

    .product-details-page .quick-card {
        min-height: 180px;
    }

    .product-details-page .product-title-area h1 {
        font-size: 19px;
    }

    .product-details-page .status-badge {
        font-size: 10px;
    }

    .product-details-page .action-buttons {
        flex-direction: column;
    }

    .product-details-page .lifecycle-btn,
    .product-details-page .passport-btn,
    .product-details-page .back-btn {
        width: 100%;
        flex: auto;
    }

    .product-details-page .section-heading h2 {
        font-size: 17px;
    }

    .product-details-page .section-heading-icon {
        width: 40px;
        height: 40px;
        font-size: 18px;
    }

}

</style>

@endpush
