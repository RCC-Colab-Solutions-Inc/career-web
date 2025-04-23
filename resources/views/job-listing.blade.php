@include('includes.header')

<!-- Main Container -->
<div class="flex" id="main-container">
    
@include('includes.side')
    
    <!-- Main Content -->
    <div class="flex-1 overflow-x-hidden overflow-y-auto transition-colors duration-300 bg-gray-50 dark:bg-slate-900">
        
    @include('includes.nav')
        
        <!-- Job Listing Content -->
        <main class="min-h-screen p-6">


            <!-- Copy Success Toast -->
            <div id="copyToast" class="fixed top-15 right-6 z-50 p-4 max-w-xs bg-green-50 dark:bg-green-900 border border-green-200 dark:border-green-800/30 rounded-lg shadow-lg transform transition-all duration-300 flex items-start opacity-0 translate-y-[-20px]">
                <div class="flex-shrink-0">
                    <svg class="h-5 w-5 text-green-600 dark:text-green-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                    </svg>
                </div>
                <div class="ml-3 flex-1">
                    <p class="text-sm font-medium text-green-800 dark:text-green-300">
                    Job URL copied to clipboard!
                    </p>
                </div>
            </div>

            <!-- Add Job Success Toast -->
        @if (session('success'))
            <div id="successToast" class="fixed top-15 right-6 z-50 p-4 max-w-xs bg-green-50 dark:bg-green-900 border border-green-200 dark:border-green-800/30 rounded-lg shadow-lg transform transition-all duration-300 flex items-start opacity-0 translate-y-[-20px]">
                <div class="flex-shrink-0">
                    <svg class="h-5 w-5 text-green-600 dark:text-green-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                    </svg>
                </div>
                <div class="ml-3 flex-1">
                    <p class="text-sm font-medium text-green-800 dark:text-green-300">
                    Job added successfully!
                    </p>
                </div>
            </div>
        @endif

            <!-- Page Title -->
            <div class="mb-8 flex justify-between items-center">
                <div>
                    <h1 class="text-2xl font-bold text-gray-800 dark:text-white transition-colors duration-300">Job Listing</h1>
                    <p class="text-gray-600 dark:text-gray-300 transition-colors duration-300">Manage and post job opportunities</p>
                </div>
                <!-- Add New Job Button -->
                <a href="/add-job" class="px-4 py-2.5 bg-blue-600 hover:bg-blue-700 dark:bg-blue-700 dark:hover:bg-blue-600 text-white rounded-lg flex items-center justify-center transition-colors duration-200 shadow-md">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                        </svg>
                        Add New Job
                    </a>
            </div>
            
            <!-- Filters Section -->
            <form action="{{ route('job-listing') }}" method="GET">
                <div class="bg-white dark:bg-slate-800 rounded-xl shadow-md border border-gray-200 dark:border-slate-700 p-6 mb-8 transition-colors duration-300">
                    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-6">
            
            <!-- Search Box -->
            <div class="relative flex-grow w-full">
                <input 
                    type="text" 
                    name="search"
                    placeholder="Search jobs..." 
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
                <a href="{{ route('job-listing') }}" class="px-4 py-2 bg-gray-200 hover:bg-gray-300 dark:bg-slate-700 dark:hover:bg-slate-600 text-gray-700 dark:text-gray-200 rounded-lg transition-colors duration-200 flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                    Clear
                </a>
                <button type="submit" class="px-4 py-2 bg-blue-600 hover:bg-blue-700 dark:bg-blue-700 dark:hover:bg-blue-600 text-white rounded-lg transition-colors duration-200">
                    Search
                </button>
            </div>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <!-- Location Filter -->
            <div>
                <label class="block text-xs font-medium text-gray-600 dark:text-gray-300 mb-2 transition-colors duration-300">Location</label>
                <select name="location" class="w-full bg-gray-100 dark:bg-slate-700 border border-gray-300 dark:border-slate-600 rounded-lg py-2 px-3 text-gray-800 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500/50 transition-colors duration-300">
                    <option>All Locations</option>
                    <option value="Remote" {{ request('location') == 'Remote' ? 'selected' : '' }}>Remote</option>
                    <option value="On-site" {{ request('location') == 'On-site' ? 'selected' : '' }}>On-site</option>
                    <option value="Hybrid" {{ request('location') == 'Hybrid' ? 'selected' : '' }}>Hybrid</option>
                </select>
            </div>
            
            <!-- Status Filter -->
            <div>
                <label class="block text-xs font-medium text-gray-600 dark:text-gray-300 mb-2 transition-colors duration-300">Status</label>
                <select name="status" class="w-full bg-gray-100 dark:bg-slate-700 border border-gray-300 dark:border-slate-600 rounded-lg py-2 px-3 text-gray-800 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500/50 transition-colors duration-300">
                    <option>All Statuses</option>
                    <option value="open" {{ request('status') == 'open' ? 'selected' : '' }}>Open</option>
                    <option value="closed" {{ request('status') == 'closed' ? 'selected' : '' }}>Closed</option>
                </select>
            </div>
        </div>
    </div>
</form>
            
            <!-- Job Cards Grid -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
                @if(count($jobs) > 0)
                    @foreach($jobs as $job)
                        <div class="bg-white dark:bg-slate-800 rounded-xl shadow-md border border-gray-200 dark:border-slate-700 group hover:shadow-lg transition-all duration-300">
                            <div class="p-6">
                                <div class="flex justify-between items-center">
                                    <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-2 transition-colors duration-300">
                                        @if($job->joburgency == 'urgent')
                                            [URGENT]
                                        @endif
                                        {{ $job->jobtitle }} 
                                    </h3>
                                    @if($job->jobstatus == 'open')
                                        <span class="px-2.5 py-1 text-xs font-medium rounded-full bg-green-100 dark:bg-green-900 text-green-800 dark:text-green-300 transition-colors duration-300">
                                            Open
                                        </span>
                                    @elseif($job->jobstatus == 'closed')
                                        <span class="px-2.5 py-1 text-xs font-medium rounded-full bg-red-100 dark:bg-red-900 text-red-800 dark:text-red-300 transition-colors duration-300">
                                            Closed
                                        </span>
                                    @endif
                                </div>

                                <div class="flex flex-wrap gap-3 mt-3 mb-4">
                                    <span class="bg-gray-100 dark:bg-slate-700 text-gray-800 dark:text-gray-200 text-xs px-2.5 py-1 rounded-full flex items-center transition-colors duration-300">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5 mr-1 text-gray-500 dark:text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                        </svg>
                                        {{ $job->joblocation }}
                                    </span>
                                    <span class="bg-gray-100 dark:bg-slate-700 text-gray-800 dark:text-gray-200 text-xs px-2.5 py-1 rounded-full flex items-center transition-colors duration-300">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5 mr-1 text-gray-500 dark:text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        {{ $job->jobtype }}
                                    </span>
                                </div>

                                <p class="text-gray-600 dark:text-gray-300 text-sm mb-4 transition-colors duration-300">
                                    {{ $job->jobdescription }}
                                </p>

                                <div class="flex items-center text-gray-500 dark:text-gray-400 text-sm mb-5 transition-colors duration-300">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                    Posted: {{ $job->created_at->format('F d, Y') }}
                                </div>

                                <div class="flex justify-between items-center">
                                    
                                    
                                    <div class="relative" x-data="jobActions">
                                        <!-- Copy Button -->
                                        <button 
                                            @click="copyJobDetails('{{ $job->jobcode }}')"
                                            class="p-2 mr-2 bg-gray-100 dark:bg-slate-700 text-gray-700 dark:text-gray-200 rounded-lg hover:bg-gray-200 dark:hover:bg-slate-600 transition-colors duration-200"
                                            title="Copy job code"
                                        >
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z" />
                                            </svg>
                                        </button>

                                        <!-- Edit Button -->
                                        <button 
                                            @click="toggleMenu()"
                                            class="p-2 bg-gray-100 dark:bg-slate-700 text-gray-700 dark:text-gray-200 rounded-lg hover:bg-gray-200 dark:hover:bg-slate-600 transition-colors duration-200"
                                        >
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                            </svg>
                                        </button>
                                        
                                        <!-- Main Dropdown Menu -->
                                        <div 
                                            x-show="isMainMenuOpen()"
                                            @click.away="closeAll()"
                                            x-transition:enter="transition ease-out duration-100" 
                                            x-transition:enter-start="transform opacity-0 scale-95" 
                                            x-transition:enter-end="transform opacity-100 scale-100" 
                                            class="absolute right-0 mt-2 w-48 bg-white dark:bg-slate-800 rounded-md shadow-lg z-50 border border-gray-200 dark:border-slate-700"
                                            style="z-index: 100; display: none;"
                                        >
                                            <div class="py-1">
                                                <!-- Make It Urgent -->
                                                <button 
                                                    @click="showUrgentDialog()"
                                                    class="w-full text-left flex items-center px-4 py-2 text-sm text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-slate-700 transition-colors duration-200"
                                                >
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 text-yellow-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                                                    </svg>
                                                    {{ $job->joburgency == 'urgent' ? 'Remove Urgency' : 'Make Urgent' }}
                                                </button>
                                                
                                                <!-- Open/Close Toggle -->
                                                <button 
                                                    @click="showStatusDialog()"
                                                    class="w-full text-left flex items-center px-4 py-2 text-sm text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-slate-700 transition-colors duration-200"
                                                >
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 11V7a4 4 0 118 0m-4 8v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2z" />
                                                    </svg>
                                                    {{ $job->jobstatus == 'open' ? 'Close Job' : 'Open Job' }}
                                                </button>
                                                
                                                <!-- Delete -->
                                                <button 
                                                    @click="showDeleteDialog()"
                                                    class="w-full text-left flex items-center px-4 py-2 text-sm text-red-600 dark:text-red-400 hover:bg-gray-100 dark:hover:bg-slate-700 transition-colors duration-200"
                                                >
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                    </svg>
                                                    Delete
                                                </button>
                                            </div>
                                        </div>
                                        
                                        <!-- Make Urgent Confirmation -->
                                        <div 
                                            x-show="showUrgentConfirm"
                                            @click.away="closeAll()" 
                                            x-transition:enter="transition ease-out duration-100" 
                                            x-transition:enter-start="transform opacity-0 scale-95" 
                                            x-transition:enter-end="transform opacity-100 scale-100"
                                            class="absolute right-0 mt-2 w-64 bg-white dark:bg-slate-800 rounded-md shadow-lg z-50 border border-gray-200 dark:border-slate-700 p-4"
                                            style="z-index: 100; display: none;"
                                        >
                                            <h4 class="text-sm font-medium text-gray-900 dark:text-white mb-2">Mark as Urgent?</h4>
                                            <p class="text-xs text-gray-600 dark:text-gray-300 mb-3">This job will be highlighted and appear at the top of listings.</p>
                                            <div class="flex justify-end space-x-2">
                                                <button @click="closeAll()" class="px-3 py-1.5 bg-gray-200 dark:bg-slate-700 text-gray-800 dark:text-gray-200 text-xs rounded hover:bg-gray-300 dark:hover:bg-slate-600 transition-colors duration-200">
                                                    Cancel
                                                </button>
                                                <a href="/make-urgent/{{ $job->id }}" class="px-3 py-1.5 bg-yellow-500 text-white text-xs rounded hover:bg-yellow-600 transition-colors duration-200">
                                                    Confirm
                                                </a>
                                            </div>
                                        </div>
                                        
                                        <!-- Status Change Confirmation -->
                                        <div 
                                            x-show="showStatusConfirm"
                                            @click.away="closeAll()" 
                                            x-transition:enter="transition ease-out duration-100" 
                                            x-transition:enter-start="transform opacity-0 scale-95" 
                                            x-transition:enter-end="transform opacity-100 scale-100"
                                            class="absolute right-0 mt-2 w-64 bg-white dark:bg-slate-800 rounded-md shadow-lg z-50 border border-gray-200 dark:border-slate-700 p-4"
                                            style="z-index: 100; display: none;"
                                        >
                                            <h4 class="text-sm font-medium text-gray-900 dark:text-white mb-2">{{ $job->jobstatus == 'open' ? 'Close' : 'Open' }} this job?</h4>
                                            <p class="text-xs text-gray-600 dark:text-gray-300 mb-3">
                                                {{ $job->jobstatus == 'open' ? 'This will prevent new applications from being submitted.' : 'This will allow new applications to be submitted.' }}
                                            </p>
                                            <div class="flex justify-end space-x-2">
                                                <button @click="closeAll()" class="px-3 py-1.5 bg-gray-200 dark:bg-slate-700 text-gray-800 dark:text-gray-200 text-xs rounded hover:bg-gray-300 dark:hover:bg-slate-600 transition-colors duration-200">
                                                    Cancel
                                                </button>
                                                <a href="/job-status/{{ $job->id }}" class="px-3 py-1.5 bg-blue-500 text-white text-xs rounded hover:bg-blue-600 transition-colors duration-200">
                                                    Confirm
                                                </a>
                                            </div>
                                        </div>
                                        
                                        <!-- Delete Confirmation -->
                                        <div 
                                            x-show="showDeleteConfirm"
                                            @click.away="closeAll()" 
                                            x-transition:enter="transition ease-out duration-100" 
                                            x-transition:enter-start="transform opacity-0 scale-95" 
                                            x-transition:enter-end="transform opacity-100 scale-100"
                                            class="absolute right-0 mt-2 w-64 bg-white dark:bg-slate-800 rounded-md shadow-lg z-50 border border-gray-200 dark:border-slate-700 p-4"
                                            style="z-index: 100; display: none;"
                                        >
                                            <h4 class="text-sm font-medium text-red-600 dark:text-red-400 mb-2">Delete this job?</h4>
                                            <p class="text-xs text-gray-600 dark:text-gray-300 mb-3">This action cannot be undone. All associated applications will also be removed.</p>
                                            <div class="flex justify-end space-x-2">
                                                <button @click="closeAll()" class="px-3 py-1.5 bg-gray-200 dark:bg-slate-700 text-gray-800 dark:text-gray-200 text-xs rounded hover:bg-gray-300 dark:hover:bg-slate-600 transition-colors duration-200">
                                                    Cancel
                                                </button>
                                                <a href="/delete-job/{{ $job->id }}" class="px-3 py-1.5 bg-red-500 text-white text-xs rounded hover:bg-red-600 transition-colors duration-200">
                                                    Delete
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                <!-- Empty State -->
                <div class="col-span-1 lg:col-span-2">
                    <div class="bg-white dark:bg-slate-800 rounded-xl shadow-md border border-gray-200 dark:border-slate-700 p-8 text-center">
                        <div class="flex flex-col items-center justify-center">
                            <!-- Empty illustration -->
                            <div class="w-24 h-24 mb-6 flex items-center justify-center rounded-full bg-blue-50 dark:bg-blue-900/20">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-blue-500 dark:text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                </svg>
                            </div>
                
                @if(request('search') || request('location') != 'All Locations' || request('status') != 'All Statuses')
                    <!-- No Results From Filter -->
                    <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-2">No Matching Jobs</h3>
                    <p class="text-gray-600 dark:text-gray-300 text-sm max-w-md mb-6">
                        No jobs match your current filters. Try adjusting your search criteria.
                    </p>
                    <a href="{{ route('job-listing') }}" class="px-4 py-2 bg-blue-600 hover:bg-blue-700 dark:bg-blue-700 dark:hover:bg-blue-600 text-white rounded-lg transition-colors duration-200 inline-flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                        Clear Filters
                    </a>
                @else
                    <!-- No Jobs At All -->
                    <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-2">No Job Listings Yet</h3>
                    <p class="text-gray-600 dark:text-gray-300 text-sm max-w-md mb-6">
                        You haven't added any job opportunities to your listing. Click the button "Add New Job" to create your first job posting.
                    </p>
                    <a href="/add-job" class="px-4 py-2 bg-blue-600 hover:bg-blue-700 dark:bg-blue-700 dark:hover:bg-blue-600 text-white rounded-lg transition-colors duration-200 inline-flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                        </svg>
                        Add New Job
                    </a>
                @endif
            </div>
        </div>
    </div>
@endif


</div>

<!-- Pagination Links -->
<div class="flex justify-center mt-4">
    @if(count($jobs) > 0)
        <nav class="flex items-center space-x-1">
            <!-- Previous Page -->
            @if ($jobs->onFirstPage())
                <span class="px-3 py-2 rounded-lg bg-gray-300 dark:bg-slate-600 text-gray-500 cursor-not-allowed">
                    &laquo;
                </span>
            @else
                <a href="{{ $jobs->previousPageUrl() }}" class="px-3 py-2 rounded-lg bg-gray-100 dark:bg-slate-700 text-gray-600 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-slate-600 transition-colors duration-200">
                    &laquo;
                </a>
            @endif

            <!-- Page Numbers -->
            @foreach ($jobs->getUrlRange(1, $jobs->lastPage()) as $page => $url)
                @if ($page == $jobs->currentPage())
                    <span class="px-3 py-2 rounded-lg bg-blue-600 dark:bg-blue-700 text-white">{{ $page }}</span>
                @else
                    <a href="{{ $url }}" class="px-3 py-2 rounded-lg bg-gray-100 dark:bg-slate-700 text-gray-600 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-slate-600 transition-colors duration-200">
                        {{ $page }}
                    </a>
                @endif
            @endforeach

            <!-- Next Page -->
            @if ($jobs->hasMorePages())
                <a href="{{ $jobs->nextPageUrl() }}" class="px-3 py-2 rounded-lg bg-gray-100 dark:bg-slate-700 text-gray-600 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-slate-600 transition-colors duration-200">
                    &raquo;
                </a>
            @else
                <span class="px-3 py-2 rounded-lg bg-gray-300 dark:bg-slate-600 text-gray-500 cursor-not-allowed">
                    &raquo;
                </span>
            @endif
        </nav>
    @endif
</div>


        </main>
    </div>
</div>

@include('includes.footer')

            <script>
                document.addEventListener('DOMContentLoaded', function() {
                const successToast = document.getElementById('successToast');
                
                showToast();
                
                function showToast() {
                   
                    successToast.classList.remove('opacity-0', 'translate-y-[-20px]');
                    successToast.classList.add('opacity-100', 'translate-y-0');
                    
                    // Hide toast after 4 seconds
                    setTimeout(function() {
                        successToast.classList.remove('opacity-100', 'translate-y-0');
                        successToast.classList.add('opacity-0', 'translate-y-[-20px]');
                    }, 4000);
                }
            });

            document.addEventListener('alpine:init', () => {
                Alpine.data('jobActions', () => ({
                    open: false,
                    showUrgentConfirm: false,
                    showStatusConfirm: false,
                    showDeleteConfirm: false,
                    
                    toggleMenu() {
                        this.open = !this.open;
                        this.showUrgentConfirm = false;
                        this.showStatusConfirm = false;
                        this.showDeleteConfirm = false;
                    },
                    
                    isMainMenuOpen() {
                        return this.open && !this.showUrgentConfirm && !this.showStatusConfirm && !this.showDeleteConfirm;
                    },
                    
                    closeAll() {
                        this.open = false;
                        this.showUrgentConfirm = false;
                        this.showStatusConfirm = false;
                        this.showDeleteConfirm = false;
                    },
                    
                    showUrgentDialog() {
                        this.open = false;
                        this.showUrgentConfirm = true;
                        this.showStatusConfirm = false;
                        this.showDeleteConfirm = false;
                    },
                    
                    showStatusDialog() {
                        this.open = false;
                        this.showUrgentConfirm = false;
                        this.showStatusConfirm = true;
                        this.showDeleteConfirm = false;
                    },
                    
                    showDeleteDialog() {
                        this.open = false;
                        this.showUrgentConfirm = false;
                        this.showStatusConfirm = false;
                        this.showDeleteConfirm = true;
                    },
                    
                    // copy function
                    copyJobDetails(jobcode) {
                        try {
                            const baseUrl = "{{ config('app.url') }}/job/";
                            const textToCopy = baseUrl + jobcode;
                            
                            const copyToast = document.getElementById('copyToast');
                            
                            if (!navigator.clipboard) {
                                const textArea = document.createElement('textarea');
                                textArea.value = textToCopy;
                                textArea.style.position = 'fixed';
                                document.body.appendChild(textArea);
                                textArea.focus();
                                textArea.select();
                                
                                try {
                                    const successful = document.execCommand('copy');
                                    if (successful) {
                                        this.showCopyToast(copyToast);
                                    } else {
                                        console.error('Failed to copy text');
                                    }
                                } catch (err) {
                                    console.error('Error copying text: ', err);
                                }
                                
                                document.body.removeChild(textArea);
                                return;
                            }
                            
                            navigator.clipboard.writeText(textToCopy)
                                .then(() => {
                                    this.showCopyToast(copyToast);
                                })
                                .catch(err => {
                                    console.error('Could not copy text: ', err);
                                    alert('Failed to copy job URL. Please try again.');
                                });
                        } catch (error) {
                            console.error('Error in copyJobDetails: ', error);
                            alert('An error occurred while copying job URL.');
                        }
                    },

                    // Separate function to show toast
                    showCopyToast(copyToast) {
                        if (copyToast) {
                            copyToast.classList.remove('opacity-0', 'translate-y-[-20px]');
                            copyToast.classList.add('opacity-100', 'translate-y-0');
                            
                            // Hide toast after 4 seconds
                            setTimeout(function() {
                                copyToast.classList.remove('opacity-100', 'translate-y-0');
                                copyToast.classList.add('opacity-0', 'translate-y-[-20px]');
                            }, 4000);
                        } else {
                            console.error('Copy toast element not found');
                            alert('Job code copied to clipboard!');
                        }
                    }
                }));
            });

            document.addEventListener('DOMContentLoaded', function() {
                // Auto-submit form when select filters change
                const locationFilter = document.querySelector('select[name="location"]');
                const statusFilter = document.querySelector('select[name="status"]');
                
                if (locationFilter) {
                    locationFilter.addEventListener('change', function() {
                        this.closest('form').submit();
                    });
                }
                
                if (statusFilter) {
                    statusFilter.addEventListener('change', function() {
                        this.closest('form').submit();
                    });
                }
            });
            </script>