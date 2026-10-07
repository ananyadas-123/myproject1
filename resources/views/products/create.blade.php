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

.add-product-page {
    max-width: 1180px;
    margin: 0 auto;
}


/* PAGE HEADER */

.page-heading {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 20px;
    margin-bottom: 28px;
}

.heading-icon {
    width: 48px;
    height: 48px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: #e8f7ef;
    color: #176b4d;
    border-radius: 14px;
    font-size: 22px;
    margin-bottom: 13px;
}

.page-heading h1 {
    margin: 0;
    color: #10231d;
    font-size: 31px;
    font-weight: 800;
    letter-spacing: -0.6px;
}

.page-heading p {
    margin: 7px 0 0;
    color: #71817b;
    font-size: 14px;
    line-height: 1.6;
}

.back-btn {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 12px 18px;
    background: #ffffff;
    color: #176b4d;
    border: 1px solid #dce9e3;
    border-radius: 12px;
    text-decoration: none;
    font-size: 13px;
    font-weight: 700;
    transition: .2s ease;
}

.back-btn:hover {
    color: #12583e;
    background: #f3faf6;
    border-color: #bcdcca;
}


/* ERROR */

.error-box {
    background: #fff7f7;
    border: 1px solid #fecaca;
    border-radius: 15px;
    padding: 17px 20px;
    margin-bottom: 22px;
    color: #991b1b;
}

.error-title {
    display: flex;
    align-items: center;
    gap: 8px;
    font-size: 14px;
    font-weight: 800;
    margin-bottom: 7px;
}

.error-box ul {
    margin: 0;
    padding-left: 25px;
    font-size: 13px;
    line-height: 1.7;
}


/* FORM LAYOUT */

.form-layout {
    display: grid;
    grid-template-columns: minmax(0, 1.7fr) minmax(300px, 1fr);
    gap: 22px;
}


/* CARDS */

.form-card {
    background: #ffffff;
    border: 1px solid #e6eee9;
    border-radius: 20px;
    padding: 25px;
    margin-bottom: 22px;
    box-shadow: 0 8px 25px rgba(23, 107, 77, .045);
}

.card-header {
    display: flex;
    align-items: center;
    gap: 13px;
    padding-bottom: 21px;
    margin-bottom: 21px;
    border-bottom: 1px solid #edf2ef;
}

.card-icon {
    width: 43px;
    height: 43px;
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 19px;
    flex-shrink: 0;
}

.card-icon.green {
    background: #e9f8f0;
    color: #15803d;
}

.card-icon.blue {
    background: #eaf4ff;
    color: #2563eb;
}

.card-icon.purple {
    background: #f2edff;
    color: #7c3aed;
}

.card-icon.orange {
    background: #fff4e8;
    color: #ea580c;
}

.card-header h2 {
    margin: 0;
    font-size: 17px;
    font-weight: 800;
    color: #182b24;
}

.card-header p {
    margin: 4px 0 0;
    font-size: 12px;
    color: #7a8983;
}


/* FORM GRID */

.form-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 20px;
}

.form-group {
    min-width: 0;
}

.form-group.full-width {
    grid-column: 1 / -1;
}

.form-group label {
    display: block;
    margin-bottom: 8px;
    color: #34443e;
    font-size: 12.5px;
    font-weight: 750;
}

.form-group label span {
    color: #dc2626;
}

.form-control {
    width: 100%;
    min-height: 51px;
    padding: 12px 14px;
    border: 1px solid #d9e4df;
    border-radius: 11px;
    background: #fbfdfc;
    color: #263b34;
    font-size: 13.5px;
    outline: none;
    transition: .2s ease;
}

.form-control::placeholder {
    color: #a1ada8;
}

.form-control:focus {
    border-color: #55a985;
    background: #ffffff;
    box-shadow: 0 0 0 4px rgba(52, 168, 112, .09);
}


/* PRICE */

.price-input {
    position: relative;
}

.price-input > span {
    position: absolute;
    left: 14px;
    top: 50%;
    transform: translateY(-50%);
    z-index: 2;
    color: #60716a;
    font-size: 14px;
    font-weight: 700;
}

.price-input .form-control {
    padding-left: 31px;
}


/* IMAGE UPLOAD */

.upload-box {
    text-align: center;
    padding: 25px 18px;
    background: #f8fbf9;
    border: 1.5px dashed #cdded5;
    border-radius: 15px;
}

.upload-icon {
    width: 54px;
    height: 54px;
    margin: 0 auto 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 15px;
    background: #edf9f3;
    color: #21805c;
    font-size: 23px;
}

.upload-box h3 {
    margin: 0;
    font-size: 15px;
    font-weight: 800;
    color: #23372f;
}

.upload-box p {
    margin: 5px 0 15px;
    color: #87938e;
    font-size: 11.5px;
}

.file-input {
    display: none;
}

.upload-btn {
    display: inline-flex;
    align-items: center;
    gap: 7px;
    padding: 10px 16px;
    background: #176b4d;
    color: #ffffff;
    border-radius: 10px;
    font-size: 12.5px;
    font-weight: 750;
    cursor: pointer;
    transition: .2s ease;
}

.upload-btn:hover {
    background: #12583e;
}

.file-name {
    margin-top: 11px;
    color: #7b8984;
    font-size: 11.5px;
    word-break: break-word;
}


/* INVOICE */

.invoice-upload {
    display: flex;
    align-items: center;
    gap: 12px;
    padding: 15px;
    background: #fbfcfb;
    border: 1px solid #e4ebe7;
    border-radius: 13px;
}

.invoice-upload > i {
    width: 40px;
    height: 40px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: #fff2e7;
    color: #ea580c;
    border-radius: 10px;
    font-size: 18px;
}

.invoice-upload div {
    flex: 1;
    min-width: 0;
}

.invoice-upload strong {
    display: block;
    color: #293a34;
    font-size: 12.5px;
}

.invoice-upload small {
    display: block;
    margin-top: 3px;
    color: #89958f;
    font-size: 10.5px;
}

.invoice-upload input {
    display: none;
}

.invoice-upload label {
    cursor: pointer;
    padding: 8px 12px;
    background: #f0fdf4;
    border: 1px solid #d5f0df;
    border-radius: 9px;
    color: #15803d;
    font-size: 11.5px;
    font-weight: 750;
}

.invoice-name {
    margin-top: 9px;
    padding-left: 4px;
    color: #87938e;
    font-size: 11px;
    word-break: break-word;
}


/* INFO CARD */

.info-card {
    display: flex;
    align-items: flex-start;
    gap: 13px;
    padding: 19px;
    background: linear-gradient(135deg, #f0faf5, #f4f9ff);
    border: 1px solid #dcece4;
    border-radius: 17px;
}

.info-icon {
    width: 40px;
    height: 40px;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
    background: #ffffff;
    color: #176b4d;
    border-radius: 11px;
    font-size: 18px;
}

.info-card h3 {
    margin: 1px 0 5px;
    color: #1e352b;
    font-size: 13.5px;
    font-weight: 800;
}

.info-card p {
    margin: 0;
    color: #687871;
    font-size: 11.5px;
    line-height: 1.6;
}


/* ACTIONS */

.form-actions {
    display: flex;
    align-items: center;
    justify-content: flex-end;
    gap: 12px;
    padding: 21px 0 5px;
}

.cancel-btn,
.save-btn {
    min-height: 50px;
    padding: 0 22px;
    border-radius: 11px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    font-size: 13px;
    font-weight: 750;
    text-decoration: none;
    transition: .2s ease;
}

.cancel-btn {
    background: #ffffff;
    border: 1px solid #dbe5e0;
    color: #53635d;
}

.cancel-btn:hover {
    background: #f7faf8;
    color: #263b34;
}

.save-btn {
    border: none;
    background: linear-gradient(135deg, #176b4d, #21805c);
    color: #ffffff;
    cursor: pointer;
    box-shadow: 0 8px 18px rgba(23, 107, 77, .16);
}

.save-btn:hover {
    transform: translateY(-1px);
    box-shadow: 0 11px 22px rgba(23, 107, 77, .22);
}


/* RESPONSIVE */

@media (max-width: 900px) {

    .form-layout {
        grid-template-columns: 1fr;
    }

}

@media (max-width: 650px) {

    .page-heading {
        align-items: flex-start;
        flex-direction: column;
    }

    .page-heading h1 {
        font-size: 27px;
    }

    .form-grid {
        grid-template-columns: 1fr;
    }

    .form-group.full-width {
        grid-column: auto;
    }

    .form-card {
        padding: 20px;
    }

    .form-actions {
        flex-direction: column-reverse;
    }

    .cancel-btn,
    .save-btn {
        width: 100%;
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