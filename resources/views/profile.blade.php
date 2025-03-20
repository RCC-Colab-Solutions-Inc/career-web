@include('includes.header')

<!-- Main Container -->
<div class="flex h-screen overflow-hidden transition-colors duration-300" id="main-container">
    
   @include('includes.side')
    
    <!-- Main Content -->
    <div class="flex-1 overflow-x-hidden overflow-y-auto transition-colors duration-300 bg-slate-50 dark:bg-slate-900" id="content-area">
        
    @include('includes.nav')
        
        <!-- Profile Content -->
        <main class="p-6 transition-colors duration-300">
            <!-- Page Title -->
            <div class="mb-8">
                <h1 class="text-2xl font-bold text-slate-800 dark:text-white transition-colors duration-300">My Profile</h1>
                <p class="text-slate-600 dark:text-blue-200/70 transition-colors duration-300">Manage your account information and settings</p>
            </div>
            
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Profile Overview Card -->
                <div class="lg:col-span-1">
                    <div class="bg-white dark:bg-gradient-to-br dark:from-slate-800/80 dark:to-slate-900/90 rounded-xl shadow-lg border border-slate-200 dark:border-slate-700/50 backdrop-blur-sm p-6 transition-colors duration-300">
                        <div class="flex flex-col items-center justify-center">
                            <!-- Profile Avatar -->
                            <div class="h-24 w-24 mb-4 rounded-full overflow-hidden bg-gradient-to-br from-blue-500 to-indigo-600 flex items-center justify-center text-white text-3xl font-bold shadow-md border-2 border-white dark:border-slate-700">
                                <span>{{ substr(Auth::user()->name, 0, 1) }}</span>
                            </div>
                            
                            <!-- Name & Email -->
                            <h2 class="text-xl font-semibold text-slate-800 dark:text-white mb-1 transition-colors duration-300">{{ Auth::user()->name }}</h2>
                            <p class="text-slate-500 dark:text-blue-200/70 mb-4 transition-colors duration-300">{{ Auth::user()->email }}</p>
                            
                            <!-- Account Status -->
                            <div class="w-full mt-4 py-3 px-4 bg-green-50 dark:bg-green-900/20 text-green-700 dark:text-green-400 rounded-lg border border-green-100 dark:border-green-800/30 transition-colors duration-300">
                                <div class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <span class="font-medium">Active Account</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Profile Settings Cards -->
                <div class="lg:col-span-2 space-y-6">
                    <!-- Personal Information Card -->
                    <div class="bg-white dark:bg-gradient-to-br dark:from-slate-800/80 dark:to-slate-900/90 rounded-xl shadow-lg border border-slate-200 dark:border-slate-700/50 backdrop-blur-sm p-6 transition-colors duration-300">
                        <h3 class="text-lg font-semibold text-slate-800 dark:text-white mb-4 transition-colors duration-300">Personal Information</h3>
                        
                        <form id="personalInfoForm">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                                <div>
                                    <label for="firstName" class="block text-sm font-medium text-slate-700 dark:text-blue-200/90 mb-1 transition-colors duration-300">First Name</label>
                                    <input type="text" id="firstName" name="firstName" value="{{ explode(' ', Auth::user()->name)[0] }}" class="w-full px-4 py-2 rounded-lg border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-800/80 text-slate-800 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500 dark:focus:ring-blue-600 transition-colors duration-300">
                                </div>
                                <div>
                                    <label for="lastName" class="block text-sm font-medium text-slate-700 dark:text-blue-200/90 mb-1 transition-colors duration-300">Last Name</label>
                                    <input type="text" id="lastName" name="lastName" value="{{ count(explode(' ', Auth::user()->name)) > 1 ? explode(' ', Auth::user()->name)[1] : '' }}" class="w-full px-4 py-2 rounded-lg border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-800/80 text-slate-800 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500 dark:focus:ring-blue-600 transition-colors duration-300">
                                </div>
                                <div>
                                    <label for="email" class="block text-sm font-medium text-slate-700 dark:text-blue-200/90 mb-1 transition-colors duration-300">Email Address</label>
                                    <input type="email" id="email" name="email" value="{{ Auth::user()->email }}" class="w-full px-4 py-2 rounded-lg border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-800/80 text-slate-800 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500 dark:focus:ring-blue-600 transition-colors duration-300">
                                </div>
                                <div>
                                    <label for="phone" class="block text-sm font-medium text-slate-700 dark:text-blue-200/90 mb-1 transition-colors duration-300">Phone Number</label>
                                    <input type="tel" id="phone" name="phone" placeholder="(000) 123-4567" class="w-full px-4 py-2 rounded-lg border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-800/80 text-slate-800 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500 dark:focus:ring-blue-600 transition-colors duration-300">
                                </div>
                            </div>
                            
                            <div class="flex justify-end">
                                <button id="savePersonalInfo" type="submit" class="px-5 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg shadow-md transition-colors duration-300">Save Changes</button>
                            </div>

                            <!-- Success Message -->
                            <div id="personalInfoSuccess" class="hidden mt-4 py-3 px-4 bg-green-50 dark:bg-green-900/20 text-green-700 dark:text-green-400 rounded-lg border border-green-100 dark:border-green-800/30 transition-colors duration-300">
                                <div class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <span class="font-medium">Information updated successfully!</span>
                                </div>
                            </div>
                        </form>
                    </div>
                    
                    <!-- Password Update Card -->
                    <div class="bg-white dark:bg-gradient-to-br dark:from-slate-800/80 dark:to-slate-900/90 rounded-xl shadow-lg border border-slate-200 dark:border-slate-700/50 backdrop-blur-sm p-6 transition-colors duration-300">
                        <h3 class="text-lg font-semibold text-slate-800 dark:text-white mb-4 transition-colors duration-300">Update Password</h3>
                        
                        <form id="passwordUpdateForm">
                            <div class="grid grid-cols-1 gap-6 mb-6">
                                <div>
                                    <label for="currentPassword" class="block text-sm font-medium text-slate-700 dark:text-blue-200/90 mb-1 transition-colors duration-300">Current Password</label>
                                    <input type="password" id="currentPassword" name="currentPassword" placeholder="Enter current password" class="w-full px-4 py-2 rounded-lg border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-800/80 text-slate-800 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500 dark:focus:ring-blue-600 transition-colors duration-300">
                                </div>
                                <div>
                                    <label for="newPassword" class="block text-sm font-medium text-slate-700 dark:text-blue-200/90 mb-1 transition-colors duration-300">New Password</label>
                                    <input type="password" id="newPassword" name="newPassword" placeholder="Enter new password" class="w-full px-4 py-2 rounded-lg border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-800/80 text-slate-800 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500 dark:focus:ring-blue-600 transition-colors duration-300">
                                </div>
                                <div>
                                    <label for="confirmPassword" class="block text-sm font-medium text-slate-700 dark:text-blue-200/90 mb-1 transition-colors duration-300">Confirm New Password</label>
                                    <input type="password" id="confirmPassword" name="confirmPassword" placeholder="Enter confirm new password" class="w-full px-4 py-2 rounded-lg border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-800/80 text-slate-800 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500 dark:focus:ring-blue-600 transition-colors duration-300">
                                </div>
                            </div>
                            
                            <div class="flex justify-end">
                                <button id="updatePassword" type="submit" class="px-5 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg shadow-md transition-colors duration-300">Update Password</button>
                            </div>

                            <!-- Success Message -->
                            <div id="passwordSuccess" class="hidden mt-4 py-3 px-4 bg-green-50 dark:bg-green-900/20 text-green-700 dark:text-green-400 rounded-lg border border-green-100 dark:border-green-800/30 transition-colors duration-300">
                                <div class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <span class="font-medium">Password updated successfully!</span>
                                </div>
                            </div>
                        </form>
                    </div>
                    
                </div>
            </div>
        </main>
    </div>
</div>

@include('includes.footer')

<script>
    document.getElementById('savePersonalInfo').addEventListener('click', function(e) {
        e.preventDefault();
        document.getElementById('personalInfoSuccess').classList.remove('hidden');
        setTimeout(function() {
            document.getElementById('personalInfoSuccess').classList.add('hidden');
        }, 3000);
    });
    
    document.getElementById('updatePassword').addEventListener('click', function(e) {
        e.preventDefault();
        document.getElementById('passwordSuccess').classList.remove('hidden');
        setTimeout(function() {
            document.getElementById('passwordSuccess').classList.add('hidden');
        }, 3000);
    });
</script>