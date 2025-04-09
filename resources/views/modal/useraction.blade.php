<div
            x-data="{ 
                show: false,
                init() {
                    window.addEventListener('open-modal', (e) => {
                        if (e.detail.id === 'add-user-modal') {
                            this.show = true;
                            document.body.classList.add('overflow-hidden');
                        }
                    });
                },
                close() {
                    this.show = false;
                    document.body.classList.remove('overflow-hidden');
                }
            }"
            x-show="show"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black bg-opacity-50"
            style="display: none;"
            @keydown.escape.window="close()"
        >
            <div 
                @click.away="close()"
                x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 transform translate-y-4"
                x-transition:enter-end="opacity-100 transform translate-y-0"
                x-transition:leave="transition ease-in duration-200"
                x-transition:leave-start="opacity-100 transform translate-y-0"
                x-transition:leave-end="opacity-0 transform translate-y-4"
                class="bg-white dark:bg-slate-800 rounded-xl shadow-xl w-full max-w-md mx-auto border border-gray-200 dark:border-slate-700 transition-colors duration-300"
            >
                <!-- Modal Header -->
                <div class="px-6 py-4 border-b border-gray-200 dark:border-slate-700">
                    <div class="flex items-center justify-between">
                        <h3 class="text-lg font-medium text-gray-900 dark:text-white transition-colors duration-300">
                            Add New User
                        </h3>
                        <button @click="close()" class="text-gray-400 hover:text-gray-600 dark:hover:text-gray-200 transition-colors duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>
                
                <!-- Modal Body -->
                <div class="px-6 py-4">
                    <form>
                        <!-- Full Name Field -->
                        <div class="mb-4">
                            <label for="full_name" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1 transition-colors duration-300">
                                Full Name
                            </label>
                            <input 
                                type="text" 
                                id="full_name" 
                                name="full_name" 
                                class="w-full bg-gray-100 dark:bg-slate-700 border border-gray-300 dark:border-slate-600 rounded-lg py-2.5 px-4 text-gray-800 dark:text-white placeholder-gray-500 dark:placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500/50 transition-colors duration-300"
                                placeholder="Enter full name"
                                required
                            >
                        </div>
                        
                        <!-- Email Field -->
                        <div class="mb-4">
                            <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1 transition-colors duration-300">
                                Email Address
                            </label>
                            <input 
                                type="email" 
                                id="email" 
                                name="email" 
                                class="w-full bg-gray-100 dark:bg-slate-700 border border-gray-300 dark:border-slate-600 rounded-lg py-2.5 px-4 text-gray-800 dark:text-white placeholder-gray-500 dark:placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500/50 transition-colors duration-300"
                                placeholder="Enter email address"
                                required
                            >
                        </div>
                        
                        <!-- Phone Number Field -->
                        <div class="mb-4">
                            <label for="phone" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1 transition-colors duration-300">
                                Phone Number
                            </label>
                            <input 
                                type="tel" 
                                id="phone" 
                                name="phone" 
                                class="w-full bg-gray-100 dark:bg-slate-700 border border-gray-300 dark:border-slate-600 rounded-lg py-2.5 px-4 text-gray-800 dark:text-white placeholder-gray-500 dark:placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500/50 transition-colors duration-300"
                                placeholder="+1 (XXX) XXX-XXXX"
                            >
                        </div>
                        
                        <!-- Password Field -->
                        <div class="mb-4">
                            <label for="password" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1 transition-colors duration-300">
                                Password
                            </label>
                            <input 
                                type="password" 
                                id="password" 
                                name="password" 
                                class="w-full bg-gray-100 dark:bg-slate-700 border border-gray-300 dark:border-slate-600 rounded-lg py-2.5 px-4 text-gray-800 dark:text-white placeholder-gray-500 dark:placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500/50 transition-colors duration-300"
                                placeholder="Enter password"
                                required
                            >
                        </div>
                        
                        <!-- Role Selection -->
                        <div class="mb-4">
                            <label for="role" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1 transition-colors duration-300">
                                Role
                            </label>
                            <select 
                                id="role" 
                                name="role" 
                                class="w-full bg-gray-100 dark:bg-slate-700 border border-gray-300 dark:border-slate-600 rounded-lg py-2.5 px-4 text-gray-800 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500/50 transition-colors duration-300"
                                required
                            >
                                <option value="" disabled selected>Select a role</option>
                                <option value="admin">Administrator</option>
                                <option value="manager">Manager</option>
                                <option value="staff">Staff</option>
                                <option value="user">Regular User</option>
                            </select>
                        </div>
                        
                        <!-- Status Selection -->
                        <div class="mb-4">
                            <label for="status" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1 transition-colors duration-300">
                                Status
                            </label>
                            <select 
                                id="status" 
                                name="status" 
                                class="w-full bg-gray-100 dark:bg-slate-700 border border-gray-300 dark:border-slate-600 rounded-lg py-2.5 px-4 text-gray-800 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500/50 transition-colors duration-300"
                                required
                            >
                                <option value="active" selected>Active</option>
                                <option value="inactive">Inactive</option>
                                <option value="pending">Pending</option>
                            </select>
                        </div>
                    </form>
                </div>
                
                <!-- Modal Footer -->
                <div class="px-6 py-4 border-t border-gray-200 dark:border-slate-700 flex justify-end space-x-3">
                    <button 
                        @click="close()" 
                        class="px-4 py-2 bg-gray-200 hover:bg-gray-300 dark:bg-slate-700 dark:hover:bg-slate-600 text-gray-800 dark:text-gray-200 rounded-lg transition-colors duration-200"
                    >
                        Cancel
                    </button>
                    <button 
                        class="px-4 py-2 bg-blue-600 hover:bg-blue-700 dark:bg-blue-700 dark:hover:bg-blue-600 text-white rounded-lg transition-colors duration-200 shadow-md"
                    >
                        Add User
                    </button>
                </div>
            </div>
        </div>

        <!-- Edit User Modal -->
        <div
            x-data="{ 
                show: false,
                user: {
                    id: null,
                    name: '',
                    email: '',
                    phone: '',
                    role: '',
                    status: ''
                },
                init() {
                    window.addEventListener('open-modal', (e) => {
                        if (e.detail.id === 'edit-user-modal') {
                            this.user = e.detail.user;
                            this.show = true;
                            document.body.classList.add('overflow-hidden');
                        }
                    });
                },
                close() {
                    this.show = false;
                    document.body.classList.remove('overflow-hidden');
                }
            }"
            x-show="show"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black bg-opacity-50"
            style="display: none;"
            @keydown.escape.window="close()"
        >
            <div 
                @click.away="close()"
                x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 transform translate-y-4"
                x-transition:enter-end="opacity-100 transform translate-y-0"
                x-transition:leave="transition ease-in duration-200"
                x-transition:leave-start="opacity-100 transform translate-y-0"
                x-transition:leave-end="opacity-0 transform translate-y-4"
                class="bg-white dark:bg-slate-800 rounded-xl shadow-xl w-full max-w-md mx-auto border border-gray-200 dark:border-slate-700 transition-colors duration-300"
            >
                <!-- Modal Header -->
                <div class="px-6 py-4 border-b border-gray-200 dark:border-slate-700">
                    <div class="flex items-center justify-between">
                        <h3 class="text-lg font-medium text-gray-900 dark:text-white transition-colors duration-300">
                            Edit User
                        </h3>
                        <button @click="close()" class="text-gray-400 hover:text-gray-600 dark:hover:text-gray-200 transition-colors duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>
                
                <!-- Modal Body -->
                <div class="px-6 py-4">
                    <form>
                        <!-- Full Name Field -->
                        <div class="mb-4">
                            <label for="edit_full_name" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1 transition-colors duration-300">
                                Full Name
                            </label>
                            <input 
                                type="text" 
                                id="edit_full_name" 
                                name="full_name" 
                                x-model="user.name"
                                class="w-full bg-gray-100 dark:bg-slate-700 border border-gray-300 dark:border-slate-600 rounded-lg py-2.5 px-4 text-gray-800 dark:text-white placeholder-gray-500 dark:placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500/50 transition-colors duration-300"
                                required
                            >
                        </div>
                        
                        <!-- Email Field -->
                        <div class="mb-4">
                            <label for="edit_email" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1 transition-colors duration-300">
                                Email Address
                            </label>
                            <input 
                                type="email" 
                                id="edit_email" 
                                name="email" 
                                x-model="user.email"
                                class="w-full bg-gray-100 dark:bg-slate-700 border border-gray-300 dark:border-slate-600 rounded-lg py-2.5 px-4 text-gray-800 dark:text-white placeholder-gray-500 dark:placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500/50 transition-colors duration-300"
                                required
                            >
                        </div>
                        
                        <!-- Phone Number Field -->
                        <div class="mb-4">
                            <label for="edit_phone" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1 transition-colors duration-300">
                                Phone Number
                            </label>
                            <input 
                                type="tel" 
                                id="edit_phone" 
                                name="phone" 
                                x-model="user.phone"
                                class="w-full bg-gray-100 dark:bg-slate-700 border border-gray-300 dark:border-slate-600 rounded-lg py-2.5 px-4 text-gray-800 dark:text-white placeholder-gray-500 dark:placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500/50 transition-colors duration-300"
                            >
                        </div>
                        
                        <!-- Role Selection -->
                        <div class="mb-4">
                            <label for="edit_role" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1 transition-colors duration-300">
                                Role
                            </label>
                            <select 
                                id="edit_role" 
                                name="role" 
                                x-model="user.role"
                                class="w-full bg-gray-100 dark:bg-slate-700 border border-gray-300 dark:border-slate-600 rounded-lg py-2.5 px-4 text-gray-800 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500/50 transition-colors duration-300"
                                required
                            >
                                <option value="Administrator">Administrator</option>
                                <option value="Manager">Manager</option>
                                <option value="Staff">Staff</option>
                                <option value="Regular User">Regular User</option>
                            </select>
                        </div>
                        
                        <!-- Status Selection -->
                        <div class="mb-4">
                            <label for="edit_status" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1 transition-colors duration-300">
                                Status
                            </label>
                            <select 
                                id="edit_status" 
                                name="status" 
                                x-model="user.status"
                                class="w-full bg-gray-100 dark:bg-slate-700 border border-gray-300 dark:border-slate-600 rounded-lg py-2.5 px-4 text-gray-800 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500/50 transition-colors duration-300"
                                required
                            >
                                <option value="Active">Active</option>
                                <option value="Inactive">Inactive</option>
                                <option value="Pending">Pending</option>
                            </select>
                        </div>
                    </form>
                </div>
                
                <!-- Modal Footer -->
                <div class="px-6 py-4 border-t border-gray-200 dark:border-slate-700 flex justify-end space-x-3">
                    <button 
                        @click="close()" 
                        class="px-4 py-2 bg-gray-200 hover:bg-gray-300 dark:bg-slate-700 dark:hover:bg-slate-600 text-gray-800 dark:text-gray-200 rounded-lg transition-colors duration-200"
                    >
                        Cancel
                    </button>
                    <button 
                        class="px-4 py-2 bg-blue-600 hover:bg-blue-700 dark:bg-blue-700 dark:hover:bg-blue-600 text-white rounded-lg transition-colors duration-200 shadow-md"
                    >
                        Update User
                    </button>
                </div>
            </div>
        </div>