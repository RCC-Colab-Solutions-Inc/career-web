@include('includes.header')

<!-- Main Container -->
<div class="flex h-screen overflow-hidden transition-colors duration-300" id="main-container">
    
    @include('includes.side')
    
    <!-- Main Content -->
    <div class="flex-1 overflow-x-hidden overflow-y-auto transition-colors duration-300 bg-gray-50 dark:bg-slate-900">
        
        @include('includes.nav')
        
        <!-- Companies Content -->
        <main class="p-6">
            <!-- Page Title with Add New Company Button -->
            <div class="mb-8 flex justify-between items-center">
                <div>
                    <h1 class="text-2xl font-bold text-gray-800 dark:text-white transition-colors duration-300">Companies</h1>
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
                                    Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 dark:divide-slate-700">
                            <!-- Company 1 - Active -->
                            <tr class="hover:bg-gray-50 dark:hover:bg-slate-700/30 transition-colors duration-200">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="h-10 w-10 rounded-lg bg-gradient-to-br from-blue-400 to-indigo-400 flex items-center justify-center text-white font-medium">
                                            A
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900 dark:text-white transition-colors duration-300">
                                                Acme Corporation
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900 dark:text-white transition-colors duration-300">
                                    info@acme.com
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900 dark:text-white transition-colors duration-300">
                                        John Smith
                                    </div>
                                    <div class="text-xs text-gray-500 dark:text-gray-400 transition-colors duration-300">
                                        +63 912 345 6789
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-center">
                                    <div class="flex items-center justify-center space-x-3">
                                        <a href="#" class="p-1.5 bg-blue-100 dark:bg-blue-900/30 text-blue-600 dark:text-blue-400 rounded-lg hover:bg-blue-200 dark:hover:bg-blue-800/40 transition-colors duration-200" title="Edit">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                            </svg>
                                        </a>
                                        <div class="relative" x-data="{ open: false }">
                                            <button @click="open = !open" class="p-1.5 bg-gray-100 dark:bg-slate-700 text-gray-600 dark:text-gray-300 rounded-lg hover:bg-gray-200 dark:hover:bg-slate-600 transition-colors duration-200" title="More Options">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
                                                </svg>
                                            </button>

                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <!-- Company 2 - Active -->
                            <tr class="hover:bg-gray-50 dark:hover:bg-slate-700/30 transition-colors duration-200">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="h-10 w-10 rounded-lg bg-gradient-to-br from-purple-400 to-pink-400 flex items-center justify-center text-white font-medium">
                                            T
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900 dark:text-white transition-colors duration-300">
                                                TechHub Solutions
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900 dark:text-white transition-colors duration-300">
                                    hr@techhub.com
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900 dark:text-white transition-colors duration-300">
                                        Maria Santos
                                    </div>
                                    <div class="text-xs text-gray-500 dark:text-gray-400 transition-colors duration-300">
                                        +63 998 765 4321
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-center">
                                    <div class="flex items-center justify-center space-x-3">
                                        <a href="#" class="p-1.5 bg-blue-100 dark:bg-blue-900/30 text-blue-600 dark:text-blue-400 rounded-lg hover:bg-blue-200 dark:hover:bg-blue-800/40 transition-colors duration-200" title="Edit">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                            </svg>
                                        </a>
                                        <div class="relative" x-data="{ open: false }">
                                            <button @click="open = !open" class="p-1.5 bg-gray-100 dark:bg-slate-700 text-gray-600 dark:text-gray-300 rounded-lg hover:bg-gray-200 dark:hover:bg-slate-600 transition-colors duration-200" title="More Options">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
                                                </svg>
                                            </button>
                                            
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <!-- Company 3 - Inactive -->
                            <tr class="hover:bg-gray-50 dark:hover:bg-slate-700/30 transition-colors duration-200">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="h-10 w-10 rounded-lg bg-gradient-to-br from-green-400 to-emerald-400 flex items-center justify-center text-white font-medium">
                                            G
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900 dark:text-white transition-colors duration-300">
                                                Global Finance Inc
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900 dark:text-white transition-colors duration-300">
                                    careers@globalfinance.com
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900 dark:text-white transition-colors duration-300">
                                        Robert Johnson
                                    </div>
                                    <div class="text-xs text-gray-500 dark:text-gray-400 transition-colors duration-300">
                                        +63 917 555 1234
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-center">
                                    <div class="flex items-center justify-center space-x-3">
                                        <a href="#" class="p-1.5 bg-blue-100 dark:bg-blue-900/30 text-blue-600 dark:text-blue-400 rounded-lg hover:bg-blue-200 dark:hover:bg-blue-800/40 transition-colors duration-200" title="Edit">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                            </svg>
                                        </a>
                                        <div class="relative" x-data="{ open: false }">
                                            <button @click="open = !open" class="p-1.5 bg-gray-100 dark:bg-slate-700 text-gray-600 dark:text-gray-300 rounded-lg hover:bg-gray-200 dark:hover:bg-slate-600 transition-colors duration-200" title="More Options">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
                                                </svg>
                                            </button>
                                            
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            
            <!-- Pagination (Static) -->
            <div class="flex justify-between items-center">
                <!-- Pagination Info -->
                <div class="text-sm text-gray-600 dark:text-gray-400 transition-colors duration-300">
                    Showing 
                    <span class="font-medium text-gray-900 dark:text-white">1</span> 
                    to 
                    <span class="font-medium text-gray-900 dark:text-white">3</span> 
                    of 
                    <span class="font-medium text-gray-900 dark:text-white">3</span> results
                </div>

                <!-- Pagination Links -->
                <div class="flex justify-center">
                    <nav class="flex items-center space-x-1">
                        <!-- Previous Page (Disabled) -->
                        <span class="px-3 py-2 rounded-lg bg-gray-300 dark:bg-slate-600 text-gray-500 cursor-not-allowed">
                            &laquo;
                        </span>

                        <!-- Current Page -->
                        <span class="px-3 py-2 rounded-lg bg-blue-600 dark:bg-blue-700 text-white">1</span>
                        
                        <!-- Next Page (Disabled) -->
                        <span class="px-3 py-2 rounded-lg bg-gray-300 dark:bg-slate-600 text-gray-500 cursor-not-allowed">
                            &raquo;
                        </span>
                    </nav>
                </div>
            </div>
        </main>
        <div
    x-data="{ 
        show: false,
        id: null,
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
        <div class="px-6 py-4">
            <form>
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
            </form>
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
                class="px-4 py-2 bg-blue-600 hover:bg-blue-700 dark:bg-blue-700 dark:hover:bg-blue-600 text-white rounded-lg transition-colors duration-200 shadow-md"
            >
                Save Company
            </button>
        </div>
    </div>
</div>

@include('includes.footer')