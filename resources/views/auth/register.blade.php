<x-guest-layout>
    <div class="flex flex-col w-full min-h-screen md:flex-row">
        <div class="w-full md:w-1/2">
            <div class="relative h-0 bg-red-700 md:min-h-screen">
                <div class="flex justify-end p-4 md:p-7">
                    <div class="flex items-center justify-center">
                        <a href="{{ route('login') }}"
                            class="relative inline-flex items-center justify-center px-6 py-2 overflow-hidden font-medium text-indigo-600 transition duration-300 ease-out border-2 border-green-500 rounded-lg shadow-md md:px-10 md:py-3 md:border-white group">
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
                                class="absolute flex items-center justify-center w-full h-full text-green-500 transition-all duration-300 transform md:text-white group-hover:translate-y-full ease">Back
                                to login</span>
                            <span class="relative invisible">Back to login</span>
                        </a>
                    </div>
                </div>
                <div class="items-center justify-end h-[20vh] md:h-[85vh] hidden md:flex">
                    <img src="{{ asset('image/landingpage/doctor.png') }}" alt=""
                        class="object-cover w-full h-full">
                </div>
            </div>
        </div>

        <div class="flex flex-col justify-center w-full h-screen px-6 py-8 md:w-1/2 md:px-0 md:pt-10 dark:bg-gray-800">
            <div class="w-full max-w-md mx-auto mt-10 md:ml-48 md:mr-8 md:mt-0">
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
                        class="text-red-600">Care</span></h1>
                <h2 class="mb-6 text-base md:text-lg md:mb-3 dark:text-white">Create an Account</h2>
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
                                class="text-sm font-medium text-gray-900 ms-2 me-1 dark:text-gray-300">I agree to
                                the</label><span
                                class="text-sm font-bold text-blue-500 underline cursor-pointer hover:text-blue-700"
                                data-modal-target="terms-modal" data-modal-toggle="terms-modal">Terms &
                                Conditions</span>
                        </div>
                    </div>

                    <div>
                        <button type="submit"
                            class="w-full text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center">{{ __('Sign Up') }}</button>
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
                    {{-- Modal Terms --}}
                    <x-terms-modal></x-terms-modal>
                </form>
            </div>
        </div>
    </div>
 @vite(['resources/js/termsCheckbox.js'])
</x-guest-layout>
