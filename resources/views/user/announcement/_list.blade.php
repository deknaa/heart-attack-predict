@if ($announcements->count())
    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
        @foreach ($announcements as $announcement)
            <div
                class="bg-white overflow-hidden shadow-sm rounded-lg transition-all duration-300 hover:shadow-md hover:translate-y-[-4px]">

                <div class="relative h-48 bg-gradient-to-r from-blue-500 to-indigo-600">
                    @if (isset($announcement->image) && $announcement->image)
                        <img src="{{ $announcement->image }}" alt="{{ $announcement->title }}"
                            class="object-cover w-full h-full">
                    @else
                        <div class="flex items-center justify-center w-full h-full">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-16 h-16 text-white/80" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z" />
                            </svg>
                        </div>
                    @endif
                </div>

                {{-- Card Content --}}
                <div class="p-6">
                    <div class="flex items-center mb-2 text-sm text-gray-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-1" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <time datetime="{{ $announcement->created_at->format('Y-m-d') }}">
                            {{ $announcement->created_at->diffForHumans() }}
                        </time>
                    </div>

                    <h2 class="text-xl font-semibold text-gray-900 mb-3 line-clamp-2 min-h-[3.5rem]">
                        {{ $announcement->title }}
                    </h2>


                    <div class="mb-4 text-sm text-gray-600 line-clamp-3">
                        {!! strip_tags($announcement->content) !!}
                    </div>


                    <div class="flex items-center justify-between pt-3 mt-2 border-t border-gray-100">
                        <a href="{{ route('announcement.detail', $announcement->slug ?? '') }}"
                            class="inline-flex items-center px-4 py-2 text-sm font-medium text-white transition-colors bg-blue-600 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            Detail
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1.5" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M14 5l7 7m0 0l-7 7m7-7H3" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@else
    @if (isset($search))
        <p class="block">Tidak ada hasil pencarian yang ditemukan.</p>
    @else
        <p class="hidden">Tidak ada hasil pencarian yang ditemukan.</p>
    @endif
@endif
