       <!-- Add Modal -->
       <div
       x-data="{ 
                show: false,
                id: null,
                showSuccessMessage: false,
                // New fields for the form
                company_name: '',
                company_email: '',
                contact_name: '',
                contact_phone: '',
                formatPhoneNumber() {
                    // Remove any non-digit characters except + 
                    let digits = this.contact_phone.replace(/[^\d+]/g, '');
                    
                    // If it doesn't start with +63, and it has digits
                    if (!digits.startsWith('+63') && digits.length > 0) {
                        // If it starts with 0, replace the leading 0 with +63
                        if (digits.startsWith('0')) {
                            digits = '+63' + digits.substring(1);
                        } else {
                            // Otherwise, just add +63 at the beginning
                            digits = '+63' + digits;
                        }
                        this.contact_phone = digits;
                    }
                },
                init() {
                    window.addEventListener('open-modal', (e) => {
                        if (e.detail.id === 'add-company-modal') {
                            this.show = true;
                            document.body.classList.add('overflow-hidden');
                        }
                    });
                },
                close() {
                    this.show = false;
                    document.body.classList.remove('overflow-hidden');
                },
                saveCompany() {
                    // Format phone number before submitting
                    this.formatPhoneNumber();
                    
                    // Show success message
                    this.showSuccessMessage = true;
                    
                    // Auto-hide success message after 2 seconds
                    setTimeout(() => {
                        this.showSuccessMessage = false;
                        // Close the modal after showing success
                        setTimeout(() => {
                            this.close();
                            // Reset form
                            this.company_name = '';
                            this.company_email = '';
                            this.contact_name = '';
                            this.contact_phone = '';
                        }, 300);
                    }, 2000);
                }
            }"
                x-show="show"
                x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100"
                x-transition:leave="transition ease-in duration-200"
                x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0"
                class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black bg-opacity-50"
                style="display: none;"
                @keydown.escape.window="close()"
            >
                <div 
                    @click.away="close()"
                    x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0 transform translate-y-4"
                    x-transition:enter-end="opacity-100 transform translate-y-0"
                    x-transition:leave="transition ease-in duration-200"
                    x-transition:leave-start="opacity-100 transform translate-y-0"
                    x-transition:leave-end="opacity-0 transform translate-y-4"
                    class="bg-white dark:bg-slate-800 rounded-xl shadow-xl w-full max-w-md mx-auto border border-gray-200 dark:border-slate-700 transition-colors duration-300"
                >
                    <!-- Modal Header -->
                    <div class="px-6 py-4 border-b border-gray-200 dark:border-slate-700">
                        <div class="flex items-center justify-between">
                            <h3 class="text-lg font-medium text-gray-900 dark:text-white transition-colors duration-300">
                                Add New Company
                            </h3>
                            <button @click="close()" class="text-gray-400 hover:text-gray-600 dark:hover:text-gray-200 transition-colors duration-300">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                    </div>
                    
                    <!-- Modal Body -->
                    <form action="add-company" method="POST">
                        <div class="px-6 py-4">
                            
                                @csrf
                                <!-- Company Name Field -->
                                <div class="mb-4">
                                    <label for="company_name" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1 transition-colors duration-300">
                                        Company Name
                                    </label>
                                    <input 
                                    type="text" 
                                    id="company_name" 
                                    name="company_name" 
                                    x-model="company_name"
                                    class="w-full bg-gray-100 dark:bg-slate-700 border border-gray-300 dark:border-slate-600 rounded-lg py-2.5 px-4 text-gray-800 dark:text-white placeholder-gray-500 dark:placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500/50 transition-colors duration-300"
                                    placeholder="Enter company name"
                                    required
                                >
                                </div>
                                
                                <!-- Email Field -->
                                <div class="mb-4">
                                    <label for="company_email" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1 transition-colors duration-300">
                                        Email
                                    </label>
                                    <input 
                                    type="email" 
                                    id="company_email" 
                                    name="company_email" 
                                    x-model="company_email"
                                    class="w-full bg-gray-100 dark:bg-slate-700 border border-gray-300 dark:border-slate-600 rounded-lg py-2.5 px-4 text-gray-800 dark:text-white placeholder-gray-500 dark:placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500/50 transition-colors duration-300"
                                    placeholder="Enter company email"
                                    required
                                >
                                </div>
                                
                                <!-- Contact Name Field -->
                                <div class="mb-4">
                                    <label for="contact_name" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1 transition-colors duration-300">
                                        Contact Name
                                    </label>
                                    <input 
                                    type="text" 
                                    id="contact_name" 
                                    name="contact_name" 
                                    x-model="contact_name"
                                    class="w-full bg-gray-100 dark:bg-slate-700 border border-gray-300 dark:border-slate-600 rounded-lg py-2.5 px-4 text-gray-800 dark:text-white placeholder-gray-500 dark:placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500/50 transition-colors duration-300"
                                    placeholder="Enter contact person's name"
                                    required
                                >
                                </div>
                                
                                <!-- Contact Phone Field -->
                                <div class="mb-4">
                                    <label for="contact_phone" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1 transition-colors duration-300">
                                        Contact Phone
                                    </label>
                                    <input 
                                    type="tel" 
                                    id="contact_phone" 
                                    name="contact_phone" 
                                    x-model="contact_phone"
                                    @blur="formatPhoneNumber()"
                                    pattern="[0-9+\s()-]+"
                                    title="Phone number must contain only numbers, spaces, and the following characters: + - ( )"
                                    class="w-full bg-gray-100 dark:bg-slate-700 border border-gray-300 dark:border-slate-600 rounded-lg py-2.5 px-4 text-gray-800 dark:text-white placeholder-gray-500 dark:placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500/50 transition-colors duration-300"
                                    placeholder="+63 XXX XXX XXXX"
                                >
                                </div>

                                <!-- Success Message -->
                            
                            
                        </div>
                    
                        <!-- Modal Footer -->
                        <div class="px-6 py-4 border-t border-gray-200 dark:border-slate-700 flex justify-end space-x-3">
                            <button 
                                @click="close()" 
                                class="px-4 py-2 bg-gray-200 hover:bg-gray-300 dark:bg-slate-700 dark:hover:bg-slate-600 text-gray-800 dark:text-gray-200 rounded-lg transition-colors duration-200"
                            >
                                Cancel
                            </button>
                            <button 
                                @click="saveCompany()"
                                class="px-4 py-2 bg-blue-600 hover:bg-blue-700 dark:bg-blue-700 dark:hover:bg-blue-600 text-white rounded-lg transition-colors duration-200 shadow-md"
                            >
                                Save Company
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        <!-- Edit Modal -->
            <div
            x-data="{ 
            show: false,
            showSuccessMessage: false,
            company: {
                id: null,
                name: '',
                email: '',
                contact_name: '',
                contact_phone: ''
            },
            formatPhoneNumber() {
                // Remove any non-digit characters except + 
                let digits = this.company.contact_phone.replace(/[^\d+]/g, '');
                
                // If it doesn't start with +63, and it has digits
                if (!digits.startsWith('+63') && digits.length > 0) {
                    // If it starts with 0, replace the leading 0 with +63
                    if (digits.startsWith('0')) {
                        digits = '+63' + digits.substring(1);
                    } else {
                        // Otherwise, just add +63 at the beginning
                        digits = '+63' + digits;
                    }
                    this.company.contact_phone = digits;
                }
            },
            init() {
                window.addEventListener('open-modal', (e) => {
                    if (e.detail.id === 'edit-company-modal') {
                        this.company = e.detail.company;
                        this.show = true;
                        document.body.classList.add('overflow-hidden');
                    }
                });
            },
            close() {
                this.show = false;
                document.body.classList.remove('overflow-hidden');
            },
            updateCompany() {
                // Format phone number before submitting
                this.formatPhoneNumber();
                
                // Show success message
                this.showSuccessMessage = true;
                
                // Auto-hide success message after 2 seconds
                setTimeout(() => {
                    this.showSuccessMessage = false;
                    // Close the modal after showing success
                    setTimeout(() => {
                        this.close();
                    }, 300);
                }, 2000);
            }
        }"
                x-show="show"
                x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100"
                x-transition:leave="transition ease-in duration-200"
                x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0"
                class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black bg-opacity-50"
                style="display: none;"
                @keydown.escape.window="close()"
            >
                <div 
                    @click.away="close()"
                    x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0 transform translate-y-4"
                    x-transition:enter-end="opacity-100 transform translate-y-0"
                    x-transition:leave="transition ease-in duration-200"
                    x-transition:leave-start="opacity-100 transform translate-y-0"
                    x-transition:leave-end="opacity-0 transform translate-y-4"
                    class="bg-white dark:bg-slate-800 rounded-xl shadow-xl w-full max-w-md mx-auto border border-gray-200 dark:border-slate-700 transition-colors duration-300"
                >
                    <!-- Modal Header -->
                    <div class="px-6 py-4 border-b border-gray-200 dark:border-slate-700">
                        <div class="flex items-center justify-between">
                            <h3 class="text-lg font-medium text-gray-900 dark:text-white transition-colors duration-300">
                                Edit Company
                            </h3>
                            <button @click="close()" class="text-gray-400 hover:text-gray-600 dark:hover:text-gray-200 transition-colors duration-300">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                    </div>
                    
                    <!-- Modal Body -->
                    <form action="edit-company" method="POST">
                        <div class="px-6 py-4">
                            
                                @csrf
                                <input type="hidden" name="company_id" x-model="company.id">
                                <!-- Company Name Field -->
                                <div class="mb-4">
                                    <label for="edit_company_name" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1 transition-colors duration-300">
                                        Company Name
                                    </label>
                                    <input 
                                        type="text" 
                                        id="edit_company_name" 
                                        name="company_name" 
                                        x-model="company.name"
                                        class="w-full bg-gray-100 dark:bg-slate-700 border border-gray-300 dark:border-slate-600 rounded-lg py-2.5 px-4 text-gray-800 dark:text-white placeholder-gray-500 dark:placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500/50 transition-colors duration-300"
                                        required
                                    >
                                </div>
                                
                                <!-- Email Field -->
                                <div class="mb-4">
                                    <label for="edit_company_email" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1 transition-colors duration-300">
                                        Email
                                    </label>
                                    <input 
                                        type="email" 
                                        id="edit_company_email" 
                                        name="company_email" 
                                        x-model="company.email"
                                        class="w-full bg-gray-100 dark:bg-slate-700 border border-gray-300 dark:border-slate-600 rounded-lg py-2.5 px-4 text-gray-800 dark:text-white placeholder-gray-500 dark:placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500/50 transition-colors duration-300"
                                        required
                                    >
                                </div>
                                
                                <!-- Contact Name Field -->
                                <div class="mb-4">
                                    <label for="edit_contact_name" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1 transition-colors duration-300">
                                        Contact Name
                                    </label>
                                    <input 
                                        type="text" 
                                        id="edit_contact_name" 
                                        name="contact_name" 
                                        x-model="company.contact_name"
                                        class="w-full bg-gray-100 dark:bg-slate-700 border border-gray-300 dark:border-slate-600 rounded-lg py-2.5 px-4 text-gray-800 dark:text-white placeholder-gray-500 dark:placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500/50 transition-colors duration-300"
                                        required
                                    >
                                </div>
                                
                                <!-- Contact Phone Field -->
                                <div class="mb-4">
                                    <label for="edit_contact_phone" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1 transition-colors duration-300">
                                        Contact Phone
                                    </label>
                                    <input 
                                    type="tel" 
                                    id="edit_contact_phone" 
                                    name="contact_phone" 
                                    x-model="company.contact_phone"
                                    @blur="formatPhoneNumber()"
                                    pattern="[0-9+\s()-]+"
                                    title="Phone number must contain only numbers, spaces, and the following characters: + - ( )"
                                    class="w-full bg-gray-100 dark:bg-slate-700 border border-gray-300 dark:border-slate-600 rounded-lg py-2.5 px-4 text-gray-800 dark:text-white placeholder-gray-500 dark:placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500/50 transition-colors duration-300"
                                    placeholder="+63 XXX XXX XXXX"
                                >
                                </div>

                                <!-- Success Message -->
                            
                            
                        </div>
                        
                        <!-- Modal Footer -->
                        <div class="px-6 py-4 border-t border-gray-200 dark:border-slate-700 flex justify-end space-x-3">
                            
                            <button 
                                @click="updateCompany()"
                                class="px-4 py-2 bg-blue-600 hover:bg-blue-700 dark:bg-blue-700 dark:hover:bg-blue-600 text-white rounded-lg transition-colors duration-200 shadow-md"
                            >
                                Update Company
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Status Change Confirmation Modal -->
            <div
                x-data="{ 
                    show: false,
                    companyId: null,
                    companyName: '',
                    activating: false,
                    init() {
                        window.addEventListener('open-status-confirm', (e) => {
                            this.companyId = e.detail.id;
                            this.companyName = e.detail.name;
                            this.activating = e.detail.activating;
                            this.show = true;
                            document.body.classList.add('overflow-hidden');
                        });
                    },
                    close() {
                        this.show = false;
                        document.body.classList.remove('overflow-hidden');
                    },
                    confirmStatusChange() {
                        // Dispatch an event that the status toggle components will listen for
                        window.dispatchEvent(new CustomEvent('status-confirmed', {
                            detail: {
                                id: this.companyId,
                                activate: this.activating
                            }
                        }));
                        
                        // Close the modal
                        this.close();
                    }
                }"
                x-show="show"
                x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100"
                x-transition:leave="transition ease-in duration-200"
                x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0"
                class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black bg-opacity-50"
                style="display: none;"
                @keydown.escape.window="close()"
            >
                <div 
                    @click.away="close()"
                    x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0 transform translate-y-4"
                    x-transition:enter-end="opacity-100 transform translate-y-0"
                    x-transition:leave="transition ease-in duration-200"
                    x-transition:leave-start="opacity-100 transform translate-y-0"
                    x-transition:leave-end="opacity-0 transform translate-y-4"
                    class="bg-white dark:bg-slate-800 rounded-xl shadow-xl w-full max-w-md mx-auto border border-gray-200 dark:border-slate-700 transition-colors duration-300"
                >
                    <!-- Modal Header -->
                    <div class="px-6 py-4 border-b border-gray-200 dark:border-slate-700">
                        <div class="flex items-center justify-between">
                            <h3 class="text-lg font-medium text-gray-900 dark:text-white transition-colors duration-300">
                                <span x-text="activating ? 'Activate' : 'Deactivate'"></span> Company
                            </h3>
                            <button @click="close()" class="text-gray-400 hover:text-gray-600 dark:hover:text-gray-200 transition-colors duration-300">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                    </div>
                    
                    <!-- Modal Body -->
                    <div class="px-6 py-4">
                        <p class="text-gray-700 dark:text-gray-300">
                            Are you sure you want to <span x-text="activating ? 'activate' : 'deactivate'"></span> <span class="font-semibold" x-text="companyName"></span>?
                        </p>
                        <div x-show="!activating" class="mt-3 text-sm text-red-600 dark:text-red-400">
                            <p>This will make the company inactive and hide it from job listings.</p>
                        </div>
                        <div x-show="activating" class="mt-3 text-sm text-green-600 dark:text-green-400">
                            <p>This will make the company active and visible in job listings.</p>
                        </div>
                    </div>
                    
                    <!-- Modal Footer -->
                    <div class="px-6 py-4 border-t border-gray-200 dark:border-slate-700 flex justify-end space-x-3">
                        <button 
                            @click="close()" 
                            class="px-4 py-2 bg-gray-200 hover:bg-gray-300 dark:bg-slate-700 dark:hover:bg-slate-600 text-gray-800 dark:text-gray-200 rounded-lg transition-colors duration-200"
                        >
                            Cancel
                        </button>
                        <button 
                            @click="confirmStatusChange()"
                            :class="activating ? 
                                'bg-green-600 hover:bg-green-700 dark:bg-green-700 dark:hover:bg-green-600' : 
                                'bg-red-600 hover:bg-red-700 dark:bg-red-700 dark:hover:bg-red-600'"
                            class="px-4 py-2 text-white rounded-lg transition-colors duration-200 shadow-md"
                        >
                            <span x-text="activating ? 'Activate' : 'Deactivate'"></span>
                        </button>
                    </div>
                </div>
            </div>