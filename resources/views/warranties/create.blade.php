@extends('layouts.app')

@section('title', 'Add Warranty - ProductLife')

@section('page_title', 'Add Product Warranty')

@section(
    'page_subtitle',
    'Register warranty information for your product.'
)

@section('content')

<div class="warranty-page">

    {{-- Product Header --}}
    <div class="product-header-card">

        <div class="product-icon">
            <i class="bi bi-shield-check"></i>
        </div>

        <div class="product-header-info">
            <span class="section-label">PRODUCT</span>

            <h2>
                {{ $product->brand }} {{ $product->model }}
            </h2>

            <div class="product-meta">
                <span>
                    <i class="bi bi-upc-scan"></i>
                    {{ $product->serial_number }}
                </span>

                <span>
                    <i class="bi bi-tag"></i>
                    {{ $product->category }}
                </span>
            </div>
        </div>

        <div class="protection-badge">
            <i class="bi bi-shield-fill-check"></i>
            Warranty Protection
        </div>

    </div>


    {{-- Validation Errors --}}
    @if ($errors->any())

        <div class="error-card">

            <div class="error-icon">
                <i class="bi bi-exclamation-triangle-fill"></i>
            </div>

            <div>
                <h6>Please check the following</h6>

                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>

        </div>

    @endif


    {{-- Warranty Form --}}
    <form
        action="{{ route('warranties.store', $product) }}"
        method="POST"
        enctype="multipart/form-data"
    >

        @csrf

        <div class="form-grid">

            {{-- Main Form --}}
            <div>

                {{-- Warranty Provider --}}
                <div class="form-card">

                    <div class="card-heading">
                        <div class="heading-icon green">
                            <i class="bi bi-building"></i>
                        </div>

                        <div>
                            <h4>Warranty Information</h4>
                            <p>Enter the basic warranty details.</p>
                        </div>
                    </div>


                    <div class="row g-4">

                        <div class="col-md-6">

                            <label class="form-label">
                                Warranty Provider
                            </label>

                            <input
                                type="text"
                                name="warranty_provider"
                                class="form-control custom-input"
                                placeholder="Example: Samsung"
                                value="{{ old('warranty_provider') }}"
                            >

                            <small class="input-help">
                                Company or organization providing the warranty.
                            </small>

                        </div>


                        <div class="col-md-6">

                            <label class="form-label">
                                Warranty Type
                            </label>

                            <input
                                type="text"
                                name="warranty_type"
                                class="form-control custom-input"
                                placeholder="Example: Brand Warranty"
                                value="{{ old('warranty_type') }}"
                            >

                            <small class="input-help">
                                Example: Brand, Extended or Seller Warranty.
                            </small>

                        </div>

                    </div>

                </div>


                {{-- Warranty Period --}}
                <div class="form-card">

                    <div class="card-heading">

                        <div class="heading-icon blue">
                            <i class="bi bi-calendar-range"></i>
                        </div>

                        <div>
                            <h4>Warranty Period</h4>
                            <p>Set the start and expiration date.</p>
                        </div>

                    </div>


                    <div class="row g-4">

                        <div class="col-md-6">

                            <label class="form-label">
                                Start Date <span>*</span>
                            </label>

                            <div class="input-icon-wrapper">

                                <i class="bi bi-calendar3"></i>

                                <input
                                    type="date"
                                    name="start_date"
                                    class="form-control custom-input with-icon"
                                    value="{{ old('start_date') }}"
                                    required
                                >

                            </div>

                        </div>


                        <div class="col-md-6">

                            <label class="form-label">
                                End Date <span>*</span>
                            </label>

                            <div class="input-icon-wrapper">

                                <i class="bi bi-calendar-check"></i>

                                <input
                                    type="date"
                                    name="end_date"
                                    class="form-control custom-input with-icon"
                                    value="{{ old('end_date') }}"
                                    required
                                >

                            </div>

                        </div>

                    </div>


                    <div class="period-info">

                        <i class="bi bi-info-circle"></i>

                        <span>
                            Make sure the warranty dates match the information
                            provided on your purchase invoice or warranty card.
                        </span>

                    </div>

                </div>


                {{-- Warranty Terms --}}
                <div class="form-card">

                    <div class="card-heading">

                        <div class="heading-icon purple">
                            <i class="bi bi-file-text"></i>
                        </div>

                        <div>
                            <h4>Warranty Terms</h4>
                            <p>Add important conditions or coverage details.</p>
                        </div>

                    </div>


                    <label class="form-label">
                        Terms & Conditions
                    </label>

                    <textarea
                        name="terms"
                        class="form-control custom-input terms-input"
                        rows="5"
                        placeholder="Example: Covers manufacturing defects for 2 years. Physical damage is not covered."
                    >{{ old('terms') }}</textarea>

                    <small class="input-help">
                        Add any important warranty coverage, exclusions or conditions.
                    </small>

                </div>


                {{-- Document --}}
                <div class="form-card">

                    <div class="card-heading">

                        <div class="heading-icon orange">
                            <i class="bi bi-cloud-arrow-up"></i>
                        </div>

                        <div>
                            <h4>Warranty Document</h4>
                            <p>Upload your warranty card or document.</p>
                        </div>

                    </div>


                    <div class="upload-box">

                        <div class="upload-icon">
                            <i class="bi bi-file-earmark-arrow-up"></i>
                        </div>

                        <div class="upload-content">

                            <label
                                for="warranty_document"
                                class="upload-label"
                            >
                                Choose Warranty Document
                            </label>

                            <p>
                                PDF, JPG, JPEG or PNG
                            </p>

                            <span>
                                Maximum file size: 4MB
                            </span>

                        </div>

                        <input
                            type="file"
                            id="warranty_document"
                            name="warranty_document"
                            accept=".pdf,.jpg,.jpeg,.png"
                        >

                    </div>

                    <div
                        id="fileName"
                        class="selected-file"
                        style="display:none;"
                    ></div>

                </div>

            </div>


            {{-- Right Summary --}}
            <div>

                <div class="summary-card">

                    <div class="summary-top">
                        <div class="summary-shield">
                            <i class="bi bi-shield-check"></i>
                        </div>

                        <div>
                            <span>WARRANTY</span>
                            <h4>Protection Details</h4>
                        </div>
                    </div>


                    <div class="summary-divider"></div>


                    <div class="summary-product">

                        @if($product->image)

                            <img
                                src="{{ asset('storage/' . $product->image) }}"
                                alt="{{ $product->brand }} {{ $product->model }}"
                            >

                        @else

                            <div class="summary-placeholder">
                                <i class="bi bi-box-seam"></i>
                            </div>

                        @endif


                        <div>
                            <strong>
                                {{ $product->brand }} {{ $product->model }}
                            </strong>

                            <small>
                                {{ $product->category }}
                            </small>
                        </div>

                    </div>


                    <div class="summary-item">

                        <span>
                            <i class="bi bi-upc-scan"></i>
                            Serial Number
                        </span>

                        <strong>
                            {{ $product->serial_number }}
                        </strong>

                    </div>


                    <div class="summary-item">

                        <span>
                            <i class="bi bi-calendar-event"></i>
                            Purchase Date
                        </span>

                        <strong>
                            {{ $product->purchase_date
                                ? \Carbon\Carbon::parse($product->purchase_date)->format('d M Y')
                                : 'Not available'
                            }}
                        </strong>

                    </div>


                    <div class="summary-note">

                        <i class="bi bi-lightbulb"></i>

                        <p>
                            Keeping warranty information here makes it easier
                            to track coverage throughout your product's lifecycle.
                        </p>

                    </div>

                </div>


                <div class="secure-card">

                    <i class="bi bi-lock-fill"></i>

                    <div>
                        <strong>Your data is secure</strong>

                        <p>
                            Warranty information is stored securely
                            with your product records.
                        </p>
                    </div>

                </div>

            </div>

        </div>


        {{-- Bottom Actions --}}
        <div class="bottom-actions">

            <a
                href="{{ route('products.lifecycle', $product) }}"
                class="btn-back"
            >
                <i class="bi bi-arrow-left"></i>
                Back to Lifecycle
            </a>


            <button
                type="submit"
                class="btn-save"
            >
                <i class="bi bi-shield-check"></i>
                Save Warranty
            </button>

        </div>

    </form>

</div>

@endsection


@push('styles')

<style>

    .warranty-page {
        max-width: 1180px;
        margin: 0 auto;
    }

    /* Product Header */

    .product-header-card {
        background: linear-gradient(
            135deg,
            #ffffff 0%,
            #f0fdf4 100%
        );
        border: 1px solid #dff3e7;
        border-radius: 22px;
        padding: 25px;
        display: flex;
        align-items: center;
        gap: 18px;
        margin-bottom: 24px;
        box-shadow: 0 8px 30px rgba(20, 80, 50, .06);
    }

    .product-icon {
        width: 62px;
        height: 62px;
        border-radius: 17px;
        background: #176b4d;
        color: #fff;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 28px;
        flex-shrink: 0;
    }

    .section-label {
        font-size: 10px;
        font-weight: 800;
        color: #65a30d;
        letter-spacing: 1.4px;
    }

    .product-header-info h2 {
        margin: 3px 0 8px;
        font-size: 24px;
        font-weight: 800;
        color: #153b2c;
    }

    .product-meta {
        display: flex;
        flex-wrap: wrap;
        gap: 16px;
        color: #64748b;
        font-size: 12px;
        font-weight: 600;
    }

    .product-meta span {
        display: flex;
        align-items: center;
        gap: 6px;
    }

    .product-meta i {
        color: #176b4d;
    }

    .protection-badge {
        margin-left: auto;
        padding: 10px 14px;
        border-radius: 12px;
        background: #dcfce7;
        color: #15803d;
        font-size: 11px;
        font-weight: 800;
        white-space: nowrap;
    }

    .protection-badge i {
        margin-right: 5px;
    }


    /* Error */

    .error-card {
        display: flex;
        gap: 14px;
        background: #fff7ed;
        border: 1px solid #fed7aa;
        color: #9a3412;
        padding: 16px 18px;
        border-radius: 15px;
        margin-bottom: 22px;
    }

    .error-icon {
        font-size: 20px;
        margin-top: 2px;
    }

    .error-card h6 {
        margin: 0 0 5px;
        font-size: 13px;
        font-weight: 800;
    }

    .error-card ul {
        margin: 0;
        padding-left: 18px;
        font-size: 12px;
    }


    /* Grid */

    .form-grid {
        display: grid;
        grid-template-columns: minmax(0, 1.7fr) minmax(290px, .8fr);
        gap: 22px;
        align-items: start;
    }


    /* Form Card */

    .form-card {
        background: #fff;
        border: 1px solid #e8eef0;
        border-radius: 20px;
        padding: 25px;
        margin-bottom: 20px;
        box-shadow: 0 7px 25px rgba(15, 23, 42, .045);
    }

    .card-heading {
        display: flex;
        align-items: center;
        gap: 13px;
        margin-bottom: 23px;
    }

    .card-heading h4 {
        margin: 0 0 3px;
        font-size: 17px;
        font-weight: 800;
        color: #163c2d;
    }

    .card-heading p {
        margin: 0;
        color: #84909b;
        font-size: 11px;
    }

    .heading-icon {
        width: 42px;
        height: 42px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 18px;
    }

    .heading-icon.green {
        background: #dcfce7;
        color: #15803d;
    }

    .heading-icon.blue {
        background: #dbeafe;
        color: #2563eb;
    }

    .heading-icon.purple {
        background: #f3e8ff;
        color: #9333ea;
    }

    .heading-icon.orange {
        background: #ffedd5;
        color: #ea580c;
    }


    /* Inputs */

    .form-label {
        display: block;
        color: #334155;
        font-size: 11px;
        font-weight: 800;
        margin-bottom: 8px;
    }

    .form-label span {
        color: #dc2626;
    }

    .custom-input {
        min-height: 50px;
        border: 1px solid #dbe3e8;
        border-radius: 11px;
        padding: 11px 14px;
        font-size: 13px;
        color: #1e293b;
        box-shadow: none;
        transition: .2s ease;
    }

    .custom-input:focus {
        border-color: #176b4d;
        box-shadow: 0 0 0 3px rgba(23, 107, 77, .10);
    }

    .terms-input {
        min-height: 125px;
        resize: vertical;
    }

    .input-help {
        display: block;
        margin-top: 7px;
        color: #94a3b8;
        font-size: 10px;
        line-height: 1.5;
    }

    .input-icon-wrapper {
        position: relative;
    }

    .input-icon-wrapper > i {
        position: absolute;
        left: 14px;
        top: 50%;
        transform: translateY(-50%);
        color: #176b4d;
        z-index: 2;
        pointer-events: none;
    }

    .custom-input.with-icon {
        padding-left: 40px;
    }


    /* Period Info */

    .period-info {
        display: flex;
        gap: 9px;
        align-items: flex-start;
        margin-top: 18px;
        padding: 12px 14px;
        border-radius: 11px;
        background: #f0fdf4;
        color: #166534;
        font-size: 10px;
        line-height: 1.5;
    }

    .period-info i {
        margin-top: 1px;
    }


    /* Upload */

    .upload-box {
        position: relative;
        border: 1.5px dashed #cbd5e1;
        border-radius: 15px;
        min-height: 115px;
        padding: 20px;
        display: flex;
        align-items: center;
        gap: 15px;
        background: #f8fafc;
        transition: .2s ease;
        overflow: hidden;
    }

    .upload-box:hover {
        border-color: #176b4d;
        background: #f0fdf4;
    }

    .upload-icon {
        width: 48px;
        height: 48px;
        border-radius: 13px;
        background: #ffedd5;
        color: #ea580c;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 21px;
        flex-shrink: 0;
    }

    .upload-label {
        color: #176b4d;
        font-size: 12px;
        font-weight: 800;
        cursor: pointer;
    }

    .upload-content p {
        margin: 4px 0 2px;
        font-size: 10px;
        color: #64748b;
    }

    .upload-content span {
        font-size: 9px;
        color: #94a3b8;
    }

    .upload-box input[type="file"] {
        position: absolute;
        inset: 0;
        width: 100%;
        height: 100%;
        opacity: 0;
        cursor: pointer;
    }

    .selected-file {
        margin-top: 10px;
        padding: 9px 12px;
        border-radius: 9px;
        background: #f0fdf4;
        color: #166534;
        font-size: 11px;
        font-weight: 700;
    }


    /* Summary */

    .summary-card {
        background: #ffffff;
        border: 1px solid #e8eef0;
        border-radius: 20px;
        padding: 22px;
        box-shadow: 0 7px 25px rgba(15, 23, 42, .045);
        position: sticky;
        top: 90px;
    }

    .summary-top {
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .summary-shield {
        width: 45px;
        height: 45px;
        border-radius: 13px;
        background: #dcfce7;
        color: #15803d;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 21px;
    }

    .summary-top span {
        display: block;
        color: #65a30d;
        font-size: 9px;
        font-weight: 800;
        letter-spacing: 1.2px;
    }

    .summary-top h4 {
        margin: 2px 0 0;
        font-size: 16px;
        font-weight: 800;
        color: #163c2d;
    }

    .summary-divider {
        height: 1px;
        background: #edf1f2;
        margin: 20px 0;
    }

    .summary-product {
        display: flex;
        align-items: center;
        gap: 12px;
        margin-bottom: 20px;
    }

    .summary-product img,
    .summary-placeholder {
        width: 58px;
        height: 58px;
        border-radius: 13px;
        object-fit: cover;
        border: 1px solid #e2e8f0;
        background: #f8fafc;
    }

    .summary-placeholder {
        display: flex;
        align-items: center;
        justify-content: center;
        color: #94a3b8;
        font-size: 21px;
    }

    .summary-product strong {
        display: block;
        color: #1e293b;
        font-size: 12px;
        font-weight: 800;
    }

    .summary-product small {
        display: block;
        margin-top: 4px;
        color: #94a3b8;
        font-size: 10px;
    }

    .summary-item {
        padding: 13px 0;
        border-top: 1px solid #edf1f2;
    }

    .summary-item span {
        display: flex;
        align-items: center;
        gap: 7px;
        color: #94a3b8;
        font-size: 10px;
        margin-bottom: 4px;
    }

    .summary-item span i {
        color: #176b4d;
    }

    .summary-item strong {
        color: #334155;
        font-size: 11px;
        word-break: break-word;
    }

    .summary-note {
        display: flex;
        gap: 9px;
        margin-top: 14px;
        padding: 12px;
        background: #f8fafc;
        border-radius: 11px;
    }

    .summary-note i {
        color: #eab308;
        margin-top: 2px;
    }

    .summary-note p {
        margin: 0;
        color: #64748b;
        font-size: 10px;
        line-height: 1.55;
    }


    /* Secure */

    .secure-card {
        margin-top: 18px;
        background: #f0fdf4;
        border: 1px solid #dcfce7;
        border-radius: 15px;
        padding: 14px;
        display: flex;
        gap: 10px;
        color: #166534;
    }

    .secure-card > i {
        font-size: 18px;
        margin-top: 1px;
    }

    .secure-card strong {
        display: block;
        font-size: 11px;
        font-weight: 800;
    }

    .secure-card p {
        margin: 3px 0 0;
        color: #4d7c5d;
        font-size: 9px;
        line-height: 1.5;
    }


    /* Bottom */

    .bottom-actions {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 12px;
        margin-top: 5px;
        padding-bottom: 10px;
    }

    .btn-back,
    .btn-save {
        min-height: 49px;
        padding: 0 19px;
        border-radius: 11px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        text-decoration: none;
        font-size: 12px;
        font-weight: 800;
        transition: .2s ease;
    }

    .btn-back {
        background: #ffffff;
        border: 1px solid #dbe3e8;
        color: #475569;
    }

    .btn-back:hover {
        background: #f8fafc;
        color: #176b4d;
    }

    .btn-save {
        border: 0;
        background: #176b4d;
        color: #ffffff;
        box-shadow: 0 7px 18px rgba(23, 107, 77, .20);
        cursor: pointer;
    }

    .btn-save:hover {
        background: #12583e;
        color: #ffffff;
        transform: translateY(-1px);
    }


    /* Responsive */

    @media (max-width: 900px) {

        .form-grid {
            grid-template-columns: 1fr;
        }

        .summary-card {
            position: static;
        }

    }

    @media (max-width: 600px) {

        .product-header-card {
            align-items: flex-start;
            flex-wrap: wrap;
            padding: 19px;
        }

        .protection-badge {
            margin-left: 0;
        }

        .product-header-info h2 {
            font-size: 20px;
        }

        .form-card {
            padding: 19px;
        }

        .bottom-actions {
            flex-direction: column-reverse;
            align-items: stretch;
        }

        .btn-back,
        .btn-save {
            width: 100%;
        }

    }

</style>

@endpush


@push('scripts')

<script>

    const warrantyFile = document.getElementById('warranty_document');
    const fileName = document.getElementById('fileName');

    if (warrantyFile) {

        warrantyFile.addEventListener('change', function () {

            if (this.files.length > 0) {

                fileName.style.display = 'block';

                fileName.innerHTML =
                    '<i class="bi bi-file-earmark-check"></i> ' +
                    this.files[0].name;

            } else {

                fileName.style.display = 'none';

            }

        });

    }

</script>

@endpush