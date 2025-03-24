<x-app-layout>
    <div class="max-w-4xl px-4 py-8 mx-auto md:px-6 lg:px-8 lg:py-12">
        <!-- Breadcrumb navigation -->
        <nav class="flex mb-6" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                <li class="inline-flex items-center">
                    <a href="{{ route('announcement.list') }}" class="inline-flex items-center text-sm font-medium text-gray-600 hover:text-blue-600">
                        <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path>
                        </svg>
                        Beranda
                    </a>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                        </svg>
                        <a href="{{ route('announcement.index') }}" class="ml-1 text-sm font-medium text-gray-600 hover:text-blue-600 md:ml-2">Pengumuman</a>
                    </div>
                </li>
                <li aria-current="page">
                    <div class="flex items-center">
                        <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                        </svg>
                        <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2 line-clamp-1">{{ $announcements->title }}</span>
                    </div>
                </li>
            </ol>
        </nav>

        <!-- Main content card -->
        <article class="overflow-hidden bg-white shadow-lg rounded-xl">
            <!-- Featured image -->
            @if(isset($announcements->image) && $announcements->image)
                <div class="relative w-full h-64 bg-gray-100 md:h-80 lg:h-96">
                    <img src="{{ $announcements->image }}" alt="{{ $announcements->title }}" class="object-cover w-full h-full">
                    @if(isset($announcements->category) && $announcements->category)
                        <span class="absolute top-4 right-4 px-3 py-1.5 text-xs font-medium text-white bg-blue-600 rounded-full">
                            {{ $announcements->category }}
                        </span>
                    @endif
                </div>
            @endif

            <!-- Content section -->
            <div class="p-6 md:p-8">
                <!-- Title and metadata -->
                <div class="pb-6 mb-6 border-b border-gray-100">
                    <h1 class="mb-4 text-2xl font-bold text-gray-900 md:text-3xl lg:text-4xl">{{ $announcements->title }}</h1>
                    
                    <div class="flex flex-wrap items-center gap-4 text-sm text-gray-600">
                        <!-- Author info (if available) -->
                        @if(isset($announcements->author) && $announcements->author)
                            <div class="flex items-center">
                                <div class="w-8 h-8 mr-2 overflow-hidden bg-gray-200 rounded-full">
                                    <img src="{{ $announcements->author->avatar ?? '' }}" alt="" class="object-cover w-full h-full">
                                </div>
                                <span>{{ $announcements->author->name ?? 'Admin' }}</span>
                            </div>
                        @endif

                        <!-- Published date -->
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                            <time datetime="{{ $announcements->created_at->format('Y-m-d') }}">
                                {{ $announcements->created_at->format('d F Y, H:i') }}
                            </time>
                        </div>
                        
                        <!-- Last updated (if different from created) -->
                        @if($announcements->updated_at->gt($announcements->created_at))
                            <div class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                                </svg>
                                <span>Diperbarui {{ $announcements->updated_at->diffForHumans() }}</span>
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Main content -->
                <div class="prose prose-blue max-w-none">
                    {!! $announcements->content !!}
                </div>

                <!-- Tags (if available) -->
                @if(isset($announcements->tags) && is_array($announcements->tags) && count($announcements->tags) > 0)
                    <div class="flex flex-wrap gap-2 mt-8">
                        @foreach($announcements->tags as $tag)
                            <span class="px-3 py-1 text-sm text-gray-700 transition bg-gray-100 rounded-full hover:bg-gray-200">
                                {{ $tag }}
                            </span>
                        @endforeach
                    </div>
                @endif
            </div>

            <!-- Actions footer -->
            <div class="flex items-center justify-between p-6 bg-gray-50 md:p-8">
                <!-- Share options -->
                <div class="flex items-center space-x-2">
                    <span class="text-sm font-medium text-gray-600">Bagikan:</span>
                    <div class="flex space-x-1">
                        <button class="p-2 text-gray-500 transition rounded-full hover:bg-gray-200 hover:text-blue-600" aria-label="Share on Facebook">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"></path>
                            </svg>
                        </button>
                        <button class="p-2 text-gray-500 transition rounded-full hover:bg-gray-200 hover:text-blue-400" aria-label="Share on Twitter">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84"></path>
                            </svg>
                        </button>
                        <button class="p-2 text-gray-500 transition rounded-full hover:bg-gray-200 hover:text-blue-700" aria-label="Share on LinkedIn">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M19.7 3H4.3A1.3 1.3 0 003 4.3v15.4A1.3 1.3 0 004.3 21h15.4a1.3 1.3 0 001.3-1.3V4.3A1.3 1.3 0 0019.7 3zM8.339 18.338H5.667v-8.59h2.672v8.59zM7.004 8.574a1.548 1.548 0 11-.002-3.096 1.548 1.548 0 01.002 3.096zm11.335 9.764H15.67v-4.177c0-.996-.017-2.278-1.387-2.278-1.389 0-1.601 1.086-1.601 2.206v4.249h-2.667v-8.59h2.559v1.174h.037c.356-.675 1.227-1.387 2.526-1.387 2.703 0 3.203 1.779 3.203 4.092v4.711z"></path>
                            </svg>
                        </button>
                        <button class="p-2 text-gray-500 transition rounded-full hover:bg-gray-200 hover:text-green-600" aria-label="Share on WhatsApp">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"></path>
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- Back to list button -->
                <a href="{{ route('announcement.list') }}" class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    Kembali ke Daftar
                </a>
            </div>
        </article>

        <!-- Related articles (if available) -->
        @if(isset($relatedAnnouncements) && count($relatedAnnouncements) > 0)
            <div class="mt-12">
                <h3 class="mb-6 text-xl font-bold text-gray-800">Pengumuman Terkait</h3>
                <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3">
                    @foreach($relatedAnnouncements as $related)
                        <a href="{{ route('announcement.detail', $related->slug ?? '') }}" class="flex flex-col overflow-hidden transition bg-white rounded-lg shadow-md hover:shadow-lg">
                            <div class="h-40 bg-gray-200">
                                @if(isset($related->image) && $related->image)
                                    <img src="{{ $related->image }}" alt="{{ $related->title }}" class="object-cover w-full h-full">
                                @else
                                    <div class="flex items-center justify-center w-full h-full bg-gradient-to-r from-blue-500 to-purple-600">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z" />
                                        </svg>
                                    </div>
                                @endif
                            </div>
                            <div class="flex flex-col justify-between flex-1 p-4">
                                <div>
                                    <h4 class="mb-2 text-lg font-semibold text-gray-800 line-clamp-2">{{ $related->title }}</h4>
                                    <p class="text-sm text-gray-600 line-clamp-2">{{ strip_tags($related->content) }}</p>
                                </div>
                                <div class="pt-4 mt-auto text-xs text-gray-500">
                                    {{ $related->created_at->format('d M Y') }}
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        @endif
    </div>
</x-app-layout>