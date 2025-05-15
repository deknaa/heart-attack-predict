<x-app-layout>
    <div class="container px-4 py-10 m-10 mx-auto">
        <div class="overflow-hidden bg-white rounded-lg shadow-lg">
            <div class="flex items-center justify-between px-6 py-4 border-b border-gray-200 bg-gray-50">
                <h2 class="text-2xl font-semibold text-gray-800">History Prediksi Anda</h2>
                <div class="flex items-center space-x-3">
                    <a href="{{ url('export/excel/predictions') }}" class="text-gray-600 transition-colors hover:text-gray-900">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                        </svg>
                    </a>
                </div>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-gray-100 border-b border-gray-200">
                        <tr>
                            <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">#
                            </th>
                            <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                Tanggal</th>
                            <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                Input Data</th>
                            <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                Hasil Prediksi</th>
                            <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                Probabilitas</th>
                            <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                AKSI</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse ($predictions as $index => $prediction)
                            <tr class="transition-colors hover:bg-gray-50">
                                <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">
                                    {{ $index + 1 }}
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-900 whitespace-nowrap">
                                    {{ $prediction->created_at->format('d M Y, H:i') }}
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-500">
                                    <div class="p-2 overflow-auto bg-gray-100 rounded-md max-h-20">
                                        <pre class="text-xs">{{ json_encode($prediction->input_data, JSON_PRETTY_PRINT) }}</pre>
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-sm whitespace-nowrap">
                                    <span class="inline-flex px-2 py-1 text-xs font-semibold leading-5 rounded-full">
                                        @if ($prediction->prediction_result == 1)
                                            <span class="p-2 text-red-800 bg-red-100 rounded">Berisiko Serangan
                                                Jantung</span>
                                        @else
                                            <span class="p-2 text-green-800 bg-green-100 rounded">Tidak Berisiko
                                                Serangan Jantung</span>
                                        @endif
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-900 whitespace-nowrap">
                                    {{ $prediction->probability }}%
                                </td>
                                <td class="flex items-center gap-5 px-6 py-4 text-sm font-medium whitespace-nowrap">
                                    <div class="flex space-x-2">
                                        <button class="text-blue-600 transition-colors hover:text-blue-900"  
                                            onclick="openPredictionModal({{ $prediction->id }})">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20"
                                                fill="currentColor">
                                                <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                                                <path fill-rule="evenodd"
                                                    d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </button>
                                    </div>
                                    <a href="{{ route('pdf.download', $prediction->id) }}" onclick="downloadReport()" class="px-4 py-2 text-white bg-green-600 rounded-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500">
                                        <div class="flex items-center justify-center space-x-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                                            </svg>
                                            <span>Download Laporan</span>
                                        </div>
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-6 py-4 text-center text-gray-500">
                                    Tidak ada history prediksi
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- Predicition Modal --}}
    <div id="predictionModal" class="fixed inset-0 z-50 flex items-start justify-center hidden overflow-y-auto bg-black bg-opacity-50">
        <div class="w-full max-w-4xl p-4 mx-4 my-8 transition-all duration-300 transform scale-95 bg-white rounded-lg shadow-xl opacity-0 sm:p-6" id="modalContainer">
            <div class="flex items-start justify-between mb-4">
                <h3 class="text-xl font-bold text-gray-900" id="modalTitle">Detail Prediksi</h3>
                <button onclick="closePredictionModal()" class="text-gray-400 hover:text-gray-500 focus:outline-none">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
            
            <div class="py-4 border-t border-b border-gray-200">
                <div class="grid grid-cols-1 gap-6">
                    <div id="modalLoading" class="flex items-center justify-center col-span-1 py-12">
                        <svg class="w-8 h-8 text-blue-600 animate-spin" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>
                    </div>
                    
                    <div id="modalContent" class="hidden">
                        <div class="grid grid-cols-1 gap-4 mb-6 lg:grid-cols-2">
                            {{-- Basic Info --}}
                            <div class="w-full">
                                <div class="p-4 mb-4 rounded-lg bg-gray-50">
                                    <h4 class="mb-2 text-lg font-medium text-gray-800">Informasi Prediksi</h4>
                                    <div class="space-y-2">
                                        <div class="flex justify-between">
                                            <span class="text-gray-600">Tanggal:</span>
                                            <span class="font-medium text-gray-800" id="predictionDate"></span>
                                        </div>
                                        <div class="flex justify-between">
                                            <span class="text-gray-600">Hasil:</span>
                                            <span class="font-medium" id="predictionResult"></span>
                                        </div>
                                        <div class="flex justify-between">
                                            <span class="text-gray-600">Probabilitas:</span>
                                            <span class="font-medium text-gray-800" id="predictionProbability"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            {{-- Health Recommendations --}}
                            <div class="w-full">
                                <div id="healthRecommendationsBox" class="p-4 rounded-lg">
                                    <h4 class="mb-2 text-lg font-medium" id="recommendationsTitle">Rekomendasi Kesehatan</h4>
                                    <div id="recommendationsContent" class="space-y-3">
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        {{-- Risk Factors --}}
                        <div>
                            <h4 class="mb-2 text-lg font-medium text-gray-800">Faktor Risiko</h4>
                            <div class="p-4 rounded-lg bg-gray-50">
                                <div id="riskFactorsContent" class="grid grid-cols-1 gap-3 sm:grid-cols-2 md:grid-cols-3">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="flex flex-col justify-end gap-3 pt-4 sm:flex-row">
                <button onclick="closePredictionModal()" class="px-4 py-2 text-gray-700 bg-gray-200 rounded-md hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-400">
                    Tutup
                </button>
            </div>
        </div>
    </div>
    @vite(['resources/js/historyPredictionModal.js'])
</x-app-layout>
