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
        
        // Load timeline data AFTER setting the applicantId
        loadApplicantTimeline(applicantId);
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
                            <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-3">Application Timeline</h3>
                            <div id="applicant-timeline" class="bg-white dark:bg-slate-800 rounded-lg shadow border border-gray-200 dark:border-slate-700">
                                
                                <div class="flex justify-center items-center p-6">
                                    <svg class="animate-spin h-6 w-6 text-blue-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                    </svg>
                                    <span class="ml-2 text-gray-500">Loading timeline...</span>
                                </div>
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