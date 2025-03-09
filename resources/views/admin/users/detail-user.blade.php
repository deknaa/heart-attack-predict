<x-app-layout>
    <div class="p-14 sm:ml-64">
        <div class="flex items-center justify-between">
            <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
                {{ __('Detail User') }}
            </h2>
            <div class="flex gap-2">
                <a href="" class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-blue-600 border border-transparent rounded-md hover:bg-blue-700 focus:bg-blue-700 active:bg-blue-800 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                    </svg>
                    {{ __('Edit') }}
                </a>
                <a href="{{ route('users.data') }}" class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-gray-600 border border-transparent rounded-md hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    {{ __('Back') }}
                </a>
            </div>
        </div>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="flex flex-col md:flex-row">
                    <!-- User Profile Section -->
                    <div class="flex flex-col items-center justify-center w-full p-6 text-white md:w-1/3 bg-gradient-to-br from-blue-500 to-indigo-600">
                        <div class="relative mb-6 group">
                            @if($user->profile_photo_path)
                                <img src="{{ Storage::url($user->profile_photo_path) }}" alt="{{ $user->name }}" class="object-cover w-40 h-40 border-4 border-white rounded-full shadow-lg">
                            @else
                                <div class="flex items-center justify-center w-40 h-40 bg-gray-300 border-4 border-white rounded-full shadow-lg dark:bg-gray-600">
                                    <span class="text-4xl font-bold text-gray-600 dark:text-gray-300">{{ substr($user->name, 0, 1) }}</span>
                                </div>
                            @endif
                            <div class="absolute inset-0 flex items-center justify-center transition-all duration-300 bg-black bg-opacity-0 rounded-full opacity-0 group-hover:bg-opacity-30 group-hover:opacity-100">
                                <a href="" class="text-white">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                        <h2 class="mb-2 text-2xl font-bold">{{ $user->name }}</h2>
                        <p class="flex items-center mb-1 text-blue-100">
                            {{ $user->email }}
                        </p>
                        <div class="px-4 py-1 mt-3 text-sm font-bold bg-blue-700 rounded-full">
                            {{ ucfirst($user->role) }}
                        </div>
                        <div class="mt-6 text-center">
                            <p class="text-sm text-blue-100">
                                <span class="block mb-1 font-medium text-white">Member since</span>
                                {{ $user->created_at->format('d M Y') }}
                            </p>
                        </div>
                    </div>
                    
                    <!-- User Details Section -->
                    <div class="w-full p-6 md:w-2/3">
                        <div class="mb-8">
                            <h3 class="pb-2 mb-4 text-lg font-semibold text-gray-900 border-b border-gray-200 dark:text-gray-100 dark:border-gray-700">Personal Information</h3>
                            <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                                <div>
                                    <div class="mb-4">
                                        <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Full Name</p>
                                        <p class="mt-1 text-gray-900 dark:text-gray-100">{{ $user->name }}</p>
                                    </div>
                                    <div class="mb-4">
                                        <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Email Address</p>
                                        <p class="mt-1 text-gray-900 dark:text-gray-100">{{ $user->email }}</p>
                                    </div>
                                    <div class="mb-4">
                                        <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Phone Number</p>
                                        <p class="mt-1 text-gray-900 dark:text-gray-100">{{ $user->phone ?? 'Not provided' }}</p>
                                    </div>
                                </div>
                                <div>
                                    <div class="mb-4">
                                        <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Role</p>
                                        <p class="mt-1 text-gray-900 dark:text-gray-100">{{ ucfirst($user->role) }}</p>
                                    </div>
                                    <div class="mb-4">
                                        <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Status</p>
                                        <p class="mt-1">
                                            @if($user->status === 'active')
                                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                                    Active
                                                </span>
                                            @else
                                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">
                                                    Inactive
                                                </span>
                                            @endif
                                        </p>
                                    </div>
                                    <div class="mb-4">
                                        <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Department</p>
                                        <p class="mt-1 text-gray-900 dark:text-gray-100">{{ $user->department ?? 'Not assigned' }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="mb-8">
                            <h3 class="pb-2 mb-4 text-lg font-semibold text-gray-900 border-b border-gray-200 dark:text-gray-100 dark:border-gray-700">Account Information</h3>
                            <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                                <div>
                                    <div class="mb-4">
                                        <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Member Since</p>
                                        <p class="mt-1 text-gray-900 dark:text-gray-100">{{ $user->created_at->format('F d, Y') }}</p>
                                    </div>
                                    <div class="mb-4">
                                        <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Last Updated</p>
                                        <p class="mt-1 text-gray-900 dark:text-gray-100">{{ $user->updated_at->format('F d, Y') }}</p>
                                    </div>
                                </div>
                                <div>
                                    <div class="mb-4">
                                        <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Last Login</p>
                                        <p class="mt-1 text-gray-900 dark:text-gray-100">{{ $user->last_login_at ? $user->last_login_at->format('F d, Y H:i') : 'Never' }}</p>
                                    </div>
                                    <div class="mb-4">
                                        <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Email Verified</p>
                                        <p class="mt-1">
                                            @if($user->email_verified_at)
                                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                                    Verified on {{ $user->email_verified_at->format('M d, Y') }}
                                                </span>
                                            @else
                                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                                                    Not Verified
                                                </span>
                                            @endif
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</x-app-layout>