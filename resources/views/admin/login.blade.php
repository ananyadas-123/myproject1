
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Admin Login - ProductLife</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            min-height: 100vh;
            font-family: 'Inter', sans-serif;
            background:
                radial-gradient(circle at 10% 10%, rgba(99,102,241,.18), transparent 32%),
                radial-gradient(circle at 90% 90%, rgba(6,182,212,.16), transparent 32%),
                #eef2ff;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 25px;
        }

        .admin-login-wrapper {
            width: 100%;
            max-width: 1080px;
        }

        .admin-card {
            background: #ffffff;
            border-radius: 26px;
            overflow: hidden;
            box-shadow: 0 25px 75px rgba(30, 41, 59, .16);
            display: flex;
            min-height: 620px;
            border: 1px solid rgba(255,255,255,.8);
        }

        /* LEFT BRAND SECTION */

        .admin-brand-side {
            width: 48%;
            padding: 58px 52px;
            background: linear-gradient(145deg, #111827 0%, #312e81 52%, #4f46e5 100%);
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
            width: 330px;
            height: 330px;
            border-radius: 50%;
            background: rgba(129,140,248,.15);
            top: -120px;
            right: -120px;
        }

        .admin-brand-side::after {
            content: "";
            position: absolute;
            width: 260px;
            height: 260px;
            border-radius: 50%;
            background: rgba(34,211,238,.10);
            bottom: -130px;
            left: -90px;
        }

        .brand-content {
            position: relative;
            z-index: 2;
        }

        .brand-logo {
            width: 190px;
            height: auto;
            max-height: 85px;
            object-fit: contain;
            object-position: left center;
            margin-bottom: 38px;
        }

        .admin-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            width: fit-content;
            padding: 9px 14px;
            border-radius: 30px;
            background: rgba(255,255,255,.12);
            border: 1px solid rgba(255,255,255,.20);
            color: #a5f3fc;
            font-size: 11px;
            font-weight: 800;
            letter-spacing: .9px;
            text-transform: uppercase;
            margin-bottom: 23px;
        }

        .admin-brand-side h1 {
            font-size: 41px;
            line-height: 1.15;
            font-weight: 800;
            letter-spacing: -1.2px;
            margin-bottom: 20px;
        }

        .admin-brand-side h1 span {
            background: linear-gradient(90deg, #67e8f9, #c4b5fd);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }

        .admin-brand-side p {
            font-size: 13px;
            line-height: 1.9;
            color: #dbeafe;
            max-width: 430px;
            margin-bottom: 30px;
        }

        .admin-feature {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 15px;
            font-size: 13px;
            font-weight: 600;
            color: #f1f5f9;
        }

        .admin-feature i {
            width: 34px;
            height: 34px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 10px;
            background: rgba(255,255,255,.12);
            border: 1px solid rgba(255,255,255,.12);
            color: #67e8f9;
            font-size: 16px;
        }

        /* RIGHT LOGIN SECTION */

        .admin-form-side {
            width: 52%;
            padding: 65px 62px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            background: #ffffff;
        }

        .form-heading {
            margin-bottom: 32px;
        }

        .form-heading .small-title {
            display: inline-block;
            color: #4f46e5;
            background: #eef2ff;
            padding: 7px 12px;
            border-radius: 7px;
            font-size: 10px;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 1.2px;
            margin-bottom: 15px;
        }

        .form-heading h2 {
            margin: 0 0 11px;
            color: #172554;
            font-size: 35px;
            font-weight: 800;
            letter-spacing: -1px;
        }

        .form-heading p {
            margin: 0;
            color: #64748b;
            font-size: 13px;
            line-height: 1.8;
        }

        /* Error alert */

        .alert {
            border: none;
            border-radius: 11px;
            font-size: 12px;
            margin-bottom: 22px;
            padding: 13px 15px;
        }

        .alert-danger {
            background: #fee2e2;
            color: #991b1b;
            border-left: 4px solid #dc2626;
        }

        /* Form fields */

        .form-label {
            color: #334155;
            font-size: 11px;
            font-weight: 800;
            letter-spacing: .5px;
            margin-bottom: 9px;
        }

        .input-group-custom {
            position: relative;
        }

        .input-group-custom > i {
            position: absolute;
            left: 16px;
            top: 50%;
            transform: translateY(-50%);
            color: #818cf8;
            font-size: 17px;
            z-index: 3;
        }

        .form-control {
            height: 54px;
            border: 1.5px solid #e2e8f0;
            border-radius: 12px;
            padding-left: 48px;
            padding-right: 45px;
            color: #172033;
            font-size: 13px;
            font-weight: 500;
            background: #f8fafc;
            transition: all .25s ease;
        }

        .form-control::placeholder {
            color: #94a3b8;
        }

        .form-control:focus {
            background: #ffffff;
            border-color: #6366f1;
            box-shadow: 0 0 0 4px rgba(99,102,241,.12);
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
            padding: 5px;
            transition: color .2s ease;
        }

        .password-toggle:hover {
            color: #4f46e5;
        }

        /* Login button */

        .login-btn {
            width: 100%;
            height: 55px;
            border: none;
            border-radius: 12px;
            background: linear-gradient(110deg, #4338ca, #6366f1, #7c3aed);
            color: #ffffff;
            font-size: 13px;
            font-weight: 800;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            transition: all .25s ease;
            box-shadow: 0 9px 22px rgba(79,70,229,.25);
            cursor: pointer;
        }

        .login-btn:hover {
            background: linear-gradient(110deg, #3730a3, #4f46e5, #6d28d9);
            transform: translateY(-3px);
            box-shadow: 0 13px 26px rgba(79,70,229,.32);
        }

        .login-btn:active {
            transform: translateY(0);
        }

        /* Security note */

        .security-note {
            margin-top: 25px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            color: #64748b;
            font-size: 11px;
            font-weight: 600;
        }

        .security-note i {
            color: #059669;
            font-size: 15px;
        }

        /* Back link */

        .back-link {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 7px;
            margin-top: 20px;
            color: #64748b;
            font-size: 12px;
            font-weight: 700;
            text-decoration: none;
            transition: color .2s ease;
        }

        .back-link:hover {
            color: #4f46e5;
        }

        /* Responsive */

        @media (max-width: 900px) {
            .admin-card {
                flex-direction: column;
            }

            .admin-brand-side,
            .admin-form-side {
                width: 100%;
            }

            .admin-brand-side {
                padding: 42px 38px;
            }

            .admin-form-side {
                padding: 45px 38px;
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
                border-radius: 19px;
            }

            .admin-brand-side {
                padding: 33px 25px;
            }

            .admin-form-side {
                padding: 35px 25px;
            }

            .brand-logo {
                width: 150px;
            }

            .admin-brand-side h1 {
                font-size: 29px;
            }

            .form-heading h2 {
                font-size: 29px;
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
                    <span>Administration</span>
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
                    <span>Technician &amp; Repair Management</span>
                </div>

            </div>

        </div>

        {{-- RIGHT SIDE --}}
        <div class="admin-form-side">

            <div class="form-heading">

                <div class="small-title">
                    <i class="bi bi-shield-check me-1"></i>
                    Secure Access
                </div>

                <h2>Admin Login</h2>

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
                            aria-label="Toggle password visibility"
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
