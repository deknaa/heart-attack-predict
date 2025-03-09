<x-app-layout>
    <div class="p-14 sm:ml-64">
        <div class="flex gap-5">
            <div class="w-full max-w-md p-6 bg-white border-l-4 border-blue-500 rounded-lg shadow-md">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="mb-1 text-sm font-medium tracking-wide text-blue-500 uppercase">Total Article Published
                        </p>
                        <h2 class="text-2xl font-semibold text-gray-700">{{ $article }} Article</h2>
                    </div>
                    <div class="p-3 bg-gray-100 rounded-md">
                        <svg class="w-6 h-6 text-blue-500 dark:text-white" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                            viewBox="0 0 24 24">
                            <path fill-rule="evenodd"
                                d="M5 3a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h11.5c.07 0 .14-.007.207-.021.095.014.193.021.293.021h2a2 2 0 0 0 2-2V7a1 1 0 0 0-1-1h-1a1 1 0 1 0 0 2v11h-2V5a2 2 0 0 0-2-2H5Zm7 4a1 1 0 0 1 1-1h.5a1 1 0 1 1 0 2H13a1 1 0 0 1-1-1Zm0 3a1 1 0 0 1 1-1h.5a1 1 0 1 1 0 2H13a1 1 0 0 1-1-1Zm-6 4a1 1 0 0 1 1-1h6a1 1 0 1 1 0 2H7a1 1 0 0 1-1-1Zm0 3a1 1 0 0 1 1-1h6a1 1 0 1 1 0 2H7a1 1 0 0 1-1-1ZM7 6a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h3a1 1 0 0 0 1-1V7a1 1 0 0 0-1-1H7Zm1 3V8h1v1H8Z"
                                clip-rule="evenodd" />
                        </svg>

                    </div>
                </div>
            </div>
            <div class="w-full max-w-md p-6 bg-white border-l-4 border-blue-500 rounded-lg shadow-md">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="mb-1 text-sm font-medium tracking-wide text-blue-500 uppercase">Total Users</p>
                        <h2 class="text-2xl font-semibold text-gray-700">{{ $users }} Users</h2>
                    </div>
                    <div class="p-3 bg-gray-100 rounded-md">
                        <svg class="w-6 h-6 text-blue-500 dark:text-white" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                            viewBox="0 0 24 24">
                            <path fill-rule="evenodd"
                                d="M8 4a4 4 0 1 0 0 8 4 4 0 0 0 0-8Zm-2 9a4 4 0 0 0-4 4v1a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2v-1a4 4 0 0 0-4-4H6Zm7.25-2.095c.478-.86.75-1.85.75-2.905a5.973 5.973 0 0 0-.75-2.906 4 4 0 1 1 0 5.811ZM15.466 20c.34-.588.535-1.271.535-2v-1a5.978 5.978 0 0 0-1.528-4H18a4 4 0 0 1 4 4v1a2 2 0 0 1-2 2h-4.535Z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                </div>
            </div>
            <div class="w-full max-w-md p-6 bg-white border-l-4 border-blue-500 rounded-lg shadow-md">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="mb-1 text-sm font-medium tracking-wide text-blue-500 uppercase">Total Users</p>
                        <h2 class="text-2xl font-semibold text-gray-700">{{ $users }} Users</h2>
                    </div>
                    <div class="p-3 bg-gray-100 rounded-md">
                        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                            viewBox="0 0 24 24">
                            <path fill-rule="evenodd"
                                d="M8 4a4 4 0 1 0 0 8 4 4 0 0 0 0-8Zm-2 9a4 4 0 0 0-4 4v1a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2v-1a4 4 0 0 0-4-4H6Zm7.25-2.095c.478-.86.75-1.85.75-2.905a5.973 5.973 0 0 0-.75-2.906 4 4 0 1 1 0 5.811ZM15.466 20c.34-.588.535-1.271.535-2v-1a5.978 5.978 0 0 0-1.528-4H18a4 4 0 0 1 4 4v1a2 2 0 0 1-2 2h-4.535Z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>
        <div class="max-w-6xl mx-auto">
            <!-- Header Section -->
            <div class="mt-6 mb-6">
              <h1 class="text-2xl font-bold text-gray-800">Dashboard Analytics</h1>
              <p class="text-gray-600">Monitoring performance metrics for Q1 2025</p>
            </div>
            
            <!-- Chart Cards Row -->
            <div class="grid grid-cols-1 gap-6 mb-6 md:grid-cols-2">
              <!-- Line Chart Card -->
              <div class="p-6 bg-white rounded-lg shadow-md">
                <div class="flex items-center justify-between mb-4">
                  <h2 class="text-lg font-semibold text-gray-700">Monthly Revenue</h2>
                  <div class="flex space-x-2">
                    <button class="px-3 py-1 text-sm font-medium text-blue-600 bg-blue-100 rounded-md">Monthly</button>
                    <button class="px-3 py-1 text-sm font-medium text-gray-600 bg-gray-100 rounded-md">Yearly</button>
                  </div>
                </div>
                <div class="h-64">
                  <canvas id="revenueChart"></canvas>
                </div>
              </div>
              
              <!-- Bar Chart Card -->
              <div class="p-6 bg-white rounded-lg shadow-md">
                <div class="flex items-center justify-between mb-4">
                  <h2 class="text-lg font-semibold text-gray-700">Traffic Sources</h2>
                  <select class="px-3 py-1 text-sm text-gray-700 bg-gray-100 rounded-md">
                    <option>Last 30 days</option>
                    <option>Last 60 days</option>
                    <option>Last 90 days</option>
                  </select>
                </div>
                <div class="h-64">
                  <canvas id="trafficChart"></canvas>
                </div>
              </div>
            </div>
            
            <!-- Donut Chart Card -->
            <div class="p-6 bg-white rounded-lg shadow-md">
              <div class="flex items-center justify-between mb-4">
                <h2 class="text-lg font-semibold text-gray-700">Product Categories</h2>
                <div class="text-sm text-gray-500">Total Sales: $246,800</div>
              </div>
              <div class="grid grid-cols-1 gap-4 md:grid-cols-3">
                <div class="flex items-center justify-center h-64 col-span-1">
                  <canvas id="categoriesChart"></canvas>
                </div>
                <div class="grid grid-cols-2 col-span-2 gap-4">
                  <div class="p-4 rounded-lg bg-gray-50">
                    <div class="flex items-center">
                      <div class="w-3 h-3 mr-2 bg-blue-500 rounded-full"></div>
                      <span class="text-gray-700">Electronics</span>
                    </div>
                    <div class="mt-2">
                      <span class="text-2xl font-bold text-gray-800">$85,240</span>
                      <span class="ml-2 text-green-500">+12.5%</span>
                    </div>
                  </div>
                  <div class="p-4 rounded-lg bg-gray-50">
                    <div class="flex items-center">
                      <div class="w-3 h-3 mr-2 bg-green-500 rounded-full"></div>
                      <span class="text-gray-700">Clothing</span>
                    </div>
                    <div class="mt-2">
                      <span class="text-2xl font-bold text-gray-800">$62,360</span>
                      <span class="ml-2 text-green-500">+8.2%</span>
                    </div>
                  </div>
                  <div class="p-4 rounded-lg bg-gray-50">
                    <div class="flex items-center">
                      <div class="w-3 h-3 mr-2 bg-yellow-500 rounded-full"></div>
                      <span class="text-gray-700">Home & Garden</span>
                    </div>
                    <div class="mt-2">
                      <span class="text-2xl font-bold text-gray-800">$53,780</span>
                      <span class="ml-2 text-red-500">-2.1%</span>
                    </div>
                  </div>
                  <div class="p-4 rounded-lg bg-gray-50">
                    <div class="flex items-center">
                      <div class="w-3 h-3 mr-2 bg-purple-500 rounded-full"></div>
                      <span class="text-gray-700">Others</span>
                    </div>
                    <div class="mt-2">
                      <span class="text-2xl font-bold text-gray-800">$45,420</span>
                      <span class="ml-2 text-green-500">+5.3%</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          
          <script>
            // Initialize charts when the page loads
            document.addEventListener('DOMContentLoaded', function() {
              // Line Chart - Revenue
              const revenueCtx = document.getElementById('revenueChart').getContext('2d');
              const revenueChart = new Chart(revenueCtx, {
                type: 'line',
                data: {
                  labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                  datasets: [{
                    label: 'Revenue',
                    data: [38000, 42000, 35000, 50000, 49000, 62000],
                    backgroundColor: 'rgba(59, 130, 246, 0.1)',
                    borderColor: 'rgba(59, 130, 246, 1)',
                    borderWidth: 2,
                    tension: 0.4,
                    fill: true
                  }]
                },
                options: {
                  maintainAspectRatio: false,
                  plugins: {
                    legend: {
                      display: false
                    }
                  },
                  scales: {
                    y: {
                      beginAtZero: false,
                      grid: {
                        drawBorder: false
                      },
                      ticks: {
                        callback: function(value) {
                          return '$' + value.toLocaleString();
                        }
                      }
                    },
                    x: {
                      grid: {
                        display: false
                      }
                    }
                  }
                }
              });
              
              // Bar Chart - Traffic Sources
              const trafficCtx = document.getElementById('trafficChart').getContext('2d');
              const trafficChart = new Chart(trafficCtx, {
                type: 'bar',
                data: {
                  labels: ['Organic', 'Direct', 'Social', 'Referral', 'Email'],
                  datasets: [{
                    label: 'Visitors',
                    data: [15400, 9200, 12300, 7800, 5100],
                    backgroundColor: [
                      'rgba(59, 130, 246, 0.7)', 
                      'rgba(16, 185, 129, 0.7)',
                      'rgba(245, 158, 11, 0.7)',
                      'rgba(139, 92, 246, 0.7)',
                      'rgba(239, 68, 68, 0.7)'
                    ],
                    borderRadius: 4
                  }]
                },
                options: {
                  maintainAspectRatio: false,
                  plugins: {
                    legend: {
                      display: false
                    }
                  },
                  scales: {
                    y: {
                      beginAtZero: true,
                      grid: {
                        drawBorder: false
                      }
                    },
                    x: {
                      grid: {
                        display: false
                      }
                    }
                  }
                }
              });
              
              // Donut Chart - Categories
              const categoriesCtx = document.getElementById('categoriesChart').getContext('2d');
              const categoriesChart = new Chart(categoriesCtx, {
                type: 'doughnut',
                data: {
                  labels: ['Electronics', 'Clothing', 'Home & Garden', 'Others'],
                  datasets: [{
                    data: [34.5, 25.3, 21.8, 18.4],
                    backgroundColor: [
                      'rgba(59, 130, 246, 0.8)',
                      'rgba(16, 185, 129, 0.8)', 
                      'rgba(245, 158, 11, 0.8)',
                      'rgba(139, 92, 246, 0.8)'
                    ],
                    borderWidth: 0,
                    hoverOffset: 4
                  }]
                },
                options: {
                  maintainAspectRatio: false,
                  cutout: '70%',
                  plugins: {
                    legend: {
                      display: false
                    }
                  }
                }
              });
            });
          </script>
    </div>
</x-app-layout>
