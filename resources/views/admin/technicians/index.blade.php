
@extends('admin.layouts.app')

@section('title', 'Technicians')
@section('page-heading', 'Technician Management')
@section('page-subtitle', 'Manage, verify and monitor technicians.')

@push('styles')
<style>
    .technician-page {
        --tech-primary: #5b4ce2;
        --tech-text: #172033;
        --tech-muted: #64748b;
    }

    .technician-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 15px;
        margin-bottom: 22px;
    }

    .header-info h5 {
        margin: 0;
        color: #172033;
        font-size: 16px;
        font-weight: 800;
    }

    .header-info p {
        margin: 5px 0 0;
        color: #64748b;
        font-size: 12px;
    }

    .btn-add-technician {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 9px;
        padding: 11px 19px;
        border: 0;
        border-radius: 10px;
        background: linear-gradient(135deg, #4f46e5, #7c3aed);
        color: #fff;
        font-size: 13px;
        font-weight: 800;
        text-decoration: none;
        box-shadow: 0 5px 14px #5b4ce233;
        transition: all .25s ease;
    }

    .btn-add-technician:hover {
        color: #fff;
        background: linear-gradient(135deg, #4338ca, #6d28d9);
        transform: translateY(-2px);
        box-shadow: 0 8px 18px #5b4ce244;
    }

    .tech-stat-grid {
        display: grid;
        grid-template-columns: repeat(3, minmax(0, 1fr));
        gap: 17px;
        margin-bottom: 22px;
    }

    .tech-stat-card {
        position: relative;
        overflow: hidden;
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 12px;
        padding: 20px;
        min-height: 112px;
        border-radius: 15px;
        color: #fff;
        box-shadow: 0 6px 18px rgba(23, 32, 51, .10);
        transition: transform .25s ease;
    }

    .tech-stat-card:hover {
        transform: translateY(-4px);
    }

    .tech-stat-card::after {
        content: "";
        position: absolute;
        width: 110px;
        height: 110px;
        right: -28px;
        top: -40px;
        border: 17px solid rgba(255,255,255,.12);
        border-radius: 50%;
    }

    .tech-stat-card.purple {
        background: linear-gradient(135deg, #5b4ce2, #9333ea);
    }

    .tech-stat-card.green {
        background: linear-gradient(135deg, #059669, #10b981);
    }

    .tech-stat-card.orange {
        background: linear-gradient(135deg, #ea580c, #f59e0b);
    }

    .stat-content {
        position: relative;
        z-index: 1;
    }

    .stat-content span {
        display: block;
        margin-bottom: 8px;
        color: rgba(255,255,255,.88);
        font-size: 12px;
        font-weight: 700;
    }

    .stat-content strong {
        display: block;
        color: #fff;
        font-size: 27px;
        font-weight: 900;
        line-height: 1;
    }

    .stat-icon {
        position: relative;
        z-index: 1;
        display: flex;
        align-items: center;
        justify-content: center;
        width: 48px;
        height: 48px;
        flex-shrink: 0;
        border-radius: 13px;
        background: rgba(255,255,255,.19);
        color: #fff;
        font-size: 23px;
    }

    .tech-alert {
        padding: 13px 17px;
        margin-bottom: 17px;
        border-radius: 11px;
        font-size: 13px;
        font-weight: 600;
    }

    .tech-alert-success {
        border: 1px solid #a7f3d0;
        border-left: 4px solid #059669;
        background: #ecfdf5;
        color: #065f46;
    }

    .tech-alert-danger {
        border: 1px solid #fecaca;
        border-left: 4px solid #dc2626;
        background: #fef2f2;
        color: #991b1b;
    }

    .tech-alert div + div {
        margin-top: 5px;
    }

    .technician-panel {
        overflow: hidden;
        padding: 23px;
        border: 1px solid #e5eaf2;
        border-radius: 17px;
        background: #fff;
        box-shadow: 0 6px 22px rgba(23, 32, 51, .055);
    }

    .panel-heading {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 12px;
        margin-bottom: 20px;
    }

    .panel-heading h5 {
        margin: 0;
        color: #172033;
        font-size: 15px;
        font-weight: 800;
    }

    .panel-heading p {
        margin: 5px 0 0;
        color: #64748b;
        font-size: 11px;
    }

    .technician-count {
        padding: 7px 12px;
        border-radius: 20px;
        background: #ede9fe;
        color: #6d28d9;
        font-size: 11px;
        font-weight: 800;
        white-space: nowrap;
    }

    .tech-search-box {
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 7px;
        margin-bottom: 21px;
        border: 1px solid #dbe2ec;
        border-radius: 12px;
        background: #f8fafc;
        transition: all .2s ease;
    }

    .tech-search-box:focus-within {
        border-color: #7164ed;
        background: #fff;
        box-shadow: 0 0 0 4px rgba(99,102,241,.10);
    }

    .tech-search-box > i {
        margin-left: 9px;
        color: #6366f1;
        font-size: 17px;
    }

    .tech-search-box .form-control {
        min-width: 0;
        height: 39px;
        padding: 8px 5px;
        border: 0;
        background: transparent;
        color: #172033;
        font-size: 13px;
        box-shadow: none;
    }

    .tech-search-box .form-control:focus {
        box-shadow: none;
    }

    .tech-search-box .form-control::placeholder {
        color: #94a3b8;
    }

    .tech-search-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 7px;
        min-height: 39px;
        padding: 8px 17px;
        border: 0;
        border-radius: 9px;
        background: linear-gradient(135deg, #4f46e5, #7c3aed);
        color: #fff;
        font-size: 12px;
        font-weight: 800;
        white-space: nowrap;
        transition: all .2s ease;
    }

    .tech-search-btn:hover {
        background: #4338ca;
        color: #fff;
    }

    .tech-table-wrap {
        overflow-x: auto;
        border: 1px solid #edf0f5;
        border-radius: 12px;
    }

    .tech-table {
        width: 100%;
        min-width: 900px;
        margin: 0;
        border-collapse: separate;
        border-spacing: 0;
    }

    .tech-table thead th {
        padding: 15px 13px;
        border-bottom: 1px solid #e5eaf2;
        background: #f5f6ff;
        color: #475569;
        font-size: 10px;
        font-weight: 900;
        letter-spacing: .65px;
        text-transform: uppercase;
        white-space: nowrap;
    }

    .tech-table tbody td {
        padding: 15px 13px;
        border-bottom: 1px solid #edf0f5;
        color: #334155;
        font-size: 12px;
        vertical-align: middle;
    }

    .tech-table tbody tr {
        transition: background .2s ease;
    }

    .tech-table tbody tr:hover {
        background: #f8faff;
    }

    .tech-table tbody tr:last-child td {
        border-bottom: 0;
    }

    .tech-profile {
        display: flex;
        align-items: center;
        gap: 11px;
        min-width: 220px;
    }

    .tech-avatar {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 47px;
        height: 47px;
        flex-shrink: 0;
        overflow: hidden;
        border: 2px solid #e0e7ff;
        border-radius: 13px;
        background: linear-gradient(135deg, #ede9fe, #dbeafe);
        color: #5b4ce2;
        font-size: 20px;
        font-weight: 800;
    }

    .tech-avatar img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .tech-profile-info {
        min-width: 0;
    }

    .tech-profile-info strong {
        display: block;
        margin-bottom: 4px;
        color: #172033;
        font-size: 13px;
        font-weight: 800;
    }

    .tech-profile-info small {
        display: block;
        margin-top: 3px;
        color: #64748b;
        font-size: 10px;
        overflow-wrap: anywhere;
    }

    .tech-specialization {
        display: inline-block;
        max-width: 170px;
        padding: 6px 10px;
        border-radius: 8px;
        background: #eff6ff;
        color: #1d4ed8;
        font-size: 11px;
        font-weight: 700;
        overflow-wrap: anywhere;
    }

    .tech-experience {
        color: #475569;
        font-weight: 700;
    }

    .tech-charge {
        color: #047857;
        font-size: 13px;
        font-weight: 900;
        white-space: nowrap;
    }

    .tech-status {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 7px 10px;
        border-radius: 20px;
        font-size: 10px;
        font-weight: 800;
        white-space: nowrap;
    }

    .tech-status.verified {
        background: #d1fae5;
        color: #047857;
    }

    .tech-status.unverified {
        background: #fef3c7;
        color: #92400e;
    }

    .tech-status.available {
        background: #dbeafe;
        color: #1d4ed8;
    }

    .tech-status.unavailable {
        background: #fee2e2;
        color: #b91c1c;
    }

    .tech-actions {
        display: flex;
        align-items: center;
        gap: 7px;
    }

    .tech-action-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 34px;
        height: 34px;
        border: 1px solid transparent;
        border-radius: 9px;
        font-size: 14px;
        text-decoration: none;
        cursor: pointer;
        transition: all .2s ease;
    }

    .tech-edit-btn {
        border-color: #c7d2fe;
        background: #eef2ff;
        color: #4f46e5;
    }

    .tech-edit-btn:hover {
        border-color: #4f46e5;
        background: #4f46e5;
        color: #fff;
        transform: translateY(-2px);
    }

    .tech-delete-btn {
        border-color: #fecaca;
        background: #fef2f2;
        color: #dc2626;
    }

    .tech-delete-btn:hover {
        border-color: #dc2626;
        background: #dc2626;
        color: #fff;
        transform: translateY(-2px);
    }

    .tech-empty-state {
        padding: 55px 20px !important;
        text-align: center;
    }

    .tech-empty-icon {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 65px;
        height: 65px;
        margin: 0 auto 14px;
        border-radius: 18px;
        background: #ede9fe;
        color: #7c3aed;
        font-size: 28px;
    }

    .tech-empty-state strong {
        display: block;
        margin-bottom: 6px;
        color: #334155;
        font-size: 14px;
    }

    .tech-empty-state span {
        color: #94a3b8;
        font-size: 12px;
    }

    .tech-pagination {
        padding-top: 18px;
        margin-top: 18px;
        border-top: 1px solid #edf0f5;
    }

    .tech-pagination nav {
        display: flex;
        justify-content: flex-end;
    }

    .tech-pagination .pagination {
        margin-bottom: 0;
        gap: 5px;
    }

    .tech-pagination .page-link {
        border: 1px solid #e2e8f0;
        border-radius: 8px !important;
        color: #4f46e5;
        font-size: 12px;
        font-weight: 700;
    }

    .tech-pagination .page-item.active .page-link {
        border-color: #5b4ce2;
        background: #5b4ce2;
        color: #fff;
    }

    .tech-pagination .page-item.disabled .page-link {
        color: #94a3b8;
    }

    @media(max-width: 900px) {
        .tech-stat-grid {
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }
    }

    @media(max-width: 600px) {
        .technician-header {
            align-items: stretch;
            flex-direction: column;
        }

        .btn-add-technician {
            width: 100%;
        }

        .tech-stat-grid {
            grid-template-columns: 1fr;
            gap: 12px;
        }

        .tech-stat-card {
            min-height: 95px;
        }

        .technician-panel {
            padding: 16px 12px;
        }

        .panel-heading {
            align-items: flex-start;
            flex-direction: column;
        }

        .tech-search-box {
            flex-wrap: wrap;
        }

        .tech-search-box .form-control {
            flex: 1;
        }

        .tech-search-btn {
            flex: 1;
        }

        .tech-pagination nav {
            justify-content: center;
        }
    }
</style>
@endpush

@section('content')

<div class="technician-page">

    {{-- Header --}}
    <div class="technician-header">

        <div class="header-info">
            <h5>
                <i class="bi bi-people-fill text-primary me-1"></i>
                Technician Directory
            </h5>
            <p>View and manage all registered technicians.</p>
        </div>

        <a href="{{ route('admin.technicians.create') }}"
           class="btn-add-technician">
            <i class="bi bi-plus-circle-fill"></i>
            Add Technician
        </a>

    </div>

    {{-- Alerts --}}
    @if(session('success'))
        <div class="tech-alert tech-alert-success">
            <i class="bi bi-check-circle-fill me-1"></i>
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="tech-alert tech-alert-danger">
            <i class="bi bi-exclamation-circle-fill me-1"></i>
            {{ session('error') }}
        </div>
    @endif

    @if($errors->any())
        <div class="tech-alert tech-alert-danger">
            <strong>
                <i class="bi bi-exclamation-triangle-fill me-1"></i>
                Please check the following errors:
            </strong>

            @foreach($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
        </div>
    @endif

    {{-- Statistics --}}
    <div class="tech-stat-grid">

        <div class="tech-stat-card purple">
            <div class="stat-content">
                <span>Total Technicians</span>
                <strong>{{ $technicians->total() }}</strong>
            </div>
            <div class="stat-icon">
                <i class="bi bi-people-fill"></i>
            </div>
        </div>

        <div class="tech-stat-card green">
            <div class="stat-content">
                <span>Verified Technicians</span>
                <strong>{{ $technicians->getCollection()->where('verified', true)->count() }}</strong>
            </div>
            <div class="stat-icon">
                <i class="bi bi-patch-check-fill"></i>
            </div>
        </div>

        <div class="tech-stat-card orange">
            <div class="stat-content">
                <span>Available Technicians</span>
                <strong>{{ $technicians->getCollection()->where('available', true)->count() }}</strong>
            </div>
            <div class="stat-icon">
                <i class="bi bi-person-check-fill"></i>
            </div>
        </div>

    </div>

    {{-- Technician Table --}}
    <div class="technician-panel">

        <div class="panel-heading">

            <div>
                <h5>
                    <i class="bi bi-list-ul text-primary me-1"></i>
                    All Technicians
                </h5>
                <p>Technician profiles, professional details and current status.</p>
            </div>

            <span class="technician-count">
                {{ $technicians->total() }} Technicians
            </span>

        </div>

        {{-- Search --}}
        <form method="GET" action="{{ route('admin.technicians.index') }}">

            <div class="tech-search-box">
                <i class="bi bi-search"></i>

                <input type="text"
                       name="search"
                       class="form-control"
                       placeholder="Search name, email, phone or specialization..."
                       value="{{ $search }}">

                <button class="tech-search-btn" type="submit">
                    <i class="bi bi-search"></i>
                    Search
                </button>
            </div>

        </form>

        {{-- Table --}}
        <div class="tech-table-wrap">

            <table class="table tech-table align-middle">

                <thead>
                    <tr>
                        <th>Technician</th>
                        <th>Specialization</th>
                        <th>Experience</th>
                        <th>Charge</th>
                        <th>Verification</th>
                        <th>Availability</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <tbody>

                @forelse($technicians as $technician)

                    <tr>

                        {{-- Technician Profile --}}
                        <td>
                            <div class="tech-profile">

                                <div class="tech-avatar">

                                    @if($technician->profile_image)
                                        <img src="{{ asset('storage/'.$technician->profile_image) }}"
                                             alt="Technician">
                                    @else
                                        <i class="bi bi-person-fill"></i>
                                    @endif

                                </div>

                                <div class="tech-profile-info">
                                    <strong>{{ $technician->name }}</strong>
                                    <small>
                                        <i class="bi bi-envelope me-1"></i>
                                        {{ $technician->email }}
                                    </small>
                                    <small>
                                        <i class="bi bi-telephone me-1"></i>
                                        {{ $technician->phone }}
                                    </small>
                                </div>

                            </div>
                        </td>

                        {{-- Specialization --}}
                        <td>
                            <span class="tech-specialization">
                                {{ $technician->specialization ?? 'N/A' }}
                            </span>
                        </td>

                        {{-- Experience --}}
                        <td>
                            <span class="tech-experience">
                                {{ $technician->experience ?? 'N/A' }}
                            </span>
                        </td>

                        {{-- Service Charge --}}
                        <td>
                            <span class="tech-charge">
                                ₹{{ number_format((float)$technician->service_charge, 2) }}
                            </span>
                        </td>

                        {{-- Verification --}}
                        <td>
                            <span class="tech-status {{ $technician->verified ? 'verified' : 'unverified' }}">
                                @if($technician->verified)
                                    <i class="bi bi-patch-check-fill"></i>
                                    Verified
                                @else
                                    <i class="bi bi-exclamation-circle-fill"></i>
                                    Not Verified
                                @endif
                            </span>
                        </td>

                        {{-- Availability --}}
                        <td>
                            <span class="tech-status {{ $technician->available ? 'available' : 'unavailable' }}">
                                @if($technician->available)
                                    <i class="bi bi-check-circle-fill"></i>
                                    Available
                                @else
                                    <i class="bi bi-x-circle-fill"></i>
                                    Unavailable
                                @endif
                            </span>
                        </td>

                        {{-- Actions --}}
                        <td>
                            <div class="tech-actions">

                                <a href="{{ route('admin.technicians.edit', $technician) }}"
                                   class="tech-action-btn tech-edit-btn"
                                   title="Edit Technician">
                                    <i class="bi bi-pencil-square"></i>
                                </a>

                                <form method="POST"
                                      action="{{ route('admin.technicians.destroy', $technician) }}"
                                      onsubmit="return confirm('Are you sure you want to delete this technician?')">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                            class="tech-action-btn tech-delete-btn"
                                            title="Delete Technician">
                                        <i class="bi bi-trash3-fill"></i>
                                    </button>

                                </form>

                            </div>
                        </td>

                    </tr>

                @empty

                    <tr>
                        <td colspan="7" class="tech-empty-state">

                            <div class="tech-empty-icon">
                                <i class="bi bi-people"></i>
                            </div>

                            <strong>No Technicians Found</strong>

                            <span>
                                No technicians match your search. Try another keyword or add a new technician.
                            </span>

                        </td>
                    </tr>

                @endforelse

                </tbody>

            </table>

        </div>

        {{-- Pagination --}}
        <div class="tech-pagination">
            {{ $technicians->links() }}
        </div>

    </div>

</div>

@endsection
