<aside id="sidebar"
    class="fixed inset-y-0 left-0 z-50 w-64 bg-slate-900 text-white transition-transform duration-300 transform -translate-x-full lg:translate-x-0 lg:static lg:inset-0">
    <div class="flex flex-col h-full">
        <!-- Sidebar Header -->
        <div class="flex items-center justify-between h-16 px-6 bg-slate-800">
            <span class="text-xl font-bold tracking-wider">MY APP</span>
            <button onclick="toggleSidebar()" class="lg:hidden">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="6 18L18 6M6 6l12 12">
                    </path>
                </svg>
            </button>
        </div>

        <!-- Sidebar Nav -->
        <nav class="flex-1 px-4 py-4 space-y-2 overflow-y-auto custom-scrollbar">
            <p class="px-2 pb-2 text-xs font-semibold text-slate-500 uppercase">Menu Utama</p>
            <a href="#" class="flex items-center px-4 py-2 text-sm font-medium bg-blue-600 rounded-lg">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 12l2-2m0 0l7-7 7 7M5 10v10a11 11 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                    </path>
                </svg>
                Dashboard
            </a>
            <a href="#"
                class="flex items-center px-4 py-2 text-sm font-medium hover:bg-slate-800 rounded-lg transition-colors">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z">
                    </path>
                </svg>
                Pengguna
            </a>
            <a href="#"
                class="flex items-center px-4 py-2 text-sm font-medium hover:bg-slate-800 rounded-lg transition-colors">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z">
                    </path>
                </svg>
                Laporan
            </a>
        </nav>

        <!-- Sidebar Footer Placeholder (Optional) -->
        <div class="p-4 bg-slate-800 text-center text-[10px] text-slate-500">
            Versi 1.0.0
        </div>
    </div>
</aside>
