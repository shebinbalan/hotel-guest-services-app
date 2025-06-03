@extends('layouts.app')

@section('header', 'Dashboard')

@section('content')
<div class="space-y-6">

    <!-- Welcome Message -->
    <div class="bg-white p-6 rounded-2xl shadow-md">
        <h3 class="text-xl font-semibold text-gray-800 mb-2">Welcome back, {{ Auth::user()->name }}!</h3>
        <p class="text-gray-600">You're logged in. Use the dashboard below to manage guests and service requests.</p>
    </div>

    <!-- Dashboard Stats -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
    
    <div class="bg-gradient-to-r from-blue-500 to-indigo-500 text-white p-6 rounded-2xl shadow-lg">
        <div class="text-lg font-semibold">Total Guests</div>
        <div class="text-3xl font-bold mt-2">{{ $totalGuests }}</div>
        <div class="mt-1 text-sm opacity-80">Currently checked-in: {{ $checkedInGuests }}</div>
    </div>

    <div class="bg-gradient-to-r from-green-500 to-teal-500 text-white p-6 rounded-2xl shadow-lg">
        <div class="text-lg font-semibold">Service Requests</div>
        <div class="text-3xl font-bold mt-2">{{ $totalRequests }}</div>
        <div class="mt-1 text-sm opacity-80">Pending: {{ $pendingRequests }}</div>
    </div>

    <div class="bg-gradient-to-r from-purple-500 to-pink-500 text-white p-6 rounded-2xl shadow-lg">
        <div class="text-lg font-semibold">Handled by Staff</div>
        <div class="text-3xl font-bold mt-2">{{ $handledToday }}</div>
        <div class="mt-1 text-sm opacity-80">Today’s updates</div>
    </div>
</div>


</div>
@endsection
