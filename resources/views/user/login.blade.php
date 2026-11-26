
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login - ProductLife</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        :root {
            --navy: #111936;
            --navy-light: #202c55;
            --purple: #7138e8;
            --blue: #2878f0;
            --cyan: #13b8d5;
            --green: #0eaa78;
            --text: #17223d;
            --muted: #758199;
            --border: #e4e8f1;
        }

        * {
            box-sizing: border-box;
        }

        body {
            min-height: 100vh;
            margin: 0;
            padding: 35px 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Inter', sans-serif;
            background:
                radial-gradient(circle at 10% 15%, rgba(113,56,232,.15), transparent 28%),
                radial-gradient(circle at 90% 85%, rgba(19,184,213,.15), transparent 30%),
                linear-gradient(135deg, #f4f5ff, #edf6ff);
        }

        .login-card {
            width: 100%;
            max-width: 1120px;
            background: #fff;
            border-radius: 26px;
            overflow: hidden;
            border: 1px solid rgba(255,255,255,.9);
            box-shadow: 0 30px 85px rgba(25,35,80,.15);
        }

        /* LEFT BRAND PANEL */

        .brand-side {
            height: 100%;
            min-height: 680px;
            padding: 55px 48px;
            display: flex;
            align-items: center;
            position: relative;
            overflow: hidden;
            color: white;
            background:
                radial-gradient(circle at 90% 10%, rgba(90,160,255,.28), transparent 30%),
                radial-gradient(circle at 5% 95%, rgba(19,184,213,.2), transparent 35%),
                linear-gradient(145deg, #10172f, #22285d 58%, #5425a9);
        }

        .brand-side::before,
        .brand-side::after {
            content: "";
            position: absolute;
            border: 1px solid rgba(255,255,255,.10);
            border-radius: 50%;
            pointer-events: none;
        }

        .brand-side::before {
            width: 350px;
            height: 350px;
            top: -150px;
            right: -150px;
        }

        .brand-side::after {
            width: 270px;
            height: 270px;
            bottom: -130px;
            left: -130px;
        }

        .brand-content {
            width: 100%;
            position: relative;
            z-index: 2;
        }

        .brand-logo {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 9px 15px;
            margin-bottom: 65px;
            background: white;
            border-radius: 13px;
            box-shadow: 0 10px 30px rgba(0,0,0,.18);
        }

        .brand-logo img {
            width: 175px;
            max-height: 55px;
            object-fit: contain;
        }

        .brand-tag {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 9px 14px;
            border: 1px solid rgba(255,255,255,.18);
            background: rgba(255,255,255,.10);
            border-radius: 30px;
            color: #d5caff;
            font-size: 10px;
            font-weight: 800;
            letter-spacing: 1px;
            text-transform: uppercase;
            margin-bottom: 22px;
        }

        .brand-tag i {
            color: #68e5b4;
            font-size: 14px;
        }

        .brand-side h1 {
            font-size: 49px;
            line-height: 1.12;
            font-weight: 900;
            letter-spacing: -2px;
            margin: 0 0 20px;
        }

        .brand-side h1 span {
            display: block;
            background: linear-gradient(90deg, #a997ff, #55c9ff, #6ce4bd);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }

        .brand-description {
            max-width: 410px;
            color: #c2cbe0;
            font-size: 14px;
            line-height: 1.9;
            margin-bottom: 35px;
        }

        .feature-list {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .mini-feature {
            display: flex;
            align-items: center;
            gap: 13px;
            color: #f3f4ff;
            font-size: 13px;
            font-weight: 700;
        }

        .mini-feature-icon {
            width: 39px;
            height: 39px;
            flex-shrink: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 11px;
            background: rgba(255,255,255,.12);
            border: 1px solid rgba(255,255,255,.12);
            color: #86e8d0;
            font-size: 17px;
        }

        .brand-bottom {
            display: flex;
            align-items: center;
            gap: 9px;
            margin-top: 45px;
            color: #aebbd6;
            font-size: 11px;
            font-weight: 600;
        }

        .brand-bottom i {
            color: #6ce4bd;
            font-size: 15px;
        }

        /* RIGHT LOGIN PANEL */

        .login-side {
            min-height: 680px;
            padding: 55px 60px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            background: #fff;
        }

        .top-home {
            display: flex;
            justify-content: flex-end;
            margin-bottom: 45px;
        }

        .home-link {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            color: #6d7890;
            font-size: 12px;
            font-weight: 800;
            text-decoration: none;
            transition: .25s;
        }

        .home-link:hover {
            color: var(--purple);
        }

        .form-title {
            margin-bottom: 30px;
        }

        .form-icon {
            width: 53px;
            height: 53px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 15px;
            background: linear-gradient(135deg, #eee9ff, #e5f1ff);
            color: var(--purple);
            font-size: 23px;
            margin-bottom: 22px;
        }

        .form-title h2 {
            color: var(--navy);
            font-size: 36px;
            line-height: 1.2;
            font-weight: 900;
            letter-spacing: -1.2px;
            margin: 0 0 10px;
        }

        .form-title p {
            color: var(--muted);
            font-size: 13px;
            line-height: 1.8;
            margin: 0;
        }

        /* ALERTS */

        .alert {
            border: none;
            border-radius: 12px;
            padding: 13px 15px;
            font-size: 12px;
            font-weight: 600;
            margin-bottom: 20px;
        }

        .alert-success {
            color: #08734f;
            background: #e2f8ef;
        }

        .alert-danger {
            color: #b42335;
            background: #fff0f1;
        }

        /* FORM */

        .field {
            margin-bottom: 22px;
        }

        .form-label {
            display: block;
            color: #35435e;
            font-size: 11px;
            font-weight: 900;
            letter-spacing: .7px;
            margin-bottom: 9px;
        }

        .input-wrapper {
            position: relative;
        }

        .input-wrapper > i {
            position: absolute;
            top: 50%;
            left: 16px;
            transform: translateY(-50%);
            color: #8290a9;
            font-size: 17px;
            pointer-events: none;
            z-index: 2;
        }

        .form-control {
            width: 100%;
            height: 55px;
            border-radius: 12px;
            border: 1px solid #dfe4ef;
            background: #f8f9fd;
            color: var(--text);
            font-size: 13px;
            font-weight: 600;
            padding: 12px 46px;
            transition: .25s;
        }

        .form-control::placeholder {
            color: #a3adbf;
            font-weight: 400;
        }

        .form-control:focus {
            background: white;
            border-color: var(--purple);
            box-shadow: 0 0 0 4px rgba(113,56,232,.10);
        }

        .form-control.is-invalid {
            border-color: #dc3545;
        }

        .password-toggle {
            position: absolute;
            top: 50%;
            right: 15px;
            transform: translateY(-50%);
            border: none;
            padding: 5px;
            background: transparent;
            color: #8290a9;
            font-size: 17px;
            cursor: pointer;
            z-index: 3;
        }

        .password-toggle:hover {
            color: var(--purple);
        }

        .invalid-feedback {
            font-size: 11px;
            font-weight: 600;
            margin-top: 7px;
        }

        /* REMEMBER */

        .remember {
            margin: 0 0 25px;
            color: #68758d;
            font-size: 12px;
            font-weight: 600;
        }

        .remember .form-check-input {
            width: 17px;
            height: 17px;
            margin-top: 1px;
            border-color: #c8cfdf;
            cursor: pointer;
        }

        .remember .form-check-input:checked {
            background-color: var(--purple);
            border-color: var(--purple);
        }

        .remember .form-check-input:focus {
            box-shadow: 0 0 0 3px rgba(113,56,232,.12);
        }

        .remember label {
            margin-left: 5px;
            cursor: pointer;
        }

        /* LOGIN BUTTON */

        .login-btn {
            width: 100%;
            height: 55px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            border: none;
            border-radius: 12px;
            background: linear-gradient(110deg, var(--purple), var(--blue));
            color: white;
            font-size: 14px;
            font-weight: 900;
            box-shadow: 0 10px 23px rgba(91,65,205,.24);
            transition: .3s;
            cursor: pointer;
        }

        .login-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 30px rgba(91,65,205,.34);
        }

        .login-btn i {
            font-size: 17px;
        }

        /* REGISTER */

        .register-text {
            text-align: center;
            margin-top: 26px;
            padding-top: 23px;
            border-top: 1px solid #edf0f6;
            color: #7c879d;
            font-size: 12px;
            font-weight: 600;
        }

        .register-text a {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            color: var(--purple);
            font-weight: 900;
            text-decoration: none;
            margin-left: 4px;
            transition: .25s;
        }

        .register-text a:hover {
            color: var(--blue);
        }

        .secure-note {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 7px;
            margin-top: 23px;
            color: #929db1;
            font-size: 10px;
            font-weight: 600;
        }

        .secure-note i {
            color: var(--green);
            font-size: 13px;
        }

        /* RESPONSIVE */

        @media (max-width: 991px) {
            body {
                padding: 25px 15px;
            }

            .login-card {
                max-width: 820px;
            }

            .brand-side {
                min-height: 620px;
                padding: 40px 30px;
            }

            .brand-logo {
                margin-bottom: 48px;
            }

            .brand-side h1 {
                font-size: 39px;
            }

            .login-side {
                min-height: 620px;
                padding: 40px 32px;
            }

            .form-title h2 {
                font-size: 32px;
            }
        }

        @media (max-width: 767px) {
            body {
                padding: 15px;
                align-items: flex-start;
            }

            .login-card {
                border-radius: 20px;
            }

            .brand-side {
                min-height: auto;
                padding: 38px 28px;
            }

            .brand-logo {
                margin-bottom: 35px;
            }

            .brand-logo img {
                width: 145px;
            }

            .brand-side h1 {
                font-size: 36px;
            }

            .brand-description {
                font-size: 13px;
                margin-bottom: 25px;
            }

            .feature-list {
                gap: 11px;
            }

            .mini-feature {
                font-size: 12px;
            }

            .brand-bottom {
                margin-top: 27px;
            }

            .login-side {
                min-height: auto;
                padding: 35px 26px;
            }

            .top-home {
                margin-bottom: 28px;
            }

            .form-title h2 {
                font-size: 31px;
            }

            .form-title {
                margin-bottom: 25px;
            }
        }

        @media (max-width: 400px) {
            .brand-side {
                padding: 30px 21px;
            }

            .brand-side h1 {
                font-size: 31px;
            }

            .login-side {
                padding: 30px 20px;
            }

            .form-title h2 {
                font-size: 28px;
            }

            .form-control,
            .login-btn {
                height: 51px;
            }
        }
    </style>
</head>

<body>

<div class="login-card">

    <div class="row g-0">

        <!-- LEFT BRAND SIDE -->

        <div class="col-lg-5">

            <div class="brand-side">

                <div class="brand-content">

                    <a href="{{ route('home') }}" class="brand-logo">
                        <img src="{{ asset('images/logo.png') }}" alt="ProductLife Logo">
                    </a>

                    <div class="brand-tag">
                        <i class="bi bi-stars"></i>
                        Smart Product Management
                    </div>

                    <h1>
                        Welcome
                        <span>Back.</span>
                    </h1>

                    <p class="brand-description">
                        Continue managing your products, warranty,
                        maintenance, repairs and complete product
                        lifecycle with ProductLife.
                    </p>

                    <div class="feature-list">

                        <div class="mini-feature">
                            <div class="mini-feature-icon">
                                <i class="bi bi-box-seam"></i>
                            </div>
                            Manage Your Products
                        </div>

                        <div class="mini-feature">
                            <div class="mini-feature-icon">
                                <i class="bi bi-shield-check"></i>
                            </div>
                            Track Warranty
                        </div>

                        <div class="mini-feature">
                            <div class="mini-feature-icon">
                                <i class="bi bi-tools"></i>
                            </div>
                            Manage Repairs
                        </div>

                        <div class="mini-feature">
                            <div class="mini-feature-icon">
                                <i class="bi bi-qr-code-scan"></i>
                            </div>
                            Digital Product Passport
                        </div>

                    </div>

                    <div class="brand-bottom">
                        <i class="bi bi-shield-lock-fill"></i>
                        Your product information, all in one place.
                    </div>

                </div>

            </div>

        </div>


        <!-- RIGHT LOGIN SIDE -->

        <div class="col-lg-7">

            <div class="login-side">

                <div class="top-home">
                    <a href="{{ route('home') }}" class="home-link">
                        <i class="bi bi-arrow-left"></i>
                        Back to Home
                    </a>
                </div>


                <!-- FORM TITLE -->

                <div class="form-title">

                    <div class="form-icon">
                        <i class="bi bi-person-lock"></i>
                    </div>

                    <h2>Sign In</h2>

                    <p>
                        Enter your credentials to access your ProductLife account.
                    </p>

                </div>


                <!-- SESSION MESSAGES -->

                @if(session('success'))
                    <div class="alert alert-success">
                        <i class="bi bi-check-circle-fill me-2"></i>
                        {{ session('success') }}
                    </div>
                @elseif(session('failed'))
                    <div class="alert alert-danger">
                        <i class="bi bi-exclamation-circle-fill me-2"></i>
                        {{ session('failed') }}
                    </div>
                @endif


                <!-- LOGIN FORM -->

                <form action="{{ route('login.check') }}" method="POST" novalidate>

                    @csrf

                    <!-- EMAIL -->

                    <div class="field">

                        <label class="form-label" for="email">
                            EMAIL ADDRESS *
                        </label>

                        <div class="input-wrapper">

                            <i class="bi bi-envelope"></i>

                            <input
                                type="email"
                                name="email"
                                id="email"
                                class="form-control @error('email') is-invalid @enderror"
                                value="{{ old('email') }}"
                                placeholder="Enter your email"
                                autocomplete="email"
                            >

                        </div>

                        @error('email')
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>


                    <!-- PASSWORD -->

                    <div class="field">

                        <label class="form-label" for="password">
                            PASSWORD *
                        </label>

                        <div class="input-wrapper">

                            <i class="bi bi-lock"></i>

                            <input
                                type="password"
                                name="password"
                                id="password"
                                class="form-control @error('password') is-invalid @enderror"
                                placeholder="Enter your password"
                                autocomplete="current-password"
                            >

                            <button
                                type="button"
                                class="password-toggle"
                                id="togglePassword"
                                aria-label="Show password"
                            >
                                <i class="bi bi-eye"></i>
                            </button>

                        </div>

                        @error('password')
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>


                    <!-- REMEMBER -->

                    <div class="form-check remember">

                        <input
                            type="checkbox"
                            name="remember"
                            value="1"
                            class="form-check-input"
                            id="rememberCheck"
                        >

                        <label class="form-check-label" for="rememberCheck">
                            Remember this device
                        </label>

                    </div>


                    <!-- LOGIN BUTTON -->

                    <button type="submit" class="login-btn">
                        Sign In
                        <i class="bi bi-arrow-right"></i>
                    </button>

                </form>


                <!-- REGISTER -->

                <div class="register-text">

                    Don't have an account?

                    <a href="{{ route('register') }}">
                        Create Account
                        <i class="bi bi-arrow-up-right"></i>
                    </a>

                </div>


                <div class="secure-note">
                    <i class="bi bi-shield-check"></i>
                    Secure account access
                </div>

            </div>

        </div>

    </div>

</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {

        const passwordInput = document.getElementById('password');
        const toggleButton = document.getElementById('togglePassword');

        if (passwordInput && toggleButton) {

            toggleButton.addEventListener('click', function () {

                const isPassword = passwordInput.type === 'password';

                passwordInput.type = isPassword ? 'text' : 'password';

                toggleButton.innerHTML = isPassword
                    ? '<i class="bi bi-eye-slash"></i>'
                    : '<i class="bi bi-eye"></i>';

                toggleButton.setAttribute(
                    'aria-label',
                    isPassword ? 'Hide password' : 'Show password'
                );

            });

        }

    });
</script>

</body>
</html>
