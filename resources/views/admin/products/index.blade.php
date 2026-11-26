
@extends('admin.layouts.app')

@section('title', 'Product Management')
@section('page_title', 'Product Management')
@section('page_subtitle', 'View and manage all registered products.')

@push('styles')
<style>
    .product-page {
        --product-purple: #6d28d9;
        --product-blue: #2563eb;
        --product-ink: #172033;
        --product-muted: #64748b;
    }

    .product-stat-card {
        position: relative;
        overflow: hidden;
        min-height: 145px;
        border: 0;
        border-radius: 18px;
        color: #fff;
        background: linear-gradient(120deg, #5b21b6, #7c3aed, #2563eb);
        box-shadow: 0 10px 25px rgba(91, 33, 182, .18);
    }

    .product-stat-card::before {
        content: "";
        position: absolute;
        width: 150px;
        height: 150px;
        right: -35px;
        top: -65px;
        border-radius: 50%;
        background: rgba(255,255,255,.12);
    }

    .product-stat-card::after {
        content: "";
        position: absolute;
        width: 85px;
        height: 85px;
        right: 55px;
        bottom: -55px;
        border-radius: 50%;
        background: rgba(255,255,255,.10);
    }

    .product-stat-content {
        position: relative;
        z-index: 1;
    }

    .product-stat-label {
        font-size: 13px;
        font-weight: 700;
        letter-spacing: .6px;
        text-transform: uppercase;
        color: rgba(255,255,255,.85);
    }

    .product-stat-number {
        font-size: 36px;
        font-weight: 800;
        line-height: 1.2;
        margin-top: 8px;
        color: #fff;
    }

    .product-stat-icon {
        position: absolute;
        right: 22px;
        bottom: 20px;
        font-size: 38px;
        color: rgba(255,255,255,.75);
    }

    .product-main-card {
        border: 1px solid #e5e7eb;
        border-radius: 18px;
        background: #fff;
        box-shadow: 0 8px 25px rgba(15, 23, 42, .06);
        overflow: hidden;
    }

    .product-card-heading {
        padding: 22px 25px;
        border-bottom: 1px solid #e9eaf2;
        background: linear-gradient(110deg, #faf5ff, #eff6ff);
    }

    .product-card-heading h5 {
        color: #312e81;
        font-size: 17px;
        font-weight: 800;
        margin: 0;
    }

    .product-card-heading p {
        color: #64748b;
        font-size: 13px;
        margin: 5px 0 0;
    }

    .product-card-body {
        padding: 25px;
    }

    .product-alert {
        border: 0;
        border-left: 4px solid #16a34a;
        border-radius: 10px;
        background: #dcfce7;
        color: #166534;
        font-weight: 600;
        padding: 14px 17px;
    }

    .product-search {
        display: flex;
        gap: 10px;
        margin-bottom: 22px;
    }

    .product-search .input-group {
        flex: 1;
        min-width: 0;
    }

    .product-search .input-group-text {
        border: 1px solid #d8dce8;
        border-right: 0;
        background: #f8fafc;
        color: #6d28d9;
        border-radius: 10px 0 0 10px;
    }

    .product-search .form-control {
        min-height: 45px;
        border: 1px solid #d8dce8;
        border-left: 0;
        border-radius: 0 10px 10px 0;
        color: #172033;
        font-size: 13px;
        box-shadow: none;
    }

    .product-search .form-control:focus {
        border-color: #8b5cf6;
        box-shadow: 0 0 0 3px rgba(139, 92, 246, .12);
    }

    .product-search-btn {
        min-height: 45px;
        padding: 0 23px;
        border: 0;
        border-radius: 10px;
        color: #fff;
        font-size: 13px;
        font-weight: 700;
        background: linear-gradient(110deg, #6d28d9, #2563eb);
        transition: .2s ease;
    }

    .product-search-btn:hover {
        color: #fff;
        transform: translateY(-2px);
        box-shadow: 0 5px 14px rgba(109, 40, 217, .25);
    }

    .product-reset-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        min-height: 45px;
        padding: 0 17px;
        border: 1px solid #cbd5e1;
        border-radius: 10px;
        color: #475569;
        font-size: 13px;
        font-weight: 700;
        text-decoration: none;
        background: #fff;
        transition: .2s ease;
    }

    .product-reset-btn:hover {
        color: #6d28d9;
        border-color: #8b5cf6;
        background: #f5f3ff;
    }

    .product-table-wrap {
        overflow-x: auto;
        border: 1px solid #e5e7eb;
        border-radius: 13px;
    }

    .product-table {
        min-width: 900px;
        width: 100%;
        margin: 0;
        border-collapse: separate;
        border-spacing: 0;
    }

    .product-table thead th {
        padding: 16px 15px;
        color: #fff;
        background: #312e81;
        border: 0;
        font-size: 11px;
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: .6px;
        white-space: nowrap;
    }

    .product-table tbody td {
        padding: 15px;
        color: #334155;
        font-size: 13px;
        font-weight: 500;
        border-bottom: 1px solid #edf0f5;
        vertical-align: middle;
    }

    .product-table tbody tr {
        transition: background .2s ease;
    }

    .product-table tbody tr:hover {
        background: #f5f3ff;
    }

    .product-table tbody tr:last-child td {
        border-bottom: 0;
    }

    .product-id {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        min-width: 36px;
        height: 30px;
        padding: 0 8px;
        border-radius: 8px;
        color: #6d28d9;
        background: #ede9fe;
        font-size: 12px;
        font-weight: 800;
    }

    .product-model {
        color: #172554;
        font-weight: 800;
    }

    .product-brand {
        display: inline-flex;
        padding: 6px 10px;
        border-radius: 7px;
        color: #1d4ed8;
        background: #dbeafe;
        font-size: 11px;
        font-weight: 800;
    }

    .product-category {
        display: inline-flex;
        padding: 6px 10px;
        border-radius: 7px;
        color: #047857;
        background: #d1fae5;
        font-size: 11px;
        font-weight: 800;
    }

    .product-serial {
        color: #475569;
        font-family: monospace;
        font-size: 12px;
        font-weight: 700;
    }

    .product-owner {
        color: #334155;
        font-weight: 700;
    }

    .product-view-btn,
    .product-delete-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 6px;
        min-height: 34px;
        padding: 0 11px;
        border-radius: 8px;
        font-size: 11px;
        font-weight: 800;
        text-decoration: none;
        transition: .2s ease;
        white-space: nowrap;
    }

    .product-view-btn {
        color: #fff;
        background: #2563eb;
        border: 1px solid #2563eb;
    }

    .product-view-btn:hover {
        color: #fff;
        background: #1d4ed8;
        transform: translateY(-2px);
    }

    .product-delete-btn {
        color: #dc2626;
        background: #fff;
        border: 1px solid #fecaca;
    }

    .product-delete-btn:hover {
        color: #fff;
        background: #dc2626;
        border-color: #dc2626;
        transform: translateY(-2px);
    }

    .product-empty {
        padding: 45px 15px !important;
        text-align: center;
        color: #64748b !important;
    }

    .product-empty i {
        display: block;
        margin-bottom: 12px;
        color: #8b5cf6;
        font-size: 36px;
    }

    .product-pagination {
        margin-top: 22px;
    }

    .product-pagination nav {
        display: flex;
        justify-content: flex-end;
    }

    .product-pagination .pagination {
        margin-bottom: 0;
        gap: 5px;
    }

    .product-pagination .page-link {
        border: 1px solid #e2e8f0;
        border-radius: 8px !important;
        color: #6d28d9;
        font-size: 12px;
        font-weight: 700;
    }

    .product-pagination .page-item.active .page-link {
        color: #fff;
        border-color: #6d28d9;
        background: #6d28d9;
    }

    @media (max-width: 767px) {
        .product-card-body {
            padding: 16px;
        }

        .product-card-heading {
            padding: 18px;
        }

        .product-search {
            flex-wrap: wrap;
        }

        .product-search .input-group {
            flex-basis: 100%;
        }

        .product-search-btn,
        .product-reset-btn {
            flex: 1;
        }

        .product-stat-number {
            font-size: 30px;
        }

        .product-pagination nav {
            justify-content: center;
        }
    }
</style>
@endpush

@section('content')
<div class="container-fluid px-0 product-page">

    {{-- Statistics --}}
    <div class="row g-3 mb-4">
        <div class="col-md-4 col-sm-6">
            <div class="card product-stat-card">
                <div class="card-body p-4 product-stat-content">
                    <div class="product-stat-label">
                        <i class="bi bi-box-seam me-1"></i>
                        Total Products
                    </div>

                    <div class="product-stat-number">
                        {{ $totalProducts }}
                    </div>

                    <i class="bi bi-boxes product-stat-icon"></i>
                </div>
            </div>
        </div>
    </div>

    {{-- Products Table --}}
    <div class="product-main-card">

        <div class="product-card-heading">
            <h5>
                <i class="bi bi-grid-3x3-gap-fill me-2"></i>
                Registered Products
            </h5>
            <p>View product information, owners and manage registered products.</p>
        </div>

        <div class="product-card-body">

            @if(session('success'))
                <div class="alert product-alert mb-4">
                    <i class="bi bi-check-circle-fill me-2"></i>
                    {{ session('success') }}
                </div>
            @endif

            {{-- Search --}}
            <form method="GET"
                  action="{{ route('admin.products.index') }}"
                  class="product-search">

                <div class="input-group">
                    <span class="input-group-text">
                        <i class="bi bi-search"></i>
                    </span>

                    <input type="text"
                           name="search"
                           class="form-control"
                           placeholder="Search brand, model, category or serial number..."
                           value="{{ $search }}">
                </div>

                <button class="product-search-btn" type="submit">
                    <i class="bi bi-search me-1"></i>
                    Search
                </button>

                @if($search !== '')
                    <a href="{{ route('admin.products.index') }}"
                       class="product-reset-btn">
                        <i class="bi bi-arrow-counterclockwise me-1"></i>
                        Reset
                    </a>
                @endif
            </form>

            {{-- Table --}}
            <div class="product-table-wrap">
                <table class="table product-table align-middle">

                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Product</th>
                            <th>Brand</th>
                            <th>Category</th>
                            <th>Serial Number</th>
                            <th>Owner</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($products as $product)
                            <tr>
                                <td>
                                    <span class="product-id">
                                        #{{ $product->id }}
                                    </span>
                                </td>

                                <td>
                                    <span class="product-model">
                                        {{ $product->model ?? 'N/A' }}
                                    </span>
                                </td>

                                <td>
                                    <span class="product-brand">
                                        {{ $product->brand ?? 'N/A' }}
                                    </span>
                                </td>

                                <td>
                                    <span class="product-category">
                                        {{ $product->category ?? 'N/A' }}
                                    </span>
                                </td>

                                <td>
                                    <span class="product-serial">
                                        {{ $product->serial_number ?? 'N/A' }}
                                    </span>
                                </td>

                                <td>
                                    <span class="product-owner">
                                        {{ $product->user->name
                                            ?? $product->user->full_name
                                            ?? 'N/A' }}
                                    </span>
                                </td>

                                <td>
                                    <div class="d-flex align-items-center gap-2">

                                        <a href="{{ route('admin.products.show', $product->id) }}"
                                           class="product-view-btn">
                                            <i class="bi bi-eye-fill"></i>
                                            View
                                        </a>

                                        <form action="{{ route('admin.products.destroy', $product->id) }}"
                                              method="POST"
                                              class="d-inline"
                                              onsubmit="return confirm('Are you sure you want to delete this product?');">

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="product-delete-btn">
                                                <i class="bi bi-trash-fill"></i>
                                                Delete
                                            </button>
                                        </form>

                                    </div>
                                </td>
                            </tr>

                        @empty
                            <tr>
                                <td colspan="7" class="product-empty">
                                    <i class="bi bi-box-seam"></i>
                                    <strong>No products found.</strong>
                                    <div class="small mt-1">
                                        Try changing your search keyword.
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>

                </table>
            </div>

            {{-- Pagination --}}
            <div class="product-pagination">
                {{ $products->links() }}
            </div>

        </div>
    </div>

</div>
@endsection
