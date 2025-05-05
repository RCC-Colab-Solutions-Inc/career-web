@include('includes.header')

<!-- Main Container -->
<div class="flex" id="main-container">
    
    @include('includes.side')
    
    <!-- Main Content -->
    <div class="flex-1 overflow-x-hidden overflow-y-auto transition-colors duration-300 bg-gray-50 dark:bg-slate-900">
        
        @include('includes.nav')
        
        <!-- Schedule Content -->
        <main class="min-h-screen p-6">
            <!-- Page Title with View Toggle -->
            <div class="mb-8 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
                <div>
                    <h1 class="text-2xl font-bold text-gray-800 dark:text-white transition-colors duration-300">Schedule</h1>
                    <p class="text-gray-600 dark:text-gray-300 transition-colors duration-300">Manage your interviews and appointments</p>
                </div>
                
                <!-- View Toggle -->
                <div class="inline-flex rounded-lg border border-gray-200 dark:border-slate-700 p-1 bg-white dark:bg-slate-800 transition-colors duration-300" x-data="{ view: 'table' }">
                    <button @click="view = 'table'; $dispatch('set-view', { view: 'table' })" 
                            :class="view === 'table' ? 'bg-blue-600 text-white' : 'text-gray-600 dark:text-gray-300'"
                            class="px-4 py-2 rounded-md font-medium transition-all duration-200 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M3 14h18m-9-4v8m-7 0h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z" />
                        </svg>
                        Table
                    </button>
                    <button @click="view = 'calendar'; $dispatch('set-view', { view: 'calendar' })" 
                            :class="view === 'calendar' ? 'bg-blue-600 text-white' : 'text-gray-600 dark:text-gray-300'"
                            class="px-4 py-2 rounded-md font-medium transition-all duration-200 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        Calendar
                    </button>
                </div>
            </div>
            
            <div x-data="{ currentView: 'table' }" @set-view.window="currentView = $event.detail.view">
    <!-- Filters Section - only shows in table view -->
    <div class="mb-8" x-show="currentView === 'table'" x-cloak>
        <div class="bg-white dark:bg-slate-800 rounded-xl shadow-md border border-gray-200 dark:border-slate-700 p-6 transition-colors duration-300">
            <!-- Filter content remains the same -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Date Range</label>
                            <select class="w-full bg-gray-100 dark:bg-slate-700 border border-gray-300 dark:border-slate-600 rounded-lg py-2.5 px-4 text-gray-800 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500/50 transition-colors duration-300">
                                <option>Today</option>
                                <option>This Week</option>
                                <option>This Month</option>
                                <option>Custom Range</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Interview Type</label>
                            <select class="w-full bg-gray-100 dark:bg-slate-700 border border-gray-300 dark:border-slate-600 rounded-lg py-2.5 px-4 text-gray-800 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500/50 transition-colors duration-300">
                                <option>All Types</option>
                                <option>Technical Interview</option>
                                <option>HR Interview</option>
                                <option>Final Interview</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Status</label>
                            <select class="w-full bg-gray-100 dark:bg-slate-700 border border-gray-300 dark:border-slate-600 rounded-lg py-2.5 px-4 text-gray-800 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500/50 transition-colors duration-300">
                                <option>All Status</option>
                                <option>Pending</option>
                                <option>Accept</option>
                                <option>Decline</option>
                                <option>Cancel</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Content Container -->
            <div x-data="{ currentView: 'table' }" @set-view.window="currentView = $event.detail.view" class="relative">
                
                <!-- Table View -->
                <div x-show="currentView === 'table'" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0">
                    <div class="bg-white dark:bg-slate-800 rounded-xl shadow-md border border-gray-200 dark:border-slate-700 overflow-hidden transition-colors duration-300">
                        <div class="overflow-x-auto">
                            <table class="w-full">
                                <thead>
                                    <tr class="bg-gray-50 dark:bg-slate-700/50 border-b border-gray-200 dark:border-slate-600 transition-colors duration-300">
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider transition-colors duration-300">
                                            Candidate
                                        </th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider transition-colors duration-300">
                                            Position
                                        </th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider transition-colors duration-300">
                                            Date & Time
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
                                    <!-- Sample appointments -->
                                <tr class="hover:bg-gray-50 dark:hover:bg-slate-700/30 transition-colors duration-200">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="h-8 w-8 rounded-full bg-gradient-to-br from-blue-400 to-indigo-400 flex items-center justify-center text-white font-medium">
                                                KC
                                            </div>
                                            <div class="ml-3">
                                                <div class="text-sm font-medium text-gray-900 dark:text-white transition-colors duration-300">
                                                    Kent Cortiguerra
                                                </div>
                                                <div class="text-sm text-gray-500 dark:text-gray-400 transition-colors duration-300">
                                                    kent.cortiguerra@rcccolabsolutions.com
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900 dark:text-white transition-colors duration-300">
                                            Software Developer
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm font-medium text-gray-900 dark:text-white transition-colors duration-300">
                                            Dec 5, 2024
                                        </div>
                                        <div class="text-sm text-gray-500 dark:text-gray-400 transition-colors duration-300">
                                            10:00 AM
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-center">
                                        <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800 dark:bg-yellow-900/50 dark:text-yellow-200">
                                            Pending
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-center">
                                        <div class="flex items-center justify-center space-x-2">
                                            <button class="p-1.5 text-blue-600 dark:text-blue-400 rounded-lg hover:bg-blue-100 dark:hover:bg-blue-900/30 transition-colors duration-200" title="View">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                </svg>
                                            </button>
                                            <button class="p-1.5 text-green-600 dark:text-green-400 rounded-lg hover:bg-green-100 dark:hover:bg-green-900/30 transition-colors duration-200" title="Reschedule">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                </svg>
                                            </button>
                                            <button class="p-1.5 text-red-600 dark:text-red-400 rounded-lg hover:bg-red-100 dark:hover:bg-red-900/30 transition-colors duration-200" title="Cancel">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                                </svg>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="hover:bg-gray-50 dark:hover:bg-slate-700/30 transition-colors duration-200">
                                    
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="h-8 w-8 rounded-full bg-gradient-to-br from-purple-400 to-pink-400 flex items-center justify-center text-white font-medium">
                                                JC
                                            </div>
                                            <div class="ml-3">
                                                <div class="text-sm font-medium text-gray-900 dark:text-white transition-colors duration-300">
                                                    James Castillo
                                                </div>
                                                <div class="text-sm text-gray-500 dark:text-gray-400 transition-colors duration-300">
                                                    james.castillo@rcccolabsolutions.com
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900 dark:text-white transition-colors duration-300">
                                            IT Support
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm font-medium text-gray-900 dark:text-white transition-colors duration-300">
                                            Dec 10, 2024
                                        </div>
                                        <div class="text-sm text-gray-500 dark:text-gray-400 transition-colors duration-300">
                                            9:00 AM
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-center">
                                        <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800 dark:bg-green-900/50 dark:text-green-200">
                                            Accept
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-center">
                                        <div class="flex items-center justify-center space-x-2">
                                            <button class="p-1.5 text-blue-600 dark:text-blue-400 rounded-lg hover:bg-blue-100 dark:hover:bg-blue-900/30 transition-colors duration-200" title="View">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                </svg>
                                            </button>
                                            <button class="p-1.5 text-green-600 dark:text-green-400 rounded-lg hover:bg-green-100 dark:hover:bg-green-900/30 transition-colors duration-200" title="Reschedule">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                </svg>
                                            </button>
                                            <button class="p-1.5 text-red-600 dark:text-red-400 rounded-lg hover:bg-red-100 dark:hover:bg-red-900/30 transition-colors duration-200" title="Cancel">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                                </svg>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="hover:bg-gray-50 dark:hover:bg-slate-700/30 transition-colors duration-200">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="h-8 w-8 rounded-full bg-gradient-to-br from-green-400 to-teal-400 flex items-center justify-center text-white font-medium">
                                                ER
                                            </div>
                                            <div class="ml-3">
                                                <div class="text-sm font-medium text-gray-900 dark:text-white transition-colors duration-300">
                                                    Eljay Rosal
                                                </div>
                                                <div class="text-sm text-gray-500 dark:text-gray-400 transition-colors duration-300">
                                                    eljay.rosal@rcccolabsolutions.com
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900 dark:text-white transition-colors duration-300">
                                            UI/UX Designer
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm font-medium text-gray-900 dark:text-white transition-colors duration-300">
                                            Dec 15, 2024
                                        </div>
                                        <div class="text-sm text-gray-500 dark:text-gray-400 transition-colors duration-300">
                                            3:00 PM
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-center">
                                        <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800 dark:bg-red-900/50 dark:text-red-200">
                                            Decline
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-center">
                                        <div class="flex items-center justify-center space-x-2">
                                            <button class="p-1.5 text-blue-600 dark:text-blue-400 rounded-lg hover:bg-blue-100 dark:hover:bg-blue-900/30 transition-colors duration-200" title="View">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                </svg>
                                            </button>
                                            <button class="p-1.5 text-green-600 dark:text-green-400 rounded-lg hover:bg-green-100 dark:hover:bg-green-900/30 transition-colors duration-200" title="Reschedule">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                </svg>
                                            </button>
                                            <button class="p-1.5 text-red-600 dark:text-red-400 rounded-lg hover:bg-red-100 dark:hover:bg-red-900/30 transition-colors duration-200" title="Cancel">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                                </svg>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                
                <!-- Calendar View -->
                <div x-show="currentView === 'calendar'" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 transform scale-95" x-transition:enter-end="opacity-100 transform scale-100">
                    <div class="bg-white/90 dark:bg-slate-900/90 backdrop-blur-lg backdrop-saturate-150 rounded-2xl shadow-xl border border-white/20 dark:border-slate-700/30 transition-all duration-300 hover:shadow-2xl hover:-translate-y-0.5">
                        <div class="p-8">
                            <!-- Calendar Header -->
                            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-6 mb-10">
                                <div class="flex flex-col sm:flex-row sm:items-center gap-6">
                                    <h2 class="text-3xl font-bold bg-gradient-to-r from-gray-900 to-gray-600 dark:from-white dark:to-gray-300 bg-clip-text text-transparent" id="calendarMonth">
                                        {{ Carbon\Carbon::now()->format('F Y') }}
                                    </h2>
                                    <div class="flex items-center gap-2">
                                        <button class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-gray-100/80 dark:bg-slate-800/80 hover:bg-gray-200/90 dark:hover:bg-slate-700/90 text-gray-700 dark:text-gray-200 transition-all duration-200 hover:scale-105 active:scale-95 shadow-sm hover:shadow" id="prevMonth">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                                            </svg>
                                        </button>
                                        <button class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-gray-100/80 dark:bg-slate-800/80 hover:bg-gray-200/90 dark:hover:bg-slate-700/90 text-gray-700 dark:text-gray-200 transition-all duration-200 hover:scale-105 active:scale-95 shadow-sm hover:shadow" id="nextMonth">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                                            </svg>
                                        </button>
                                        <div class="relative group">
                                            <button class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white rounded-lg transition-all duration-200 shadow-md hover:shadow-lg group-hover:scale-105 active:scale-95 ml-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                </svg>
                                                Today
                                            </button>
                                            <div class="absolute hidden group-hover:block w-44 z-10 p-3 mt-2 bg-white/90 dark:bg-slate-800/90 backdrop-blur-sm rounded-lg shadow-lg border border-gray-200/50 dark:border-slate-700 left-0">
                                                <div class="text-sm text-gray-700 dark:text-gray-200">Jump to current date</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex items-center gap-4">
                                    <button class="relative group">
                                        <div class="absolute -inset-0.5 bg-gradient-to-r from-blue-600 to-indigo-600 rounded-lg blur opacity-50 group-hover:opacity-75 transition duration-200"></div>
                                        <div class="relative inline-flex items-center px-4 py-2.5 bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white rounded-lg transition-all duration-200 shadow-sm hover:shadow-lg">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                            </svg>
                                            New Schedule
                                        </div>
                                    </button>
                                </div>
                            </div>
                            
                            <!-- Calendar Grid -->
                            <div class="overflow-hidden border border-gray-200/30 dark:border-slate-700/50 rounded-xl shadow-sm backdrop-blur-md">
                                <div class="grid grid-cols-7">
                                    <!-- Weekday headers -->
                                    @foreach(['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'] as $day)
                                        <div class="bg-gray-50/80 dark:bg-slate-800/80 border-b border-r border-gray-200/30 dark:border-slate-700/50 py-3">
                                            <span class="block text-center text-sm font-semibold text-gray-600 dark:text-gray-300">{{ $day }}</span>
                                        </div>
                                    @endforeach
                                    
                                    <!-- Calendar days -->
                                    @php
                                        $daysInMonth = 30; // Example
                                        $firstDayOfWeek = 1; // Example: starts on Tuesday
                                    @endphp
                                    
                                    <!-- Empty cells for days before the first day of month -->
                                    @for($i = 0; $i < $firstDayOfWeek; $i++)
                                        <div class="h-28 border-b border-r border-gray-200/30 dark:border-slate-700/50 bg-gray-50/30 dark:bg-slate-900/30"></div>
                                    @endfor
                                    
                                    <!-- Days of the month -->
                                    @for($day = 1; $day <= $daysInMonth; $day++)
                                        <div class="h-28 border-b border-r border-gray-200/30 dark:border-slate-700/50 hover:bg-gray-50/70 dark:hover:bg-slate-800/50 transition-all duration-200 cursor-pointer backdrop-blur-sm group">
                                            <div class="p-3 h-full flex flex-col">
                                                <div class="flex items-center justify-between mb-1">
                                                    @if($day == date('j'))
                                                        <div class="w-6 h-6 rounded-full bg-gradient-to-r from-blue-500 to-indigo-500 flex items-center justify-center shrink-0">
                                                            <span class="text-xs font-bold text-white">{{ $day }}</span>
                                                        </div>
                                                    @else
                                                        <span class="text-sm font-semibold text-gray-700 dark:text-gray-300 transition-colors duration-200">{{ $day }}</span>
                                                    @endif
                                                </div>
                                                
                                                <!-- Events -->
                                                <div class="space-y-1 overflow-y-auto flex-1">
                                                    @if($day == 5)
                                                        <div class="px-2 py-1 text-xs rounded-md bg-blue-100/90 text-blue-800 dark:bg-blue-900/50 dark:text-blue-200 border border-blue-200/50 dark:border-blue-800/50 shadow-sm backdrop-blur-sm transform transition-all duration-200 cursor-pointer">
                                                            <div class="font-medium">10:00 AM</div>
                                                            <div class="text-xs opacity-90">Team Meeting</div>
                                                        </div>
                                                        <div class="px-2 py-1 text-xs rounded-md bg-green-100/90 text-green-800 dark:bg-green-900/50 dark:text-green-200 border border-green-200/50 dark:border-green-800/50 shadow-sm backdrop-blur-sm transform transition-all duration-200 cursor-pointer">
                                                            <div class="font-medium">2:00 PM</div>
                                                            <div class="text-xs opacity-90">Client Call</div>
                                                        </div>
                                                    @elseif($day == 10)
                                                        <div class="px-2 py-1 text-xs rounded-md bg-yellow-100/90 text-yellow-800 dark:bg-yellow-900/50 dark:text-yellow-200 border border-yellow-200/50 dark:border-yellow-800/50 shadow-sm backdrop-blur-sm transform transition-all duration-200 cursor-pointer">
                                                            <div class="font-medium">9:00 AM</div>
                                                            <div class="text-xs opacity-90">Interview</div>
                                                        </div>
                                                    @elseif($day == 15)
                                                        <div class="px-2 py-1 text-xs rounded-md bg-red-100/90 text-red-800 dark:bg-red-900/50 dark:text-red-200 border border-red-200/50 dark:border-red-800/50 shadow-sm backdrop-blur-sm transform transition-all duration-200 cursor-pointer">
                                                            <div class="font-medium">3:00 PM</div>
                                                            <div class="text-xs opacity-90">Deadline</div>
                                                        </div>
                                                    @endif
                                                    
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    @endfor
                                    
                                    <!-- Fill remaining cells -->
                                    @php
                                        $lastDayOfWeek = ($firstDayOfWeek + $daysInMonth - 1) % 7;
                                        $remainingCells = $lastDayOfWeek == 6 ? 0 : 6 - $lastDayOfWeek;
                                    @endphp
                                    
                                    @for($i = 0; $i < $remainingCells; $i++)
                                        <div class="h-28 border-b border-r border-gray-200/30 dark:border-slate-700/50 bg-gray-50/30 dark:bg-slate-900/30"></div>
                                    @endfor
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        
        @include('includes.footer')
    </div>
</div>

<!-- Add Calendar Navigation Script -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Calendar navigation
    const calendarMonth = document.getElementById('calendarMonth');
    const prevMonth = document.getElementById('prevMonth');
    const nextMonth = document.getElementById('nextMonth');
    
    let currentDate = new Date();
    
    function updateCalendarDisplay() {
        const options = { year: 'numeric', month: 'long' };
        calendarMonth.textContent = currentDate.toLocaleDateString('en-US', options);
    }
    
    if (prevMonth) {
        prevMonth.addEventListener('click', function() {
            currentDate.setMonth(currentDate.getMonth() - 1);
            updateCalendarDisplay();
        });
    }
    
    if (nextMonth) {
        nextMonth.addEventListener('click', function() {
            currentDate.setMonth(currentDate.getMonth() + 1);
            updateCalendarDisplay();
        });
    }
});
</script>