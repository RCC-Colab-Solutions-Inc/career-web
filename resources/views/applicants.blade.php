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
        <div class="relative flex-grow md:max-w-md">
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
                <option>Screening</option>
                <option>Interview</option>
                <option>Assessment</option>
                <option>Offered</option>
                <option>Hired</option>
                <option>Rejected</option>
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
                <tr class="hover:bg-gray-50 dark:hover:bg-slate-700/30 transition-colors duration-200">
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center">
                            <div class="h-10 w-10 rounded-full bg-gradient-to-br from-blue-400 to-indigo-400 flex items-center justify-center text-white font-medium">
                                KC
                            </div>
                            <div class="ml-4">
                                <div class="text-sm font-medium text-gray-900 dark:text-white transition-colors duration-300">Kent Cortiguerra</div>
                                <div class="text-sm text-gray-500 dark:text-gray-400 transition-colors duration-300">kent@example.com</div>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-900 dark:text-white transition-colors duration-300">Senior Frontend Developer</div>
                        <div class="text-xs text-gray-500 dark:text-gray-400 transition-colors duration-300">Engineering</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-500 dark:text-gray-300 transition-colors duration-300">March 13, 2025</div>
                        <div class="text-xs text-gray-500 dark:text-gray-400 transition-colors duration-300">2 hours ago</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap flex items-center justify-center">
                        <span class="px-2.5 py-1 text-xs font-medium rounded-full bg-green-100 dark:bg-green-900 text-green-800 dark:text-green-300 transition-colors duration-300">
                            Interview
                        </span>
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
                            
                            <!-- Applicant 2 -->
<tr class="hover:bg-gray-50 dark:hover:bg-slate-700/30 transition-colors duration-200">
    <td class="px-6 py-4 whitespace-nowrap">
        <div class="flex items-center">
            <div class="h-10 w-10 rounded-full bg-gradient-to-br from-purple-400 to-pink-400 flex items-center justify-center text-white font-medium">
                ER
            </div>
            <div class="ml-4">
                <div class="text-sm font-medium text-gray-900 dark:text-white transition-colors duration-300">Eljay Rosal</div>
                <div class="text-sm text-gray-500 dark:text-gray-400 transition-colors duration-300">eljay@example.com</div>
            </div>
        </div>
    </td>
    <td class="px-6 py-4 whitespace-nowrap">
        <div class="text-sm text-gray-900 dark:text-white transition-colors duration-300">UX/UI Designer</div>
        <div class="text-xs text-gray-500 dark:text-gray-400 transition-colors duration-300">Design</div>
    </td>
    <td class="px-6 py-4 whitespace-nowrap">
        <div class="text-sm text-gray-500 dark:text-gray-300 transition-colors duration-300">March 12, 2025</div>
        <div class="text-xs text-gray-500 dark:text-gray-400 transition-colors duration-300">1 day ago</div>
    </td>
    <td class="px-6 py-4 whitespace-nowrap flex items-center justify-center">
        <span class="px-2.5 py-1 text-xs font-medium rounded-full bg-blue-100 dark:bg-blue-900 text-blue-800 dark:text-blue-300 transition-colors duration-300">
            Screening
        </span>
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

<!-- Applicant 3 -->
<tr class="hover:bg-gray-50 dark:hover:bg-slate-700/30 transition-colors duration-200">
    <td class="px-6 py-4 whitespace-nowrap">
        <div class="flex items-center">
            <div class="h-10 w-10 rounded-full bg-gradient-to-br from-green-400 to-emerald-400 flex items-center justify-center text-white font-medium">
                JC
            </div>
            <div class="ml-4">
                <div class="text-sm font-medium text-gray-900 dark:text-white transition-colors duration-300">James Castillo</div>
                <div class="text-sm text-gray-500 dark:text-gray-400 transition-colors duration-300">james@example.com</div>
            </div>
        </div>
    </td>
    <td class="px-6 py-4 whitespace-nowrap">
        <div class="text-sm text-gray-900 dark:text-white transition-colors duration-300">IT Support Specialist</div>
        <div class="text-xs text-gray-500 dark:text-gray-400 transition-colors duration-300">IT</div>
    </td>
    <td class="px-6 py-4 whitespace-nowrap">
        <div class="text-sm text-gray-500 dark:text-gray-300 transition-colors duration-300">March 10, 2025</div>
        <div class="text-xs text-gray-500 dark:text-gray-400 transition-colors duration-300">3 days ago</div>
    </td>
    <td class="px-6 py-4 whitespace-nowrap flex items-center justify-center">
        <span class="px-2.5 py-1 text-xs font-medium rounded-full bg-purple-100 dark:bg-purple-900 text-purple-800 dark:text-purple-300 transition-colors duration-300">
            Assessment
        </span>
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

<!-- Applicant 4 -->
<tr class="hover:bg-gray-50 dark:hover:bg-slate-700/30 transition-colors duration-200">
    <td class="px-6 py-4 whitespace-nowrap">
        <div class="flex items-center">
            <div class="h-10 w-10 rounded-full bg-gradient-to-br from-red-400 to-orange-400 flex items-center justify-center text-white font-medium">
                KG
            </div>
            <div class="ml-4">
                <div class="text-sm font-medium text-gray-900 dark:text-white transition-colors duration-300">Kenneth Gaviola</div>
                <div class="text-sm text-gray-500 dark:text-gray-400 transition-colors duration-300">kenneth@example.com</div>
            </div>
        </div>
    </td>
    <td class="px-6 py-4 whitespace-nowrap">
        <div class="text-sm text-gray-900 dark:text-white transition-colors duration-300">Backend Developer</div>
        <div class="text-xs text-gray-500 dark:text-gray-400 transition-colors duration-300">Engineering</div>
    </td>
    <td class="px-6 py-4 whitespace-nowrap">
        <div class="text-sm text-gray-500 dark:text-gray-300 transition-colors duration-300">March 5, 2025</div>
        <div class="text-xs text-gray-500 dark:text-gray-400 transition-colors duration-300">1 week ago</div>
    </td>
    <td class="px-6 py-4 whitespace-nowrap flex items-center justify-center">
        <span class="px-2.5 py-1 text-xs font-medium rounded-full bg-yellow-100 dark:bg-yellow-900 text-yellow-800 dark:text-yellow-300 transition-colors duration-300">
            Offered
        </span>
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
                        </tbody>
                    </table>
                </div>
            </div>
            
            <!-- Pagination -->
            <div class="flex justify-between items-center">
                <div class="text-sm text-gray-600 dark:text-gray-400 transition-colors duration-300">
                    Showing <span class="font-medium text-gray-900 dark:text-white">1</span> to <span class="font-medium text-gray-900 dark:text-white">4</span> of <span class="font-medium text-gray-900 dark:text-white">16</span> results
                </div>
                
                <div class="flex justify-center">
                    <nav class="flex items-center space-x-1">
                        <a href="#" class="px-3 py-2 rounded-lg bg-gray-100 dark:bg-slate-700 text-gray-600 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-slate-600 transition-colors duration-200">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                            </svg>
                        </a>
                        <a href="#" class="px-3 py-2 rounded-lg bg-blue-600 dark:bg-blue-700 text-white transition-colors duration-200">1</a>
                        <a href="#" class="px-3 py-2 rounded-lg bg-gray-100 dark:bg-slate-700 text-gray-600 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-slate-600 transition-colors duration-200">2</a>
                        <a href="#" class="px-3 py-2 rounded-lg bg-gray-100 dark:bg-slate-700 text-gray-600 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-slate-600 transition-colors duration-200">3</a>
                        <span class="px-3 py-2 text-gray-500 dark:text-gray-400">...</span>
                        <a href="#" class="px-3 py-2 rounded-lg bg-gray-100 dark:bg-slate-700 text-gray-600 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-slate-600 transition-colors duration-200">6</a>
                        <a href="#" class="px-3 py-2 rounded-lg bg-gray-100 dark:bg-slate-700 text-gray-600 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-slate-600 transition-colors duration-200">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </a>
                    </nav>
                </div>
            </div>
        </main>
    </div>
</div>

@include('includes.script')

@include('includes.footer')