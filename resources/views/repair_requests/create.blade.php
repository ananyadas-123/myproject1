
@extends('layouts.app')

@section('title', 'New Repair Request')
@section('page_title', 'New Repair Request')

@section('content')


@push('styles')
<style>
/* ================================
   Repair Request Page
================================ */

.container-fluid.py-4 {
    color: #243247;
}

/* Back Button */
.container-fluid.py-4 > a.btn-light {
    background: linear-gradient(135deg, #ffffff, #eaf3ff);
    color: #2454a6;
    border: 1px solid #b9d2f5 !important;
    border-radius: 10px;
    font-weight: 700;
    padding: 9px 17px;
    transition: all .25s ease;
}

.container-fluid.py-4 > a.btn-light:hover {
    background: #2454a6;
    color: #ffffff;
    transform: translateX(-3px);
}

/* Page Heading */
.container-fluid.py-4 > h3 {
    color: #173b70;
    font-size: 28px;
    font-weight: 800;
    margin-bottom: 8px;
}

.container-fluid.py-4 > p {
    color: #64748b !important;
    font-size: 15px;
}

/* Cards */
.container-fluid.py-4 .card {
    background: #ffffff;
    border: 1px solid #dce7f5 !important;
    border-radius: 18px !important;
    box-shadow: 0 8px 28px rgba(30, 64, 120, .09) !important;
    overflow: hidden;
    transition: transform .25s ease, box-shadow .25s ease;
}

.container-fluid.py-4 .card:hover {
    transform: translateY(-3px);
    box-shadow: 0 14px 35px rgba(30, 64, 120, .14) !important;
}

.container-fluid.py-4 .card-body {
    padding: 28px !important;
}

/* Selected Product Card */
.container-fluid.py-4 .col-lg-4 .card {
    border-top: 5px solid #0d9488 !important;
    background: linear-gradient(145deg, #ffffff 55%, #e8fbf7);
    height: 100%;
}

.container-fluid.py-4 .col-lg-4 .card h5:first-child {
    display: inline-block;
    color: #087e75;
    background: #d7faf1;
    border: 1px solid #a5f3e5;
    border-radius: 9px;
    padding: 9px 14px;
    font-size: 14px;
    font-weight: 800;
}

.container-fluid.py-4 .col-lg-4 .card h5.mt-3 {
    color: #173b70;
    font-size: 21px;
    font-weight: 800;
    line-height: 1.5;
    margin-top: 22px !important;
    overflow-wrap: anywhere;
}

.container-fluid.py-4 .col-lg-4 .card p {
    color: #52647c !important;
    background: #f0f7ff;
    border-left: 4px solid #3b82f6;
    border-radius: 7px;
    padding: 10px 12px;
    font-size: 13px;
    font-weight: 600;
    overflow-wrap: anywhere;
}

.container-fluid.py-4 .col-lg-4 .card p:last-child {
    background: #fff5e8;
    border-left-color: #f59e0b;
}

/* Form Card */
.container-fluid.py-4 .col-lg-8 .card {
    border-top: 5px solid #6366f1 !important;
}

/* Form Labels */
.container-fluid.py-4 .form-label {
    color: #243b60;
    font-size: 14px;
    font-weight: 750 !important;
    margin-bottom: 9px;
}

/* Inputs, Textarea and Select */
.container-fluid.py-4 .form-control,
.container-fluid.py-4 .form-select {
    background-color: #f8fbff;
    color: #243247;
    border: 1.5px solid #cbd9ec;
    border-radius: 10px;
    padding: 12px 14px;
    font-size: 14px;
    font-weight: 500;
    transition: all .25s ease;
}

.container-fluid.py-4 .form-control::placeholder {
    color: #91a0b5;
}

.container-fluid.py-4 .form-control:hover,
.container-fluid.py-4 .form-select:hover {
    border-color: #7c9fe0;
    background-color: #ffffff;
}

.container-fluid.py-4 .form-control:focus,
.container-fluid.py-4 .form-select:focus {
    background-color: #ffffff;
    color: #1e293b;
    border-color: #6366f1;
    box-shadow: 0 0 0 4px rgba(99, 102, 241, .14);
    outline: none;
}

.container-fluid.py-4 textarea.form-control {
    min-height: 135px;
    resize: vertical;
    line-height: 1.7;
}

/* File Input */
.container-fluid.py-4 input[type="file"].form-control {
    padding: 9px;
    background: #f0f5ff;
    border: 1.5px dashed #8aa9df;
}

.container-fluid.py-4 input[type="file"]::file-selector-button {
    background: #dbeafe;
    color: #1d4ed8;
    border: 0;
    border-radius: 7px;
    padding: 8px 13px;
    margin-right: 12px;
    font-weight: 700;
    cursor: pointer;
    transition: all .2s ease;
}

.container-fluid.py-4 input[type="file"]::file-selector-button:hover {
    background: #2563eb;
    color: #ffffff;
}

.container-fluid.py-4 small.text-muted {
    display: inline-block;
    color: #64748b !important;
    font-size: 12px;
    margin-top: 8px;
}

/* Submit Button */
.container-fluid.py-4 button.btn-primary {
    background: linear-gradient(135deg, #2563eb, #6366f1);
    color: #ffffff;
    border: none;
    border-radius: 10px;
    padding: 12px 22px;
    font-size: 14px;
    font-weight: 800;
    box-shadow: 0 5px 14px rgba(79, 70, 229, .25);
    transition: all .25s ease;
}

.container-fluid.py-4 button.btn-primary:hover {
    background: linear-gradient(135deg, #1d4ed8, #4f46e5);
    box-shadow: 0 8px 20px rgba(79, 70, 229, .35);
    transform: translateY(-2px);
}

.container-fluid.py-4 button.btn-primary:active {
    transform: scale(.97);
}

/* Cancel Button */
.container-fluid.py-4 form a.btn-light {
    background: #fff1f2;
    color: #be123c;
    border: 1px solid #fecdd3 !important;
    border-radius: 10px;
    padding: 12px 20px;
    font-size: 14px;
    font-weight: 750;
    transition: all .25s ease;
}

.container-fluid.py-4 form a.btn-light:hover {
    background: #e11d48;
    color: #ffffff;
    border-color: #e11d48 !important;
}

/* Validation Error */
.container-fluid.py-4 .alert-danger {
    background: #fff1f2;
    color: #9f1239;
    border: 1px solid #fda4af;
    border-left: 5px solid #e11d48;
    border-radius: 12px;
    padding: 16px 20px;
}

.container-fluid.py-4 .alert-danger li {
    font-size: 13px;
    font-weight: 600;
    margin: 4px 0;
}

/* Responsive */
@media (max-width: 991px) {
    .container-fluid.py-4 .col-lg-4 .card {
        height: auto;
    }
}

@media (max-width: 576px) {
    .container-fluid.py-4 {
        padding-top: 18px !important;
    }

    .container-fluid.py-4 > h3 {
        font-size: 23px;
    }

    .container-fluid.py-4 .card-body {
        padding: 20px !important;
    }

    .container-fluid.py-4 button.btn-primary,
    .container-fluid.py-4 form a.btn-light {
        width: 100%;
        margin: 0 0 10px 0 !important;
        display: block;
        text-align: center;
    }
}
</style>
@endpush


<div class="container-fluid py-4">

    <a href="{{ route('products.index') }}"
       class="btn btn-light border mb-3">
        <i class="bi bi-arrow-left"></i> Back to My Products
    </a>

    <h3 class="fw-bold">Submit a Repair Request</h3>
    <p class="text-muted">
        Describe the problem with your product.
    </p>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="row g-4">

        <div class="col-lg-4">
            <div class="card border-0 shadow-sm rounded-4">
                <div class="card-body p-4">
                    <h5 class="fw-bold">Selected Product</h5>

                    <h5 class="mt-3">
                        {{ $product->brand }} {{ $product->model }}
                    </h5>

                    <p class="text-muted mb-1">
                        Serial: {{ $product->serial_number ?? 'N/A' }}
                    </p>

                    <p class="text-muted">
                        Category: {{ $product->category ?? 'N/A' }}
                    </p>
                </div>
            </div>
        </div>

        <div class="col-lg-8">
            <div class="card border-0 shadow-sm rounded-4">
                <div class="card-body p-4">

                    <form
                        action="{{ route('repair_requests.store', $product) }}"
                        method="POST"
                        enctype="multipart/form-data">

                        @csrf

                        <div class="mb-3">
                            <label class="form-label fw-semibold">
                                Problem Title *
                            </label>

                            <input
                                type="text"
                                name="problem_title"
                                class="form-control"
                                value="{{ old('problem_title') }}"
                                placeholder="Example: Product is not working"
                                required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">
                                Problem Description *
                            </label>

                            <textarea
                                name="problem_description"
                                class="form-control"
                                rows="5"
                                placeholder="Describe the problem..."
                                required>{{ old('problem_description') }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">
                                Priority *
                            </label>

                            <select name="priority" class="form-select" required>
                                <option value="">Select Priority</option>

                                <option value="low"
                                    {{ old('priority') == 'low' ? 'selected' : '' }}>
                                    Low
                                </option>

                                <option value="medium"
                                    {{ old('priority', 'medium') == 'medium' ? 'selected' : '' }}>
                                    Medium
                                </option>

                                <option value="high"
                                    {{ old('priority') == 'high' ? 'selected' : '' }}>
                                    High
                                </option>

                                <option value="urgent"
                                    {{ old('priority') == 'urgent' ? 'selected' : '' }}>
                                    Urgent
                                </option>
                            </select>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-semibold">
                                Problem Image (Optional)
                            </label>

                            <input
                                type="file"
                                name="problem_image"
                                class="form-control"
                                accept=".jpg,.jpeg,.png,.webp">

                            <small class="text-muted">
                                JPG, PNG, WEBP. Maximum 2 MB.
                            </small>
                        </div>

                        <button type="submit" class="btn btn-primary px-4">
                            <i class="bi bi-send me-1"></i>
                            Submit Repair Request
                        </button>

                        <a href="{{ route('products.index') }}"
                           class="btn btn-light border ms-2">
                            Cancel
                        </a>

                    </form>

                </div>
            </div>
        </div>

    </div>
</div>
@endsection
