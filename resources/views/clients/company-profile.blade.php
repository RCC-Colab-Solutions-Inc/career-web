@include('clients.includes.header')

<div class="flex h-screen overflow-hidden">

    @include('clients.includes.side')

    <!-- Main Content -->
    <div class="flex-1">

        @include('clients.includes.nav')

        <!-- Company Profile Content -->
        <div class="p-6 bg-gray-50">
            <div class="mb-6">
                <h1 class="text-2xl font-bold text-gray-800">Company Profile</h1>
                <p class="text-gray-600">Review and Manage Candidates for your Job Listings</p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <!-- Left Column -->
                <div>
                    <!-- Company Card -->
                    <div class="bg-white border-b-4 rounded-lg shadow p-8 mb-6">
                        <div class="text-center mb-2">
                            <h2 class="text-xl font-bold">RCC Colab Solutions Inc</h2>
                            <p class="text-gray-600">7th Fl. Ascott Hotel Makati City</p>
                        </div>
                        
                        <div class="bg-green-100 rounded-md p-2 flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            <span class="text-green-700">Account is active</span>
                        </div>
                    </div>

                    <!-- Email Additional Information -->
                    <div class="bg-white border-b-4 rounded-lg shadow p-6">
                        <h3 class="text-lg font-semibold text-gray-800 mb-4">Email Additional Information</h3>
                        
                        <div class="mb-4">
                            <label class="block text-sm font-medium mb-1">Add CC</label>
                            <input type="text" class="w-full border border-gray-300 rounded-md p-2" placeholder="Enter email addresses">
                            <p class="text-xs text-gray-500 mt-1">Use comma (,) if more than one email</p>
                        </div>
                        
                        <div class="mb-4">
                            <label class="block text-sm font-medium mb-1">Add BCC</label>
                            <input type="text" class="w-full border border-gray-300 rounded-md p-2" placeholder="Enter email addresses">
                            <p class="text-xs text-gray-500 mt-1">Use comma (,) if more than one email</p>
                        </div>
                        
                        <div class="flex justify-center">
                            <button class="bg-blue-900 text-white font-medium py-2 px-10 rounded-full">Save</button>
                        </div>
                    </div>
                </div>

                <!-- Right Column -->
                <div>
                    <!-- Company Information -->
                    <div class="bg-white border-b-4 rounded-lg shadow p-4">
                        <h3 class="text-lg font-semibold text-gray-800 mb-4">Company Information</h3>
                        
                        <div class="mb-4">
                            <label class="block text-sm font-medium mb-1">Company Name</label>
                            <input type="text" class="w-full border border-gray-300 rounded-md p-2">
                        </div>
                        
                        <div class="mb-4">
                            <label class="block text-sm font-medium mb-1">Company Address</label>
                            <input type="text" class="w-full border border-gray-300 rounded-md p-2">
                        </div>
                        
                        <div class="mb-4">
                            <label class="block text-sm font-medium mb-1">Company Representative</label>
                            <input type="text" class="w-full border border-gray-300 rounded-md p-2">
                        </div>
                        
                        <div class="mb-4">
                            <label class="block text-sm font-medium mb-1">Representative Email</label>
                            <input type="email" class="w-full border border-gray-300 rounded-md p-2">
                        </div>
                        
                        <div class="mb-4">
                            <label class="block text-sm font-medium mb-1">Representative Contact Number</label>
                            <input type="text" class="w-full border border-gray-300 rounded-md p-2">
                        </div>
                        
                        <div class="flex justify-center">
                            <button class="bg-blue-900 text-white font-medium py-2 px-10 rounded-full">Save</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>