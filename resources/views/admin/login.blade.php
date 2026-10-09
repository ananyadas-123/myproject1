<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Admin Login - ProductLife</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
    >

    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
        rel="stylesheet"
    >

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            min-height: 100vh;
            font-family: 'Inter', sans-serif;
            background:
                radial-gradient(
                    circle at top left,
                    #dcfce7 0%,
                    transparent 32%
                ),
                radial-gradient(
                    circle at bottom right,
                    #dbeafe 0%,
                    transparent 35%
                ),
                #f8fafc;

            display: flex;
            align-items: center;
            justify-content: center;
            padding: 25px;
        }

        .admin-login-wrapper {
            width: 100%;
            max-width: 1050px;
        }

        .admin-card {
            background: #ffffff;
            border-radius: 30px;
            overflow: hidden;

            box-shadow:
                0 25px 70px rgba(15, 23, 42, 0.12);

            display: flex;
            min-height: 610px;
        }

        /* LEFT SIDE */

        .admin-brand-side {
            width: 48%;
            padding: 60px 55px;

            background:
                linear-gradient(
                    145deg,
                    #0f5132,
                    #176b4d 55%,
                    #0b3d2b
                );

            color: #ffffff;

            display: flex;
            flex-direction: column;
            justify-content: center;

            position: relative;
            overflow: hidden;
        }

        .admin-brand-side::before {
            content: "";
            position: absolute;

            width: 280px;
            height: 280px;

            border-radius: 50%;

            background: rgba(255,255,255,0.06);

            top: -90px;
            right: -90px;
        }

        .admin-brand-side::after {
            content: "";
            position: absolute;

            width: 220px;
            height: 220px;

            border-radius: 50%;

            background: rgba(255,255,255,0.04);

            bottom: -100px;
            left: -70px;
        }

        .brand-content {
            position: relative;
            z-index: 2;
        }

        .brand-logo {
            width: 190px;
            height: auto;
            margin-bottom: 38px;

            
        }

        .admin-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;

            width: fit-content;

            padding: 8px 13px;

            border-radius: 30px;

            background: rgba(255,255,255,0.12);

            border: 1px solid rgba(255,255,255,0.18);

            font-size: 11px;
            font-weight: 800;

            letter-spacing: 0.8px;
            text-transform: uppercase;

            margin-bottom: 22px;
        }

        .admin-brand-side h1 {
            font-size: 43px;
            line-height: 1.12;
            font-weight: 800;

            margin-bottom: 20px;
        }

        .admin-brand-side p {
            font-size: 15px;
            line-height: 1.8;

            color: rgba(255,255,255,0.82);

            max-width: 430px;

            margin-bottom: 30px;
        }

        .admin-feature {
            display: flex;
            align-items: center;

            gap: 12px;

            margin-bottom: 15px;

            font-size: 14px;
            font-weight: 600;
        }

        .admin-feature i {
            width: 30px;
            height: 30px;

            display: flex;
            align-items: center;
            justify-content: center;

            border-radius: 9px;

            background: rgba(255,255,255,0.12);

            font-size: 14px;
        }

        /* RIGHT SIDE */

        .admin-form-side {
            width: 52%;
            padding: 65px 60px;

            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .form-heading {
            margin-bottom: 32px;
        }

        .form-heading .small-title {
            color: #16a34a;

            font-size: 12px;
            font-weight: 800;

            text-transform: uppercase;
            letter-spacing: 1px;

            margin-bottom: 9px;
        }

        .form-heading h2 {
            margin: 0 0 10px;

            color: #0f172a;

            font-size: 36px;
            font-weight: 800;
        }

        .form-heading p {
            margin: 0;

            color: #64748b;

            font-size: 14px;
            line-height: 1.7;
        }

        .alert {
            border: none;
            border-radius: 12px;

            font-size: 13px;
            margin-bottom: 20px;
        }

        .form-label {
            color: #334155;

            font-size: 12px;
            font-weight: 800;

            margin-bottom: 8px;
        }

        .input-group-custom {
            position: relative;
        }

        .input-group-custom > i {
            position: absolute;

            left: 16px;
            top: 50%;

            transform: translateY(-50%);

            color: #94a3b8;

            font-size: 17px;

            z-index: 3;
        }

        .form-control {
            height: 54px;

            border: 1px solid #e2e8f0;

            border-radius: 13px;

            padding-left: 48px;
            padding-right: 15px;

            color: #0f172a;

            font-size: 14px;

            background: #f8fafc;

            transition: .2s ease;
        }

        .form-control:focus {
            background: #ffffff;

            border-color: #22c55e;

            box-shadow:
                0 0 0 4px rgba(34,197,94,0.10);
        }

        .password-wrap {
            position: relative;
        }

        .password-toggle {
            position: absolute;

            right: 15px;
            top: 50%;

            transform: translateY(-50%);

            border: none;
            background: transparent;

            color: #64748b;

            cursor: pointer;

            font-size: 17px;

            z-index: 5;
        }

        .login-btn {
            width: 100%;
            height: 54px;

            border: none;
            border-radius: 13px;

            background: #176b4d;
            color: #ffffff;

            font-size: 15px;
            font-weight: 800;

            display: flex;
            align-items: center;
            justify-content: center;

            gap: 9px;

            transition: .2s ease;

            box-shadow:
                0 10px 22px rgba(23,107,77,0.20);
        }

        .login-btn:hover {
            background: #12583e;

            transform: translateY(-1px);
        }

        .security-note {
            margin-top: 24px;

            display: flex;
            align-items: center;
            justify-content: center;

            gap: 7px;

            color: #94a3b8;

            font-size: 11px;
            font-weight: 600;
        }

        .back-link {
            display: flex;
            align-items: center;
            justify-content: center;

            gap: 6px;

            margin-top: 18px;

            color: #64748b;

            font-size: 12px;
            font-weight: 700;

            text-decoration: none;
        }

        .back-link:hover {
            color: #176b4d;
        }

        @media (max-width: 900px) {

            .admin-card {
                flex-direction: column;
            }

            .admin-brand-side,
            .admin-form-side {
                width: 100%;
            }

            .admin-brand-side {
                min-height: auto;
                padding: 45px 35px;
            }

            .admin-form-side {
                padding: 45px 35px;
            }

            .admin-brand-side h1 {
                font-size: 34px;
            }
        }

        @media (max-width: 576px) {

            body {
                padding: 12px;
            }

            .admin-card {
                border-radius: 22px;
            }

            .admin-brand-side {
                padding: 35px 25px;
            }

            .admin-form-side {
                padding: 35px 25px;
            }

            .brand-logo {
                width: 155px;
            }

            .admin-brand-side h1 {
                font-size: 30px;
            }

            .form-heading h2 {
                font-size: 30px;
            }
        }
    </style>
</head>

<body>

<div class="admin-login-wrapper">

    <div class="admin-card">

        {{-- LEFT SIDE --}}
        <div class="admin-brand-side">

            <div class="brand-content">

                <img
                src="{{ asset('images/logo.png') }}"
                alt="ProductLife Logo"
                class="brand-logo"
                onerror="this.style.display='none';"
            >

                <div class="admin-badge">
                    <i class="bi bi-shield-lock-fill"></i>
                    Admin Portal
                </div>

                <h1>
                    ProductLife<br>
                    Administration
                </h1>

                <p>
                    Manage users, products, technicians, repair requests
                    and the complete product lifecycle from one secure
                    administration panel.
                </p>

                <div class="admin-feature">
                    <i class="bi bi-people"></i>
                    <span>User Management</span>
                </div>

                <div class="admin-feature">
                    <i class="bi bi-box-seam"></i>
                    <span>Product Management</span>
                </div>

                <div class="admin-feature">
                    <i class="bi bi-tools"></i>
                    <span>Technician & Repair Management</span>
                </div>

            </div>

        </div>


        {{-- RIGHT SIDE --}}
        <div class="admin-form-side">

            <div class="form-heading">

                <div class="small-title">
                    Secure Access
                </div>

                <h2>
                    Admin Login
                </h2>

                <p>
                    Sign in to access your ProductLife administration
                    dashboard.
                </p>

            </div>


            @if ($errors->any())

                <div class="alert alert-danger">

                    <i class="bi bi-exclamation-circle me-1"></i>

                    {{ $errors->first() }}

                </div>

            @endif


            <form
                action="{{ route('admin.login.check') }}"
                method="POST"
            >

                @csrf


                {{-- EMAIL --}}
                <div class="mb-4">

                    <label class="form-label">
                        ADMIN EMAIL
                    </label>

                    <div class="input-group-custom">

                        <i class="bi bi-envelope"></i>

                        <input
                            type="email"
                            name="email"
                            class="form-control"
                            placeholder="Enter admin email"
                            value="{{ old('email') }}"
                            required
                        >

                    </div>

                </div>


                {{-- PASSWORD --}}
                <div class="mb-4">

                    <label class="form-label">
                        PASSWORD
                    </label>

                    <div class="input-group-custom password-wrap">

                        <i class="bi bi-lock"></i>

                        <input
                            type="password"
                            name="password"
                            id="adminPassword"
                            class="form-control"
                            placeholder="Enter password"
                            required
                        >

                        <button
                            type="button"
                            class="password-toggle"
                            onclick="togglePassword()"
                        >
                            <i
                                class="bi bi-eye"
                                id="passwordIcon"
                            ></i>
                        </button>

                    </div>

                </div>


                <button
                    type="submit"
                    class="login-btn"
                >
                    <i class="bi bi-box-arrow-in-right"></i>

                    Sign In to Admin Panel
                </button>

            </form>


            <div class="security-note">

                <i class="bi bi-shield-check"></i>

                Protected admin access

            </div>


            <a
                href="{{ route('login') }}"
                class="back-link"
            >
                <i class="bi bi-arrow-left"></i>
                Back to User Login
            </a>

        </div>

    </div>

</div>


<script>

function togglePassword() {

    const password =
        document.getElementById('adminPassword');

    const icon =
        document.getElementById('passwordIcon');

    if (password.type === 'password') {

        password.type = 'text';

        icon.classList.remove('bi-eye');

        icon.classList.add('bi-eye-slash');

    } else {

        password.type = 'password';

        icon.classList.remove('bi-eye-slash');

        icon.classList.add('bi-eye');

    }
}

</script>

</body>
</html>