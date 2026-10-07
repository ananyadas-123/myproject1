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
        border: 1px solid #e5e7eb;
        border-radius: 22px;
        box-shadow: 0 10px 30px rgba(15, 23, 42, 0.07);
        overflow: hidden;
    }

    .profile-header {
        padding: 28px 32px;
        background: linear-gradient(135deg, #ecfdf5, #eff6ff);
        border-bottom: 1px solid #e5e7eb;
    }

    .profile-header h2 {
        margin: 0 0 6px;
        font-size: 24px;
        font-weight: 800;
        color: #12372a;
    }

    .profile-header p {
        margin: 0;
        color: #64748b;
        font-size: 14px;
    }

    .profile-body {
        padding: 32px;
    }

    .profile-photo-section {
        display: flex;
        align-items: center;
        gap: 22px;
        padding: 22px;
        margin-bottom: 28px;
        background: #f8fafc;
        border: 1px solid #e5e7eb;
        border-radius: 18px;
    }

    .profile-photo {
        width: 105px;
        height: 105px;
        border-radius: 50%;
        object-fit: cover;
        border: 4px solid #ffffff;
        box-shadow: 0 6px 18px rgba(15, 23, 42, 0.12);
    }

    .profile-placeholder {
        width: 105px;
        height: 105px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #d1fae5;
        color: #166534;
        font-size: 42px;
        border: 4px solid #ffffff;
        box-shadow: 0 6px 18px rgba(15, 23, 42, 0.12);
    }

    .photo-info h4 {
        margin: 0 0 6px;
        font-size: 17px;
        font-weight: 800;
        color: #1e293b;
    }

    .photo-info p {
        margin: 0 0 12px;
        color: #64748b;
        font-size: 13px;
    }

    .form-label {
        font-size: 12px;
        font-weight: 800;
        color: #334155;
        margin-bottom: 7px;
    }

    .form-control {
        min-height: 48px;
        border-radius: 11px;
        border: 1px solid #dbe2ea;
        font-size: 14px;
        padding: 11px 14px;
    }

    .form-control:focus {
        border-color: #22a06b;
        box-shadow: 0 0 0 3px rgba(34, 160, 107, 0.10);
    }

    textarea.form-control {
        min-height: 105px;
        resize: vertical;
    }

    .alert-success {
        border-radius: 12px;
        font-size: 14px;
        border: none;
    }

    .alert-danger {
        border-radius: 12px;
        font-size: 14px;
    }

    .profile-actions {
        display: flex;
        justify-content: flex-end;
        gap: 10px;
        margin-top: 28px;
        padding-top: 24px;
        border-top: 1px solid #e5e7eb;
    }

    .btn-cancel,
    .btn-save {
        min-height: 46px;
        padding: 0 20px;
        border-radius: 11px;
        font-size: 13px;
        font-weight: 800;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 7px;
    }

    .btn-cancel {
        color: #475569;
        background: #f8fafc;
        border: 1px solid #e2e8f0;
    }

    .btn-save {
        color: #ffffff;
        background: #176b4d;
        border: 1px solid #176b4d;
    }

    .btn-save:hover {
        background: #12583e;
        color: #ffffff;
    }

    .btn-cancel:hover {
        color: #1e293b;
        background: #f1f5f9;
    }

    .error-text {
        font-size: 12px;
        color: #dc2626;
        margin-top: 5px;
    }

    @media (max-width: 768px) {
        .profile-body {
            padding: 22px;
        }

        .profile-header {
            padding: 22px;
        }

        .profile-photo-section {
            align-items: flex-start;
        }

        .profile-actions {
            flex-direction: column-reverse;
        }

        .btn-cancel,
        .btn-save {
            width: 100%;
        }
    }
</style>
@endpush

@section('content')

<div class="profile-page">

    <div class="profile-card">

        <div class="profile-header">
            <h2>
                <i class="bi bi-person-circle me-2"></i>
                Personal Information
            </h2>

            <p>
                Update your profile information and keep your account details up to date.
            </p>
        </div>

        <div class="profile-body">

            @if(session('success'))
                <div class="alert alert-success">
                    <i class="bi bi-check-circle-fill me-2"></i>
                    {{ session('success') }}
                </div>
            @endif

            @if($errors->any())
                <div class="alert alert-danger">
                    <strong>Please check the following:</strong>

                    <ul class="mb-0 mt-2">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('profile.update') }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf
                @method('PUT')

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
                        <h4>Profile Photo</h4>

                        <p>
                            Upload a JPG, JPEG, PNG or WEBP image.
                            Maximum size 2MB.
                        </p>

                        <input
                            type="file"
                            name="image"
                            class="form-control"
                            accept=".jpg,.jpeg,.png,.webp"
                        >
                    </div>

                </div>

                <div class="row g-4">

                    <div class="col-md-6">
                        <label class="form-label">
                            Full Name
                        </label>

                        <input
                            type="text"
                            name="name"
                            class="form-control"
                            value="{{ old('name', $user->name) }}"
                            required
                        >

                        @error('name')
                            <div class="error-text">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">
                            Email Address
                        </label>

                        <input
                            type="email"
                            name="email"
                            class="form-control"
                            value="{{ old('email', $user->email) }}"
                            required
                        >

                        @error('email')
                            <div class="error-text">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">
                            Phone Number
                        </label>

                        <input
                            type="text"
                            name="phone"
                            class="form-control"
                            value="{{ old('phone', $user->phone) }}"
                            required
                        >

                        @error('phone')
                            <div class="error-text">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">
                            Date of Birth
                        </label>

                        <input
                            type="date"
                            name="dob"
                            class="form-control"
                            value="{{ old('dob', $user->dob) }}"
                            required
                        >

                        @error('dob')
                            <div class="error-text">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-12">
                        <label class="form-label">
                            Address
                        </label>

                        <textarea
                            name="address"
                            class="form-control"
                            required
                        >{{ old('address', $user->address) }}</textarea>

                        @error('address')
                            <div class="error-text">{{ $message }}</div>
                        @enderror
                    </div>

                </div>

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