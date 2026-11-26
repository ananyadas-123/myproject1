
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

                        <div class="schedule-info-icon">
                            <i class="bi bi-lightbulb-fill"></i>
                        </div>

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
                            <i class="bi bi-bell-fill"></i>
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

                        <i class="bi bi-info-circle-fill"></i>

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

/* =========================================
   MAIN PAGE
========================================= */

.maintenance-page {
    max-width: 1180px;
    margin: 0 auto;
    color: #172033;
}

/* =========================================
   PRODUCT HEADER
========================================= */

.maintenance-page .product-header-card {
    position: relative;
    overflow: hidden;
    background: linear-gradient(
        115deg,
        #111b46 0%,
        #3730a3 48%,
        #6545db 78%,
        #2563eb 100%
    );
    border: 1px solid #4338ca;
    border-radius: 21px;
    padding: 25px;
    display: flex;
    align-items: center;
    gap: 18px;
    margin-bottom: 24px;
    box-shadow: 0 12px 30px rgba(55, 48, 163, .17);
}

.maintenance-page .product-header-card::before {
    content: "";
    position: absolute;
    width: 210px;
    height: 210px;
    right: 130px;
    top: -150px;
    border: 27px solid rgba(255,255,255,.08);
    border-radius: 50%;
}

.maintenance-page .product-header-card::after {
    content: "";
    position: absolute;
    width: 150px;
    height: 150px;
    right: -40px;
    bottom: -100px;
    background: rgba(255,255,255,.08);
    border-radius: 50%;
}

.maintenance-page .product-icon {
    width: 62px;
    height: 62px;
    border-radius: 17px;
    background: linear-gradient(135deg, #a5f3fc, #67e8f9);
    color: #164e63;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 27px;
    flex-shrink: 0;
    position: relative;
    z-index: 1;
    box-shadow: 0 7px 18px rgba(0,0,0,.16);
}

.maintenance-page .product-header-info {
    position: relative;
    z-index: 1;
    min-width: 0;
}

.maintenance-page .section-label {
    font-size: 9px;
    font-weight: 900;
    color: #c4b5fd;
    letter-spacing: 1.5px;
}

.maintenance-page .product-header-info h2 {
    margin: 4px 0 9px;
    font-size: 23px;
    font-weight: 900;
    color: #fff;
    letter-spacing: -.4px;
    word-break: break-word;
}

.maintenance-page .product-meta {
    display: flex;
    flex-wrap: wrap;
    gap: 15px;
    color: #e0e7ff;
    font-size: 10px;
    font-weight: 700;
}

.maintenance-page .product-meta span {
    display: flex;
    align-items: center;
    gap: 6px;
}

.maintenance-page .product-meta i {
    color: #67e8f9;
}

.maintenance-page .maintenance-badge {
    position: relative;
    z-index: 1;
    margin-left: auto;
    padding: 11px 15px;
    border-radius: 12px;
    background: #fff;
    color: #4338ca;
    font-size: 10px;
    font-weight: 900;
    white-space: nowrap;
    box-shadow: 0 5px 15px rgba(0,0,0,.12);
}

.maintenance-page .maintenance-badge i {
    margin-right: 6px;
    color: #0891b2;
}

/* =========================================
   VALIDATION ERROR
========================================= */

.maintenance-page .error-card {
    display: flex;
    gap: 14px;
    background: #fff7ed;
    border: 1px solid #fdba74;
    color: #9a3412;
    padding: 16px 18px;
    border-radius: 15px;
    margin-bottom: 22px;
    box-shadow: 0 5px 15px rgba(234,88,12,.06);
}

.maintenance-page .error-icon {
    width: 37px;
    height: 37px;
    border-radius: 11px;
    background: #ffedd5;
    color: #ea580c;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 18px;
    flex-shrink: 0;
}

.maintenance-page .error-card h6 {
    margin: 0 0 6px;
    font-size: 13px;
    font-weight: 900;
}

.maintenance-page .error-card ul {
    margin: 0;
    padding-left: 18px;
    font-size: 11px;
    line-height: 1.7;
}

/* =========================================
   MAIN GRID
========================================= */

.maintenance-page .form-grid {
    display: grid;
    grid-template-columns: minmax(0, 1.7fr) minmax(290px, .8fr);
    gap: 22px;
    align-items: start;
}

/* =========================================
   FORM CARDS
========================================= */

.maintenance-page .form-card {
    background: #fff;
    border: 1px solid #e1e7f0;
    border-radius: 19px;
    padding: 24px;
    margin-bottom: 19px;
    box-shadow: 0 7px 24px rgba(15,23,42,.045);
    transition: .22s ease;
}

.maintenance-page .form-card:hover {
    box-shadow: 0 11px 27px rgba(31,41,75,.075);
}

.maintenance-page .card-heading {
    display: flex;
    align-items: center;
    gap: 13px;
    margin-bottom: 23px;
    padding-bottom: 16px;
    border-bottom: 1px solid #eef1f6;
}

.maintenance-page .card-heading h4 {
    margin: 0 0 4px;
    font-size: 16px;
    font-weight: 900;
    color: #172033;
}

.maintenance-page .card-heading p {
    margin: 0;
    color: #84909b;
    font-size: 10px;
}

.maintenance-page .heading-icon {
    width: 43px;
    height: 43px;
    border-radius: 13px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 18px;
    flex-shrink: 0;
}

.maintenance-page .heading-icon.green {
    background: #d1fae5;
    color: #047857;
}

.maintenance-page .heading-icon.blue {
    background: #dbeafe;
    color: #2563eb;
}

.maintenance-page .heading-icon.orange {
    background: #ffedd5;
    color: #ea580c;
}

/* =========================================
   FORM INPUTS
========================================= */

.maintenance-page .form-label {
    display: block;
    color: #334155;
    font-size: 11px;
    font-weight: 850;
    margin-bottom: 8px;
}

.maintenance-page .form-label span {
    color: #dc2626;
}

.maintenance-page .custom-input {
    min-height: 49px;
    border: 1px solid #dbe3ed;
    border-radius: 11px;
    padding: 11px 14px;
    font-size: 12px;
    color: #1e293b;
    background-color: #fff;
    box-shadow: none;
    transition: .22s ease;
}

.maintenance-page .custom-input::placeholder {
    color: #a0aabd;
    font-size: 11px;
}

.maintenance-page .custom-input:hover {
    border-color: #a5b4fc;
}

.maintenance-page .custom-input:focus {
    border-color: #6366f1;
    box-shadow: 0 0 0 3px rgba(99,102,241,.12);
    outline: none;
}

.maintenance-page .description-input {
    min-height: 130px;
    resize: vertical;
}

.maintenance-page .input-help {
    display: block;
    margin-top: 7px;
    color: #8793a5;
    font-size: 10px;
    line-height: 1.55;
}

/* =========================================
   DATE INPUTS
========================================= */

.maintenance-page .input-icon-wrapper {
    position: relative;
}

.maintenance-page .input-icon-wrapper > i {
    position: absolute;
    left: 14px;
    top: 50%;
    transform: translateY(-50%);
    color: #4f46e5;
    z-index: 2;
    pointer-events: none;
}

.maintenance-page .custom-input.with-icon {
    padding-left: 40px;
}

/* =========================================
   SCHEDULE INFORMATION
========================================= */

.maintenance-page .schedule-info {
    display: flex;
    gap: 11px;
    align-items: center;
    margin-top: 21px;
    padding: 14px;
    border-radius: 12px;
    background: linear-gradient(110deg, #ecfdf5, #eff6ff);
    border: 1px solid #bfdbfe;
    color: #334155;
    font-size: 10px;
    line-height: 1.6;
}

.maintenance-page .schedule-info-icon {
    width: 32px;
    height: 32px;
    border-radius: 9px;
    background: #dbeafe;
    color: #2563eb;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
}

/* =========================================
   COST INPUT
========================================= */

.maintenance-page .cost-input-wrapper {
    position: relative;
}

.maintenance-page .cost-input-wrapper > span {
    position: absolute;
    left: 14px;
    top: 50%;
    transform: translateY(-50%);
    color: #047857;
    font-size: 15px;
    font-weight: 900;
    z-index: 2;
}

.maintenance-page .cost-input-wrapper .custom-input {
    padding-left: 36px;
}

/* =========================================
   REMINDER CARD
========================================= */

.maintenance-page .reminder-card {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 18px;
    background: linear-gradient(125deg, #fff, #f5f3ff);
    border-color: #ddd6fe;
}

.maintenance-page .reminder-content {
    display: flex;
    align-items: center;
    gap: 14px;
}

.maintenance-page .reminder-icon {
    width: 46px;
    height: 46px;
    border-radius: 13px;
    background: linear-gradient(135deg, #fed7aa, #fb923c);
    color: #9a3412;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 19px;
    flex-shrink: 0;
}

.maintenance-page .reminder-content h4 {
    margin: 0 0 5px;
    color: #312e81;
    font-size: 13px;
    font-weight: 900;
}

.maintenance-page .reminder-content p {
    margin: 0;
    color: #64748b;
    font-size: 10px;
    line-height: 1.55;
}

/* =========================================
   REMINDER SWITCH
========================================= */

.maintenance-page .switch {
    position: relative;
    width: 49px;
    height: 27px;
    flex-shrink: 0;
    margin: 0;
}

.maintenance-page .switch input {
    opacity: 0;
    width: 0;
    height: 0;
}

.maintenance-page .slider {
    position: absolute;
    inset: 0;
    cursor: pointer;
    background: #cbd5e1;
    border-radius: 30px;
    transition: .25s ease;
}

.maintenance-page .slider:before {
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

.maintenance-page .switch input:checked + .slider {
    background: #059669;
}

.maintenance-page .switch input:checked + .slider:before {
    transform: translateX(22px);
}

.maintenance-page .switch input:focus-visible + .slider {
    outline: 3px solid rgba(99,102,241,.3);
    outline-offset: 3px;
}

/* =========================================
   SUMMARY CARD
========================================= */

.maintenance-page .summary-card {
    background: #fff;
    border: 1px solid #dfe5f1;
    border-radius: 19px;
    padding: 22px;
    box-shadow: 0 8px 26px rgba(15,23,42,.06);
    position: sticky;
    top: 90px;
}

.maintenance-page .summary-top {
    display: flex;
    align-items: center;
    gap: 12px;
}

.maintenance-page .summary-tools {
    width: 46px;
    height: 46px;
    border-radius: 13px;
    background: linear-gradient(135deg, #bfdbfe, #93c5fd);
    color: #1d4ed8;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 20px;
}

.maintenance-page .summary-top span {
    display: block;
    color: #6366f1;
    font-size: 9px;
    font-weight: 900;
    letter-spacing: 1.3px;
}

.maintenance-page .summary-top h4 {
    margin: 3px 0 0;
    font-size: 16px;
    font-weight: 900;
    color: #172033;
}

.maintenance-page .summary-divider {
    height: 1px;
    background: #e9edf5;
    margin: 19px 0;
}

/* SUMMARY PRODUCT */

.maintenance-page .summary-product {
    display: flex;
    align-items: center;
    gap: 12px;
    margin-bottom: 19px;
    padding: 12px;
    background: linear-gradient(120deg, #eef2ff, #f5f3ff);
    border: 1px solid #e0e7ff;
    border-radius: 13px;
}

.maintenance-page .summary-product img,
.maintenance-page .summary-placeholder {
    width: 59px;
    height: 59px;
    border-radius: 12px;
    object-fit: cover;
    border: 1px solid #c7d2fe;
    background: #fff;
    flex-shrink: 0;
}

.maintenance-page .summary-placeholder {
    display: flex;
    align-items: center;
    justify-content: center;
    color: #6366f1;
    font-size: 22px;
}

.maintenance-page .summary-product strong {
    display: block;
    color: #312e81;
    font-size: 12px;
    font-weight: 900;
    word-break: break-word;
}

.maintenance-page .summary-product small {
    display: block;
    margin-top: 5px;
    color: #6366a5;
    font-size: 10px;
}

/* SUMMARY ITEMS */

.maintenance-page .summary-item {
    padding: 13px 0;
    border-top: 1px solid #edf1f6;
}

.maintenance-page .summary-item span {
    display: flex;
    align-items: center;
    gap: 7px;
    color: #64748b;
    font-size: 10px;
    margin-bottom: 5px;
    font-weight: 700;
}

.maintenance-page .summary-item span i {
    color: #6366f1;
}

.maintenance-page .summary-item strong {
    color: #1e293b;
    font-size: 11px;
    font-weight: 850;
    word-break: break-word;
}

.maintenance-page .tracking-active {
    color: #047857 !important;
}

/* SUMMARY NOTE */

.maintenance-page .summary-note {
    display: flex;
    gap: 10px;
    margin-top: 13px;
    padding: 13px;
    background: #eff6ff;
    border: 1px solid #bfdbfe;
    border-radius: 11px;
}

.maintenance-page .summary-note > i {
    color: #2563eb;
    margin-top: 2px;
    flex-shrink: 0;
}

.maintenance-page .summary-note p {
    margin: 0;
    color: #475569;
    font-size: 10px;
    line-height: 1.6;
}

/* =========================================
   PRO TIP
========================================= */

.maintenance-page .tip-card {
    margin-top: 17px;
    background: linear-gradient(120deg, #fff7ed, #fffbeb);
    border: 1px solid #fed7aa;
    border-radius: 15px;
    padding: 15px;
    display: flex;
    gap: 11px;
    box-shadow: 0 5px 16px rgba(234,88,12,.045);
}

.maintenance-page .tip-icon {
    width: 34px;
    height: 34px;
    border-radius: 10px;
    background: #fed7aa;
    color: #c2410c;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
}

.maintenance-page .tip-card strong {
    display: block;
    color: #9a3412;
    font-size: 11px;
    font-weight: 900;
}

.maintenance-page .tip-card p {
    margin: 4px 0 0;
    color: #7c4a2b;
    font-size: 10px;
    line-height: 1.6;
}

/* =========================================
   BOTTOM ACTIONS
========================================= */

.maintenance-page .bottom-actions {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 12px;
    margin-top: 5px;
    padding-bottom: 10px;
}

.maintenance-page .btn-back,
.maintenance-page .btn-save {
    min-height: 49px;
    padding: 0 20px;
    border-radius: 11px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    text-decoration: none;
    font-size: 11px;
    font-weight: 900;
    transition: .22s ease;
}

.maintenance-page .btn-back {
    background: #fff;
    border: 1px solid #cbd5e1;
    color: #475569;
}

.maintenance-page .btn-back:hover {
    background: #eef2ff;
    border-color: #a5b4fc;
    color: #4338ca;
    transform: translateY(-2px);
}

.maintenance-page .btn-save {
    border: 1px solid #047857;
    background: linear-gradient(120deg, #047857, #10b981);
    color: #fff;
    box-shadow: 0 7px 18px rgba(5,150,105,.2);
    cursor: pointer;
}

.maintenance-page .btn-save:hover {
    background: linear-gradient(120deg, #065f46, #047857);
    color: #fff;
    transform: translateY(-2px);
    box-shadow: 0 10px 22px rgba(5,150,105,.25);
}

/* =========================================
   RESPONSIVE
========================================= */

@media (max-width: 900px) {

    .maintenance-page .form-grid {
        grid-template-columns: 1fr;
    }

    .maintenance-page .summary-card {
        position: static;
    }

}

@media (max-width: 600px) {

    .maintenance-page .product-header-card {
        align-items: flex-start;
        flex-wrap: wrap;
        padding: 19px;
    }

    .maintenance-page .product-header-info h2 {
        font-size: 19px;
    }

    .maintenance-page .maintenance-badge {
        margin-left: 0;
    }

    .maintenance-page .form-card {
        padding: 18px;
    }

    .maintenance-page .card-heading h4 {
        font-size: 15px;
    }

    .maintenance-page .reminder-card {
        align-items: flex-start;
    }

    .maintenance-page .bottom-actions {
        flex-direction: column-reverse;
        align-items: stretch;
    }

    .maintenance-page .btn-back,
    .maintenance-page .btn-save {
        width: 100%;
    }

}

</style>

@endpush
