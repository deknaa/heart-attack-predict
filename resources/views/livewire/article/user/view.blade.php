<div class="p-6 sm:ml-64">
    <h1 class="text-3xl font-bold text-gray-800 dark:text-white mb-8">Latest Articles</h1>
    
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse ($articles as $article)
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg hover:shadow-xl transition-shadow duration-300 overflow-hidden border border-gray-100 dark:border-gray-700">
                <div class="relative">
                    <a href="#">
                        <img class="h-48 w-full object-cover" src="/docs/images/blog/image-1.jpg" alt="{{ $article->title }}" />
                        <div class="absolute top-4 right-4">
                            <span class="bg-blue-500 text-white text-xs font-semibold px-3 py-1 rounded-full">
                                {{ $article->category ?? 'Uncategorized' }}
                            </span>
                        </div>
                    </a>
                </div>
                
                <div class="p-6">
                    <div class="flex items-center space-x-2 mb-4">
                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <span class="text-sm text-gray-500 dark:text-gray-400">
                            {{ $article->created_at->diffForHumans() }}
                        </span>
                    </div>

                    <a href="#" class="block mb-3">
                        <h2 class="text-xl font-bold text-gray-900 dark:text-white hover:text-blue-600 dark:hover:text-blue-400 transition-colors duration-200">
                            {{ $article->title }}
                        </h2>
                    </a>

                    <p class="text-gray-600 dark:text-gray-300 mb-6 line-clamp-3">
                        {{ Str::limit($article->content, 150) }}
                    </p>

                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-2">
                            <img class="w-8 h-8 rounded-full" src="{{ $article->user->avatar_url ?? 'https://ui-avatars.com/api/?name=Author' }}" alt="Author avatar">
                            <span class="text-sm font-medium text-gray-700 dark:text-gray-300">
                                {{ $article->user->name ?? 'Anonymous' }}
                            </span>
                        </div>

                        <a href="{{ route('user.article.details', $article->slug) }}" class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 focus:outline-none transition-colors duration-200 dark:bg-blue-500 dark:hover:bg-blue-600 dark:focus:ring-blue-700" wire:navigate>
                            Read more
                            <svg class="w-4 h-4 ml-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-span-full">
                <div class="flex flex-col items-center justify-center p-8 text-center bg-white dark:bg-gray-800 rounded-xl shadow">
                    <svg class="w-16 h-16 text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M12 12h.01M12 12h.01M12 12h.01M12 12h.01M12 12h.01M12 12h.01M12 12h.01M12 12h.01M12 12h.01M12 12h.01M12 12h.01M12 12h.01M12 12h.01M12 12h.01"></path>
                    </svg>
                    <p class="text-xl font-medium text-gray-600 dark:text-gray-300">No articles found</p>
                    <p class="mt-2 text-gray-500 dark:text-gray-400">Check back later for new content</p>
                </div>
            </div>
        @endforelse
    </div>
</div>