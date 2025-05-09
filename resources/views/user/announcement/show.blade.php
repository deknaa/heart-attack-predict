<x-app-layout>
    <div class="min-h-screen pt-20">
        <div class="px-4 py-10 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <!-- Header Section -->
            <div class="mb-10 text-center">
                <h1 class="text-3xl font-bold text-gray-900 sm:text-4xl dark:text-white">Pengumuman</h1>
                <p class="max-w-2xl mx-auto mt-3 text-xl text-gray-500 dark:text-white sm:mt-4">
                    Dapatkan informasi terbaru tentang kegiatan dan berita penting
                </p>
            </div>

            {{-- Search Input --}}
            <form method="GET" action="{{ route('announcement.list') }}"
                class="flex flex-col gap-4 mb-8 sm:flex-row sm:items-center sm:justify-between">
                <div class="relative flex-1 w-full md:max-w-xs">
                    <input type="text" id="search" placeholder="Cari pengumuman..."
                        class="w-full py-2 pl-10 pr-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-red-500">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg class="w-5 h-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                            fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd"
                                d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                </div>
                {{-- Sorting select --}}
                <div class="flex space-x-2">
                    <select name="sort" onchange="this.form.submit()"
                        class="w-full px-4 py-2 bg-white border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        <option value="terbaru" {{ request('sort') == 'terbaru' ? 'selected' : '' }}>Terbaru</option>
                        <option value="terlama" {{ request('sort') == 'terlama' ? 'selected' : '' }}>Terlama</option>
                    </select>
                </div>
            </form>

            <div id="list-announcements" class="mt-4">
                @include('user.announcement._list')
            </div>

            <div class="mt-4">
                {{ $announcements->links() }}
            </div>

            {{-- If no announcements --}}
            @if (count($announcements) == 0)
                <div class="p-8 text-center bg-white rounded-lg shadow-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-16 h-16 mx-auto text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
                    </svg>
                    <h3 class="mt-4 text-lg font-medium text-gray-900">Belum Ada Pengumuman</h3>
                    <p class="mt-2 text-sm text-gray-500">Belum ada pengumuman yang tersedia saat ini. Silakan cek kembali nanti.</p>
                </div>
            @endif
        </div>
    </div>
    @vite(['resources/js/announcementSearch.js'])
</x-app-layout>