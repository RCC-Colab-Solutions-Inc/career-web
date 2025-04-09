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