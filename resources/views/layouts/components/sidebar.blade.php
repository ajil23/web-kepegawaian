<aside id="sidebar"
    class="fixed inset-y-0 left-0 z-50 w-64 bg-white text-slate-800 border-r border-slate-200
         transition-transform duration-300 transform -translate-x-full
         lg:translate-x-0 lg:static lg:inset-0">
    <div class="flex flex-col h-full">
        <!-- Sidebar Header -->
        <div class="flex items-center justify-between h-16 px-6 bg-slate-50 border-b border-slate-200">
            <span class="text-xl font-bold tracking-wider text-slate-800">MY APP</span>
            <button onclick="toggleSidebar()" class="lg:hidden">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="6 18L18 6M6 6l12 12">
                    </path>
                </svg>
            </button>
        </div>

        <!-- Sidebar Nav -->
        <nav class="flex-1 px-4 py-4 space-y-2 overflow-y-auto custom-scrollbar">

            @if(auth()->user()->role === 'admin')
            <p class="px-2 pb-2 text-xs font-semibold text-slate-500 uppercase">Menu Utama</p>
            <a href="#" class="flex items-center px-4 py-2 text-sm font-medium bg-green-50 text-green-600 rounded-lg">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 12l2-2m0 0l7-7 7 7M5 10v10a11 11 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                    </path>
                </svg>
                Dashboard
            </a>
            <a href="#" class="flex items-center px-4 py-2 text-sm font-medium text-slate-700 hover:bg-emerald-50 hover:text-emerald-600 rounded-lg transition-colors">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M16 21v-2a4 4 0 00-4-4H5
                        a4 4 0 00-4 4v2
                        M12 7a4 4 0 11-8 0 4 4 0 018 0
                        m9 2l2 2 4-4" />
                </svg>
                Regristrasi & Verifikasi
            </a>
            <a href="#" class="flex items-center px-4 py-2 text-sm font-medium text-slate-700 hover:bg-emerald-50 hover:text-emerald-600 rounded-lg transition-colors">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M17 20h5v-2a4 4 0 00-3-3.87
                        M9 20H4v-2a4 4 0 013-3.87
                        M16 3.13a4 4 0 010 7.75
                        M8 3.13a4 4 0 000 7.75
                        M12 7a4 4 0 110 8 4 4 0 010-8z" />
                </svg>
                Data Kepegawaian
            </a>
            <a href="#" class="flex items-center px-4 py-2 text-sm font-medium text-slate-700 hover:bg-emerald-50 hover:text-emerald-600 rounded-lg transition-colors">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12h6m-6 4h6
                    M7 4h10a2 2 0 012 2v12
                    a2 2 0 01-2 2H7
                    a2 2 0 01-2-2V6
                    a2 2 0 012-2z" />
                </svg>
                Riwayat Kepegawaian
            </a>
            <a href="#" class="flex items-center px-4 py-2 text-sm font-medium text-slate-700 hover:bg-emerald-50 hover:text-emerald-600 rounded-lg transition-colors">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 5H7a2 2 0 00-2 2v12
                        a2 2 0 002 2h10a2 2 0 002-2V7
                        a2 2 0 00-2-2h-2
                        m-6 0a2 2 0 114 0v2H9V5
                        m2 10l2 2 4-4" />
                </svg>
                Penugasan
            </a>
            <a href="#" class="flex items-center px-4 py-2 text-sm font-medium text-slate-700 hover:bg-emerald-50 hover:text-emerald-600 rounded-lg transition-colors">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M11 5H6a2 2 0 00-2 2v11
                        a2 2 0 002 2h11
                        a2 2 0 002-2v-5
                        m-1.414-9.414a2 2 0 112.828 2.828
                        L11.828 15H9v-2.828l8.586-8.586z" />
                </svg>
                Catatan Kegiatan
            </a>
            <a href="#" class="flex items-center px-4 py-2 text-sm font-medium text-slate-700 hover:bg-emerald-50 hover:text-emerald-600 rounded-lg transition-colors">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4 6h16M4 10h16M4 14h16M4 18h16" />
                </svg>
                Data Referensi
            </a>
            <a href="#" class="flex items-center px-4 py-2 text-sm font-medium text-slate-700 hover:bg-emerald-50 hover:text-emerald-600 rounded-lg transition-colors">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 8v4l3 3
                        M12 3a9 9 0 100 18
                        a9 9 0 000-18z" />
                </svg>
                Log Aktivitas
            </a>
            @endif

            @if(auth()->user()->role === 'kph')
            <p class="px-2 pb-2 text-xs font-semibold text-slate-500 uppercase">Menu Utama</p>
            <a href="#" class="flex items-center px-4 py-2 text-sm font-medium bg-green-50 text-green-600 rounded-lg">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 12l2-2m0 0l7-7 7 7M5 10v10a11 11 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                    </path>
                </svg>
                Dashboard
            </a>
            <a href="#" class="flex items-center px-4 py-2 text-sm font-medium text-slate-700 hover:bg-emerald-50 hover:text-emerald-600 rounded-lg transition-colors">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M17 20h5v-2a4 4 0 00-3-3.87
                        M9 20H4v-2a4 4 0 013-3.87
                        M16 3.13a4 4 0 010 7.75
                        M8 3.13a4 4 0 000 7.75
                        M12 7a4 4 0 110 8 4 4 0 010-8z" />
                </svg>
                Data Kepegawaian
            </a>
            <a href="#" class="flex items-center px-4 py-2 text-sm font-medium text-slate-700 hover:bg-emerald-50 hover:text-emerald-600 rounded-lg transition-colors">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12h6m-6 4h6
                    M7 4h10a2 2 0 012 2v12
                    a2 2 0 01-2 2H7
                    a2 2 0 01-2-2V6
                    a2 2 0 012-2z" />
                </svg>
                Riwayat Kepegawaian
            </a>
            <a href="#" class="flex items-center px-4 py-2 text-sm font-medium text-slate-700 hover:bg-emerald-50 hover:text-emerald-600 rounded-lg transition-colors">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 5H7a2 2 0 00-2 2v12
                        a2 2 0 002 2h10a2 2 0 002-2V7
                        a2 2 0 00-2-2h-2
                        m-6 0a2 2 0 114 0v2H9V5
                        m2 10l2 2 4-4" />
                </svg>
                Penugasan
            </a>
            <a href="#" class="flex items-center px-4 py-2 text-sm font-medium text-slate-700 hover:bg-emerald-50 hover:text-emerald-600 rounded-lg transition-colors">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M11 5H6a2 2 0 00-2 2v11
                        a2 2 0 002 2h11
                        a2 2 0 002-2v-5
                        m-1.414-9.414a2 2 0 112.828 2.828
                        L11.828 15H9v-2.828l8.586-8.586z" />
                </svg>
                Catatan Kegiatan
            </a>
            @endif

            @if(auth()->user()->role === 'pegawai')
            <p class="px-2 pb-2 text-xs font-semibold text-slate-500 uppercase">Menu Utama</p>
            <a href="#" class="flex items-center px-4 py-2 text-sm font-medium bg-green-50 text-green-600 rounded-lg">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 12l2-2m0 0l7-7 7 7M5 10v10a11 11 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                    </path>
                </svg>
                Dashboard
            </a>
            <a href="#" class="flex items-center px-4 py-2 text-sm font-medium text-slate-700 hover:bg-emerald-50 hover:text-emerald-600 rounded-lg transition-colors">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M5.121 17.804A13.937 13.937 0 0112 15
                        c2.5 0 4.847.655 6.879 1.804M15 10
                        a3 3 0 11-6 0 3 3 0 016 0z">
                    </path>
                </svg>
                Data Diri
            </a>
            <a href="#" class="flex items-center px-4 py-2 text-sm font-medium text-slate-700 hover:bg-emerald-50 hover:text-emerald-600 rounded-lg transition-colors">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12h6m-6 4h6M7 4h10
                        a2 2 0 012 2v12
                        a2 2 0 01-2 2H7
                        a2 2 0 01-2-2V6
                        a2 2 0 012-2z">
                    </path>
                </svg>
                Data Kepegawaian Saya
            </a>
            <a href="#" class="flex items-center px-4 py-2 text-sm font-medium text-slate-700 hover:bg-emerald-50 hover:text-emerald-600 rounded-lg transition-colors">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M17 20h5v-2a4 4 0 00-3-3.87M9 20H4v-2
                        a4 4 0 013-3.87M16 3.13a4 4 0 010 7.75
                        M8 3.13a4 4 0 000 7.75M12 7a4 4 0 110 8
                        a4 4 0 010-8z">
                    </path>
                </svg>
                Direktori Pegawai
            </a>
            <a href="#" class="flex items-center px-4 py-2 text-sm font-medium text-slate-700 hover:bg-emerald-50 hover:text-emerald-600 rounded-lg transition-colors">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 5H7a2 2 0 00-2 2v12
                        a2 2 0 002 2h10a2 2 0 002-2V7
                        a2 2 0 00-2-2h-2
                        m-6 0a2 2 0 114 0v2H9V5
                        m2 10l2 2 4-4">
                    </path>
                </svg>
                Tugas Saya
            </a>
            <a href="#" class="flex items-center px-4 py-2 text-sm font-medium text-slate-700 hover:bg-emerald-50 hover:text-emerald-600 rounded-lg transition-colors">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M11 5H6a2 2 0 00-2 2v11
                        a2 2 0 002 2h11a2 2 0 002-2v-5
                        m-1.414-9.414a2 2 0 112.828 2.828
                        L11.828 15H9v-2.828l8.586-8.586z">
                    </path>
                </svg>
                Catatan Kegiatan
            </a>
            <a href="#" class="flex items-center px-4 py-2 text-sm font-medium text-slate-700 hover:bg-emerald-50 hover:text-emerald-600 rounded-lg transition-colors">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11
                        a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341
                        C7.67 6.165 6 8.388 6 11v3.159
                        c0 .538-.214 1.055-.595 1.436L4 17h5
                        m6 0v1a3 3 0 11-6 0v-1m6 0H9">
                    </path>
                </svg>
                Notifikasi
            </a>
            @endif

        </nav>

        <!-- Sidebar Footer Placeholder (Optional) -->
        <div class="p-4 bg-slate-50 border-t border-slate-200
            text-center text-[10px] text-slate-500">
            Versi 1.0.0
        </div>
</aside>