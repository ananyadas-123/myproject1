
@extends('layouts.app')

@section('title', 'New Repair Request')
@section('page_title', 'New Repair Request')

@push('styles')
<style>
    .repair-create-page {
        --rc-navy: #172554;
        --rc-purple: #6d28d9;
        --rc-blue: #2563eb;
        --rc-green: #059669;
        --rc-text: #243247;
        --rc-muted: #64748b;
        color: var(--rc-text);
        padding-bottom: 35px;
    }

    /* Back Button */
    .repair-create-page .back-btn {
        display: inline-flex;
        align-items: center;
        gap: 9px;
        padding: 10px 16px;
        margin-bottom: 20px;
        color: #4338ca;
        background: #eef2ff;
        border: 1px solid #c7d2fe;
        border-radius: 10px;
        font-size: 13px;
        font-weight: 750;
        text-decoration: none;
        transition: all .25s ease;
    }

    .repair-create-page .back-btn:hover {
        color: #fff;
        background: #4338ca;
        border-color: #4338ca;
        transform: translateX(-3px);
    }

    /* Page Heading */
    .repair-create-page .page-heading {
        margin-bottom: 25px;
    }

    .repair-create-page .page-title {
        color: var(--rc-navy);
        font-size: 29px;
        font-weight: 850;
        letter-spacing: -.6px;
        margin-bottom: 7px;
    }

    .repair-create-page .page-subtitle {
        color: var(--rc-muted);
        font-size: 14px;
        margin: 0;
    }

    /* Main Layout */
    .repair-create-page .repair-layout {
        align-items: stretch;
    }

    /* Common Card */
    .repair-create-page .repair-card {
        height: 100%;
        background: #fff;
        border: 1px solid #e2e8f0;
        border-radius: 17px;
        overflow: hidden;
        box-shadow: 0 8px 28px rgba(15, 23, 42, .07);
        transition: box-shadow .25s ease, transform .25s ease;
    }

    .repair-create-page .repair-card:hover {
        box-shadow: 0 13px 34px rgba(30, 41, 59, .11);
    }

    .repair-create-page .card-top-line {
        height: 5px;
        background: linear-gradient(90deg, #6d28d9, #2563eb, #06b6d4);
    }

    .repair-create-page .card-body-custom {
        padding: 26px;
    }

    /* Selected Product */
    .repair-create-page .product-card {
        border-top: 0;
        background: linear-gradient(145deg, #fff 48%, #eff6ff);
    }

    .repair-create-page .product-card .card-top-line {
        background: linear-gradient(90deg, #059669, #0d9488, #06b6d4);
    }

    .repair-create-page .product-heading {
        display: flex;
        align-items: center;
        gap: 10px;
        color: #047857;
        font-size: 15px;
        font-weight: 850;
        margin: 0 0 23px;
    }

    .repair-create-page .product-heading-icon {
        width: 37px;
        height: 37px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        color: #fff;
        background: linear-gradient(135deg, #059669, #0d9488);
        border-radius: 11px;
        font-size: 17px;
    }

    .repair-create-page .product-visual {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 76px;
        height: 76px;
        margin-bottom: 18px;
        border-radius: 19px;
        color: #fff;
        background: linear-gradient(135deg, #2563eb, #6d28d9);
        box-shadow: 0 8px 18px rgba(79, 70, 229, .22);
        font-size: 31px;
    }

    .repair-create-page .product-name {
        color: #172554;
        font-size: 21px;
        font-weight: 850;
        line-height: 1.45;
        margin-bottom: 18px;
        overflow-wrap: anywhere;
    }

    .repair-create-page .product-info {
        display: flex;
        align-items: flex-start;
        gap: 10px;
        padding: 12px;
        margin-bottom: 10px;
        border: 1px solid #dbeafe;
        border-radius: 10px;
        background: rgba(255, 255, 255, .85);
    }

    .repair-create-page .product-info-icon {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 30px;
        height: 30px;
        flex-shrink: 0;
        border-radius: 8px;
        color: #2563eb;
        background: #dbeafe;
        font-size: 14px;
    }

    .repair-create-page .product-info-label {
        display: block;
        color: #64748b;
        font-size: 10px;
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: .6px;
        margin-bottom: 3px;
    }

    .repair-create-page .product-info-value {
        display: block;
        color: #1e293b;
        font-size: 13px;
        font-weight: 750;
        overflow-wrap: anywhere;
    }

    .repair-create-page .product-note {
        padding: 13px;
        margin-top: 19px;
        border-radius: 10px;
        border-left: 4px solid #f59e0b;
        background: #fffbeb;
        color: #92400e;
        font-size: 12px;
        font-weight: 600;
        line-height: 1.7;
    }

    /* Form Card */
    .repair-create-page .form-card .card-top-line {
        background: linear-gradient(90deg, #6d28d9, #2563eb, #0ea5e9);
    }

    .repair-create-page .form-heading {
        display: flex;
        align-items: center;
        gap: 12px;
        margin-bottom: 25px;
        padding-bottom: 19px;
        border-bottom: 1px solid #e8edf5;
    }

    .repair-create-page .form-heading-icon {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 43px;
        height: 43px;
        flex-shrink: 0;
        border-radius: 12px;
        color: #fff;
        background: linear-gradient(135deg, #6d28d9, #2563eb);
        font-size: 19px;
    }

    .repair-create-page .form-heading h5 {
        color: #172554;
        font-size: 17px;
        font-weight: 850;
        margin: 0 0 3px;
    }

    .repair-create-page .form-heading p {
        color: #64748b;
        font-size: 12px;
        margin: 0;
    }

    /* Labels */
    .repair-create-page .form-label {
        display: block;
        color: #243b60;
        font-size: 13px;
        font-weight: 800;
        margin-bottom: 9px;
    }

    .repair-create-page .required-star {
        color: #e11d48;
        margin-left: 2px;
    }

    /* Inputs */
    .repair-create-page .form-control,
    .repair-create-page .form-select {
        width: 100%;
        min-height: 46px;
        padding: 11px 14px;
        color: #1e293b;
        background-color: #f8faff;
        border: 1.5px solid #cbd5e1;
        border-radius: 10px;
        font-size: 13px;
        font-weight: 500;
        transition: all .22s ease;
    }

    .repair-create-page .form-control::placeholder {
        color: #94a3b8;
        font-weight: 450;
    }

    .repair-create-page .form-control:hover,
    .repair-create-page .form-select:hover {
        background: #fff;
        border-color: #93a5d7;
    }

    .repair-create-page .form-control:focus,
    .repair-create-page .form-select:focus {
        color: #172554;
        background: #fff;
        border-color: #6366f1;
        outline: 0;
        box-shadow: 0 0 0 4px rgba(99, 102, 241, .13);
    }

    .repair-create-page textarea.form-control {
        min-height: 145px;
        resize: vertical;
        line-height: 1.7;
    }

    .repair-create-page .form-group {
        margin-bottom: 21px;
    }

    .repair-create-page .field-hint {
        display: block;
        color: #64748b;
        font-size: 11px;
        margin-top: 7px;
    }

    /* Priority Select */
    .repair-create-page .priority-select {
        font-weight: 700;
    }

    /* File Upload */
    .repair-create-page input[type="file"].form-control {
        min-height: auto;
        padding: 9px;
        background: #f5f7ff;
        border: 1.5px dashed #8b9fe0;
        cursor: pointer;
    }

    .repair-create-page input[type="file"]::file-selector-button {
        padding: 8px 13px;
        margin-right: 12px;
        color: #4338ca;
        background: #e0e7ff;
        border: 0;
        border-radius: 7px;
        font-size: 12px;
        font-weight: 750;
        cursor: pointer;
        transition: .2s ease;
    }

    .repair-create-page input[type="file"]::file-selector-button:hover {
        color: #fff;
        background: #4338ca;
    }

    .repair-create-page .upload-hint {
        display: flex;
        align-items: center;
        gap: 7px;
        color: #64748b;
        font-size: 11px;
        margin-top: 9px;
    }

    .repair-create-page .upload-hint i {
        color: #2563eb;
        font-size: 14px;
    }

    /* Form Actions */
    .repair-create-page .form-actions {
        display: flex;
        align-items: center;
        gap: 11px;
        flex-wrap: wrap;
        padding-top: 8px;
        border-top: 1px solid #edf1f7;
    }

    .repair-create-page .submit-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 9px;
        min-height: 46px;
        padding: 12px 22px;
        color: #fff;
        background: linear-gradient(120deg, #6d28d9, #2563eb);
        border: 0;
        border-radius: 10px;
        font-size: 13px;
        font-weight: 800;
        box-shadow: 0 6px 16px rgba(79, 70, 229, .25);
        transition: all .25s ease;
    }

    .repair-create-page .submit-btn:hover {
        color: #fff;
        background: linear-gradient(120deg, #5b21b6, #1d4ed8);
        box-shadow: 0 9px 21px rgba(79, 70, 229, .34);
        transform: translateY(-2px);
    }

    .repair-create-page .submit-btn:active {
        transform: scale(.98);
    }

    .repair-create-page .cancel-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 7px;
        min-height: 46px;
        padding: 11px 19px;
        color: #be123c;
        background: #fff1f2;
        border: 1px solid #fecdd3;
        border-radius: 10px;
        font-size: 13px;
        font-weight: 750;
        text-decoration: none;
        transition: all .2s ease;
    }

    .repair-create-page .cancel-btn:hover {
        color: #fff;
        background: #e11d48;
        border-color: #e11d48;
    }

    /* Validation */
    .repair-create-page .error-card {
        padding: 16px 20px;
        margin-bottom: 22px;
        color: #9f1239;
        background: #fff1f2;
        border: 1px solid #fda4af;
        border-left: 5px solid #e11d48;
        border-radius: 12px;
    }

    .repair-create-page .error-heading {
        display: flex;
        align-items: center;
        gap: 9px;
        font-size: 14px;
        font-weight: 850;
        margin-bottom: 9px;
    }

    .repair-create-page .error-card ul {
        padding-left: 24px;
        margin: 0;
    }

    .repair-create-page .error-card li {
        font-size: 12px;
        font-weight: 600;
        margin: 5px 0;
    }

    /* Responsive */
    @media (max-width: 991px) {
        .repair-create-page .product-card {
            height: auto;
        }
    }

    @media (max-width: 767px) {
        .repair-create-page .page-title {
            font-size: 25px;
        }

        .repair-create-page .card-body-custom {
            padding: 21px;
        }

        .repair-create-page .form-actions {
            flex-direction: column;
            align-items: stretch;
        }

        .repair-create-page .submit-btn,
        .repair-create-page .cancel-btn {
            width: 100%;
        }
    }

    @media (max-width: 480px) {
        .repair-create-page .page-title {
            font-size: 22px;
        }

        .repair-create-page .card-body-custom {
            padding: 17px;
        }

        .repair-create-page .product-name {
            font-size: 19px;
        }

        .repair-create-page .back-btn {
            margin-bottom: 16px;
        }
    }
</style>
@endpush

@section('content')
<div class="container-fluid py-4 repair-create-page">

    {{-- Back Button --}}
    <a href="{{ route('products.index') }}" class="back-btn">
        <i class="bi bi-arrow-left"></i>
        Back to My Products
    </a>

    {{-- Page Heading --}}
    <div class="page-heading">
        <h3 class="page-title">Submit a Repair Request</h3>
        <p class="page-subtitle">
            <i class="bi bi-tools me-1"></i>
            Describe the problem with your product and request professional assistance.
        </p>
    </div>

    {{-- Validation Errors --}}
    @if ($errors->any())
        <div class="error-card">
            <div class="error-heading">
                <i class="bi bi-exclamation-triangle-fill"></i>
                Please fix the following errors:
            </div>

            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="row g-4 repair-layout">

        {{-- Selected Product --}}
        <div class="col-lg-4">
            <div class="repair-card product-card">
                <div class="card-top-line"></div>

                <div class="card-body-custom">

                    <h5 class="product-heading">
                        <span class="product-heading-icon">
                            <i class="bi bi-box-seam"></i>
                        </span>
                        Selected Product
                    </h5>

                    <div class="product-visual">
                        <i class="bi bi-laptop"></i>
                    </div>

                    <h5 class="product-name">
                        {{ $product->brand }} {{ $product->model }}
                    </h5>

                    <div class="product-info">
                        <span class="product-info-icon">
                            <i class="bi bi-upc-scan"></i>
                        </span>
                        <div>
                            <span class="product-info-label">Serial Number</span>
                            <span class="product-info-value">
                                {{ $product->serial_number ?? 'N/A' }}
                            </span>
                        </div>
                    </div>

                    <div class="product-info">
                        <span class="product-info-icon">
                            <i class="bi bi-grid"></i>
                        </span>
                        <div>
                            <span class="product-info-label">Category</span>
                            <span class="product-info-value">
                                {{ $product->category ?? 'N/A' }}
                            </span>
                        </div>
                    </div>

                    <div class="product-note">
                        <i class="bi bi-info-circle-fill me-1"></i>
                        Make sure your problem description is clear so the repair team can understand the issue and assist you properly.
                    </div>

                </div>
            </div>
        </div>

        {{-- Repair Request Form --}}
        <div class="col-lg-8">
            <div class="repair-card form-card">
                <div class="card-top-line"></div>

                <div class="card-body-custom">

                    <div class="form-heading">
                        <span class="form-heading-icon">
                            <i class="bi bi-clipboard2-plus"></i>
                        </span>
                        <div>
                            <h5>Repair Request Details</h5>
                            <p>Fill in the information about your product issue.</p>
                        </div>
                    </div>

                    <form
                        action="{{ route('repair_requests.store', $product) }}"
                        method="POST"
                        enctype="multipart/form-data">

                        @csrf

                        {{-- Problem Title --}}
                        <div class="form-group">
                            <label class="form-label">
                                Problem Title
                                <span class="required-star">*</span>
                            </label>

                            <input
                                type="text"
                                name="problem_title"
                                class="form-control"
                                value="{{ old('problem_title') }}"
                                placeholder="Example: Product is not working"
                                required>

                            <small class="field-hint">
                                Give a short title that describes the main issue.
                            </small>
                        </div>

                        {{-- Problem Description --}}
                        <div class="form-group">
                            <label class="form-label">
                                Problem Description
                                <span class="required-star">*</span>
                            </label>

                            <textarea
                                name="problem_description"
                                class="form-control"
                                rows="5"
                                placeholder="Describe the problem in detail. When did it start? What happens when you use the product?"
                                required>{{ old('problem_description') }}</textarea>

                            <small class="field-hint">
                                Include any error messages, unusual sounds, or other symptoms.
                            </small>
                        </div>

                        {{-- Priority --}}
                        <div class="form-group">
                            <label class="form-label">
                                Priority
                                <span class="required-star">*</span>
                            </label>

                            <select name="priority" class="form-select priority-select" required>
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

                            <small class="field-hint">
                                Choose the priority based on how seriously the problem affects product usage.
                            </small>
                        </div>

                        {{-- Problem Image --}}
                        <div class="form-group mb-4">
                            <label class="form-label">
                                Problem Image
                                <span class="text-muted fw-normal">(Optional)</span>
                            </label>

                            <input
                                type="file"
                                name="problem_image"
                                class="form-control"
                                accept=".jpg,.jpeg,.png,.webp">

                            <small class="upload-hint">
                                <i class="bi bi-image"></i>
                                JPG, PNG, WEBP. Maximum 2 MB.
                            </small>
                        </div>

                        {{-- Actions --}}
                        <div class="form-actions">

                            <button type="submit" class="submit-btn">
                                <i class="bi bi-send-fill"></i>
                                Submit Repair Request
                            </button>

                            <a href="{{ route('products.index') }}" class="cancel-btn">
                                <i class="bi bi-x-circle"></i>
                                Cancel
                            </a>

                        </div>

                    </form>

                </div>
            </div>
        </div>

    </div>
</div>
@endsection
