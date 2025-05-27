<x-app-layout>
    {{-- Dynamic Background dengan Animated Gradients --}}
    <div class="fixed inset-0 overflow-hidden -z-10">
        <div class="absolute inset-0 bg-gradient-to-br from-indigo-50 via-white to-purple-50"></div>
        <div class="absolute top-0 left-0 rounded-full w-96 h-96 bg-gradient-to-r from-blue-400/20 to-cyan-400/20 blur-3xl animate-pulse"></div>
        <div class="absolute right-0 rounded-full top-1/4 w-80 h-80 bg-gradient-to-r from-purple-400/20 to-pink-400/20 blur-3xl animate-pulse animation-delay-1000"></div>
        <div class="absolute bottom-0 rounded-full left-1/3 w-72 h-72 bg-gradient-to-r from-emerald-400/20 to-teal-400/20 blur-3xl animate-pulse animation-delay-2000"></div>
        <div class="absolute w-64 h-64 rounded-full bottom-1/4 right-1/4 bg-gradient-to-r from-orange-400/20 to-red-400/20 blur-3xl animate-pulse animation-delay-3000"></div>
    </div>

    <div class="relative z-10 px-4 py-6 pt-24 mx-auto md:px-8 lg:px-14 max-w-7xl">
        {{-- Enhanced Header Section --}}
        <div class="mb-12">
            <div class="relative p-8 overflow-hidden border shadow-2xl bg-white/40 backdrop-blur-xl rounded-3xl border-white/30 shadow-black/5 md:p-12">
                {{-- Header Background Pattern --}}
                <div class="absolute inset-0 opacity-5">
                    <div class="absolute top-0 left-0 w-32 h-32 transform -translate-x-16 -translate-y-16 rounded-full bg-gradient-to-br from-blue-500 to-purple-500"></div>
                    <div class="absolute bottom-0 right-0 w-40 h-40 transform translate-x-20 translate-y-20 rounded-full bg-gradient-to-br from-pink-500 to-orange-500"></div>
                </div>
                
                <div class="relative z-10">
                    <div class="flex items-center mb-4">
                        <div>
                            <h1 class="mb-2 text-3xl font-bold md:text-5xl">
                                📚 Artikel Terbaru
                            </h1>
                            <p class="text-lg font-medium text-gray-600 md:text-xl">Temukan informasi menarik dan bermanfaat dari koleksi artikel kami</p>
                        </div>
                    </div>
                    
                    {{-- Stats Cards --}}
                    <div class="grid grid-cols-2 gap-4 mt-8">
                        <div class="p-4 text-center transition-all duration-300 transform border bg-white/50 backdrop-blur-sm rounded-2xl border-white/30 hover:scale-105">
                            <div class="text-2xl font-bold text-blue-600">{{ $articles->count() }}</div>
                            <div class="text-sm font-medium text-gray-600">Total Artikel</div>
                        </div>
                        <div class="p-4 text-center transition-all duration-300 transform border bg-white/50 backdrop-blur-sm rounded-2xl border-white/30 hover:scale-105">
                            <div class="text-2xl font-bold text-emerald-600">{{ $articles->unique('category')->count() }}</div>
                            <div class="text-sm font-medium text-gray-600">Kategori</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        {{-- Enhanced Article Grid --}}
        <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-3">
            @foreach ($articles as $article)   
                <article class="group">
                    <div class="h-full overflow-hidden transition-all duration-500 bg-white/40 backdrop-blur-xl rounded-3xl border border-white/30 shadow-xl shadow-black/5 hover:shadow-2xl hover:shadow-black/10 hover:-translate-y-2 hover:scale-[1.02] hover:bg-white/50">
                        {{-- Enhanced Image Section --}}
                        <div class="relative h-56 overflow-hidden bg-gradient-to-br from-gray-100 to-gray-200">
                            @if($article->featured_image)
                                <img src="{{ asset('storage/' . $article->featured_image) }}" 
                                     alt="{{ $article->title }}" 
                                     class="object-cover w-full h-full transition-transform duration-700 group-hover:scale-110">
                            @else
                                <div class="relative flex items-center justify-center w-full h-full overflow-hidden bg-gradient-to-br from-red-500 via-red-700 to-red-600">
                                    <div class="relative z-10 text-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-16 h-16 mx-auto mb-2 text-white animate-pulse" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                                        </svg>
                                        <p class="font-medium text-white">Artikel Menarik</p>
                                    </div>
                                </div>
                            @endif
                            
                            {{-- Enhanced Category Badge --}}
                            <div class="absolute top-4 right-4">
                                <span class="inline-flex items-center px-3 py-1.5 text-xs font-bold text-white bg-gradient-to-r from-red-600 to-red-600 rounded-full shadow-lg backdrop-blur-sm border border-white/60 hover:from-blue-700 hover:to-purple-700 transition-all duration-300">
                                    ✨ {{ ucwords(str_replace('_', ' ', $article->category)) }}
                                </span>
                            </div>

                            {{-- Hover Overlay --}}
                            <div class="absolute inset-0 transition-opacity duration-300 opacity-0 bg-gradient-to-t from-black/50 via-transparent to-transparent group-hover:opacity-100"></div>
                        </div>
                        
                        {{-- Enhanced Content Section --}}
                        <div class="p-6 md:p-8 flex flex-col h-[calc(100%-14rem)]">
                            {{-- Meta Information --}}
                            <div class="flex items-center justify-between mb-4">
                                <div class="flex items-center text-sm text-gray-600">
                                    <div class="p-1.5 bg-blue-100/80 rounded-lg mr-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                    </div>
                                    <span class="font-medium">{{ $article->created_at->diffForHumans() }}</span>
                                </div>
                            </div>
                            
                            {{-- Enhanced Title --}}
                            <h3 class="mb-4 text-xl font-bold text-gray-800 transition-all duration-300 md:text-2xl line-clamp-2 group-hover:text-transparent group-hover:bg-gradient-to-r group-hover:from-blue-600 group-hover:to-purple-600 group-hover:bg-clip-text">
                                {{ $article->title }}
                            </h3>
                            
                            {{-- Enhanced Content Preview --}}
                            <div class="flex-grow mb-6 leading-relaxed text-gray-600 line-clamp-3">
                                {{ Str::limit(strip_tags($article->content), 120) }}
                            </div>
                            
                            {{-- Enhanced Footer --}}
                            <div class="flex items-center justify-between pt-4 mt-auto border-t border-gray-200/50">
                                @if($article->author)
                                    <div class="flex items-center group/author">
                                        <div class="relative">
                                            <div class="w-10 h-10 mr-3 overflow-hidden transition-all duration-300 rounded-full bg-gradient-to-br from-blue-400 to-purple-500 ring-2 ring-white/50 group-hover/author:ring-blue-400/50">
                                                @if($article->author->avatar)
                                                    <img src="{{ $article->author->avatar }}" alt="{{ $article->author->name }}" class="object-cover w-full h-full">
                                                @else
                                                    <div class="flex items-center justify-center w-full h-full text-sm font-bold text-white">
                                                        {{ substr($article->author->name ?? 'A', 0, 1) }}
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="absolute w-4 h-4 bg-green-400 border-2 border-white rounded-full -bottom-1 -right-1"></div>
                                        </div>
                                        <div>
                                            <span class="text-sm font-semibold text-gray-700 transition-colors duration-300 group-hover/author:text-blue-600">
                                                {{ $article->author->name ?? 'Admin' }}
                                            </span>
                                            <p class="text-xs text-gray-500">Content Creator</p>
                                        </div>
                                    </div>
                                @endif
                                
                                {{-- Enhanced CTA Button --}}
                                <a href="{{ route('article.detail', $article->slug ?? '') }}" 
                                   class="group/btn inline-flex items-center px-6 py-3 text-sm font-bold text-white bg-gradient-to-r from-red-600 to-red-600 rounded-2xl hover:from-red-700 hover:to-red-700 transition-all duration-300 shadow-lg hover:shadow-xl hover:shadow-blue-500/25 hover:-translate-y-0.5 focus:outline-none focus:ring-4 focus:ring-blue-500/50 relative overflow-hidden">
                                    {{-- Button Background Animation --}}
                                    <div class="absolute inset-0 transition-opacity duration-300 opacity-0 bg-gradient-to-r from-white/20 to-transparent group-hover/btn:opacity-100"></div>
                                    <span class="relative z-10 mr-2">Baca Selengkapnya</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="relative z-10 w-4 h-4 transition-transform duration-300 group-hover/btn:translate-x-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </article>
            @endforeach
        </div>
        
        {{-- Enhanced Empty State --}}
        @if($articles->isEmpty())
            <div class="relative flex flex-col items-center justify-center py-20 overflow-hidden border shadow-xl rounded-3xl bg-white/40 backdrop-blur-xl border-white/30">
                {{-- Background Pattern --}}
                <div class="absolute inset-0 opacity-5">
                    <div class="absolute top-0 left-0 w-32 h-32 transform -translate-x-16 -translate-y-16 rounded-full bg-gradient-to-br from-blue-500 to-purple-500"></div>
                    <div class="absolute bottom-0 right-0 w-40 h-40 transform translate-x-20 translate-y-20 rounded-full bg-gradient-to-br from-pink-500 to-orange-500"></div>
                </div>
                
                <div class="relative z-10 text-center">
                    <div class="inline-block p-6 mb-6 rounded-full bg-gradient-to-br from-gray-100 to-gray-200">
                        <div class="p-4 bg-white rounded-full shadow-inner">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-16 h-16 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                            </svg>
                        </div>
                    </div>
                    <h3 class="mb-4 text-2xl font-bold text-gray-900">📚 Belum Ada Artikel</h3>
                    <p class="max-w-md mx-auto mb-8 text-lg text-gray-600">Artikel menarik sedang dalam persiapan. Silakan periksa kembali nanti untuk informasi terbaru dan bermanfaat.</p>
                    <button class="inline-flex items-center px-8 py-4 text-sm font-bold text-white transition-all duration-300 shadow-lg bg-gradient-to-r from-blue-600 to-purple-600 rounded-2xl hover:from-blue-700 hover:to-purple-700 hover:shadow-xl hover:-translate-y-1">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                        </svg>
                        Refresh Halaman
                    </button>
                </div>
            </div>
        @endif
        
        {{-- Enhanced Pagination
        @if($articles->hasPages())
            <div class="mt-12">
                <div class="p-6 border shadow-xl bg-white/40 backdrop-blur-xl rounded-3xl border-white/30 shadow-black/5">
                    {{ $articles->links() }}
                </div>
            </div>
        @endif --}}
    </div>

    {{-- Custom CSS for Animations --}}
    <style>
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
        }
        
        .animation-delay-500 { animation-delay: 0.5s; }
        .animation-delay-1000 { animation-delay: 1s; }
        .animation-delay-1500 { animation-delay: 1.5s; }
        .animation-delay-2000 { animation-delay: 2s; }
        .animation-delay-3000 { animation-delay: 3s; }
        
        .line-clamp-2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
        
        .line-clamp-3 {
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
        
        /* Hover effect for cards */
        .group:hover .group-hover\:scale-110 {
            transform: scale(1.1);
        }
        
        /* Enhanced shadow on scroll */
        .scroll-shadow {
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
        }
    </style>
</x-app-layout>