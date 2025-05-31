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
            line-height: 1.6;
            color: #1f2937;
            background-color: #f9fafb;
            margin: 0;
            padding: 20px;
        }
        
        .container {
            max-width: 800px;
            margin: 20px auto; /* Menambah margin atas-bawah untuk tampilan browser */
            background-color: white;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            border-radius: 0.5rem;
            padding: 2rem; 
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
        .logo-container { display: flex; align-items: center; }
        .logo { height: 3rem; width: auto; margin-right: 1rem; }
        .header-text h1 { font-size: 1.5rem; font-weight: 700; color: #111827; margin: 0; }
        .header-text p { font-size: 0.875rem; color: #6b7280; margin: 0; }
        .date-container { text-align: right; font-size: 0.875rem; color: #6b7280; }
        
        /* Result Summary */
        .result-summary {
            display: flex;
            align-items: center;
            margin-bottom: 2rem;
            padding: 1.5rem;
            background-color: #f3f4f6;
            border-radius: 0.5rem;
            border-left-width: 5px; 
            border-left-style: solid;
        }
        .result-summary.is-risk { border-left-color: #ef4444; }
        .result-summary.is-risk .result-icon, .result-summary.is-risk .probability { color: #ef4444; }
        .result-summary.no-risk { border-left-color: #22c55e; }
        .result-summary.no-risk .result-icon, .result-summary.no-risk .probability { color: #22c55e; }
        .result-icon { font-size: 2.5rem; margin-right: 1.5rem; }
        .result-text { flex-grow: 1; }
        .result-text h2 { font-size: 1.25rem; font-weight: 600; margin: 0 0 0.25rem 0; }
        .result-text p { margin: 0; color: #4b5563; font-size: 0.9rem; }
        .probability { font-size: 2rem; font-weight: 700; margin-left: 1rem; }
        
        /* Section Title */
        .section-title {
            font-size: 1.375rem;
            font-weight: 600;
            margin: 2.5rem 0 1.5rem 0;
            color: #111827;
            border-bottom: 1px solid #e5e7eb;
            padding-bottom: 0.5rem;
        }
        
        /* Data Grid & Cards */
        .data-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 1.5rem; margin-bottom: 1.5rem; }
        .data-card { padding: 1.25rem; background-color: #f9fafb; border-radius: 0.5rem; border: 1px solid #e5e7eb; transition: box-shadow 0.3s ease; }
        .data-card:hover { box-shadow: 0 2px 8px rgba(0,0,0,0.08); }
        .data-card h3 { font-size: 1rem; font-weight: 600; margin: 0 0 0.5rem 0; color: #374151; }
        .data-card p { margin: 0; font-size: 0.9rem; color: #4b5563; }
        
        /* Data Table */
        .data-table { width: 100%; border-collapse: collapse; margin-top: 1.5rem; font-size: 0.875rem; box-shadow: 0 1px 3px rgba(0,0,0,0.05); border-radius: 0.5rem; overflow: hidden; }
        .data-table th { text-align: left; padding: 0.75rem 1rem; background-color: #f3f4f6; color: #374151; font-weight: 600; border-bottom: 2px solid #e5e7eb; }
        .data-table td { padding: 0.75rem 1rem; border-bottom: 1px solid #e5e7eb; color: #4b5563; }
        .data-table tr:last-child td { border-bottom: none; }
        .data-table tr:hover td { background-color: #f9fafb; }
        
        /* Footer & Disclaimer */
        .footer { margin-top: 3rem; padding-top: 1.5rem; border-top: 1px solid #e5e7eb; text-align: center; font-size: 0.8rem; color: #9ca3af; }
        .disclaimer { margin-top: 2rem; padding: 1rem; background-color: #fffbeb; border-radius: 0.375rem; border-left: 4px solid #f59e0b; font-size: 0.875rem; color: #92400e; }
        .disclaimer strong { color: #b45309; }
        
        /* Utility classes */
        .text-bold { font-weight: 600; }
        .text-danger { color: #ef4444; }
        .text-success { color: #22c55e; }

        /* Styling untuk Rekomendasi PDF */
        .rekomendasi-pdf-container { margin-top: 2.5rem; }
        .rekomendasi-pdf-main-title { font-size: 1.5rem; font-weight: 700; color: #111827; padding-bottom: 0.75rem; border-bottom: 1px solid #e5e7eb; margin-bottom: 1.5rem; }
        .rekomendasi-pdf-banner { padding: 1.5rem; border-radius: 0.5rem; margin-bottom: 2rem; border-left-width: 5px; border-left-style: solid; }
        .rekomendasi-pdf-banner.is-risk { background-color: #fee2e2; border-left-color: #ef4444; color: #991b1b; }
        .rekomendasi-pdf-banner.no-risk { background-color: #dcfce7; border-left-color: #22c55e; color: #14532d; }
        .rekomendasi-pdf-banner h3 { margin-top: 0; margin-bottom: 0.5rem; font-size: 1.25rem; font-weight: 600; }
        .rekomendasi-pdf-banner p { margin-bottom: 0; font-size: 0.9rem; }
        .rekomendasi-pdf-section { background-color: #fff; padding: 1.5rem; border: 1px solid #f3f4f6; border-radius: 0.5rem; margin-bottom: 1.5rem; }
        .rekomendasi-pdf-section h3 { font-size: 1.25rem; font-weight: 600; color: #374151; margin-top: 0; margin-bottom: 1rem; display: flex; align-items: center; }
        .rekomendasi-pdf-section h3 svg { width: 24px; height: 24px; margin-right: 0.75rem; color: #6b7280; } /* Warna ikon default */
        .rekomendasi-pdf-section ul { list-style-type: none; padding-left: 0; margin-bottom: 0; }
        .rekomendasi-pdf-section ul li { padding: 0.6rem 0; font-size: 0.9rem; color: #4b5563; border-bottom: 1px dashed #e5e7eb; display: flex; align-items: flex-start; }
        .rekomendasi-pdf-section ul li:last-child { border-bottom: none; }
        .rekomendasi-pdf-section ul li::before { content: "▹"; margin-right: 0.75rem; color: #6b7280; font-size: 1.2em; line-height: 1; }

        /* Aturan Cetak PDF */
        @media print {
            body {
                padding: 0; 
                background-color: #fff; 
                font-size: 10pt; 
                -webkit-print-color-adjust: exact !important; 
                color-adjust: exact !important; 
            }
            .container {
                max-width: 100%;
                margin: 0;
                padding: 20mm 15mm; 
                box-shadow: none;
                border-radius: 0;
            }
            .no-print-in-pdf { display: none !important; }

            .result-summary {
                page-break-after: always; /* Halaman baru setelah ringkasan hasil */
                page-break-inside: avoid; /* Usahakan ringkasan tidak terpotong */
            }
            
            .data-grid, .data-table, .data-card {
                page-break-inside: auto; /* Izinkan terpotong jika perlu, tapi data-card tunggal usahakan tidak */
            }
            .data-card {
                 page-break-inside: avoid; /* Khusus data card individual, usahakan tidak terpotong */
            }

            .interpretation-wrapper {
                page-break-inside: avoid; /* Jaga blok interpretasi tetap utuh */
                margin-top: 20px; /* Beri sedikit jarak jika pindah ke halaman baru */
            }
            .section-title {
                page-break-after: avoid; /* Jaga judul section dengan kontennya */
            }

            .rekomendasi-pdf-container {
                margin-top: 20px; /* Jarak jika interpretasi panjang dan ini di halaman baru */
            }
            .rekomendasi-pdf-banner {
                page-break-after: avoid; /* Jaga banner dengan section pertama jika muat */
            }
            /* Setiap section rekomendasi akan dimulai di halaman baru */
            .rekomendasi-pdf-banner + .rekomendasi-pdf-section,
            .rekomendasi-pdf-section + .rekomendasi-pdf-section {
                 page-break-before: always;
            }
            .rekomendasi-pdf-section {
                margin-top: 0; 
                border: none; 
                box-shadow: none;
                padding: 10mm 0 0 0; /* Atur padding internal section di PDF */
            }

            /* Penyesuaian font size untuk PDF */
            .rekomendasi-pdf-section h3, .rekomendasi-pdf-banner h3 { font-size: 12pt; }
            .rekomendasi-pdf-section ul li, .rekomendasi-pdf-banner p { font-size: 10pt; }
            .data-table { font-size: 9pt; }
            .data-table th, .data-table td { padding: 0.4rem; }
            h1 { font-size: 14pt; }
            .section-title { font-size: 13pt; }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="logo-container">
                <div class="logo">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="#3b82f6" width="48" height="48"><path fill-rule="evenodd" d="M11.25 4.5A6.75 6.75 0 004.5 11.25v1.5c0 3.73 2.06 6.924 5.015 8.446_A6.73 6.73 0 0012 21.75a6.73 6.73 0 002.485-.554C17.44 19.674 19.5 16.48 19.5 12.75v-1.5A6.75 6.75 0 0012.75 4.5h-1.5zm.062 3.994a.75.75 0 00-.938-.004l-3.075 2.116a.75.75 0 000 1.22l3.075 2.116a.75.75 0 00.938-.004c.22-.151.353-.397.353-.666V9.158c0-.27-.133-.515-.353-.664zm2.326 1.192a.75.75 0 01.938-.004L17.65 11.8a.75.75 0 010 1.22l-3.075 2.116a.75.75 0 01-.938-.004c-.22-.151-.353-.397-.353-.666v-3.07c0-.27.133-.515.353-.664z" clip-rule="evenodd" /><path d="M4.564 3.197A9.753 9.753 0 001.5 10.018V12.75a9.756 9.756 0 003.254 7.244L7.5 17.25V6.75l-2.936-2.553zm14.872 0L16.5 6.75v10.5l2.746 2.744A9.756 9.756 0 0022.5 12.75v-2.732a9.753 9.753 0 00-3.064-6.82z" /></svg>
                </div>
                <div class="header-text">
                    <h1>Hasil Prediksi Kesehatan Jantung</h1>
                    <p>Laporan Analisis Medis</p>
                </div>
            </div>
            <div class="date-container">
                <p>ID Prediksi: <span class="text-bold">PR-{{ date('Ymd') }}-{{ str_pad($prediction->id ?? '001', 3, '0', STR_PAD_LEFT) }}</span></p>
                <p>Tanggal: <span>{{ date('d M Y') }}</span></p>
            </div>
        </div>
        
        <div class="result-summary {{ ($prediction->prediction_result ?? 0) == 1 ? 'is-risk' : 'no-risk' }}">
            <div class="result-icon">
                @if (($prediction->prediction_result ?? 0) == 1)
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" width="48" height="48"><path d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75 9.75S17.385 2.25 12 2.25zm-1.72 6.97a.75.75 0 10-1.06 1.06L10.94 12l-1.72 1.72a.75.75 0 101.06 1.06L12 13.06l1.72 1.72a.75.75 0 101.06-1.06L13.06 12l1.72-1.72a.75.75 0 10-1.06-1.06L12 10.94l-1.72-1.72z" /></svg>
                @else
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" width="48" height="48"><path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zm13.36-1.814a.75.75 0 10-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 00-1.06 1.06l2.25 2.25a.75.75 0 001.14-.094l3.75-5.25z" clip-rule="evenodd" /></svg>
                @endif
            </div>
            <div class="result-text">
                <h2>
                    @if (($prediction->prediction_result ?? 0) == 1)
                        <span class="text-danger">Terdeteksi Risiko Penyakit Jantung</span>
                    @else
                        <span class="text-success">Tidak Terdeteksi Risiko Penyakit Jantung</span>
                    @endif
                </h2>
                <p>Berdasarkan data yang dimasukkan, sistem kami telah menganalisis dan memberikan hasil prediksi.</p>
            </div>
            <div class="probability">
                {{ number_format(($prediction->probability ?? 0) * 100, 1) }}%
            </div>
        </div>
        
        <h2 class="section-title">Data Pasien</h2>
        <div class="data-grid">
            <div class="data-card"><h3 >Nama Pasien</h3><p>{{ $users->name ?? 'N/A' }}</p></div>
            <div class="data-card"><h3 >Alamat</h3><p>{{ $users->alamat ?? 'N/A' }}</p></div>
            <div class="data-card"><h3 >Usia</h3><p>{{ $prediction->input_data['age'] ?? 'N/A' }} tahun</p></div>
            <div class="data-card"><h3 >Jenis Kelamin</h3><p>{{ isset($prediction->input_data['sex']) ? ($prediction->input_data['sex'] == '1' ? 'Laki-laki' : 'Perempuan') : 'N/A' }}</p></div>
        </div>
        
        <h2 class="section-title">Indikator Kesehatan Jantung Utama</h2>
        <div class="data-grid">
            <div class="data-card"><h3 >Tekanan Darah Istirahat</h3><p>{{ $prediction->input_data['trestbps'] ?? 'N/A' }} mmHg</p></div>
            <div class="data-card"><h3 >Kolesterol</h3><p>{{ $prediction->input_data['chol'] ?? 'N/A' }} mg/dl</p></div>
            <div class="data-card"><h3 >Gula Darah Puasa</h3><p>{{ isset($prediction->input_data['fbs']) ? ($prediction->input_data['fbs'] == '1' ? '> 120 mg/dl' : '≤ 120 mg/dl') : 'N/A' }}</p></div>
            <div class="data-card"><h3 >Detak Jantung Maksimum</h3><p>{{ $prediction->input_data['thalach'] ?? 'N/A' }} bpm</p></div>
        </div>
        
        <h2 class="section-title">Detail Data Medis Lengkap</h2>
        <table class="data-table">
            <thead><tr><th>Parameter</th><th>Nilai Input</th><th>Keterangan</th></tr></thead>
            <tbody>
                <tr><td>Usia</td><td>{{ $prediction->input_data['age'] ?? 'N/A' }}</td><td>Tahun</td></tr>
                <tr><td>Jenis Kelamin</td><td>{{ $prediction->input_data['sex'] ?? 'N/A' }}</td><td>{{ isset($prediction->input_data['sex']) ? ($prediction->input_data['sex'] == '1' ? 'Laki-laki' : 'Perempuan') : '-' }}</td></tr>
                <tr><td>Jenis Nyeri Dada (CP)</td><td>{{ $prediction->input_data['cp'] ?? 'N/A' }}</td><td>
                    @switch($prediction->input_data['cp'] ?? '')
                        @case('0') Angina Tipikal @break @case('1') Angina Atipikal @break
                        @case('2') Nyeri Non-Angina @break @case('3') Asimtomatik @break @default -
                    @endswitch
                </td></tr>
                <tr><td>Tekanan Darah Istirahat (trestbps)</td><td>{{ $prediction->input_data['trestbps'] ?? 'N/A' }}</td><td>mmHg</td></tr>
                <tr><td>Kolesterol (chol)</td><td>{{ $prediction->input_data['chol'] ?? 'N/A' }}</td><td>mg/dl</td></tr>
                <tr><td>Gula Darah Puasa > 120 mg/dl (fbs)</td><td>{{ $prediction->input_data['fbs'] ?? 'N/A' }}</td><td>{{ isset($prediction->input_data['fbs']) ? ($prediction->input_data['fbs'] == '1' ? 'Ya' : 'Tidak') : '-' }}</td></tr>
                <tr><td>Hasil EKG Istirahat (restecg)</td><td>{{ $prediction->input_data['restecg'] ?? 'N/A' }}</td><td>
                    @switch($prediction->input_data['restecg'] ?? '')
                        @case('0') Normal @break @case('1') Abnormalitas ST-T @break
                        @case('2') Hipertrofi Ventrikel Kiri @break @default -
                    @endswitch
                </td></tr>
                <tr><td>Detak Jantung Maksimum (thalach)</td><td>{{ $prediction->input_data['thalach'] ?? 'N/A' }}</td><td>bpm</td></tr>
                <tr><td>Angina Akibat Latihan (exang)</td><td>{{ $prediction->input_data['exang'] ?? 'N/A' }}</td><td>{{ isset($prediction->input_data['exang']) ? ($prediction->input_data['exang'] == '1' ? 'Ya' : 'Tidak') : '-' }}</td></tr>
                <tr><td>ST Depression (oldpeak)</td><td>{{ $prediction->input_data['oldpeak'] ?? 'N/A' }}</td><td>mm</td></tr>
                <tr><td>Slope ST Segment (slope)</td><td>{{ $prediction->input_data['slope'] ?? 'N/A' }}</td><td>
                    @switch($prediction->input_data['slope'] ?? '')
                        @case('0') Upsloping @break @case('1') Flat @break
                        @case('2') Downsloping @break @default -
                    @endswitch
                </td></tr>
                <tr><td>Jumlah Pembuluh Darah Utama (ca)</td><td>{{ $prediction->input_data['ca'] ?? 'N/A' }}</td><td>Pembuluh</td></tr>
                <tr><td>Thalassemia (thal)</td><td>{{ $prediction->input_data['thal'] ?? 'N/A' }}</td><td>
                    @switch($prediction->input_data['thal'] ?? '')
                        @case('0') Null @break @case('1') Normal @break {{-- Sesuai dataset Kaggle umum --}}
                        @case('2') Fixed Defect @break @case('3') Reversible Defect @break @default -
                    @endswitch
                </td></tr>
            </tbody>
        </table>
        
        <div class="interpretation-wrapper">
            <h2 class="section-title">Interpretasi Hasil</h2>
            <div class="data-card" style="background-color: #f0f9ff; border-color: #7dd3fc;">
                <p style="color: #0c4a6e; font-size: 0.95rem;">
                    @if (($prediction->prediction_result ?? 0) == 1)
                        Berdasarkan data yang dianalisis, terindikasi Anda <strong class="text-danger">memiliki risiko penyakit jantung</strong> dengan tingkat probabilitas <strong class="text-danger">{{ number_format(($prediction->probability ?? 0) * 100, 1) }}%</strong>. 
                        Beberapa faktor yang mungkin berkontribusi pada hasil ini dapat meliputi
                        @if (isset($prediction->input_data['age']) && $prediction->input_data['age'] > 55) usia ({{ $prediction->input_data['age'] }} tahun), @endif
                        @if (isset($prediction->input_data['chol']) && $prediction->input_data['chol'] > 200) tingkat kolesterol ({{ $prediction->input_data['chol'] }} mg/dl), @endif
                        @if (isset($prediction->input_data['trestbps']) && $prediction->input_data['trestbps'] > 130) tekanan darah ({{ $prediction->input_data['trestbps'] }} mmHg), @endif
                        @if (isset($prediction->input_data['cp']) && ($prediction->input_data['cp'] == '0' || $prediction->input_data['cp'] == '1')) jenis nyeri dada tertentu, @endif
                        atau kombinasi faktor risiko lainnya yang tercatat. <strong class="text-danger">Penting untuk segera mendiskusikan hasil ini dengan dokter.</strong>
                    @else
                        Berdasarkan data yang dianalisis, <strong class="text-success">tidak ditemukan indikasi signifikan adanya risiko penyakit jantung saat ini</strong>. Probabilitas risiko Anda adalah <strong class="text-success">{{ number_format(($prediction->probability ?? 0) * 100, 1) }}%</strong>.
                        Meskipun demikian, tetap sangat disarankan untuk secara konsisten menjaga gaya hidup sehat dan melakukan pemeriksaan kesehatan secara berkala untuk pencegahan di masa depan.
                    @endif
                </p>
            </div>
        </div>
        
        <div class="rekomendasi-pdf-container">
            <h2 class="rekomendasi-pdf-main-title">Rekomendasi Lengkap untuk Anda</h2>

            @if (($prediction->prediction_result ?? 0) == 1)
                <div class="rekomendasi-pdf-banner is-risk">
                    <h3>Rekomendasi Penting Terkait Hasil Prediksi Risiko Penyakit Jantung Anda</h3>
                    <p>Hasil prediksi menunjukkan Anda memiliki faktor risiko. Mohon perhatikan poin-poin di bawah ini dan <strong>segera konsultasikan hasil ini dengan dokter.</strong></p>
                </div>
                <div class="rekomendasi-pdf-section">
                    <h3><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M13.5 4.06c0-1.313-1.063-2.375-2.375-2.375S8.75 2.747 8.75 4.06v.706c-1.121.307-2.114.91-2.899 1.728L4.94 5.582a.75.75 0 00-1.06 1.06l.912.912A4.482 4.482 0 004.06 9.75H3.75a.75.75 0 000 1.5h.31c.044.64.218 1.252.496 1.807l-.944.943a.75.75 0 101.06 1.06l.944-.943c.48.344 1.027.603 1.603.766v.289c0 .69.56 1.25 1.25 1.25h1.5c.69 0 1.25-.56 1.25-1.25v-.289c.576-.163 1.123-.422 1.603-.766l.944.943a.75.75 0 101.06-1.06l-.944-.943a4.483 4.483 0 00.496-1.807h.31a.75.75 0 000-1.5h-.31a4.483 4.483 0 00-.732-2.198l.912-.912a.75.75 0 00-1.06-1.06l-.912.912c-.785-.817-1.778-1.42-2.899-1.728V4.06zM12 15a3 3 0 100-6 3 3 0 000 6z" /></svg>Aktivitas & Olahraga</h3>
                    <ul><li>Segera konsultasikan dengan dokter mengenai jenis dan intensitas aktivitas fisik yang aman untuk Anda.</li><li>Hindari aktivitas fisik berat atau mendadak sebelum berkonsultasi dengan dokter.</li><li>Jika dokter menyetujui, mulailah olahraga ringan secara bertahap dan teratur (misalnya jalan kaki 30 menit setiap hari).</li></ul>
                </div>
                <div class="rekomendasi-pdf-section">
                    <h3><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path fill-rule="evenodd" d="M11.25 2.25c-1.421 0-2.703.462-3.786 1.225-.399.287-.78.597-1.145.922-.042.038-.083.077-.124.117A9.737 9.737 0 003.02 6.15C1.827 7.514 1.125 9.282 1.125 11.25c0 1.968.702 3.736 1.895 5.1 1.194 1.364 2.867 2.288 4.74 2.626.14.026.282.05.426.073A9.714 9.714 0 0012 21.75c1.421 0 2.703-.462 3.786-1.225.399-.287.78-.597 1.145-.922-.042-.038-.083.077-.124-.117A9.737 9.737 0 0020.98 17.85c1.193-1.364 1.895-3.132 1.895-5.1s-.702-3.736-1.895-5.1c-1.194-1.364-2.867-2.288-4.74-2.626a9.32 9.32 0 00-.426-.073A9.714 9.714 0 0012 2.25zm3.709 10.413a.75.75 0 01.026 1.06l-2.25 3a.75.75 0 01-1.086.026l-1.5-1.5a.75.75 0 111.06-1.06l.97.97 1.72-2.293a.75.75 0 011.06-.026z" clip-rule="evenodd" /></svg>Pemeriksaan Kesehatan</h3>
                    <ul><li><strong>Sangat penting untuk segera berkonsultasi dengan dokter atau spesialis jantung</strong> untuk evaluasi lebih lanjut dan konfirmasi diagnosis.</li><li>Diskusikan hasil prediksi ini dengan dokter Anda secara detail.</li><li>Lakukan pemeriksaan tambahan yang mungkin dianjurkan dokter (misalnya EKG, tes darah lengkap, echocardiogram, tes stres).</li><li>Patuhi jadwal kontrol dan pengobatan yang diberikan dokter.</li></ul>
                </div>
                <div class="rekomendasi-pdf-section">
                    <h3><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M15.75 2.25a.75.75 0 00-1.5 0v1.299A8.972 8.972 0 003.82 7.876a.75.75 0 00-.599.918 7.474 7.474 0 001.585 3.599A8.99 8.99 0 0012 21.75a8.99 8.99 0 008.194-9.357 7.474 7.474 0 001.586-3.599.75.75 0 00-.599-.918A8.972 8.972 0 0017.25 3.55V2.25zM12 11.25a3.75 3.75 0 100 7.5 3.75 3.75 0 000-7.5z" /><path d="M11.599 3.009A.75.75 0 0012 3.75v3.038c.553 0 1.078.123 1.552.346a.75.75 0 10.696-1.383C13.578 5.346 12.806 5.25 12 5.25V3.75a.75.75 0 00-.401-.681z" /></svg>Pola Makan Sehat</h3>
                    <ul><li>Dokter atau ahli gizi kemungkinan akan merekomendasikan diet khusus (misalnya rendah garam, rendah lemak jenuh, rendah kolesterol). Patuhi dengan disiplin.</li><li>Perbanyak konsumsi buah-buahan, sayuran, biji-bijian utuh, dan protein tanpa lemak (ikan, ayam tanpa kulit).</li><li>Hindari makanan olahan, tinggi gula, minuman manis, dan lemak trans.</li><li>Batasi konsumsi daging merah dan produk susu tinggi lemak.</li></ul>
                </div>
                <div class="rekomendasi-pdf-section">
                    <h3><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M12.75 12.75a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm-.062 3.062a.75.75 0 10-1.375-.562 4.5 4.5 0 00-1.687 3.302.75.75 0 00.562 1.375 4.5 4.5 0 003.302-1.688.75.75 0 00-.563-1.375 4.5 4.5 0 00-1.239-.998V12.75A6 6 0 006.75 6.75a.75.75 0 00-1.5 0 7.5 7.5 0 017.5 7.5v3.062zm-3.062-3.062a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm3.812-6.812a.75.75 0 00-1.06-1.06L9.375 9.06C8.06 9.06 6.938 10.182 6.938 11.5c0 1.217.986 2.205 2.187 2.422a.75.75 0 10.25-1.472A1.005 1.005 0 018.438 11.5c0-.585.477-1.062 1.062-1.062h3.313a.75.75 0 00.53-1.28l-2.437-2.438z" /></svg>Mental & Sosial</h3>
                    <ul><li>Mengelola stres menjadi sangat penting. Cari teknik relaksasi yang cocok (misalnya meditasi, yoga ringan, atau hobi).</li><li>Pastikan istirahat dan tidur yang cukup dan berkualitas.</li><li>Jangan ragu untuk mencari dukungan emosional dari keluarga, teman, atau profesional jika merasa cemas atau tertekan.</li><li>Jika Anda merokok, segera buat rencana untuk berhenti. Hindari paparan asap rokok.</li></ul>
                </div>
            @else
                <div class="rekomendasi-pdf-banner no-risk">
                    <h3>Rekomendasi untuk Menjaga Kesehatan Jantung</h3>
                    <p>Pertahankan gaya hidup sehat untuk mencegah penyakit jantung di masa depan.</p>
                </div>
                <div class="rekomendasi-pdf-section">
                    <h3><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M13.5 4.06c0-1.313-1.063-2.375-2.375-2.375S8.75 2.747 8.75 4.06v.706c-1.121.307-2.114.91-2.899 1.728L4.94 5.582a.75.75 0 00-1.06 1.06l.912.912A4.482 4.482 0 004.06 9.75H3.75a.75.75 0 000 1.5h.31c.044.64.218 1.252.496 1.807l-.944.943a.75.75 0 101.06 1.06l.944-.943c.48.344 1.027.603 1.603.766v.289c0 .69.56 1.25 1.25 1.25h1.5c.69 0 1.25-.56 1.25-1.25v-.289c.576-.163 1.123-.422 1.603-.766l.944.943a.75.75 0 101.06-1.06l-.944-.943a4.483 4.483 0 00.496-1.807h.31a.75.75 0 000-1.5h-.31a4.483 4.483 0 00-.732-2.198l.912-.912a.75.75 0 00-1.06-1.06l-.912.912c-.785-.817-1.778-1.42-2.899-1.728V4.06zM12 15a3 3 0 100-6 3 3 0 000 6z" /></svg>Aktivitas & Olahraga</h3>
                    <ul><li>Jaga gaya hidup sehat secara keseluruhan.</li><li>Terus aktif bergerak dan berolahraga secara teratur (misalnya, minimal 150 menit aktivitas aerobik intensitas sedang per minggu).</li><li>Pilih aktivitas yang Anda nikmati agar konsisten.</li></ul>
                </div>
                <div class="rekomendasi-pdf-section">
                    <h3><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path fill-rule="evenodd" d="M11.25 2.25c-1.421 0-2.703.462-3.786 1.225-.399.287-.78.597-1.145.922-.042.038-.083.077-.124.117A9.737 9.737 0 003.02 6.15C1.827 7.514 1.125 9.282 1.125 11.25c0 1.968.702 3.736 1.895 5.1 1.194 1.364 2.867 2.288 4.74 2.626.14.026.282.05.426.073A9.714 9.714 0 0012 21.75c1.421 0 2.703-.462 3.786-1.225.399-.287.78-.597 1.145-.922-.042-.038-.083.077-.124-.117A9.737 9.737 0 0020.98 17.85c1.193-1.364 1.895-3.132 1.895-5.1s-.702-3.736-1.895-5.1c-1.194-1.364-2.867-2.288-4.74-2.626a9.32 9.32 0 00-.426-.073A9.714 9.714 0 0012 2.25zm3.709 10.413a.75.75 0 01.026 1.06l-2.25 3a.75.75 0 01-1.086.026l-1.5-1.5a.75.75 0 111.06-1.06l.97.97 1.72-2.293a.75.75 0 011.06-.026z" clip-rule="evenodd" /></svg>Pemeriksaan Kesehatan</h3>
                    <ul><li>Rutin cek kesehatan secara berkala (misalnya, tekanan darah, kolesterol, gula darah) sesuai anjuran usia dan faktor risiko Anda.</li><li>Konsultasikan gaya hidup dengan ahli gizi/dokter untuk saran pencegahan yang lebih personal.</li><li>Jangan abaikan gejala baru atau yang tidak biasa, segera periksakan ke dokter.</li></ul>
                </div>
                <div class="rekomendasi-pdf-section">
                    <h3><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M15.75 2.25a.75.75 0 00-1.5 0v1.299A8.972 8.972 0 003.82 7.876a.75.75 0 00-.599.918 7.474 7.474 0 001.585 3.599A8.99 8.99 0 0012 21.75a8.99 8.99 0 008.194-9.357 7.474 7.474 0 001.586-3.599.75.75 0 00-.599-.918A8.972 8.972 0 0017.25 3.55V2.25zM12 11.25a3.75 3.75 0 100 7.5 3.75 3.75 0 000-7.5z" /><path d="M11.599 3.009A.75.75 0 0012 3.75v3.038c.553 0 1.078.123 1.552.346a.75.75 0 10.696-1.383C13.578 5.346 12.806 5.25 12 5.25V3.75a.75.75 0 00-.401-.681z" /></svg>Pola Makan Sehat</h3>
                    <ul><li>Hindari pola makan yang tidak sehat (tinggi lemak jenuh, lemak trans, dan makanan olahan).</li><li>Batasi konsumsi gula tambahan, garam (natrium), dan lemak jenuh.</li><li>Jaga berat badan ideal melalui diet seimbang dan porsi yang terkontrol.</li><li>Perbanyak konsumsi sayuran, buah-buahan, biji-bijian utuh, dan sumber protein sehat.</li></ul>
                </div>
                <div class="rekomendasi-pdf-section">
                    <h3><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M12.75 12.75a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm-.062 3.062a.75.75 0 10-1.375-.562 4.5 4.5 0 00-1.687 3.302.75.75 0 00.562 1.375 4.5 4.5 0 003.302-1.688.75.75 0 00-.563-1.375 4.5 4.5 0 00-1.239-.998V12.75A6 6 0 006.75 6.75a.75.75 0 00-1.5 0 7.5 7.5 0 017.5 7.5v3.062zm-3.062-3.062a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm3.812-6.812a.75.75 0 00-1.06-1.06L9.375 9.06C8.06 9.06 6.938 10.182 6.938 11.5c0 1.217.986 2.205 2.187 2.422a.75.75 0 10.25-1.472A1.005 1.005 0 018.438 11.5c0-.585.477-1.062 1.062-1.062h3.313a.75.75 0 00.53-1.28l-2.437-2.438z" /></svg>Mental & Sosial</h3>
                    <ul><li>Kelola stres dengan baik melalui teknik relaksasi, hobi, atau aktivitas yang menyenangkan.</li><li>Perhatikan kualitas tidur yang cukup dan teratur (7-8 jam setiap malam).</li><li>Jangan merokok dan hindari paparan asap rokok (perokok pasif).</li><li>Batasi konsumsi alkohol.</li></ul>
                </div>
            @endif
        </div>
        
        <div class="disclaimer">
            <p><strong>Perhatian Penting:</strong> Hasil prediksi ini dibuat berdasarkan model kecerdasan buatan dan data yang Anda masukkan. Ini bersifat informatif dan BUKAN merupakan diagnosis medis final. Silakan segera konsultasikan dengan dokter atau tenaga medis profesional untuk evaluasi menyeluruh, diagnosis yang akurat, dan rencana penanganan yang tepat.</p>
        </div>
        
        <div class="footer">
            <p>{{ config('app.name', 'Aplikasi Prediksi Jantung') }} &copy; {{ date('Y') }}. Semua hak dilindungi.</p>
            <p>Laporan ini dihasilkan secara otomatis pada {{ date('d M Y, H:i') }} WIB.</p>
        </div>
    </div>
</body>
</html>