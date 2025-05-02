@include('application.includes.header')


<body>
    @include('application.includes.nav')

    <div class="bg-white">
        <!-- Hero Section with Job Title and Summary -->
        <div class="relative bg-[#0A2472] overflow-hidden"
            style="clip-path: polygon(100% 1%, 100% 85%, 50% 100%, 0 85%, 0 0);">
            <!-- Image with opacity -->
            <img src="{{ asset('assets/Career.png') }}" alt="Background" class="absolute w-full h-full object-cover object-center opacity-20">
            
            <div class="relative z-10">
                <div class="max-w-screen-xl mx-auto">
                    <div class="flex flex-col items-center justify-center pt-[150px] pb-[150px] h-fit px-6 lg:px-0">
                        <h1 class="text-white text-2xl sm:text-4xl lg:text-5xl font-medium text-center">
                            Back End Software Engineer
                        </h1>
                        <p class="mt-6 text-white/80 max-w-xl text-base sm:text-lg text-justify leading-relaxed">
                        Lorem ipsum dolor sit amet, consectetur adipisci elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Application Form -->
        <div class="max-w-screen-xl mx-auto px-4 py-8">
            <h2 class="text-2xl font-semibold mb-6">Fill out the Form</h2>

            <form action="#" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="job_id" value="1">

                <!-- Row 1 - Name Fields -->
                <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">
                    <div>
                        <label for="firstName" class="block text-sm font-medium text-gray-700 mb-1">
                            First name <span class="text-red-500">*</span>
                        </label>
                        <input type="text" id="firstName" name="firstName" 
                               class="w-full p-2 border border-gray-300 rounded"
                               placeholder="First name">
                    </div>
                    <div>
                        <label for="lastName" class="block text-sm font-medium text-gray-700 mb-1">
                            Last name <span class="text-red-500">*</span>
                        </label>
                        <input type="text" id="lastName" name="lastName" 
                               class="w-full p-2 border border-gray-300 rounded"
                               placeholder="Last name">
                    </div>
                    <div>
                        <label for="middleName" class="block text-sm font-medium text-gray-700 mb-1">
                            Middle name (Optional)
                        </label>
                        <input type="text" id="middleName" name="middleName" 
                               class="w-full p-2 border border-gray-300 rounded"
                               placeholder="Middle name">
                    </div>
                    <div>
                        <label for="suffix" class="block text-sm font-medium text-gray-700 mb-1">
                            Suffix
                        </label>
                        <div class="relative">
                            <select id="suffix" name="suffix"
                                    class="w-full p-2 border border-gray-300 rounded appearance-none">
                                <option value="">Select Suffix</option>
                                <option value="Jr.">Jr.</option>
                                <option value="Sr.">Sr.</option>
                                <option value="II">II</option>
                                <option value="III">III</option>
                                <option value="IV">IV</option>
                            </select>
                            <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Row 2 - Contact Info -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-1">
                            Email <span class="text-red-500">*</span>
                        </label>
                        <input type="email" id="email" name="email" 
                               class="w-full p-2 border border-gray-300 rounded"
                               placeholder="Email" required>
                    </div>
                    <div>
                        <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">
                            Phone Number <span class="text-red-500">*</span>
                        </label>
                        <input type="tel" id="phone" name="phone" 
                               class="w-full p-2 border border-gray-300 rounded"
                               placeholder="Contact No." required>
                    </div>
                    <div>
                        <label for="address" class="block text-sm font-medium text-gray-700 mb-1">
                            Address <span class="text-red-500">*</span>
                        </label>
                        <input type="text" id="address" name="address" 
                               class="w-full p-2 border border-gray-300 rounded"
                               placeholder="Address" required>
                    </div>
                </div>

                <!-- Row 3 - Professional Profiles -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
                    <div>
                        <label for="linkedin" class="block text-sm font-medium text-gray-700 mb-1">
                            LinkedIn Profile (Optional)
                        </label>
                        <input type="text" id="linkedin" name="linkedin" 
                               class="w-full p-2 border border-gray-300 rounded"
                               placeholder="Paste link here">
                    </div>
                    <div>
                        <label for="portfolio" class="block text-sm font-medium text-gray-700 mb-1">
                            Portfolio (Optional)
                        </label>
                        <input type="text" id="portfolio" name="portfolio" 
                               class="w-full p-2 border border-gray-300 rounded"
                               placeholder="Paste link here">
                    </div>
                    <div>
                        <label for="github" class="block text-sm font-medium text-gray-700 mb-1">
                            GitHub Profile (Optional)
                        </label>
                        <input type="text" id="github" name="github" 
                               class="w-full p-2 border border-gray-300 rounded"
                               placeholder="Paste link here">
                    </div>
                </div>

                <!-- Row 4 - Position Preferences and Find Source -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
                    <!-- Second Choice Position -->
                    <div>
                        <label for="secondChoice" class="block text-sm font-medium text-gray-700 mb-1">
                            Second Choice Position
                        </label>
                        <div class="relative">
                            <select id="secondChoice" name="secondChoice"
                                    class="w-full p-2 border border-gray-300 rounded appearance-none">
                                <option value="">Select Position</option>
                                <option value="2">Frontend Developer</option>
                                <option value="3">Backend Developer</option>
                                <option value="4">UX/UI Designer</option>
                                <option value="5">DevOps Engineer</option>
                            </select>
                            <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </div>
                    </div>

                    <!-- Third Choice Position -->
                    <div>
                        <label for="thirdChoice" class="block text-sm font-medium text-gray-700 mb-1">
                            Third Choice Position
                        </label>
                        <div class="relative">
                            <select id="thirdChoice" name="thirdChoice"
                                    class="w-full p-2 border border-gray-300 rounded appearance-none">
                                <option value="">Select Position</option>
                                <option value="2">Frontend Developer</option>
                                <option value="3">Backend Developer</option>
                                <option value="4">UX/UI Designer</option>
                                <option value="5">DevOps Engineer</option>
                            </select>
                            <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </div>
                    </div>

                    <!-- Where did you find us -->
                    <div>
                        <label for="findSource" class="block text-sm font-medium text-gray-700 mb-1">
                            Where did you find us? <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                            <select id="findSource" name="findSource"
                                    class="w-full p-2 border border-gray-300 rounded appearance-none"
                                    required>
                                <option value="">Select Source</option>
                                <option value="LinkedIn">LinkedIn</option>
                                <option value="Facebook">Facebook</option>
                                <option value="Google">Google</option>
                            </select>
                            <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- CV Upload -->
                <div class="mb-8">
                    <div class="border border-dashed border-gray-300 rounded p-8 text-center cursor-pointer" 
                         onclick="document.getElementById('cv').click()">
                        <input type="file" id="cv" name="cv" class="hidden" accept=".pdf,.doc,.docx">
                        <div class="flex flex-col items-center">
                            <div class="text-gray-500 mb-2">
                                <svg class="w-8 h-8 mx-auto" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M3 17a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM6.293 6.707a1 1 0 010-1.414l3-3a1 1 0 011.414 0l3 3a1 1 0 01-1.414 1.414L11 5.414V13a1 1 0 11-2 0V5.414L7.707 6.707a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            <h3 class="text-[#0A2472] font-medium text-lg">
                                Upload CV <span class="text-red-500">*</span>
                            </h3>
                            <p class="text-gray-500 text-sm mt-1" id="file-name">
                                Browse file (.pdf, .doc, .docx up to 5MB)
                            </p>
                        </div>
                    </div>
                </div>

                <!-- reCAPTCHA and Terms -->
                <div class="mb-6">
                    <!-- reCAPTCHA -->
                    <div class="flex justify-center">
                        <div class="g-recaptcha border border-gray-200 rounded overflow-hidden" data-sitekey="6LeIxAcTAAAAAJcZVRqyHh71UMIEGNQ_MXjiZKhI"></div>
                    </div>

                    <!-- Terms & Conditions - Centered -->
                    <div class="mt-6 flex items-center justify-center mb-6">
                        <input id="agreeToTerms" name="agreeToTerms" type="checkbox" 
                               class="h-4 w-4 rounded border-gray-300">
                        <label for="agreeToTerms" class="ml-2 text-sm text-gray-600">
                            I accept Terms & Condition and Privacy Policy <span class="text-red-500">*</span>
                        </label>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="flex justify-center">
                    <button type="submit" 
                            class="w-[697px] py-3 bg-orange-500 text-white rounded-md text-lg font-semibold hover:bg-orange-600 transition">
                        Submit
                    </button>
                </div>
            </form>
        </div>
    </div>

    @include('application.includes.footer')

    <script>
        // Display file name when selected
        document.getElementById('cv').addEventListener('change', function() {
            const fileName = this.files[0] ? this.files[0].name : 'Browse file (.pdf, .doc, .docx up to 5MB)';
            document.getElementById('file-name').textContent = fileName;
        });
    </script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</body>
</html>