
@extends('admin.layouts.app')

@section('title', 'Product Details - ProductLife Admin')
@section('page_title', 'Product Details')
@section('page_subtitle', 'View product and owner information.')

@push('styles')
<style>
    .product-details-page {
        --pd-purple: #6d28d9;
        --pd-blue: #2563eb;
        --pd-dark: #172033;
        --pd-muted: #64748b;
    }

    .pd-back-btn {
        display: inline-flex;
        align-items: center;
        gap: 9px;
        padding: 10px 18px;
        border: 1px solid #c4b5fd;
        border-radius: 10px;
        color: #6d28d9;
        background: #fff;
        font-size: 13px;
        font-weight: 800;
        text-decoration: none;
        transition: .25s ease;
    }

    .pd-back-btn:hover {
        color: #fff;
        border-color: #6d28d9;
        background: linear-gradient(110deg, #6d28d9, #2563eb);
        transform: translateY(-2px);
        box-shadow: 0 6px 15px rgba(109, 40, 217, .2);
    }

    .pd-hero {
        position: relative;
        overflow: hidden;
        padding: 30px;
        border-radius: 18px;
        color: #fff;
        background: linear-gradient(115deg, #312e81 0%, #6d28d9 52%, #2563eb 100%);
        box-shadow: 0 12px 28px rgba(79, 70, 229, .2);
    }

    .pd-hero::before {
        content: "";
        position: absolute;
        width: 220px;
        height: 220px;
        top: -110px;
        right: 5%;
        border-radius: 50%;
        background: rgba(255,255,255,.09);
    }

    .pd-hero::after {
        content: "";
        position: absolute;
        width: 140px;
        height: 140px;
        bottom: -95px;
        right: 25%;
        border-radius: 50%;
        background: rgba(255,255,255,.10);
    }

    .pd-hero-content {
        position: relative;
        z-index: 1;
        display: flex;
        align-items: center;
        gap: 20px;
    }

    .pd-hero-icon {
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
        width: 76px;
        height: 76px;
        border: 1px solid rgba(255,255,255,.3);
        border-radius: 19px;
        color: #fff;
        background: rgba(255,255,255,.16);
        font-size: 36px;
    }

    .pd-hero-label {
        margin-bottom: 7px;
        color: rgba(255,255,255,.78);
        font-size: 11px;
        font-weight: 800;
        letter-spacing: 1.3px;
        text-transform: uppercase;
    }

    .pd-hero h3 {
        margin: 0;
        color: #fff;
        font-size: 25px;
        font-weight: 800;
        overflow-wrap: anywhere;
    }

    .pd-hero-subtitle {
        margin-top: 7px;
        color: rgba(255,255,255,.85);
        font-size: 13px;
    }

    .pd-main-card {
        overflow: hidden;
        border: 1px solid #e5e7eb;
        border-radius: 18px;
        background: #fff;
        box-shadow: 0 8px 25px rgba(15, 23, 42, .06);
    }

    .pd-card-heading {
        padding: 21px 25px;
        border-bottom: 1px solid #e9eaf2;
        background: linear-gradient(110deg, #faf5ff, #eff6ff);
    }

    .pd-card-heading h5 {
        margin: 0;
        color: #312e81;
        font-size: 16px;
        font-weight: 800;
    }

    .pd-card-heading p {
        margin: 5px 0 0;
        color: #64748b;
        font-size: 12px;
    }

    .pd-card-body {
        padding: 25px;
    }

    .pd-info-card {
        position: relative;
        display: flex;
        align-items: center;
        gap: 14px;
        height: 100%;
        min-height: 104px;
        padding: 18px;
        border: 1px solid #e5e7eb;
        border-left: 4px solid var(--pd-accent);
        border-radius: 13px;
        background: var(--pd-bg);
        transition: .25s ease;
    }

    .pd-info-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 18px rgba(15, 23, 42, .07);
    }

    .pd-info-icon {
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
        width: 43px;
        height: 43px;
        border-radius: 11px;
        color: var(--pd-accent);
        background: var(--pd-icon-bg);
        font-size: 20px;
    }

    .pd-info-label {
        margin-bottom: 6px;
        color: #64748b;
        font-size: 11px;
        font-weight: 800;
        letter-spacing: .5px;
        text-transform: uppercase;
    }

    .pd-info-value {
        color: #172033;
        font-size: 14px;
        font-weight: 800;
        overflow-wrap: anywhere;
    }

    .pd-purple {
        --pd-accent: #7c3aed;
        --pd-bg: #faf5ff;
        --pd-icon-bg: #ede9fe;
    }

    .pd-blue {
        --pd-accent: #2563eb;
        --pd-bg: #eff6ff;
        --pd-icon-bg: #dbeafe;
    }

    .pd-green {
        --pd-accent: #059669;
        --pd-bg: #ecfdf5;
        --pd-icon-bg: #d1fae5;
    }

    .pd-orange {
        --pd-accent: #ea580c;
        --pd-bg: #fff7ed;
        --pd-icon-bg: #ffedd5;
    }

    .pd-pink {
        --pd-accent: #db2777;
        --pd-bg: #fdf2f8;
        --pd-icon-bg: #fce7f3;
    }

    .pd-cyan {
        --pd-accent: #0891b2;
        --pd-bg: #ecfeff;
        --pd-icon-bg: #cffafe;
    }

    .pd-owner-card {
        display: flex;
        align-items: center;
        gap: 16px;
        padding: 20px;
        border: 1px solid #bfdbfe;
        border-radius: 13px;
        background: linear-gradient(110deg, #eff6ff, #eef2ff);
    }

    .pd-owner-icon {
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
        width: 52px;
        height: 52px;
        border-radius: 14px;
        color: #fff;
        background: linear-gradient(135deg, #2563eb, #6d28d9);
        font-size: 23px;
    }

    .pd-owner-label {
        color: #64748b;
        font-size: 11px;
        font-weight: 800;
        letter-spacing: .5px;
        text-transform: uppercase;
    }

    .pd-owner-name {
        margin-top: 5px;
        color: #172554;
        font-size: 16px;
        font-weight: 800;
        overflow-wrap: anywhere;
    }

    .pd-date-card {
        display: flex;
        align-items: center;
        gap: 14px;
        padding: 18px;
        border: 1px solid #a7f3d0;
        border-radius: 13px;
        background: #ecfdf5;
    }

    .pd-date-icon {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 43px;
        height: 43px;
        flex-shrink: 0;
        border-radius: 11px;
        color: #047857;
        background: #d1fae5;
        font-size: 20px;
    }

    .pd-date-label {
        color: #047857;
        font-size: 11px;
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: .5px;
    }

    .pd-date-value {
        margin-top: 5px;
        color: #064e3b;
        font-size: 13px;
        font-weight: 800;
    }

    @media (max-width: 767px) {
        .pd-hero {
            padding: 22px;
        }

        .pd-hero-icon {
            width: 58px;
            height: 58px;
            font-size: 27px;
        }

        .pd-hero h3 {
            font-size: 19px;
        }

        .pd-card-body {
            padding: 17px;
        }

        .pd-card-heading {
            padding: 18px;
        }

        .pd-info-card {
            min-height: 90px;
            padding: 14px;
        }
    }

    @media (max-width: 420px) {
        .pd-hero-content {
            align-items: flex-start;
            gap: 12px;
        }

        .pd-hero-icon {
            width: 48px;
            height: 48px;
            border-radius: 12px;
            font-size: 23px;
        }

        .pd-hero h3 {
            font-size: 17px;
        }

        .pd-info-icon {
            width: 37px;
            height: 37px;
            font-size: 17px;
        }
    }
</style>
@endpush

@section('content')

<div class="product-details-page">

    {{-- Back Button --}}
    <div class="mb-4">
        <a href="{{ route('admin.products.index') }}" class="pd-back-btn">
            <i class="bi bi-arrow-left"></i>
            Back to Products
        </a>
    </div>

    {{-- Product Hero --}}
    <div class="pd-hero mb-4">
        <div class="pd-hero-content">

            <div class="pd-hero-icon">
                <i class="bi bi-box-seam"></i>
            </div>

            <div>
                <div class="pd-hero-label">Product Information</div>

                <h3>
                    {{ $product->brand ?? 'Product' }}
                    {{ $product->model ?? '' }}
                </h3>

                <div class="pd-hero-subtitle">
                    <i class="bi bi-hash me-1"></i>
                    Product ID: {{ $product->id }}
                </div>
            </div>

        </div>
    </div>

    {{-- Product Details --}}
    <div class="pd-main-card mb-4">

        <div class="pd-card-heading">
            <h5>
                <i class="bi bi-info-circle-fill me-2"></i>
                Product Details
            </h5>
            <p>Complete information about this registered product.</p>
        </div>

        <div class="pd-card-body">

            <div class="row g-3">

                {{-- Product ID --}}
                <div class="col-md-6">
                    <div class="pd-info-card pd-purple">
                        <div class="pd-info-icon">
                            <i class="bi bi-upc-scan"></i>
                        </div>
                        <div>
                            <div class="pd-info-label">Product ID</div>
                            <div class="pd-info-value">
                                #{{ $product->id }}
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Brand --}}
                <div class="col-md-6">
                    <div class="pd-info-card pd-blue">
                        <div class="pd-info-icon">
                            <i class="bi bi-award-fill"></i>
                        </div>
                        <div>
                            <div class="pd-info-label">Brand</div>
                            <div class="pd-info-value">
                                {{ $product->brand ?? 'N/A' }}
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Model --}}
                <div class="col-md-6">
                    <div class="pd-info-card pd-green">
                        <div class="pd-info-icon">
                            <i class="bi bi-box-fill"></i>
                        </div>
                        <div>
                            <div class="pd-info-label">Model</div>
                            <div class="pd-info-value">
                                {{ $product->model ?? 'N/A' }}
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Category --}}
                <div class="col-md-6">
                    <div class="pd-info-card pd-orange">
                        <div class="pd-info-icon">
                            <i class="bi bi-grid-fill"></i>
                        </div>
                        <div>
                            <div class="pd-info-label">Category</div>
                            <div class="pd-info-value">
                                {{ $product->category ?? 'N/A' }}
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Serial Number --}}
                <div class="col-md-6">
                    <div class="pd-info-card pd-pink">
                        <div class="pd-info-icon">
                            <i class="bi bi-upc"></i>
                        </div>
                        <div>
                            <div class="pd-info-label">Serial Number</div>
                            <div class="pd-info-value">
                                {{ $product->serial_number ?? 'N/A' }}
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>

    {{-- Owner and Registration --}}
    <div class="row g-3">

        <div class="col-lg-6">
            <div class="pd-owner-card h-100">

                <div class="pd-owner-icon">
                    <i class="bi bi-person-fill"></i>
                </div>

                <div>
                    <div class="pd-owner-label">Product Owner</div>

                    <div class="pd-owner-name">
                        {{ $product->user->name
                            ?? $product->user->full_name
                            ?? 'N/A' }}
                    </div>
                </div>

            </div>
        </div>

        <div class="col-lg-6">
            <div class="pd-date-card h-100">

                <div class="pd-date-icon">
                    <i class="bi bi-calendar-check-fill"></i>
                </div>

                <div>
                    <div class="pd-date-label">Added On</div>

                    <div class="pd-date-value">
                        {{ $product->created_at
                            ? $product->created_at->format('d M Y, h:i A')
                            : 'N/A' }}
                    </div>
                </div>

            </div>
        </div>

    </div>

</div>

@endsection
