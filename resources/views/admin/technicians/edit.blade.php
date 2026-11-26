
@extends('admin.layouts.app')

@section('title', 'Edit Technician')
@section('page-heading', 'Edit Technician')
@section('page-subtitle', 'Update technician information and status.')

@push('styles')
<style>
    .technician-edit-page {
        --tech-primary: #5b4ce2;
        --tech-text: #172033;
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

    .technician-edit-card {
        position: relative;
        overflow: hidden;
        max-width: 900px;
        padding: 30px;
        background: #fff;
        border: 1px solid #e5eaf2;
        border-radius: 18px;
        box-shadow: 0 7px 25px rgba(23, 32, 51, .06);
    }

    .technician-edit-card::before {
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
        margin-bottom: 24px;
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
        margin: 26px 0 17px;
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

    .technician-edit-card .form-label {
        display: block;
        margin-bottom: 8px;
        color: #334155;
        font-size: 13px;
        font-weight: 700;
    }

    .technician-edit-card .form-control {
        min-height: 45px;
        padding: 10px 13px;
        border: 1px solid #dbe2ec;
        border-radius: 10px;
        background: #fff;
        color: #172033;
        font-size: 13px;
        box-shadow: none;
        transition: all .2s ease;
    }

    .technician-edit-card textarea.form-control {
        min-height: 105px;
        resize: vertical;
    }

    .technician-edit-card .form-control:focus {
        border-color: #7164ed;
        box-shadow: 0 0 0 4px rgba(99, 102, 241, .13);
    }

    .technician-edit-card .form-control::placeholder {
        color: #94a3b8;
    }

    .required-mark {
        color: #dc2626;
    }

    .profile-card {
        display: flex;
        align-items: center;
        gap: 20px;
        padding: 19px;
        border: 1px solid #dbeafe;
        border-radius: 14px;
        background: linear-gradient(120deg, #eff6ff, #f5f3ff);
    }

    .profile-avatar {
        width: 92px;
        height: 92px;
        flex-shrink: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
        border: 4px solid #fff;
        border-radius: 50%;
        background: linear-gradient(135deg, #4f46e5, #9333ea);
        color: #fff;
        font-size: 34px;
        font-weight: 800;
        box-shadow: 0 5px 15px #4f46e533;
    }

    .profile-avatar img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .profile-info h6 {
        margin: 0 0 5px;
        color: #172033;
        font-size: 15px;
        font-weight: 800;
    }

    .profile-info p {
        margin: 0;
        color: #64748b;
        font-size: 12px;
    }

    .profile-name-badge {
        display: inline-flex;
        margin-top: 9px;
        padding: 5px 10px;
        border-radius: 20px;
        background: #e0e7ff;
        color: #4338ca;
        font-size: 10px;
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

    .field-hint {
        display: block;
        margin-top: 7px;
        color: #64748b;
        font-size: 11px;
    }

    .status-grid {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 15px;
    }

    .status-option {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 14px;
        padding: 18px;
        border: 1px solid #e5eaf2;
        border-radius: 13px;
        background: #f8fafc;
        transition: all .2s ease;
    }

    .status-option:hover {
        border-color: #c7d2fe;
        background: #f5f7ff;
    }

    .status-option.verified-option {
        border-left: 4px solid #10b981;
    }

    .status-option.available-option {
        border-left: 4px solid #0ea5e9;
    }

    .status-info {
        display: flex;
        align-items: center;
        gap: 12px;
        min-width: 0;
    }

    .status-icon {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 40px;
        height: 40px;
        flex-shrink: 0;
        border-radius: 11px;
        font-size: 18px;
    }

    .verified-option .status-icon {
        color: #059669;
        background: #d1fae5;
    }

    .available-option .status-icon {
        color: #0284c7;
        background: #e0f2fe;
    }

    .status-info strong {
        display: block;
        margin-bottom: 4px;
        color: #172033;
        font-size: 13px;
        font-weight: 800;
    }

    .status-info small {
        display: block;
        color: #64748b;
        font-size: 11px;
        line-height: 1.5;
    }

    .status-option .form-check {
        margin: 0;
        padding: 0;
        flex-shrink: 0;
    }

    .status-option .form-check-input {
        float: none;
        width: 2.7em;
        height: 1.4em;
        margin: 0;
        cursor: pointer;
        box-shadow: none;
        background-color: #cbd5e1;
        border-color: #cbd5e1;
        transition: all .2s ease;
    }

    .verified-option .form-check-input:checked {
        background-color: #10b981;
        border-color: #10b981;
    }

    .available-option .form-check-input:checked {
        background-color: #0ea5e9;
        border-color: #0ea5e9;
    }

    .status-option .form-check-input:focus {
        box-shadow: 0 0 0 4px rgba(99, 102, 241, .12);
    }

    .status-note {
        display: flex;
        align-items: flex-start;
        gap: 11px;
        padding: 15px;
        margin-top: 17px;
        border: 1px solid #c7d2fe;
        border-radius: 11px;
        background: #eef2ff;
        color: #3730a3;
        font-size: 12px;
        line-height: 1.6;
    }

    .status-note i {
        font-size: 19px;
        flex-shrink: 0;
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

    .tech-form-actions {
        display: flex;
        align-items: center;
        gap: 12px;
        padding-top: 22px;
        margin-top: 25px;
        border-top: 1px solid #edf0f5;
    }

    .btn-tech-update {
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

    .btn-tech-update:hover {
        color: #fff;
        background: linear-gradient(135deg, #4338ca, #6d28d9);
        transform: translateY(-2px);
        box-shadow: 0 8px 18px #5b4ce244;
    }

    @media (max-width: 650px) {
        .technician-edit-card {
            padding: 22px 16px;
            border-radius: 14px;
        }

        .tech-form-heading h5 {
            font-size: 16px;
        }

        .profile-card {
            align-items: flex-start;
            gap: 14px;
            padding: 15px;
        }

        .profile-avatar {
            width: 75px;
            height: 75px;
            font-size: 27px;
        }

        .status-grid {
            grid-template-columns: 1fr;
        }

        .tech-form-actions {
            flex-direction: column;
            align-items: stretch;
        }

        .btn-tech-update {
            width: 100%;
        }
    }
</style>
@endpush

@section('content')

<div class="technician-edit-page">

    <div class="mb-3">
        <a href="{{ route('admin.technicians.index') }}" class="tech-back-btn">
            <i class="bi bi-arrow-left"></i>
            Back to Technicians
        </a>
    </div>

    <div class="technician-edit-card">

        <div class="tech-form-heading">
            <div class="tech-heading-icon">
                <i class="bi bi-person-gear"></i>
            </div>
            <div>
                <h5>Update Technician Information</h5>
                <p>Edit profile, professional details and technician status.</p>
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

        <form action="{{ route('admin.technicians.update', $technician) }}"
              method="POST"
              enctype="multipart/form-data">

            @csrf
            @method('PUT')

            {{-- Current Profile --}}
            <div class="tech-section-label">
                <i class="bi bi-person-circle"></i>
                Current Profile
            </div>

            <div class="profile-card">

                <div class="profile-avatar">
                    @if($technician->profile_image)
                        <img src="{{ asset('storage/'.$technician->profile_image) }}"
                             alt="Technician">
                    @else
                        {{ strtoupper(substr($technician->name ?? 'T', 0, 1)) }}
                    @endif
                </div>

                <div class="profile-info">
                    <h6>{{ $technician->name }}</h6>
                    <p>{{ $technician->email }}</p>
                    <span class="profile-name-badge">
                        <i class="bi bi-pencil-square me-1"></i>
                        Editing Technician Profile
                    </span>
                </div>

            </div>

            {{-- Personal Information --}}
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
                           value="{{ old('name', $technician->name) }}"
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
                           value="{{ old('email', $technician->email) }}"
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
                           value="{{ old('phone', $technician->phone) }}"
                           placeholder="Enter phone number"
                           required>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Address</label>
                    <textarea name="address"
                              class="form-control"
                              rows="3"
                              placeholder="Enter complete address">{{ old('address', $technician->address) }}</textarea>
                </div>

            </div>

            {{-- Professional Information --}}
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
                           value="{{ old('specialization', $technician->specialization) }}"
                           placeholder="e.g. AC & Refrigerator Repair">
                </div>

                <div class="col-md-6">
                    <label class="form-label">Experience</label>
                    <input type="text"
                           name="experience"
                           class="form-control"
                           value="{{ old('experience', $technician->experience) }}"
                           placeholder="e.g. 5 years">
                </div>

                <div class="col-md-6">
                    <label class="form-label">Service Charge (₹)</label>
                    <input type="number"
                           name="service_charge"
                           class="form-control"
                           min="0"
                           step="0.01"
                           value="{{ old('service_charge', $technician->service_charge) }}"
                           placeholder="Enter service charge">
                </div>

            </div>

            {{-- Profile Image --}}
            <div class="tech-section-label">
                <i class="bi bi-image"></i>
                Update Profile Image
            </div>

            <div class="profile-upload-box">

                <div class="upload-icon">
                    <i class="bi bi-cloud-arrow-up-fill"></i>
                </div>

                <label class="form-label">Change Profile Image</label>

                <input type="file"
                       name="profile_image"
                       class="form-control"
                       accept="image/*">

                <small class="field-hint">
                    <i class="bi bi-info-circle me-1"></i>
                    Select a new image only if you want to replace the current profile photo.
                </small>

            </div>

            {{-- Technician Status --}}
            <div class="tech-section-label">
                <i class="bi bi-shield-check"></i>
                Technician Status
            </div>

            <div class="status-grid">

                <div class="status-option verified-option">

                    <div class="status-info">
                        <div class="status-icon">
                            <i class="bi bi-patch-check-fill"></i>
                        </div>

                        <div>
                            <strong>Verified Technician</strong>
                            <small>Allow this technician to be verified.</small>
                        </div>
                    </div>

                    <div class="form-check form-switch">
                        <input class="form-check-input"
                               type="checkbox"
                               name="verified"
                               value="1"
                               id="verified"
                               @checked(old('verified', $technician->verified))>
                    </div>

                </div>

                <div class="status-option available-option">

                    <div class="status-info">
                        <div class="status-icon">
                            <i class="bi bi-calendar2-check-fill"></i>
                        </div>

                        <div>
                            <strong>Available for Repair</strong>
                            <small>Allow this technician to accept repairs.</small>
                        </div>
                    </div>

                    <div class="form-check form-switch">
                        <input class="form-check-input"
                               type="checkbox"
                               name="available"
                               value="1"
                               id="available"
                               @checked(old('available', $technician->available))>
                    </div>

                </div>

            </div>

            <div class="status-note">
                <i class="bi bi-info-circle-fill"></i>
                <span>
                    <strong>Note:</strong>
                    Verification and availability are separate settings.
                    A technician can be verified but unavailable for new repair requests.
                </span>
            </div>

            <div class="tech-form-actions">
                <button type="submit" class="btn-tech-update">
                    <i class="bi bi-check-circle-fill"></i>
                    Update Technician
                </button>
            </div>

        </form>

    </div>

</div>

@endsection
