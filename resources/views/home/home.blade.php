<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>ProductLife | Complete Product Lifecycle & Repair Ecosystem</title>

    <meta name="description"
          content="ProductLife helps you manage your complete product lifecycle — warranty, maintenance, repair, reuse and recycling.">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
          rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: 'Inter', sans-serif;
            color: #0d2947;
            background: #ffffff;
            overflow-x: hidden;
        }

        a {
            text-decoration: none;
        }

        /* =====================================================
           NAVBAR
        ===================================================== */

        .navbar {
            height: 86px;
            background: rgba(255,255,255,.96);
            border-bottom: 1px solid #eef3f5;
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .nav-container {
            max-width: 1480px;
            margin: auto;
            padding: 0 55px;
        }

        .brand-logo {
            width: 145px;
            height: auto;
            object-fit: contain;
            display: block;
        }

        .brand-text {
            font-size: 25px;
            font-weight: 800;
            color: #0d2947;
            letter-spacing: -1px;
        }

        .brand-text span {
            color: #10a36c;
        }

        .nav-link {
            color: #385471 !important;
            font-weight: 500;
            font-size: 16px;
            margin: 0 13px;
            transition: .25s;
        }

        .nav-link:hover {
            color: #0aa66d !important;
        }

        .login-btn {
            color: #122b46;
            font-weight: 600;
            font-size: 16px;
            margin-right: 20px;
        }

        .login-btn i {
            margin-right: 6px;
        }

        .register-btn {
            background: #0aa66d;
            color: white;
            padding: 14px 28px;
            border-radius: 30px;
            font-weight: 700;
            transition: .3s;
            display: inline-block;
        }

        .register-btn:hover {
            background: #078b5c;
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 12px 25px rgba(10,166,109,.22);
        }

        /* =====================================================
           HERO
        ===================================================== */

        .hero {
            min-height: 755px;
            position: relative;
            overflow: hidden;

            background:
                radial-gradient(
                    circle at 86% 42%,
                    rgba(193,237,235,.75),
                    transparent 34%
                ),
                radial-gradient(
                    circle at 8% 85%,
                    rgba(215,247,232,.8),
                    transparent 31%
                ),
                linear-gradient(
                    120deg,
                    #ffffff 0%,
                    #f8fcfd 45%,
                    #edfafa 100%
                );
        }

        .hero-container {
        max-width: 1480px;
        margin: auto;
        padding: 48px 55px 55px;
        position: relative;
        z-index: 2;
    }

        .hero-left {
            padding-top: 20px;
        }

        .hero-badge {
            display: inline-flex;
            align-items: center;
            gap: 10px;

            background: #e8faf2;
            color: #079765;

            padding: 11px 20px;
            border-radius: 30px;

            font-size: 14px;
            font-weight: 700;

            margin-bottom: 30px;
        }

        .hero-badge i {
            font-size: 17px;
        }

        .hero-title {
            font-size: clamp(48px, 5vw, 78px);
            line-height: 1.02;
            letter-spacing: -4px;
            font-weight: 800;
            color: #092947;
            max-width: 760px;
        }

        .hero-title .green {
            color: #0ba56c;
        }

        .hero-description {
            margin-top: 30px;
            max-width: 700px;

            color: #647b94;
            font-size: 18px;
            line-height: 1.8;
        }

        .hero-buttons {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-top: 34px;
        }

        .primary-btn {
            background: #0aa66d;
            color: white;

            padding: 17px 29px;
            border-radius: 35px;

            font-size: 16px;
            font-weight: 700;

            display: inline-flex;
            align-items: center;
            gap: 14px;

            transition: .3s;
            box-shadow: 0 14px 30px rgba(10,166,109,.22);
        }

        .primary-btn:hover {
            background: #078b5c;
            color: white;
            transform: translateY(-3px);
        }

        .secondary-btn {
            background: rgba(255,255,255,.8);
            color: #102d4b;

            border: 1px solid #c9d9e2;

            padding: 16px 28px;
            border-radius: 35px;

            font-size: 16px;
            font-weight: 600;

            display: inline-flex;
            align-items: center;
            gap: 12px;

            transition: .3s;
        }

        .secondary-btn:hover {
            background: white;
            color: #0aa66d;
            border-color: #0aa66d;
        }

        /* =====================================================
           HERO BENEFITS
        ===================================================== */

        .hero-benefits {
            display: flex;
            flex-wrap: wrap;
            gap: 30px;

            margin-top: 40px;
        }

        .benefit {
            display: flex;
            align-items: center;
            gap: 9px;

            color: #4e6983;
            font-size: 14px;
            font-weight: 600;
        }

        .benefit i {
            color: #0aa66d;
            font-size: 20px;
        }

        /* =====================================================
           DASHBOARD MOCKUP
        ===================================================== */

        .dashboard-area {
            position: relative;
            padding-top: 5px;
        }

        .dashboard-wrapper {
            position: relative;
            max-width: 680px;
            margin: auto;
        }

        .dashboard-card {
            background: rgba(255,255,255,.94);
            border: 1px solid rgba(255,255,255,.95);

            border-radius: 30px;

            box-shadow:
                0 30px 80px rgba(21,73,86,.16),
                0 8px 25px rgba(21,73,86,.07);

            padding: 18px;

            transform: rotate(-1deg);

            position: relative;
            z-index: 3;
        }

        .dashboard-header {
            height: 65px;

            display: flex;
            align-items: center;
            justify-content: space-between;

            padding: 0 16px;

            border-bottom: 1px solid #edf2f3;
        }

        .dashboard-logo {
            font-size: 20px;
            font-weight: 800;
            color: #102e49;
        }

        .dashboard-logo span {
            color: #0aa66d;
        }

        .dashboard-user {
            width: 38px;
            height: 38px;

            border-radius: 50%;

            background: linear-gradient(
                135deg,
                #83e2be,
                #0aa66d
            );

            color: white;

            display: flex;
            align-items: center;
            justify-content: center;

            font-size: 12px;
            font-weight: 700;
        }

        .dashboard-content {
            display: flex;
            gap: 16px;
            padding: 18px;
        }

        .dashboard-sidebar {
            width: 145px;
            flex-shrink: 0;
        }

        .side-item {
            padding: 11px 12px;
            margin-bottom: 6px;

            border-radius: 12px;

            display: flex;
            align-items: center;
            gap: 10px;

            color: #5b7185;
            font-size: 12px;
            font-weight: 600;
        }

        .side-item i {
            font-size: 15px;
        }

        .side-item.active {
            color: #078d61;
            background: #e5f9f0;
        }

        .dashboard-main {
            flex: 1;
            min-width: 0;
        }

        .health-box {
            border-radius: 20px;

            padding: 23px;

            background:
                linear-gradient(
                    135deg,
                    #e2faf0,
                    #f4fffb
                );

            display: flex;
            align-items: center;
            justify-content: space-between;

            overflow: hidden;
        }

        .health-title {
            font-size: 15px;
            font-weight: 800;
            color: #14354e;
        }

        .health-text {
            margin-top: 7px;
            color: #668094;
            font-size: 11px;
        }

        .leaf-circle {
            width: 62px;
            height: 62px;

            flex-shrink: 0;

            border-radius: 50%;

            background: linear-gradient(
                135deg,
                #0aa66d,
                #63dba5
            );

            display: flex;
            align-items: center;
            justify-content: center;

            color: white;
            font-size: 27px;

            box-shadow:
                0 10px 25px rgba(10,166,109,.22);

            position: relative;
        }

        .leaf-circle i {
            filter: drop-shadow(0 2px 3px rgba(0,0,0,.12));
        }

        .overview-head {
            display: flex;
            justify-content: space-between;
            align-items: center;

            margin: 22px 2px 12px;
        }

        .overview-head h5 {
            font-size: 14px;
            font-weight: 800;
            margin: 0;
        }

        .view-all {
            font-size: 11px;
            color: #079765;
            font-weight: 700;
        }

        .product-box {
            background: white;

            border: 1px solid #edf2f4;
            border-radius: 18px;

            padding: 15px;

            box-shadow: 0 8px 20px rgba(25,75,80,.04);
        }

        .product-top {
            display: flex;
            align-items: center;
            gap: 13px;
        }

        .product-icon {
            width: 52px;
            height: 52px;

            border-radius: 13px;

            background: #eef7fb;

            display: flex;
            align-items: center;
            justify-content: center;

            color: #178de0;
            font-size: 25px;
        }

        .product-name {
            font-size: 13px;
            font-weight: 800;
            color: #18344d;
        }

        .product-type {
            font-size: 10px;
            color: #75889a;
            margin-top: 5px;
        }

        .active-pill {
            margin-left: auto;

            background: #e7f9ee;
            color: #079765;

            border-radius: 20px;
            padding: 6px 11px;

            font-size: 10px;
            font-weight: 700;
        }

        .status-grid {
            display: grid;
            grid-template-columns: repeat(4,1fr);
            gap: 9px;

            margin-top: 15px;
        }

        .status-card {
            background: #f8fbfc;

            border-radius: 14px;
            padding: 14px 7px;

            text-align: center;
        }

        .status-card i {
            color: #0aa66d;
            font-size: 19px;
        }

        .status-card h6 {
            font-size: 9px;
            color: #496378;
            margin: 7px 0 5px;
        }

        .status-card span {
            font-size: 8px;
            padding: 4px 7px;
            border-radius: 10px;
            background: #e7f9ee;
            color: #079765;
        }

        /* floating badges */

        .floating-badge {
            position: absolute;
            background: rgba(255,255,255,.97);

            border-radius: 20px;

            padding: 17px 24px;

            box-shadow: 0 20px 45px rgba(25,70,80,.13);

            display: flex;
            align-items: center;
            gap: 12px;

            font-size: 14px;
            color: #27445d;
            font-weight: 500;

            z-index: 5;
        }

        .floating-badge i {
            color: #0aa66d;
            font-size: 20px;
        }

        .badge-warranty {
            right: -60px;
            top: 45px;
        }

        .badge-repair {
            left: -60px;
            bottom: 55px;
        }

        /* decorative green shape */

        .hero-shape {
            position: absolute;

            width: 420px;
            height: 420px;

            right: -90px;
            top: 180px;

            border-radius: 50%;

            background:
                radial-gradient(
                    circle,
                    rgba(112,223,168,.32),
                    rgba(112,223,168,.05) 65%,
                    transparent 70%
                );

            z-index: 0;
        }

        /* =====================================================
           SECTION COMMON
        ===================================================== */

        .section {
            padding: 100px 0;
        }

        .section-label {
            display: inline-block;

            background: #e8faf2;
            color: #078f61;

            padding: 8px 16px;
            border-radius: 25px;

            font-size: 12px;
            font-weight: 800;

            margin-bottom: 16px;
        }

        .section-title {
            font-size: 43px;
            line-height: 1.15;
            font-weight: 800;
            color: #0b2946;
            letter-spacing: -1.5px;
        }

        .section-title span {
            color: #0aa66d;
        }

        .section-text {
            color: #70869a;
            line-height: 1.8;
            max-width: 650px;
        }

        /* =====================================================
           FEATURES
        ===================================================== */

        .features-section {
            background: white;
        }

        .feature-card {
            height: 100%;

            background: white;

            border: 1px solid #edf2f3;
            border-radius: 22px;

            padding: 30px;

            transition: .3s;

            box-shadow: 0 8px 30px rgba(20,70,80,.035);
        }

        .feature-card:hover {
            transform: translateY(-7px);

            border-color: #ccefe0;

            box-shadow: 0 20px 45px rgba(20,100,80,.10);
        }

        .feature-icon {
            width: 58px;
            height: 58px;

            border-radius: 17px;

            background: #e9faf2;

            color: #0aa66d;

            display: flex;
            align-items: center;
            justify-content: center;

            font-size: 25px;

            margin-bottom: 22px;
        }

        .feature-card h4 {
            font-size: 18px;
            font-weight: 800;
            color: #18344e;
        }

        .feature-card p {
            color: #75899b;
            line-height: 1.7;
            font-size: 14px;
            margin: 0;
        }

        /* =====================================================
           HOW IT WORKS
        ===================================================== */

        .how-section {
            background: #092947;
            position: relative;
            overflow: hidden;
        }

        .how-section .section-title {
            color: white;
        }

        .how-section .section-text {
            color: #a9bfce;
        }

        .step-card {
            height: 100%;

            background: rgba(255,255,255,.055);

            border: 1px solid rgba(255,255,255,.08);

            border-radius: 20px;

            padding: 27px;

            transition: .3s;
        }

        .step-card:hover {
            background: rgba(255,255,255,.09);
            transform: translateY(-5px);
        }

        .step-number {
            width: 44px;
            height: 44px;

            border-radius: 50%;

            background: #0aa66d;
            color: white;

            display: flex;
            align-items: center;
            justify-content: center;

            font-weight: 800;

            margin-bottom: 20px;
        }

        .step-card h4 {
            color: white;
            font-size: 17px;
            font-weight: 700;
        }

        .step-card p {
            color: #a8bdcb;
            font-size: 13px;
            line-height: 1.7;
            margin: 0;
        }

        /* =====================================================
           LIFECYCLE
        ===================================================== */

        .lifecycle-section {
            background: #f7fbfa;
        }

        .lifecycle-line {
            position: relative;
            margin-top: 60px;
        }

        .lifecycle-line:before {
            content: "";

            position: absolute;

            top: 38px;
            left: 8%;
            right: 8%;

            height: 2px;

            background: #ccefe0;
        }

        .life-item {
            position: relative;
            text-align: center;
            z-index: 2;
        }

        .life-icon {
            width: 76px;
            height: 76px;

            border-radius: 50%;

            margin: auto;

            background: white;

            border: 2px solid #bcebd7;

            color: #0aa66d;

            display: flex;
            align-items: center;
            justify-content: center;

            font-size: 27px;

            box-shadow: 0 10px 25px rgba(30,100,80,.07);
        }

        .life-item h5 {
            font-size: 15px;
            font-weight: 800;
            color: #17364f;
            margin-top: 18px;
        }

        .life-item p {
            font-size: 12px;
            color: #7890a0;
            padding: 0 10px;
        }

        /* =====================================================
           IMPACT
        ===================================================== */

        .impact-section {
            background: white;
        }

        .impact-box {
            background:
                linear-gradient(
                    135deg,
                    #e8faf2,
                    #f4fcfa
                );

            border-radius: 30px;

            padding: 60px;

            overflow: hidden;
        }

        .impact-number {
            font-size: 43px;
            font-weight: 800;
            color: #0aa66d;
        }

        .impact-label {
            color: #557287;
            font-size: 13px;
            font-weight: 600;
        }

        .impact-card {
            background: rgba(255,255,255,.8);
            border-radius: 20px;
            padding: 22px;
            height: 100%;
        }

        /* =====================================================
           CTA
        ===================================================== */

        .cta-section {
            padding: 90px 0;
        }

        .cta-box {
            background: #092947;
            border-radius: 30px;
            padding: 65px;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .cta-box:before {
            content: "";

            position: absolute;

            width: 350px;
            height: 350px;

            border-radius: 50%;

            background: rgba(10,166,109,.13);

            top: -180px;
            right: -100px;
        }

        .cta-box h2 {
            color: white;
            font-size: 42px;
            font-weight: 800;
            position: relative;
        }

        .cta-box p {
            color: #a9bfce;
            max-width: 650px;
            margin: 18px auto 30px;
            position: relative;
        }

        /* =====================================================
           FOOTER
        ===================================================== */

        footer {
            background: #061d32;
            color: #a8bac7;
            padding: 65px 0 25px;
        }

        .footer-brand {
            font-size: 25px;
            font-weight: 800;
            color: white;
        }

        .footer-brand span {
            color: #0aa66d;
        }

        .footer-text {
            font-size: 13px;
            line-height: 1.8;
            max-width: 330px;
            margin-top: 15px;
        }

        .footer-title {
            color: white;
            font-size: 14px;
            font-weight: 700;
            margin-bottom: 20px;
        }

        .footer-link {
            display: block;
            color: #91a8b8;
            font-size: 13px;
            margin-bottom: 11px;
            transition: .2s;
        }

        .footer-link:hover {
            color: #0aa66d;
        }

        .footer-bottom {
            border-top: 1px solid rgba(255,255,255,.07);
            margin-top: 50px;
            padding-top: 22px;
            font-size: 12px;
        }

        /* =====================================================
           RESPONSIVE
        ===================================================== */

        @media (max-width: 1200px) {

            .nav-container,
            .hero-container {
                padding-left: 30px;
                padding-right: 30px;
            }

            .hero-title {
                font-size: 57px;
            }

            .badge-warranty {
                right: -20px;
            }

            .badge-repair {
                left: -20px;
            }

        }

        @media (max-width: 991px) {

            .navbar {
                height: auto;
            }

            .nav-container {
                padding: 15px 20px;
            }

            .nav-link {
                margin: 7px 0;
            }

            .login-btn {
                display: inline-block;
                margin: 10px 0;
            }

            .hero {
                min-height: auto;
            }

            .hero-container {
                padding: 65px 25px;
            }

            .hero-left {
                text-align: center;
            }

            .hero-title {
                font-size: 52px;
                letter-spacing: -2px;
                margin-left: auto;
                margin-right: auto;
            }

            .hero-description {
                margin-left: auto;
                margin-right: auto;
            }

            .hero-buttons,
            .hero-benefits {
                justify-content: center;
            }

            .dashboard-area {
                margin-top: 65px;
            }

            .dashboard-wrapper {
                max-width: 650px;
            }

            .section {
                padding: 75px 0;
            }

        }

        @media (max-width: 767px) {

            .hero-title {
                font-size: 40px;
            }

            .hero-description {
                font-size: 15px;
            }

            .hero-buttons {
                flex-direction: column;
                align-items: stretch;
            }

            .primary-btn,
            .secondary-btn {
                justify-content: center;
            }

            .hero-benefits {
                gap: 16px;
            }

            .dashboard-content {
                padding: 10px;
            }

            .dashboard-sidebar {
                display: none;
            }

            .dashboard-card {
                padding: 10px;
            }

            .status-grid {
                grid-template-columns: repeat(2,1fr);
            }

            .floating-badge {
                display: none;
            }

            .section-title {
                font-size: 34px;
            }

            .lifecycle-line:before {
                display: none;
            }

            .life-item {
                margin-bottom: 35px;
            }

            .impact-box,
            .cta-box {
                padding: 35px 22px;
            }

            .cta-box h2 {
                font-size: 31px;
            }

        }

    </style>
</head>

<body>

<!-- =========================================================
     NAVBAR
========================================================= -->

<nav class="navbar navbar-expand-lg">

    <div class="container-fluid nav-container">

        <a href="{{ route('home') }}" class="navbar-brand">

            @if(file_exists(public_path('images/logo.png')))
                <img
                    src="{{ asset('images/logo.png') }}"
                    alt="ProductLife"
                    class="brand-logo">
            @else
                <div class="brand-text">
                    Product<span>Life</span>
                </div>
            @endif

        </a>

        <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#mainNav">

            <i class="bi bi-list"></i>

        </button>

        <div class="collapse navbar-collapse" id="mainNav">

            <ul class="navbar-nav mx-auto">

                <li class="nav-item">
                    <a class="nav-link" href="#home">Home</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#features">Features</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#how-it-works">How It Works</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#lifecycle">Lifecycle</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#about">About</a>
                </li>

            </ul>

            <div class="d-flex align-items-center">

                @auth

                    <a href="{{ route('products.index') }}"
                       class="login-btn">
                        <i class="bi bi-grid"></i>
                        My Products
                    </a>

                @else

                    <a href="{{ route('login') }}"
                       class="login-btn">
                        <i class="bi bi-person"></i>
                        Login
                    </a>

                    <a href="{{ route('register') }}"
                       class="register-btn">
                        Register
                    </a>

                @endauth

            </div>

        </div>

    </div>

</nav>


<!-- =========================================================
     HERO
========================================================= -->

<section class="hero" id="home">

    <div class="hero-shape"></div>

    <div class="container-fluid hero-container">

        <div class="row align-items-center g-5">

            <!-- LEFT -->

            <div class="col-lg-6">

                <div class="hero-left">

                    <div class="hero-badge">
                        <i class="bi bi-stars"></i>
                        Smart Care for a Sustainable Tomorrow
                    </div>

                    <h1 class="hero-title">

                        Complete Product

                        <span class="green">
                            Lifecycle
                        </span>

                        & Repair Ecosystem

                    </h1>

                    <p class="hero-description">

                        From purchase to recycling — manage your electronic
                        products' complete lifecycle in one place.
                        Track warranty, schedule maintenance, book repairs
                        and make smarter sustainable choices.

                    </p>

                    <div class="hero-buttons">

                        @auth

                            <a href="{{ route('products.index') }}"
                               class="primary-btn">

                                My Products
                                <i class="bi bi-arrow-right"></i>

                            </a>

                        @else

                            <a href="{{ route('register') }}"
                               class="primary-btn">

                                Get Started
                                <i class="bi bi-arrow-right"></i>

                            </a>

                        @endauth

                        <a href="#how-it-works"
                           class="secondary-btn">

                            <i class="bi bi-play-circle"></i>

                            How It Works

                        </a>

                    </div>


                    <div class="hero-benefits">

                        <div class="benefit">
                            <i class="bi bi-shield-check"></i>
                            Track Warranty
                        </div>

                        <div class="benefit">
                            <i class="bi bi-tools"></i>
                            Book Repair
                        </div>

                        <div class="benefit">
                            <i class="bi bi-robot"></i>
                            AI Assistance
                        </div>

                        <div class="benefit">
                            <i class="bi bi-recycle"></i>
                            Go Green
                        </div>

                    </div>

                </div>

            </div>


            <!-- RIGHT DASHBOARD -->

            <div class="col-lg-6">

                <div class="dashboard-area">

                    <div class="dashboard-wrapper">


                        <div class="floating-badge badge-warranty">

                            <i class="bi bi-shield-check"></i>

                            Warranty Active

                        </div>


                        <div class="dashboard-card">


                            <!-- dashboard header -->

                            <div class="dashboard-header">

                                <div class="dashboard-logo">

                                    Product<span>Life</span>

                                </div>

                                <div class="d-flex align-items-center gap-3">

                                    <i class="bi bi-bell"
                                       style="color:#4c6479;"></i>

                                    <div class="dashboard-user">
                                        JD
                                    </div>

                                </div>

                            </div>


                            <!-- dashboard body -->

                            <div class="dashboard-content">


                                <!-- sidebar -->

                                <div class="dashboard-sidebar">

                                    <div class="side-item active">
                                        <i class="bi bi-house"></i>
                                        Dashboard
                                    </div>

                                    <div class="side-item">
                                        <i class="bi bi-box"></i>
                                        Products
                                    </div>

                                    <div class="side-item">
                                        <i class="bi bi-shield-check"></i>
                                        Warranty
                                    </div>

                                    <div class="side-item">
                                        <i class="bi bi-calendar-check"></i>
                                        Maintenance
                                    </div>

                                    <div class="side-item">
                                        <i class="bi bi-tools"></i>
                                        Repairs
                                    </div>

                                    <div class="side-item">
                                        <i class="bi bi-recycle"></i>
                                        Lifecycle
                                    </div>

                                    <div class="side-item">
                                        <i class="bi bi-gear"></i>
                                        Settings
                                    </div>

                                </div>


                                <!-- main -->

                                <div class="dashboard-main">


                                    <!-- health -->

                                    <div class="health-box">

                                        <div>

                                            <div class="health-title">
                                                Your Products
                                                <br>
                                                Are in Good Health!
                                            </div>

                                            <div class="health-text">
                                                Everything is running smoothly.
                                            </div>

                                        </div>

                                        <div class="leaf-circle">
                                            <i class="bi bi-leaf-fill"></i>
                                        </div>

                                    </div>


                                    <!-- overview -->

                                    <div class="overview-head">

                                        <h5>
                                            Product Overview
                                        </h5>

                                        <span class="view-all">
                                            View All →
                                        </span>

                                    </div>


                                    <!-- product -->

                                    <div class="product-box">

                                        <div class="product-top">

                                            <div class="product-icon">
                                                <i class="bi bi-snow"></i>
                                            </div>

                                            <div>

                                                <div class="product-name">
                                                    Samsung Air Conditioner
                                                </div>

                                                <div class="product-type">
                                                    AC • Registered Product
                                                </div>

                                            </div>

                                            <div class="active-pill">
                                                Active
                                            </div>

                                        </div>


                                        <div class="status-grid">

                                            <div class="status-card">

                                                <i class="bi bi-shield-check"></i>

                                                <h6>
                                                    Warranty
                                                </h6>

                                                <span>
                                                    Active
                                                </span>

                                            </div>


                                            <div class="status-card">

                                                <i class="bi bi-calendar-check"></i>

                                                <h6>
                                                    Maintenance
                                                </h6>

                                                <span>
                                                    Up to date
                                                </span>

                                            </div>


                                            <div class="status-card">

                                                <i class="bi bi-tools"></i>

                                                <h6>
                                                    Repairs
                                                </h6>

                                                <span>
                                                    Not needed
                                                </span>

                                            </div>


                                            <div class="status-card">

                                                <i class="bi bi-recycle"></i>

                                                <h6>
                                                    Lifecycle
                                                </h6>

                                                <span>
                                                    In progress
                                                </span>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>


                        <div class="floating-badge badge-repair">

                            <i class="bi bi-check-circle-fill"></i>

                            Smart. Simple. Sustainable.

                        </div>


                    </div>

                </div>

            </div>

        </div>

    </div>

</section>


<!-- =========================================================
     FEATURES
========================================================= -->

<section class="section features-section"
         id="features">

    <div class="container">

        <div class="text-center mb-5">

            <div class="section-label">
                Powerful Features
            </div>

            <h2 class="section-title">
                Everything Your Product
                <span>Needs</span>
            </h2>

            <p class="section-text mx-auto mt-3">
                ProductLife brings your product information,
                warranty, maintenance, repair and lifecycle
                activities together in one simple ecosystem.
            </p>

        </div>


        <div class="row g-4">


            <div class="col-md-6 col-lg-3">

                <div class="feature-card">

                    <div class="feature-icon">
                        <i class="bi bi-box-seam"></i>
                    </div>

                    <h4>
                        Product Registration
                    </h4>

                    <p>
                        Register your products and keep all
                        important product information organized.
                    </p>

                </div>

            </div>


            <div class="col-md-6 col-lg-3">

                <div class="feature-card">

                    <div class="feature-icon">
                        <i class="bi bi-qr-code"></i>
                    </div>

                    <h4>
                        Digital Passport
                    </h4>

                    <p>
                        Maintain a digital identity for every
                        product throughout its lifecycle.
                    </p>

                </div>

            </div>


            <div class="col-md-6 col-lg-3">

                <div class="feature-card">

                    <div class="feature-icon">
                        <i class="bi bi-shield-check"></i>
                    </div>

                    <h4>
                        Warranty Tracking
                    </h4>

                    <p>
                        Track warranty status, expiry dates
                        and important coverage details.
                    </p>

                </div>

            </div>


            <div class="col-md-6 col-lg-3">

                <div class="feature-card">

                    <div class="feature-icon">
                        <i class="bi bi-calendar-check"></i>
                    </div>

                    <h4>
                        Maintenance
                    </h4>

                    <p>
                        Schedule maintenance and stay ahead
                        of important service dates.
                    </p>

                </div>

            </div>


            <div class="col-md-6 col-lg-3">

                <div class="feature-card">

                    <div class="feature-icon">
                        <i class="bi bi-tools"></i>
                    </div>

                    <h4>
                        Repair Requests
                    </h4>

                    <p>
                        Create repair requests and keep
                        your complete repair history.
                    </p>

                </div>

            </div>


            <div class="col-md-6 col-lg-3">

                <div class="feature-card">

                    <div class="feature-icon">
                        <i class="bi bi-person-check"></i>
                    </div>

                    <h4>
                        Find Technician
                    </h4>

                    <p>
                        Connect with suitable technicians
                        for your product repair needs.
                    </p>

                </div>

            </div>


            <div class="col-md-6 col-lg-3">

                <div class="feature-card">

                    <div class="feature-icon">
                        <i class="bi bi-chat-square-text"></i>
                    </div>

                    <h4>
                        Repair & Quote
                    </h4>

                    <p>
                        Manage repair quotes, communication
                        and repair progress in one place.
                    </p>

                </div>

            </div>


            <div class="col-md-6 col-lg-3">

                <div class="feature-card">

                    <div class="feature-icon">
                        <i class="bi bi-stars"></i>
                    </div>

                    <h4>
                        Smart Assistance
                    </h4>

                    <p>
                        Get intelligent guidance for product
                        care and repair decisions.
                    </p>

                </div>

            </div>


        </div>

    </div>

</section>


<!-- =========================================================
     HOW IT WORKS
========================================================= -->

<section class="section how-section"
         id="how-it-works">

    <div class="container">

        <div class="row mb-5">

            <div class="col-lg-7">

                <div class="section-label">
                    Simple Process
                </div>

                <h2 class="section-title">
                    How ProductLife
                    <span>Works</span>
                </h2>

                <p class="section-text mt-3">
                    Manage your product from the moment you
                    purchase it until repair, reuse or recycling.
                </p>

            </div>

        </div>


        <div class="row g-4">


            <div class="col-md-6 col-lg">

                <div class="step-card">

                    <div class="step-number">
                        01
                    </div>

                    <h4>
                        Register
                    </h4>

                    <p>
                        Add your product and create its
                        digital product identity.
                    </p>

                </div>

            </div>


            <div class="col-md-6 col-lg">

                <div class="step-card">

                    <div class="step-number">
                        02
                    </div>

                    <h4>
                        Track
                    </h4>

                    <p>
                        Monitor warranty, maintenance
                        and product status.
                    </p>

                </div>

            </div>


            <div class="col-md-6 col-lg">

                <div class="step-card">

                    <div class="step-number">
                        03
                    </div>

                    <h4>
                        Maintain
                    </h4>

                    <p>
                        Schedule regular maintenance to
                        extend product life.
                    </p>

                </div>

            </div>


            <div class="col-md-6 col-lg">

                <div class="step-card">

                    <div class="step-number">
                        04
                    </div>

                    <h4>
                        Repair
                    </h4>

                    <p>
                        Find technicians, manage quotes
                        and complete repairs.
                    </p>

                </div>

            </div>


            <div class="col-md-6 col-lg">

                <div class="step-card">

                    <div class="step-number">
                        05
                    </div>

                    <h4>
                        Reuse
                    </h4>

                    <p>
                        Resell, donate or recycle products
                        responsibly at end of life.
                    </p>

                </div>

            </div>


        </div>

    </div>

</section>


<!-- =========================================================
     LIFECYCLE
========================================================= -->

<section class="section lifecycle-section"
         id="lifecycle">

    <div class="container">

        <div class="text-center">

            <div class="section-label">
                Product Lifecycle
            </div>

            <h2 class="section-title">
                One Product.
                <span>Complete Journey.</span>
            </h2>

            <p class="section-text mx-auto mt-3">
                Every stage of your product's life can be
                managed through one connected ecosystem.
            </p>

        </div>


        <div class="lifecycle-line">

            <div class="row g-4">


                <div class="col-6 col-lg">

                    <div class="life-item">

                        <div class="life-icon">
                            <i class="bi bi-cart-check"></i>
                        </div>

                        <h5>
                            Purchase
                        </h5>

                        <p>
                            Start your product journey.
                        </p>

                    </div>

                </div>


                <div class="col-6 col-lg">

                    <div class="life-item">

                        <div class="life-icon">
                            <i class="bi bi-phone"></i>
                        </div>

                        <h5>
                            Register
                        </h5>

                        <p>
                            Create your digital passport.
                        </p>

                    </div>

                </div>


                <div class="col-6 col-lg">

                    <div class="life-item">

                        <div class="life-icon">
                            <i class="bi bi-calendar-check"></i>
                        </div>

                        <h5>
                            Maintain
                        </h5>

                        <p>
                            Keep your product healthy.
                        </p>

                    </div>

                </div>


                <div class="col-6 col-lg">

                    <div class="life-item">

                        <div class="life-icon">
                            <i class="bi bi-tools"></i>
                        </div>

                        <h5>
                            Repair
                        </h5>

                        <p>
                            Repair instead of replacing.
                        </p>

                    </div>

                </div>


                <div class="col-6 col-lg">

                    <div class="life-item">

                        <div class="life-icon">
                            <i class="bi bi-arrow-repeat"></i>
                        </div>

                        <h5>
                            Reuse
                        </h5>

                        <p>
                            Resell or donate.
                        </p>

                    </div>

                </div>


                <div class="col-6 col-lg">

                    <div class="life-item">

                        <div class="life-icon">
                            <i class="bi bi-recycle"></i>
                        </div>

                        <h5>
                            Recycle
                        </h5>

                        <p>
                            End responsibly.
                        </p>

                    </div>

                </div>


            </div>

        </div>

    </div>

</section>


<!-- =========================================================
     IMPACT
========================================================= -->

<section class="section impact-section"
         id="about">

    <div class="container">

        <div class="impact-box">

            <div class="row align-items-center g-5">


                <div class="col-lg-6">

                    <div class="section-label">
                        Our Purpose
                    </div>

                    <h2 class="section-title">
                        Make Products
                        <span>Last Longer.</span>
                    </h2>

                    <p class="section-text mt-3">

                        ProductLife is designed to encourage
                        responsible product ownership by making
                        maintenance, repair, reuse and recycling
                        easier to manage.

                    </p>

                </div>


                <div class="col-lg-6">

                    <div class="row g-3">


                        <div class="col-6">

                            <div class="impact-card">

                                <div class="impact-number">
                                    01
                                </div>

                                <div class="impact-label">
                                    Digital Product
                                    Passport
                                </div>

                            </div>

                        </div>


                        <div class="col-6">

                            <div class="impact-card">

                                <div class="impact-number">
                                    02
                                </div>

                                <div class="impact-label">
                                    Warranty &
                                    Maintenance
                                </div>

                            </div>

                        </div>


                        <div class="col-6">

                            <div class="impact-card">

                                <div class="impact-number">
                                    03
                                </div>

                                <div class="impact-label">
                                    Repair
                                    Ecosystem
                                </div>

                            </div>

                        </div>


                        <div class="col-6">

                            <div class="impact-card">

                                <div class="impact-number">
                                    04
                                </div>

                                <div class="impact-label">
                                    Sustainable
                                    Lifecycle
                                </div>

                            </div>

                        </div>


                    </div>

                </div>


            </div>

        </div>

    </div>

</section>


<!-- =========================================================
     CTA
========================================================= -->

<section class="cta-section">

    <div class="container">

        <div class="cta-box">

            <h2>
                Ready to Manage Your Product Life?
            </h2>

            <p>
                Register your products, track warranty,
                manage maintenance and make smarter
                repair and lifecycle decisions.
            </p>

            @guest

                <a href="{{ route('register') }}"
                   class="primary-btn">

                    Create Your Account
                    <i class="bi bi-arrow-right"></i>

                </a>

            @else

                <a href="{{ route('products.create') }}"
                   class="primary-btn">

                    Add Your Product
                    <i class="bi bi-arrow-right"></i>

                </a>

            @endguest

        </div>

    </div>

</section>


<!-- =========================================================
     FOOTER
========================================================= -->

<footer>

    <div class="container">

        <div class="row g-5">


            <div class="col-lg-5">

                <div class="footer-brand">
                    Product<span>Life</span>
                </div>

                <p class="footer-text">
                    Complete Product Lifecycle & Repair Ecosystem.
                    Manage products smarter, extend their life
                    and make sustainable choices.
                </p>

            </div>


            <div class="col-6 col-lg-2">

                <div class="footer-title">
                    Product
                </div>

                <a href="#features"
                   class="footer-link">
                    Features
                </a>

                <a href="#how-it-works"
                   class="footer-link">
                    How It Works
                </a>

                <a href="#lifecycle"
                   class="footer-link">
                    Lifecycle
                </a>

            </div>


            <div class="col-6 col-lg-2">

                <div class="footer-title">
                    Account
                </div>

                @guest

                    <a href="{{ route('login') }}"
                       class="footer-link">
                        Login
                    </a>

                    <a href="{{ route('register') }}"
                       class="footer-link">
                        Register
                    </a>

                @else

                    <a href="{{ route('products.index') }}"
                       class="footer-link">
                        My Products
                    </a>

                @endguest

            </div>


            <div class="col-6 col-lg-3">

                <div class="footer-title">
                    Ecosystem
                </div>

                <div class="footer-link">
                    Warranty
                </div>

                <div class="footer-link">
                    Maintenance
                </div>

                <div class="footer-link">
                    Repair
                </div>

                <div class="footer-link">
                    Recycling
                </div>

            </div>


        </div>


        <div class="footer-bottom
                    d-flex
                    justify-content-between
                    flex-wrap
                    gap-2">

            <span>
                © {{ date('Y') }} ProductLife. All rights reserved.
            </span>

            <span>
                Smart. Simple. Sustainable.
            </span>

        </div>

    </div>

</footer>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
</script>

</body>
</html>