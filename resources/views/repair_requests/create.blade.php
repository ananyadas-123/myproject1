
@extends('layouts.app')

@section('title', 'New Repair Request')
@section('page_title', 'New Repair Request')

@section('content')
<div class="container-fluid py-4">

    <a href="{{ route('products.index') }}"
       class="btn btn-light border mb-3">
        <i class="bi bi-arrow-left"></i> Back to My Products
    </a>

    <h3 class="fw-bold">Submit a Repair Request</h3>
    <p class="text-muted">
        Describe the problem with your product.
    </p>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="row g-4">

        <div class="col-lg-4">
            <div class="card border-0 shadow-sm rounded-4">
                <div class="card-body p-4">
                    <h5 class="fw-bold">Selected Product</h5>

                    <h5 class="mt-3">
                        {{ $product->brand }} {{ $product->model }}
                    </h5>

                    <p class="text-muted mb-1">
                        Serial: {{ $product->serial_number ?? 'N/A' }}
                    </p>

                    <p class="text-muted">
                        Category: {{ $product->category ?? 'N/A' }}
                    </p>
                </div>
            </div>
        </div>

        <div class="col-lg-8">
            <div class="card border-0 shadow-sm rounded-4">
                <div class="card-body p-4">

                    <form
                        action="{{ route('repair_requests.store', $product) }}"
                        method="POST"
                        enctype="multipart/form-data">

                        @csrf

                        <div class="mb-3">
                            <label class="form-label fw-semibold">
                                Problem Title *
                            </label>

                            <input
                                type="text"
                                name="problem_title"
                                class="form-control"
                                value="{{ old('problem_title') }}"
                                placeholder="Example: Product is not working"
                                required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">
                                Problem Description *
                            </label>

                            <textarea
                                name="problem_description"
                                class="form-control"
                                rows="5"
                                placeholder="Describe the problem..."
                                required>{{ old('problem_description') }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">
                                Priority *
                            </label>

                            <select name="priority" class="form-select" required>
                                <option value="">Select Priority</option>

                                <option value="low"
                                    {{ old('priority') == 'low' ? 'selected' : '' }}>
                                    Low
                                </option>

                                <option value="medium"
                                    {{ old('priority', 'medium') == 'medium' ? 'selected' : '' }}>
                                    Medium
                                </option>

                                <option value="high"
                                    {{ old('priority') == 'high' ? 'selected' : '' }}>
                                    High
                                </option>

                                <option value="urgent"
                                    {{ old('priority') == 'urgent' ? 'selected' : '' }}>
                                    Urgent
                                </option>
                            </select>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-semibold">
                                Problem Image (Optional)
                            </label>

                            <input
                                type="file"
                                name="problem_image"
                                class="form-control"
                                accept=".jpg,.jpeg,.png,.webp">

                            <small class="text-muted">
                                JPG, PNG, WEBP. Maximum 2 MB.
                            </small>
                        </div>

                        <button type="submit" class="btn btn-primary px-4">
                            <i class="bi bi-send me-1"></i>
                            Submit Repair Request
                        </button>

                        <a href="{{ route('products.index') }}"
                           class="btn btn-light border ms-2">
                            Cancel
                        </a>

                    </form>

                </div>
            </div>
        </div>

    </div>
</div>
@endsection
