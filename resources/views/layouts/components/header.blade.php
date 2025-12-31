<header class="flex items-center justify-between h-16 px-6 bg-white border-b border-gray-200">

    <div class="flex items-center">
        <button onclick="toggleSidebar()"
            class="p-1 mr-4 text-gray-600 rounded-md lg:hidden hover:bg-gray-100">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M4 6h16M4 12h16M4 18h16"></path>
            </svg>
        </button>
        <h1 class="text-lg font-semibold text-gray-800">@yield('page-title', 'Dashboard')</h1>
    </div>

    <div class="flex items-center space-x-4">
        <div class="hidden md:block relative">
            <input type="text" placeholder="Cari..."
                class="px-4 py-1.5 text-sm bg-gray-100 rounded-full focus:ring-2 focus:ring-blue-500 w-64">
        </div>

        <button class="p-2 text-gray-400 hover:text-gray-600 border-r pr-4">
            🔔
        </button>

        {{-- PROFILE DROPDOWN --}}
        <div class="relative">
            <button
                onclick="toggleProfileDropdown()"
                class="flex items-center p-1 rounded-lg hover:bg-gray-50 focus:outline-none">

                <div class="hidden md:block text-right mr-3">
                    <p class="text-xs font-semibold text-gray-800">
                        {{ auth()->user()->name }}
                    </p>
                    <p class="text-[10px] text-gray-500">
                        {{ auth()->user()->email }}
                    </p>
                </div>

                <div
                    class="w-8 h-8 rounded-full bg-blue-600 text-white flex items-center justify-center font-bold shadow-sm">
                    {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                </div>
            </button>

            {{-- DROPDOWN MENU --}}
            <div id="profileDropdown"
                class="hidden absolute right-0 mt-2 w-40 bg-white rounded-lg shadow-lg border border-gray-100 z-50">

                <div class="px-4 py-2 text-xs text-gray-500 border-b">
                    Akun
                </div>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                        class="w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-gray-50">
                        Logout
                    </button>
                </form>
            </div>
        </div>
    </div>

</header>
