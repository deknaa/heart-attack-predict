<x-app-layout>
    <div class="flex flex-col min-h-screen mx-auto max-w-7xl">
        <!-- Main Content -->
        <div class="flex-1">
            <!-- Dashboard Content -->
            <main class="p-6">
                <!-- Health Status -->
                <div class="p-6 mt-20 mb-6 bg-white rounded-lg shadow">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-lg font-semibold text-gray-800">Status Kesehatan Anda</h3>
                        @if($prediction->probability < 0.5)
                            <span class="px-3 py-1 text-sm font-medium text-green-800 bg-green-100 rounded-full">Baik</span>
                        @else
                            <span class="px-3 py-1 text-sm font-medium text-red-800 bg-red-100 rounded-full">Buruk</span>
                        @endif
                    </div>
                    <div class="flex flex-wrap -mx-2">
                        <div class="w-full px-2 mb-4 md:w-1/4">
                            <div class="p-4 border-l-4 border-blue-500 rounded-lg bg-blue-50">
                                <div class="flex items-center">
                                    <div class="mr-3 text-blue-500">
                                        <i class="text-2xl fas fa-heartbeat"></i>
                                    </div>
                                    <div>
                                        <p class="text-sm text-gray-500">Detak Jantung</p>
                                        <p class="text-xl font-bold">{{ $cp }} <span class="text-sm font-normal">bpm</span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="w-full px-2 mb-4 md:w-1/4">
                            <div class="p-4 border-l-4 border-blue-500 rounded-lg bg-blue-50">
                                <div class="flex items-center">
                                    <div class="mr-3 text-blue-500">
                                        <i class="text-2xl fas fa-weight"></i>
                                    </div>
                                    <div>
                                        <p class="text-sm text-gray-500">Berat Badan</p>
                                        <p class="text-xl font-bold">- <span class="text-sm font-normal">kg</span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="w-full px-2 mb-4 md:w-1/4">
                            <div class="p-4 border-l-4 border-blue-500 rounded-lg bg-blue-50">
                                <div class="flex items-center">
                                    <div class="mr-3 text-blue-500">
                                        <i class="text-2xl fas fa-tachometer-alt"></i>
                                    </div>
                                    <div>
                                        <p class="text-sm text-gray-500">Tekanan Darah</p>
                                        <p class="text-xl font-bold">{{ $trestbps }}/80 <span
                                                class="text-sm font-normal">mmHg</span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="w-full px-2 mb-4 md:w-1/4">
                            <div class="p-4 border-l-4 border-blue-500 rounded-lg bg-blue-50">
                                <div class="flex items-center">
                                    <div class="mr-3 text-blue-500">
                                        <i class="text-2xl fas fa-vial"></i>
                                    </div>
                                    <div>
                                        <p class="text-sm text-gray-500">Kolesterol</p>
                                        <p class="text-xl font-bold">{{ $chol }} <span class="text-sm font-normal">mg/dL</span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Risk Assessment -->
                <div class="flex flex-wrap mb-6 -mx-3">
                    <div class="w-full px-3 mb-6 md:w-1/2 md:mb-0">
                        <div class="h-full p-6 bg-white rounded-lg shadow">
                            <h3 class="mb-4 text-lg font-semibold text-gray-800">Penilaian Risiko</h3>
                            <div class="flex items-center mb-4">
                                <div class="w-full h-4 bg-gray-200 rounded-full">
                                    <div id="riskBar" class="h-4 bg-green-500 rounded-full" style="width: 0%;"></div>
                                </div>
                                <span id="riskPercentage" class="ml-4 text-lg font-bold text-green-500">0%</span>
                            </div>
                            <p class="mb-4 text-gray-600">
                                Risiko serangan jantung dalam 10 tahun mendatang berdasarkan faktor-faktor risiko Anda
                                saat ini.
                            </p>
                            <div id="riskBox" class="p-4 border border-green-200 rounded-lg bg-green-50">
                                <div class="flex">
                                    <div class="mr-3 text-green-500">
                                        <i class="text-xl fas fa-check-circle"></i>
                                    </div>
                                    <div>
                                        <p id="riskTitle" class="font-medium text-green-800">Risiko Rendah</p>
                                        <p id="riskDescription" class="text-sm text-gray-600">Pertahankan gaya hidup
                                            sehat Anda.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="w-full px-3 md:w-1/2">
                        <div class="h-full p-6 bg-white rounded-lg shadow">
                            <h3 class="mb-4 text-lg font-semibold text-gray-800">Riwayat Prediksi</h3>
                            <canvas id="predictionChart" height="200"></canvas>
                            <div class="mt-4 text-center">
                                <a href="{{ route('predict.history') }}" class="text-sm font-medium text-blue-600 hover:text-blue-800">Lihat
                                    detail riwayat prediksi</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Recommendations & Actions -->
                <div class="flex flex-wrap -mx-3">
                    <div class="w-full px-3 mb-6 md:w-2/3">
                        <div class="p-6 bg-white rounded-lg shadow">
                            <h3 class="mb-4 text-lg font-semibold text-gray-800">Rekomendasi untuk Anda</h3>
                            <div class="space-y-4">

                                {{-- Sementara disable dulu, perlu research terkait rekomendasi kesehatan/aktifitas berdasarkan tingkat risiko --}}
                                @if($activitesRecommendation->count() > 0)
                                    <div class="flex p-4 border border-blue-100 rounded-lg bg-blue-50">
                                        <div class="mr-4 text-blue-500">
                                            <i class="text-xl fas fa-walking"></i>
                                        </div>
                                        <div>
                                            <h4 class="font-medium">Tingkatkan Aktivitas Fisik</h4>
                                            <p class="text-sm text-gray-600">Tambahkan 30 menit jalan cepat setiap hari
                                                untuk mengurangi risiko penyakit jantung sebesar 30%.</p>
                                        </div>
                                    </div>
                                    <div class="flex p-4 border border-blue-100 rounded-lg bg-blue-50">
                                        <div class="mr-4 text-blue-500">
                                            <i class="text-xl fas fa-utensils"></i>
                                        </div>
                                        <div>
                                            <h4 class="font-medium">Perhatikan Konsumsi Garam</h4>
                                            <p class="text-sm text-gray-600">Batasi konsumsi garam hingga < 5g per hari
                                                    untuk membantu mengontrol tekanan darah.</p>
                                        </div>
                                    </div>
                                    <div class="flex p-4 border border-blue-100 rounded-lg bg-blue-50">
                                        <div class="mr-4 text-blue-500">
                                            <i class="text-xl fas fa-ban"></i>
                                        </div>
                                        <div>
                                            <h4 class="font-medium">Hindari Merokok</h4>
                                            <p class="text-sm text-gray-600">Merokok meningkatkan risiko serangan jantung
                                                sebesar 200-400%.</p>
                                        </div>
                                    </div>
                                @else
                                    <div class="flex p-4 border border-blue-100 rounded-lg bg-blue-50">
                                        <div class="mr-4 text-blue-500">
                                            <i class="text-xl fas fa-walking"></i>
                                        </div>
                                        <div>
                                            <h4 class="font-medium">Tidak Ada Rekomendasi Untuk Anda</h4>
                                            <p class="text-sm text-gray-600">Anda belum melakukan prediksi risiko, sehingga tidak ada rekomendasi yang diberikan kepada anda.</p>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="w-full px-3 mb-6 md:w-1/3">
                        <div class="p-6 bg-white rounded-lg shadow">
                            <h3 class="mb-4 text-lg font-semibold text-gray-800">Tindakan</h3>
                            <div class="space-y-3">
                                <a href="#"
                                    class="flex items-center justify-between p-3 text-gray-800 transition duration-200 bg-gray-100 rounded-lg hover:bg-blue-700 hover:text-white">
                                    <span class="flex items-center">
                                        <i class="mr-3 fas fa-calculator"></i>
                                        <span>Prediksi Baru</span>
                                    </span>
                                    <i class="fas fa-chevron-right"></i>
                                </a>
                                <a href="#"
                                    class="flex items-center justify-between p-3 text-gray-800 transition duration-200 bg-gray-100 rounded-lg hover:bg-blue-700 hover:text-white">
                                    <span class="flex items-center">
                                        <i class="mr-3 fas fa-download"></i>
                                        <span>Unduh Laporan</span>
                                    </span>
                                </a>
                                <a href="#"
                                    class="flex items-center justify-between p-3 text-gray-800 transition duration-200 bg-gray-100 rounded-lg hover:bg-blue-700 hover:text-white">
                                    <span class="flex items-center">
                                        <i class="mr-3 fas fa-bell"></i>
                                        <span>Atur Pengingat</span>
                                    </span>
                                    <i class="fas fa-chevron-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- recommendation article --}}
                <div class="p-6 mt-6 bg-white rounded-lg shadow">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-lg font-semibold text-gray-800">Rekomendasi Artikel Untuk Anda Baca</h3>
                        @if($articleRecommendation->count() > 0)
                            <a href="{{ route('article.list') }}" class="text-sm text-blue-600 hover:text-blue-800">Lihat Semua</a>
                        @else
                            <span></span>
                        @endif
                    </div>
                    {{-- Rekomendasi artikel belum tuntas, seharusnya rekomendasi artikel di berikan berdasarkan hasil prediksi risiko --}}
                    @forelse ($articleRecommendation as $article)
                    <div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-3">
                        <div class="overflow-hidden border rounded-lg">
                            <img src="{{ asset('storage/' . $article->featured_image) }}" alt=""
                                class="object-cover w-full h-40">
                            <div class="p-4">
                                <h4 class="mb-2 font-medium text-gray-900">{{ $article->title }}
                                </h4>
                                <p class="mb-3 text-sm text-gray-600">{!! $article->content !!}</p>
                                <a href="#" class="text-sm font-medium text-blue-600 hover:text-blue-800">Baca
                                    selengkapnya</a>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="flex flex-col items-center justify-center py-12 rounded-lg bg-gray-50">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-16 h-16 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
                        </svg>
                        <h3 class="mt-4 text-lg font-medium text-gray-900">Belum ada artikel</h3>
                        <p class="mt-1 text-sm text-gray-500">Silakan periksa kembali nanti untuk informasi terbaru.</p>
                    </div>
                    @endforelse
                </div>
            </main>
        </div>
    </div>

    <script>
        // Initialize Chart
        document.addEventListener('DOMContentLoaded', function() {
            fetch('/dashboard/user/predictions') // Ambil data dari endpoint baru
                .then(response => response.json())
                .then(data => {
                    const labels = data.map(item => new Date(item.created_at).toLocaleDateString());
                    const probabilities = data.map(item => item.probability * 100);

                    const ctx = document.getElementById('predictionChart').getContext('2d');
                    new Chart(ctx, {
                        type: 'line',
                        data: {
                            labels: labels,
                            datasets: [{
                                label: 'Risiko (dalam %)',
                                data: probabilities,
                                borderColor: 'rgba(235, 0, 0, 1)',
                                backgroundColor: 'rgba(37, 99, 235, 0.1)',
                                borderWidth: 2,
                                fill: true,
                                tension: 0.4
                            }]
                        },
                        options: {
                            responsive: true,
                            plugins: {
                                legend: {
                                    display: false
                                }
                            },
                            scales: {
                                y: {
                                    beginAtZero: true,
                                    max: 100,
                                    ticks: {
                                        stepSize: 10
                                    }
                                }
                            }
                        }
                    });
                })
                .catch(error => console.error('Error fetching prediction data:', error));
        });

        document.addEventListener('DOMContentLoaded', function() {
            fetch('/dashboard/user/risk-assessment')
                .then(response => response.json())
                .then(data => {
                    const riskBar = document.getElementById('riskBar');
                    const riskPercentage = document.getElementById('riskPercentage');
                    const riskBox = document.getElementById('riskBox');
                    const riskTitle = document.getElementById('riskTitle');
                    const riskDescription = document.getElementById('riskDescription');

                    const probability = data.probability; // Ambil probabilitas dari database
                    riskBar.style.width = probability + '%';
                    riskPercentage.textContent = probability + '%';

                    // Reset kelas warna agar tidak menumpuk
                    riskBar.classList.remove('bg-green-500', 'bg-yellow-500', 'bg-red-500');
                    riskPercentage.classList.remove('text-green-500', 'text-yellow-500', 'text-red-500');
                    riskBox.classList.remove('bg-green-50', 'bg-yellow-50', 'bg-red-50', 'border-green-200',
                        'border-yellow-200', 'border-red-200');

                    // Tentukan level risiko berdasarkan probabilitas
                    if (probability == 0) {
                        riskBar.classList.add('bg-green-500');
                        riskPercentage.classList.add('text-green-500');
                        riskBox.classList.add('bg-green-50', 'border-green-200');
                        riskTitle.textContent = 'Tidak Ada Risiko';
                        riskDescription.textContent = 'Lakukan Prediksi Risiko untuk mengetahui tingkat risiko anda.';
                    } else if (probability < 50){
                        riskBar.classList.add('bg-green-500');
                        riskPercentage.classList.add('text-green-500');
                        riskBox.classList.add('bg-green-50', 'border-green-200');
                        riskTitle.textContent = 'Risiko Rendah';
                        riskDescription.textContent = 'Pertahankan gaya hidup sehat Anda.';
                    } else if (probability < 70) {
                        riskBar.classList.add('bg-yellow-500');
                        riskPercentage.classList.add('text-yellow-500');
                        riskBox.classList.add('bg-yellow-50', 'border-yellow-200');
                        riskTitle.textContent = 'Risiko Sedang';
                        riskDescription.textContent = 'Perhatikan pola makan dan olahraga lebih teratur.';
                    } else {
                        riskBar.classList.add('bg-red-500');
                        riskPercentage.classList.add('text-red-500');
                        riskBox.classList.add('bg-red-50', 'border-red-200');
                        riskTitle.textContent = 'Risiko Tinggi';
                        riskDescription.textContent =
                            'Segera konsultasi dengan dokter untuk evaluasi lebih lanjut.';
                    }
                })
                .catch(error => console.error('Error fetching risk assessment:', error));
        });

        // Mobile menu toggle
        document.addEventListener('DOMContentLoaded', function() {
            const menuButton = document.querySelector('button.md\\:hidden');
            const sidebar = document.querySelector('.bg-gradient-to-b');

            if (menuButton && sidebar) {
                menuButton.addEventListener('click', function() {
                    if (sidebar.classList.contains('hidden-mobile')) {
                        sidebar.classList.remove('hidden-mobile');
                    } else {
                        sidebar.classList.add('hidden-mobile');
                    }
                });
            }
        });
    </script>

</x-app-layout>
