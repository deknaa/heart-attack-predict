<div class="min-h-screen bg-gray-50 dark:bg-gray-900">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <!-- Breadcrumb -->
        <nav class="flex mb-8" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                <li class="inline-flex items-center">
                    <a href="{{ route('user.article.view') }}" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                        <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z"/>
                        </svg>
                        Home
                    </a>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                        </svg>
                        <a href="#" class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">Articles</a>
                    </div>
                </li>
                <li aria-current="page">
                    <div class="flex items-center">
                        <svg class="w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                        </svg>
                        <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">{{ $article->title }}</span>
                    </div>
                </li>
            </ol>
        </nav>

        <!-- Article Header -->
        <div class="mb-8">
            <div class="flex items-center gap-4 mb-4">
                <span class="px-3 py-1 text-sm font-semibold text-blue-600 bg-blue-100 rounded-full dark:bg-blue-900 dark:text-blue-300">
                    {{ $article->category ?? 'Uncategorized' }}
                </span>
                <span class="text-gray-500 dark:text-gray-400">
                    {{ $article->created_at->format('F j, Y') }}
                </span>
            </div>
            <h1 class="text-4xl font-bold text-gray-900 dark:text-white mb-6">
                {{ $article->title }}
            </h1>
            <div class="flex items-center space-x-4">
                <img class="w-12 h-12 rounded-full" src="{{ $article->user->avatar_url ?? 'https://ui-avatars.com/api/?name=Author' }}" alt="Author avatar">
                <div>
                    <div class="font-medium text-gray-800 dark:text-white">
                        {{ $article->user->name ?? 'Anonymous' }}
                    </div>
                    <div class="text-sm text-gray-500 dark:text-gray-400">
                        {{ $article->author->role ?? 'Contributor' }}
                    </div>
                </div>
            </div>
        </div>

        <!-- Featured Image -->
        <div class="relative w-full h-[400px] mb-8 rounded-xl overflow-hidden">
            <img src="/docs/images/blog/image-1.jpg" 
                 alt="{{ $article->title }}" 
                 class="w-full h-full object-cover">
        </div>

        <!-- Article Content -->
        <article class="prose prose-lg max-w-none dark:prose-invert">
            {!! $article->content !!}
        </article>

        <!-- Tags -->
        @if($article->tags && count($article->tags) > 0)
        <div class="mt-8 pt-8 border-t border-gray-200 dark:border-gray-700">
            <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Tags</h3>
            <div class="flex flex-wrap gap-2">
                @foreach($article->tags as $tag)
                <a href="#" class="px-4 py-2 rounded-full bg-gray-100 hover:bg-gray-200 text-gray-700 text-sm font-medium dark:bg-gray-800 dark:hover:bg-gray-700 dark:text-gray-300">
                    #{{ $tag->name }}
                </a>
                @endforeach
            </div>
        </div>
        @endif

        <!-- Share Buttons -->
        <div class="mt-8 pt-8 border-t border-gray-200 dark:border-gray-700">
            <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Share this article</h3>
            <div class="flex space-x-4">
                <a href="#" class="text-gray-500 hover:text-blue-600 dark:hover:text-blue-400">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84"></path>
                    </svg>
                </a>
                <a href="#" class="text-gray-500 hover:text-blue-600 dark:hover:text-blue-400">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd"></path>
                    </svg>
                </a>
                <a href="#" class="text-gray-500 hover:text-blue-600 dark:hover:text-blue-400">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path fill-rule="evenodd" d="M19 3a2 2 0 012 2v14a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h14m-.5 15.5v-5.3a3.26 3.26 0 00-3.26-3.26c-.85 0-1.84.52-2.32 1.3v-1.11h-2.79v8.37h2.79v-4.93c0-.77.62-1.4 1.39-1.4a1.4 1.4 0 011.4 1.4v4.93h2.79M6.88 8.56a1.68 1.68 0 001.68-1.68c0-.93-.75-1.69-1.68-1.69a1.69 1.69 0 00-1.69 1.69c0 .93.76 1.68 1.69 1.68m1.39 9.94v-8.37H5.5v8.37h2.77z" clip-rule="evenodd"></path>
                    </svg>
                </a>
            </div>
        </div>

        <!-- Related Articles -->
        @if(isset($relatedArticles) && count($relatedArticles) > 0)
        <div class="mt-12 pt-8 border-t border-gray-200 dark:border-gray-700">
            <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-6">Related Articles</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                @foreach($relatedArticles as $relatedArticle)
                <a href="#" class="block group">
                    <div class="flex items-center space-x-4">
                        <img src="/docs/images/blog/image-1.jpg" 
                             alt="{{ $relatedArticle->title }}" 
                             class="w-24 h-24 rounded-lg object-cover">
                        <div>
                            <h4 class="text-lg font-semibold text-gray-900 group-hover:text-blue-600 dark:text-white dark:group-hover:text-blue-400">
                                {{ $relatedArticle->title }}
                            </h4>
                            <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">
                                {{ $relatedArticle->created_at->format('F j, Y') }}
                            </p>
                        </div>
                    </div>
                </a>
                @endforeach
            </div>
        </div>
        @endif
    </div>
</div>