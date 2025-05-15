@include('includes.header')

<!-- Main Container -->
<div class="flex" id="main-container">
    
    @include('includes.side')
    
    <!-- Main Content -->
    <div class="flex-1 overflow-x-hidden overflow-y-auto transition-colors duration-300 bg-gray-50 dark:bg-slate-900">
        
        @include('includes.nav')
        
        <!-- Schedule Content -->
        <main class="min-h-screen p-6">
            <!-- Page Title with View Toggle -->
            <div class="mb-8 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
                <div>
                    <h1 class="text-2xl font-bold text-gray-800 dark:text-white transition-colors duration-300">Schedule</h1>
                    <p class="text-gray-600 dark:text-gray-300 transition-colors duration-300">Manage your interviews and appointments</p>
                </div>
                
                <!-- View Toggle -->
                <div class="inline-flex rounded-lg border border-gray-200 dark:border-slate-700 p-1 bg-white dark:bg-slate-800 transition-colors duration-300" x-data="{ view: 'table' }">
                    <button @click="view = 'table'; $dispatch('set-view', { view: 'table' })" 
                            :class="view === 'table' ? 'bg-blue-600 text-white' : 'text-gray-600 dark:text-gray-300'"
                            class="px-4 py-2 rounded-md font-medium transition-all duration-200 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M3 14h18m-9-4v8m-7 0h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z" />
                        </svg>
                        Table
                    </button>
                    <button @click="view = 'calendar'; $dispatch('set-view', { view: 'calendar' })" 
                            :class="view === 'calendar' ? 'bg-blue-600 text-white' : 'text-gray-600 dark:text-gray-300'"
                            class="px-4 py-2 rounded-md font-medium transition-all duration-200 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        Calendar
                    </button>
                </div>
            </div>
            
            <div x-data="{ currentView: 'table' }" @set-view.window="currentView = $event.detail.view">
    <!-- Filters Section - only shows in table view -->
    <div class="mb-8" x-show="currentView === 'table'" x-cloak>
        <div class="bg-white dark:bg-slate-800 rounded-xl shadow-md border border-gray-200 dark:border-slate-700 p-6 transition-colors duration-300">
            <!-- Filter content remains the same -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Date Range</label>
                            <select class="w-full bg-gray-100 dark:bg-slate-700 border border-gray-300 dark:border-slate-600 rounded-lg py-2.5 px-4 text-gray-800 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500/50 transition-colors duration-300">
                                <option>Today</option>
                                <option>This Week</option>
                                <option>This Month</option>
                                <option>Custom Range</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Interview Type</label>
                            <select class="w-full bg-gray-100 dark:bg-slate-700 border border-gray-300 dark:border-slate-600 rounded-lg py-2.5 px-4 text-gray-800 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500/50 transition-colors duration-300">
                                <option>All Types</option>
                                <option>Technical Interview</option>
                                <option>HR Interview</option>
                                <option>Final Interview</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Status</label>
                            <select class="w-full bg-gray-100 dark:bg-slate-700 border border-gray-300 dark:border-slate-600 rounded-lg py-2.5 px-4 text-gray-800 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500/50 transition-colors duration-300">
                                <option>All Status</option>
                                <option>Pending</option>
                                <option>Accept</option>
                                <option>Decline</option>
                                <option>Cancel</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Content Container -->
            <div x-data="{ currentView: 'table' }" @set-view.window="currentView = $event.detail.view" class="relative">
                
                    <!-- Table View -->
                    <div x-show="currentView === 'table'" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0">
                        <div class="bg-white dark:bg-slate-800 rounded-xl shadow-md border border-gray-200 dark:border-slate-700 overflow-hidden transition-colors duration-300">
                            <div class="overflow-x-auto">
                                <table class="w-full">
                                    <thead>
                                        <tr class="bg-gray-50 dark:bg-slate-700/50 border-b border-gray-200 dark:border-slate-600 transition-colors duration-300">
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider transition-colors duration-300">
                                                Applicant
                                            </th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider transition-colors duration-300">
                                                Subject
                                            </th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider transition-colors duration-300">
                                                Date
                                            </th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider transition-colors duration-300">
                                                Time
                                            </th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider transition-colors duration-300">
                                                Location
                                            </th>
                                            <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider transition-colors duration-300">
                                                Status
                                            </th>
                                            <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider transition-colors duration-300">
                                                Actions
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-200 dark:divide-slate-700">
                                        @forelse($schedules as $schedule)
                                        <tr class="hover:bg-gray-50 dark:hover:bg-slate-700/30 transition-colors duration-200">
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <div class="h-8 w-8 rounded-full bg-gradient-to-br from-blue-400 to-indigo-400 flex items-center justify-center text-white font-medium">
                                                        {{ substr($schedule->firstname, 0, 1) }}{{ substr($schedule->lastname, 0, 1) }}
                                                    </div>
                                                    <div class="ml-3">
                                                        <div class="text-sm font-medium text-gray-900 dark:text-white transition-colors duration-300">
                                                            {{ $schedule->firstname }} {{ $schedule->lastname }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="text-sm text-gray-900 dark:text-white transition-colors duration-300">
                                                    {{ $schedule->subject }}
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="text-sm text-gray-900 dark:text-white transition-colors duration-300">
                                                    @if(isset($schedule->start_schedule_date) && isset($schedule->end_schedule_date))
                                                        @php
                                                            $startDate = \Carbon\Carbon::parse($schedule->start_schedule_date)->format('M d, Y');
                                                            $endDate = \Carbon\Carbon::parse($schedule->end_schedule_date)->format('M d, Y');
                                                        @endphp
                                                        {{ $startDate }}
                                                        @if($startDate != $endDate)
                                                            - {{ $endDate }}
                                                        @endif
                                                    @else
                                                        N/A
                                                    @endif
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="text-sm text-gray-900 dark:text-white transition-colors duration-300">
                                                    @if(isset($schedule->start_schedule_time) && isset($schedule->end_schedule_time))
                                                        @php
                                                            $startTime = \Carbon\Carbon::parse($schedule->start_schedule_time)->format('g:i A');
                                                            $endTime = \Carbon\Carbon::parse($schedule->end_schedule_time)->format('g:i A');
                                                        @endphp
                                                        {{ $startTime }} - {{ $endTime }}
                                                    @else
                                                        N/A
                                                    @endif
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="text-sm text-gray-900 dark:text-white transition-colors duration-300">
                                                    {{ $schedule->location }}
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-center">
                                                @php
                                                    $statusClass = [
                                                        'Pending' => 'bg-yellow-100 text-yellow-800 dark:bg-yellow-900/50 dark:text-yellow-200',
                                                        'Accepted' => 'bg-green-100 text-green-800 dark:bg-green-900/50 dark:text-green-200',
                                                        'Declined' => 'bg-red-100 text-red-800 dark:bg-red-900/50 dark:text-red-200',
                                                        'Cancelled' => 'bg-gray-100 text-gray-800 dark:bg-gray-700/50 dark:text-gray-300'
                                                    ][$schedule->status] ?? 'bg-gray-100 text-gray-800';
                                                @endphp
                                                <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full {{ $statusClass }}">
                                                    {{ $schedule->status }}
                                                </span>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-center">
                                                <div class="flex items-center justify-center">
                                                <button class="p-1.5 text-blue-600 dark:text-blue-400 rounded-lg hover:bg-blue-100 dark:hover:bg-blue-900/30 transition-colors duration-200" 
                                                        title="View & Edit Schedule"
                                                        @click="$dispatch('open-modal', {
                                                            scheduleId: '{{ $schedule->id }}',
                                                            applicant: '{{ $schedule->firstname }} {{ $schedule->lastname }}',
                                                            subject: '{{ $schedule->subject }}',
                                                            date: '{{ $schedule->start_schedule_date }}',
                                                            time: '{{ $schedule->start_schedule_time }}',
                                                            endDate: '{{ $schedule->end_schedule_date }}',
                                                            endTime: '{{ $schedule->end_schedule_time }}',
                                                            location: '{{ $schedule->location }}',
                                                            status: '{{ $schedule->status }}',
                                                            scheduleType: '{{ $schedule->schedule_type }}',
                                                            attendee: '{{ $schedule->attendee }}',
                                                            remarks: '{{ $schedule->remarks }}',
                                                            meetingLink: '{{ $schedule->meeting_link }}'
                                                        })">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                    </svg>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="7" class="px-6 py-4 text-center text-gray-500 dark:text-gray-400">
                                            No schedules found
                                        </td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                
                <!-- Calendar View -->
                    <div x-show="currentView === 'calendar'" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 transform scale-95" x-transition:enter-end="opacity-100 transform scale-100">
                        <div class="bg-white/90 dark:bg-slate-900/90 backdrop-blur-lg backdrop-saturate-150 rounded-2xl shadow-xl border border-white/20 dark:border-slate-700/30 transition-all duration-300 hover:shadow-2xl hover:-translate-y-0.5">
                            <div class="p-8">
                                <!-- Calendar Header -->
                                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-6 mb-10">
                                    <div class="flex flex-col sm:flex-row sm:items-center gap-6">
                                        <h2 class="text-3xl font-bold bg-gradient-to-r from-gray-900 to-gray-600 dark:from-white dark:to-gray-300 bg-clip-text text-transparent" id="calendarMonth">
                                            {{ Carbon\Carbon::now()->format('F Y') }}
                                        </h2>
                                        <div class="flex items-center gap-2">
                        <button class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-gray-100/80 dark:bg-slate-800/80 hover:bg-gray-200/90 dark:hover:bg-slate-700/90 text-gray-700 dark:text-gray-200 transition-all duration-200 hover:scale-105 active:scale-95 shadow-sm hover:shadow" id="prevMonth">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                            </svg>
                        </button>
                        <button class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-gray-100/80 dark:bg-slate-800/80 hover:bg-gray-200/90 dark:hover:bg-slate-700/90 text-gray-700 dark:text-gray-200 transition-all duration-200 hover:scale-105 active:scale-95 shadow-sm hover:shadow" id="nextMonth">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                            </svg>
                        </button>
                        <div class="relative group">
                            <button id="todayButton" class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white rounded-lg transition-all duration-200 shadow-md hover:shadow-lg group-hover:scale-105 active:scale-95 ml-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                Today
                            </button>
                            <div class="absolute hidden group-hover:block w-44 z-10 p-3 mt-2 bg-white/90 dark:bg-slate-800/90 backdrop-blur-sm rounded-lg shadow-lg border border-gray-200/50 dark:border-slate-700 left-0">
                                <div class="text-sm text-gray-700 dark:text-gray-200">Jump to current date</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex items-center gap-4">
                <button @click="$dispatch('new-schedule')" class="relative group">
                    <div class="absolute -inset-0.5 bg-gradient-to-r from-blue-600 to-indigo-600 rounded-lg blur opacity-50 group-hover:opacity-75 transition duration-200"></div>
                    <div class="relative inline-flex items-center px-4 py-2.5 bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white rounded-lg transition-all duration-200 shadow-sm hover:shadow-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                        </svg>
                        New Schedule
                    </div>
                </button>
                </div>
            </div>
            
            <!-- Calendar Grid -->
            <div class="overflow-hidden border border-gray-200/30 dark:border-slate-700/50 rounded-xl shadow-sm backdrop-blur-md">
                <div class="grid grid-cols-7" id="calendarGrid">
                    <!-- Weekday headers -->
                    @foreach(['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'] as $day)
                        <div class="bg-gray-50/80 dark:bg-slate-800/80 border-b border-r border-gray-200/30 dark:border-slate-700/50 py-3">
                            <span class="block text-center text-sm font-semibold text-gray-600 dark:text-gray-300">{{ $day }}</span>
                        </div>
                    @endforeach
                    
                    <!-- Calendar days will be dynamically generated by JavaScript -->
                </div>
            </div>
        </div>
    </div>
</div>
            </div>
        </main>
        @include('modal.schedule-action')
        @include('includes.footer')
    </div>
</div>

<!-- Add Calendar Navigation Script -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const calendarMonth = document.getElementById('calendarMonth');
    const prevMonth = document.getElementById('prevMonth');
    const nextMonth = document.getElementById('nextMonth');
    
    let currentDate = new Date();
    
    function updateCalendarDisplay() {
        const options = { year: 'numeric', month: 'long' };
        calendarMonth.textContent = currentDate.toLocaleDateString('en-US', options);
    }
    
    if (prevMonth) {
        prevMonth.addEventListener('click', function() {
            currentDate.setMonth(currentDate.getMonth() - 1);
            updateCalendarDisplay();
        });
    }
    
    if (nextMonth) {
        nextMonth.addEventListener('click', function() {
            currentDate.setMonth(currentDate.getMonth() + 1);
            updateCalendarDisplay();
        });
    }
});

function openEditModal(candidate, position, date, time, status) {
    const modal = document.querySelector('[x-data*="open: false"]');
    if (modal) {
        const alpineData = Alpine.data(modal);
        if (alpineData) {
            alpineData.open = true;
            alpineData.currentCandidate = candidate;
            alpineData.currentPosition = position;
            alpineData.currentDate = date;
            alpineData.currentTime = time;
            alpineData.currentStatus = status;
        }
    }
}

// Schedule Modal
document.addEventListener('DOMContentLoaded', function() {
    // New Schedule Form
    const newScheduleForm = document.getElementById('new-schedule-form');
    if (newScheduleForm) {
        newScheduleForm.addEventListener('submit', function(e) {
            e.preventDefault();
            const formData = new FormData(this);
            
            fetch('/schedule/save', {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.status === 'success') {
                    Alpine.store('scheduleModal').closeModal();
                    window.location.reload();
                } else {
                    alert('Error: ' + data.message);
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
        });
    }
    
    // Edit Schedule Form
    document.addEventListener('submit-edit-schedule', function(e) {
        const formData = new FormData(document.getElementById('edit-schedule-form'));
        
        fetch('/schedule/update', {
            method: 'POST',
            body: formData,
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.status === 'success') {
                Alpine.store('editModal').open = false;
                window.location.reload();
            } else {
                alert('Error: ' + data.message);
            }
        })
        .catch(error => {
            console.error('Error:', error);
        });
    });
    
    // Schedule Approval
    document.addEventListener('approve-schedule', function(e) {
        const scheduleId = e.detail.scheduleId;
        const status = e.detail.status;
        
        fetch('/schedule/approve', {
            method: 'POST',
            body: JSON.stringify({
                schedule_id: scheduleId,
                status: status
            }),
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.status === 'success') {
                window.location.reload();
            } else {
                alert('Error: ' + data.message);
            }
        })
        .catch(error => {
            console.error('Error:', error);
        });
    });
    
    // Cancel Schedule
    document.addEventListener('cancel-schedule', function(e) {
        const scheduleId = e.detail.scheduleId;
        const message = e.detail.message || '';
        
        fetch('/schedule/cancel', {
            method: 'POST',
            body: JSON.stringify({
                schedule_id: scheduleId,
                message: message
            }),
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.status === 'success') {
                window.location.reload();
            } else {
                alert('Error: ' + data.message);
            }
        })
        .catch(error => {
            console.error('Error:', error);
        });
    });
});

document.addEventListener('DOMContentLoaded', function() {
    // Open modal for new schedule
    document.addEventListener('open-modal', function(e) {
        if (e.detail.time && !e.detail.time.toLowerCase().includes('am') && !e.detail.time.toLowerCase().includes('pm')) {
            try {
                const timeParts = e.detail.time.split(':');
                let hours = parseInt(timeParts[0]);
                const minutes = timeParts[1].split(' ')[0];
                let period = 'AM';
                
                if (hours >= 12) {
                    period = 'PM';
                    if (hours > 12) hours -= 12;
                }
                if (hours === 0) hours = 12;
                
                e.detail.time = `${hours}:${minutes} ${period}`;
            } catch (error) {
                console.error('Error formatting time:', error);
            }
        }
        
        if (e.detail.endTime && !e.detail.endTime.toLowerCase().includes('am') && !e.detail.endTime.toLowerCase().includes('pm')) {
            try {
                const timeParts = e.detail.endTime.split(':');
                let hours = parseInt(timeParts[0]);
                const minutes = timeParts[1].split(' ')[0];
                let period = 'AM';
                
                if (hours >= 12) {
                    period = 'PM';
                    if (hours > 12) hours -= 12;
                }
                if (hours === 0) hours = 12;
                
                e.detail.endTime = `${hours}:${minutes} ${period}`;
            } catch (error) {
                console.error('Error formatting end time:', error);
            }
        }
    });
    
    // Edit Schedule Form
    document.addEventListener('submit-edit-schedule', function(e) {
        const form = document.getElementById('edit-schedule-form');
        const formData = new FormData(form);
        const startTime = formData.get('start_schedule_time');
        const endTime = formData.get('end_schedule_time');
        
        fetch('/schedule/update', {
            method: 'POST',
            body: formData,
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.status === 'success') {
                const modalElement = form.closest('[x-data]');
                if (modalElement && modalElement.__x) {
                    modalElement.__x.$data.open = false;
                } else {
                    const modals = document.querySelectorAll('[x-data*="open: "]');
                    modals.forEach(modal => {
                        if (modal.__x && modal.__x.$data) {
                            modal.__x.$data.open = false;
                        }
                    });
                }
                window.location.reload();
            } else {
                alert('Error: ' + data.message);
            }
        })
        .catch(error => {
            console.error('Error:', error);
        });
    });

    // New Schedule Form
    const newScheduleForm = document.getElementById('new-schedule-form');
    if (newScheduleForm) {
        newScheduleForm.addEventListener('submit', function(e) {
            e.preventDefault();
            const formData = new FormData(this);
            
            fetch('/schedule/save', {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.status === 'success') {
                    const modalElement = this.closest('[x-data]');
                    if (modalElement && modalElement.__x) {
                        modalElement.__x.$data.open = false;
                    } else {
                        const modals = document.querySelectorAll('[x-data*="open: "]');
                        modals.forEach(modal => {
                            if (modal.__x && modal.__x.$data) {
                                modal.__x.$data.open = false;
                            }
                        });
                    }
                    window.location.reload();
                } else {
                
                    alert('Error: ' + data.message);
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
        });
        
        const scheduleTypeSelect = newScheduleForm.querySelector('select[name="schedule_type"]');
        const locationInput = newScheduleForm.querySelector('input[name="location"]');
        
        if (scheduleTypeSelect && locationInput) {
            scheduleTypeSelect.addEventListener('change', function() {
                if (this.value === 'online') {
                    locationInput.value = 'Teams';
                    locationInput.parentElement.style.display = 'none';
                } else {
                    locationInput.value = '';
                    locationInput.parentElement.style.display = 'block';
                }
            });
            
            if (scheduleTypeSelect.value === 'online') {
                locationInput.value = 'Teams';
                locationInput.parentElement.style.display = 'none';
            }
        }
    }
});

document.addEventListener('DOMContentLoaded', function() {
    const calendarMonth = document.getElementById('calendarMonth');
    const prevMonth = document.getElementById('prevMonth');
    const nextMonth = document.getElementById('nextMonth');
    const todayButton = document.getElementById('todayButton');
    const calendarGrid = document.getElementById('calendarGrid');
    
    let currentDate = new Date();
    let schedules = @json($schedules);
    
    // Initialize the calendar
    generateCalendar(currentDate);
    
    if (prevMonth) {
        prevMonth.addEventListener('click', function() {
            currentDate.setMonth(currentDate.getMonth() - 1);
            updateCalendarDisplay();
            clearCalendarGrid();
            generateCalendar(currentDate);
        });
    }
    
    if (nextMonth) {
        nextMonth.addEventListener('click', function() {
            currentDate.setMonth(currentDate.getMonth() + 1);
            updateCalendarDisplay();
            clearCalendarGrid();
            generateCalendar(currentDate);
        });
    }
    
    if (todayButton) {
        todayButton.addEventListener('click', function() {
            currentDate = new Date();
            updateCalendarDisplay();
            clearCalendarGrid();
            generateCalendar(currentDate);
        });
    }
    
    function clearCalendarGrid() {
    // Get the weekday headers
    const headerCells = [];
    for (let i = 0; i < 7; i++) {
        const header = calendarGrid.querySelector(`div:nth-child(${i+1})`);
        if (header) {
            headerCells.push(header.cloneNode(true));
        }
    }
   
    calendarGrid.innerHTML = '';
    
    headerCells.forEach(header => {
        calendarGrid.appendChild(header);
    });
}
    
    function updateCalendarDisplay() {
        const options = { year: 'numeric', month: 'long' };
        calendarMonth.textContent = currentDate.toLocaleDateString('en-US', options);
    }
    
    function generateCalendar(date) {
        // Clear previous calendar days (except weekday headers)
        const headerRow = calendarGrid.querySelectorAll('div:nth-child(-n+7)');
        calendarGrid.innerHTML = '';
        headerRow.forEach(header => {
            calendarGrid.appendChild(header);
        });
        
        // Get the first day of the month
        const firstDay = new Date(date.getFullYear(), date.getMonth(), 1);
        const firstDayOfWeek = firstDay.getDay(); // 0 = Sunday, 1 = Monday, etc.
        
        // Get the last day of the month
        const lastDay = new Date(date.getFullYear(), date.getMonth() + 1, 0);
        const daysInMonth = lastDay.getDate();
        
        // Get today's date for highlighting
        const today = new Date();
        const isCurrentMonth = today.getMonth() === date.getMonth() && today.getFullYear() === date.getFullYear();
        const currentDay = today.getDate();
        
        for (let i = 0; i < firstDayOfWeek; i++) {
            const emptyCell = document.createElement('div');
            emptyCell.className = 'h-28 border-b border-r border-gray-200/30 dark:border-slate-700/50 bg-gray-50/30 dark:bg-slate-900/30';
            calendarGrid.appendChild(emptyCell);
        }
        
        // Get the month and year for schedule filtering
        const calendarMonth = date.getMonth() + 1;
        const calendarYear = date.getFullYear();
        
        // Generate days of the month
        for (let day = 1; day <= daysInMonth; day++) {
            const dayElement = document.createElement('div');
            dayElement.className = 'h-28 border-b border-r border-gray-200/30 dark:border-slate-700/50 hover:bg-gray-50/70 dark:hover:bg-slate-800/50 transition-all duration-200 cursor-pointer backdrop-blur-sm group';
            
            const dayContent = document.createElement('div');
            dayContent.className = 'p-3 h-full flex flex-col';
            
            const dayHeader = document.createElement('div');
            dayHeader.className = 'flex items-center justify-between mb-1';
            
            if (isCurrentMonth && day === currentDay) {
                const currentDayDiv = document.createElement('div');
                currentDayDiv.className = 'w-6 h-6 rounded-full bg-gradient-to-r from-blue-500 to-indigo-500 flex items-center justify-center shrink-0';
                
                const dayText = document.createElement('span');
                dayText.className = 'text-xs font-bold text-white';
                dayText.textContent = day;
                
                currentDayDiv.appendChild(dayText);
                dayHeader.appendChild(currentDayDiv);
            } else {
                const dayText = document.createElement('span');
                dayText.className = 'text-sm font-semibold text-gray-700 dark:text-gray-300 transition-colors duration-200';
                dayText.textContent = day;
                dayHeader.appendChild(dayText);
            }
            
            dayContent.appendChild(dayHeader);
            
            // Add events for this day from schedules
            const eventsContainer = document.createElement('div');
            eventsContainer.className = 'space-y-1 overflow-y-auto flex-1';
            
            // Filter schedules for this day
            const daySchedules = schedules.filter(schedule => {
                if (!schedule.start_schedule_date) return false;
                
                const scheduleDate = new Date(schedule.start_schedule_date);
                return scheduleDate.getDate() === day && 
                       scheduleDate.getMonth() + 1 === calendarMonth && 
                       scheduleDate.getFullYear() === calendarYear;
            });
            
            // Add events to calendar
            daySchedules.forEach(schedule => {
                const event = document.createElement('div');
                
                // Color based on status
                let colorClass = '';
                switch(schedule.status) {
                    case 'Pending':
                        colorClass = 'bg-yellow-100/90 text-yellow-800 dark:bg-yellow-900/50 dark:text-yellow-200 border-yellow-200/50 dark:border-yellow-800/50';
                        break;
                    case 'Accepted':
                        colorClass = 'bg-green-100/90 text-green-800 dark:bg-green-900/50 dark:text-green-200 border-green-200/50 dark:border-green-800/50';
                        break;
                    case 'Declined':
                        colorClass = 'bg-red-100/90 text-red-800 dark:bg-red-900/50 dark:text-red-200 border-red-200/50 dark:border-red-800/50';
                        break;
                    case 'Cancelled':
                        colorClass = 'bg-gray-100/90 text-gray-800 dark:bg-gray-700/50 dark:text-gray-300 border-gray-200/50 dark:border-gray-700/50';
                        break;
                    default:
                        colorClass = 'bg-blue-100/90 text-blue-800 dark:bg-blue-900/50 dark:text-blue-200 border-blue-200/50 dark:border-blue-800/50';
                }
                
                event.className = `px-2 py-1 text-xs rounded-md ${colorClass} border shadow-sm backdrop-blur-sm transform transition-all duration-200 cursor-pointer`;
                
                // Format time for display
                let formattedTime = 'N/A';
                if (schedule.start_schedule_time) {
                    try {
                        const timeParts = schedule.start_schedule_time.split(':');
                        if (timeParts.length >= 2) {
                            
                            if (schedule.start_schedule_time.toLowerCase().includes('am') || schedule.start_schedule_time.toLowerCase().includes('pm')) {
                                formattedTime = schedule.start_schedule_time;
                            } else {
                                let hours = parseInt(timeParts[0]);
                                const minutes = timeParts[1].split(' ')[0];
                                let period = 'AM';
                                
                                if (hours >= 12) {
                                    period = 'PM';
                                    if (hours > 12) hours -= 12;
                                }
                                if (hours === 0) hours = 12;
                                
                                formattedTime = `${hours}:${minutes} ${period}`;
                            }
                        }
                    } catch (error) {
                        console.error('Error formatting time:', error);
                        formattedTime = schedule.start_schedule_time;
                    }
                }
                
                const timeDiv = document.createElement('div');
                timeDiv.className = 'font-medium';
                timeDiv.textContent = formattedTime;
                
                const subjectDiv = document.createElement('div');
                subjectDiv.className = 'text-xs opacity-90';
                subjectDiv.textContent = schedule.subject || 'Unnamed Schedule';
                
                event.appendChild(timeDiv);
                event.appendChild(subjectDiv);
                
                event.addEventListener('click', function(e) {
                    e.stopPropagation();
                    
                    const eventDetail = {
                        scheduleId: schedule.id,
                        applicant: `${schedule.firstname} ${schedule.lastname}`,
                        subject: schedule.subject,
                        date: schedule.start_schedule_date,
                        time: schedule.start_schedule_time,
                        endDate: schedule.end_schedule_date,
                        endTime: schedule.end_schedule_time,
                        location: schedule.location,
                        status: schedule.status,
                        scheduleType: schedule.schedule_type,
                        attendee: schedule.attendee,
                        remarks: schedule.remarks,
                        meetingLink: schedule.meeting_link
                    };
                    
                    window.dispatchEvent(new CustomEvent('open-modal', {
                        detail: eventDetail
                    }));
                    
                    console.log('Calendar event clicked, dispatched open-modal window event');
                });
                
                eventsContainer.appendChild(event);
            });
            
            dayContent.appendChild(eventsContainer);
            dayElement.appendChild(dayContent);
            calendarGrid.appendChild(dayElement);
            
         
            dayElement.addEventListener('click', function(e) {
                
                if (e.target === dayElement || e.target === dayContent || e.target === dayHeader) {
                    const selectedDate = new Date(date.getFullYear(), date.getMonth(), day);
                    const formattedDate = `${selectedDate.getMonth() + 1}/${selectedDate.getDate()}/${selectedDate.getFullYear()}`;

                    document.dispatchEvent(new CustomEvent('new-schedule', {
                        detail: {
                            prefilledDate: formattedDate
                        }
                    }));
                }
            });
        }
        
        // Fill remaining cells
        const lastDayOfWeek = (firstDayOfWeek + daysInMonth - 1) % 7;
        const remainingCells = lastDayOfWeek === 6 ? 0 : 6 - lastDayOfWeek;
        
        for (let i = 0; i < remainingCells; i++) {
            const emptyCell = document.createElement('div');
            emptyCell.className = 'h-28 border-b border-r border-gray-200/30 dark:border-slate-700/50 bg-gray-50/30 dark:bg-slate-900/30';
            calendarGrid.appendChild(emptyCell);
        }
    }
    document.addEventListener('new-schedule', function(e) {
        if (e.detail && e.detail.prefilledDate) {
            setTimeout(() => {
                const startDateInput = document.querySelector('#new-schedule-form input[name="start_schedule_date"]');
                const endDateInput = document.querySelector('#new-schedule-form input[name="end_schedule_date"]');
                
                if (startDateInput) startDateInput.value = e.detail.prefilledDate;
                if (endDateInput) endDateInput.value = e.detail.prefilledDate;
            }, 100);
        }
    });
});
</script>