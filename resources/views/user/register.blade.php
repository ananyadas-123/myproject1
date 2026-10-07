<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Register - ProductLife</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
          rel="stylesheet">

    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>

    * {
        box-sizing: border-box;
    }

    body {
        margin: 0;
        min-height: 100vh;

        font-family: 'Inter', sans-serif;
        color: #0b2947;

        background:
            radial-gradient(
                circle at 10% 10%,
                rgba(55, 210, 150, .16),
                transparent 30%
            ),
            radial-gradient(
                circle at 90% 90%,
                rgba(91, 204, 255, .16),
                transparent 32%
            ),
            linear-gradient(
                135deg,
                #f8fffd,
                #eef9ff
            );

        display: flex;
        align-items: center;
        justify-content: center;

        padding: 35px 20px;
    }


    /* =========================
       MAIN CARD
    ========================= */

    .register-card {
        width: 100%;
        max-width: 1080px;

        background: rgba(255, 255, 255, .97);

        border-radius: 30px;
        overflow: hidden;

        border: 1px solid rgba(255, 255, 255, .9);

        box-shadow:
            0 35px 90px rgba(15, 54, 80, .14),
            0 10px 30px rgba(10, 166, 109, .07);

        position: relative;
    }


    /* =========================
       LEFT BRAND AREA
    ========================= */

    .brand-side {
        min-height: 650px;
        height: 100%;

        padding: 55px 50px;

        color: white;

        display: flex;
        flex-direction: column;
        justify-content: center;

        position: relative;
        overflow: hidden;

        background:
            radial-gradient(
                circle at 85% 15%,
                rgba(116, 255, 190, .20),
                transparent 25%
            ),
            linear-gradient(
                145deg,
                #063f32,
                #087b52 55%,
                #09a66c
            );
    }


    /* Decorative circle */

    .brand-side::before {
        content: "";

        position: absolute;

        width: 260px;
        height: 260px;

        border-radius: 50%;

        right: -100px;
        top: -90px;

        border: 38px solid rgba(255, 255, 255, .06);
    }


    .brand-side::after {
        content: "";

        position: absolute;

        width: 190px;
        height: 190px;

        border-radius: 50%;

        left: -105px;
        bottom: -85px;

        background: rgba(255, 255, 255, .05);
    }


    .brand-content {
        position: relative;
        z-index: 2;
    }


    /* =========================
       LOGO
    ========================= */

    .brand-logo {
        display: flex;
        align-items: center;

        margin-bottom: 60px;
    }


    .brand-logo img {
        width: 190px;
        height: auto;

        max-height: 62px;

        object-fit: contain;
        object-position: left center;

        background: white;

        padding: 8px 14px;

        border-radius: 13px;

        box-shadow:
            0 10px 28px rgba(0, 0, 0, .12);
    }


    /* =========================
       BRAND TITLE
    ========================= */

    .brand-side h1 {
        font-size: 50px;

        line-height: 1.08;

        font-weight: 800;

        letter-spacing: -1.8px;

        margin: 0 0 20px;
    }


    .brand-side h1 span {
        color: #79f0b2;
    }


    .brand-description {
        max-width: 440px;

        color: rgba(255, 255, 255, .80);

        font-size: 16px;

        line-height: 1.8;

        margin: 0 0 36px;
    }


    /* =========================
       FEATURES
    ========================= */

    .feature-list {
        display: flex;
        flex-direction: column;

        gap: 14px;
    }


    .mini-feature {
        display: flex;
        align-items: center;

        color: rgba(255, 255, 255, .96);

        font-size: 15px;

        font-weight: 500;
    }


    .mini-feature-icon {
        width: 36px;
        height: 36px;

        flex-shrink: 0;

        border-radius: 10px;

        background: rgba(255, 255, 255, .12);

        display: flex;
        align-items: center;
        justify-content: center;

        margin-right: 13px;

        color: #7ff2b6;

        font-size: 17px;
    }


    /* =========================
       RIGHT FORM AREA
    ========================= */

    .form-side {
        min-height: 650px;

        padding: 55px 55px;

        background: #ffffff;

        display: flex;
        flex-direction: column;
        justify-content: center;
    }


    /* =========================
       FORM TITLE
    ========================= */

    .form-title {
        margin-bottom: 28px;
    }


    .form-title h2 {
        margin: 0 0 10px;

        color: #0b2947;

        font-size: 37px;

        line-height: 1.2;

        font-weight: 800;

        letter-spacing: -.9px;
    }


    .form-title p {
        margin: 0;

        color: #71839a;

        font-size: 14px;

        line-height: 1.7;
    }


    /* =========================
       ALERT
    ========================= */

    .alert {
        border: none;

        border-radius: 12px;

        font-size: 13px;

        padding: 12px 14px;

        margin-bottom: 20px;
    }


    /* =========================
       FORM
    ========================= */

    .field {
        margin-bottom: 18px;
    }


    .form-label {
        display: block;

        color: #50647b;

        font-size: 12px;

        font-weight: 800;

        letter-spacing: .5px;

        margin-bottom: 8px;
    }


    /* =========================
       INPUT WRAPPER
    ========================= */

    .input-wrapper {
        position: relative;
    }


    .input-wrapper i {
        position: absolute;

        left: 16px;
        top: 50%;

        transform: translateY(-50%);

        color: #8ba0b4;

        font-size: 17px;

        pointer-events: none;

        z-index: 2;
    }


    /* =========================
       INPUT
    ========================= */

    .form-control {
        width: 100%;

        height: 50px;

        border-radius: 12px;

        border: 1px solid #dfe8ee;

        background: #f8fbfd;

        color: #193653;

        font-size: 14px;

        padding: 11px 14px;

        transition: all .2s ease;
    }


    .input-wrapper .form-control {
        padding-left: 46px;
    }


    .form-control::placeholder {
        color: #a4b1bf;
    }


    .form-control:focus {
        background: #ffffff;

        border-color: #0eae72;

        box-shadow:
            0 0 0 4px rgba(14, 174, 114, .09);
    }


    /* =========================
       TEXTAREA
    ========================= */

    textarea.form-control {
        height: 80px;

        resize: none;

        padding: 13px 14px !important;

        line-height: 1.5;
    }


    /* =========================
       FILE INPUT
    ========================= */

    input[type="file"].form-control {
        height: 50px;

        padding: 12px 14px;

        cursor: pointer;

        font-size: 13px;
    }


    /* =========================
       REGISTER BUTTON
    ========================= */

    .register-btn {
        width: 100%;

        height: 54px;

        border: none;

        border-radius: 13px;

        margin-top: 5px;

        background:
            linear-gradient(
                135deg,
                #08a66c,
                #07945f
            );

        color: white;

        font-size: 15px;

        font-weight: 800;

        letter-spacing: .1px;

        box-shadow:
            0 10px 25px rgba(8, 166, 108, .20);

        transition: all .25s ease;

        cursor: pointer;
    }


    .register-btn:hover {
        transform: translateY(-2px);

        box-shadow:
            0 14px 30px rgba(8, 166, 108, .28);
    }


    /* =========================
       LOGIN LINK
    ========================= */

    .login-text {
        text-align: center;

        margin-top: 22px;

        padding-top: 20px;

        border-top: 1px solid #e8eef2;

        color: #8291a1;

        font-size: 13px;
    }


    .login-text a {
        color: #08a66c;

        font-weight: 800;

        text-decoration: none;

        margin-left: 4px;
    }


    .login-text a:hover {
        text-decoration: underline;
    }


    /* =========================
       INVALID MESSAGE
    ========================= */

    .invalid-feedback {
        font-size: 12px;

        margin-top: 6px;
    }


    /* =========================
       TABLET
    ========================= */

    @media (max-width: 991px) {

        body {
            padding: 25px 16px;
        }


        .register-card {
            max-width: 850px;
        }


        .brand-side {
            min-height: 560px;

            padding: 45px 38px;
        }


        .brand-logo {
            margin-bottom: 45px;
        }


        .brand-logo img {
            width: 170px;
        }


        .brand-side h1 {
            font-size: 42px;
        }


        .brand-description {
            font-size: 15px;
        }


        .form-side {
            min-height: 560px;

            padding: 45px 38px;
        }


        .form-title h2 {
            font-size: 33px;
        }
    }


    /* =========================
       MOBILE
    ========================= */

    @media (max-width: 767px) {

        body {
            padding: 15px;
        }


        .register-card {
            border-radius: 22px;
        }


        .brand-side {
            min-height: auto;

            padding: 38px 28px;
        }


        .brand-logo {
            margin-bottom: 38px;
        }


        .brand-logo img {
            width: 160px;
        }


        .brand-side h1 {
            font-size: 36px;

            letter-spacing: -1px;
        }


        .brand-description {
            font-size: 14px;

            line-height: 1.7;
        }


        .mini-feature {
            font-size: 14px;
        }


        .mini-feature-icon {
            width: 34px;
            height: 34px;

            font-size: 16px;
        }


        .form-side {
            min-height: auto;

            padding: 38px 25px;
        }


        .form-title {
            margin-bottom: 27px;
        }


        .form-title h2 {
            font-size: 30px;
        }


        .form-title p {
            font-size: 13px;
        }


        .form-label {
            font-size: 11px;
        }


        .form-control {
            height: 50px;

            font-size: 14px;
        }


        textarea.form-control {
            height: 80px;
        }


        input[type="file"].form-control {
            font-size: 12px;
        }


        .register-btn {
            height: 52px;

            font-size: 14px;
        }


        .login-text {
            font-size: 12px;
        }
    }


    /* =========================
       SMALL MOBILE
    ========================= */

    @media (max-width: 400px) {

        .brand-side {
            padding: 32px 22px;
        }


        .brand-side h1 {
            font-size: 32px;
        }


        .brand-description {
            font-size: 13px;
        }


        .form-side {
            padding: 32px 20px;
        }


        .form-title h2 {
            font-size: 28px;
        }


        .form-control {
            font-size: 13px;
        }
    }

</style>

</head>


<body>


<div class="register-card">

    <div class="row g-0">


        <!-- =========================
             LEFT SIDE
        ========================== -->

        <div class="col-lg-5">

            <div class="brand-side">

                <div class="brand-content">


                    <!-- LOGO -->

                    <div class="brand-logo">

                        <img
                            src="{{ asset('images/logo.png') }}"
                            alt="ProductLife Logo"
                        >

                    </div>


                    <!-- TITLE -->

                    <h1>

                        Manage Your

                        <span>
                            Product Life.
                        </span>

                    </h1>


                    <!-- DESCRIPTION -->

                    <p class="brand-description">

                        One smart platform to manage your products,
                        warranty, maintenance, repairs and complete
                        product lifecycle.

                    </p>


                    <!-- FEATURES -->

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

                </div>

            </div>

        </div>



        <!-- =========================
             RIGHT SIDE
        ========================== -->

        <div class="col-lg-7">

            <div class="form-side">


                <!-- TITLE -->

                <div class="form-title">

                    <h2>
                        Create Account
                    </h2>

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



                <!-- FORM -->

                <form
                    action="{{ route('register.store') }}"
                    method="POST"
                    enctype="multipart/form-data"
                    novalidate>

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



                        <!-- DOB -->

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



                    <!-- BUTTON -->

                    <button
                        type="submit"
                        class="register-btn"
                    >

                        Create Account

                        <i class="bi bi-arrow-right ms-2"></i>

                    </button>

                </form>



                <!-- LOGIN -->

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