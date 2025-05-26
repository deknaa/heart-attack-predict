<x-app-layout>

    <body class="min-h-screen bg-gradient-to-br from-blue-50 via-indigo-50 to-purple-50">
        <div class="px-4 py-16 mx-auto mt-10 max-w-7xl sm:px-6 lg:px-8">
            <div class="max-w-5xl mx-auto">
                {{-- Alert Section --}}
                <div id="alert-section" class="hidden p-4 mb-8 border-l-4 rounded-lg animate-slide-up">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm font-medium" id="alert-text"></p>
                        </div>
                    </div>
                </div>

                @if (session('error'))
                    <div class="relative px-4 py-3 m-4 text-red-700 bg-red-100 border border-red-400 rounded"
                        role="alert">
                        <span class="block sm:inline">{{ session('error') }}</span>
                    </div>
                @endif

                {{-- Form Card --}}
                <div class="overflow-hidden bg-white shadow-2xl card-hover rounded-3xl">
                    <div class="px-8 py-6 bg-gradient-to-r from-red-500 to-pink-600">
                        <div class="flex items-center justify-center space-x-4">
                            <div class="p-3 bg-white rounded-full animate-float">
                                <svg class="w-8 h-8 text-red-500" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
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

                    <form action="{{ url('/predict') }}" method="POST" id="prediction-form" class="p-8 space-y-8">
                        @csrf
                        <div class="grid gap-8 lg:grid-cols-2">
                            <div class="space-y-6">
                                <h3 class="flex items-center text-lg font-semibold text-gray-800">
                                    <div class="w-2 h-6 mr-3 rounded-full bg-gradient-to-b from-blue-400 to-blue-600">
                                    </div>
                                    Data Demografis & Vital
                                </h3>

                                <!-- Age -->
                                <div class="group">
                                    <label class="block mb-2 text-sm font-medium text-gray-700">
                                        Usia (tahun)
                                        <span class="ml-1 text-xs text-gray-500">29-77 tahun</span>
                                    </label>
                                    <div class="relative">
                                        <input type="number" name="age" min="29" max="77"
                                            value="{{ old('age', $inputData['age'] ?? '') }}" required
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
                                            <input type="radio" name="sex" value="0"
                                                {{ old('sex', $inputData['sex'] ?? '') == 0 ? 'checked' : '' }}
                                                class="sr-only peer" required>
                                            <div
                                                class="p-4 transition-all duration-300 border-2 border-gray-200 rounded-xl peer-checked:border-pink-500 peer-checked:bg-pink-50 hover:border-gray-300">
                                                <div class="flex items-center justify-center space-x-2">
                                                    <span class="text-2xl">👩</span>
                                                    <span class="font-medium text-gray-700">Perempuan</span>
                                                </div>
                                            </div>
                                        </label>
                                        <label class="relative cursor-pointer">
                                            <input type="radio" name="sex" value="1"
                                                {{ old('sex', $inputData['sex'] ?? '') == 1 ? 'checked' : '' }}
                                                class="sr-only peer" required>
                                            <div
                                                class="p-4 transition-all duration-300 border-2 border-gray-200 rounded-xl peer-checked:border-blue-500 peer-checked:bg-blue-50 hover:border-gray-300">
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
                                    <select name="cp" required
                                        class="w-full px-4 py-3 transition-all duration-300 border-2 border-gray-200 rounded-xl focus:border-blue-500 focus:ring-4 focus:ring-blue-500/20 group-hover:border-gray-300">
                                        <option value="">Pilih tipe nyeri dada</option>
                                        <option value="0"
                                            {{ old('cp', $inputData['cp'] ?? '') == 0 ? 'selected' : '' }}>Typical
                                            Angina (Nyeri dada khas)</option>
                                        <option value="1"
                                            {{ old('cp', $inputData['cp'] ?? '') == 1 ? 'selected' : '' }}>Atypical
                                            Angina (Nyeri dada tidak khas)</option>
                                        <option value="2"
                                            {{ old('cp', $inputData['cp'] ?? '') == 2 ? 'selected' : '' }}>Non-Anginal
                                            Pain (Nyeri non-angina)</option>
                                        <option value="3"
                                            {{ old('cp', $inputData['cp'] ?? '') == 3 ? 'selected' : '' }}>Asymptomatic
                                            (Tanpa gejala)</option>
                                    </select>
                                </div>

                                <!-- Blood Pressure -->
                                <div class="group">
                                    <label class="block mb-2 text-sm font-medium text-gray-700">
                                        Tekanan Darah Sistolik (mmHg)
                                        <span class="ml-1 text-xs text-gray-500">94-200 mmHg</span>
                                    </label>
                                    <div class="relative">
                                        <input type="number" name="trestbps" min="94" max="200"
                                            value="{{ old('trestbps', $inputData['trestbps'] ?? '') }}" required
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
                                        <input type="number" name="chol" min="126" max="564"
                                            value="{{ old('chol', $inputData['chol'] ?? '') }}" required
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
                                    <label class="block mb-2 text-sm font-medium text-gray-700">Gula Darah
                                        Puasa</label>
                                    <div class="grid grid-cols-2 gap-3">
                                        <label class="relative cursor-pointer">
                                            <input type="radio" name="fbs" value="0"
                                                {{ old('fbs', $inputData['fbs'] ?? '') == 0 ? 'checked' : '' }}
                                                class="sr-only peer" required>
                                            <div
                                                class="p-4 transition-all duration-300 border-2 border-gray-200 rounded-xl peer-checked:border-green-500 peer-checked:bg-green-50 hover:border-gray-300">
                                                <div class="text-center">
                                                    <div class="text-2xl">✅</div>
                                                    <div class="text-sm font-medium text-gray-700">≤ 120 mg/dl</div>
                                                    <div class="text-xs text-gray-500">Normal</div>
                                                </div>
                                            </div>
                                        </label>
                                        <label class="relative cursor-pointer">
                                            <input type="radio" name="fbs" value="1" value="1"
                                                {{ old('fbs', $inputData['fbs'] ?? '') == 1 ? 'checked' : '' }}
                                                class="sr-only peer" required>
                                            <div
                                                class="p-4 transition-all duration-300 border-2 border-gray-200 rounded-xl peer-checked:border-red-500 peer-checked:bg-red-50 hover:border-gray-300">
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
                                    <div
                                        class="w-2 h-6 mr-3 rounded-full bg-gradient-to-b from-green-400 to-green-600">
                                    </div>
                                    Parameter Jantung & EKG
                                </h3>

                                <!-- Rest ECG -->
                                <div class="group">
                                    <label class="block mb-2 text-sm font-medium text-gray-700">Hasil EKG
                                        Istirahat</label>
                                    <select name="restecg" required
                                        class="w-full px-4 py-3 transition-all duration-300 border-2 border-gray-200 rounded-xl focus:border-blue-500 focus:ring-4 focus:ring-blue-500/20 group-hover:border-gray-300">
                                        <option value="">Pilih hasil EKG</option>
                                        <option value="0"
                                            {{ old('restecg', $inputData['restecg'] ?? '') == 0 ? 'selected' : '' }}>
                                            Normal</option>
                                        <option value="1"
                                            {{ old('restecg', $inputData['restecg'] ?? '') == 1 ? 'selected' : '' }}>
                                            Abnormalitas gelombang ST-T</option>
                                        <option value="2"
                                            {{ old('restecg', $inputData['restecg'] ?? '') == 2 ? 'selected' : '' }}>
                                            Hipertrofi ventrikel kiri</option>
                                    </select>
                                </div>

                                <!-- Max Heart Rate -->
                                <div class="group">
                                    <label class="block mb-2 text-sm font-medium text-gray-700">
                                        Detak Jantung Maksimum
                                        <span class="ml-1 text-xs text-gray-500">71-202 bpm</span>
                                    </label>
                                    <div class="relative">
                                        <input type="number" name="thalach" min="71" max="202"
                                            value="{{ old('thalach', $inputData['thalach'] ?? '') }}" required
                                            class="w-full px-4 py-3 transition-all duration-300 border-2 border-gray-200 rounded-xl focus:border-blue-500 focus:ring-4 focus:ring-blue-500/20 group-hover:border-gray-300"
                                            placeholder="Contoh: 150">
                                        <div class="absolute inset-y-0 right-0 flex items-center pr-3">
                                            <span class="text-gray-400">💓</span>
                                        </div>
                                    </div>
                                    <p class="mt-1 text-xs text-gray-500">Detak jantung maksimum yang dicapai saat
                                        olahraga</p>
                                </div>

                                <!-- Exercise Induced Angina -->
                                <div class="group">
                                    <label class="block mb-2 text-sm font-medium text-gray-700">Angina Akibat
                                        Olahraga</label>
                                    <div class="grid grid-cols-2 gap-3">
                                        <label class="relative cursor-pointer">
                                            <input type="radio" name="exang" value="0"
                                                {{ old('exang', $inputData['exang'] ?? '') == 0 ? 'checked' : '' }}
                                                class="sr-only peer" required>
                                            <div
                                                class="p-4 transition-all duration-300 border-2 border-gray-200 rounded-xl peer-checked:border-green-500 peer-checked:bg-green-50 hover:border-gray-300">
                                                <div class="text-center">
                                                    <div class="text-2xl">✅</div>
                                                    <div class="text-sm font-medium text-gray-700">Tidak Ada</div>
                                                </div>
                                            </div>
                                        </label>
                                        <label class="relative cursor-pointer">
                                            <input type="radio" name="exang" value="1"
                                                {{ old('exang', $inputData['exang'] ?? '') == 1 ? 'checked' : '' }}
                                                class="sr-only peer" required>
                                            <div
                                                class="p-4 transition-all duration-300 border-2 border-gray-200 rounded-xl peer-checked:border-red-500 peer-checked:bg-red-50 hover:border-gray-300">
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
                                        <input type="number" name="oldpeak" min="0" max="6.2"
                                            step="0.1" value="{{ old('oldpeak', $inputData['oldpeak'] ?? '') }}"
                                            required
                                            class="w-full px-4 py-3 transition-all duration-300 border-2 border-gray-200 rounded-xl focus:border-blue-500 focus:ring-4 focus:ring-blue-500/20 group-hover:border-gray-300"
                                            placeholder="Contoh: 1.0">
                                        <div class="absolute inset-y-0 right-0 flex items-center pr-3">
                                            <span class="text-gray-400">📊</span>
                                        </div>
                                    </div>
                                    <p class="mt-1 text-xs text-gray-500">Depresi segmen ST yang diinduksi oleh
                                        olahraga</p>
                                </div>

                                <!-- ST Slope -->
                                <div class="group">
                                    <label class="block mb-2 text-sm font-medium text-gray-700">Kemiringan Segmen
                                        ST</label>
                                    <select name="slope" required
                                        class="w-full px-4 py-3 transition-all duration-300 border-2 border-gray-200 rounded-xl focus:border-blue-500 focus:ring-4 focus:ring-blue-500/20 group-hover:border-gray-300">
                                        <option value="">Pilih kemiringan ST</option>
                                        <option value="0"
                                            {{ old('slope', $inputData['slope'] ?? '') == 0 ? 'selected' : '' }}>
                                            Upsloping (Naik)</option>
                                        <option value="1"
                                            {{ old('slope', $inputData['slope'] ?? '') == 1 ? 'selected' : '' }}>Flat
                                            (Datar)</option>
                                        <option value="2"
                                            {{ old('slope', $inputData['slope'] ?? '') == 2 ? 'selected' : '' }}>
                                            Downsloping (Turun)</option>
                                    </select>
                                </div>

                                <!-- Number of Vessels -->
                                <div class="group">
                                    <label class="block mb-2 text-sm font-medium text-gray-700">Jumlah Pembuluh Darah
                                        Tersumbat</label>
                                    <div class="grid grid-cols-5 gap-2">
                                        <label class="relative cursor-pointer">
                                            <input type="radio" name="ca" value="0"
                                                {{ old('ca', $inputData['ca'] ?? '') == 0 ? 'checked' : '' }}
                                                class="sr-only peer" required>
                                            <div
                                                class="p-3 text-center transition-all duration-300 border-2 border-gray-200 rounded-xl peer-checked:border-green-500 peer-checked:bg-green-50 hover:border-gray-300">
                                                <div class="text-lg font-bold">0</div>
                                            </div>
                                        </label>
                                        <label class="relative cursor-pointer">
                                            <input type="radio" name="ca" value="1"
                                                {{ old('ca', $inputData['ca'] ?? '') == 1 ? 'checked' : '' }}
                                                class="sr-only peer" required>
                                            <div
                                                class="p-3 text-center transition-all duration-300 border-2 border-gray-200 rounded-xl peer-checked:border-yellow-500 peer-checked:bg-yellow-50 hover:border-gray-300">
                                                <div class="text-lg font-bold">1</div>
                                            </div>
                                        </label>
                                        <label class="relative cursor-pointer">
                                            <input type="radio" name="ca" value="2"
                                                {{ old('ca', $inputData['ca'] ?? '') == 2 ? 'checked' : '' }}
                                                class="sr-only peer" required>
                                            <div
                                                class="p-3 text-center transition-all duration-300 border-2 border-gray-200 rounded-xl peer-checked:border-orange-500 peer-checked:bg-orange-50 hover:border-gray-300">
                                                <div class="text-lg font-bold">2</div>
                                            </div>
                                        </label>
                                        <label class="relative cursor-pointer">
                                            <input type="radio" name="ca" value="3"
                                                {{ old('ca', $inputData['ca'] ?? '') == 3 ? 'checked' : '' }}
                                                class="sr-only peer" required>
                                            <div
                                                class="p-3 text-center transition-all duration-300 border-2 border-gray-200 rounded-xl peer-checked:border-red-500 peer-checked:bg-red-50 hover:border-gray-300">
                                                <div class="text-lg font-bold">3</div>
                                            </div>
                                        </label>
                                        <label class="relative cursor-pointer">
                                            <input type="radio" name="ca" value="4"
                                                {{ old('ca', $inputData['ca'] ?? '') == 4 ? 'checked' : '' }}
                                                class="sr-only peer" required>
                                            <div
                                                class="p-3 text-center transition-all duration-300 border-2 border-gray-200 rounded-xl peer-checked:border-purple-500 peer-checked:bg-purple-50 hover:border-gray-300">
                                                <div class="text-lg font-bold">4</div>
                                            </div>
                                        </label>
                                    </div>
                                    <p class="mt-1 text-xs text-gray-500">Hasil fluoroscopy - pembuluh darah utama yang
                                        tersumbat</p>
                                </div>

                                <!-- Thalassemia -->
                                <div class="group">
                                    <label class="block mb-2 text-sm font-medium text-gray-700">Hasil Tes
                                        Thalassemia</label>
                                    <select name="thal" required
                                        class="w-full px-4 py-3 transition-all duration-300 border-2 border-gray-200 rounded-xl focus:border-blue-500 focus:ring-4 focus:ring-blue-500/20 group-hover:border-gray-300">
                                        <option value="">Pilih hasil tes</option>
                                        <option value="1"
                                            {{ old('thal', $inputData['thal'] ?? '') == 1 ? 'selected' : '' }}>Fixed
                                            Defect (Cacat tetap)</option>
                                        <option value="2"
                                            {{ old('thal', $inputData['thal'] ?? '') == 2 ? 'selected' : '' }}>Normal
                                        </option>
                                        <option value="3"
                                            {{ old('thal', $inputData['thal'] ?? '') == 3 ? 'selected' : '' }}>
                                            Reversible Defect (Cacat dapat diperbaiki)</option>
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
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />
                                    </svg>
                                    <span>Analisis Risiko Serangan Jantung</span>
                                </span>
                            </button>
                            <p class="mt-4 text-sm text-center">Prediksi ini menggunakan algoritma machine learning
                                berdasarkan data historis. Hasil hanya bersifat informatif dan tidak menggantikan
                                diagnosis medis.</p>
                        </div>
                    </form>
                </div>

                <!-- Result Section -->
                {{-- <div id="result-section" class="hidden mt-8 animate-slide-up">
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
                                    <div id="probability-bar"
                                        class="w-full h-4 mt-2 overflow-hidden bg-gray-200 rounded-full">
                                        <div id="probability-fill"
                                            class="h-full transition-all duration-1000 ease-out rounded-full"></div>
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
                </div> --}}

                <!-- Section Hasil Prediksi -->
                @if (isset($result))
                    <div class="max-w-2xl mx-auto mt-8 overflow-hidden bg-white shadow-2xl card-hover rounded-3xl">
                        <div class="px-8 py-6 {{ $result['prediction'] == 1 ? 'bg-red-100' : 'bg-green-100' }}">
                            <div class="flex items-center justify-center mb-4">
                                @if ($result['prediction'] == 1)
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 text-red-600"
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                                    </svg>
                                @else
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 text-green-600"
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                @endif
                            </div>
                            <h2
                                class="text-2xl font-bold text-center {{ $result['prediction'] == 1 ? 'text-red-600' : 'text-green-600' }}">
                                {{ $result['prediction'] == 1 ? 'Berisiko Serangan Jantung' : 'Tidak Berisiko Serangan Jantung' }}
                            </h2>
                        </div>
                        <div class="p-6 text-center bg-white">
                            <p class="text-lg text-gray-700">
                                <strong>Probabilitas:</strong>
                                <span
                                    class="font-bold {{ $result['prediction'] == 1 ? 'text-red-600' : 'text-green-600' }}">
                                    {{ number_format($result['probability'] * 100, 2) }}%
                                </span>
                            </p>

                            <div class="p-6 mt-6 bg-gray-50 rounded-2xl">
                                <h3 class="mb-3 text-lg font-semibold text-gray-800">Rekomendasi:</h3>
                                <ul class="space-y-2 text-sm text-gray-600 list-disc list-inside">
                                    @if ($result['prediction'] == 1)
                                        <li>Rutin berolahraga minimal 30 menit per hari</li>
                                        <li>Konsultasi rutin ke dokter jantung</li>
                                        <li>Menghindari makanan tinggi kolesterol</li>
                                        <li>Menjaga tekanan darah dan kadar gula</li>
                                        <li>Berhenti merokok</li>
                                        <li>Kelola stres dengan baik</li>
                                        <li>Mengatur pola tidur yang sehat</li>
                                        <li>Menghindari alkohol dan zat adiktif</li>
                                        <li>Mengontrol berat badan ideal</li>
                                        <li>Konsumsi sayur, buah, dan ikan secara teratur</li>
                                    @else
                                        <li>Jaga gaya hidup sehat</li>
                                        <li>Rutin cek kesehatan secara berkala</li>
                                        <li>Terus aktif bergerak dan berolahraga</li>
                                        <li>Hindari pola makan yang tidak sehat</li>
                                        <li>Kelola stres dengan baik</li>
                                        <li>Perhatikan kualitas tidur</li>
                                        <li>Jaga berat badan ideal</li>
                                        <li>Batasi konsumsi gula, garam, dan lemak jenuh</li>
                                        <li>Jangan merokok dan hindari asap rokok</li>
                                        <li>Konsultasikan gaya hidup dengan ahli gizi/dokter</li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                @endif


                <!-- Info Cards -->
                <div class="grid gap-6 mt-12 md:grid-cols-3">
                    <div class="p-6 bg-white shadow-lg card-hover rounded-2xl">
                        <div class="flex items-center mb-4">
                            <div class="p-3 bg-blue-100 rounded-full">
                                <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <h3 class="ml-3 text-lg font-semibold text-gray-800">Akurasi Model</h3>
                        </div>
                        <p class="text-gray-600">Model machine learning ini memiliki tingkat akurasi 90% berdasarkan
                            dataset Heart Attack dari Kaggle.</p>
                    </div>

                    <div class="p-6 bg-white shadow-lg card-hover rounded-2xl">
                        <div class="flex items-center mb-4">
                            <div class="p-3 bg-green-100 rounded-full">
                                <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                </svg>
                            </div>
                            <h3 class="ml-3 text-lg font-semibold text-gray-800">Data Aman</h3>
                        </div>
                        <p class="text-gray-600">Semua data yang dimasukkan akan dienkripsi dan disimpan secara rahasia
                            dan tidak dibagikan kepada pihak manapun.</p>
                    </div>

                    <div class="p-6 bg-white shadow-lg card-hover rounded-2xl">
                        <div class="flex items-center mb-4">
                            <div class="p-3 bg-red-100 rounded-full">
                                <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                                </svg>
                            </div>
                            <h3 class="ml-3 text-lg font-semibold text-gray-800">Konsultasi Medis</h3>
                        </div>
                        <p class="text-gray-600">Hasil prediksi ini tidak menggantikan diagnosis medis. Selalu
                            konsultasikan dengan dokter untuk evaluasi yang akurat.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <footer class="py-8 mt-16 bg-gray-800">
            <div class="px-4 mx-auto text-center max-w-7xl sm:px-6 lg:px-8">
                <p class="text-gray-400">© 2024 {{ config('app.name') }}. Dibuat untuk tujuan edukasi dan
                    penelitian.</p>
            </div>
        </footer>
    </body>

     <script>
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
</x-app-layout>
