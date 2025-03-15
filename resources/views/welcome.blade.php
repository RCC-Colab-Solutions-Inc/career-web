@include('includes.header')
    <div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-slate-700 to-slate-900 px-4 py-12">
        <div class="w-full max-w-md perspective-1000">
            <div class="bg-gradient-to-r from-blue-800 to-indigo-900 shadow-2xl rounded-2xl overflow-hidden border border-slate-600 transform transition-all duration-500 hover:rotate-y-10 hover:shadow-blue-900/30 hover:shadow-2xl relative">
                <!-- Chip -->
                <div class="absolute top-12 left-8">
                    <div class="w-12 h-10 bg-yellow-400 bg-opacity-80 rounded-md border-2 border-yellow-500 grid grid-cols-3 grid-rows-3 p-1">
                        <span class="bg-yellow-600 col-span-1"></span>
                        <span class="bg-yellow-600 col-span-1"></span>
                        <span class="bg-yellow-600 col-span-1"></span>
                        <span class="bg-yellow-600 col-span-1"></span>
                        <span class="bg-yellow-600 col-span-1"></span>
                    </div>
                </div>
                
                
                
                <!-- Logo -->
                <div class="relative flex justify-end pt-6 pb-4 px-8">
                    <img src="{{ asset('assets/RCCLogo-White.png') }}" alt="RCC Colab Solutions" class="h-12 relative z-10 brightness-200 contrast-125">
                </div>
                
                <div class="px-8 pt-4 pb-6 text-left">
                    <h2 class="text-3xl font-bold text-white tracking-wider font-mono" style="text-shadow: 0 2px 5px rgba(0,0,0,0.3);">WELCOME!</h2>
                    
                </div>
                
                
                
                <form action="/login" method="POST" class="p-8 space-y-6 bg-gradient-to-b from-transparent to-black/20 backdrop-blur-sm">
                    <!-- Email Address -->
                    <div>
                        @csrf
                        <label for="email" class="block text-sm font-medium text-blue-100 mb-2 uppercase tracking-wider">Email Address</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-blue-300" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                                    <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                                </svg>
                            </div>
                            <input 
                                type="email" 
                                id="email" 
                                name="email" 
                                required 
                                class="w-full pl-10 pr-4 py-3 bg-blue-900/30 backdrop-blur-sm border border-blue-400/30 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent transition duration-300 text-white placeholder-blue-300/70"
                                placeholder="Enter your email"
                            >
                        </div>
                    </div>
                    
                    <!-- Password -->
                    <div>
                        <label for="password" class="block text-sm font-medium text-blue-100 mb-2 uppercase tracking-wider">Password</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-blue-300" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            <input 
                                type="password" 
                                id="password" 
                                name="password" 
                                required 
                                class="w-full pl-10 pr-10 py-3 bg-blue-900/30 backdrop-blur-sm border border-blue-400/30 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent transition duration-300 text-white placeholder-blue-300/70"
                                placeholder="Enter your password"
                            >
                            <button 
                                type="button" 
                                class="absolute inset-y-0 right-0 pr-3 flex items-center text-blue-300 hover:text-white transition duration-300"
                            >
                                <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                                    <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd" />
                                </svg>
                            </button>
                        </div>
                    </div>
                    
                    <!-- Sign In Button -->
                    <div class="py-2">
                        <div class="h-2 bg-black/20 rounded-full"></div>
                    </div>
                    
                    <button 
                        type="submit" 
                        class="w-full py-3.5 px-4 border border-transparent rounded-xl shadow-lg text-white bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-300 transform hover:-translate-y-0.5 active:translate-y-0 uppercase tracking-wider font-semibold"
                    >
                        Sign In
                    </button>
                    
                    <!-- style footer -->
                    <div class="flex justify-between items-center font-mono text-xs text-blue-200/70 pt-2">
                        <span>RCC Colab Solutions</span>
                        <span>LOGIN PORTAL</span>
                    </div>
                </form>
            </div>
        </div>
    </div>
@include('includes.footer')