
@extends('layouts.app')

@section('content')
<style>
    .maintenance-index {
        --mi-navy: #172554;
        --mi-purple: #6d28d9;
        --mi-blue: #2563eb;
        --mi-green: #059669;
        --mi-text: #1e293b;
        --mi-muted: #64748b;
        color: var(--mi-text);
        padding-bottom: 35px;
    }

    .maintenance-index .page-heading {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 18px;
        margin-bottom: 26px;
        flex-wrap: wrap;
    }

    .maintenance-index .page-title {
        font-size: 27px;
        font-weight: 800;
        color: var(--mi-navy);
        margin: 0 0 5px;
        letter-spacing: -.5px;
    }

    .maintenance-index .page-subtitle {
        color: var(--mi-muted);
        margin: 0;
        font-size: 14px;
    }

    .maintenance-index .add-maintenance-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        padding: 12px 19px;
        border: 0;
        border-radius: 11px;
        color: #fff;
        font-size: 14px;
        font-weight: 700;
        text-decoration: none;
        background: linear-gradient(120deg, #6d28d9, #2563eb);
        box-shadow: 0 7px 18px rgba(79, 70, 229, .25);
        transition: .25s ease;
    }

    .maintenance-index .add-maintenance-btn:hover {
        color: #fff;
        transform: translateY(-2px);
        box-shadow: 0 11px 24px rgba(79, 70, 229, .32);
    }

    /* Reminder panels */
    .maintenance-index .reminder-panel {
        border: 0;
        border-radius: 15px;
        padding: 19px 22px;
        margin-bottom: 20px;
        box-shadow: 0 5px 18px rgba(15, 23, 42, .06);
    }

    .maintenance-index .reminder-panel.overdue {
        background: #fff1f2;
        border-left: 5px solid #e11d48;
    }

    .maintenance-index .reminder-panel.upcoming {
        background: #fffbeb;
        border-left: 5px solid #d97706;
    }

    .maintenance-index .reminder-heading {
        display: flex;
        align-items: center;
        gap: 10px;
        font-size: 16px;
        font-weight: 800;
        margin: 0 0 14px;
    }

    .maintenance-index .overdue .reminder-heading {
        color: #be123c;
    }

    .maintenance-index .upcoming .reminder-heading {
        color: #92400e;
    }

    .maintenance-index .reminder-entry {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 12px;
        flex-wrap: wrap;
        padding: 11px 13px;
        margin-top: 8px;
        border-radius: 9px;
        background: rgba(255, 255, 255, .8);
        color: #334155;
        font-size: 13px;
    }

    .maintenance-index .reminder-entry strong {
        color: #172554;
        font-weight: 750;
    }

    .maintenance-index .reminder-date {
        font-weight: 700;
        white-space: nowrap;
    }

    .maintenance-index .overdue .reminder-date {
        color: #be123c;
    }

    .maintenance-index .upcoming .reminder-date {
        color: #92400e;
    }

    /* Main table card */
    .maintenance-index .maintenance-panel {
        background: #fff;
        border: 1px solid #e2e8f0;
        border-radius: 17px;
        overflow: hidden;
        box-shadow: 0 8px 28px rgba(15, 23, 42, .06);
    }

    .maintenance-index .panel-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 12px;
        padding: 19px 23px;
        border-bottom: 1px solid #e8edf5;
        background: linear-gradient(110deg, #fff, #f8faff);
    }

    .maintenance-index .panel-title {
        display: flex;
        align-items: center;
        gap: 11px;
        margin: 0;
        color: var(--mi-navy);
        font-size: 17px;
        font-weight: 800;
    }

    .maintenance-index .panel-title-icon {
        width: 37px;
        height: 37px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        border-radius: 10px;
        color: #fff;
        font-size: 17px;
        background: linear-gradient(135deg, #6d28d9, #2563eb);
    }

    .maintenance-index .record-count {
        padding: 6px 11px;
        border-radius: 20px;
        background: #ede9fe;
        color: #5b21b6;
        font-size: 12px;
        font-weight: 800;
    }

    .maintenance-index .table-wrap {
        padding: 5px 20px 18px;
    }

    .maintenance-index .maintenance-table {
        width: 100%;
        min-width: 950px;
        border-collapse: separate;
        border-spacing: 0;
        margin: 0;
    }

    .maintenance-index .maintenance-table thead th {
        padding: 15px 13px;
        color: #64748b;
        background: #f8fafc;
        border-bottom: 1px solid #e2e8f0;
        font-size: 11px;
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: .65px;
        white-space: nowrap;
    }

    .maintenance-index .maintenance-table tbody td {
        padding: 16px 13px;
        border-bottom: 1px solid #edf1f7;
        color: #475569;
        font-size: 13px;
        vertical-align: middle;
    }

    .maintenance-index .maintenance-table tbody tr {
        transition: background .2s ease;
    }

    .maintenance-index .maintenance-table tbody tr:hover {
        background: #f8faff;
    }

    .maintenance-index .maintenance-table tbody tr:last-child td {
        border-bottom: 0;
    }

    .maintenance-index .product-name {
        display: block;
        color: #172554;
        font-size: 13px;
        font-weight: 800;
        line-height: 1.5;
        min-width: 145px;
    }

    .maintenance-index .service-name {
        color: #334155;
        font-weight: 700;
        min-width: 110px;
    }

    .maintenance-index .date-value {
        color: #475569;
        font-size: 12px;
        font-weight: 650;
        white-space: nowrap;
    }

    .maintenance-index .cost-value {
        color: #047857;
        font-weight: 800;
        white-space: nowrap;
    }

    .maintenance-index .status-badge {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 7px 11px;
        border-radius: 20px;
        font-size: 11px;
        font-weight: 800;
        white-space: nowrap;
    }

    .maintenance-index .status-completed {
        color: #047857;
        background: #d1fae5;
    }

    .maintenance-index .status-overdue {
        color: #be123c;
        background: #ffe4e6;
    }

    .maintenance-index .status-pending {
        color: #92400e;
        background: #fef3c7;
    }

    .maintenance-index .action-group {
        display: flex;
        align-items: center;
        gap: 6px;
        min-width: 205px;
    }

    .maintenance-index .action-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 5px;
        padding: 7px 10px;
        border: 1px solid transparent;
        border-radius: 7px;
        font-size: 11px;
        font-weight: 750;
        text-decoration: none;
        white-space: nowrap;
        cursor: pointer;
        transition: .2s ease;
    }

    .maintenance-index .edit-btn {
        color: #1d4ed8;
        background: #eff6ff;
        border-color: #bfdbfe;
    }

    .maintenance-index .edit-btn:hover {
        color: #fff;
        background: #2563eb;
        border-color: #2563eb;
    }

    .maintenance-index .complete-btn {
        color: #047857;
        background: #ecfdf5;
        border-color: #a7f3d0;
    }

    .maintenance-index .complete-btn:hover {
        color: #fff;
        background: #059669;
        border-color: #059669;
    }

    .maintenance-index .delete-btn {
        color: #be123c;
        background: #fff1f2;
        border-color: #fecdd3;
    }

    .maintenance-index .delete-btn:hover {
        color: #fff;
        background: #e11d48;
        border-color: #e11d48;
    }

    .maintenance-index .action-form {
        margin: 0;
    }

    /* Empty state */
    .maintenance-index .empty-state {
        text-align: center;
        padding: 65px 20px;
    }

    .maintenance-index .empty-icon {
        width: 85px;
        height: 85px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        border-radius: 25px;
        background: linear-gradient(135deg, #ede9fe, #dbeafe);
        color: #6d28d9;
        font-size: 38px;
        margin-bottom: 19px;
    }

    .maintenance-index .empty-state h5 {
        color: #172554;
        font-size: 19px;
        font-weight: 800;
        margin-bottom: 8px;
    }

    .maintenance-index .empty-state p {
        color: #64748b;
        font-size: 13px;
        margin-bottom: 20px;
    }

    .maintenance-index .empty-action {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 11px 18px;
        border-radius: 9px;
        background: linear-gradient(120deg, #6d28d9, #2563eb);
        color: #fff;
        font-size: 13px;
        font-weight: 750;
        text-decoration: none;
        transition: .2s ease;
    }

    .maintenance-index .empty-action:hover {
        color: #fff;
        transform: translateY(-2px);
    }

    .maintenance-index .pagination {
        margin: 18px 0 0;
        gap: 5px;
        flex-wrap: wrap;
    }

    .maintenance-index .pagination .page-link {
        border-radius: 7px;
        border: 1px solid #e2e8f0;
        color: #4f46e5;
        font-size: 12px;
        font-weight: 700;
    }

    .maintenance-index .pagination .active .page-link {
        color: #fff;
        background: #6d28d9;
        border-color: #6d28d9;
    }

    @media (max-width: 768px) {
        .maintenance-index .page-title {
            font-size: 23px;
        }

        .maintenance-index .page-heading {
            align-items: flex-start;
        }

        .maintenance-index .add-maintenance-btn {
            width: 100%;
        }

        .maintenance-index .panel-header {
            padding: 16px;
        }

        .maintenance-index .table-wrap {
            padding: 5px 12px 15px;
        }

        .maintenance-index .reminder-panel {
            padding: 16px;
        }
    }

    @media (max-width: 480px) {
        .maintenance-index .page-title {
            font-size: 21px;
        }

        .maintenance-index .record-count {
            font-size: 10px;
        }

        .maintenance-index .panel-title {
            font-size: 15px;
        }

        .maintenance-index .reminder-entry {
            align-items: flex-start;
            flex-direction: column;
        }
    }
</style>

<div class="container-fluid py-4 maintenance-index">

    {{-- Page Header --}}
    <div class="page-heading">
        <div>
            <h2 class="page-title">Maintenance Management</h2>
            <p class="page-subtitle">
                Manage your product maintenance schedules and service records.
            </p>
        </div>

        <a href="{{ route('products.index') }}" class="add-maintenance-btn">
            <i class="bi bi-plus-circle"></i>
            Add Maintenance
        </a>
    </div>

    {{-- Overdue Reminders --}}
    @if(isset($overdueReminders) && $overdueReminders->count())
        <div class="reminder-panel overdue">
            <h5 class="reminder-heading">
                <i class="bi bi-exclamation-triangle-fill"></i>
                Overdue Maintenance
            </h5>

            @foreach($overdueReminders as $reminder)
                <div class="reminder-entry">
                    <div>
                        <strong>
                            {{ $reminder->product->brand }}
                            {{ $reminder->product->model }}
                        </strong>
                        <span class="mx-1">—</span>
                        {{ $reminder->service_type }}
                    </div>

                    <span class="reminder-date">
                        <i class="bi bi-calendar-x me-1"></i>
                        Due: {{ $reminder->next_service_date->format('d M Y') }}
                    </span>
                </div>
            @endforeach
        </div>
    @endif

    {{-- Upcoming Reminders --}}
    @if(isset($upcomingReminders) && $upcomingReminders->count())
        <div class="reminder-panel upcoming">
            <h5 class="reminder-heading">
                <i class="bi bi-bell-fill"></i>
                Upcoming Maintenance
            </h5>

            @foreach($upcomingReminders as $reminder)
                <div class="reminder-entry">
                    <div>
                        <strong>
                            {{ $reminder->product->brand }}
                            {{ $reminder->product->model }}
                        </strong>
                        <span class="mx-1">—</span>
                        {{ $reminder->service_type }}
                    </div>

                    <span class="reminder-date">
                        <i class="bi bi-calendar-event me-1"></i>
                        Due: {{ $reminder->next_service_date->format('d M Y') }}
                    </span>
                </div>
            @endforeach
        </div>
    @endif

    {{-- Maintenance List --}}
    <div class="maintenance-panel">

        <div class="panel-header">
            <h5 class="panel-title">
                <span class="panel-title-icon">
                    <i class="bi bi-calendar2-check"></i>
                </span>
                Maintenance Records
            </h5>

            <span class="record-count">
                {{ $maintenances->total() }} Records
            </span>
        </div>

        @if($maintenances->count())
            <div class="table-wrap">
                <div class="table-responsive">
                    <table class="maintenance-table">
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>Service</th>
                                <th>Last Service</th>
                                <th>Next Service</th>
                                <th>Estimated Cost</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($maintenances as $maintenance)
                                @php
                                    $status = $maintenance->status;

                                    if (
                                        $status !== 'completed' &&
                                        $maintenance->next_service_date->lt(today())
                                    ) {
                                        $status = 'overdue';
                                    }

                                    $statusClass = $status === 'completed'
                                        ? 'status-completed'
                                        : ($status === 'overdue'
                                            ? 'status-overdue'
                                            : 'status-pending');
                                @endphp

                                <tr>
                                    <td>
                                        <span class="product-name">
                                            {{ $maintenance->product->brand }}
                                            {{ $maintenance->product->model }}
                                        </span>
                                    </td>

                                    <td>
                                        <span class="service-name">
                                            {{ $maintenance->service_type }}
                                        </span>
                                    </td>

                                    <td>
                                        <span class="date-value">
                                            {{ $maintenance->last_service_date?->format('d M Y') ?? '—' }}
                                        </span>
                                    </td>

                                    <td>
                                        <span class="date-value">
                                            {{ $maintenance->next_service_date->format('d M Y') }}
                                        </span>
                                    </td>

                                    <td>
                                        <span class="cost-value">
                                            {{ $maintenance->estimated_cost !== null ? '₹'.number_format((float)$maintenance->estimated_cost, 2) : '—' }}
                                        </span>
                                    </td>

                                    <td>
                                        <span class="status-badge {{ $statusClass }}">
                                            @if($status === 'completed')
                                                <i class="bi bi-check-circle-fill me-1"></i>
                                            @elseif($status === 'overdue')
                                                <i class="bi bi-exclamation-circle-fill me-1"></i>
                                            @else
                                                <i class="bi bi-clock-fill me-1"></i>
                                            @endif

                                            {{ ucfirst(str_replace('_', ' ', $status)) }}
                                        </span>
                                    </td>

                                    <td>
                                        <div class="action-group">

                                            <a href="{{ route('maintenances.edit', $maintenance) }}"
                                               class="action-btn edit-btn">
                                                <i class="bi bi-pencil-square"></i>
                                                Edit
                                            </a>

                                            @if($maintenance->status !== 'completed')
                                                <form method="POST"
                                                      action="{{ route('maintenances.markComplete', $maintenance) }}"
                                                      class="action-form">
                                                    @csrf
                                                    @method('PATCH')

                                                    <button type="submit"
                                                            class="action-btn complete-btn"
                                                            onclick="return confirm('Mark this maintenance as completed?')">
                                                        <i class="bi bi-check2-circle"></i>
                                                        Complete
                                                    </button>
                                                </form>
                                            @endif

                                            <form method="POST"
                                                  action="{{ route('maintenances.destroy', $maintenance) }}"
                                                  class="action-form">
                                                @csrf
                                                @method('DELETE')

                                                <button type="submit"
                                                        class="action-btn delete-btn"
                                                        onclick="return confirm('Delete this maintenance record?')">
                                                    <i class="bi bi-trash3"></i>
                                                    Delete
                                                </button>
                                            </form>

                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="mt-3">
                    {{ $maintenances->links() }}
                </div>
            </div>
        @else
            <div class="empty-state">
                <div class="empty-icon">
                    <i class="bi bi-calendar2-check"></i>
                </div>

                <h5>No Maintenance Records Yet</h5>

                <p>
                    You haven't added any maintenance schedules.
                    Start by selecting one of your products.
                </p>

                <a href="{{ route('products.index') }}" class="empty-action">
                    <i class="bi bi-box-seam"></i>
                    View My Products
                </a>
            </div>
        @endif

    </div>
</div>
@endsection
