
@extends('admin.layouts.app')

@section('title', 'Repair Details')
@section('page-heading', 'Repair Request Details')
@section('page-subtitle', 'Complete repair request information.')

@push('styles')
<style>
    .repair-details-page {
        --detail-text: #172033;
        --detail-muted: #64748b;
        --detail-border: #e5eaf2;
        color: var(--detail-text);
    }

    .repair-back-btn {
        display: inline-flex;
        align-items: center;
        gap: 9px;
        padding: 10px 17px;
        margin-bottom: 22px;
        border: 1px solid #cbd5e1;
        border-radius: 10px;
        background: #fff;
        color: #334155;
        font-size: 13px;
        font-weight: 700;
        text-decoration: none;
        transition: all .25s ease;
    }

    .repair-back-btn:hover {
        color: #fff;
        background: linear-gradient(135deg, #4f46e5, #7c3aed);
        border-color: transparent;
        transform: translateX(-3px);
        box-shadow: 0 6px 15px #4f46e533;
    }

    .details-panel {
        position: relative;
        overflow: hidden;
        background: #fff;
        border: 1px solid var(--detail-border);
        border-radius: 17px;
        padding: 25px;
        margin-bottom: 22px;
        box-shadow: 0 5px 22px rgba(23, 32, 51, .055);
        transition: transform .25s ease, box-shadow .25s ease;
    }

    .details-panel:hover {
        box-shadow: 0 10px 28px rgba(23, 32, 51, .09);
    }

    .details-panel::before {
        content: "";
        position: absolute;
        left: 0;
        top: 0;
        bottom: 0;
        width: 5px;
        background: var(--panel-accent, #6366f1);
    }

    .problem-panel { --panel-accent: #7c3aed; }
    .customer-panel { --panel-accent: #0d9488; }
    .product-panel { --panel-accent: #2563eb; }
    .technician-panel { --panel-accent: #ea580c; }
    .quotes-panel { --panel-accent: #db2777; }

    .details-heading {
        display: flex;
        align-items: center;
        gap: 12px;
        padding-bottom: 17px;
        margin-bottom: 22px;
        border-bottom: 1px solid #edf0f5;
    }

    .heading-icon {
        width: 42px;
        height: 42px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 12px;
        font-size: 19px;
        flex-shrink: 0;
    }

    .problem-panel .heading-icon {
        color: #7c3aed;
        background: #f1eafe;
    }

    .customer-panel .heading-icon {
        color: #0d9488;
        background: #ccfbf1;
    }

    .product-panel .heading-icon {
        color: #2563eb;
        background: #dbeafe;
    }

    .technician-panel .heading-icon {
        color: #ea580c;
        background: #ffedd5;
    }

    .quotes-panel .heading-icon {
        color: #db2777;
        background: #fce7f3;
    }

    .details-heading h5 {
        margin: 0;
        color: #172033;
        font-size: 16px;
        font-weight: 800;
    }

    .details-heading p {
        margin: 4px 0 0;
        color: #94a3b8;
        font-size: 11px;
    }

    .details-grid {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 17px;
    }

    .detail-item {
        min-width: 0;
        padding: 15px 16px;
        border: 1px solid #edf0f5;
        border-radius: 11px;
        background: #f8fafc;
        transition: all .2s ease;
    }

    .detail-item:hover {
        border-color: #c7d2fe;
        background: #f5f7ff;
    }

    .detail-label {
        display: block;
        margin-bottom: 7px;
        color: #64748b;
        font-size: 11px;
        font-weight: 800;
        letter-spacing: .65px;
        text-transform: uppercase;
    }

    .detail-value {
        display: block;
        color: #172033;
        font-size: 14px;
        font-weight: 700;
        overflow-wrap: anywhere;
    }

    .detail-description {
        line-height: 1.8;
        font-weight: 500;
        white-space: pre-line;
    }

    .priority-badge {
        display: inline-flex;
        align-items: center;
        padding: 6px 12px;
        border-radius: 30px;
        background: #fef3c7;
        color: #92400e;
        font-size: 11px;
        font-weight: 800;
    }

    .priority-low {
        color: #047857;
        background: #d1fae5;
    }

    .priority-medium {
        color: #92400e;
        background: #fef3c7;
    }

    .priority-high {
        color: #c2410c;
        background: #ffedd5;
    }

    .priority-urgent {
        color: #b91c1c;
        background: #fee2e2;
    }

    .problem-image-wrap {
        margin-top: 20px;
    }

    .problem-image {
        display: block;
        width: 100%;
        max-width: 340px;
        max-height: 260px;
        object-fit: cover;
        border-radius: 13px;
        border: 3px solid #fff;
        box-shadow: 0 5px 18px rgba(23, 32, 51, .13);
        transition: transform .25s ease;
    }

    .problem-image:hover {
        transform: scale(1.02);
    }

    .image-link {
        display: inline-block;
        text-decoration: none;
    }

    .technician-empty {
        display: flex;
        align-items: center;
        gap: 13px;
        padding: 17px;
        border: 1px dashed #fdba74;
        border-radius: 12px;
        background: #fff7ed;
        color: #9a3412;
        font-size: 13px;
        font-weight: 600;
    }

    .technician-empty i {
        font-size: 23px;
    }

    .quote-card {
        padding: 19px;
        margin-bottom: 14px;
        border: 1px solid #f1d5e5;
        border-left: 4px solid #db2777;
        border-radius: 13px;
        background: linear-gradient(135deg, #fff, #fff7fb);
        transition: all .25s ease;
    }

    .quote-card:hover {
        border-color: #f0abcf;
        transform: translateY(-2px);
        box-shadow: 0 7px 18px #db27771a;
    }

    .quote-card:last-child {
        margin-bottom: 0;
    }

    .quote-technician {
        color: #172033;
        font-size: 14px;
        font-weight: 800;
    }

    .quote-description {
        margin: 12px 0;
        color: #475569;
        font-size: 13px;
        line-height: 1.7;
        white-space: pre-line;
    }

    .quote-meta {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        gap: 10px;
        margin-top: 12px;
    }

    .quote-cost {
        padding: 7px 12px;
        border-radius: 8px;
        background: #dcfce7;
        color: #047857;
        font-size: 13px;
        font-weight: 800;
    }

    .quote-status {
        padding: 7px 12px;
        border-radius: 8px;
        background: #ede9fe;
        color: #6d28d9;
        font-size: 11px;
        font-weight: 800;
    }

    .details-empty {
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 17px;
        border-radius: 11px;
        background: #f8fafc;
        color: #64748b;
        font-size: 13px;
    }

    .details-empty i {
        color: #94a3b8;
        font-size: 22px;
    }

    @media (max-width: 650px) {
        .details-panel {
            padding: 19px 16px;
            border-radius: 14px;
        }

        .details-grid {
            grid-template-columns: 1fr;
            gap: 12px;
        }

        .details-heading h5 {
            font-size: 15px;
        }

        .problem-image {
            max-width: 100%;
        }

        .quote-meta {
            align-items: flex-start;
            flex-direction: column;
        }
    }
</style>
@endpush

@section('content')

<div class="repair-details-page">

    <a href="{{ route('admin.repairs.index') }}" class="repair-back-btn">
        <i class="bi bi-arrow-left"></i>
        Back to Repair Requests
    </a>

    {{-- Problem Details --}}
    <div class="details-panel problem-panel">

        <div class="details-heading">
            <div class="heading-icon">
                <i class="bi bi-tools"></i>
            </div>
            <div>
                <h5>Problem Details</h5>
                <p>Repair issue and submission information</p>
            </div>
        </div>

        <div class="details-grid">

            <div class="detail-item">
                <span class="detail-label">Problem Title</span>
                <strong class="detail-value">
                    {{ $repairRequest->problem_title }}
                </strong>
            </div>

            <div class="detail-item">
                <span class="detail-label">Priority</span>
                @php
                    $priorityValue = strtolower($repairRequest->priority ?? 'medium');
                    $priorityClass = in_array($priorityValue, ['low', 'medium', 'high', 'urgent'])
                        ? 'priority-' . $priorityValue
                        : 'priority-medium';
                @endphp
                <span class="priority-badge {{ $priorityClass }}">
                    {{ ucfirst($repairRequest->priority ?? 'Medium') }}
                </span>
            </div>

            <div class="detail-item">
                <span class="detail-label">Submitted On</span>
                <strong class="detail-value">
                    {{ $repairRequest->created_at ? $repairRequest->created_at->format('d M Y, h:i A') : 'N/A' }}
                </strong>
            </div>

            <div class="detail-item">
                <span class="detail-label">Request ID</span>
                <strong class="detail-value">
                    #{{ $repairRequest->id }}
                </strong>
            </div>

        </div>

        <div class="detail-item mt-3">
            <span class="detail-label">Problem Description</span>
            <div class="detail-value detail-description">
                {{ $repairRequest->problem_description ?? 'No description provided.' }}
            </div>
        </div>

        @if($repairRequest->problem_image)
            <div class="problem-image-wrap">
                <span class="detail-label mb-2">Problem Image</span>

                <a href="{{ asset('storage/'.$repairRequest->problem_image) }}"
                   target="_blank"
                   rel="noopener noreferrer"
                   class="image-link">

                    <img src="{{ asset('storage/'.$repairRequest->problem_image) }}"
                         alt="Problem image"
                         class="problem-image">
                </a>

                <small class="d-block text-secondary mt-2">
                    <i class="bi bi-zoom-in"></i>
                    Click image to view full size
                </small>
            </div>
        @endif

    </div>

    {{-- Customer Details --}}
    <div class="details-panel customer-panel">

        <div class="details-heading">
            <div class="heading-icon">
                <i class="bi bi-person-circle"></i>
            </div>
            <div>
                <h5>Customer Details</h5>
                <p>Customer contact information</p>
            </div>
        </div>

        <div class="details-grid">

            <div class="detail-item">
                <span class="detail-label">Customer Name</span>
                <strong class="detail-value">
                    {{ $repairRequest->user->name ?? 'Unknown' }}
                </strong>
            </div>

            <div class="detail-item">
                <span class="detail-label">Email Address</span>
                <strong class="detail-value">
                    {{ $repairRequest->user->email ?? 'N/A' }}
                </strong>
            </div>

            <div class="detail-item">
                <span class="detail-label">Phone Number</span>
                <strong class="detail-value">
                    {{ $repairRequest->user->phone ?? 'N/A' }}
                </strong>
            </div>

        </div>

    </div>

    {{-- Product Details --}}
    <div class="details-panel product-panel">

        <div class="details-heading">
            <div class="heading-icon">
                <i class="bi bi-laptop"></i>
            </div>
            <div>
                <h5>Product Details</h5>
                <p>Device and product identification</p>
            </div>
        </div>

        <div class="details-grid">

            <div class="detail-item">
                <span class="detail-label">Brand</span>
                <strong class="detail-value">
                    {{ $repairRequest->product->brand ?? 'N/A' }}
                </strong>
            </div>

            <div class="detail-item">
                <span class="detail-label">Model</span>
                <strong class="detail-value">
                    {{ $repairRequest->product->model ?? 'N/A' }}
                </strong>
            </div>

            <div class="detail-item">
                <span class="detail-label">Serial Number</span>
                <strong class="detail-value">
                    {{ $repairRequest->product->serial_number ?? 'N/A' }}
                </strong>
            </div>

        </div>

    </div>

    {{-- Technician Details --}}
    <div class="details-panel technician-panel">

        <div class="details-heading">
            <div class="heading-icon">
                <i class="bi bi-person-gear"></i>
            </div>
            <div>
                <h5>Assigned Technician</h5>
                <p>Technician assignment and contact information</p>
            </div>
        </div>

        @if($repairRequest->technician)

            <div class="details-grid">

                <div class="detail-item">
                    <span class="detail-label">Technician Name</span>
                    <strong class="detail-value">
                        {{ $repairRequest->technician->name }}
                    </strong>
                </div>

                <div class="detail-item">
                    <span class="detail-label">Phone Number</span>
                    <strong class="detail-value">
                        {{ $repairRequest->technician->phone ?? 'N/A' }}
                    </strong>
                </div>

            </div>

        @else

            <div class="technician-empty">
                <i class="bi bi-person-exclamation"></i>
                <span>No technician assigned yet.</span>
            </div>

        @endif

    </div>

    {{-- Repair Quotes --}}
    <div class="details-panel quotes-panel">

        <div class="details-heading">
            <div class="heading-icon">
                <i class="bi bi-receipt"></i>
            </div>
            <div>
                <h5>Repair Quotes</h5>
                <p>Technician estimates and quotation status</p>
            </div>
        </div>

        @forelse($repairRequest->quotes as $quote)

            <div class="quote-card">

                <div class="quote-technician">
                    <i class="bi bi-person-check text-primary me-1"></i>
                    {{ $quote->technician->name ?? 'Technician' }}
                </div>

                <p class="quote-description">
                    {{ $quote->description ?? 'No description provided.' }}
                </p>

                <div class="quote-meta">

                    <span class="quote-cost">
                        <i class="bi bi-currency-rupee"></i>
                        Estimated Cost: ₹{{ number_format((float) $quote->estimated_cost, 2) }}
                    </span>

                    <span class="quote-status">
                        <i class="bi bi-info-circle"></i>
                        {{ ucfirst($quote->status ?? 'Pending') }}
                    </span>

                </div>

            </div>

        @empty

            <div class="details-empty">
                <i class="bi bi-receipt"></i>
                <span>No repair quotes submitted yet.</span>
            </div>

        @endforelse

    </div>

</div>

@endsection
