// Initialize charts when the page loads
document.addEventListener('DOMContentLoaded', function () {
    // Line Chart - total user baru yang register
    const userChart = document.getElementById('userGrowthChart');
    const labels = JSON.parse(userChart.dataset.labels);
    const data = JSON.parse(userChart.dataset.values);
    const userCtx = userChart.getContext('2d');
    const userGrowthChart = new Chart(userCtx, {
        type: 'line',
        data: {
            labels: labels,
            datasets: [{
                label: 'Jumlah User Baru',
                data: data,
                backgroundColor: [
                    'rgba(54, 162, 235, 0.6)',
                    'rgba(75, 192, 192, 0.6)'
                ],
                borderColor: [
                    'rgba(54, 162, 235, 1)',
                    'rgba(75, 192, 192, 1)'
                ],
                borderWidth: 1,
                borderRadius: 8,
                tension: 0.4,
                fill: true
            }]
        },
        options: {
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    grid: {
                        drawBorder: false
                    },
                    ticks: {
                        precision: 0
                    }
                },
                x: {
                    grid: {
                        display: false
                    }
                }
            }
        }
    });

    // Bar Chart - Total Prediksi Dilakukan User
    const barChart = document.getElementById('barChart');
    const label = JSON.parse(barChart.dataset.labels);
    const datas = JSON.parse(barChart.dataset.values);
    const trafficCtx = document.getElementById('barChart').getContext('2d');
    const trafficChart = new Chart(trafficCtx, {
        type: 'bar',
        data: {
            labels: label,
            datasets: [{
                label: 'Jumlah Prediksi Dilakukan',
                data: datas,
                backgroundColor: [
                    'rgba(59, 130, 246, 0.7)',
                    'rgba(16, 185, 129, 0.7)',
                    'rgba(245, 158, 11, 0.7)',
                    'rgba(139, 92, 246, 0.7)',
                    'rgba(239, 68, 68, 0.7)'
                ],
                borderRadius: 4
            }]
        },
        options: {
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    grid: {
                        drawBorder: false
                    },
                    ticks: {
                        precision: 0
                    }
                },
                x: {
                    grid: {
                        display: false
                    },
                    ticks: {
                        precision: 0
                    }
                }
            }
        }
    });

    // Donut Chart - Categories
    const pieChart = document.getElementById('pieChart');
    const labelPie = JSON.parse(pieChart.dataset.labels || '[]');
    const dataPie = JSON.parse(pieChart.dataset.values || '[]');

    if (labelPie.length > 0 && dataPie.length > 0) {
        const categoriesCtx = pieChart.getContext('2d');
        const categoriesChart = new Chart(categoriesCtx, {
            type: 'doughnut',
            data: {
                labels: labelPie,
                datasets: [{
                    data: dataPie,
                    backgroundColor: [
                        'rgba(255, 0, 0, 0.8)',
                        'rgba(16, 185, 129, 0.8)',
                    ],
                    borderWidth: 0,
                    hoverOffset: 4
                }]
            },
            options: {
                maintainAspectRatio: false,
                cutout: '70%',
                plugins: {
                    legend: {
                        display: false
                    }
                }
            }
        });
    }

    const monthlyPredictionChart = document.getElementById('monthlyPredictionChart');
    const labelMonthly = JSON.parse(monthlyPredictionChart.dataset.labels);
    const dataMonthly = JSON.parse(monthlyPredictionChart.dataset.values);
    const monthlyChartCtx = document.getElementById('monthlyPredictionChart').getContext('2d');
    const monthlyChart = new Chart(monthlyChartCtx, {
        type: 'bar',
        data: {
            labels: labelMonthly,
            datasets: [{
                label: 'Jumlah Prediksi per Bulan',
                data: dataMonthly,
                backgroundColor: 'rgba(147, 51, 234, 0.7)',
                borderColor: 'rgba(147, 51, 234, 1)',
                borderWidth: 2,
                borderRadius: 8,
                borderSkipped: false,
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    grid: {
                        color: 'rgba(0, 0, 0, 0.1)',
                        drawBorder: false,
                    },
                    ticks: {
                        precision: 0,
                        color: 'rgba(0, 0, 0, 0.6)'
                    }
                },
                x: {
                    grid: {
                        display: false,
                    },
                    ticks: {
                        precision: 0,
                        color: 'rgba(0, 0, 0, 0.6)'
                    }
                }
            }
        }
    });

    window.userGrowthChart = userGrowthChart;
    window.trafficChart = trafficChart;
    window.categoriesChart = categoriesChart;
    window.monthlyChart = monthlyChart;

});