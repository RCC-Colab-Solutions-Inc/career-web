@include('includes.header')

    <div class="flex h-screen">
        <!-- Left side - Login Form -->
        <div class="w-full md:w-1/2 flex items-center justify-center px-8 md:px-16 lg:px-24">
            <div class="w-full max-w-md">
                <!-- Logo -->
                <div class="mb-8">
                    <img src="{{ asset('assets/RCCLogo-Blue.png') }}" alt="RCC Logo" class="h-16">
                </div>
                
                <!-- Login Form -->
                <div class="mb-8">
                    <h1 class="text-center text-3xl font-bold text-gray-900 mb-2">Login to your account.</h1>
                    <p class="text-center text-gray-600">Hello, welcome back to your account</p>
                </div>
                
                
                    
                    <!-- Company Email -->
                    <div class="relative h-14 mb-2">
                    <input 
                        type="email"
                        placeholder="example@gmail.com"
                        name="email"
                        id="email" 
                        required
                        class="peer h-14 w-full bg-transparent outline-none px-4 pt-2 text-base rounded-xl bg-white border border-gray-300 focus:border-[#0A2472] focus:shadow-md transition-all placeholder-transparent focus:placeholder-gray-400"
                    >
                        <label 
                            for="email"
                            class="absolute top-1/2 translate-y-[-50%] bg-white left-4 px-2 text-gray-600 peer-focus:top-0 peer-focus:left-3 peer-focus:text-sm peer-focus:text-[#0A2472] peer-valid:top-0 peer-valid:left-3 peer-valid:text-sm peer-valid:text-[#0A2472] duration-150"
                        >
                            Company Email
                        </label>
                    </div>
                    
                    <!-- Sign in code -->
                    <div class="relative h-14 mt-6">
                    <input 
                        type="password"
                        placeholder="Sign In Code" 
                        name="code"
                        id="code" 
                        required
                        class="peer h-14 w-full bg-transparent outline-none px-4 pt-2 text-base rounded-xl bg-white border border-gray-300 focus:border-[#0A2472] focus:shadow-md transition-all placeholder-transparent focus:placeholder-gray-400"
                    >
                        <label 
                            for="code"
                            class="absolute top-1/2 translate-y-[-50%] bg-white left-4 px-2 text-gray-600 peer-focus:top-0 peer-focus:left-3 peer-focus:text-sm peer-focus:text-[#0A2472] peer-valid:top-0 peer-valid:left-3 peer-valid:text-sm peer-valid:text-[#0A2472] duration-150"
                        >
                            Sign in code
                        </label>
                    </div>
                    
                    <!-- reCAPTCHA -->
                    <div class="my-4">
                        <div class="border border-gray-300 rounded-md bg-white p-3 h-[78px] w-full flex items-center">
                            <div class="flex items-center">
                                <input 
                                    type="checkbox" 
                                    id="not-robot" 
                                    required
                                    class="w-5 h-5 border-gray-300 rounded"
                                >
                                <label for="not-robot" class="ml-2 text-gray-700 text-sm">
                                    I'm not a robot
                                </label>
                            </div>
                            <div class="ml-auto">
                                <div class="flex flex-col items-center">
                                    <img src="https://www.gstatic.com/recaptcha/api2/logo_48.png" alt="reCAPTCHA" class="h-8 w-8">
                                    <span class="text-[8px] text-gray-500 mt-1">reCAPTCHA</span>
                                    <span class="text-[7px] text-gray-400">Privacy - Terms</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Submit Button -->
                    <div class="flex justify-center">
                        <button 
                            type="submit" 
                            class="w-60 bg-[#0A2472] hover:bg-blue-950 text-white font-medium py-3 px-4 rounded-2xl transition duration-300"
                        >
                            Submit
                        </button>
                    </div>
                
            </div>
        </div>
        
        <!-- Right side - Brand section with diagonal design -->
        <div class="hidden md:block md:w-1/2 relative bg-[#0A2472]" style="clip-path: polygon(25% 0%, 100% 0%, 100% 100%, 25% 100%, 0% 50%);">
            <!-- Background image with overlay -->
            <div class="absolute inset-0 z-0">
                <img src="{{ asset('assets/login-page.png') }}" alt="Background" class="w-full h-full object-cover object-center opacity-20" />
            </div>
            
            <!-- Company name -->
            <div class="relative z-10 flex items-center justify-center h-full">
                <div class="text-white text-4xl lg:text-6xl font-bold tracking-wider">
                    <div>RCC COLAB</div>
                    <div>SOLUTIONS INC.</div>
                </div>
            </div>
        </div>

    </body>
</html>