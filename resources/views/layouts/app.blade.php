<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', config('app.name', 'Laravel'))</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-gray-100 dark:bg-gray-900 min-h-screen" x-data="{ sidebarOpen: true }">

    <!-- SIDEBAR -->
    <aside 
        id="sidebar" 
        class="fixed inset-y-0 left-0 w-64 bg-white dark:bg-gray-800 shadow-md transition-transform duration-300 z-30"
        :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'"
    >
        <div class="p-4 h-full flex flex-col justify-between">
            <div>
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-lg font-semibold text-gray-700 dark:text-gray-300">Menu Admin</h3>
                    <button @click="sidebarOpen = false" class="md:hidden text-gray-500 hover:text-gray-700 dark:hover:text-gray-300">
                        ✕
                    </button>
                </div>
                
                <ul class="space-y-2">
                    <li>
                        <a href="{{ route('dashboard') }}" 
                           class="block px-3 py-2 rounded-md {{ request()->routeIs('dashboard') ? 'bg-indigo-600 text-white' : 'text-gray-600 dark:text-gray-400 hover:bg-indigo-500 hover:text-white' }} transition">
                            CRUD Project
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('skills.index') }}" 
                           class="block px-3 py-2 rounded-md {{ request()->routeIs('skills.*') ? 'bg-indigo-600 text-white' : 'text-gray-600 dark:text-gray-400 hover:bg-indigo-500 hover:text-white' }} transition">
                            CRUD Skills
                        </a>
                    </li>
                </ul>
            </div>

            <div class="text-xs text-gray-500 dark:text-gray-400 border-t border-gray-200 dark:border-gray-700 pt-4 text-center">
                Dashboard &copy; {{ date('Y') }}
            </div>
        </div>
    </aside>

    <!-- OVERLAY MOBILE -->
    <div 
        x-show="sidebarOpen" 
        @click="sidebarOpen = false" 
        class="fixed inset-0 bg-black bg-opacity-50 z-40 md:hidden"
        x-transition:opacity
    ></div>

    <!-- MAIN -->
    <div 
        class="flex-1 flex flex-col min-h-screen transition-all duration-300"
        :class="sidebarOpen ? 'md:ml-64' : 'ml-0'"
    >

        <!-- HEADER -->
        <header class="p-4 bg-white dark:bg-gray-800 shadow-sm flex items-center justify-between sticky top-0 z-30 px-6">
            <div class="flex items-center">
                <button 
                    @click="sidebarOpen = !sidebarOpen" 
                    class="p-2 rounded-md bg-gray-100 dark:bg-gray-700 hover:bg-gray-200 dark:hover:bg-gray-600 transition text-gray-600 dark:text-gray-200"
                >
                    ☰
                </button>

                <h1 class="ml-4 text-xl font-semibold text-gray-800 dark:text-gray-200">
                    @yield('header')
                </h1>
            </div>

            <!-- PROFILE DROPDOWN -->
            <div x-data="{ open: false }" class="relative z-50">
                <button 
                    @click="open = !open" 
                    @click.outside="open = false"
                    class="flex items-center gap-2 px-3 py-2 rounded-lg
                           bg-gray-100 dark:bg-gray-700
                           text-gray-700 dark:text-gray-200
                           hover:bg-gray-200 dark:hover:bg-gray-600 transition"
                >
                    <div class="w-8 h-8 rounded-full bg-indigo-600 flex items-center justify-center text-white font-bold">
                        {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                    </div>

                    <span class="hidden md:block text-sm font-medium">
                        {{ Auth::user()->name }}
                    </span>

                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>

                <div 
                    x-show="open" 
                    x-transition 
                    class="absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white dark:bg-gray-700 ring-1 ring-black ring-opacity-5"
                >
                    <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-sm hover:bg-gray-100 dark:hover:bg-gray-600">
                        Profile
                    </a>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="block w-full text-left px-4 py-2 text-sm hover:bg-gray-100 dark:hover:bg-gray-600">
                            Log Out
                        </button>
                    </form>
                </div>
            </div>
        </header>

        <!-- CONTENT -->
        <main class="p-6 pt-24">
            @yield('content')
        </main>
    </div>

</body>
</html>