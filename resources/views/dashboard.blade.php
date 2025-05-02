@include('includes.header')

<!-- Main Container -->
<div class="flex" id="main-container">
    
   @include('includes.side')
    
    <!-- Main Content -->
    <div class="flex-1 overflow-x-hidden overflow-y-auto transition-colors duration-300 bg-slate-50 dark:bg-slate-900" id="content-area">
        
    @include('includes.nav')
        
        <!-- Dashboard Content -->
        <main class="min-h-screen p-6 transition-colors duration-300">
            <!-- Page Title -->
            <div class="mb-8">
                <h1 class="text-2xl font-bold text-slate-800 dark:text-white transition-colors duration-300">Dashboard</h1>
                <p class="text-slate-600 dark:text-blue-200/70 transition-colors duration-300">Welcome back, Kent Cortiguerra</p>
            </div>
            
            <!-- Stats Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <!-- Total Jobs Card -->
                <div class="bg-white dark:bg-gradient-to-br dark:from-blue-900/80 dark:to-blue-950/90 rounded-xl shadow-lg border border-slate-200 dark:border-blue-800/50 backdrop-blur-sm p-6 transition-colors duration-300">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-slate-500 dark:text-blue-200/90 text-sm font-medium transition-colors duration-300">Total Jobs</p>
                            <h2 class="text-3xl font-bold text-slate-800 dark:text-white mt-1 transition-colors duration-300">
                            {{ $totalJob }}
                            </h2>
                        </div>
                        <div class="bg-blue-100 dark:bg-blue-600/30 p-3 rounded-full transition-colors duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-blue-600 dark:text-blue-100 transition-colors duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                        </div>
                    </div>
                    <div class="mt-4 flex items-center text-sm">
                       
                    </div>
                </div>
                
                <!-- Active Applicants Card -->
                <div class="bg-white dark:bg-gradient-to-br dark:from-indigo-900/80 dark:to-indigo-950/90 rounded-xl shadow-lg border border-slate-200 dark:border-indigo-800/50 backdrop-blur-sm p-6 transition-colors duration-300">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-slate-500 dark:text-blue-200/90 text-sm font-medium transition-colors duration-300">Active Applicants</p>
                            <h2 class="text-3xl font-bold text-slate-800 dark:text-white mt-1 transition-colors duration-300">
                                {{ $totalApplicant }}
                            </h2>
                        </div>
                        <div class="bg-indigo-100 dark:bg-indigo-600/30 p-3 rounded-full transition-colors duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-indigo-600 dark:text-blue-100 transition-colors duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                        </div>
                    </div>
                    <div class="mt-4 flex items-center text-sm">
                       
                    </div>
                </div>
                
                <!-- New Applications Card -->
                <div class="bg-white dark:bg-gradient-to-br dark:from-purple-900/80 dark:to-purple-950/90 rounded-xl shadow-lg border border-slate-200 dark:border-purple-800/50 backdrop-blur-sm p-6 transition-colors duration-300">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-slate-500 dark:text-blue-200/90 text-sm font-medium transition-colors duration-300">New Applications</p>
                            <h2 class="text-3xl font-bold text-slate-800 dark:text-white mt-1 transition-colors duration-300">
                            {{ $totalNewApplicant }}
                            </h2>
                        </div>
                        <div class="bg-purple-100 dark:bg-purple-600/30 p-3 rounded-full transition-colors duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-purple-600 dark:text-blue-100 transition-colors duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                        </div>
                    </div>
                    <div class="mt-4 flex items-center text-sm">
                        
                    </div>
                </div>
                
                <!-- Hired Candidates Card -->
                <div class="bg-white dark:bg-gradient-to-br dark:from-cyan-900/80 dark:to-cyan-950/90 rounded-xl shadow-lg border border-slate-200 dark:border-cyan-800/50 backdrop-blur-sm p-6 transition-colors duration-300">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-slate-500 dark:text-blue-200/90 text-sm font-medium transition-colors duration-300">Hired Candidates</p>
                            <h2 class="text-3xl font-bold text-slate-800 dark:text-white mt-1 transition-colors duration-300">
                            {{ $hiredCount }}
                            </h2>
                        </div>
                        <div class="bg-cyan-100 dark:bg-cyan-600/30 p-3 rounded-full transition-colors duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-cyan-600 dark:text-blue-100 transition-colors duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                    </div>
                    <div class="mt-4 flex items-center text-sm">
                       
                    </div>
                </div>
            </div>
            
            <!-- Enhanced Application Trends Chart (Full Width) -->
            <div class="bg-white dark:bg-slate-800/60 rounded-xl shadow-lg border border-slate-200 dark:border-slate-700/50 backdrop-blur-sm p-6 mb-8 transition-colors duration-300">
                <h3 class="text-lg font-semibold text-slate-800 dark:text-white mb-6 transition-colors duration-300">Application Trends</h3>
                <div class="relative h-96">
                    <canvas id="applicationTrendsChart"></canvas>
                </div>
            </div>

            <!-- Referral Sources Section -->
<div class="bg-white dark:bg-slate-800/60 rounded-xl shadow-lg border border-slate-200 dark:border-slate-700/50 backdrop-blur-sm p-6 mb-8 transition-colors duration-300">
  <h3 class="text-lg font-semibold text-slate-800 dark:text-white mb-6 transition-colors duration-300">
    Where Candidates Found Us
  </h3>
  
  @php
    // Map each source to its Chart.js color & badge bg
    $colorMap = [
      'LinkedIn' => '#0A66C2',
      'Facebook' => '#1877F2',
      'Google'   => '#EA4335',
      // add more sources here…
    ];
  @endphp

  <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
    <!-- Chart -->
    <div class="lg:col-span-2">
      <div class="relative h-96">
        <canvas id="referralChart" class="w-full max-w-xs mx-auto"></canvas>
        
        <div class="flex flex-wrap justify-center gap-4 mt-6">
        
        </div>
      </div>
    </div>
    
    <!-- Stats/Details -->
    <div class="space-y-4">
      @foreach($sources as $i => $source)
        @php
          $color = $colorMap[$source] ?? '#888';
          $count = $counts[$i];     // raw candidate count
          $pct   = $data[$i];       // percentage
        @endphp

        <div class="bg-slate-50 dark:bg-slate-700/30 rounded-lg p-4 transition-colors duration-300">
          <div class="flex items-center justify-between">
            <div class="flex items-center">
              
              <div>
                <h4 class="text-slate-800 dark:text-white font-medium transition-colors duration-300">
                  {{ $source }}
                </h4>
                <p class="text-slate-500 dark:text-blue-200/70 text-sm transition-colors duration-300">
                  {{ $count }} candidates
                </p>
              </div>
            </div>
            <span class="text-lg font-semibold text-slate-800 dark:text-white transition-colors duration-300">
              {{ $pct }}%
            </span>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</div>

            
            
        </main>
    </div>
</div>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    const ctx = document.getElementById('referralChart').getContext('2d');
        const labels = @json($sources);  // ['Facebook','LinkedIn','Google',…]
        const data   = @json($data);     // [48.0,32.0,20.0,…]
        const backgroundColors = labels.map((_, i) => {
            // spread hues evenly around the 360° color wheel
            const hue = Math.round((360 * i) / labels.length);
            return `hsl(${hue}, 65%, 50%)`;
        });
        new Chart(ctx, {
        type: 'doughnut',
        data: {
          labels,
          datasets: [{
            data,
            backgroundColor: backgroundColors,
            borderWidth: 0,
            borderRadius: 4
          }]
        },
        options: {
          responsive: true,
          maintainAspectRatio: true,
          cutout: '70%',
          plugins: {
            legend: { display: false },
            tooltip: {
              backgroundColor: 'rgba(0, 0, 0, 0.7)',
              padding: 10,
              titleColor: '#fff',
              bodyColor: '#fff',
              displayColors: true,
              callbacks: {
                label: ctx => `${ctx.label}: ${ctx.parsed}%`
              }
            }
          }
        }
      });
  });

  // Application Trends Chart
const appCtx = document.getElementById('applicationTrendsChart').getContext('2d');

const monthlyData = {
        labels: @json($labels),
        barData: @json($barData),
        
    };

const areaGradient = appCtx.createLinearGradient(0, 0, 0, 400);
areaGradient.addColorStop(0, 'rgba(99, 102, 241, 0.6)');
areaGradient.addColorStop(1, 'rgba(99, 102, 241, 0.0)');

const applicationChart = new Chart(appCtx, {
    type: 'bar',
    data: {
        labels: monthlyData.labels,
        datasets: [
            {
                type: 'bar',
                label: 'Applications',
                data: monthlyData.barData,
                backgroundColor: document.querySelector('html').classList.contains('dark') 
                    ? 'rgb(59, 130, 246)'
                    : 'rgb(96, 165, 250)',
                borderRadius: 4,
                order: 2
            },
            
        ]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        scales: {
            y: {
                beginAtZero: true,
                max: 200,
                grid: {
                    color: document.querySelector('html').classList.contains('dark') 
                        ? 'rgba(148, 163, 184, 0.1)' 
                        : 'rgba(203, 213, 225, 0.5)',
                },
                ticks: {
                    color: document.querySelector('html').classList.contains('dark') 
                        ? 'rgba(147, 197, 253, 0.8)' 
                        : 'rgb(100, 116, 139)'
                }
            },
            x: {
                grid: {
                    display: false
                },
                ticks: {
                    color: document.querySelector('html').classList.contains('dark') 
                        ? 'rgba(147, 197, 253, 0.8)' 
                        : 'rgb(100, 116, 139)'
                }
            }
        },
        plugins: {
            legend: {
                position: 'top',
                align: 'end',
                labels: {
                    boxWidth: 12,
                    usePointStyle: false,
                    padding: 20,
                    color: document.querySelector('html').classList.contains('dark') 
                        ? 'rgba(147, 197, 253, 0.8)' 
                        : 'rgb(71, 85, 105)'
                }
            },
            tooltip: {
                backgroundColor: 'rgba(0, 0, 0, 0.7)',
                padding: 10,
                titleColor: '#fff',
                bodyColor: '#fff',
                cornerRadius: 6,
                displayColors: true
            }
        },
        interaction: {
            mode: 'index',
            intersect: false
        },
        animation: {
            duration: 1000
        }
    }
});

const updateChartTheme = () => {
    const isDarkMode = document.querySelector('html').classList.contains('dark');
    
    applicationChart.data.datasets[0].backgroundColor = isDarkMode ? 'rgb(59, 130, 246)' : 'rgb(96, 165, 250)';
    
    applicationChart.options.scales.y.grid.color = isDarkMode 
        ? 'rgba(148, 163, 184, 0.1)' 
        : 'rgba(203, 213, 225, 0.5)';
        
    applicationChart.options.scales.y.ticks.color = isDarkMode 
        ? 'rgba(147, 197, 253, 0.8)' 
        : 'rgb(100, 116, 139)';
        
    applicationChart.options.scales.x.ticks.color = isDarkMode 
        ? 'rgba(147, 197, 253, 0.8)' 
        : 'rgb(100, 116, 139)';
        
    applicationChart.options.plugins.legend.labels.color = isDarkMode 
        ? 'rgba(147, 197, 253, 0.8)' 
        : 'rgb(71, 85, 105)';
    
    applicationChart.update();
};

document.addEventListener('themeChanged', updateChartTheme);
</script>

@include('includes.footer')