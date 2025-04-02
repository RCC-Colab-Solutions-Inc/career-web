@include('includes.header')

<!-- Main Container -->
<div class="flex" id="main-container">
    
    @include('includes.side')
    
    <!-- Main Content -->
    <div class="flex-1 overflow-x-hidden overflow-y-auto transition-colors duration-300 bg-gray-50 dark:bg-slate-900">
        
        @include('includes.nav')
        
        <!-- Companies Content -->
        <main class="p-6">
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
            <div class="bg-white dark:bg-slate-800 rounded-xl shadow-md border border-gray-200 dark:border-slate-700 p-6 mb-8 transition-colors duration-300">
                <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-6">
                    
                    <!-- Search Box -->
                    <div class="relative flex-grow w-full">
                        <input 
                            type="text" 
                            placeholder="Search companies..." 
                            class="w-full bg-gray-100 dark:bg-slate-700 border border-gray-300 dark:border-slate-600 rounded-lg py-2.5 px-4 pl-10 text-gray-800 dark:text-white placeholder-gray-500 dark:placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500/50 transition-colors duration-300"
                        >
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500 dark:text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Companies List Table -->
            <div class="bg-white dark:bg-slate-800 rounded-xl shadow-md border border-gray-200 dark:border-slate-700 overflow-hidden transition-colors duration-300 mb-8">
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
            </div>
            
            <div class="flex justify-center mt-4">
                <nav class="flex items-center space-x-1">
                    <!-- Previous Page -->
                    @if ($companies->onFirstPage())
                        <span class="px-3 py-2 rounded-lg bg-gray-300 dark:bg-slate-600 text-gray-500 cursor-not-allowed">
                            &laquo;
                        </span>
                    @else
                        <a href="{{ $companies->previousPageUrl() }}" class="px-3 py-2 rounded-lg bg-gray-100 dark:bg-slate-700 text-gray-600 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-slate-600 transition-colors duration-200">
                            &laquo;
                        </a>
                    @endif

                    <!-- Page Numbers -->
                    @foreach ($companies->getUrlRange(1, $companies->lastPage()) as $page => $url)
                        @if ($page == $companies->currentPage())
                            <span class="px-3 py-2 rounded-lg bg-blue-600 dark:bg-blue-700 text-white">{{ $page }}</span>
                        @else
                            <a href="{{ $url }}" class="px-3 py-2 rounded-lg bg-gray-100 dark:bg-slate-700 text-gray-600 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-slate-600 transition-colors duration-200">{{ $page }}</a>
                        @endif
                    @endforeach

                    <!-- Next Page -->
                    @if ($companies->hasMorePages())
                        <a href="{{ $companies->nextPageUrl() }}" class="px-3 py-2 rounded-lg bg-gray-100 dark:bg-slate-700 text-gray-600 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-slate-600 transition-colors duration-200">
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

        <!-- Add Modal -->
            <div
            x-data="{ 
                    show: false,
                    id: null,
                    showSuccessMessage: false,
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
                        // Show success message
                        this.showSuccessMessage = true;
                        
                        // Auto-hide success message after 2 seconds
                        setTimeout(() => {
                            this.showSuccessMessage = false;
                            // Close the modal after showing success
                            setTimeout(() => {
                                this.close();
                                // Reset form (if needed)
                                document.getElementById('company_name').value = '';
                                document.getElementById('company_email').value = '';
                                document.getElementById('contact_name').value = '';
                                document.getElementById('contact_phone').value = '';
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
                                        class="w-full bg-gray-100 dark:bg-slate-700 border border-gray-300 dark:border-slate-600 rounded-lg py-2.5 px-4 text-gray-800 dark:text-white placeholder-gray-500 dark:placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500/50 transition-colors duration-300"
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

@include('includes.footer')