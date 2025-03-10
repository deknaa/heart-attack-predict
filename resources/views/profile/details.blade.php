<x-app-layout>
    <div class="p-14 sm:ml-64">
        <div class="min-h-screen" x-data="{ activeTab: 'profile' }">
            <!-- Profile Header -->
            <div class="px-4 py-8 mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white rounded-lg shadow">
                    <!-- Cover Photo -->
                    <div class="relative h-48 bg-gradient-to-r from-purple-500 to-indigo-600">
                        <button
                            class="absolute p-2 bg-white rounded-full shadow bottom-2 right-2 bg-opacity-80 hover:bg-opacity-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-700" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 13a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                        </button>
                    </div>

                    {{-- Profile Info --}}
                    <div class="flex flex-col px-4 py-5 -mt-16 sm:px-6 sm:flex-row">
                        <div class="flex-shrink-0">
                            <div class="relative">
                                <img class="w-32 h-32 border-4 border-white rounded-full" src="{{ Auth::user()->avatar_url ?? 'https://ui-avatars.com/api/?name=' . urlencode(auth()->user()->name) }}"   
                                    alt="Foto profil">
                                <button
                                    class="absolute bottom-0 right-0 p-1 bg-white rounded-full shadow hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-700" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <div class="flex-1 mt-4 sm:mt-14 sm:ml-6">
                            <div class="flex flex-col justify-between sm:flex-row sm:items-center">
                                <div>
                                    <h1 class="text-2xl font-bold text-gray-900">{{ Auth::user()->name }}</h1>
                                    <p class="text-sm text-gray-500">{{ Auth::user()->name }} • Joined {{ Auth::user()->created_at->diffForHumans() }}</p>
                                </div>
                                <div class="mt-3 sm:mt-0">
                                    <button type="button"
                                        class="inline-flex justify-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                        Edit Profil
                                    </button>
                                </div>
                            </div>
                            <div class="mt-3">
                                <p class="text-gray-700">Web Developer | UI/UX Enthusiast | Pecinta Kopi ☕</p>
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
                                    <span class="ml-1 text-sm">Bandung, Indonesia</span>
                                </div>
                                <div class="flex items-center text-gray-500 hover:text-gray-700">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1" />
                                    </svg>
                                    <a href="#" class="ml-1 text-sm">budisantoso.com</a>
                                </div>
                            </div>
                            <div class="flex mt-3 space-x-6">
                                <div class="flex items-center">
                                    <span class="font-medium text-gray-900">126</span>
                                    <span class="ml-1 text-sm text-gray-500">Mengikuti</span>
                                </div>
                                <div class="flex items-center">
                                    <span class="font-medium text-gray-900">582</span>
                                    <span class="ml-1 text-sm text-gray-500">Pengikut</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Navigation Tabs -->
                    <div class="border-t border-gray-200">
                        <nav class="flex -mb-px">
                            <button @click="activeTab = 'profile'"
                                class="w-1/4 px-1 py-4 text-sm font-medium text-center border-b-2"
                                :class="activeTab === 'profile' ? 'border-indigo-500 text-indigo-600' :
                                    'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300'">
                                Profil
                            </button>
                            <button @click="activeTab = 'posts'"
                                class="w-1/4 px-1 py-4 text-sm font-medium text-center border-b-2"
                                :class="activeTab === 'posts' ? 'border-indigo-500 text-indigo-600' :
                                    'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300'">
                                Postingan
                            </button>
                            <button @click="activeTab = 'photos'"
                                class="w-1/4 px-1 py-4 text-sm font-medium text-center border-b-2"
                                :class="activeTab === 'photos' ? 'border-indigo-500 text-indigo-600' :
                                    'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300'">
                                Foto
                            </button>
                            <button @click="activeTab = 'activity'"
                                class="w-1/4 px-1 py-4 text-sm font-medium text-center border-b-2"
                                :class="activeTab === 'activity' ? 'border-indigo-500 text-indigo-600' :
                                    'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300'">
                                Aktivitas
                            </button>
                        </nav>
                    </div>
                </div>
            </div>

            <!-- Tab Content -->
            <div class="px-4 pb-12 mx-auto max-w-7xl sm:px-6 lg:px-8">
                <!-- Profile Tab -->
                <div x-show="activeTab === 'profile'" class="grid grid-cols-1 gap-6 mt-6 lg:grid-cols-3">
                    <!-- About Section -->
                    <div class="p-6 bg-white rounded-lg shadow">
                        <h2 class="mb-4 text-lg font-medium text-gray-900">Tentang</h2>
                        <p class="mb-4 text-gray-700">
                            Saya adalah seorang web developer yang berpengalaman dalam pengembangan aplikasi web
                            menggunakan HTML, CSS, JavaScript, dan React. Saya juga tertarik dengan UI/UX design dan
                            selalu berusaha membuat antarmuka yang mudah digunakan dan menarik.
                        </p>
                        <div class="space-y-3">
                            <div class="flex">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-500" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                                <span class="ml-2 text-gray-700">Bekerja di <a href="#"
                                        class="text-indigo-600 hover:text-indigo-500">PT Digital Kreasi</a></span>
                            </div>
                            <div class="flex">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-500" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path d="M12 14l9-5-9-5-9 5 9 5z" />
                                    <path
                                        d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222" />
                                </svg>
                                <span class="ml-2 text-gray-700">Belajar di <a href="#"
                                        class="text-indigo-600 hover:text-indigo-500">Institut Teknologi
                                        Bandung</a></span>
                            </div>
                            <div class="flex">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-500" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                                </svg>
                                <span class="ml-2 text-gray-700">Tinggal di <a href="#"
                                        class="text-indigo-600 hover:text-indigo-500">Bandung, Indonesia</a></span>
                            </div>
                        </div>
                    </div>

                    <!-- Skills Section -->
                    <div class="p-6 bg-white rounded-lg shadow">
                        <div class="flex items-center justify-between mb-4">
                            <h2 class="text-lg font-medium text-gray-900">Keahlian</h2>
                            <button type="button" class="text-sm text-indigo-600 hover:text-indigo-500">
                                + Tambah
                            </button>
                        </div>
                        <div class="flex flex-wrap gap-2">
                            <span
                                class="inline-flex items-center px-3 py-1 text-sm font-medium text-blue-800 bg-blue-100 rounded-full">
                                HTML5
                            </span>
                            <span
                                class="inline-flex items-center px-3 py-1 text-sm font-medium text-blue-800 bg-blue-100 rounded-full">
                                CSS3
                            </span>
                            <span
                                class="inline-flex items-center px-3 py-1 text-sm font-medium text-blue-800 bg-blue-100 rounded-full">
                                JavaScript
                            </span>
                            <span
                                class="inline-flex items-center px-3 py-1 text-sm font-medium text-blue-800 bg-blue-100 rounded-full">
                                React
                            </span>
                            <span
                                class="inline-flex items-center px-3 py-1 text-sm font-medium text-blue-800 bg-blue-100 rounded-full">
                                Node.js
                            </span>
                            <span
                                class="inline-flex items-center px-3 py-1 text-sm font-medium text-blue-800 bg-blue-100 rounded-full">
                                Tailwind CSS
                            </span>
                            <span
                                class="inline-flex items-center px-3 py-1 text-sm font-medium text-blue-800 bg-blue-100 rounded-full">
                                UI/UX Design
                            </span>
                            <span
                                class="inline-flex items-center px-3 py-1 text-sm font-medium text-blue-800 bg-blue-100 rounded-full">
                                Figma
                            </span>
                        </div>
                    </div>

                    <!-- Contact Info -->
                    <div class="p-6 bg-white rounded-lg shadow">
                        <div class="flex items-center justify-between mb-4">
                            <h2 class="text-lg font-medium text-gray-900">Kontak</h2>
                            <button type="button" class="text-sm text-indigo-600 hover:text-indigo-500">
                                Edit
                            </button>
                        </div>
                        <div class="space-y-3">
                            <div class="flex">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-500" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                                <span class="ml-2 text-gray-700">budi.santoso@email.com</span>
                            </div>
                            <div class="flex">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-500" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                </svg>
                                <span class="ml-2 text-gray-700">+62 812 3456 7890</span>
                            </div>
                            <div class="pt-3 mt-3 border-t border-gray-200">
                                <h3 class="mb-2 text-sm font-medium text-gray-900">Media Sosial</h3>
                                <div class="flex space-x-3">
                                    <a href="#" class="text-gray-400 hover:text-gray-500">
                                        <span class="sr-only">Twitter</span>
                                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"
                                            aria-hidden="true">
                                            <path
                                                d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84" />
                                        </svg>
                                    </a>
                                    <a href="#" class="text-gray-400 hover:text-gray-500">
                                        <span class="sr-only">LinkedIn</span>
                                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"
                                            aria-hidden="true">
                                            <path fill-rule="evenodd"
                                                d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </a>
                                    <a href="#" class="text-gray-400 hover:text-gray-500">
                                        <span class="sr-only">Instagram</span>
                                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"
                                            aria-hidden="true">
                                            <path fill-rule="evenodd"
                                                d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </a>
                                    <a href="#" class="text-gray-400 hover:text-gray-500">
                                        <span class="sr-only">GitHub</span>
                                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"
                                            aria-hidden="true">
                                            <path fill-rule="evenodd"
                                                d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Posts Tab -->
                <div x-show="activeTab === 'posts'" class="mt-6">
                    <div class="mb-6 overflow-hidden bg-white rounded-lg shadow">
                        <!-- Post Form -->
                        <div class="p-4 border-b">
                            <div class="flex">
                                <img class="w-10 h-10 rounded-full" src="/api/placeholder/40/40" alt="Foto profil">
                                <div class="flex-1 ml-3">
                                    <textarea rows="2"
                                        class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                        placeholder="Bagikan pemikiran Anda..."></textarea>
                                    <div class="flex items-center justify-between mt-2">
                                        <div class="flex space-x-2">
                                            <button type="button"
                                                class="inline-flex items-center p-1 text-gray-400 border border-transparent rounded-full shadow-sm hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5"
                                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                </svg>
                                            </button>
                                            <button type="button"
                                                class="inline-flex items-center p-1 text-gray-400 border border-transparent rounded-full shadow-sm hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5"
                                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z" />
                                                </svg>
                                            </button>
                                            <button type="button"
                                                class="inline-flex items-center p-1 text-gray-400 border border-transparent rounded-full shadow-sm hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5"
                                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                </svg>
                                            </button>
                                        </div>
                                        <button type="button"
                                            class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-indigo-600 border border-transparent rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                            Posting
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Post List -->
                        <div class="divide-y divide-gray-200">
                            <!-- Post 1 -->
                            <div class="p-4">
                                <div class="flex space-x-3">
                                    <img class="w-10 h-10 rounded-full" src="/api/placeholder/40/40"
                                        alt="Foto profil">
                                    <div class="flex-1 space-y-1">
                                        <div class="flex items-center justify-between">
                                            <h3 class="text-sm font-medium">Budi Santoso</h3>
                                            <p class="text-sm text-gray-500">3 jam yang lalu</p>
                                        </div>
                                        <p class="text-sm text-gray-700">
                                            Baru selesai mengerjakan proyek website dengan React dan Tailwind CSS.
                                            Sangat puas dengan hasilnya! Siapa yang tertarik untuk diskusi tentang
                                            front-end development?
                                        </p>
                                        <img class="mt-3 border border-gray-200 rounded-lg"
                                            src="/api/placeholder/600/400" alt="Screenshot proyek">
                                        <div class="flex mt-2 space-x-4">
                                            <button type="button"
                                                class="flex items-center text-sm text-gray-500 hover:text-gray-700">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-1"
                                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5" />
                                                </svg>
                                                <span>24 Suka</span>
                                            </button>
                                            <button type="button"
                                                class="flex items-center text-sm text-gray-500 hover:text-gray-700">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-1"
                                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                                                </svg>
                                                <span>8 Komentar</span>
                                            </button>
                                            <button type="button"
                                                class="flex items-center text-sm text-gray-500 hover:text-gray-700">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-1"
                                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z" />
                                                </svg>
                                                <span>Bagikan</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Post 2 -->
                            <div class="p-4">
                                <div class="flex space-x-3">
                                    <img class="w-10 h-10 rounded-full" src="/api/placeholder/40/40"
                                        alt="Foto profil">
                                    <div class="flex-1 space-y-1">
                                        <div class="flex items-center justify-between">
                                            <h3 class="text-sm font-medium">Budi Santoso</h3>
                                            <p class="text-sm text-gray-500">2 hari yang lalu</p>
                                        </div>
                                        <p class="text-sm text-gray-700">
                                            Menghadiri workshop UI/UX Design kemarin. Banyak hal baru yang
                                            dipelajari tentang prinsip desain dan user experience. Siapa yang
                                            tertarik dengan topik ini juga?
                                        </p>
                                        <div class="flex mt-2 space-x-4">
                                            <button type="button"
                                                class="flex items-center text-sm text-gray-500 hover:text-gray-700">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-1"
                                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5" />
                                                </svg>
                                                <span>36 Suka</span>
                                            </button>
                                            <button type="button"
                                                class="flex items-center text-sm text-gray-500 hover:text-gray-700">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-1"
                                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                                                </svg>
                                                <span>12 Komentar</span>
                                            </button>
                                            <button type="button"
                                                class="flex items-center text-sm text-gray-500 hover:text-gray-700">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-1"
                                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z" />
                                                </svg>
                                                <span>Bagikan</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Photos Tab -->
                <div x-show="activeTab === 'photos'" class="mt-6">
                    <div class="p-6 bg-white rounded-lg shadow">
                        <div class="flex items-center justify-between mb-4">
                            <h2 class="text-lg font-medium text-gray-900">Album Foto</h2>
                            <button type="button"
                                class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                + Album Baru
                            </button>
                        </div>
                        <div class="grid grid-cols-2 gap-4 sm:grid-cols-3 md:grid-cols-4">
                            <div class="relative group">
                                <div class="overflow-hidden bg-gray-100 rounded-lg aspect-w-1 aspect-h-1">
                                    <img src="/api/placeholder/320/320" alt="Foto proyek" class="object-cover">
                                    <div
                                        class="absolute inset-0 transition-all duration-200 bg-black bg-opacity-0 group-hover:bg-opacity-30">
                                    </div>
                                </div>
                                <p class="mt-2 text-sm font-medium text-gray-900">Proyek Web (24)</p>
                            </div>
                            <div class="relative group">
                                <div class="overflow-hidden bg-gray-100 rounded-lg aspect-w-1 aspect-h-1">
                                    <img src="/api/placeholder/320/320" alt="Foto workshop" class="object-cover">
                                    <div
                                        class="absolute inset-0 transition-all duration-200 bg-black bg-opacity-0 group-hover:bg-opacity-30">
                                    </div>
                                </div>
                                <p class="mt-2 text-sm font-medium text-gray-900">Workshop (12)</p>
                            </div>
                            <div class="relative group">
                                <div class="overflow-hidden bg-gray-100 rounded-lg aspect-w-1 aspect-h-1">
                                    <img src="/api/placeholder/320/320" alt="Foto kantor" class="object-cover">
                                    <div
                                        class="absolute inset-0 transition-all duration-200 bg-black bg-opacity-0 group-hover:bg-opacity-30">
                                    </div>
                                </div>
                                <p class="mt-2 text-sm font-medium text-gray-900">Kantor (8)</p>
                            </div>
                            <div class="relative group">
                                <div class="overflow-hidden bg-gray-100 rounded-lg aspect-w-1 aspect-h-1">
                                    <img src="/api/placeholder/320/320" alt="Foto traveling" class="object-cover">
                                    <div
                                        class="absolute inset-0 transition-all duration-200 bg-black bg-opacity-0 group-hover:bg-opacity-30">
                                    </div>
                                </div>
                                <p class="mt-2 text-sm font-medium text-gray-900">Traveling (18)</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Activity Tab -->
                <div x-show="activeTab === 'activity'" class="mt-6">
                    <div class="overflow-hidden bg-white rounded-lg shadow">
                        <div class="p-6 border-b">
                            <h2 class="text-lg font-medium text-gray-900">Aktivitas Terkini</h2>
                        </div>
                        <div class="px-6 py-4">
                            <ul class="divide-y divide-gray-200">
                                <!-- Activity 1 -->
                                <li class="py-4">
                                    <div class="flex space-x-3">
                                        <img class="w-10 h-10 rounded-full" src="/api/placeholder/40/40"
                                            alt="Foto profil">
                                        <div class="flex-1 space-y-1">
                                            <div class="flex items-center justify-between">
                                                <h3 class="text-sm font-medium">Budi Santoso</h3>
                                                <p class="text-sm text-gray-500">1 jam yang lalu</p>
                                            </div>
                                            <p class="text-sm text-gray-700">
                                                Memperbarui foto profil
                                            </p>
                                        </div>
                                    </div>
                                </li>
                                <!-- Activity 2 -->
                                <li class="py-4">
                                    <div class="flex space-x-3">
                                        <img class="w-10 h-10 rounded-full" src="/api/placeholder/40/40"
                                            alt="Foto profil">
                                        <div class="flex-1 space-y-1">
                                            <div class="flex items-center justify-between">
                                                <h3 class="text-sm font-medium">Budi Santoso</h3>
                                                <p class="text-sm text-gray-500">3 jam yang lalu</p>
                                            </div>
                                            <p class="text-sm text-gray-700">
                                                Membagikan postingan baru tentang proyek website
                                            </p>
                                        </div>
                                    </div>
                                </li>
                                <!-- Activity 3 -->
                                <li class="py-4">
                                    <div class="flex space-x-3">
                                        <img class="w-10 h-10 rounded-full" src="/api/placeholder/40/40"
                                            alt="Foto profil">
                                        <div class="flex-1 space-y-1">
                                            <div class="flex items-center justify-between">
                                                <h3 class="text-sm font-medium">Budi Santoso</h3>
                                                <p class="text-sm text-gray-500">Kemarin</p>
                                            </div>
                                            <p class="text-sm text-gray-700">
                                                Menambahkan keahlian baru: Tailwind CSS
                                            </p>
                                        </div>
                                    </div>
                                </li>
                                <!-- Activity 4 -->
                                <li class="py-4">
                                    <div class="flex space-x-3">
                                        <img class="w-10 h-10 rounded-full" src="/api/placeholder/40/40"
                                            alt="Foto profil">
                                        <div class="flex-1 space-y-1">
                                            <div class="flex items-center justify-between">
                                                <h3 class="text-sm font-medium">Budi Santoso</h3>
                                                <p class="text-sm text-gray-500">2 hari yang lalu</p>
                                            </div>
                                            <p class="text-sm text-gray-700">
                                                Menghadiri workshop UI/UX Design
                                            </p>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
