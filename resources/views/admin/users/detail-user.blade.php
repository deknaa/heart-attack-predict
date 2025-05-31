<x-app-layout>
    <div class="p-14 sm:ml-64">
        <div class="flex items-center justify-between">
            <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
                {{ __('Detail User') }}
            </h2>
            <div class="flex gap-2">
                <a href="{{ route('users.data') }}"
                    class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-gray-600 border border-transparent rounded-md hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-1" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    {{ __('Back') }}
                </a>
            </div>
        </div>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                    <div class="flex flex-col md:flex-row">
                        <!-- User Profile Section -->
                        <div
                            class="flex flex-col items-center justify-center w-full p-6 text-white md:w-1/3 bg-gradient-to-br from-blue-500 to-indigo-600">
                            <div class="relative mb-6 group">
                                @if ($user->profile_photo_path)
                                    <img src="{{ Storage::url($user->profile_photo_path) }}" alt="{{ $user->name }}"
                                        class="object-cover w-40 h-40 border-4 border-white rounded-full shadow-lg">
                                @else
                                    <div
                                        class="flex items-center justify-center w-40 h-40 bg-gray-300 border-4 border-white rounded-full shadow-lg dark:bg-gray-600">
                                        <span
                                            class="text-4xl font-bold text-gray-600 dark:text-gray-300">{{ substr($user->name, 0, 1) }}</span>
                                    </div>
                                @endif
                                <div
                                    class="absolute inset-0 flex items-center justify-center transition-all duration-300 bg-black bg-opacity-0 rounded-full opacity-0 group-hover:bg-opacity-30 group-hover:opacity-100">
                                    <a href="" class="text-white">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 13a3 3 0 11-6 0 3 3 0 016 0z" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                            <h2 class="mb-2 text-2xl font-bold">{{ $user->name }}</h2>
                            <p class="flex items-center mb-1 text-blue-100">
                                {{ $user->email }}
                            </p>
                            <div class="px-4 py-1 mt-3 text-sm font-bold bg-blue-700 rounded-full">
                                {{ ucfirst($user->role) }}
                            </div>
                            <div class="mt-6 text-center">
                                <p class="text-sm text-blue-100">
                                    <span class="block mb-1 font-medium text-white">Member since</span>
                                    {{ $user->created_at->format('d M Y') }}
                                </p>
                            </div>
                        </div>

                        <!-- User Details Section -->
                        <div class="w-full p-6 md:w-2/3">
                            <div class="mb-8">
                                <h3
                                    class="pb-2 mb-4 text-lg font-semibold text-gray-900 border-b border-gray-200 dark:text-gray-100 dark:border-gray-700">
                                    Personal Information</h3>
                                <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                                    <div>
                                        <div class="mb-4">
                                            <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Nama
                                                Pengguna</p>
                                            <p class="mt-1 text-gray-900 dark:text-gray-100">{{ $user->name }}</p>
                                        </div>
                                        <div class="mb-4">
                                            <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Email</p>
                                            <p class="mt-1 text-gray-900 dark:text-gray-100">{{ $user->email }}</p>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="mb-4">
                                            <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Role</p>
                                            <p class="mt-1 text-gray-900 dark:text-gray-100">{{ ucfirst($user->role) }}
                                            </p>
                                        </div>
                                        <div class="mb-4">
                                            <p class="text-sm font-medium text-gray-500 dark:text-gray-400">No Telephone
                                            </p>
                                            <p class="mt-1 text-gray-900 dark:text-gray-100">
                                                {{ $user->no_telp ?? '-' }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-8">
                                <h3
                                    class="pb-2 mb-4 text-lg font-semibold text-gray-900 border-b border-gray-200 dark:text-gray-100 dark:border-gray-700">
                                    Account Information</h3>
                                <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                                    <div>
                                        <div class="mb-4">
                                            <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Member Since
                                            </p>
                                            <p class="mt-1 text-gray-900 dark:text-gray-100">
                                                {{ $user->created_at->format('F d, Y') }}</p>
                                        </div>
                                        <div class="mb-4">
                                            <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Last Updated
                                            </p>
                                            <p class="mt-1 text-gray-900 dark:text-gray-100">
                                                {{ $user->updated_at->format('F d, Y') }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Table Section --}}
        <div
            class="overflow-hidden border shadow-2xl bg-white/40 backdrop-blur-xl rounded-2xl border-white/30 shadow-black/5">
            {{-- Table Controls --}}
            <div
                class="px-6 py-6 border-b md:px-8 bg-gradient-to-r from-gray-50/80 to-gray-100/80 backdrop-blur-sm border-white/30">
                <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
                    <div>
                        <h2 class="text-lg font-bold text-gray-800 md:text-xl">🏥 Riwayat Prediksi Kesehatan</h2>
                        <p class="mt-1 text-sm text-gray-600">Total {{ $predictions->total() }} prediksi yang telah
                            dilakukan</p>
                    </div>

                    {{-- Per Page Selector --}}
                    <div class="flex items-center space-x-3">
                        <label for="perPage" class="text-sm font-medium text-gray-700">Tampilkan:</label>
                        <form method="GET" action="{{ request()->url() }}" id="perPageForm" class="inline">
                            @foreach (request()->except('per_page', 'page') as $key => $value)
                                <input type="hidden" name="{{ $key }}" value="{{ $value }}">
                            @endforeach
                            <select name="per_page" id="perPage"
                                onchange="document.getElementById('perPageForm').submit()"
                                class="px-3 py-2 text-sm font-medium text-gray-700 transition-all duration-300 border rounded-lg bg-white/80 backdrop-blur-sm border-gray-200/50 focus:ring-2 focus:ring-blue-500/50 focus:border-blue-500/50">
                                @foreach ([5, 10, 15, 25, 50] as $option)
                                    <option value="{{ $option }}"
                                        {{ request('per_page', 10) == $option ? 'selected' : '' }}>
                                        {{ $option }} baris
                                    </option>
                                @endforeach
                            </select>
                        </form>
                    </div>
                </div>
            </div>

            {{-- Responsive Table Container --}}
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead
                        class="border-b bg-gradient-to-r from-gray-100/80 to-gray-200/80 backdrop-blur-sm border-white/30">
                        <tr>
                            <th
                                class="px-4 py-4 text-xs font-bold tracking-wider text-left text-gray-700 uppercase md:px-6 md:text-sm">
                                #
                            </th>
                            <th
                                class="px-4 py-4 text-xs font-bold tracking-wider text-left text-gray-700 uppercase md:px-6 md:text-sm">
                                📅 Tanggal
                            </th>
                            <th
                                class="px-4 py-4 text-xs font-bold tracking-wider text-left text-gray-700 uppercase md:px-6 md:text-sm">
                                🩺 Hasil Prediksi
                            </th>
                            <th
                                class="px-4 py-4 text-xs font-bold tracking-wider text-left text-gray-700 uppercase md:px-6 md:text-sm">
                                📈 Probabilitas
                            </th>
                            <th
                                class="px-4 py-4 text-xs font-bold tracking-wider text-center text-gray-700 uppercase md:px-6 md:text-sm">
                                ⚡ Aksi
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y bg-white/20 backdrop-blur-sm divide-white/20">
                        @forelse ($predictions as $index => $prediction)
                            <tr class="transition-all duration-300 hover:bg-white/30 hover:backdrop-blur-md group">
                                <td class="px-4 py-6 text-sm font-medium text-gray-700 md:px-6 whitespace-nowrap">
                                    <span
                                        class="flex items-center justify-center w-8 h-8 font-bold text-blue-700 rounded-full bg-blue-100/80 backdrop-blur-sm">
                                        {{ ($predictions->currentPage() - 1) * $predictions->perPage() + $index + 1 }}
                                    </span>
                                </td>
                                <td class="px-4 py-6 text-sm text-gray-800 md:px-6 whitespace-nowrap">
                                    <div class="flex flex-col">
                                        <span
                                            class="font-semibold">{{ $prediction->created_at->format('d M Y') }}</span>
                                        <span
                                            class="text-xs text-gray-600">{{ $prediction->created_at->format('H:i') }}
                                            WIB</span>
                                    </div>
                                </td>
                                <td class="px-4 py-6 text-sm md:px-6 whitespace-nowrap">
                                    @if ($prediction->prediction_result == 1)
                                        <span
                                            class="inline-flex items-center px-3 py-2 text-sm font-semibold text-red-700 border rounded-full shadow-lg bg-red-100/80 backdrop-blur-sm border-red-200/50">
                                            ⚠️ Berisiko Tinggi
                                        </span>
                                    @else
                                        <span
                                            class="inline-flex items-center px-3 py-2 text-sm font-semibold text-green-700 border rounded-full shadow-lg bg-green-100/80 backdrop-blur-sm border-green-200/50">
                                            ✅ Risiko Rendah
                                        </span>
                                    @endif
                                </td>
                                <td class="px-4 py-6 text-sm md:px-6 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="flex-1 mr-3">
                                            <div class="w-full h-2 rounded-full bg-gray-200/50">
                                                <div class="h-2 rounded-full {{ $prediction->prediction_result == 1 ? 'bg-gradient-to-r from-red-400 to-red-500' : 'bg-gradient-to-r from-green-400 to-green-500' }}"
                                                    style="width: {{ $prediction->probability * 100 }}%"></div>
                                            </div>
                                        </div>
                                        <span
                                            class="font-bold text-gray-800">{{ round($prediction->probability * 100, 1) }}%</span>
                                    </div>
                                </td>
                                <td class="px-4 py-6 text-sm font-medium md:px-6 whitespace-nowrap">
                                    <div class="flex items-center justify-center space-x-2">
                                        <button
                                            class="p-2 text-blue-600 transition-all duration-300 border rounded-lg shadow-lg group/btn bg-blue-100/80 backdrop-blur-sm border-blue-200/50 hover:bg-blue-200/80 hover:shadow-xl hover:scale-110"
                                            onclick="openPredictionModal({{ $prediction->id }})"
                                            title="Lihat Detail">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="w-5 h-5 transition-transform group-hover/btn:scale-110"
                                                viewBox="0 0 20 20" fill="currentColor">
                                                <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                                                <path fill-rule="evenodd"
                                                    d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </button>
                                        <a href="{{ route('pdf.download', $prediction->id) }}"
                                            onclick="downloadReport()"
                                            class="flex items-center px-3 py-2 text-sm font-semibold text-white transition-all duration-300 rounded-lg shadow-lg group/btn bg-gradient-to-r from-green-500 to-green-600 hover:from-green-600 hover:to-green-700 hover:shadow-xl hover:scale-105"
                                            title="Download Laporan">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="w-4 h-4 mr-1 group-hover/btn:-translate-y-0.5 transition-transform"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                                            </svg>
                                            <span class="hidden sm:inline">PDF</span>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-6 py-16 text-center">
                                    <div class="flex flex-col items-center justify-center">
                                        <div class="p-4 mb-4 rounded-full bg-gray-200/50">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-16 h-16 text-gray-400"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    stroke-width="1.5"
                                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                            </svg>
                                        </div>
                                        <h3 class="mb-2 text-xl font-bold text-gray-900">📋 User tidak memiliki history
                                            prediksi</h3>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{-- Pagination Section --}}
            @if ($predictions->hasPages())
                <div
                    class="px-6 py-6 border-t md:px-8 bg-gradient-to-r from-gray-50/80 to-gray-100/80 backdrop-blur-sm border-white/30">
                    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
                        {{-- Pagination Info --}}
                        <div class="text-sm text-gray-600">
                            <span class="font-medium text-gray-900">Menampilkan
                                {{ $predictions->firstItem() ?? 0 }} - {{ $predictions->lastItem() ?? 0 }}</span>
                            dari
                            <span class="font-medium text-gray-900">{{ $predictions->total() }}</span>
                            hasil
                        </div>

                        {{-- Pagination Links --}}
                        <div class="flex items-center space-x-1">
                            {{-- Previous Button --}}
                            @if ($predictions->onFirstPage())
                                <span
                                    class="px-3 py-2 text-sm font-medium text-gray-400 border rounded-lg cursor-not-allowed bg-gray-100/50 backdrop-blur-sm border-gray-200/30">
                                    ← Sebelumnya
                                </span>
                            @else
                                <a href="{{ $predictions->appends(request()->query())->previousPageUrl() }}"
                                    class="px-3 py-2 text-sm font-medium text-gray-700 transition-all duration-300 border rounded-lg shadow-sm bg-white/80 backdrop-blur-sm border-gray-200/50 hover:bg-gray-50/80 hover:border-gray-300/50 hover:shadow-md">
                                    ← Sebelumnya
                                </a>
                            @endif

                            {{-- Page Numbers --}}
                            @foreach ($predictions->appends(request()->query())->getUrlRange(1, $predictions->lastPage()) as $page => $url)
                                @if ($page == $predictions->currentPage())
                                    <span
                                        class="px-4 py-2 text-sm font-bold text-white border rounded-lg shadow-lg bg-gradient-to-r from-blue-500 to-blue-600 border-blue-300/50">
                                        {{ $page }}
                                    </span>
                                @elseif ($page == 1 || $page == $predictions->lastPage() || abs($page - $predictions->currentPage()) <= 2)
                                    <a href="{{ $url }}"
                                        class="px-4 py-2 text-sm font-medium text-gray-700 transition-all duration-300 border rounded-lg shadow-sm bg-white/80 backdrop-blur-sm border-gray-200/50 hover:bg-blue-50/80 hover:border-blue-300/50 hover:text-blue-700 hover:shadow-md">
                                        {{ $page }}
                                    </a>
                                @elseif (
                                    ($page == 2 && $predictions->currentPage() > 4) ||
                                        ($page == $predictions->lastPage() - 1 && $predictions->currentPage() < $predictions->lastPage() - 3))
                                    <span class="px-2 py-2 text-sm text-gray-500">...</span>
                                @endif
                            @endforeach

                            {{-- Next Button --}}
                            @if ($predictions->hasMorePages())
                                <a href="{{ $predictions->appends(request()->query())->nextPageUrl() }}"
                                    class="px-3 py-2 text-sm font-medium text-gray-700 transition-all duration-300 border rounded-lg shadow-sm bg-white/80 backdrop-blur-sm border-gray-200/50 hover:bg-gray-50/80 hover:border-gray-300/50 hover:shadow-md">
                                    Selanjutnya →
                                </a>
                            @else
                                <span
                                    class="px-3 py-2 text-sm font-medium text-gray-400 border rounded-lg cursor-not-allowed bg-gray-100/50 backdrop-blur-sm border-gray-200/30">
                                    Selanjutnya →
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
            @endif
        </div>

        {{-- Prediction Modal dengan Glassmorphism --}}
        <div id="predictionModal"
            class="fixed inset-0 z-50 flex items-start justify-center hidden overflow-y-auto bg-black/50 backdrop-blur-sm">
            <div class="w-full max-w-6xl p-4 mx-4 my-8 transition-all duration-300 transform scale-95 border shadow-2xl opacity-0 bg-white/90 backdrop-blur-xl rounded-2xl border-white/30"
                id="modalContainer">
                {{-- Modal Header --}}
                <div
                    class="flex flex-col pb-4 mb-6 border-b sm:flex-row sm:items-center sm:justify-between border-white/30">
                    <div>
                        <h3 class="text-xl font-bold md:text-2xl" id="modalTitle">
                            🔍 Detail Prediksi Kesehatan
                        </h3>
                        <p class="mt-1 text-sm text-gray-600">Analisis lengkap hasil prediksi Anda</p>
                    </div>
                    <button onclick="closePredictionModal()"
                        class="p-2 mt-4 text-gray-400 transition-all duration-300 rounded-lg sm:mt-0 hover:text-gray-600 hover:bg-gray-100/80 focus:outline-none">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>

                {{-- Modal Content --}}
                <div class="py-4">
                    {{-- Loading State --}}
                    <div id="modalLoading" class="flex flex-col items-center justify-center py-16">
                        <div class="relative">
                            <div
                                class="w-16 h-16 border-4 border-blue-200 rounded-full animate-spin border-t-blue-600">
                            </div>
                            <div class="absolute inset-0 flex items-center justify-center">
                                <div class="w-8 h-8 bg-blue-600 rounded-full animate-pulse"></div>
                            </div>
                        </div>
                        <p class="mt-4 font-medium text-gray-600">Memuat detail prediksi...</p>
                    </div>

                    {{-- Content --}}
                    <div id="modalContent" class="hidden space-y-6">
                        {{-- Summary Cards --}}
                        <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                            {{-- Basic Info Card --}}
                            <div
                                class="p-6 border shadow-lg bg-gradient-to-br from-blue-50/80 to-indigo-50/80 backdrop-blur-sm border-blue-100/50 rounded-2xl">
                                <h4 class="flex items-center mb-4 text-lg font-bold text-blue-800">
                                    📋 Informasi Prediksi
                                </h4>
                                <div class="space-y-3">
                                    <div class="flex items-center justify-between p-3 rounded-lg bg-white/50">
                                        <span class="font-medium text-gray-600">📅 Tanggal:</span>
                                        <span class="font-bold text-gray-800" id="predictionDate"></span>
                                    </div>
                                    <div class="flex items-center justify-between p-3 rounded-lg bg-white/50">
                                        <span class="font-medium text-gray-600">🩺 Hasil:</span>
                                        <span class="font-bold" id="predictionResult"></span>
                                    </div>
                                    <div class="flex items-center justify-between p-3 rounded-lg bg-white/50">
                                        <span class="font-medium text-gray-600">📊 Probabilitas:</span>
                                        <span class="font-bold text-gray-800" id="predictionProbability"></span>
                                    </div>
                                </div>
                            </div>

                            {{-- Health Recommendations Card --}}
                            <div id="healthRecommendationsBox"
                                class="p-6 border shadow-lg backdrop-blur-sm rounded-2xl">
                                <h4 class="flex items-center mb-4 text-lg font-bold" id="recommendationsTitle">
                                    💡 Rekomendasi Kesehatan
                                </h4>
                                <div id="recommendationsContent" class="space-y-3">
                                    <!-- Dynamic content will be loaded here -->
                                </div>
                            </div>
                        </div>

                        {{-- Risk Factors Section --}}
                        <div
                            class="p-6 border shadow-lg bg-gradient-to-br from-gray-50/80 to-gray-100/80 backdrop-blur-sm border-gray-100/50 rounded-2xl">
                            <h4 class="flex items-center mb-4 text-lg font-bold text-gray-800">
                                ⚡ Faktor Risiko yang Dianalisis
                            </h4>
                            <div id="riskFactorsContent" class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3">
                                <!-- Dynamic content will be loaded here -->
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Modal Footer --}}
                <div class="flex flex-col justify-end gap-3 pt-6 border-t sm:flex-row border-white/30">
                    <button onclick="closePredictionModal()"
                        class="px-6 py-3 font-medium text-gray-700 transition-all duration-300 border shadow-lg bg-gray-200/80 backdrop-blur-sm rounded-xl border-gray-300/50 hover:bg-gray-300/80 hover:shadow-xl">
                        ❌ Tutup
                    </button>
                </div>
            </div>
        </div>

    </div>

    @vite(['resources/js/historyPredictionModal.js'])
</x-app-layout>
