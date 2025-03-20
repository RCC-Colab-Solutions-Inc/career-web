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
                        <div class="absolute left-12 right-4 bottom-6 flex justify-between items-end h-64">
                        <div class="w-10 h-20 bg-blue-400 dark:bg-blue-500 rounded-t hover:bg-blue-500 dark:hover:bg-blue-400 transition-all duration-200 cursor-pointer"></div>
                        <div class="w-10 h-20 bg-blue-400 dark:bg-blue-500 rounded-t hover:bg-blue-500 dark:hover:bg-blue-400 transition-all duration-200 cursor-pointer"></div>
                        <div class="w-10 h-20 bg-blue-400 dark:bg-blue-500 rounded-t hover:bg-blue-500 dark:hover:bg-blue-400 transition-all duration-200 cursor-pointer"></div>
                        <div class="w-10 h-20 bg-blue-400 dark:bg-blue-500 rounded-t hover:bg-blue-500 dark:hover:bg-blue-400 transition-all duration-200 cursor-pointer"></div>
                        <div class="w-10 h-20 bg-blue-400 dark:bg-blue-500 rounded-t hover:bg-blue-500 dark:hover:bg-blue-400 transition-all duration-200 cursor-pointer"></div>
                        <div class="w-10 h-20 bg-blue-400 dark:bg-blue-500 rounded-t hover:bg-blue-500 dark:hover:bg-blue-400 transition-all duration-200 cursor-pointer"></div>
                        <div class="w-10 h-20 bg-blue-400 dark:bg-blue-500 rounded-t hover:bg-blue-500 dark:hover:bg-blue-400 transition-all duration-200 cursor-pointer"></div>
                        <div class="w-10 h-20 bg-blue-400 dark:bg-blue-500 rounded-t hover:bg-blue-500 dark:hover:bg-blue-400 transition-all duration-200 cursor-pointer"></div>
                        <div class="w-10 h-20 bg-blue-400 dark:bg-blue-500 rounded-t hover:bg-blue-500 dark:hover:bg-blue-400 transition-all duration-200 cursor-pointer"></div>
                        <div class="w-10 h-20 bg-blue-400 dark:bg-blue-500 rounded-t hover:bg-blue-500 dark:hover:bg-blue-400 transition-all duration-200 cursor-pointer"></div>
                        <div class="w-10 h-20 bg-blue-400 dark:bg-blue-500 rounded-t hover:bg-blue-500 dark:hover:bg-blue-400 transition-all duration-200 cursor-pointer"></div>
                        <div class="w-10 h-20 bg-blue-400 dark:bg-blue-500 rounded-t hover:bg-blue-500 dark:hover:bg-blue-400 transition-all duration-200 cursor-pointer"></div>
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

            <!-- Referral Sources Section -->
            <div class="bg-white dark:bg-slate-800/60 rounded-xl shadow-lg border border-slate-200 dark:border-slate-700/50 backdrop-blur-sm p-6 mb-8 transition-colors duration-300">
                <h3 class="text-lg font-semibold text-slate-800 dark:text-white mb-6 transition-colors duration-300">Where Candidates Found Us</h3>
                
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                    <!-- Chart -->
                    <div class="lg:col-span-2">
                        <div class="relative h-96">
                            <!-- Simple donut chart representation -->
                            <svg viewBox="0 0 100 100" class="w-full max-w-xs mx-auto">
                                <!-- LinkedIn -->
                                <circle cx="50" cy="50" r="45" fill="transparent" stroke="#0A66C2" stroke-width="10" stroke-dasharray="282.6 282.6" stroke-dashoffset="0" transform="rotate(-90 50 50)"></circle>
                                <!-- Facebook -->
                                <circle cx="50" cy="50" r="45" fill="transparent" stroke="#1877F2" stroke-width="10" stroke-dasharray="282.6 282.6" stroke-dashoffset="141.3" transform="rotate(-90 50 50)"></circle>
                                <!-- Google -->
                                <circle cx="50" cy="50" r="45" fill="transparent" stroke="#EA4335" stroke-width="10" stroke-dasharray="282.6 282.6" stroke-dashoffset="188.4" transform="rotate(-90 50 50)"></circle>
                                
                                <!-- Center circle -->
                                <circle cx="50" cy="50" r="35" fill="white" class="dark:fill-slate-800"></circle>
                            </svg>
                            
                            
                            <div class="flex flex-wrap justify-center gap-4 mt-6">
                                <div class="flex items-center">
                                    <div class="w-4 h-4 bg-[#0A66C2] rounded-sm mr-2"></div>
                                    <span class="text-sm text-slate-700 dark:text-blue-200 transition-colors duration-300">LinkedIn (45%)</span>
                                </div>
                                <div class="flex items-center">
                                    <div class="w-4 h-4 bg-[#1877F2] rounded-sm mr-2"></div>
                                    <span class="text-sm text-slate-700 dark:text-blue-200 transition-colors duration-300">Facebook (30%)</span>
                                </div>
                                <div class="flex items-center">
                                    <div class="w-4 h-4 bg-[#EA4335] rounded-sm mr-2"></div>
                                    <span class="text-sm text-slate-700 dark:text-blue-200 transition-colors duration-300">Google (15%)</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Stats/Details -->
                    <div class="space-y-4">
                        <div class="bg-slate-50 dark:bg-slate-700/30 rounded-lg p-4 transition-colors duration-300">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <div class="p-2 bg-[#0A66C2]/10 rounded-lg mr-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-[#0A66C2]" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.454C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.225 0z"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <h4 class="text-slate-800 dark:text-white font-medium transition-colors duration-300">LinkedIn</h4>
                                        <p class="text-slate-500 dark:text-blue-200/70 text-sm transition-colors duration-300">115 candidates</p>
                                    </div>
                                </div>
                                <span class="text-lg font-semibold text-slate-800 dark:text-white transition-colors duration-300">45%</span>
                            </div>
                        </div>
                        
                        <div class="bg-slate-50 dark:bg-slate-700/30 rounded-lg p-4 transition-colors duration-300">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <div class="p-2 bg-[#1877F2]/10 rounded-lg mr-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-[#1877F2]" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <h4 class="text-slate-800 dark:text-white font-medium transition-colors duration-300">Facebook</h4>
                                        <p class="text-slate-500 dark:text-blue-200/70 text-sm transition-colors duration-300">77 candidates</p>
                                    </div>
                                </div>
                                <span class="text-lg font-semibold text-slate-800 dark:text-white transition-colors duration-300">30%</span>
                            </div>
                        </div>
                        
                        <div class="bg-slate-50 dark:bg-slate-700/30 rounded-lg p-4 transition-colors duration-300">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <div class="p-2 bg-[#EA4335]/10 rounded-lg mr-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 24 24">
                                            <path fill="#4285F4" d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" />
                                            <path fill="#34A853" d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" />
                                            <path fill="#FBBC05" d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z" />
                                            <path fill="#EA4335" d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <h4 class="text-slate-800 dark:text-white font-medium transition-colors duration-300">Google</h4>
                                        <p class="text-slate-500 dark:text-blue-200/70 text-sm transition-colors duration-300">38 candidates</p>
                                    </div>
                                </div>
                                <span class="text-lg font-semibold text-slate-800 dark:text-white transition-colors duration-300">15%</span>
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
        </main>
    </div>
</div>

@include('includes.footer')