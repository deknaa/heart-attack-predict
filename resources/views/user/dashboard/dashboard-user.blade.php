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
                        <span class="px-3 py-1 text-sm font-medium text-green-800 bg-green-100 rounded-full">Baik</span>
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
                                        <p class="text-xl font-bold">75 <span class="text-sm font-normal">bpm</span></p>
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
                                        <p class="text-xl font-bold">68 <span class="text-sm font-normal">kg</span></p>
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
                                        <p class="text-xl font-bold">120/80 <span
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
                                        <p class="text-xl font-bold">180 <span class="text-sm font-normal">mg/dL</span>
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
                                    <div class="h-4 bg-green-500 rounded-full" style="width: 15%"></div>
                                </div>
                                <span class="ml-4 text-lg font-bold text-green-500">15%</span>
                            </div>
                            <p class="mb-4 text-gray-600">Risiko serangan jantung dalam 10 tahun mendatang berdasarkan
                                faktor-faktor risiko Anda saat ini.</p>
                            <div class="p-4 border border-green-200 rounded-lg bg-green-50">
                                <div class="flex">
                                    <div class="mr-3 text-green-500">
                                        <i class="text-xl fas fa-check-circle"></i>
                                    </div>
                                    <div>
                                        <p class="font-medium text-green-800">Risiko Rendah</p>
                                        <p class="text-sm text-gray-600">Pertahankan gaya hidup sehat Anda.</p>
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
                                <a href="#" class="text-sm font-medium text-blue-600 hover:text-blue-800">Lihat
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
                            </div>
                        </div>
                    </div>

                    <div class="w-full px-3 mb-6 md:w-1/3">
                        <div class="p-6 bg-white rounded-lg shadow">
                            <h3 class="mb-4 text-lg font-semibold text-gray-800">Tindakan</h3>
                            <div class="space-y-3">
                                <a href="#"
                                    class="flex items-center justify-between p-3 text-white transition duration-200 bg-blue-600 rounded-lg hover:bg-blue-700">
                                    <span class="flex items-center">
                                        <i class="mr-3 fas fa-calculator"></i>
                                        <span>Prediksi Baru</span>
                                    </span>
                                    <i class="fas fa-chevron-right"></i>
                                </a>
                                <a href="#"
                                    class="flex items-center justify-between p-3 text-gray-800 transition duration-200 bg-gray-100 rounded-lg hover:bg-gray-200">
                                    <span class="flex items-center">
                                        <i class="mr-3 fas fa-user-md"></i>
                                        <span>Konsultasi Dokter</span>
                                    </span>
                                    <i class="fas fa-chevron-right"></i>
                                </a>
                                <a href="#"
                                    class="flex items-center justify-between p-3 text-gray-800 transition duration-200 bg-gray-100 rounded-lg hover:bg-gray-200">
                                    <span class="flex items-center">
                                        <i class="mr-3 fas fa-download"></i>
                                        <span>Unduh Laporan</span>
                                    </span>
                                    <i class="fas fa-chevron-right"></i>
                                </a>
                                <a href="#"
                                    class="flex items-center justify-between p-3 text-gray-800 transition duration-200 bg-gray-100 rounded-lg hover:bg-gray-200">
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

                <!-- Upcoming Checkups -->
                <div class="p-6 mt-6 bg-white rounded-lg shadow">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-lg font-semibold text-gray-800">Jadwal Pemeriksaan</h3>
                        <a href="#" class="text-sm text-blue-600 hover:text-blue-800">Lihat Semua</a>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white">
                            <thead>
                                <tr>
                                    <th
                                        class="px-4 py-2 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                        Tanggal</th>
                                    <th
                                        class="px-4 py-2 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                        Jenis</th>
                                    <th
                                        class="px-4 py-2 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                        Dokter</th>
                                    <th
                                        class="px-4 py-2 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                        Status</th>
                                    <th class="px-4 py-2 border-b border-gray-200 bg-gray-50"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="px-4 py-3 border-b border-gray-200">20 Mar 2025</td>
                                    <td class="px-4 py-3 border-b border-gray-200">Cek Tekanan Darah</td>
                                    <td class="px-4 py-3 border-b border-gray-200">Dr. Anindita</td>
                                    <td class="px-4 py-3 border-b border-gray-200">
                                        <span
                                            class="inline-flex px-2 text-xs font-semibold leading-5 text-yellow-800 bg-yellow-100 rounded-full">Mendatang</span>
                                    </td>
                                    <td class="px-4 py-3 text-right border-b border-gray-200">
                                        <button class="text-blue-600 hover:text-blue-900">Detail</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="px-4 py-3 border-b border-gray-200">5 Apr 2025</td>
                                    <td class="px-4 py-3 border-b border-gray-200">EKG</td>
                                    <td class="px-4 py-3 border-b border-gray-200">Dr. Surya</td>
                                    <td class="px-4 py-3 border-b border-gray-200">
                                        <span
                                            class="inline-flex px-2 text-xs font-semibold leading-5 text-gray-800 bg-gray-100 rounded-full">Dijadwalkan</span>
                                    </td>
                                    <td class="px-4 py-3 text-right border-b border-gray-200">
                                        <button class="text-blue-600 hover:text-blue-900">Detail</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Articles & Education -->
                <div class="p-6 mt-6 bg-white rounded-lg shadow">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-lg font-semibold text-gray-800">Artikel Kesehatan</h3>
                        <a href="#" class="text-sm text-blue-600 hover:text-blue-800">Lihat Semua</a>
                    </div>
                    <div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-3">
                        <div class="overflow-hidden border rounded-lg">
                            <img src="/api/placeholder/320/160" alt="Artikel tentang diet sehat"
                                class="object-cover w-full h-40">
                            <div class="p-4">
                                <h4 class="mb-2 font-medium text-gray-900">Diet Rendah Garam untuk Kesehatan Jantung
                                </h4>
                                <p class="mb-3 text-sm text-gray-600">Menerapkan pola makan rendah garam dapat
                                    menurunkan risiko penyakit jantung dan stroke.</p>
                                <a href="#" class="text-sm font-medium text-blue-600 hover:text-blue-800">Baca
                                    selengkapnya</a>
                            </div>
                        </div>
                        <div class="overflow-hidden border rounded-lg">
                            <img src="/api/placeholder/320/160" alt="Artikel tentang olahraga"
                                class="object-cover w-full h-40">
                            <div class="p-4">
                                <h4 class="mb-2 font-medium text-gray-900">Aktivitas Fisik yang Bermanfaat untuk
                                    Jantung</h4>
                                <p class="mb-3 text-sm text-gray-600">Temukan jenis aktivitas fisik yang paling efektif
                                    untuk menjaga kesehatan jantung Anda.</p>
                                <a href="#" class="text-sm font-medium text-blue-600 hover:text-blue-800">Baca
                                    selengkapnya</a>
                            </div>
                        </div>
                        <div class="overflow-hidden border rounded-lg">
                            <img src="/api/placeholder/320/160" alt="Artikel tentang stress"
                                class="object-cover w-full h-40">
                            <div class="p-4">
                                <h4 class="mb-2 font-medium text-gray-900">Mengelola Stres untuk Jantung yang Sehat
                                </h4>
                                <p class="mb-3 text-sm text-gray-600">Stres kronis dapat meningkatkan risiko penyakit
                                    jantung. Pelajari cara mengelolanya.</p>
                                <a href="#" class="text-sm font-medium text-blue-600 hover:text-blue-800">Baca
                                    selengkapnya</a>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <script>
        // Initialize Chart
        document.addEventListener('DOMContentLoaded', function() {
            const ctx = document.getElementById('predictionChart').getContext('2d');
            const chart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun'],
                    datasets: [{
                        label: 'Risiko (dalam %)',
                        data: [22, 19, 18, 16, 15, 15],
                        borderColor: 'rgba(37, 99, 235, 1)',
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
                            max: 30,
                            ticks: {
                                stepSize: 5
                            }
                        }
                    }
                }
            });
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
