@include('clients.includes.header')

    <div class="flex">

        @include('clients.includes.side')

        <!-- Main Content -->
        <div class="flex-1">

            @include('clients.includes.nav')

            <!-- Dashboard Content -->
            <div class="p-6">
                <!-- Stats Cards -->
                <div class="relative h-96 mb-1">
                    <!-- New CV Card -->
                    <div class="absolute border-t-2 border-b-4 border-l-2 border-r-2 bg-white rounded-lg shadow p-4 flex items-center w-80 h-28" style="top: 20px; left: 30px;">
                        <div class="p-3 rounded-lg bg-blue-50 mr-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                        </div>
                        <div>
                            <div class="text-sm text-gray-500">New CV</div>
                            <div class="text-2xl font-bold">187</div>
                        </div>
                    </div>

                    <!-- Pending Card -->
                    <div class="absolute border-t-2 border-b-4 border-l-2 border-r-2 bg-white rounded-lg shadow p-4 flex items-center w-80 h-28" style="top: 20px; left: 420px;">
                        <div class="p-3 rounded-lg bg-blue-50 mr-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <div>
                            <div class="text-sm text-gray-500">Pending</div>
                            <div class="text-2xl font-bold">387</div>
                        </div>
                    </div>

                    <!-- For Job Offer Card -->
                    <div class="absolute border-t-2 border-b-4 border-l-2 border-r-2 bg-white rounded-lg shadow p-4 flex items-center w-80 h-28" style="top: 20px; left: 800px;">
                        <div class="p-3 rounded-lg bg-blue-50 mr-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                            </svg>
                        </div>
                        <div>
                            <div class="text-sm text-gray-500">For Job Offer</div>
                            <div class="text-2xl font-bold">20</div>
                        </div>
                    </div>

                    <!-- Hired Card -->
                    <div class="absolute border-t-2 border-b-4 border-l-2 border-r-2 bg-white rounded-lg shadow p-4 flex items-center w-80 h-28" style="top: 200px; left: 200px;">
                        <div class="p-3 rounded-lg bg-blue-50 mr-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </div>
                        <div>
                            <div class="text-sm text-gray-500">Hired</div>
                            <div class="text-2xl font-bold">90</div>
                        </div>
                    </div>

                    <!-- Declined Card -->
                    <div class="absolute border-t-2 border-b-4 border-l-2 border-r-2 bg-white rounded-lg shadow p-4 flex items-center w-80 h-28" style="top: 200px; left: 600px;">
                        <div class="p-3 rounded-lg bg-red-50 mr-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <div>
                            <div class="text-sm text-gray-500">Declined</div>
                            <div class="text-2xl font-bold">70</div>
                        </div>
                    </div>
                </div>

                <!-- Applicants Trends -->
                <div class="bg-white border-t-2 border-b-4 border-l-2 border-r-2 rounded-lg shadow p-6">
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="text-lg font-semibold text-gray-800">Applicants Trends</h2>
                        <a class="text-blue-500 text-sm hover:underline">View All</a>
                    </div>

                    <!-- Applicants Table -->
                    <div class="overflow-x-auto">
                        <table class="min-w-full">
                            <thead>
                                <tr class="border-b">
                                    <th class="text-left py-3 px-4 text-sm font-medium text-blue-500">Position</th>
                                    <th class="text-left py-3 px-4 text-sm font-medium text-blue-500">Department</th>
                                    <th class="text-left py-3 px-4 text-sm font-medium text-blue-500">Location</th>
                                    <th class="text-left py-3 px-4 text-sm font-medium text-blue-500">Applications</th>
                                    <th class="text-left py-3 px-4 text-sm font-medium text-blue-500">Status</th>
                                    <th class="text-left py-3 px-4 text-sm font-medium text-blue-500">Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                <!-- Table 1 -->
                                <tr class="border-b hover:bg-gray-50">
                                    <td class="py-3 px-4 text-sm">Senior Frontend Developer</td>
                                    
                                </tr>

                                <!-- Table 2 -->
                                <tr class="border-b hover:bg-gray-50">
                                    <td class="py-3 px-4 text-sm">UI/UX Designer</td>
                                    
                                </tr>

                                <!-- Table 3 -->
                                <tr class="border-b hover:bg-gray-50">
                                    <td class="py-3 px-4 text-sm">IT Support</td>
                                    
                                <!-- Table 4 -->
                                </tr>
                                <tr class="hover:bg-gray-50">
                                    <td class="py-3 px-4 text-sm">Backend Developer</td>
                                    
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>