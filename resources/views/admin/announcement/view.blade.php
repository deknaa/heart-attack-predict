<x-app-layout>
    <div class="p-14 sm:ml-64">
        <div class="px-4 py-8 mx-auto max-w-7xl sm:px-6 lg:px-8">
            {{-- Header --}}
            <div class="flex flex-col items-start justify-between pb-4 mb-6 border-b sm:flex-row sm:items-center">
                <div>
                    <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Pengumuman</h1>
                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Kelola dan lihat pengumuman</p>
                </div>
                <div class="mt-4 sm:mt-0">
                    <a href="{{ route('announcement.create') }}"
                        class="inline-flex items-center px-4 py-2 text-sm font-medium text-white transition-colors duration-200 bg-blue-600 rounded-lg shadow-sm hover:bg-blue-700">
                        <svg class="w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <line x1="12" y1="5" x2="12" y2="19"></line>
                            <line x1="5" y1="12" x2="19" y2="12"></line>
                        </svg>
                        Buat Pengumuman
                    </a>
                </div>
            </div>
            
            {{-- Table --}}
            <div class="p-3 overflow-hidden border border-gray-200 rounded-lg shadow dark:border-gray-700">
                <table id="selection-table" class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-300">
                        <tr>
                            <th class="px-6 py-4">
                                <span class="flex items-center">
                                    Title
                                    <button class="ml-1">
                                        <svg class="w-3 h-3" xmlns="http://www.w3.org/2000/svg" width="24"
                                            height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4" />
                                        </svg>
                                    </button>
                                </span>
                            </th>
                            <th class="px-6 py-4">
                                <span class="flex items-center">
                                    Content
                                    <button class="ml-1">
                                        <svg class="w-3 h-3" xmlns="http://www.w3.org/2000/svg" width="24"
                                            height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4" />
                                        </svg>
                                    </button>
                                </span>
                            </th>
                            <th class="px-6 py-4">
                                <span class="flex items-center">
                                    Visibility
                                    <button class="ml-1">
                                        <svg class="w-3 h-3" xmlns="http://www.w3.org/2000/svg" width="24"
                                            height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4" />
                                        </svg>
                                    </button>
                                </span>
                            </th>
                            <th class="px-6 py-4">
                                <span class="flex items-center">
                                    Created At
                                    <button class="ml-1">
                                        <svg class="w-3 h-3" xmlns="http://www.w3.org/2000/svg" width="24"
                                            height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4" />
                                        </svg>
                                    </button>
                                </span>
                            </th>
                            <th class="px-6 py-4 text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($announcements as $announcement)
                            <tr
                                class="transition-colors duration-150 bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-700">
                                <td class="px-6 py-4 font-medium text-gray-900 dark:text-white">
                                    <div class="flex items-center">
                                        <div
                                            class="flex items-center justify-center w-8 h-8 mr-3 bg-blue-100 rounded dark:bg-blue-900">
                                            <span
                                                class="font-semibold text-blue-700 dark:text-blue-300">{{ substr($announcement->title, 0, 1) }}</span>
                                        </div>
                                        <span>{{ $announcement->title }}</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4 dark:text-white">
                                    <p class="text-sm line-clamp-2">{{ Str::limit($announcement->content, 50) }}</p>
                                </td>
                                <td class="px-6 py-4">
                                    @if($announcement->visibility == 'public')
                                        <span class=" capitalize bg-blue-100 text-blue-800 text-xs font-medium mr-2 px-2.5 py-1 rounded dark:bg-blue-900 dark:text-white">{{ $announcement->visibility }}</span>
                                    @else
                                        <span class="capitalize bg-red-100 text-red-800 text-xs font-medium mr-2 px-2.5 py-1 rounded">{{ $announcement->visibility }}</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4">
                                    <span class="dark:text-white">{{ $announcement->created_at->format('M d, Y') }}</span>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center justify-center space-x-1">
                                        <a href="{{ route('announcement.show', $announcement->slug) }}"
                                            class="p-2 text-blue-600 rounded-lg hover:bg-blue-100 dark:text-blue-400 dark:hover:bg-gray-700"
                                            title="View announcement">
                                            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                            </svg>
                                        </a> 
                                        <a href="{{ route('announcement.edit', $announcement->slug) }}"
                                            class="p-2 text-yellow-600 rounded-lg hover:bg-yellow-100 dark:text-yellow-400 dark:hover:bg-gray-700"
                                            title="Edit announcement">
                                            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                            </svg>
                                        </a>
                                        <form action="{{ route('announcement.destroy', $announcement->id) }}"
                                            method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" onclick="confirmDelete(this)"
                                                class="p-2 text-red-600 rounded-lg hover:bg-red-100 dark:text-red-400 dark:hover:bg-gray-700"
                                                title="Delete announcement">
                                                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg"
                                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @if (session('success'))
        <script>
            Swal.fire({
                toast: true,
                position: "bottom-end",
                title: 'Success',
                text: "{{ session('success') }}",
                icon: 'success',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
            });
        </script>
    @endif

    <script>
        function confirmDelete(button) {
            Swal.fire({
                title: 'Anda Yakin Ingin Menghapus ini?',
                text: "Anda tidak dapat mengembalikan data apabila terhapus!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    button.closest('form').submit();
                }
            });
        }
    </script>

    @vite(['resources/js/articleTable.js'])
</x-app-layout>