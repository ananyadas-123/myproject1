
@extends('layouts.app')

@section('page_title', 'Add Product')
@section('page_subtitle', 'Register a new product and start its lifecycle')

@section('content')

<div class="add-product-page">

    {{-- PAGE HEADER --}}
    <div class="page-heading">
        <div class="heading-content">
            <div class="heading-icon">
                <i class="bi bi-box-seam"></i>
            </div>

            <div class="heading-label">PRODUCT REGISTRATION</div>
            <h1>Add New Product</h1>
            <p>Register your product and create its digital lifecycle passport.</p>
        </div>

        <a href="{{ route('products.index') }}" class="back-btn">
            <i class="bi bi-arrow-left"></i>
            My Products
        </a>

        <div class="heading-decoration heading-decoration-one"></div>
        <div class="heading-decoration heading-decoration-two"></div>
    </div>

    {{-- VALIDATION ERRORS --}}
    @if ($errors->any())
        <div class="error-box">
            <div class="error-title">
                <i class="bi bi-exclamation-triangle-fill"></i>
                Please fix the following errors
            </div>

            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- PRODUCT FORM --}}
    <form action="{{ route('products.store') }}"
          method="POST"
          enctype="multipart/form-data">

        @csrf

        <div class="form-layout">

            {{-- LEFT COLUMN --}}
            <div class="form-main-column">

                {{-- PRODUCT INFORMATION --}}
                <div class="form-card">

                    <div class="card-header">
                        <div class="card-icon green">
                            <i class="bi bi-info-circle-fill"></i>
                        </div>

                        <div>
                            <h2>Product Information</h2>
                            <p>Enter the basic identification details of your product.</p>
                        </div>

                        <span class="section-number">01</span>
                    </div>

                    <div class="form-grid">

                        <div class="form-group">
                            <label for="category">
                                Product Category <span>*</span>
                            </label>

                            <select name="category" id="category" class="form-control" required>
                                <option value="">Select category</option>

                                <option value="Air Conditioner" {{ old('category') == 'Air Conditioner' ? 'selected' : '' }}>Air Conditioner</option>
                                <option value="Refrigerator" {{ old('category') == 'Refrigerator' ? 'selected' : '' }}>Refrigerator</option>
                                <option value="Washing Machine" {{ old('category') == 'Washing Machine' ? 'selected' : '' }}>Washing Machine</option>
                                <option value="Laptop" {{ old('category') == 'Laptop' ? 'selected' : '' }}>Laptop</option>
                                <option value="Television" {{ old('category') == 'Television' ? 'selected' : '' }}>Television</option>
                                <option value="Mobile Phone" {{ old('category') == 'Mobile Phone' ? 'selected' : '' }}>Mobile Phone</option>
                                <option value="Other" {{ old('category') == 'Other' ? 'selected' : '' }}>Other</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="brand">Brand <span>*</span></label>

                            <input type="text"
                                   name="brand"
                                   id="brand"
                                   class="form-control"
                                   value="{{ old('brand') }}"
                                   placeholder="e.g. Samsung"
                                   required>
                        </div>

                        <div class="form-group">
                            <label for="model">Model <span>*</span></label>

                            <input type="text"
                                   name="model"
                                   id="model"
                                   class="form-control"
                                   value="{{ old('model') }}"
                                   placeholder="e.g. WW80T554DAX"
                                   required>
                        </div>

                        <div class="form-group">
                            <label for="serial_number">Serial Number <span>*</span></label>

                            <input type="text"
                                   name="serial_number"
                                   id="serial_number"
                                   class="form-control"
                                   value="{{ old('serial_number') }}"
                                   placeholder="Enter serial number"
                                   required>
                        </div>

                    </div>
                </div>

                {{-- PURCHASE INFORMATION --}}
                <div class="form-card">

                    <div class="card-header">
                        <div class="card-icon blue">
                            <i class="bi bi-calendar2-check-fill"></i>
                        </div>

                        <div>
                            <h2>Purchase Information</h2>
                            <p>Record the purchase date, price and current condition.</p>
                        </div>

                        <span class="section-number">02</span>
                    </div>

                    <div class="form-grid">

                        <div class="form-group">
                            <label for="purchase_date">
                                Purchase Date <span>*</span>
                            </label>

                            <input type="date"
                                   name="purchase_date"
                                   id="purchase_date"
                                   class="form-control"
                                   value="{{ old('purchase_date') }}"
                                   required>
                        </div>

                        <div class="form-group">
                            <label for="purchase_price">Purchase Price</label>

                            <div class="price-input">
                                <span>₹</span>

                                <input type="number"
                                       name="purchase_price"
                                       id="purchase_price"
                                       class="form-control"
                                       value="{{ old('purchase_price') }}"
                                       placeholder="0.00"
                                       step="0.01"
                                       min="0">
                            </div>
                        </div>

                        <div class="form-group full-width">
                            <label for="condition">
                                Product Condition <span>*</span>
                            </label>

                            <select name="condition" id="condition" class="form-control" required>
                                <option value="">Select condition</option>
                                <option value="new" {{ old('condition') == 'new' ? 'selected' : '' }}>New</option>
                                <option value="good" {{ old('condition') == 'good' ? 'selected' : '' }}>Good</option>
                                <option value="fair" {{ old('condition') == 'fair' ? 'selected' : '' }}>Fair</option>
                                <option value="poor" {{ old('condition') == 'poor' ? 'selected' : '' }}>Poor</option>
                            </select>
                        </div>

                    </div>
                </div>

            </div>

            {{-- RIGHT COLUMN --}}
            <div class="form-side-column">

                {{-- PRODUCT IMAGE --}}
                <div class="form-card">

                    <div class="card-header">
                        <div class="card-icon purple">
                            <i class="bi bi-image-fill"></i>
                        </div>

                        <div>
                            <h2>Product Image</h2>
                            <p>Upload a clear product photograph.</p>
                        </div>
                    </div>

                    <div class="upload-box">

                        <div class="upload-icon">
                            <i class="bi bi-cloud-arrow-up-fill"></i>
                        </div>

                        <h3>Upload Product Image</h3>
                        <p>Choose an image from your device</p>

                        <input type="file"
                               name="image"
                               id="image"
                               accept=".jpg,.jpeg,.png,.webp"
                               class="file-input">

                        <label for="image" class="upload-btn">
                            <i class="bi bi-folder2-open"></i>
                            Choose Image
                        </label>

                        <div id="image-name" class="file-name">
                            No file selected
                        </div>

                        <div class="upload-formats">
                            <i class="bi bi-file-image"></i>
                            JPG · JPEG · PNG · WEBP
                        </div>
                    </div>
                </div>

                {{-- INVOICE --}}
                <div class="form-card">

                    <div class="card-header">
                        <div class="card-icon orange">
                            <i class="bi bi-receipt-cutoff"></i>
                        </div>

                        <div>
                            <h2>Purchase Invoice</h2>
                            <p>Attach your purchase document.</p>
                        </div>
                    </div>

                    <div class="invoice-upload">
                        <i class="bi bi-file-earmark-pdf"></i>

                        <div class="invoice-details">
                            <strong>Upload Invoice</strong>
                            <small>PDF, JPG or PNG</small>
                        </div>

                        <input type="file"
                               name="invoice"
                               id="invoice"
                               accept=".pdf,.jpg,.jpeg,.png">

                        <label for="invoice">
                            <i class="bi bi-plus-lg"></i>
                            Choose
                        </label>
                    </div>

                    <div id="invoice-name" class="invoice-name">
                        <i class="bi bi-paperclip"></i>
                        No invoice selected
                    </div>
                </div>

                {{-- PRODUCT PASSPORT INFO --}}
                <div class="info-card">

                    <div class="info-icon">
                        <i class="bi bi-shield-check"></i>
                    </div>

                    <div>
                        <span class="info-label">DIGITAL PRODUCT PASSPORT</span>
                        <h3>Your Product, One Complete Record</h3>

                        <p>
                            ProductLife helps maintain your product's digital
                            passport, warranty, maintenance and repair journey
                            in one convenient place.
                        </p>
                    </div>
                </div>

                {{-- QUICK NOTE --}}
                <div class="secure-note">
                    <i class="bi bi-lock-fill"></i>
                    <span>Your product information is submitted securely.</span>
                </div>

            </div>

        </div>

        {{-- FORM ACTIONS --}}
        <div class="form-actions">

            <div class="action-note">
                <i class="bi bi-info-circle-fill"></i>
                Fields marked with * are required.
            </div>

            <div class="action-buttons">
                <a href="{{ route('products.index') }}" class="cancel-btn">
                    Cancel
                </a>

                <button type="submit" class="save-btn">
                    <i class="bi bi-check2-circle"></i>
                    Add Product
                    <i class="bi bi-arrow-right"></i>
                </button>
            </div>

        </div>

    </form>

</div>

@endsection


@push('styles')
<style>
/* =========================================
   PRODUCT CREATE PAGE - PREMIUM THEME
========================================= */

.add-product-page {
    width: 100%;
    max-width: 1250px;
    margin: 0 auto;
    color: #172033;
    padding-bottom: 25px;
}

.add-product-page,
.add-product-page * {
    box-sizing: border-box;
}

/* PAGE HEADER */
.add-product-page .page-heading {
    position: relative;
    isolation: isolate;
    overflow: hidden;
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 25px;
    padding: 32px;
    margin-bottom: 27px;
    min-height: 210px;
    border-radius: 23px;
    background: linear-gradient(115deg, #111a40 0%, #302477 48%, #2563eb 100%);
    box-shadow: 0 15px 35px rgba(37, 52, 125, .22);
}

.add-product-page .heading-content {
    position: relative;
    z-index: 2;
}

.add-product-page .heading-icon {
    display: flex;
    justify-content: center;
    align-items: center;
    width: 55px;
    height: 55px;
    margin-bottom: 15px;
    border-radius: 16px;
    background: linear-gradient(135deg, #a5f3fc, #67e8f9);
    color: #164e63;
    font-size: 25px;
    box-shadow: 0 8px 20px rgba(0,0,0,.18);
}

.add-product-page .heading-label {
    margin-bottom: 7px;
    color: #a5b4fc;
    font-size: 10px;
    font-weight: 900;
    letter-spacing: 2px;
}

.add-product-page .page-heading h1 {
    margin: 0;
    color: #fff;
    font-size: 30px;
    line-height: 1.3;
    font-weight: 900;
    letter-spacing: -.7px;
}

.add-product-page .page-heading p {
    margin: 9px 0 0;
    color: #e0e7ff;
    font-size: 13px;
    line-height: 1.7;
}

.add-product-page .heading-decoration {
    position: absolute;
    z-index: -1;
    border: 30px solid rgba(255,255,255,.07);
    border-radius: 50%;
    pointer-events: none;
}

.add-product-page .heading-decoration-one {
    width: 300px;
    height: 300px;
    right: 120px;
    top: -185px;
}

.add-product-page .heading-decoration-two {
    width: 220px;
    height: 220px;
    right: -50px;
    bottom: -155px;
    border-width: 40px;
    border-color: rgba(103,232,249,.13);
}

.add-product-page .back-btn {
    position: relative;
    z-index: 2;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 9px;
    flex-shrink: 0;
    padding: 13px 19px;
    border: 1px solid rgba(255,255,255,.5);
    border-radius: 12px;
    background: #fff;
    color: #3730a3;
    text-decoration: none;
    font-size: 12px;
    font-weight: 850;
    box-shadow: 0 7px 18px rgba(0,0,0,.16);
    transition: .25s ease;
}

.add-product-page .back-btn:hover {
    background: #cffafe;
    color: #164e63;
    transform: translateY(-3px);
}

/* ERROR BOX */
.add-product-page .error-box {
    margin-bottom: 23px;
    padding: 19px 22px;
    background: #fff1f2;
    border: 1px solid #fda4af;
    border-left: 5px solid #e11d48;
    border-radius: 14px;
    color: #9f1239;
    box-shadow: 0 5px 15px rgba(225,29,72,.07);
}

.add-product-page .error-title {
    display: flex;
    align-items: center;
    gap: 9px;
    margin-bottom: 9px;
    font-size: 14px;
    font-weight: 900;
}

.add-product-page .error-box ul {
    margin: 0;
    padding-left: 25px;
    font-size: 12px;
    line-height: 1.9;
}

/* MAIN GRID */
.add-product-page .form-layout {
    display: grid;
    grid-template-columns: minmax(0, 1.65fr) minmax(290px, 1fr);
    gap: 23px;
    align-items: start;
}

.add-product-page .form-main-column,
.add-product-page .form-side-column {
    min-width: 0;
}

/* FORM CARD */
.add-product-page .form-card {
    position: relative;
    overflow: hidden;
    margin-bottom: 22px;
    padding: 25px;
    background: #fff;
    border: 1px solid #e2e8f0;
    border-radius: 19px;
    box-shadow: 0 7px 23px rgba(15,23,42,.055);
    transition: transform .25s ease, box-shadow .25s ease;
}

.add-product-page .form-card::before {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: linear-gradient(90deg, #10b981, #2563eb, #8b5cf6);
}

.add-product-page .form-card:hover {
    transform: translateY(-2px);
    box-shadow: 0 13px 29px rgba(15,23,42,.09);
}

/* CARD HEADER */
.add-product-page .card-header {
    position: relative;
    display: flex;
    align-items: center;
    gap: 13px;
    padding-bottom: 19px;
    margin-bottom: 22px;
    border-bottom: 1px solid #e8edf5;
}

.add-product-page .card-icon {
    width: 47px;
    height: 47px;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-shrink: 0;
    border-radius: 14px;
    font-size: 20px;
}

.add-product-page .card-icon.green {
    background: linear-gradient(135deg, #bbf7d0, #34d399);
    color: #065f46;
}

.add-product-page .card-icon.blue {
    background: linear-gradient(135deg, #bfdbfe, #60a5fa);
    color: #1e40af;
}

.add-product-page .card-icon.purple {
    background: linear-gradient(135deg, #ddd6fe, #a78bfa);
    color: #5b21b6;
}

.add-product-page .card-icon.orange {
    background: linear-gradient(135deg, #fed7aa, #fb923c);
    color: #9a3412;
}

.add-product-page .card-header h2 {
    margin: 0;
    color: #172033;
    font-size: 16px;
    font-weight: 900;
}

.add-product-page .card-header p {
    margin: 5px 0 0;
    color: #64748b;
    font-size: 11.5px;
    line-height: 1.6;
}

.add-product-page .section-number {
    margin-left: auto;
    color: #cbd5e1;
    font-size: 23px;
    font-weight: 900;
}

/* FORM GRID */
.add-product-page .form-grid {
    display: grid;
    grid-template-columns: repeat(2, minmax(0, 1fr));
    gap: 21px;
}

.add-product-page .form-group {
    min-width: 0;
}

.add-product-page .form-group.full-width {
    grid-column: 1 / -1;
}

.add-product-page .form-group label {
    display: block;
    margin-bottom: 9px;
    color: #26364d;
    font-size: 12px;
    font-weight: 850;
}

.add-product-page .form-group label span {
    color: #e11d48;
    font-size: 14px;
}

.add-product-page .form-control {
    display: block;
    width: 100%;
    min-height: 49px;
    padding: 12px 14px;
    border: 1.5px solid #d8e0ed;
    border-radius: 11px;
    background: #f8faff;
    color: #172033;
    font-family: inherit;
    font-size: 12.5px;
    font-weight: 600;
    outline: none;
    transition: .22s ease;
}

.add-product-page .form-control::placeholder {
    color: #94a3b8;
    font-weight: 500;
}

.add-product-page .form-control:hover {
    border-color: #93c5fd;
    background: #fff;
}

.add-product-page .form-control:focus {
    border-color: #4f46e5;
    background: #fff;
    box-shadow: 0 0 0 4px rgba(79,70,229,.11);
}

.add-product-page select.form-control {
    cursor: pointer;
}

/* PRICE INPUT */
.add-product-page .price-input {
    position: relative;
}

.add-product-page .price-input > span {
    position: absolute;
    top: 50%;
    left: 14px;
    z-index: 2;
    transform: translateY(-50%);
    color: #059669;
    font-size: 16px;
    font-weight: 900;
}

.add-product-page .price-input .form-control {
    padding-left: 34px;
}

/* IMAGE UPLOAD */
.add-product-page .upload-box {
    padding: 27px 17px;
    text-align: center;
    background: linear-gradient(145deg, #eff6ff, #f5f3ff);
    border: 2px dashed #818cf8;
    border-radius: 17px;
    transition: .25s ease;
}

.add-product-page .upload-box:hover {
    background: linear-gradient(145deg, #dbeafe, #ede9fe);
    border-color: #6366f1;
}

.add-product-page .upload-icon {
    display: flex;
    justify-content: center;
    align-items: center;
    width: 62px;
    height: 62px;
    margin: 0 auto 15px;
    border-radius: 18px;
    background: linear-gradient(135deg, #4f46e5, #9333ea);
    color: #fff;
    font-size: 27px;
    box-shadow: 0 8px 19px rgba(79,70,229,.25);
}

.add-product-page .upload-box h3 {
    margin: 0;
    color: #312e81;
    font-size: 14px;
    font-weight: 900;
}

.add-product-page .upload-box p {
    margin: 7px 0 17px;
    color: #5b5c9c;
    font-size: 11px;
}

.add-product-page .file-input,
.add-product-page .invoice-upload input {
    display: none;
}

.add-product-page .upload-btn {
    display: inline-flex;
    justify-content: center;
    align-items: center;
    gap: 8px;
    padding: 11px 19px;
    border-radius: 10px;
    background: linear-gradient(120deg, #4338ca, #7c3aed);
    color: #fff;
    font-size: 11.5px;
    font-weight: 850;
    cursor: pointer;
    box-shadow: 0 6px 15px rgba(79,70,229,.22);
    transition: .2s ease;
}

.add-product-page .upload-btn:hover {
    background: linear-gradient(120deg, #312e81, #6d28d9);
    transform: translateY(-2px);
}

.add-product-page .file-name {
    margin-top: 13px;
    color: #4338ca;
    font-size: 11px;
    font-weight: 800;
    word-break: break-word;
}

.add-product-page .upload-formats {
    margin-top: 18px;
    padding-top: 13px;
    border-top: 1px solid #c7d2fe;
    color: #555a8d;
    font-size: 10px;
    font-weight: 800;
    letter-spacing: .5px;
}

/* INVOICE UPLOAD */
.add-product-page .invoice-upload {
    display: flex;
    align-items: center;
    gap: 11px;
    padding: 14px;
    background: #fff7ed;
    border: 1px solid #fed7aa;
    border-radius: 13px;
}

.add-product-page .invoice-upload > i {
    display: flex;
    justify-content: center;
    align-items: center;
    width: 43px;
    height: 43px;
    flex-shrink: 0;
    border-radius: 12px;
    background: linear-gradient(135deg, #f97316, #ea580c);
    color: #fff;
    font-size: 21px;
}

.add-product-page .invoice-details {
    flex: 1;
    min-width: 0;
}

.add-product-page .invoice-upload strong {
    display: block;
    color: #9a3412;
    font-size: 12px;
    font-weight: 900;
}

.add-product-page .invoice-upload small {
    display: block;
    margin-top: 4px;
    color: #c2410c;
    font-size: 10px;
}

.add-product-page .invoice-upload label {
    display: inline-flex;
    justify-content: center;
    align-items: center;
    gap: 5px;
    padding: 9px 11px;
    border-radius: 9px;
    background: #ea580c;
    color: #fff;
    font-size: 10px;
    font-weight: 850;
    white-space: nowrap;
    cursor: pointer;
    transition: .2s ease;
}

.add-product-page .invoice-upload label:hover {
    background: #9a3412;
    transform: translateY(-2px);
}

.add-product-page .invoice-name {
    display: flex;
    align-items: center;
    gap: 7px;
    margin-top: 11px;
    padding: 0 4px;
    color: #9a3412;
    font-size: 10.5px;
    font-weight: 800;
    word-break: break-word;
}

/* PRODUCT PASSPORT INFO */
.add-product-page .info-card {
    display: flex;
    align-items: flex-start;
    gap: 13px;
    padding: 20px;
    margin-bottom: 15px;
    border: 1px solid #a7f3d0;
    border-left: 5px solid #059669;
    border-radius: 15px;
    background: linear-gradient(135deg, #ecfdf5, #e0f2fe);
}

.add-product-page .info-icon {
    display: flex;
    justify-content: center;
    align-items: center;
    width: 43px;
    height: 43px;
    flex-shrink: 0;
    border-radius: 12px;
    background: linear-gradient(135deg, #059669, #0d9488);
    color: #fff;
    font-size: 20px;
}

.add-product-page .info-label {
    color: #047857;
    font-size: 9px;
    font-weight: 900;
    letter-spacing: 1px;
}

.add-product-page .info-card h3 {
    margin: 7px 0;
    color: #065f46;
    font-size: 13px;
    font-weight: 900;
    line-height: 1.5;
}

.add-product-page .info-card p {
    margin: 0;
    color: #365b50;
    font-size: 11px;
    line-height: 1.8;
}

/* SECURITY NOTE */
.add-product-page .secure-note {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    padding: 13px;
    border: 1px solid #bfdbfe;
    border-radius: 11px;
    background: #eff6ff;
    color: #1e40af;
    font-size: 10.5px;
    font-weight: 800;
}

.add-product-page .secure-note i {
    color: #2563eb;
    font-size: 14px;
}

/* FORM ACTIONS */
.add-product-page .form-actions {
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    gap: 15px;
    padding: 21px 23px;
    margin-top: 3px;
    border: 1px solid #e2e8f0;
    border-radius: 17px;
    background: #fff;
    box-shadow: 0 7px 20px rgba(15,23,42,.05);
}

.add-product-page .action-note {
    display: flex;
    align-items: center;
    gap: 8px;
    color: #64748b;
    font-size: 11px;
    font-weight: 700;
}

.add-product-page .action-note i {
    color: #2563eb;
    font-size: 15px;
}

.add-product-page .action-buttons {
    display: flex;
    align-items: center;
    gap: 11px;
}

.add-product-page .cancel-btn,
.add-product-page .save-btn {
    min-height: 47px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 9px;
    padding: 0 21px;
    border-radius: 11px;
    font-size: 12px;
    font-weight: 850;
    text-decoration: none;
    transition: .22s ease;
}

.add-product-page .cancel-btn {
    border: 1.5px solid #cbd5e1;
    background: #fff;
    color: #475569;
}

.add-product-page .cancel-btn:hover {
    border-color: #94a3b8;
    background: #f1f5f9;
    color: #172033;
    transform: translateY(-2px);
}

.add-product-page .save-btn {
    border: none;
    background: linear-gradient(120deg, #4338ca, #6d28d9, #2563eb);
    color: #fff;
    cursor: pointer;
    box-shadow: 0 7px 17px rgba(79,70,229,.25);
}

.add-product-page .save-btn:hover {
    background: linear-gradient(120deg, #312e81, #5b21b6, #1d4ed8);
    transform: translateY(-3px);
    box-shadow: 0 11px 23px rgba(79,70,229,.32);
}

.add-product-page .save-btn:active {
    transform: translateY(0);
}

/* RESPONSIVE */
@media (max-width: 1000px) {
    .add-product-page .form-layout {
        grid-template-columns: minmax(0, 1.3fr) minmax(260px, 1fr);
        gap: 17px;
    }

    .add-product-page .form-card {
        padding: 21px;
    }
}

@media (max-width: 800px) {
    .add-product-page .form-layout {
        grid-template-columns: 1fr;
    }

    .add-product-page .form-side-column {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        align-items: start;
        gap: 17px;
    }

    .add-product-page .form-side-column > * {
        min-width: 0;
    }

    .add-product-page .form-side-column .form-card {
        margin-bottom: 0;
    }

    .add-product-page .info-card,
    .add-product-page .secure-note {
        margin-bottom: 0;
    }
}

@media (max-width: 600px) {
    .add-product-page .page-heading {
        min-height: auto;
        flex-direction: column;
        align-items: flex-start;
        padding: 24px 21px;
    }

    .add-product-page .page-heading h1 {
        font-size: 25px;
    }

    .add-product-page .back-btn {
        margin-top: 3px;
    }

    .add-product-page .form-side-column {
        display: block;
    }

    .add-product-page .form-side-column .form-card,
    .add-product-page .info-card {
        margin-bottom: 17px;
    }

    .add-product-page .form-grid {
        grid-template-columns: 1fr;
        gap: 17px;
    }

    .add-product-page .form-group.full-width {
        grid-column: auto;
    }

    .add-product-page .form-card {
        padding: 19px;
    }

    .add-product-page .form-actions {
        align-items: stretch;
        flex-direction: column;
        padding: 18px;
    }

    .add-product-page .action-buttons {
        width: 100%;
        flex-direction: column-reverse;
    }

    .add-product-page .cancel-btn,
    .add-product-page .save-btn {
        width: 100%;
    }

    .add-product-page .action-note {
        line-height: 1.6;
    }
}

@media (max-width: 380px) {
    .add-product-page .invoice-upload {
        flex-wrap: wrap;
    }

    .add-product-page .invoice-upload label {
        margin-left: auto;
    }

    .add-product-page .section-number {
        font-size: 18px;
    }

    .add-product-page .card-header h2 {
        font-size: 14px;
    }
}
</style>
@endpush


@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {

    const imageInput = document.getElementById('image');
    const imageName = document.getElementById('image-name');

    if (imageInput && imageName) {
        imageInput.addEventListener('change', function () {
            imageName.textContent = this.files.length > 0
                ? this.files[0].name
                : 'No file selected';
        });
    }

    const invoiceInput = document.getElementById('invoice');
    const invoiceName = document.getElementById('invoice-name');

    if (invoiceInput && invoiceName) {
        invoiceInput.addEventListener('change', function () {
            invoiceName.innerHTML = '';

            if (this.files.length > 0) {
                const icon = document.createElement('i');
                icon.className = 'bi bi-paperclip';

                invoiceName.appendChild(icon);
                invoiceName.appendChild(
                    document.createTextNode(' ' + this.files[0].name)
                );
            } else {
                const icon = document.createElement('i');
                icon.className = 'bi bi-paperclip';

                invoiceName.appendChild(icon);
                invoiceName.appendChild(
                    document.createTextNode(' No invoice selected')
                );
            }
        });
    }

});
</script>
@endpush
