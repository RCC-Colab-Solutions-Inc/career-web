@include('includes.header')

<!-- Main Container -->
<div class="flex h-screen overflow-hidden bg-gray-50 dark:bg-slate-900 transition-colors duration-300">
    
@include('includes.side')
    
    <!-- Main Content -->
    <div class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-50 dark:bg-slate-900 transition-colors duration-300">
        
    @include('includes.nav')
        
        <!-- Add Job Content -->
        <main class="p-6 pb-16">
            <!-- Page Title with Back Button -->
            <div class="flex items-center mb-8">
                <a href="/job-listing" class="mr-4 p-2 bg-gray-100 dark:bg-slate-700 rounded-lg text-gray-600 dark:text-gray-300 hover:bg-gray-200 hover:text-gray-800 dark:hover:bg-slate-600 dark:hover:text-white transition-colors duration-200">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                </a>
                <div>
                    <h1 class="text-2xl font-bold text-gray-800 dark:text-white transition-colors duration-300">Add New Job</h1>
                    <p class="text-gray-600 dark:text-gray-300 transition-colors duration-300">Create a new job listing for potential applicants</p>
                </div>
            </div>
            
            <!-- Job Form -->
            <form action="addjob" method="POST">
                @csrf
                <!-- Main Form Card -->
                <div class="bg-white dark:bg-slate-800 rounded-xl shadow-md border border-gray-200 dark:border-slate-700 p-6 mb-8 transition-colors duration-300">
                    <h2 class="text-lg font-semibold text-gray-800 dark:text-white mb-6 transition-colors duration-300">Job Details</h2>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                        <!-- Job Title -->
                        <div>
                            <label class="block text-sm font-medium text-gray-600 dark:text-gray-300 mb-2 transition-colors duration-300">Job Title <span class="text-red-500">*</span></label>
                            <div class="relative">
                                <input 
                                    type="text" 
                                    placeholder="Enter job title"
                                    name="jobtitle" 
                                    class="w-full bg-gray-100 dark:bg-slate-700 border border-gray-300 dark:border-slate-600 rounded-lg py-3 px-4 text-gray-800 dark:text-white placeholder-gray-500 dark:placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500/50 transition-colors duration-300"
                                    required
                                >
                            </div>
                        </div>

                        <!-- Company -->
                        <div>
                            <label class="block text-sm font-medium text-gray-600 dark:text-gray-300 mb-2 transition-colors duration-300">Company <span class="text-red-500">*</span></label>
                            <div class="relative">
                            <select name="company" class="w-full bg-gray-100 dark:bg-slate-700 border border-gray-300 dark:border-slate-600 rounded-lg py-3 px-4 text-gray-800 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500/50 transition-colors duration-300" required>
                                <option value="">Select company</option>
                
                            </select>
                            </div>
                            
                        </div>
                        
                        <!-- Job Description -->
                        <div class="col-span-1 md:col-span-2">
                            <label class="block text-sm font-medium text-gray-600 dark:text-gray-300 mb-2 transition-colors duration-300">Job Description <span class="text-red-500">*</span></label>
                            <div class="relative">
                                <textarea 
                                    name="jobdescription" 
                                    placeholder="Enter job description"
                                    rows="5"
                                    class="w-full bg-gray-100 dark:bg-slate-700 border border-gray-300 dark:border-slate-600 rounded-lg py-3 px-4 text-gray-800 dark:text-white placeholder-gray-500 dark:placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500/50 transition-colors duration-300"
                                    required
                                ></textarea>
                            </div>
                        </div>
                        
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                        <!-- Workplace Type -->
                        <div>
                            <label class="block text-sm font-medium text-gray-600 dark:text-gray-300 mb-2 transition-colors duration-300">Workplace Type <span class="text-red-500">*</span></label>
                            <select name="workplace" class="w-full bg-gray-100 dark:bg-slate-700 border border-gray-300 dark:border-slate-600 rounded-lg py-3 px-4 text-gray-800 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500/50 transition-colors duration-300" required>
                                <option value="">Select workplace type</option>
                                <option value="on-site">On-site</option>
                                <option value="remote">Remote</option>
                                <option value="hybrid">Hybrid</option>
                            </select>
                        </div>
                        
                        <!-- Job Location -->
                        <div>
                            <label class="block text-sm font-medium text-gray-600 dark:text-gray-300 mb-2 transition-colors duration-300">Job Location <span class="text-red-500">*</span></label>
                            <input 
                                type="text" 
                                placeholder="Enter job location"
                                name="joblocation" 
                                class="w-full bg-gray-100 dark:bg-slate-700 border border-gray-300 dark:border-slate-600 rounded-lg py-3 px-4 text-gray-800 dark:text-white placeholder-gray-500 dark:placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500/50 transition-colors duration-300"
                                required
                            >
                        </div>
                        
                        <!-- Job Type -->
                        <div>
                            <label class="block text-sm font-medium text-gray-600 dark:text-gray-300 mb-2 transition-colors duration-300">Job Type <span class="text-red-500">*</span></label>
                            <select name="jobtype" class="w-full bg-gray-100 dark:bg-slate-700 border border-gray-300 dark:border-slate-600 rounded-lg py-3 px-4 text-gray-800 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500/50 transition-colors duration-300" required>
                                <option value="">Select job type</option>
                                <option value="full-time">Full-time</option>
                                <option value="part-time">Part-time</option>
                                <option value="contract">Contract</option>
                                <option value="internship">Internship</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                        <!-- Department -->
                        <div>
                            <label class="block text-sm font-medium text-gray-600 dark:text-gray-300 mb-2 transition-colors duration-300">Department <span class="text-red-500">*</span></label>
                            <input
                                type="text"
                                placeholder="Enter department"
                                name="department"
                                class="w-full bg-gray-100 dark:bg-slate-700 border border-gray-300 dark:border-slate-600 rounded-lg py-3 px-4 text-gray-800 dark:text-white placeholder-gray-500 dark:placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500/50 transition-colors duration-300"
                                required
                            >
                        </div>
                        
                        <!-- Hiring Urgency -->
                        <div>
                            <label class="block text-sm font-medium text-gray-600 dark:text-gray-300 mb-2 transition-colors duration-300">Hiring Urgency</label>
                            <div class="flex items-center space-x-2 mt-3">
                                <div class="flex items-center">
                                    <input 
                                        type="checkbox" 
                                        id="urgentHiring" 
                                        name="urgency"
                                        class="w-4 h-4 bg-gray-100 dark:bg-slate-700 border-gray-300 dark:border-slate-600 rounded focus:ring-blue-500 text-blue-600 focus:ring-offset-gray-100 dark:focus:ring-offset-slate-800 transition-colors duration-300"
                                    >
                                    <label for="urgentHiring" class="ml-2 text-sm text-gray-700 dark:text-gray-200 transition-colors duration-300">Mark as urgent hiring</label>
                                </div>
                                <div class="text-xs text-gray-500 dark:text-gray-400 ml-2 transition-colors duration-300">
                                    (Shows "Urgent Hiring" banner on job listing)
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Other Details Section -->
                    <div class="mb-8">
                        <label class="block text-sm font-medium text-gray-600 dark:text-gray-300 mb-2 transition-colors duration-300">Other Details<span class="text-red-500">*</span></label>
                        
                        <!--  editor container -->
                        <div class="border border-gray-300 dark:border-slate-600 rounded-lg overflow-hidden transition-colors duration-300">
                            <!-- Toolbar -->
                            <div id="toolbar" class="bg-gray-50 dark:bg-slate-700 border-b border-gray-300 dark:border-slate-600 p-2 flex flex-wrap gap-1 transition-colors duration-300">
                                <!-- Text formatting -->
                                <span class="ql-formats border-r border-gray-300 dark:border-slate-500 pr-2 mr-2">
                                    <button class="ql-bold text-gray-700 dark:text-white" title="Bold"></button>
                                    <button class="ql-italic text-gray-700 dark:text-white" title="Italic"></button>
                                    <button class="ql-underline text-gray-700 dark:text-white" title="Underline"></button>
                                    <button class="ql-strike text-gray-700 dark:text-white" title="Strikethrough"></button>
                                </span>
                                
                                <!-- Headers -->
                                <span class="ql-formats border-r border-gray-300 dark:border-slate-500 pr-2 mr-2">
                                    <select class="ql-header bg-gray-100 dark:bg-slate-600 text-gray-800 dark:text-white border-gray-300 dark:border-slate-500">
                                        <option value="" selected>Normal</option>
                                        <option value="2">Heading</option>
                                        <option value="3">Subheading</option>
                                    </select>
                                </span>
                                
                                <!-- Lists -->
                                <span class="ql-formats border-r border-gray-300 dark:border-slate-500 pr-2 mr-2">
                                    <button class="ql-list text-gray-700 dark:text-white" value="ordered" title="Numbered List"></button>
                                    <button class="ql-list text-gray-700 dark:text-white" value="bullet" title="Bullet List"></button>
                                    <button class="ql-indent text-gray-700 dark:text-white" value="-1" title="Decrease Indent"></button>
                                    <button class="ql-indent text-gray-700 dark:text-white" value="+1" title="Increase Indent"></button>
                                </span>
                                
                                <!-- Alignment -->
                                <span class="ql-formats border-r border-gray-300 dark:border-slate-500 pr-2 mr-2">
                                    <button class="ql-align text-gray-700 dark:text-white" value="" title="Align Left"></button>
                                    <button class="ql-align text-gray-700 dark:text-white" value="center" title="Align Center"></button>
                                    <button class="ql-align text-gray-700 dark:text-white" value="right" title="Align Right"></button>
                                </span>
                            </div>

                            <!-- Quill Editor -->
                            <div id="editor-container" class="bg-white dark:bg-slate-800 min-h-[240px] transition-colors duration-300"></div>
                        </div>

                        <!-- Hidden textarea to store data -->
                        <textarea name="others" id="hidden-input" hidden></textarea>
                    </div>             
                    
                </div>
                
                <!-- Status Card -->
                <div class="bg-white dark:bg-slate-800 rounded-xl shadow-md border border-gray-200 dark:border-slate-700 p-6 mb-8 transition-colors duration-300">
                    <h2 class="text-lg font-semibold text-gray-800 dark:text-white mb-6 transition-colors duration-300">Job Status</h2>
                    
                    <div class="flex flex-wrap gap-4">
                        <label class="flex items-center p-3 bg-gray-100 dark:bg-slate-700 border border-gray-300 dark:border-slate-600 rounded-lg cursor-pointer hover:bg-gray-200 dark:hover:bg-slate-600 transition-colors duration-200">
                            <input 
                                type="radio" 
                                name="jobStatus" 
                                value="open" 
                                class="w-4 h-4 bg-gray-100 dark:bg-slate-700 border-gray-300 dark:border-slate-600 focus:ring-blue-500 text-blue-600 focus:ring-offset-gray-100 dark:focus:ring-offset-slate-800"
                                checked
                            >
                            <span class="ml-2 text-gray-700 dark:text-gray-200 transition-colors duration-300">Open for Hiring</span>
                        </label>
                        
                        <label class="flex items-center p-3 bg-gray-100 dark:bg-slate-700 border border-gray-300 dark:border-slate-600 rounded-lg cursor-pointer hover:bg-gray-200 dark:hover:bg-slate-600 transition-colors duration-200">
                            <input 
                                type="radio" 
                                name="jobStatus" 
                                value="closed" 
                                class="w-4 h-4 bg-gray-100 dark:bg-slate-700 border-gray-300 dark:border-slate-600 focus:ring-blue-500 text-blue-600 focus:ring-offset-gray-100 dark:focus:ring-offset-slate-800"
                            >
                            <span class="ml-2 text-gray-700 dark:text-gray-200 transition-colors duration-300">Close for Now</span>
                        </label>
                        
                        
                    </div>
                    
                   
                </div>
                
                <!-- Form Actions -->
                <div class="flex flex-wrap justify-end gap-4">
                    <a href="#" class="px-6 py-3 bg-gray-100 dark:bg-slate-700 text-gray-700 dark:text-gray-200 rounded-lg hover:bg-gray-200 dark:hover:bg-slate-600 transition-colors duration-200">
                        Cancel
                    </a>
                    
                    <button type="submit" class="px-6 py-3 bg-blue-600 hover:bg-blue-700 dark:bg-blue-700 dark:hover:bg-blue-600 text-white rounded-lg shadow-md transition-colors duration-200">
                        Save Job
                    </button>
                </div>
            </form>
        </main>
    </div>
</div>
<script src="https://cdn.quilljs.com/1.3.6/quill.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Quill Editor with dark mode support
        var quill = new Quill('#editor-container', {
            theme: 'snow',
            placeholder: 'Enter detailed job description here...',
            modules: {
                toolbar: '#toolbar'
            }
        });

        // Store content in hidden textarea on form submit
        quill.on('text-change', function() {
            document.getElementById('hidden-input').value = quill.root.innerHTML;
        });
        
        // Add dark mode support for Quill
        function updateQuillTheme() {
            const isDarkMode = document.documentElement.classList.contains('dark');
            const editorContainer = document.querySelector('.ql-editor');
            
            if (editorContainer) {
                if (isDarkMode) {
                    editorContainer.style.color = '#ffffff';
                    editorContainer.style.backgroundColor = '#1e293b';
                    
                    // Make placeholder text more visible in dark mode
                    const stylesheet = document.createElement('style');
                    stylesheet.id = 'quill-dark-mode-styles';
                    stylesheet.textContent = `
                        /* Fix for placeholder text */
                        .ql-editor.ql-blank::before {
                            color: rgba(255, 255, 255, 0.6) !important;
                        }
                        
                        /* Fix for toolbar icons */
                        .ql-snow .ql-stroke {
                            stroke: white !important;
                        }
                        .ql-snow .ql-fill, .ql-snow .ql-stroke.ql-fill {
                            fill: white !important;
                        }
                        .ql-snow .ql-picker {
                            color: white !important;
                        }
                        .ql-snow .ql-picker-options {
                            background-color: #1e293b !important;
                            color: white !important;
                        }
                        
                        /* Fix for the white border around editor */
                        .ql-container.ql-snow {
                            border: none !important;
                        }
                        
                        /* Fix for toolbar border */
                        .ql-toolbar.ql-snow {
                            border: none !important;
                            border-bottom: 1px solid #475569 !important; /* slate-600 */
                        }
                        
                        /* Ensure editor takes full height of parent */
                        .ql-container {
                            border-bottom-left-radius: 0.5rem;
                            border-bottom-right-radius: 0.5rem;
                            background-color: #1e293b !important;
                        }
                    `;
                    
                    // Remove existing style if it exists
                    const existingStyle = document.getElementById('quill-dark-mode-styles');
                    if (existingStyle) {
                        existingStyle.remove();
                    }
                    
                    document.head.appendChild(stylesheet);
                } else {
                    editorContainer.style.color = '#1e293b';
                    editorContainer.style.backgroundColor = '#ffffff';
                    
                    // Remove dark mode styles if they exist
                    const existingStyle = document.getElementById('quill-dark-mode-styles');
                    if (existingStyle) {
                        existingStyle.remove();
                    }
                }
            }
        }
        
        // Set initial theme
        setTimeout(updateQuillTheme, 100);
        
        // Update theme when dark mode toggle is clicked
        const themeToggle = document.getElementById('themeToggle');
        if (themeToggle) {
            themeToggle.addEventListener('click', function() {
                
                setTimeout(updateQuillTheme, 100);
            });
        }
    });
</script>

@include('includes.footer')