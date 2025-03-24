<!-- Sidebar Navigation -->
<div class="bg-[#0A2472] text-white w-70 min-h-screen">
    <!-- Logo -->
    <div class="py-6 px-4 flex items-center justify-center">
        <img src="{{ asset('assets/RCCLogo-White.png') }}" alt="RCC Logo" class="h-12">
        <div class="ml-2 font-semibold">
        <div class=" font-bold">RCC COLAB SOLUTIONS INC.</div>
        </div>
    </div>

    <!-- Navigation Items -->
    <nav class="px-4 pt-6 pb-8">
        <div class="space-y-1">
        <a href="{{ url('/client/dashboard') }}" class="flex items-center px-4 py-3 rounded-xl transition-all duration-200 {{ request()->is('client/dashboard*') ? 'text-white bg-blue-800/40 shadow-md' : 'text-blue-100 hover:bg-blue-800/40' }}">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
            </svg>
                Dashboard
            </a>
        
        <a href="{{ url('/client/applicants') }}" class="flex items-center px-4 py-3 rounded-xl transition-all duration-200 {{ request()->is('client/applicants*') ? 'text-white bg-blue-800/40 shadow-md' : 'text-blue-100 hover:bg-blue-800/40' }}">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
            </svg>
            Applicants
        </a>
        
        <a href="{{ url('/client/company-profile') }}" class="flex items-center px-4 py-3 rounded-xl transition-all duration-200 {{ request()->is('client/company-profile*') ? 'text-white bg-blue-800/40 shadow-md' : 'text-blue-100 hover:bg-blue-800/40' }}">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
            </svg>
            Company Profile
        </a>
        
        </div>
    </nav>
</div>