<x-guest-layout>
    <div class="flex flex-col md:flex-row min-h-screen w-full">
        <div class="w-full md:w-1/2">
            <div class="bg-green-600 h-0 md:min-h-screen relative">
                <div class="p-4 md:p-7 flex justify-end">
                    <div class="flex items-center justify-center">
                        <a href="{{ route('login') }}"
                            class="relative inline-flex items-center justify-center px-6 md:px-10 py-2 md:py-3 overflow-hidden font-medium text-indigo-600 transition duration-300 ease-out border-2 border-green-500 md:border-white rounded-lg shadow-md group">
                            <span
                                class="absolute inset-0 flex items-center justify-center w-full h-full text-white duration-300 translate-x-full bg-white group-hover:translate-x-0 ease">
                                <svg class="w-6 h-6 text-green-500 dark:text-green-500" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                    viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="M5 12h14M5 12l4-4m-4 4 4 4" />
                                </svg>
                            </span>
                            <span
                                class="absolute flex items-center justify-center w-full h-full text-green-500 md:text-white transition-all duration-300 transform group-hover:translate-y-full ease">Back
                                to login</span>
                            <span class="relative invisible">Back to login</span>
                        </a>
                    </div>
                </div>
                <div class="items-center justify-end h-[20vh] md:h-[80vh] hidden md:flex">
                    <img src="{{ asset('image/landingpage/doctor.png') }}" alt=""
                        class="w-full h-full object-cover">
                </div>
            </div>
        </div>

        <div class="w-full md:w-1/2 h-screen flex flex-col justify-center px-6 md:px-0 py-8 md:pt-10 dark:bg-gray-800">
            <div class="w-full max-w-md mx-auto md:ml-48 md:mr-8 mt-10 md:mt-0">
                <div class="flex justify-end mb-2">
                    <button id="theme-toggle" type="button"
                        class="text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-2.5">
                        <svg id="theme-toggle-dark-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
                        </svg>
                        <svg id="theme-toggle-light-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"
                                fill-rule="evenodd" clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </div>
                <h1 class="text-4xl font-extrabold text-black dark:text-white">Health<span
                        class="text-green-600">Care</span></h1>
                <h2 class="text-base md:text-lg mb-6 md:mb-3 dark:text-white">Create an Account</h2>
                <form action="{{ route('register') }}" method="POST">
                    @csrf

                    {{-- Name --}}
                    <div class="mb-6">
                        <label for="name"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                        <input type="text" id="name" name="name"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Enter your name" required autofocus autocomplete="username"
                            value="{{ old('name') }}" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    {{-- Email Address --}}
                    <div class="mb-6">
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email
                            address</label>
                        <input type="email" id="email" name="email"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Enter your email address" required autofocus autocomplete="username"
                            value="{{ old('email') }}" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    {{-- Password --}}
                    <div class="mb-6">
                        <label for="password"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                        <input type="password" id="password" name="password"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="•••••••••" required autocomplete="new-password" />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    {{-- Confirm Password --}}
                    <div class="mb-6">
                        <label for="password_confirmation"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Confirm
                            Password</label>
                        <input type="password" id="password_confirmation" name="password_confirmation"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="•••••••••" required autocomplete="new-password" />
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>

                    <div class="flex items-start w-full mb-6">
                        <div>
                            <input id="terms" type="checkbox" value=""
                                class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800"
                                name="terms" data-modal-target="terms-modal" data-modal-toggle="terms-modal" onclick="openTerms()" required />
                            <label for="terms"
                                class="ms-2 me-1 text-sm font-medium text-gray-900 dark:text-gray-300">I agree to
                                the</label><span
                                class="underline text-blue-500 hover:text-blue-700 text-sm font-bold cursor-pointer"
                                data-modal-target="terms-modal" data-modal-toggle="terms-modal">Terms &
                                Conditions</span>
                        </div>
                    </div>

                    <div>
                        <button type="submit"
                            class="w-full text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center">{{ __('Sign Up') }}</button>
                    </div>

                    <div class="flex items-center gap-3 my-4">
                        <hr class="flex-1">
                        <p class="text-black dark:text-white">Or Register With</p>
                        <hr class="flex-1">
                    </div>

                    <div class="flex items-center justify-center w-full mt-3">
                        <a href="{{ route('auth.google') }}"
                            class="text-white bg-[#4285F4] hover:bg-[#4285F4]/90 focus:ring-4 focus:outline-none focus:ring-[#4285F4]/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:focus:ring-[#4285F4]/55 me-2 mb-2">
                            <svg class="w-4 h-4 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor" viewBox="0 0 18 19">
                                <path fill-rule="evenodd"
                                    d="M8.842 18.083a8.8 8.8 0 0 1-8.65-8.948 8.841 8.841 0 0 1 8.8-8.652h.153a8.464 8.464 0 0 1 5.7 2.257l-2.193 2.038A5.27 5.27 0 0 0 9.09 3.4a5.882 5.882 0 0 0-.2 11.76h.124a5.091 5.091 0 0 0 5.248-4.057L14.3 11H9V8h8.34c.066.543.095 1.09.088 1.636-.086 5.053-3.463 8.449-8.4 8.449l-.186-.002Z"
                                    clip-rule="evenodd" />
                            </svg>
                            Sign Up with Google
                        </a>
                    </div>

                </form>
            </div>
        </div>
    </div>

    <!-- Main modal -->
    <div id="terms-modal" data-modal-backdrop="static" tabindex="-1" aria-hidden="true"
        class="hidden fixed inset-0 z-50 items-center justify-center w-full h-full bg-black bg-opacity-50">
        <div class="relative p-6 w-full max-w-2xl bg-white rounded-lg shadow-lg dark:bg-gray-800">
            <!-- Modal header -->
            <div class="flex items-center justify-between pb-4 border-b border-gray-300 dark:border-gray-600">
                <h3 class="text-2xl font-semibold text-gray-900 dark:text-white">Terms & Conditions</h3>
                <button type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg p-2 inline-flex items-center dark:hover:bg-gray-700 dark:hover:text-white"
                    data-modal-hide="terms-modal">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
            <!-- Modal body -->
            <div class="py-4 space-y-4 text-gray-600 dark:text-gray-300 max-h-[60vh] overflow-y-auto">
                <p><strong>1. Penerimaan Syarat dan Ketentuan</strong><br>
                    Dengan menggunakan website ini, Anda setuju untuk tunduk pada Syarat dan Ketentuan yang berlaku.</p>
                <p><strong>2. Layanan yang Disediakan</strong><br>
                    Website ini menyediakan prediksi risiko serangan jantung menggunakan machine learning. Hasil
                    prediksi hanya bersifat informatif dan bukan pengganti konsultasi medis profesional.</p>
                <p><strong>3. Batasan Tanggung Jawab</strong><br>
                    Kami tidak bertanggung jawab atas keputusan medis yang diambil berdasarkan hasil prediksi dari
                    website ini. Konsultasikan dengan tenaga medis untuk diagnosa yang lebih akurat.</p>
                <p><strong>4. Penggunaan Data</strong><br>
                    Data yang diberikan akan digunakan hanya untuk kepentingan analisis prediksi dan tidak akan
                    dibagikan ke pihak ketiga tanpa izin.</p>
                <p><strong>5. Hak Kekayaan Intelektual</strong><br>
                    Semua konten dalam website ini dilindungi oleh hak cipta dan hak kekayaan intelektual lainnya.</p>
                <p><strong>6. Perubahan Syarat dan Ketentuan</strong><br>
                    Kami berhak mengubah Syarat dan Ketentuan kapan saja. Dengan terus menggunakan layanan ini, Anda
                    dianggap menyetujui perubahan tersebut.</p>
                <p><strong>7. Hukum yang Berlaku</strong><br>
                    Syarat dan Ketentuan ini diatur sesuai dengan hukum Indonesia.</p>
            </div>
            <!-- Modal footer -->
            <div class="flex justify-end pt-4 border-t border-gray-300 dark:border-gray-600">
                <button type="button" data-modal-hide="terms-modal"
                    class="px-5 py-2 text-white bg-blue-600 hover:bg-blue-700 rounded-lg text-sm font-medium focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-800"
                    id="btnAcceptTerms">
                    I Accept
                </button>
                <button type="button" data-modal-hide="terms-modal"
                    class="px-5 py-2 ml-3 text-sm font-medium text-gray-700 bg-gray-200 rounded-lg hover:bg-gray-300 dark:bg-gray-700 dark:text-gray-300 dark:hover:bg-gray-600"
                    id="btnDeclineTerms">
                    Decline
                </button>
            </div>
        </div>
    </div>
 @vite(['resources/js/termsCheckbox.js'])
</x-guest-layout>
