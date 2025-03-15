@include('includes.header')

<!-- Main Container -->
<div class="flex h-screen overflow-hidden transition-colors duration-300" id="main-container">
    
   @include('includes.side')
    
    <!-- Main Content -->
    <div class="flex-1 overflow-x-hidden overflow-y-auto transition-colors duration-300 bg-slate-50 dark:bg-slate-900" id="content-area">
        
    @include('includes.nav')
        
        <!-- Dashboard Content -->
        <main class="p-6 transition-colors duration-300">
            <!-- Page Title -->
            <div class="mb-8">
                <h1 class="text-2xl font-bold text-slate-800 dark:text-white transition-colors duration-300">Dashboard</h1>
                <p class="text-slate-600 dark:text-blue-200/70 transition-colors duration-300">Welcome back, Kent Cortiguerra</p>
            </div>
            
            <!-- Stats Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <!-- Total Jobs Card -->
                <div class="bg-white dark:bg-gradient-to-br dark:from-blue-900/80 dark:to-blue-950/90 rounded-xl shadow-lg border border-slate-200 dark:border-blue-800/50 backdrop-blur-sm p-6 transition-colors duration-300">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-slate-500 dark:text-blue-200/90 text-sm font-medium transition-colors duration-300">Total Jobs</p>
                            <h2 class="text-3xl font-bold text-slate-800 dark:text-white mt-1 transition-colors duration-300">128</h2>
                        </div>
                        <div class="bg-blue-100 dark:bg-blue-600/30 p-3 rounded-full transition-colors duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-blue-600 dark:text-blue-100 transition-colors duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                        </div>
                    </div>
                    <div class="mt-4 flex items-center text-sm">
                       
                    </div>
                </div>
                
                <!-- Active Applicants Card -->
                <div class="bg-white dark:bg-gradient-to-br dark:from-indigo-900/80 dark:to-indigo-950/90 rounded-xl shadow-lg border border-slate-200 dark:border-indigo-800/50 backdrop-blur-sm p-6 transition-colors duration-300">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-slate-500 dark:text-blue-200/90 text-sm font-medium transition-colors duration-300">Active Applicants</p>
                            <h2 class="text-3xl font-bold text-slate-800 dark:text-white mt-1 transition-colors duration-300">256</h2>
                        </div>
                        <div class="bg-indigo-100 dark:bg-indigo-600/30 p-3 rounded-full transition-colors duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-indigo-600 dark:text-blue-100 transition-colors duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                        </div>
                    </div>
                    <div class="mt-4 flex items-center text-sm">
                       
                    </div>
                </div>
                
                <!-- New Applications Card -->
                <div class="bg-white dark:bg-gradient-to-br dark:from-purple-900/80 dark:to-purple-950/90 rounded-xl shadow-lg border border-slate-200 dark:border-purple-800/50 backdrop-blur-sm p-6 transition-colors duration-300">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-slate-500 dark:text-blue-200/90 text-sm font-medium transition-colors duration-300">New Applications</p>
                            <h2 class="text-3xl font-bold text-slate-800 dark:text-white mt-1 transition-colors duration-300">64</h2>
                        </div>
                        <div class="bg-purple-100 dark:bg-purple-600/30 p-3 rounded-full transition-colors duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-purple-600 dark:text-blue-100 transition-colors duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                        </div>
                    </div>
                    <div class="mt-4 flex items-center text-sm">
                        
                    </div>
                </div>
                
                <!-- Hired Candidates Card -->
                <div class="bg-white dark:bg-gradient-to-br dark:from-cyan-900/80 dark:to-cyan-950/90 rounded-xl shadow-lg border border-slate-200 dark:border-cyan-800/50 backdrop-blur-sm p-6 transition-colors duration-300">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-slate-500 dark:text-blue-200/90 text-sm font-medium transition-colors duration-300">Hired Candidates</p>
                            <h2 class="text-3xl font-bold text-slate-800 dark:text-white mt-1 transition-colors duration-300">42</h2>
                        </div>
                        <div class="bg-cyan-100 dark:bg-cyan-600/30 p-3 rounded-full transition-colors duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-cyan-600 dark:text-blue-100 transition-colors duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                    </div>
                    <div class="mt-4 flex items-center text-sm">
                       
                    </div>
                </div>
            </div>
            
            <!-- Enhanced Application Trends Chart (Full Width) -->
            <div class="bg-white dark:bg-slate-800/60 rounded-xl shadow-lg border border-slate-200 dark:border-slate-700/50 backdrop-blur-sm p-6 mb-8 transition-colors duration-300">
                <h3 class="text-lg font-semibold text-slate-800 dark:text-white mb-6 transition-colors duration-300">Application Trends</h3>
                <div class="relative h-96">
                    <!-- Enhanced Chart Visual -->
                    <div class="w-full h-full bg-slate-50 dark:bg-slate-800/90 rounded-lg p-4 transition-colors duration-300">
                        <!-- Axes and Labels -->
                        <div class="absolute left-0 top-0 bottom-0 w-12 flex flex-col justify-between text-xs text-slate-500 dark:text-blue-300 p-4 transition-colors duration-300">
                            <span>200</span>
                            <span>150</span>
                            <span>100</span>
                            <span>50</span>
                            <span>0</span>
                        </div>
                        
                        <!-- Chart Time Labels -->
                        <div class="absolute left-12 right-4 bottom-0 h-6 flex justify-between text-xs text-slate-500 dark:text-blue-300 transition-colors duration-300">
                            <span>Jan</span>
                            <span>Feb</span>
                            <span>Mar</span>
                            <span>Apr</span>
                            <span>May</span>
                            <span>Jun</span>
                            <span>Jul</span>
                            <span>Aug</span>
                            <span>Sep</span>
                            <span>Oct</span>
                            <span>Nov</span>
                            <span>Dec</span>
                        </div>
                        
                        <!-- Chart Grid Lines -->
<div class="absolute left-12 right-4 top-4 bottom-6 flex flex-col justify-between">
    <div class="border-b border-slate-200 dark:border-slate-600/50 w-full h-0 transition-colors duration-300"></div>
    <div class="border-b border-slate-200 dark:border-slate-600/50 w-full h-0 transition-colors duration-300"></div>
    <div class="border-b border-slate-200 dark:border-slate-600/50 w-full h-0 transition-colors duration-300"></div>
    <div class="border-b border-slate-200 dark:border-slate-600/50 w-full h-0 transition-colors duration-300"></div>
    <div class="border-b border-slate-200 dark:border-slate-600/50 w-full h-0 transition-colors duration-300"></div>
</div>
                        
                        <!-- Bar Chart Elements -->
                        <div class="absolute left-16 right-8 bottom-6 flex justify-between items-end h-64">
    <div class="w-4 h-20 bg-blue-400 dark:bg-blue-500 rounded-t hover:bg-blue-500 dark:hover:bg-blue-400 transition-all duration-200 cursor-pointer"></div>
    <div class="w-4 h-20 bg-blue-400 dark:bg-blue-500 rounded-t hover:bg-blue-500 dark:hover:bg-blue-400 transition-all duration-200 cursor-pointer"></div>
    <div class="w-4 h-20 bg-blue-400 dark:bg-blue-500 rounded-t hover:bg-blue-500 dark:hover:bg-blue-400 transition-all duration-200 cursor-pointer"></div>
    <div class="w-4 h-20 bg-blue-400 dark:bg-blue-500 rounded-t hover:bg-blue-500 dark:hover:bg-blue-400 transition-all duration-200 cursor-pointer"></div>
    <div class="w-4 h-20 bg-blue-400 dark:bg-blue-500 rounded-t hover:bg-blue-500 dark:hover:bg-blue-400 transition-all duration-200 cursor-pointer"></div>
    <div class="w-4 h-20 bg-blue-400 dark:bg-blue-500 rounded-t hover:bg-blue-500 dark:hover:bg-blue-400 transition-all duration-200 cursor-pointer"></div>
    <div class="w-4 h-20 bg-blue-400 dark:bg-blue-500 rounded-t hover:bg-blue-500 dark:hover:bg-blue-400 transition-all duration-200 cursor-pointer"></div>
    <div class="w-4 h-20 bg-blue-400 dark:bg-blue-500 rounded-t hover:bg-blue-500 dark:hover:bg-blue-400 transition-all duration-200 cursor-pointer"></div>
    <div class="w-4 h-20 bg-blue-400 dark:bg-blue-500 rounded-t hover:bg-blue-500 dark:hover:bg-blue-400 transition-all duration-200 cursor-pointer"></div>
    <div class="w-4 h-20 bg-blue-400 dark:bg-blue-500 rounded-t hover:bg-blue-500 dark:hover:bg-blue-400 transition-all duration-200 cursor-pointer"></div>
    <div class="w-4 h-20 bg-blue-400 dark:bg-blue-500 rounded-t hover:bg-blue-500 dark:hover:bg-blue-400 transition-all duration-200 cursor-pointer"></div>
    <div class="w-4 h-20 bg-blue-400 dark:bg-blue-500 rounded-t hover:bg-blue-500 dark:hover:bg-blue-400 transition-all duration-200 cursor-pointer"></div>
                        </div>
                        
                        <!-- Line Chart -->
                        <svg class="absolute left-16 right-8 bottom-6 h-64" preserveAspectRatio="none" viewBox="0 0 1200 400">
                            
                            <!-- Gradient Definition -->
                            <defs>
                                <linearGradient id="applicationGradient" x1="0%" y1="0%" x2="0%" y2="100%">
                                    <stop offset="0%" stop-color="rgba(99, 102, 241, 0.6)"></stop>
                                    <stop offset="100%" stop-color="rgba(99, 102, 241, 0)"></stop>
                                </linearGradient>
                            </defs>
                        </svg>
                        
                        <!-- Chart Legend -->
                        <div class="absolute right-4 top-4 bg-white/80 dark:bg-slate-800/80 p-3 rounded-lg flex flex-col space-y-2 transition-colors duration-300">
                            <div class="flex items-center">
                                <div class="h-3 w-8 rounded bg-blue-400 dark:bg-blue-500/70 mr-2 transition-colors duration-300"></div>
                                <span class="text-slate-600 dark:text-blue-200 text-xs transition-colors duration-300">Applications</span>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Recent Jobs Section -->
            <div class="bg-white dark:bg-slate-800/60 rounded-xl shadow-lg border border-slate-200 dark:border-slate-700/50 backdrop-blur-sm p-6 mb-8 transition-colors duration-300">
                <div class="flex justify-between items-center mb-6">
                    <h3 class="text-lg font-semibold text-slate-800 dark:text-white transition-colors duration-300">Recent Job Listings</h3>
                    <a href="#" class="text-blue-600 dark:text-blue-400 text-sm hover:text-blue-800 dark:hover:text-blue-300 transition-colors duration-300">View All</a>
                </div>
                
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead>
                            <tr class="border-b border-slate-200 dark:border-slate-700 text-left transition-colors duration-300">
                                <th class="pb-3 text-slate-500 dark:text-blue-200 font-medium text-sm transition-colors duration-300">Position</th>
                                <th class="pb-3 text-slate-500 dark:text-blue-200 font-medium text-sm text-center transition-colors duration-300">Department</th>
                                <th class="pb-3 text-slate-500 dark:text-blue-200 font-medium text-sm text-center transition-colors duration-300">Location</th>
                                <th class="pb-3 text-slate-500 dark:text-blue-200 font-medium text-sm text-center transition-colors duration-300">Applications</th>
                                <th class="pb-3 text-slate-500 dark:text-blue-200 font-medium text-sm text-center transition-colors duration-300">Status</th>
                                <th class="pb-3 text-slate-500 dark:text-blue-200 font-medium text-sm text-center transition-colors duration-300">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="border-b border-slate-200 dark:border-slate-700/50 hover:bg-slate-50 dark:hover:bg-slate-700/20 transition-colors duration-200">
                                <td class="py-3 text-slate-800 dark:text-white transition-colors duration-300">Senior Frontend Developer</td>
                                <td class="py-3 text-slate-600 dark:text-blue-200 text-center transition-colors duration-300">Project Management</td>
                                <td class="py-3 text-slate-600 dark:text-blue-200 text-center transition-colors duration-300">Remote</td>
                                <td class="py-3 text-slate-600 dark:text-blue-200 text-center transition-colors duration-300">18</td>
                                <td class="py-3 text-center">
                                    <span class="px-2 py-1 text-xs font-medium rounded-full bg-green-100 text-green-800 dark:bg-green-500/20 dark:text-green-400 transition-colors duration-300">Active</span>
                                </td>
                                <td class="py-3 text-center">
                                    <div class="flex space-x-2 justify-center">
                                        <button class="p-1 text-slate-500 dark:text-blue-300 hover:text-slate-700 dark:hover:text-blue-100 transition-colors duration-300">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                            </svg>
                                        </button>
                                        <button class="p-1 text-slate-500 dark:text-blue-300 hover:text-slate-700 dark:hover:text-blue-100 transition-colors duration-300">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                            </svg>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr class="border-b border-slate-200 dark:border-slate-700/50 hover:bg-slate-50 dark:hover:bg-slate-700/20 transition-colors duration-200">
                                <td class="py-3 text-slate-800 dark:text-white transition-colors duration-300">UX/UI Designer</td>
                                <td class="py-3 text-slate-600 dark:text-blue-200 text-center transition-colors duration-300">Project Management</td>
                                <td class="py-3 text-slate-600 dark:text-blue-200 text-center transition-colors duration-300">Remote</td>
                                <td class="py-3 text-slate-600 dark:text-blue-200 text-center transition-colors duration-300">24</td>
                                <td class="py-3 text-center">
                                    <span class="px-2 py-1 text-xs font-medium rounded-full bg-green-100 text-green-800 dark:bg-green-500/20 dark:text-green-400 transition-colors duration-300">Active</span>
                                </td>
                                <td class="py-3 text-center">
                                    <div class="flex space-x-2 justify-center">
                                        <button class="p-1 text-slate-500 dark:text-blue-300 hover:text-slate-700 dark:hover:text-blue-100 transition-colors duration-300">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                            </svg>
                                        </button>
                                        <button class="p-1 text-slate-500 dark:text-blue-300 hover:text-slate-700 dark:hover:text-blue-100 transition-colors duration-300">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                            </svg>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr class="border-b border-slate-200 dark:border-slate-700/50 hover:bg-slate-50 dark:hover:bg-slate-700/20 transition-colors duration-200">
                                <td class="py-3 text-slate-800 dark:text-white transition-colors duration-300">IT Support</td>
                                <td class="py-3 text-slate-600 dark:text-blue-200 text-center transition-colors duration-300">Project Management</td>
                                <td class="py-3 text-slate-600 dark:text-blue-200 text-center transition-colors duration-300">Remote</td>
                                <td class="py-3 text-slate-600 dark:text-blue-200 text-center transition-colors duration-300">12</td>
                                <td class="py-3 text-center">
                                    <span class="px-2 py-1 text-xs font-medium rounded-full bg-yellow-100 text-yellow-800 dark:bg-yellow-500/20 dark:text-yellow-400 transition-colors duration-300">Reviewing</span>
                                </td>
                                <td class="py-3 text-center">
                                    <div class="flex space-x-2 justify-center">
                                        <button class="p-1 text-slate-500 dark:text-blue-300 hover:text-slate-700 dark:hover:text-blue-100 transition-colors duration-300">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                            </svg>
                                        </button>
                                        <button class="p-1 text-slate-500 dark:text-blue-300 hover:text-slate-700 dark:hover:text-blue-100 transition-colors duration-300">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                            </svg>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr class="hover:bg-slate-50 dark:hover:bg-slate-700/20 transition-colors duration-200">
                                <td class="py-3 text-slate-800 dark:text-white transition-colors duration-300">Backend Developer</td>
                                <td class="py-3 text-slate-600 dark:text-blue-200 text-center transition-colors duration-300">Project Management</td>
                                <td class="py-3 text-slate-600 dark:text-blue-200 text-center transition-colors duration-300">Remote</td>
                                <td class="py-3 text-slate-600 dark:text-blue-200 text-center transition-colors duration-300">9</td>
                                <td class="py-3 text-center">
                                    <span class="px-2 py-1 text-xs font-medium rounded-full bg-red-100 text-red-800 dark:bg-red-500/20 dark:text-red-400 transition-colors duration-300">Closed</span>
                                </td>
                                <td class="py-3 text-center">
                                    <div class="flex space-x-2 justify-center">
                                        <button class="p-1 text-slate-500 dark:text-blue-300 hover:text-slate-700 dark:hover:text-blue-100 transition-colors duration-300">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                            </svg>
                                        </button>
                                        <button class="p-1 text-slate-500 dark:text-blue-300 hover:text-slate-700 dark:hover:text-blue-100 transition-colors duration-300">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                            </svg>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            
            <!-- Recent Applications and Calendar Section -->
            <div class="grid grid-cols-1 lg:grid-cols-5 gap-6">
                <!-- Recent Applications -->
                <div class="lg:col-span-3 bg-white dark:bg-slate-800/60 rounded-xl shadow-lg border border-slate-200 dark:border-slate-700/50 backdrop-blur-sm p-6 transition-colors duration-300">
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-lg font-semibold text-slate-800 dark:text-white transition-colors duration-300">Recent Applications</h3>
                        <a href="#" class="text-blue-600 dark:text-blue-400 text-sm hover:text-blue-800 dark:hover:text-blue-300 transition-colors duration-300">View All</a>
                    </div>
                    
                    <div class="space-y-4">
                        <!-- Application 1 -->
                        <div class="flex items-center p-3 bg-slate-100 dark:bg-slate-700/30 rounded-lg hover:bg-slate-200 dark:hover:bg-slate-700/50 transition duration-200">
                            <div class="h-10 w-10 rounded-full bg-gradient-to-br from-blue-400 to-indigo-400 flex items-center justify-center text-white font-medium">JD</div>
                            <div class="ml-4 flex-1">
                                <h4 class="text-slate-800 dark:text-white font-medium transition-colors duration-300">Kent Cortiguerra</h4>
                                <p class="text-slate-600 dark:text-blue-200 text-sm transition-colors duration-300">Applied for Senior Frontend Developer</p>
                            </div>
                            <div class="text-right">
                                <span class="text-slate-500 dark:text-blue-200 text-sm transition-colors duration-300">2 hours ago</span>
                                <div class="flex mt-1 justify-end space-x-1">
                                    <button class="p-1 text-slate-500 dark:text-blue-300 hover:text-slate-700 dark:hover:text-blue-100 bg-white/70 dark:bg-slate-700/50 rounded transition-colors duration-300">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                        </svg>
                                    </button>
                                    <button class="p-1 text-slate-500 dark:text-blue-300 hover:text-slate-700 dark:hover:text-blue-100 bg-white/70 dark:bg-slate-700/50 rounded transition-colors duration-300">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Application 2 -->
                        <div class="flex items-center p-3 bg-slate-100 dark:bg-slate-700/30 rounded-lg hover:bg-slate-200 dark:hover:bg-slate-700/50 transition duration-200">
                            <div class="h-10 w-10 rounded-full bg-gradient-to-br from-purple-400 to-pink-400 flex items-center justify-center text-white font-medium">AS</div>
                            <div class="ml-4 flex-1">
                                <h4 class="text-slate-800 dark:text-white font-medium transition-colors duration-300">Eljay Rosal</h4>
                                <p class="text-slate-600 dark:text-blue-200 text-sm transition-colors duration-300">Applied for UX/UI Designer</p>
                            </div>
                            <div class="text-right">
                                <span class="text-slate-500 dark:text-blue-200 text-sm transition-colors duration-300">5 hours ago</span>
                                <div class="flex mt-1 justify-end space-x-1">
                                    <button class="p-1 text-slate-500 dark:text-blue-300 hover:text-slate-700 dark:hover:text-blue-100 bg-white/70 dark:bg-slate-700/50 rounded transition-colors duration-300">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                        </svg>
                                    </button>
                                    <button class="p-1 text-slate-500 dark:text-blue-300 hover:text-slate-700 dark:hover:text-blue-100 bg-white/70 dark:bg-slate-700/50 rounded transition-colors duration-300">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Application 3 -->
                        <div class="flex items-center p-3 bg-slate-100 dark:bg-slate-700/30 rounded-lg hover:bg-slate-200 dark:hover:bg-slate-700/50 transition duration-200">
                            <div class="h-10 w-10 rounded-full bg-gradient-to-br from-green-400 to-emerald-400 flex items-center justify-center text-white font-medium">RJ</div>
                            <div class="ml-4 flex-1">
                                <h4 class="text-slate-800 dark:text-white font-medium transition-colors duration-300">James Castillo</h4>
                                <p class="text-slate-600 dark:text-blue-200 text-sm transition-colors duration-300">Applied for IT Support</p>
                            </div>
                            <div class="text-right">
                                <span class="text-slate-500 dark:text-blue-200 text-sm transition-colors duration-300">Yesterday</span>
                                <div class="flex mt-1 justify-end space-x-1">
                                    <button class="p-1 text-slate-500 dark:text-blue-300 hover:text-slate-700 dark:hover:text-blue-100 bg-white/70 dark:bg-slate-700/50 rounded transition-colors duration-300">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                        </svg>
                                    </button>
                                    <button class="p-1 text-slate-500 dark:text-blue-300 hover:text-slate-700 dark:hover:text-blue-100 bg-white/70 dark:bg-slate-700/50 rounded transition-colors duration-300">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Calendar Section -->
                <div class="lg:col-span-2 bg-white dark:bg-slate-800/60 rounded-xl shadow-lg border border-slate-200 dark:border-slate-700/50 backdrop-blur-sm p-6 transition-colors duration-300">
                    <h3 class="text-lg font-semibold text-slate-800 dark:text-white mb-6 transition-colors duration-300">Upcoming Interviews</h3>
                    
                    <div class="flex items-center justify-between mb-4">
                        <button class="text-slate-500 dark:text-blue-300 hover:text-slate-700 dark:hover:text-blue-100 transition-colors duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                            </svg>
                        </button>
                        <h4 class="text-slate-600 dark:text-blue-100 font-medium transition-colors duration-300">March 2025</h4>
                        <button class="text-slate-500 dark:text-blue-300 hover:text-slate-700 dark:hover:text-blue-100 transition-colors duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </button>
                    </div>
                    
                    <!-- Calendar dates mock -->
                    <div class="grid grid-cols-7 gap-2 text-center mb-4">
                        <div class="text-slate-500 dark:text-blue-300 text-xs font-medium transition-colors duration-300">Su</div>
                        <div class="text-slate-500 dark:text-blue-300 text-xs font-medium transition-colors duration-300">Mo</div>
                        <div class="text-slate-500 dark:text-blue-300 text-xs font-medium transition-colors duration-300">Tu</div>
                        <div class="text-slate-500 dark:text-blue-300 text-xs font-medium transition-colors duration-300">We</div>
                        <div class="text-slate-500 dark:text-blue-300 text-xs font-medium transition-colors duration-300">Th</div>
                        <div class="text-slate-500 dark:text-blue-300 text-xs font-medium transition-colors duration-300">Fr</div>
                        <div class="text-slate-500 dark:text-blue-300 text-xs font-medium transition-colors duration-300">Sa</div>
                        
                        <!-- Previous Month -->
                        <div class="text-slate-400 dark:text-slate-500 text-sm py-1 transition-colors duration-300">25</div>
                        <div class="text-slate-400 dark:text-slate-500 text-sm py-1 transition-colors duration-300">26</div>
                        <div class="text-slate-400 dark:text-slate-500 text-sm py-1 transition-colors duration-300">27</div>
                        <div class="text-slate-400 dark:text-slate-500 text-sm py-1 transition-colors duration-300">28</div>
                        <div class="text-slate-400 dark:text-slate-500 text-sm py-1 transition-colors duration-300">29</div>
                        
                        <!-- Current Month -->
                        <div class="text-slate-600 dark:text-blue-200 text-sm py-1 transition-colors duration-300">1</div>
                        <div class="text-slate-600 dark:text-blue-200 text-sm py-1 transition-colors duration-300">2</div>
                        <div class="text-slate-600 dark:text-blue-200 text-sm py-1 transition-colors duration-300">3</div>
                        <div class="text-slate-600 dark:text-blue-200 text-sm py-1 transition-colors duration-300">4</div>
                        <div class="text-slate-600 dark:text-blue-200 text-sm py-1 transition-colors duration-300">5</div>
                        <div class="text-white text-sm py-1 rounded-full bg-blue-500 transition-colors duration-300">6</div>
                        <div class="text-slate-600 dark:text-blue-200 text-sm py-1 transition-colors duration-300">7</div>
                        <div class="text-slate-600 dark:text-blue-200 text-sm py-1 transition-colors duration-300">8</div>
                        <div class="text-white text-sm py-1 rounded-full bg-indigo-500 transition-colors duration-300">9</div>
                        <div class="text-slate-600 dark:text-blue-200 text-sm py-1 transition-colors duration-300">10</div>
                        <div class="text-slate-600 dark:text-blue-200 text-sm py-1 transition-colors duration-300">11</div>
                        <div class="text-slate-600 dark:text-blue-200 text-sm py-1 transition-colors duration-300">12</div>
                        <div class="text-slate-600 dark:text-blue-200 text-sm py-1 transition-colors duration-300">13</div>
                        <div class="text-slate-600 dark:text-blue-200 text-sm py-1 transition-colors duration-300">14</div>
                        <!-- And so on... -->
                    </div>
                    
                    <!-- Upcoming events -->
                    <div class="space-y-3 mt-6">
                        <div class="flex items-center p-2 bg-blue-50 dark:bg-blue-500/20 rounded-lg border-l-4 border-blue-500 transition-colors duration-300">
                            <div class="ml-2">
                                <h5 class="text-slate-800 dark:text-white text-sm font-medium transition-colors duration-300">Interview: Kenneth Gaviola</h5>
                                <p class="text-slate-600 dark:text-blue-200 text-xs transition-colors duration-300">March 6, 10:00 AM</p>
                            </div>
                        </div>
                        
                        <div class="flex items-center p-2 bg-indigo-50 dark:bg-indigo-500/20 rounded-lg border-l-4 border-indigo-500 transition-colors duration-300">
                            <div class="ml-2">
                                <h5 class="text-slate-800 dark:text-white text-sm font-medium transition-colors duration-300">Interview: Eljay Rosal</h5>
                                <p class="text-slate-600 dark:text-blue-200 text-xs transition-colors duration-300">March 9, 2:00 PM</p>
                            </div>
                        </div>
                        
                        <div class="flex items-center p-2 bg-slate-100 dark:bg-slate-700/30 rounded-lg border-l-4 border-slate-500 transition-colors duration-300">
                            <div class="ml-2">
                                <h5 class="text-slate-800 dark:text-white text-sm font-medium transition-colors duration-300">Team Meeting</h5>
                                <p class="text-slate-600 dark:text-blue-200 text-xs transition-colors duration-300">March 12, 9:00 AM</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>

@include('includes.script')

@include('includes.footer')