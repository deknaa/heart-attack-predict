<x-app-layout>
    <div class="p-12 pt-20">
        <div class="p-5 bg-white rounded-lg">
            {{-- Article Header --}}
            <header class="py-16 text-white bg-gradient-to-r from-blue-500 to-purple-600">
                <div class="container px-4 mx-auto">
                    <div class="flex flex-wrap">
                        <div class="w-full md:w-2/3 md:pr-8">
                            <span
                                class="px-3 py-1 text-sm font-medium text-blue-600 bg-white rounded-full">{{ ucwords(str_replace('_', ' ', $article->category)) }}</span>
                            <h1 class="mt-4 mb-3 text-3xl font-bold md:text-4xl lg:text-5xl">{{ $article->title }}</h1>
                            <div class="flex items-center space-x-4 text-sm text-blue-100">
                                <div class="flex items-center">
                                    <img src="{{ $article->user->avatar_url }}" alt="Author"
                                        class="w-8 h-8 mr-2 rounded-full">
                                    <span>{{ $article->user->name }}</span>
                                </div>
                                <span>•</span>
                                <span>{{ $article->created_at->diffForHumans() }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </header>

            {{-- Article Content --}}
            <main class="container px-4 py-8 mx-auto">
                <div class="flex flex-wrap -mx-4">
                    {{-- Main Content --}}
                    <div class="w-full px-4 lg:w-2/3">
                        {{-- Featured Image --}}
                        <div class="mb-8 overflow-hidden shadow-md rounded-xl">
                            @if ($article->featured_image)
                                <img src="{{ Storage::url($article->featured_image) }}" alt="Featured Image"
                                    class="w-full h-auto">
                            @else
                                <span></span>
                            @endif
                        </div>

                        {{-- Article Content --}}
                        <article class="prose lg:prose-xl max-w-none">
                            {!! $article->content !!}
                        </article>

                        {{-- Article Category --}}
                        <div class="flex flex-wrap gap-2 my-8">
                            <a href="#"
                                class="px-3 py-1 text-sm text-gray-700 transition bg-gray-100 rounded-full hover:bg-gray-200">{{ ucwords(str_replace('_', ' ', $article->category)) }}
                            </a>
                        </div>

                        {{-- Author Bio --}}
                        <div class="p-6 my-8 bg-blue-50 rounded-xl">
                            <div class="flex flex-col sm:flex-row">
                                <img src="{{ $article->user->avatar_url }}" alt="Author"
                                    class="w-24 h-24 mx-auto mb-4 rounded-full sm:mx-0 sm:mb-0">
                                <div class="sm:ml-6">
                                    <h3 class="mb-2 text-xl font-bold">{{ $article->user->name }}</h3>
                                    @if ($article->user->author_description)
                                        <p class="mb-4 text-gray-600">{{ $article->user->author_description }}</p>
                                    @else
                                        <p class="mb-4 text-gray-600">Author belum memiliki deskripsi</p>
                                    @endif
                                    <div class="flex space-x-4">
                                        <a href="#" class="text-blue-600 hover:text-blue-800"><i
                                                class="fab fa-twitter"></i></a>
                                        <a href="#" class="text-blue-600 hover:text-blue-800"><i
                                                class="fab fa-linkedin"></i></a>
                                        <a href="#" class="text-blue-600 hover:text-blue-800"><i
                                                class="far fa-envelope"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Share Buttons --}}
                        <div class="py-6 my-8 border-t border-b">
                            <h3 class="mb-4 text-lg font-bold">Bagikan Artikel Ini</h3>
                            <div class="flex flex-wrap items-center gap-2">
                                <a href="https://www.facebook.com/" target="_blank"
                                    class="flex items-center w-full px-4 py-2 text-white transition bg-blue-600 rounded-lg md:w-fit hover:bg-blue-700">
                                    <i class="mr-2 fab fa-facebook-f"></i> Facebook
                                </a>
                                <a href="#"
                                    class="flex items-center w-full px-4 py-2 text-white transition bg-blue-400 rounded-lg hover:bg-blue-500 md:w-fit">
                                    <i class="mr-2 fab fa-twitter"></i> Twitter
                                </a>
                                <a href="#"
                                    class="flex items-center w-full px-4 py-2 text-white transition bg-green-500 rounded-lg hover:bg-green-600 md:w-fit">
                                    <i class="mr-2 fab fa-whatsapp"></i> WhatsApp
                                </a>
                                <a href="#"
                                    class="flex items-center w-full px-4 py-2 text-gray-700 transition bg-gray-200 rounded-lg hover:bg-gray-300 md:w-fit">
                                    <i class="mr-2 far fa-envelope"></i> Email
                                </a>
                            </div>
                        </div>
                    </div>

                    {{-- Sidebar --}}
                    <div class="w-full px-4 mt-8 lg:w-1/3 lg:mt-0">
                        {{-- Popular Article --}}
                        <div class="p-6 mb-8 bg-white rounded-lg shadow-sm">
                            <h3 class="mb-4 text-lg font-bold">Artikel Populer</h3>
                            <div class="space-y-4">
                                @foreach ($popularArticles as $item)
                                    <a href="#" class="flex group">
                                        <img src="{{ Storage::url($item->featured_image) }}" alt="Article thumbnail"
                                            class="object-cover w-20 h-16 rounded">
                                        <div class="ml-3">
                                            <h4
                                                class="font-medium text-gray-900 transition group-hover:text-blue-600 line-clamp-2">
                                                {{ $item->title }}</h4>
                                            <p class="mt-1 text-sm text-gray-500">
                                                {{ $item->created_at->diffForHumans() }}</p>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                        </div>

                        {{-- Category --}}
                        <div class="p-6 mb-8 bg-white rounded-lg shadow-sm">
                            <h3 class="mb-4 text-lg font-bold">Kategori</h3>
                            <div class="space-y-2">
                                @foreach ($articleCategory as $item)
                                    <a href="#"
                                        class="flex items-center justify-between py-2 transition border-b hover:text-blue-600">
                                        <span class="capitalize">{{ ucwords(str_replace('_', ' ', $item->category)) }}</span>
                                        <span
                                            class="px-2 py-1 text-xs text-blue-600 bg-blue-100 rounded">{{ $totalCategory }}</span>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </main>

            {{-- Related Article --}}
            <section class="py-12 bg-gray-100">
                <div class="container px-4 mx-auto">
                    <h2 class="mb-8 text-2xl font-bold">Artikel Terkait</h2>
                    <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3">
                        {{-- Article Card --}}
                        @foreach ($relatedArticle as $item)
                            <div class="overflow-hidden transition bg-white shadow-sm rounded-xl hover:shadow-md">
                                <a href="#">
                                    <img src="{{ Storage::url($article->featured_image) }}" alt="Article thumbnail"
                                        class="object-cover w-full h-48">
                                    <div class="p-6">
                                        <span
                                            class="text-sm font-medium text-blue-600 capitalize">{{ ucwords(str_replace('_', ' ', $item->category)) }}</span>
                                        <h3 class="mt-2 mb-3 text-xl font-bold transition hover:text-blue-600">
                                            {{ $item->title }}</h3>
                                        <p class="text-gray-600 line-clamp-3">{!! $item->content !!}</p>
                                        <div class="flex items-center mt-4">
                                            <img src="{{ $article->user->avatar_url }}" alt="Author"
                                                class="w-6 h-6 mr-2 rounded-full">
                                            <span class="text-sm text-gray-500">{{ $item->user->name }}</span>
                                            <span class="mx-2 text-gray-300">•</span>
                                            <span
                                                class="text-sm text-gray-500">{{ $item->created_at->diffForHumans() }}</span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>

            {{-- CTA Section --}}
            <section class="py-16 text-white bg-gradient-to-r from-blue-600 to-purple-600">
                <div class="container px-4 mx-auto text-center">
                    <h2 class="mb-4 text-3xl font-bold">Tetap Update dengan Perkembangan Dunia Kesehatan</h2>
                    <p class="max-w-3xl mx-auto mb-8 text-xl">Dapatkan artikel terbaru tentang kesehatan, gaya hidup, dan tips
                        kesehatan
                        langsung ke inbox Anda.</p>
                    <form class="flex flex-col max-w-xl gap-4 mx-auto sm:flex-row">
                        <input type="email" placeholder="Email Anda"
                            class="flex-1 px-4 py-3 text-gray-800 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-300">
                        <button type="submit"
                            class="px-6 py-3 font-bold text-blue-600 transition bg-white rounded-lg hover:bg-blue-50">Berlangganan</button>
                    </form>
                    <p class="mt-4 text-sm text-blue-100">Kami menghargai privasi Anda. Tidak ada spam, kapanpun.</p>
                </div>
            </section>

            {{-- Back to top button --}}
            <button id="back-to-top"
                class="fixed p-3 text-white transition-opacity duration-300 bg-blue-600 rounded-full shadow-lg opacity-0 bottom-6 right-6 hover:bg-blue-700">
                <i class="fas fa-arrow-up"></i>
            </button>
        </div>
    </div>
    @vite(['resources/js/floatingButtonBack.js'])
</x-app-layout>
