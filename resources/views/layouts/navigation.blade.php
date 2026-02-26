<nav x-data="{ open: false, profile: false }"
     class="bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700 relative z-50">

    <div class="w-full px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-79 items-center">

            <!-- LEFT SIDE -->
            <div class="flex items-center gap-6">

                <!-- Logo -->
                <a href="{{ route('dashboard') }}">
                    <x-application-logo class="h-9 w-auto fill-current text-gray-800 dark:text-gray-200" />
                </a>

                <!-- Menu -->
                <div class="hidden sm:flex space-x-8">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        Dashboard
                    </x-nav-link>
                </div>

            </div>

            <!-- RIGHT SIDE (PROFILE DROPDOWN) -->
            <div class="relative">
                <button
                    @click="profile = !profile"
                    class="flex items-center gap-2 px-3 py-2 rounded-lg
                        hover:bg-gray-100 dark:hover:bg-gray-700 transition">

                    <!-- Avatar -->
                <div class="w-4 h-4 rounded-full bg-indigo-600
                            flex items-center justify-center
                            text-white font-bold
                            ring-2 ring-white dark:ring-gray-800
                            shadow-md">
                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                </div>

                    <!-- Name -->
                    <span class="hidden sm:block text-sm font-medium text-gray-700 dark:text-gray-200">
                        {{ Auth::user()->name }}
                    </span>

                    <svg class="w-4 h-4 text-gray-500" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-width="1.5" d="M6 8l4 4 4-4"/>
                    </svg>
                </button>


                <!-- DROPDOWN -->
                <div
                    x-show="profile"
                    @click.outside="profile = false"
                    x-transition
                    class="absolute right-0 mt-2 w-48
                           bg-white dark:bg-gray-800
                           border border-gray-200 dark:border-gray-700
                           rounded-xl shadow-lg overflow-hidden">

                    <a href="{{ route('profile.edit') }}"
                       class="block px-4 py-3 text-sm
                              text-gray-700 dark:text-gray-200
                              hover:bg-gray-100 dark:hover:bg-gray-700">
                        Profile
                    </a>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button
                            type="submit"
                            class="w-full text-left px-4 py-3 text-sm
                                   text-red-600 hover:bg-red-50 dark:hover:bg-gray-700">
                                Log Out
                        </button>
                    </form>
                </div>
            </div>

        </div>
    </div>

</nav>
