
@extends('admin.layouts.app')

@section('title', 'Repair Requests')
@section('page-heading', 'Repair Request Management')
@section('page-subtitle', 'View customer repair requests and update their status.')

@push('styles')
<style>
    /* MAIN PANEL */

    .repair-panel {
        background: #ffffff;
        border: 1px solid #e8eaf4;
        border-radius: 20px;
        box-shadow: 0 8px 28px rgba(32, 40, 85, .055);
        overflow: hidden;
    }

    .repair-panel-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 18px;
        padding: 23px 25px;
        border-bottom: 1px solid #edf0f6;
    }

    .repair-panel-title {
        font-size: 17px;
        font-weight: 900;
        color: #202944;
        margin: 0 0 5px;
    }

    .repair-panel-title i {
        color: #6949e9;
    }

    .repair-panel-subtitle {
        color: #8792a7;
        font-size: 11px;
        margin: 0;
    }

    /* SEARCH */

    .repair-search {
        width: min(100%, 380px);
    }

    .repair-search .form-control {
        min-width: 0;
        border: 1px solid #e0e6f0;
        border-radius: 11px 0 0 11px;
        padding: 11px 14px;
        font-size: 12px;
        background: #fbfcff;
        color: #28324d;
        box-shadow: none;
    }

    .repair-search .form-control:focus {
        border-color: #7150e9;
        background: #fff;
        box-shadow: 0 0 0 4px rgba(105, 73, 233, .10);
    }

    .repair-search .btn {
        border: none;
        border-radius: 0 11px 11px 0;
        padding: 0 19px;
        color: #fff;
        background: linear-gradient(135deg, #7551ec, #416ef1);
        font-size: 12px;
        font-weight: 800;
    }

    .repair-search .btn:hover {
        background: linear-gradient(135deg, #5e3bd4, #315cdb);
    }

    /* TABLE */

    .repair-table-wrap {
        padding: 0 18px;
    }

    .repair-table {
        min-width: 1050px;
        margin-bottom: 0;
        --bs-table-bg: transparent;
        --bs-table-hover-bg: #f8f7ff;
    }

    .repair-table thead th {
        background: #f7f8fd;
        color: #77839a;
        font-size: 10px;
        font-weight: 900;
        letter-spacing: .7px;
        padding: 17px 12px;
        border-bottom: 1px solid #e8ecf4;
        white-space: nowrap;
    }

    .repair-table tbody td {
        padding: 17px 12px;
        vertical-align: middle;
        font-size: 11px;
        font-weight: 600;
        color: #56617a;
        border-bottom: 1px solid #eff1f6;
    }

    .repair-table tbody tr {
        transition: background .2s;
    }

    .repair-table tbody tr:hover {
        background: #f8f7ff;
    }

    /* REQUEST ID */

    .repair-id {
        display: inline-flex;
        align-items: center;
        padding: 7px 10px;
        border-radius: 9px;
        background: #eee9ff;
        color: #6546d9;
        font-size: 11px;
        font-weight: 900;
        white-space: nowrap;
    }

    /* CUSTOMER */

    .customer-name {
        color: #25304c;
        font-size: 12px;
        font-weight: 900;
        margin-bottom: 4px;
    }

    .customer-email {
        color: #8993a7;
        font-size: 10px;
        overflow-wrap: anywhere;
    }

    /* PRODUCT */

    .product-name {
        color: #303b59;
        font-size: 11px;
        font-weight: 800;
        line-height: 1.6;
    }

    .product-icon {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 29px;
        height: 29px;
        border-radius: 9px;
        background: #e4f1ff;
        color: #287bd2;
        margin-right: 6px;
        vertical-align: middle;
    }

    /* PROBLEM */

    .problem-title {
        color: #28334f;
        font-size: 11px;
        font-weight: 900;
        margin-bottom: 5px;
        max-width: 190px;
    }

    .problem-description {
        color: #8993a7;
        font-size: 10px;
        line-height: 1.6;
        max-width: 210px;
    }

    /* PRIORITY */

    .priority-badge {
        display: inline-flex;
        align-items: center;
        gap: 5px;
        padding: 6px 9px;
        border-radius: 20px;
        font-size: 9px;
        font-weight: 900;
        margin-top: 7px;
        white-space: nowrap;
    }

    .priority-badge.low {
        color: #16804e;
        background: #e4f8ec;
    }

    .priority-badge.medium {
        color: #bd790f;
        background: #fff3d8;
    }

    .priority-badge.high {
        color: #d94a38;
        background: #ffebe6;
    }

    .priority-badge.urgent {
        color: #c51d46;
        background: #ffe1e9;
    }

    /* TECHNICIAN */

    .technician-name {
        display: inline-flex;
        align-items: center;
        gap: 7px;
        color: #52617c;
        font-size: 11px;
        font-weight: 800;
        min-width: 110px;
    }

    .technician-name i {
        color: #7653e8;
        font-size: 15px;
    }

    .not-assigned {
        color: #d18a20;
        background: #fff5df;
        padding: 7px 9px;
        border-radius: 8px;
        font-size: 10px;
        font-weight: 800;
        white-space: nowrap;
    }

    /* STATUS BADGES */

    .status {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 7px 10px;
        border-radius: 25px;
        font-size: 9px;
        font-weight: 900;
        white-space: nowrap;
    }

    .status::before {
        content: "";
        width: 6px;
        height: 6px;
        border-radius: 50%;
        background: currentColor;
    }

    .status.pending {
        background: #fff3d9;
        color: #bd790f;
    }

    .status.assigned {
        background: #e3f0ff;
        color: #2876d1;
    }

    .status.quoted {
        background: #f0e8ff;
        color: #8050d8;
    }

    .status.confirmed {
        background: #ddf7fa;
        color: #07899c;
    }

    .status.in_progress {
        background: #eee8ff;
        color: #6945d7;
    }

    .status.completed {
        background: #e0f8eb;
        color: #128b57;
    }

    .status.cancelled {
        background: #ffe7eb;
        color: #d23b57;
    }

    /* ACTION AREA */

    .repair-actions {
        min-width: 145px;
        max-width: 160px;
    }

    .view-details-btn {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 6px;
        width: 100%;
        padding: 8px 10px;
        border: 1px solid #dcd5ff;
        border-radius: 9px;
        background: #f4f0ff;
        color: #6546d9;
        font-size: 10px;
        font-weight: 900;
        text-decoration: none;
        transition: all .2s;
    }

    .view-details-btn:hover {
        color: #fff;
        background: linear-gradient(110deg, #6546e8, #4778ef);
        border-color: transparent;
        transform: translateY(-1px);
        box-shadow: 0 4px 12px rgba(101, 70, 232, .2);
    }

    .repair-status-form {
        margin-top: 8px;
    }

    .repair-status-form .form-select {
        border: 1px solid #e2e6f0;
        border-radius: 9px;
        padding: 8px 25px 8px 10px;
        font-size: 10px;
        font-weight: 700;
        color: #38435e;
        background-color: #fbfcff;
        box-shadow: none;
    }

    .repair-status-form .form-select:focus {
        border-color: #7150e9;
        box-shadow: 0 0 0 3px rgba(105, 73, 233, .10);
    }

    .update-status-btn {
        width: 100%;
        margin-top: 7px;
        padding: 8px 10px;
        border: none;
        border-radius: 9px;
        background: linear-gradient(110deg, #119d72, #0cbd91);
        color: white;
        font-size: 10px;
        font-weight: 900;
        transition: all .2s;
    }

    .update-status-btn:hover {
        color: white;
        background: linear-gradient(110deg, #087e5a, #079c75);
        transform: translateY(-1px);
        box-shadow: 0 4px 12px rgba(16, 157, 114, .2);
    }

    /* ALERTS */

    .alert-success,
    .alert-danger {
        border-radius: 13px;
        padding: 14px 18px;
        font-size: 12px;
        font-weight: 700;
        margin-bottom: 20px;
    }

    .alert-success {
        color: #087c4d;
        background: #e6fbf0;
        border: 1px solid #b9eed4;
    }

    .alert-danger {
        color: #c12f49;
        background: #fff0f2;
        border: 1px solid #ffd0d8;
    }

    /* EMPTY STATE */

    .repair-empty {
        text-align: center;
        padding: 60px 20px !important;
        color: #8590a6 !important;
        font-size: 12px !important;
        font-weight: 600 !important;
    }

    .repair-empty i {
        display: block;
        color: #9982ee;
        font-size: 42px;
        margin-bottom: 12px;
    }

    .repair-empty strong {
        display: block;
        color: #303a57;
        font-size: 15px;
        font-weight: 900;
    }

    /* PAGINATION */

    .repair-pagination {
        padding: 19px 25px;
        border-top: 1px solid #edf0f6;
    }

    .repair-pagination nav {
        display: flex;
        justify-content: flex-end;
    }

    .repair-pagination .pagination {
        margin-bottom: 0;
        --bs-pagination-color: #6246dc;
        --bs-pagination-hover-color: #fff;
        --bs-pagination-hover-bg: #7454e8;
        --bs-pagination-active-bg: #6546e8;
        --bs-pagination-active-border-color: #6546e8;
        --bs-pagination-border-color: #e9eafa;
    }

    .repair-pagination .page-link {
        font-size: 11px;
        font-weight: 700;
        border-radius: 8px;
        margin: 0 3px;
    }

    /* RESPONSIVE */

    @media (max-width: 700px) {
        .repair-panel-header {
            flex-direction: column;
            align-items: flex-start;
            padding: 20px;
        }

        .repair-search {
            width: 100%;
        }

        .repair-table-wrap {
            padding: 0 10px;
        }

        .repair-pagination {
            padding: 17px;
        }
    }
</style>
@endpush

@section('content')

    {{-- SUCCESS MESSAGE --}}

    @if(session('success'))
        <div class="alert alert-success">
            <i class="bi bi-check-circle-fill me-2"></i>
            {{ session('success') }}
        </div>
    @endif

    {{-- ERROR MESSAGE --}}

    @if($errors->any())
        <div class="alert alert-danger">
            <div class="mb-2">
                <i class="bi bi-exclamation-triangle-fill me-2"></i>
                Please check the following errors:
            </div>

            @foreach($errors->all() as $error)
                <div class="mb-1">
                    <i class="bi bi-dot"></i>
                    {{ $error }}
                </div>
            @endforeach
        </div>
    @endif

    {{-- REPAIR REQUEST MANAGEMENT --}}

    <section class="repair-panel">

        <div class="repair-panel-header">
            <div>
                <h2 class="repair-panel-title">
                    <i class="bi bi-tools me-2"></i>
                    All Repair Requests
                </h2>

                <p class="repair-panel-subtitle">
                    Manage customer repair requests, technicians and repair progress.
                </p>
            </div>

            {{-- SEARCH FORM --}}

            <form method="GET"
                  action="{{ route('admin.repairs.index') }}"
                  class="repair-search">

                <div class="input-group">
                    <input
                        type="text"
                        name="search"
                        class="form-control"
                        placeholder="Search title, customer or status..."
                        value="{{ $search }}"
                        aria-label="Search repair requests"
                    >

                    <button type="submit" class="btn">
                        <i class="bi bi-search me-1"></i>
                        Search
                    </button>
                </div>
            </form>
        </div>

        {{-- REPAIR TABLE --}}

        <div class="repair-table-wrap">
            <div class="table-responsive">

                <table class="table table-hover align-middle repair-table">

                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>CUSTOMER</th>
                            <th>PRODUCT</th>
                            <th>PROBLEM</th>
                            <th>TECHNICIAN</th>
                            <th>STATUS</th>
                            <th>UPDATE STATUS</th>
                        </tr>
                    </thead>

                    <tbody>

                    @forelse($repairRequests as $repair)

                        @php
                            $currentStatus = $repair->status ?? 'pending';

                            $statusClass = in_array($currentStatus, [
                                'pending',
                                'assigned',
                                'quoted',
                                'confirmed',
                                'in_progress',
                                'completed',
                                'cancelled'
                            ]) ? $currentStatus : 'pending';

                            $priorityValue = strtolower($repair->priority ?? 'medium');

                            $priorityClass = in_array($priorityValue, [
                                'low',
                                'medium',
                                'high',
                                'urgent'
                            ]) ? $priorityValue : 'medium';
                        @endphp

                        <tr>

                            {{-- ID --}}

                            <td>
                                <span class="repair-id">
                                    #{{ $repair->id }}
                                </span>
                            </td>

                            {{-- CUSTOMER --}}

                            <td>
                                <div class="customer-name">
                                    {{ $repair->user->name ?? 'Unknown' }}
                                </div>

                                <div class="customer-email">
                                    <i class="bi bi-envelope me-1"></i>
                                    {{ $repair->user->email ?? '' }}
                                </div>
                            </td>

                            {{-- PRODUCT --}}

                            <td>
                                <div class="product-name">
                                    <span class="product-icon">
                                        <i class="bi bi-box-seam"></i>
                                    </span>

                                    {{ $repair->product->brand ?? '' }}
                                    {{ $repair->product->model ?? '' }}
                                </div>
                            </td>

                            {{-- PROBLEM --}}

                            <td>
                                <div class="problem-title">
                                    {{ $repair->problem_title }}
                                </div>

                                <div class="problem-description">
                                    {{ \Illuminate\Support\Str::limit($repair->problem_description, 70) }}
                                </div>

                                <span class="priority-badge {{ $priorityClass }}">
                                    <i class="bi bi-flag-fill"></i>
                                    Priority: {{ ucfirst($repair->priority ?? 'Medium') }}
                                </span>
                            </td>

                            {{-- TECHNICIAN --}}

                            <td>
                                @if($repair->technician)
                                    <span class="technician-name">
                                        <i class="bi bi-person-gear"></i>
                                        {{ $repair->technician->name }}
                                    </span>
                                @else
                                    <span class="not-assigned">
                                        <i class="bi bi-clock me-1"></i>
                                        Not assigned
                                    </span>
                                @endif
                            </td>

                            {{-- STATUS --}}

                            <td>
                                <span class="status {{ $statusClass }}">
                                    {{ ucfirst(str_replace('_', ' ', $repair->status)) }}
                                </span>
                            </td>

                            {{-- ACTIONS --}}

                            <td>
                                <div class="repair-actions">

                                    {{-- VIEW DETAILS --}}

                                    <a href="{{ route('admin.repairs.show', $repair) }}"
                                       class="view-details-btn">

                                        <i class="bi bi-eye-fill"></i>
                                        View Details
                                    </a>

                                    {{-- UPDATE STATUS --}}

                                    <form method="POST"
                                          action="{{ route('admin.repairs.updateStatus', $repair) }}"
                                          class="repair-status-form">

                                        @csrf
                                        @method('PATCH')

                                        <select name="status"
                                                class="form-select form-select-sm mb-2">

                                            @foreach([
                                                'pending',
                                                'assigned',
                                                'quoted',
                                                'confirmed',
                                                'in_progress',
                                                'completed',
                                                'cancelled'
                                            ] as $status)

                                                <option value="{{ $status }}"
                                                    @selected($repair->status === $status)>

                                                    {{ ucfirst(str_replace('_', ' ', $status)) }}

                                                </option>

                                            @endforeach

                                        </select>

                                        <button type="submit" class="update-status-btn">
                                            <i class="bi bi-arrow-repeat me-1"></i>
                                            Update Status
                                        </button>

                                    </form>

                                </div>
                            </td>

                        </tr>

                    @empty

                        <tr>
                            <td colspan="7" class="repair-empty">
                                <i class="bi bi-tools"></i>
                                <strong>No Repair Requests Found</strong>
                                <div class="mt-2">
                                    No repair requests are available for the current search.
                                </div>
                            </td>
                        </tr>

                    @endforelse

                    </tbody>
                </table>

            </div>
        </div>

        {{-- PAGINATION --}}

        <div class="repair-pagination">
            {{ $repairRequests->links() }}
        </div>

    </section>

@endsection
