<x-app-layout>
    <!-- Background with gradient -->
    <div class="min-h-screen bg-gradient-to-br from-blue-50 via-purple-50 to-pink-50 dark:from-gray-900 dark:via-blue-900 dark:to-purple-900">
        <div class="p-6 sm:ml-64 lg:p-8">
            <!-- Stats Cards Section -->
            <div class="grid grid-cols-1 gap-6 mt-5 mb-8 md:grid-cols-2 xl:grid-cols-2">
                <!-- Total Articles Card -->
                <div class="group relative overflow-hidden rounded-2xl bg-white/70 dark:bg-gray-800/70 backdrop-blur-lg border border-white/20 dark:border-gray-700/30 shadow-xl hover:shadow-2xl transition-all duration-300 hover:scale-[1.02]">
                    <!-- Glassmorphism overlay -->
                    <div class="absolute inset-0 transition-opacity duration-300 opacity-0 bg-gradient-to-r from-red-500/10 to-pink-500/10 group-hover:opacity-100"></div>
                    
                    <div class="relative p-8">
                        <div class="flex items-center justify-between">
                            <div class="flex-1">
                                <div class="flex items-center gap-3 mb-3">
                                    <div class="w-1 h-8 rounded-full bg-gradient-to-b from-red-500 to-pink-500"></div>
                                    <p class="text-sm font-semibold tracking-wider text-red-500 uppercase">Total Artikel</p>
                                </div>
                                <h2 class="mb-1 text-3xl font-bold text-gray-800 dark:text-white">{{ $totalArticlePublished }}</h2>
                                <p class="text-sm text-gray-500 dark:text-gray-400">Artikel Terpublikasi</p>
                            </div>
                            <div class="flex-shrink-0 ml-6">
                                <div class="p-4 shadow-lg rounded-2xl bg-gradient-to-br from-red-500 to-pink-500">
                                    <svg class="w-8 h-8 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                        <path fill-rule="evenodd" d="M5 3a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h11.5c.07 0 .14-.007.207-.021.095.014.193.021.293.021h2a2 2 0 0 0 2-2V7a1 1 0 0 0-1-1h-1a1 1 0 1 0 0 2v11h-2V5a2 2 0 0 0-2-2H5Zm7 4a1 1 0 0 1 1-1h.5a1 1 0 1 1 0 2H13a1 1 0 0 1-1-1Zm0 3a1 1 0 0 1 1-1h.5a1 1 0 1 1 0 2H13a1 1 0 0 1-1-1Zm-6 4a1 1 0 0 1 1-1h6a1 1 0 1 1 0 2H7a1 1 0 0 1-1-1Zm0 3a1 1 0 0 1 1-1h6a1 1 0 1 1 0 2H7a1 1 0 0 1-1-1ZM7 6a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h3a1 1 0 0 0 1-1V7a1 1 0 0 0-1-1H7Zm1 3V8h1v1H8Z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                        
                        <div class="flex items-center p-3 mt-6 rounded-xl bg-white/50 dark:bg-gray-700/50 backdrop-blur-sm">
                            @if ($articleGrowth >= 0)
                                <div class="flex items-center text-emerald-600 dark:text-emerald-400">
                                    <div class="p-1 mr-2 rounded-full bg-emerald-100 dark:bg-emerald-900/30">
                                        <i class="text-xs fas fa-arrow-up"></i>
                                    </div>
                                    <span class="font-semibold">{{ $articleGrowth }}%</span>
                                </div>
                            @else
                                <div class="flex items-center text-red-600 dark:text-red-400">
                                    <div class="p-1 mr-2 bg-red-100 rounded-full dark:bg-red-900/30">
                                        <i class="text-xs fas fa-arrow-down"></i>
                                    </div>
                                    <span class="font-semibold">{{ abs($articleGrowth) }}%</span>
                                </div>
                            @endif
                            <span class="ml-3 text-sm text-gray-600 dark:text-gray-300">Since last month</span>
                        </div>
                    </div>
                </div>

                <!-- Total Users Card -->
                <div class="group relative overflow-hidden rounded-2xl bg-white/70 dark:bg-gray-800/70 backdrop-blur-lg border border-white/20 dark:border-gray-700/30 shadow-xl hover:shadow-2xl transition-all duration-300 hover:scale-[1.02]">
                    <!-- Glassmorphism overlay -->
                    <div class="absolute inset-0 transition-opacity duration-300 opacity-0 bg-gradient-to-r from-blue-500/10 to-purple-500/10 group-hover:opacity-100"></div>
                    
                    <div class="relative p-8">
                        <div class="flex items-center justify-between">
                            <div class="flex-1">
                                <div class="flex items-center gap-3 mb-3">
                                    <div class="w-1 h-8 rounded-full bg-gradient-to-b from-blue-500 to-purple-500"></div>
                                    <p class="text-sm font-semibold tracking-wider text-blue-500 uppercase">Total Users</p>
                                </div>
                                <h2 class="mb-1 text-3xl font-bold text-gray-800 dark:text-white">{{ $totalUsers }}</h2>
                                <p class="text-sm text-gray-500 dark:text-gray-400">Pengguna Terdaftar</p>
                            </div>
                            <div class="flex-shrink-0 ml-6">
                                <div class="p-4 shadow-lg rounded-2xl bg-gradient-to-br from-blue-500 to-purple-500">
                                    <svg class="w-8 h-8 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                        <path fill-rule="evenodd" d="M8 4a4 4 0 1 0 0 8 4 4 0 0 0 0-8Zm-2 9a4 4 0 0 0-4 4v1a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2v-1a4 4 0 0 0-4-4H6Zm7.25-2.095c.478-.86.75-1.85.75-2.905a5.973 5.973 0 0 0-.75-2.906 4 4 0 1 1 0 5.811ZM15.466 20c.34-.588.535-1.271.535-2v-1a5.978 5.978 0 0 0-1.528-4H18a4 4 0 0 1 4 4v1a2 2 0 0 1-2 2h-4.535Z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                        
                        <div class="flex items-center p-3 mt-6 rounded-xl bg-white/50 dark:bg-gray-700/50 backdrop-blur-sm">
                            @if ($userGrowth >= 0)
                                <div class="flex items-center text-emerald-600 dark:text-emerald-400">
                                    <div class="p-1 mr-2 rounded-full bg-emerald-100 dark:bg-emerald-900/30">
                                        <i class="text-xs fas fa-arrow-up"></i>
                                    </div>
                                    <span class="font-semibold">{{ $userGrowth }}%</span>
                                </div>
                            @else
                                <div class="flex items-center text-red-600 dark:text-red-400">
                                    <div class="p-1 mr-2 bg-red-100 rounded-full dark:bg-red-900/30">
                                        <i class="text-xs fas fa-arrow-down"></i>
                                    </div>
                                    <span class="font-semibold">{{ abs($userGrowth) }}%</span>
                                </div>
                            @endif
                            <span class="ml-3 text-sm text-gray-600 dark:text-gray-300">Since last month</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Header Section -->
            <div class="mb-10">
                <div class="mb-2 text-center">
                    <h1 class="text-4xl font-bold text-transparent bg-gradient-to-r from-gray-800 via-blue-600 to-purple-600 bg-clip-text dark:from-white dark:via-blue-400 dark:to-purple-400">
                        Dashboard Analytics
                    </h1>
                </div>
                <p class="text-lg text-center text-gray-600 dark:text-gray-300">Monitoring Performa Dalam Bentuk Grafik</p>
                <div class="w-24 h-1 mx-auto mt-4 rounded-full bg-gradient-to-r from-blue-500 to-purple-500"></div>
            </div>

            <!-- Chart Cards Section -->
            <div class="grid grid-cols-1 gap-8 mb-10 xl:grid-cols-2">
                <!-- Line Chart Total Users -->
                <div class="relative overflow-hidden transition-all duration-300 border shadow-xl group rounded-2xl bg-white/70 dark:bg-gray-800/70 backdrop-blur-lg border-white/20 dark:border-gray-700/30 hover:shadow-2xl">
                    <div class="absolute inset-0 transition-opacity duration-300 opacity-0 bg-gradient-to-r from-blue-500/5 to-purple-500/5 group-hover:opacity-100"></div>
                    
                    <div class="relative p-8">
                        <div class="flex items-center justify-between mb-6">
                            <div class="flex items-center gap-3">
                                <div class="p-2 rounded-xl bg-gradient-to-br from-blue-500 to-purple-500">
                                    <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M2 11a1 1 0 011-1h2a1 1 0 011 1v5a1 1 0 01-1 1H3a1 1 0 01-1-1v-5zM8 7a1 1 0 011-1h2a1 1 0 011 1v9a1 1 0 01-1 1H9a1 1 0 01-1-1V7zM14 4a1 1 0 011-1h2a1 1 0 011 1v12a1 1 0 01-1 1h-2a1 1 0 01-1-1V4z"/>
                                    </svg>
                                </div>
                                <h2 class="text-xl font-bold text-gray-800 dark:text-white">Total Pengguna Baru</h2>
                            </div>
                        </div>
                        <div class="p-4 h-80 rounded-xl bg-white/50 dark:bg-gray-700/50 backdrop-blur-sm">
                            <canvas id="userGrowthChart" data-labels='@json($chartData['label'])' data-values='@json($chartData['data'])'></canvas>
                        </div>
                    </div>
                </div>

                <!-- Bar Chart Prediction -->
                <div class="relative overflow-hidden transition-all duration-300 border shadow-xl group rounded-2xl bg-white/70 dark:bg-gray-800/70 backdrop-blur-lg border-white/20 dark:border-gray-700/30 hover:shadow-2xl">
                    <div class="absolute inset-0 transition-opacity duration-300 opacity-0 bg-gradient-to-r from-green-500/5 to-teal-500/5 group-hover:opacity-100"></div>
                    
                    <div class="relative p-8">
                        <div class="flex items-center justify-between mb-6">
                            <div class="flex items-center gap-3">
                                <div class="p-2 rounded-xl bg-gradient-to-br from-green-500 to-teal-500">
                                    <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M3 3a1 1 0 000 2v8a2 2 0 002 2h2.586l-1.293 1.293a1 1 0 101.414 1.414L10 15.414l2.293 2.293a1 1 0 001.414-1.414L12.414 15H15a2 2 0 002-2V5a1 1 0 100-2H3zm11.707 4.707a1 1 0 00-1.414-1.414L10 9.586 8.707 8.293a1 1 0 00-1.414 0l-2 2a1 1 0 101.414 1.414L8 10.414l1.293 1.293a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                    </svg>
                                </div>
                                <h2 class="text-xl font-bold text-gray-800 dark:text-white">Total Prediksi User</h2>
                            </div>
                        </div>
                        <div class="p-4 h-80 rounded-xl bg-white/50 dark:bg-gray-700/50 backdrop-blur-sm">
                            <canvas id="barChart" data-labels='@json($barChartData['labels'])' data-values='@json($barChartData['data'])'></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Risk Analysis Section -->
            <div class="grid grid-cols-1 gap-8 mb-10 xl:grid-cols-2">
                <!-- Pie Chart with Stats -->
                <div class="relative overflow-hidden transition-all duration-300 border shadow-xl group rounded-2xl bg-white/70 dark:bg-gray-800/70 backdrop-blur-lg border-white/20 dark:border-gray-700/30 hover:shadow-2xl">
                    <div class="absolute inset-0 transition-opacity duration-300 opacity-0 bg-gradient-to-r from-orange-500/5 to-red-500/5 group-hover:opacity-100"></div>
                    
                    <div class="relative p-8">
                        <div class="flex items-center gap-3 mb-6">
                            <div class="p-2 rounded-xl bg-gradient-to-br from-orange-500 to-red-500">
                                <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd"/>
                                </svg>
                            </div>
                            <h2 class="text-xl font-bold text-gray-800 dark:text-white">Hasil Prediksi Risiko</h2>
                        </div>
                        
                        <div class="grid grid-cols-1 gap-6 lg:grid-cols-2">
                            <!-- Pie Chart -->
                            <div class="flex items-center justify-center p-6 rounded-xl bg-white/50 dark:bg-gray-700/50 backdrop-blur-sm">
                                @php
                                    $pieChartData['labels'] = $pieChartData['labels'] ?? [];
                                    $pieChartData['data'] = $pieChartData['data'] ?? [];
                                @endphp
                                <canvas id="pieChart" data-labels='@json($pieChartData['labels'])' data-values='@json($pieChartData['data'])'></canvas>
                            </div>
                            
                            <!-- Statistics -->
                            <div class="space-y-4">
                                <!-- High Risk Card -->
                                <div class="p-6 border rounded-xl bg-gradient-to-r from-red-50 to-pink-50 dark:from-red-900/20 dark:to-pink-900/20 border-red-200/50 dark:border-red-700/30">
                                    <div class="flex items-center justify-between">
                                        <div class="flex items-center gap-3">
                                            <div class="w-4 h-4 rounded-full shadow-lg bg-gradient-to-r from-red-500 to-pink-500"></div>
                                            <span class="font-semibold text-gray-700 dark:text-gray-200">Berisiko Tinggi</span>
                                        </div>
                                        <div class="text-right">
                                            <span class="text-2xl font-bold text-red-600 dark:text-red-400">{{ $riskCount[1] ?? 0 }}</span>
                                            <p class="text-xs text-gray-500 dark:text-gray-400">orang</p>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Low Risk Card -->
                                <div class="p-6 border rounded-xl bg-gradient-to-r from-green-50 to-emerald-50 dark:from-green-900/20 dark:to-emerald-900/20 border-green-200/50 dark:border-green-700/30">
                                    <div class="flex items-center justify-between">
                                        <div class="flex items-center gap-3">
                                            <div class="w-4 h-4 rounded-full shadow-lg bg-gradient-to-r from-green-500 to-emerald-500"></div>
                                            <span class="font-semibold text-gray-700 dark:text-gray-200">Tidak Berisiko</span>
                                        </div>
                                        <div class="text-right">
                                            <span class="text-2xl font-bold text-green-600 dark:text-green-400">{{ $riskCount[0] ?? 0 }}</span>
                                            <p class="text-xs text-gray-500 dark:text-gray-400">orang</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Monthly Prediction Chart -->
                <div class="relative overflow-hidden transition-all duration-300 border shadow-xl group rounded-2xl bg-white/70 dark:bg-gray-800/70 backdrop-blur-lg border-white/20 dark:border-gray-700/30 hover:shadow-2xl">
                    <div class="absolute inset-0 transition-opacity duration-300 opacity-0 bg-gradient-to-r from-purple-500/5 to-indigo-500/5 group-hover:opacity-100"></div>
                    
                    <div class="relative p-8">
                        <div class="flex items-center gap-3 mb-6">
                            <div class="p-2 rounded-xl bg-gradient-to-br from-purple-500 to-indigo-500">
                                <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zM4 9h12v8H4V9z"/>
                                </svg>
                            </div>
                            <h2 class="text-xl font-bold text-gray-800 dark:text-white">Prediksi Bulanan</h2>
                        </div>
                        
                        <div class="p-4 h-80 rounded-xl bg-white/50 dark:bg-gray-700/50 backdrop-blur-sm">
                            <canvas id="monthlyPredictionChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        const monthlyChartCtx = document.getElementById('monthlyPredictionChart').getContext('2d');
        const monthlyChart = new Chart(monthlyChartCtx, {
            type: 'bar',
            data: {
                labels: @json($monthlyPredictionChart['labels']),
                datasets: [{
                    label: 'Jumlah Prediksi per Bulan',
                    data: @json($monthlyPredictionChart['data']),
                    backgroundColor: 'rgba(147, 51, 234, 0.7)',
                    borderColor: 'rgba(147, 51, 234, 1)',
                    borderWidth: 2,
                    borderRadius: 8,
                    borderSkipped: false,
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        stepSize: 1,
                        grid: {
                            color: 'rgba(0, 0, 0, 0.1)',
                            drawBorder: false,
                        },
                        ticks: {
                            color: 'rgba(0, 0, 0, 0.6)'
                        }
                    },
                    x: {
                        grid: {
                            display: false,
                        },
                        ticks: {
                            color: 'rgba(0, 0, 0, 0.6)'
                        }
                    }
                }
            }
        });
    </script>
    @vite(['resources/js/adminDashboardChart.js'])
</x-app-layout>