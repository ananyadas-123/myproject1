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


@push('styles')
<style>
/* ================================
   WARRANTY INDEX - PREMIUM DESIGN
================================ */

.container-fluid {
    color: #172033;
}

/* Main warranty container */
.container-fluid > .card {
    border: 1px solid #dbe5f0 !important;
    border-radius: 20px !important;
    background: #ffffff;
    box-shadow: 0 10px 35px rgba(30, 64, 120, 0.09) !important;
    overflow: hidden;
}

.container-fluid > .card > .card-body {
    padding: 28px !important;
}

/* Header */
.container-fluid h5.fw-bold {
    color: #172554;
    font-size: 22px;
    letter-spacing: -0.4px;
}

.container-fluid .text-muted {
    color: #64748b !important;
}

/* Success alert */
.alert-success {
    background: linear-gradient(120deg, #dcfce7, #bbf7d0);
    border: 1px solid #86efac;
    border-left: 5px solid #16a34a;
    border-radius: 12px;
    color: #14532d;
    font-weight: 600;
    padding: 14px 18px;
}

/* Search form */
.container-fluid form.d-flex {
    max-width: 430px;
    width: 100%;
}

.container-fluid form.d-flex .form-control {
    min-height: 44px;
    border: 1.5px solid #cbd5e1;
    border-radius: 10px;
    color: #172033;
    background: #ffffff;
    font-weight: 500;
    box-shadow: none;
    transition: all 0.25s ease;
}

.container-fluid form.d-flex .form-control::placeholder {
    color: #94a3b8;
}

.container-fluid form.d-flex .form-control:focus {
    border-color: #2563eb;
    box-shadow: 0 0 0 4px rgba(37, 99, 235, 0.13);
}

.container-fluid form.d-flex .btn-primary {
    min-height: 44px;
    padding: 0 22px;
    border: none;
    border-radius: 10px;
    background: linear-gradient(135deg, #2563eb, #4f46e5);
    color: #ffffff;
    font-weight: 700;
    box-shadow: 0 5px 13px rgba(37, 99, 235, 0.22);
    transition: all 0.25s ease;
}

.container-fluid form.d-flex .btn-primary:hover {
    background: linear-gradient(135deg, #1d4ed8, #4338ca);
    transform: translateY(-2px);
}

/* Warranty record cards */
.container-fluid .card-body > .border.rounded-4 {
    position: relative;
    background: linear-gradient(120deg, #ffffff, #f8fbff);
    border: 1px solid #dbe5f0 !important;
    border-left: 5px solid #0d9488 !important;
    border-radius: 15px !important;
    padding: 21px !important;
    box-shadow: 0 4px 14px rgba(15, 23, 42, 0.045);
    transition: all 0.25s ease;
}

.container-fluid .card-body > .border.rounded-4:hover {
    border-left-color: #2563eb !important;
    box-shadow: 0 10px 25px rgba(37, 99, 235, 0.10);
    transform: translateY(-3px);
}

/* Product name */
.container-fluid .card-body > .border.rounded-4 h6 {
    color: #172554;
    font-size: 17px;
    font-weight: 800;
    letter-spacing: -0.2px;
}

/* Product category */
.container-fluid .card-body > .border.rounded-4 p {
    color: #64748b !important;
    font-weight: 600;
}

/* Warranty details */
.container-fluid .card-body > .border.rounded-4 .small {
    color: #334155;
    line-height: 1.8;
    font-size: 13px;
}

.container-fluid .card-body > .border.rounded-4 .small strong {
    color: #0f172a;
    font-weight: 800;
}

/* Status badges */
.container-fluid .badge {
    display: inline-block;
    border-radius: 30px;
    padding: 8px 15px !important;
    font-size: 12px;
    font-weight: 800;
    letter-spacing: 0.3px;
    border: 1px solid transparent;
}

.container-fluid .badge.bg-success-subtle {
    background: #dcfce7 !important;
    color: #166534 !important;
    border-color: #86efac;
}

.container-fluid .badge.bg-warning-subtle {
    background: #fef3c7 !important;
    color: #92400e !important;
    border-color: #fcd34d;
}

.container-fluid .badge.bg-danger-subtle {
    background: #fee2e2 !important;
    color: #991b1b !important;
    border-color: #fca5a5;
}

/* Action buttons */
.container-fluid .btn-outline-primary,
.container-fluid .btn-outline-secondary {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    border-radius: 9px;
    padding: 8px 14px;
    font-weight: 700;
    transition: all 0.25s ease;
}

.container-fluid .btn-outline-primary {
    color: #1d4ed8;
    border: 1.5px solid #3b82f6;
    background: #eff6ff;
}

.container-fluid .btn-outline-primary:hover {
    color: #ffffff;
    background: #2563eb;
    border-color: #2563eb;
    transform: translateY(-2px);
    box-shadow: 0 5px 12px rgba(37, 99, 235, 0.2);
}

.container-fluid .btn-outline-secondary {
    color: #6d28d9;
    border: 1.5px solid #a78bfa;
    background: #f5f3ff;
}

.container-fluid .btn-outline-secondary:hover {
    color: #ffffff;
    background: #7c3aed;
    border-color: #7c3aed;
    transform: translateY(-2px);
    box-shadow: 0 5px 12px rgba(124, 58, 237, 0.2);
}

/* Empty state */
.container-fluid .text-center.py-5 {
    background: linear-gradient(135deg, #eff6ff, #f5f3ff, #ecfeff);
    border: 1px dashed #93c5fd;
    border-radius: 16px;
    padding: 45px 20px !important;
}

.container-fluid .text-center.py-5 h5 {
    color: #1e3a8a;
    font-size: 20px;
    font-weight: 800;
}

.container-fluid .text-center.py-5 p {
    color: #475569 !important;
    margin-top: 8px;
}

.container-fluid .text-center.py-5 .btn-primary {
    border: none;
    border-radius: 10px;
    padding: 11px 22px;
    color: #ffffff;
    font-weight: 700;
    background: linear-gradient(135deg, #0d9488, #2563eb);
    box-shadow: 0 5px 14px rgba(13, 148, 136, 0.2);
    transition: all 0.25s ease;
}

.container-fluid .text-center.py-5 .btn-primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 18px rgba(37, 99, 235, 0.25);
}

/* Pagination */
.container-fluid .pagination {
    gap: 5px;
    flex-wrap: wrap;
}

.container-fluid .pagination .page-link {
    border: 1px solid #dbe5f0;
    border-radius: 8px !important;
    color: #1d4ed8;
    font-weight: 700;
    background: #ffffff;
    padding: 8px 13px;
    transition: all 0.2s ease;
}

.container-fluid .pagination .page-link:hover {
    background: #dbeafe;
    border-color: #60a5fa;
    color: #1e40af;
}

.container-fluid .pagination .page-item.active .page-link {
    background: linear-gradient(135deg, #2563eb, #4f46e5);
    border-color: #2563eb;
    color: #ffffff;
}

.container-fluid .pagination .page-item.disabled .page-link {
    background: #f1f5f9;
    color: #94a3b8;
}

/* Responsive design */
@media (max-width: 768px) {
    .container-fluid > .card > .card-body {
        padding: 17px !important;
    }

    .container-fluid form.d-flex {
        max-width: 100%;
    }

    .container-fluid .card-body > .border.rounded-4 {
        padding: 17px !important;
    }

    .container-fluid .card-body > .border.rounded-4 > .d-flex {
        flex-direction: column;
        align-items: stretch !important;
    }

    .container-fluid .card-body > .border.rounded-4 .text-end {
        text-align: left !important;
        border-top: 1px solid #e2e8f0;
        padding-top: 14px;
    }

    .container-fluid .card-body > .border.rounded-4 .text-end .mt-3 {
        margin-top: 10px !important;
    }
}

@media (max-width: 480px) {
    .container-fluid h5.fw-bold {
        font-size: 19px;
    }

    .container-fluid form.d-flex {
        flex-direction: column;
    }

    .container-fluid form.d-flex .btn-primary {
        width: 100%;
    }

    .container-fluid .btn-outline-primary,
    .container-fluid .btn-outline-secondary {
        font-size: 12px;
        padding: 7px 10px;
    }
}
</style>
@endpush

