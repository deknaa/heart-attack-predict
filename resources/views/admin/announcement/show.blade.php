<x-app-layout>
    <div class="p-14 sm:ml-64">
        {{-- breadcrumb --}}
        <div class="px-4 py-3 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <nav class="flex" aria-label="Breadcrumb">
                <ol class="flex items-center space-x-2">
                    <li>
                        <div>
                            <a href="#" class="text-gray-400 hover:text-gray-500">
                                <i class="fas fa-home"></i>
                                <span class="sr-only">Beranda</span>
                            </a>
                        </div>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <i class="text-xs text-gray-400 fas fa-chevron-right"></i>
                            <a href="{{ route('announcement.index') }}"
                                class="ml-2 text-sm font-medium text-gray-500 hover:text-gray-700">Pengumuman</a>
                        </div>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <i class="text-xs text-gray-400 fas fa-chevron-right"></i>
                            <a href="#"
                                class="ml-2 text-sm font-medium text-gray-500 hover:text-gray-700">Penting</a>
                        </div>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <i class="text-xs text-gray-400 fas fa-chevron-right"></i>
                            <span class="ml-2 text-sm font-medium text-gray-700"
                                aria-current="page">{{ $announcement->title }}</span>
                        </div>
                    </li>
                </ol>
            </nav>
        </div>

        <!-- Main content -->
        <main>
            <div class="py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="px-4 sm:px-0">

                    <!-- Header with metadata -->
                    <div class="overflow-hidden bg-white rounded-lg shadow">
                        <div class="px-4 py-5 border-b border-gray-200 sm:px-6">
                            <div class="flex flex-wrap items-center sm:flex-nowrap">
                                <div class="flex-grow">
                                    <div class="flex items-start">
                                        <div class="flex-shrink-0">
                                            <span
                                                class="inline-flex items-center justify-center w-12 h-12 bg-red-100 rounded-full">
                                                <i class="text-xl text-red-600 fas fa-exclamation-circle"></i>
                                            </span>
                                        </div>
                                        <div class="ml-4">
                                            <h1 class="text-xl font-bold text-gray-900 sm:text-2xl">
                                                {{ $announcement->title }}
                                            </h1>
                                            <div
                                                class="flex flex-col mt-1 sm:flex-row sm:flex-wrap sm:mt-0 sm:space-x-6">
                                                <div class="flex items-center mt-2 text-sm text-gray-500">
                                                    <i class="mr-2 text-gray-400 fas fa-calendar-alt"></i>
                                                    <span>Dipublikasikan:
                                                        {{ $announcement->created_at->diffForHumans() }}</span>
                                                </div>
                                                <div class="flex items-center mt-2 ml-2 text-sm text-gray-500">
                                                    <i class="mr-2 text-gray-400 fas fa-user"></i>
                                                    <span>Dibuat oleh:</span>
                                                </div>
                                                <div class="flex items-center mt-2 ml-2 text-sm">
                                                    <span
                                                        class="inline-flex px-2 text-xs font-semibold leading-5 text-red-800 bg-red-100 rounded-full">
                                                        Penting
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-4 sm:mt-0">
                                    <a href="#"
                                        class="inline-flex items-center px-3 py-2 text-sm font-medium leading-4 text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                        <i class="mr-2 fas fa-print"></i>
                                        Cetak
                                    </a>
                                    <button type="button"
                                        class="inline-flex items-center px-3 py-2 ml-3 text-sm font-medium leading-4 text-white bg-indigo-600 border border-transparent rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                        <i class="mr-2 fas fa-share-alt"></i>
                                        Bagikan
                                    </button>
                                </div>
                            </div>
                        </div>

                        {{-- Content --}}
                        <div class="px-4 py-5 prose sm:p-6 max-w-none">
                            <div class="space-y-6 text-gray-700">
                                {!! $announcement->content !!}
                            </div>
                        </div>

                        {{-- Attachments --}}
                        @if ($announcement->attachment)
                            <div class="px-4 py-5 border-t border-gray-200 sm:px-6">
                                <h3 class="text-lg font-medium text-gray-900">Lampiran</h3>
                                <div class="mt-4 space-y-3">
                                    <div class="flex items-center text-sm">
                                        <i class="mr-3 text-lg text-red-500 fas fa-file-pdf"></i>
                                        <div class="flex-grow">
                                            <span class="font-medium">Surat Edaran Perpanjangan UKT.pdf</span>
                                            <span class="ml-2 text-gray-500">(1.2 MB)</span>
                                        </div>
                                        <a href="#" class="text-indigo-600 hover:text-indigo-900">
                                            <i class="fas fa-download"></i>
                                        </a>
                                    </div>
                                    <div class="flex items-center text-sm">
                                        <i class="mr-3 text-lg text-green-600 fas fa-file-excel"></i>
                                        <div class="flex-grow">
                                            <span class="font-medium">Jadwal Pembayaran UKT.xlsx</span>
                                            <span class="ml-2 text-gray-500">(450 KB)</span>
                                        </div>
                                        <a href="#" class="text-indigo-600 hover:text-indigo-900">
                                            <i class="fas fa-download"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @else
                            <span></span>
                        @endif

                        {{-- Related announcement --}}
                        {{-- <div class="px-4 py-5 border-t border-gray-200 rounded-b-lg sm:px-6 bg-gray-50">
                                <h3 class="mb-4 text-lg font-medium text-gray-900">Pengumuman Terkait</h3>
                                <div class="space-y-3">
                                    <a href="#"
                                        class="block p-3 transition duration-150 rounded-md hover:bg-gray-100">
                                        <div class="flex items-start">
                                            <i class="mt-1 mr-3 text-gray-400 fas fa-link"></i>
                                            <div>
                                                <p class="text-sm font-medium text-indigo-600">Jadwal Pengisian KRS
                                                    Semester Genap 2024/2025</p>
                                                <p class="mt-1 text-xs text-gray-500">20 Februari 2025 • Bagian
                                                    Akademik</p>
                                            </div>
                                        </div>
                                    </a>
                                    <a href="#"
                                        class="block p-3 transition duration-150 rounded-md hover:bg-gray-100">
                                        <div class="flex items-start">
                                            <i class="mt-1 mr-3 text-gray-400 fas fa-link"></i>
                                            <div>
                                                <p class="text-sm font-medium text-indigo-600">Panduan Pengajuan
                                                    Keringanan UKT</p>
                                                <p class="mt-1 text-xs text-gray-500">15 Februari 2025 • Bagian
                                                    Keuangan</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div> --}}
                    </div>

                    {{-- Bottom Naviagtions --}}
                    <div class="flex items-center justify-between mt-6">
                        <a href="{{ route('announcement.index') }}"
                            class="inline-flex items-center text-sm font-medium text-indigo-600 hover:text-indigo-500">
                            <i class="mr-2 fas fa-arrow-left"></i>
                            Kembali ke Daftar Pengumuman
                        </a>
                        <div class="flex space-x-4">
                            <button type="button"
                                class="inline-flex items-center text-sm font-medium text-gray-500 hover:text-gray-700">
                                <i class="mr-1 far fa-bookmark"></i>
                                Simpan
                            </button>
                            <button type="button"
                                class="inline-flex items-center text-sm font-medium text-gray-500 hover:text-gray-700">
                                <i class="mr-1 far fa-flag"></i>
                                Laporkan
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</x-app-layout>
