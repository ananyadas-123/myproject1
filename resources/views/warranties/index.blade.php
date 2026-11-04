@extends('layouts.app')

@section('page_title', 'My Warranties')
@section('page_subtitle', 'View and manage your product warranties')

@section('content')
<div class="container-fluid">

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card border-0 shadow-sm rounded-4">
        <div class="card-body p-4">

            <div class="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-4">
                <div>
                    <h5 class="fw-bold mb-1">Warranty Records</h5>
                    <p class="text-muted mb-0">Your registered product warranties</p>
                </div>

                <form method="GET" action="{{ route('warranties.index') }}" class="d-flex gap-2">
                    <input
                        type="text"
                        name="search"
                        class="form-control"
                        placeholder="Search brand or model..."
                        value="{{ $search }}"
                    >
                    <button class="btn btn-primary">Search</button>
                </form>
            </div>

            @forelse($warranties as $product)
                @php
                    $warranty = $product->warranty;
                    $today = \Carbon\Carbon::today();
                    $endDate = \Carbon\Carbon::parse($warranty->end_date);

                    if ($endDate->lt($today)) {
                        $status = 'Expired';
                        $statusClass = 'danger';
                    } elseif ($today->diffInDays($endDate) <= 30) {
                        $status = 'Expiring Soon';
                        $statusClass = 'warning';
                    } else {
                        $status = 'Active';
                        $statusClass = 'success';
                    }
                @endphp

                <div class="border rounded-4 p-3 mb-3">
                    <div class="d-flex justify-content-between align-items-start flex-wrap gap-3">

                        <div>
                            <h6 class="fw-bold mb-1">
                                {{ $product->brand }} {{ $product->model }}
                            </h6>

                            <p class="text-muted small mb-2">
                                {{ $product->category ?? 'Product' }}
                            </p>

                            <div class="small mb-1">
                                <strong>Provider:</strong>
                                {{ $warranty->warranty_provider ?? 'Not specified' }}
                            </div>

                            <div class="small mb-1">
                                <strong>Warranty Type:</strong>
                                {{ $warranty->warranty_type ?? 'Not specified' }}
                            </div>

                            <div class="small">
                                <strong>Period:</strong>
                                {{ \Carbon\Carbon::parse($warranty->start_date)->format('d M Y') }}
                                -
                                {{ $endDate->format('d M Y') }}
                            </div>
                        </div>

                        <div class="text-end">
                            <span class="badge bg-{{ $statusClass }}-subtle text-{{ $statusClass }} px-3 py-2">
                                {{ $status }}
                            </span>

                            <div class="mt-3">
                                <a href="{{ route('products.passport', $product) }}"
                                   class="btn btn-sm btn-outline-primary">
                                    View Passport
                                </a>
                            </div>

                            @if($warranty->warranty_document)
                                <a href="{{ asset('storage/'.$warranty->warranty_document) }}"
                                   target="_blank"
                                   class="btn btn-sm btn-outline-secondary mt-2">
                                    View Document
                                </a>
                            @endif
                        </div>

                    </div>
                </div>
            @empty
                <div class="text-center py-5">
                    <h5 class="fw-semibold">No warranties found</h5>
                    <p class="text-muted">
                        Add warranty information from your product's lifecycle page.
                    </p>
                    <a href="{{ route('products.index') }}" class="btn btn-primary">
                        View My Products
                    </a>
                </div>
            @endforelse

            <div class="mt-4">
                {{ $warranties->links('pagination::bootstrap-5') }}
            </div>

        </div>
    </div>
</div>
@endsection