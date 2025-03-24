<x-app-layout>
    <div class="p-12 pt-20">
        <div class="p-5 bg-white rounded-lg">
        <!-- Article Header -->
        <header class="py-16 text-white bg-gradient-to-r from-blue-500 to-purple-600">
            <div class="container px-4 mx-auto">
                <div class="flex flex-wrap">
                    <div class="w-full md:w-2/3 md:pr-8">
                        <span
                            class="px-3 py-1 text-sm font-medium text-blue-600 bg-white rounded-full">{{ $article->category }}</span>
                        <h1 class="mt-4 mb-3 text-3xl font-bold md:text-4xl lg:text-5xl">{{ $article->title }}</h1>
                        <div class="flex items-center space-x-4 text-sm text-blue-100">
                            <div class="flex items-center">
                                <img src="{{ $article->user->avatar_url }}" alt="Author" class="w-8 h-8 mr-2 rounded-full">
                                <span>{{ $article->user->name }}</span>
                            </div>
                            <span>•</span>
                            <span>{{ $article->created_at->diffForHumans() }}</span>
                            <span>•</span>
                            <span>{{ $article->views }} views</span>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!-- Article Content -->
        <main class="container px-4 py-8 mx-auto">
            <div class="flex flex-wrap -mx-4">
                <!-- Main content -->
                <div class="w-full px-4 lg:w-2/3">
                    <!-- Featured image -->
                    <div class="mb-8 overflow-hidden shadow-md rounded-xl">
                        @if($article->featured_image)
                            <img src="{{ Storage::url($article->featured_image) }}" alt="Featured Image" class="w-full h-auto">
                        @else
                            <span></span>
                        @endif
                    </div>

                    <!-- Article body -->
                    <article class="prose lg:prose-xl max-w-none">
                        {!! $article->content !!}
                    </article>

                    <!-- Tags -->
                    <div class="flex flex-wrap gap-2 my-8">
                            <a href="#"
                        class="px-3 py-1 text-sm text-gray-700 transition bg-gray-100 rounded-full hover:bg-gray-200">{{ $article->category }}</a>
                    </div>

                    <!-- Author bio -->
                    <div class="p-6 my-8 bg-blue-50 rounded-xl">
                        <div class="flex flex-col sm:flex-row">
                            <img src="{{ $article->user->avatar_url }}" alt="Author"
                                class="w-24 h-24 mx-auto mb-4 rounded-full sm:mx-0 sm:mb-0">
                            <div class="sm:ml-6">
                                <h3 class="mb-2 text-xl font-bold">{{ $article->user->name }}</h3>
                                @if($article->user->author_description)
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

                    <!-- Share buttons -->
                    <div class="py-6 my-8 border-t border-b">
                        <h3 class="mb-4 text-lg font-bold">Bagikan Artikel Ini</h3>
                        <div class="flex space-x-4">
                            <a href="#"
                                class="flex items-center px-4 py-2 text-white transition bg-blue-600 rounded-lg hover:bg-blue-700">
                                <i class="mr-2 fab fa-facebook-f"></i> Facebook
                            </a>
                            <a href="#"
                                class="flex items-center px-4 py-2 text-white transition bg-blue-400 rounded-lg hover:bg-blue-500">
                                <i class="mr-2 fab fa-twitter"></i> Twitter
                            </a>
                            <a href="#"
                                class="flex items-center px-4 py-2 text-white transition bg-green-500 rounded-lg hover:bg-green-600">
                                <i class="mr-2 fab fa-whatsapp"></i> WhatsApp
                            </a>
                            <a href="#"
                                class="flex items-center px-4 py-2 text-gray-700 transition bg-gray-200 rounded-lg hover:bg-gray-300">
                                <i class="mr-2 far fa-envelope"></i> Email
                            </a>
                        </div>
                    </div>

                    <!-- Comments -->
                    <section class="my-8">
                        <h3 class="mb-6 text-2xl font-bold">Komentar (3)</h3>

                        <!-- Comment form -->
                        <div class="p-6 mb-8 bg-white rounded-lg shadow-sm">
                            <h4 class="mb-4 text-lg font-medium">Tinggalkan Komentar</h4>
                            <form>
                                <div class="grid grid-cols-1 gap-4 mb-4 md:grid-cols-2">
                                    <div>
                                        <label for="name" class="block mb-2 text-gray-700">Nama</label>
                                        <input type="text" id="name"
                                            class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                                    </div>
                                    <div>
                                        <label for="email" class="block mb-2 text-gray-700">Email</label>
                                        <input type="email" id="email"
                                            class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <label for="comment" class="block mb-2 text-gray-700">Komentar</label>
                                    <textarea id="comment" rows="4"
                                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
                                </div>
                                <button type="submit"
                                    class="px-6 py-2 text-white transition bg-blue-600 rounded-lg hover:bg-blue-700">Kirim
                                    Komentar</button>
                            </form>
                        </div>

                        <!-- Comment list -->
                        <div class="space-y-6">
                            <!-- Comment 1 -->
                            <div class="p-6 bg-white rounded-lg shadow-sm">
                                <div class="flex items-start">
                                    <img src="/api/placeholder/48/48" alt="Commenter" class="w-12 h-12 rounded-full">
                                    <div class="flex-1 ml-4">
                                        <div class="flex items-center justify-between mb-2">
                                            <h5 class="font-bold">Andi Wijaya</h5>
                                            <span class="text-sm text-gray-500">2 jam yang lalu</span>
                                        </div>
                                        <p class="text-gray-700">Artikel yang sangat informatif! Saya setuju bahwa
                                            Indonesia memiliki potensi besar di bidang AI, tetapi perlu investasi lebih
                                            dalam infrastruktur dan pendidikan.</p>
                                        <div class="flex mt-3 space-x-4 text-sm">
                                            <button
                                                class="flex items-center text-gray-500 transition hover:text-blue-600">
                                                <i class="mr-1 far fa-thumbs-up"></i> 12
                                            </button>
                                            <button class="text-gray-500 transition hover:text-blue-600">Balas</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Comment 2 -->
                            <div class="p-6 bg-white rounded-lg shadow-sm">
                                <div class="flex items-start">
                                    <img src="/api/placeholder/48/48" alt="Commenter" class="w-12 h-12 rounded-full">
                                    <div class="flex-1 ml-4">
                                        <div class="flex items-center justify-between mb-2">
                                            <h5 class="font-bold">Siti Rahma</h5>
                                            <span class="text-sm text-gray-500">1 hari yang lalu</span>
                                        </div>
                                        <p class="text-gray-700">Sebagai pengembang software, saya sangat tertarik
                                            dengan perkembangan AI di Indonesia. Namun saya khawatir dengan kesenjangan
                                            digital yang masih menjadi tantangan utama.</p>
                                        <div class="flex mt-3 space-x-4 text-sm">
                                            <button
                                                class="flex items-center text-gray-500 transition hover:text-blue-600">
                                                <i class="mr-1 far fa-thumbs-up"></i> 8
                                            </button>
                                            <button class="text-gray-500 transition hover:text-blue-600">Balas</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Comment 3 with reply -->
                            <div class="p-6 bg-white rounded-lg shadow-sm">
                                <div class="flex items-start">
                                    <img src="/api/placeholder/48/48" alt="Commenter" class="w-12 h-12 rounded-full">
                                    <div class="flex-1 ml-4">
                                        <div class="flex items-center justify-between mb-2">
                                            <h5 class="font-bold">Hendra Gunawan</h5>
                                            <span class="text-sm text-gray-500">2 hari yang lalu</span>
                                        </div>
                                        <p class="text-gray-700">Bagaimana dengan isu privasi data dalam pengembangan
                                            AI di Indonesia? Saya rasa ini perlu dibahas lebih dalam.</p>
                                        <div class="flex mt-3 space-x-4 text-sm">
                                            <button
                                                class="flex items-center text-gray-500 transition hover:text-blue-600">
                                                <i class="mr-1 far fa-thumbs-up"></i> 5
                                            </button>
                                            <button class="text-gray-500 transition hover:text-blue-600">Balas</button>
                                        </div>

                                        <!-- Reply -->
                                        <div class="pt-4 mt-4 ml-6 border-t">
                                            <div class="flex items-start">
                                                <img src="/api/placeholder/40/40" alt="Author"
                                                    class="w-10 h-10 rounded-full">
                                                <div class="flex-1 ml-3">
                                                    <div class="flex items-center justify-between mb-2">
                                                        <h5 class="font-bold">Budi Santoso <span
                                                                class="text-sm text-blue-600">(Penulis)</span></h5>
                                                        <span class="text-sm text-gray-500">1 hari yang lalu</span>
                                                    </div>
                                                    <p class="text-gray-700">Terima kasih atas pertanyaannya, Hendra.
                                                        Anda benar, privasi data adalah aspek penting yang seharusnya
                                                        menjadi fokus dalam pengembangan AI. Saya berencana membahas ini
                                                        di artikel selanjutnya.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mt-8 text-center">
                            <button
                                class="px-6 py-2 text-blue-600 transition border border-blue-600 rounded-lg hover:bg-blue-50">Lihat
                                Lebih Banyak Komentar</button>
                        </div>
                    </section>
                </div>

                <!-- Sidebar -->
                <div class="w-full px-4 mt-8 lg:w-1/3 lg:mt-0">
                    <!-- Author card (mobile only) -->
                    <div class="p-6 mb-8 lg:hidden bg-blue-50 rounded-xl">
                        <div class="flex items-center">
                            <img src="/api/placeholder/64/64" alt="Author" class="w-16 h-16 rounded-full">
                            <div class="ml-4">
                                <h3 class="text-xl font-bold">Budi Santoso</h3>
                                <p class="text-gray-600">Peneliti & Konsultan Teknologi</p>
                            </div>
                        </div>
                    </div>

                    <!-- Search -->
                    <div class="p-6 mb-8 bg-white rounded-lg shadow-sm">
                        <h3 class="mb-4 text-lg font-bold">Cari Artikel</h3>
                        <div class="relative">
                            <input type="text" placeholder="Kata kunci..."
                                class="w-full px-4 py-2 pr-10 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <button class="absolute right-3 top-2.5 text-gray-400 hover:text-gray-600">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Newsletter -->
                    <div class="p-6 mb-8 text-white rounded-lg shadow-sm bg-gradient-to-r from-blue-500 to-blue-600">
                        <h3 class="mb-2 text-lg font-bold">Dapatkan Update Terbaru</h3>
                        <p class="mb-4">Berlangganan newsletter kami untuk mendapatkan artikel terbaru langsung ke
                            inbox Anda.</p>
                        <form>
                            <div class="flex flex-col space-y-2">
                                <input type="email" placeholder="Email Anda"
                                    class="px-4 py-2 text-gray-700 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-300">
                                <button type="submit"
                                    class="px-4 py-2 font-medium text-blue-600 transition bg-white rounded-lg hover:bg-blue-50">Berlangganan</button>
                            </div>
                        </form>
                    </div>

                    <!-- Popular articles -->
                    <div class="p-6 mb-8 bg-white rounded-lg shadow-sm">
                        <h3 class="mb-4 text-lg font-bold">Artikel Populer</h3>
                        <div class="space-y-4">
                            <a href="#" class="flex group">
                                <img src="/api/placeholder/80/60" alt="Article thumbnail"
                                    class="object-cover w-20 h-16 rounded">
                                <div class="ml-3">
                                    <h4
                                        class="font-medium text-gray-900 transition group-hover:text-blue-600 line-clamp-2">
                                        Bagaimana Big Data Mengubah Strategi Bisnis di Era Digital</h4>
                                    <p class="mt-1 text-sm text-gray-500">3 hari yang lalu</p>
                                </div>
                            </a>
                            <a href="#" class="flex group">
                                <img src="/api/placeholder/80/60" alt="Article thumbnail"
                                    class="object-cover w-20 h-16 rounded">
                                <div class="ml-3">
                                    <h4
                                        class="font-medium text-gray-900 transition group-hover:text-blue-600 line-clamp-2">
                                        5 Tren Teknologi yang Akan Mendominasi Tahun 2023</h4>
                                    <p class="mt-1 text-sm text-gray-500">1 minggu yang lalu</p>
                                </div>
                            </a>
                            <a href="#" class="flex group">
                                <img src="/api/placeholder/80/60" alt="Article thumbnail"
                                    class="object-cover w-20 h-16 rounded">
                                <div class="ml-3">
                                    <h4
                                        class="font-medium text-gray-900 transition group-hover:text-blue-600 line-clamp-2">
                                        Keamanan Siber: Tantangan Utama di Era Transformasi Digital</h4>
                                    <p class="mt-1 text-sm text-gray-500">2 minggu yang lalu</p>
                                </div>
                            </a>
                            <a href="#" class="flex group">
                                <img src="/api/placeholder/80/60" alt="Article thumbnail"
                                    class="object-cover w-20 h-16 rounded">
                                <div class="ml-3">
                                    <h4
                                        class="font-medium text-gray-900 transition group-hover:text-blue-600 line-clamp-2">
                                        Blockchain dan Masa Depan Transaksi Keuangan Digital</h4>
                                    <p class="mt-1 text-sm text-gray-500">3 minggu yang lalu</p>
                                </div>
                            </a>
                        </div>
                    </div>

                    <!-- Categories -->
                    <div class="p-6 mb-8 bg-white rounded-lg shadow-sm">
                        <h3 class="mb-4 text-lg font-bold">Kategori</h3>
                        <div class="space-y-2">
                            <a href="#"
                                class="flex items-center justify-between py-2 transition border-b hover:text-blue-600">
                                <span>Teknologi</span>
                                <span class="px-2 py-1 text-xs text-blue-600 bg-blue-100 rounded">42</span>
                            </a>
                            <a href="#"
                                class="flex items-center justify-between py-2 transition border-b hover:text-blue-600">
                                <span>Bisnis Digital</span>
                                <span class="px-2 py-1 text-xs text-blue-600 bg-blue-100 rounded">28</span>
                            </a>
                            <a href="#"
                                class="flex items-center justify-between py-2 transition border-b hover:text-blue-600">
                                <span>Keamanan Siber</span>
                                <span class="px-2 py-1 text-xs text-blue-600 bg-blue-100 rounded">15</span>
                            </a>
                            <a href="#"
                                class="flex items-center justify-between py-2 transition border-b hover:text-blue-600">
                                <span>Startup</span>
                                <span class="px-2 py-1 text-xs text-blue-600 bg-blue-100 rounded">21</span>
                            </a>
                            <a href="#"
                                class="flex items-center justify-between py-2 transition hover:text-blue-600">
                                <span>Edukasi</span>
                                <span class="px-2 py-1 text-xs text-blue-600 bg-blue-100 rounded">16</span>
                            </a>
                        </div>
                    </div>

                    <!-- Tags cloud -->
                    <div class="p-6 bg-white rounded-lg shadow-sm">
                        <h3 class="mb-4 text-lg font-bold">Tag Populer</h3>
                        <div class="flex flex-wrap gap-2">
                            <a href="#"
                                class="px-3 py-1 text-sm text-gray-700 transition bg-gray-100 rounded-full hover:bg-gray-200">Teknologi</a>
                            <a href="#"
                                class="px-3 py-1 text-sm text-gray-700 transition bg-gray-100 rounded-full hover:bg-gray-200">AI</a>
                            <a href="#"
                                class="px-3 py-1 text-sm text-gray-700 transition bg-gray-100 rounded-full hover:bg-gray-200">AI</a>
                            <a href="#"
                                class="px-3 py-1 text-sm text-gray-700 transition bg-gray-100 rounded-full hover:bg-gray-200">Machine
                                Learning</a>
                            <a href="#"
                                class="px-3 py-1 text-sm text-gray-700 transition bg-gray-100 rounded-full hover:bg-gray-200">Big
                                Data</a>
                            <a href="#"
                                class="px-3 py-1 text-sm text-gray-700 transition bg-gray-100 rounded-full hover:bg-gray-200">Digital
                                Marketing</a>
                            <a href="#"
                                class="px-3 py-1 text-sm text-gray-700 transition bg-gray-100 rounded-full hover:bg-gray-200">Startup</a>
                            <a href="#"
                                class="px-3 py-1 text-sm text-gray-700 transition bg-gray-100 rounded-full hover:bg-gray-200">Keamanan</a>
                            <a href="#"
                                class="px-3 py-1 text-sm text-gray-700 transition bg-gray-100 rounded-full hover:bg-gray-200">Cloud</a>
                            <a href="#"
                                class="px-3 py-1 text-sm text-gray-700 transition bg-gray-100 rounded-full hover:bg-gray-200">Blockchain</a>
                            <a href="#"
                                class="px-3 py-1 text-sm text-gray-700 transition bg-gray-100 rounded-full hover:bg-gray-200">IoT</a>
                            <a href="#"
                                class="px-3 py-1 text-sm text-gray-700 transition bg-gray-100 rounded-full hover:bg-gray-200">Inovasi</a>
                            <a href="#"
                                class="px-3 py-1 text-sm text-gray-700 transition bg-gray-100 rounded-full hover:bg-gray-200">UX
                                Design</a>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <!-- Related articles -->
        <section class="py-12 bg-gray-100">
            <div class="container px-4 mx-auto">
                <h2 class="mb-8 text-2xl font-bold">Artikel Terkait</h2>
                <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3">
                    <!-- Article card 1 -->
                    <div class="overflow-hidden transition bg-white shadow-sm rounded-xl hover:shadow-md">
                        <a href="#">
                            <img src="/api/placeholder/400/240" alt="Article thumbnail"
                                class="object-cover w-full h-48">
                            <div class="p-6">
                                <span class="text-sm font-medium text-blue-600">Teknologi</span>
                                <h3 class="mt-2 mb-3 text-xl font-bold transition hover:text-blue-600">Penerapan
                                    Machine Learning dalam Bisnis di Indonesia</h3>
                                <p class="text-gray-600 line-clamp-3">Bagaimana bisnis di Indonesia dapat memanfaatkan
                                    machine learning untuk meningkatkan efisiensi dan profitabilitas.</p>
                                <div class="flex items-center mt-4">
                                    <img src="/api/placeholder/24/24" alt="Author"
                                        class="w-6 h-6 mr-2 rounded-full">
                                    <span class="text-sm text-gray-500">Anita Wijaya</span>
                                    <span class="mx-2 text-gray-300">•</span>
                                    <span class="text-sm text-gray-500">10 Maret 2023</span>
                                </div>
                            </div>
                        </a>
                    </div>

                    <!-- Article card 2 -->
                    <div class="overflow-hidden transition bg-white shadow-sm rounded-xl hover:shadow-md">
                        <a href="#">
                            <img src="/api/placeholder/400/240" alt="Article thumbnail"
                                class="object-cover w-full h-48">
                            <div class="p-6">
                                <span class="text-sm font-medium text-blue-600">Startup</span>
                                <h3 class="mt-2 mb-3 text-xl font-bold transition hover:text-blue-600">10 Startup AI
                                    Indonesia yang Perlu Diperhatikan di 2023</h3>
                                <p class="text-gray-600 line-clamp-3">Mengenal lebih dekat startup-startup AI Indonesia
                                    yang sedang berkembang pesat dan inovasi yang mereka tawarkan.</p>
                                <div class="flex items-center mt-4">
                                    <img src="/api/placeholder/24/24" alt="Author"
                                        class="w-6 h-6 mr-2 rounded-full">
                                    <span class="text-sm text-gray-500">Rendra Pratama</span>
                                    <span class="mx-2 text-gray-300">•</span>
                                    <span class="text-sm text-gray-500">5 Maret 2023</span>
                                </div>
                            </div>
                        </a>
                    </div>

                    <!-- Article card 3 -->
                    <div class="overflow-hidden transition bg-white shadow-sm rounded-xl hover:shadow-md">
                        <a href="#">
                            <img src="/api/placeholder/400/240" alt="Article thumbnail"
                                class="object-cover w-full h-48">
                            <div class="p-6">
                                <span class="text-sm font-medium text-blue-600">Edukasi</span>
                                <h3 class="mt-2 mb-3 text-xl font-bold transition hover:text-blue-600">Menyiapkan
                                    Generasi Muda Indonesia untuk Era AI</h3>
                                <p class="text-gray-600 line-clamp-3">Strategi pendidikan dan pelatihan yang dibutuhkan
                                    untuk mempersiapkan tenaga kerja Indonesia di era kecerdasan buatan.</p>
                                <div class="flex items-center mt-4">
                                    <img src="/api/placeholder/24/24" alt="Author"
                                        class="w-6 h-6 mr-2 rounded-full">
                                    <span class="text-sm text-gray-500">Dr. Sinta Dewi</span>
                                    <span class="mx-2 text-gray-300">•</span>
                                    <span class="text-sm text-gray-500">28 Februari 2023</span>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <!-- CTA Section -->
        <section class="py-16 text-white bg-gradient-to-r from-blue-600 to-purple-600">
            <div class="container px-4 mx-auto text-center">
                <h2 class="mb-4 text-3xl font-bold">Tetap Update dengan Perkembangan Teknologi</h2>
                <p class="max-w-3xl mx-auto mb-8 text-xl">Dapatkan artikel terbaru tentang AI, teknologi, dan inovasi
                    digital langsung ke inbox Anda.</p>
                <form class="flex flex-col max-w-xl gap-4 mx-auto sm:flex-row">
                    <input type="email" placeholder="Email Anda"
                        class="flex-1 px-4 py-3 text-gray-800 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-300">
                    <button type="submit"
                        class="px-6 py-3 font-bold text-blue-600 transition bg-white rounded-lg hover:bg-blue-50">Berlangganan</button>
                </form>
                <p class="mt-4 text-sm text-blue-100">Kami menghargai privasi Anda. Tidak ada spam, kapanpun.</p>
            </div>
        </section>

        <!-- Back to top button -->
        <button id="back-to-top"
            class="fixed p-3 text-white transition-opacity duration-300 bg-blue-600 rounded-full shadow-lg opacity-0 bottom-6 right-6 hover:bg-blue-700">
            <i class="fas fa-arrow-up"></i>
        </button>
    </div>
    </div>
    <script>
        // Back to top button
        const backToTopButton = document.getElementById('back-to-top');
        window.addEventListener('scroll', function() {
            if (window.scrollY > 300) {
                backToTopButton.classList.remove('opacity-0');
                backToTopButton.classList.add('opacity-100');
            } else {
                backToTopButton.classList.remove('opacity-100');
                backToTopButton.classList.add('opacity-0');
            }
        });

        backToTopButton.addEventListener('click', function() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
    </script>
</x-app-layout>
