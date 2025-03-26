@include('clients.includes.header')

<div class="flex">
    @include('clients.includes.side')

    <!-- Main Content -->
    <div class="flex-1 bg-gray-50">
        @include('clients.includes.nav')

        <!-- Applicants Content -->
        <div class="p-6">
                <!-- Header Section -->
                <div class="mb-6">
                    <h1 class="text-2xl font-bold text-gray-800">Applicants</h1>
                    <p class="text-gray-600">Review and Manage Candidates for your Job Listings</p>
                </div>

                <!-- Filters Section -->
                <div class="flex flex-wrap items-center justify-between gap-4 mb-6">
                    <!-- Filter Group -->
                    <div class="flex flex-wrap gap-4">
                        <!-- Job Position Filter -->
                        <div class="w-48">
                            <label class="block text-sm font-medium text-gray-700 mb-1">Job Position</label>
                            <div class="relative">
                            <select style="-webkit-appearance: none; -moz-appearance: none; appearance: none;" class="block w-full bg-white border border-gray-300 rounded-md py-2 pl-3 pr-10 text-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                                    <option>All Positions</option>
                                    <option>UI/UX Designer</option>
                                    <option>Frontend Developer</option>
                                    <option>Backend Developer</option>
                                    <option>IT Support</option>
                                </select>
                                <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </div>
                        </div>

                        <!-- Status Filter -->
                        <div class="w-48">
                            <label class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                            <div class="relative">
                            <select style="-webkit-appearance: none; -moz-appearance: none; appearance: none;" class="block w-full bg-white border border-gray-300 rounded-md py-2 pl-3 pr-10 text-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                                    <option>All Statuses</option>
                                    <option>New</option>
                                    <option>Waiting for feedback</option>
                                    <option>Rejected</option>
                                    <option>Shortlisted</option>
                                </select>
                                <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </div>
                        </div>

                        <!-- Date Applied Filter -->
                        <div class="w-48">
                            <label class="block text-sm font-medium text-gray-700 mb-1">Date Applied</label>
                            <div class="relative">
                            <select style="-webkit-appearance: none; -moz-appearance: none; appearance: none;" class="block w-full bg-white border border-gray-300 rounded-md py-2 pl-3 pr-10 text-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                                    <option>All Dates</option>
                                    <option>Today</option>
                                    <option>Last 7 Days</option>
                                    <option>Last 30 Days</option>
                                    <option>This Month</option>
                                </select>
                                <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Search Bar -->
                    <div class="relative mt-6">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <input type="text" placeholder="Search Applicants..." class="w-96 bg-white border border-gray-300 rounded-md py-2 pl-10 pr-3 text-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                    </div>
                </div>

                <!-- Applicants Table -->
                <div class="bg-white border-t-2 border-b-4 border-l-2 border-r-2 rounded-lg shadow p-6">
                <div>
                    <table class="min-w-full">
                        <thead>
                            <tr class="border-b">
                                <th class="text-left py-3 px-1 text-sm font-medium text-blue-500">Applicant</th>
                                <th class="text-center py-3 px-1 text-sm font-medium text-blue-500">Job Position</th>
                                <th class="text-center py-3 px-1 text-sm font-medium text-blue-500">Date Applied</th>
                                <th class="text-center py-3 px-1 text-sm font-medium text-blue-500">Status</th>
                                <th class="text-center py-3 px-1 text-sm font-medium text-blue-500 w-20">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Table Row 1 -->
                            <tr class="border-b hover:bg-gray-50">
                                
                                <td class="py-3 px-1">
                                    <div class="flex items-center">
                                        <div class="w-8 h-8 rounded-full bg-gray-200 flex items-center justify-center text-gray-600 mr-3">A</div>
                                        <div>
                                            <div class="text-sm font-medium">Applicant 1</div>
                                            <div class="text-xs text-gray-500">applicant1@gmail.com</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="py-3 px-1 text-sm text-center">UI/UX Designer</td>
                                <td class="py-3 px-1 text-sm text-center">03/26/2019</td>
                                <td class="py-3 px-1 text-center">
                                    <span class="px-2 py-1 text-xs rounded-full bg-green-100 text-green-800">Waiting for feedback</span>
                                </td>
                                <td class="py-3 px-1 text-center">
                                    <button class="text-gray-400 hover:text-gray-600">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                            <path d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z" />
                                        </svg>
                                    </button>
                                </td>
                            </tr>

                            <!-- Table Row 2 -->
                            <tr class="border-b hover:bg-gray-50">
                                <td class="py-3 px-1">
                                    <div class="flex items-center">
                                        <div class="w-8 h-8 rounded-full bg-gray-200 flex items-center justify-center text-gray-600 mr-3">A</div>
                                        <div>
                                            <div class="text-sm font-medium">Applicant 1</div>
                                            <div class="text-xs text-gray-500">applicant1@gmail.com</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="py-3 px-1 text-sm text-center">UI/UX Designer</td>
                                <td class="py-3 px-1 text-sm text-center">03/26/2019</td>
                                <td class="py-3 px-1 text-center">
                                    <span class="px-2 py-1 text-xs rounded-full bg-red-100 text-red-800">Rejected</span>
                                </td>
                                <td class="py-3 px-1 text-center">
                                    <button class="text-gray-400 hover:text-gray-600">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                            <path d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z" />
                                        </svg>
                                    </button>
                                </td>
                            </tr>

                            <!-- Table Row 3 -->
                            <tr class="border-b hover:bg-gray-50">
                                <td class="py-3 px-1">
                                    <div class="flex items-center">
                                        <div class="w-8 h-8 rounded-full bg-gray-200 flex items-center justify-center text-gray-600 mr-3">A</div>
                                        <div>
                                            <div class="text-sm font-medium">Applicant 1</div>
                                            <div class="text-xs text-gray-500">applicant1@gmail.com</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="py-3 px-1 text-sm text-center">UI/UX Designer</td>
                                <td class="py-3 px-1 text-sm text-center">03/26/2019</td>
                                <td class="py-3 px-1 text-center">
                                    <span class="px-2 py-1 text-xs rounded-full bg-blue-100 text-blue-800">New</span>
                                </td>
                                <td class="py-3 px-1 text-center relative">
                                    <button class="text-gray-400 hover:text-gray-600 focus:outline-none" onclick="toggleDropdown(event, 'dropdown-4')">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                            <path d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z" />
                                        </svg>
                                    </button>
                                    <div id="dropdown-4" class="hidden absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg z-20 py-1 text-left">
                                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">View Profile</a>
                                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Download Resume</a>
                                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Change Status</a>
                                    </div>
                                </td>
                            </tr>

                            <!-- Table Row 4 -->
                            <tr class="hover:bg-gray-50">
                                <td class="py-3 px-1">
                                    <div class="flex items-center">
                                        <div class="w-8 h-8 rounded-full bg-gray-200 flex items-center justify-center text-gray-600 mr-3">A</div>
                                        <div>
                                            <div class="text-sm font-medium">Applicant 1</div>
                                            <div class="text-xs text-gray-500">applicant1@gmail.com</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="py-3 px-1 text-sm text-center">UI/UX Designer</td>
                                <td class="py-3 px-1 text-sm text-center">03/26/2019</td>
                                <td class="py-3 px-1 text-center">
                                    <span class="px-2 py-1 text-xs rounded-full bg-green-100 text-green-800">Waiting for feedback</span>
                                </td>
                                <td class="py-3 px-1 text-center relative">
                                    <button class="text-gray-400 hover:text-gray-600 focus:outline-none" onclick="toggleDropdown(event, 'dropdown-1')">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                            <path d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z" />
                                        </svg>
                                    </button>
                                    <div id="dropdown-1" class="hidden absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg z-10 py-1 text-left">
                                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">View Profile</a>
                                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Download Resume</a>
                                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Change Status</a>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>

<script>
    function toggleDropdown(event, dropdownId) {
        event.stopPropagation();
        
        document.querySelectorAll('[id^="dropdown-"]').forEach(dropdown => {
            if (dropdown.id !== dropdownId) {
                dropdown.classList.add('hidden');
            }
        });
        
        const dropdown = document.getElementById(dropdownId);
        dropdown.classList.toggle('hidden');
    }
    
    document.addEventListener('click', function() {
        document.querySelectorAll('[id^="dropdown-"]').forEach(dropdown => {
            dropdown.classList.add('hidden');
        });
    });
</script>