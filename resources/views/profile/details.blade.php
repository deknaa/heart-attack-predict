<x-app-layout>
    <div class="p-14 {{ Auth::user()->role === 'admin' ? 'sm:ml-64' : '' }}">
        <div class="min-h-screen">
            {{-- Profile Header --}}
            <div class="px-4 pt-8 mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white rounded-lg shadow">
                    {{-- Background Photo --}}
                    <div class="relative h-48 bg-gradient-to-r from-red-500 to-red-600">
                    </div>

                    {{-- Profile Info --}}
                    <div class="flex flex-col px-4 py-5 -mt-16 sm:px-6 sm:flex-row">
                        <div class="flex-shrink-0">
                            <div class="relative">
                                <img class="w-32 h-32 border-4 border-white rounded-full"
                                    src="{{ Auth::user()->avatar_url ?? 'https://ui-avatars.com/api/?name=' . urlencode(auth()->user()->name) }}"
                                    alt="Foto profil">
                                {{-- <button
                                    class="absolute bottom-0 right-0 p-1 bg-white rounded-full shadow hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-700" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                    </svg>
                                </button> --}}
                            </div>
                        </div>
                        <div class="flex-1 mt-4 sm:mt-14 sm:ml-6">
                            <div class="flex flex-col justify-between sm:flex-row sm:items-center">
                                <div>
                                    <h1 class="text-2xl font-bold text-gray-900">{{ Auth::user()->name }}</h1>
                                    <p class="text-sm text-gray-500"><span>@</span>{{ Auth::user()->username }} • Terdaftar
                                        {{ Auth::user()->created_at->diffForHumans() }}</p>
                                </div>
                                <div class="mt-3 sm:mt-0">
                                    <button type="button" data-modal-target="profile-edit-modal"
                                        data-modal-toggle="profile-edit-modal"
                                        class="inline-flex justify-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                        Edit Profil
                                    </button>
                                </div>
                            </div>
                            <div class="flex mt-3 space-x-6">
                                <div class="flex items-center text-gray-500 hover:text-gray-700">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                    @if ($users->alamat)
                                        <span class="ml-1 text-sm">{{ $users->alamat }}</span>
                                    @else
                                        <span class="ml-1 text-sm">Unknown</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Profile Edit Modal --}}
            <div id="profile-edit-modal" data-modal-backdrop="static" tabindex="-1" aria-hidden="true"
                class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="relative w-full max-w-md max-h-full p-4">
                    {{-- Modal Content --}}
                    <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
                        {{-- Modal Header --}}
                        <div
                            class="flex items-center justify-between p-4 border-b border-gray-200 rounded-t md:p-5 dark:border-gray-600">
                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                Update Profile
                            </h3>
                            <button type="button"
                                class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                data-modal-hide="profile-edit-modal">
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                        </div>
                        {{-- Modal Body --}}
                        <div class="p-4 pt-0">
                            <form class="space-y-4" action="{{ route('profile.update', $users->id) }}" method="POST">
                                @method('PUT')
                                @csrf
                                <div>
                                    <label for="name"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
                                    <input type="text" name="name" id="name"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                        value="{{ $users->name }}" required />
                                </div>
                                @if (Auth::user()->google_id)
                                    <span></span>
                                @else
                                    <div>
                                        <label for="password"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Ubah
                                            Password (Opsional)</label>
                                        <input type="password" name="password" id="password" placeholder="••••••••"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" />
                                    </div>
                                @endif
                                <div>
                                    <label for="alamat"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat</label>
                                    <input type="text" name="alamat" id="alamat"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                        value="{{ $users->alamat }}" required />
                                </div>
                                <div>
                                    <label for="no_telp"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">No
                                        Telp</label>
                                    <input type="number" name="no_telp" id="no_telp"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                        value="{{ $users->no_telp }}" required />
                                </div>
                                <button type="submit"
                                    class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Update
                                    User Profile</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Content --}}
            <div class="px-4 pb-12 mx-auto max-w-7xl sm:px-6 lg:px-8">
                {{-- Profile --}}
                <div class="grid grid-cols-1 gap-6 mt-2 lg:grid-cols-3">
                    @if (Auth::user()->role === 'user')
                        {{-- About Section --}}
                        <div class="p-6 bg-white rounded-lg shadow">
                            <h2 class="mb-4 text-lg font-medium text-gray-900">Tentang</h2>
                            <p class="mb-4 text-gray-700">
                                Usia : {{ $age }} Tahun <br>
                                Jenis Kelamin : {{ $sex ? 'Laki-laki' : 'Perempuan' }}
                            </p>
                        </div>

                        {{-- Health Data Section --}}
                        <div class="p-6 bg-white rounded-lg shadow">
                            <div class="flex items-center justify-between mb-4">
                                <h2 class="text-lg font-medium text-gray-900">Data Kesehatan</h2>
                            </div>
                            <div class="flex flex-wrap gap-4">
                                <p>Detak Jantung : {{ $cp }}</p>
                                <p>Tekanan Darah : {{ $trestbps }}</p>
                                <p>Kolesterol : {{ $chol }}</p>
                            </div>
                        </div>

                        {{-- Contact Info --}}
                        <div class="p-6 bg-white rounded-lg shadow">
                            <div class="flex items-center justify-between mb-4">
                                <h2 class="text-lg font-medium text-gray-900">Kontak</h2>
                            </div>
                            <div class="space-y-3">
                                <div class="flex">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-500"
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                    </svg>
                                    <span class="ml-2 text-gray-700">{{ $users->email }}</span>
                                </div>
                                <div class="flex">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-500"
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                    </svg>
                                    @if ($users->no_telp)
                                        <span class="ml-2 text-gray-700">{{ $users->no_telp }}</span>
                                    @else
                                        <span class="ml-2 text-gray-700">Unknown</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @elseif (Auth::user()->role === 'admin')
                </div>
                <div class="grid grid-cols-1 gap-6 mt-2 lg:grid-cols-2">
                    {{-- About Section --}}
                    <div class="p-6 bg-white rounded-lg shadow">
                        <h2 class="mb-4 text-lg font-medium text-gray-900">Tentang</h2>
                        <p class="mb-4 text-justify text-gray-700">
                            {{ Auth::user()->name }} adalah seorang admin dengan username
                            <span>@</span>{{ Auth::user()->username }}.
                        </p>
                    </div>

                    {{-- Contact Info --}}
                    <div class="p-6 bg-white rounded-lg shadow">
                        <div class="flex items-center justify-between mb-4">
                            <h2 class="text-lg font-medium text-gray-900">Kontak</h2>
                        </div>
                        <div class="space-y-3">
                            <div class="flex">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-500" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                                <span class="ml-2 text-gray-700">{{ $users->email }}</span>
                            </div>
                            <div class="flex">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-500" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                </svg>
                                @if ($users->no_telp)
                                    <span class="ml-2 text-gray-700">{{ $users->no_telp }}</span>
                                @else
                                    <span class="ml-2 text-gray-700">Unknown</span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>

    @if (session('success'))
        <script>
            Swal.fire({
                title: 'Success',
                text: "{{ session('success') }}",
                icon: 'success',
                showConfirmButton: false,
                timer: 3500,
                timerProgressBar: true,
            });
        </script>
    @endif

    @if (session('error'))
        <script>
            Swal.fire({
                title: 'Oopss..',
                text: "{{ session('error') }}",
                icon: 'error',
                showConfirmButton: false,
                timer: 5000,
                timerProgressBar: true,
            });
        </script>
    @endif
</x-app-layout>
