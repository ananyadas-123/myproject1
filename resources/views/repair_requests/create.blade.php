
@extends('layouts.app')

@section('title', 'Request Repair - ProductLife')

@section('page_title', 'Request a Repair')

@section(
    'page_subtitle',
    'Tell us what is wrong with your product and get help from a technician.'
)

@section('content')

<div class="repair-page">

    {{-- Product Summary --}}
    <div class="product-summary-card">
        <div class="product-summary-image">
            @if($product->image)
                <img
                    src="{{ asset('storage/' . $product->image) }}"
                    alt="{{ $product->brand }} {{ $product->model }}"
                >
            @else
                <div class="no-product-image">
                    <i class="bi bi-box-seam"></i>
                </div>
            @endif
        </div>

        <div class="product-summary-info">
            <span class="summary-label">
                <i class="bi bi-box"></i>
                Repairing Product
            </span>

            <h2>{{ $product->brand }} {{ $product->model }}</h2>

            <div class="summary-meta">
                <span>
                    <i class="bi bi-tag"></i>
                    {{ $product->category }}
                </span>

                <span>
                    <i class="bi bi-upc-scan"></i>
                    {{ $product->serial_number }}
                </span>
            </div>
        </div>

        <div class="product-status">
            <span class="status-dot"></span>
            {{ ucfirst($product->status ?? 'Active') }}
        </div>
    </div>


    {{-- Validation Errors --}}
    @if($errors->any())
        <div class="alert alert-danger custom-alert">
            <div class="alert-icon">
                <i class="bi bi-exclamation-triangle-fill"></i>
            </div>

            <div>
                <strong>Please check the following:</strong>

                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif


    <div class="repair-layout">

        {{-- Main Form --}}
        <div class="repair-form-card">

            <div class="card-heading">
                <div class="heading-icon">
                    <i class="bi bi-tools"></i>
                </div>

                <div>
                    <h3>Repair Request Details</h3>
                    <p>Describe the problem so the technician can understand it clearly.</p>
                </div>
            </div>


            <form
                action="{{ route('repair_requests.store', $product) }}"
                method="POST"
                enctype="multipart/form-data"
            >
                @csrf

                {{-- Problem Title --}}
                <div class="form-group">
                    <label for="problem_title">
                        Problem Title
                        <span>*</span>
                    </label>

                    <input
                        type="text"
                        id="problem_title"
                        name="problem_title"
                        value="{{ old('problem_title') }}"
                        class="form-control premium-input"
                        placeholder="Example: Refrigerator is not cooling"
                        required
                    >

                    <small>
                        Give a short title describing the main problem.
                    </small>
                </div>


                {{-- Problem Description --}}
                <div class="form-group">
                    <label for="problem_description">
                        Problem Description
                        <span>*</span>
                    </label>

                    <textarea
                        id="problem_description"
                        name="problem_description"
                        class="form-control premium-input"
                        rows="7"
                        placeholder="Describe what happened, when the problem started, unusual sounds, error messages, or any other useful details..."
                        required
                    >{{ old('problem_description') }}</textarea>

                    <small>
                        More details can help the technician diagnose the issue faster.
                    </small>
                </div>


                {{-- Priority --}}
                <div class="form-group">
                    <label>
                        Repair Priority
                        <span>*</span>
                    </label>

                    <div class="priority-grid">

                        <label class="priority-option">
                            <input
                                type="radio"
                                name="priority"
                                value="low"
                                {{ old('priority') === 'low' ? 'checked' : '' }}
                            >

                            <div class="priority-content">
                                <div class="priority-icon low">
                                    <i class="bi bi-arrow-down-circle"></i>
                                </div>

                                <div>
                                    <strong>Low</strong>
                                    <small>Can wait</small>
                                </div>
                            </div>
                        </label>


                        <label class="priority-option">
                            <input
                                type="radio"
                                name="priority"
                                value="medium"
                                {{ old('priority', 'medium') === 'medium' ? 'checked' : '' }}
                            >

                            <div class="priority-content">
                                <div class="priority-icon medium">
                                    <i class="bi bi-dash-circle"></i>
                                </div>

                                <div>
                                    <strong>Medium</strong>
                                    <small>Normal repair</small>
                                </div>
                            </div>
                        </label>


                        <label class="priority-option">
                            <input
                                type="radio"
                                name="priority"
                                value="high"
                                {{ old('priority') === 'high' ? 'checked' : '' }}
                            >

                            <div class="priority-content">
                                <div class="priority-icon high">
                                    <i class="bi bi-exclamation-circle"></i>
                                </div>

                                <div>
                                    <strong>High</strong>
                                    <small>Needs attention</small>
                                </div>
                            </div>
                        </label>


                        <label class="priority-option">
                            <input
                                type="radio"
                                name="priority"
                                value="urgent"
                                {{ old('priority') === 'urgent' ? 'checked' : '' }}
                            >

                            <div class="priority-content">
                                <div class="priority-icon urgent">
                                    <i class="bi bi-lightning-charge-fill"></i>
                                </div>

                                <div>
                                    <strong>Urgent</strong>
                                    <small>Immediate attention</small>
                                </div>
                            </div>
                        </label>

                    </div>
                </div>


                {{-- Problem Image --}}
                <div class="form-group">
                    <label for="problem_image">
                        Problem Image
                        <span class="optional">(Optional)</span>
                    </label>

                    <label for="problem_image" class="upload-box">

                        <div class="upload-icon">
                            <i class="bi bi-cloud-arrow-up"></i>
                        </div>

                        <div class="upload-content">
                            <strong>Upload a photo of the problem</strong>
                            <span id="file-name">
                                JPG, JPEG, PNG or WEBP — Maximum 2MB
                            </span>
                        </div>

                        <div class="upload-button">
                            Choose File
                        </div>

                    </label>

                    <input
                        type="file"
                        id="problem_image"
                        name="problem_image"
                        accept=".jpg,.jpeg,.png,.webp"
                        hidden
                    >

                    <small>
                        A clear photo can help the technician understand the issue.
                    </small>
                </div>


                {{-- Actions --}}
                <div class="form-actions">

                    <a
                        href="{{ route('products.lifecycle', $product) }}"
                        class="btn-cancel"
                    >
                        <i class="bi bi-arrow-left"></i>
                        Back to Lifecycle
                    </a>

                    <button type="submit" class="btn-submit">
                        <i class="bi bi-send-fill"></i>
                        Submit Repair Request
                    </button>

                </div>

            </form>
        </div>


        {{-- Side Information --}}
        <div class="repair-side">

            <div class="info-card">

                <div class="info-icon">
                    <i class="bi bi-lightbulb"></i>
                </div>

                <h3>Before submitting</h3>

                <p>
                    Give as much information as possible about the problem.
                    This helps technicians understand the issue before they contact you.
                </p>

                <div class="tip-list">

                    <div class="tip-item">
                        <i class="bi bi-check-circle-fill"></i>
                        <span>Describe when the problem started.</span>
                    </div>

                    <div class="tip-item">
                        <i class="bi bi-check-circle-fill"></i>
                        <span>Mention any unusual sound or smell.</span>
                    </div>

                    <div class="tip-item">
                        <i class="bi bi-check-circle-fill"></i>
                        <span>Include any visible error message.</span>
                    </div>

                    <div class="tip-item">
                        <i class="bi bi-check-circle-fill"></i>
                        <span>Upload a clear image if possible.</span>
                    </div>

                </div>

            </div>


            <div class="process-card">

                <span class="process-label">
                    <i class="bi bi-diagram-3"></i>
                    What happens next?
                </span>

                <div class="process-step">
                    <div class="step-number">1</div>

                    <div>
                        <strong>Request Submitted</strong>
                        <span>Your repair request will be recorded.</span>
                    </div>
                </div>

                <div class="process-line"></div>

                <div class="process-step">
                    <div class="step-number">2</div>

                    <div>
                        <strong>Technician Matching</strong>
                        <span>Suitable technicians can review your issue.</span>
                    </div>
                </div>

                <div class="process-line"></div>

                <div class="process-step">
                    <div class="step-number">3</div>

                    <div>
                        <strong>Repair Journey</strong>
                        <span>Track the repair through your product lifecycle.</span>
                    </div>
                </div>

            </div>

        </div>

    </div>

</div>

@endsection


@push('styles')
<style>

    .repair-page {
        max-width: 1180px;
        margin: 0 auto;
    }

    /* Product Summary */

    .product-summary-card {
        background: #ffffff;
        border: 1px solid #e7eee9;
        border-radius: 22px;
        padding: 20px;
        display: flex;
        align-items: center;
        gap: 20px;
        margin-bottom: 22px;
        box-shadow: 0 12px 35px rgba(23, 107, 77, .07);
    }

    .product-summary-image {
        width: 92px;
        height: 92px;
        border-radius: 17px;
        overflow: hidden;
        background: #f1f8f4;
        flex-shrink: 0;
    }

    .product-summary-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .no-product-image {
        width: 100%;
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #176b4d;
        font-size: 30px;
    }

    .summary-label {
        color: #176b4d;
        font-size: 11px;
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: .8px;
    }

    .product-summary-info h2 {
        margin: 5px 0 8px;
        font-size: 22px;
        font-weight: 850;
        color: #17372b;
    }

    .summary-meta {
        display: flex;
        flex-wrap: wrap;
        gap: 16px;
        color: #718078;
        font-size: 12px;
        font-weight: 650;
    }

    .summary-meta i {
        color: #176b4d;
        margin-right: 4px;
    }

    .product-status {
        margin-left: auto;
        display: inline-flex;
        align-items: center;
        gap: 7px;
        padding: 8px 12px;
        border-radius: 30px;
        background: #effaf3;
        color: #187342;
        font-size: 11px;
        font-weight: 800;
    }

    .status-dot {
        width: 7px;
        height: 7px;
        border-radius: 50%;
        background: #22c55e;
    }


    /* Alert */

    .custom-alert {
        display: flex;
        gap: 13px;
        border: 0;
        border-radius: 16px;
        padding: 16px 18px;
        margin-bottom: 22px;
        font-size: 13px;
    }

    .alert-icon {
        font-size: 18px;
    }

    .custom-alert ul {
        margin: 6px 0 0;
        padding-left: 18px;
    }


    /* Layout */

    .repair-layout {
        display: grid;
        grid-template-columns: minmax(0, 1fr) 330px;
        gap: 22px;
        align-items: start;
    }

    .repair-form-card,
    .info-card,
    .process-card {
        background: #ffffff;
        border: 1px solid #e7eee9;
        border-radius: 22px;
        box-shadow: 0 12px 35px rgba(23, 107, 77, .06);
    }

    .repair-form-card {
        padding: 30px;
    }

    .card-heading {
        display: flex;
        align-items: center;
        gap: 14px;
        padding-bottom: 24px;
        margin-bottom: 26px;
        border-bottom: 1px solid #edf2ef;
    }

    .heading-icon {
        width: 48px;
        height: 48px;
        border-radius: 14px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #eaf7ef;
        color: #176b4d;
        font-size: 20px;
        flex-shrink: 0;
    }

    .card-heading h3 {
        margin: 0 0 4px;
        font-size: 20px;
        font-weight: 850;
        color: #17372b;
    }

    .card-heading p {
        margin: 0;
        color: #7b8781;
        font-size: 12px;
    }


    /* Form */

    .form-group {
        margin-bottom: 25px;
    }

    .form-group > label {
        display: block;
        margin-bottom: 9px;
        color: #263d34;
        font-size: 12px;
        font-weight: 800;
    }

    .form-group > label > span:first-of-type {
        color: #e05252;
    }

    .form-group > label .optional {
        color: #89958f;
        font-weight: 600;
        margin-left: 4px;
    }

    .premium-input {
        min-height: 52px;
        border: 1px solid #dfe8e3;
        border-radius: 12px;
        padding: 13px 15px;
        color: #263d34;
        font-size: 13px;
        box-shadow: none;
        transition: .2s ease;
    }

    textarea.premium-input {
        min-height: 150px;
        resize: vertical;
    }

    .premium-input:focus {
        border-color: #3a9a70;
        box-shadow: 0 0 0 4px rgba(58, 154, 112, .10);
    }

    .form-group small {
        display: block;
        margin-top: 7px;
        color: #8a958f;
        font-size: 11px;
    }


    /* Priority */

    .priority-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 10px;
    }

    .priority-option {
        position: relative;
        cursor: pointer;
        margin: 0 !important;
    }

    .priority-option input {
        position: absolute;
        opacity: 0;
        pointer-events: none;
    }

    .priority-content {
        min-height: 82px;
        border: 1px solid #e0e8e3;
        border-radius: 14px;
        padding: 13px;
        display: flex;
        align-items: center;
        gap: 9px;
        transition: .2s ease;
        background: #fff;
    }

    .priority-option input:checked + .priority-content {
        border-color: #176b4d;
        background: #f0faf4;
        box-shadow: 0 0 0 2px rgba(23, 107, 77, .08);
    }

    .priority-icon {
        width: 35px;
        height: 35px;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 16px;
        flex-shrink: 0;
    }

    .priority-icon.low {
        background: #eff6ff;
        color: #2563eb;
    }

    .priority-icon.medium {
        background: #fff7ed;
        color: #ea580c;
    }

    .priority-icon.high {
        background: #fff1f2;
        color: #e11d48;
    }

    .priority-icon.urgent {
        background: #fef2f2;
        color: #dc2626;
    }

    .priority-content strong {
        display: block;
        color: #263d34;
        font-size: 12px;
        font-weight: 850;
    }

    .priority-content small {
        margin-top: 2px;
        font-size: 10px;
    }


    /* Upload */

    .upload-box {
        border: 1.5px dashed #cbdad2;
        border-radius: 15px;
        min-height: 100px;
        padding: 18px;
        display: flex;
        align-items: center;
        gap: 14px;
        cursor: pointer;
        background: #fbfdfc;
        transition: .2s ease;
    }

    .upload-box:hover {
        border-color: #3a9a70;
        background: #f5fbf7;
    }

    .upload-icon {
        width: 45px;
        height: 45px;
        border-radius: 12px;
        background: #eaf7ef;
        color: #176b4d;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 21px;
        flex-shrink: 0;
    }

    .upload-content {
        min-width: 0;
        flex: 1;
    }

    .upload-content strong {
        display: block;
        color: #263d34;
        font-size: 12px;
        font-weight: 800;
        margin-bottom: 3px;
    }

    .upload-content span {
        color: #8a958f;
        font-size: 10px;
        word-break: break-word;
    }

    .upload-button {
        padding: 9px 13px;
        border-radius: 9px;
        background: #176b4d;
        color: white;
        font-size: 11px;
        font-weight: 800;
        white-space: nowrap;
    }


    /* Actions */

    .form-actions {
        display: flex;
        justify-content: space-between;
        gap: 12px;
        padding-top: 8px;
        margin-top: 10px;
        border-top: 1px solid #edf2ef;
    }

    .btn-cancel,
    .btn-submit {
        min-height: 50px;
        border-radius: 12px;
        padding: 0 18px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        font-size: 12px;
        font-weight: 800;
        text-decoration: none;
        transition: .2s ease;
    }

    .btn-cancel {
        color: #53645c;
        background: #f4f7f5;
        border: 1px solid #e3ebe6;
    }

    .btn-cancel:hover {
        color: #176b4d;
        background: #eaf7ef;
    }

    .btn-submit {
        border: 0;
        background: #176b4d;
        color: white;
        box-shadow: 0 8px 18px rgba(23, 107, 77, .18);
    }

    .btn-submit:hover {
        background: #12583e;
        color: white;
        transform: translateY(-1px);
    }


    /* Side Cards */

    .repair-side {
        display: grid;
        gap: 18px;
        position: sticky;
        top: 85px;
    }

    .info-card,
    .process-card {
        padding: 23px;
    }

    .info-icon {
        width: 43px;
        height: 43px;
        border-radius: 13px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #fff7d9;
        color: #b7791f;
        font-size: 19px;
        margin-bottom: 15px;
    }

    .info-card h3 {
        margin: 0 0 8px;
        color: #203b30;
        font-size: 17px;
        font-weight: 850;
    }

    .info-card > p {
        margin: 0;
        color: #78857e;
        font-size: 12px;
        line-height: 1.7;
    }

    .tip-list {
        margin-top: 18px;
        display: grid;
        gap: 12px;
    }

    .tip-item {
        display: flex;
        align-items: flex-start;
        gap: 9px;
        color: #50615a;
        font-size: 11px;
        line-height: 1.5;
    }

    .tip-item i {
        color: #22a05a;
        margin-top: 1px;
    }


    /* Process */

    .process-label {
        display: inline-flex;
        align-items: center;
        gap: 7px;
        color: #176b4d;
        font-size: 11px;
        font-weight: 850;
        text-transform: uppercase;
        letter-spacing: .6px;
        margin-bottom: 20px;
    }

    .process-step {
        display: flex;
        align-items: flex-start;
        gap: 11px;
    }

    .step-number {
        width: 30px;
        height: 30px;
        border-radius: 9px;
        background: #eaf7ef;
        color: #176b4d;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 11px;
        font-weight: 850;
        flex-shrink: 0;
    }

    .process-step strong {
        display: block;
        color: #2c4238;
        font-size: 11px;
        font-weight: 850;
        margin-bottom: 3px;
    }

    .process-step span {
        display: block;
        color: #89948f;
        font-size: 10px;
        line-height: 1.5;
    }

    .process-line {
        height: 20px;
        width: 1px;
        background: #dce8e1;
        margin-left: 14px;
    }


    /* Responsive */

    @media (max-width: 1000px) {

        .repair-layout {
            grid-template-columns: 1fr;
        }

        .repair-side {
            position: static;
            grid-template-columns: repeat(2, 1fr);
        }

        .priority-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    @media (max-width: 700px) {

        .product-summary-card {
            align-items: flex-start;
            flex-wrap: wrap;
        }

        .product-status {
            margin-left: 0;
        }

        .repair-form-card,
        .info-card,
        .process-card {
            padding: 20px;
        }

        .repair-side {
            grid-template-columns: 1fr;
        }

        .priority-grid {
            grid-template-columns: 1fr 1fr;
        }

        .form-actions {
            flex-direction: column-reverse;
        }

        .btn-cancel,
        .btn-submit {
            width: 100%;
        }
    }

    @media (max-width: 480px) {

        .product-summary-image {
            width: 70px;
            height: 70px;
        }

        .product-summary-info h2 {
            font-size: 18px;
        }

        .summary-meta {
            display: grid;
            gap: 5px;
        }

        .priority-grid {
            grid-template-columns: 1fr;
        }

        .upload-box {
            align-items: flex-start;
            flex-wrap: wrap;
        }

        .upload-button {
            margin-left: 59px;
        }
    }

</style>
@endpush


@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {

        const imageInput = document.getElementById('problem_image');
        const fileName = document.getElementById('file-name');

        if (imageInput && fileName) {
            imageInput.addEventListener('change', function () {

                if (this.files.length > 0) {
                    fileName.textContent = this.files[0].name;
                } else {
                    fileName.textContent =
                        'JPG, JPEG, PNG or WEBP — Maximum 2MB';
                }

            });
        }

    });
</script>
@endpush
