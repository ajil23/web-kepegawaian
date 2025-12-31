<aside id="sidebar"
    class="fixed inset-y-0 left-0 z-50 w-64 bg-slate-900 text-white transition-transform duration-300 transform -translate-x-full lg:translate-x-0 lg:static lg:inset-0">

    <div class="flex flex-col h-full">

        {{-- Sidebar Header --}}
        <div class="flex items-center justify-between h-16 px-6 bg-slate-800">
            <span class="text-xl font-bold tracking-wider">MY APP</span>
            <button onclick="toggleSidebar()" class="lg:hidden">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>

        {{-- Sidebar Nav --}}
        <nav class="flex-1 px-4 py-4 space-y-2 overflow-y-auto custom-scrollbar">
            <p class="px-2 pb-2 text-xs font-semibold text-slate-500 uppercase">Menu Utama</p>

            <a href="{{ route('admin.dashboard') }}"
                class="flex items-center px-4 py-2 text-sm font-medium bg-blue-600 rounded-lg">
                Dashboard
            </a>

            <a href="#"
                class="flex items-center px-4 py-2 text-sm font-medium hover:bg-slate-800 rounded-lg transition-colors">
                Pengguna
            </a>

            <a href="#"
                class="flex items-center px-4 py-2 text-sm font-medium hover:bg-slate-800 rounded-lg transition-colors">
                Laporan
            </a>
        </nav>

        {{-- Sidebar Footer --}}
        <div class="p-4 bg-slate-800 text-center text-[10px] text-slate-500">
            Versi 1.0.0
        </div>

    </div>
</aside>
