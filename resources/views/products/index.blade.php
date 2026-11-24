@extends('layouts.app')

@section('page_title', 'My Products')
@section('page_subtitle', 'Manage all your registered products and their lifecycle')

@section('content')

<style>
     
/* ==========================================
   PRODUCTLIFE | MY PRODUCTS
   Premium Emerald Product Dashboard
   Original HTML classes preserved
========================================== */

.products-page {
    padding: 8px 0 45px;
}

/* ===== HEADER ===== */

.products-page .products-header {
    position: relative;
    overflow: hidden;
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 20px;
    padding: 27px 30px;
    margin-bottom: 30px;
    border-radius: 20px;
    background: linear-gradient(120deg, #073b2b 0%, #075b3c 55%, #11834e 100%);
    box-shadow: 0 15px 35px rgba(5, 65, 40, .22);
}

.products-page .products-header::after {
    content: "";
    position: absolute;
    width: 280px;
    height: 280px;
    right: -65px;
    top: -160px;
    border-radius: 50%;
    border: 35px solid rgba(255,255,255,.07);
    pointer-events: none;
}

.products-page .products-header::before {
    content: "";
    position: absolute;
    width: 180px;
    height: 180px;
    right: 110px;
    bottom: -145px;
    border-radius: 50%;
    background: rgba(255,255,255,.07);
    pointer-events: none;
}

.products-page .products-title-wrap {
    display: flex;
    align-items: center;
    gap: 17px;
    position: relative;
    z-index: 1;
}

.products-page .products-icon {
    width: 62px;
    height: 62px;
    flex-shrink: 0;
    border-radius: 17px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 27px;
    color: #ffffff;
    background: rgba(255,255,255,.15);
    border: 1px solid rgba(255,255,255,.25);
    box-shadow: 0 8px 20px rgba(0,0,0,.12);
}

.products-page .products-title h2 {
    margin: 0;
    font-size: 27px;
    font-weight: 850;
    color: #ffffff;
    letter-spacing: -.7px;
}

.products-page .products-title p {
    margin: 6px 0 0;
    font-size: 13px;
    color: #d1fae5;
    font-weight: 500;
}

.products-page .add-product-btn {
    position: relative;
    z-index: 2;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 9px;
    padding: 14px 21px;
    border-radius: 11px;
    background: #ffffff;
    color: #075b38;
    border: 1px solid #ffffff;
    text-decoration: none;
    font-size: 13px;
    font-weight: 850;
    box-shadow: 0 8px 20px rgba(0,0,0,.15);
    transition: all .25s ease;
}

.products-page .add-product-btn:hover {
    background: #d1fae5;
    color: #06472d;
    transform: translateY(-3px);
    box-shadow: 0 12px 25px rgba(0,0,0,.20);
}

/* ===== SUCCESS MESSAGE ===== */

.products-page .success-message {
    border: 1px solid #86d6a1;
    border-left: 5px solid #16a34a;
    border-radius: 12px;
    background: #dcfce7;
    color: #14532d;
    font-size: 13px;
    font-weight: 700;
    padding: 15px 18px;
    margin-bottom: 24px;
    box-shadow: 0 5px 15px rgba(20,100,50,.07);
}

/* ===== PRODUCT GRID ===== */

.products-page .products-grid {
    display: grid;
    grid-template-columns: repeat(3, minmax(0, 1fr));
    gap: 25px;
    align-items: stretch;
}

/* ===== PRODUCT CARD ===== */

.products-page .product-card {
    position: relative;
    display: flex;
    flex-direction: column;
    min-width: 0;
    overflow: hidden;
    background: #ffffff;
    border: 1px solid #dce8df;
    border-radius: 18px;
    box-shadow: 0 8px 25px rgba(16, 55, 35, .09);
    transition: transform .3s ease, box-shadow .3s ease, border-color .3s ease;
}

.products-page .product-card::before {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 4px;
    z-index: 2;
    background: linear-gradient(90deg, #064e32, #22a45d, #a3e635);
}

.products-page .product-card:hover {
    transform: translateY(-7px);
    border-color: #3aab70;
    box-shadow: 0 20px 42px rgba(8, 75, 42, .17);
}

/* ===== IMAGE AREA ===== */

.products-page .product-image-wrap {
    height: 230px;
    position: relative;
    overflow: hidden;
    background: #e8f2eb;
    border-bottom: 1px solid #dce8df;
}

.products-page .product-image-wrap::after {
    content: "";
    position: absolute;
    inset: 45% 0 0;
    background: linear-gradient(transparent, rgba(0,0,0,.17));
    pointer-events: none;
}

.products-page .product-image {
    width: 100%;
    height: 100%;
    display: block;
    object-fit: cover;
    transition: transform .5s ease;
}

.products-page .product-card:hover .product-image {
    transform: scale(1.07);
}

.products-page .product-placeholder {
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #087443;
    font-size: 58px;
    background: linear-gradient(145deg, #d8f3e1, #effaf2);
}

/* ===== STATUS BADGE ===== */

.products-page .status-badge {
    position: absolute;
    z-index: 3;
    top: 17px;
    right: 16px;
    padding: 8px 13px;
    border-radius: 8px;
    background: #ffffff;
    color: #087443;
    border: 1px solid #b7e4c7;
    font-size: 10px;
    font-weight: 900;
    text-transform: uppercase;
    letter-spacing: .6px;
    box-shadow: 0 5px 15px rgba(0,0,0,.13);
}

/* ===== PRODUCT DETAILS ===== */

.products-page .product-body {
    display: flex;
    flex-direction: column;
    flex: 1;
    padding: 21px;
}

.products-page .product-category {
    display: inline-flex;
    align-self: flex-start;
    padding: 6px 10px;
    margin-bottom: 10px;
    border-radius: 6px;
    background: #dcfce7;
    color: #087443;
    font-size: 10px;
    font-weight: 900;
    text-transform: uppercase;
    letter-spacing: .8px;
}

.products-page .product-name {
    color: #123b29;
    font-size: 19px;
    font-weight: 850;
    line-height: 1.4;
    margin-bottom: 18px;
}

/* ===== INFO ROWS ===== */

.products-page .product-info {
    display: grid;
    gap: 10px;
}

.products-page .info-row {
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 12px;
    padding: 11px 12px;
    background: #f5f8f5;
    border: 1px solid #e4ece5;
    border-radius: 9px;
    font-size: 12px;
}

.products-page .info-label {
    display: flex;
    align-items: center;
    gap: 7px;
    color: #53685b;
    font-weight: 650;
}

.products-page .info-label i {
    color: #087443;
    font-size: 14px;
}

.products-page .info-value {
    color: #173d2a;
    font-weight: 800;
    text-align: right;
    overflow-wrap: anywhere;
}

.products-page .product-divider {
    height: 1px;
    background: #e0e9e2;
    margin: 18px 0;
}

/* ===== ACTION BUTTONS ===== */

.products-page .product-actions {
    display: flex;
    gap: 8px;
    margin-top: auto;
}

.products-page .btn-view,
.products-page .btn-lifecycle,
.products-page .btn-repair {
    flex: 1;
    min-width: 0;
    min-height: 43px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 6px;
    padding: 10px 7px;
    border-radius: 9px;
    font-size: 10px;
    font-weight: 850;
    text-decoration: none;
    transition: all .22s ease;
}

.products-page .btn-view {
    background: #e0f2fe;
    color: #075985;
    border: 1px solid #7dd3fc;
}

.products-page .btn-view:hover {
    background: #bae6fd;
    color: #0c4a6e;
    transform: translateY(-2px);
}

.products-page .btn-lifecycle {
    background: #087443;
    color: #ffffff;
    border: 1px solid #087443;
    box-shadow: 0 4px 10px rgba(8,116,67,.15);
}

.products-page .btn-lifecycle:hover {
    background: #065b35;
    color: #ffffff;
    transform: translateY(-2px);
}

.products-page .btn-repair {
    background: #fff0dc;
    color: #9a3412;
    border: 1px solid #fdba74;
}

.products-page .btn-repair:hover {
    background: #fed7aa;
    color: #7c2d12;
    transform: translateY(-2px);
}

/* ===== PRICE FOOTER ===== */

.products-page .price-footer {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-top: 18px;
    padding: 14px 13px;
    border: 1px solid #d5e9da;
    border-radius: 10px;
    background: #f0fdf4;
}

.products-page .price-label {
    font-size: 10px;
    color: #496453;
    font-weight: 850;
    text-transform: uppercase;
    letter-spacing: .6px;
}

.products-page .price {
    font-size: 19px;
    font-weight: 900;
    color: #075b38;
}

/* ===== EMPTY STATE ===== */

.products-page .empty-state {
    background: #ffffff;
    border: 2px dashed #9ab9a3;
    border-radius: 20px;
    padding: 70px 25px;
    text-align: center;
    box-shadow: 0 12px 30px rgba(20,60,40,.07);
}

.products-page .empty-icon {
    width: 78px;
    height: 78px;
    margin: 0 auto 20px;
    border-radius: 21px;
    background: #dcfce7;
    color: #087443;
    border: 1px solid #86d6a1;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 33px;
}

.products-page .empty-state h3 {
    font-size: 22px;
    font-weight: 850;
    color: #123b29;
    margin-bottom: 9px;
}

.products-page .empty-state p {
    color: #53685b;
    font-size: 13px;
    margin-bottom: 22px;
}

/* ===== TABLET ===== */

@media (max-width: 1100px) {
    .products-page .products-grid {
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 20px;
    }
}

/* ===== MOBILE ===== */

@media (max-width: 700px) {
    .products-page .products-header {
        align-items: flex-start;
        flex-direction: column;
        padding: 22px 19px;
    }

    .products-page .products-title h2 {
        font-size: 23px;
    }

    .products-page .products-icon {
        width: 52px;
        height: 52px;
    }

    .products-page .add-product-btn {
        width: 100%;
    }

    .products-page .products-grid {
        grid-template-columns: 1fr;
        gap: 19px;
    }

    .products-page .product-image-wrap {
        height: 220px;
    }

    .products-page .product-actions {
        flex-direction: column;
    }

    .products-page .btn-view,
    .products-page .btn-lifecycle,
    .products-page .btn-repair {
        width: 100%;
        min-height: 44px;
        font-size: 12px;
    }
}

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

    {{-- Header --}}
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


    {{-- Success Message --}}
    @if(session('success'))
        <div class="success-message">
            <i class="bi bi-check-circle-fill me-2"></i>
            {{ session('success') }}
        </div>
    @endif


    {{-- Products --}}
    @if($products->count())

        <div class="products-grid">

            @foreach($products as $product)

                <div class="product-card">

                    {{-- Image --}}
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


                    {{-- Body --}}
                    <div class="product-body">

                        <div class="product-category">
                            {{ $product->category ?? 'Product' }}
                        </div>

                        <div class="product-name">
                            {{ $product->brand }} {{ $product->model }}
                        </div>


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


                        {{-- Actions --}}
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


                        {{-- Price --}}
                        <div class="price-footer">

                            <span class="price-label">
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

        {{-- Empty State --}}
        <div class="empty-state">

            <div class="empty-icon">
                <i class="bi bi-box-seam"></i>
            </div>

            <h3>No Products Added Yet</h3>

            <p>
                Start your ProductLife journey by registering your first product.
            </p>

            <a href="{{ route('products.create') }}" class="add-product-btn">
                <i class="bi bi-plus-lg"></i>
                Add Your First Product
            </a>

        </div>

    @endif

</div>

@endsection