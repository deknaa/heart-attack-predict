<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Prediksi Kesehatan Jantung</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');
        
        /* Base styling */
        body {
            font-family: 'Inter', sans-serif;
            line-height: 1.5;
            color: #1f2937;
            background-color: #f9fafb;
            margin: 0;
            padding: 0;
        }
        
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 2rem;
            background-color: white;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            border-radius: 0.5rem;
        }
        
        /* Header */
        .header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 2rem;
            padding-bottom: 1rem;
            border-bottom: 1px solid #e5e7eb;
        }
        
        .logo-container {
            display: flex;
            align-items: center;
        }
        
        .logo {
            height: 3rem;
            width: auto;
            margin-right: 1rem;
        }
        
        .header-text h1 {
            font-size: 1.5rem;
            font-weight: 700;
            color: #111827;
            margin: 0;
        }
        
        .header-text p {
            font-size: 0.875rem;
            color: #6b7280;
            margin: 0;
        }
        
        .date-container {
            text-align: right;
            font-size: 0.875rem;
            color: #6b7280;
        }
        
        /* Result Summary */
        .result-summary {
            display: flex;
            align-items: center;
            margin-bottom: 2rem;
            padding: 1rem;
            background-color: #f3f4f6;
            border-radius: 0.5rem;
            border-left: 4px solid #3b82f6;
        }
        
        .result-icon {
            font-size: 2rem;
            margin-right: 1rem;
            color: #3b82f6;
        }
        
        .result-text {
            flex-grow: 1;
        }
        
        .result-text h2 {
            font-size: 1.25rem;
            font-weight: 600;
            margin: 0 0 0.5rem 0;
        }
        
        .result-text p {
            margin: 0;
            color: #4b5563;
        }
        
        .probability {
            font-size: 2rem;
            font-weight: 700;
            color: #3b82f6;
        }
        
        /* Patient Data & Heart Indicators */
        .section-title {
            font-size: 1.25rem;
            font-weight: 600;
            margin: 2rem 0 1rem 0;
            color: #111827;
        }
        
        .data-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 1.5rem;
        }
        
        .data-card {
            padding: 1rem;
            background-color: #f9fafb;
            border-radius: 0.5rem;
            border: 1px solid #e5e7eb;
        }
        
        .data-card h3 {
            font-size: 1rem;
            font-weight: 600;
            margin: 0 0 0.5rem 0;
            color: #374151;
        }
        
        .data-card p {
            margin: 0;
            font-size: 0.875rem;
            color: #6b7280;
        }
        
        /* Data Table */
        .data-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 1.5rem;
            font-size: 0.875rem;
        }
        
        .data-table th {
            text-align: left;
            padding: 0.75rem 1rem;
            background-color: #f3f4f6;
            color: #374151;
            font-weight: 600;
            border-bottom: 1px solid #e5e7eb;
        }
        
        .data-table td {
            padding: 0.75rem 1rem;
            border-bottom: 1px solid #e5e7eb;
        }
        
        .data-table tr:last-child td {
            border-bottom: none;
        }
        
        /* Footer */
        .footer {
            margin-top: 3rem;
            padding-top: 1.5rem;
            border-top: 1px solid #e5e7eb;
            text-align: center;
            font-size: 0.75rem;
            color: #9ca3af;
        }
        
        .disclaimer {
            margin-top: 1.5rem;
            padding: 1rem;
            background-color: #fffbeb;
            border-radius: 0.375rem;
            border-left: 4px solid #f59e0b;
            font-size: 0.875rem;
            color: #92400e;
        }
        
        /* Utility classes */
        .text-bold {
            font-weight: 600;
        }
        
        .text-normal {
            font-weight: 400;
        }
        
        .text-danger {
            color: #dc2626;
        }
        
        .text-success {
            color: #10b981;
        }
        
        .text-warning {
            color: #f59e0b;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Header -->
        <div class="header">
            <div class="logo-container">
                <div class="logo">
                    <!-- Placeholder for logo -->
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="#3b82f6" width="48" height="48">
                        <path d="M12 4.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5zM12 17c-2.76 0-5-2.24-5-5s2.24-5 5-5 5 2.24 5 5-2.24 5-5 5zm0-8c-1.66 0-3 1.34-3 3s1.34 3 3 3 3-1.34 3-3-1.34-3-3-3z"/>
                    </svg>
                </div>
                <div class="header-text">
                    <h1>Hasil Prediksi Kesehatan Jantung</h1>
                    <p>Laporan Analisis Medis</p>
                </div>
            </div>
            <div class="date-container">
                <p>ID Prediksi: <span class="text-bold">PR-{{ date('Ymd') }}-123</span></p>
                <p>Tanggal: <span>{{ date('d M Y') }}</span></p>
            </div>
        </div>
        
        <!-- Result Summary -->
        <div class="result-summary">
            <div class="result-icon">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="48" height="48" fill="currentColor">
                    <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/>
                </svg>
            </div>
            <div class="result-text">
                <h2>
                    @if ($prediction->prediction_result == 1)
                        <span class="text-danger">Terdeteksi Risiko Penyakit Jantung</span>
                    @else
                        <span class="text-success">Tidak Terdeteksi Risiko Penyakit Jantung</span>
                    @endif
                </h2>
                <p>Berdasarkan data yang dimasukkan, sistem kami telah menganalisis dan memberikan hasil prediksi dengan tingkat akurasi yang tinggi.</p>
            </div>
            <div class="probability">
                {{ number_format($prediction->probability * 100, 1) }}%
            </div>
        </div>
        
        <!-- Patient Data -->
        <h2 class="section-title">Data Pasien</h2>
        <div class="data-grid">
            <div class="data-card">
                <h3>Usia</h3>
                <p>{{ $prediction->input_data['age'] }} tahun</p>
            </div>
            <div class="data-card">
                <h3>Jenis Kelamin</h3>
                <p>{{ $prediction->input_data['sex'] == '1' ? 'Laki-laki' : 'Perempuan' }}</p>
            </div>
        </div>
        
        <!-- Heart Health Indicators -->
        <h2 class="section-title">Indikator Kesehatan Jantung</h2>
        <div class="data-grid">
            <div class="data-card">
                <h3>Tekanan Darah Istirahat</h3>
                <p>{{ $prediction->input_data['trestbps'] }} mmHg</p>
            </div>
            <div class="data-card">
                <h3>Kolesterol</h3>
                <p>{{ $prediction->input_data['chol'] }} mg/dl</p>
            </div>
            <div class="data-card">
                <h3>Gula Darah Puasa</h3>
                <p>{{ $prediction->input_data['fbs'] == '1' ? '> 120 mg/dl' : '≤ 120 mg/dl' }}</p>
            </div>
            <div class="data-card">
                <h3>Detak Jantung Maksimum</h3>
                <p>{{ $prediction->input_data['thalach'] }} bpm</p>
            </div>
        </div>
        
        <!-- Full Data Table -->
        <h2 class="section-title">Detail Data Medis Lengkap</h2>
        <table class="data-table">
            <thead>
                <tr>
                    <th>Parameter</th>
                    <th>Nilai</th>
                    <th>Keterangan</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Usia</td>
                    <td>{{ $prediction->input_data['age'] }}</td>
                    <td>Tahun</td>
                </tr>
                <tr>
                    <td>Jenis Kelamin</td>
                    <td>{{ $prediction->input_data['sex'] }}</td>
                    <td>{{ $prediction->input_data['sex'] == '1' ? 'Laki-laki' : 'Perempuan' }}</td>
                </tr>
                <tr>
                    <td>Jenis Nyeri Dada (CP)</td>
                    <td>{{ $prediction->input_data['cp'] }}</td>
                    <td>
                        @switch($prediction->input_data['cp'])
                            @case('0')
                                Angina Tipikal
                                @break
                            @case('1')
                                Angina Atipikal
                                @break
                            @case('2')
                                Nyeri Non-Angina
                                @break
                            @case('3')
                                Asimtomatik
                                @break
                            @default
                                -
                        @endswitch
                    </td>
                </tr>
                <tr>
                    <td>Tekanan Darah Istirahat</td>
                    <td>{{ $prediction->input_data['trestbps'] }}</td>
                    <td>mmHg</td>
                </tr>
                <tr>
                    <td>Kolesterol</td>
                    <td>{{ $prediction->input_data['chol'] }}</td>
                    <td>mg/dl</td>
                </tr>
                <tr>
                    <td>Gula Darah Puasa > 120 mg/dl</td>
                    <td>{{ $prediction->input_data['fbs'] }}</td>
                    <td>{{ $prediction->input_data['fbs'] == '1' ? 'Ya' : 'Tidak' }}</td>
                </tr>
                <tr>
                    <td>Hasil Elektrokardiografi Istirahat</td>
                    <td>{{ $prediction->input_data['restecg'] }}</td>
                    <td>
                        @switch($prediction->input_data['restecg'])
                            @case('0')
                                Normal
                                @break
                            @case('1')
                                Abnormalitas ST-T
                                @break
                            @case('2')
                                Hipertrofi Ventrikel Kiri
                                @break
                            @default
                                -
                        @endswitch
                    </td>
                </tr>
                <tr>
                    <td>Detak Jantung Maksimum</td>
                    <td>{{ $prediction->input_data['thalach'] }}</td>
                    <td>bpm</td>
                </tr>
                <tr>
                    <td>Angina Akibat Latihan</td>
                    <td>{{ $prediction->input_data['exang'] }}</td>
                    <td>{{ $prediction->input_data['exang'] == '1' ? 'Ya' : 'Tidak' }}</td>
                </tr>
                <tr>
                    <td>ST Depression (Oldpeak)</td>
                    <td>{{ $prediction->input_data['oldpeak'] }}</td>
                    <td>mm</td>
                </tr>
                <tr>
                    <td>Slope ST Segment</td>
                    <td>{{ $prediction->input_data['slope'] }}</td>
                    <td>
                        @switch($prediction->input_data['slope'])
                            @case('0')
                                Upsloping
                                @break
                            @case('1')
                                Flat
                                @break
                            @case('2')
                                Downsloping
                                @break
                            @default
                                -
                        @endswitch
                    </td>
                </tr>
                <tr>
                    <td>Jumlah Pembuluh Darah Utama (CA)</td>
                    <td>{{ $prediction->input_data['ca'] }}</td>
                    <td>Pembuluh</td>
                </tr>
                <tr>
                    <td>Thalassemia</td>
                    <td>{{ $prediction->input_data['thal'] }}</td>
                    <td>
                        @switch($prediction->input_data['thal'])
                            @case('0')
                                Null
                                @break
                            @case('1')
                                Fixed Defect
                                @break
                            @case('2')
                                Normal
                                @break
                            @case('3')
                                Reversible Defect
                                @break
                            @default
                                -
                        @endswitch
                    </td>
                </tr>
            </tbody>
        </table>
        
        <!-- Interpretation -->
        <h2 class="section-title">Interpretasi Hasil</h2>
        <p>
            @if ($prediction->prediction_result == 1)
                Berdasarkan data yang dianalisis, terdapat indikasi risiko penyakit jantung dengan tingkat probabilitas {{ number_format($prediction->probability * 100, 1) }}%. 
                Faktor utama yang berkontribusi pada hasil ini termasuk 
                @if ($prediction->input_data['age'] > 60)
                    usia di atas 60 tahun, 
                @endif
                @if ($prediction->input_data['chol'] > 240)
                    tingkat kolesterol tinggi ({{ $prediction->input_data['chol'] }} mg/dl), 
                @endif
                @if ($prediction->input_data['thalach'] < 120)
                    detak jantung maksimum yang rendah, 
                @endif
                dan faktor risiko lainnya.
            @else
                Berdasarkan data yang dianalisis, tidak ditemukan indikasi signifikan adanya risiko penyakit jantung. Probabilitas risiko hanya sebesar {{ number_format($prediction->probability * 100, 1) }}%.
                Meskipun demikian, tetap disarankan untuk menjaga gaya hidup sehat dan pemeriksaan berkala.
            @endif
        </p>
        
        <!-- Recommendations -->
        <h2 class="section-title">Rekomendasi</h2>
        <div class="data-grid">
            @if ($prediction->prediction_result == 1)
                <div class="data-card">
                    <h3>Konsultasi Medis</h3>
                    <p>Disarankan untuk segera berkonsultasi dengan dokter spesialis jantung untuk evaluasi mendalam.</p>
                </div>
                <div class="data-card">
                    <h3>Pemeriksaan Lanjutan</h3>
                    <p>Lakukan pemeriksaan jantung lebih lanjut seperti EKG, ekokardiografi, atau tes stres jantung.</p>
                </div>
                <div class="data-card">
                    <h3>Perubahan Gaya Hidup</h3>
                    <p>Kurangi konsumsi garam dan lemak jenuh, tingkatkan aktivitas fisik, dan berhenti merokok.</p>
                </div>
                <div class="data-card">
                    <h3>Kontrol Rutin</h3>
                    <p>Lakukan pemeriksaan tekanan darah dan kolesterol secara rutin.</p>
                </div>
            @else
                <div class="data-card">
                    <h3>Pemeriksaan Berkala</h3>
                    <p>Lakukan pemeriksaan kesehatan jantung secara berkala setiap 6-12 bulan.</p>
                </div>
                <div class="data-card">
                    <h3>Menjaga Pola Makan</h3>
                    <p>Konsumsi makanan sehat tinggi serat, rendah lemak jenuh, dan rendah garam.</p>
                </div>
                <div class="data-card">
                    <h3>Aktivitas Fisik</h3>
                    <p>Lakukan aktivitas fisik moderat minimal 150 menit per minggu.</p>
                </div>
                <div class="data-card">
                    <h3>Gaya Hidup Sehat</h3>
                    <p>Hindari merokok, batasi konsumsi alkohol, kelola stres dengan baik.</p>
                </div>
            @endif
        </div>
        
        <!-- Disclaimer -->
        <div class="disclaimer">
            <p><strong>Perhatian:</strong> Hasil prediksi ini bersifat informatif dan tidak menggantikan diagnosis medis profesional. Silakan konsultasikan dengan dokter untuk evaluasi dan penanganan yang tepat.</p>
        </div>
        
        <!-- Footer -->
        <div class="footer">
            <p>Sistem Prediksi Kesehatan Jantung &copy; {{ date('Y') }}. Semua hak dilindungi.</p>
            <p>Dihasilkan secara otomatis pada {{ date('d/m/Y H:i') }} WIB.</p>
        </div>
    </div>
</body>
</html>