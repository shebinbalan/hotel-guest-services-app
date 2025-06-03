<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-gray-100">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Hotel Dashboard</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="h-full">

    <div class="min-h-screen flex">
        <!-- Sidebar -->
        <aside class="w-64 bg-white border-r shadow-md hidden md:block">
            <div class="p-6 font-bold text-xl border-b">
                Hotel Panel
            </div>
            <nav class="mt-4">
                <a href="{{ route('dashboard') }}" class="block px-6 py-3 hover:bg-gray-100 text-gray-700 {{ request()->routeIs('dashboard') ? 'font-bold' : '' }}">
                    Dashboard
                </a>
                <a href="{{ route('guests.index') }}" class="block px-6 py-3 hover:bg-gray-100 text-gray-700">
                    Guests
                </a>
                <a href="{{ route('service_requests.index') }}" class="block px-6 py-3 hover:bg-gray-100 text-gray-700">
                    Service Requests
                </a>
                <a href="{{ route('logout') }}" class="block px-6 py-3 hover:bg-gray-100 text-red-600"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    Logout
                </a>
                <form id="logout-form" method="POST" action="{{ route('logout') }}" class="hidden">@csrf</form>
            </nav>
        </aside>

        <!-- Main content area -->
        <div class="flex-1 flex flex-col">
            <!-- Header -->
            <header class="bg-white shadow px-6 py-4 flex items-center justify-between">
                <div class="text-lg font-semibold text-gray-900">
                    @yield('header', 'Dashboard')
                </div>
                <div class="text-sm text-gray-600">Logged in as: {{ Auth::user()->name }}</div>
            </header>

            <!-- Page content -->
            <main class="flex-1 p-6">
                @yield('content')
            </main>

            <!-- Footer -->
            <footer class="bg-gray-100 border-t py-4 text-center text-sm text-gray-500">
                &copy; {{ date('Y') }} Hotel Guest Services App. All rights reserved.
            </footer>
        </div>
    </div>

</body>
</html>
