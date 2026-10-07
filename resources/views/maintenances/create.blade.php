@extends('layouts.app')

@section('title', 'Add Maintenance - ProductLife')

@section('page_title', 'Add Maintenance')

@section(
    'page_subtitle',
    'Schedule and track maintenance for your product.'
)

@section('content')

<div class="maintenance-page">

    {{-- Product Header --}}
    <div class="product-header-card">

        <div class="product-icon">
            <i class="bi bi-tools"></i>
        </div>

        <div class="product-header-info">

            <span class="section-label">PRODUCT MAINTENANCE</span>

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

        <div class="maintenance-badge">
            <i class="bi bi-calendar-check"></i>
            Maintenance Schedule
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


    <form
        action="{{ route('maintenances.store', $product) }}"
        method="POST"
    >

        @csrf

        <div class="form-grid">

            {{-- Main Form --}}
            <div>

                {{-- Service Information --}}
                <div class="form-card">

                    <div class="card-heading">

                        <div class="heading-icon green">
                            <i class="bi bi-wrench-adjustable"></i>
                        </div>

                        <div>
                            <h4>Service Information</h4>
                            <p>Enter the maintenance work details.</p>
                        </div>

                    </div>


                    <div class="mb-4">

                        <label class="form-label">
                            Service Type <span>*</span>
                        </label>

                        <input
                            type="text"
                            name="service_type"
                            class="form-control custom-input"
                            placeholder="Example: AC Cleaning, Oil Change, General Service"
                            value="{{ old('service_type') }}"
                            required
                        >

                        <small class="input-help">
                            Enter the type of maintenance or servicing required.
                        </small>

                    </div>


                    <div>

                        <label class="form-label">
                            Description
                        </label>

                        <textarea
                            name="description"
                            class="form-control custom-input description-input"
                            rows="5"
                            placeholder="Describe the maintenance work..."
                        >{{ old('description') }}</textarea>

                        <small class="input-help">
                            Add details about the work that needs to be performed.
                        </small>

                    </div>

                </div>


                {{-- Maintenance Schedule --}}
                <div class="form-card">

                    <div class="card-heading">

                        <div class="heading-icon blue">
                            <i class="bi bi-calendar-range"></i>
                        </div>

                        <div>
                            <h4>Maintenance Schedule</h4>
                            <p>Keep track of previous and upcoming service dates.</p>
                        </div>

                    </div>


                    <div class="row g-4">

                        <div class="col-md-6">

                            <label class="form-label">
                                Last Service Date
                            </label>

                            <div class="input-icon-wrapper">

                                <i class="bi bi-calendar3"></i>

                                <input
                                    type="date"
                                    name="last_service_date"
                                    class="form-control custom-input with-icon"
                                    value="{{ old('last_service_date') }}"
                                >

                            </div>

                            <small class="input-help">
                                Leave empty if this is the first service.
                            </small>

                        </div>


                        <div class="col-md-6">

                            <label class="form-label">
                                Next Service Date <span>*</span>
                            </label>

                            <div class="input-icon-wrapper">

                                <i class="bi bi-calendar-check"></i>

                                <input
                                    type="date"
                                    name="next_service_date"
                                    class="form-control custom-input with-icon"
                                    value="{{ old('next_service_date') }}"
                                    required
                                >

                            </div>

                            <small class="input-help">
                                The date when the product should be serviced again.
                            </small>

                        </div>

                    </div>


                    <div class="schedule-info">

                        <i class="bi bi-lightbulb"></i>

                        <span>
                            Regular maintenance can help extend product life
                            and reduce unexpected repair costs.
                        </span>

                    </div>

                </div>


                {{-- Cost --}}
                <div class="form-card">

                    <div class="card-heading">

                        <div class="heading-icon orange">
                            <i class="bi bi-currency-rupee"></i>
                        </div>

                        <div>
                            <h4>Estimated Cost</h4>
                            <p>Add the expected maintenance expense.</p>
                        </div>

                    </div>


                    <label class="form-label">
                        Estimated Cost (₹)
                    </label>

                    <div class="cost-input-wrapper">

                        <span>₹</span>

                        <input
                            type="number"
                            name="estimated_cost"
                            class="form-control custom-input"
                            step="0.01"
                            min="0"
                            placeholder="Example: 1200"
                            value="{{ old('estimated_cost') }}"
                        >

                    </div>

                    <small class="input-help">
                        Enter the approximate cost if known.
                    </small>

                </div>


                {{-- Reminder --}}
                <div class="form-card reminder-card">

                    <div class="reminder-content">

                        <div class="reminder-icon">
                            <i class="bi bi-bell"></i>
                        </div>

                        <div>

                            <h4>Maintenance Reminder</h4>

                            <p>
                                Get a reminder when your next maintenance
                                date is approaching.
                            </p>

                        </div>

                    </div>


                    <label class="switch">

                        <input
                            type="checkbox"
                            name="reminder_enabled"
                            value="1"
                            id="reminder_enabled"
                            {{ old('reminder_enabled', true) ? 'checked' : '' }}
                        >

                        <span class="slider"></span>

                    </label>

                </div>

            </div>


            {{-- Right Summary --}}
            <div>

                <div class="summary-card">

                    <div class="summary-top">

                        <div class="summary-tools">
                            <i class="bi bi-tools"></i>
                        </div>

                        <div>

                            <span>MAINTENANCE</span>

                            <h4>Service Overview</h4>

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


                    <div class="summary-item">

                        <span>
                            <i class="bi bi-shield-check"></i>
                            Maintenance Tracking
                        </span>

                        <strong class="tracking-active">
                            Ready to track
                        </strong>

                    </div>


                    <div class="summary-note">

                        <i class="bi bi-info-circle"></i>

                        <p>
                            Your maintenance records become part of the
                            product's lifecycle and can help with future
                            repairs and resale.
                        </p>

                    </div>

                </div>


                <div class="tip-card">

                    <div class="tip-icon">
                        <i class="bi bi-stars"></i>
                    </div>

                    <div>

                        <strong>Pro tip</strong>

                        <p>
                            Keep the next service date updated so your
                            product never misses important maintenance.
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
                <i class="bi bi-calendar-check"></i>
                Save Maintenance
            </button>

        </div>

    </form>

</div>

@endsection


@push('styles')

<style>

    .maintenance-page {
        max-width: 1180px;
        margin: 0 auto;
    }


    /* Product Header */

    .product-header-card {
        background: linear-gradient(
            135deg,
            #ffffff 0%,
            #effcf6 100%
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
        font-size: 27px;
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

    .maintenance-badge {
        margin-left: auto;
        padding: 10px 14px;
        border-radius: 12px;
        background: #dbeafe;
        color: #1d4ed8;
        font-size: 11px;
        font-weight: 800;
        white-space: nowrap;
    }

    .maintenance-badge i {
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


    /* Form Cards */

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

    .description-input {
        min-height: 130px;
        resize: vertical;
    }

    .input-help {
        display: block;
        margin-top: 7px;
        color: #94a3b8;
        font-size: 10px;
        line-height: 1.5;
    }


    /* Date Inputs */

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


    /* Schedule Info */

    .schedule-info {
        display: flex;
        gap: 9px;
        align-items: flex-start;
        margin-top: 20px;
        padding: 13px 14px;
        border-radius: 11px;
        background: #f0fdf4;
        color: #166534;
        font-size: 10px;
        line-height: 1.5;
    }

    .schedule-info i {
        margin-top: 1px;
    }


    /* Cost */

    .cost-input-wrapper {
        position: relative;
    }

    .cost-input-wrapper > span {
        position: absolute;
        left: 14px;
        top: 50%;
        transform: translateY(-50%);
        color: #176b4d;
        font-size: 14px;
        font-weight: 800;
        z-index: 2;
    }

    .cost-input-wrapper .custom-input {
        padding-left: 34px;
    }


    /* Reminder */

    .reminder-card {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 18px;
        background: linear-gradient(
            135deg,
            #ffffff,
            #f8fffb
        );
    }

    .reminder-content {
        display: flex;
        align-items: center;
        gap: 14px;
    }

    .reminder-icon {
        width: 45px;
        height: 45px;
        border-radius: 13px;
        background: #fef3c7;
        color: #d97706;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 20px;
        flex-shrink: 0;
    }

    .reminder-content h4 {
        margin: 0 0 4px;
        color: #163c2d;
        font-size: 14px;
        font-weight: 800;
    }

    .reminder-content p {
        margin: 0;
        color: #94a3b8;
        font-size: 10px;
        line-height: 1.5;
    }


    /* Toggle */

    .switch {
        position: relative;
        width: 49px;
        height: 27px;
        flex-shrink: 0;
    }

    .switch input {
        opacity: 0;
        width: 0;
        height: 0;
    }

    .slider {
        position: absolute;
        inset: 0;
        cursor: pointer;
        background: #cbd5e1;
        border-radius: 30px;
        transition: .25s ease;
    }

    .slider:before {
        content: "";
        position: absolute;
        width: 21px;
        height: 21px;
        left: 3px;
        top: 3px;
        background: white;
        border-radius: 50%;
        transition: .25s ease;
        box-shadow: 0 2px 5px rgba(0,0,0,.15);
    }

    .switch input:checked + .slider {
        background: #176b4d;
    }

    .switch input:checked + .slider:before {
        transform: translateX(22px);
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

    .summary-tools {
        width: 45px;
        height: 45px;
        border-radius: 13px;
        background: #dbeafe;
        color: #2563eb;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 20px;
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

    .tracking-active {
        color: #15803d !important;
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
        color: #2563eb;
        margin-top: 2px;
    }

    .summary-note p {
        margin: 0;
        color: #64748b;
        font-size: 10px;
        line-height: 1.55;
    }


    /* Tip */

    .tip-card {
        margin-top: 18px;
        background: #f0fdf4;
        border: 1px solid #dcfce7;
        border-radius: 15px;
        padding: 14px;
        display: flex;
        gap: 10px;
    }

    .tip-icon {
        width: 31px;
        height: 31px;
        border-radius: 9px;
        background: #dcfce7;
        color: #15803d;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
    }

    .tip-card strong {
        display: block;
        color: #166534;
        font-size: 11px;
        font-weight: 800;
    }

    .tip-card p {
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

        .protection-badge,
        .maintenance-badge {
            margin-left: 0;
        }

        .product-header-info h2 {
            font-size: 20px;
        }

        .form-card {
            padding: 19px;
        }

        .reminder-card {
            align-items: flex-start;
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