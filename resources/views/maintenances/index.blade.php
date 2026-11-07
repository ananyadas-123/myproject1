
@extends('layouts.app')

@section('content')
<div class="container-fluid py-4">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold mb-1">Maintenance Management</h2>
            <p class="text-muted mb-0">Manage your product maintenance schedules.</p>
        </div>
        <a href="{{ route('products.index') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle me-1"></i> Add Maintenance
        </a>
    </div>

    {{-- Overdue Reminders --}}
    @if(isset($overdueReminders) && $overdueReminders->count())
        <div class="alert alert-danger mb-4">
            <h5><i class="bi bi-exclamation-triangle me-2"></i>Overdue Maintenance</h5>
            @foreach($overdueReminders as $reminder)
                <div class="mb-2">
                    <strong>{{ $reminder->product->brand }} {{ $reminder->product->model }}</strong>
                    — {{ $reminder->service_type }}
                    <span class="ms-2">
                        Due: {{ $reminder->next_service_date->format('d M Y') }}
                    </span>
                </div>
            @endforeach
        </div>
    @endif

    {{-- Upcoming Reminders --}}
    @if(isset($upcomingReminders) && $upcomingReminders->count())
        <div class="alert alert-warning mb-4">
            <h5><i class="bi bi-bell me-2"></i>Upcoming Maintenance</h5>
            @foreach($upcomingReminders as $reminder)
                <div class="mb-2">
                    <strong>{{ $reminder->product->brand }} {{ $reminder->product->model }}</strong>
                    — {{ $reminder->service_type }}
                    <span class="ms-2">
                        Due: {{ $reminder->next_service_date->format('d M Y') }}
                    </span>
                </div>
            @endforeach
        </div>
    @endif

    {{-- Maintenance List --}}
    <div class="card border-0 shadow-sm">
        <div class="card-body">
            @if($maintenances->count())
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>Service</th>
                                <th>Last Service</th>
                                <th>Next Service</th>
                                <th>Cost</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($maintenances as $maintenance)
                                @php
                                    $status = $maintenance->status;
                                    if ($status !== 'completed' && $maintenance->next_service_date->lt(today())) {
                                        $status = 'overdue';
                                    }
                                @endphp
                                <tr>
                                    <td>
                                        <strong>
                                            {{ $maintenance->product->brand }}
                                            {{ $maintenance->product->model }}
                                        </strong>
                                    </td>
                                    <td>{{ $maintenance->service_type }}</td>
                                    <td>
                                        {{ $maintenance->last_service_date?->format('d M Y') ?? '—' }}
                                    </td>
                                    <td>{{ $maintenance->next_service_date->format('d M Y') }}</td>
                                    <td>{{ $maintenance->estimated_cost !== null ? '₹'.number_format((float)$maintenance->estimated_cost, 2) : '—' }}</td>
                                    <td>
                                        <span class="badge
                                            {{ $status === 'completed' ? 'bg-success' : ($status === 'overdue' ? 'bg-danger' : 'bg-warning text-dark') }}">
                                            {{ ucfirst(str_replace('_', ' ', $status)) }}
                                        </span>
                                    </td>
                                    <td>
                                        <div class="d-flex gap-2">
                                            <a href="{{ route('maintenances.edit', $maintenance) }}"
                                               class="btn btn-sm btn-outline-primary">
                                                Edit
                                            </a>

                                            @if($maintenance->status !== 'completed')
                                                <form method="POST" action="{{ route('maintenances.markComplete', $maintenance) }}">
                                                    @csrf
                                                    @method('PATCH')
                                                    <button class="btn btn-sm btn-outline-success"
                                                            onclick="return confirm('Mark this maintenance as completed?')">
                                                        Complete
                                                    </button>
                                                </form>
                                            @endif

                                            <form method="POST" action="{{ route('maintenances.destroy', $maintenance) }}">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-sm btn-outline-danger"
                                                        onclick="return confirm('Delete this maintenance record?')">
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
            @else
                <div class="text-center py-5">
                    <i class="bi bi-calendar2-check display-4 text-muted"></i>
                    <h5 class="mt-3">No maintenance records yet</h5>
                    <p class="text-muted">Add maintenance details from one of your products.</p>
                    <a href="{{ route('products.index') }}" class="btn btn-primary">
                        View My Products
                    </a>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
