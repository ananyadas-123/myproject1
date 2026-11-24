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
/* ==========================================
   PRODUCTLIFE - WARRANTY CREATE PAGE
========================================== */

.warranty-page {
    max-width: 1180px;
    margin: 0 auto;
    color: #243247;
}

/* Product Header */
.product-header-card {
    position: relative;
    display: flex;
    align-items: center;
    gap: 18px;
    padding: 27px;
    margin-bottom: 25px;
    border-radius: 20px;
    overflow: hidden;
    background: linear-gradient(120deg, #073b4c, #087e8b, #2563eb);
    border: 1px solid #0e7490;
    box-shadow: 0 10px 28px rgba(8, 126, 139, .20);
}

.product-header-card::after {
    content: "";
    position: absolute;
    width: 210px;
    height: 210px;
    right: 13%;
    top: -125px;
    border-radius: 50%;
    background: rgba(255,255,255,.09);
}

.product-header-card::before {
    content: "";
    position: absolute;
    width: 120px;
    height: 120px;
    right: 4%;
    bottom: -85px;
    border-radius: 50%;
    background: rgba(255,255,255,.08);
}

.product-icon,
.product-header-info,
.protection-badge {
    position: relative;
    z-index: 1;
}

.product-icon {
    width: 65px;
    height: 65px;
    flex-shrink: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 17px;
    background: linear-gradient(135deg, #fbbf24, #f97316);
    color: #ffffff;
    font-size: 29px;
    box-shadow: 0 6px 18px rgba(0,0,0,.17);
}

.section-label {
    display: inline-block;
    color: #a7f3d0;
    font-size: 10px;
    font-weight: 900;
    letter-spacing: 1.8px;
}

.product-header-info h2 {
    margin: 5px 0 9px;
    color: #ffffff;
    font-size: 25px;
    font-weight: 850;
    overflow-wrap: anywhere;
}

.product-meta {
    display: flex;
    flex-wrap: wrap;
    gap: 16px;
    color: #d9f4ff;
    font-size: 12px;
    font-weight: 600;
}

.product-meta span {
    display: flex;
    align-items: center;
    gap: 6px;
}

.product-meta i {
    color: #fcd34d;
}

.protection-badge {
    margin-left: auto;
    padding: 11px 15px;
    border-radius: 11px;
    background: #d1fae5;
    color: #047857;
    border: 1px solid #6ee7b7;
    font-size: 11px;
    font-weight: 850;
    white-space: nowrap;
    box-shadow: 0 4px 12px rgba(0,0,0,.10);
}

.protection-badge i {
    margin-right: 5px;
}

/* Error Card */
.error-card {
    display: flex;
    gap: 14px;
    align-items: flex-start;
    background: #fff1f2;
    border: 1px solid #fda4af;
    border-left: 5px solid #e11d48;
    color: #9f1239;
    padding: 17px 19px;
    border-radius: 13px;
    margin-bottom: 22px;
    box-shadow: 0 5px 15px rgba(225, 29, 72, .07);
}

.error-icon {
    font-size: 21px;
    margin-top: 2px;
    color: #e11d48;
}

.error-card h6 {
    margin: 0 0 7px;
    font-size: 14px;
    font-weight: 850;
}

.error-card ul {
    margin: 0;
    padding-left: 18px;
    font-size: 12px;
    line-height: 1.8;
}

/* Main Grid */
.form-grid {
    display: grid;
    grid-template-columns: minmax(0, 1.7fr) minmax(290px, .8fr);
    gap: 22px;
    align-items: start;
}

/* Form Cards */
.form-card {
    position: relative;
    background: #ffffff;
    border: 1px solid #dce7f5;
    border-radius: 17px;
    padding: 25px;
    margin-bottom: 20px;
    box-shadow: 0 7px 24px rgba(15, 23, 42, .065);
    transition: all .25s ease;
    overflow: hidden;
}

.form-card:hover {
    box-shadow: 0 12px 30px rgba(15, 23, 42, .10);
    transform: translateY(-2px);
}

.form-card:nth-child(1) {
    border-top: 5px solid #0d9488;
}

.form-card:nth-child(2) {
    border-top: 5px solid #2563eb;
}

.form-card:nth-child(3) {
    border-top: 5px solid #9333ea;
}

.form-card:nth-child(4) {
    border-top: 5px solid #f97316;
}

/* Card Heading */
.card-heading {
    display: flex;
    align-items: center;
    gap: 13px;
    margin-bottom: 23px;
}

.card-heading h4 {
    margin: 0 0 4px;
    font-size: 17px;
    font-weight: 850;
    color: #173b70;
}

.card-heading p {
    margin: 0;
    color: #64748b;
    font-size: 11px;
}

.heading-icon {
    width: 45px;
    height: 45px;
    flex-shrink: 0;
    border-radius: 13px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 19px;
}

.heading-icon.green {
    background: #d1fae5;
    color: #047857;
    border: 1px solid #a7f3d0;
}

.heading-icon.blue {
    background: #dbeafe;
    color: #1d4ed8;
    border: 1px solid #bfdbfe;
}

.heading-icon.purple {
    background: #f3e8ff;
    color: #7e22ce;
    border: 1px solid #e9d5ff;
}

.heading-icon.orange {
    background: #ffedd5;
    color: #c2410c;
    border: 1px solid #fed7aa;
}

/* Labels */
.form-label {
    display: block;
    color: #243b60;
    font-size: 12px;
    font-weight: 800;
    margin-bottom: 8px;
}

.form-label span {
    color: #e11d48;
}

/* Inputs */
.custom-input {
    width: 100%;
    min-height: 49px;
    background: #f8fbff;
    border: 1.5px solid #cbd9ec;
    border-radius: 10px;
    padding: 11px 14px;
    font-size: 13px;
    font-weight: 500;
    color: #243247;
    box-shadow: none;
    transition: all .25s ease;
}

.custom-input::placeholder {
    color: #94a3b8;
}

.custom-input:hover {
    background: #ffffff;
    border-color: #7c9fe0;
}

.custom-input:focus {
    background: #ffffff;
    color: #1e293b;
    border-color: #0d9488;
    box-shadow: 0 0 0 4px rgba(13, 148, 136, .13);
    outline: none;
}

.terms-input {
    min-height: 130px;
    resize: vertical;
    line-height: 1.7;
}

.input-help {
    display: block;
    margin-top: 8px;
    color: #64748b;
    font-size: 10px;
    line-height: 1.6;
}

/* Date Input Icons */
.input-icon-wrapper {
    position: relative;
}

.input-icon-wrapper > i {
    position: absolute;
    left: 14px;
    top: 50%;
    transform: translateY(-50%);
    color: #2563eb;
    z-index: 2;
    pointer-events: none;
}

.custom-input.with-icon {
    padding-left: 42px;
}

.input-icon-wrapper .custom-input:focus + i {
    color: #0d9488;
}

/* Period Information */
.period-info {
    display: flex;
    gap: 10px;
    align-items: flex-start;
    margin-top: 18px;
    padding: 14px;
    border-radius: 11px;
    background: #eff6ff;
    border: 1px solid #bfdbfe;
    border-left: 4px solid #2563eb;
    color: #1e40af;
    font-size: 11px;
    line-height: 1.7;
}

.period-info i {
    margin-top: 2px;
    color: #2563eb;
    flex-shrink: 0;
}

/* Upload Box */
.upload-box {
    position: relative;
    border: 2px dashed #c084fc;
    border-radius: 14px;
    min-height: 120px;
    padding: 20px;
    display: flex;
    align-items: center;
    gap: 15px;
    background: linear-gradient(120deg, #faf5ff, #fff7ed);
    transition: all .25s ease;
    overflow: hidden;
}

.upload-box:hover {
    border-color: #9333ea;
    background: linear-gradient(120deg, #f3e8ff, #ffedd5);
    box-shadow: 0 5px 16px rgba(147, 51, 234, .10);
}

.upload-icon {
    width: 50px;
    height: 50px;
    border-radius: 14px;
    background: linear-gradient(135deg, #9333ea, #ec4899);
    color: #ffffff;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 22px;
    flex-shrink: 0;
    box-shadow: 0 5px 12px rgba(147, 51, 234, .20);
}

.upload-label {
    display: inline-block;
    color: #7e22ce;
    font-size: 12px;
    font-weight: 850;
    cursor: pointer;
}

.upload-label:hover {
    color: #c026d3;
}

.upload-content p {
    margin: 5px 0 3px;
    font-size: 10px;
    color: #475569;
}

.upload-content span {
    font-size: 10px;
    color: #64748b;
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
    padding: 11px 13px;
    border-radius: 9px;
    background: #d1fae5;
    border: 1px solid #6ee7b7;
    color: #065f46;
    font-size: 11px;
    font-weight: 750;
    overflow-wrap: anywhere;
}

/* Summary Card */
.summary-card {
    position: sticky;
    top: 90px;
    background: #ffffff;
    border: 1px solid #cbdcf5;
    border-top: 5px solid #2563eb;
    border-radius: 18px;
    padding: 22px;
    box-shadow: 0 9px 28px rgba(37, 99, 235, .09);
}

.summary-top {
    display: flex;
    align-items: center;
    gap: 12px;
}

.summary-shield {
    width: 47px;
    height: 47px;
    border-radius: 13px;
    background: linear-gradient(135deg, #0d9488, #2563eb);
    color: #ffffff;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 22px;
    box-shadow: 0 5px 14px rgba(37, 99, 235, .20);
}

.summary-top span {
    display: block;
    color: #0d9488;
    font-size: 9px;
    font-weight: 900;
    letter-spacing: 1.5px;
}

.summary-top h4 {
    margin: 3px 0 0;
    font-size: 17px;
    font-weight: 850;
    color: #173b70;
}

.summary-divider {
    height: 2px;
    background: linear-gradient(90deg, #0d9488, #2563eb, #9333ea, transparent);
    margin: 20px 0;
}

.summary-product {
    display: flex;
    align-items: center;
    gap: 12px;
    margin-bottom: 20px;
    padding: 12px;
    background: #eff6ff;
    border: 1px solid #dbeafe;
    border-radius: 12px;
}

.summary-product img,
.summary-placeholder {
    width: 60px;
    height: 60px;
    flex-shrink: 0;
    border-radius: 12px;
    object-fit: cover;
    border: 2px solid #ffffff;
    background: #e0f2fe;
    box-shadow: 0 3px 10px rgba(37, 99, 235, .12);
}

.summary-placeholder {
    display: flex;
    align-items: center;
    justify-content: center;
    color: #2563eb;
    font-size: 22px;
}

.summary-product strong {
    display: block;
    color: #173b70;
    font-size: 12px;
    font-weight: 850;
    overflow-wrap: anywhere;
}

.summary-product small {
    display: block;
    margin-top: 5px;
    color: #64748b;
    font-size: 10px;
}

/* Summary Details */
.summary-item {
    padding: 13px;
    margin-bottom: 9px;
    background: #f8fafc;
    border: 1px solid #e2e8f0;
    border-radius: 10px;
}

.summary-item:nth-of-type(2) {
    background: #f0fdfa;
    border-color: #ccfbf1;
}

.summary-item span {
    display: flex;
    align-items: center;
    gap: 7px;
    color: #64748b;
    font-size: 10px;
    font-weight: 700;
    margin-bottom: 6px;
}

.summary-item span i {
    color: #0d9488;
}

.summary-item strong {
    display: block;
    color: #1e3a5f;
    font-size: 12px;
    font-weight: 800;
    overflow-wrap: anywhere;
}

/* Summary Note */
.summary-note {
    display: flex;
    gap: 10px;
    margin-top: 15px;
    padding: 13px;
    background: #fffbeb;
    border: 1px solid #fde68a;
    border-left: 4px solid #f59e0b;
    border-radius: 11px;
}

.summary-note i {
    color: #d97706;
    margin-top: 2px;
    flex-shrink: 0;
}

.summary-note p {
    margin: 0;
    color: #78350f;
    font-size: 10px;
    line-height: 1.7;
}

/* Secure Card */
.secure-card {
    margin-top: 17px;
    background: linear-gradient(120deg, #d1fae5, #ecfdf5);
    border: 1px solid #6ee7b7;
    border-left: 4px solid #059669;
    border-radius: 13px;
    padding: 15px;
    display: flex;
    gap: 11px;
    color: #047857;
}

.secure-card > i {
    font-size: 20px;
    margin-top: 1px;
}

.secure-card strong {
    display: block;
    font-size: 12px;
    font-weight: 850;
}

.secure-card p {
    margin: 5px 0 0;
    color: #166534;
    font-size: 10px;
    line-height: 1.6;
}

/* Bottom Actions */
.bottom-actions {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 13px;
    margin-top: 8px;
    padding-bottom: 12px;
}

.btn-back,
.btn-save {
    min-height: 49px;
    padding: 0 21px;
    border-radius: 11px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    text-decoration: none;
    font-size: 13px;
    font-weight: 850;
    transition: all .25s ease;
}

.btn-back {
    background: #eff6ff;
    border: 1px solid #bfdbfe;
    color: #1d4ed8;
}

.btn-back:hover {
    background: #2563eb;
    border-color: #2563eb;
    color: #ffffff;
    transform: translateY(-2px);
    box-shadow: 0 6px 15px rgba(37, 99, 235, .20);
}

.btn-save {
    border: 0;
    background: linear-gradient(135deg, #059669, #0d9488);
    color: #ffffff;
    box-shadow: 0 6px 17px rgba(5, 150, 105, .23);
    cursor: pointer;
}

.btn-save:hover {
    background: linear-gradient(135deg, #047857, #0f766e);
    color: #ffffff;
    transform: translateY(-2px);
    box-shadow: 0 9px 21px rgba(5, 150, 105, .30);
}

.btn-save:active,
.btn-back:active {
    transform: scale(.97);
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

    .product-header-info {
        min-width: 0;
        flex: 1;
    }

    .product-header-info h2 {
        font-size: 20px;
    }

    .protection-badge {
        margin-left: 0;
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

    .upload-box {
        padding: 15px;
    }
}

@media (max-width: 380px) {
    .product-icon {
        width: 52px;
        height: 52px;
        font-size: 23px;
    }

    .product-meta {
        gap: 8px;
        flex-direction: column;
    }

    .card-heading h4 {
        font-size: 15px;
    }
}
</style>
@endpush
