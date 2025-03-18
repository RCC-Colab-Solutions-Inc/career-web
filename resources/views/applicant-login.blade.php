@include('includes.header')
<div class="min-h-screen flex items-center justify-center bg-gray-100 px-4 py-12">
    <div class="w-full max-w-md">
        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <div class="p-6">
                <!-- Header with Logo -->
                <div class="flex justify-between items-center mb-10">
                    <h1 class="text-lg font-semibold text-[#0A2472]">RCC Colab Solutions</h1>
                    <img src="{{ asset('assets/RCCLogo-Blue.png') }}" alt="RCC Colab Solutions" class="h-8">
                </div>
                
                <!-- Welcome Message -->
                <h2 class="text-2xl font-bold text-gray-800 mb-1">Welcome!</h2>
                <p class="text-sm text-gray-500 mb-6">Log in to continue</p>
                                              
                <!-- Application Code Input -->
                <div class="mb-4 relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <input 
                        type="text" 
                        id="application_code" 
                        name="application_code" 
                        class="w-full p-3 pl-10 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300"
                        placeholder="Application Code"
                    >
                </div>
                
                <!-- reCAPTCHA -->
                <div class="mb-4 flex justify-center">
                        <div class="border rounded p-2 flex items-center justify-between w-72">
                            <div class="flex items-center space-x-2">
                            <input type="checkbox" id="mock-recaptcha" class="h-4 w-4">
                            <label for="mock-recaptcha" class="text-sm text-gray-600">I'm not a robot</label>
                            </div>
                            <img src="https://www.gstatic.com/recaptcha/api2/logo_48.png" alt="reCAPTCHA" class="h-8 w-8">
                        </div>
                    </div>
                
                <!-- Submit Button -->
                <button 
                    type="submit" 
                    onclick="window.location.href='/applicant-form'"
                    class="mx-auto block w-72 py-3 px-12 bg-[#0A2472] hover:bg-blue-800 text-white rounded-full font-medium transition-colors duration-300 mb-10"
                >
                    Submit
                </button>
            </div>
        </div>
    </div>
</div>
@include('includes.footer')

<script src="https://www.google.com/recaptcha/api.js" async defer></script>