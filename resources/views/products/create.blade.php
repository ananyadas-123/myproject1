@extends('layouts.app')

@section('page_title', 'Add Product')
@section('page_subtitle', 'Register a new product and start its lifecycle')

@section('content')

<div class="add-product-page">

    {{-- Page Header --}}
    <div class="page-heading">
        <div>
            <div class="heading-icon">
                <i class="bi bi-box-seam"></i>
            </div>

            <h1>Add New Product</h1>

            <p>
                Add your product details to create its digital lifecycle record.
            </p>
        </div>

        <a href="{{ route('products.index') }}" class="back-btn">
            <i class="bi bi-arrow-left"></i>
            My Products
        </a>
    </div>


    {{-- Validation Errors --}}
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


    {{-- Product Form --}}
    <form
        action="{{ route('products.store') }}"
        method="POST"
        enctype="multipart/form-data"
    >
        @csrf

        <div class="form-layout">

            {{-- LEFT SIDE --}}
            <div>

                {{-- Basic Information --}}
                <div class="form-card">

                    <div class="card-header">
                        <div class="card-icon green">
                            <i class="bi bi-info-circle"></i>
                        </div>

                        <div>
                            <h2>Product Information</h2>
                            <p>Basic details about your product.</p>
                        </div>
                    </div>


                    <div class="form-grid">

                        {{-- Category --}}
                        <div class="form-group">
                            <label for="category">
                                Product Category
                                <span>*</span>
                            </label>

                            <select
                                name="category"
                                id="category"
                                class="form-control"
                                required
                            >
                                <option value="">Select category</option>

                                <option value="Air Conditioner"
                                    {{ old('category') == 'Air Conditioner' ? 'selected' : '' }}>
                                    Air Conditioner
                                </option>

                                <option value="Refrigerator"
                                    {{ old('category') == 'Refrigerator' ? 'selected' : '' }}>
                                    Refrigerator
                                </option>

                                <option value="Washing Machine"
                                    {{ old('category') == 'Washing Machine' ? 'selected' : '' }}>
                                    Washing Machine
                                </option>

                                <option value="Laptop"
                                    {{ old('category') == 'Laptop' ? 'selected' : '' }}>
                                    Laptop
                                </option>

                                <option value="Television"
                                    {{ old('category') == 'Television' ? 'selected' : '' }}>
                                    Television
                                </option>

                                <option value="Mobile Phone"
                                    {{ old('category') == 'Mobile Phone' ? 'selected' : '' }}>
                                    Mobile Phone
                                </option>

                                <option value="Other"
                                    {{ old('category') == 'Other' ? 'selected' : '' }}>
                                    Other
                                </option>
                            </select>
                        </div>


                        {{-- Brand --}}
                        <div class="form-group">
                            <label for="brand">
                                Brand
                                <span>*</span>
                            </label>

                            <input
                                type="text"
                                name="brand"
                                id="brand"
                                class="form-control"
                                value="{{ old('brand') }}"
                                placeholder="e.g. Samsung"
                                required
                            >
                        </div>


                        {{-- Model --}}
                        <div class="form-group">
                            <label for="model">
                                Model
                                <span>*</span>
                            </label>

                            <input
                                type="text"
                                name="model"
                                id="model"
                                class="form-control"
                                value="{{ old('model') }}"
                                placeholder="e.g. WW80T554DAX"
                                required
                            >
                        </div>


                        {{-- Serial Number --}}
                        <div class="form-group">
                            <label for="serial_number">
                                Serial Number
                                <span>*</span>
                            </label>

                            <input
                                type="text"
                                name="serial_number"
                                id="serial_number"
                                class="form-control"
                                value="{{ old('serial_number') }}"
                                placeholder="Enter serial number"
                                required
                            >
                        </div>

                    </div>

                </div>


                {{-- Purchase Information --}}
                <div class="form-card">

                    <div class="card-header">
                        <div class="card-icon blue">
                            <i class="bi bi-calendar-check"></i>
                        </div>

                        <div>
                            <h2>Purchase Information</h2>
                            <p>Record when and how much you paid for the product.</p>
                        </div>
                    </div>


                    <div class="form-grid">

                        {{-- Purchase Date --}}
                        <div class="form-group">
                            <label for="purchase_date">
                                Purchase Date
                                <span>*</span>
                            </label>

                            <input
                                type="date"
                                name="purchase_date"
                                id="purchase_date"
                                class="form-control"
                                value="{{ old('purchase_date') }}"
                                required
                            >
                        </div>


                        {{-- Purchase Price --}}
                        <div class="form-group">
                            <label for="purchase_price">
                                Purchase Price
                            </label>

                            <div class="price-input">
                                <span>₹</span>

                                <input
                                    type="number"
                                    name="purchase_price"
                                    id="purchase_price"
                                    class="form-control"
                                    value="{{ old('purchase_price') }}"
                                    placeholder="0.00"
                                    step="0.01"
                                    min="0"
                                >
                            </div>
                        </div>


                        {{-- Condition --}}
                        <div class="form-group full-width">
                            <label for="condition">
                                Product Condition
                                <span>*</span>
                            </label>

                            <select
                                name="condition"
                                id="condition"
                                class="form-control"
                                required
                            >
                                <option value="">Select condition</option>

                                <option value="new"
                                    {{ old('condition') == 'new' ? 'selected' : '' }}>
                                    New
                                </option>

                                <option value="good"
                                    {{ old('condition') == 'good' ? 'selected' : '' }}>
                                    Good
                                </option>

                                <option value="fair"
                                    {{ old('condition') == 'fair' ? 'selected' : '' }}>
                                    Fair
                                </option>

                                <option value="poor"
                                    {{ old('condition') == 'poor' ? 'selected' : '' }}>
                                    Poor
                                </option>
                            </select>
                        </div>

                    </div>

                </div>

            </div>


            {{-- RIGHT SIDE --}}
            <div>

                {{-- Product Image --}}
                <div class="form-card">

                    <div class="card-header">
                        <div class="card-icon purple">
                            <i class="bi bi-image"></i>
                        </div>

                        <div>
                            <h2>Product Image</h2>
                            <p>Upload a clear photo of your product.</p>
                        </div>
                    </div>


                    <div class="upload-box">

                        <div class="upload-icon">
                            <i class="bi bi-cloud-arrow-up"></i>
                        </div>

                        <h3>Upload Product Image</h3>

                        <p>
                            JPG, JPEG, PNG or WEBP
                        </p>

                        <input
                            type="file"
                            name="image"
                            id="image"
                            accept=".jpg,.jpeg,.png,.webp"
                            class="file-input"
                        >

                        <label for="image" class="upload-btn">
                            <i class="bi bi-upload"></i>
                            Choose Image
                        </label>

                        <div id="image-name" class="file-name">
                            No file selected
                        </div>

                    </div>

                </div>


                {{-- Invoice --}}
                <div class="form-card">

                    <div class="card-header">
                        <div class="card-icon orange">
                            <i class="bi bi-receipt"></i>
                        </div>

                        <div>
                            <h2>Purchase Invoice</h2>
                            <p>Keep your purchase document with the product.</p>
                        </div>
                    </div>


                    <div class="invoice-upload">

                        <i class="bi bi-file-earmark-text"></i>

                        <div>
                            <strong>Upload Invoice</strong>

                            <small>
                                PDF, JPG or PNG
                            </small>
                        </div>

                        <input
                            type="file"
                            name="invoice"
                            id="invoice"
                            accept=".pdf,.jpg,.jpeg,.png"
                        >

                        <label for="invoice">
                            Choose
                        </label>

                    </div>

                    <div id="invoice-name" class="invoice-name">
                        No invoice selected
                    </div>

                </div>


                {{-- Info Card --}}
                <div class="info-card">

                    <div class="info-icon">
                        <i class="bi bi-shield-check"></i>
                    </div>

                    <div>
                        <h3>Your Product Passport</h3>

                        <p>
                            After adding your product, ProductLife can maintain
                            its digital passport, warranty, maintenance and
                            repair journey in one place.
                        </p>
                    </div>

                </div>

            </div>

        </div>


        {{-- Bottom Actions --}}
        <div class="form-actions">

            <a
                href="{{ route('products.index') }}"
                class="cancel-btn"
            >
                Cancel
            </a>

            <button
                type="submit"
                class="save-btn"
            >
                <i class="bi bi-check2-circle"></i>
                Add Product
            </button>

        </div>

    </form>

</div>

@endsection


@push('styles')

<style>


/* MAIN PAGE */
.add-product-page {
    max-width: 1180px;
    margin: 0 auto;
    color: #172b23;
}

/* PAGE HEADER */
.add-product-page .page-heading {
    position: relative;
    overflow: hidden;
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 20px;
    padding: 30px;
    margin-bottom: 27px;
    border-radius: 22px;
    background: linear-gradient(120deg, #073b2b 0%, #087f5b 55%, #0ea5a0 100%);
    box-shadow: 0 14px 30px rgba(8, 127, 91, .22);
}

.add-product-page .page-heading::before {
    content: "";
    position: absolute;
    width: 230px;
    height: 230px;
    right: 100px;
    top: -145px;
    border: 35px solid rgba(255,255,255,.09);
    border-radius: 50%;
}

.add-product-page .page-heading::after {
    content: "";
    position: absolute;
    width: 150px;
    height: 150px;
    right: -35px;
    bottom: -100px;
    background: rgba(255,255,255,.09);
    border-radius: 50%;
}

.add-product-page .page-heading > div,
.add-product-page .back-btn {
    position: relative;
    z-index: 1;
}

.add-product-page .heading-icon {
    width: 54px;
    height: 54px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 14px;
    background: linear-gradient(135deg, #a7f3d0, #5eead4);
    color: #064e3b;
    border-radius: 16px;
    font-size: 24px;
    box-shadow: 0 7px 18px rgba(0,0,0,.15);
}

.add-product-page .page-heading h1 {
    margin: 0;
    color: #fff;
    font-size: 30px;
    font-weight: 850;
    letter-spacing: -.7px;
}

.add-product-page .page-heading p {
    margin: 8px 0 0;
    color: #d1fae5;
    font-size: 13px;
    line-height: 1.7;
}

.add-product-page .back-btn {
    display: inline-flex;
    align-items: center;
    gap: 9px;
    padding: 13px 19px;
    background: #fff;
    color: #087f5b;
    border: none;
    border-radius: 12px;
    text-decoration: none;
    font-size: 13px;
    font-weight: 800;
    white-space: nowrap;
    box-shadow: 0 6px 15px rgba(0,0,0,.13);
    transition: .25s ease;
}

.add-product-page .back-btn:hover {
    background: #d1fae5;
    color: #064e3b;
    transform: translateY(-3px);
}

/* ERROR */
.add-product-page .error-box {
    background: #fff1f2;
    border: 1px solid #fda4af;
    border-left: 5px solid #e11d48;
    border-radius: 14px;
    padding: 18px 20px;
    margin-bottom: 22px;
    color: #9f1239;
}

.add-product-page .error-title {
    display: flex;
    align-items: center;
    gap: 9px;
    font-size: 14px;
    font-weight: 800;
    margin-bottom: 8px;
}

.add-product-page .error-box ul {
    margin: 0;
    padding-left: 25px;
    font-size: 13px;
    line-height: 1.8;
}

/* FORM LAYOUT */
.add-product-page .form-layout {
    display: grid;
    grid-template-columns: minmax(0, 1.65fr) minmax(300px, 1fr);
    gap: 23px;
    align-items: start;
}

/* FORM CARDS */
.add-product-page .form-card {
    position: relative;
    overflow: hidden;
    background: #fff;
    border: 1px solid #e0e7ef;
    border-radius: 19px;
    padding: 25px;
    margin-bottom: 22px;
    box-shadow: 0 9px 25px rgba(31, 41, 55, .07);
    transition: .25s ease;
}

.add-product-page .form-card::before {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: linear-gradient(90deg, #10b981, #3b82f6, #8b5cf6);
}

.add-product-page .form-card:hover {
    transform: translateY(-3px);
    box-shadow: 0 15px 32px rgba(31, 41, 55, .11);
}

/* SECTION HEADERS */
.add-product-page .card-header {
    display: flex;
    align-items: center;
    gap: 14px;
    padding-bottom: 20px;
    margin-bottom: 22px;
    border-bottom: 1px solid #e9edf3;
}

.add-product-page .card-icon {
    width: 47px;
    height: 47px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 14px;
    font-size: 21px;
    flex-shrink: 0;
    box-shadow: 0 5px 12px rgba(0,0,0,.07);
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
    color: #172b23;
    font-size: 17px;
    font-weight: 850;
}

.add-product-page .card-header p {
    margin: 5px 0 0;
    color: #64748b;
    font-size: 12px;
}

/* FORM GRID */
.add-product-page .form-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
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
    color: #25374b;
    font-size: 12.5px;
    font-weight: 800;
}

.add-product-page .form-group label span {
    color: #ef4444;
}

.add-product-page .form-control {
    width: 100%;
    min-height: 50px;
    padding: 12px 14px;
    border: 1.5px solid #d5deea;
    border-radius: 11px;
    background: #f9fbff;
    color: #172b43;
    font-size: 13px;
    outline: none;
    transition: .22s ease;
}

.add-product-page .form-control::placeholder {
    color: #94a3b8;
}

.add-product-page .form-control:hover {
    border-color: #60a5fa;
    background: #fff;
}

.add-product-page .form-control:focus {
    border-color: #2563eb;
    background: #fff;
    box-shadow: 0 0 0 4px rgba(37, 99, 235, .12);
}

.add-product-page select.form-control {
    cursor: pointer;
}

/* PRICE */
.add-product-page .price-input {
    position: relative;
}

.add-product-page .price-input > span {
    position: absolute;
    left: 14px;
    top: 50%;
    transform: translateY(-50%);
    z-index: 2;
    color: #059669;
    font-size: 16px;
    font-weight: 850;
}

.add-product-page .price-input .form-control {
    padding-left: 34px;
}

/* IMAGE UPLOAD */
.add-product-page .upload-box {
    text-align: center;
    padding: 29px 18px;
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
    width: 62px;
    height: 62px;
    margin: 0 auto 14px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 18px;
    background: linear-gradient(135deg, #4f46e5, #8b5cf6);
    color: #fff;
    font-size: 27px;
    box-shadow: 0 8px 17px rgba(99, 102, 241, .25);
}

.add-product-page .upload-box h3 {
    margin: 0;
    font-size: 15px;
    font-weight: 850;
    color: #312e81;
}

.add-product-page .upload-box p {
    margin: 7px 0 16px;
    color: #6366a3;
    font-size: 11.5px;
}

.add-product-page .file-input {
    display: none;
}

.add-product-page .upload-btn {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 11px 19px;
    background: linear-gradient(135deg, #4f46e5, #7c3aed);
    color: #fff;
    border-radius: 10px;
    font-size: 12.5px;
    font-weight: 800;
    cursor: pointer;
    box-shadow: 0 6px 14px rgba(79, 70, 229, .22);
    transition: .2s ease;
}

.add-product-page .upload-btn:hover {
    background: linear-gradient(135deg, #3730a3, #6d28d9);
    transform: translateY(-2px);
}

.add-product-page .file-name {
    margin-top: 13px;
    color: #4338ca;
    font-size: 11.5px;
    font-weight: 700;
    word-break: break-word;
}

/* INVOICE */
.add-product-page .invoice-upload {
    display: flex;
    align-items: center;
    gap: 12px;
    padding: 15px;
    background: #fff7ed;
    border: 1px solid #fed7aa;
    border-radius: 14px;
}

.add-product-page .invoice-upload > i {
    width: 43px;
    height: 43px;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
    background: linear-gradient(135deg, #fb923c, #f97316);
    color: #fff;
    border-radius: 12px;
    font-size: 20px;
}

.add-product-page .invoice-upload div {
    flex: 1;
    min-width: 0;
}

.add-product-page .invoice-upload strong {
    display: block;
    color: #9a3412;
    font-size: 12.5px;
}

.add-product-page .invoice-upload small {
    display: block;
    margin-top: 4px;
    color: #c2410c;
    font-size: 10.5px;
}

.add-product-page .invoice-upload input {
    display: none;
}

.add-product-page .invoice-upload label {
    cursor: pointer;
    padding: 9px 13px;
    background: #ea580c;
    border-radius: 9px;
    color: #fff;
    font-size: 11.5px;
    font-weight: 800;
    transition: .2s ease;
}

.add-product-page .invoice-upload label:hover {
    background: #c2410c;
}

.add-product-page .invoice-name {
    margin-top: 10px;
    padding-left: 4px;
    color: #9a3412;
    font-size: 11px;
    font-weight: 700;
    word-break: break-word;
}

/* INFO CARD */
.add-product-page .info-card {
    display: flex;
    align-items: flex-start;
    gap: 14px;
    padding: 20px;
    background: linear-gradient(125deg, #ecfdf5, #e0f2fe);
    border: 1px solid #a7f3d0;
    border-left: 5px solid #059669;
    border-radius: 16px;
}

.add-product-page .info-icon {
    width: 43px;
    height: 43px;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
    background: linear-gradient(135deg, #059669, #0d9488);
    color: #fff;
    border-radius: 12px;
    font-size: 20px;
}

.add-product-page .info-card h3 {
    margin: 2px 0 7px;
    color: #065f46;
    font-size: 13.5px;
    font-weight: 850;
}

.add-product-page .info-card p {
    margin: 0;
    color: #365b50;
    font-size: 11.5px;
    line-height: 1.75;
}

/* ACTION BUTTONS */
.add-product-page .form-actions {
    display: flex;
    align-items: center;
    justify-content: flex-end;
    gap: 13px;
    padding: 22px 0 5px;
}

.add-product-page .cancel-btn,
.add-product-page .save-btn {
    min-height: 51px;
    padding: 0 24px;
    border-radius: 11px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 9px;
    font-size: 13px;
    font-weight: 800;
    text-decoration: none;
    transition: .22s ease;
}

.add-product-page .cancel-btn {
    background: #fff;
    border: 1.5px solid #cbd5e1;
    color: #475569;
}

.add-product-page .cancel-btn:hover {
    background: #f1f5f9;
    color: #1e293b;
    transform: translateY(-2px);
}

.add-product-page .save-btn {
    border: none;
    background: linear-gradient(120deg, #047857, #10b981);
    color: #fff;
    cursor: pointer;
    box-shadow: 0 7px 17px rgba(5, 150, 105, .25);
}

.add-product-page .save-btn:hover {
    background: linear-gradient(120deg, #065f46, #059669);
    transform: translateY(-3px);
    box-shadow: 0 11px 22px rgba(5, 150, 105, .32);
}

/* RESPONSIVE */
@media (max-width: 900px) {
    .add-product-page .form-layout {
        grid-template-columns: 1fr;
    }
}

@media (max-width: 650px) {
    .add-product-page .page-heading {
        align-items: flex-start;
        flex-direction: column;
        padding: 23px 20px;
    }

    .add-product-page .page-heading h1 {
        font-size: 25px;
    }

    .add-product-page .form-grid {
        grid-template-columns: 1fr;
    }

    .add-product-page .form-group.full-width {
        grid-column: auto;
    }

    .add-product-page .form-card {
        padding: 19px;
    }

    .add-product-page .form-actions {
        flex-direction: column-reverse;
    }

    .add-product-page .cancel-btn,
    .add-product-page .save-btn {
        width: 100%;
    }
}

@media (max-width: 400px) {
    .add-product-page .invoice-upload {
        flex-wrap: wrap;
    }

    .add-product-page .invoice-upload label {
        margin-left: auto;
    }
}


</style>

@endpush


@push('scripts')

<script>

document.addEventListener('DOMContentLoaded', function () {

    const imageInput = document.getElementById('image');
    const imageName = document.getElementById('image-name');

    if (imageInput) {
        imageInput.addEventListener('change', function () {

            if (this.files.length > 0) {
                imageName.textContent = this.files[0].name;
            } else {
                imageName.textContent = 'No file selected';
            }

        });
    }


    const invoiceInput = document.getElementById('invoice');
    const invoiceName = document.getElementById('invoice-name');

    if (invoiceInput) {
        invoiceInput.addEventListener('change', function () {

            if (this.files.length > 0) {
                invoiceName.textContent = this.files[0].name;
            } else {
                invoiceName.textContent = 'No invoice selected';
            }

        });
    }

});

</script>

@endpush