@include('includes.header')

<!-- Main Container -->
<div class="flex" id="main-container">
    
    @include('includes.side')
    
    <!-- Main Content -->
    <div class="flex-1 overflow-x-hidden overflow-y-auto transition-colors duration-300 bg-gray-50 dark:bg-slate-900">
        
        @include('includes.nav')
        
        <!-- Companies Content -->
        <main class="min-h-screen p-6">
            <!-- Page Title with Add New Company Button -->
            <div class="mb-8 flex justify-between items-center">
                <div>
                    <h1 class="text-2xl font-bold text-gray-800 dark:text-white transition-colors duration-300">Company</h1>
                    <p class="text-gray-600 dark:text-gray-300 transition-colors duration-300">Manage and view companies offering job opportunities</p>
                </div>
                <button 
                    x-data="{}"
                    @click="$dispatch('open-modal', {id: 'add-company-modal'})"
                    class="px-4 py-2.5 bg-blue-600 hover:bg-blue-700 dark:bg-blue-700 dark:hover:bg-blue-600 text-white rounded-lg flex items-center justify-center transition-colors duration-200 shadow-md">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                    </svg>
                    Add New Company
                </button>
            </div>
            
            <!-- Filters Section -->
<form action="{{ route('company') }}" method="GET">
    <div class="bg-white dark:bg-slate-800 rounded-xl shadow-md border border-gray-200 dark:border-slate-700 p-6 mb-8 transition-colors duration-300">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-6">
            
            <!-- Search Box -->
            <div class="relative flex-grow w-full">
                <input 
                    type="text" 
                    name="search"
                    placeholder="Search companies..." 
                    value="{{ request('search') }}"
                    class="w-full bg-gray-100 dark:bg-slate-700 border border-gray-300 dark:border-slate-600 rounded-lg py-2.5 px-4 pl-10 text-gray-800 dark:text-white placeholder-gray-500 dark:placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500/50 transition-colors duration-300"
                >
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500 dark:text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </div>
            </div>
            
            <!-- Clear/Apply Filter Buttons -->
            <div class="flex items-center space-x-3">
                <a href="{{ route('company') }}" class="px-4 py-2 bg-gray-200 hover:bg-gray-300 dark:bg-slate-700 dark:hover:bg-slate-600 text-gray-700 dark:text-gray-200 rounded-lg transition-colors duration-200 flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                    Clear
                </a>
            </div>
        </div>
    </div>
</form>
            
            <!-- Companies List Table -->
<div class="bg-white dark:bg-slate-800 rounded-xl shadow-md border border-gray-200 dark:border-slate-700 overflow-hidden transition-colors duration-300 mb-8">
    @if(count($companies) > 0)
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="bg-gray-50 dark:bg-slate-700/50 border-b border-gray-200 dark:border-slate-600 transition-colors duration-300">
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider transition-colors duration-300">
                            <div class="flex items-center">
                                Company Name
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16V4m0 0L3 8m4-4l4 4m6 0v12m0 0l4-4m-4 4l-4-4" />
                                </svg>
                            </div>
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider transition-colors duration-300">
                            <div class="flex items-center">
                                Email
                            </div>
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider transition-colors duration-300">
                            <div class="flex items-center">
                                Contact
                            </div>
                        </th>
                        <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider transition-colors duration-300">                                   
                                Status                                 
                        </th>
                        <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider transition-colors duration-300">
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 dark:divide-slate-700">
                    @foreach($companies as $company)
                            <tr class="hover:bg-gray-50 dark:hover:bg-slate-700/30 transition-colors duration-200">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="h-10 w-10 rounded-lg bg-gradient-to-br from-blue-400 to-indigo-400 flex items-center justify-center text-white font-medium">
                                            {{ substr($company->company_name, 0, 2) }}
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900 dark:text-white transition-colors duration-300">
                                                {{ $company->company_name }}
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900 dark:text-white transition-colors duration-300">
                                        {{ $company->representative_email }}
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900 dark:text-white transition-colors duration-300">
                                        {{ $company->representative_name }}
                                    </div>
                                    <div class="text-xs text-gray-500 dark:text-gray-400 transition-colors duration-300">
                                        {{ $company->representative_contact_number }}
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-center">
                                    <span 
                                        x-data="{ 
                                            status: {{ $company->status ? 'active' : 'inactive' }},
                                            init() {
                                                window.addEventListener('status-confirmed', (e) => {
                                                    if(e.detail.id === {{ $company->id }}) {
                                                        this.status = e.detail.activate;
                                                    }
                                                });
                                            }
                                        }"
                                        :class="status ? 'bg-green-100 text-green-800 dark:bg-green-900/30 dark:text-green-400' : 'bg-red-100 text-red-800 dark:bg-red-900/30 dark:text-red-400'"
                                        class="px-2.5 py-1 rounded-full text-xs font-medium"
                                    >
                                        <span x-text="status ? 'active' : 'inactive'"></span>
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-center">
                                    <div class="flex items-center justify-center space-x-3">
                                        <button 
                                        x-data="{}"
                                        @click="$dispatch('open-modal', {
                                            id: 'edit-company-modal', 
                                            company: {
                                                id: {{ $company->id }},
                                                name: {{ json_encode($company->company_name) }}, 
                                                email: {{ json_encode($company->representative_email) }},
                                                contact_name: {{ json_encode($company->representative_name) }},
                                                contact_phone: {{ json_encode($company->representative_contact_number) }}
                                            }
                                        })" 
                                        class="p-1.5 bg-blue-100 dark:bg-blue-900/30 text-blue-600 dark:text-blue-400 rounded-lg hover:bg-blue-200 dark:hover:bg-blue-800/40 transition-colors duration-200" 
                                        title="Edit">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                            </svg>
                                        </button>
                                         <!-- Status toggle buttons -->
                                         <div x-data="{ 
                                                        isActive: {{ $company->isActive ? 'true' : 'false' }},
                                                        init() {
                                                            window.addEventListener('status-confirmed', (e) => {
                                                                if(e.detail.id === {{ $company->id }}) {
                                                                    this.isActive = e.detail.activate;
                                                                }
                                                            });
                                                        }
                                                    }">
                                             <!-- Activate button -->
                                            <button 
                                                x-show="!isActive"
                                                @click="$dispatch('open-status-confirm', {
                                                    id: {{ $company->id }},
                                                    name: {{ json_encode($company->company_name) }},
                                                    activating: true
                                                })"
                                                class="p-1.5 bg-green-100 dark:bg-green-900/30 text-green-600 dark:text-green-400 rounded-lg hover:bg-green-200 dark:hover:bg-green-800/40 transition-colors duration-200"
                                                title="Activate">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                                </svg>
                                            </button>
                                            
                                            <!-- Deactivate button -->
                                            <button 
                                                x-show="isActive"
                                                @click="$dispatch('open-status-confirm', {
                                                    id: {{ $company->id }},
                                                    name: {{ json_encode($company->company_name) }},
                                                    activating: false
                                                })"
                                                class="p-1.5 bg-red-100 dark:bg-red-900/30 text-red-600 dark:text-red-400 rounded-lg hover:bg-red-200 dark:hover:bg-red-800/40 transition-colors duration-200"
                                                title="Deactivate">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @else
        <!-- Empty State - No Companies Found -->
        <div class="p-8 text-center">
            <div class="flex flex-col items-center justify-center">
                <!-- Empty illustration -->
                <div class="w-24 h-24 mb-6 flex items-center justify-center rounded-full bg-blue-50 dark:bg-blue-900/20">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-blue-500 dark:text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                    </svg>
                </div>
                
                @if(request('search'))
                    <!-- No Results From Filter -->
                    <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-2">No Matching Companies</h3>
                    <p class="text-gray-600 dark:text-gray-300 text-sm max-w-md mb-6">
                        No companies match your search criteria. Try adjusting your search.
                    </p>
                    <a href="{{ route('company') }}" class="px-5 py-2.5 bg-blue-600 hover:bg-blue-700 dark:bg-blue-700 dark:hover:bg-blue-600 text-white rounded-lg flex items-center justify-center transition-colors duration-200 shadow-md">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                        Clear Search
                    </a>
                @else
                    <!-- No Companies At All -->
                    <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-2">No Companies Yet</h3>
                    <p class="text-gray-600 dark:text-gray-300 text-sm max-w-md mb-6">
                        You haven't added any companies to the system yet. Click the "Add New Company" button to add your first company.
                    </p>
                @endif
            </div>
        </div>
    @endif
</div>

            <!-- Pagination -->
            @if(count($companies) > 0)
            <div class="flex justify-center mt-4">
                <nav class="flex items-center space-x-1">
                    <!-- Previous Page -->
                    @if ($companies->onFirstPage())
                        <span class="px-3 py-2 rounded-lg bg-gray-300 dark:bg-slate-600 text-gray-500 cursor-not-allowed">
                            &laquo;
                        </span>
                    @else
                        <a href="{{ $companies->appends(request()->except('page'))->previousPageUrl() }}" class="px-3 py-2 rounded-lg bg-gray-100 dark:bg-slate-700 text-gray-600 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-slate-600 transition-colors duration-200">
                            &laquo;
                        </a>
                    @endif

                    <!-- Page Numbers -->
                    @foreach ($companies->appends(request()->except('page'))->getUrlRange(1, $companies->lastPage()) as $page => $url)
                        @if ($page == $companies->currentPage())
                            <span class="px-3 py-2 rounded-lg bg-blue-600 dark:bg-blue-700 text-white">{{ $page }}</span>
                        @else
                            <a href="{{ $url }}" class="px-3 py-2 rounded-lg bg-gray-100 dark:bg-slate-700 text-gray-600 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-slate-600 transition-colors duration-200">{{ $page }}</a>
                        @endif
                    @endforeach

                    <!-- Next Page -->
                    @if ($companies->hasMorePages())
                        <a href="{{ $companies->appends(request()->except('page'))->nextPageUrl() }}" class="px-3 py-2 rounded-lg bg-gray-100 dark:bg-slate-700 text-gray-600 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-slate-600 transition-colors duration-200">
                            &raquo;
                        </a>
                    @else
                        <span class="px-3 py-2 rounded-lg bg-gray-300 dark:bg-slate-600 text-gray-500 cursor-not-allowed">
                            &raquo;
                        </span>
                    @endif
                </nav>
            </div>
            @endif
        </main>

 
@include('modal.companyaction')
@include('includes.footer')