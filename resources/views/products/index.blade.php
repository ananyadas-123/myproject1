@extends('layouts.app')

@section('page_title', 'My Products')
@section('page_subtitle', 'Manage all your registered products and their lifecycle')

@section('content')

<style>
    .products-page {
        padding-bottom: 35px;
    }

    .products-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 20px;
        margin-bottom: 25px;
    }

    .products-title-wrap {
        display: flex;
        align-items: center;
        gap: 15px;
    }

    .products-icon {
        width: 52px;
        height: 52px;
        border-radius: 15px;
        background: linear-gradient(135deg, #176b4d, #23966b);
        color: #fff;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 24px;
        box-shadow: 0 8px 20px rgba(23, 107, 77, .18);
    }

    .products-title h2 {
        margin: 0;
        font-size: 25px;
        font-weight: 800;
        color: #16352a;
        letter-spacing: -.4px;
    }

    .products-title p {
        margin: 4px 0 0;
        font-size: 13px;
        color: #718078;
    }

    .add-product-btn {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 12px 18px;
        border-radius: 12px;
        background: linear-gradient(135deg, #176b4d, #23966b);
        color: #fff;
        text-decoration: none;
        font-size: 13px;
        font-weight: 800;
        box-shadow: 0 8px 18px rgba(23, 107, 77, .18);
        transition: .2s ease;
    }

    .add-product-btn:hover {
        color: #fff;
        transform: translateY(-2px);
        box-shadow: 0 12px 24px rgba(23, 107, 77, .25);
    }

    .success-message {
        border: 0;
        border-radius: 14px;
        background: #ecfdf5;
        color: #166534;
        font-size: 13px;
        font-weight: 600;
        padding: 14px 17px;
        margin-bottom: 22px;
    }

    .products-grid {
        display: grid;
        grid-template-columns: repeat(3, minmax(0, 1fr));
        gap: 22px;
    }

    .product-card {
        background: #fff;
        border: 1px solid #e7eee9;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 8px 28px rgba(25, 60, 45, .07);
        transition: .25s ease;
    }

    .product-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 16px 38px rgba(25, 60, 45, .12);
    }

    .product-image-wrap {
        height: 215px;
        background: linear-gradient(135deg, #f0fdf7, #f7fbf9);
        position: relative;
        overflow: hidden;
    }

    .product-image {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
    }

    .product-placeholder {
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #8aa296;
        font-size: 55px;
    }

    .status-badge {
        position: absolute;
        top: 14px;
        right: 14px;
        padding: 7px 11px;
        border-radius: 999px;
        background: rgba(255,255,255,.94);
        color: #166534;
        font-size: 10px;
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: .5px;
        box-shadow: 0 4px 12px rgba(0,0,0,.08);
    }

    .product-body {
        padding: 19px;
    }

    .product-category {
        font-size: 10px;
        font-weight: 800;
        color: #23966b;
        text-transform: uppercase;
        letter-spacing: .8px;
        margin-bottom: 6px;
    }

    .product-name {
        font-size: 18px;
        font-weight: 800;
        color: #19382d;
        margin-bottom: 15px;
    }

    .product-info {
        display: grid;
        gap: 10px;
    }

    .info-row {
        display: flex;
        justify-content: space-between;
        gap: 15px;
        font-size: 12px;
    }

    .info-label {
        color: #84918b;
        display: flex;
        align-items: center;
        gap: 6px;
    }

    .info-label i {
        color: #23966b;
    }

    .info-value {
        color: #31473e;
        font-weight: 700;
        text-align: right;
    }

    .product-divider {
        height: 1px;
        background: #edf2ef;
        margin: 16px 0;
    }

    .product-actions {
        display: flex;
        gap: 9px;
    }

    .btn-view,
    .btn-lifecycle {
        flex: 1;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 6px;
        padding: 11px 10px;
        border-radius: 11px;
        font-size: 11px;
        font-weight: 800;
        text-decoration: none;
        transition: .2s ease;
    }

    .btn-view {
        background: #f0fdf4;
        color: #15803d;
        border: 1px solid #dcfce7;
    }

    .btn-view:hover {
        background: #dcfce7;
        color: #166534;
    }

    .btn-lifecycle {
        background: #176b4d;
        color: #fff;
        border: 1px solid #176b4d;
    }

    .btn-lifecycle:hover {
        background: #12583e;
        color: #fff;
        transform: translateY(-1px);
    }

    .price-footer {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-top: 15px;
        padding-top: 13px;
        border-top: 1px solid #edf2ef;
    }

    .price-label {
        font-size: 10px;
        color: #8a9791;
        text-transform: uppercase;
        letter-spacing: .5px;
    }

    .price {
        font-size: 16px;
        font-weight: 800;
        color: #19382d;
    }

    .empty-state {
        background: #fff;
        border: 1px dashed #cfdcd5;
        border-radius: 22px;
        padding: 65px 25px;
        text-align: center;
    }

    .empty-icon {
        width: 70px;
        height: 70px;
        margin: 0 auto 18px;
        border-radius: 20px;
        background: #ecfdf5;
        color: #176b4d;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 30px;
    }

    .empty-state h3 {
        font-size: 20px;
        font-weight: 800;
        color: #19382d;
        margin-bottom: 8px;
    }

    .empty-state p {
        color: #7a8881;
        font-size: 13px;
        margin-bottom: 20px;
    }

    @media (max-width: 1100px) {
        .products-grid {
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }
    }

    @media (max-width: 700px) {
        .products-header {
            align-items: flex-start;
            flex-direction: column;
        }

        .add-product-btn {
            width: 100%;
            justify-content: center;
        }

        .products-grid {
            grid-template-columns: 1fr;
        }

        .product-actions {
            flex-direction: column;
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