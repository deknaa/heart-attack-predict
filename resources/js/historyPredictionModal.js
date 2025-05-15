document.addEventListener('DOMContentLoaded', () => {

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
            recommendationsBox.className = 'p-4 rounded-lg bg-red-50';
            recommendationsTitle.className = 'mb-2 text-lg font-medium text-red-800';
        } else {
            resultElement.textContent = 'Tidak Berisiko Serangan Jantung';
            resultElement.className = 'font-medium text-green-600';
            recommendationsBox.className = 'p-4 rounded-lg bg-green-50';
            recommendationsTitle.className = 'mb-2 text-lg font-medium text-green-800';
        }

        document.getElementById('predictionProbability').textContent = `${data.probability}%`;

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
            <div class="w-5 h-5 mt-0.5 mr-2 flex-shrink-0">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mt-0.5 ${iconClass} mr-2" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                </svg>
            </div>
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

            factorItem.innerHTML = `
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
        alert('Laporan prediksi akan di-download...');
    }

    // Close modal when clicking outside
    window.addEventListener('click', function (event) {
        const modal = document.getElementById('predictionModal');
        if (event.target === modal) {
            closePredictionModal();
        }
    });

    // Prevent propagation from modal content
    document.querySelector('#predictionModal > div').addEventListener('click', function (event) {
        event.stopPropagation();
    });

    // Close on escape key
    document.addEventListener('keydown', function (event) {
        if (event.key === 'Escape') {
            closePredictionModal();
        }
    });

    window.openPredictionModal = openPredictionModal;
    window.closePredictionModal = closePredictionModal;
    window.downloadReport = downloadReport;
});