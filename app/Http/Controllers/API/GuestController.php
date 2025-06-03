<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Guest;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    // List all guests
    public function index()
    {
        return response()->json(Guest::all(), 200);
    }

    // Store a new guest
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'nullable|email',
            'phone' => 'nullable|string|max:20',
            'room_number' => 'required|string|max:10',
            'number_of_guests' => 'required|integer|min:1',
            'check_in' => 'required|date',
            'check_out' => 'nullable|date|after_or_equal:check_in',
            'id_document_type' => 'nullable|string|max:50',
            'id_document_number' => 'nullable|string|max:50',
            'special_requests' => 'nullable|string',
        ]);

        $guest = Guest::create($validated);

        return response()->json($guest, 201);
    }

    // Show a specific guest
    public function show($id)
    {
        $guest = Guest::find($id);

        if (!$guest) {
            return response()->json(['message' => 'Guest not found'], 404);
        }

        return response()->json($guest);
    }

    // Update a guest
    public function update(Request $request, $id)
    {
        $guest = Guest::find($id);

        if (!$guest) {
            return response()->json(['message' => 'Guest not found'], 404);
        }

        $validated = $request->validate([
            'name' => 'sometimes|string|max:255',
            'email' => 'nullable|email',
            'phone' => 'nullable|string|max:20',
            'room_number' => 'sometimes|string|max:10',
            'number_of_guests' => 'sometimes|integer|min:1',
            'check_in' => 'sometimes|date',
            'check_out' => 'nullable|date|after_or_equal:check_in',
            'id_document_type' => 'nullable|string|max:50',
            'id_document_number' => 'nullable|string|max:50',
            'special_requests' => 'nullable|string',
        ]);

        $guest->update($validated);

        return response()->json($guest);
    }

    // Delete a guest
    public function destroy($id)
    {
        $guest = Guest::find($id);

        if (!$guest) {
            return response()->json(['message' => 'Guest not found'], 404);
        }

        $guest->delete();

        return response()->json(['message' => 'Guest deleted successfully']);
    }
}

