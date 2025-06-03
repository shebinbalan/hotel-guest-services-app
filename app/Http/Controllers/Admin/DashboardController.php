<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Guest;
use App\Models\ServiceRequest;

class DashboardController extends Controller
{
   
    
    public function index()
{
    $totalGuests = Guest::count();
    $checkedInGuests = Guest::whereNull('check_out')->count();

    $totalRequests = ServiceRequest::count();
    $pendingRequests = ServiceRequest::where('status', 'pending')->count();

    $handledToday = ServiceRequest::whereDate('updated_at', now()->toDateString())
                    ->whereNotNull('handled_by')
                    ->count();

    return view('dashboard', [
        'totalGuests' => $totalGuests,
        'checkedInGuests' => $checkedInGuests,
        'totalRequests' => $totalRequests,
        'pendingRequests' => $pendingRequests,
        'handledToday' => $handledToday,
    ]);
}
    
    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:pending,in_progress,completed,cancelled',
        ]);
    
        $requestItem = ServiceRequest::findOrFail($id);
        $requestItem->status = $request->status;
    
        if ($request->status === 'completed' && !$requestItem->completed_at) {
            $requestItem->completed_at = now();
        }
    
        $requestItem->save();
    
        return redirect()->back()->with('success', 'Status updated.');
    }
    
}


