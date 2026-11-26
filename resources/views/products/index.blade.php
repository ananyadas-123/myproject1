
@extends('layouts.app')

@section('page_title', 'My Products')
@section('page_subtitle', 'Manage all your registered products and their lifecycle')

@section('content')

<style>
/* ==========================================
   PRODUCTLIFE | MY PRODUCTS
   Premium Purple / Blue / Emerald Theme
========================================== */

.products-page {
    width: 100%;
    max-width: 1300px;
    margin: 0 auto;
    padding: 8px 0 45px;
    color: #172033;
}

.products-page,
.products-page * {
    box-sizing: border-box;
}

/* ==========================================
   PAGE HEADER
========================================== */

.products-page .products-header {
    position: relative;
    isolation: isolate;
    overflow: hidden;
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 22px;
    padding: 30px;
    margin-bottom: 27px;
    min-height: 155px;
    border-radius: 22px;
    background: linear-gradient(115deg, #111a40 0%, #302477 48%, #2563eb 100%);
    box-shadow: 0 15px 35px rgba(37, 52, 125, .22);
}

.products-page .products-header::before {
    content: "";
    position: absolute;
    z-index: -1;
    width: 300px;
    height: 300px;
    top: -190px;
    right: 100px;
    border: 35px solid rgba(255,255,255,.07);
    border-radius: 50%;
    pointer-events: none;
}

.products-page .products-header::after {
    content: "";
    position: absolute;
    z-index: -1;
    width: 210px;
    height: 210px;
    right: -55px;
    bottom: -150px;
    border: 35px solid rgba(103,232,249,.13);
    border-radius: 50%;
    pointer-events: none;
}

.products-page .products-title-wrap {
    position: relative;
    z-index: 1;
    display: flex;
    align-items: center;
    gap: 17px;
    min-width: 0;
}

.products-page .products-icon {
    width: 62px;
    height: 62px;
    flex-shrink: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 17px;
    background: linear-gradient(135deg, rgba(255,255,255,.22), rgba(255,255,255,.08));
    border: 1px solid rgba(255,255,255,.3);
    color: #fff;
    font-size: 27px;
    box-shadow: 0 8px 20px rgba(0,0,0,.13);
}

.products-page .products-title h2 {
    margin: 0;
    color: #fff;
    font-size: 27px;
    font-weight: 900;
    letter-spacing: -.7px;
}

.products-page .products-title p {
    margin: 7px 0 0;
    color: #dbeafe;
    font-size: 12.5px;
    line-height: 1.7;
}

.products-page .add-product-btn {
    position: relative;
    z-index: 2;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 9px;
    flex-shrink: 0;
    padding: 14px 21px;
    border-radius: 11px;
    background: #fff;
    color: #3730a3;
    border: 1px solid rgba(255,255,255,.8);
    text-decoration: none;
    font-size: 12px;
    font-weight: 900;
    box-shadow: 0 8px 20px rgba(0,0,0,.15);
    transition: .25s ease;
}

.products-page .add-product-btn:hover {
    background: #cffafe;
    color: #164e63;
    transform: translateY(-3px);
    box-shadow: 0 12px 25px rgba(0,0,0,.2);
}

/* ==========================================
   SUCCESS MESSAGE
========================================== */

.products-page .success-message {
    display: flex;
    align-items: center;
    gap: 9px;
    padding: 15px 18px;
    margin-bottom: 24px;
    border: 1px solid #86efac;
    border-left: 5px solid #16a34a;
    border-radius: 12px;
    background: #dcfce7;
    color: #14532d;
    font-size: 12.5px;
    font-weight: 800;
    box-shadow: 0 5px 15px rgba(20,100,50,.07);
}

/* ==========================================
   PRODUCT GRID
========================================== */

.products-page .products-grid {
    display: grid;
    grid-template-columns: repeat(3, minmax(0, 1fr));
    gap: 23px;
    align-items: stretch;
}

/* ==========================================
   PRODUCT CARD
========================================== */

.products-page .product-card {
    position: relative;
    display: flex;
    flex-direction: column;
    min-width: 0;
    overflow: hidden;
    border: 1px solid #e0e7f1;
    border-radius: 19px;
    background: #fff;
    box-shadow: 0 8px 25px rgba(15,23,42,.07);
    transition: transform .3s ease, box-shadow .3s ease, border-color .3s ease;
}

.products-page .product-card::before {
    content: "";
    position: absolute;
    z-index: 4;
    top: 0;
    left: 0;
    width: 100%;
    height: 4px;
    background: linear-gradient(90deg, #4338ca, #2563eb, #06b6d4, #10b981);
}

.products-page .product-card:hover {
    transform: translateY(-7px);
    border-color: #a5b4fc;
    box-shadow: 0 19px 42px rgba(49,46,129,.15);
}

/* ==========================================
   PRODUCT IMAGE
========================================== */

.products-page .product-image-wrap {
    position: relative;
    overflow: hidden;
    height: 225px;
    background: linear-gradient(145deg, #e0e7ff, #dbeafe);
    border-bottom: 1px solid #e0e7ff;
}

.products-page .product-image-wrap::after {
    content: "";
    position: absolute;
    inset: 50% 0 0;
    background: linear-gradient(transparent, rgba(15,23,42,.25));
    pointer-events: none;
}

.products-page .product-image {
    display: block;
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform .5s ease;
}

.products-page .product-card:hover .product-image {
    transform: scale(1.07);
}

.products-page .product-placeholder {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 100%;
    height: 100%;
    color: #4338ca;
    font-size: 58px;
    background:
        radial-gradient(circle at 20% 20%, rgba(255,255,255,.8), transparent 40%),
        linear-gradient(145deg, #dbeafe, #ede9fe);
}

/* ==========================================
   STATUS BADGE
========================================== */

.products-page .status-badge {
    position: absolute;
    z-index: 3;
    top: 16px;
    right: 15px;
    max-width: calc(100% - 30px);
    overflow: hidden;
    padding: 8px 13px;
    border: 1px solid rgba(255,255,255,.8);
    border-radius: 9px;
    background: rgba(255,255,255,.96);
    color: #047857;
    font-size: 9.5px;
    font-weight: 900;
    text-transform: uppercase;
    letter-spacing: .7px;
    white-space: nowrap;
    text-overflow: ellipsis;
    box-shadow: 0 5px 15px rgba(0,0,0,.13);
}

/* ==========================================
   PRODUCT BODY
========================================== */

.products-page .product-body {
    display: flex;
    flex-direction: column;
    flex: 1;
    padding: 20px;
}

.products-page .product-category {
    display: inline-flex;
    align-self: flex-start;
    max-width: 100%;
    overflow: hidden;
    padding: 6px 10px;
    margin-bottom: 10px;
    border: 1px solid #c7d2fe;
    border-radius: 7px;
    background: #eef2ff;
    color: #4338ca;
    font-size: 9.5px;
    font-weight: 900;
    text-transform: uppercase;
    letter-spacing: .7px;
    text-overflow: ellipsis;
    white-space: nowrap;
}

.products-page .product-name {
    margin-bottom: 17px;
    color: #172554;
    font-size: 18px;
    font-weight: 900;
    line-height: 1.45;
    overflow-wrap: anywhere;
}

/* ==========================================
   PRODUCT INFORMATION
========================================== */

.products-page .product-info {
    display: grid;
    gap: 9px;
}

.products-page .info-row {
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 12px;
    padding: 11px 12px;
    border: 1px solid #e6eaf2;
    border-radius: 10px;
    background: #f8faff;
    font-size: 11.5px;
    transition: .2s ease;
}

.products-page .info-row:hover {
    border-color: #c7d2fe;
    background: #f1f5ff;
}

.products-page .info-label {
    display: flex;
    align-items: center;
    gap: 7px;
    flex-shrink: 0;
    color: #64748b;
    font-weight: 750;
}

.products-page .info-label i {
    color: #4f46e5;
    font-size: 14px;
}

.products-page .info-value {
    min-width: 0;
    color: #1e293b;
    font-weight: 850;
    text-align: right;
    overflow-wrap: anywhere;
}

.products-page .product-divider {
    height: 1px;
    margin: 17px 0;
    background: linear-gradient(90deg, #c7d2fe, #e2e8f0, transparent);
}

/* ==========================================
   ACTION BUTTONS
========================================== */

.products-page .product-actions {
    display: flex;
    align-items: stretch;
    gap: 7px;
    margin-top: auto;
}

.products-page .btn-view,
.products-page .btn-lifecycle,
.products-page .btn-repair {
    display: inline-flex;
    flex: 1;
    align-items: center;
    justify-content: center;
    gap: 5px;
    min-width: 0;
    min-height: 43px;
    padding: 9px 6px;
    border-radius: 9px;
    font-size: 9.5px;
    font-weight: 900;
    text-decoration: none;
    text-align: center;
    transition: .22s ease;
}

.products-page .btn-view {
    border: 1px solid #7dd3fc;
    background: #e0f2fe;
    color: #075985;
}

.products-page .btn-view:hover {
    border-color: #0284c7;
    background: #bae6fd;
    color: #0c4a6e;
    transform: translateY(-2px);
}

.products-page .btn-lifecycle {
    border: 1px solid #4f46e5;
    background: linear-gradient(120deg, #4338ca, #6366f1);
    color: #fff;
    box-shadow: 0 4px 10px rgba(79,70,229,.17);
}

.products-page .btn-lifecycle:hover {
    background: linear-gradient(120deg, #312e81, #4338ca);
    color: #fff;
    transform: translateY(-2px);
}

.products-page .btn-repair {
    border: 1px solid #fdba74;
    background: #fff0dc;
    color: #9a3412;
}

.products-page .btn-repair:hover {
    border-color: #f97316;
    background: #fed7aa;
    color: #7c2d12;
    transform: translateY(-2px);
}

/* ==========================================
   PRICE FOOTER
========================================== */

.products-page .price-footer {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 10px;
    margin-top: 17px;
    padding: 13px;
    border: 1px solid #a7f3d0;
    border-radius: 11px;
    background: linear-gradient(110deg, #ecfdf5, #f0fdfa);
}

.products-page .price-label {
    color: #047857;
    font-size: 9.5px;
    font-weight: 900;
    text-transform: uppercase;
    letter-spacing: .6px;
}

.products-page .price {
    color: #065f46;
    font-size: 18px;
    font-weight: 950;
    overflow-wrap: anywhere;
}

/* ==========================================
   EMPTY STATE
========================================== */

.products-page .empty-state {
    padding: 65px 25px;
    border: 2px dashed #a5b4fc;
    border-radius: 21px;
    background:
        radial-gradient(circle at 15% 15%, rgba(219,234,254,.5), transparent 35%),
        #fff;
    text-align: center;
    box-shadow: 0 12px 30px rgba(49,46,129,.06);
}

.products-page .empty-icon {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 82px;
    height: 82px;
    margin: 0 auto 20px;
    border: 1px solid #c7d2fe;
    border-radius: 23px;
    background: linear-gradient(135deg, #dbeafe, #ede9fe);
    color: #4338ca;
    font-size: 34px;
    box-shadow: 0 8px 20px rgba(79,70,229,.1);
}

.products-page .empty-state h3 {
    margin: 0 0 9px;
    color: #172554;
    font-size: 22px;
    font-weight: 900;
}

.products-page .empty-state p {
    max-width: 470px;
    margin: 0 auto 23px;
    color: #64748b;
    font-size: 12.5px;
    line-height: 1.8;
}

.products-page .empty-state .add-product-btn {
    display: inline-flex;
    background: linear-gradient(120deg, #4338ca, #2563eb);
    border-color: transparent;
    color: #fff;
}

.products-page .empty-state .add-product-btn:hover {
    background: linear-gradient(120deg, #312e81, #1d4ed8);
    color: #fff;
}

/* ==========================================
   TABLET
========================================== */

@media (max-width: 1100px) {
    .products-page .products-grid {
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 20px;
    }
}

/* ==========================================
   MOBILE
========================================== */

@media (max-width: 700px) {
    .products-page .products-header {
        align-items: flex-start;
        flex-direction: column;
        padding: 23px 20px;
    }

    .products-page .products-title h2 {
        font-size: 23px;
    }

    .products-page .products-title p {
        font-size: 11.5px;
    }

    .products-page .products-icon {
        width: 53px;
        height: 53px;
        font-size: 23px;
    }

    .products-page .add-product-btn {
        width: 100%;
    }

    .products-page .products-grid {
        grid-template-columns: 1fr;
        gap: 19px;
    }

    .products-page .product-image-wrap {
        height: 230px;
    }

    .products-page .product-body {
        padding: 19px;
    }

    .products-page .product-actions {
        gap: 8px;
    }

    .products-page .btn-view,
    .products-page .btn-lifecycle,
    .products-page .btn-repair {
        min-height: 44px;
        font-size: 10.5px;
    }

    .products-page .empty-state {
        padding: 48px 19px;
    }

    .products-page .empty-state h3 {
        font-size: 19px;
    }
}

/* SMALL MOBILE */

@media (max-width: 390px) {
    .products-page .product-actions {
        flex-direction: column;
    }

    .products-page .btn-view,
    .products-page .btn-lifecycle,
    .products-page .btn-repair {
        width: 100%;
        min-height: 43px;
        font-size: 11px;
    }

    .products-page .products-title h2 {
        font-size: 21px;
    }

    .products-page .product-name {
        font-size: 16px;
    }
}

/* REDUCED MOTION */

@media (prefers-reduced-motion: reduce) {
    .products-page .product-card,
    .products-page .product-image,
    .products-page .add-product-btn,
    .products-page .btn-view,
    .products-page .btn-lifecycle,
    .products-page .btn-repair {
        transition: none !important;
    }
}
</style>


<div class="products-page">

    {{-- HEADER --}}
    <div class="products-header">

        <div class="products-title-wrap">

            <div class="products-icon">
                <i class="bi bi-box-seam"></i>
            </div>

            <div class="products-title">
                <h2>My Products</h2>
                <p>Track and manage your complete product lifecycle</p>
            </div>

        </div>

        <a href="{{ route('products.create') }}" class="add-product-btn">
            <i class="bi bi-plus-lg"></i>
            Add New Product
        </a>

    </div>


    {{-- SUCCESS MESSAGE --}}
    @if(session('success'))
        <div class="success-message">
            <i class="bi bi-check-circle-fill"></i>
            {{ session('success') }}
        </div>
    @endif


    {{-- PRODUCTS --}}
    @if($products->count())

        <div class="products-grid">

            @foreach($products as $product)

                <div class="product-card">

                    {{-- PRODUCT IMAGE --}}
                    <div class="product-image-wrap">

                        @if($product->image)
                            <img
                                src="{{ asset('storage/' . $product->image) }}"
                                alt="{{ $product->brand }} {{ $product->model }}"
                                class="product-image"
                            >
                        @else
                            <div class="product-placeholder">
                                <i class="bi bi-box-seam"></i>
                            </div>
                        @endif

                        <span class="status-badge">
                            {{ $product->status ?? 'Active' }}
                        </span>

                    </div>


                    {{-- PRODUCT BODY --}}
                    <div class="product-body">

                        <div class="product-category">
                            {{ $product->category ?? 'Product' }}
                        </div>

                        <div class="product-name">
                            {{ $product->brand }} {{ $product->model }}
                        </div>


                        {{-- PRODUCT INFORMATION --}}
                        <div class="product-info">

                            <div class="info-row">

                                <span class="info-label">
                                    <i class="bi bi-upc-scan"></i>
                                    Serial
                                </span>

                                <span class="info-value">
                                    {{ $product->serial_number }}
                                </span>

                            </div>


                            <div class="info-row">

                                <span class="info-label">
                                    <i class="bi bi-calendar3"></i>
                                    Purchased
                                </span>

                                <span class="info-value">
                                    {{ $product->purchase_date?->format('d M Y') }}
                                </span>

                            </div>

                        </div>


                        <div class="product-divider"></div>


                        {{-- ACTION BUTTONS --}}
                        <div class="product-actions">

                            <a
                                href="{{ route('products.show', $product->id) }}"
                                class="btn-view"
                            >
                                <i class="bi bi-eye"></i>
                                View Product
                            </a>

                            <a
                                href="{{ route('products.lifecycle', $product->id) }}"
                                class="btn-lifecycle"
                            >
                                <i class="bi bi-diagram-3"></i>
                                Lifecycle
                            </a>

                            <a
                                href="{{ route('repair_requests.create', $product->id) }}"
                                class="btn-repair"
                            >
                                <i class="bi bi-tools"></i>
                                Request Repair
                            </a>

                        </div>


                        {{-- PURCHASE PRICE --}}
                        <div class="price-footer">

                            <span class="price-label">
                                <i class="bi bi-wallet2"></i>
                                Purchase Price
                            </span>

                            <span class="price">
                                ₹{{ number_format($product->purchase_price ?? 0, 2) }}
                            </span>

                        </div>

                    </div>

                </div>

            @endforeach

        </div>

    @else

        {{-- EMPTY STATE --}}
        <div class="empty-state">

            <div class="empty-icon">
                <i class="bi bi-box-seam"></i>
            </div>

            <h3>No Products Added Yet</h3>

            <p>
                Start your ProductLife journey by registering your first product.
                Your product details and lifecycle information will be available here.
            </p>

            <a href="{{ route('products.create') }}" class="add-product-btn">
                <i class="bi bi-plus-lg"></i>
                Add Your First Product
            </a>

        </div>

    @endif

</div>

@endsection
