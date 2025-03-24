<x-app-layout>
    <div class="px-4 py-6 pt-24 mx-auto md:px-8 lg:px-14 max-w-7xl">
        <div class="mb-8">
            <h2 class="text-2xl font-bold text-gray-800 md:text-3xl">Artikel Terbaru</h2>
            <p class="mt-2 text-gray-600">Temukan informasi menarik dan bermanfaat dari koleksi artikel kami</p>
        </div>
        
        <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
            @foreach ($articles as $article)   
                <div class="w-full overflow-hidden transition-transform duration-300 bg-white rounded-lg shadow-md hover:shadow-lg hover:-translate-y-1">
                    <div class="relative h-48 overflow-hidden bg-gray-200">
                        @if($article->featured_image)
                            <img src="{{ asset('storage/' . $article->featured_image) }}" alt="{{ $article->title }}" class="object-cover w-full h-full">
                        @else
                            <div class="flex items-center justify-center w-full h-full bg-gradient-to-r from-blue-500 to-purple-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-16 h-16 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1M19 20a2 2 0 002-2V8a2 2 0 00-2-2h-1M9 15L3 9m0 0l6-6M3 9h12a6 6 0 010 12h-3" />
                                </svg>
                            </div>
                        @endif
                        <div class="absolute top-0 right-0 px-2 py-1 m-2 text-xs font-semibold text-white bg-blue-600 rounded-full">
                            {{ $article->category ?? 'Umum' }}
                        </div>
                    </div>
                    
                    <div class="p-5">
                        <div class="flex items-center mb-3">
                            <span class="inline-flex items-center text-sm text-gray-500">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                {{ $article->created_at->diffForHumans() }}
                            </span>
                        </div>
                        
                        <h3 class="mb-3 text-xl font-bold text-gray-800 line-clamp-2">
                            {{ $article->title }}
                        </h3>
                        
                        <div class="mb-4 text-gray-600 line-clamp-3">
                            {!! strip_tags($article->content) !!}
                        </div>
                        
                        <div class="flex items-center justify-between pt-3 border-t border-gray-100">
                            @if($article->author)
                                <div class="flex items-center">
                                    <div class="w-8 h-8 mr-2 overflow-hidden bg-gray-300 rounded-full">
                                        <img src="{{ $article->author->avatar ?? '' }}" alt="" class="object-cover w-full h-full">
                                    </div>
                                    <span class="text-sm font-medium text-gray-700">{{ $article->author->name ?? 'Admin' }}</span>
                                </div>
                            @endif
                            
                            <a href="{{ route('article.detail', $article->slug ?? '') }}" class="inline-flex items-center px-4 py-2 text-sm font-medium text-white transition-colors bg-blue-600 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                                Detail
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 ml-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        
        @if($articles->isEmpty())
            <div class="flex flex-col items-center justify-center py-12 rounded-lg bg-gray-50">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-16 h-16 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
                </svg>
                <h3 class="mt-4 text-lg font-medium text-gray-900">Belum ada artikel</h3>
                <p class="mt-1 text-sm text-gray-500">Silakan periksa kembali nanti untuk informasi terbaru.</p>
            </div>
        @endif
        
        {{-- @if($articles->hasPages())
            <div class="mt-8">
                {{ $articles->links() }}
            </div>
        @endif --}}
    </div>
</x-app-layout>