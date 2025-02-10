<div class="p-14 sm:ml-64">
    <!-- Breadcrumb -->
    <nav class="flex mb-4" aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-3">
            <li class="inline-flex items-center">
                <a href="#" class="text-gray-700 hover:text-red-600">
                    Beranda
                </a>
            </li>
            <li>
                <div class="flex items-center">
                    <svg class="w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 9 4-4-4-4" />
                    </svg>
                    <a href="#" class="text-gray-700 hover:text-red-600">Tipe Artikel</a>
                </div>
            </li>
            <li aria-current="page">
                <div class="flex items-center">
                    <svg class="w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 9 4-4-4-4" />
                    </svg>
                    <span class="text-gray-500">{{ $article->slug }}</span>
                </div>
            </li>
        </ol>
    </nav>

    <!-- Article Content -->
    <div class="grid grid-cols-1">
        <!-- Main Article -->
        <div class="md:col-span-2">
            <article class="bg-white rounded-lg shadow-md p-6">
                <!-- Article Header -->
                <header class="mb-6">
                    <span class="bg-red-600 text-white px-3 py-1 rounded-full text-sm">Politik</span>
                    <h1 class="text-3xl font-bold mt-4">{{ $article->title }}</h1>

                    <!-- Article Meta -->
                    <div class="flex items-center mt-4 text-gray-600">
                        <div class="flex items-center">
                            <img src="{{ $article->user->avatar_url }}" alt="Author" class="w-10 h-10 rounded-full">
                            <span class="ml-2">Oleh <a href="#" class="text-red-600 hover:underline">{{ $article->user->name }}</a></span>
                        </div>
                        <span class="mx-4">|</span>
                        <time datetime="2024-01-11 14:30">{{ $article->created_at->diffForHumans() }}</time>
                    </div>

                    <!-- Share Buttons -->
                    <div class="flex items-center space-x-4 mt-4">
                        <button class="flex items-center space-x-2 text-blue-600">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" />
                            </svg>
                            <span>Share</span>
                        </button>
                        <button class="flex items-center space-x-2 text-blue-400">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z" />
                            </svg>
                            <span>Tweet</span>
                        </button>
                        <button class="flex items-center space-x-2 text-green-500">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z" />
                            </svg>
                            <span>Share</span>
                        </button>
                    </div>
                </header>

                <!-- Article Content -->
                <div class="prose max-w-none">
                    {!! nl2br(e($article->content)) !!}

                    <!-- Tags -->
                    <div class="flex flex-wrap gap-2 mt-8">
                        <a href="#"
                            class="bg-gray-200 hover:bg-gray-300 px-3 py-1 rounded-full text-sm">#Pemilu2024</a>
                        <a href="#" class="bg-gray-200 hover:bg-gray-300 px-3 py-1 rounded-full text-sm">#KPU</a>
                        <a href="#"
                            class="bg-gray-200 hover:bg-gray-300 px-3 py-1 rounded-full text-sm">#Politik</a>
                        <a href="#"
                            class="bg-gray-200 hover:bg-gray-300 px-3 py-1 rounded-full text-sm">#Indonesia</a>
                    </div>
                </div>

                <!-- Author Bio -->
                <div class="border-t border-gray-200 mt-8 pt-8">
                    <div class="flex items-center">
                        <img src="{{ $article->user->avatar_url }}" alt="Author" class="w-20 h-20 rounded-full">
                        <div class="ml-4">
                            <h3 class="font-bold text-lg">{{ $article->user->name }}</h3>
                            <p class="text-gray-600">Reporter Ahli IT</p>
                            <p class="mt-2">Lorem ipsum, dolor sit amet consectetur adipisicing elit. At, excepturi!</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>