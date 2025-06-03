@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h2 class="mb-4 text-primary fw-bold">Service Requests</h2>

    {{-- Filter Form --}}
    <form method="GET" action="{{ route('service_requests.index') }}" class="row g-3 mb-4">
        <div class="col-md-4">
            <input type="text" name="guest_name" class="form-control" placeholder="Search by Guest Name" value="{{ request('guest_name') }}">
        </div>
        <div class="col-md-3">
            <select name="status" class="form-select">
                <option value="">All Statuses</option>
                <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="in_progress" {{ request('status') == 'in_progress' ? 'selected' : '' }}>In Progress</option>
                <option value="completed" {{ request('status') == 'completed' ? 'selected' : '' }}>Completed</option>
            </select>
        </div>
        <div class="col-md-2">
            <button type="submit" class="btn btn-primary w-100">Filter</button>
        </div>
        <div class="col-md-2">
            <a href="{{ route('service_requests.index') }}" class="btn btn-outline-secondary w-100">Reset</a>
        </div>
    </form>

    {{-- Service Requests Table --}}
    <div class="table-responsive shadow-sm rounded-3 border">
        <table class="table table-hover align-middle mb-0 bg-white">
            <thead class="table-light">
                <tr>
                    <th>Guest Name</th>
                    <th class="text-center">Service Type</th>
                    <th class="text-center">Priority</th>
                    <th class="text-center">Status</th>
                    <th class="text-center">Handled By</th>
                    <th class="text-center">Completed At</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($service_requests as $request)
                    <tr>
                        <td>{{ $request->guest->name ?? 'Unknown' }}</td>
                        <td class="text-center text-capitalize">{{ $request->service_type }}</td>
                        <td class="text-center">
                            <span class="badge bg-{{ $request->priority === 'high' ? 'danger' : ($request->priority === 'medium' ? 'warning text-dark' : 'success') }}">
                                {{ ucfirst($request->priority) }}
                            </span>
                        </td>
                        <td class="text-center">
                            <form method="POST" action="{{ route('service_requests.update_status', $request->id) }}">
                                @csrf
                                @method('PATCH')
                                <select name="status" class="form-select form-select-sm" onchange="this.form.submit()">
                                    <option value="pending" {{ $request->status === 'pending' ? 'selected' : '' }}>Pending</option>
                                    <option value="in_progress" {{ $request->status === 'in_progress' ? 'selected' : '' }}>In Progress</option>
                                    <option value="completed" {{ $request->status === 'completed' ? 'selected' : '' }}>Completed</option>
                                </select>
                            </form>
                        </td>
                        <td class="text-center">{{ $request->handledBy->name ?? '—' }}</td>
                        <td class="text-center">
                            {{ $request->completed_at ? \Carbon\Carbon::parse($request->completed_at)->format('d-m-Y H:i') : '—' }}
                        </td>
                        <td class="text-center">
                            <a href="{{ route('service_requests.show', $request->id) }}" class="btn btn-sm btn-outline-primary">View</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center text-muted py-4">No service requests found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Pagination --}}
    <div class="mt-4">
        {{ $service_requests->links('pagination::bootstrap-5') }}
    </div>
</div>
@endsection
