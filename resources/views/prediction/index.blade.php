<x-app-layout>
    <div class="py-12">
        <div class="mx-auto mt-20 max-w-7xl sm:px-6 lg:px-8">
            {{-- Quotes --}}
            <blockquote class="text-xl italic font-semibold text-gray-900 dark:text-white">
                <svg class="w-8 h-8 mb-4 text-gray-400 dark:text-gray-600" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 14">
                    <path
                        d="M6 0H2a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2h4v1a3 3 0 0 1-3 3H2a1 1 0 0 0 0 2h1a5.006 5.006 0 0 0 5-5V2a2 2 0 0 0-2-2Zm10 0h-4a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2h4v1a3 3 0 0 1-3 3h-1a1 1 0 0 0 0 2h1a5.006 5.006 0 0 0 5-5V2a2 2 0 0 0-2-2Z" />
                </svg>
                {{-- <p>"{{ $quotes->quotes }}" - {{ $quotes->author }} --}}
                </p>
            </blockquote>

            @if(session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            {{-- Input Data --}}
            <div class="min-h-screen px-4 py-12 bg-gradient-to-br from-blue-50 to-blue-100 sm:px-6 lg:px-8">
                <div class="max-w-4xl mx-auto overflow-hidden bg-white shadow-2xl rounded-xl">
                    <div class="p-6 bg-gradient-to-r from-blue-500 to-blue-600">
                        <h2 class="flex items-center justify-center gap-4 text-3xl font-extrabold text-center text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                            </svg>
                            Prediksi Risiko Serangan Jantung
                        </h2>
                    </div>
            
                    @if(session('error'))
                        <div class="relative px-4 py-3 m-4 text-red-700 bg-red-100 border border-red-400 rounded" role="alert">
                            <span class="block sm:inline">{{ session('error') }}</span>
                        </div>
                    @endif
            
                    <form action="{{ url('/predict') }}" method="POST" class="p-8 space-y-6">
                        @csrf
                        <div class="grid gap-6 md:grid-cols-2">
                            <div class="space-y-4">
                                <div>
                                    <label class="block mb-2 text-sm font-medium text-gray-700">Usia</label>
                                    <input 
                                        type="number" 
                                        name="age" 
                                        class="w-full px-3 py-2 transition duration-200 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" 
                                        required
                                    >
                                </div>
            
                                <div>
                                    <label class="block mb-2 text-sm font-medium text-gray-700">
                                        Jenis Kelamin (0: Perempuan, 1: Laki-laki)
                                    </label>
                                    <input 
                                        type="number" 
                                        name="sex" 
                                        class="w-full px-3 py-2 transition duration-200 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" 
                                        required
                                    >
                                </div>
            
                                <div>
                                    <label class="block mb-2 text-sm font-medium text-gray-700">
                                        Tipe Nyeri Dada (0-3)
                                    </label>
                                    <input 
                                        type="number" 
                                        name="cp" 
                                        class="w-full px-3 py-2 transition duration-200 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" 
                                        required
                                    >
                                </div>
            
                                <div>
                                    <label class="block mb-2 text-sm font-medium text-gray-700">
                                        Tekanan Darah
                                    </label>
                                    <input 
                                        type="number" 
                                        name="trestbps" 
                                        class="w-full px-3 py-2 transition duration-200 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" 
                                        required
                                    >
                                </div>
            
                                <div>
                                    <label class="block mb-2 text-sm font-medium text-gray-700">
                                        Kolesterol
                                    </label>
                                    <input 
                                        type="number" 
                                        name="chol" 
                                        class="w-full px-3 py-2 transition duration-200 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" 
                                        required
                                    >
                                </div>
            
                                <div>
                                    <label class="block mb-2 text-sm font-medium text-gray-700">
                                        Gula Darah Puasa (0: Tidak, 1: Ya)
                                    </label>
                                    <input 
                                        type="number" 
                                        name="fbs" 
                                        class="w-full px-3 py-2 transition duration-200 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" 
                                        required
                                    >
                                </div>
            
                                <div>
                                    <label class="block mb-2 text-sm font-medium text-gray-700">
                                        Hasil Elektrokardiografi (0-2)
                                    </label>
                                    <input 
                                        type="number" 
                                        name="restecg" 
                                        class="w-full px-3 py-2 transition duration-200 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" 
                                        required
                                    >
                                </div>
                            </div>
            
                            <div class="space-y-4">
                                <div>
                                    <label class="block mb-2 text-sm font-medium text-gray-700">
                                        Detak Jantung Maksimum
                                    </label>
                                    <input 
                                        type="number" 
                                        name="thalach" 
                                        class="w-full px-3 py-2 transition duration-200 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" 
                                        required
                                    >
                                </div>
            
                                <div>
                                    <label class="block mb-2 text-sm font-medium text-gray-700">
                                        Angina Induksi Latihan (0: Tidak, 1: Ya)
                                    </label>
                                    <input 
                                        type="number" 
                                        name="exang" 
                                        class="w-full px-3 py-2 transition duration-200 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" 
                                        required
                                    >
                                </div>
            
                                <div>
                                    <label class="block mb-2 text-sm font-medium text-gray-700">
                                        Depresi ST
                                    </label>
                                    <input 
                                        type="number" 
                                        step="0.1" 
                                        name="oldpeak" 
                                        class="w-full px-3 py-2 transition duration-200 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" 
                                        required
                                    >
                                </div>
            
                                <div>
                                    <label class="block mb-2 text-sm font-medium text-gray-700">
                                        Kemiringan Segmen ST (0-2)
                                    </label>
                                    <input 
                                        type="number" 
                                        name="slope" 
                                        class="w-full px-3 py-2 transition duration-200 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" 
                                        required
                                    >
                                </div>
            
                                <div>
                                    <label class="block mb-2 text-sm font-medium text-gray-700">
                                        Jumlah Pembuluh Darah yang Ditemukan (0-4)
                                    </label>
                                    <input 
                                        type="number" 
                                        name="ca" 
                                        class="w-full px-3 py-2 transition duration-200 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" 
                                        required
                                    >
                                </div>
            
                                <div>
                                    <label class="block mb-2 text-sm font-medium text-gray-700">
                                        Hasil Tes Thalassemia (0-3)
                                    </label>
                                    <input 
                                        type="number" 
                                        name="thal" 
                                        class="w-full px-3 py-2 transition duration-200 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" 
                                        required
                                    >
                                </div>
                            </div>
                        </div>
            
                        <div class="mt-6">
                            <button 
                                type="submit" 
                                class="w-full py-3 text-white transition duration-300 ease-in-out transform bg-blue-600 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 hover:scale-105"
                            >
                                Prediksi Risiko
                            </button>
                        </div>
                    </form>
            
                    @if(isset($result))
                        <div class="p-8 border-t bg-gray-50">
                            <div class="max-w-xl mx-auto overflow-hidden bg-white rounded-lg shadow-lg">
                                <div class="px-6 py-4 {{ $result['prediction'] == 1 ? 'bg-red-100' : 'bg-green-100' }}">
                                    <div class="flex items-center justify-center mb-4">
                                        @if($result['prediction'] == 1)
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                                            </svg>
                                        @else
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                        @endif
                                    </div>
                                    <h2 class="text-2xl font-bold text-center {{ $result['prediction'] == 1 ? 'text-red-600' : 'text-green-600' }}">
                                        {{ $result['prediction'] == 1 ? 'Berisiko Serangan Jantung' : 'Tidak Berisiko Serangan Jantung' }}
                                    </h2>
                                </div>
                                <div class="p-6 bg-white">
                                    <p class="text-lg text-center text-gray-700">
                                        <strong>Probabilitas:</strong> 
                                        <span class="{{ $result['prediction'] == 1 ? 'text-red-600' : 'text-green-600' }} font-bold">
                                            {{ number_format($result['probability'] * 100, 2) }}%
                                        </span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        
        </div>
    </div>
</x-app-layout>
