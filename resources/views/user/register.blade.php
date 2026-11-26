
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Register - ProductLife</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            min-height: 100vh;
            padding: 35px 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Inter', sans-serif;
            background:
                radial-gradient(circle at 8% 10%, rgba(111, 66, 193, .13), transparent 30%),
                radial-gradient(circle at 92% 90%, rgba(14, 165, 233, .13), transparent 32%),
                linear-gradient(135deg, #f3f5ff, #eef5ff);
            color: #14213d;
        }

        .register-card {
            width: 100%;
            max-width: 1120px;
            background: #fff;
            border-radius: 26px;
            overflow: hidden;
            border: 1px solid rgba(255,255,255,.9);
            box-shadow: 0 30px 85px rgba(20, 33, 61, .16);
        }

        /* LEFT BRAND PANEL */

        .brand-side {
            height: 100%;
            min-height: 760px;
            padding: 55px 45px;
            display: flex;
            align-items: center;
            position: relative;
            overflow: hidden;
            color: #fff;
            background:
                radial-gradient(circle at 85% 15%, rgba(139, 92, 246, .35), transparent 30%),
                radial-gradient(circle at 10% 90%, rgba(6, 182, 212, .20), transparent 30%),
                linear-gradient(145deg, #10152f, #24205b 55%, #34318c);
        }

        .brand-side::before {
            content: "";
            position: absolute;
            width: 330px;
            height: 330px;
            top: -130px;
            right: -130px;
            border: 45px solid rgba(255,255,255,.055);
            border-radius: 50%;
        }

        .brand-side::after {
            content: "";
            position: absolute;
            width: 250px;
            height: 250px;
            bottom: -125px;
            left: -100px;
            border-radius: 50%;
            background: rgba(255,255,255,.045);
        }

        .brand-content {
            position: relative;
            z-index: 2;
            width: 100%;
        }

        .brand-logo {
            margin-bottom: 55px;
        }

        .brand-logo img {
            width: 185px;
            max-height: 65px;
            object-fit: contain;
            object-position: left center;
            padding: 9px 14px;
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(0,0,0,.18);
        }

        .brand-tag {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 8px 14px;
            margin-bottom: 22px;
            border: 1px solid rgba(167,139,250,.4);
            border-radius: 30px;
            background: rgba(139,92,246,.17);
            color: #d8ccff;
            font-size: 11px;
            font-weight: 800;
            letter-spacing: 1px;
            text-transform: uppercase;
        }

        .brand-tag i {
            color: #67e8f9;
        }

        .brand-side h1 {
            margin: 0 0 20px;
            font-size: 43px;
            line-height: 1.16;
            font-weight: 900;
            letter-spacing: -1.8px;
        }

        .brand-side h1 span {
            display: block;
            color: #a78bfa;
        }

        .brand-description {
            max-width: 410px;
            margin: 0 0 35px;
            color: #c6c9e0;
            font-size: 14px;
            line-height: 1.9;
        }

        .feature-list {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .mini-feature {
            display: flex;
            align-items: center;
            color: #f1f2ff;
            font-size: 13px;
            font-weight: 600;
        }

        .mini-feature-icon {
            width: 39px;
            height: 39px;
            flex-shrink: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 13px;
            border: 1px solid rgba(167,139,250,.28);
            border-radius: 11px;
            background: rgba(139,92,246,.18);
            color: #67e8f9;
            font-size: 17px;
        }

        .brand-footer {
            margin-top: 45px;
            padding-top: 20px;
            border-top: 1px solid rgba(255,255,255,.13);
            color: #aeb2d0;
            font-size: 11px;
        }

        /* RIGHT FORM PANEL */

        .form-side {
            min-height: 760px;
            padding: 48px 48px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            background: #fff;
        }

        .form-top {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            margin-bottom: 25px;
        }

        .form-top-label {
            color: #7c3aed;
            font-size: 11px;
            font-weight: 900;
            letter-spacing: 1.3px;
            text-transform: uppercase;
        }

        .secure-label {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            color: #059669;
            font-size: 11px;
            font-weight: 700;
        }

        .form-title {
            margin-bottom: 27px;
        }

        .form-title h2 {
            margin: 0 0 9px;
            color: #172044;
            font-size: 34px;
            font-weight: 900;
            letter-spacing: -1.2px;
        }

        .form-title p {
            margin: 0;
            color: #718096;
            font-size: 13px;
            line-height: 1.7;
        }

        /* ALERTS */

        .alert {
            padding: 12px 15px;
            margin-bottom: 20px;
            border: none;
            border-radius: 11px;
            font-size: 12px;
            font-weight: 600;
        }

        /* FORM FIELDS */

        .field {
            margin-bottom: 17px;
        }

        .form-label {
            display: block;
            margin-bottom: 8px;
            color: #34415f;
            font-size: 10px;
            font-weight: 900;
            letter-spacing: .8px;
        }

        .input-wrapper {
            position: relative;
        }

        .input-wrapper > i {
            position: absolute;
            top: 50%;
            left: 15px;
            z-index: 2;
            transform: translateY(-50%);
            color: #8793ad;
            font-size: 16px;
            pointer-events: none;
        }

        .form-control {
            width: 100%;
            height: 48px;
            padding: 11px 14px;
            border: 1px solid #dce2ee;
            border-radius: 10px;
            background: #f8f9fd;
            color: #172044;
            font-family: 'Inter', sans-serif;
            font-size: 12px;
            font-weight: 500;
            transition: all .22s ease;
        }

        .input-wrapper .form-control {
            padding-left: 43px;
        }

        .form-control::placeholder {
            color: #a3adc0;
            font-size: 12px;
        }

        .form-control:focus {
            border-color: #7c3aed;
            background: #fff;
            box-shadow: 0 0 0 4px rgba(124,58,237,.10);
        }

        .form-control.is-invalid {
            border-color: #dc3545;
        }

        textarea.form-control {
            height: 78px;
            min-height: 78px;
            resize: vertical;
            padding: 13px 14px !important;
            line-height: 1.6;
        }

        input[type="file"].form-control {
            height: 48px;
            padding: 10px 11px;
            cursor: pointer;
            font-size: 11px;
        }

        input[type="file"]::file-selector-button {
            margin-right: 10px;
            padding: 5px 9px;
            border: none;
            border-radius: 6px;
            background: #ede9fe;
            color: #6d28d9;
            font-size: 10px;
            font-weight: 800;
            cursor: pointer;
        }

        .invalid-feedback {
            margin-top: 6px;
            font-size: 11px;
            font-weight: 600;
        }

        /* REGISTER BUTTON */

        .register-btn {
            width: 100%;
            height: 53px;
            margin-top: 4px;
            border: none;
            border-radius: 11px;
            background: linear-gradient(110deg, #6d28d9, #4f46e5 55%, #2563eb);
            color: #fff;
            font-family: 'Inter', sans-serif;
            font-size: 13px;
            font-weight: 800;
            letter-spacing: .2px;
            box-shadow: 0 10px 24px rgba(99,102,241,.24);
            transition: all .25s ease;
            cursor: pointer;
        }

        .register-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 14px 30px rgba(99,102,241,.34);
        }

        .register-btn:active {
            transform: translateY(0);
        }

        /* LOGIN LINK */

        .login-text {
            margin-top: 22px;
            padding-top: 19px;
            border-top: 1px solid #edf0f6;
            color: #78849a;
            font-size: 12px;
            text-align: center;
        }

        .login-text a {
            margin-left: 4px;
            color: #6d28d9;
            font-weight: 800;
            text-decoration: none;
        }

        .login-text a:hover {
            color: #2563eb;
            text-decoration: underline;
        }

        /* TABLET */

        @media (max-width: 991px) {
            body {
                padding: 25px 16px;
            }

            .register-card {
                max-width: 850px;
            }

            .brand-side {
                min-height: 690px;
                padding: 40px 30px;
            }

            .brand-side h1 {
                font-size: 35px;
            }

            .brand-logo {
                margin-bottom: 42px;
            }

            .form-side {
                min-height: 690px;
                padding: 38px 28px;
            }

            .form-title h2 {
                font-size: 30px;
            }
        }

        /* MOBILE */

        @media (max-width: 767px) {
            body {
                padding: 14px;
                align-items: flex-start;
            }

            .register-card {
                max-width: 520px;
                border-radius: 19px;
            }

            .brand-side {
                min-height: auto;
                padding: 32px 27px;
            }

            .brand-logo {
                margin-bottom: 30px;
            }

            .brand-logo img {
                width: 155px;
            }

            .brand-tag {
                margin-bottom: 16px;
                font-size: 9px;
            }

            .brand-side h1 {
                font-size: 32px;
                letter-spacing: -1px;
            }

            .brand-description {
                margin-bottom: 25px;
                font-size: 12px;
            }

            .feature-list {
                gap: 11px;
            }

            .mini-feature {
                font-size: 12px;
            }

            .mini-feature-icon {
                width: 34px;
                height: 34px;
                font-size: 15px;
            }

            .brand-footer {
                margin-top: 28px;
            }

            .form-side {
                min-height: auto;
                padding: 32px 23px;
            }

            .form-title h2 {
                font-size: 29px;
            }

            .form-title p {
                font-size: 12px;
            }

            .field {
                margin-bottom: 15px;
            }
        }

        /* SMALL MOBILE */

        @media (max-width: 400px) {
            body {
                padding: 9px;
            }

            .brand-side {
                padding: 28px 21px;
            }

            .brand-side h1 {
                font-size: 29px;
            }

            .form-side {
                padding: 27px 18px;
            }

            .form-title h2 {
                font-size: 26px;
            }

            .form-top {
                align-items: flex-start;
                flex-direction: column;
            }

            .form-control {
                font-size: 12px;
            }
        }
    </style>
</head>

<body>

<div class="register-card">

    <div class="row g-0">

        <!-- LEFT BRAND PANEL -->

        <div class="col-lg-5">

            <div class="brand-side">

                <div class="brand-content">

                    <div class="brand-logo">
                        <img
                            src="{{ asset('images/logo.png') }}"
                            alt="ProductLife Logo"
                        >
                    </div>

                    <div class="brand-tag">
                        <i class="bi bi-stars"></i>
                        Smart Product Management
                    </div>

                    <h1>
                        Manage Your
                        <span>Product Life.</span>
                    </h1>

                    <p class="brand-description">
                        One smart platform to manage your products,
                        warranty, maintenance, repairs and complete
                        product lifecycle.
                    </p>

                    <div class="feature-list">

                        <div class="mini-feature">
                            <div class="mini-feature-icon">
                                <i class="bi bi-qr-code-scan"></i>
                            </div>
                            Digital Product Passport
                        </div>

                        <div class="mini-feature">
                            <div class="mini-feature-icon">
                                <i class="bi bi-shield-check"></i>
                            </div>
                            Warranty & Maintenance Tracking
                        </div>

                        <div class="mini-feature">
                            <div class="mini-feature-icon">
                                <i class="bi bi-tools"></i>
                            </div>
                            Smart Repair Management
                        </div>

                        <div class="mini-feature">
                            <div class="mini-feature-icon">
                                <i class="bi bi-recycle"></i>
                            </div>
                            Complete Product Lifecycle
                        </div>

                    </div>

                    <div class="brand-footer">
                        <i class="bi bi-shield-lock me-1"></i>
                        Secure registration · Smarter product management
                    </div>

                </div>

            </div>

        </div>

        <!-- RIGHT REGISTER FORM -->

        <div class="col-lg-7">

            <div class="form-side">

                <div class="form-top">
                    <span class="form-top-label">
                        <i class="bi bi-person-plus-fill me-1"></i>
                        New Member Registration
                    </span>

                    <span class="secure-label">
                        <i class="bi bi-shield-check"></i>
                        Secure Form
                    </span>
                </div>

                <div class="form-title">

                    <h2>Create Account</h2>

                    <p>
                        Join ProductLife and manage everything in one place.
                    </p>

                </div>

                <!-- ALERTS -->

                @if(session('success'))

                    <div class="alert alert-success">
                        <i class="bi bi-check-circle me-1"></i>
                        {{ session('success') }}
                    </div>

                @elseif(session('failed'))

                    <div class="alert alert-danger">
                        <i class="bi bi-exclamation-circle me-1"></i>
                        {{ session('failed') }}
                    </div>

                @endif

                <!-- REGISTER FORM -->

                <form
                    action="{{ route('register.store') }}"
                    method="POST"
                    enctype="multipart/form-data"
                    novalidate
                >

                    @csrf

                    <div class="row">

                        <!-- NAME -->

                        <div class="col-md-6 field">

                            <label class="form-label">
                                FULL NAME *
                            </label>

                            <div class="input-wrapper">

                                <i class="bi bi-person"></i>

                                <input
                                    type="text"
                                    name="name"
                                    class="form-control @error('name') is-invalid @enderror"
                                    value="{{ old('name') }}"
                                    placeholder="Full name"
                                >

                            </div>

                            @error('name')
                                <div class="invalid-feedback d-block">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>

                        <!-- EMAIL -->

                        <div class="col-md-6 field">

                            <label class="form-label">
                                EMAIL *
                            </label>

                            <div class="input-wrapper">

                                <i class="bi bi-envelope"></i>

                                <input
                                    type="email"
                                    name="email"
                                    class="form-control @error('email') is-invalid @enderror"
                                    value="{{ old('email') }}"
                                    placeholder="Email address"
                                >

                            </div>

                            @error('email')
                                <div class="invalid-feedback d-block">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>

                        <!-- PHONE -->

                        <div class="col-md-6 field">

                            <label class="form-label">
                                PHONE *
                            </label>

                            <div class="input-wrapper">

                                <i class="bi bi-telephone"></i>

                                <input
                                    type="text"
                                    name="phone"
                                    class="form-control @error('phone') is-invalid @enderror"
                                    value="{{ old('phone') }}"
                                    placeholder="Phone number"
                                >

                            </div>

                            @error('phone')
                                <div class="invalid-feedback d-block">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>

                        <!-- DATE OF BIRTH -->

                        <div class="col-md-6 field">

                            <label class="form-label">
                                DATE OF BIRTH *
                            </label>

                            <div class="input-wrapper">

                                <i class="bi bi-calendar3"></i>

                                <input
                                    type="date"
                                    name="dob"
                                    class="form-control @error('dob') is-invalid @enderror"
                                    value="{{ old('dob') }}"
                                >

                            </div>

                            @error('dob')
                                <div class="invalid-feedback d-block">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>

                        <!-- PROFILE IMAGE -->

                        <div class="col-md-6 field">

                            <label class="form-label">
                                PROFILE IMAGE
                            </label>

                            <input
                                type="file"
                                name="image"
                                class="form-control @error('image') is-invalid @enderror"
                            >

                            @error('image')
                                <div class="invalid-feedback d-block">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>

                        <!-- PASSWORD -->

                        <div class="col-md-6 field">

                            <label class="form-label">
                                PASSWORD *
                            </label>

                            <div class="input-wrapper">

                                <i class="bi bi-lock"></i>

                                <input
                                    type="password"
                                    name="password"
                                    class="form-control @error('password') is-invalid @enderror"
                                    placeholder="Minimum 6 characters"
                                >

                            </div>

                            @error('password')
                                <div class="invalid-feedback d-block">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>

                        <!-- ADDRESS -->

                        <div class="col-12 field">

                            <label class="form-label">
                                ADDRESS *
                            </label>

                            <textarea
                                name="address"
                                class="form-control @error('address') is-invalid @enderror"
                                placeholder="Enter your address"
                            >{{ old('address') }}</textarea>

                            @error('address')
                                <div class="invalid-feedback d-block">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>

                    </div>

                    <!-- SUBMIT BUTTON -->

                    <button type="submit" class="register-btn">
                        Create Account
                        <i class="bi bi-arrow-right ms-2"></i>
                    </button>

                </form>

                <!-- LOGIN LINK -->

                <div class="login-text">

                    Already have an account?

                    <a href="{{ route('login') }}">
                        Sign In
                        <i class="bi bi-arrow-right"></i>
                    </a>

                </div>

            </div>

        </div>

    </div>

</div>

</body>
</html>
