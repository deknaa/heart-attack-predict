<x-app-layout>>
    <div class="p-14 sm:ml-64">
        <div class="px-4 py-8 mx-auto max-w-7xl sm:px-6 lg:px-8">
            {{-- Header --}}
            <div class="flex flex-col items-start justify-between pb-4 mb-6 border-b sm:flex-row sm:items-center">
                <div>
                    <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Data Users</h1>
                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Kelola dan lihat data pengguna</p>
                </div>
            </div>

            {{-- Table --}}
            <div class="p-3 overflow-hidden border border-gray-200 rounded-lg shadow dark:border-gray-700">
                <table id="selection-table" class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-300">
                        <tr>
                            <th class="px-6 py-4">
                                <span class="flex items-center">
                                    Name
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
                                    Email
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
                                    Role
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
                        @foreach ($users as $user)
                            <tr
                                class="transition-colors duration-150 bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-700">
                                <td class="px-6 py-4 font-medium text-gray-900 dark:text-white">
                                    <div class="flex items-center">
                                        <div
                                            class="flex items-center justify-center w-8 h-8 mr-3 bg-blue-100 rounded dark:bg-blue-900">
                                            <span
                                                class="font-semibold text-blue-700 dark:text-blue-300">{{ substr($user->name, 0, 1) }}</span>
                                        </div>
                                        <span>{{ $user->name }}</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <p class="text-sm line-clamp-2 dark:text-white">{{ $user->email }}</p>
                                </td>
                                <td class="px-6 py-4">
                                    <p class="text-sm line-clamp-2 dark:text-white">{{ $user->role }}</p>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="dark:text-white">{{ $user->created_at->format('M d, Y') }}</span>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center justify-center space-x-1">
                                        <a href="{{ route('users.detail', $user->id) }}"
                                            class="p-2 text-blue-600 rounded-lg hover:bg-blue-100 dark:text-blue-400 dark:hover:bg-gray-700"
                                            title="View user">
                                            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                            </svg>
                                        </a>
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
    @vite(['resources/js/articleTable.js'])
</x-app-layout>
