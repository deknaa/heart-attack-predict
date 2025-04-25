// Initialize Chart
document.addEventListener('DOMContentLoaded', function () {
    fetch('/dashboard/user/predictions') // Ambil data dari endpoint baru
        .then(response => response.json())
        .then(data => {
            const labels = data.map(item => new Date(item.created_at).toLocaleDateString());
            const probabilities = data.map(item => item.probability * 100);

            const ctx = document.getElementById('predictionChart').getContext('2d');
            new Chart(ctx, {
                type: 'line',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Risiko (dalam %)',
                        data: probabilities,
                        borderColor: 'rgba(235, 0, 0, 1)',
                        backgroundColor: 'rgba(37, 99, 235, 0.1)',
                        borderWidth: 2,
                        fill: true,
                        tension: 0.4
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            display: false
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            max: 100,
                            ticks: {
                                stepSize: 10
                            }
                        }
                    }
                }
            });
        })
        .catch(error => console.error('Error fetching prediction data:', error));

    fetch('/dashboard/user/risk-assessment')
        .then(response => response.json())
        .then(data => {
            const riskBar = document.getElementById('riskBar');
            const riskPercentage = document.getElementById('riskPercentage');
            const riskBox = document.getElementById('riskBox');
            const riskTitle = document.getElementById('riskTitle');
            const riskDescription = document.getElementById('riskDescription');

            const probability = data.probability; // Ambil probabilitas dari database
            riskBar.style.width = probability + '%';
            riskPercentage.textContent = probability + '%';

            // Reset kelas warna agar tidak menumpuk
            riskBar.classList.remove('bg-green-500', 'bg-yellow-500', 'bg-red-500');
            riskPercentage.classList.remove('text-green-500', 'text-yellow-500', 'text-red-500');
            riskBox.classList.remove('bg-green-50', 'bg-yellow-50', 'bg-red-50', 'border-green-200',
                'border-yellow-200', 'border-red-200');

            // Tentukan level risiko berdasarkan probabilitas
            if (probability == 0) {
                riskBar.classList.add('bg-green-500');
                riskPercentage.classList.add('text-green-500');
                riskBox.classList.add('bg-green-50', 'border-green-200');
                riskTitle.textContent = 'Tidak Ada Risiko';
                riskDescription.textContent = 'Lakukan Prediksi Risiko untuk mengetahui tingkat risiko anda.';
            } else if (probability < 50) {
                riskBar.classList.add('bg-green-500');
                riskPercentage.classList.add('text-green-500');
                riskBox.classList.add('bg-green-50', 'border-green-200');
                riskTitle.textContent = 'Risiko Rendah';
                riskDescription.textContent = 'Pertahankan gaya hidup sehat Anda.';
            } else if (probability < 70) {
                riskBar.classList.add('bg-yellow-500');
                riskPercentage.classList.add('text-yellow-500');
                riskBox.classList.add('bg-yellow-50', 'border-yellow-200');
                riskTitle.textContent = 'Risiko Sedang';
                riskDescription.textContent = 'Perhatikan pola makan dan olahraga lebih teratur.';
            } else {
                riskBar.classList.add('bg-red-500');
                riskPercentage.classList.add('text-red-500');
                riskBox.classList.add('bg-red-50', 'border-red-200');
                riskTitle.textContent = 'Risiko Tinggi';
                riskDescription.textContent =
                    'Segera konsultasi dengan dokter untuk evaluasi lebih lanjut.';
            }
        })
        .catch(error => console.error('Error fetching risk assessment:', error));

    // Mobile menu toggle
    document.addEventListener('DOMContentLoaded', function () {
        const menuButton = document.querySelector('button.md\\:hidden');
        const sidebar = document.querySelector('.bg-gradient-to-b');

        if (menuButton && sidebar) {
            menuButton.addEventListener('click', function () {
                if (sidebar.classList.contains('hidden-mobile')) {
                    sidebar.classList.remove('hidden-mobile');
                } else {
                    sidebar.classList.add('hidden-mobile');
                }
            });
        }
    });

});