
@extends('layouts.app')

@section('title', 'My Profile - ProductLife')

@section('page_title', 'My Profile')

@section('page_subtitle', 'Manage your personal information and profile')

@push('styles')
<style>
    .profile-page {
        padding-bottom: 40px;
    }

    .profile-card {
        background: #ffffff;
        border: 1px solid #e2e8f0;
        border-radius: 22px;
        overflow: hidden;
        box-shadow: 0 14px 40px rgba(30, 41, 59, .09);
    }

    /* PROFILE HEADER */

    .profile-header {
        position: relative;
        overflow: hidden;
        padding: 30px 32px;
        background:
            radial-gradient(circle at 90% 10%, rgba(255,255,255,.17), transparent 25%),
            linear-gradient(120deg, #25205d, #5141a6 55%, #2563eb);
        border-bottom: 4px solid #06b6d4;
    }

    .profile-header::after {
        content: "";
        position: absolute;
        width: 190px;
        height: 190px;
        right: -65px;
        top: -95px;
        border: 28px solid rgba(255,255,255,.08);
        border-radius: 50%;
    }

    .profile-header h2 {
        position: relative;
        z-index: 1;
        margin: 0 0 8px;
        color: #ffffff;
        font-size: 25px;
        font-weight: 900;
        letter-spacing: -.5px;
    }

    .profile-header p {
        position: relative;
        z-index: 1;
        margin: 0;
        color: #e0e7ff;
        font-size: 13px;
        line-height: 1.7;
    }

    .profile-header-icon {
        display: inline-flex;
        width: 43px;
        height: 43px;
        align-items: center;
        justify-content: center;
        margin-right: 9px;
        border-radius: 12px;
        background: rgba(255,255,255,.16);
        color: #ffffff;
        vertical-align: middle;
    }

    .profile-body {
        padding: 32px;
    }

    /* ALERTS */

    .profile-page .alert {
        border: none;
        border-radius: 12px;
        padding: 14px 17px;
        margin-bottom: 22px;
        font-size: 13px;
    }

    .profile-page .alert-success {
        color: #065f46;
        background: #d1fae5;
        border-left: 4px solid #10b981;
    }

    .profile-page .alert-danger {
        color: #991b1b;
        background: #fee2e2;
        border-left: 4px solid #ef4444;
    }

    /* PHOTO SECTION */

    .profile-photo-section {
        display: flex;
        align-items: center;
        gap: 23px;
        padding: 23px;
        margin-bottom: 32px;
        border: 1px solid #ddd6fe;
        border-radius: 17px;
        background: linear-gradient(120deg, #f5f3ff, #eff6ff);
    }

    .profile-photo,
    .profile-placeholder {
        width: 112px;
        height: 112px;
        flex-shrink: 0;
        border-radius: 50%;
        border: 4px solid #ffffff;
        box-shadow: 0 7px 22px rgba(79, 70, 229, .17);
    }

    .profile-photo {
        object-fit: cover;
    }

    .profile-placeholder {
        display: flex;
        align-items: center;
        justify-content: center;
        background: linear-gradient(135deg, #7c3aed, #2563eb);
        color: #ffffff;
        font-size: 43px;
    }

    .photo-info {
        flex: 1;
        min-width: 0;
    }

    .photo-info h4 {
        margin: 0 0 6px;
        color: #25205d;
        font-size: 17px;
        font-weight: 900;
    }

    .photo-info p {
        margin: 0 0 13px;
        color: #64748b;
        font-size: 12px;
        line-height: 1.7;
    }

    .photo-info .form-control {
        max-width: 420px;
    }

    /* SECTION HEADING */

    .profile-section-heading {
        display: flex;
        align-items: center;
        gap: 11px;
        margin-bottom: 22px;
        padding-bottom: 13px;
        border-bottom: 1px solid #e9eaf5;
    }

    .profile-section-heading i {
        display: flex;
        width: 36px;
        height: 36px;
        align-items: center;
        justify-content: center;
        border-radius: 10px;
        background: #ede9fe;
        color: #6d28d9;
        font-size: 17px;
    }

    .profile-section-heading h3 {
        margin: 0;
        color: #1e1b4b;
        font-size: 16px;
        font-weight: 900;
    }

    .profile-section-heading p {
        margin: 3px 0 0;
        color: #8490a5;
        font-size: 11px;
    }

    /* FORM FIELDS */

    .profile-page .form-label {
        display: block;
        margin-bottom: 8px;
        color: #34415f;
        font-size: 11px;
        font-weight: 900;
        letter-spacing: .4px;
    }

    .profile-page .form-control {
        width: 100%;
        min-height: 48px;
        padding: 11px 14px;
        border: 1px solid #dce2ee;
        border-radius: 10px;
        background: #f8f9fd;
        color: #172044;
        font-size: 13px;
        font-weight: 500;
        transition: all .22s ease;
    }

    .profile-page .form-control:focus {
        border-color: #7c3aed;
        background: #ffffff;
        box-shadow: 0 0 0 4px rgba(124, 58, 237, .10);
    }

    .profile-page .form-control.is-invalid {
        border-color: #dc3545;
    }

    .profile-page textarea.form-control {
        min-height: 110px;
        resize: vertical;
        line-height: 1.7;
    }

    .profile-page input[type="file"].form-control {
        padding: 9px 11px;
        font-size: 11px;
        cursor: pointer;
    }

    .profile-page input[type="file"]::file-selector-button {
        margin-right: 10px;
        padding: 6px 10px;
        border: none;
        border-radius: 6px;
        background: #ede9fe;
        color: #6d28d9;
        font-size: 10px;
        font-weight: 800;
        cursor: pointer;
    }

    .profile-page .error-text {
        margin-top: 6px;
        color: #dc2626;
        font-size: 11px;
        font-weight: 600;
    }

    /* ACTION BUTTONS */

    .profile-actions {
        display: flex;
        justify-content: flex-end;
        gap: 12px;
        margin-top: 30px;
        padding-top: 23px;
        border-top: 1px solid #e8eaf2;
    }

    .btn-cancel,
    .btn-save {
        min-height: 47px;
        padding: 0 21px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        border-radius: 10px;
        font-size: 12px;
        font-weight: 900;
        text-decoration: none;
        transition: all .22s ease;
        cursor: pointer;
    }

    .btn-cancel {
        color: #475569;
        background: #f1f5f9;
        border: 1px solid #dce3ec;
    }

    .btn-cancel:hover {
        color: #1e1b4b;
        background: #e2e8f0;
        transform: translateY(-2px);
    }

    .btn-save {
        color: #ffffff;
        background: linear-gradient(110deg, #6d28d9, #4f46e5 55%, #2563eb);
        border: 1px solid #5b43d6;
        box-shadow: 0 8px 20px rgba(99, 102, 241, .22);
    }

    .btn-save:hover {
        color: #ffffff;
        transform: translateY(-2px);
        box-shadow: 0 12px 25px rgba(99, 102, 241, .32);
    }

    /* RESPONSIVE */

    @media (max-width: 768px) {
        .profile-body {
            padding: 22px;
        }

        .profile-header {
            padding: 24px 22px;
        }

        .profile-header h2 {
            font-size: 21px;
        }

        .profile-photo-section {
            align-items: flex-start;
            flex-direction: column;
            padding: 19px;
        }

        .profile-photo,
        .profile-placeholder {
            width: 95px;
            height: 95px;
        }

        .photo-info {
            width: 100%;
        }

        .photo-info .form-control {
            max-width: 100%;
        }

        .profile-actions {
            flex-direction: column-reverse;
        }

        .btn-cancel,
        .btn-save {
            width: 100%;
        }
    }

    @media (max-width: 420px) {
        .profile-body {
            padding: 17px;
        }

        .profile-header {
            padding: 21px 18px;
        }

        .profile-header h2 {
            font-size: 19px;
        }

        .profile-header p {
            font-size: 11px;
        }

        .profile-section-heading h3 {
            font-size: 14px;
        }
    }
</style>
@endpush

@section('content')

<div class="profile-page">

    <div class="profile-card">

        <!-- HEADER -->

        <div class="profile-header">

            <h2>
                <span class="profile-header-icon">
                    <i class="bi bi-person-circle"></i>
                </span>
                Personal Information
            </h2>

            <p>
                Update your profile information and keep your account details up to date.
            </p>

        </div>

        <div class="profile-body">

            <!-- SUCCESS MESSAGE -->

            @if(session('success'))
                <div class="alert alert-success">
                    <i class="bi bi-check-circle-fill me-2"></i>
                    {{ session('success') }}
                </div>
            @endif

            <!-- VALIDATION ERRORS -->

            @if($errors->any())
                <div class="alert alert-danger">

                    <strong>
                        <i class="bi bi-exclamation-triangle-fill me-1"></i>
                        Please check the following:
                    </strong>

                    <ul class="mb-0 mt-2">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>

                </div>
            @endif

            <!-- PROFILE UPDATE FORM -->

            <form action="{{ route('profile.update') }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf
                @method('PUT')

                <!-- PROFILE PHOTO -->

                <div class="profile-photo-section">

                    @if($user->image)

                        <img
                            src="{{ asset('storage/' . $user->image) }}"
                            alt="Profile Image"
                            class="profile-photo"
                        >

                    @else

                        <div class="profile-placeholder">
                            <i class="bi bi-person"></i>
                        </div>

                    @endif

                    <div class="photo-info">

                        <h4>
                            <i class="bi bi-camera-fill me-1"></i>
                            Profile Photo
                        </h4>

                        <p>
                            Upload a JPG, JPEG, PNG or WEBP image.
                            Maximum size 2MB.
                        </p>

                        <input
                            type="file"
                            name="image"
                            class="form-control @error('image') is-invalid @enderror"
                            accept=".jpg,.jpeg,.png,.webp"
                        >

                        @error('image')
                            <div class="error-text">{{ $message }}</div>
                        @enderror

                    </div>

                </div>

                <!-- PERSONAL DETAILS -->

                <div class="profile-section-heading">

                    <i class="bi bi-person-vcard-fill"></i>

                    <div>
                        <h3>Account Details</h3>
                        <p>Keep your personal information updated</p>
                    </div>

                </div>

                <div class="row g-4">

                    <!-- FULL NAME -->

                    <div class="col-md-6">

                        <label class="form-label">
                            <i class="bi bi-person me-1"></i>
                            FULL NAME
                        </label>

                        <input
                            type="text"
                            name="name"
                            class="form-control @error('name') is-invalid @enderror"
                            value="{{ old('name', $user->name) }}"
                            placeholder="Enter your full name"
                            required
                        >

                        @error('name')
                            <div class="error-text">{{ $message }}</div>
                        @enderror

                    </div>

                    <!-- EMAIL -->

                    <div class="col-md-6">

                        <label class="form-label">
                            <i class="bi bi-envelope me-1"></i>
                            EMAIL ADDRESS
                        </label>

                        <input
                            type="email"
                            name="email"
                            class="form-control @error('email') is-invalid @enderror"
                            value="{{ old('email', $user->email) }}"
                            placeholder="Enter your email"
                            required
                        >

                        @error('email')
                            <div class="error-text">{{ $message }}</div>
                        @enderror

                    </div>

                    <!-- PHONE -->

                    <div class="col-md-6">

                        <label class="form-label">
                            <i class="bi bi-telephone me-1"></i>
                            PHONE NUMBER
                        </label>

                        <input
                            type="text"
                            name="phone"
                            class="form-control @error('phone') is-invalid @enderror"
                            value="{{ old('phone', $user->phone) }}"
                            placeholder="Enter your phone number"
                            required
                        >

                        @error('phone')
                            <div class="error-text">{{ $message }}</div>
                        @enderror

                    </div>

                    <!-- DATE OF BIRTH -->

                    <div class="col-md-6">

                        <label class="form-label">
                            <i class="bi bi-calendar3 me-1"></i>
                            DATE OF BIRTH
                        </label>

                        <input
                            type="date"
                            name="dob"
                            class="form-control @error('dob') is-invalid @enderror"
                            value="{{ old('dob', $user->dob) }}"
                            required
                        >

                        @error('dob')
                            <div class="error-text">{{ $message }}</div>
                        @enderror

                    </div>

                    <!-- ADDRESS -->

                    <div class="col-12">

                        <label class="form-label">
                            <i class="bi bi-geo-alt me-1"></i>
                            ADDRESS
                        </label>

                        <textarea
                            name="address"
                            class="form-control @error('address') is-invalid @enderror"
                            placeholder="Enter your complete address"
                            required
                        >{{ old('address', $user->address) }}</textarea>

                        @error('address')
                            <div class="error-text">{{ $message }}</div>
                        @enderror

                    </div>

                </div>

                <!-- ACTION BUTTONS -->

                <div class="profile-actions">

                    <a href="{{ route('dashboard') }}" class="btn-cancel">
                        <i class="bi bi-arrow-left"></i>
                        Back to Dashboard
                    </a>

                    <button type="submit" class="btn-save">
                        <i class="bi bi-check2-circle"></i>
                        Save Changes
                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection
