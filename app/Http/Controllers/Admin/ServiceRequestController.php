<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ServiceRequest;

class ServiceRequestController extends Controller
{
    public function index(Request $request)
    {
        $query = ServiceRequest::with(['guest', 'handledBy']);
    
        if ($request->filled('guest_name')) {
            $query->whereHas('guest', function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->guest_name . '%');
            });
        }
    
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }
    
        $service_requests = $query->latest()->paginate(10);
    
        return view('service_requests.index', compact('service_requests'));
    }
    

    public function show($id)
{
    $service_request = ServiceRequest::with(['guest', 'handledBy'])->findOrFail($id);

    return view('service_requests.show', compact('service_request'));
}

public function updateStatus(Request $request, $id)
{
    $request->validate([
        'status' => 'required|in:pending,in_progress,completed',
    ]);

    $service = ServiceRequest::findOrFail($id);
    $service->status = $request->status;
    $service->save();

    return back()->with('success', 'Status updated successfully.');
}
}
