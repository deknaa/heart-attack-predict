<x-app-layout>
    <div class="p-14 sm:ml-64">
        <div class="flex flex-col items-center justify-center gap-5 lg:flex-row">
            <div class="w-full max-w-md p-6 bg-white border-l-4 border-red-500 rounded-lg shadow-md">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="mb-1 text-sm font-medium tracking-wide text-red-500 uppercase">Total Artikel
                        </p>
                        <h2 class="text-2xl font-semibold text-gray-700">{{ $totalArticlePublished }} Artikel</h2>
                    </div>
                    <div class="p-3 bg-gray-100 rounded-md">
                        <svg class="w-6 h-6 text-red-500 dark:text-red-400" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                            viewBox="0 0 24 24">
                            <path fill-rule="evenodd"
                                d="M5 3a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h11.5c.07 0 .14-.007.207-.021.095.014.193.021.293.021h2a2 2 0 0 0 2-2V7a1 1 0 0 0-1-1h-1a1 1 0 1 0 0 2v11h-2V5a2 2 0 0 0-2-2H5Zm7 4a1 1 0 0 1 1-1h.5a1 1 0 1 1 0 2H13a1 1 0 0 1-1-1Zm0 3a1 1 0 0 1 1-1h.5a1 1 0 1 1 0 2H13a1 1 0 0 1-1-1Zm-6 4a1 1 0 0 1 1-1h6a1 1 0 1 1 0 2H7a1 1 0 0 1-1-1Zm0 3a1 1 0 0 1 1-1h6a1 1 0 1 1 0 2H7a1 1 0 0 1-1-1ZM7 6a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h3a1 1 0 0 0 1-1V7a1 1 0 0 0-1-1H7Zm1 3V8h1v1H8Z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                </div>
                <div class="flex items-center mt-4 text-sm">
                    @if ($announcementGrowth >= 0)
                        <span class="flex items-center text-green-500">
                            <i class="mr-1 fas fa-arrow-up"></i> {{ $announcementGrowth }}%
                        </span>
                    @else
                        <span class="flex items-center text-green-500">
                            <i class="mr-1 fas fa-arrow-down"></i> {{ abs($announcementGrowth) }}%
                        </span>
                    @endif
                    <span class="ml-2 text-gray-400">Since last month</span>
                </div>
            </div>
            <div class="w-full max-w-md p-6 bg-white border-l-4 border-red-500 rounded-lg shadow-md">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="mb-1 text-sm font-medium tracking-wide text-red-500 uppercase">Total Pengumuman</p>
                        <h2 class="text-2xl font-semibold text-gray-700">{{ $totalAnnouncements }} Pengumuman</h2>
                    </div>
                    <div class="p-3 bg-gray-100 rounded-md">
                        <svg class="w-6 h-6 text-red-500 dark:text-red-400" xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd"
                                d="M18.458 3.11A1 1 0 0 1 19 4v16a1 1 0 0 1-1.581.814L12 16.944V7.056l5.419-3.87a1 1 0 0 1 1.039-.076ZM22 12c0 1.48-.804 2.773-2 3.465v-6.93c1.196.692 2 1.984 2 3.465ZM10 8H4a1 1 0 0 0-1 1v6a1 1 0 0 0 1 1h6V8Zm0 9H5v3a1 1 0 0 0 1 1h3a1 1 0 0 0 1-1v-3Z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                </div>
                <div class="flex items-center mt-4 text-sm">
                    @if ($articleGrowth >= 0)
                        <span class="flex items-center text-green-500">
                            <i class="mr-1 fas fa-arrow-up"></i> {{ $articleGrowth }}%
                        </span>
                    @else
                        <span class="flex items-center text-green-500">
                            <i class="mr-1 fas fa-arrow-down"></i> {{ abs($articleGrowth) }}%
                        </span>
                    @endif
                    <span class="ml-2 text-gray-400">Since last month</span>
                </div>
            </div>
            <div class="w-full max-w-md p-6 bg-white border-l-4 border-red-500 rounded-lg shadow-md">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="mb-1 text-sm font-medium tracking-wide text-red-500 uppercase">Total Users</p>
                        <h2 class="text-2xl font-semibold text-gray-700">{{ $totalUsers }} Users</h2>
                    </div>
                    <div class="p-3 bg-gray-100 rounded-md">
                        <svg class="w-6 h-6 text-red-500 dark:text-red-400" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                            viewBox="0 0 24 24">
                            <path fill-rule="evenodd"
                                d="M8 4a4 4 0 1 0 0 8 4 4 0 0 0 0-8Zm-2 9a4 4 0 0 0-4 4v1a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2v-1a4 4 0 0 0-4-4H6Zm7.25-2.095c.478-.86.75-1.85.75-2.905a5.973 5.973 0 0 0-.75-2.906 4 4 0 1 1 0 5.811ZM15.466 20c.34-.588.535-1.271.535-2v-1a5.978 5.978 0 0 0-1.528-4H18a4 4 0 0 1 4 4v1a2 2 0 0 1-2 2h-4.535Z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                </div>
                <div class="flex items-center mt-4 text-sm">
                    @if ($userGrowth >= 0)
                        <span class="flex items-center text-green-500">
                            <i class="mr-1 fas fa-arrow-up"></i> {{ $userGrowth }}%
                        </span>
                    @else
                        <span class="flex items-center text-green-500">
                            <i class="mr-1 fas fa-arrow-down"></i> {{ abs($userGrowth) }}%
                        </span>
                    @endif
                    <span class="ml-2 text-gray-400">Since last month</span>
                </div>
            </div>
        </div>
        <div class="">
            {{-- Header Section --}}
            <div class="mt-6 mb-6">
                <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-50">Dashboard Analytics</h1>
                <p class="text-gray-600 dark:text-gray-300">Monitoring Performa Dalam Bentuk Grafik</p>
            </div>

            {{-- Chart Card Section --}}
            <div class="grid grid-cols-1 gap-6 mb-6 md:grid-cols-2">
                {{-- Line Chart Total Users --}}
                <div class="p-6 bg-white rounded-lg shadow-md">
                    <div class="flex items-center justify-between mb-4">
                        <h2 class="text-lg font-semibold text-gray-700">Total Pengguna Baru</h2>
                    </div>
                    <div class="h-64">
                        <div id="userChart" 
                          data-labels='@json($chartData['label'])' 
                          data-values='@json($chartData['data'])'>
                        </div>
                        <canvas id="userGrowthChart"></canvas>
                    </div>
                </div>

                {{-- Bar Chart Prediction per week--}}
                <div class="p-6 bg-white rounded-lg shadow-md">
                    <div class="flex items-center justify-between mb-4">
                        <h2 class="text-lg font-semibold text-gray-700">Total Prediksi Dilakukan User</h2>
                    </div>
                    <div class="h-64">
                        <canvas id="barChart" data-labels='@json($barChartData["labels"])' data-values='@json($barChartData["data"])'></canvas>
                    </div>
                </div>
            </div>

            {{-- Donut Chart --}}
            <div class="p-6 bg-white rounded-lg shadow-md">
                <div class="flex items-center justify-between mb-4">
                    <h2 class="text-lg font-semibold text-gray-700">Hasil Prediksi Risiko User</h2>
                </div>
                <div class="grid grid-cols-1 gap-4 md:grid-cols-3">
                    <div class="flex items-center justify-center h-64 col-span-1">
                        <canvas id="pieChart" data-labels='@json($pieChartData["labels"])' data-values='@json($pieChartData["data"])'></canvas>
                    </div>
                    <div class="grid grid-cols-2 col-span-2 gap-4">
                        <div class="p-4 rounded-lg bg-gray-50">
                            <div class="flex items-center">
                                <div class="w-3 h-3 mr-2 bg-red-500 rounded-full"></div>
                                <span class="text-gray-700">Berisiko</span>
                            </div>
                            <div class="mt-2">
                                <span class="text-2xl font-bold text-gray-800">{{ $riskData[1] }}</span>
                            </div>
                        </div>
                        <div class="p-4 rounded-lg bg-gray-50">
                            <div class="flex items-center">
                                <div class="w-3 h-3 mr-2 bg-green-500 rounded-full"></div>
                                <span class="text-gray-700">Tidak Berisiko</span>
                            </div>
                            <div class="mt-2">
                                <span class="text-2xl font-bold text-gray-800">{{ $riskData[0] }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @vite(['resources/js/adminDashboardChart.js'])
</x-app-layout>
