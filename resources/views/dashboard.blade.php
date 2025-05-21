@include('includes.header')

<!-- Main Container -->
<div class="flex" id="main-container">
    
    @include('includes.side')
    
    <!-- Main Content -->
    <div class="flex-1 overflow-x-hidden overflow-y-auto bg-white dark:bg-slate-900 transition-colors duration-300" id="content-area">
        
        @include('includes.nav')
        
        <!-- Dashboard Content -->
        <main class="min-h-screen p-6">
            <!-- Filters Row -->
            <div class="grid grid-cols-5 gap-3 mb-6">
                <div class="border dark:border-slate-700 rounded shadow-md">
                    <div class="p-3">
                        
                        <div class="flex justify-between items-center">
                            <span class="text-sm font-medium dark:text-gray-200">Date</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400 dark:text-gray-500" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </div>
                    </div>
                </div>
                
                <div class="border dark:border-slate-700 rounded shadow-md">
                    <div class="p-3">
                        
                        <div class="flex justify-between items-center">
                            <span class="text-sm font-medium dark:text-gray-200">Last 30 Days</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400 dark:text-gray-500" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </div>
                    </div>
                </div>
                
                <div class="border dark:border-slate-700 rounded shadow-md">
                    <div class="p-3">
                        
                        <div class="flex justify-between items-center">
                            <span class="text-sm font-medium dark:text-gray-200">All Client</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400 dark:text-gray-500" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </div>
                    </div>
                </div>
                
                <div class="border dark:border-slate-700 rounded shadow-md">
                    <div class="p-3">
                        
                        <div class="flex justify-between items-center">
                            <span class="text-sm font-medium dark:text-gray-200">Job Position</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400 dark:text-gray-500" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </div>
                    </div>
                </div>
                
                <button class="bg-blue-500 hover:bg-blue-600 dark:bg-blue-600 dark:hover:bg-blue-700 text-white font-medium rounded h-full transition-colors duration-200">
                    Search
                </button>
            </div>
            
            <!-- Stats Cards -->
            <div class="grid grid-cols-4 gap-4 mb-6">
                <!-- Total Applicants Card -->
                <div class="border dark:border-slate-700 rounded-md p-4 bg-white dark:bg-slate-800 transition-colors duration-300 shadow-md">
                    <h3 class="text-sm text-gray-500 dark:text-gray-400 font-medium">Total Applicants</h3>
                    <p class="text-2xl font-bold mt-1 dark:text-white">1,260</p>
                </div>
                
                <!-- Success Rate Card -->
                <div class="border dark:border-slate-700 rounded-md p-4 bg-white dark:bg-slate-800 transition-colors duration-300 shadow-md">
                    <h3 class="text-sm text-gray-500 dark:text-gray-400 font-medium">Success Rate (Hired%)</h3>
                    <p class="text-2xl font-bold mt-1 dark:text-white">28.6%</p>
                    <div class="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-1.5 mt-2">
                        <div class="bg-blue-500 h-1.5 rounded-full" style="width: 28.6%"></div>
                    </div>
                </div>
                
                <!-- Failure Rate Card -->
                <div class="border dark:border-slate-700 rounded-md p-4 bg-white dark:bg-slate-800 transition-colors duration-300 shadow-md">
                    <h3 class="text-sm text-gray-500 dark:text-gray-400 font-medium">Failure Rate (Rejected%)</h3>
                    <p class="text-2xl font-bold mt-1 dark:text-white">28.6%</p>
                    <div class="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-1.5 mt-2">
                        <div class="bg-red-500 h-1.5 rounded-full" style="width: 28.6%"></div>
                    </div>
                </div>
                
                <!-- Pending Rate Card -->
                <div class="border dark:border-slate-700 rounded-md p-4 bg-white dark:bg-slate-800 transition-colors duration-300 shadow-md">
                    <h3 class="text-sm text-gray-500 dark:text-gray-400 font-medium">Pending/Shortlisted Rate</h3>
                    <p class="text-2xl font-bold mt-1 dark:text-white">19.4%</p>
                </div>
            </div>
            
            <!-- Monthly Trends Chart -->
            <div class="border dark:border-slate-700 rounded-md p-4 bg-white dark:bg-slate-800 transition-colors duration-300 mb-6 shadow-md">
                <h3 class="text-sm font-medium mb-4 dark:text-white">Monthly Trends of Application</h3>
                <div class="h-48">
                    <canvas id="monthlyTrendsChart"></canvas>
                </div>
            </div>
            
            <!-- Success vs Failure Chart -->
            <div class="border dark:border-slate-700 rounded-md p-4 bg-white dark:bg-slate-800 transition-colors duration-300 mb-6 shadow-md">
                <h3 class="text-sm font-medium mb-4 dark:text-white">Success vs Failure Rate per Client</h3>
                <div class="flex items-center justify-center gap-2 mb-4">
                    <div class="flex items-center">
                        <div class="w-3 h-3 bg-blue-500 rounded-sm mr-1"></div>
                        <span class="text-xs dark:text-gray-300">Success Rate</span>
                    </div>
                    <div class="flex items-center">
                        <div class="w-3 h-3 bg-red-500 rounded-sm mr-1"></div>
                        <span class="text-xs dark:text-gray-300">Failure Rate</span>
                    </div>
                </div>
                <div class="h-48">
                    <canvas id="successFailureChart"></canvas>
                </div>
            </div>
            
            <!-- Two Column Charts -->
            <div class="grid grid-cols-2 gap-6 mb-6">
                <!-- Applicant Drop-off Rate Chart -->
                <div class="border dark:border-slate-700 rounded-md p-4 bg-white dark:bg-slate-800 transition-colors duration-300 shadow-md">
                    <h3 class="text-sm font-medium mb-4 dark:text-white">Applicant Drop-Off Rate</h3>
                    <div class="h-48">
                        <canvas id="dropOffChart"></canvas>
                    </div>
                </div>
                
                <!-- Where Candidates Found Us Chart -->
                <div class="border dark:border-slate-700 rounded-md p-4 bg-white dark:bg-slate-800 transition-colors duration-300 shadow-md">
                    <h3 class="text-sm font-medium mb-4 dark:text-white">Where Candidates Found Us</h3>
                    <div class="flex justify-center">
                        <div class="w-40 h-40">
                            <canvas id="candidateSourceChart"></canvas>
                        </div>
                    </div>
                    <div class="flex flex-wrap gap-2 justify-center mt-2">
                        <div class="flex items-center gap-1">
                            <div class="w-3 h-3 bg-red-500 rounded-sm"></div>
                            <span class="text-xs dark:text-gray-300">Facebook</span>
                        </div>
                        <div class="flex items-center gap-1">
                            <div class="w-3 h-3 bg-blue-400 rounded-sm"></div>
                            <span class="text-xs dark:text-gray-300">LinkedIn</span>
                        </div>
                        <div class="flex items-center gap-1">
                            <div class="w-3 h-3 bg-green-500 rounded-sm"></div>
                            <span class="text-xs dark:text-gray-300">Google</span>
                        </div>
                        <div class="flex items-center gap-1">
                            <div class="w-3 h-3 bg-purple-500 rounded-sm"></div>
                            <span class="text-xs dark:text-gray-300">Indeed.net</span>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Company Table -->
            <div class="border dark:border-slate-700 rounded-md p-4 bg-white dark:bg-slate-800 transition-colors duration-300 shadow-md">
                <table class="w-full">
                    <thead>
                        <tr class="border-b dark:border-slate-700">
                            <th class="text-left py-3 font-medium text-gray-500 dark:text-gray-400 flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400 dark:text-gray-500" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                                </svg>
                                Company
                            </th>
                            <th class="text-center py-3 font-medium text-gray-500 dark:text-gray-400">Success Rate</th>
                            <th class="text-center py-3 font-medium text-gray-500 dark:text-gray-400">Failed Rate</th>
                            <th class="text-center py-3 font-medium text-gray-500 dark:text-gray-400">Average Time/Stage</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach(range(1, 4) as $i)
                        <tr class="border-b dark:border-slate-700">
                            <td class="py-4">
                                <div class="flex items-center gap-3">
                                    <div class="w-8 h-8 bg-gray-200 dark:bg-gray-700 rounded-full flex items-center justify-center text-gray-500 dark:text-gray-400">
                                        E
                                    </div>
                                    <div>
                                        <p class="text-sm font-medium dark:text-white">Enjay LTD</p>
                                        <p class="text-xs text-gray-500 dark:text-gray-400">example@gmail.com</p>
                                    </div>
                                </div>
                            </td>
                            <td class="text-center py-4 dark:text-gray-300">9%</td>
                            <td class="text-center py-4 dark:text-gray-300">9%</td>
                            <td class="text-center py-4 dark:text-gray-300">9%</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </main>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const isDarkMode = document.documentElement.classList.contains('dark');
    
    const gridColor = isDarkMode ? 'rgba(255, 255, 255, 0.1)' : 'rgba(0, 0, 0, 0.1)';
    const textColor = isDarkMode ? 'rgba(255, 255, 255, 0.7)' : 'rgba(0, 0, 0, 0.7)';
    
    const trendsCtx = document.getElementById('monthlyTrendsChart').getContext('2d');
    
    const monthlyTrendsChart = new Chart(trendsCtx, {
        type: 'line',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
            datasets: [{
                label: 'Applications',
                data: [100, 125, 150, 175, 200, 175, 150, 140, 125, 135, 50, 100],
                backgroundColor: isDarkMode ? 'rgba(59, 130, 246, 0.3)' : 'rgba(59, 130, 246, 0.2)',
                borderColor: 'rgb(59, 130, 246)',
                borderWidth: 2,
                tension: 0.4,
                fill: true,
                pointRadius: 3
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                y: {
                    beginAtZero: true,
                    max: 250,
                    ticks: {
                        stepSize: 50,
                        color: textColor
                    },
                    grid: {
                        color: gridColor,
                        drawBorder: false
                    }
                },
                x: {
                    grid: {
                        display: false
                    },
                    ticks: {
                        color: textColor
                    }
                }
            },
            plugins: {
                legend: {
                    display: false
                }
            }
        }
    });
    
    window.monthlyTrendsChart = monthlyTrendsChart;
    
    const successFailureCtx = document.getElementById('successFailureChart').getContext('2d');
    
    const successFailureChart = new Chart(successFailureCtx, {
        type: 'bar',
        data: {
            labels: ['Client A', 'Client B', 'Client C', 'Client D', 'Client E', 'Client A', 'Client B', 'Client C', 'Client D', 'Client E'],
            datasets: [
                {
                    label: 'Success Rate',
                    data: [30, 20, 20, 30, 20, 30, 20, 20, 30, 20],
                    backgroundColor: 'rgb(59, 130, 246)',
                    barPercentage: 0.5,
                    categoryPercentage: 0.7
                },
                {
                    label: 'Failure Rate',
                    data: [10, 20, 15, 10, 20, 10, 20, 15, 10, 20],
                    backgroundColor: 'rgb(239, 68, 68)',
                    barPercentage: 0.5,
                    categoryPercentage: 0.7
                }
            ]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                y: {
                    beginAtZero: true,
                    max: 50,
                    stacked: false,
                    ticks: {
                        stepSize: 10,
                        color: textColor
                    },
                    grid: {
                        color: gridColor,
                        drawBorder: false
                    }
                },
                x: {
                    grid: {
                        display: false
                    },
                    ticks: {
                        color: textColor
                    }
                }
            },
            plugins: {
                legend: {
                    display: false
                }
            }
        }
    });
    
    window.successFailureChart = successFailureChart;
    
    // Applicant Drop-Off Chart
    const dropOffCtx = document.getElementById('dropOffChart').getContext('2d');
    
    const dropOffChart = new Chart(dropOffCtx, {
        type: 'bar',
        data: {
            labels: ['Applied', 'Shortlisted', 'Interview', 'Hired'],
            datasets: [{
                axis: 'y',
                data: [100, 65, 35, 15],
                backgroundColor: [
                    'rgb(59, 130, 246)',
                    'rgb(239, 68, 68)',
                    'rgb(20, 184, 166)',
                    'rgb(124, 58, 237)'
                ],
                barPercentage: 0.8
            }]
        },
        options: {
            indexAxis: 'y',
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                x: {
                    beginAtZero: true,
                    max: 100,
                    ticks: {
                        callback: function(value) {
                            return value + '%';
                        },
                        color: textColor
                    },
                    grid: {
                        color: gridColor
                    }
                },
                y: {
                    grid: {
                        display: false
                    },
                    ticks: {
                        color: textColor
                    }
                }
            },
            plugins: {
                legend: {
                    display: false
                },
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            return context.parsed.x + '%';
                        }
                    }
                }
            }
        }
    });
    
    window.dropOffChart = dropOffChart;
    
    // Candidate Source Chart
    const sourceCtx = document.getElementById('candidateSourceChart').getContext('2d');
    
    const candidateSourceChart = new Chart(sourceCtx, {
        type: 'doughnut',
        data: {
            labels: ['Facebook', 'LinkedIn', 'Google', 'Indeed.net'],
            datasets: [{
                data: [40, 30, 20, 10],
                backgroundColor: [
                    'rgb(239, 68, 68)',
                    'rgb(14, 165, 233)',
                    'rgb(34, 197, 94)',
                    'rgb(168, 85, 247)'
                ],
                borderWidth: 0,
                hoverOffset: 5
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            cutout: '70%',
            plugins: {
                legend: {
                    display: false
                },
                tooltip: {
                    bodyColor: textColor
                }
            }
        }
    });
    
    window.candidateSourceChart = candidateSourceChart;
    
    const themeToggle = document.getElementById('themeToggle');
    if (themeToggle) {
        themeToggle.addEventListener('click', function() {
            setTimeout(() => {
                updateChartsTheme();
            }, 100);
        });
    }
    
    function updateChartsTheme() {
        const isDarkMode = document.documentElement.classList.contains('dark');
        const gridColor = isDarkMode ? 'rgba(255, 255, 255, 0.1)' : 'rgba(0, 0, 0, 0.1)';
        const textColor = isDarkMode ? 'rgba(255, 255, 255, 0.7)' : 'rgba(0, 0, 0, 0.7)';
        
        if (window.monthlyTrendsChart) {
            window.monthlyTrendsChart.data.datasets[0].backgroundColor = isDarkMode ? 'rgba(59, 130, 246, 0.3)' : 'rgba(59, 130, 246, 0.2)';
            window.monthlyTrendsChart.options.scales.y.grid.color = gridColor;
            window.monthlyTrendsChart.options.scales.y.ticks.color = textColor;
            window.monthlyTrendsChart.options.scales.x.ticks.color = textColor;
            window.monthlyTrendsChart.update();
        }

        if (window.successFailureChart) {
            window.successFailureChart.options.scales.y.grid.color = gridColor;
            window.successFailureChart.options.scales.y.ticks.color = textColor;
            window.successFailureChart.options.scales.x.ticks.color = textColor;
            window.successFailureChart.update();
        }
     
        if (window.dropOffChart) {
            window.dropOffChart.options.scales.x.grid.color = gridColor;
            window.dropOffChart.options.scales.x.ticks.color = textColor;
            window.dropOffChart.options.scales.y.ticks.color = textColor;
            window.dropOffChart.update();
        }
        
        if (window.candidateSourceChart) {
            window.candidateSourceChart.update();
        }
    }
});
</script>

@include('includes.footer')