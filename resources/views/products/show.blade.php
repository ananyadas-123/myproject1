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

.product-details-page {
    max-width: 1180px;
    margin: 0 auto;
}


/* =========================================
   BREADCRUMB
========================================= */

.breadcrumb-area {
    display: flex;
    align-items: center;
    gap: 8px;
    margin-bottom: 20px;
    color: #87948e;
    font-size: 12px;
}

.breadcrumb-area a {
    color: #287453;
    text-decoration: none;
    font-weight: 700;
}

.breadcrumb-area a:hover {
    color: #145c3d;
}

.breadcrumb-area i {
    font-size: 10px;
}


/* =========================================
   MAIN PRODUCT CARD
========================================= */

.product-card {
    background: #ffffff;
    border: 1px solid #e3ece7;
    border-radius: 24px;
    overflow: hidden;
    box-shadow: 0 15px 45px rgba(25, 55, 44, .07);
}


/* =========================================
   HEADER
========================================= */

.product-header {
    padding: 27px 30px;
    border-bottom: 1px solid #edf2ef;
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 20px;
}

.product-title-area {
    display: flex;
    align-items: center;
    gap: 14px;
}

.product-title-icon {
    width: 51px;
    height: 51px;
    border-radius: 15px;
    background: linear-gradient(135deg, #e4f8ed, #d3f0e0);
    color: #14794e;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 22px;
    flex-shrink: 0;
}

.product-title-area h1 {
    margin: 0;
    color: #172820;
    font-size: 27px;
    font-weight: 800;
    letter-spacing: -.5px;
}

.product-category {
    margin-top: 6px;
    color: #788780;
    font-size: 12px;
    font-weight: 600;
}

.product-category i {
    margin-right: 4px;
    color: #31926a;
}


/* =========================================
   STATUS
========================================= */

.status-badge {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 9px 14px;
    border-radius: 50px;
    background: #ebf9f1;
    border: 1px solid #d0eadd;
    color: #14794e;
    font-size: 11px;
    font-weight: 800;
    white-space: nowrap;
}

.status-dot {
    width: 7px;
    height: 7px;
    border-radius: 50%;
    background: #21a569;
    box-shadow: 0 0 0 4px rgba(33, 165, 105, .1);
}


/* =========================================
   CONTENT
========================================= */

.product-content {
    padding: 30px;
}


/* =========================================
   IMAGE
========================================= */

.image-panel {
    min-height: 390px;
    height: 100%;
    padding: 24px;
    border: 1px solid #e1ebe6;
    border-radius: 20px;

    background:
        radial-gradient(
            circle at center,
            #ffffff 0%,
            #f2f8f5 70%
        );

    display: flex;
    align-items: center;
    justify-content: center;

    position: relative;
    overflow: hidden;
}

.image-panel::before {
    content: "";
    position: absolute;
    width: 190px;
    height: 190px;
    right: -75px;
    top: -75px;
    border-radius: 50%;
    background: rgba(42, 174, 117, .055);
}

.image-panel::after {
    content: "";
    position: absolute;
    width: 140px;
    height: 140px;
    left: -60px;
    bottom: -65px;
    border-radius: 50%;
    background: rgba(59, 130, 246, .045);
}

.product-image {
    width: 100%;
    max-width: 410px;
    height: 335px;
    object-fit: contain;
    position: relative;
    z-index: 2;
    border-radius: 15px;
    transition: .3s ease;
}

.image-panel:hover .product-image {
    transform: scale(1.025);
}

.no-image {
    width: 100%;
    max-width: 410px;
    height: 335px;
    border-radius: 17px;
    background: linear-gradient(135deg, #eef5f1, #e4eee9);
    color: #80a093;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    position: relative;
    z-index: 2;
}

.no-image i {
    font-size: 60px;
    margin-bottom: 12px;
}

.no-image span {
    color: #82938b;
    font-size: 12px;
    font-weight: 650;
}


/* =========================================
   INFORMATION GRID
========================================= */

.info-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 13px;
    height: 100%;
}

.info-box {
    min-height: 92px;
    padding: 16px 17px;
    border: 1px solid #e5eeea;
    border-radius: 14px;
    background: #f8fbfa;
    transition: .2s ease;
}

.info-box:hover {
    background: #f3faf6;
    border-color: #cde3d8;
    transform: translateY(-2px);
}

.info-box.full {
    grid-column: span 2;
}

.info-top {
    display: flex;
    align-items: center;
    gap: 8px;
    margin-bottom: 8px;
}

.info-icon {
    color: #239363;
    font-size: 14px;
}

.label {
    color: #84928c;
    font-size: 10px;
    font-weight: 800;
    letter-spacing: .65px;
    text-transform: uppercase;
}

.value {
    color: #263931;
    font-size: 14px;
    font-weight: 750;
    word-break: break-word;
}

.serial-value {
    font-family: "Courier New", monospace;
    letter-spacing: .5px;
}

.price-value {
    color: #138153;
    font-size: 17px;
}

.not-provided {
    color: #899690;
    font-size: 12px;
    font-weight: 600;
}


/* =========================================
   ACTION AREA
========================================= */

.action-area {
    padding: 22px 30px 25px;
    border-top: 1px solid #edf1ef;
    background: #fbfdfc;

    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 20px;
}

.action-description {
    display: flex;
    align-items: center;
    gap: 11px;
}

.action-icon {
    width: 39px;
    height: 39px;
    border-radius: 11px;
    background: #eaf7f0;
    color: #178554;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 17px;
    flex-shrink: 0;
}

.action-description strong {
    display: block;
    color: #293b34;
    font-size: 12.5px;
    font-weight: 800;
}

.action-description span {
    display: block;
    margin-top: 3px;
    color: #7c8984;
    font-size: 11px;
}

.action-buttons {
    display: flex;
    align-items: center;
    gap: 9px;
    flex-shrink: 0;
}

.lifecycle-btn,
.passport-btn,
.back-btn {
    min-height: 47px;
    padding: 0 16px;
    border-radius: 11px;

    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 7px;

    text-decoration: none;
    font-size: 11.5px;
    font-weight: 750;

    transition: .2s ease;
}

.lifecycle-btn {
    color: #ffffff;
    background: #176b4d;
    border: 1px solid #176b4d;
    box-shadow: 0 7px 16px rgba(23, 107, 77, .14);
}

.lifecycle-btn:hover {
    color: #ffffff;
    background: #12583e;
    transform: translateY(-1px);
}

.passport-btn {
    color: #176b4d;
    background: #eaf8f1;
    border: 1px solid #d2eadf;
}

.passport-btn:hover {
    color: #12583e;
    background: #ddf3e8;
    transform: translateY(-1px);
}

.back-btn {
    color: #53645c;
    background: #ffffff;
    border: 1px solid #dce6e1;
}

.back-btn:hover {
    color: #1d6e4d;
    background: #f3f8f5;
}


/* =========================================
   QUICK LIFECYCLE SECTION
========================================= */

.quick-section {
    margin-top: 30px;
}

.section-heading {
    margin-bottom: 17px;
}

.section-eyebrow {
    display: inline-block;
    margin-bottom: 6px;
    color: #27835e;
    font-size: 10px;
    font-weight: 850;
    letter-spacing: 1.2px;
}

.section-heading h2 {
    margin: 0;
    color: #182b24;
    font-size: 21px;
    font-weight: 800;
}

.section-heading p {
    margin: 5px 0 0;
    color: #7b8983;
    font-size: 12.5px;
}


/* =========================================
   QUICK CARDS
========================================= */

.quick-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 14px;
}

.quick-card {
    min-height: 185px;
    padding: 19px;
    background: #ffffff;
    border: 1px solid #e3ece7;
    border-radius: 17px;
    text-decoration: none;

    position: relative;
    overflow: hidden;

    box-shadow: 0 7px 24px rgba(25, 55, 44, .045);

    transition: .22s ease;
}

.quick-card:hover {
    transform: translateY(-4px);
    border-color: #cbded5;
    box-shadow: 0 13px 30px rgba(25, 55, 44, .08);
}

.quick-icon {
    width: 42px;
    height: 42px;
    border-radius: 12px;

    display: flex;
    align-items: center;
    justify-content: center;

    font-size: 18px;
    margin-bottom: 15px;
}

.quick-icon.green {
    color: #168052;
    background: #eaf8f0;
}

.quick-icon.blue {
    color: #2563eb;
    background: #eaf3ff;
}

.quick-icon.orange {
    color: #ea580c;
    background: #fff2e6;
}

.quick-icon.red {
    color: #dc2626;
    background: #fff0f0;
}

.quick-content h3 {
    margin: 0;
    color: #293b34;
    font-size: 13.5px;
    font-weight: 800;
}

.quick-content p {
    margin: 7px 0 0;
    color: #7b8983;
    font-size: 11px;
    line-height: 1.55;
}

.quick-arrow {
    position: absolute;
    top: 18px;
    right: 18px;
    color: #a2afa9;
    font-size: 13px;
    transition: .2s ease;
}

.quick-card:hover .quick-arrow {
    color: #21805c;
    transform: translate(2px, -2px);
}


/* =========================================
   RESPONSIVE
========================================= */

@media (max-width: 1050px) {

    .quick-grid {
        grid-template-columns: repeat(2, 1fr);
    }

    .action-area {
        align-items: flex-start;
        flex-direction: column;
    }

    .action-buttons {
        width: 100%;
    }

    .lifecycle-btn,
    .passport-btn,
    .back-btn {
        flex: 1;
    }
}


@media (max-width: 767px) {

    .product-header {
        padding: 22px 20px;
        align-items: flex-start;
        flex-direction: column;
    }

    .product-title-area h1 {
        font-size: 23px;
    }

    .product-content {
        padding: 20px;
    }

    .image-panel {
        min-height: 310px;
    }

    .product-image,
    .no-image {
        height: 270px;
    }

    .action-area {
        padding: 20px;
    }

    .action-buttons {
        width: 100%;
        flex-direction: column;
    }

    .lifecycle-btn,
    .passport-btn,
    .back-btn {
        width: 100%;
    }

}


@media (max-width: 560px) {

    .info-grid {
        grid-template-columns: 1fr;
    }

    .info-box.full {
        grid-column: span 1;
    }

    .quick-grid {
        grid-template-columns: 1fr;
    }

    .quick-card {
        min-height: 150px;
    }

    .product-title-area h1 {
        font-size: 20px;
    }

    .status-badge {
        font-size: 10px;
    }

}

</style>

@endpush