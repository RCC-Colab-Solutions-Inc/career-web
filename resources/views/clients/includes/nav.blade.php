<!-- Navigation Bar -->
<div class="bg-white border-b-4 shadow-sm h-20 flex items-center px-4 justify-end">
    <div class="flex items-center">
        <!-- Message notification icon -->
        <a href="{{ url('/client/message') }}" class="relative mr-4 cursor-pointer hover:opacity-80 transition-opacity">
                    <div class="bg-gray-200 rounded-full p-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-600" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                            <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                        </svg>
                    </div>
            <!-- Red notification badge -->
            <div class="absolute -top-2 -right-2 bg-red-500 text-white text-xs rounded-full h-5 w-5 flex items-center justify-center">
                <span>2</span>
            </div>
        </a>
        
        <button class="border-t-2 border-b-4 border-l-2 border-r-2 flex items-center rounded-lg border border-gray-200 px-3 py-2 w-72">
            <div class="bg-[#0A2472] text-white rounded-full h-8 w-8 flex items-center justify-center mr-2">
                <span>C</span>
            </div>
            <span class="text-gray-700 mr-2">Company name</span>
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400 ml-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
            </svg>
        </button>
    </div>
</div>