<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard')</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>


<body class="bg-gray-50 text-gray-800 antialiased">

<div class="flex h-screen overflow-hidden" id="app-layout">

    {{-- SIDEBAR --}}
    @include('layouts.components.sidebar')

    {{-- Overlay --}}
    <div id="overlay" onclick="toggleSidebar()" class="fixed inset-0 z-40 hidden bg-black/50 lg:hidden"></div>

    {{-- MAIN WRAPPER --}}
    <div class="flex flex-col flex-1 w-full overflow-hidden">

        {{-- HEADER --}}
        @include('layouts.components.header')

        {{-- CONTENT --}}
        <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-100 p-6">
            @yield('content')
        </main>

        {{-- FOOTER --}}
        @include('layouts.components.footer')

    </div>
</div>

{{-- Sidebar Toggle Script --}}
<script>
    function toggleSidebar() {
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('overlay');

        sidebar.classList.toggle('-translate-x-full');
        overlay.classList.toggle('hidden');
    }
</script>

@stack('js')
</body>
</html>
