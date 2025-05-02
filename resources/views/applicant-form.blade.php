@include('includes.header')
<div class="min-h-screen flex items-center justify-center bg-gray-100 px-4 py-12">
    <div class="w-full max-w-md">
        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <!-- Profile Header -->
            <div class="bg-[#0A2472] p-10 flex justify-center items-center mb-6">
                <div class="absolute left-1/2 transform -translate-x-1/2 -translate-y-1/2 top-[250px]">
                    <div class="bg-white rounded-full p-2 w-16 h-16 flex items-center justify-center">
                        <div class="bg-[#0A2472] rounded-full w-12 h-12 flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Applicant Information -->
            <div class="p-4">
                <div class="text-center mb-4">
                    <p class="text-gray-500 text-sm">Applicant Name</p>
                    <p class="font-bold">Kent Cortiguerra</p>
                </div>
                
                <!-- Application Details Grid -->
                <div class="grid grid-cols-3 text-center mb-40">
                    <div class="border-r">
                        <p class="text-gray-500 text-sm">Position</p>
                        <p class="p-2"></p>
                    </div>
                    <div class="border-r">
                        <p class="text-gray-500 text-sm">Date Applied</p>
                        <p class="p-2"></p>
                    </div>
                    <div>
                        <p class="text-gray-500 text-sm">Status</p>
                        <p class="p-2"></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('includes.footer')