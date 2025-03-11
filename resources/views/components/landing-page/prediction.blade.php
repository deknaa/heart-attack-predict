<section id="prediction" class="py-16 bg-white dark:bg-gray-800">
    <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="mb-12 text-center" data-aos="fade-down" data-aos-offset="300" data-aos-easing="ease-in-sine" data-aos-duration="1500">
            <h2 class="text-3xl font-extrabold text-gray-900 dark:text-gray-50 sm:text-4xl">
                Prediksi Risiko Serangan Jantung
            </h2>
            <p class="max-w-2xl mx-auto mt-4 text-xl text-gray-600 dark:text-gray-300">
                Isi data Anda untuk mendapatkan evaluasi risiko serangan jantung
            </p>
        </div>

        <div class="overflow-hidden bg-white rounded-lg shadow-xl" data-aos="zoom-in" data-aos-offset="300" data-aos-easing="ease-in-sine" data-aos-duration="1500">
            <div class="p-6 text-white bg-red-600 sm:flex sm:items-center">
                <div class="sm:flex-shrink-0">
                    <i class="text-2xl fas fa-clipboard-check"></i>
                </div>
                <div class="mt-3 sm:mt-0 sm:ml-4">
                    <h3 class="text-lg font-medium">Form Prediksi Risiko</h3>
                    <p class="text-sm text-white text-opacity-80">
                        Semua data yang Anda berikan bersifat rahasia dan tidak disimpan tanpa izin Anda
                    </p>
                </div>
            </div>

            <div class="px-6 py-8 border-b border-gray-200">
                <form class="space-y-8">
                    <div class="space-y-6">
                        <h4 class="text-lg font-medium text-gray-900">Informasi Pribadi</h4>

                        <div class="grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
                            <div class="sm:col-span-3">
                                <label for="age" class="block text-sm font-medium text-gray-700">Usia</label>
                                <div class="mt-1">
                                    <input type="number" name="age" id="age"
                                        class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-red-500 focus:border-red-500 sm:text-sm"
                                        placeholder="Contoh: 45">
                                </div>
                            </div>

                            <div class="sm:col-span-3">
                                <label for="gender" class="block text-sm font-medium text-gray-700">Jenis
                                    Kelamin</label>
                                <div class="mt-1">
                                    <select id="gender" name="gender"
                                        class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-red-500 focus:border-red-500 sm:text-sm">
                                        <option value="">Pilih</option>
                                        <option value="male">Laki-laki</option>
                                        <option value="female">Perempuan</option>
                                    </select>
                                </div>
                            </div>

                            <div class="sm:col-span-3">
                                <label for="weight" class="block text-sm font-medium text-gray-700">Berat Badan
                                    (kg)</label>
                                <div class="mt-1">
                                    <input type="number" name="weight" id="weight"
                                        class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-red-500 focus:border-red-500 sm:text-sm"
                                        placeholder="Contoh: 70">
                                </div>
                            </div>

                            <div class="sm:col-span-3">
                                <label for="height" class="block text-sm font-medium text-gray-700">Tinggi Badan
                                    (cm)</label>
                                <div class="mt-1">
                                    <input type="number" name="height" id="height"
                                        class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-red-500 focus:border-red-500 sm:text-sm"
                                        placeholder="Contoh: 165">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="space-y-6">
                        <h4 class="text-lg font-medium text-gray-900">Parameter Kesehatan</h4>

                        <div class="grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
                            <div class="sm:col-span-3">
                                <label for="systolic" class="block text-sm font-medium text-gray-700">Tekanan
                                    Darah Sistolik (mmHg)</label>
                                <div class="mt-1">
                                    <input type="number" name="systolic" id="systolic"
                                        class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-red-500 focus:border-red-500 sm:text-sm"
                                        placeholder="Contoh: 120">
                                </div>
                            </div>

                            <div class="sm:col-span-3">
                                <label for="diastolic" class="block text-sm font-medium text-gray-700">Tekanan
                                    Darah Diastolik (mmHg)</label>
                                <div class="mt-1">
                                    <input type="number" name="diastolic" id="diastolic"
                                        class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-red-500 focus:border-red-500 sm:text-sm"
                                        placeholder="Contoh: 80">
                                </div>
                            </div>

                            <div class="sm:col-span-3">
                                <label for="cholesterol"
                                    class="block text-sm font-medium text-gray-700">Kolesterol Total
                                    (mg/dL)</label>
                                <div class="mt-1">
                                    <input type="number" name="cholesterol" id="cholesterol"
                                        class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-red-500 focus:border-red-500 sm:text-sm"
                                        placeholder="Contoh: 200">
                                </div>
                            </div>

                            <div class="sm:col-span-3">
                                <label for="hdl" class="block text-sm font-medium text-gray-700">HDL
                                    (mg/dL)</label>
                                <div class="mt-1">
                                    <input type="number" name="hdl" id="hdl"
                                        class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-red-500 focus:border-red-500 sm:text-sm"
                                        placeholder="Contoh: 50">
                                </div>
                            </div>

                            <div class="sm:col-span-3">
                                <label for="ldl" class="block text-sm font-medium text-gray-700">LDL
                                    (mg/dL)</label>
                                <div class="mt-1">
                                    <input type="number" name="ldl" id="ldl"
                                        class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-red-500 focus:border-red-500 sm:text-sm"
                                        placeholder="Contoh: 130">
                                </div>
                            </div>

                            <div class="sm:col-span-3">
                                <label for="glucose" class="block text-sm font-medium text-gray-700">Glukosa
                                    Darah (mg/dL)</label>
                                <div class="mt-1">
                                    <input type="number" name="glucose" id="glucose"
                                        class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-red-500 focus:border-red-500 sm:text-sm"
                                        placeholder="Contoh: 90">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="space-y-6">
                        <h4 class="text-lg font-medium text-gray-900">Riwayat dan Gaya Hidup</h4>

                        <div class="grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
                            <div class="sm:col-span-3">
                                <label for="smoking" class="block text-sm font-medium text-gray-700">Status
                                    Merokok</label>
                                <div class="mt-1">
                                    <select id="smoking" name="smoking"
                                        class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-red-500 focus:border-red-500 sm:text-sm">
                                        <option value="">Pilih</option>
                                        <option value="never">Tidak Pernah</option>
                                        <option value="former">Mantan Perokok</option>
                                        <option value="current">Perokok Aktif</option>
                                    </select>
                                </div>
                            </div>

                            <div class="sm:col-span-3">
                                <label for="family_history"
                                    class="block text-sm font-medium text-gray-700">Riwayat Keluarga Serangan
                                    Jantung</label>
                                <div class="mt-1">
                                    <select id="family_history" name="family_history"
                                        class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-red-500 focus:border-red-500 sm:text-sm">
                                        <option value="">Pilih</option>
                                        <option value="yes">Ya</option>
                                        <option value="no">Tidak</option>
                                    </select>
                                </div>
                            </div>

                            <div class="sm:col-span-3">
                                <label for="exercise" class="block text-sm font-medium text-gray-700">Frekuensi
                                    Olahraga (per minggu)</label>
                                <div class="mt-1">
                                    <select id="exercise" name="exercise"
                                        class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-red-500 focus:border-red-500 sm:text-sm">
                                        <option value="">Pilih</option>
                                        <option value="none">Tidak Pernah</option>
                                        <option value="light">1-2 kali</option>
                                        <option value="moderate">3-4 kali</option>
                                        <option value="active">5 kali atau lebih</option>
                                    </select>
                                </div>
                            </div>

                            <div class="sm:col-span-3">
                                <label for="diabetes"
                                    class="block text-sm font-medium text-gray-700">Diabetes</label>
                                <div class="mt-1">
                                    <select id="diabetes" name="diabetes"
                                        class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-red-500 focus:border-red-500 sm:text-sm">
                                        <option value="">Pilih</option>
                                        <option value="yes">Ya</option>
                                        <option value="no">Tidak</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="pt-5">
                        <div class="flex justify-center">
                            <button type="submit"
                                class="inline-flex justify-center px-6 py-3 ml-3 text-base font-medium text-white bg-red-600 border border-transparent rounded-md shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                                Analisis Risiko Saya
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>