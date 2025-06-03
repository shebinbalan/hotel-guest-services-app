<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\ServiceRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class ServiceRequestController extends Controller
{
    // List all service requests
    public function index()
    {
        return response()->json(ServiceRequest::with('guest')->get(), 200);
    }

    // Store a new service request
    public function store(Request $request)
    {
        $validated = $request->validate([
            'guest_id' => 'required|exists:guests,id',
            'service_type' => 'required|in:cleaning,maintenance,room_service,laundry',
            'description' => 'required|string',
            'priority' => 'required|in:low,medium,high',
            'status' => 'required|in:pending,in_progress,completed,cancelled',
            'handled_by' => 'nullable|exists:users,id',
            'completed_at' => 'nullable|date',
        ]);

        $serviceRequest = ServiceRequest::create($validated);

        return response()->json($serviceRequest, 201);
    }

    // Show a specific service request
    public function show($id)
    {
        $serviceRequest = ServiceRequest::with('guest', 'handledBy')->find($id);

        if (!$serviceRequest) {
            return response()->json(['message' => 'Service request not found'], 404);
        }

        return response()->json($serviceRequest);
    }

    // Update a service request
    public function update(Request $request, $id)
    {
        $serviceRequest = ServiceRequest::find($id);

        if (!$serviceRequest) {
            return response()->json(['message' => 'Service request not found'], 404);
        }

        $validated = $request->validate([
            'guest_id' => 'sometimes|exists:guests,id',
            'service_type' => 'sometimes|in:cleaning,maintenance,room_service,laundry',
            'description' => 'sometimes|string',
            'priority' => 'sometimes|in:low,medium,high',
            'status' => 'sometimes|in:pending,in_progress,completed,cancelled',
            'handled_by' => 'nullable|exists:users,id',
            'completed_at' => 'nullable|date',
        ]);

        $serviceRequest->update($validated);

        return response()->json($serviceRequest);
    }

    // Delete a service request
    public function destroy($id)
    {
        $serviceRequest = ServiceRequest::find($id);

        if (!$serviceRequest) {
            return response()->json(['message' => 'Service request not found'], 404);
        }

        $serviceRequest->delete();

        return response()->json(['message' => 'Service request deleted successfully']);
    }

    public function updateStatus(Request $request, $id)
{
    $serviceRequest = ServiceRequest::find($id);

    if (!$serviceRequest) {
        return response()->json(['message' => 'Service request not found'], 404);
    }

    $validated = $request->validate([
        'status' => 'required|in:pending,in_progress,completed,cancelled',
    ]);

    $serviceRequest->status = $validated['status'];

    // Auto-set completed_at only if status is completed
    if ($validated['status'] === 'completed' && !$serviceRequest->completed_at) {
        $serviceRequest->completed_at = now();
    }

    $serviceRequest->save();

    return response()->json([
        'message' => 'Service request status updated successfully',
        'data' => $serviceRequest
    ]);
}

}
