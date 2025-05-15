<!-- Updated Modal for View & Edit Schedule -->
<div x-data="{ 
                open: false, 
                scheduleId: '',
                applicant: '',
                subject: '',
                date: '',
                time: '',
                endDate: '',
                endTime: '',
                location: '',
                status: '',
                scheduleType: '',
                attendee: '',
                remarks: '',
                meetingLink: ''
            }" 
            @open-modal.window="
                open = true;
                scheduleId = $event.detail.scheduleId;
                applicant = $event.detail.applicant;
                subject = $event.detail.subject;
                
                // Format the date (if needed)
                date = $event.detail.date;
                endDate = $event.detail.endDate || $event.detail.date;
                
                // Handle time format - check if it already includes AM/PM
                if ($event.detail.time) {
                    const timeStr = $event.detail.time.toString();
                    if (timeStr.toLowerCase().includes('am') || timeStr.toLowerCase().includes('pm')) {
                        // Time already has AM/PM designation - use as is
                        time = timeStr;
                    } else {
                        // Convert from 24-hour format to 12-hour format
                        const timeParts = timeStr.includes(':') ? timeStr.split(':') : ['00', '00'];
                        let hours = parseInt(timeParts[0]);
                        let minutes = timeParts[1].includes(' ') ? timeParts[1].split(' ')[0] : timeParts[1];
                        let period = 'AM';
                        
                        if (hours >= 12) {
                            period = 'PM';
                            if (hours > 12) hours -= 12;
                        }
                        if (hours === 0) hours = 12;
                        
                        time = `${hours}:${minutes} ${period}`;
                    }
                } else {
                    time = '';
                }
                
                // Same fix for end time
                if ($event.detail.endTime) {
                    const timeStr = $event.detail.endTime.toString();
                    if (timeStr.toLowerCase().includes('am') || timeStr.toLowerCase().includes('pm')) {
                        // Time already has AM/PM designation - use as is
                        endTime = timeStr;
                    } else {
                        // Convert from 24-hour format to 12-hour format
                        const timeParts = timeStr.includes(':') ? timeStr.split(':') : ['00', '00'];
                        let hours = parseInt(timeParts[0]);
                        let minutes = timeParts[1].includes(' ') ? timeParts[1].split(' ')[0] : timeParts[1];
                        let period = 'AM';
                        
                        if (hours >= 12) {
                            period = 'PM';
                            if (hours > 12) hours -= 12;
                        }
                        if (hours === 0) hours = 12;
                        
                        endTime = `${hours}:${minutes} ${period}`;
                    }
                } else if ($event.detail.time) {
                    // Only use time as fallback if endTime is not provided
                    endTime = time;
                } else {
                    endTime = '';
                }
                
                scheduleType = $event.detail.scheduleType || 'online';
                location = $event.detail.location || (scheduleType === 'online' ? 'Teams' : '');
                status = $event.detail.status;
                attendee = $event.detail.attendee || '';
                remarks = $event.detail.remarks || '';
                meetingLink = $event.detail.meetingLink || '';
            "
                x-show="open" 
                @click.away="open = false"
                class="fixed inset-0 z-50 overflow-y-auto" 
                style="display: none;">
                <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
                    <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                        <div class="absolute inset-0 bg-gray-500 dark:bg-slate-900 opacity-75"></div>
                    </div>
                    <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
                    <div class="inline-block align-bottom bg-white dark:bg-slate-800 rounded-xl text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full p-6">
                        <form id="edit-schedule-form" @submit.prevent="$dispatch('submit-edit-schedule')">
                            <div class="sm:flex sm:items-start">
                                <div class="w-full">
                                    <h3 class="text-lg leading-6 font-medium text-gray-900 dark:text-white mb-4">View & Edit Schedule</h3>
                                    <div class="space-y-4">
                                        <input type="hidden" name="schedule_id" x-model="scheduleId">
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Applicant</label>
                                            <p x-text="applicant" class="text-gray-900 dark:text-white"></p>
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Subject</label>
                                            <input type="text" name="subject" x-model="subject" class="w-full bg-gray-100 dark:bg-slate-700 border border-gray-300 dark:border-slate-600 rounded-lg py-2 px-3 text-gray-800 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500/50 transition-colors duration-300">
                                        </div>
                                        <div class="grid grid-cols-2 gap-4">
                                            <div>
                                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Start Date</label>
                                                <input type="text" name="start_schedule_date" x-model="date" class="w-full bg-gray-100 dark:bg-slate-700 border border-gray-300 dark:border-slate-600 rounded-lg py-2 px-3 text-gray-800 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500/50 transition-colors duration-300" placeholder="MM/DD/YYYY">
                                            </div>
                                            <div>
                                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Start Time</label>
                                                <input type="text" name="start_schedule_time" x-model="time" class="w-full bg-gray-100 dark:bg-slate-700 border border-gray-300 dark:border-slate-600 rounded-lg py-2 px-3 text-gray-800 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500/50 transition-colors duration-300" placeholder="HH:MM AM/PM">
                                            </div>
                                        </div>
                                        <div class="grid grid-cols-2 gap-4">
                                            <div>
                                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">End Date</label>
                                                <input type="text" name="end_schedule_date" x-model="endDate" class="w-full bg-gray-100 dark:bg-slate-700 border border-gray-300 dark:border-slate-600 rounded-lg py-2 px-3 text-gray-800 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500/50 transition-colors duration-300" placeholder="MM/DD/YYYY">
                                            </div>
                                            <div>
                                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">End Time</label>
                                                <input type="text" name="end_schedule_time" x-model="endTime" class="w-full bg-gray-100 dark:bg-slate-700 border border-gray-300 dark:border-slate-600 rounded-lg py-2 px-3 text-gray-800 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500/50 transition-colors duration-300" placeholder="HH:MM AM/PM">
                                            </div>
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Schedule Type</label>
                                            <select name="schedule_type" x-model="scheduleType" @change="scheduleType === 'online' ? location = 'Teams' : ''" class="w-full bg-gray-100 dark:bg-slate-700 border border-gray-300 dark:border-slate-600 rounded-lg py-2.5 px-4 text-gray-800 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500/50 transition-colors duration-300" required>
                                                <option value="online">Online</option>
                                                <option value="physical">Physical</option>
                                            </select>
                                        </div>

                        <!-- Location field only shows for physical location -->
                        <div x-show="scheduleType === 'physical'">
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Location</label>
                            <input type="text" name="location" x-model="location" class="w-full bg-gray-100 dark:bg-slate-700 border border-gray-300 dark:border-slate-600 rounded-lg py-2 px-3 text-gray-800 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500/50 transition-colors duration-300">
                        </div>
                        <!-- Hidden input for online meetings -->
                        <input type="hidden" name="location" x-model="location" x-show="scheduleType === 'online'">
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Attendees (comma separated emails)</label>
                                            <input type="text" name="attendee" x-model="attendee" class="w-full bg-gray-100 dark:bg-slate-700 border border-gray-300 dark:border-slate-600 rounded-lg py-2 px-3 text-gray-800 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500/50 transition-colors duration-300">
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Remarks</label>
                                            <textarea name="remarks" x-model="remarks" class="w-full bg-gray-100 dark:bg-slate-700 border border-gray-300 dark:border-slate-600 rounded-lg py-2 px-3 text-gray-800 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500/50 transition-colors duration-300" rows="3"></textarea>
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Reason</label>
                                            <input type="text" name="reason" class="w-full bg-gray-100 dark:bg-slate-700 border border-gray-300 dark:border-slate-600 rounded-lg py-2 px-3 text-gray-800 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500/50 transition-colors duration-300">
                                        </div>

                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Propose Date</label>
                                            <input type="text" name="propose_date" class="w-full bg-gray-100 dark:bg-slate-700 border border-gray-300 dark:border-slate-600 rounded-lg py-2 px-3 text-gray-800 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500/50 transition-colors duration-300" placeholder="MM/DD/YYYY">
                                        </div>

                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Propose Time</label>
                                            <input type="text" name="propose_time" class="w-full bg-gray-100 dark:bg-slate-700 border border-gray-300 dark:border-slate-600 rounded-lg py-2 px-3 text-gray-800 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500/50 transition-colors duration-300" placeholder="HH:MM AM/PM">
                                        </div>
                                        <div x-show="meetingLink">
                                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Meeting Link</label>
                                            <div class="flex items-center space-x-2">
                                                <input type="text" readonly x-model="meetingLink" class="flex-1 bg-gray-100 dark:bg-slate-700 border border-gray-300 dark:border-slate-600 rounded-lg py-2 px-3 text-gray-800 dark:text-white focus:outline-none transition-colors duration-300">
                                                <button type="button" @click="navigator.clipboard.writeText(meetingLink)" class="p-2 bg-blue-100 text-blue-600 dark:bg-blue-900/30 dark:text-blue-400 rounded-lg hover:bg-blue-200 dark:hover:bg-blue-800/50 transition-colors">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5H6a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2v-1M8 5a2 2 0 002 2h2a2 2 0 002-2M8 5a2 2 0 012-2h2a2 2 0 012 2m0 0h2a2 2 0 012 2v3m2 4H10m0 0l3-3m-3 3l3 3" />
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>
                                        <div x-show="status === 'Pending'">
                                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Status</label>
                                            <div class="flex space-x-2">
                                                <button type="button" @click="$dispatch('approve-schedule', {scheduleId: scheduleId, status: 'Accepted'})" class="flex-1 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition-colors">
                                                    Accept
                                                </button>
                                                <button type="button" @click="$dispatch('approve-schedule', {scheduleId: scheduleId, status: 'Declined'})" class="flex-1 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition-colors">
                                                    Decline
                                                </button>
                                            </div>
                                        </div>
                                        <div x-show="status !== 'Cancelled' && status !== 'Declined'">
                                            <button type="button" @click="$dispatch('cancel-schedule', {scheduleId: scheduleId, message: remarks})" class="w-full py-2 mt-2 bg-gray-200 text-gray-800 dark:bg-slate-700 dark:text-white rounded-lg hover:bg-gray-300 dark:hover:bg-slate-600 transition-colors">
                                                Cancel Schedule
                                            </button>
                                        </div>
                                    </div>
                                    <div class="mt-6 flex justify-end space-x-3">
                                        <button type="button" @click="open = false" class="px-4 py-2 bg-gray-200 dark:bg-slate-700 text-gray-800 dark:text-white rounded-lg transition-colors hover:bg-gray-300 dark:hover:bg-slate-600">
                                            Close
                                        </button>
                                        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg transition-colors hover:bg-blue-700">
                                            Save Changes
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- New Schedule Modal -->
            <div x-data="{ open: false }" @new-schedule.window="open = true" x-show="open" @click.away="open = false" class="fixed inset-0 z-50 overflow-y-auto" style="display: none;">
                <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
                    <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                        <div class="absolute inset-0 bg-gray-500 dark:bg-slate-900 opacity-75"></div>
                    </div>
                    <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
                    <div class="inline-block align-bottom bg-white dark:bg-slate-800 rounded-xl text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full p-6">
                        <form id="new-schedule-form">
                            <div class="sm:flex sm:items-start">
                                <div class="w-full">
                                    <h3 class="text-lg leading-6 font-medium text-gray-900 dark:text-white mb-4">Create New Schedule</h3>
                                    <div class="space-y-4">
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Applicant</label>
                                            <select name="applicant_id" class="w-full bg-gray-100 dark:bg-slate-700 border border-gray-300 dark:border-slate-600 rounded-lg py-2.5 px-4 text-gray-800 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500/50 transition-colors duration-300" required>
                                                <option value="">Select Applicant</option>
                                                @foreach(\App\Models\ApplicantsApplication::all() as $applicant)
                                                    <option value="{{ $applicant->id }}">{{ $applicant->firstname }} {{ $applicant->lastname }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Subject</label>
                                            <input type="text" name="subject" class="w-full bg-gray-100 dark:bg-slate-700 border border-gray-300 dark:border-slate-600 rounded-lg py-2 px-3 text-gray-800 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500/50 transition-colors duration-300" required>
                                        </div>
                                        <div class="grid grid-cols-2 gap-4">
                                            <div>
                                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Start Date</label>
                                                <input type="text" name="start_schedule_date" class="w-full bg-gray-100 dark:bg-slate-700 border border-gray-300 dark:border-slate-600 rounded-lg py-2 px-3 text-gray-800 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500/50 transition-colors duration-300" placeholder="MM/DD/YYYY" required>
                                            </div>
                                            <div>
                                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Start Time</label>
                                                <input type="text" name="start_schedule_time" class="w-full bg-gray-100 dark:bg-slate-700 border border-gray-300 dark:border-slate-600 rounded-lg py-2 px-3 text-gray-800 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500/50 transition-colors duration-300" placeholder="HH:MM AM/PM" required>
                                            </div>
                                        </div>
                                        <div class="grid grid-cols-2 gap-4">
                                            <div>
                                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">End Date</label>
                                                <input type="text" name="end_schedule_date" class="w-full bg-gray-100 dark:bg-slate-700 border border-gray-300 dark:border-slate-600 rounded-lg py-2 px-3 text-gray-800 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500/50 transition-colors duration-300" placeholder="MM/DD/YYYY" required>
                                            </div>
                                            <div>
                                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">End Time</label>
                                                <input type="text" name="end_schedule_time" class="w-full bg-gray-100 dark:bg-slate-700 border border-gray-300 dark:border-slate-600 rounded-lg py-2 px-3 text-gray-800 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500/50 transition-colors duration-300" placeholder="HH:MM AM/PM" required>
                                            </div>
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Schedule Type</label>
                                            <select name="schedule_type" class="w-full bg-gray-100 dark:bg-slate-700 border border-gray-300 dark:border-slate-600 rounded-lg py-2.5 px-4 text-gray-800 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500/50 transition-colors duration-300" required>
                                                <option value="online">Online</option>
                                                <option value="physical">Physical</option>
                                            </select>
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Location</label>
                                            <input type="text" name="location" class="w-full bg-gray-100 dark:bg-slate-700 border border-gray-300 dark:border-slate-600 rounded-lg py-2 px-3 text-gray-800 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500/50 transition-colors duration-300" required>
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Attendees (comma separated emails)</label>
                                            <input type="text" name="attendee" class="w-full bg-gray-100 dark:bg-slate-700 border border-gray-300 dark:border-slate-600 rounded-lg py-2 px-3 text-gray-800 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500/50 transition-colors duration-300">
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Remarks</label>
                                            <textarea name="remarks" class="w-full bg-gray-100 dark:bg-slate-700 border border-gray-300 dark:border-slate-600 rounded-lg py-2 px-3 text-gray-800 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500/50 transition-colors duration-300" rows="3"></textarea>
                                        </div>
                                    </div>
                                    <div class="mt-6 flex justify-end space-x-3">
                                        <button type="button" @click="open = false" class="px-4 py-2 bg-gray-200 dark:bg-slate-700 text-gray-800 dark:text-white rounded-lg transition-colors hover:bg-gray-300 dark:hover:bg-slate-600">
                                            Cancel
                                        </button>
                                        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg transition-colors hover:bg-blue-700">
                                            Create Schedule
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>