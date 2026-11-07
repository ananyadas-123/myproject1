@extends('layouts.app')

@section('title', 'Repair History')

@section('page_title', 'Repair History')

@section('page_subtitle', 'Track all your product repair requests.')

@section('content')

<div class="container-fluid px-0">

    {{-- PAGE HEADER --}}
    <div class="history-header mb-4">
        <div>
            <h3>My Repair History</h3>
            <p>View your repair requests, assigned technicians and quotations.</p>
        </div>

        <a href="{{ route('products.index') }}" class="btn btn-productlife">
            <i class="bi bi-plus-circle"></i>
            New Repair Request
        </a>
    </div>

    {{-- SUCCESS MESSAGE --}}
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    {{-- REPAIR REQUESTS --}}
    @forelse($repairRequests as $repair)

        <div class="repair-history-card mb-4">

            <div class="repair-card-top">

                <div>
                    <span class="repair-id">
                        Repair Request #{{ $repair->id }}
                    </span>

                    <h5>
                        {{ $repair->problem_title }}
                    </h5>

                    <p class="repair-date">
                        <i class="bi bi-calendar3"></i>
                        Requested on
                        {{ $repair->created_at->format('d M Y') }}
                    </p>
                </div>

                @php
                    $status = strtolower($repair->status ?? 'pending');

                    $statusClass = match($status) {
                        'completed' => 'status-completed',
                        'assigned' => 'status-assigned',
                        'quoted' => 'status-quoted',
                        'confirmed' => 'status-confirmed',
                        'in_progress' => 'status-progress',
                        'cancelled' => 'status-rejected',
                        default => 'status-pending',
                    };
                @endphp

                <span class="repair-status {{ $statusClass }}">
                    {{ ucwords(str_replace('_', ' ', $status)) }}
                </span>

            </div>

            <div class="repair-card-body">

                <div class="repair-info">
                    <span>Product</span>

                    <strong>
                        {{ $repair->product->brand ?? 'Product' }}
                        {{ $repair->product->model ?? '' }}
                    </strong>
                </div>

                <div class="repair-info">
                    <span>Priority</span>

                    <strong>
                        {{ ucfirst($repair->priority ?? 'Normal') }}
                    </strong>
                </div>

                <div class="repair-info">
                    <span>Technician</span>

                    <strong>
                        {{ $repair->technician->name ?? 'Not assigned yet' }}
                    </strong>
                </div>

            </div>

            <div class="repair-description">
                <strong>Problem Description</strong>

                <p>
                    {{ $repair->problem_description ?: 'No description provided.' }}
                </p>
            </div>

            @if($repair->problem_image)
                <div class="repair-image-section">
                    <strong>Problem Image</strong>

                    <div>
                        <a href="{{ asset('storage/' . $repair->problem_image) }}"
                           target="_blank">
                            <img
                                src="{{ asset('storage/' . $repair->problem_image) }}"
                                alt="Repair Problem">
                        </a>
                    </div>
                </div>
            @endif

            {{-- QUOTATIONS --}}
            @if($repair->quotes->isNotEmpty())

                <div class="quotation-section">

                    <h6>
                        <i class="bi bi-receipt"></i>
                        Repair Quotations
                    </h6>

                    @foreach($repair->quotes as $quote)

                        <div class="quotation-row">

                            <div>
                                <strong>
                                    {{ $quote->technician->name ?? 'Technician' }}
                                </strong>

                                <small>
                                    {{ $quote->description ?? 'No additional details.' }}
                                </small>
                            </div>

                            <div class="quotation-price">
                                ₹{{ number_format($quote->estimated_cost, 2) }}

                                <small>
                                    {{ ucfirst($quote->status) }}
                                </small>
                            </div>

                        </div>

                    @endforeach

                </div>

            @else

                <div class="no-quotation">
                    <i class="bi bi-info-circle"></i>
                    No quotation received yet.
                </div>

            @endif

        </div>

    @empty

        <div class="empty-history">

            <i class="bi bi-tools"></i>

            <h4>No Repair History Yet</h4>

            <p>
                You haven't submitted any repair requests.
                Start by selecting one of your products.
            </p>

            <a href="{{ route('products.index') }}" class="btn btn-productlife">
                View My Products
            </a>

        </div>

    @endforelse

    {{-- PAGINATION --}}
    <div class="mt-4">
        {{ $repairRequests->links() }}
    </div>

</div>

@endsection

@push('styles')
<style>
.history-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 15px;
    flex-wrap: wrap;
}

.history-header h3 {
    font-size: 21px;
    font-weight: 800;
    margin-bottom: 5px;
}

.history-header p {
    color: #8490a1;
    font-size: 13px;
    margin: 0;
}

.status-quoted {
    background: #f3e8ff;
    color: #7e22ce;
}

.status-confirmed {
    background: #dbeafe;
    color: #1d4ed8;
}

.repair-history-card {
    background: #fff;
    border: 1px solid #e8edf3;
    border-radius: 18px;
    padding: 23px;
    box-shadow: 0 8px 25px rgba(15,23,42,.035);
}

.repair-card-top {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    gap: 15px;
    padding-bottom: 18px;
    border-bottom: 1px solid #eef1f5;
}

.repair-id {
    color: #16a34a;
    font-size: 11px;
    font-weight: 800;
}

.repair-card-top h5 {
    margin: 6px 0;
    font-size: 17px;
    font-weight: 800;
}

.repair-date {
    color: #8993a3;
    font-size: 12px;
    margin: 0;
}

.repair-status {
    padding: 7px 12px;
    border-radius: 20px;
    font-size: 11px;
    font-weight: 800;
    white-space: nowrap;
}

.status-pending {
    background: #fff7e6;
    color: #b7791f;
}

.status-assigned {
    background: #eaf2ff;
    color: #2563eb;
}

.status-progress {
    background: #f0eaff;
    color: #7c3aed;
}

.status-completed {
    background: #dcfce7;
    color: #15803d;
}

.status-rejected {
    background: #fee2e2;
    color: #dc2626;
}

.repair-card-body {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 18px;
    padding: 20px 0;
}

.repair-info span,
.repair-info strong {
    display: block;
}

.repair-info span {
    color: #98a2b3;
    font-size: 11px;
    margin-bottom: 5px;
}

.repair-info strong {
    color: #344054;
    font-size: 13px;
}

.repair-description {
    background: #f8fafc;
    border-radius: 12px;
    padding: 14px;
}

.repair-description strong,
.repair-image-section > strong {
    font-size: 12px;
    color: #344054;
}

.repair-description p {
    color: #667085;
    font-size: 13px;
    margin: 7px 0 0;
}

.repair-image-section {
    margin-top: 16px;
}

.repair-image-section img {
    width: 100px;
    height: 85px;
    object-fit: cover;
    border-radius: 10px;
    margin-top: 8px;
}

.quotation-section {
    margin-top: 18px;
    padding-top: 16px;
    border-top: 1px solid #eef1f5;
}

.quotation-section h6 {
    font-size: 13px;
    font-weight: 800;
    margin-bottom: 12px;
}

.quotation-row {
    display: flex;
    justify-content: space-between;
    gap: 15px;
    padding: 12px;
    background: #f8fafc;
    border-radius: 10px;
    margin-bottom: 8px;
}

.quotation-row strong,
.quotation-row small {
    display: block;
}

.quotation-row strong {
    font-size: 12px;
}

.quotation-row small {
    color: #8490a1;
    font-size: 11px;
    margin-top: 4px;
}

.quotation-price {
    text-align: right;
    font-size: 13px;
    font-weight: 800;
    white-space: nowrap;
}

.no-quotation {
    margin-top: 15px;
    color: #8993a3;
    font-size: 12px;
}

.empty-history {
    text-align: center;
    background: white;
    padding: 55px 20px;
    border: 1px solid #e8edf3;
    border-radius: 18px;
}

.empty-history > i {
    font-size: 42px;
    color: #16a34a;
}

.empty-history h4 {
    font-weight: 800;
    margin: 15px 0 8px;
}

.empty-history p {
    color: #8490a1;
    font-size: 13px;
    margin-bottom: 20px;
}

@media(max-width: 650px) {
    .repair-card-body {
        grid-template-columns: 1fr;
        gap: 12px;
    }

    .repair-card-top {
        flex-direction: column;
    }

    .repair-history-card {
        padding: 16px;
    }
}
</style>
@endpush