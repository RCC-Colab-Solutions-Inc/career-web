<!-- Update Status script -->
<script>
    document.addEventListener('DOMContentLoaded', function() {

        const updateStatusLinks = document.querySelectorAll('.update-status-link');
        
        updateStatusLinks.forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                
                // Get applicant data
                const id = this.getAttribute('data-id');
                const name = this.getAttribute('data-name');
                const status = this.getAttribute('data-status');
                
                window.dispatchEvent(new CustomEvent('open-status-modal', {
                    detail: {
                        id: id,
                        name: name,
                        status: status
                    }
                }));
            });
        });
        
        document.querySelectorAll('tr').forEach(row => {
            const idElement = row.querySelector('.update-status-link');
            const statusElement = row.querySelector('[class*="rounded-full"]');
            
            if (idElement && statusElement) {
                const applicantId = idElement.getAttribute('data-id');
                if (applicantId) {
                    statusElement.setAttribute('data-applicant-id', applicantId);
                }
            }
        });
    });
</script>

<!-- Email modal script -->
<script src="https://cdn.quilljs.com/1.3.6/quill.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Quill Editor for Email Body
        var quillEmail = new Quill('#email-editor', {
            theme: 'snow',
            placeholder: 'Enter your message here...',
            modules: {
                toolbar: '#email-toolbar'
            }
        });

        // Store content in hidden input field on text change
        quillEmail.on('text-change', function() {
            const content = quillEmail.root.innerHTML;
            document.getElementById('email-body-input').value = content;
            
            const event = new Event('input', { bubbles: true });
            document.getElementById('email-body-input').dispatchEvent(event);
        });
        
        // Get all send email links
        const sendEmailLinks = document.querySelectorAll('.send-email-link');
        
        // Add click event to each link
        sendEmailLinks.forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                
                const id = this.getAttribute('data-id');
                const name = this.getAttribute('data-name');
                const email = this.getAttribute('data-email');
                
                window.dispatchEvent(new CustomEvent('open-email-modal', {
                    detail: {
                        id: id,
                        name: name,
                        email: email
                    }
                }));
            });
        });
        
        // Apply dark mode styling for Quill if needed
        function updateEmailQuillTheme() {
        const isDarkMode = document.documentElement.classList.contains('dark');
        const editorContainer = document.querySelector('#email-editor .ql-editor');
        
        if (editorContainer) {
            if (isDarkMode) {
                editorContainer.style.color = '#ffffff';
                editorContainer.style.backgroundColor = '#1e293b';
                
                // dark mode colors for toolbar icons
                const darkModeStyles = document.getElementById('quill-dark-mode-styles');
                if (!darkModeStyles) {
                    const stylesheet = document.createElement('style');
                    stylesheet.id = 'quill-dark-mode-styles';
                    stylesheet.textContent = `
                        /* Toolbar icons */
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
                        .ql-toolbar.ql-snow .ql-picker.ql-expanded .ql-picker-label {
                            border-color: #475569 !important;
                        }
                        .ql-toolbar.ql-snow .ql-picker.ql-expanded .ql-picker-options {
                            border-color: #475569 !important;
                        }
                        .ql-container.ql-snow {
                            border-color: #475569 !important;
                        }
                        .ql-toolbar.ql-snow {
                            border-color: #475569 !important;
                        }
                        .ql-editor.ql-blank::before {
                            color: rgba(255, 255, 255, 0.6) !important;
                        }
                    `;
                    document.head.appendChild(stylesheet);
                }
            } else {
                editorContainer.style.color = '#1e293b';
                editorContainer.style.backgroundColor = '#ffffff';
                
                const darkModeStyles = document.getElementById('quill-dark-mode-styles');
                if (darkModeStyles) {
                    darkModeStyles.remove();
                }
            }
        }
    }
        
        setTimeout(updateEmailQuillTheme, 100);
        
        // Update theme when dark mode toggle is clicked
        const themeToggle = document.getElementById('themeToggle');
        if (themeToggle) {
            themeToggle.addEventListener('click', function() {
                setTimeout(updateEmailQuillTheme, 100);
            });
        }
    });
</script>

<!-- Forward to Client script -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const forwardClientLinks = document.querySelectorAll('.forward-client-link');
        
        forwardClientLinks.forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                
                const id = this.getAttribute('data-id');
                const name = this.getAttribute('data-name');
                
                window.dispatchEvent(new CustomEvent('open-forward-modal', {
                    detail: {
                        id: id,
                        name: name
                    }
                }));
            });
        });
    });
</script>

<!-- Applicant Details Modal Script -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Get all applicant rows
        const applicantRows = document.querySelectorAll('.applicant-row');
        
        // Add click event to each row
        applicantRows.forEach(row => {
            row.addEventListener('click', function(e) {
                // Prevent opening modal when clicking on action buttons
                if (e.target.closest('.relative') || e.target.closest('button') || e.target.closest('a')) {
                    return;
                }
                
                const id = this.getAttribute('data-id');
                const name = this.getAttribute('data-name');
                const email = this.getAttribute('data-email');
                const jobtitle = this.getAttribute('data-jobtitle');
                const department = this.getAttribute('data-department');
                const status = this.getAttribute('data-status');
                const date = this.getAttribute('data-date');
                const time = this.getAttribute('data-time');
                
                window.dispatchEvent(new CustomEvent('open-applicant-modal', {
                    detail: {
                        id: id,
                        name: name,
                        email: email,
                        jobtitle: jobtitle,
                        department: department,
                        status: status,
                        date: date,
                        time: time
                    }
                }));
            });
        });
    });
</script>