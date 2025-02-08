<!-- Main modal -->
<div id="terms-modal" data-modal-backdrop="static" tabindex="-1" aria-hidden="true"
    class="hidden fixed inset-0 z-50 items-center justify-center w-full h-full bg-black bg-opacity-50">
    <div class="relative p-6 w-full max-w-2xl bg-white rounded-lg shadow-lg dark:bg-gray-800">
        <!-- Modal header -->
        <div class="flex items-center justify-between pb-4 border-b border-gray-300 dark:border-gray-600">
            <h3 class="text-2xl font-semibold text-gray-900 dark:text-white">Terms & Conditions</h3>
            <button type="button"
                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg p-2 inline-flex items-center dark:hover:bg-gray-700 dark:hover:text-white"
                data-modal-hide="terms-modal">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
        <!-- Modal body -->
        <div class="py-4 space-y-4 text-gray-600 dark:text-gray-300 max-h-[60vh] overflow-y-auto">
            <p><strong>1. Penerimaan Syarat dan Ketentuan</strong><br>
                Dengan menggunakan website ini, Anda setuju untuk tunduk pada Syarat dan Ketentuan yang berlaku.</p>
            <p><strong>2. Layanan yang Disediakan</strong><br>
                Website ini menyediakan prediksi risiko serangan jantung menggunakan machine learning. Hasil
                prediksi hanya bersifat informatif dan bukan pengganti konsultasi medis profesional.</p>
            <p><strong>3. Batasan Tanggung Jawab</strong><br>
                Kami tidak bertanggung jawab atas keputusan medis yang diambil berdasarkan hasil prediksi dari
                website ini. Konsultasikan dengan tenaga medis untuk diagnosa yang lebih akurat.</p>
            <p><strong>4. Penggunaan Data</strong><br>
                Data yang diberikan akan digunakan hanya untuk kepentingan analisis prediksi dan tidak akan
                dibagikan ke pihak ketiga tanpa izin.</p>
            <p><strong>5. Hak Kekayaan Intelektual</strong><br>
                Semua konten dalam website ini dilindungi oleh hak cipta dan hak kekayaan intelektual lainnya.</p>
            <p><strong>6. Perubahan Syarat dan Ketentuan</strong><br>
                Kami berhak mengubah Syarat dan Ketentuan kapan saja. Dengan terus menggunakan layanan ini, Anda
                dianggap menyetujui perubahan tersebut.</p>
            <p><strong>7. Hukum yang Berlaku</strong><br>
                Syarat dan Ketentuan ini diatur sesuai dengan hukum Indonesia.</p>
        </div>
        <!-- Modal footer -->
        <div class="flex justify-end pt-4 border-t border-gray-300 dark:border-gray-600">
            <button type="button" data-modal-hide="terms-modal"
                class="px-5 py-2 text-white bg-blue-600 hover:bg-blue-700 rounded-lg text-sm font-medium focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-800"
                id="btnAcceptTerms">
                I Accept
            </button>
            <button type="button" data-modal-hide="terms-modal"
                class="px-5 py-2 ml-3 text-sm font-medium text-gray-700 bg-gray-200 rounded-lg hover:bg-gray-300 dark:bg-gray-700 dark:text-gray-300 dark:hover:bg-gray-600"
                id="btnDeclineTerms">
                Decline
            </button>
        </div>
    </div>
</div>
