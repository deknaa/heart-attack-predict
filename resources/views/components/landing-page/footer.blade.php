<footer class="text-white bg-gray-800">
    <div class="px-4 py-12 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 gap-8 md:grid-cols-2">
            <div>
                <span class="text-2xl font-bold text-white"><i
                        class="mr-2 fas fa-heartbeat"></i>{{ config('app.name') }}</span>
                <p class="mt-2 text-sm text-gray-300">
                    Platform prediksi risiko serangan jantung berbasis AI terdepan, memberikan informasi penting
                    untuk kesehatan jantung Anda.
                </p>
                <div class="flex mt-4 space-x-6">
                    <a href="#" class="text-gray-400 hover:text-white">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-white">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-white">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-white">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                </div>
            </div>

            <div class="flex justify-end">
                <ul class="mt-4 space-y-4">
                    <h3 class="text-sm font-semibold tracking-wider text-gray-300 uppercase">Kontak</h3>
                    <li class="flex">
                        <i class="mt-1 mr-2 text-red-500 fas fa-map-marker-alt"></i>
                        <span>Jl. Gunung Agung No. 123, Denpasar, Bali.</span>
                    </li>
                    <li class="flex">
                        <i class="mt-1 mr-2 text-red-500 fas fa-phone-alt"></i>
                        <span>+62 123 456 789</span>
                    </li>
                    <li class="flex">
                        <i class="mt-1 mr-2 text-red-500 fas fa-envelope"></i>
                        <span>{{ config('mail.from.address') }}</span>
                    </li>
                </ul>
            </div>
        </div>

        <div class="flex flex-col justify-between pt-8 mt-12 border-t border-gray-700 md:flex-row">
            <p class="text-base text-gray-400">
                &copy; 2025 {{ config('app.name') }}. 
            </p>
            <p class="mt-4 text-base text-gray-400 md:mt-0">
                Didukung oleh teknologi AI terkini untuk kesehatan jantung Anda.
            </p>
        </div>
    </div>
</footer>