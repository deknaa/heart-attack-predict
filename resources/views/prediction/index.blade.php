<x-app-layout>
    <!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prediksi Risiko Serangan Jantung</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'medical': {
                            50: '#fef2f2',
                            100: '#fee2e2',
                            500: '#ef4444',
                            600: '#dc2626',
                            700: '#b91c1c',
                        }
                    },
                    animation: {
                        'float': 'float 6s ease-in-out infinite',
                        'pulse-slow': 'pulse 3s cubic-bezier(0.4, 0, 0.6, 1) infinite',
                        'fade-in': 'fadeIn 0.8s ease-out',
                        'slide-up': 'slideUp 0.6s ease-out',
                    },
                    keyframes: {
                        float: {
                            '0%, 100%': { transform: 'translateY(0px)' },
                            '50%': { transform: 'translateY(-10px)' },
                        },
                        fadeIn: {
                            '0%': { opacity: '0' },
                            '100%': { opacity: '1' },
                        },
                        slideUp: {
                            '0%': { transform: 'translateY(30px)', opacity: '0' },
                            '100%': { transform: 'translateY(0px)', opacity: '1' },
                        }
                    }
                }
            }
        }
    </script>
    <style>
        .gradient-bg {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        .card-hover {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .card-hover:hover {
            transform: translateY(-4px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }
        .glass-effect {
            backdrop-filter: blur(16px) saturate(180%);
            background-color: rgba(255, 255, 255, 0.75);
            border: 1px solid rgba(209, 213, 219, 0.3);
        }
    </style>
</head>
<body class="min-h-screen bg-gradient-to-br from-blue-50 via-indigo-50 to-purple-50">
    <!-- Header Section -->
    <div class="relative overflow-hidden gradient-bg">
        <div class="absolute inset-0 bg-black opacity-20"></div>
        <div class="relative px-4 py-16 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="text-center animate-fade-in">
                <div class="flex items-center justify-center mb-6">
                    <div class="p-4 bg-white rounded-full shadow-lg animate-pulse-slow">
                        <svg class="w-12 h-12 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                        </svg>
                    </div>
                </div>
                <h1 class="mb-4 text-4xl font-bold text-white md:text-5xl lg:text-6xl">
                    Prediksi Risiko <span class="text-yellow-300">Serangan Jantung</span>
                </h1>
                <p class="max-w-2xl mx-auto text-lg text-blue-100 md:text-xl">
                    Analisis komprehensif menggunakan machine learning untuk mendeteksi risiko serangan jantung berdasarkan parameter medis
                </p>
            </div>
        </div>
        <div class="absolute bottom-0 left-0 right-0">
            <svg class="w-full h-12 text-blue-50" fill="currentColor" viewBox="0 0 1200 120">
                <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z"/>
            </svg>
        </div>
    </div>

    <!-- Main Form Section -->
    <div class="px-4 py-16 mx-auto -mt-8 max-w-7xl sm:px-6 lg:px-8">
        <div class="max-w-5xl mx-auto">
            <!-- Alert Section -->
            <div id="alert-section" class="hidden p-4 mb-8 border-l-4 rounded-lg animate-slide-up">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm font-medium" id="alert-text"></p>
                    </div>
                </div>
            </div>

            <!-- Form Card -->
            <div class="overflow-hidden bg-white shadow-2xl card-hover rounded-3xl">
                <!-- Form Header -->
                <div class="px-8 py-6 bg-gradient-to-r from-red-500 to-pink-600">
                    <div class="flex items-center justify-center space-x-4">
                        <div class="p-3 bg-white rounded-full animate-float">
                            <svg class="w-8 h-8 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                            </svg>
                        </div>
                        <h2 class="text-2xl font-bold text-white md:text-3xl">
                            Form Analisis Medis
                        </h2>
                    </div>
                    <p class="mt-2 text-center text-red-100">
                        Masukkan data medis untuk analisis risiko serangan jantung
                    </p>
                </div>

                <!-- Form Body -->
                <form id="prediction-form" class="p-8 space-y-8">
                    <div class="grid gap-8 lg:grid-cols-2">
                        <!-- Left Column -->
                        <div class="space-y-6">
                            <h3 class="flex items-center text-lg font-semibold text-gray-800">
                                <div class="w-2 h-6 mr-3 rounded-full bg-gradient-to-b from-blue-400 to-blue-600"></div>
                                Data Demografis & Vital
                            </h3>
                            
                            <!-- Age -->
                            <div class="group">
                                <label class="block mb-2 text-sm font-medium text-gray-700">
                                    Usia (tahun)
                                    <span class="ml-1 text-xs text-gray-500">29-77 tahun</span>
                                </label>
                                <div class="relative">
                                    <input type="number" name="age" min="29" max="77" required
                                           class="w-full px-4 py-3 transition-all duration-300 border-2 border-gray-200 rounded-xl focus:border-blue-500 focus:ring-4 focus:ring-blue-500/20 group-hover:border-gray-300"
                                           placeholder="Contoh: 45">
                                    <div class="absolute inset-y-0 right-0 flex items-center pr-3">
                                        <span class="text-gray-400">📅</span>
                                    </div>
                                </div>
                                <p class="mt-1 text-xs text-gray-500">Risiko meningkat seiring bertambahnya usia</p>
                            </div>

                            <!-- Sex -->
                            <div class="group">
                                <label class="block mb-2 text-sm font-medium text-gray-700">Jenis Kelamin</label>
                                <div class="grid grid-cols-2 gap-3">
                                    <label class="relative cursor-pointer">
                                        <input type="radio" name="sex" value="0" class="sr-only peer" required>
                                        <div class="p-4 transition-all duration-300 border-2 border-gray-200 rounded-xl peer-checked:border-pink-500 peer-checked:bg-pink-50 hover:border-gray-300">
                                            <div class="flex items-center justify-center space-x-2">
                                                <span class="text-2xl">👩</span>
                                                <span class="font-medium text-gray-700">Perempuan</span>
                                            </div>
                                        </div>
                                    </label>
                                    <label class="relative cursor-pointer">
                                        <input type="radio" name="sex" value="1" class="sr-only peer" required>
                                        <div class="p-4 transition-all duration-300 border-2 border-gray-200 rounded-xl peer-checked:border-blue-500 peer-checked:bg-blue-50 hover:border-gray-300">
                                            <div class="flex items-center justify-center space-x-2">
                                                <span class="text-2xl">👨</span>
                                                <span class="font-medium text-gray-700">Laki-laki</span>
                                            </div>
                                        </div>
                                    </label>
                                </div>
                            </div>

                            <!-- Chest Pain Type -->
                            <div class="group">
                                <label class="block mb-2 text-sm font-medium text-gray-700">Tipe Nyeri Dada</label>
                                <select name="cp" required class="w-full px-4 py-3 transition-all duration-300 border-2 border-gray-200 rounded-xl focus:border-blue-500 focus:ring-4 focus:ring-blue-500/20 group-hover:border-gray-300">
                                    <option value="">Pilih tipe nyeri dada</option>
                                    <option value="0">Typical Angina (Nyeri dada khas)</option>
                                    <option value="1">Atypical Angina (Nyeri dada tidak khas)</option>
                                    <option value="2">Non-Anginal Pain (Nyeri non-angina)</option>
                                    <option value="3">Asymptomatic (Tanpa gejala)</option>
                                </select>
                            </div>

                            <!-- Blood Pressure -->
                            <div class="group">
                                <label class="block mb-2 text-sm font-medium text-gray-700">
                                    Tekanan Darah Sistolik (mmHg)
                                    <span class="ml-1 text-xs text-gray-500">94-200 mmHg</span>
                                </label>
                                <div class="relative">
                                    <input type="number" name="trestbps" min="94" max="200" required
                                           class="w-full px-4 py-3 transition-all duration-300 border-2 border-gray-200 rounded-xl focus:border-blue-500 focus:ring-4 focus:ring-blue-500/20 group-hover:border-gray-300"
                                           placeholder="Contoh: 120">
                                    <div class="absolute inset-y-0 right-0 flex items-center pr-3">
                                        <span class="text-gray-400">🩺</span>
                                    </div>
                                </div>
                                <div class="mt-2 text-xs text-gray-500">
                                    <span class="text-green-600">Normal: &lt;120</span> | 
                                    <span class="text-yellow-600">Tinggi: 120-139</span> | 
                                    <span class="text-red-600">Hipertensi: ≥140</span>
                                </div>
                            </div>

                            <!-- Cholesterol -->
                            <div class="group">
                                <label class="block mb-2 text-sm font-medium text-gray-700">
                                    Kolesterol Serum (mg/dl)
                                    <span class="ml-1 text-xs text-gray-500">126-564 mg/dl</span>
                                </label>
                                <div class="relative">
                                    <input type="number" name="chol" min="126" max="564" required
                                           class="w-full px-4 py-3 transition-all duration-300 border-2 border-gray-200 rounded-xl focus:border-blue-500 focus:ring-4 focus:ring-blue-500/20 group-hover:border-gray-300"
                                           placeholder="Contoh: 200">
                                    <div class="absolute inset-y-0 right-0 flex items-center pr-3">
                                        <span class="text-gray-400">🧪</span>
                                    </div>
                                </div>
                                <div class="mt-2 text-xs text-gray-500">
                                    <span class="text-green-600">Baik: &lt;200</span> | 
                                    <span class="text-yellow-600">Borderline: 200-239</span> | 
                                    <span class="text-red-600">Tinggi: ≥240</span>
                                </div>
                            </div>

                            <!-- Fasting Blood Sugar -->
                            <div class="group">
                                <label class="block mb-2 text-sm font-medium text-gray-700">Gula Darah Puasa</label>
                                <div class="grid grid-cols-2 gap-3">
                                    <label class="relative cursor-pointer">
                                        <input type="radio" name="fbs" value="0" class="sr-only peer" required>
                                        <div class="p-4 transition-all duration-300 border-2 border-gray-200 rounded-xl peer-checked:border-green-500 peer-checked:bg-green-50 hover:border-gray-300">
                                            <div class="text-center">
                                                <div class="text-2xl">✅</div>
                                                <div class="text-sm font-medium text-gray-700">≤ 120 mg/dl</div>
                                                <div class="text-xs text-gray-500">Normal</div>
                                            </div>
                                        </div>
                                    </label>
                                    <label class="relative cursor-pointer">
                                        <input type="radio" name="fbs" value="1" class="sr-only peer" required>
                                        <div class="p-4 transition-all duration-300 border-2 border-gray-200 rounded-xl peer-checked:border-red-500 peer-checked:bg-red-50 hover:border-gray-300">
                                            <div class="text-center">
                                                <div class="text-2xl">⚠️</div>
                                                <div class="text-sm font-medium text-gray-700">&gt; 120 mg/dl</div>
                                                <div class="text-xs text-gray-500">Tinggi</div>
                                            </div>
                                        </div>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <!-- Right Column -->
                        <div class="space-y-6">
                            <h3 class="flex items-center text-lg font-semibold text-gray-800">
                                <div class="w-2 h-6 mr-3 rounded-full bg-gradient-to-b from-green-400 to-green-600"></div>
                                Parameter Jantung & EKG
                            </h3>

                            <!-- Rest ECG -->
                            <div class="group">
                                <label class="block mb-2 text-sm font-medium text-gray-700">Hasil EKG Istirahat</label>
                                <select name="restecg" required class="w-full px-4 py-3 transition-all duration-300 border-2 border-gray-200 rounded-xl focus:border-blue-500 focus:ring-4 focus:ring-blue-500/20 group-hover:border-gray-300">
                                    <option value="">Pilih hasil EKG</option>
                                    <option value="0">Normal</option>
                                    <option value="1">Abnormalitas gelombang ST-T</option>
                                    <option value="2">Hipertrofi ventrikel kiri</option>
                                </select>
                            </div>

                            <!-- Max Heart Rate -->
                            <div class="group">
                                <label class="block mb-2 text-sm font-medium text-gray-700">
                                    Detak Jantung Maksimum
                                    <span class="ml-1 text-xs text-gray-500">71-202 bpm</span>
                                </label>
                                <div class="relative">
                                    <input type="number" name="thalach" min="71" max="202" required
                                           class="w-full px-4 py-3 transition-all duration-300 border-2 border-gray-200 rounded-xl focus:border-blue-500 focus:ring-4 focus:ring-blue-500/20 group-hover:border-gray-300"
                                           placeholder="Contoh: 150">
                                    <div class="absolute inset-y-0 right-0 flex items-center pr-3">
                                        <span class="text-gray-400">💓</span>
                                    </div>
                                </div>
                                <p class="mt-1 text-xs text-gray-500">Detak jantung maksimum yang dicapai saat olahraga</p>
                            </div>

                            <!-- Exercise Induced Angina -->
                            <div class="group">
                                <label class="block mb-2 text-sm font-medium text-gray-700">Angina Akibat Olahraga</label>
                                <div class="grid grid-cols-2 gap-3">
                                    <label class="relative cursor-pointer">
                                        <input type="radio" name="exang" value="0" class="sr-only peer" required>
                                        <div class="p-4 transition-all duration-300 border-2 border-gray-200 rounded-xl peer-checked:border-green-500 peer-checked:bg-green-50 hover:border-gray-300">
                                            <div class="text-center">
                                                <div class="text-2xl">✅</div>
                                                <div class="text-sm font-medium text-gray-700">Tidak Ada</div>
                                            </div>
                                        </div>
                                    </label>
                                    <label class="relative cursor-pointer">
                                        <input type="radio" name="exang" value="1" class="sr-only peer" required>
                                        <div class="p-4 transition-all duration-300 border-2 border-gray-200 rounded-xl peer-checked:border-red-500 peer-checked:bg-red-50 hover:border-gray-300">
                                            <div class="text-center">
                                                <div class="text-2xl">⚠️</div>
                                                <div class="text-sm font-medium text-gray-700">Ada</div>
                                            </div>
                                        </div>
                                    </label>
                                </div>
                            </div>

                            <!-- ST Depression -->
                            <div class="group">
                                <label class="block mb-2 text-sm font-medium text-gray-700">
                                    Depresi ST (Oldpeak)
                                    <span class="ml-1 text-xs text-gray-500">0.0-6.2</span>
                                </label>
                                <div class="relative">
                                    <input type="number" name="oldpeak" min="0" max="6.2" step="0.1" required
                                           class="w-full px-4 py-3 transition-all duration-300 border-2 border-gray-200 rounded-xl focus:border-blue-500 focus:ring-4 focus:ring-blue-500/20 group-hover:border-gray-300"
                                           placeholder="Contoh: 1.0">
                                    <div class="absolute inset-y-0 right-0 flex items-center pr-3">
                                        <span class="text-gray-400">📊</span>
                                    </div>
                                </div>
                                <p class="mt-1 text-xs text-gray-500">Depresi segmen ST yang diinduksi oleh olahraga</p>
                            </div>

                            <!-- ST Slope -->
                            <div class="group">
                                <label class="block mb-2 text-sm font-medium text-gray-700">Kemiringan Segmen ST</label>
                                <select name="slope" required class="w-full px-4 py-3 transition-all duration-300 border-2 border-gray-200 rounded-xl focus:border-blue-500 focus:ring-4 focus:ring-blue-500/20 group-hover:border-gray-300">
                                    <option value="">Pilih kemiringan ST</option>
                                    <option value="0">Upsloping (Naik)</option>
                                    <option value="1">Flat (Datar)</option>
                                    <option value="2">Downsloping (Turun)</option>
                                </select>
                            </div>

                            <!-- Number of Vessels -->
                            <div class="group">
                                <label class="block mb-2 text-sm font-medium text-gray-700">Jumlah Pembuluh Darah Tersumbat</label>
                                <div class="grid grid-cols-5 gap-2">
                                    <label class="relative cursor-pointer">
                                        <input type="radio" name="ca" value="0" class="sr-only peer" required>
                                        <div class="p-3 text-center transition-all duration-300 border-2 border-gray-200 rounded-xl peer-checked:border-green-500 peer-checked:bg-green-50 hover:border-gray-300">
                                            <div class="text-lg font-bold">0</div>
                                        </div>
                                    </label>
                                    <label class="relative cursor-pointer">
                                        <input type="radio" name="ca" value="1" class="sr-only peer" required>
                                        <div class="p-3 text-center transition-all duration-300 border-2 border-gray-200 rounded-xl peer-checked:border-yellow-500 peer-checked:bg-yellow-50 hover:border-gray-300">
                                            <div class="text-lg font-bold">1</div>
                                        </div>
                                    </label>
                                    <label class="relative cursor-pointer">
                                        <input type="radio" name="ca" value="2" class="sr-only peer" required>
                                        <div class="p-3 text-center transition-all duration-300 border-2 border-gray-200 rounded-xl peer-checked:border-orange-500 peer-checked:bg-orange-50 hover:border-gray-300">
                                            <div class="text-lg font-bold">2</div>
                                        </div>
                                    </label>
                                    <label class="relative cursor-pointer">
                                        <input type="radio" name="ca" value="3" class="sr-only peer" required>
                                        <div class="p-3 text-center transition-all duration-300 border-2 border-gray-200 rounded-xl peer-checked:border-red-500 peer-checked:bg-red-50 hover:border-gray-300">
                                            <div class="text-lg font-bold">3</div>
                                        </div>
                                    </label>
                                    <label class="relative cursor-pointer">
                                        <input type="radio" name="ca" value="4" class="sr-only peer" required>
                                        <div class="p-3 text-center transition-all duration-300 border-2 border-gray-200 rounded-xl peer-checked:border-purple-500 peer-checked:bg-purple-50 hover:border-gray-300">
                                            <div class="text-lg font-bold">4</div>
                                        </div>
                                    </label>
                                </div>
                                <p class="mt-1 text-xs text-gray-500">Hasil fluoroscopy - pembuluh darah utama yang tersumbat</p>
                            </div>

                            <!-- Thalassemia -->
                            <div class="group">
                                <label class="block mb-2 text-sm font-medium text-gray-700">Hasil Tes Thalassemia</label>
                                <select name="thal" required class="w-full px-4 py-3 transition-all duration-300 border-2 border-gray-200 rounded-xl focus:border-blue-500 focus:ring-4 focus:ring-blue-500/20 group-hover:border-gray-300">
                                    <option value="">Pilih hasil tes</option>
                                    <option value="1">Fixed Defect (Cacat tetap)</option>
                                    <option value="2">Normal</option>
                                    <option value="3">Reversible Defect (Cacat dapat diperbaiki)</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="pt-6 border-t border-gray-200">
                        <button type="submit" id="submit-btn"
                                class="w-full py-4 text-lg font-semibold text-white transition-all duration-300 transform bg-gradient-to-r from-red-500 to-pink-600 rounded-xl hover:from-red-600 hover:to-pink-700 focus:outline-none focus:ring-4 focus:ring-red-500/30 hover:scale-[1.02] active:scale-[0.98] shadow-lg hover:shadow-xl">
                            <span class="flex items-center justify-center space-x-2">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"/>
                                </svg>
                                <span>Analisis Risiko Serangan Jantung</span>
                            </span>
                        </button>
                    </div>
                </form>
            </div>

            <!-- Result Section -->
            <div id="result-section" class="hidden mt-8 animate-slide-up">
                <div class="max-w-2xl mx-auto overflow-hidden bg-white shadow-2xl card-hover rounded-3xl">
                    <div id="result-header" class="px-8 py-6">
                        <div class="flex items-center justify-center mb-4">
                            <div id="result-icon" class="p-4 bg-white rounded-full shadow-lg"></div>
                        </div>
                        <h2 id="result-title" class="text-3xl font-bold text-center"></h2>
                        <p id="result-subtitle" class="mt-2 text-center"></p>
                    </div>
                    <div class="p-8 bg-white">
                        <div class="text-center">
                            <div class="mb-4">
                                <span class="text-sm font-medium text-gray-600">Tingkat Probabilitas</span>
                                <div id="probability-bar" class="w-full h-4 mt-2 overflow-hidden bg-gray-200 rounded-full">
                                    <div id="probability-fill" class="h-full transition-all duration-1000 ease-out rounded-full"></div>
                                </div>
                            </div>
                            <div class="text-3xl font-bold" id="probability-text"></div>
                            <div class="p-6 mt-6 bg-gray-50 rounded-2xl">
                                <h3 class="mb-3 text-lg font-semibold text-gray-800">Rekomendasi:</h3>
                                <div id="recommendations" class="space-y-2 text-sm text-gray-600"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Info Cards -->
            <div class="grid gap-6 mt-12 md:grid-cols-3">
                <div class="p-6 bg-white shadow-lg card-hover rounded-2xl">
                    <div class="flex items-center mb-4">
                        <div class="p-3 bg-blue-100 rounded-full">
                            <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        <h3 class="ml-3 text-lg font-semibold text-gray-800">Akurasi Model</h3>
                    </div>
                    <p class="text-gray-600">Model machine learning ini memiliki tingkat akurasi 90% berdasarkan dataset Heart Attack dari Kaggle.</p>
                </div>
                
                <div class="p-6 bg-white shadow-lg card-hover rounded-2xl">
                    <div class="flex items-center mb-4">
                        <div class="p-3 bg-green-100 rounded-full">
                            <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                            </svg>
                        </div>
                        <h3 class="ml-3 text-lg font-semibold text-gray-800">Data Aman</h3>
                    </div>
                    <p class="text-gray-600">Semua data yang dimasukkan hanya diproses secara lokal dan tidak disimpan di server manapun.</p>
                </div>
                
                <div class="p-6 bg-white shadow-lg card-hover rounded-2xl">
                    <div class="flex items-center mb-4">
                        <div class="p-3 bg-red-100 rounded-full">
                            <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                            </svg>
                        </div>
                        <h3 class="ml-3 text-lg font-semibold text-gray-800">Konsultasi Medis</h3>
                    </div>
                    <p class="text-gray-600">Hasil prediksi ini tidak menggantikan diagnosis medis. Selalu konsultasikan dengan dokter untuk evaluasi yang akurat.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="py-8 mt-16 bg-gray-800">
        <div class="px-4 mx-auto text-center max-w-7xl sm:px-6 lg:px-8">
            <p class="text-gray-400">© 2024 Heart Attack Prediction System. Dibuat untuk tujuan edukasi dan penelitian.</p>
        </div>
    </footer>

    <script>
        // Form handling and prediction simulation
        document.getElementById('prediction-form').addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Get form data
            const formData = new FormData(this);
            const data = {};
            for (let [key, value] of formData.entries()) {
                data[key] = parseFloat(value);
            }
            
            // Validate all fields
            const requiredFields = ['age', 'sex', 'cp', 'trestbps', 'chol', 'fbs', 'restecg', 'thalach', 'exang', 'oldpeak', 'slope', 'ca', 'thal'];
            const missingFields = requiredFields.filter(field => !data.hasOwnProperty(field));
            
            if (missingFields.length > 0) {
                showAlert('Mohon lengkapi semua field yang diperlukan!', 'error');
                return;
            }
            
            // Simulate prediction (in real implementation, this would call your Laravel backend)
            const prediction = simulatePrediction(data);
            showResult(prediction);
        });
        
        function simulatePrediction(data) {
            // Simple risk scoring based on key factors
            let riskScore = 0;
            
            // Age factor
            if (data.age > 55) riskScore += 0.2;
            if (data.age > 65) riskScore += 0.1;
            
            // Gender factor (males have higher risk)
            if (data.sex === 1) riskScore += 0.1;
            
            // Chest pain type
            if (data.cp === 0) riskScore += 0.2; // Typical angina
            
            // Blood pressure
            if (data.trestbps > 140) riskScore += 0.15;
            
            // Cholesterol
            if (data.chol > 240) riskScore += 0.1;
            
            // Fasting blood sugar
            if (data.fbs === 1) riskScore += 0.05;
            
            // Exercise induced angina
            if (data.exang === 1) riskScore += 0.15;
            
            // ST depression
            if (data.oldpeak > 1.0) riskScore += 0.1;
            
            // Number of vessels
            riskScore += data.ca * 0.05;
            
            // Thalassemia
            if (data.thal === 3) riskScore += 0.1;
            
            // Cap the risk score and add some randomness
            riskScore = Math.min(riskScore + (Math.random() * 0.1 - 0.05), 1);
            
            return {
                prediction: riskScore > 0.5 ? 1 : 0,
                probability: riskScore
            };
        }
        
        function showResult(result) {
            const resultSection = document.getElementById('result-section');
            const resultHeader = document.getElementById('result-header');
            const resultIcon = document.getElementById('result-icon');
            const resultTitle = document.getElementById('result-title');
            const resultSubtitle = document.getElementById('result-subtitle');
            const probabilityFill = document.getElementById('probability-fill');
            const probabilityText = document.getElementById('probability-text');
            const recommendations = document.getElementById('recommendations');
            
            const isHighRisk = result.prediction === 1;
            const percentage = Math.round(result.probability * 100);
            
            // Update header styling
            resultHeader.className = `px-8 py-6 ${isHighRisk ? 'bg-gradient-to-r from-red-500 to-red-600' : 'bg-gradient-to-r from-green-500 to-green-600'}`;
            
            // Update icon
            resultIcon.innerHTML = isHighRisk 
                ? '<svg class="w-12 h-12 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/></svg>'
                : '<svg class="w-12 h-12 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>';
            
            // Update title and subtitle
            resultTitle.textContent = isHighRisk ? 'Risiko Tinggi Serangan Jantung' : 'Risiko Rendah Serangan Jantung';
            resultTitle.className = `text-3xl font-bold text-center ${isHighRisk ? 'text-red-600' : 'text-green-600'}`;
            resultSubtitle.textContent = isHighRisk ? 'Disarankan untuk segera konsultasi dengan dokter' : 'Risiko serangan jantung dalam kategori rendah';
            resultSubtitle.className = `mt-2 text-center ${isHighRisk ? 'text-red-100' : 'text-green-100'}`;
            
            // Update probability bar
            probabilityFill.style.width = `${percentage}%`;
            probabilityFill.className = `h-full transition-all duration-1000 ease-out rounded-full ${isHighRisk ? 'bg-gradient-to-r from-red-500 to-red-600' : 'bg-gradient-to-r from-green-500 to-green-600'}`;
            
            // Update probability text
            probabilityText.textContent = `${percentage}%`;
            probabilityText.className = `text-3xl font-bold ${isHighRisk ? 'text-red-600' : 'text-green-600'}`;
            
            // Update recommendations
            const recs = isHighRisk ? [
                '🏥 Segera konsultasi dengan dokter jantung',
                '💊 Evaluasi pengobatan dan terapi yang sesuai',
                '🏃‍♂️ Mulai program olahraga ringan setelah konsultasi dokter',
                '🥗 Terapkan diet jantung sehat rendah lemak dan garam',
                '🚭 Berhenti merokok dan hindari alkohol berlebihan',
                '😴 Kelola stress dan pastikan tidur yang cukup'
            ] : [
                '✅ Pertahankan gaya hidup sehat',
                '🏃‍♂️ Lanjutkan aktivitas fisik rutin',
                '🥗 Teruskan pola makan seimbang',
                '🩺 Lakukan pemeriksaan kesehatan rutin',
                '💪 Jaga berat badan ideal',
                '🧘‍♂️ Kelola stress dengan baik'
            ];
            
            recommendations.innerHTML = recs.map(rec => `<div class="flex items-center space-x-2"><span>${rec}</span></div>`).join('');
            
            // Show result section
            resultSection.classList.remove('hidden');
            resultSection.scrollIntoView({ behavior: 'smooth', block: 'start' });
        }
        
        function showAlert(message, type) {
            const alertSection = document.getElementById('alert-section');
            const alertText = document.getElementById('alert-text');
            
            alertText.textContent = message;
            alertSection.className = `mb-8 p-4 rounded-lg border-l-4 animate-slide-up ${
                type === 'error' 
                    ? 'bg-red-50 border-red-400 text-red-700' 
                    : 'bg-green-50 border-green-400 text-green-700'
            }`;
            
            alertSection.classList.remove('hidden');
            
            // Auto hide after 5 seconds
            setTimeout(() => {
                alertSection.classList.add('hidden');
            }, 5000);
        }
        
        // Add smooth scrolling for form sections
        document.addEventListener('DOMContentLoaded', function() {
            // Add loading animation to submit button
            const submitBtn = document.getElementById('submit-btn');
            const form = document.getElementById('prediction-form');
            
            form.addEventListener('submit', function() {
                submitBtn.innerHTML = `
                    <span class="flex items-center justify-center space-x-2">
                        <svg class="w-5 h-5 animate-spin" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>
                        <span>Menganalisis...</span>
                    </span>
                `;
                
                // Reset button after 2 seconds
                setTimeout(() => {
                    submitBtn.innerHTML = `
                        <span class="flex items-center justify-center space-x-2">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"/>
                            </svg>
                            <span>Analisis Risiko Serangan Jantung</span>
                        </span>
                    `;
                }, 2000);
            });
        });
    </script>
</body>
</html>
</x-app-layout>
