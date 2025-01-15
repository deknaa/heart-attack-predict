<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="flex flex-col md:flex-row min-h-screen w-full">
        <!-- Left Side - Image Section -->
        <div class="w-full md:w-1/2">
            <div class="bg-green-600 h-0 md:min-h-screen relative">
                <!-- Back Button -->
                <div class="p-4 md:p-7 flex justify-end">
                    <div class="flex items-center justify-center">
                        <a href="{{ url('/') }}"
                            class="relative inline-flex items-center justify-center px-6 md:px-10 py-2 md:py-3 overflow-hidden font-medium text-indigo-600 transition duration-300 ease-out border-2 border-black dark:border-white rounded-lg shadow-md group">
                            <span class="absolute inset-0 flex items-center justify-center w-full h-full text-white duration-300 translate-x-full bg-white group-hover:translate-x-0 ease">
                                <svg class="w-5 h-5 text-green-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M5 12l4-4m-4 4 4 4" />
                                </svg>
                            </span>
                            <span class="absolute flex items-center justify-center w-full h-full text-black dark:text-white transition-all duration-300 transform group-hover:translate-y-full ease">Back to website</span>
                            <span class="relative invisible">Back to website</span>
                        </a>
                    </div>
                </div>
                <!-- Doctor Image -->
                <div class="items-center justify-end h-[20vh] md:h-[80vh] hidden md:flex">
                    <img src="{{ asset('image/landingpage/doctor.png') }}" alt="" class="w-full h-full object-cover">
                </div>
            </div>
        </div>

        <!-- Right Side - Login Form -->
        <div class="w-full md:w-1/2 h-screen flex flex-col justify-center px-6 md:px-0 py-8 md:pt-10 dark:bg-gray-800">
            <div class="w-full max-w-md mx-auto md:ml-48 md:mr-8">
                <!-- Theme Toggle -->
                <div class="flex justify-end mb-2">
                    <button id="theme-toggle" type="button"
                        class="text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-2.5">
                        <svg id="theme-toggle-dark-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
                        </svg>
                        <svg id="theme-toggle-light-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" fill-rule="evenodd" clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </div>

                <!-- Header -->
                <h1 class="text-3xl md:text-4xl font-extrabold dark:text-white">Health<span class="text-green-600">Care</span></h1>
                <h2 class="text-base md:text-lg mb-6 md:mb-10 dark:text-white">Please Enter Your Account Details</h2>

                <!-- Login Form -->
                <form action="{{ route('login') }}" method="POST">
                    @csrf

                    <!-- Email -->
                    <div class="mb-6">
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email address</label>
                        <input type="email" id="email" name="email"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Enter your email address" required autofocus autocomplete="username"
                            value="{{ old('email') }}" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div class="mb-6">
                        <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                        <input type="password" id="password" name="password"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="•••••••••" required autocomplete="current-password" />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Remember Me & Forgot Password -->
                    <div class="flex flex-row sm:items-center justify-between gap-4 mb-6">
                        <div class="flex items-center">
                            <input id="remember_me" type="checkbox"
                                class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800"
                                name="remember" />
                            <label for="remember_me" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ __('Remember Me') }}</label>
                        </div>
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="text-sm text-blue-700 hover:underline dark:text-blue-500">{{ __('Forgot Password?') }}</a>
                        @endif
                    </div>

                    <!-- Sign In Button -->
                    <button type="submit"
                        class="w-full text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mb-4">
                        {{ __('Sign In') }}
                    </button>

                    <!-- Or Divider -->
                    <div class="flex items-center gap-3 my-4">
                        <hr class="flex-1">
                        <p class="text-sm text-gray-500 dark:text-white">Or</p>
                        <hr class="flex-1">
                    </div>

                    <!-- Google Sign In -->
                    <button type="button"
                        class="w-full text-white bg-[#4285F4] hover:bg-[#4285F4]/90 focus:ring-4 focus:outline-none focus:ring-[#4285F4]/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center justify-center dark:focus:ring-[#4285F4]/55 mb-4">
                        <svg class="w-4 h-4 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 19">
                            <path fill-rule="evenodd" d="M8.842 18.083a8.8 8.8 0 0 1-8.65-8.948 8.841 8.841 0 0 1 8.8-8.652h.153a8.464 8.464 0 0 1 5.7 2.257l-2.193 2.038A5.27 5.27 0 0 0 9.09 3.4a5.882 5.882 0 0 0-.2 11.76h.124a5.091 5.091 0 0 0 5.248-4.057L14.3 11H9V8h8.34c.066.543.095 1.09.088 1.636-.086 5.053-3.463 8.449-8.4 8.449l-.186-.002Z" clip-rule="evenodd" />
                        </svg>
                        Sign in with Google
                    </button>

                    <!-- Register Link -->
                    @if (Route::has('register'))
                        <div class="flex justify-center mt-6">
                            <a href="{{ route('register') }}" class="text-sm underline hover:text-blue-500 dark:text-white hover:dark:text-blue-500">
                                Create an account
                            </a>
                        </div>
                    @endif
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>