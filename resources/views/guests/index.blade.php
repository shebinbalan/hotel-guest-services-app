@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h2 class="mb-4 text-primary fw-bold">Guest List</h2>

    <div class="table-responsive shadow-sm rounded-3 border">
        <table class="table table-hover align-middle mb-0 bg-white">
            <thead class="table-light">
                <tr>
                    <th>Name</th>
                    <th class="text-center">Room</th>
                    <th class="text-center">Check-in</th>
                    <th class="text-center">Check-out</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($guests as $guest)
                    <tr>
                        <td>{{ $guest->name }}</td>
                        <td class="text-center">{{ $guest->room_number }}</td>
                        <td class="text-center">{{ \Carbon\Carbon::parse($guest->check_in)->format('d-m-Y') }}</td>
                        <td class="text-center">
                            {{ $guest->check_out ? \Carbon\Carbon::parse($guest->check_out)->format('d-m-Y') : '—' }}
                        </td>
                        <td class="text-center">
                            <a href="{{ route('guests.show', $guest->id) }}" class="btn btn-sm btn-outline-primary">
                                View
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center text-muted py-4">No guests found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $guests->links('pagination::bootstrap-5') }}
    </div>
</div>
@endsection
