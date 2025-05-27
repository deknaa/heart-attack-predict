<x-app-layout>
    <div class="flex flex-col min-h-screen mx-auto max-w-7xl">
        {{-- Background dengan gradient --}}
        <div class="fixed inset-0 bg-gradient-to-br from-blue-50 via-white to-purple-50 -z-10"></div>

        {{-- Floating shapes untuk glassmorphism effect --}}
        <div
            class="fixed rounded-full top-20 left-10 w-72 h-72 bg-gradient-to-r from-blue-400/20 to-purple-400/20 blur-3xl -z-10">
        </div>
        <div
            class="fixed rounded-full bottom-20 right-10 w-96 h-96 bg-gradient-to-r from-pink-400/20 to-orange-400/20 blur-3xl -z-10">
        </div>
        <div
            class="fixed w-64 h-64 transform -translate-x-1/2 -translate-y-1/2 rounded-full top-1/2 left-1/2 bg-gradient-to-r from-green-400/20 to-blue-400/20 blur-3xl -z-10">
        </div>

        {{-- Main Content --}}
        <div class="relative z-10 flex-1">
            {{-- Dashboard Content --}}
            <main class="p-4 md:p-6 lg:p-8">
                {{-- Health Status --}}
                <div
                    class="p-6 mt-16 mb-6 border shadow-2xl md:p-8 md:mt-20 md:mb-8 bg-white/40 backdrop-blur-xl rounded-2xl border-white/30 shadow-black/5">
                    <div class="flex items-center justify-between mb-6">
                        <h3
                            class="text-xl font-bold text-transparent md:text-2xl bg-gradient-to-r from-gray-800 to-gray-600 bg-clip-text">
                            Status Kesehatan Anda</h3>
                        @if ($prediction)
                            @if ($prediction->probability < 0.5)
                                <span
                                    class="px-4 py-2 text-sm font-semibold text-green-700 border rounded-full shadow-lg bg-green-100/80 backdrop-blur-sm border-green-200/50">✓
                                    Baik</span>
                            @else
                                <span
                                    class="px-4 py-2 text-sm font-semibold text-red-700 border rounded-full shadow-lg bg-red-100/80 backdrop-blur-sm border-red-200/50">⚠
                                    Buruk</span>
                            @endif
                        @else
                            <span
                                class="px-4 py-2 text-sm font-semibold border rounded-full shadow-lg text-amber-700 bg-amber-100/80 backdrop-blur-sm border-amber-200/50">📊
                                Belum Ada Data</span>
                        @endif
                    </div>
                    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-4 md:gap-6">
                        <div class="transition-all duration-300 group hover:scale-105">
                            <div
                                class="p-6 border border-l-4 shadow-lg bg-gradient-to-br from-red-50/80 to-pink-50/80 backdrop-blur-sm border-red-100/50 rounded-2xl hover:shadow-xl border-l-red-500">
                                <div class="flex items-center">
                                    <div class="p-3 mr-4 bg-red-500/10 rounded-xl">
                                        <i class="text-2xl text-red-500 md:text-3xl fas fa-heartbeat"></i>
                                    </div>
                                    <div>
                                        <p class="text-sm font-medium text-gray-600">Detak Jantung</p>
                                        <p class="text-2xl font-bold text-gray-800 md:text-3xl">{{ $cp ? $cp : '-' }}
                                            <span class="text-sm font-normal text-gray-500">bpm</span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="transition-all duration-300 group hover:scale-105">
                            <div
                                class="p-6 border border-l-4 shadow-lg bg-gradient-to-br from-blue-50/80 to-indigo-50/80 backdrop-blur-sm border-blue-100/50 rounded-2xl hover:shadow-xl border-l-blue-500">
                                <div class="flex items-center">
                                    <div class="p-3 mr-4 bg-blue-500/10 rounded-xl">
                                        <i class="text-2xl text-blue-500 md:text-3xl fas fa-user"></i>
                                    </div>
                                    <div>
                                        <p class="text-sm font-medium text-gray-600">Usia</p>
                                        <p class="text-2xl font-bold text-gray-800 md:text-3xl">{{ $age ? $age : '-' }}
                                            <span class="text-sm font-normal text-gray-500">tahun</span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="transition-all duration-300 group hover:scale-105">
                            <div
                                class="p-6 border border-l-4 shadow-lg bg-gradient-to-br from-purple-50/80 to-violet-50/80 backdrop-blur-sm border-purple-100/50 rounded-2xl hover:shadow-xl border-l-purple-500">
                                <div class="flex items-center">
                                    <div class="p-3 mr-4 bg-purple-500/10 rounded-xl">
                                        <i class="text-2xl text-purple-500 md:text-3xl fas fa-tachometer-alt"></i>
                                    </div>
                                    <div>
                                        <p class="text-sm font-medium text-gray-600">Tekanan Darah</p>
                                        <p class="text-2xl font-bold text-gray-800 md:text-3xl">
                                            {{ $trestbps ? $trestbps : '-' }}/80 <span
                                                class="text-sm font-normal text-gray-500">mmHg</span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="transition-all duration-300 group hover:scale-105">
                            <div
                                class="p-6 border border-l-4 shadow-lg bg-gradient-to-br from-emerald-50/80 to-green-50/80 backdrop-blur-sm border-emerald-100/50 rounded-2xl hover:shadow-xl border-l-emerald-500">
                                <div class="flex items-center">
                                    <div class="p-3 mr-4 bg-emerald-500/10 rounded-xl">
                                        <i class="text-2xl md:text-3xl fas fa-vial text-emerald-500"></i>
                                    </div>
                                    <div>
                                        <p class="text-sm font-medium text-gray-600">Kolesterol</p>
                                        <p class="text-2xl font-bold text-gray-800 md:text-3xl">
                                            {{ $chol ? $chol : '-' }} <span
                                                class="text-sm font-normal text-gray-500">mg/dL</span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Risk Assessment --}}
                <div class="grid grid-cols-1 gap-6 mb-6 lg:grid-cols-2 md:gap-8 md:mb-8">
                    <div
                        class="p-6 transition-all duration-300 border shadow-2xl bg-white/40 backdrop-blur-xl rounded-2xl border-white/30 shadow-black/5 md:p-8 hover:shadow-3xl">
                        <h3
                            class="mb-6 text-xl font-bold text-transparent md:text-2xl bg-gradient-to-r from-gray-800 to-gray-600 bg-clip-text">
                            Penilaian Risiko Anda</h3>
                        @if ($prediction)
                            <div
                                class="p-4 mb-6 border bg-gradient-to-r from-blue-50/50 to-purple-50/50 rounded-xl border-blue-100/30">
                                <h4 class="text-lg font-semibold text-gray-800 md:text-xl">
                                    {{ $prediction->prediction_result == 0 ? '✅ Tidak Berisiko Serangan Jantung' : '⚠️ Berisiko Serangan Jantung' }}
                                </h4>
                            </div>
                        @else
                            <p>Tidak ada Penilaian risiko, karena anda belum melakukan prediksi.</p>
                        @endif
                        <div class="flex items-center mb-6">
                            <div class="w-full h-3 overflow-hidden rounded-full bg-gray-200/50 backdrop-blur-sm">
                                <div id="riskBar"
                                    class="h-3 transition-all duration-1000 ease-out rounded-full bg-gradient-to-r from-green-400 to-green-500"
                                    style="width: 0%;"></div>
                            </div>
                            <span id="riskPercentage" class="ml-4 text-xl font-bold text-green-500">0%</span>
                        </div>
                        <div id="riskBox"
                            class="p-6 border shadow-lg border-green-200/50 rounded-xl bg-gradient-to-r from-green-50/80 to-emerald-50/80 backdrop-blur-sm">
                            <div class="flex">
                                @if ($prediction)
                                    <div class="p-2 mr-4 rounded-lg bg-green-500/10">
                                        <i
                                            class="text-2xl fas {{ $prediction->prediction_result == 0 ? 'fa-check-circle text-green-500' : 'fa-exclamation-triangle text-orange-500' }}"></i>
                                    </div>
                                    <div>
                                        <p id="riskTitle" class="text-lg font-bold text-green-800">Risiko Rendah</p>
                                        <p id="riskDescription" class="mt-1 text-gray-700">Pertahankan gaya hidup sehat
                                            Anda.</p>
                                    </div>
                                @else
                                    -
                                @endif
                            </div>
                        </div>
                        <div
                            class="p-6 mt-6 border bg-gradient-to-r from-blue-50/80 to-indigo-50/80 rounded-xl border-blue-100/30 backdrop-blur-sm">
                            @if ($prediction)
                                <p class="leading-relaxed text-gray-700">
                                    Berdasarkan data yang diberikan, Anda termasuk dalam kategori
                                    <span
                                        class="font-bold text-blue-600">{{ $prediction->prediction_result == 0 ? 'Risiko Rendah' : 'Risiko Tinggi' }}</span>
                                    terkena serangan jantung. Model memperkirakan kemungkinan sebesar
                                    <span class="font-bold text-blue-600">{{ $prediction->probability * 100 }}%</span>
                                    bahwa
                                    Anda berisiko.
                                    Segera konsultasikan dengan tenaga medis untuk langkah pencegahan lebih lanjut.
                                </p>
                        </div>
                        <div
                            class="p-6 mt-6 border border-amber-200/50 rounded-xl bg-gradient-to-r from-amber-50/80 to-yellow-50/80 backdrop-blur-sm">
                            <div class="flex">
                                <div class="p-2 mr-4 rounded-lg bg-amber-500/10">
                                    <i class="text-xl fas fa-exclamation-triangle text-amber-500"></i>
                                </div>
                                <div>
                                    <p class="text-lg font-bold text-amber-800">⚠️ Peringatan</p>
                                    <p class="mt-1 leading-relaxed text-amber-700">Hasil yang ditampilkan tidak
                                        menggantikan peran medis dan dokter, hanya memberikan gambaran berdasarkan data
                                        yang diinputkan, hasil terbaik tetap didapatkan dengan berkonsultasi dengan
                                        dokter.</p>
                                </div>
                            </div>
                        @else
                            <span></span>
                            @endif
                        </div>
                    </div>

                    <div
                        class="p-6 transition-all duration-300 border shadow-2xl bg-white/40 backdrop-blur-xl rounded-2xl border-white/30 shadow-black/5 md:p-8 hover:shadow-3xl">
                        <h3 class="mb-6 text-xl font-bold md:text-2xl">
                            📊 Riwayat Prediksi</h3>
                        <div class="p-4 bg-white/30 rounded-xl backdrop-blur-sm">
                            <canvas id="predictionChart" height="200"></canvas>
                        </div>
                        <div class="mt-6 text-center">
                            <a href="{{ route('predict.history') }}"
                                class="inline-flex items-center px-6 py-3 text-sm font-semibold text-blue-700 transition-all duration-300 border shadow-lg bg-blue-100/80 backdrop-blur-sm rounded-xl border-blue-200/50 hover:bg-blue-200/80 hover:shadow-xl">
                                📈 Lihat detail riwayat prediksi
                            </a>
                        </div>
                    </div>
                </div>

                {{-- Recommended and Actions --}}
                <div class="grid grid-cols-1 gap-6 lg:grid-cols-3 md:gap-8">
                    <div
                        class="p-6 transition-all duration-300 border shadow-2xl lg:col-span-2 bg-white/40 backdrop-blur-xl rounded-2xl border-white/30 shadow-black/5 md:p-8 hover:shadow-3xl">
                        <h3 class="mb-6 text-xl font-bold md:text-2xl">
                            💡 Rekomendasi untuk Anda</h3>
                        <div class="space-y-4">
                            @if ($prediction)
                                @foreach ($displayRecommendations as $recommendation)
                                    <div class="transition-all duration-300 group hover:scale-102">
                                        <div
                                            class="flex p-6 border shadow-lg border-{{ $recommendation['color'] }}-100/50 rounded-xl bg-gradient-to-r from-{{ $recommendation['color'] }}-50/80 to-{{ $recommendation['color'] }}-50/80 backdrop-blur-sm hover:shadow-xl">
                                            <div class="p-3 mr-6 bg-{{ $recommendation['color'] }}-500/10 rounded-xl">
                                                <i
                                                    class="text-2xl text-{{ $recommendation['color'] }}-500 {{ $recommendation['icon'] }}"></i>
                                            </div>
                                            <div>
                                                <h4
                                                    class="mb-2 text-lg font-bold text-{{ $recommendation['color'] }}-800">
                                                    {{ $recommendation['title'] }}</h4>
                                                <p class="leading-relaxed text-{{ $recommendation['color'] }}-700">
                                                    {{ $recommendation['description'] }}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                                <div class="pt-4">
                                    <button onclick="openModal()"
                                        class="w-full px-6 py-3 text-white transition-all duration-300 transform shadow-lg bg-gradient-to-r from-blue-500 to-indigo-600 rounded-xl hover:from-blue-600 hover:to-indigo-700 hover:scale-105 hover:shadow-xl">
                                        <i class="mr-2 fas fa-list"></i>
                                        Lihat Rekomendasi Lengkap
                                    </button>
                                </div>
                            @else
                                <div
                                    class="flex p-6 border shadow-lg border-amber-100/50 rounded-xl bg-gradient-to-r from-amber-50/80 to-orange-50/80 backdrop-blur-sm">
                                    <div class="p-3 mr-6 bg-amber-500/10 rounded-xl">
                                        <i class="text-2xl fas fa-info-circle text-amber-500"></i>
                                    </div>
                                    <div>
                                        <h4 class="mb-2 text-lg font-bold text-amber-800">📋 Tidak Ada Rekomendasi</h4>
                                        <p class="leading-relaxed text-amber-700">Anda belum melakukan prediksi risiko,
                                            sehingga tidak ada rekomendasi yang diberikan kepada anda.</p>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>

                    <!-- Modal -->
                    <div id="recommendationModal"
                        class="fixed inset-0 z-50 hidden mt-10 bg-black bg-opacity-50 backdrop-blur-sm">
                        <div class="flex items-center justify-center min-h-screen p-4">
                            <div
                                class="relative w-full max-w-4xl max-h-[90vh] overflow-hidden bg-white rounded-2xl shadow-2xl">
                                <!-- Modal Header -->
                                <div
                                    class="flex items-center justify-between p-6 border-b bg-gradient-to-r from-blue-50 to-indigo-50">
                                    <h2 class="text-2xl font-bold">
                                        💡 Rekomendasi Lengkap untuk Anda
                                    </h2>
                                    <button onclick="closeModal()"
                                        class="p-2 text-gray-500 transition-colors rounded-full hover:bg-gray-100 hover:text-gray-700">
                                        <i class="text-xl fas fa-times"></i>
                                    </button>
                                </div>

                                {{-- Modal Content --}}
                                <div class="p-6 overflow-y-auto max-h-[70vh]">
                                    @if ($prediction)
                                        @if ($prediction->prediction_result == 1)
                                            <div class="p-4 mb-6 border border-red-200 bg-red-50 rounded-xl">
                                                <h3 class="mb-2 text-lg font-bold text-red-800">⚠️ Rekomendasi untuk
                                                    Kondisi Penyakit Jantung</h3>
                                                <p class="text-red-700">Silakan ikuti rekomendasi berikut untuk
                                                    membantu mengelola kondisi kesehatan jantung Anda:</p>
                                            </div>

                                            <div class="grid gap-4 md:grid-cols-2">
                                                <div class="p-4 border border-red-200 bg-red-50 rounded-xl">
                                                    <h4 class="mb-3 font-semibold text-red-800"><i
                                                            class="mr-2 fas fa-dumbbell"></i>Aktivitas Fisik</h4>
                                                    <ul class="space-y-2 text-red-700">
                                                        <li>• Rutin berolahraga minimal 30 menit per hari</li>
                                                        <li>• Terus aktif bergerak sesuai kemampuan</li>
                                                    </ul>
                                                </div>

                                                <div class="p-4 border border-orange-200 bg-orange-50 rounded-xl">
                                                    <h4 class="mb-3 font-semibold text-orange-800"><i
                                                            class="mr-2 fas fa-user-md"></i>Konsultasi Medis</h4>
                                                    <ul class="space-y-2 text-orange-700">
                                                        <li>• Konsultasi rutin ke dokter jantung</li>
                                                        <li>• Menjaga tekanan darah dan kadar gula</li>
                                                    </ul>
                                                </div>

                                                <div class="p-4 border border-green-200 bg-green-50 rounded-xl">
                                                    <h4 class="mb-3 font-semibold text-green-800"><i
                                                            class="mr-2 fas fa-utensils"></i>Pola Makan</h4>
                                                    <ul class="space-y-2 text-green-700">
                                                        <li>• Menghindari makanan tinggi kolesterol</li>
                                                        <li>• Konsumsi sayur, buah, dan ikan secara teratur</li>
                                                        <li>• Mengontrol berat badan ideal</li>
                                                    </ul>
                                                </div>

                                                <div class="p-4 border border-blue-200 bg-blue-50 rounded-xl">
                                                    <h4 class="mb-3 font-semibold text-blue-800"><i
                                                            class="mr-2 fas fa-heart"></i>Gaya Hidup</h4>
                                                    <ul class="space-y-2 text-blue-700">
                                                        <li>• Berhenti merokok</li>
                                                        <li>• Menghindari alkohol dan zat adiktif</li>
                                                        <li>• Kelola stres dengan baik</li>
                                                    </ul>
                                                </div>

                                                <div
                                                    class="p-4 border border-purple-200 bg-purple-50 rounded-xl md:col-span-2">
                                                    <h4 class="mb-3 font-semibold text-purple-800"><i
                                                            class="mr-2 fas fa-bed"></i>Pola Tidur & Istirahat</h4>
                                                    <ul class="space-y-2 text-purple-700">
                                                        <li>• Mengatur pola tidur yang sehat (7-8 jam per hari)</li>
                                                        <li>• Hindari begadang dan tidur tidak teratur</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        @else
                                            <div class="p-4 mb-6 border border-green-200 bg-green-50 rounded-xl">
                                                <h3 class="mb-2 text-lg font-bold text-green-800">✅ Rekomendasi untuk
                                                    Menjaga Kesehatan Jantung</h3>
                                                <p class="text-green-700">Pertahankan gaya hidup sehat untuk mencegah
                                                    penyakit jantung di masa depan:</p>
                                            </div>

                                            <div class="grid gap-4 md:grid-cols-2">
                                                <div class="p-4 border border-green-200 bg-green-50 rounded-xl">
                                                    <h4 class="mb-3 font-semibold text-green-800"><i
                                                            class="mr-2 fas fa-running"></i>Aktivitas & Olahraga</h4>
                                                    <ul class="space-y-2 text-green-700">
                                                        <li>• Jaga gaya hidup sehat</li>
                                                        <li>• Terus aktif bergerak dan berolahraga</li>
                                                    </ul>
                                                </div>

                                                <div class="p-4 border border-blue-200 bg-blue-50 rounded-xl">
                                                    <h4 class="mb-3 font-semibold text-blue-800"><i
                                                            class="mr-2 fas fa-stethoscope"></i>Pemeriksaan Kesehatan
                                                    </h4>
                                                    <ul class="space-y-2 text-blue-700">
                                                        <li>• Rutin cek kesehatan secara berkala</li>
                                                        <li>• Konsultasikan gaya hidup dengan ahli gizi/dokter</li>
                                                    </ul>
                                                </div>

                                                <div class="p-4 border border-orange-200 bg-orange-50 rounded-xl">
                                                    <h4 class="mb-3 font-semibold text-orange-800"><i
                                                            class="mr-2 fas fa-apple-alt"></i>Pola Makan Sehat</h4>
                                                    <ul class="space-y-2 text-orange-700">
                                                        <li>• Hindari pola makan yang tidak sehat</li>
                                                        <li>• Batasi konsumsi gula, garam, dan lemak jenuh</li>
                                                        <li>• Jaga berat badan ideal</li>
                                                    </ul>
                                                </div>

                                                <div class="p-4 border border-purple-200 bg-purple-50 rounded-xl">
                                                    <h4 class="mb-3 font-semibold text-purple-800"><i
                                                            class="mr-2 fas fa-brain"></i>Mental & Sosial</h4>
                                                    <ul class="space-y-2 text-purple-700">
                                                        <li>• Kelola stres dengan baik</li>
                                                        <li>• Perhatikan kualitas tidur</li>
                                                        <li>• Jangan merokok dan hindari asap rokok</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        @endif
                                    @endif
                                </div>

                                <!-- Modal Footer -->
                                {{-- <div class="p-6 border-t bg-gray-50">
                                    <div class="flex justify-end">
                                        <button onclick="closeModal()"
                                            class="px-6 py-2 text-white transition-colors rounded-lg bg-gradient-to-r from-gray-500 to-gray-600 hover:from-gray-600 hover:to-gray-700">
                                            Tutup
                                        </button>
                                    </div>
                                </div> --}}
                            </div>
                        </div>
                    </div>

                    <div
                        class="p-6 transition-all duration-300 border shadow-2xl bg-white/40 backdrop-blur-xl rounded-2xl border-white/30 shadow-black/5 md:p-8 hover:shadow-3xl">
                        <h3 class="mb-6 text-xl font-bold md:text-2xl">
                            ⚡ Tindakan</h3>
                        <div class="space-y-4">
                            <a href="{{ route('predict') }}" class="block group">
                                <div
                                    class="flex items-center justify-between p-4 text-gray-800 transition-all duration-300 border shadow-lg bg-gradient-to-r from-gray-100/80 to-gray-200/80 rounded-xl hover:from-red-500 hover:to-red-600 hover:text-white backdrop-blur-sm border-gray-200/50 hover:border-red-300 hover:shadow-xl hover:scale-105">
                                    <span class="flex items-center">
                                        <i class="mr-3 text-lg fas fa-calculator"></i>
                                        <span class="font-semibold">🧮 Prediksi Baru</span>
                                    </span>
                                    <i class="transition-transform fas fa-chevron-right group-hover:translate-x-1"></i>
                                </div>
                            </a>
                            @if ($prediction)
                                <a href="{{ url('export/excel/predictions') }}" class="block group">
                                    <div
                                        class="flex items-center justify-between p-4 text-gray-800 transition-all duration-300 border shadow-lg bg-gradient-to-r from-gray-100/80 to-gray-200/80 rounded-xl hover:from-green-500 hover:to-green-600 hover:text-white backdrop-blur-sm border-gray-200/50 hover:border-green-300 hover:shadow-xl hover:scale-105">
                                        <span class="flex items-center">
                                            <i class="mr-3 text-lg fas fa-download"></i>
                                            <span class="font-semibold">📥 Unduh Laporan</span>
                                        </span>
                                        <i
                                            class="transition-transform fas fa-chevron-right group-hover:translate-x-1"></i>
                                    </div>
                                </a>
                            @endif
                        </div>
                    </div>
                </div>

                {{-- recommendation article --}}
                <div
                    class="p-6 mt-6 transition-all duration-300 border shadow-2xl md:p-8 md:mt-8 bg-white/40 backdrop-blur-xl rounded-2xl border-white/30 shadow-black/5 hover:shadow-3xl">
                    <div class="flex flex-col gap-4 mb-6 sm:flex-row sm:items-center sm:justify-between">
                        <h3 class="text-xl font-bold md:text-2xl">
                            📚 Rekomendasi Artikel Untuk Anda</h3>
                        @if ($articleRecommendation->count() > 0)
                            <a href="{{ route('article.list') }}"
                                class="inline-flex items-center px-4 py-2 text-sm font-semibold text-blue-700 transition-all duration-300 border shadow-lg bg-blue-100/80 backdrop-blur-sm rounded-xl border-blue-200/50 hover:bg-blue-200/80 hover:shadow-xl">
                                👁️ Lihat Semua
                            </a>
                        @endif
                    </div>

                    <div class="grid grid-cols-1 gap-6 md:grid-cols-2 xl:grid-cols-3">
                        @forelse ($articleRecommendation as $article)
                            <div class="transition-all duration-300 group hover:scale-105">
                                <div
                                    class="overflow-hidden border shadow-lg border-white/30 rounded-2xl bg-white/30 backdrop-blur-sm hover:shadow-xl">
                                    @if ($article->featured_image)
                                        <div class="overflow-hidden">
                                            <img src="{{ asset('storage/' . $article->featured_image) }}"
                                                alt="{{ $article->title }}"
                                                class="object-cover w-full h-48 transition-transform duration-500 group-hover:scale-110">
                                        </div>
                                    @endif
                                    <div class="p-6">
                                        <h4 class="mb-3 text-lg font-bold leading-tight text-gray-900">
                                            {{ $article->title }}</h4>
                                        <div class="mb-4 leading-relaxed text-gray-700 line-clamp-3">
                                            {!! Str::limit(strip_tags($article->content), 120) !!}</div>
                                        <a href="{{ route('article.show', $article->slug) }}"
                                            class="inline-flex items-center px-4 py-2 text-sm font-semibold text-blue-700 transition-all duration-300 border rounded-lg shadow-md bg-blue-100/80 backdrop-blur-sm border-blue-200/50 hover:bg-blue-200/80 hover:shadow-lg">
                                            📖 Baca selengkapnya
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-span-full">
                                <div
                                    class="flex flex-col items-center justify-center py-16 border rounded-2xl bg-gradient-to-br from-gray-50/80 to-gray-100/80 backdrop-blur-sm border-gray-200/50">
                                    <div class="p-4 mb-4 rounded-full bg-gray-200/50">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-16 h-16 text-gray-400"
                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                                d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
                                        </svg>
                                    </div>
                                    <h3 class="mb-2 text-xl font-bold text-gray-900">📄 Belum ada artikel</h3>
                                    <p class="max-w-md text-center text-gray-600">Silakan periksa kembali nanti untuk
                                        informasi dan artikel kesehatan terbaru.</p>
                                </div>
                            </div>
                        @endforelse
                    </div>
                </div>
            </main>
        </div>
    </div>
    @vite(['resources/js/userDashboardChart.js'])
</x-app-layout>
