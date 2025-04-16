<!-- Add IP Address Modal -->
<div
    x-data="{ 
        show: false,
        init() {
            this.$watch('$store.modals.addIpModal', value => {
                if (value === true) {
                    this.show = true;
                    document.body.classList.add('overflow-hidden');
                } else {
                    this.show = false;
                    document.body.classList.remove('overflow-hidden');
                }
            });
        },
        close() {
            $store.modals.addIpModal = false;
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
                    Add New IP Address
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
                <!-- IP Address Field -->
                <div class="mb-4">
                    <label for="ip-address" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1 transition-colors duration-300">
                        IP Address
                    </label>
                    <input 
                        type="text" 
                        id="ip-address" 
                        name="ip-address" 
                        class="w-full bg-gray-100 dark:bg-slate-700 border border-gray-300 dark:border-slate-600 rounded-lg py-2.5 px-4 text-gray-800 dark:text-white placeholder-gray-500 dark:placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500/50 transition-colors duration-300"
                        placeholder="Enter IP address"
                        required
                    >
                </div>
                
                <!-- Label/Description Field -->
                <div class="mb-4">
                    <label for="ip-label" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1 transition-colors duration-300">
                        Label/Description
                    </label>
                    <input 
                        type="text" 
                        id="ip-label" 
                        name="ip-label" 
                        class="w-full bg-gray-100 dark:bg-slate-700 border border-gray-300 dark:border-slate-600 rounded-lg py-2.5 px-4 text-gray-800 dark:text-white placeholder-gray-500 dark:placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500/50 transition-colors duration-300"
                        placeholder="Enter description"
                        required
                    >
                </div>
                
                <!-- Location Field -->
                <div class="mb-4">
                    <label for="ip-location" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1 transition-colors duration-300">
                        Location
                    </label>
                    <input 
                        type="text" 
                        id="ip-location" 
                        name="ip-location" 
                        class="w-full bg-gray-100 dark:bg-slate-700 border border-gray-300 dark:border-slate-600 rounded-lg py-2.5 px-4 text-gray-800 dark:text-white placeholder-gray-500 dark:placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500/50 transition-colors duration-300"
                        placeholder="Enter location"
                    >
                </div>
                
                <!-- Status Selection -->
                <div class="mb-4">
                    <label for="ip-status" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1 transition-colors duration-300">
                        Status
                    </label>
                    <select 
                        id="ip-status" 
                        name="ip-status" 
                        class="w-full bg-gray-100 dark:bg-slate-700 border border-gray-300 dark:border-slate-600 rounded-lg py-2.5 px-4 text-gray-800 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500/50 transition-colors duration-300"
                        required
                    >
                        <option value="active" selected>Active</option>
                        <option value="blocked">Blocked</option>
                        <option value="watchlist">Watchlist</option>
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
                Add IP Address
            </button>
        </div>
    </div>
</div>

<!-- Edit IP Address Modal -->
<div
    x-data="{ 
        show: false,
        ip: {
            address: '',
            label: '',
            location: '',
            status: 'active'
        },
        init() {
            this.$watch('$store.modals.editIpModal', value => {
                if (value.show === true) {
                    this.ip = value.ip;
                    this.show = true;
                    document.body.classList.add('overflow-hidden');
                } else {
                    this.show = false;
                    document.body.classList.remove('overflow-hidden');
                }
            });
        },
        close() {
            $store.modals.editIpModal = {show: false, ip: {}};
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
                    Edit IP Address
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
                <!-- IP Address Field -->
                <div class="mb-4">
                    <label for="edit-ip-address" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1 transition-colors duration-300">
                        IP Address
                    </label>
                    <input 
                        type="text" 
                        id="edit-ip-address" 
                        name="ip-address" 
                        x-model="ip.address"
                        class="w-full bg-gray-100 dark:bg-slate-700 border border-gray-300 dark:border-slate-600 rounded-lg py-2.5 px-4 text-gray-800 dark:text-white placeholder-gray-500 dark:placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500/50 transition-colors duration-300"
                        required
                    >
                </div>
                
                <!-- Label/Description Field -->
                <div class="mb-4">
                    <label for="edit-ip-label" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1 transition-colors duration-300">
                        Label/Description
                    </label>
                    <input 
                        type="text" 
                        id="edit-ip-label" 
                        name="ip-label" 
                        x-model="ip.label"
                        class="w-full bg-gray-100 dark:bg-slate-700 border border-gray-300 dark:border-slate-600 rounded-lg py-2.5 px-4 text-gray-800 dark:text-white placeholder-gray-500 dark:placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500/50 transition-colors duration-300"
                        required
                    >
                </div>
                
                <!-- Location Field -->
                <div class="mb-4">
                    <label for="edit-ip-location" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1 transition-colors duration-300">
                        Location
                    </label>
                    <input 
                        type="text" 
                        id="edit-ip-location" 
                        name="ip-location" 
                        x-model="ip.location"
                        class="w-full bg-gray-100 dark:bg-slate-700 border border-gray-300 dark:border-slate-600 rounded-lg py-2.5 px-4 text-gray-800 dark:text-white placeholder-gray-500 dark:placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500/50 transition-colors duration-300"
                    >
                </div>
                
                <!-- Status Selection -->
                <div class="mb-4">
                    <label for="edit-ip-status" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1 transition-colors duration-300">
                        Status
                    </label>
                    <select 
                        id="edit-ip-status" 
                        name="ip-status" 
                        x-model="ip.status"
                        class="w-full bg-gray-100 dark:bg-slate-700 border border-gray-300 dark:border-slate-600 rounded-lg py-2.5 px-4 text-gray-800 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500/50 transition-colors duration-300"
                        required
                    >
                        <option value="active">Active</option>
                        <option value="blocked">Blocked</option>
                        <option value="watchlist">Watchlist</option>
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
                Save Changes
            </button>
        </div>
    </div>
</div>