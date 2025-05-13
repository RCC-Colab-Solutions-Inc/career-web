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
                    
                    <!-- Conversations List -->
                    <div class="flex-1 overflow-y-auto space-y-2 pr-2 conversations-container">
                        <div class="text-center py-8">
                            <p class="text-gray-500 dark:text-gray-400">Loading conversations...</p>
                        </div>
                    </div>
                </div>
                
                <!-- Main Chat Area -->
                <div class="flex-1 flex flex-col">
                <!-- When no chat is selected - keep this section -->
                <div class="no-selection flex-1 flex items-center justify-center bg-white dark:bg-slate-800 rounded-lg border border-gray-200 dark:border-slate-700">
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
            </div>
        </main>
        
        @include('includes.footer')
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const conversationsApp = {
        conversations: [],
        filteredConversations: [],
        messages: [],
        selectedChat: null,
        selectedConversation: null,
        searchQuery: '',

        init() {
            this.loadConversations();
            this.setupEventListeners();
        },

        setupEventListeners() {
            // Add search functionality
            const searchInput = document.querySelector('input[placeholder="Search conversations..."]');
            if (searchInput) {
                searchInput.addEventListener('input', (e) => {
                    this.searchQuery = e.target.value.toLowerCase();
                    this.filterConversations();
                });
            }

            // Auto-refresh
            setInterval(() => {
                this.loadConversations();
                if (this.selectedChat) {
                    this.loadMessages(this.selectedChat);
                }
            }, 30000);
        },

        filterConversations() {
            if (!this.searchQuery) {
                this.filteredConversations = this.conversations;
            } else {
                this.filteredConversations = this.conversations.filter(conv => {
                    const searchableText = [
                        conv.applicant_name,
                        conv.applicant_email,
                        conv.company_name,
                        conv.job_title,
                        conv.last_message
                    ].filter(Boolean).join(' ').toLowerCase();
                    
                    return searchableText.includes(this.searchQuery);
                });
            }
            this.renderConversations();
        },

        async loadConversations() {
            try {
                const response = await fetch('/admin/messages-conversations', {
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'Accept': 'application/json'
                    }
                });
                
                if (!response.ok) {
                    throw new Error(`HTTP error! status: ${response.status}`);
                }
                
                const data = await response.json();
                
                if (data.status === 'success') {
                    this.conversations = data.data;
                    this.filterConversations(); // Apply filter after loading
                }
            } catch (error) {
                console.error('Error loading conversations:', error);
            }
        },

        async loadMessages(conversationId) {
            try {
                const response = await fetch(`/admin/messages-conversation/${conversationId}`, {
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'Accept': 'application/json'
                    }
                });
                
                if (!response.ok) {
                    throw new Error(`HTTP error! status: ${response.status}`);
                }
                
                const data = await response.json();
                
                if (data.status === 'success') {
                    this.messages = data.data;
                    this.selectedConversation = data.conversation;
                    this.renderMessages();
                }
            } catch (error) {
                console.error('Error loading messages:', error);
            }
        },

        renderConversations() {
            const container = document.querySelector('.conversations-container');
            if (!container) return;
            
            if (this.filteredConversations.length === 0) {
                container.innerHTML = `
                    <div class="text-center py-8">
                        <p class="text-gray-500 dark:text-gray-400">
                            ${this.searchQuery ? 'No conversations found matching your search.' : 'No conversations yet.'}
                        </p>
                    </div>
                `;
                return;
            }
            
            container.innerHTML = this.filteredConversations.map(conv => `
                <div class="border rounded-lg p-4 cursor-pointer transition-all duration-200 ${this.selectedChat === conv.id ? 'bg-blue-50 dark:bg-blue-900/20 border-blue-200 dark:border-blue-800' : 'bg-white dark:bg-slate-800 border-gray-200 dark:border-slate-700 hover:bg-gray-50 dark:hover:bg-slate-700/50'}" 
                     onclick="conversationsApp.selectChat(${conv.id})">
                    <div class="flex items-start gap-3">
                        <div class="relative">
                            <div class="h-10 w-10 rounded-full bg-gradient-to-br from-blue-400 to-indigo-400 flex items-center justify-center text-white font-medium">
                                ${conv.applicant_initial}
                            </div>
                            ${conv.is_active ? '<div class="absolute -top-1 -right-1 w-3.5 h-3.5 bg-green-500 border-2 border-white dark:border-slate-800 rounded-full"></div>' : ''}
                        </div>
                        <div class="flex-1 min-w-0">
                            <div class="flex items-center justify-between">
                                <h3 class="text-sm font-semibold text-gray-900 dark:text-white truncate">${this.highlightSearch(conv.applicant_name)}</h3>
                                <span class="text-xs text-gray-500 dark:text-gray-400 flex-shrink-0 ml-2">${conv.last_message_time || ''}</span>
                            </div>
                            <p class="text-sm text-gray-600 dark:text-gray-400 mt-0.5">${this.highlightSearch(conv.job_title)}</p>
                            <p class="text-xs text-gray-500 dark:text-gray-500 mt-0.5">Company: ${this.highlightSearch(conv.company_name)}</p>
                            <p class="text-sm text-gray-500 dark:text-gray-500 mt-1 truncate">${this.highlightSearch(conv.last_message || 'No messages yet')}</p>
                            ${conv.unread_count > 0 ? `
                                <div class="flex items-center mt-2">
                                    <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800 dark:bg-red-900/50 dark:text-red-200">${conv.unread_count} unread</span>
                                </div>
                            ` : ''}
                        </div>
                    </div>
                </div>
            `).join('');
        },

        highlightSearch(text) {
            if (!text || !this.searchQuery) return text;
            
            const regex = new RegExp(`(${this.searchQuery})`, 'gi');
            return text.replace(regex, '<mark class="bg-yellow-200 dark:bg-yellow-900">$1</mark>');
        },

        renderMessages() {
            const headerContainer = document.querySelector('.chat-header');
            const messagesContainer = document.querySelector('.messages-container');
            const noSelection = document.querySelector('.no-selection');
            
            if (noSelection) noSelection.style.display = 'none';
            if (headerContainer) headerContainer.style.display = 'block';
            if (messagesContainer) messagesContainer.style.display = 'block';
            
            if (headerContainer && this.selectedConversation) {
                headerContainer.innerHTML = `
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-3">
                            <div class="text-sm">
                                <h3 class="font-semibold text-gray-900 dark:text-white">
                                    ${this.selectedConversation.applicant_name} ↔ ${this.selectedConversation.company_name}
                                </h3>
                                <p class="text-gray-500 dark:text-gray-400">${this.selectedConversation.job_title}</p>
                            </div>
                        </div>
                    </div>
                `;
            }

            if (messagesContainer) {
                messagesContainer.innerHTML = this.messages.map(msg => `
                    <div class="flex ${msg.sender_type === 'Company' ? 'flex-row-reverse' : ''} items-start gap-3">
                        <div class="h-8 w-8 rounded-full bg-gradient-to-br ${msg.sender_type === 'Company' ? 'from-green-400 to-teal-400' : 'from-blue-400 to-indigo-400'} flex items-center justify-center text-white text-sm font-medium flex-shrink-0">
                            ${msg.initial}
                        </div>
                        <div class="flex-1 ${msg.sender_type === 'Company' ? 'flex flex-col items-end' : ''}">
                            <div class="${msg.sender_type === 'Company' ? 'bg-blue-600 text-white' : 'bg-gray-100 dark:bg-slate-700'} rounded-2xl ${msg.sender_type === 'Company' ? 'rounded-tr-none' : 'rounded-tl-none'} px-4 py-2 inline-block max-w-[70%]">
                                <p class="${msg.sender_type === 'Company' ? 'text-white' : 'text-gray-900 dark:text-white'}">${msg.content[0]}</p>
                            </div>
                            <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">${msg.time}</p>
                        </div>
                    </div>
                `).join('');

                messagesContainer.scrollTop = messagesContainer.scrollHeight;
            }
        },

        selectChat(conversationId) {
            this.selectedChat = conversationId;
            this.loadMessages(conversationId);
            this.renderConversations();
        }
    };

    conversationsApp.init();

    window.conversationsApp = conversationsApp;
});
</script>