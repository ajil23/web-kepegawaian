<header class="flex items-center justify-between h-16 px-6 bg-white border-b border-gray-200">
     <div class="flex items-center">
         <button onclick="toggleSidebar()"
             class="p-1 mr-4 text-gray-600 rounded-md lg:hidden hover:bg-gray-100 focus:outline-none">
             <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                 <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
             </svg>
         </button>
         <h1 class="text-lg font-semibold text-gray-800">Dashboard</h1>
     </div>

     <div class="flex items-center space-x-4">
         <!-- Search Bar (Desktop only) -->
         <div class="hidden md:block relative">
             <input type="text" placeholder="Cari..."
                 class="px-4 py-1.5 text-sm bg-gray-100 border-transparent rounded-full focus:bg-white focus:ring-2 focus:ring-blue-500 transition-all outline-none w-64">
         </div>

         <!-- Notifications -->
         <button class="p-2 text-gray-400 hover:text-gray-600 border-r border-gray-100 pr-4">
             <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                 <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                     d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9">
                 </path>
             </svg>
         </button>

         <!-- User Profile with Dropdown -->
         <div class="relative" id="user-profile-dropdown">
             <div onclick="toggleDropdown()" class="flex items-center cursor-pointer hover:bg-gray-50 p-1 rounded-lg transition-colors">
                 <div class="hidden md:block text-right mr-3">
                     <p class="text-xs font-semibold text-gray-800 leading-none">{{Auth::user()->name}}</p>
                     <p class="text-[10px] text-gray-500 mt-1">{{Auth::user()->email}}</p>
                 </div>
                 <div
                     class="w-8 h-8 rounded-full bg-blue-600 text-white flex items-center justify-center font-bold shadow-sm">
                     A
                 </div>
             </div>

             <!-- Dropdown Menu -->
             <div id="dropdown-menu" class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-50 border border-gray-200 hidden">
                 <a href="#" onclick="showLogoutModal(); return false;" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Logout</a>
             </div>
         </div>
     </div>
 </header>

 <!-- JavaScript for dropdown -->
 <script>
     // Toggle dropdown visibility
     function toggleDropdown() {
         const dropdown = document.getElementById('dropdown-menu');
         const isHidden = dropdown.classList.contains('hidden');

         // Toggle current dropdown
         if (isHidden) {
             dropdown.classList.remove('hidden');
         } else {
             dropdown.classList.add('hidden');
         }
     }

     // Show logout modal - calls function from master layout
     function showLogoutModal() {
         if (typeof openLogoutModal === 'function') {
             openLogoutModal();
         }
     }

     // Close dropdown when clicking outside
     window.onclick = function(event) {
         const userProfile = document.getElementById('user-profile-dropdown');
         if (!userProfile.contains(event.target)) {
             document.getElementById('dropdown-menu').classList.add('hidden');
         }
     }
 </script>


 