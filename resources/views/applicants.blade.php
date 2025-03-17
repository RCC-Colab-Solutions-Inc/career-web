@include('includes.header')

<!-- Main Container -->
<div class="flex h-screen overflow-hidden transition-colors duration-300" id="main-container">
    
    @include('includes.side')
    
    <!-- Main Content -->
    <div class="flex-1 overflow-x-hidden overflow-y-auto transition-colors duration-300 bg-gray-50 dark:bg-slate-900">
        
        @include('includes.nav')
        
        <!-- Applicants Content -->
        <main class="p-6">
            <!-- Page Title -->
            <div class="mb-8">
                <h1 class="text-2xl font-bold text-gray-800 dark:text-white transition-colors duration-300">Applicants</h1>
                <p class="text-gray-600 dark:text-gray-300 transition-colors duration-300">Review and manage candidates for your job listings</p>
            </div>
            
            <!-- Action Buttons and Filters Section -->
<div class="bg-white dark:bg-slate-800 rounded-xl shadow-md border border-gray-200 dark:border-slate-700 p-6 mb-8 transition-colors duration-300">
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-6">
        <!-- Search Box -->
        <div class="relative flex-grow w-full">
            <input 
                type="text" 
                placeholder="Search applicants..." 
                class="w-full bg-gray-100 dark:bg-slate-700 border border-gray-300 dark:border-slate-600 rounded-lg py-2.5 px-4 pl-10 text-gray-800 dark:text-white placeholder-gray-500 dark:placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500/50 transition-colors duration-300"
            >
            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500 dark:text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
            </div>
        </div>
    </div>
    
    <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
        <!-- Job Position Filter -->
        <div>
            <label class="block text-xs font-medium text-gray-600 dark:text-gray-300 mb-2 transition-colors duration-300">Job Position</label>
            <select class="w-full bg-gray-100 dark:bg-slate-700 border border-gray-300 dark:border-slate-600 rounded-lg py-2 px-3 text-gray-800 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500/50 transition-colors duration-300">
                <option>All Positions</option>
                <option>Senior .NET Developer</option>
                <option>UX/UI Designer</option>
                <option>IT Support Specialist</option>
                <option>Backend Developer</option>
            </select>
        </div>
        
        <!-- Status Filter -->
        <div>
            <label class="block text-xs font-medium text-gray-600 dark:text-gray-300 mb-2 transition-colors duration-300">Status</label>
            <select class="w-full bg-gray-100 dark:bg-slate-700 border border-gray-300 dark:border-slate-600 rounded-lg py-2 px-3 text-gray-800 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500/50 transition-colors duration-300">
                <option>All Statuses</option>
                <option>New</option>
                <option>Shortlisted</option>
                <option>For Interview</option>
                <option>For Assessment</option>
                <option>Waiting for Feedback</option>
                <option>Waiting for Job Offer</option>
                <option>Hired</option>
                <option>Rejected</option>
                <option>Decline</option>
            </select>
        </div>
        
        <!-- Date Filter -->
        <div>
            <label class="block text-xs font-medium text-gray-600 dark:text-gray-300 mb-2 transition-colors duration-300">Date Applied</label>
            <select class="w-full bg-gray-100 dark:bg-slate-700 border border-gray-300 dark:border-slate-600 rounded-lg py-2 px-3 text-gray-800 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500/50 transition-colors duration-300">
                <option>All Dates</option>
                <option>Today</option>
                <option>Last 7 Days</option>
                <option>Last 30 Days</option>
                <option>Last 3 Months</option>
            </select>
        </div>
    </div>
</div>
            
           <!-- Applicants List Table -->
<div class="bg-white dark:bg-slate-800 rounded-xl shadow-md border border-gray-200 dark:border-slate-700 overflow-hidden transition-colors duration-300 mb-8">
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead>
                <tr class="bg-gray-50 dark:bg-slate-700/50 border-b border-gray-200 dark:border-slate-600 transition-colors duration-300">
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider transition-colors duration-300">
                        <div class="flex items-center">
                            Applicant
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16V4m0 0L3 8m4-4l4 4m6 0v12m0 0l4-4m-4 4l-4-4" />
                            </svg>
                        </div>
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider transition-colors duration-300">
                        <div class="flex items-center">
                            Job Position
                        </div>
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider transition-colors duration-300">
                        <div class="flex items-center">
                            Date Applied
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
                <!-- Applicant 1 -->
                 @foreach($applicants as $applicant)
                    <tr class="hover:bg-gray-50 dark:hover:bg-slate-700/30 transition-colors duration-200">
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="h-10 w-10 rounded-full bg-gradient-to-br from-blue-400 to-indigo-400 flex items-center justify-center text-white font-medium">
                                    {{ $applicant->firstname[0] }}{{ $applicant->lastname[0] }}
                                </div>
                                <div class="ml-4">
                                    <div class="text-sm font-medium text-gray-900 dark:text-white transition-colors duration-300">
                                        @if($applicant->middlename)
                                            {{ $applicant->firstname }} {{ $applicant->middlename }} {{ $applicant->lastname }}{{ $applicant->suffix }}
                                        @else
                                            {{ $applicant->firstname }} {{ $applicant->lastname }}{{ $applicant->suffix }}
                                        @endif
                                    </div>
                                    <div class="text-sm text-gray-500 dark:text-gray-400 transition-colors duration-300">
                                        {{ $applicant->email }}
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900 dark:text-white transition-colors duration-300">
                                {{ $applicant->jobtitle }}
                            </div>
                            <div class="text-xs text-gray-500 dark:text-gray-400 transition-colors duration-300">
                                {{ $applicant->department }}
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-500 dark:text-gray-300 transition-colors duration-300">
                                {{ $applicant->created_at->format('F d, Y') }}
                            </div>
                            <div class="text-xs text-gray-500 dark:text-gray-400 transition-colors duration-300">
                                {{ $applicant->created_at->diffForHumans() }}
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap flex items-center justify-center">
                            
                                @if($applicant->applicant_status == 'New')
                                    <span class="px-2.5 py-1 text-xs font-medium rounded-full bg-blue-100 dark:bg-blue-900 text-blue-800 dark:text-blue-300 transition-colors duration-300">
                                        {{ $applicant->applicant_status }}
                                    </span>
                                @elseif($applicant->applicant_status == 'Rejected')
                                    <span class="px-2.5 py-1 text-xs font-medium rounded-full bg-red-100 dark:bg-red-900 text-red-800 dark:text-red-300 transition-colors duration-300">
                                        {{ $applicant->applicant_status }}
                                
                                    </span>
                                @elseif($applicant->applicant_status == 'Hired')
                                    <span class="px-2.5 py-1 text-xs font-medium rounded-full bg-green-100 dark:bg-green-900 text-green-800 dark:text-green-300 transition-colors duration-300">
                                        {{ $applicant->applicant_status }}
                                    </span>
                                @else
                                    <span class="px-2.5 py-1 text-xs font-medium rounded-full bg-yellow-100 dark:bg-yellow-900 text-yellow-800 dark:text-yellow-300 transition-colors duration-300">
                                        {{ $applicant->applicant_status }}
                                    </span>
                                @endif
                                
                          
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-center">
                            <div class="flex items-center justify-center space-x-3">
                                <div class="relative">
                                    <button class="p-1.5 bg-gray-100 dark:bg-slate-700 text-gray-600 dark:text-gray-300 rounded-lg hover:bg-gray-200 dark:hover:bg-slate-600 transition-colors duration-200" title="More Options">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
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
            </div>
            
            <!-- Pagination -->
            <div class="flex justify-between items-center">
    <!-- Pagination Info -->
    <div class="text-sm text-gray-600 dark:text-gray-400 transition-colors duration-300">
        Showing 
        <span class="font-medium text-gray-900 dark:text-white">{{ $applicants->firstItem() }}</span> 
        to 
        <span class="font-medium text-gray-900 dark:text-white">{{ $applicants->lastItem() }}</span> 
        of 
        <span class="font-medium text-gray-900 dark:text-white">{{ $applicants->total() }}</span> results
    </div>

    <!-- Pagination Links -->
        <div class="flex justify-center">
            <nav class="flex items-center space-x-1">
                <!-- Previous Page -->
                @if ($applicants->onFirstPage())
                    <span class="px-3 py-2 rounded-lg bg-gray-300 dark:bg-slate-600 text-gray-500 cursor-not-allowed">
                        &laquo;
                    </span>
                @else
                    <a href="{{ $applicants->previousPageUrl() }}" class="px-3 py-2 rounded-lg bg-gray-100 dark:bg-slate-700 text-gray-600 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-slate-600 transition-colors duration-200">
                        &laquo;
                    </a>
                @endif

                <!-- Page Numbers -->
                @foreach ($applicants->getUrlRange(1, $applicants->lastPage()) as $page => $url)
                    @if ($page == $applicants->currentPage())
                        <span class="px-3 py-2 rounded-lg bg-blue-600 dark:bg-blue-700 text-white">{{ $page }}</span>
                    @else
                        <a href="{{ $url }}" class="px-3 py-2 rounded-lg bg-gray-100 dark:bg-slate-700 text-gray-600 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-slate-600 transition-colors duration-200">{{ $page }}</a>
                    @endif
                @endforeach

                <!-- Next Page -->
                @if ($applicants->hasMorePages())
                    <a href="{{ $applicants->nextPageUrl() }}" class="px-3 py-2 rounded-lg bg-gray-100 dark:bg-slate-700 text-gray-600 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-slate-600 transition-colors duration-200">
                        &raquo;
                    </a>
                @else
                    <span class="px-3 py-2 rounded-lg bg-gray-300 dark:bg-slate-600 text-gray-500 cursor-not-allowed">
                        &raquo;
                    </span>
                @endif
            </nav>
        </div>
    </div>



        </main>
    </div>
</div>

@include('includes.footer')