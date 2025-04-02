<!-- Navigation Bar -->
<div class="bg-white shadow-lg h-20 flex items-center px-4 justify-end">
        <div class="flex items-center">
            <div class="relative inline-block">
                <button id="dropdownButton" class="shadow-lg flex items-center rounded-lg border border-gray-300 px-3 py-2 w-72">
                    <div class="bg-[#0A2472] text-white rounded-full h-8 w-8 flex items-center justify-center mr-2">
                        <span>C</span>
                    </div>
                    <span class="text-gray-700 mr-2">Company Name</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400 ml-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <div id="dropdownMenu" class="hidden absolute right-0 mt-2 min-w-48 z-10 transition-all duration-300 bg-white shadow-lg rounded-lg border border-gray-200">
                    <div class="py-2">
                        <div class="px-4 py-2 border-b border-gray-200">
                            <p class="text-sm text-gray-600">user@company.com</p>
                        </div>
                        <a href="#" class="flex items-center px-4 py-2 text-sm text-red-600 hover:bg-gray-100">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                            </svg>
                            Sign Out
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        const dropdownButton = document.getElementById('dropdownButton');
        const dropdownMenu = document.getElementById('dropdownMenu');
        
        dropdownButton.addEventListener('click', function() {
            dropdownMenu.classList.toggle('hidden');
        });
        
        window.addEventListener('click', function(event) {
            if (!dropdownButton.contains(event.target) && !dropdownMenu.contains(event.target)) {
                dropdownMenu.classList.add('hidden');
            }
        });
    </script>