@include('includes.header')

<!-- Main Container -->
<div class="flex" id="main-container">
    
    @include('includes.side')
    
    <!-- Main Content -->
    <div class="flex-1 overflow-x-hidden overflow-y-auto transition-colors duration-300 bg-gray-50 dark:bg-slate-900">
        
        @include('includes.nav')
        
        <!-- Messages Content -->
        <main class="min-h-screen p-6">
            <!-- Page Title -->
            <div class="mb-8">
                <h1 class="text-2xl font-bold text-gray-800 dark:text-white transition-colors duration-300">Messages</h1>
                <p class="text-gray-600 dark:text-gray-300 transition-colors duration-300">Monitor conversations between clients and applicants</p>
            </div>
            
            <!-- Messages Container -->
            <div class="flex gap-6 h-[calc(100vh-12rem)]" x-data="{ selectedChat: null }">
                
                <!-- Sidebar - Conversations List -->
                <div class="w-1/3 flex flex-col">
                    <!-- Search Bar -->
                    <div class="mb-4">
                        <div class="relative">
                            <input type="text" placeholder="Search conversations..." 
                                   class="w-full bg-white dark:bg-slate-800 border border-gray-300 dark:border-slate-600 rounded-lg py-2.5 pl-10 pr-4 text-gray-800 dark:text-white placeholder-gray-400 dark:placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500/50 transition-colors duration-300">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400 dark:text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                </svg>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Filter Buttons -->
                    <div class="flex gap-2 mb-4 overflow-x-auto pb-2">
                        <button class="px-4 py-1.5 rounded-full bg-blue-600 text-white text-sm font-medium whitespace-nowrap">All</button>
                        <button class="px-4 py-1.5 rounded-full border border-gray-300 dark:border-slate-600 text-gray-700 dark:text-gray-300 text-sm font-medium hover:bg-gray-100 dark:hover:bg-slate-700 transition-colors duration-200 whitespace-nowrap">Unread</button>
                        <button class="px-4 py-1.5 rounded-full border border-gray-300 dark:border-slate-600 text-gray-700 dark:text-gray-300 text-sm font-medium hover:bg-gray-100 dark:hover:bg-slate-700 transition-colors duration-200 whitespace-nowrap">Active</button>
                        <button class="px-4 py-1.5 rounded-full border border-gray-300 dark:border-slate-600 text-gray-700 dark:text-gray-300 text-sm font-medium hover:bg-gray-100 dark:hover:bg-slate-700 transition-colors duration-200 whitespace-nowrap">Archived</button>
                    </div>
                    
                    <!-- Conversations List -->
                    <div class="flex-1 overflow-y-auto space-y-2 pr-2">
                        <!-- Conversation Item -->
                        <div @click="selectedChat = 1" :class="selectedChat === 1 ? 'bg-blue-50 dark:bg-blue-900/20 border-blue-200 dark:border-blue-800' : 'bg-white dark:bg-slate-800 border-gray-200 dark:border-slate-700 hover:bg-gray-50 dark:hover:bg-slate-700/50'" class="border rounded-lg p-4 cursor-pointer transition-all duration-200">
                            <div class="flex items-start gap-3">
                                <div class="relative">
                                    <div class="h-10 w-10 rounded-full bg-gradient-to-br from-blue-400 to-indigo-400 flex items-center justify-center text-white font-medium">
                                        KC
                                    </div>
                                    <div class="absolute -top-1 -right-1 w-3.5 h-3.5 bg-green-500 border-2 border-white dark:border-slate-800 rounded-full"></div>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <div class="flex items-center justify-between">
                                        <h3 class="text-sm font-semibold text-gray-900 dark:text-white truncate">Kent Cortiguerra</h3>
                                        <span class="text-xs text-gray-500 dark:text-gray-400 flex-shrink-0 ml-2">2 min ago</span>
                                    </div>
                                    <p class="text-sm text-gray-600 dark:text-gray-400 mt-0.5">Software Developer</p>
                                    <p class="text-sm text-gray-500 dark:text-gray-500 mt-1 truncate">Hi, I wanted to discuss my interview...</p>
                                    <div class="flex items-center mt-2">
                                        <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800 dark:bg-red-900/50 dark:text-red-200">2 unread</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Conversation Item -->
                        <div @click="selectedChat = 2" :class="selectedChat === 2 ? 'bg-blue-50 dark:bg-blue-900/20 border-blue-200 dark:border-blue-800' : 'bg-white dark:bg-slate-800 border-gray-200 dark:border-slate-700 hover:bg-gray-50 dark:hover:bg-slate-700/50'" class="border rounded-lg p-4 cursor-pointer transition-all duration-200">
                            <div class="flex items-start gap-3">
                                <div class="relative">
                                    <div class="h-10 w-10 rounded-full bg-gradient-to-br from-purple-400 to-pink-400 flex items-center justify-center text-white font-medium">
                                        JC
                                    </div>
                                    <div class="absolute -top-1 -right-1 w-3.5 h-3.5 bg-gray-400 border-2 border-white dark:border-slate-800 rounded-full"></div>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <div class="flex items-center justify-between">
                                        <h3 class="text-sm font-semibold text-gray-900 dark:text-white truncate">James Castillo</h3>
                                        <span class="text-xs text-gray-500 dark:text-gray-400 flex-shrink-0 ml-2">1 hour ago</span>
                                    </div>
                                    <p class="text-sm text-gray-600 dark:text-gray-400 mt-0.5">IT Support</p>
                                    <p class="text-sm text-gray-500 dark:text-gray-500 mt-1 truncate">Thank you for the feedback on my application</p>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Conversation Item -->
                        <div @click="selectedChat = 3" :class="selectedChat === 3 ? 'bg-blue-50 dark:bg-blue-900/20 border-blue-200 dark:border-blue-800' : 'bg-white dark:bg-slate-800 border-gray-200 dark:border-slate-700 hover:bg-gray-50 dark:hover:bg-slate-700/50'" class="border rounded-lg p-4 cursor-pointer transition-all duration-200">
                            <div class="flex items-start gap-3">
                                <div class="relative">
                                    <div class="h-10 w-10 rounded-full bg-gradient-to-br from-green-400 to-teal-400 flex items-center justify-center text-white font-medium">
                                        ER
                                    </div>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <div class="flex items-center justify-between">
                                        <h3 class="text-sm font-semibold text-gray-900 dark:text-white truncate">Eljay Rosal</h3>
                                        <span class="text-xs text-gray-500 dark:text-gray-400 flex-shrink-0 ml-2">2 days ago</span>
                                    </div>
                                    <p class="text-sm text-gray-600 dark:text-gray-400 mt-0.5">UI/UX Designer</p>
                                    <p class="text-sm text-gray-500 dark:text-gray-500 mt-1 truncate">Is there any update on my application?</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Main Chat Area -->
                <div class="flex-1 flex flex-col" x-cloak>
                    <!-- When no chat is selected -->
                    <div x-show="selectedChat === null" 
                        x-transition:enter="transition ease-out duration-200"
                        x-transition:enter-start="opacity-0"
                        x-transition:enter-end="opacity-100"
                        class="flex-1 flex items-center justify-center bg-white dark:bg-slate-800 rounded-lg border border-gray-200 dark:border-slate-700">
                        <div class="text-center">
                            <div class="w-20 h-20 mx-auto mb-4 rounded-full bg-gray-100 dark:bg-slate-700 flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-gray-400 dark:text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                                </svg>
                            </div>
                            <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-1">Select a conversation</h3>
                            <p class="text-gray-500 dark:text-gray-400">Choose a conversation from the list to view messages</p>
                        </div>
                    </div>
                    
                    <!-- Chat Header -->
                    <div x-show="selectedChat === 1" class="bg-white dark:bg-slate-800 border-b border-gray-200 dark:border-slate-700 p-4 rounded-t-lg">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-3">
                                <div class="h-10 w-10 rounded-full bg-gradient-to-br from-blue-400 to-indigo-400 flex items-center justify-center text-white font-medium">
                                    KC
                                </div>
                                <div>
                                    <h3 class="text-sm font-semibold text-gray-900 dark:text-white">Kent Cortiguerra</h3>
                                    <p class="text-sm text-gray-500 dark:text-gray-400">Software Developer</p>
                                </div>
                            </div>
                            <div class="flex items-center gap-2">
                                <button class="p-2 text-gray-400 hover:text-gray-600 dark:hover:text-gray-300 rounded-lg hover:bg-gray-100 dark:hover:bg-slate-700">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Messages Area -->
                    <div x-show="selectedChat === 1" class="flex-1 overflow-y-auto p-6 bg-white dark:bg-slate-800 space-y-4">
                        <!-- Message from applicant -->
                        <div class="flex items-start gap-3">
                            <div class="h-8 w-8 rounded-full bg-gradient-to-br from-blue-400 to-indigo-400 flex items-center justify-center text-white text-sm font-medium flex-shrink-0">
                                KC
                            </div>
                            <div class="flex-1">
                                <div class="bg-gray-100 dark:bg-slate-700 rounded-2xl rounded-tl-none px-4 py-2 inline-block max-w-[70%]">
                                    <p class="text-gray-900 dark:text-white">Hi, I wanted to discuss my interview schedule for the Software Developer position. Is there any flexibility with the timing?</p>
                                </div>
                                <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">10:32 AM</p>
                            </div>
                        </div>
                        
                        <!-- Message from client -->
                        <div class="flex flex-row-reverse items-start gap-3">
                            <div class="h-8 w-8 rounded-full bg-gradient-to-br from-green-400 to-teal-400 flex items-center justify-center text-white text-sm font-medium flex-shrink-0">
                                MP
                            </div>
                            <div class="flex-1 flex flex-col items-end">
                                <div class="bg-blue-600 text-white rounded-2xl rounded-tr-none px-4 py-2 inline-block max-w-[70%]">
                                    <p>Hi Kent, thank you for reaching out. Yes, we have some flexibility with the timing. What time would work best for you?</p>
                                </div>
                                <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">10:35 AM</p>
                            </div>
                        </div>
                        
                        <!-- Message from applicant -->
                        <div class="flex items-start gap-3">
                            <div class="h-8 w-8 rounded-full bg-gradient-to-br from-blue-400 to-indigo-400 flex items-center justify-center text-white text-sm font-medium flex-shrink-0">
                                KC
                            </div>
                            <div class="flex-1">
                                <div class="bg-gray-100 dark:bg-slate-700 rounded-2xl rounded-tl-none px-4 py-2 inline-block max-w-[70%]">
                                    <p class="text-gray-900 dark:text-white">That's great! I would prefer anything after 2 PM if possible. I have other commitments in the morning.</p>
                                </div>
                                <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">10:38 AM</p>
                            </div>
                        </div>
                        
                        <!-- Active conversation indicator -->
                        <div class="p-4 bg-green-50 dark:bg-green-900/10 border border-green-200 dark:border-green-900 rounded-lg">
                            <div class="flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-600 dark:text-green-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                                <p class="text-sm text-green-800 dark:text-green-200">This conversation is active. You can monitor in real-time.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        
        @include('includes.footer')
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Initialize Alpine.js if needed
    if (typeof Alpine !== 'undefined') {
        Alpine.start();
    }
});
</script>