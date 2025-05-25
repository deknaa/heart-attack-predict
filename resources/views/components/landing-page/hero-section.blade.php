<section id="home" class="relative overflow-hidden text-gray-800 transition-colors duration-300 bg-gradient-to-br from-red-50 to-red-100 dark:from-gray-900 dark:to-gray-800 dark:text-white">
    <div class="relative px-4 py-16 mx-auto max-w-7xl sm:px-6 sm:py-24 lg:px-8">
        
        {{-- Content --}}
        <div class="relative grid items-center gap-12 lg:grid-cols-2 lg:gap-16">
            {{-- Left --}}
            <div class="max-w-xl" data-aos="fade-up" data-aos-duration="1000">
                <!-- Primary heading with gradient text -->
                <h1 class="mb-6 text-4xl font-extrabold tracking-tight sm:text-5xl lg:text-6xl">
                    <span class="block text-transparent bg-clip-text bg-gradient-to-r from-red-600 to-red-800 dark:from-red-400 dark:to-red-600">
                        Deteksi Risiko Serangan Jantung Lebih Awal
                    </span>
                </h1>
                
                <!-- Description with better readability -->
                <p class="max-w-3xl mt-6 text-xl leading-relaxed text-gray-600 dark:text-gray-300">
                    HealthCare menggunakan teknologi AI untuk membantu Anda memahami risiko serangan jantung
                    berdasarkan faktor kesehatan dan gaya hidup Anda.
                </p>
                
                <!-- Call to Action Buttons -->
                <div class="flex flex-wrap gap-4 mt-10">
                    <a href="{{ route('login') }}"
                        class="px-6 py-3.5 text-base font-medium text-white bg-gradient-to-r from-red-600 to-red-700 hover:from-red-700 hover:to-red-800 dark:from-red-500 dark:to-red-600 dark:hover:from-red-600 dark:hover:to-red-700 rounded-full shadow-lg hover:shadow-xl transition-all duration-300 flex items-center group">
                        Cek Risiko Anda
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 ml-2 transition-transform duration-300 group-hover:translate-x-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                        </svg>
                    </a>
                    <a href="#about"
                        class="px-6 py-3.5 text-base font-medium text-gray-700 dark:text-white bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-700 rounded-full shadow-md hover:shadow-lg transition-all duration-300">
                        Pelajari Lebih Lanjut
                    </a>
                </div>
                
                <!-- Benefit Labels -->
                <div class="flex flex-wrap gap-4 mt-8">
                    <div class="flex items-center px-4 py-2 bg-white rounded-full shadow-sm dark:bg-gray-800">
                        <span class="flex items-center justify-center w-8 h-8 mr-2 bg-red-100 rounded-full dark:bg-red-900">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-red-600 dark:text-red-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                            </svg>
                        </span>
                        <span class="text-sm font-medium text-gray-700 dark:text-gray-300">Teknologi AI Terkini</span>
                    </div>
                    <div class="flex items-center px-4 py-2 bg-white rounded-full shadow-sm dark:bg-gray-800">
                        <span class="flex items-center justify-center w-8 h-8 mr-2 bg-red-100 rounded-full dark:bg-red-900">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-red-600 dark:text-red-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                            </svg>
                        </span>
                        <span class="text-sm font-medium text-gray-700 dark:text-gray-300">Hasil Instan</span>
                    </div>
                </div>
            </div>
            
            {{-- Rigth --}}
            <div class="relative flex items-center justify-center" data-aos="fade-up" data-aos-delay="200" data-aos-duration="1000">
                <div class="relative">
                    <div class="absolute inset-0 -m-16 rounded-full bg-gradient-to-r from-red-500 to-red-600 opacity-20 dark:opacity-30 blur-3xl"></div>
                    <img src="{{ asset('image/landingpage/heart.png') }}" alt="Heart Illustration"
                        class="relative z-10 w-full h-auto max-w-md mx-auto rounded-xl" />
                </div>
                
                <div class="absolute z-20 p-4 bg-white shadow-xl -top-4 -right-4 sm:right-8 dark:bg-gray-800 rounded-2xl">
                    <div class="text-center">
                        <div class="flex items-center mb-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-1 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <span class="text-2xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-red-600 to-red-800 dark:from-red-400 dark:to-red-600">83.61%</span>
                        </div>
                        <span class="text-xs font-medium text-gray-600 dark:text-gray-400">Tingkat Akurasi</span>
                    </div>
                </div>
                
                <div class="absolute z-20 p-4 bg-white shadow-xl -bottom-4 -left-4 sm:left-8 dark:bg-gray-800 rounded-2xl">
                    <div class="flex items-center justify-center w-16 h-16">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</section>