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
        statusHistory: [],
        resumeInfo: {
            has_resume: false,
            resume_path: '',
            resume_type: ''
        }
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
        
        // Load timeline data
        loadApplicantTimeline(applicantId);
        
        // Load resume data
        loadApplicantResume(applicantId);
    "
    @resume-data-loaded.window="resumeInfo = $event.detail"
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
            class="relative bg-white dark:bg-slate-800 rounded-lg max-w-8xl w-full mx-auto shadow-xl transition-colors duration-300"
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
            
            <!-- Modal Body - Two Column Layout -->
            <div class="flex flex-col md:flex-row divide-y md:divide-y-0 md:divide-x divide-gray-200 dark:divide-slate-700">
                <!-- Left Column - Applicant Info -->
                <div class="w-full md:w-1/2 p-6">
                    <!-- Applicant Profile Header -->
                    <div class="mb-6 text-center">
                        <div class="h-20 w-20 rounded-full bg-gradient-to-br from-blue-400 to-indigo-400 flex items-center justify-center text-white text-2xl font-bold mx-auto mb-2">
                            <span x-text="applicantName.split(' ')[0][0] + applicantName.split(' ')[applicantName.split(' ').length-1][0]"></span>
                        </div>
                        <h4 class="text-xl font-bold text-gray-900 dark:text-white" x-text="applicantName"></h4>
                        <p class="text-gray-600 dark:text-gray-300" x-text="applicantEmail"></p>
                    </div>
                    
                    <div class="space-y-4">
                        <div>
                            <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Applied Position</p>
                            <p class="text-base font-medium text-gray-800 dark:text-white" x-text="applicantJobTitle"></p>
                        </div>
                        
                        <div>
                            <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Department</p>
                            <p class="text-base font-medium text-gray-800 dark:text-white" x-text="applicantDepartment"></p>
                        </div>
                        
                        <div>
                            <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Application Date</p>
                            <p class="text-base font-medium text-gray-800 dark:text-white" x-text="applicantDate"></p>
                            <p class="text-sm text-gray-500 dark:text-gray-400" x-text="'(' + applicantTime + ')'"></p>
                        </div>
                        
                        <div>
                            <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Current Status</p>
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
                    
                    <!-- Application Timeline -->
                    <div class="mt-8">
                        <h4 class="text-lg font-bold text-gray-800 dark:text-white mb-4 text-center">Application Timeline</h4>
                        <div id="applicant-timeline" class="border border-gray-200 dark:border-slate-700 rounded-lg max-h-64 overflow-y-auto">
                            <!-- Timeline will be loaded dynamically via JavaScript -->
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
                
                <!-- Right Column - Resume -->
                <div class="w-full md:w-1/2 p-6">
                    <h4 class="text-xl font-bold text-gray-800 dark:text-white mb-4 text-center">Resume</h4>
                    
                    <template x-if="resumeInfo.has_resume">
                        <div class="border border-gray-200 dark:border-slate-700 rounded-lg h-[700px] overflow-y-auto">
                            <iframe
                                :src="'/view-resume/' + applicantId"
                                class="w-full h-full"
                                style="border: none;"
                                title="Resume Preview"
                            ></iframe>
                        </div>
                    </template>
                    
                    <template x-if="!resumeInfo.has_resume">
                        <div class="border border-gray-200 dark:border-slate-700 rounded-lg h-96 overflow-y-auto flex flex-col items-center justify-center bg-gray-50 dark:bg-slate-700/30">
                            <div class="w-16 h-16 bg-gray-100 dark:bg-slate-700 rounded-full flex items-center justify-center mb-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                </svg>
                            </div>
                            <p class="text-gray-600 dark:text-gray-400 text-center">No resume available for this applicant.</p>
                        </div>
                    </template>
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
                </div>
            </div>
        </div>
    </div>
</div>