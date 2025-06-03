@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="card shadow-sm border-0">
        <div class="card-header bg-primary text-white fw-bold">
            Guest Details
        </div>
        <div class="card-body">
            <div class="mb-3">
                <h5 class="fw-semibold">Name:</h5>
                <p class="text-muted">{{ $guest->name }}</p>
            </div>

            <div class="mb-3">
                <h5 class="fw-semibold">Email:</h5>
                <p class="text-muted">{{ $guest->email ?? 'N/A' }}</p>
            </div>

            <div class="mb-3">
                <h5 class="fw-semibold">Phone:</h5>
                <p class="text-muted">{{ $guest->phone ?? 'N/A' }}</p>
            </div>

            <div class="mb-3">
                <h5 class="fw-semibold">Room Number:</h5>
                <p class="text-muted">{{ $guest->room_number }}</p>
            </div>

            <div class="mb-3">
                <h5 class="fw-semibold">Number of Guests:</h5>
                <p class="text-muted">{{ $guest->number_of_guests }}</p>
            </div>

            <div class="mb-3">
                <h5 class="fw-semibold">Check-in Date:</h5>
                <p class="text-muted">{{ \Carbon\Carbon::parse($guest->check_in)->format('Y-m-d') }}</p>
            </div>

            <div class="mb-3">
                <h5 class="fw-semibold">Check-out Date:</h5>
                <p class="text-muted">
                    {{ $guest->check_out ? \Carbon\Carbon::parse($guest->check_out)->format('Y-m-d') : 'Not checked out yet' }}
                </p>
            </div>

            <div class="mb-3">
                <h5 class="fw-semibold">ID Document Type:</h5>
                <p class="text-muted">{{ $guest->id_document_type ?? 'N/A' }}</p>
            </div>

            <div class="mb-3">
                <h5 class="fw-semibold">ID Document Number:</h5>
                <p class="text-muted">{{ $guest->id_document_number ?? 'N/A' }}</p>
            </div>

            <div class="mb-3">
                <h5 class="fw-semibold">Special Requests:</h5>
                <p class="text-muted">{{ $guest->special_requests ?? 'None' }}</p>
            </div>

            <div class="mt-4">
                <a href="{{ route('guests.index') }}" class="btn btn-outline-secondary">&larr; Back to Guests List</a>
            </div>
        </div>
    </div>
</div>
@endsection
