@auth
    @if (auth()->user()->role === 'user')
        <nav class="fixed top-0 z-50 w-full bg-white border-b border-gray-100 shadow-sm dark:bg-gray-800 dark:border-gray-700"
            id="main-navbar">
            <div class="px-4 py-3 mx-auto max-w-7xl lg:px-6">
                <div class="flex items-center justify-between">
                    <div class="flex items-center space-x-4">
                        {{-- Mobile menu toggle --}}
                        <button data-drawer-target="sidebar-navigation-user" data-drawer-toggle="sidebar-navigation-user"
                            aria-controls="sidebar-navigation-user" type="button"
                            class="inline-flex items-center p-2 text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-300 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                            id="mobile-menu">
                            <span class="sr-only">Toggle navigation menu</span>
                            <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path clip-rule="evenodd" fill-rule="evenodd"
                                    d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
                                </path>
                            </svg>
                        </button>

                        {{-- Logo --}}
                        <a href="/" class="items-center hidden space-x-3 md:flex">
                            <span class="text-2xl font-bold text-red-600"><i class="mr-2 fas fa-heartbeat"></i></span>
                            <div>
                                <span
                                    class="self-center text-xl font-semibold text-red-600 whitespace-nowrap dark:text-white">
                                    {{ config('app.name') }}
                                </span>
                                <p class="text-xs text-gray-500 dark:text-gray-400">User Portal</p>
                            </div>
                        </a>
                    </div>

                    {{-- Center Navigation --}}
                    <div class="hidden md:flex md:items-center md:space-x-4">
                        <a href="{{ route('dashboard') }}"
                            class="px-3 py-2 text-sm font-medium {{ request()->is('dashboard/user') ? 'text-red-600 rounded-md dark:text-red-400' : 'text-gray-600 rounded-md hover:text-red-600 hover:bg-gray-50 dark:text-gray-300 dark:hover:text-red-400 dark:hover:bg-gray-700' }}">Dashboard</a>
                        <a href="{{ route('predict') }}"
                            class="px-3 py-2 text-sm font-medium {{ request()->is('predict') ? 'text-red-600 rounded-md dark:text-red-400' : 'text-gray-600 rounded-md hover:text-red-600 hover:bg-gray-50 dark:text-gray-300 dark:hover:text-red-400 dark:hover:bg-gray-700' }}">Prediksi</a>
                        <a href="{{ route('predict.history') }}"
                            class="px-3 py-2 text-sm font-medium {{ request()->is('predict-history') ? 'text-red-600 rounded-md dark:text-red-400' : 'text-gray-600 rounded-md hover:text-red-600 hover:bg-gray-50 dark:text-gray-300 dark:hover:text-red-400 dark:hover:bg-gray-700' }}">History
                            Prediksi</a>
                        <a href="{{ route('article.list') }}"
                            class="px-3 py-2 text-sm font-medium {{ request()->is('article/list') ? 'text-red-600 rounded-md dark:text-red-400' : 'text-gray-600 rounded-md hover:text-red-600 hover:bg-gray-50 dark:text-gray-300 dark:hover:text-red-400 dark:hover:bg-gray-700' }}">Artikel</a>
                        <a href="{{ route('announcement.list') }}"
                            class="flex items-center px-3 py-2 text-sm font-medium {{ request()->is('announcement/list') ? 'text-red-600 rounded-md dark:text-red-400' : 'text-gray-600 rounded-md hover:text-red-600 hover:bg-gray-50 dark:text-gray-300 dark:hover:text-red-400 dark:hover:bg-gray-700' }}">
                            Pengumuman
                            <span
                                class="flex items-center justify-center w-5 h-5 ml-2 text-xs font-semibold text-white bg-red-600 rounded-full">{{ $announcements }}</span>
                        </a>
                    </div>

                    {{-- Right Side --}}
                    <div class="flex items-center space-x-3">
                        {{-- Theme Toggle --}}
                        <button id="theme-toggle" type="button"
                            class="p-2 text-gray-500 rounded-lg hover:bg-gray-100 hover:text-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                            <span class="sr-only">Toggle dark mode</span>
                            <svg id="theme-toggle-dark-icon" class="hidden w-5 h-5" fill="currentColor"
                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
                            </svg>
                            <svg id="theme-toggle-light-icon" class="hidden w-5 h-5" fill="currentColor"
                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"
                                    fill-rule="evenodd" clip-rule="evenodd"></path>
                            </svg>
                        </button>

                        {{-- User menu if authenticated --}}
                        @if (Route::has('login'))
                            @auth
                                <div class="relative">
                                    <button type="button" class="flex items-center space-x-3 focus:outline-none"
                                        id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown"
                                        data-dropdown-placement="bottom">
                                        <div class="hidden mr-2 text-right md:block">
                                            <p class="text-sm font-medium text-gray-800 dark:text-white">
                                                {{ Str::limit(Auth::user()->name, 15) }}</p>
                                            <p class="text-xs text-gray-500 dark:text-gray-400">{{ Auth::user()->role }}</p>
                                        </div>
                                        <img class="rounded-full w-9 h-9 ring-2 ring-red-400 dark:ring-red-600"
                                            src="{{ auth()->user()->avatar_url ?? 'https://ui-avatars.com/api/?name=' . urlencode(auth()->user()->name) }}"
                                            alt="User photo">
                                        <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 9l-7 7-7-7"></path>
                                        </svg>
                                    </button>

                                    {{-- User Dropdown --}}
                                    <div class="z-50 hidden min-w-[200px] my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow-lg dark:bg-gray-700 dark:divide-gray-600"
                                        id="user-dropdown">
                                        <div class="px-4 py-3">
                                            <span
                                                class="block text-sm font-semibold text-gray-900 dark:text-white">{{ Auth::user()->name }}</span>
                                            <span
                                                class="block text-sm text-gray-500 truncate dark:text-gray-400">{{ Auth::user()->email }}</span>
                                        </div>
                                        <ul class="py-2" aria-labelledby="user-menu-button">
                                            <li>
                                                <a href="{{ route('dashboard') }}"
                                                    class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                                                    <svg class="w-4 h-4 mr-2 text-gray-500 dark:text-gray-400" fill="none"
                                                        stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                                                        </path>
                                                    </svg>
                                                    Dashboard
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ route('profile.index', Auth::user()->id) }}"
                                                    class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                                                    <svg class="w-4 h-4 mr-2 text-gray-500 dark:text-gray-400" fill="none"
                                                        stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z">
                                                        </path>
                                                    </svg>
                                                    My Profile
                                                </a>
                                            </li>
                                            <li class="border-t border-gray-100 dark:border-gray-600">
                                                <form method="POST" action="{{ route('logout') }}">
                                                    @csrf
                                                    <a href="{{ route('logout') }}"
                                                        onclick="event.preventDefault(); this.closest('form').submit();"
                                                        class="flex items-center px-4 py-2 text-sm text-red-600 hover:bg-red-50 dark:hover:bg-red-700 dark:text-red-400 dark:hover:text-white">
                                                        <svg class="w-4 h-4 mr-2 text-red-500 dark:text-red-400"
                                                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                                                            </path>
                                                        </svg>
                                                        Sign out
                                                    </a>
                                                </form>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            @else
                                {{-- Button login for guest --}}
                                <a href="{{ route('login') }}"
                                    class="flex items-center px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 focus:outline-none dark:bg-blue-500 dark:hover:bg-blue-600 dark:focus:ring-blue-700">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1">
                                        </path>
                                    </svg>
                                    Login
                                </a>
                            @endauth
                        @endif
                    </div>
                </div>
            </div>
        </nav>

        <aside id="sidebar-navigation-user"
            class="fixed top-0 left-0 z-40 hidden w-64 h-screen pt-20 transition-transform -translate-x-full bg-white border-r border-gray-100 shadow-sm md:hidden sm:translate-x-0 dark:bg-gray-800 dark:border-gray-700">
            <div class="h-full px-4 pb-4 overflow-y-auto bg-white dark:bg-gray-800">
                {{-- profile section --}}
                <div class="flex items-center p-3 mb-5 rounded-lg bg-gray-50 dark:bg-gray-700">
                    <img class="w-10 h-10 rounded-full"
                        src="{{ auth()->user()->avatar_url ?? 'https://ui-avatars.com/api/?name=' . urlencode(auth()->user()->name) }}"
                        alt="Profile">
                    <div class="ml-3">
                        <h5 class="text-sm font-medium text-gray-900 dark:text-white">{{ auth()->user()->name }}</h5>
                        <span class="text-xs text-gray-500 dark:text-gray-400">{{ auth()->user()->role }}</span>
                    </div>
                </div>

                {{-- Main Navigation --}}
                <div class="mb-5">
                    <h6 class="mb-2 text-xs font-semibold text-gray-600 uppercase dark:text-gray-400">Main Menu</h6>
                    <ul class="space-y-1">
                        <li>
                            <a href="/dashboard/admin"
                                class="flex items-center p-3 text-gray-700 transition-colors rounded-lg hover:bg-blue-50 dark:text-white dark:hover:bg-gray-700 group">
                                <svg class="w-5 h-5 text-blue-600 dark:text-blue-400" xmlns="http://www.w3.org/2000/svg"
                                    fill="currentColor" viewBox="0 0 22 21">
                                    <path
                                        d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z" />
                                    <path
                                        d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z" />
                                </svg>
                                <span class="font-medium ms-3">Dashboard</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('article.index') }}"
                                class="flex items-center p-3 text-gray-700 transition-colors rounded-lg hover:bg-blue-50 dark:text-white dark:hover:bg-gray-700 group">
                                <svg class="w-5 h-5 text-blue-600 dark:text-blue-400" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M19 7h1v12a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1V5a1 1 0 0 0-1-1H5a1 1 0 0 0-1 1v14a1 1 0 0 0 1 1h11.5M7 14h6m-6 3h6m0-10h.5m-.5 3h.5M7 7h3v3H7V7Z" />
                                </svg>
                                <span class="font-medium ms-3">Article Management</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('users.data') }}"
                                class="flex items-center p-3 text-gray-700 transition-colors rounded-lg hover:bg-blue-50 dark:text-white dark:hover:bg-gray-700 group">
                                <svg class="w-5 h-5 text-blue-600 dark:text-blue-400" xmlns="http://www.w3.org/2000/svg"
                                    fill="currentColor" viewBox="0 0 24 24">
                                    <path fill-rule="evenodd"
                                        d="M8 4a4 4 0 1 0 0 8 4 4 0 0 0 0-8Zm-2 9a4 4 0 0 0-4 4v1a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2v-1a4 4 0 0 0-4-4H6Zm7.25-2.095c.478-.86.75-1.85.75-2.905a5.973 5.973 0 0 0-.75-2.906 4 4 0 1 1 0 5.811ZM15.466 20c.34-.588.535-1.271.535-2v-1a5.978 5.978 0 0 0-1.528-4H18a4 4 0 0 1 4 4v1a2 2 0 0 1-2 2h-4.535Z"
                                        clip-rule="evenodd" />
                                </svg>
                                <span class="font-medium ms-3">User Data</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('announcement.index') }}"
                                class="flex items-center p-3 text-gray-700 transition-colors rounded-lg hover:bg-blue-50 dark:text-white dark:hover:bg-gray-700 group">
                                <svg class="w-5 h-5 text-blue-600 dark:text-blue-400" xmlns="http://www.w3.org/2000/svg"
                                    fill="currentColor" viewBox="0 0 24 24">
                                    <path fill-rule="evenodd"
                                        d="M18.458 3.11A1 1 0 0 1 19 4v16a1 1 0 0 1-1.581.814L12 16.944V7.056l5.419-3.87a1 1 0 0 1 1.039-.076ZM22 12c0 1.48-.804 2.773-2 3.465v-6.93c1.196.692 2 1.984 2 3.465ZM10 8H4a1 1 0 0 0-1 1v6a1 1 0 0 0 1 1h6V8Zm0 9H5v3a1 1 0 0 0 1 1h3a1 1 0 0 0 1-1v-3Z"
                                        clip-rule="evenodd" />
                                </svg>
                                <div class="flex-1 ms-3">
                                    <span class="font-medium">Announcements</span>
                                    <div class="text-xs text-gray-500 dark:text-gray-400">Manage system alerts</div>
                                </div>
                                <span
                                    class="inline-flex items-center justify-center w-6 h-6 text-xs font-medium text-white bg-blue-600 rounded-full ms-2">3</span>
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="mb-5">
                    <h6 class="mb-2 text-xs font-semibold text-gray-600 uppercase dark:text-gray-400">Resources</h6>
                    <ul class="space-y-1">
                        <li>
                            <a href="#"
                                class="flex items-center p-3 text-gray-700 transition-colors rounded-lg hover:bg-blue-50 dark:text-white dark:hover:bg-gray-700 group">
                                <svg class="w-5 h-5 text-blue-600 dark:text-blue-400" xmlns="http://www.w3.org/2000/svg"
                                    fill="currentColor" viewBox="0 0 18 20">
                                    <path
                                        d="M17 5.923A1 1 0 0 0 16 5h-3V4a4 4 0 1 0-8 0v1H2a1 1 0 0 0-1 .923L.086 17.846A2 2 0 0 0 2.08 20h13.84a2 2 0 0 0 1.994-2.153L17 5.923ZM7 9a1 1 0 0 1-2 0V7h2v2Zm0-5a2 2 0 1 1 4 0v1H7V4Zm6 5a1 1 0 1 1-2 0V7h2v2Z" />
                                </svg>
                                <div class="flex-1 ms-3">
                                    <span class="font-medium">Products</span>
                                    <div class="text-xs text-gray-500 dark:text-gray-400">Manage inventory</div>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>

                {{-- Account Sections --}}
                <div>
                    <h6 class="mb-2 text-xs font-semibold text-gray-600 uppercase dark:text-gray-400">Account</h6>
                    <ul class="space-y-1">
                        <li>
                            <a href="#"
                                class="flex items-center p-3 text-gray-700 transition-colors rounded-lg hover:bg-blue-50 dark:text-white dark:hover:bg-gray-700 group">
                                <svg class="w-5 h-5 text-blue-600 dark:text-blue-400" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                                <span class="font-medium ms-3">Settings</span>
                            </a>
                        </li>
                        <li>
                            <a href="#"
                                class="flex items-center p-3 text-gray-700 transition-colors rounded-lg hover:bg-red-50 dark:text-white dark:hover:bg-red-900 group">
                                <svg class="w-5 h-5 text-red-600 dark:text-red-400" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                </svg>
                                <span class="font-medium ms-3">Logout</span>
                            </a>
                        </li>
                    </ul>
                </div>

                {{-- Footer Section --}}
                <div class="pt-5 mt-6 border-t border-gray-200 dark:border-gray-700">
                    <div class="flex items-center">
                        <div class="w-3 h-3 bg-green-500 rounded-full"></div>
                        <span class="text-xs text-gray-500 ms-2 dark:text-gray-400">System Status: Online</span>
                    </div>
                    <div class="mt-3 text-xs text-gray-500 dark:text-gray-400">
                        Admin Panel v1.2.0
                    </div>
                </div>
            </div>
        </aside>
    @elseif(auth()->user()->role === 'admin')
        <nav class="fixed top-0 z-50 w-full bg-white border-b border-gray-100 shadow-sm dark:bg-gray-800 dark:border-gray-700"
            id="main-navbar">
            <div class="px-4 py-3 mx-auto max-w-7xl lg:px-6">
                <div class="flex items-center justify-between">
                    <div class="flex items-center space-x-4">
                        {{-- Mobile menu toggle --}}
                        <button data-drawer-target="sidebar-navigation" data-drawer-toggle="sidebar-navigation"
                            aria-controls="sidebar-navigation" type="button"
                            class="inline-flex items-center p-2 text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-300 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
                            <span class="sr-only">Toggle navigation menu</span>
                            <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path clip-rule="evenodd" fill-rule="evenodd"
                                    d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
                                </path>
                            </svg>
                        </button>

                        {{-- Logo --}}
                        <a href="/" class="items-center hidden space-x-3 md:flex">
                            <span class="text-2xl font-bold text-red-600"><i class="mr-2 fas fa-heartbeat"></i></span>
                            <div>
                                <span
                                    class="self-center text-xl font-semibold text-red-600 whitespace-nowrap dark:text-white">
                                    {{ config('app.name') }}
                                </span>
                                <p class="text-xs text-gray-500 dark:text-gray-400">Admin Portal</p>
                            </div>
                        </a>
                    </div>

                    {{-- Right Side --}}
                    <div class="flex items-center space-x-3">
                        {{-- Theme Toggle --}}
                        <button id="theme-toggle" type="button"
                            class="p-2 text-gray-500 rounded-lg hover:bg-gray-100 hover:text-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                            <span class="sr-only">Toggle dark mode</span>
                            <svg id="theme-toggle-dark-icon" class="hidden w-5 h-5" fill="currentColor"
                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
                            </svg>
                            <svg id="theme-toggle-light-icon" class="hidden w-5 h-5" fill="currentColor"
                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"
                                    fill-rule="evenodd" clip-rule="evenodd"></path>
                            </svg>
                        </button>

                        {{-- User menu if authenticated --}}
                        @if (Route::has('login'))
                            @auth
                                <div class="relative">
                                    <button type="button" class="flex items-center space-x-3 focus:outline-none"
                                        id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown"
                                        data-dropdown-placement="bottom">
                                        <div class="hidden mr-2 text-right md:block">
                                            <p class="text-sm font-medium text-gray-800 dark:text-white">
                                                {{ Str::limit(Auth::user()->name, 15) }}</p>
                                            <p class="text-xs text-gray-500 dark:text-gray-400">{{ Auth::user()->role }}</p>
                                        </div>
                                        <img class="rounded-full w-9 h-9 ring-2 ring-gray-200 dark:ring-gray-600"
                                            src="{{ auth()->user()->avatar_url ?? 'https://ui-avatars.com/api/?name=' . urlencode(auth()->user()->name) }}"
                                            alt="User photo">
                                        <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 9l-7 7-7-7"></path>
                                        </svg>
                                    </button>

                                    {{-- User Dropdown Menu --}}
                                    <div class="z-50 hidden min-w-[200px] my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow-lg dark:bg-gray-700 dark:divide-gray-600"
                                        id="user-dropdown">
                                        <div class="px-4 py-3">
                                            <span
                                                class="block text-sm font-semibold text-gray-900 dark:text-white">{{ Auth::user()->name }}</span>
                                            <span
                                                class="block text-sm text-gray-500 truncate dark:text-gray-400">{{ Auth::user()->email }}</span>
                                        </div>
                                        <ul class="py-2" aria-labelledby="user-menu-button">
                                            <li>
                                                <a href="{{ route('dashboard.admin') }}"
                                                    class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                                                    <svg class="w-4 h-4 mr-2 text-gray-500 dark:text-gray-400" fill="none"
                                                        stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                                                        </path>
                                                    </svg>
                                                    Dashboard
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ route('profile.index', Auth::user()->id) }}"
                                                    class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                                                    <svg class="w-4 h-4 mr-2 text-gray-500 dark:text-gray-400" fill="none"
                                                        stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z">
                                                        </path>
                                                    </svg>
                                                    My Profile
                                                </a>
                                            </li>
                                            <li class="border-t border-gray-100 dark:border-gray-600">
                                                <form method="POST" action="{{ route('logout') }}">
                                                    @csrf
                                                    <a href="{{ route('logout') }}"
                                                        onclick="event.preventDefault(); this.closest('form').submit();"
                                                        class="flex items-center px-4 py-2 text-sm text-red-600 hover:bg-red-50 dark:hover:bg-red-700 dark:text-red-400 dark:hover:text-white">
                                                        <svg class="w-4 h-4 mr-2 text-red-500 dark:text-red-400"
                                                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                                                            </path>
                                                        </svg>
                                                        Sign out
                                                    </a>
                                                </form>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            @else
                                {{-- Button login for guest --}}
                                <a href="{{ route('login') }}"
                                    class="flex items-center px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 focus:outline-none dark:bg-blue-500 dark:hover:bg-blue-600 dark:focus:ring-blue-700">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1">
                                        </path>
                                    </svg>
                                    Login
                                </a>
                            @endauth
                        @endif
                    </div>
                </div>
            </div>
        </nav>

        <aside id="sidebar-navigation"
            class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-white border-r border-gray-100 shadow-sm sm:translate-x-0 dark:bg-gray-800 dark:border-gray-700">
            <div class="h-full px-4 pb-4 overflow-y-auto bg-white dark:bg-gray-800">
                {{-- profile section --}}
                <div class="flex items-center p-3 mb-5 rounded-lg bg-gray-50 dark:bg-gray-700">
                    <img class="w-10 h-10 rounded-full"
                        src="{{ auth()->user()->avatar_url ?? 'https://ui-avatars.com/api/?name=' . urlencode(auth()->user()->name) }}"
                        alt="Profile">
                    <div class="ml-3">
                        <h5 class="text-sm font-medium text-gray-900 dark:text-white">{{ auth()->user()->name }}</h5>
                        <span class="text-xs text-gray-500 dark:text-gray-400">{{ auth()->user()->role }}</span>
                    </div>
                </div>

                {{-- Main Navigation --}}
                <div class="mb-5">
                    <h6 class="mb-2 text-xs font-semibold text-gray-600 uppercase dark:text-gray-400">Main Menu</h6>
                    <ul class="space-y-1">
                        <li>
                            <a href="/dashboard/admin"
                                class="flex items-center p-3 text-gray-700 transition-colors rounded-lg hover:bg-blue-50 dark:text-white dark:hover:bg-gray-700 group {{ request()->is('dashboard/admin') ? 'bg-red-50 dark:bg-gray-700' : '' }}">
                                <svg class="w-5 h-5 {{ request()->is('dashboard/admin') ? 'text-red-600 dark:text-red-400' : 'text-gray-600 dark:text-white' }}" xmlns="http://www.w3.org/2000/svg"
                                    fill="currentColor" viewBox="0 0 22 21">
                                    <path
                                        d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z" />
                                    <path
                                        d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z" />
                                </svg>
                                <span class="font-medium ms-3 {{ request()->is('dashboard/admin') ? 'text-red-600 dark:text-red-400' : 'text-gray-600 dark:text-white' }}">Dashboard</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('article.index') }}"
                                class="flex items-center p-3 text-gray-700 transition-colors rounded-lg hover:bg-blue-50 dark:text-white dark:hover:bg-gray-700 group {{ request()->is('article') ? 'bg-red-50 dark:bg-gray-700' : '' }}">
                                <svg class="w-5 h-5 {{ request()->is('article') ? 'text-red-600 dark:text-red-400' : 'text-gray-600 dark:text-white' }}" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M19 7h1v12a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1V5a1 1 0 0 0-1-1H5a1 1 0 0 0-1 1v14a1 1 0 0 0 1 1h11.5M7 14h6m-6 3h6m0-10h.5m-.5 3h.5M7 7h3v3H7V7Z" />
                                </svg>
                                <span class="font-medium ms-3 {{ request()->is('article') ? 'text-red-600 dark:text-red-400' : 'text-gray-600 dark:text-white' }}">Manajemen Artikel</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('users.data') }}"
                                class="flex items-center p-3 text-gray-700 transition-colors rounded-lg hover:bg-blue-50 dark:text-white dark:hover:bg-gray-700 group {{ request()->is('users/data') ? 'bg-red-50 dark:bg-gray-700' : '' }}">
                                <svg class="w-5 h-5 {{ request()->is('users/data') ? 'text-red-600 dark:text-red-400' : 'text-gray-600 dark:text-white' }}" xmlns="http://www.w3.org/2000/svg"
                                    fill="currentColor" viewBox="0 0 24 24">
                                    <path fill-rule="evenodd"
                                        d="M8 4a4 4 0 1 0 0 8 4 4 0 0 0 0-8Zm-2 9a4 4 0 0 0-4 4v1a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2v-1a4 4 0 0 0-4-4H6Zm7.25-2.095c.478-.86.75-1.85.75-2.905a5.973 5.973 0 0 0-.75-2.906 4 4 0 1 1 0 5.811ZM15.466 20c.34-.588.535-1.271.535-2v-1a5.978 5.978 0 0 0-1.528-4H18a4 4 0 0 1 4 4v1a2 2 0 0 1-2 2h-4.535Z"
                                        clip-rule="evenodd" />
                                </svg>
                                <span class="font-medium ms-3 {{ request()->is('users/data') ? 'text-red-600 dark:text-red-400' : 'text-gray-600 dark:text-white' }}">Data User</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('announcement.index') }}"
                                class="flex items-center p-3 text-gray-700 transition-colors rounded-lg hover:bg-blue-50 dark:text-white dark:hover:bg-gray-700 group {{ request()->is('announcement') ? 'bg-red-50 dark:bg-gray-700' : '' }}">
                                <svg class="w-5 h-5 {{ request()->is('announcement') ? 'text-red-600 dark:text-red-400' : 'text-gray-600 dark:text-white' }}" xmlns="http://www.w3.org/2000/svg"
                                    fill="currentColor" viewBox="0 0 24 24">
                                    <path fill-rule="evenodd"
                                        d="M18.458 3.11A1 1 0 0 1 19 4v16a1 1 0 0 1-1.581.814L12 16.944V7.056l5.419-3.87a1 1 0 0 1 1.039-.076ZM22 12c0 1.48-.804 2.773-2 3.465v-6.93c1.196.692 2 1.984 2 3.465ZM10 8H4a1 1 0 0 0-1 1v6a1 1 0 0 0 1 1h6V8Zm0 9H5v3a1 1 0 0 0 1 1h3a1 1 0 0 0 1-1v-3Z"
                                        clip-rule="evenodd" />
                                </svg>
                                <div class="flex-1 ms-3 {{ request()->is('announcement') ? 'text-red-600 dark:text-red-400' : 'text-gray-600 dark:text-white' }}">
                                    <span class="font-medium">Pengumuman</span>
                                    <div class="text-xs">Kelola Pengumuman</div>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="mb-5">
                    <h6 class="mb-2 text-xs font-semibold text-gray-600 uppercase dark:text-gray-400">Resources</h6>
                    <ul class="space-y-1">
                        <li>
                            <a href="#"
                                class="flex items-center p-3 text-gray-700 transition-colors rounded-lg hover:bg-blue-50 dark:text-white dark:hover:bg-gray-700 group">
                                <svg class="w-5 h-5 {{ request()->is('dashboard/admin') ? 'text-red-600 dark:text-red-400' : 'text-gray-600 dark:text-white' }}" xmlns="http://www.w3.org/2000/svg"
                                    fill="currentColor" viewBox="0 0 18 20">
                                    <path
                                        d="M17 5.923A1 1 0 0 0 16 5h-3V4a4 4 0 1 0-8 0v1H2a1 1 0 0 0-1 .923L.086 17.846A2 2 0 0 0 2.08 20h13.84a2 2 0 0 0 1.994-2.153L17 5.923ZM7 9a1 1 0 0 1-2 0V7h2v2Zm0-5a2 2 0 1 1 4 0v1H7V4Zm6 5a1 1 0 1 1-2 0V7h2v2Z" />
                                </svg>
                                <div class="flex-1 ms-3 {{ request()->is('dashboard/admin') ? 'text-red-600 dark:text-red-400' : 'text-gray-600 dark:text-white' }}">
                                    <span class="font-medium">Grafik Informasi</span>
                                    <div class="text-xs">Kelola dan Lihat Grafik Informasi</div>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>

                {{-- Account Sections --}}
                <div>
                    <h6 class="mb-2 text-xs font-semibold text-gray-600 uppercase dark:text-gray-400">Account</h6>
                    <ul class="space-y-1">
                        <li>
                            <a href="{{ route('profile.index', Auth::user()->id) }}"
                                class="flex items-center p-3 text-gray-700 transition-colors rounded-lg hover:bg-blue-50 dark:text-white dark:hover:bg-gray-700 group {{ request()->is('profile/' . Auth::user()->id) ? 'bg-red-50 dark:bg-gray-700' : '' }}">
                                <svg class="w-5 h-5 {{ request()->is('profile/'. Auth::user()->id) ? 'text-red-600 dark:text-red-400' : 'text-gray-600 dark:text-white' }}" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                                <span class="font-medium ms-3 {{ request()->is('profile/'. Auth::user()->id) ? 'text-red-600 dark:text-red-400' : 'text-gray-600 dark:text-white' }}">Settings</span>
                            </a>
                        </li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); this.closest('form').submit();"
                                    class="flex items-center p-3 text-gray-700 transition-colors rounded-lg hover:bg-red-50 dark:text-white dark:hover:bg-red-900 group">
                                    <svg class="w-5 h-5 text-red-600 dark:text-red-400" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                    </svg>
                                    <span class="font-medium ms-3">Logout</span>
                                </a>
                            </form>
                        </li>
                    </ul>
                </div>

                {{-- Footer Section --}}
                <div class="pt-5 mt-6 border-t border-gray-200 dark:border-gray-700">
                    <div class="flex items-center">
                        <div class="w-3 h-3 bg-green-500 rounded-full"></div>
                        <span class="text-xs text-gray-500 ms-2 dark:text-gray-400">System Status: Online</span>
                    </div>
                    <div class="mt-3 text-xs text-gray-500 dark:text-gray-400">
                        Admin Panel v1.0.0
                    </div>
                </div>
            </div>
        </aside>

        <div class="p-4">

        </div>
    @endauth
@else
    <nav class="fixed top-0 z-50 w-full overflow-hidden transition-all duration-300 bg-white shadow-sm dark:bg-gray-800 dark:border-gray-700"
        id="navbar">
        <div class="px-4 py-3 mx-auto max-w-7xl lg:px-6">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-4">
                    {{-- Logo --}}
                    <a href="/" class="flex items-center max-w-full space-x-3">
                        <span class="text-2xl font-bold text-red-600"><i class="mr-2 fas fa-heartbeat"></i></span>
                        <div class="flex-col hidden md:flex">
                            <span
                                class="self-center text-xl font-semibold text-red-600 whitespace-nowrap dark:text-white">
                                {{ config('app.name') }}
                            </span>
                            <p class="text-xs text-gray-500 dark:text-gray-400">Website for health</p>
                        </div>
                    </a>
                </div>

                {{-- Mobile menu button --}}
                <div class="flex items-center sm:hidden">
                    <button id="mobile-menu-button" type="button"
                        class="text-gray-500 hover:text-gray-700 focus:outline-none">
                        <span class="sr-only">Open main menu</span>
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                </div>

                {{-- Center Navigation (Desktop) --}}
                <div class="hidden sm:ml-6 sm:flex sm:space-x-8">
                    <a href="#home"
                        class="inline-flex items-center px-1 pt-1 text-sm font-medium text-gray-900 border-b-2 border-red-500 dark:text-white">
                        Beranda
                    </a>
                    <a href="#about"
                        class="inline-flex items-center px-1 pt-1 text-sm font-medium text-gray-500 border-b-2 border-transparent hover:border-gray-300 hover:text-gray-700 dark:text-slate-300">
                        Tentang
                    </a>
                    <a href="#risk-factors"
                        class="inline-flex items-center px-1 pt-1 text-sm font-medium text-gray-500 border-b-2 border-transparent hover:border-gray-300 hover:text-gray-700 dark:text-slate-300">
                        Faktor Risiko
                    </a>
                    <a href="#prediction"
                        class="inline-flex items-center px-1 pt-1 text-sm font-medium text-gray-500 border-b-2 border-transparent hover:border-gray-300 hover:text-gray-700 dark:text-slate-300">
                        Prediksi
                    </a>
                    <a href="#faq"
                        class="inline-flex items-center px-1 pt-1 text-sm font-medium text-gray-500 border-b-2 border-transparent hover:border-gray-300 hover:text-gray-700 dark:text-slate-300">
                        FAQ
                    </a>
                </div>

                {{-- Right Side --}}
                <div class="items-center hidden space-x-3 sm:flex">
                    {{-- Theme Toggle --}}
                    <button id="theme-toggle" type="button"
                        class="p-2 text-gray-500 rounded-lg hover:bg-gray-100 hover:text-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white z-[51] relative">
                        <span class="sr-only">Toggle dark mode</span>
                        <svg id="theme-toggle-dark-icon" class="hidden w-5 h-5" fill="currentColor"
                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
                        </svg>
                        <svg id="theme-toggle-light-icon" class="hidden w-5 h-5" fill="currentColor"
                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"
                                fill-rule="evenodd" clip-rule="evenodd"></path>
                        </svg>
                    </button>

                    {{-- Button login for guest --}}
                    <a href="{{ route('login') }}"
                        class="flex items-center px-4 py-2 text-sm font-medium text-white bg-red-600 rounded-lg hover:bg-red-700 focus:ring-4 focus:ring-red-300 focus:outline-none dark:bg-red-500 dark:hover:bg-red-600 dark:focus:ring-red-700">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1">
                            </path>
                        </svg>
                        Login
                    </a>
                </div>
            </div>

            {{-- Mobile Menu (hidden by default) --}}
            <div class="hidden sm:hidden" id="mobile-menu">
                <div class="pt-2 pb-3 space-y-1">
                    <a href="#home"
                        class="block py-2 pl-3 pr-4 text-base font-medium text-red-600 border-l-4 border-red-500 dark:text-white">
                        Beranda
                    </a>
                    <a href="#about"
                        class="block py-2 pl-3 pr-4 text-base font-medium text-gray-500 border-l-4 border-transparent hover:border-gray-300 hover:text-gray-700 dark:text-slate-300">
                        Tentang
                    </a>
                    <a href="#risk-factors"
                        class="block py-2 pl-3 pr-4 text-base font-medium text-gray-500 border-l-4 border-transparent hover:border-gray-300 hover:text-gray-700 dark:text-slate-300">
                        Faktor Risiko
                    </a>
                    <a href="#prediction"
                        class="block py-2 pl-3 pr-4 text-base font-medium text-gray-500 border-l-4 border-transparent hover:border-gray-300 hover:text-gray-700 dark:text-slate-300">
                        Prediksi
                    </a>
                    <a href="#faq"
                        class="block py-2 pl-3 pr-4 text-base font-medium text-gray-500 border-l-4 border-transparent hover:border-gray-300 hover:text-gray-700 dark:text-slate-300">
                        FAQ
                    </a>
                </div>
                <div class="pt-4 pb-3 border-t border-gray-200 dark:border-gray-600">
                    <div class="flex items-center justify-between px-3">
                        <div>
                            {{-- Theme Toggle (Mobile) --}}
                            <button id="theme-toggle-mobile" type="button"
                                class="p-2 text-gray-500 rounded-lg hover:bg-gray-100 hover:text-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                                <span class="sr-only">Toggle dark mode</span>
                                <svg id="theme-toggle-dark-icon-mobile" class="hidden w-5 h-5" fill="currentColor"
                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
                                </svg>
                                <svg id="theme-toggle-light-icon-mobile" class="hidden w-5 h-5" fill="currentColor"
                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"
                                        fill-rule="evenodd" clip-rule="evenodd"></path>
                                </svg>
                            </button>
                        </div>
                        <div>
                            {{-- Login Button (Mobile) --}}
                            <a href="{{ route('login') }}"
                                class="flex items-center px-4 py-2 text-sm font-medium text-white bg-red-600 rounded-lg hover:bg-red-700 focus:ring-4 focus:ring-red-300 focus:outline-none dark:bg-red-500 dark:hover:bg-red-600 dark:focus:ring-red-700">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1">
                                    </path>
                                </svg>
                                Login
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
@endif
