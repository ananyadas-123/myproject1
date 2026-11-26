
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>ProductLife | Complete Product Lifecycle & Repair Ecosystem</title>

    <meta name="description" content="ProductLife helps you manage your complete product lifecycle — warranty, maintenance, repair, reuse and recycling.">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        :root {
            --navy: #111936;
            --navy-light: #1b2850;
            --purple: #7138e8;
            --purple-dark: #5825c7;
            --blue: #2878f0;
            --cyan: #13b8d5;
            --green: #0eaa78;
            --orange: #f59e0b;
            --text: #17223d;
            --muted: #68758d;
            --border: #e7eaf2;
            --surface: #ffffff;
            --light: #f6f7fc;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
            scroll-padding-top: 90px;
        }

        body {
            font-family: 'Inter', sans-serif;
            color: var(--text);
            background: #fff;
            overflow-x: hidden;
        }

        a {
            text-decoration: none;
        }

        /* NAVBAR */

        .navbar {
            min-height: 82px;
            background: rgba(255,255,255,.96);
            border-bottom: 1px solid #e9ebf3;
            position: sticky;
            top: 0;
            z-index: 1000;
            backdrop-filter: blur(16px);
            box-shadow: 0 5px 25px rgba(20,30,60,.04);
        }

        .nav-container {
            max-width: 1450px;
            padding: 0 45px;
            margin: auto;
        }

        .navbar-brand {
            display: flex;
            align-items: center;
        }

        .brand-logo {
            width: 145px;
            max-height: 55px;
            object-fit: contain;
        }

        .brand-text {
            font-size: 27px;
            font-weight: 900;
            letter-spacing: -1.5px;
            color: var(--navy);
        }

        .brand-text span,
        .footer-brand span {
            color: var(--green);
        }

        .navbar-toggler {
            border: 1px solid var(--border);
            color: var(--navy);
            padding: 8px 12px;
            font-size: 24px;
        }

        .navbar-toggler:focus {
            box-shadow: none;
        }

        .nav-link {
            color: #46516a !important;
            font-size: 14px;
            font-weight: 700;
            margin: 0 10px;
            position: relative;
            transition: .25s;
        }

        .nav-link::after {
            content: "";
            position: absolute;
            left: 10px;
            bottom: 1px;
            width: 0;
            height: 2px;
            background: var(--purple);
            transition: .25s;
        }

        .nav-link:hover {
            color: var(--purple) !important;
        }

        .nav-link:hover::after {
            width: calc(100% - 20px);
        }

        .login-btn {
            color: var(--navy);
            font-size: 14px;
            font-weight: 800;
            margin-right: 20px;
            transition: .25s;
        }

        .login-btn:hover {
            color: var(--purple);
        }

        .login-btn i {
            margin-right: 5px;
        }

        .register-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 9px;
            padding: 13px 23px;
            color: white;
            background: linear-gradient(135deg, var(--purple), var(--blue));
            border-radius: 12px;
            font-size: 14px;
            font-weight: 800;
            box-shadow: 0 8px 20px rgba(113,56,232,.22);
            transition: .3s;
        }

        .register-btn:hover {
            color: white;
            transform: translateY(-3px);
            box-shadow: 0 12px 25px rgba(113,56,232,.32);
        }

        /* HERO */

        .hero {
            min-height: 690px;
            position: relative;
            overflow: hidden;
            background:
                radial-gradient(circle at 83% 20%, rgba(103,76,231,.19), transparent 30%),
                radial-gradient(circle at 10% 95%, rgba(19,184,213,.13), transparent 32%),
                linear-gradient(120deg, #f9faff 0%, #f1f3ff 52%, #edf7ff 100%);
        }

        .hero::before {
            content: "";
            position: absolute;
            width: 480px;
            height: 480px;
            right: -160px;
            top: -190px;
            border: 1px solid rgba(113,56,232,.12);
            border-radius: 50%;
        }

        .hero::after {
            content: "";
            position: absolute;
            width: 350px;
            height: 350px;
            right: -95px;
            top: -125px;
            border: 1px solid rgba(40,120,240,.15);
            border-radius: 50%;
        }

        .hero-container {
            max-width: 1450px;
            margin: auto;
            padding: 90px 45px 85px;
            position: relative;
            z-index: 2;
        }

        .hero-left {
            padding: 20px 15px 20px 0;
        }

        .hero-badge {
            display: inline-flex;
            align-items: center;
            gap: 9px;
            padding: 10px 16px;
            border-radius: 30px;
            color: #5930c2;
            background: #ece7ff;
            border: 1px solid #dcd2ff;
            font-size: 12px;
            font-weight: 800;
            margin-bottom: 27px;
        }

        .hero-badge i {
            color: var(--orange);
            font-size: 16px;
        }

        .hero-title {
            color: var(--navy);
            font-size: clamp(42px, 5vw, 70px);
            line-height: 1.08;
            letter-spacing: -3.5px;
            font-weight: 900;
            max-width: 700px;
        }

        .hero-title .green {
            background: linear-gradient(100deg, var(--purple), var(--blue), var(--cyan));
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }

        .hero-description {
            max-width: 590px;
            margin-top: 25px;
            color: #596781;
            font-size: 16px;
            line-height: 1.9;
        }

        .hero-buttons {
            display: flex;
            align-items: center;
            flex-wrap: wrap;
            gap: 13px;
            margin-top: 30px;
        }

        .primary-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 13px;
            padding: 16px 25px;
            border-radius: 12px;
            background: linear-gradient(135deg, var(--purple), var(--blue));
            color: white;
            font-size: 14px;
            font-weight: 800;
            box-shadow: 0 12px 25px rgba(91,65,205,.25);
            transition: .3s;
        }

        .primary-btn:hover {
            color: white;
            transform: translateY(-4px);
            box-shadow: 0 16px 30px rgba(91,65,205,.35);
        }

        .secondary-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            padding: 15px 23px;
            border-radius: 12px;
            color: var(--navy);
            background: white;
            border: 1px solid #dfe3f0;
            font-size: 14px;
            font-weight: 800;
            transition: .3s;
        }

        .secondary-btn:hover {
            color: var(--purple);
            border-color: var(--purple);
            transform: translateY(-3px);
        }

        .secondary-btn i {
            font-size: 18px;
        }

        .hero-benefits {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            margin-top: 35px;
        }

        .benefit {
            display: flex;
            align-items: center;
            gap: 8px;
            color: #43516d;
            font-size: 12px;
            font-weight: 800;
        }

        .benefit i {
            color: var(--green);
            font-size: 17px;
        }

        /* DASHBOARD PREVIEW */

        .dashboard-area {
            position: relative;
            padding: 20px 10px;
        }

        .dashboard-wrapper {
            max-width: 620px;
            margin: auto;
            position: relative;
        }

        .dashboard-card {
            position: relative;
            z-index: 2;
            padding: 19px;
            border-radius: 24px;
            background: white;
            border: 1px solid #e8e9f5;
            box-shadow: 0 30px 75px rgba(35,39,95,.16);
            transform: rotate(-1deg);
        }

        .dashboard-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 3px 5px 17px;
            border-bottom: 1px solid #edf0f6;
        }

        .dashboard-logo {
            font-size: 18px;
            font-weight: 900;
            color: var(--navy);
        }

        .dashboard-logo span {
            color: var(--purple);
        }

        .dashboard-user {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 38px;
            height: 38px;
            border-radius: 12px;
            background: linear-gradient(135deg, var(--purple), var(--blue));
            color: white;
            font-size: 12px;
            font-weight: 900;
        }

        .dashboard-content {
            display: flex;
            gap: 14px;
            padding-top: 18px;
        }

        .dashboard-sidebar {
            width: 125px;
            flex-shrink: 0;
        }

        .side-item {
            display: flex;
            align-items: center;
            gap: 9px;
            padding: 11px 9px;
            margin-bottom: 5px;
            border-radius: 9px;
            color: #69758c;
            font-size: 10px;
            font-weight: 800;
        }

        .side-item i {
            font-size: 14px;
        }

        .side-item.active {
            background: #eee9ff;
            color: var(--purple);
        }

        .dashboard-main {
            flex: 1;
            min-width: 0;
        }

        .dashboard-welcome {
            margin-bottom: 14px;
        }

        .dashboard-welcome h5 {
            font-size: 16px;
            font-weight: 900;
            color: var(--navy);
            margin-bottom: 4px;
        }

        .dashboard-welcome p {
            color: #8490a5;
            font-size: 10px;
            margin: 0;
        }

        .health-box {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 10px;
            padding: 17px;
            border-radius: 15px;
            background: linear-gradient(120deg, #e9e5ff, #eaf5ff);
        }

        .health-title {
            color: #29365e;
            font-size: 12px;
            font-weight: 900;
        }

        .health-text {
            color: #6c7892;
            font-size: 9px;
            margin-top: 5px;
        }

        .leaf-circle {
            width: 47px;
            height: 47px;
            flex-shrink: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 14px;
            color: white;
            font-size: 22px;
            background: linear-gradient(135deg, var(--green), #35cba1);
            box-shadow: 0 7px 18px rgba(14,170,120,.22);
        }

        .overview-head {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin: 18px 0 10px;
        }

        .overview-head h5 {
            margin: 0;
            font-size: 12px;
            font-weight: 900;
            color: var(--navy);
        }

        .view-all {
            color: var(--purple);
            font-size: 9px;
            font-weight: 900;
        }

        .product-box {
            padding: 12px;
            border: 1px solid #e9edf5;
            border-radius: 13px;
            background: #fff;
        }

        .product-top {
            display: flex;
            align-items: center;
            gap: 11px;
        }

        .product-icon {
            width: 43px;
            height: 43px;
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 12px;
            color: var(--blue);
            background: #eaf2ff;
            font-size: 21px;
        }

        .product-info {
            flex: 1;
            min-width: 0;
        }

        .product-info h6 {
            color: var(--navy);
            font-size: 10px;
            font-weight: 900;
            margin: 0 0 4px;
        }

        .product-info p {
            color: #8490a5;
            font-size: 9px;
            margin: 0;
        }

        .status-active {
            padding: 5px 8px;
            border-radius: 20px;
            color: #07865e;
            background: #e0f8ed;
            font-size: 8px;
            font-weight: 900;
        }

        .dashboard-stats {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 8px;
            margin-top: 11px;
        }

        .mini-stat {
            padding: 11px 7px;
            border-radius: 11px;
            background: #f7f8fc;
            text-align: center;
        }

        .mini-stat strong {
            display: block;
            color: var(--navy);
            font-size: 17px;
            font-weight: 900;
        }

        .mini-stat span {
            display: block;
            color: #77839a;
            font-size: 8px;
            font-weight: 700;
            margin-top: 3px;
        }

        .floating-badge {
            position: absolute;
            z-index: 4;
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 12px 15px;
            background: white;
            border-radius: 13px;
            box-shadow: 0 12px 30px rgba(25,35,80,.16);
            font-size: 10px;
            font-weight: 900;
            color: var(--navy);
            animation: float 4s ease-in-out infinite;
        }

        .floating-badge i {
            font-size: 17px;
        }

        .badge-warranty {
            top: 4%;
            right: -5%;
        }

        .badge-warranty i {
            color: var(--green);
        }

        .badge-repair {
            bottom: 5%;
            left: -6%;
            animation-delay: 1s;
        }

        .badge-repair i {
            color: var(--purple);
        }

        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }

        /* COMMON SECTIONS */

        .section {
            padding: 95px 0;
        }

        .section-label {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 8px 14px;
            border-radius: 30px;
            background: #eee9ff;
            color: var(--purple);
            font-size: 11px;
            font-weight: 900;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 18px;
        }

        .section-label::before {
            content: "";
            width: 7px;
            height: 7px;
            border-radius: 50%;
            background: var(--purple);
        }

        .section-title {
            color: var(--navy);
            font-size: clamp(32px, 4vw, 47px);
            font-weight: 900;
            line-height: 1.2;
            letter-spacing: -1.7px;
        }

        .section-title span {
            color: var(--purple);
        }

        .section-text {
            max-width: 670px;
            color: var(--muted);
            font-size: 15px;
            line-height: 1.9;
        }

        /* FEATURES */

        .features-section {
            background: #fff;
        }

        .feature-card {
            height: 100%;
            min-height: 235px;
            padding: 27px 23px;
            background: white;
            border: 1px solid var(--border);
            border-radius: 18px;
            position: relative;
            overflow: hidden;
            transition: .35s;
        }

        .feature-card::after {
            content: "";
            position: absolute;
            width: 100px;
            height: 100px;
            right: -50px;
            bottom: -50px;
            border-radius: 50%;
            background: var(--feature-color, #eee9ff);
            opacity: .55;
            transition: .35s;
        }

        .feature-card:hover {
            transform: translateY(-9px);
            border-color: var(--feature-border, #cfc2ff);
            box-shadow: 0 20px 45px rgba(37,43,90,.09);
        }

        .feature-card:hover::after {
            transform: scale(1.7);
        }

        .feature-icon {
            width: 55px;
            height: 55px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 15px;
            color: var(--feature-icon, var(--purple));
            background: var(--feature-color, #eee9ff);
            font-size: 24px;
            margin-bottom: 21px;
        }

        .feature-card h4 {
            color: var(--navy);
            font-size: 16px;
            font-weight: 900;
            margin-bottom: 11px;
        }

        .feature-card p {
            color: #6d7890;
            font-size: 12px;
            line-height: 1.8;
            margin: 0;
        }

        .feature-purple {
            --feature-color: #eee9ff;
            --feature-icon: #7138e8;
            --feature-border: #cfc2ff;
        }

        .feature-blue {
            --feature-color: #e6f0ff;
            --feature-icon: #2878f0;
            --feature-border: #bcd6ff;
        }

        .feature-green {
            --feature-color: #e2f8ef;
            --feature-icon: #0eaa78;
            --feature-border: #b9ecd6;
        }

        .feature-orange {
            --feature-color: #fff2df;
            --feature-icon: #e68a08;
            --feature-border: #ffdaa1;
        }

        .feature-cyan {
            --feature-color: #e1f8fc;
            --feature-icon: #0d9ebc;
            --feature-border: #b2eaf3;
        }

        .feature-pink {
            --feature-color: #ffebf3;
            --feature-icon: #df4e8b;
            --feature-border: #f8c3d9;
        }

        /* HOW IT WORKS */

        .how-section {
            background: #f6f7fc;
            position: relative;
            overflow: hidden;
        }

        .how-section::before {
            content: "";
            position: absolute;
            width: 300px;
            height: 300px;
            left: -180px;
            top: 10%;
            border-radius: 50%;
            background: #e9e4ff;
            filter: blur(2px);
        }

        .step-card {
            height: 100%;
            min-height: 230px;
            padding: 27px 22px;
            position: relative;
            z-index: 1;
            border: 1px solid #e6e8f2;
            border-radius: 17px;
            background: white;
            transition: .3s;
        }

        .step-card:hover {
            transform: translateY(-7px);
            box-shadow: 0 18px 35px rgba(30,40,90,.09);
            border-color: #c8b9ff;
        }

        .step-number {
            width: 49px;
            height: 49px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 14px;
            background: linear-gradient(135deg, var(--purple), var(--blue));
            color: white;
            font-size: 16px;
            font-weight: 900;
            margin-bottom: 24px;
            box-shadow: 0 8px 18px rgba(113,56,232,.22);
        }

        .step-card h4 {
            color: var(--navy);
            font-size: 17px;
            font-weight: 900;
            margin-bottom: 11px;
        }

        .step-card p {
            color: #6d7890;
            font-size: 12px;
            line-height: 1.8;
            margin: 0;
        }

        /* LIFECYCLE */

        .lifecycle-section {
            background: white;
        }

        .lifecycle-line {
            margin-top: 55px;
            position: relative;
        }

        .life-item {
            height: 100%;
            text-align: center;
            padding: 25px 12px;
            border: 1px solid var(--border);
            border-radius: 17px;
            background: white;
            transition: .3s;
        }

        .life-item:hover {
            transform: translateY(-7px);
            box-shadow: 0 16px 35px rgba(30,40,90,.08);
        }

        .life-icon {
            width: 60px;
            height: 60px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 17px;
            border-radius: 18px;
            color: white;
            background: linear-gradient(135deg, var(--life-color), var(--life-color-2));
            font-size: 25px;
            box-shadow: 0 8px 18px var(--life-shadow);
        }

        .life-item h5 {
            color: var(--navy);
            font-size: 14px;
            font-weight: 900;
            margin-bottom: 8px;
        }

        .life-item p {
            color: #78839a;
            font-size: 11px;
            line-height: 1.7;
            margin: 0;
        }

        .life-purple {
            --life-color: #7138e8;
            --life-color-2: #9b75f4;
            --life-shadow: rgba(113,56,232,.2);
        }

        .life-blue {
            --life-color: #2878f0;
            --life-color-2: #55a1ff;
            --life-shadow: rgba(40,120,240,.2);
        }

        .life-green {
            --life-color: #0eaa78;
            --life-color-2: #42c99e;
            --life-shadow: rgba(14,170,120,.2);
        }

        .life-orange {
            --life-color: #ed920e;
            --life-color-2: #ffbd51;
            --life-shadow: rgba(237,146,14,.2);
        }

        .life-cyan {
            --life-color: #0ba7c6;
            --life-color-2: #4bd0e6;
            --life-shadow: rgba(11,167,198,.2);
        }

        .life-pink {
            --life-color: #d94f91;
            --life-color-2: #f17db1;
            --life-shadow: rgba(217,79,145,.2);
        }

        /* IMPACT */

        .impact-section {
            background: #f6f7fc;
        }

        .impact-box {
            padding: 60px;
            border-radius: 25px;
            background:
                radial-gradient(circle at 90% 10%, rgba(115,75,232,.18), transparent 32%),
                linear-gradient(125deg, #111936, #202c58);
            box-shadow: 0 25px 60px rgba(17,25,54,.16);
            overflow: hidden;
            position: relative;
        }

        .impact-box .section-label {
            background: rgba(255,255,255,.12);
            color: #c9baff;
            border: 1px solid rgba(255,255,255,.12);
        }

        .impact-box .section-label::before {
            background: #47d6b0;
        }

        .impact-box .section-title {
            color: white;
        }

        .impact-box .section-title span {
            color: #a997ff;
        }

        .impact-box .section-text {
            color: #c1cbe0;
        }

        .impact-card {
            min-height: 140px;
            padding: 23px;
            border-radius: 16px;
            border: 1px solid rgba(255,255,255,.14);
            background: rgba(255,255,255,.08);
            transition: .3s;
        }

        .impact-card:hover {
            background: rgba(255,255,255,.15);
            transform: translateY(-5px);
        }

        .impact-number {
            color: #a997ff;
            font-size: 28px;
            font-weight: 900;
            margin-bottom: 12px;
        }

        .impact-label {
            color: white;
            font-size: 13px;
            font-weight: 800;
            line-height: 1.6;
        }

        /* CTA */

        .cta-section {
            padding: 85px 0;
            background: white;
        }

        .cta-box {
            padding: 65px 25px;
            text-align: center;
            border-radius: 25px;
            background:
                radial-gradient(circle at 10% 100%, rgba(19,184,213,.2), transparent 30%),
                radial-gradient(circle at 90% 0%, rgba(113,56,232,.25), transparent 32%),
                linear-gradient(120deg, #f0edff, #eaf3ff);
            border: 1px solid #e1e5fb;
        }

        .cta-box h2 {
            color: var(--navy);
            font-size: clamp(28px, 4vw, 42px);
            font-weight: 900;
            letter-spacing: -1.5px;
        }

        .cta-box p {
            max-width: 620px;
            margin: 18px auto 27px;
            color: #62708a;
            font-size: 14px;
            line-height: 1.9;
        }

        /* FOOTER */

        footer {
            padding: 65px 0 25px;
            background: #10172f;
            color: white;
        }

        .footer-brand {
            color: white;
            font-size: 27px;
            font-weight: 900;
            letter-spacing: -1px;
            margin-bottom: 16px;
        }

        .footer-text {
            max-width: 350px;
            color: #aeb8ce;
            font-size: 12px;
            line-height: 1.9;
        }

        .footer-title {
            color: white;
            font-size: 13px;
            font-weight: 900;
            margin-bottom: 20px;
        }

        .footer-link {
            display: block;
            width: fit-content;
            color: #aeb8ce;
            font-size: 12px;
            margin-bottom: 13px;
            transition: .25s;
        }

        .footer-link:hover {
            color: #a997ff;
            transform: translateX(4px);
        }

        .footer-bottom {
            margin-top: 45px;
            padding-top: 22px;
            border-top: 1px solid rgba(255,255,255,.12);
            color: #9da8c0;
            font-size: 11px;
        }

        /* RESPONSIVE */

        @media (max-width: 991px) {
            .nav-container {
                padding: 0 22px;
            }

            .navbar-collapse {
                padding: 18px 0 20px;
            }

            .navbar-nav {
                margin-bottom: 15px;
            }

            .nav-link {
                margin: 7px 0;
            }

            .nav-link::after {
                display: none;
            }

            .hero-container {
                padding: 65px 25px;
            }

            .hero-left {
                padding-right: 0;
            }

            .dashboard-area {
                max-width: 650px;
                margin: 20px auto 0;
            }

            .section {
                padding: 75px 0;
            }

            .impact-box {
                padding: 40px 30px;
            }
        }

        @media (max-width: 767px) {
            .navbar {
                min-height: 72px;
            }

            .brand-text {
                font-size: 24px;
            }

            .brand-logo {
                width: 125px;
            }

            .hero-container {
                padding: 55px 20px;
            }

            .hero-title {
                font-size: 43px;
                letter-spacing: -2px;
            }

            .hero-description {
                font-size: 14px;
            }

            .hero-benefits {
                gap: 13px 18px;
            }

            .dashboard-card {
                padding: 12px;
                border-radius: 17px;
                transform: none;
            }

            .dashboard-sidebar {
                width: 95px;
            }

            .side-item {
                padding: 9px 6px;
                font-size: 8px;
                gap: 6px;
            }

            .dashboard-content {
                gap: 8px;
            }

            .health-box {
                padding: 12px;
            }

            .floating-badge {
                padding: 9px 11px;
                font-size: 8px;
            }

            .badge-warranty {
                right: -2%;
            }

            .badge-repair {
                left: -2%;
            }

            .section {
                padding: 65px 0;
            }

            .section-title {
                font-size: 34px;
            }

            .feature-card {
                min-height: 210px;
                padding: 22px 18px;
            }

            .impact-box {
                padding: 35px 20px;
            }

            .cta-section {
                padding: 60px 0;
            }

            .cta-box {
                padding: 45px 18px;
            }
        }

        @media (max-width: 420px) {
            .hero-title {
                font-size: 36px;
            }

            .hero-buttons {
                align-items: stretch;
                flex-direction: column;
            }

            .hero-buttons a {
                width: 100%;
            }

            .dashboard-sidebar {
                width: 78px;
            }

            .side-item {
                font-size: 7px;
            }

            .dashboard-logo {
                font-size: 15px;
            }

            .product-info h6 {
                font-size: 9px;
            }

            .status-active {
                font-size: 7px;
            }

            .mini-stat strong {
                font-size: 14px;
            }

            .impact-number {
                font-size: 23px;
            }

            .impact-card {
                padding: 16px;
                min-height: 125px;
            }

            .footer-bottom {
                flex-direction: column;
            }
        }
    </style>
</head>

<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg">
    <div class="container-fluid nav-container">

        <a href="{{ route('home') }}" class="navbar-brand">
            @if(file_exists(public_path('images/logo.png')))
                <img src="{{ asset('images/logo.png') }}" alt="ProductLife" class="brand-logo">
            @else
                <div class="brand-text">Product<span>Life</span></div>
            @endif
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav" aria-label="Toggle navigation">
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

            <div class="d-flex align-items-center flex-wrap">

                @auth
                    <a href="{{ route('products.index') }}" class="login-btn">
                        <i class="bi bi-grid"></i> My Products
                    </a>
                @else
                    <a href="{{ route('login') }}" class="login-btn">
                        <i class="bi bi-person"></i> Login
                    </a>

                    <a href="{{ route('register') }}" class="register-btn">
                        Get Started <i class="bi bi-arrow-up-right"></i>
                    </a>
                @endauth

            </div>
        </div>
    </div>
</nav>


<!-- HERO SECTION -->
<section class="hero" id="home">

    <div class="container-fluid hero-container">
        <div class="row align-items-center g-5">

            <div class="col-lg-6">
                <div class="hero-left">

                    <div class="hero-badge">
                        <i class="bi bi-stars"></i>
                        Smart Care for a Sustainable Tomorrow
                    </div>

                    <h1 class="hero-title">
                        Complete Product
                        <span class="green">Lifecycle</span>
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
                            <a href="{{ route('products.index') }}" class="primary-btn">
                                My Products <i class="bi bi-arrow-right"></i>
                            </a>
                        @else
                            <a href="{{ route('register') }}" class="primary-btn">
                                Get Started <i class="bi bi-arrow-right"></i>
                            </a>
                        @endauth

                        <a href="#how-it-works" class="secondary-btn">
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


            <!-- DASHBOARD PREVIEW -->
            <div class="col-lg-6">

                <div class="dashboard-area">
                    <div class="dashboard-wrapper">

                        <div class="floating-badge badge-warranty">
                            <i class="bi bi-shield-check"></i>
                            Warranty Active
                        </div>

                        <div class="floating-badge badge-repair">
                            <i class="bi bi-tools"></i>
                            Smart Repair Management
                        </div>

                        <div class="dashboard-card">

                            <div class="dashboard-header">
                                <div class="dashboard-logo">
                                    Product<span>Life</span>
                                </div>

                                <div class="dashboard-user">JD</div>
                            </div>

                            <div class="dashboard-content">

                                <div class="dashboard-sidebar">
                                    <div class="side-item active">
                                        <i class="bi bi-grid"></i> Dashboard
                                    </div>

                                    <div class="side-item">
                                        <i class="bi bi-box-seam"></i> Products
                                    </div>

                                    <div class="side-item">
                                        <i class="bi bi-shield-check"></i> Warranty
                                    </div>

                                    <div class="side-item">
                                        <i class="bi bi-tools"></i> Repairs
                                    </div>

                                    <div class="side-item">
                                        <i class="bi bi-calendar-check"></i> Service
                                    </div>

                                    <div class="side-item">
                                        <i class="bi bi-recycle"></i> Recycling
                                    </div>
                                </div>

                                <div class="dashboard-main">

                                    <div class="dashboard-welcome">
                                        <h5>Welcome Back!</h5>
                                        <p>Here's your product overview</p>
                                    </div>

                                    <div class="health-box">
                                        <div>
                                            <div class="health-title">Your Product Health</div>
                                            <div class="health-text">Keep your products healthy and sustainable</div>
                                        </div>

                                        <div class="leaf-circle">
                                            <i class="bi bi-heart-pulse"></i>
                                        </div>
                                    </div>

                                    <div class="overview-head">
                                        <h5>Recent Products</h5>
                                        <span class="view-all">View All</span>
                                    </div>

                                    <div class="product-box">

                                        <div class="product-top">
                                            <div class="product-icon">
                                                <i class="bi bi-snow"></i>
                                            </div>

                                            <div class="product-info">
                                                <h6>Samsung Air Conditioner</h6>
                                                <p>Home Appliance · Product #001</p>
                                            </div>

                                            <span class="status-active">Active</span>
                                        </div>

                                        <div class="dashboard-stats">
                                            <div class="mini-stat">
                                                <strong>03</strong>
                                                <span>Products</span>
                                            </div>

                                            <div class="mini-stat">
                                                <strong>02</strong>
                                                <span>Warranties</span>
                                            </div>

                                            <div class="mini-stat">
                                                <strong>01</strong>
                                                <span>Repairs</span>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>

        </div>
    </div>
</section>


<!-- FEATURES SECTION -->
<section class="section features-section" id="features">

    <div class="container">

        <div class="text-center mb-5">
            <div class="section-label">Powerful Features</div>

            <h2 class="section-title">
                Everything Your Product
                <span>Needs</span>
            </h2>

            <p class="section-text mx-auto mt-3">
                ProductLife brings your product information, warranty,
                maintenance, repair and lifecycle activities together
                in one simple ecosystem.
            </p>
        </div>


        <div class="row g-4">

            <div class="col-md-6 col-lg-3">
                <div class="feature-card feature-purple">
                    <div class="feature-icon">
                        <i class="bi bi-box-seam"></i>
                    </div>
                    <h4>Product Registration</h4>
                    <p>Register your products and keep all important product information organized.</p>
                </div>
            </div>

            <div class="col-md-6 col-lg-3">
                <div class="feature-card feature-blue">
                    <div class="feature-icon">
                        <i class="bi bi-qr-code"></i>
                    </div>
                    <h4>Digital Passport</h4>
                    <p>Maintain a digital identity for every product throughout its lifecycle.</p>
                </div>
            </div>

            <div class="col-md-6 col-lg-3">
                <div class="feature-card feature-green">
                    <div class="feature-icon">
                        <i class="bi bi-shield-check"></i>
                    </div>
                    <h4>Warranty Tracking</h4>
                    <p>Track warranty status, expiry dates and important coverage details.</p>
                </div>
            </div>

            <div class="col-md-6 col-lg-3">
                <div class="feature-card feature-orange">
                    <div class="feature-icon">
                        <i class="bi bi-calendar-check"></i>
                    </div>
                    <h4>Maintenance</h4>
                    <p>Schedule maintenance and stay ahead of important service dates.</p>
                </div>
            </div>

            <div class="col-md-6 col-lg-3">
                <div class="feature-card feature-cyan">
                    <div class="feature-icon">
                        <i class="bi bi-tools"></i>
                    </div>
                    <h4>Repair Requests</h4>
                    <p>Create repair requests and keep your complete repair history.</p>
                </div>
            </div>

            <div class="col-md-6 col-lg-3">
                <div class="feature-card feature-pink">
                    <div class="feature-icon">
                        <i class="bi bi-person-check"></i>
                    </div>
                    <h4>Find Technician</h4>
                    <p>Connect with suitable technicians for your product repair needs.</p>
                </div>
            </div>

            <div class="col-md-6 col-lg-3">
                <div class="feature-card feature-orange">
                    <div class="feature-icon">
                        <i class="bi bi-chat-square-text"></i>
                    </div>
                    <h4>Repair & Quote</h4>
                    <p>Manage repair quotes, communication and repair progress in one place.</p>
                </div>
            </div>

            <div class="col-md-6 col-lg-3">
                <div class="feature-card feature-purple">
                    <div class="feature-icon">
                        <i class="bi bi-stars"></i>
                    </div>
                    <h4>Smart Assistance</h4>
                    <p>Get intelligent guidance for product care and repair decisions.</p>
                </div>
            </div>

        </div>
    </div>
</section>


<!-- HOW IT WORKS -->
<section class="section how-section" id="how-it-works">

    <div class="container">

        <div class="row mb-5">
            <div class="col-lg-8">

                <div class="section-label">Simple Process</div>

                <h2 class="section-title">
                    How ProductLife
                    <span>Works</span>
                </h2>

                <p class="section-text mt-3">
                    Manage your product from the moment you purchase it
                    until repair, reuse or recycling.
                </p>

            </div>
        </div>


        <div class="row g-4">

            <div class="col-md-6 col-lg">
                <div class="step-card">
                    <div class="step-number">01</div>
                    <h4>Register</h4>
                    <p>Add your product and create its digital product identity.</p>
                </div>
            </div>

            <div class="col-md-6 col-lg">
                <div class="step-card">
                    <div class="step-number">02</div>
                    <h4>Track</h4>
                    <p>Monitor warranty, maintenance and product status.</p>
                </div>
            </div>

            <div class="col-md-6 col-lg">
                <div class="step-card">
                    <div class="step-number">03</div>
                    <h4>Maintain</h4>
                    <p>Schedule regular maintenance to extend product life.</p>
                </div>
            </div>

            <div class="col-md-6 col-lg">
                <div class="step-card">
                    <div class="step-number">04</div>
                    <h4>Repair</h4>
                    <p>Find technicians, manage quotes and complete repairs.</p>
                </div>
            </div>

            <div class="col-md-6 col-lg">
                <div class="step-card">
                    <div class="step-number">05</div>
                    <h4>Reuse</h4>
                    <p>Resell, donate or recycle products responsibly at end of life.</p>
                </div>
            </div>

        </div>
    </div>
</section>


<!-- PRODUCT LIFECYCLE -->
<section class="section lifecycle-section" id="lifecycle">

    <div class="container">

        <div class="text-center">

            <div class="section-label">Product Lifecycle</div>

            <h2 class="section-title">
                One Product.
                <span>Complete Journey.</span>
            </h2>

            <p class="section-text mx-auto mt-3">
                Every stage of your product's life can be managed
                through one connected ecosystem.
            </p>

        </div>


        <div class="lifecycle-line">

            <div class="row g-4">

                <div class="col-6 col-lg-2">
                    <div class="life-item life-purple">
                        <div class="life-icon">
                            <i class="bi bi-cart-check"></i>
                        </div>
                        <h5>Purchase</h5>
                        <p>Start your product journey.</p>
                    </div>
                </div>

                <div class="col-6 col-lg-2">
                    <div class="life-item life-blue">
                        <div class="life-icon">
                            <i class="bi bi-phone"></i>
                        </div>
                        <h5>Register</h5>
                        <p>Create your digital passport.</p>
                    </div>
                </div>

                <div class="col-6 col-lg-2">
                    <div class="life-item life-green">
                        <div class="life-icon">
                            <i class="bi bi-calendar-check"></i>
                        </div>
                        <h5>Maintain</h5>
                        <p>Keep your product healthy.</p>
                    </div>
                </div>

                <div class="col-6 col-lg-2">
                    <div class="life-item life-orange">
                        <div class="life-icon">
                            <i class="bi bi-tools"></i>
                        </div>
                        <h5>Repair</h5>
                        <p>Repair instead of replacing.</p>
                    </div>
                </div>

                <div class="col-6 col-lg-2">
                    <div class="life-item life-cyan">
                        <div class="life-icon">
                            <i class="bi bi-arrow-repeat"></i>
                        </div>
                        <h5>Reuse</h5>
                        <p>Resell or donate.</p>
                    </div>
                </div>

                <div class="col-6 col-lg-2">
                    <div class="life-item life-pink">
                        <div class="life-icon">
                            <i class="bi bi-recycle"></i>
                        </div>
                        <h5>Recycle</h5>
                        <p>End responsibly.</p>
                    </div>
                </div>

            </div>
        </div>

    </div>
</section>


<!-- ABOUT / IMPACT -->
<section class="section impact-section" id="about">

    <div class="container">

        <div class="impact-box">

            <div class="row align-items-center g-5">

                <div class="col-lg-6">

                    <div class="section-label">Our Purpose</div>

                    <h2 class="section-title">
                        Make Products
                        <span>Last Longer.</span>
                    </h2>

                    <p class="section-text mt-3">
                        ProductLife is designed to encourage responsible
                        product ownership by making maintenance, repair,
                        reuse and recycling easier to manage.
                    </p>

                </div>


                <div class="col-lg-6">

                    <div class="row g-3">

                        <div class="col-6">
                            <div class="impact-card">
                                <div class="impact-number">01</div>
                                <div class="impact-label">
                                    Digital Product Passport
                                </div>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="impact-card">
                                <div class="impact-number">02</div>
                                <div class="impact-label">
                                    Warranty & Maintenance
                                </div>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="impact-card">
                                <div class="impact-number">03</div>
                                <div class="impact-label">
                                    Repair Ecosystem
                                </div>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="impact-card">
                                <div class="impact-number">04</div>
                                <div class="impact-label">
                                    Sustainable Lifecycle
                                </div>
                            </div>
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>
</section>


<!-- CTA SECTION -->
<section class="cta-section">

    <div class="container">

        <div class="cta-box">

            <h2>Ready to Manage Your Product Life?</h2>

            <p>
                Register your products, track warranty, manage maintenance
                and make smarter repair and lifecycle decisions.
            </p>

            @guest
                <a href="{{ route('register') }}" class="primary-btn">
                    Create Your Account
                    <i class="bi bi-arrow-right"></i>
                </a>
            @else
                <a href="{{ route('products.create') }}" class="primary-btn">
                    Add Your Product
                    <i class="bi bi-arrow-right"></i>
                </a>
            @endguest

        </div>

    </div>
</section>


<!-- FOOTER -->
<footer>

    <div class="container">

        <div class="row g-5">

            <div class="col-lg-5">

                <div class="footer-brand">
                    Product<span>Life</span>
                </div>

                <p class="footer-text">
                    Complete Product Lifecycle & Repair Ecosystem.
                    Manage products smarter, extend their life and
                    make sustainable choices.
                </p>

            </div>


            <div class="col-6 col-lg-2">

                <div class="footer-title">Product</div>

                <a href="#features" class="footer-link">Features</a>
                <a href="#how-it-works" class="footer-link">How It Works</a>
                <a href="#lifecycle" class="footer-link">Lifecycle</a>

            </div>


            <div class="col-6 col-lg-2">

                <div class="footer-title">Account</div>

                @guest
                    <a href="{{ route('login') }}" class="footer-link">Login</a>
                    <a href="{{ route('register') }}" class="footer-link">Register</a>
                @else
                    <a href="{{ route('products.index') }}" class="footer-link">My Products</a>
                @endguest

            </div>


            <div class="col-6 col-lg-3">

                <div class="footer-title">Ecosystem</div>

                <a href="#features" class="footer-link">Warranty</a>
                <a href="#features" class="footer-link">Maintenance</a>
                <a href="#features" class="footer-link">Repair</a>
                <a href="#lifecycle" class="footer-link">Recycling</a>

            </div>

        </div>


        <div class="footer-bottom d-flex justify-content-between flex-wrap gap-2">

            <span>
                © {{ date('Y') }} ProductLife. All rights reserved.
            </span>

            <span>
                Smart. Simple. Sustainable.
            </span>

        </div>

    </div>
</footer>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
