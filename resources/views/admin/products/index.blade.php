
@extends('admin.layouts.app')

@section('title', 'Product Management')
@section('page_title', 'Product Management')
@section('page_subtitle', 'View and manage all registered products.')

@section('content')
<div class="container-fluid px-0">

    <div class="row g-3 mb-4">
        <div class="col-md-4">
            <div class="card border-0 shadow-sm rounded-4">
                <div class="card-body p-4">
                    <div class="text-muted mb-2">Total Products</div>
                    <h2 class="fw-bold mb-0">{{ $totalProducts }}</h2>
                </div>
            </div>
        </div>
    </div>

    <div class="card border-0 shadow-sm rounded-4">
        <div class="card-body p-4">

            <form method="GET"
                  action="{{ route('admin.products.index') }}"
                  class="mb-4">
                <div class="input-group">
                    <input type="text"
                           name="search"
                           class="form-control"
                           placeholder="Search brand, model, category or serial number..."
                           value="{{ $search }}">

                    <button class="btn btn-success" type="submit">
                        Search
                    </button>

                    @if($search !== '')
                        <a href="{{ route('admin.products.index') }}"
                           class="btn btn-outline-secondary">
                            Reset
                        </a>
                    @endif
                </div>
            </form>

            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-light">
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
                                <td>{{ $product->id }}</td>

                                <td class="fw-semibold">
                                    {{ $product->model ?? 'N/A' }}
                                </td>

                                <td>{{ $product->brand ?? 'N/A' }}</td>

                                <td>{{ $product->category ?? 'N/A' }}</td>

                                <td>
                                    {{ $product->serial_number ?? 'N/A' }}
                                </td>

                                <td>
                                    {{ $product->user->name
                                        ?? $product->user->full_name
                                        ?? 'N/A' }}
                                </td>

                                <td>
                                    <a href="{{ route('admin.products.show', $product->id) }}"
                                       class="btn btn-sm btn-outline-success">
                                        View Details
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7"
                                    class="text-center text-muted py-4">
                                    No products found.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-3">
                {{ $products->links() }}
            </div>

        </div>
    </div>
</div>
@endsection