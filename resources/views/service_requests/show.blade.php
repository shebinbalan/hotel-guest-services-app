@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="card shadow-sm border-0">
        <div class="card-header bg-primary text-white fw-bold">
            Service Request Details
        </div>

        <div class="card-body">
            <div class="mb-4">
                <h5 class="fw-semibold">Guest:</h5>
                <p class="mb-1 text-muted">{{ $service_request->guest->name ?? 'Unknown Guest' }}</p>
                <p class="mb-1 text-muted">{{ $service_request->guest->email ?? '' }}</p>
                <p class="mb-0 text-muted">Room: {{ $service_request->guest->room_number ?? 'N/A' }}</p>
            </div>

            <div class="mb-4">
                <h5 class="fw-semibold">Service Type:</h5>
                <p class="text-muted text-capitalize">{{ $service_request->service_type }}</p>
            </div>

            <div class="mb-4">
                <h5 class="fw-semibold">Priority:</h5>
                <p class="text-muted text-capitalize">{{ $service_request->priority }}</p>
            </div>

            <div class="mb-4">
                <h5 class="fw-semibold">Status:</h5>
                <p class="text-muted text-capitalize">{{ $service_request->status }}</p>
            </div>

            <div class="mb-4">
                <h5 class="fw-semibold">Description:</h5>
                <p class="text-muted">{{ $service_request->description }}</p>
            </div>

            <div class="mb-4">
                <h5 class="fw-semibold">Handled By:</h5>
                <p class="text-muted">{{ $service_request->handledBy->name ?? 'Not assigned' }}</p>
            </div>

            <div class="mb-4">
                <h5 class="fw-semibold">Completed At:</h5>
                <p class="text-muted">
                    {{ $service_request->completed_at ? \Carbon\Carbon::parse($service_request->completed_at)->format('Y-m-d H:i') : 'Not completed yet' }}
                </p>
            </div>

            <div class="mt-4">
                <a href="{{ route('service_requests.index') }}" class="btn btn-outline-secondary">&larr; Back to List</a>
            </div>
        </div>
    </div>
</div>
@endsection
