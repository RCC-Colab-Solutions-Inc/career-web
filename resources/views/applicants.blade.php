@include('includes.header')

<!-- Main Container -->
<div class="flex" id="main-container">
    
    @include('includes.side')
    
    <!-- Main Content -->
    <div class="flex-1 overflow-x-hidden overflow-y-auto transition-colors duration-300 bg-gray-50 dark:bg-slate-900">
        
        @include('includes.nav')
        
        <!-- Applicants Content -->
        <main class="min-h-screen p-6">
            <!-- Page Title -->
            <div class="mb-8">
                <h1 class="text-2xl font-bold text-gray-800 dark:text-white transition-colors duration-300">Applicants</h1>
                <p class="text-gray-600 dark:text-gray-300 transition-colors duration-300">Review and manage candidates for your job listings</p>
            </div>
            
            <!-- Action Buttons and Filters Section -->
            <form action="{{ route('applicants') }}" method="GET">
                <div class="bg-white dark:bg-slate-800 rounded-xl shadow-md border border-gray-200 dark:border-slate-700 p-6 mb-8 transition-colors duration-300">
                    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-6">
                        <!-- Search Box -->
                        <div class="relative flex-grow w-full">
                            <input 
                                type="text" 
                                name="search"
                                placeholder="Search applicants..." 
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
                            <a href="{{ route('applicants') }}" class="px-4 py-2 bg-gray-200 hover:bg-gray-300 dark:bg-slate-700 dark:hover:bg-slate-600 text-gray-700 dark:text-gray-200 rounded-lg transition-colors duration-200 flex items-center">
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

                    <div class="grid grid-cols-3 w-full gap-4">
                        
                        <!-- Status Filter -->
                        <div>
                            <label class="block text-xs font-medium text-gray-600 dark:text-gray-300 mb-2 transition-colors duration-300">Status</label>
                            <select name="status" class="w-full bg-gray-100 dark:bg-slate-700 border border-gray-300 dark:border-slate-600 rounded-lg py-2 px-3 text-gray-800 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500/50 transition-colors duration-300">
                                <option value="">All Statuses</option>
                                <option value="New" {{ request('status') == 'New' ? 'selected' : '' }}>New</option>
                                <option value="Shortlisted" {{ request('status') == 'Shortlisted' ? 'selected' : '' }}>Shortlisted</option>
                                <option value="For Interview" {{ request('status') == 'For Interview' ? 'selected' : '' }}>For Interview</option>
                                <option value="For Assessment" {{ request('status') == 'For Assessment' ? 'selected' : '' }}>For Assessment</option>
                                <option value="Waiting for Feedback" {{ request('status') == 'Waiting for Feedback' ? 'selected' : '' }}>Waiting for Feedback</option>
                                <option value="Waiting for Job Offer" {{ request('status') == 'Waiting for Job Offer' ? 'selected' : '' }}>Waiting for Job Offer</option>
                                <option value="Hired" {{ request('status') == 'Hired' ? 'selected' : '' }}>Hired</option>
                                <option value="Rejected" {{ request('status') == 'Rejected' ? 'selected' : '' }}>Rejected</option>
                                <option value="Decline" {{ request('status') == 'Decline' ? 'selected' : '' }}>Decline</option>
                            </select>
                        </div>
                    </div>
                </div>
            </form>
            
           <!-- Applicants List Table -->
            <div class="bg-white dark:bg-slate-800 rounded-xl shadow-md border border-gray-200 dark:border-slate-700 overflow-hidden transition-colors duration-300 mb-8">
                @if(count($applicants) > 0)
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
                                    <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider transition-colors duration-300">
                                        Client View
                                    </th>
                                    <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider transition-colors duration-300">
                                        Date Applied
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
                                @foreach($applicants as $applicant)
                                    <tr class="hover:bg-gray-50 dark:hover:bg-slate-700/30 transition-colors duration-200 applicant-row cursor-pointer"
                                        data-id="{{ $applicant->id }}"
                                        data-name="@if($applicant->middlename){{ $applicant->firstname }} {{ $applicant->middlename }} {{ $applicant->lastname }}{{ $applicant->suffix }}@else{{ $applicant->firstname }} {{ $applicant->lastname }}{{ $applicant->suffix }}@endif"
                                        data-email="{{ $applicant->email }}"
                                        data-jobtitle="{{ $applicant->jobtitle }}"
                                        data-department="{{ $applicant->department }}"
                                        data-status="{{ $applicant->applicant_status }}"
                                        data-date="{{ $applicant->created_at->format('F d, Y') }}"
                                        data-time="{{ $applicant->created_at->diffForHumans() }}">
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
                                        <td class="px-6 py-4 whitespace-nowrap text-center">
                                            @if($applicant->clientview == 'Yes')
                                            <span class="px-2.5 py-1 text-xs font-medium rounded-full bg-blue-100 dark:bg-blue-900 text-blue-800 dark:text-blue-300 transition-colors duration-300">
                                                {{ $applicant->clientview }}
                                            </span>
                                            @else
                                            <span class="px-2.5 py-1 text-xs font-medium rounded-full bg-red-100 dark:bg-red-900 text-red-800 dark:text-red-300 transition-colors duration-300">
                                                {{ $applicant->clientview }}
                                            </span>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-center">
                                            <div class="text-sm text-gray-500 dark:text-gray-300 transition-colors duration-300">
                                                {{ $applicant->created_at->format('F d, Y') }}
                                            </div>
                                            <div class="text-xs text-gray-500 dark:text-gray-400 transition-colors duration-300">
                                                {{ $applicant->created_at->diffForHumans() }}
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-center">
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
                                                <!-- Action Button -->
                                                <div class="relative" x-data="{ open: false }">
                                                    <button 
                                                        @click="open = !open" 
                                                        @click.away="open = false"
                                                        class="p-1.5 bg-gray-100 dark:bg-slate-700 text-gray-600 dark:text-gray-300 rounded-lg hover:bg-gray-200 dark:hover:bg-slate-600 transition-colors duration-200" 
                                                        title="More Options"
                                                    >
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
                                                        </svg>
                                                    </button>
                                                    
                                                    <!-- Dropdown Menu -->
                                                    <div 
                                                        x-show="open" 
                                                        x-transition:enter="transition ease-out duration-100" 
                                                        x-transition:enter-start="transform opacity-0 scale-95" 
                                                        x-transition:enter-end="transform opacity-100 scale-100" 
                                                        x-transition:leave="transition ease-in duration-75" 
                                                        x-transition:leave-start="transform opacity-100 scale-100" 
                                                        x-transition:leave-end="transform opacity-0 scale-95" 
                                                        class="absolute right-0 mt-2 w-48 bg-white dark:bg-slate-800 rounded-md shadow-lg z-50 border border-gray-200 dark:border-slate-700"
                                                        style="z-index: 100; display: none;"
                                                    >
                                                        <div class="py-1">
                                                            <!-- Send Email -->
                                                           
                                                            
                                                            <!-- Forward to Client -->
                                                            @if($applicant->clientview == 'No')
                                                                <a 
                                                                    href="#" 
                                                                    class="forward-client-link flex items-center px-4 py-2 text-sm text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-slate-700 transition-colors duration-200"
                                                                    data-id="{{ $applicant->id }}"
                                                                    data-name="@if($applicant->middlename){{ $applicant->firstname }} {{ $applicant->middlename }} {{ $applicant->lastname }}{{ $applicant->suffix }}@else{{ $applicant->firstname }} {{ $applicant->lastname }}{{ $applicant->suffix }}@endif"
                                                                    disabled
                                                                >
                                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 19l-7-7 7-7m8 14l-7-7 7-7" />
                                                                    </svg>
                                                                    Forward to Client
                                                                </a>
                                                            @endif
                                                            
                                                            <!-- Update Status -->
                                                            <a 
                                                                href="#" 
                                                                class="update-status-link flex items-center px-4 py-2 text-sm text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-slate-700 transition-colors duration-200"
                                                                data-id="{{ $applicant->id }}"
                                                                data-name="@if($applicant->middlename){{ $applicant->firstname }} {{ $applicant->middlename }} {{ $applicant->lastname }}{{ $applicant->suffix }}@else{{ $applicant->firstname }} {{ $applicant->lastname }}{{ $applicant->suffix }}@endif"
                                                                data-status="{{ $applicant->applicant_status }}"
                                                            >
                                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 text-purple-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                                </svg>
                                                                Update Status
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                @if(count($applicants) == 0)
                        <!-- Empty State - No Applicants Found -->
                        <div class="p-8 text-center">
                            <div class="flex flex-col items-center justify-center">
                                <!-- Empty illustration -->
                                <div class="w-24 h-24 mb-6 flex items-center justify-center rounded-full bg-blue-50 dark:bg-blue-900/20">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-blue-500 dark:text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                </div>
                                
                                @if(request('search') || request('position') || request('status') || request('company'))
                                    <!-- No Results From Filter -->
                                    <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-2">No Matching Applicants</h3>
                                    <p class="text-gray-600 dark:text-gray-300 text-sm max-w-md mb-6">
                                        No applicants match your current filters. Try adjusting your search criteria.
                                    </p>
                                    <a href="{{ route('applicants') }}" class="px-5 py-2.5 bg-blue-600 hover:bg-blue-700 dark:bg-blue-700 dark:hover:bg-blue-600 text-white rounded-lg flex items-center justify-center transition-colors duration-200 shadow-md">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                        </svg>
                                        Clear Filters
                                    </a>
                                @else
                                    <!-- No Applicants At All -->
                                    <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-2">No Applicants Yet</h3>
                                    <p class="text-gray-600 dark:text-gray-300 text-sm max-w-md mb-6">
                                        There are no applicants in the system at the moment. Applicants will appear here once they apply for your job positions.
                                    </p>
                                    
                                    <a href="/job-listing" class="px-5 py-2.5 bg-blue-600 hover:bg-blue-700 dark:bg-blue-700 dark:hover:bg-blue-600 text-white rounded-lg flex items-center justify-center transition-colors duration-200 shadow-md">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                        </svg>
                                        View Job Listings
                                    </a>
                                @endif
                            </div>
                        </div>
                    @endif
                @endif
            </div>

            <!-- Pagination -->
            @if(count($applicants) > 0)
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
                            <a href="{{ $applicants->appends(request()->except('page'))->previousPageUrl() }}" class="px-3 py-2 rounded-lg bg-gray-100 dark:bg-slate-700 text-gray-600 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-slate-600 transition-colors duration-200">
                                &laquo;
                            </a>
                        @endif

                        <!-- Page Numbers -->
                        @foreach ($applicants->appends(request()->except('page'))->getUrlRange(1, $applicants->lastPage()) as $page => $url)
                            @if ($page == $applicants->currentPage())
                                <span class="px-3 py-2 rounded-lg bg-blue-600 dark:bg-blue-700 text-white">{{ $page }}</span>
                            @else
                                <a href="{{ $url }}" class="px-3 py-2 rounded-lg bg-gray-100 dark:bg-slate-700 text-gray-600 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-slate-600 transition-colors duration-200">{{ $page }}</a>
                            @endif
                        @endforeach

                        <!-- Next Page -->
                        @if ($applicants->hasMorePages())
                            <a href="{{ $applicants->appends(request()->except('page'))->nextPageUrl() }}" class="px-3 py-2 rounded-lg bg-gray-100 dark:bg-slate-700 text-gray-600 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-slate-600 transition-colors duration-200">
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
            @endif
        </main>

        @include('modal.actionapplicant')
    </div>

    <!-- Applicant Details Modal -->
   @include('modal.showapplicant')
</div>
@include('scripts.applicantscript')
@include('includes.footer')

<script>
document.addEventListener('DOMContentLoaded', function() {
    const positionFilter = document.querySelector('select[name="position"]');
    const statusFilter = document.querySelector('select[name="status"]');
    const companyFilter = document.querySelector('select[name="company"]');
    
    [positionFilter, statusFilter, companyFilter].forEach(filter => {
        if (filter) {
            filter.addEventListener('change', function() {
                this.closest('form').submit();
            });
        }
    });
});

function loadApplicantTimeline(applicantId) {
    fetch(`/applicant-timeline/${applicantId}`)
        .then(response => response.json())
        .then(data => {
            if (data.error) {
                console.error(data.error);
                return;
            }
            
            const timelineContainer = document.getElementById('applicant-timeline');
            
            timelineContainer.innerHTML = '';
            
            if (data.statusHistory.length === 0) {
                timelineContainer.innerHTML = `
                    <div class="flex justify-center items-center p-6">
                        <p class="text-gray-500 dark:text-gray-400">No status history available</p>
                    </div>
                `;
                return;
            }
            
            let timelineHTML = `<div class="space-y-4 p-4">`;
            
            data.statusHistory.forEach((status, index) => {
                const date = new Date(status.created_at);
                const formattedDate = date.toLocaleDateString('en-US', {
                    year: 'numeric',
                    month: 'long',
                    day: 'numeric'
                });
                const formattedTime = date.toLocaleTimeString('en-US', {
                    hour: '2-digit',
                    minute: '2-digit'
                });
                
                let statusColorClass = 'bg-blue-500';
                if (status.applicant_status === 'Hired') {
                    statusColorClass = 'bg-green-500';
                } else if (status.applicant_status === 'Rejected') {
                    statusColorClass = 'bg-red-500';
                } else if (status.applicant_status === 'For Interview' || status.applicant_status === 'For Assessment') {
                    statusColorClass = 'bg-yellow-500';
                }
                
                timelineHTML += `
                    <div class="flex">
                        <div class="flex flex-col items-center">
                            <div class="${statusColorClass} w-4 h-4 rounded-full"></div>
                            ${index !== data.statusHistory.length - 1 ? 
                                `<div class="h-full border-l-2 border-gray-300 dark:border-gray-700 my-1"></div>` : ''}
                        </div>
                        <div class="ml-4 pb-5">
                            <div class="flex items-center">
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">${status.applicant_status}</h3>
                                <span class="ml-2 text-sm text-gray-500 dark:text-gray-400">${formattedDate} at ${formattedTime}</span>
                            </div>
                            ${status.remarks ? `<p class="text-gray-700 dark:text-gray-300 mt-1">${status.remarks}</p>` : ''}
                        </div>
                    </div>
                `;
            });
            
            timelineHTML += `</div>`;
            timelineContainer.innerHTML = timelineHTML;
        })
        .catch(error => {
            console.error('Error fetching applicant timeline:', error);
        });
}

document.querySelectorAll('.applicant-row').forEach(row => {
    row.addEventListener('click', function() {
        const applicantId = this.getAttribute('data-id');
        loadApplicantTimeline(applicantId);
    });
});
</script>

