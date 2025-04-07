@include('includes.header')

<!-- Main Container -->
<div class="flex" id="main-container">
    
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
    
        <div class="grid grid-cols-3 w-full gap-4">
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
                        <label class="block text-xs font-medium text-gray-600 dark:text-gray-300 mb-2 transition-colors duration-300">Company</label>
                        <select class="w-full bg-gray-100 dark:bg-slate-700 border border-gray-300 dark:border-slate-600 rounded-lg py-2 px-3 text-gray-800 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500/50 transition-colors duration-300">
                            <option>All</option>
                           
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
                <!-- Applicant 1 -->
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
                                            <a 
                                                href="#" 
                                                class="send-email-link flex items-center px-4 py-2 text-sm text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-slate-700 transition-colors duration-200"
                                                data-id="{{ $applicant->id }}"
                                                data-name="@if($applicant->middlename){{ $applicant->firstname }} {{ $applicant->middlename }} {{ $applicant->lastname }}{{ $applicant->suffix }}@else{{ $applicant->firstname }} {{ $applicant->lastname }}{{ $applicant->suffix }}@endif"
                                                data-email="{{ $applicant->email }}"
                                            >
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                                </svg>
                                                Send Email
                                            </a>
                                            
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

        <!-- Status Update Modal -->
        <div 
            x-data="{ isOpen: false, applicantId: null, applicantName: '', currentStatus: '', newStatus: '', notes: '', showSuccessMessage: false, 
                updateStatus() {
                    
                    // Update UI to show the status is updating
                    const statusElements = document.querySelectorAll(`[data-applicant-id='${this.applicantId}']`);
                    if (statusElements.length) {
                        statusElements.forEach(el => {
                            // Remove old status classes
                            el.classList.remove('bg-blue-100', 'dark:bg-blue-900', 'text-blue-800', 'dark:text-blue-300');
                            el.classList.remove('bg-yellow-100', 'dark:bg-yellow-900', 'text-yellow-800', 'dark:text-yellow-300');
                            el.classList.remove('bg-green-100', 'dark:bg-green-900', 'text-green-800', 'dark:text-green-300');
                            el.classList.remove('bg-red-100', 'dark:bg-red-900', 'text-red-800', 'dark:text-red-300');
                            
                            // Add new status classes
                            if (this.newStatus === 'New') {
                                el.classList.add('bg-blue-100', 'dark:bg-blue-900', 'text-blue-800', 'dark:text-blue-300');
                            } else if (this.newStatus === 'Hired') {
                                el.classList.add('bg-green-100', 'dark:bg-green-900', 'text-green-800', 'dark:text-green-300');
                            } else if (this.newStatus === 'Rejected' || this.newStatus === 'Decline') {
                                el.classList.add('bg-red-100', 'dark:bg-red-900', 'text-red-800', 'dark:text-red-300');
                            } else {
                                el.classList.add('bg-yellow-100', 'dark:bg-yellow-900', 'text-yellow-800', 'dark:text-yellow-300');
                            }
                            
                            // Update text content
                            el.textContent = this.newStatus;
                        });
                    }
                    
                    // Show success message
                    this.showSuccessMessage = true;
                    
                    // Auto-hide success message after 2 seconds
                    setTimeout(() => {
                        this.showSuccessMessage = false;
                        // Close the modal after showing success
                        setTimeout(() => {
                            this.isOpen = false;
                            // Reset form
                            this.newStatus = '';
                            this.notes = '';
                        }, 500);
                    }, 2000);
                    
                    // Update current status for next time modal opens
                    const linkElement = document.querySelector(`[data-id='${this.applicantId}']`);
                    if (linkElement) {
                        linkElement.setAttribute('data-status', this.newStatus);
                    }
                }
            }"
            x-show="isOpen"
            @open-status-modal.window="
                isOpen = true; 
                applicantId = $event.detail.id;
                applicantName = $event.detail.name;
                currentStatus = $event.detail.status;
            "
            @keydown.escape.window="isOpen = false"
            class="fixed inset-0 z-50 overflow-y-auto"
            style="display: none;"
            >
            <div class="flex items-center justify-center min-h-screen px-4">
                <!-- Overlay -->
                <div 
                    x-show="isOpen" 
                    x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0"
                    x-transition:enter-end="opacity-100"
                    x-transition:leave="transition ease-in duration-200"
                    x-transition:leave-start="opacity-100"
                    x-transition:leave-end="opacity-0"
                    @click="isOpen = false" 
                    class="fixed inset-0 bg-black bg-opacity-50"
                ></div>
                
                <!-- Modal -->
                <div 
                    x-show="isOpen" 
                    x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0 transform scale-95"
                    x-transition:enter-end="opacity-100 transform scale-100"
                    x-transition:leave="transition ease-in duration-200"
                    x-transition:leave-start="opacity-100 transform scale-100"
                    x-transition:leave-end="opacity-0 transform scale-95"
                    class="relative bg-white dark:bg-slate-800 rounded-lg max-w-md w-full mx-auto shadow-xl transition-colors duration-300"
                >
                    <!-- Modal Header -->
                    <div class="px-6 py-4 border-b border-gray-200 dark:border-slate-700 transition-colors duration-300">
                        <h3 class="text-lg font-medium text-gray-900 dark:text-white transition-colors duration-300">
                            Update Applicant Status
                        </h3>
                        <button 
                            @click="isOpen = false" 
                            class="absolute top-4 right-4 text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-200 transition-colors duration-200"
                        >
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                    
                    <!-- Modal Body -->
                    <div class="px-6 py-4">
                        <form action="updateapplicantstatus" method="POST">
                            <input type="hidden" name="applicantid" x-model="applicantId">
                            @csrf
                            <div class="mb-4">
                                <p class="text-sm text-gray-600 dark:text-gray-400 transition-colors duration-300">
                                    Updating status for: <span x-text="applicantName" class="font-medium text-gray-900 dark:text-white transition-colors duration-300"></span>
                                </p>
                                <p class="text-sm text-gray-600 dark:text-gray-400 transition-colors duration-300 mt-1">
                                    Current status: 
                                    <span x-show="currentStatus == 'New'" class="px-2 py-0.5 text-xs font-medium rounded-full bg-blue-100 dark:bg-blue-900 text-blue-800 dark:text-blue-300 transition-colors duration-300">New</span>
                                    <span x-show="currentStatus == 'Shortlisted'" class="px-2 py-0.5 text-xs font-medium rounded-full bg-yellow-100 dark:bg-yellow-900 text-yellow-800 dark:text-yellow-300 transition-colors duration-300">Shortlisted</span>
                                    <span x-show="currentStatus == 'For Interview'" class="px-2 py-0.5 text-xs font-medium rounded-full bg-yellow-100 dark:bg-yellow-900 text-yellow-800 dark:text-yellow-300 transition-colors duration-300">For Interview</span>
                                    <span x-show="currentStatus == 'For Assessment'" class="px-2 py-0.5 text-xs font-medium rounded-full bg-yellow-100 dark:bg-yellow-900 text-yellow-800 dark:text-yellow-300 transition-colors duration-300">For Assessment</span>
                                    <span x-show="currentStatus == 'Waiting for Feedback'" class="px-2 py-0.5 text-xs font-medium rounded-full bg-yellow-100 dark:bg-yellow-900 text-yellow-800 dark:text-yellow-300 transition-colors duration-300">Waiting for Feedback</span>
                                    <span x-show="currentStatus == 'Waiting for Job Offer'" class="px-2 py-0.5 text-xs font-medium rounded-full bg-yellow-100 dark:bg-yellow-900 text-yellow-800 dark:text-yellow-300 transition-colors duration-300">Waiting for Job Offer</span>
                                    <span x-show="currentStatus == 'Hired'" class="px-2 py-0.5 text-xs font-medium rounded-full bg-green-100 dark:bg-green-900 text-green-800 dark:text-green-300 transition-colors duration-300">Hired</span>
                                    <span x-show="currentStatus == 'Rejected'" class="px-2 py-0.5 text-xs font-medium rounded-full bg-red-100 dark:bg-red-900 text-red-800 dark:text-red-300 transition-colors duration-300">Rejected</span>
                                    <span x-show="currentStatus == 'Decline'" class="px-2 py-0.5 text-xs font-medium rounded-full bg-red-100 dark:bg-red-900 text-red-800 dark:text-red-300 transition-colors duration-300">Decline</span>
                                </p>
                            </div>
                            
                          
                            
                            <div class="mb-6">
                                <label for="status" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2 transition-colors duration-300">
                                    New Status
                                </label>
                                <select 
                                    id="status"
                                    name="status" 
                                    x-model="newStatus" 
                                    class="w-full bg-gray-100 dark:bg-slate-700 border border-gray-300 dark:border-slate-600 rounded-lg py-2.5 px-4 text-gray-800 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500/50 transition-colors duration-300"
                                    required
                                >
                                    <option value="">Select Status</option>
                                    <option value="New">New</option>
                                    <option value="Shortlisted">Shortlisted</option>
                                    <option value="For Interview">For Interview</option>
                                    <option value="For Assessment">For Assessment</option>
                                    <option value="Waiting for Feedback">Waiting for Feedback</option>
                                    <option value="Waiting for Job Offer">Waiting for Job Offer</option>
                                    <option value="Hired">Hired</option>
                                    <option value="Rejected">Rejected</option>
                                    <option value="Decline">Decline</option>
                                </select>
                            </div>
                            
                            <div class="mb-6">
                                <label for="notes" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2 transition-colors duration-300">
                                    Notes (Optional)
                                </label>
                                <textarea 
                                    id="notes" 
                                    x-model="notes" 
                                    rows="3" 
                                    class="w-full bg-gray-100 dark:bg-slate-700 border border-gray-300 dark:border-slate-600 rounded-lg py-2.5 px-4 text-gray-800 dark:text-white placeholder-gray-500 dark:placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500/50 transition-colors duration-300"
                                    placeholder="Add any relevant notes about this status change..."
                                ></textarea>
                            </div>
                            
                            <div class="flex justify-end space-x-3">
                                <button 
                                    type="button" 
                                    @click="isOpen = false"
                                    class="px-4 py-2 text-sm font-medium text-gray-700 dark:text-gray-300 bg-gray-100 dark:bg-slate-700 rounded-lg hover:bg-gray-200 dark:hover:bg-slate-600 focus:outline-none focus:ring-2 focus:ring-gray-500/50 transition-colors duration-200"
                                >
                                    Cancel
                                </button>
                                <button 
                                    type="submit"
                                    class="px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500/50 transition-colors duration-200"
                                    :disabled="!newStatus"
                                >
                                    Update Status
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Send Email Modal -->
        <div 
            x-data="{ 
                isOpen: false, 
                applicantId: null, 
                applicantName: '', 
                applicantEmail: '',
                emailSubject: '',
                emailBody: '',
                showSuccessMessage: false,
                sendEmail() {                  
                    // Show success message
                    this.showSuccessMessage = true;
                    
                    // Auto-hide success message after 2 seconds
                    setTimeout(() => {
                        this.showSuccessMessage = false;
                        // Close the modal after showing success
                        setTimeout(() => {
                            this.isOpen = false;
                            // Reset form
                            this.emailSubject = '';
                            this.emailBody = '';
                        }, 500);
                    }, 2000);
                }
            }"
            x-show="isOpen"
            @open-email-modal.window="
                isOpen = true; 
                applicantId = $event.detail.id;
                applicantName = $event.detail.name;
                applicantEmail = $event.detail.email;
            "
            @keydown.escape.window="isOpen = false"
            class="fixed inset-0 z-50 overflow-y-auto"
            style="display: none;"
            >
            <div class="flex items-center justify-center min-h-screen px-4">
                <!-- Overlay -->
                <div 
                    x-show="isOpen" 
                    x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0"
                    x-transition:enter-end="opacity-100"
                    x-transition:leave="transition ease-in duration-200"
                    x-transition:leave-start="opacity-100"
                    x-transition:leave-end="opacity-0"
                    @click="isOpen = false" 
                    class="fixed inset-0 bg-black bg-opacity-50"
                ></div>
                
                <!-- Modal -->
                <div 
                    x-show="isOpen" 
                    x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0 transform scale-95"
                    x-transition:enter-end="opacity-100 transform scale-100"
                    x-transition:leave="transition ease-in duration-200"
                    x-transition:leave-start="opacity-100 transform scale-100"
                    x-transition:leave-end="opacity-0 transform scale-95"
                    class="relative bg-white dark:bg-slate-800 rounded-lg max-w-2xl w-full mx-auto shadow-xl transition-colors duration-300"
                >
                    <!-- Modal Header -->
                    <div class="px-6 py-4 border-b border-gray-200 dark:border-slate-700 transition-colors duration-300">
                        <h3 class="text-lg font-medium text-gray-900 dark:text-white transition-colors duration-300">
                            Send Email
                        </h3>
                        <button 
                            @click="isOpen = false" 
                            class="absolute top-4 right-4 text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-200 transition-colors duration-200"
                        >
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                    
                    <!-- Modal Body -->
                    <div class="px-6 py-4">
                        <form action="sendemailtoapplicant" method="POST">
                            <input type="hidden" x-model="applicantId">
                            
                            <div class="mb-4">
                                <p class="text-sm text-gray-600 dark:text-gray-400 transition-colors duration-300">
                                    Sending email to: <span x-text="applicantName" class="font-medium text-gray-900 dark:text-white transition-colors duration-300"></span>
                                </p>
                                <p class="text-sm text-gray-600 dark:text-gray-400 transition-colors duration-300 mt-1">
                                    Email address: <span x-text="applicantEmail" class="font-medium text-gray-900 dark:text-white transition-colors duration-300"></span>
                                </p>
                            </div>
                            
                           
                            <div class="mb-6">
                                <label for="email-subject" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2 transition-colors duration-300">
                                    Subject
                                </label>
                                <input 
                                    id="email-subject" 
                                    x-model="emailSubject" 
                                    type="text"
                                    placeholder="Enter subject"
                                    class="w-full bg-gray-100 dark:bg-slate-700 border border-gray-300 dark:border-slate-600 rounded-lg py-2.5 px-4 text-gray-800 dark:text-white placeholder-gray-500 dark:placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500/50 transition-colors duration-300"
                                    required
                                >
                            </div>
                            
                            <div class="mb-6">
                                <!-- Email Body -->
                                <label for="email-body" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2 transition-colors duration-300">
                                    Message
                                </label>
                                
                                <!-- Editor container -->
                                <div class="border border-gray-300 dark:border-slate-600 rounded-lg overflow-hidden transition-colors duration-300 mb-2">
                                    <!-- Toolbar -->
                                    <div id="email-toolbar" class="bg-gray-50 dark:bg-slate-700 border-b border-gray-300 dark:border-slate-600 p-2 flex flex-wrap gap-1 transition-colors duration-300">
                                        <!-- Text formatting -->
                                        <span class="ql-formats border-r border-gray-300 dark:border-slate-500 pr-2 mr-2">
                                            <button class="ql-bold text-gray-700 dark:text-white" title="Bold"></button>
                                            <button class="ql-italic text-gray-700 dark:text-white" title="Italic"></button>
                                            <button class="ql-underline text-gray-700 dark:text-white" title="Underline"></button>
                                        </span>

                                         <!-- Headers -->
                                        <span class="ql-formats border-r border-gray-300 dark:border-slate-500 pr-2 mr-2">
                                            <select class="ql-header bg-gray-100 dark:bg-slate-600 text-gray-800 dark:text-white border-gray-300 dark:border-slate-500">
                                                <option value="" selected>Normal</option>
                                                <option value="2">Heading</option>
                                                <option value="3">Subheading</option>
                                            </select>
                                        </span>
                                        
                                        <!-- Lists -->
                                        <span class="ql-formats border-r border-gray-300 dark:border-slate-500 pr-2 mr-2">
                                            <button class="ql-list text-gray-700 dark:text-white" value="ordered" title="Numbered List"></button>
                                            <button class="ql-list text-gray-700 dark:text-white" value="bullet" title="Bullet List"></button>
                                        </span>
                                        
                                        <!-- Alignment -->
                                        <span class="ql-formats border-r border-gray-300 dark:border-slate-500 pr-2 mr-2">
                                            <button class="ql-align text-gray-700 dark:text-white" value="" title="Align Left"></button>
                                            <button class="ql-align text-gray-700 dark:text-white" value="center" title="Align Center"></button>
                                            <button class="ql-align text-gray-700 dark:text-white" value="right" title="Align Right"></button>
                                        </span>
                                    </div>

                                    <!-- Quill Editor -->
                                    <div id="email-editor" class="bg-white dark:bg-slate-800 min-h-[200px] transition-colors duration-300"></div>
                                </div>
                                
                                <!-- Hidden textarea to store data -->
                                <input type="hidden" id="email-body-input" x-model="emailBody">
                            </div>
                            
                            <div class="flex justify-end space-x-3">
                                <button 
                                    type="button" 
                                    @click="isOpen = false"
                                    class="px-4 py-2 text-sm font-medium text-gray-700 dark:text-gray-300 bg-gray-100 dark:bg-slate-700 rounded-lg hover:bg-gray-200 dark:hover:bg-slate-600 focus:outline-none focus:ring-2 focus:ring-gray-500/50 transition-colors duration-200"
                                >
                                    Cancel
                                </button>
                                <button 
                                    type="submit"
                                    class="px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500/50 transition-colors duration-200"
                                    :disabled="!emailSubject || !emailBody"
                                >
                                    Send Email
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Forward to Client Confirmation Modal -->
        <div 
            x-data="{ 
                isOpen: false, 
                applicantId: null, 
                applicantName: '', 
                showSuccessMessage: false,
                forwardToClient() {
                    // Show success message
                    this.showSuccessMessage = true;
                    
                    // Auto-hide success message after 2 seconds
                    setTimeout(() => {
                        this.showSuccessMessage = false;
                        // Close the modal after showing success
                        setTimeout(() => {
                            this.isOpen = false;
                        }, 500);
                    }, 2000);
                }
            }"
            x-show="isOpen"
            @open-forward-modal.window="
                isOpen = true; 
                applicantId = $event.detail.id;
                applicantName = $event.detail.name;
            "
            @keydown.escape.window="isOpen = false"
            class="fixed inset-0 z-50 overflow-y-auto"
            style="display: none;"
        >
            <div class="flex items-center justify-center min-h-screen px-4">
                <!-- Overlay -->
                <div 
                    x-show="isOpen" 
                    x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0"
                    x-transition:enter-end="opacity-100"
                    x-transition:leave="transition ease-in duration-200"
                    x-transition:leave-start="opacity-100"
                    x-transition:leave-end="opacity-0"
                    @click="isOpen = false" 
                    class="fixed inset-0 bg-black bg-opacity-50"
                ></div>
                
                <!-- Modal -->
                <div 
                    x-show="isOpen" 
                    x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0 transform scale-95"
                    x-transition:enter-end="opacity-100 transform scale-100"
                    x-transition:leave="transition ease-in duration-200"
                    x-transition:leave-start="opacity-100 transform scale-100"
                    x-transition:leave-end="opacity-0 transform scale-95"
                    class="relative bg-white dark:bg-slate-800 rounded-lg max-w-md w-full mx-auto shadow-xl transition-colors duration-300"
                >
                    <!-- Modal Header -->
                    <div class="px-6 py-4 border-b border-gray-200 dark:border-slate-700 transition-colors duration-300">
                        <h3 class="text-lg font-medium text-gray-900 dark:text-white transition-colors duration-300">
                            Confirm Forward to Client
                        </h3>
                        <button 
                            @click="isOpen = false" 
                            class="absolute top-4 right-4 text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-200 transition-colors duration-200"
                        >
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                    
                    <!-- Modal Body -->
                    <div class="px-6 py-4">
                        <form action="forwardtoclient" method="POST">
                            @csrf
                            <input type="hidden" name="applicantid" x-model="applicantId">
                            
                            <div class="mb-6">
                                <div class="flex items-center mb-4 text-amber-600 dark:text-amber-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                                    </svg>
                                    <p class="font-medium">Confirmation Required</p>
                                </div>
                                
                                <p class="text-sm text-gray-600 dark:text-gray-400 transition-colors duration-300 mb-4">
                                    Are you sure you want to forward <span x-text="applicantName" class="font-medium text-gray-900 dark:text-white transition-colors duration-300"></span>'s application to the client? 
                                </p>
                                
                                <p class="text-sm text-gray-600 dark:text-gray-400 transition-colors duration-300">
                                    <strong>This action cannot be undone.</strong>
                                </p>
                            </div>
                            
                           
                            
                            <div class="flex justify-end space-x-3">
                                <button 
                                    type="button" 
                                    @click="isOpen = false"
                                    class="px-4 py-2 text-sm font-medium text-gray-700 dark:text-gray-300 bg-gray-100 dark:bg-slate-700 rounded-lg hover:bg-gray-200 dark:hover:bg-slate-600 focus:outline-none focus:ring-2 focus:ring-gray-500/50 transition-colors duration-200"
                                >
                                    Cancel
                                </button>
                                <button 
                                    type="submit"
                                    class="px-4 py-2 text-sm font-medium text-white bg-amber-600 rounded-lg hover:bg-amber-700 focus:outline-none focus:ring-2 focus:ring-amber-500/50 transition-colors duration-200"
                                >
                                    Forward Application
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Applicant Details Modal -->
    <div 
        x-data="{ 
            isOpen: false, 
            applicantId: null, 
            applicantName: '',
            applicantEmail: '',
            applicantJobTitle: '',
            applicantDepartment: '',
            applicantStatus: '',
            applicantDate: '',
            applicantTime: '',
            statusHistory: []
        }"
        x-show="isOpen"
        @open-applicant-modal.window="
            isOpen = true; 
            applicantId = $event.detail.id;
            applicantName = $event.detail.name;
            applicantEmail = $event.detail.email;
            applicantJobTitle = $event.detail.jobtitle;
            applicantDepartment = $event.detail.department;
            applicantStatus = $event.detail.status;
            applicantDate = $event.detail.date;
            applicantTime = $event.detail.time;
            // In a real implementation, you would fetch this data via AJAX
            statusHistory = [
                {status: 'New', date: '2 weeks ago', notes: 'Initial application received'},
                {status: 'Shortlisted', date: '10 days ago', notes: 'CV meets requirements'},
                {status: 'For Interview', date: '1 week ago', notes: 'Scheduled for interview on Friday'},
                {status: applicantStatus, date: '2 days ago', notes: ''}
            ];
        "
        @keydown.escape.window="isOpen = false"
        class="fixed inset-0 z-50 overflow-y-auto"
        style="display: none;"
    >
        <div class="flex items-center justify-center min-h-screen px-4">
            <!-- Overlay -->
            <div 
                x-show="isOpen" 
                x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100"
                x-transition:leave="transition ease-in duration-200"
                x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0"
                @click="isOpen = false" 
                class="fixed inset-0 bg-black bg-opacity-50"
            ></div>
            
            <!-- Modal -->
            <div 
                x-show="isOpen" 
                x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 transform scale-95"
                x-transition:enter-end="opacity-100 transform scale-100"
                x-transition:leave="transition ease-in duration-200"
                x-transition:leave-start="opacity-100 transform scale-100"
                x-transition:leave-end="opacity-0 transform scale-95"
                class="relative bg-white dark:bg-slate-800 rounded-lg max-w-3xl w-full mx-auto shadow-xl transition-colors duration-300"
            >
                <!-- Modal Header -->
                <div class="px-6 py-4 border-b border-gray-200 dark:border-slate-700 transition-colors duration-300 flex justify-between items-center">
                    <h3 class="text-lg font-medium text-gray-900 dark:text-white transition-colors duration-300">
                        Applicant Details
                    </h3>
                    <button 
                        @click="isOpen = false" 
                        class="text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-200 transition-colors duration-200"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
                
                <!-- Modal Body -->
                <div class="px-6 py-4">
                    <!-- Applicant Info Section -->
                    <div class="flex flex-col md:flex-row gap-6 mb-6">
                        <!-- Left Column - Basic Info -->
                        <div class="flex-1">
                            <div class="flex items-center mb-4">
                                <div class="h-16 w-16 rounded-full bg-gradient-to-br from-blue-400 to-indigo-400 flex items-center justify-center text-white text-xl font-medium">
                                    <span x-text="applicantName.split(' ')[0][0] + applicantName.split(' ')[applicantName.split(' ').length-1][0]"></span>
                                </div>
                                <div class="ml-4">
                                    <h4 class="text-xl font-medium text-gray-900 dark:text-white transition-colors duration-300" x-text="applicantName"></h4>
                                    <p class="text-gray-600 dark:text-gray-300 transition-colors duration-300" x-text="applicantEmail"></p>
                                </div>
                            </div>
                            
                            <div class="mt-6 space-y-4">
                                <div>
                                    <p class="text-sm font-medium text-gray-500 dark:text-gray-400 transition-colors duration-300">Applied Position</p>
                                    <p class="text-base text-gray-900 dark:text-white transition-colors duration-300" x-text="applicantJobTitle"></p>
                                </div>
                                <div>
                                    <p class="text-sm font-medium text-gray-500 dark:text-gray-400 transition-colors duration-300">Department</p>
                                    <p class="text-base text-gray-900 dark:text-white transition-colors duration-300" x-text="applicantDepartment"></p>
                                </div>
                                <div>
                                    <p class="text-sm font-medium text-gray-500 dark:text-gray-400 transition-colors duration-300">Application Date</p>
                                    <p class="text-base text-gray-900 dark:text-white transition-colors duration-300">
                                        <span x-text="applicantDate"></span>
                                        <span class="text-sm text-gray-500 dark:text-gray-400 transition-colors duration-300" x-text="'(' + applicantTime + ')'"></span>
                                    </p>
                                </div>
                                <div>
                                    <p class="text-sm font-medium text-gray-500 dark:text-gray-400 transition-colors duration-300">Current Status</p>
                                    <div class="mt-1">
                                        <template x-if="applicantStatus == 'New'">
                                            <span class="px-2.5 py-1 text-xs font-medium rounded-full bg-blue-100 dark:bg-blue-900 text-blue-800 dark:text-blue-300 transition-colors duration-300" x-text="applicantStatus"></span>
                                        </template>
                                        <template x-if="applicantStatus == 'Shortlisted' || applicantStatus == 'For Interview' || applicantStatus == 'For Assessment' || applicantStatus == 'Waiting for Feedback' || applicantStatus == 'Waiting for Job Offer'">
                                            <span class="px-2.5 py-1 text-xs font-medium rounded-full bg-yellow-100 dark:bg-yellow-900 text-yellow-800 dark:text-yellow-300 transition-colors duration-300" x-text="applicantStatus"></span>
                                        </template>
                                        <template x-if="applicantStatus == 'Hired'">
                                            <span class="px-2.5 py-1 text-xs font-medium rounded-full bg-green-100 dark:bg-green-900 text-green-800 dark:text-green-300 transition-colors duration-300" x-text="applicantStatus"></span>
                                        </template>
                                        <template x-if="applicantStatus == 'Rejected' || applicantStatus == 'Decline'">
                                            <span class="px-2.5 py-1 text-xs font-medium rounded-full bg-red-100 dark:bg-red-900 text-red-800 dark:text-red-300 transition-colors duration-300" x-text="applicantStatus"></span>
                                        </template>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Right Column - Status Timeline -->
                        <div class="flex-1">
                            <h4 class="text-lg font-medium text-gray-900 dark:text-white transition-colors duration-300 mb-4">Application Timeline</h4>
                            
                            <div class="relative pl-8 space-y-6 before:absolute before:top-0 before:bottom-0 before:left-[11px] before:w-0.5 before:bg-gray-200 dark:before:bg-slate-600 transition-colors duration-300">
                                <template x-for="(item, index) in statusHistory" :key="index">
                                    <div class="relative">
                                        <!-- Status dot -->
                                        <div class="absolute top-1 left-[-30px] h-5 w-5 rounded-full border-2 border-white dark:border-slate-800 transition-colors duration-300"
                                            :class="{
                                                'bg-blue-500': item.status === 'New',
                                                'bg-yellow-500': ['Shortlisted', 'For Interview', 'For Assessment', 'Waiting for Feedback', 'Waiting for Job Offer'].includes(item.status),
                                                'bg-green-500': item.status === 'Hired',
                                                'bg-red-500': ['Rejected', 'Decline'].includes(item.status)
                                            }">
                                        </div>
                                        
                                        <!-- Status content -->
                                        <div>
                                            <div class="flex justify-between items-center">
                                                <h5 class="text-sm font-medium text-gray-900 dark:text-white transition-colors duration-300" x-text="item.status"></h5>
                                                <span class="text-xs text-gray-500 dark:text-gray-400 transition-colors duration-300" x-text="item.date"></span>
                                            </div>
                                            <p class="text-sm text-gray-600 dark:text-gray-300 transition-colors duration-300 mt-1" x-text="item.notes"></p>
                                        </div>
                                    </div>
                                </template>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Tabs Section -->
                    <div x-data="{ activeTab: 'resume' }" class="mt-6">
                        <!-- Tab Headers -->
                        <div class="border-b border-gray-200 dark:border-slate-700 transition-colors duration-300">
                            <nav class="flex space-x-8">
                                <button 
                                    @click="activeTab = 'resume'" 
                                    :class="{'text-blue-600 dark:text-blue-400 border-blue-600 dark:border-blue-400': activeTab === 'resume',
                                            'text-gray-500 dark:text-gray-400 border-transparent hover:text-gray-700 dark:hover:text-gray-300 hover:border-gray-300 dark:hover:border-gray-600': activeTab !== 'resume'}"
                                    class="py-3 px-1 border-b-2 font-medium text-sm transition-colors duration-200"
                                >
                                    Resume
                                </button>
                                <button 
                                    @click="activeTab = 'notes'" 
                                    :class="{'text-blue-600 dark:text-blue-400 border-blue-600 dark:border-blue-400': activeTab === 'notes',
                                            'text-gray-500 dark:text-gray-400 border-transparent hover:text-gray-700 dark:hover:text-gray-300 hover:border-gray-300 dark:hover:border-gray-600': activeTab !== 'notes'}"
                                    class="py-3 px-1 border-b-2 font-medium text-sm transition-colors duration-200"
                                >
                                    Notes
                                </button>
                                <button 
                                    @click="activeTab = 'assessments'" 
                                    :class="{'text-blue-600 dark:text-blue-400 border-blue-600 dark:border-blue-400': activeTab === 'assessments',
                                            'text-gray-500 dark:text-gray-400 border-transparent hover:text-gray-700 dark:hover:text-gray-300 hover:border-gray-300 dark:hover:border-gray-600': activeTab !== 'assessments'}"
                                    class="py-3 px-1 border-b-2 font-medium text-sm transition-colors duration-200"
                                >
                                    Assessments
                                </button>
                            </nav>
                        </div>
                        
                        <!-- Tab Content -->
                        <div class="py-4">
                            <!-- Resume Tab -->
                            <div x-show="activeTab === 'resume'" class="space-y-4">
                                <p class="text-gray-600 dark:text-gray-300 transition-colors duration-300">
                                    Resume content would be loaded here.
                                </p>
                                <div class="flex space-x-3">
                                    <button class="px-3 py-1.5 bg-blue-100 dark:bg-blue-900 text-blue-700 dark:text-blue-300 rounded-md text-sm font-medium transition-colors duration-200">
                                        View Resume
                                    </button>
                                    <button class="px-3 py-1.5 bg-gray-100 dark:bg-slate-700 text-gray-700 dark:text-gray-300 rounded-md text-sm font-medium transition-colors duration-200">
                                        Download PDF
                                    </button>
                                </div>
                            </div>
                            
                            <!-- Notes Tab -->
                            <div x-show="activeTab === 'notes'" class="space-y-4" style="display: none;">
                                <div class="space-y-4">
                                    <!-- Note Form -->
                                    <div class="mb-4">
                                        <textarea placeholder="Add a note about this applicant..." class="w-full bg-gray-100 dark:bg-slate-700 border border-gray-300 dark:border-slate-600 rounded-lg p-3 text-gray-800 dark:text-white placeholder-gray-500 dark:placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500/50 transition-colors duration-300" rows="3"></textarea>
                                        <div class="flex justify-end mt-2">
                                            <button class="px-3 py-1.5 bg-blue-600 text-white rounded-md text-sm font-medium hover:bg-blue-700 transition-colors duration-200">
                                                Add Note
                                            </button>
                                        </div>
                                    </div>
                                    
                                    <!-- Notes List (Sample Only) -->
                                    <div class="space-y-4">
                                        <div class="bg-gray-50 dark:bg-slate-700/50 p-3 rounded-lg transition-colors duration-300">
                                            <div class="flex justify-between items-center mb-2">
                                                <span class="font-medium text-gray-900 dark:text-white transition-colors duration-300">John Doe</span>
                                                <span class="text-xs text-gray-500 dark:text-gray-400 transition-colors duration-300">3 days ago</span>
                                            </div>
                                            <p class="text-sm text-gray-600 dark:text-gray-300 transition-colors duration-300">
                                                Excellent technical skills. Phone screening went well. Recommend for an in-person interview.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Assessments Tab -->
                            <div x-show="activeTab === 'assessments'" class="space-y-4" style="display: none;">
                                <p class="text-gray-600 dark:text-gray-300 transition-colors duration-300">
                                    No assessment data available for this applicant yet.
                                </p>
                                <button class="px-3 py-1.5 bg-blue-600 text-white rounded-md text-sm font-medium hover:bg-blue-700 transition-colors duration-200">
                                    Send Assessment
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Modal Footer -->
                <div class="px-6 py-4 border-t border-gray-200 dark:border-slate-700 transition-colors duration-300 flex justify-end">
                    <div class="flex space-x-3">
                        <button 
                            @click="isOpen = false" 
                            class="px-4 py-2 text-sm font-medium text-gray-700 dark:text-gray-300 bg-gray-100 dark:bg-slate-700 rounded-lg hover:bg-gray-200 dark:hover:bg-slate-600 focus:outline-none focus:ring-2 focus:ring-gray-500/50 transition-colors duration-200"
                        >
                            Close
                        </button>
                        <button 
                            class="px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500/50 transition-colors duration-200"
                        >
                            Update Status
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('includes.footer')

<!-- Update Status script -->
<script>
    document.addEventListener('DOMContentLoaded', function() {

        const updateStatusLinks = document.querySelectorAll('.update-status-link');
        
        updateStatusLinks.forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                
                // Get applicant data
                const id = this.getAttribute('data-id');
                const name = this.getAttribute('data-name');
                const status = this.getAttribute('data-status');
                
                window.dispatchEvent(new CustomEvent('open-status-modal', {
                    detail: {
                        id: id,
                        name: name,
                        status: status
                    }
                }));
            });
        });
        
        document.querySelectorAll('tr').forEach(row => {
            const idElement = row.querySelector('.update-status-link');
            const statusElement = row.querySelector('[class*="rounded-full"]');
            
            if (idElement && statusElement) {
                const applicantId = idElement.getAttribute('data-id');
                if (applicantId) {
                    statusElement.setAttribute('data-applicant-id', applicantId);
                }
            }
        });
    });
</script>

<!-- Email modal script -->
<script src="https://cdn.quilljs.com/1.3.6/quill.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Quill Editor for Email Body
        var quillEmail = new Quill('#email-editor', {
            theme: 'snow',
            placeholder: 'Enter your message here...',
            modules: {
                toolbar: '#email-toolbar'
            }
        });

        // Store content in hidden input field on text change
        quillEmail.on('text-change', function() {
            const content = quillEmail.root.innerHTML;
            document.getElementById('email-body-input').value = content;
            
            const event = new Event('input', { bubbles: true });
            document.getElementById('email-body-input').dispatchEvent(event);
        });
        
        // Get all send email links
        const sendEmailLinks = document.querySelectorAll('.send-email-link');
        
        // Add click event to each link
        sendEmailLinks.forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                
                const id = this.getAttribute('data-id');
                const name = this.getAttribute('data-name');
                const email = this.getAttribute('data-email');
                
                window.dispatchEvent(new CustomEvent('open-email-modal', {
                    detail: {
                        id: id,
                        name: name,
                        email: email
                    }
                }));
            });
        });
        
        // Apply dark mode styling for Quill if needed
        function updateEmailQuillTheme() {
        const isDarkMode = document.documentElement.classList.contains('dark');
        const editorContainer = document.querySelector('#email-editor .ql-editor');
        
        if (editorContainer) {
            if (isDarkMode) {
                editorContainer.style.color = '#ffffff';
                editorContainer.style.backgroundColor = '#1e293b';
                
                // dark mode colors for toolbar icons
                const darkModeStyles = document.getElementById('quill-dark-mode-styles');
                if (!darkModeStyles) {
                    const stylesheet = document.createElement('style');
                    stylesheet.id = 'quill-dark-mode-styles';
                    stylesheet.textContent = `
                        /* Toolbar icons */
                        .ql-snow .ql-stroke {
                            stroke: white !important;
                        }
                        .ql-snow .ql-fill, .ql-snow .ql-stroke.ql-fill {
                            fill: white !important;
                        }
                        .ql-snow .ql-picker {
                            color: white !important;
                        }
                        .ql-snow .ql-picker-options {
                            background-color: #1e293b !important;
                            color: white !important;
                        }
                        .ql-toolbar.ql-snow .ql-picker.ql-expanded .ql-picker-label {
                            border-color: #475569 !important;
                        }
                        .ql-toolbar.ql-snow .ql-picker.ql-expanded .ql-picker-options {
                            border-color: #475569 !important;
                        }
                        .ql-container.ql-snow {
                            border-color: #475569 !important;
                        }
                        .ql-toolbar.ql-snow {
                            border-color: #475569 !important;
                        }
                        .ql-editor.ql-blank::before {
                            color: rgba(255, 255, 255, 0.6) !important;
                        }
                    `;
                    document.head.appendChild(stylesheet);
                }
            } else {
                editorContainer.style.color = '#1e293b';
                editorContainer.style.backgroundColor = '#ffffff';
                
                const darkModeStyles = document.getElementById('quill-dark-mode-styles');
                if (darkModeStyles) {
                    darkModeStyles.remove();
                }
            }
        }
    }
        
        setTimeout(updateEmailQuillTheme, 100);
        
        // Update theme when dark mode toggle is clicked
        const themeToggle = document.getElementById('themeToggle');
        if (themeToggle) {
            themeToggle.addEventListener('click', function() {
                setTimeout(updateEmailQuillTheme, 100);
            });
        }
    });
</script>

<!-- Forward to Client script -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const forwardClientLinks = document.querySelectorAll('.forward-client-link');
        
        forwardClientLinks.forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                
                const id = this.getAttribute('data-id');
                const name = this.getAttribute('data-name');
                
                window.dispatchEvent(new CustomEvent('open-forward-modal', {
                    detail: {
                        id: id,
                        name: name
                    }
                }));
            });
        });
    });
</script>

<!-- Applicant Details Modal Script -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Get all applicant rows
        const applicantRows = document.querySelectorAll('.applicant-row');
        
        // Add click event to each row
        applicantRows.forEach(row => {
            row.addEventListener('click', function(e) {
                // Prevent opening modal when clicking on action buttons
                if (e.target.closest('.relative') || e.target.closest('button') || e.target.closest('a')) {
                    return;
                }
                
                const id = this.getAttribute('data-id');
                const name = this.getAttribute('data-name');
                const email = this.getAttribute('data-email');
                const jobtitle = this.getAttribute('data-jobtitle');
                const department = this.getAttribute('data-department');
                const status = this.getAttribute('data-status');
                const date = this.getAttribute('data-date');
                const time = this.getAttribute('data-time');
                
                window.dispatchEvent(new CustomEvent('open-applicant-modal', {
                    detail: {
                        id: id,
                        name: name,
                        email: email,
                        jobtitle: jobtitle,
                        department: department,
                        status: status,
                        date: date,
                        time: time
                    }
                }));
            });
        });
    });
</script>