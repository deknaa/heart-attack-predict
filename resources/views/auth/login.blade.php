<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="flex flex-col min-h-screen lg:flex-row">
        <!-- Left Side - Hero Section -->
        <div class="relative w-full overflow-hidden lg:w-1/2 bg-gradient-to-br from-red-500 via-red-600 to-red-700">
            <!-- Animated Background Elements -->
            <div class="absolute inset-0">
                <div class="absolute w-32 h-32 rounded-full top-10 left-10 bg-white/10 blur-xl animate-pulse"></div>
                <div class="absolute w-24 h-24 rounded-full bottom-20 right-20 bg-white/10 blur-lg animate-pulse animation-delay-1000"></div>
                <div class="absolute w-16 h-16 rounded-full top-1/2 left-1/3 bg-white/10 blur-md animate-pulse animation-delay-2000"></div>
            </div>
            
            <!-- Back Button with Glassmorphism -->
            <div class="relative z-10 flex justify-end p-6 lg:p-8">
                <a href="{{ url('/') }}"
                    class="relative inline-flex items-center justify-center px-6 py-3 overflow-hidden font-medium text-white transition-all duration-300 ease-out border shadow-lg group bg-white/10 backdrop-blur-sm border-white/20 rounded-xl hover:shadow-xl hover:scale-105 hover:bg-white/20">
                    <span class="absolute inset-0 w-full h-full transition-transform duration-300 bg-white/10 rounded-xl group-hover:scale-110"></span>
                    <svg class="w-5 h-5 mr-2 transition-transform duration-300 group-hover:-translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    <span class="relative">Back to website</span>
                </a>
            </div>

            <!-- Hero Content -->
            <div class="flex flex-col items-center justify-center h-64 lg:h-[calc(100vh-120px)] px-8 text-center relative z-10">
                <div class="max-w-md">
                    <h2 class="mb-4 text-4xl font-bold leading-tight text-white lg:text-5xl">
                        Welcome Back to
                        <span class="block text-yellow-300">HealthCare</span>
                    </h2>
                    <p class="text-lg leading-relaxed text-white/80">
                        Your health journey continues here. Secure, reliable, and always caring for you.
                    </p>
                </div>
                
                <!-- Decorative Medical Icon -->
                <div class="absolute hidden bottom-10 right-10 lg:block">
                    <div class="flex items-center justify-center w-20 h-20 rounded-full bg-white/10 backdrop-blur-sm">
                        <svg class="w-10 h-10 text-white" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 2a8 8 0 100 16 8 8 0 000-16zM9 5a1 1 0 112 0v2h2a1 1 0 110 2h-2v2a1 1 0 11-2 0V9H7a1 1 0 110-2h2V5z" clip-rule="evenodd" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Side - Login Form -->
        <div class="relative flex flex-col justify-center w-full min-h-screen px-6 py-8 lg:w-1/2 lg:px-12 bg-gray-50 dark:bg-gray-900">
            <!-- Background Pattern -->
            <div class="absolute inset-0 opacity-5">
                <div class="absolute inset-0" style="background-image: radial-gradient(circle at 1px 1px, rgba(0,0,0,0.15) 1px, transparent 0); background-size: 20px 20px;"></div>
            </div>
            
            <div class="relative z-10 w-full max-w-md mx-auto">
                <!-- Theme Toggle -->
                <div class="flex justify-end mb-6">
                    <button id="theme-toggle" type="button"
                        class="p-3 text-gray-500 transition-all duration-300 bg-white border border-gray-200 shadow-sm rounded-xl dark:text-gray-400 dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-100 dark:hover:bg-gray-700 hover:scale-105 hover:shadow-md">
                        <svg id="theme-toggle-dark-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
                        </svg>
                        <svg id="theme-toggle-light-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" fill-rule="evenodd" clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </div>

                <!-- Header -->
                <div class="mb-8 text-center">
                    <h1 class="mb-2 text-4xl font-bold text-gray-900 dark:text-white">
                        Health<span class="text-red-600">Care</span>
                    </h1>
                    <p class="text-lg text-gray-600 dark:text-gray-400">
                        Welcome back! Please sign in to your account
                    </p>
                </div>

                <!-- Login Form with Glassmorphism Card -->
                <div class="p-8 border shadow-xl bg-white/70 dark:bg-gray-800/70 backdrop-blur-xl border-white/20 dark:border-gray-700/30 rounded-2xl">
                    <form action="{{ route('login') }}" method="POST" class="space-y-6">
                        @csrf

                        <!-- Email Input -->
                        <div class="group">
                            <label for="email" class="block mb-2 text-sm font-semibold text-gray-700 dark:text-gray-300">
                                Email Address
                            </label>
                            <div class="relative">
                                <input type="email" id="email" name="email"
                                    class="w-full px-4 py-3 text-gray-900 placeholder-gray-500 transition-all duration-300 border border-gray-200 bg-white/50 dark:bg-gray-700/50 dark:border-gray-600 rounded-xl dark:text-white dark:placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent backdrop-blur-sm"
                                    placeholder="Enter your email address" required autofocus autocomplete="username"
                                    value="{{ old('email') }}" />
                                <div class="absolute inset-y-0 right-0 flex items-center pr-3">
                                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                                    </svg>
                                </div>
                            </div>
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        <!-- Password Input -->
                        <div class="group">
                            <label for="password" class="block mb-2 text-sm font-semibold text-gray-700 dark:text-gray-300">
                                Password
                            </label>
                            <div class="relative">
                                <input type="password" id="password" name="password"
                                    class="w-full px-4 py-3 text-gray-900 placeholder-gray-500 transition-all duration-300 border border-gray-200 bg-white/50 dark:bg-gray-700/50 dark:border-gray-600 rounded-xl dark:text-white dark:placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent backdrop-blur-sm"
                                    placeholder="Enter your password" required autocomplete="current-password" />
                                <div class="absolute inset-y-0 right-0 flex items-center pr-3">
                                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                    </svg>
                                </div>
                            </div>
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>

                        <!-- Remember Me -->
                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <input id="remember_me" type="checkbox"
                                    class="w-4 h-4 text-red-600 border-gray-300 rounded bg-white/50 focus:ring-red-500 dark:focus:ring-red-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                                    name="remember" />
                                <label for="remember_me" class="ml-2 text-sm text-gray-700 dark:text-gray-300">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>
                            {{-- @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}" class="text-sm text-red-600 transition-colors duration-300 hover:text-red-500">
                                    {{ __('Forgot Password?') }}
                                </a>
                            @endif --}}
                        </div>

                        <!-- Sign In Button -->
                        <button type="submit"
                            class="w-full bg-gradient-to-r from-red-500 to-red-600 hover:from-red-600 hover:to-red-700 text-white font-semibold py-3 px-6 rounded-xl shadow-lg hover:shadow-xl transform hover:scale-[1.02] transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800">
                            <span class="flex items-center justify-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                                </svg>
                                {{ __('Sign In') }}
                            </span>
                        </button>

                        <!-- Divider -->
                        <div class="relative flex items-center justify-center my-6">
                            <div class="absolute inset-0 flex items-center">
                                <div class="w-full border-t border-gray-300 dark:border-gray-600"></div>
                            </div>
                            <div class="relative px-4 bg-white/70 dark:bg-gray-800/70">
                                <span class="text-sm text-gray-500 dark:text-gray-400">Or continue with</span>
                            </div>
                        </div>

                        <!-- Google Sign In -->
                        <a href="{{ route('auth.google') }}"
                            class="w-full flex items-center justify-center px-6 py-3 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-600 rounded-xl shadow-sm hover:shadow-md transform hover:scale-[1.02] transition-all duration-300 text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700 group">
                            <svg class="w-5 h-5 mr-3" viewBox="0 0 24 24">
                                <path fill="#4285F4" d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"/>
                                <path fill="#34A853" d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"/>
                                <path fill="#FBBC05" d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z"/>
                                <path fill="#EA4335" d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z"/>
                            </svg>
                            <span class="font-medium transition-colors duration-300 group-hover:text-gray-900 dark:group-hover:text-white">
                                Sign in with Google
                            </span>
                        </a>
                    </form>
                </div>

                <!-- Register Link -->
                @if (Route::has('register'))
                    <div class="mt-8 text-center">
                        <p class="text-gray-600 dark:text-gray-400">
                            Don't have an account? 
                            <a href="{{ route('register') }}" class="font-semibold text-red-600 transition-colors duration-300 hover:text-red-500 hover:underline">
                                Create an account
                            </a>
                        </p>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Custom Styles for Animations -->
    <style>
        .animation-delay-1000 {
            animation-delay: 1s;
        }
        .animation-delay-2000 {
            animation-delay: 2s;
        }
        
        .group:hover .group-hover\:scale-110 {
            transform: scale(1.1);
        }
        
        /* Custom focus styles */
        input:focus {
            box-shadow: 0 0 0 3px rgba(239, 68, 68, 0.1);
        }
        
        /* Smooth transitions for dark mode */
        * {
            transition-property: background-color, border-color, color, fill, stroke;
            transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
            transition-duration: 300ms;
        }
    </style>
</x-guest-layout>