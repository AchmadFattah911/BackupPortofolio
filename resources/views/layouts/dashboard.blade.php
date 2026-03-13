<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Dashboard')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-900 min-h-screen font-body relative" x-data="{ sidebarOpen: true }">

    <!-- Ambient Grid Background -->
    <div class="fixed inset-0 z-0 pointer-events-none opacity-20" style="background-image: linear-gradient(#22d3ee 1px, transparent 1px), linear-gradient(90deg, #22d3ee 1px, transparent 1px); background-size: 50px 50px;"></div>

    <style>
        .cyber-sidebar {
            background: rgba(15, 23, 42, 0.9);
            backdrop-filter: blur(20px);
            border-right: 1px solid rgba(236, 72, 153, 0.3);
            box-shadow: 5px 0 25px rgba(236, 72, 153, 0.15), inset -5px 0 20px rgba(124, 58, 237, 0.1);
        }
        
        .cyber-sidebar::after {
            content: '';
            position: absolute;
            top: 0; right: 0; bottom: 0; width: 2px;
            background: linear-gradient(180deg, transparent, #ec4899, #22d3ee, transparent);
            animation: borderPulse 3s infinite;
        }

        .cyber-nav-link {
            position: relative;
            overflow: hidden;
            border: 1px solid transparent;
        }

        .cyber-nav-link:hover {
            background: rgba(236, 72, 153, 0.1);
            border-color: rgba(236, 72, 153, 0.3);
            box-shadow: inset 0 0 10px rgba(236, 72, 153, 0.2);
            color: #f472b6 !important;
            transform: translateX(5px);
        }

        .cyber-nav-link::before {
            content: '';
            position: absolute;
            top: 0; left: -100%; width: 100%; height: 100%;
            background: linear-gradient(90deg, transparent, rgba(34, 211, 238, 0.2), transparent);
            transition: 0.5s;
        }

        .cyber-nav-link:hover::before {
            left: 100%;
        }

        @keyframes borderPulse {
            0% { opacity: 0.3; }
            50% { opacity: 1; box-shadow: 0 0 15px #22d3ee; }
            100% { opacity: 0.3; }
        }

        .cyber-header {
            background: rgba(15, 23, 42, 0.85);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid rgba(34, 211, 238, 0.2);
            box-shadow: 0 5px 20px rgba(34, 211, 238, 0.1);
        }
    </style>

    <aside 
        id="sidebar" 
        class="fixed inset-y-0 left-0 w-64 cyber-sidebar transition-transform duration-300 z-50"
        :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'"
    >
        <div class="p-4 h-full flex flex-col justify-between relative z-10">
            <div>
                <div class="flex items-center justify-between mb-8 border-b border-gray-700 pb-4">
                    <h3 class="text-xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-pink-400 to-cyan-400 tracking-widest uppercase font-mono"><i class="fa-solid fa-server mr-2"></i> SYSTEM</h3>
                    <button @click="sidebarOpen = false" class="md:hidden text-cyan-400 hover:text-pink-400 transition-colors">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>
                
                <ul class="space-y-3 font-mono">
                    <li>
                        <a href="{{ route('dashboard') }}" 
                           class="cyber-nav-link block px-4 py-3 rounded-lg text-gray-300 hover:text-cyan-400 transition-all duration-300 font-bold tracking-wide uppercase text-sm flex items-center gap-3">
                           <i class="fa-solid fa-folder-tree text-pink-500"></i> PROJECT DB
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('skills.index') }}" 
                           class="cyber-nav-link block px-4 py-3 rounded-lg text-gray-300 hover:text-cyan-400 transition-all duration-300 font-bold tracking-wide uppercase text-sm flex items-center gap-3">
                           <i class="fa-solid fa-microchip text-indigo-500"></i> SKILL MATRIX
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('services.index') }}" 
                           class="cyber-nav-link block px-4 py-3 rounded-lg text-gray-300 hover:text-cyan-400 transition-all duration-300 font-bold tracking-wide uppercase text-sm flex items-center gap-3">
                           <i class="fa-solid fa-layer-group text-pink-500"></i> SERVICES
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('contacts.index') }}" 
                           class="cyber-nav-link block px-4 py-3 rounded-lg text-gray-300 hover:text-cyan-400 transition-all duration-300 font-bold tracking-wide uppercase text-sm flex items-center gap-3">
                           <i class="fa-solid fa-satellite-dish text-yellow-500"></i> COMMS LOG
                        </a>
                    </li>
                </ul>
            </div>

            <div class="text-xs text-pink-500 border-t border-gray-700 pt-4 font-mono text-center tracking-widest uppercase animate-pulse">
                Admin <span class="text-cyan-400">Terminal</span>
            </div>
        </div>
    </aside>

    <div 
        x-show="sidebarOpen" 
        @click="sidebarOpen = false" 
        class="fixed inset-0 bg-black bg-opacity-50 z-40 md:hidden"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
    ></div>

    <div 
        class="flex-1 flex flex-col min-h-screen transition-all duration-300 relative z-10"
        :class="sidebarOpen ? 'md:ml-64' : 'ml-0'"
    >

        <header class="p-4 cyber-header flex items-center justify-between sticky top-0 z-30">
            <div class="flex items-center">
                <button 
                    @click="sidebarOpen = !sidebarOpen" 
                    class="p-2 rounded-md bg-gray-800 border border-gray-700 hover:border-cyan-400 hover:bg-gray-700 transition text-cyan-400 focus:outline-none shadow-[0_0_10px_rgba(34,211,238,0.1)]"
                >
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                </button>

                <h1 class="ml-4 text-xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-cyan-400 to-pink-500 tracking-widest uppercase font-mono">
                    @yield('header')
                </h1>
            </div>

            <div class="flex items-center relative z-50">
                <div x-data="{ open: false }" class="relative">
                    <button @click="open = !open" @click.outside="open = false" class="inline-flex items-center px-4 py-2 border border-gray-700 rounded-lg text-sm font-bold text-gray-300 bg-gray-800 hover:text-cyan-400 hover:border-cyan-400 focus:outline-none transition shadow-[0_0_10px_rgba(34,211,238,0.1)] font-mono uppercase tracking-wide">
                        <div><i class="fa-solid fa-user-astronaut text-pink-400 mr-2"></i> {{ Auth::user()->name ?? 'SYS_ADMIN' }}</div>
                        <div class="ms-1">
                            <svg class="fill-current h-4 w-4" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </div>
                    </button>

                    <div x-show="open" 
                         x-transition:enter="transition ease-out duration-300"
                         x-transition:enter-start="transform opacity-0 scale-95 translate-y-2"
                         x-transition:enter-end="transform opacity-100 scale-100 translate-y-0"
                         x-transition:leave="transition ease-in duration-200"
                         x-transition:leave-start="transform opacity-100 scale-100 translate-y-0"
                         x-transition:leave-end="transform opacity-0 scale-95 translate-y-2"
                         class="absolute right-0 mt-3 w-56 rounded-lg py-2 bg-gray-900 border border-gray-700 ring-1 ring-cyan-500/30 shadow-[0_10px_30px_rgba(34,211,238,0.2)] z-50">
                        
                        <a href="{{ route('profile.edit') }}" class="block px-4 py-2.5 text-sm text-gray-300 hover:bg-gray-800 hover:text-cyan-400 flex items-center gap-2 font-mono uppercase tracking-widest transition-colors duration-200">
                            <i class="fa-solid fa-id-badge text-pink-400"></i> {{ __('Sys Profile') }}
                        </a>

                        <div class="border-t border-gray-700 my-1"></div>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="block w-full text-left px-4 py-2.5 text-sm text-pink-500 hover:bg-gray-800 hover:text-pink-400 flex items-center gap-2 font-mono uppercase tracking-widest transition-colors duration-200">
                                <i class="fa-solid fa-power-off"></i> {{ __('Disconnect') }}
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </header>

        <main class="p-6">
            @yield('content')
        </main>
    </div>

</body>
</html>