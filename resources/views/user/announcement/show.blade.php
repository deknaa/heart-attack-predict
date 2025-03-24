<x-app-layout>
    <div class="min-h-screen pt-20 bg-gray-50">
        <div class="px-4 py-10 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <!-- Header Section -->
            <div class="mb-10 text-center">
                <h1 class="text-3xl font-bold text-gray-900 sm:text-4xl">Pengumuman</h1>
                <p class="max-w-2xl mx-auto mt-3 text-xl text-gray-500 sm:mt-4">
                    Dapatkan informasi terbaru tentang kegiatan dan berita penting
                </p>
            </div>
            
            <!-- Filter/Search Section (Optional) -->
            <div class="flex flex-col gap-4 mb-8 sm:flex-row sm:items-center sm:justify-between">
                <div class="relative flex-1 max-w-xs">
                    <input type="text" placeholder="Cari pengumuman..." class="w-full py-2 pl-10 pr-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg class="w-5 h-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                        </svg>
                    </div>
                </div>
                
                <div class="flex space-x-2">
                    <select class="px-4 py-2 bg-white border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        <option value="">Semua Kategori</option>
                        <option value="penting">Penting</option>
                        <option value="akademik">Akademik</option>
                        <option value="kegiatan">Kegiatan</option>
                    </select>
                    
                    <select class="px-4 py-2 bg-white border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        <option value="terbaru">Terbaru</option>
                        <option value="terlama">Terlama</option>
                        <option value="populer">Paling Populer</option>
                    </select>
                </div>
            </div>
            
            <!-- Announcements Grid -->
            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
                @foreach ($announcements as $announcement)
                    <div class="bg-white overflow-hidden shadow-sm rounded-lg transition-all duration-300 hover:shadow-md hover:translate-y-[-4px]">
                        <!-- Card Header with Image (if available) -->
                        <div class="relative h-48 bg-gradient-to-r from-blue-500 to-indigo-600">
                            @if(isset($announcement->image) && $announcement->image)
                                <img src="{{ $announcement->image }}" alt="{{ $announcement->title }}" class="object-cover w-full h-full">
                            @else
                                <div class="flex items-center justify-center w-full h-full">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-16 h-16 text-white/80" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z" />
                                    </svg>
                                </div>
                            @endif
                            
                            <!-- Category Badge (if available) -->
                            @if(isset($announcement->category) && $announcement->category)
                                <div class="absolute px-3 py-1 text-xs font-medium text-white bg-blue-600 rounded-full top-3 right-3">
                                    {{ $announcement->category }}
                                </div>
                            @endif
                        </div>
                        
                        <!-- Card Body -->
                        <div class="p-6">
                            <!-- Meta information -->
                            <div class="flex items-center mb-2 text-sm text-gray-500">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <time datetime="{{ $announcement->created_at->format('Y-m-d') }}">
                                    {{ $announcement->created_at->diffForHumans() }}
                                </time>
                                
                                @if(isset($announcement->views))
                                    <span class="mx-2">•</span>
                                    <div class="flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                        </svg>
                                        {{ $announcement->views }} views
                                    </div>
                                @endif
                            </div>
                            
                            <!-- Title -->
                            <h2 class="text-xl font-semibold text-gray-900 mb-3 line-clamp-2 min-h-[3.5rem]">
                                {{ $announcement->title }}
                            </h2>
                            
                            <!-- Content preview -->
                            <div class="mb-4 text-sm text-gray-600 line-clamp-3">
                                {!! strip_tags($announcement->content) !!}
                            </div>
                            
                            <!-- Author information (if available) -->
                            @if(isset($announcement->author) && $announcement->author)
                                <div class="flex items-center mb-4">
                                    <div class="w-8 h-8 mr-2 overflow-hidden bg-gray-200 rounded-full">
                                        <img src="{{ $announcement->author->avatar ?? '' }}" alt="" class="object-cover w-full h-full">
                                    </div>
                                    <span class="text-sm font-medium text-gray-700">{{ $announcement->author->name ?? 'Admin' }}</span>
                                </div>
                            @endif
                            
                            <!-- Action button -->
                            <div class="flex items-center justify-between pt-3 mt-2 border-t border-gray-100">
                                <div>
                                    @if(isset($announcement->comments_count))
                                        <span class="inline-flex items-center text-sm text-gray-500">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
                                            </svg>
                                            {{ $announcement->comments_count ?? 0 }}
                                        </span>
                                    @endif
                                </div>
                                
                                <a href="{{ route('announcement.detail', $announcement->slug ?? '') }}" class="inline-flex items-center px-4 py-2 text-sm font-medium text-white transition-colors bg-blue-600 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                    Detail
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            
            <!-- Empty State (if no announcements) -->
            @if(count($announcements) == 0)
                <div class="p-8 text-center bg-white rounded-lg shadow-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-16 h-16 mx-auto text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
                    </svg>
                    <h3 class="mt-4 text-lg font-medium text-gray-900">Belum Ada Pengumuman</h3>
                    <p class="mt-2 text-sm text-gray-500">Belum ada pengumuman yang tersedia saat ini. Silakan cek kembali nanti.</p>
                </div>
            @endif
            
            <!-- Pagination -->
            @if(isset($announcements) && method_exists($announcements, 'links') && $announcements->hasPages())
                <div class="mt-8">
                    {{ $announcements->links() }}
                </div>
            @endif
        </div>
    </div>
</x-app-layout>