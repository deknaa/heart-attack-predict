<x-app-layout>
    <div class="p-14 sm:ml-64">
        <main>
            <div class="py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
                {{-- tabs --}}
                <div class="px-4 mb-6 sm:px-0">
                    <div class="border-b border-gray-200">
                        <nav class="flex -mb-px space-x-8">
                            <a href="#"
                                class="px-1 pb-4 text-sm font-medium text-indigo-600 border-b-2 border-indigo-500 whitespace-nowrap">
                                Semua
                            </a>
                            <a href="#"
                                class="px-1 pb-4 text-sm font-medium text-gray-500 border-b-2 border-transparent hover:text-gray-700 hover:border-gray-300 whitespace-nowrap">
                                Penting
                            </a>
                            <a href="#"
                                class="px-1 pb-4 text-sm font-medium text-gray-500 border-b-2 border-transparent hover:text-gray-700 hover:border-gray-300 whitespace-nowrap">
                                Akademik
                            </a>
                            <a href="#"
                                class="px-1 pb-4 text-sm font-medium text-gray-500 border-b-2 border-transparent hover:text-gray-700 hover:border-gray-300 whitespace-nowrap">
                                Umum
                            </a>
                        </nav>
                    </div>
                </div>

                {{-- announcements list --}}
                <div class="px-4 sm:px-0">
                    <div class="space-y-4">

                        <div
                            class="overflow-hidden transition-shadow duration-300 bg-white border-l-4 border-red-500 rounded-lg shadow hover:shadow-md">
                            <div class="px-4 py-5 sm:p-6">
                                <div class="flex items-start">
                                    <div class="flex-shrink-0">
                                        <span
                                            class="inline-flex items-center justify-center w-10 h-10 bg-red-100 rounded-full">
                                            <i class="text-red-600 fas fa-exclamation-circle"></i>
                                        </span>
                                    </div>
                                    <div class="flex-1 ml-4">
                                        <div class="flex items-center justify-between">
                                            <h3 class="text-lg font-medium leading-6 text-gray-900">
                                                Perpanjangan Batas Waktu Pembayaran UKT Semester Genap 2024/2025
                                            </h3>
                                            <span
                                                class="inline-flex px-2 text-xs font-semibold leading-5 text-red-800 bg-red-100 rounded-full">
                                                Penting
                                            </span>
                                        </div>
                                        <p class="mt-1 text-sm text-gray-500 line-clamp-2">
                                            Diberitahukan kepada seluruh mahasiswa bahwa batas waktu pembayaran UKT
                                            Semester Genap 2024/2025 diperpanjang hingga tanggal 15 Maret 2025. Harap
                                            segera menyelesaikan...
                                        </p>
                                        <div class="flex items-center justify-between mt-2">
                                            <div class="flex items-center text-sm text-gray-500">
                                                <i class="fas fa-calendar-alt mr-1.5 text-gray-400"></i>
                                                <span>5 Maret 2025</span>
                                                <span class="mx-1.5">•</span>
                                                <i class="fas fa-user mr-1.5 text-gray-400"></i>
                                                <span>Bagian Keuangan</span>
                                            </div>
                                            <a href="#"
                                                class="text-sm font-medium text-indigo-600 hover:text-indigo-500">
                                                Baca selengkapnya <i class="ml-1 fas fa-arrow-right"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div
                            class="overflow-hidden transition-shadow duration-300 bg-white border-l-4 border-blue-500 rounded-lg shadow hover:shadow-md">
                            <div class="px-4 py-5 sm:p-6">
                                <div class="flex items-start">
                                    <div class="flex-shrink-0">
                                        <span
                                            class="inline-flex items-center justify-center w-10 h-10 bg-blue-100 rounded-full">
                                            <i class="text-blue-600 fas fa-book"></i>
                                        </span>
                                    </div>
                                    <div class="flex-1 ml-4">
                                        <div class="flex items-center justify-between">
                                            <h3 class="text-lg font-medium leading-6 text-gray-900">
                                                Jadwal Ujian Tengah Semester Genap 2024/2025
                                            </h3>
                                            <span
                                                class="inline-flex px-2 text-xs font-semibold leading-5 text-blue-800 bg-blue-100 rounded-full">
                                                Akademik
                                            </span>
                                        </div>
                                        <p class="mt-1 text-sm text-gray-500 line-clamp-2">
                                            Jadwal Ujian Tengah Semester (UTS) Genap Tahun Akademik 2024/2025 akan
                                            dilaksanakan pada tanggal 1-12 April 2025. Mahasiswa diharapkan memeriksa
                                            jadwal di SIAKAD dan...
                                        </p>
                                        <div class="flex items-center justify-between mt-2">
                                            <div class="flex items-center text-sm text-gray-500">
                                                <i class="fas fa-calendar-alt mr-1.5 text-gray-400"></i>
                                                <span>1 Maret 2025</span>
                                                <span class="mx-1.5">•</span>
                                                <i class="fas fa-user mr-1.5 text-gray-400"></i>
                                                <span>Bagian Akademik</span>
                                            </div>
                                            <a href="#"
                                                class="text-sm font-medium text-indigo-600 hover:text-indigo-500">
                                                Baca selengkapnya <i class="ml-1 fas fa-arrow-right"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div
                            class="overflow-hidden transition-shadow duration-300 bg-white border-l-4 border-green-500 rounded-lg shadow hover:shadow-md">
                            <div class="px-4 py-5 sm:p-6">
                                <div class="flex items-start">
                                    <div class="flex-shrink-0">
                                        <span
                                            class="inline-flex items-center justify-center w-10 h-10 bg-green-100 rounded-full">
                                            <i class="text-green-600 fas fa-bullhorn"></i>
                                        </span>
                                    </div>
                                    <div class="flex-1 ml-4">
                                        <div class="flex items-center justify-between">
                                            <h3 class="text-lg font-medium leading-6 text-gray-900">
                                                Seminar Karir dan Bursa Kerja Virtual 2025
                                            </h3>
                                            <span
                                                class="inline-flex px-2 text-xs font-semibold leading-5 text-green-800 bg-green-100 rounded-full">
                                                Umum
                                            </span>
                                        </div>
                                        <p class="mt-1 text-sm text-gray-500 line-clamp-2">
                                            Pusat Karir akan menyelenggarakan Seminar Karir dan Bursa Kerja Virtual pada
                                            tanggal 20-25 Maret 2025. Acara ini akan diikuti oleh lebih dari 50
                                            perusahaan dari berbagai sektor industri...
                                        </p>
                                        <div class="flex items-center justify-between mt-2">
                                            <div class="flex items-center text-sm text-gray-500">
                                                <i class="fas fa-calendar-alt mr-1.5 text-gray-400"></i>
                                                <span>28 Februari 2025</span>
                                                <span class="mx-1.5">•</span>
                                                <i class="fas fa-user mr-1.5 text-gray-400"></i>
                                                <span>Pusat Karir</span>
                                            </div>
                                            <a href="#"
                                                class="text-sm font-medium text-indigo-600 hover:text-indigo-500">
                                                Baca selengkapnya <i class="ml-1 fas fa-arrow-right"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div
                            class="overflow-hidden transition-shadow duration-300 bg-white border-l-4 border-green-500 rounded-lg shadow hover:shadow-md">
                            <div class="px-4 py-5 sm:p-6">
                                <div class="flex items-start">
                                    <div class="flex-shrink-0">
                                        <span
                                            class="inline-flex items-center justify-center w-10 h-10 bg-green-100 rounded-full">
                                            <i class="text-green-600 fas fa-bullhorn"></i>
                                        </span>
                                    </div>
                                    <div class="flex-1 ml-4">
                                        <div class="flex items-center justify-between">
                                            <h3 class="text-lg font-medium leading-6 text-gray-900">
                                                Pemeliharaan Sistem Informasi Kampus
                                            </h3>
                                            <span
                                                class="inline-flex px-2 text-xs font-semibold leading-5 text-green-800 bg-green-100 rounded-full">
                                                Umum
                                            </span>
                                        </div>
                                        <p class="mt-1 text-sm text-gray-500 line-clamp-2">
                                            Diberitahukan bahwa akan dilakukan pemeliharaan Sistem Informasi Kampus pada
                                            tanggal 13-14 Maret 2025. Selama periode tersebut, layanan SIAKAD, email,
                                            dan perpustakaan digital tidak dapat diakses...
                                        </p>
                                        <div class="flex items-center justify-between mt-2">
                                            <div class="flex items-center text-sm text-gray-500">
                                                <i class="fas fa-calendar-alt mr-1.5 text-gray-400"></i>
                                                <span>27 Februari 2025</span>
                                                <span class="mx-1.5">•</span>
                                                <i class="fas fa-user mr-1.5 text-gray-400"></i>
                                                <span>DPTSI</span>
                                            </div>
                                            <a href="#"
                                                class="text-sm font-medium text-indigo-600 hover:text-indigo-500">
                                                Baca selengkapnya <i class="ml-1 fas fa-arrow-right"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Pagination --}}
                    <div
                        class="flex items-center justify-between px-4 py-3 mt-4 bg-white border-t border-gray-200 rounded-lg shadow sm:px-6">
                        <div class="flex justify-between flex-1 sm:hidden">
                            <a href="#"
                                class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-50">
                                Sebelumnya
                            </a>
                            <a href="#"
                                class="relative inline-flex items-center px-4 py-2 ml-3 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-50">
                                Selanjutnya
                            </a>
                        </div>
                        <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
                            <div>
                                <p class="text-sm text-gray-700">
                                    Menampilkan <span class="font-medium">1</span> sampai <span
                                        class="font-medium">4</span> dari <span class="font-medium">12</span>
                                    pengumuman
                                </p>
                            </div>
                            <div>
                                <nav class="relative z-0 inline-flex -space-x-px rounded-md shadow-sm"
                                    aria-label="Pagination">
                                    <a href="#"
                                        class="relative inline-flex items-center px-2 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-l-md hover:bg-gray-50">
                                        <span class="sr-only">Sebelumnya</span>
                                        <i class="text-xs fas fa-chevron-left"></i>
                                    </a>
                                    <a href="#" aria-current="page"
                                        class="relative z-10 inline-flex items-center px-4 py-2 text-sm font-medium text-indigo-600 border border-indigo-500 bg-indigo-50">
                                        1
                                    </a>
                                    <a href="#"
                                        class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 hover:bg-gray-50">
                                        2
                                    </a>
                                    <a href="#"
                                        class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 hover:bg-gray-50">
                                        3
                                    </a>
                                    <span
                                        class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300">
                                        ...
                                    </span>
                                    <a href="#"
                                        class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 hover:bg-gray-50">
                                        8
                                    </a>
                                    <a href="#"
                                        class="relative inline-flex items-center px-2 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-r-md hover:bg-gray-50">
                                        <span class="sr-only">Selanjutnya</span>
                                        <i class="text-xs fas fa-chevron-right"></i>
                                    </a>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</x-app-layout>
