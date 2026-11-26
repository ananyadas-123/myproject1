
@extends('admin.layouts.app')

@section('title', 'Add Technician')
@section('page-heading', 'Add New Technician')
@section('page-subtitle', 'Enter technician details below.')

@push('styles')
<style>
    .technician-create-page {
        --tech-primary: #5b4ce2;
        --tech-text: #172033;
        --tech-muted: #64748b;
    }

    .tech-back-btn {
        display: inline-flex;
        align-items: center;
        gap: 9px;
        padding: 10px 17px;
        margin-bottom: 22px;
        border: 1px solid #cbd5e1;
        border-radius: 10px;
        background: #fff;
        color: #334155;
        font-size: 13px;
        font-weight: 700;
        text-decoration: none;
        transition: all .25s ease;
    }

    .tech-back-btn:hover {
        color: #fff;
        background: linear-gradient(135deg, #4f46e5, #7c3aed);
        border-color: transparent;
        transform: translateX(-3px);
        box-shadow: 0 6px 15px #4f46e533;
    }

    .technician-form-card {
        position: relative;
        overflow: hidden;
        max-width: 900px;
        padding: 30px;
        background: #fff;
        border: 1px solid #e5eaf2;
        border-radius: 18px;
        box-shadow: 0 7px 25px rgba(23, 32, 51, .06);
    }

    .technician-form-card::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 5px;
        background: linear-gradient(90deg, #4f46e5, #9333ea, #06b6d4, #10b981);
    }

    .tech-form-heading {
        display: flex;
        align-items: center;
        gap: 14px;
        padding-bottom: 22px;
        margin-bottom: 25px;
        border-bottom: 1px solid #edf0f5;
    }

    .tech-heading-icon {
        width: 52px;
        height: 52px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 15px;
        background: linear-gradient(135deg, #ede9fe, #dbeafe);
        color: #5b4ce2;
        font-size: 24px;
    }

    .tech-form-heading h5 {
        margin: 0;
        color: #172033;
        font-size: 18px;
        font-weight: 800;
    }

    .tech-form-heading p {
        margin: 5px 0 0;
        color: #64748b;
        font-size: 12px;
    }

    .tech-section-label {
        display: flex;
        align-items: center;
        gap: 9px;
        margin: 25px 0 17px;
        color: #4f46e5;
        font-size: 13px;
        font-weight: 800;
        letter-spacing: .5px;
        text-transform: uppercase;
    }

    .tech-section-label i {
        font-size: 17px;
    }

    .tech-section-label::after {
        content: "";
        flex: 1;
        height: 1px;
        background: #e5e7eb;
    }

    .technician-form-card .form-label {
        display: block;
        margin-bottom: 8px;
        color: #334155;
        font-size: 13px;
        font-weight: 700;
    }

    .technician-form-card .form-control {
        min-height: 45px;
        padding: 10px 13px;
        border: 1px solid #dbe2ec;
        border-radius: 10px;
        background-color: #fff;
        color: #172033;
        font-size: 13px;
        box-shadow: none;
        transition: all .2s ease;
    }

    .technician-form-card textarea.form-control {
        min-height: 105px;
        resize: vertical;
    }

    .technician-form-card .form-control::placeholder {
        color: #94a3b8;
    }

    .technician-form-card .form-control:focus {
        border-color: #7164ed;
        box-shadow: 0 0 0 4px rgba(99, 102, 241, .13);
        background: #fff;
    }

    .field-hint {
        display: block;
        margin-top: 7px;
        color: #64748b;
        font-size: 11px;
    }

    .required-mark {
        color: #dc2626;
        font-weight: 800;
    }

    .profile-upload-box {
        padding: 18px;
        border: 2px dashed #c7d2fe;
        border-radius: 13px;
        background: #f8faff;
        transition: all .2s ease;
    }

    .profile-upload-box:hover {
        border-color: #6366f1;
        background: #f1f3ff;
    }

    .upload-icon {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 43px;
        height: 43px;
        margin-bottom: 12px;
        border-radius: 12px;
        background: #e0e7ff;
        color: #4f46e5;
        font-size: 20px;
    }

    .profile-upload-box .form-control {
        background: #fff;
    }

    .verification-notice {
        display: flex;
        align-items: flex-start;
        gap: 13px;
        padding: 17px;
        margin-top: 25px;
        border: 1px solid #fcd34d;
        border-left: 4px solid #f59e0b;
        border-radius: 12px;
        background: #fffbeb;
    }

    .verification-icon {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 38px;
        height: 38px;
        flex-shrink: 0;
        border-radius: 10px;
        background: #fef3c7;
        color: #b45309;
        font-size: 19px;
    }

    .verification-notice strong {
        display: block;
        margin-bottom: 4px;
        color: #92400e;
        font-size: 13px;
    }

    .verification-notice p {
        margin: 0;
        color: #92400e;
        font-size: 12px;
        line-height: 1.6;
    }

    .tech-form-actions {
        display: flex;
        align-items: center;
        flex-wrap: wrap;
        gap: 12px;
        padding-top: 22px;
        margin-top: 22px;
        border-top: 1px solid #edf0f5;
    }

    .btn-tech-save {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 9px;
        min-height: 45px;
        padding: 11px 24px;
        border: 0;
        border-radius: 10px;
        background: linear-gradient(135deg, #4f46e5, #7c3aed);
        color: #fff;
        font-size: 13px;
        font-weight: 800;
        box-shadow: 0 5px 14px #5b4ce233;
        transition: all .25s ease;
    }

    .btn-tech-save:hover {
        color: #fff;
        background: linear-gradient(135deg, #4338ca, #6d28d9);
        transform: translateY(-2px);
        box-shadow: 0 8px 18px #5b4ce244;
    }

    .btn-tech-save:active {
        transform: translateY(0);
    }

    .tech-error-alert {
        padding: 14px 17px;
        margin-bottom: 22px;
        border: 1px solid #fecaca;
        border-left: 4px solid #dc2626;
        border-radius: 11px;
        background: #fef2f2;
        color: #991b1b;
        font-size: 13px;
    }

    .tech-error-alert strong {
        display: block;
        margin-bottom: 7px;
    }

    .tech-error-alert div + div {
        margin-top: 4px;
    }

    @media (max-width: 600px) {
        .technician-form-card {
            padding: 22px 16px;
            border-radius: 14px;
        }

        .tech-form-heading h5 {
            font-size: 16px;
        }

        .tech-form-actions {
            flex-direction: column;
            align-items: stretch;
        }

        .btn-tech-save {
            width: 100%;
        }
    }
</style>
@endpush

@section('content')

<div class="technician-create-page">

    <div class="mb-3">
        <a href="{{ route('admin.technicians.index') }}" class="tech-back-btn">
            <i class="bi bi-arrow-left"></i>
            Back to Technicians
        </a>
    </div>

    <div class="technician-form-card">

        <div class="tech-form-heading">
            <div class="tech-heading-icon">
                <i class="bi bi-person-plus-fill"></i>
            </div>
            <div>
                <h5>Technician Information</h5>
                <p>Fill in the details to register a new technician.</p>
            </div>
        </div>

        @if($errors->any())
            <div class="tech-error-alert">
                <strong>
                    <i class="bi bi-exclamation-circle-fill me-1"></i>
                    Please fix the following errors:
                </strong>

                @foreach($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
        @endif

        <form action="{{ route('admin.technicians.store') }}"
              method="POST"
              enctype="multipart/form-data">

            @csrf

            <div class="tech-section-label">
                <i class="bi bi-person-vcard"></i>
                Personal Information
            </div>

            <div class="row g-3">

                <div class="col-md-6">
                    <label class="form-label">
                        Full Name <span class="required-mark">*</span>
                    </label>
                    <input type="text"
                           name="name"
                           class="form-control"
                           value="{{ old('name') }}"
                           placeholder="Enter technician full name"
                           required>
                </div>

                <div class="col-md-6">
                    <label class="form-label">
                        Email Address <span class="required-mark">*</span>
                    </label>
                    <input type="email"
                           name="email"
                           class="form-control"
                           value="{{ old('email') }}"
                           placeholder="example@email.com"
                           required>
                </div>

                <div class="col-md-6">
                    <label class="form-label">
                        Phone Number <span class="required-mark">*</span>
                    </label>
                    <input type="text"
                           name="phone"
                           class="form-control"
                           value="{{ old('phone') }}"
                           placeholder="Enter phone number"
                           required>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Address</label>
                    <textarea name="address"
                              class="form-control"
                              rows="3"
                              placeholder="Enter complete address">{{ old('address') }}</textarea>
                </div>

            </div>

            <div class="tech-section-label">
                <i class="bi bi-tools"></i>
                Professional Information
            </div>

            <div class="row g-3">

                <div class="col-md-6">
                    <label class="form-label">Specialization</label>
                    <input type="text"
                           name="specialization"
                           class="form-control"
                           value="{{ old('specialization') }}"
                           placeholder="e.g. AC & Refrigerator Repair">
                </div>

                <div class="col-md-6">
                    <label class="form-label">Experience</label>
                    <input type="text"
                           name="experience"
                           class="form-control"
                           value="{{ old('experience') }}"
                           placeholder="e.g. 5 years">
                </div>

                <div class="col-md-6">
                    <label class="form-label">Service Charge (₹)</label>
                    <input type="number"
                           name="service_charge"
                           class="form-control"
                           min="0"
                           step="0.01"
                           value="{{ old('service_charge') }}"
                           placeholder="Enter service charge">
                </div>

            </div>

            <div class="tech-section-label">
                <i class="bi bi-image"></i>
                Profile Image
            </div>

            <div class="profile-upload-box">

                <div class="upload-icon">
                    <i class="bi bi-cloud-arrow-up-fill"></i>
                </div>

                <label class="form-label">Upload Technician Photo</label>

                <input type="file"
                       name="profile_image"
                       class="form-control"
                       accept="image/*">

                <small class="field-hint">
                    <i class="bi bi-info-circle me-1"></i>
                    JPG, PNG or WEBP; maximum 2 MB.
                </small>

            </div>

            <div class="verification-notice">
                <div class="verification-icon">
                    <i class="bi bi-shield-lock-fill"></i>
                </div>

                <div>
                    <strong>Admin Verification Required</strong>
                    <p>
                        New technicians will be added as
                        <strong>Not Verified</strong>.
                        Admin must verify them before users can select them.
                    </p>
                </div>
            </div>

            <div class="tech-form-actions">
                <button type="submit" class="btn-tech-save">
                    <i class="bi bi-person-check-fill"></i>
                    Save Technician
                </button>
            </div>

        </form>

    </div>

</div>

@endsection
