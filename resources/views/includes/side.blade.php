 <!-- Sidebar -->
 <div id="sidebar" class="fixed inset-y-0 left-0 z-50 w-64 transform transition-transform duration-300 ease-in-out bg-gradient-to-b from-blue-900 to-indigo-900 shadow-xl md:translate-x-0 md:static md:inset-0">
        <!-- Logo -->
        <div class="flex items-center justify-center h-16 px-6 border-b border-blue-700/50">
            <div class="flex items-center space-x-2">
            <img src="/assets/RCCLogo-White.png" alt="RCC Logo" class="w-12 h-10 rounded-lg shadow-lg">
                <span class="text-xs font-bold tracking-wider text-white">RCC Colab Solutions</span>
            </div>
        </div>
        
        <!-- Navigation Menu -->
        <nav class="px-4 pt-6 pb-8">
            <div class="space-y-1">
                <a href="/dashboard" class="flex items-center px-4 py-3 text-white bg-blue-800/40 rounded-xl">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                    </svg>
                    <span class="font-medium">Dashboard</span>
                </a>
                
                <a href="/job-listing" class="flex items-center px-4 py-3 text-blue-100 hover:bg-blue-800/40 rounded-xl transition-colors duration-200">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                    <span class="font-medium">Job Listing</span>
                </a>
                
                <a href="applicants" class="flex items-center px-4 py-3 text-blue-100 hover:bg-blue-800/40 rounded-xl transition-colors duration-200">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                    <span class="font-medium">Applicants</span>
                </a>

                <a href="/companies" class="flex items-center px-4 py-3 text-blue-100 hover:bg-blue-800/40 rounded-xl transition-colors duration-200">
    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
    </svg>
    <span class="font-medium">Company</span>
</a>
                
                <a href="#" class="flex items-center px-4 py-3 text-blue-100 hover:bg-blue-800/40 rounded-xl transition-colors duration-200">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                    </svg>
                    <span class="font-medium">Users</span>
                </a>
                
                <a href="#" class="flex items-center px-4 py-3 text-blue-100 hover:bg-blue-800/40 rounded-xl transition-colors duration-200">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                    <span class="font-medium">Profile</span>
                </a>
            </div>
            
            <!-- Footer Section of Sidebar -->
            <div class="pt-8 mt-8 border-t border-blue-700/50">
                <div class="flex items-center px-4 py-2 space-x-3">
                    <div class="relative w-10 h-10 overflow-hidden bg-gradient-to-br from-blue-400 to-indigo-400 rounded-full">
                        <svg class="absolute w-12 h-12 text-blue-100/80 -left-1 -top-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <div>
                        <h5 class="text-sm font-medium text-blue-100">Admin User</h5>
                        <p class="text-xs text-blue-300">admin@rcccolab.com</p>
                    </div>
                </div>
            </div>
        </nav>
    </div>