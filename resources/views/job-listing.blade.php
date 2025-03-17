@include('includes.header')

<!-- Main Container -->
<div class="flex h-screen overflow-hidden transition-colors duration-300" id="main-container">
    
@include('includes.side')
    
    <!-- Main Content -->
    <div class="flex-1 overflow-x-hidden overflow-y-auto transition-colors duration-300 bg-gray-50 dark:bg-slate-900">
        
    @include('includes.nav')
        
        <!-- Job Listing Content -->
        <main class="p-6">
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
            <div class="bg-white dark:bg-slate-800 rounded-xl shadow-md border border-gray-200 dark:border-slate-700 p-6 mb-8 transition-colors duration-300">
                <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-6">
                    
                    <!-- Search Box -->
                    <div class="relative flex-grow w-full">
                        <input 
                            type="text" 
                            placeholder="Search jobs..." 
                            class="w-full bg-gray-100 dark:bg-slate-700 border border-gray-300 dark:border-slate-600 rounded-lg py-2.5 px-4 pl-10 text-gray-800 dark:text-white placeholder-gray-500 dark:placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500/50 transition-colors duration-300"
                        >
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500 dark:text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </div>
                    </div>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <!-- Department Filter -->
                   
                    
                    <!-- Location Filter -->
                    <div>
                        <label class="block text-xs font-medium text-gray-600 dark:text-gray-300 mb-2 transition-colors duration-300">Location</label>
                        <select class="w-full bg-gray-100 dark:bg-slate-700 border border-gray-300 dark:border-slate-600 rounded-lg py-2 px-3 text-gray-800 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500/50 transition-colors duration-300">
                            <option>All Locations</option>
                            <option>Remote</option>
                            <option>On-site</option>
                            <option>Hybrid</option>
                        </select>
                    </div>
                    
                    <!-- Status Filter -->
                    <div>
                        <label class="block text-xs font-medium text-gray-600 dark:text-gray-300 mb-2 transition-colors duration-300">Status</label>
                        <select class="w-full bg-gray-100 dark:bg-slate-700 border border-gray-300 dark:border-slate-600 rounded-lg py-2 px-3 text-gray-800 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500/50 transition-colors duration-300">
                            <option>All Statuses</option>
                            <option>Active</option>
                            <option>Reviewing</option>
                            <option>Closed</option>
                        </select>
                    </div>
                </div>
            </div>
            
            <!-- Job Cards Grid -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
                @foreach($jobs as $job)
                    <div class="bg-white dark:bg-slate-800 rounded-xl shadow-md border border-gray-200 dark:border-slate-700 overflow-hidden group hover:shadow-lg transition-all duration-300">
                        <div class="p-6">
                            <div class="flex justify-between items-center">
                                <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-2 transition-colors duration-300">
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
                                <a href="selectapplicants/{{ $job->id }}">
                                    <div class="text-sm font-medium text-blue-600 dark:text-blue-400 transition-colors duration-300">
                                    {{ $job->applicants_count }} Applicants
                                    </div>
                                </a>
                                

                                <div class="flex space-x-2">
                                    <button class="p-2 bg-gray-100 dark:bg-slate-700 text-gray-700 dark:text-gray-200 rounded-lg hover:bg-gray-200 dark:hover:bg-slate-600 transition-colors duration-200">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        <!-- Pagination Links -->
            <div class="flex justify-center mt-4">
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
            </div>


        </main>
    </div>
</div>

@include('includes.footer')