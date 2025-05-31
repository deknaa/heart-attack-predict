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

                    <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-3">
                        @foreach ($articleRecommendation as $article)
                            <article class="group">
                                <div
                                    class="h-full overflow-hidden transition-all duration-500 bg-white/40 backdrop-blur-xl rounded-3xl border border-white/30 shadow-xl shadow-black/5 hover:shadow-2xl hover:shadow-black/10 hover:-translate-y-2 hover:scale-[1.02] hover:bg-white/50">
                                    {{-- Enhanced Image Section --}}
                                    <div
                                        class="relative h-56 overflow-hidden bg-gradient-to-br from-gray-100 to-gray-200">
                                        @if ($article->featured_image)
                                            <img src="{{ asset('storage/' . $article->featured_image) }}"
                                                alt="{{ $article->title }}"
                                                class="object-cover w-full h-full transition-transform duration-700 group-hover:scale-110">
                                        @else
                                            <div
                                                class="relative flex items-center justify-center w-full h-full overflow-hidden bg-gradient-to-br from-red-500 via-red-700 to-red-600">
                                                <div class="relative z-10 text-center">
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        class="w-16 h-16 mx-auto mb-2 text-white animate-pulse"
                                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="1.5"
                                                            d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                                                    </svg>
                                                    <p class="font-medium text-white">Artikel Menarik</p>
                                                </div>
                                            </div>
                                        @endif

                                        {{-- Enhanced Category Badge --}}
                                        <div class="absolute top-4 right-4">
                                            <span
                                                class="inline-flex items-center px-3 py-1.5 text-xs font-bold text-white bg-gradient-to-r from-red-600 to-red-600 rounded-full shadow-lg backdrop-blur-sm border border-white/60 hover:from-blue-700 hover:to-purple-700 transition-all duration-300">
                                                ✨ {{ ucwords(str_replace('_', ' ', $article->category)) }}
                                            </span>
                                        </div>

                                        {{-- Hover Overlay --}}
                                        <div
                                            class="absolute inset-0 transition-opacity duration-300 opacity-0 bg-gradient-to-t from-black/50 via-transparent to-transparent group-hover:opacity-100">
                                        </div>
                                    </div>

                                    {{-- Enhanced Content Section --}}
                                    <div class="p-6 md:p-8 flex flex-col h-[calc(100%-14rem)]">
                                        {{-- Meta Information --}}
                                        <div class="flex items-center justify-between mb-4">
                                            <div class="flex items-center text-sm text-gray-600">
                                                <div class="p-1.5 bg-blue-100/80 rounded-lg mr-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        class="w-4 h-4 text-blue-600" fill="none"
                                                        viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                    </svg>
                                                </div>
                                                <span
                                                    class="font-medium">{{ $article->created_at->diffForHumans() }}</span>
                                            </div>
                                        </div>

                                        {{-- Enhanced Title --}}
                                        <h3
                                            class="mb-4 text-xl font-bold text-gray-800 transition-all duration-300 md:text-2xl line-clamp-2 group-hover:text-transparent group-hover:bg-gradient-to-r group-hover:from-blue-600 group-hover:to-purple-600 group-hover:bg-clip-text">
                                            {{ $article->title }}
                                        </h3>

                                        {{-- Enhanced Footer --}}
                                        <div
                                            class="flex items-center justify-between pt-4 mt-auto border-t border-gray-200/50">
                                            @if ($article->author)
                                                <div class="flex items-center group/author">
                                                    <div class="relative">
                                                        <div
                                                            class="w-10 h-10 mr-3 overflow-hidden transition-all duration-300 rounded-full bg-gradient-to-br from-blue-400 to-purple-500 ring-2 ring-white/50 group-hover/author:ring-blue-400/50">
                                                            @if ($article->author->avatar)
                                                                <img src="{{ $article->author->avatar }}"
                                                                    alt="{{ $article->author->name }}"
                                                                    class="object-cover w-full h-full">
                                                            @else
                                                                <div
                                                                    class="flex items-center justify-center w-full h-full text-sm font-bold text-white">
                                                                    {{ substr($article->author->name ?? 'A', 0, 1) }}
                                                                </div>
                                                            @endif
                                                        </div>
                                                        <div
                                                            class="absolute w-4 h-4 bg-green-400 border-2 border-white rounded-full -bottom-1 -right-1">
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <span
                                                            class="text-sm font-semibold text-gray-700 transition-colors duration-300 group-hover/author:text-blue-600">
                                                            {{ $article->author->name ?? 'Admin' }}
                                                        </span>
                                                        <p class="text-xs text-gray-500">Content Creator</p>
                                                    </div>
                                                </div>
                                            @endif

                                            {{-- Enhanced CTA Button --}}
                                            <a href="{{ route('article.detail', $article->slug ?? '') }}"
                                                class="group/btn inline-flex items-center px-6 py-3 text-sm font-bold text-white bg-gradient-to-r from-red-600 to-red-600 rounded-2xl hover:from-red-700 hover:to-red-700 transition-all duration-300 shadow-lg hover:shadow-xl hover:shadow-blue-500/25 hover:-translate-y-0.5 focus:outline-none focus:ring-4 focus:ring-blue-500/50 relative overflow-hidden">
                                                {{-- Button Background Animation --}}
                                                <div
                                                    class="absolute inset-0 transition-opacity duration-300 opacity-0 bg-gradient-to-r from-white/20 to-transparent group-hover/btn:opacity-100">
                                                </div>
                                                <span class="relative z-10 mr-2">Baca Selengkapnya</span>
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="relative z-10 w-4 h-4 transition-transform duration-300 group-hover/btn:translate-x-1"
                                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        @endforeach
                    </div>

                    {{-- Enhanced Empty State --}}
                    @if ($articleRecommendation->isEmpty())
                        <div
                            class="relative flex flex-col items-center justify-center py-20 overflow-hidden border shadow-xl rounded-3xl bg-white/40 backdrop-blur-xl border-white/30">
                            {{-- Background Pattern --}}
                            <div class="absolute inset-0 opacity-5">
                                <div
                                    class="absolute top-0 left-0 w-32 h-32 transform -translate-x-16 -translate-y-16 rounded-full bg-gradient-to-br from-blue-500 to-purple-500">
                                </div>
                                <div
                                    class="absolute bottom-0 right-0 w-40 h-40 transform translate-x-20 translate-y-20 rounded-full bg-gradient-to-br from-pink-500 to-orange-500">
                                </div>
                            </div>

                            <div class="relative z-10 text-center">
                                <div
                                    class="inline-block p-6 mb-6 rounded-full bg-gradient-to-br from-gray-100 to-gray-200">
                                    <div class="p-4 bg-white rounded-full shadow-inner">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-16 h-16 text-gray-400"
                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                                d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                                        </svg>
                                    </div>
                                </div>
                                <h3 class="mb-4 text-2xl font-bold text-gray-900">📚 Belum Ada Artikel</h3>
                                <p class="max-w-md mx-auto mb-8 text-lg text-gray-600">Artikel menarik sedang dalam
                                    persiapan. Silakan periksa kembali nanti untuk informasi terbaru dan bermanfaat.</p>
                                <button
                                    class="inline-flex items-center px-8 py-4 text-sm font-bold text-white transition-all duration-300 shadow-lg bg-gradient-to-r from-blue-600 to-purple-600 rounded-2xl hover:from-blue-700 hover:to-purple-700 hover:shadow-xl hover:-translate-y-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                                    </svg>
                                    Refresh Halaman
                                </button>
                            </div>
                        </div>
                    @endif
                </div>
            </main>
        </div>
    </div>
    @vite(['resources/js/userDashboardChart.js'])
</x-app-layout>
