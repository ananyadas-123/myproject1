
@push('styles')
<style>

/* ==========================================
   PRODUCTLIFE - WARRANTY CREATE PREMIUM UI
========================================== */

.warranty-page {
    max-width: 1200px;
    margin: 0 auto;
    color: #172554;
}

/* PRODUCT HEADER */

.product-header-card {
    position: relative;
    display: flex;
    align-items: center;
    gap: 19px;
    padding: 28px;
    margin-bottom: 26px;
    overflow: hidden;
    border: 1px solid #4338ca;
    border-radius: 23px;
    background: linear-gradient(120deg, #111b46 0%, #3730a3 48%, #2563eb 100%);
    box-shadow: 0 13px 32px rgba(49, 46, 129, .23);
}

.product-header-card::before,
.product-header-card::after {
    content: "";
    position: absolute;
    border-radius: 50%;
    background: rgba(255,255,255,.08);
    pointer-events: none;
}

.product-header-card::before {
    width: 230px;
    height: 230px;
    right: 8%;
    top: -145px;
}

.product-header-card::after {
    width: 145px;
    height: 145px;
    right: 25%;
    bottom: -110px;
}

.product-icon,
.product-header-info,
.protection-badge {
    position: relative;
    z-index: 1;
}

.product-icon {
    width: 68px;
    height: 68px;
    flex-shrink: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 19px;
    background: linear-gradient(135deg, #fbbf24, #f97316);
    color: #ffffff;
    font-size: 29px;
    box-shadow: 0 8px 20px rgba(0,0,0,.20);
}

.section-label {
    color: #a5f3fc;
    font-size: 10px;
    font-weight: 900;
    letter-spacing: 1.7px;
}

.product-header-info {
    min-width: 0;
    flex: 1;
}

.product-header-info h2 {
    margin: 6px 0 10px;
    color: #ffffff;
    font-size: 25px;
    font-weight: 900;
    overflow-wrap: anywhere;
}

.product-meta {
    display: flex;
    flex-wrap: wrap;
    gap: 16px;
    color: #e0e7ff;
    font-size: 11px;
    font-weight: 700;
}

.product-meta span {
    display: inline-flex;
    align-items: center;
    gap: 6px;
}

.product-meta i {
    color: #fcd34d;
}

.protection-badge {
    display: inline-flex;
    align-items: center;
    gap: 7px;
    padding: 11px 14px;
    margin-left: auto;
    border: 1px solid #6ee7b7;
    border-radius: 12px;
    background: #d1fae5;
    color: #065f46;
    font-size: 10px;
    font-weight: 900;
    white-space: nowrap;
    box-shadow: 0 5px 14px rgba(0,0,0,.12);
}

/* VALIDATION */

.error-card {
    display: flex;
    align-items: flex-start;
    gap: 14px;
    padding: 18px;
    margin-bottom: 22px;
    border: 1px solid #fda4af;
    border-left: 5px solid #e11d48;
    border-radius: 14px;
    background: #fff1f2;
    color: #9f1239;
    box-shadow: 0 6px 17px rgba(225, 29, 72, .07);
}

.error-icon {
    flex-shrink: 0;
    color: #e11d48;
    font-size: 22px;
}

.error-card h6 {
    margin: 0 0 8px;
    font-size: 14px;
    font-weight: 900;
}

.error-card ul {
    margin: 0;
    padding-left: 18px;
    font-size: 12px;
    line-height: 1.8;
}

/* FORM LAYOUT */

.form-grid {
    display: grid;
    grid-template-columns: minmax(0, 1.7fr) minmax(290px, .85fr);
    gap: 23px;
    align-items: start;
}

/* FORM CARDS */

.form-card {
    position: relative;
    padding: 25px;
    margin-bottom: 21px;
    overflow: hidden;
    border: 1px solid #dbe4f5;
    border-top: 5px solid #4f46e5;
    border-radius: 18px;
    background: #ffffff;
    box-shadow: 0 8px 25px rgba(30, 41, 90, .065);
    transition: .25s ease;
}

.form-card:hover {
    transform: translateY(-2px);
    box-shadow: 0 13px 32px rgba(30, 41, 90, .10);
}

.form-card:nth-child(1) {
    border-top-color: #059669;
}

.form-card:nth-child(2) {
    border-top-color: #2563eb;
}

.form-card:nth-child(3) {
    border-top-color: #9333ea;
}

.form-card:nth-child(4) {
    border-top-color: #f97316;
}

/* SECTION HEADINGS */

.card-heading {
    display: flex;
    align-items: center;
    gap: 13px;
    margin-bottom: 24px;
}

.card-heading h4 {
    margin: 0 0 5px;
    color: #172554;
    font-size: 17px;
    font-weight: 900;
}

.card-heading p {
    margin: 0;
    color: #64748b;
    font-size: 11px;
}

.heading-icon {
    width: 46px;
    height: 46px;
    flex-shrink: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 14px;
    font-size: 19px;
}

.heading-icon.green {
    color: #047857;
    background: #d1fae5;
    border: 1px solid #a7f3d0;
}

.heading-icon.blue {
    color: #1d4ed8;
    background: #dbeafe;
    border: 1px solid #bfdbfe;
}

.heading-icon.purple {
    color: #7e22ce;
    background: #f3e8ff;
    border: 1px solid #e9d5ff;
}

.heading-icon.orange {
    color: #c2410c;
    background: #ffedd5;
    border: 1px solid #fed7aa;
}

/* FORM LABELS */

.form-label {
    display: block;
    margin-bottom: 9px;
    color: #263b64;
    font-size: 12px;
    font-weight: 850;
}

.form-label span {
    color: #e11d48;
}

/* INPUTS */

.custom-input {
    width: 100%;
    min-height: 49px;
    padding: 11px 14px;
    border: 1.5px solid #cbd5e1;
    border-radius: 11px;
    background: #f8faff;
    color: #172554;
    font-size: 13px;
    font-weight: 550;
    box-shadow: none;
    transition: .22s ease;
}

.custom-input::placeholder {
    color: #94a3b8;
}

.custom-input:hover {
    border-color: #818cf8;
    background: #ffffff;
}

.custom-input:focus {
    border-color: #4f46e5;
    background: #ffffff;
    color: #172554;
    outline: none;
    box-shadow: 0 0 0 4px rgba(79, 70, 229, .12);
}

.terms-input {
    min-height: 135px;
    resize: vertical;
    line-height: 1.7;
}

.input-help {
    display: block;
    margin-top: 8px;
    color: #64748b;
    font-size: 10px;
    line-height: 1.6;
}

/* DATE INPUT */

.input-icon-wrapper {
    position: relative;
}

.input-icon-wrapper > i {
    position: absolute;
    z-index: 2;
    top: 50%;
    left: 14px;
    transform: translateY(-50%);
    color: #4f46e5;
    pointer-events: none;
}

.custom-input.with-icon {
    padding-left: 42px;
}

/* PERIOD INFO */

.period-info {
    display: flex;
    align-items: flex-start;
    gap: 10px;
    padding: 14px;
    margin-top: 19px;
    border: 1px solid #bfdbfe;
    border-left: 4px solid #2563eb;
    border-radius: 12px;
    background: #eff6ff;
    color: #1e40af;
    font-size: 11px;
    font-weight: 600;
    line-height: 1.7;
}

.period-info i {
    flex-shrink: 0;
    margin-top: 2px;
    font-size: 15px;
}

/* DOCUMENT UPLOAD */

.upload-box {
    position: relative;
    display: flex;
    align-items: center;
    gap: 16px;
    min-height: 125px;
    padding: 21px;
    overflow: hidden;
    border: 2px dashed #a78bfa;
    border-radius: 15px;
    background: linear-gradient(120deg, #f5f3ff, #fff7ed);
    transition: .25s ease;
}

.upload-box:hover {
    border-color: #7c3aed;
    background: linear-gradient(120deg, #ede9fe, #ffedd5);
    box-shadow: 0 6px 18px rgba(124, 58, 237, .10);
}

.upload-icon {
    width: 53px;
    height: 53px;
    flex-shrink: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 15px;
    background: linear-gradient(135deg, #7c3aed, #db2777);
    color: #ffffff;
    font-size: 23px;
    box-shadow: 0 6px 15px rgba(124, 58, 237, .22);
}

.upload-content {
    min-width: 0;
}

.upload-label {
    display: inline-block;
    margin: 0;
    color: #6d28d9;
    font-size: 12px;
    font-weight: 900;
    cursor: pointer;
}

.upload-label:hover {
    color: #be185d;
}

.upload-content p {
    margin: 5px 0 3px;
    color: #475569;
    font-size: 10px;
}

.upload-content span {
    color: #64748b;
    font-size: 10px;
}

.upload-box input[type="file"] {
    position: absolute;
    inset: 0;
    width: 100%;
    height: 100%;
    opacity: 0;
    cursor: pointer;
}

.selected-file {
    padding: 11px 13px;
    margin-top: 11px;
    border: 1px solid #6ee7b7;
    border-radius: 10px;
    background: #d1fae5;
    color: #065f46;
    font-size: 11px;
    font-weight: 800;
    overflow-wrap: anywhere;
}

/* SUMMARY PANEL */

.summary-card {
    position: sticky;
    top: 90px;
    padding: 23px;
    border: 1px solid #c7d2fe;
    border-top: 5px solid #4f46e5;
    border-radius: 19px;
    background: #ffffff;
    box-shadow: 0 10px 30px rgba(49, 46, 129, .10);
}

.summary-top {
    display: flex;
    align-items: center;
    gap: 13px;
}

.summary-shield {
    width: 48px;
    height: 48px;
    flex-shrink: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 14px;
    background: linear-gradient(135deg, #4f46e5, #0891b2);
    color: #ffffff;
    font-size: 22px;
    box-shadow: 0 6px 15px rgba(79, 70, 229, .20);
}

.summary-top span {
    display: block;
    color: #0d9488;
    font-size: 9px;
    font-weight: 950;
    letter-spacing: 1.5px;
}

.summary-top h4 {
    margin: 4px 0 0;
    color: #172554;
    font-size: 17px;
    font-weight: 900;
}

.summary-divider {
    height: 3px;
    margin: 20px 0;
    border-radius: 5px;
    background: linear-gradient(90deg, #4f46e5, #06b6d4, #10b981, transparent);
}

/* PRODUCT SUMMARY */

.summary-product {
    display: flex;
    align-items: center;
    gap: 12px;
    padding: 13px;
    margin-bottom: 19px;
    border: 1px solid #bfdbfe;
    border-radius: 13px;
    background: linear-gradient(120deg, #eff6ff, #eef2ff);
}

.summary-product img,
.summary-placeholder {
    width: 62px;
    height: 62px;
    flex-shrink: 0;
    border: 2px solid #ffffff;
    border-radius: 12px;
    object-fit: cover;
    background: #dbeafe;
    box-shadow: 0 4px 12px rgba(37, 99, 235, .12);
}

.summary-placeholder {
    display: flex;
    align-items: center;
    justify-content: center;
    color: #2563eb;
    font-size: 23px;
}

.summary-product strong {
    display: block;
    color: #172554;
    font-size: 12px;
    font-weight: 900;
    overflow-wrap: anywhere;
}

.summary-product small {
    display: block;
    margin-top: 5px;
    color: #475569;
    font-size: 10px;
}

/* SUMMARY DETAILS */

.summary-item {
    padding: 13px;
    margin-bottom: 10px;
    border: 1px solid #e2e8f0;
    border-radius: 11px;
    background: #f8fafc;
}

.summary-item span {
    display: flex;
    align-items: center;
    gap: 7px;
    margin-bottom: 6px;
    color: #64748b;
    font-size: 10px;
    font-weight: 800;
}

.summary-item span i {
    color: #4f46e5;
    font-size: 13px;
}

.summary-item strong {
    display: block;
    color: #172554;
    font-size: 12px;
    font-weight: 900;
    overflow-wrap: anywhere;
}

/* SUMMARY NOTE */

.summary-note {
    display: flex;
    gap: 10px;
    padding: 14px;
    margin-top: 16px;
    border: 1px solid #fde68a;
    border-left: 4px solid #f59e0b;
    border-radius: 12px;
    background: #fffbeb;
}

.summary-note i {
    flex-shrink: 0;
    margin-top: 2px;
    color: #d97706;
    font-size: 16px;
}

.summary-note p {
    margin: 0;
    color: #78350f;
    font-size: 10px;
    line-height: 1.7;
}

/* SECURITY PANEL */

.secure-card {
    display: flex;
    gap: 12px;
    padding: 16px;
    margin-top: 17px;
    border: 1px solid #6ee7b7;
    border-left: 4px solid #059669;
    border-radius: 13px;
    background: linear-gradient(120deg, #d1fae5, #ecfdf5);
    color: #047857;
}

.secure-card > i {
    flex-shrink: 0;
    margin-top: 1px;
    font-size: 21px;
}

.secure-card strong {
    display: block;
    color: #065f46;
    font-size: 12px;
    font-weight: 900;
}

.secure-card p {
    margin: 5px 0 0;
    color: #166534;
    font-size: 10px;
    line-height: 1.6;
}

/* BOTTOM ACTIONS */

.bottom-actions {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 14px;
    margin-top: 10px;
    padding-bottom: 12px;
}

.btn-back,
.btn-save {
    min-height: 49px;
    padding: 0 22px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 9px;
    border-radius: 12px;
    text-decoration: none;
    font-size: 12px;
    font-weight: 900;
    transition: .23s ease;
}

.btn-back {
    border: 1px solid #c7d2fe;
    background: #eef2ff;
    color: #3730a3;
}

.btn-back:hover {
    transform: translateY(-2px);
    border-color: #4f46e5;
    background: #4f46e5;
    color: #ffffff;
    box-shadow: 0 7px 17px rgba(79, 70, 229, .20);
}

.btn-save {
    border: 0;
    background: linear-gradient(110deg, #059669, #0d9488);
    color: #ffffff;
    cursor: pointer;
    box-shadow: 0 7px 18px rgba(5, 150, 105, .23);
}

.btn-save:hover {
    transform: translateY(-2px);
    background: linear-gradient(110deg, #047857, #0f766e);
    color: #ffffff;
    box-shadow: 0 10px 22px rgba(5, 150, 105, .30);
}

.btn-back:active,
.btn-save:active {
    transform: scale(.97);
}

/* RESPONSIVE */

@media (max-width: 950px) {
    .form-grid {
        grid-template-columns: 1fr;
    }

    .summary-card {
        position: static;
    }
}

@media (max-width: 600px) {
    .product-header-card {
        flex-wrap: wrap;
        align-items: flex-start;
        padding: 19px;
        border-radius: 18px;
    }

    .product-icon {
        width: 53px;
        height: 53px;
        border-radius: 15px;
        font-size: 23px;
    }

    .product-header-info {
        flex: 1;
        min-width: 0;
    }

    .product-header-info h2 {
        font-size: 19px;
    }

    .protection-badge {
        margin-left: 0;
    }

    .form-card {
        padding: 19px;
    }

    .summary-card {
        padding: 19px;
    }

    .bottom-actions {
        flex-direction: column-reverse;
        align-items: stretch;
    }

    .btn-back,
    .btn-save {
        width: 100%;
    }

    .upload-box {
        padding: 15px;
    }
}

@media (max-width: 380px) {
    .product-meta {
        flex-direction: column;
        gap: 7px;
    }

    .card-heading h4 {
        font-size: 15px;
    }

    .heading-icon {
        width: 40px;
        height: 40px;
        font-size: 17px;
    }

    .charge-box {
        padding: 11px;
    }
}

</style>
@endpush
