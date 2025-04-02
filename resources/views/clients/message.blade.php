@include('clients.includes.header')

<div class="flex h-screen bg-white">

    <!-- Chat Container - Full width layout -->
    <div class="flex flex-1 flex-col overflow-hidden">
        
        <!-- Top Nav with Message Icon and Company Dropdown -->
        <div class="shadow-lg h-20 flex items-center justify-between px-4">
            <!-- Company Logo and Name -->
            <div class="flex items-center">
                <img src="{{ asset('assets/RCCLogo-Blue.png') }}" alt="RCC Logo" class="h-12 mr-2">
                <div class="text-[#0A2472] font-bold">RCC COLAB SOLUTIONS INC.</div>
            </div>

            <!-- User Controls -->
            <div class="flex items-center">
                <a href="{{ url('/client/message') }}" class="relative mr-4 cursor-pointer hover:opacity-80 transition-opacity">
                    <div class="bg-gray-200 rounded-full p-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                            <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                        </svg>
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

        <!-- Chat Interface Container -->
        <div class="flex flex-1 overflow-hidden">
            <!-- Left Sidebar - Chat List -->
            <div class="w-80 border-r flex flex-col bg-white">
                <!-- Chat Header with Back Button -->
                <div class="p-1 border-b flex items-center">
                    <a href="{{ url('/client/dashboard') }}" class="rounded-full p-4 hover:bg-gray-100">                       
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                        </svg>                      
                    </a>
                    <h1 class="text-xl font-semibold ml-1">Chats</h1>
                </div>
                
                <!-- Search Bar -->
                <div class="px-4 py-2 border-b">
                    <div class="relative">
                        <input type="text" placeholder="Search" class="w-full bg-gray-100 border-0 rounded-md py-2 pl-10 pr-3 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                            </svg>
                        </div>
                    </div>
                </div>
                
                <!-- Inbox Tab -->
                <div class="px-4 py-2 bg-blue-100 text-blue-700 font-medium text-sm">
                    Inbox
                </div>
                
                <!-- Conversation List -->
                <div class="flex-1 overflow-y-auto">
                    <!-- Conversation Item (Active) -->
                    <div class="p-3 bg-blue-50 border-l-4 border-blue-500 hover:bg-blue-50 cursor-pointer">
                        <div class="flex items-center">
                            <div class="w-10 h-10 rounded-full bg-blue-200 flex items-center justify-center text-blue-600 mr-3 flex-shrink-0">
                                <span>J</span>
                            </div>
                            <div class="flex-1 min-w-0">
                                <div class="flex justify-between items-baseline">
                                    <h3 class="text-sm font-semibold text-gray-900 truncate">Juan Dela Cruz</h3>
                                    <span class="text-xs text-gray-500">12:23</span>
                                </div>
                                <p class="text-xs text-gray-500 truncate mt-1">Message You</p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Conversation Item -->
                    <div class="p-3 hover:bg-gray-50 cursor-pointer">
                        <div class="flex items-center">
                            <div class="w-10 h-10 rounded-full bg-gray-200 flex items-center justify-center text-gray-600 mr-3 flex-shrink-0">
                                <span>J</span>
                            </div>
                            <div class="flex-1 min-w-0">
                                <div class="flex justify-between items-baseline">
                                    <h3 class="text-sm font-semibold text-gray-900 truncate">Juan Dela Cruz</h3>
                                    <span class="text-xs text-gray-500">12:23</span>
                                </div>
                                <p class="text-xs text-gray-500 truncate mt-1">Message You</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Right Side - Conversation Area -->
            <div class="flex-1 flex flex-col">
                <!-- Chat Header - Contact Name -->
                <div class="py-3 px-4 border-b flex items-center justify-between">
                    <div class="flex items-center">
                        <div class="w-9 h-9 rounded-full bg-blue-200 flex items-center justify-center text-blue-600 mr-3">
                            <span>J</span>
                        </div>
                        <h3 class="text-lg font-medium">Juan Dela Cruz</h3>
                    </div>
                </div>
                
                <!-- Messages Area -->
                <div class="flex-1 overflow-y-auto p-4 space-y-6">
                    <!-- Received Messages -->
                    <div class="flex items-start max-w-md">
                        <div class="w-8 h-8 rounded-full bg-blue-200 flex items-center justify-center text-blue-600 mr-2 flex-shrink-0">
                            <span>J</span>
                        </div>
                        <div class="space-y-2">
                            <div class="bg-gray-200 rounded-lg p-3 text-sm text-gray-800">
                                <p>This is a sample message</p>
                            </div>
                            <div class="bg-gray-200 rounded-lg p-3 text-sm text-gray-800">
                                <p>This is a longer sample message to demonstrate how longer messages appear in the chat interface.</p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Sent Messages -->
                    <div class="flex items-start justify-end">
                        <div class="space-y-2">
                            <div class="bg-blue-500 rounded-lg p-3 text-sm text-white ml-auto max-w-md">
                                <p>This is a sample reply message</p>
                            </div>
                            <div class="bg-blue-500 rounded-lg p-3 text-sm text-white ml-auto max-w-md">
                                <p>Here's a longer reply message to show how user replies are displayed.</p>
                            </div>
                        </div>
                        <div class="w-8 h-8 rounded-full bg-blue-600 flex items-center justify-center text-white ml-2 flex-shrink-0">
                            <span>C</span>
                        </div>
                    </div>
                </div>
                
                <!-- Message Input -->
                <div class="px-4 py-3 border-t flex items-center">
                    <input type="text" placeholder="Message @Juan Dela Cruz" class="flex-1 bg-gray-200 border-0 rounded-lg py-3 px-4 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <button class="ml-2 text-gray-500 hover:text-gray-700">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>