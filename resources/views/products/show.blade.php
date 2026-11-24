@extends('layouts.app')

@section('page_title', 'Product Details')
@section('page_subtitle', 'View product information and manage its lifecycle')

@section('content')

<div class="product-details-page">

    {{-- Breadcrumb --}}
    <div class="breadcrumb-area">
        <a href="{{ route('products.index') }}">
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
                    <h1>
                        {{ $product->brand }} {{ $product->model }}
                    </h1>

                    <div class="product-category">
                        <i class="bi bi-tag"></i>
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

                        @if($product->image)

                            <img
                                src="{{ asset('storage/' . $product->image) }}"
                                class="product-image"
                                alt="{{ $product->brand }} {{ $product->model }}"
                            >

                        @else

                            <div class="no-image">

                                <i class="bi bi-box-seam"></i>

                                <span>
                                    No product image available
                                </span>

                            </div>

                        @endif

                    </div>

                </div>


                {{-- Product Information --}}
                <div class="col-lg-7">

                    <div class="info-grid">

                        {{-- Serial --}}
                        <div class="info-box full">

                            <div class="info-top">
                                <i class="bi bi-upc-scan info-icon"></i>

                                <span class="label">
                                    Serial Number
                                </span>
                            </div>

                            <div class="value serial-value">
                                {{ $product->serial_number }}
                            </div>

                        </div>


                        {{-- Brand --}}
                        <div class="info-box">

                            <div class="info-top">
                                <i class="bi bi-award info-icon"></i>

                                <span class="label">
                                    Brand
                                </span>
                            </div>

                            <div class="value">
                                {{ $product->brand }}
                            </div>

                        </div>


                        {{-- Model --}}
                        <div class="info-box">

                            <div class="info-top">
                                <i class="bi bi-cpu info-icon"></i>

                                <span class="label">
                                    Model
                                </span>
                            </div>

                            <div class="value">
                                {{ $product->model }}
                            </div>

                        </div>


                        {{-- Condition --}}
                        <div class="info-box">

                            <div class="info-top">
                                <i class="bi bi-shield-check info-icon"></i>

                                <span class="label">
                                    Condition
                                </span>
                            </div>

                            <div class="value">
                                {{ ucfirst($product->condition) }}
                            </div>

                        </div>


                        {{-- Purchase Date --}}
                        <div class="info-box">

                            <div class="info-top">
                                <i class="bi bi-calendar3 info-icon"></i>

                                <span class="label">
                                    Purchase Date
                                </span>
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
                        <div class="info-box full">

                            <div class="info-top">
                                <i class="bi bi-currency-rupee info-icon"></i>

                                <span class="label">
                                    Purchase Price
                                </span>
                            </div>

                            <div class="value price-value">

                                @if($product->purchase_price)

                                    ₹{{ number_format($product->purchase_price, 2) }}

                                @else

                                    <span class="not-provided">
                                        Not provided
                                    </span>

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

            <div>
                <span class="section-eyebrow">
                    PRODUCT JOURNEY
                </span>

                <h2>
                    Manage every stage in one place
                </h2>

                <p>
                    Continue managing this product from purchase
                    to maintenance and repair.
                </p>
            </div>

        </div>


        <div class="quick-grid">

            {{-- Passport --}}
            <a
                href="{{ route('products.passport', $product) }}"
                class="quick-card"
            >

                <div class="quick-icon green">
                    <i class="bi bi-person-vcard"></i>
                </div>

                <div class="quick-content">

                    <h3>Digital Passport</h3>

                    <p>
                        View the product's digital identity,
                        records and lifecycle information.
                    </p>

                </div>

                <i class="bi bi-arrow-up-right quick-arrow"></i>

            </a>


            {{-- Warranty --}}
            <a
                href="{{ route('warranties.create', $product) }}"
                class="quick-card"
            >

                <div class="quick-icon blue">
                    <i class="bi bi-shield-check"></i>
                </div>

                <div class="quick-content">

                    <h3>Warranty</h3>

                    <p>
                        Add and manage warranty information
                        for this product.
                    </p>

                </div>

                <i class="bi bi-arrow-up-right quick-arrow"></i>

            </a>


            {{-- Maintenance --}}
            <a
                href="{{ route('maintenances.create', $product) }}"
                class="quick-card"
            >

                <div class="quick-icon orange">
                    <i class="bi bi-tools"></i>
                </div>

                <div class="quick-content">

                    <h3>Maintenance</h3>

                    <p>
                        Record maintenance activities and
                        keep your product healthy.
                    </p>

                </div>

                <i class="bi bi-arrow-up-right quick-arrow"></i>

            </a>


            {{-- Repair --}}
            <a
                href="{{ route('repair_requests.create', $product) }}"
                class="quick-card"
            >

                <div class="quick-icon red">
                    <i class="bi bi-wrench-adjustable-circle"></i>
                </div>

                <div class="quick-content">

                    <h3>Repair Request</h3>

                    <p>
                        Create a repair request and continue
                        the technician workflow.
                    </p>

                </div>

                <i class="bi bi-arrow-up-right quick-arrow"></i>

            </a>

        </div>

    </div>

</div>

@endsection


@push('styles')

<style>


/* MAIN PAGE */
.product-details-page {
    max-width: 1180px;
    margin: 0 auto;
    color: #172b23;
}

/* BREADCRUMB */
.product-details-page .breadcrumb-area {
    display: flex;
    align-items: center;
    gap: 10px;
    margin-bottom: 22px;
    color: #64748b;
    font-size: 12px;
    font-weight: 650;
}

.product-details-page .breadcrumb-area a {
    color: #07845b;
    text-decoration: none;
    font-weight: 800;
    transition: .2s ease;
}

.product-details-page .breadcrumb-area a:hover {
    color: #064e3b;
}

.product-details-page .breadcrumb-area i {
    color: #94a3b8;
    font-size: 10px;
}

.product-details-page .breadcrumb-area span {
    color: #334155;
    font-weight: 750;
}

/* MAIN PRODUCT CARD */
.product-details-page .product-card {
    background: #fff;
    border: 1px solid #dce9e2;
    border-radius: 23px;
    overflow: hidden;
    box-shadow: 0 14px 38px rgba(20, 55, 40, .09);
}

/* PRODUCT HEADER */
.product-details-page .product-header {
    position: relative;
    overflow: hidden;
    padding: 28px 30px;
    border-bottom: none;
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 20px;
    background: linear-gradient(
        120deg,
        #073b2b 0%,
        #087f5b 55%,
        #0e9f91 100%
    );
}

.product-details-page .product-header::before {
    content: "";
    position: absolute;
    width: 220px;
    height: 220px;
    right: 130px;
    top: -145px;
    border: 32px solid rgba(255,255,255,.09);
    border-radius: 50%;
}

.product-details-page .product-header::after {
    content: "";
    position: absolute;
    width: 150px;
    height: 150px;
    right: -40px;
    bottom: -105px;
    background: rgba(255,255,255,.09);
    border-radius: 50%;
}

.product-details-page .product-title-area,
.product-details-page .status-badge {
    position: relative;
    z-index: 1;
}

.product-details-page .product-title-area {
    display: flex;
    align-items: center;
    gap: 16px;
}

.product-details-page .product-title-icon {
    width: 56px;
    height: 56px;
    border-radius: 16px;
    background: linear-gradient(135deg, #a7f3d0, #5eead4);
    color: #064e3b;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 25px;
    flex-shrink: 0;
    box-shadow: 0 7px 17px rgba(0,0,0,.16);
}

.product-details-page .product-title-area h1 {
    margin: 0;
    color: #fff;
    font-size: 27px;
    font-weight: 850;
    letter-spacing: -.6px;
    word-break: break-word;
}

.product-details-page .product-category {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    margin-top: 8px;
    padding: 5px 11px;
    border-radius: 30px;
    background: rgba(255,255,255,.15);
    border: 1px solid rgba(255,255,255,.18);
    color: #d1fae5;
    font-size: 11px;
    font-weight: 750;
}

.product-details-page .product-category i {
    color: #a7f3d0;
}

/* STATUS */
.product-details-page .status-badge {
    display: inline-flex;
    align-items: center;
    gap: 9px;
    padding: 10px 16px;
    border-radius: 50px;
    background: #fff;
    border: 1px solid rgba(255,255,255,.5);
    color: #087f5b;
    font-size: 11.5px;
    font-weight: 850;
    white-space: nowrap;
    box-shadow: 0 5px 14px rgba(0,0,0,.1);
}

.product-details-page .status-dot {
    width: 8px;
    height: 8px;
    border-radius: 50%;
    background: #10b981;
    box-shadow: 0 0 0 4px #d1fae5;
}

/* PRODUCT CONTENT */
.product-details-page .product-content {
    padding: 30px;
}

/* PRODUCT IMAGE */
.product-details-page .image-panel {
    min-height: 390px;
    height: 100%;
    padding: 25px;
    border: 1px solid #c7dff4;
    border-radius: 20px;
    background: linear-gradient(
        145deg,
        #e0f2fe 0%,
        #eff6ff 48%,
        #f5f3ff 100%
    );
    display: flex;
    align-items: center;
    justify-content: center;
    position: relative;
    overflow: hidden;
}

.product-details-page .image-panel::before {
    content: "";
    position: absolute;
    width: 210px;
    height: 210px;
    right: -80px;
    top: -80px;
    background: rgba(99,102,241,.11);
    border-radius: 50%;
}

.product-details-page .image-panel::after {
    content: "";
    position: absolute;
    width: 160px;
    height: 160px;
    left: -65px;
    bottom: -70px;
    background: rgba(14,165,233,.12);
    border-radius: 50%;
}

.product-details-page .product-image {
    width: 100%;
    max-width: 410px;
    height: 335px;
    object-fit: contain;
    position: relative;
    z-index: 2;
    border-radius: 15px;
    transition: .3s ease;
}

.product-details-page .image-panel:hover .product-image {
    transform: scale(1.04);
}

.product-details-page .no-image {
    width: 100%;
    max-width: 410px;
    height: 335px;
    border-radius: 17px;
    background: linear-gradient(135deg, #dbeafe, #ede9fe);
    color: #6366f1;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    position: relative;
    z-index: 2;
}

.product-details-page .no-image i {
    font-size: 65px;
    margin-bottom: 14px;
}

.product-details-page .no-image span {
    color: #4f46e5;
    font-size: 12px;
    font-weight: 750;
}

/* INFORMATION GRID */
.product-details-page .info-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 14px;
    height: 100%;
}

.product-details-page .info-box {
    min-height: 95px;
    padding: 17px;
    border: 1px solid #e2e8f0;
    border-radius: 15px;
    background: #f8fafc;
    transition: .22s ease;
}

.product-details-page .info-box:hover {
    transform: translateY(-3px);
    box-shadow: 0 8px 18px rgba(31,41,55,.07);
}

.product-details-page .info-box.full {
    grid-column: span 2;
}

/* SERIAL NUMBER */
.product-details-page .info-box.full:first-child {
    background: linear-gradient(120deg, #ecfdf5, #d1fae5);
    border-color: #86efac;
}

/* INFO TOP */
.product-details-page .info-top {
    display: flex;
    align-items: center;
    gap: 9px;
    margin-bottom: 9px;
}

.product-details-page .info-icon {
    font-size: 16px;
    color: #08916b;
}

.product-details-page .label {
    color: #64748b;
    font-size: 10px;
    font-weight: 850;
    letter-spacing: .7px;
    text-transform: uppercase;
}

/* INFO VALUES */
.product-details-page .value {
    color: #1e293b;
    font-size: 14px;
    font-weight: 800;
    word-break: break-word;
}

.product-details-page .serial-value {
    color: #047857;
    font-family: "Courier New", monospace;
    font-size: 15px;
    letter-spacing: .7px;
}

/* BRAND */
.product-details-page .info-box:nth-child(2) {
    background: #eff6ff;
    border-color: #bfdbfe;
}

.product-details-page .info-box:nth-child(2) .info-icon {
    color: #2563eb;
}

/* MODEL */
.product-details-page .info-box:nth-child(3) {
    background: #f5f3ff;
    border-color: #ddd6fe;
}

.product-details-page .info-box:nth-child(3) .info-icon {
    color: #7c3aed;
}

/* CONDITION */
.product-details-page .info-box:nth-child(4) {
    background: #ecfdf5;
    border-color: #a7f3d0;
}

.product-details-page .info-box:nth-child(4) .info-icon {
    color: #059669;
}

/* PURCHASE DATE */
.product-details-page .info-box:nth-child(5) {
    background: #fff7ed;
    border-color: #fed7aa;
}

.product-details-page .info-box:nth-child(5) .info-icon {
    color: #ea580c;
}

/* PURCHASE PRICE */
.product-details-page .info-box:nth-child(6) {
    background: linear-gradient(120deg, #eff6ff, #ecfdf5);
    border-color: #bfdbfe;
}

.product-details-page .info-box:nth-child(6) .info-icon {
    color: #2563eb;
}

.product-details-page .price-value {
    color: #047857;
    font-size: 19px;
    font-weight: 900;
}

.product-details-page .not-provided {
    color: #94a3b8;
    font-size: 12px;
    font-weight: 650;
}

/* LIFECYCLE ACTION AREA */
.product-details-page .action-area {
    padding: 23px 30px;
    border-top: 1px solid #dce9e2;
    background: linear-gradient(110deg, #f0fdf4, #eff6ff);
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
    width: 45px;
    height: 45px;
    border-radius: 13px;
    background: linear-gradient(135deg, #059669, #0d9488);
    color: #fff;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 19px;
    flex-shrink: 0;
    box-shadow: 0 6px 13px rgba(5,150,105,.2);
}

.product-details-page .action-description strong {
    display: block;
    color: #064e3b;
    font-size: 13px;
    font-weight: 850;
}

.product-details-page .action-description span {
    display: block;
    margin-top: 5px;
    color: #526b60;
    font-size: 11px;
    line-height: 1.5;
}

.product-details-page .action-buttons {
    display: flex;
    align-items: center;
    gap: 10px;
    flex-shrink: 0;
}

.product-details-page .lifecycle-btn,
.product-details-page .passport-btn,
.product-details-page .back-btn {
    min-height: 47px;
    padding: 0 17px;
    border-radius: 11px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    text-decoration: none;
    font-size: 11.5px;
    font-weight: 800;
    white-space: nowrap;
    transition: .22s ease;
}

/* LIFECYCLE BUTTON */
.product-details-page .lifecycle-btn {
    color: #fff;
    background: linear-gradient(120deg, #047857, #10b981);
    border: 1px solid #059669;
    box-shadow: 0 6px 15px rgba(5,150,105,.22);
}

.product-details-page .lifecycle-btn:hover {
    color: #fff;
    background: linear-gradient(120deg, #065f46, #059669);
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
    background: linear-gradient(120deg, #3730a3, #7c3aed);
    transform: translateY(-3px);
}

/* BACK BUTTON */
.product-details-page .back-btn {
    color: #475569;
    background: #fff;
    border: 1px solid #cbd5e1;
}

.product-details-page .back-btn:hover {
    color: #1e40af;
    background: #eff6ff;
    border-color: #93c5fd;
}

/* QUICK LIFECYCLE SECTION */
.product-details-page .quick-section {
    margin-top: 31px;
}

.product-details-page .section-heading {
    margin-bottom: 19px;
    padding-left: 15px;
    border-left: 5px solid #10b981;
}

.product-details-page .section-eyebrow {
    display: inline-block;
    margin-bottom: 7px;
    color: #059669;
    font-size: 10px;
    font-weight: 900;
    letter-spacing: 1.4px;
}

.product-details-page .section-heading h2 {
    margin: 0;
    color: #172b23;
    font-size: 22px;
    font-weight: 850;
}

.product-details-page .section-heading p {
    margin: 7px 0 0;
    color: #64748b;
    font-size: 12.5px;
    line-height: 1.6;
}

/* QUICK CARDS */
.product-details-page .quick-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 15px;
}

.product-details-page .quick-card {
    min-height: 190px;
    padding: 20px;
    background: #fff;
    border: 1px solid #e2e8f0;
    border-radius: 17px;
    text-decoration: none;
    position: relative;
    overflow: hidden;
    box-shadow: 0 7px 20px rgba(31,41,55,.055);
    transition: .25s ease;
}

.product-details-page .quick-card::after {
    content: "";
    position: absolute;
    width: 100px;
    height: 100px;
    right: -42px;
    bottom: -48px;
    border-radius: 50%;
    background: rgba(99,102,241,.045);
    transition: .25s ease;
}

.product-details-page .quick-card:hover {
    transform: translateY(-6px);
    box-shadow: 0 14px 28px rgba(31,41,55,.11);
}

.product-details-page .quick-card:hover::after {
    transform: scale(1.6);
}

/* QUICK ICON */
.product-details-page .quick-icon {
    width: 47px;
    height: 47px;
    border-radius: 14px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 21px;
    margin-bottom: 16px;
}

/* GREEN PASSPORT */
.product-details-page .quick-icon.green {
    color: #047857;
    background: linear-gradient(135deg, #bbf7d0, #6ee7b7);
}

.product-details-page .quick-card:nth-child(1) {
    background: linear-gradient(145deg, #fff, #ecfdf5);
    border-color: #a7f3d0;
}

.product-details-page .quick-card:nth-child(1):hover {
    border-color: #10b981;
}

/* BLUE WARRANTY */
.product-details-page .quick-icon.blue {
    color: #1d4ed8;
    background: linear-gradient(135deg, #bfdbfe, #60a5fa);
}

.product-details-page .quick-card:nth-child(2) {
    background: linear-gradient(145deg, #fff, #eff6ff);
    border-color: #bfdbfe;
}

.product-details-page .quick-card:nth-child(2):hover {
    border-color: #3b82f6;
}

/* ORANGE MAINTENANCE */
.product-details-page .quick-icon.orange {
    color: #c2410c;
    background: linear-gradient(135deg, #fed7aa, #fb923c);
}

.product-details-page .quick-card:nth-child(3) {
    background: linear-gradient(145deg, #fff, #fff7ed);
    border-color: #fed7aa;
}

.product-details-page .quick-card:nth-child(3):hover {
    border-color: #f97316;
}

/* RED REPAIR */
.product-details-page .quick-icon.red {
    color: #be123c;
    background: linear-gradient(135deg, #fecdd3, #fb7185);
}

.product-details-page .quick-card:nth-child(4) {
    background: linear-gradient(145deg, #fff, #fff1f2);
    border-color: #fecdd3;
}

.product-details-page .quick-card:nth-child(4):hover {
    border-color: #f43f5e;
}

/* QUICK CARD TEXT */
.product-details-page .quick-content h3 {
    margin: 0;
    color: #1e293b;
    font-size: 13.5px;
    font-weight: 850;
}

.product-details-page .quick-content p {
    margin: 8px 0 0;
    color: #64748b;
    font-size: 11px;
    line-height: 1.65;
}

.product-details-page .quick-arrow {
    position: absolute;
    top: 20px;
    right: 19px;
    color: #94a3b8;
    font-size: 14px;
    transition: .2s ease;
}

.product-details-page .quick-card:hover .quick-arrow {
    color: #047857;
    transform: translate(3px, -3px);
}

/* RESPONSIVE */
@media (max-width: 1050px) {
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
        min-height: 310px;
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
        flex-direction: column;
    }

    .product-details-page .lifecycle-btn,
    .product-details-page .passport-btn,
    .product-details-page .back-btn {
        width: 100%;
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
        min-height: 155px;
    }

    .product-details-page .product-title-area h1 {
        font-size: 19px;
    }

    .product-details-page .status-badge {
        font-size: 10px;
    }
}


</style>

@endpush