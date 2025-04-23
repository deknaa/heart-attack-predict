<x-app-layout>
    <div class="container px-4 py-10 m-10 mx-auto">
        <div class="overflow-hidden bg-white rounded-lg shadow-lg">
            <div class="flex items-center justify-between px-6 py-4 border-b border-gray-200 bg-gray-50">
                <h2 class="text-2xl font-semibold text-gray-800">Prediction History</h2>
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
                                <td class="px-6 py-4 text-sm font-medium whitespace-nowrap">
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
                        <!-- Basic Info & Input Data - Responsive layout -->
                        <div class="grid grid-cols-1 gap-4 mb-6 lg:grid-cols-2">
                            <!-- Left Column: Basic Info -->
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
                                
                                <div class="p-4 rounded-lg bg-gray-50">
                                    <h4 class="mb-2 text-lg font-medium text-gray-800">Input Data</h4>
                                    <div class="p-3 overflow-auto bg-white rounded-md max-h-32" id="inputDataDisplay">
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Right Column: Health Recommendations -->
                            <div class="w-full">
                                <div id="healthRecommendationsBox" class="p-4 rounded-lg">
                                    <h4 class="mb-2 text-lg font-medium" id="recommendationsTitle">Rekomendasi Kesehatan</h4>
                                    <div id="recommendationsContent" class="space-y-3">
                                        <!-- Recommendations will be populated here -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Risk Factors Section - Scrollable container -->
                        <div>
                            <h4 class="mb-2 text-lg font-medium text-gray-800">Faktor Risiko</h4>
                            <div class="p-4 rounded-lg bg-gray-50">
                                <div id="riskFactorsContent" class="grid grid-cols-1 gap-3 sm:grid-cols-2 md:grid-cols-3">
                                    <!-- Risk factors will be populated here in 3 columns on larger screens -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="flex flex-col justify-end gap-3 pt-4 sm:flex-row">
                <button onclick="downloadReport()" class="px-4 py-2 text-white bg-blue-600 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <div class="flex items-center justify-center space-x-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                        </svg>
                        <span>Download Laporan</span>
                    </div>
                </button>
                <button onclick="closePredictionModal()" class="px-4 py-2 text-gray-700 bg-gray-200 rounded-md hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-400">
                    Tutup
                </button>
            </div>
        </div>
    </div>

    <script>
        let currentPredictionId = null;

        function openPredictionModal(id) {
            currentPredictionId = id;
            document.getElementById('predictionModal').classList.remove('hidden');
            document.getElementById('modalContainer').classList.remove('opacity-0', 'scale-95');
            document.getElementById('modalContainer').classList.add('opacity-100', 'scale-100');
            document.getElementById('modalLoading').classList.remove('hidden');
            document.getElementById('modalContent').classList.add('hidden');

            // Fetch prediction details
            fetch(`/predictions/${id}`)
                .then(response => response.json())
                .then(data => {
                    updateModalContent(data);
                    document.getElementById('modalLoading').classList.add('hidden');
                    document.getElementById('modalContent').classList.remove('hidden');
                })
                .catch(error => {
                    console.error('Error fetching prediction details:', error);
                    alert('Gagal memuat detail prediksi');
                    closePredictionModal();
                });
        }

        function closePredictionModal() {
            const modal = document.getElementById('predictionModal');
            const modalContainer = document.getElementById('modalContainer');

            modalContainer.classList.remove('opacity-100', 'scale-100');
            modalContainer.classList.add('opacity-0', 'scale-95');

            setTimeout(() => {
                modal.classList.add('hidden');
            }, 300);
        }

        function updateModalContent(data) {
            // Update basic info
            document.getElementById('predictionDate').textContent = data.created_at;

            const resultElement = document.getElementById('predictionResult');
            const recommendationsBox = document.getElementById('healthRecommendationsBox');
            const recommendationsTitle = document.getElementById('recommendationsTitle');

            if (data.prediction_result == 1) {
                resultElement.textContent = 'Berisiko Serangan Jantung';
                resultElement.className = 'font-medium text-red-600';
                recommendationsBox.className = 'p-4 bg-red-50 rounded-lg';
                recommendationsTitle.className = 'mb-2 text-lg font-medium text-red-800';
            } else {
                resultElement.textContent = 'Tidak Berisiko Serangan Jantung';
                resultElement.className = 'font-medium text-green-600';
                recommendationsBox.className = 'p-4 bg-green-50 rounded-lg';
                recommendationsTitle.className = 'mb-2 text-lg font-medium text-green-800';
            }

            document.getElementById('predictionProbability').textContent = `${data.probability}%`;

            // Format and display input data
            const inputDataDisplay = document.getElementById('inputDataDisplay');
            try {
                const formattedData = JSON.stringify(data.input_data, null, 2);
                inputDataDisplay.innerHTML = `<pre class="text-xs text-gray-700">${formattedData}</pre>`;
            } catch (e) {
                inputDataDisplay.innerHTML = '<p class="text-red-500">Error displaying input data</p>';
            }

            // Update recommendations based on prediction result
            const recommendationsContent = document.getElementById('recommendationsContent');
            recommendationsContent.innerHTML = ''; // Clear previous content

            // Generate health recommendations based on prediction result
            const recommendations = data.prediction_result == 1 ? getHighRiskRecommendations() :
                getLowRiskRecommendations();

            recommendations.forEach(rec => {
                const recItem = document.createElement('div');
                recItem.className = 'flex items-start';

                const iconClass = data.prediction_result == 1 ? 'text-red-600' : 'text-green-600';

                recItem.innerHTML = `
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mt-0.5 ${iconClass} mr-2" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                    </svg>
                    <p class="text-sm">${rec}</p>
                `;

                recommendationsContent.appendChild(recItem);
            });

            // Update risk factors section
            const riskFactorsContent = document.getElementById('riskFactorsContent');
            riskFactorsContent.innerHTML = ''; // Clear previous content

            // Map input data to human-readable risk factors
            const riskFactors = mapInputDataToRiskFactors(data.input_data);

            riskFactors.forEach(factor => {
                const factorItem = document.createElement('div');
                factorItem.className = 'flex items-start';

                // Determine if this factor is a risk (could be more sophisticated based on your model)
                const isRisk = factor.isRisk;
                const iconColor = isRisk ? 'text-red-600' : 'text-gray-600';
                const iconPath = isRisk ?
                    '<path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />' :
                    '<path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z" clip-rule="evenodd" />';

                factorItem.innerHTML = `
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mt-0.5 ${iconColor} mr-2" viewBox="0 0 20 20" fill="currentColor">
                        ${iconPath}
                    </svg>
                    <div>
                        <p class="font-medium text-gray-700">${factor.name}</p>
                        <p class="text-sm text-gray-600">${factor.value}</p>
                    </div>
                `;

                riskFactorsContent.appendChild(factorItem);
            });
        }

        function getHighRiskRecommendations() {
            return [
                "Periksakan diri ke dokter untuk evaluasi menyeluruh kardiovaskular sesegera mungkin.",
                "Pertimbangkan untuk melakukan tes diagnostik lanjutan seperti EKG, ekokardiografi, atau tes stres jantung.",
                "Evaluasi dan kelola faktor risiko yang teridentifikasi dengan bantuan profesional kesehatan.",
                "Terapkan diet rendah garam, rendah lemak jenuh, dan kaya serat untuk mendukung kesehatan jantung.",
                "Lakukan aktivitas fisik moderat secara teratur sesuai dengan rekomendasi dokter.",
                "Hentikan kebiasaan merokok dan hindari paparan asap rokok pasif.",
                "Batasi konsumsi alkohol sesuai dengan rekomendasi medis.",
                "Kelola stres dengan teknik relaksasi seperti meditasi, yoga, atau pernapasan dalam."
            ];
        }

        function getLowRiskRecommendations() {
            return [
                "Pertahankan gaya hidup sehat dengan diet seimbang kaya buah, sayur, dan biji-bijian.",
                "Lakukan aktivitas fisik setidaknya 150 menit per minggu dengan intensitas sedang.",
                "Jaga berat badan ideal dan perhatikan lingkar pinggang.",
                "Periksa tekanan darah, gula darah, dan kolesterol secara berkala.",
                "Hindari merokok dan batasi konsumsi alkohol.",
                "Kelola stres dengan baik melalui teknik relaksasi dan istirahat yang cukup.",
                "Konsumsi makanan rendah garam dan lemak jenuh untuk menjaga kesehatan jantung.",
                "Tetap lakukan pemeriksaan kesehatan rutin setahun sekali."
            ];
        }

        function mapInputDataToRiskFactors(inputData) {
            if (!inputData || typeof inputData !== 'object') {
                console.error('Input data tidak valid:', inputData);
                return [];
            }

            // Array untuk menampung faktor risiko
            const factors = [];

            // Usia
            if (inputData.age !== undefined) {
                factors.push({
                    name: "Usia",
                    value: `${inputData.age} tahun`,
                    isRisk: parseInt(inputData.age) > 55
                });
            }

            // Jenis Kelamin
            if (inputData.sex !== undefined) {
                factors.push({
                    name: "Jenis Kelamin",
                    value: parseInt(inputData.sex) === 1 ? "Laki-laki" : "Perempuan",
                    isRisk: parseInt(inputData.sex) === 1
                });
            }

            // Tipe Nyeri Dada (cp)
            if (inputData.cp !== undefined) {
                factors.push({
                    name: "Tipe Nyeri Dada",
                    value: getChestPainType(parseInt(inputData.cp)),
                    isRisk: parseInt(inputData.cp) === 0
                });
            }

            // Tekanan Darah (trestbps)
            if (inputData.trestbps !== undefined) {
                factors.push({
                    name: "Tekanan Darah",
                    value: `${inputData.trestbps} mmHg`,
                    isRisk: parseInt(inputData.trestbps) > 130
                });
            }

            // Kolesterol (chol)
            if (inputData.chol !== undefined) {
                factors.push({
                    name: "Kolesterol",
                    value: `${inputData.chol} mg/dl`,
                    isRisk: parseInt(inputData.chol) > 200
                });
            }

            // Gula Darah Puasa (fbs)
            if (inputData.fbs !== undefined) {
                factors.push({
                    name: "Gula Darah Puasa",
                    value: parseInt(inputData.fbs) === 1 ? "> 120 mg/dl" : "≤ 120 mg/dl",
                    isRisk: parseInt(inputData.fbs) === 1
                });
            }

            // Hasil EKG Istirahat (restecg)
            if (inputData.restecg !== undefined) {
                factors.push({
                    name: "Hasil EKG Istirahat",
                    value: getECGResult(parseInt(inputData.restecg)),
                    isRisk: parseInt(inputData.restecg) > 0
                });
            }

            // Detak Jantung Maksimum (thalach)
            if (inputData.thalach !== undefined) {
                factors.push({
                    name: "Detak Jantung Maksimum",
                    value: `${inputData.thalach} bpm`,
                    isRisk: parseInt(inputData.thalach) < 100
                });
            }

            // Angina Akibat Latihan (exang)
            if (inputData.exang !== undefined) {
                factors.push({
                    name: "Angina Akibat Latihan",
                    value: parseInt(inputData.exang) === 1 ? "Ya" : "Tidak",
                    isRisk: parseInt(inputData.exang) === 1
                });
            }

            // ST Depression (oldpeak)
            if (inputData.oldpeak !== undefined) {
                factors.push({
                    name: "ST Depression",
                    value: `${inputData.oldpeak}`,
                    isRisk: parseFloat(inputData.oldpeak) > 1
                });
            }

            // Slope ST Segment (slope)
            if (inputData.slope !== undefined) {
                factors.push({
                    name: "Slope ST Segment",
                    value: getSTSlope(parseInt(inputData.slope)),
                    isRisk: parseInt(inputData.slope) === 0
                });
            }

            // Jumlah Pembuluh Darah Utama (ca)
            if (inputData.ca !== undefined) {
                factors.push({
                    name: "Jumlah Pembuluh Darah Utama",
                    value: `${inputData.ca}`,
                    isRisk: parseInt(inputData.ca) > 0
                });
            }

            // Thalassemia (thal)
            if (inputData.thal !== undefined) {
                factors.push({
                    name: "Thalassemia",
                    value: getThalassemiaType(parseInt(inputData.thal)),
                    isRisk: parseInt(inputData.thal) === 2
                });
            }

            return factors;
        }

        function getThalassemiaType(thalValue) {
            const types = [
                "Normal",
                "Cacat Tetap",
                "Cacat Reversibel"
            ];
            return types[thalValue] || "Unknown";
        }

        function getChestPainType(cp) {
            const types = [
                "Angina Typical",
                "Angina Atypical",
                "Non-anginal Pain",
                "Asymptomatic"
            ];
            return types[cp] || "Unknown";
        }

        function getECGResult(restecg) {
            const results = [
                "Normal",
                "ST-T Wave Abnormality",
                "Left Ventricular Hypertrophy"
            ];
            return results[restecg] || "Unknown";
        }

        function getSTSlope(slope) {
            const slopes = ["Downsloping", "Flat", "Upsloping"];
            return slopes[slope] || "Unknown";
        }

        function downloadReport() {
            // In a real application, this would generate a PDF report
            // For this example, we'll just show an alert
            alert('Laporan prediksi akan di-download (Fitur ini akan diimplementasikan)');
        }

        // Close modal when clicking outside
        window.addEventListener('click', function(event) {
            const modal = document.getElementById('predictionModal');
            if (event.target === modal) {
                closePredictionModal();
            }
        });

        // Prevent propagation from modal content
        document.querySelector('#predictionModal > div').addEventListener('click', function(event) {
            event.stopPropagation();
        });

        // Close on escape key
        document.addEventListener('keydown', function(event) {
            if (event.key === 'Escape') {
                closePredictionModal();
            }
        });
    </script>
</x-app-layout>
