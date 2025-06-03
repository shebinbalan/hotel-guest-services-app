<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Guest;

class GuestController extends Controller
{
    public function index()
    {
        $guests = Guest::latest()->paginate(10); 
    
        return view('guests.index', [
            'guests' => $guests
        ]);
    }

            public function show($id)
        {
            $guest = Guest::findOrFail($id);

            return view('guests.show', compact('guest'));
        }
    
}
