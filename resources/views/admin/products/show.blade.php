@extends('admin.layouts.app')

@section('title', 'Product Details - ProductLife Admin')
@section('page_title', 'Product Details')
@section('page_subtitle', 'View product and owner information.')

@section('content')

<div class="mb-3">
    <a href="{{ route('admin.products.index') }}"
       class="btn btn-outline-success">
        <i class="bi bi-arrow-left"></i> Back to Products
    </a>
</div>

<div class="card border-0 shadow-sm rounded-4">
    <div class="card-body p-4">

        <h4 class="fw-bold mb-4">
            <i class="bi bi-box-seam text-success"></i>
            {{ $product->brand ?? 'Product' }}
            {{ $product->model ?? '' }}
        </h4>

        <div class="row g-4">

            <div class="col-md-6">
                <div class="text-muted small mb-1">Product ID</div>
                <div class="fw-semibold">{{ $product->id }}</div>
            </div>

            <div class="col-md-6">
                <div class="text-muted small mb-1">Brand</div>
                <div class="fw-semibold">
                    {{ $product->brand ?? 'N/A' }}
                </div>
            </div>

            <div class="col-md-6">
                <div class="text-muted small mb-1">Model</div>
                <div class="fw-semibold">
                    {{ $product->model ?? 'N/A' }}
                </div>
            </div>

            <div class="col-md-6">
                <div class="text-muted small mb-1">Category</div>
                <div class="fw-semibold">
                    {{ $product->category ?? 'N/A' }}
                </div>
            </div>

            <div class="col-md-6">
                <div class="text-muted small mb-1">Serial Number</div>
                <div class="fw-semibold">
                    {{ $product->serial_number ?? 'N/A' }}
                </div>
            </div>

            <div class="col-md-6">
                <div class="text-muted small mb-1">Product Owner</div>
                <div class="fw-semibold">
                    {{ $product->user->name
                        ?? $product->user->full_name
                        ?? 'N/A' }}
                </div>
            </div>

            <div class="col-md-6">
                <div class="text-muted small mb-1">Added On</div>
                <div class="fw-semibold">
                    {{ $product->created_at
                        ? $product->created_at->format('d M Y, h:i A')
                        : 'N/A' }}
                </div>
            </div>

        </div>

    </div>
</div>

@endsection