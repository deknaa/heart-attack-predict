<section id="about" class="py-16 bg-gray-50 dark:bg-gray-800">
    <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="items-center lg:grid lg:grid-cols-2 lg:gap-12">
            <div data-aos="fade-down" data-aos-offset="300" data-aos-easing="ease-in-sine" data-aos-duration="1500">
                <span class="font-semibold text-red-600">Tentang {{ config('app.name') }}</span>
                <h2 class="mt-2 text-3xl font-extrabold text-gray-900 sm:text-4xl dark:text-gray-50">
                    Prediksi Medis Berbasis ML
                </h2>
                <p class="mt-4 text-lg text-gray-600 dark:text-gray-50">
                    {{ config('app.name') }} adalah platform prediksi risiko serangan jantung yang menggunakan Machine Learning canggih
                    untuk menganalisis berbagai faktor risiko kesehatan Anda.
                </p>
                <div class="mt-8 space-y-4">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <div class="flex items-center justify-center w-12 h-12 text-red-600 bg-red-100 rounded-md">
                                <i class="fas fa-heartbeat"></i>
                            </div>
                        </div>
                        <div class="ml-4">
                            <h3 class="text-lg font-medium text-gray-900 dark:text-gray-50">Analisis Faktor Risiko Komprehensif</h3>
                            <p class="mt-2 text-gray-600 dark:text-gray-300">
                                Kami menganalisis lebih dari 12 faktor risiko yang telah terbukti secara ilmiah
                                berhubungan dengan serangan jantung.
                            </p>
                        </div>
                    </div>
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <div class="flex items-center justify-center w-12 h-12 text-red-600 bg-red-100 rounded-md">
                                <i class="fas fa-chart-line"></i>
                            </div>
                        </div>
                        <div class="ml-4">
                            <h3 class="text-lg font-medium text-gray-900 dark:text-gray-50">Algoritma AI yang Teruji</h3>
                            <p class="mt-2 text-gray-600 dark:text-gray-300">
                                Model prediksi kami dilatih dengan dataset dari ratusan kasus nyata dengan tingkat
                                akurasi mencapai 83.61%.
                            </p>
                        </div>
                    </div>
                </div>
            </div>


            <div class="relative mt-10 lg:mt-0" data-aos="fade-down" data-aos-offset="300"
                data-aos-easing="ease-in-sine" data-aos-duration="1500">
                <img class="rounded-xl" src="{{ asset('image/landingpage/doctor2.png') }}" alt="Doctor with patient" />
                <div class="absolute max-w-xs p-6 bg-white rounded-lg shadow-lg -bottom-6 -right-6">
                    <div class="flex items-start">
                        <div class="flex-shrink-0">
                            <i class="text-3xl text-red-500 fas fa-quote-left"></i>
                        </div>
                        <div class="ml-4">
                            <p class="italic text-gray-600">
                                "{{ config('app.name') }} adalah website yang membantu anda untuk memprediksi risiko serangan jantung dengan menggunakan teknologi AI."
                            </p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
