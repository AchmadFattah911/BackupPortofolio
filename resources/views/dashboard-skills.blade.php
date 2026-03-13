@extends('layouts.dashboard')

@section('title', 'CRUD Skills')
@section('header', 'Skills Management')

@section('content')

<style>
    /* CYBERPUNK THEME - DASHBOARD LANDING */
    .cyber-bg {
        position: relative;
        overflow: hidden;
        border: 1px solid rgba(34, 211, 238, 0.2);
        box-shadow: 0 0 20px rgba(124, 58, 237, 0.1), inset 0 0 20px rgba(236, 72, 153, 0.05);
        background: rgba(15, 23, 42, 0.7);
        backdrop-filter: blur(10px);
    }

    .cyber-text-alt {
        background: linear-gradient(135deg, #22d3ee, #8b5cf6);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: 2px;
    }

    .cyber-button-alt {
        background: linear-gradient(45deg, #06b6d4, #8b5cf6, #ec4899);
        background-size: 200% auto;
        color: white;
        text-transform: uppercase;
        letter-spacing: 1px;
        transition: 0.5s;
        box-shadow: 0 0 15px rgba(6, 182, 212, 0.4);
    }

    .cyber-button-alt:hover {
        background-position: right center;
        box-shadow: 0 0 25px rgba(236, 72, 153, 0.6);
        transform: translateY(-2px);
    }

    .cyber-table {
        border-collapse: separate;
        border-spacing: 0 10px;
    }

    .cyber-row {
        background: rgba(30, 41, 59, 0.6);
        transition: all 0.3s ease;
        border: 1px solid transparent;
    }

    .cyber-row:hover {
        background: rgba(30, 41, 59, 0.9);
        border-color: #ec4899;
        box-shadow: 0 0 15px rgba(236, 72, 153, 0.2), inset 0 0 10px rgba(236, 72, 153, 0.1);
        transform: scale(1.01);
    }

    /* FLOATING OBJECTS */
    .floating-obj {
        position: absolute;
        pointer-events: none;
        z-index: -1;
        opacity: 0.6;
        animation: cyberFloat infinite alternate ease-in-out;
    }

    .obj-1 {
        width: 120px;
        height: 120px;
        border-radius: 10px;
        background: radial-gradient(circle, rgba(34,211,238,0.2) 0%, transparent 70%);
        box-shadow: 0 0 30px rgba(34,211,238,0.3);
        top: 15%;
        right: 5%;
        transform: rotate(15deg);
        animation-duration: 9s;
    }

    .obj-2 {
        width: 80px;
        height: 80px;
        border: 2px solid rgba(236,72,153,0.3);
        border-radius: 50%;
        box-shadow: 0 0 40px rgba(236,72,153,0.2) inset;
        bottom: 15%;
        left: 10%;
        animation-duration: 14s;
        animation-name: cyberFloatReverse;
    }

    @keyframes cyberFloat {
        0% { transform: translateY(0) scale(1) rotate(0deg); }
        100% { transform: translateY(-40px) scale(1.1) rotate(20deg); }
    }

    @keyframes cyberFloatReverse {
        0% { transform: translateY(0) scale(1) rotate(45deg); }
        100% { transform: translateY(50px) scale(0.9) rotate(90deg); }
    }

    /* ENTRANCE ANIMATION */
    .dashboard-entrance {
        animation: dashEntrance 0.8s cubic-bezier(0.16, 1, 0.3, 1) forwards;
    }

    @keyframes dashEntrance {
        0% { opacity: 0; transform: translateY(30px); filter: blur(10px); }
        100% { opacity: 1; transform: translateY(0); filter: blur(0); }
    }
</style>

<!-- Floating Objects -->
<div class="floating-obj obj-1"></div>
<div class="floating-obj obj-2"></div>

<div class="dashboard-entrance">

<div class="bg-gray-900 cyber-bg rounded-xl p-8 shadow-2xl">
    <div class="flex justify-between items-center mb-8 border-b border-gray-700 pb-4">
        <h2 class="text-2xl cyber-text-alt tracking-widest"><i class="fa-solid fa-microchip mr-2"></i> SKILL MATRIX</h2>
        <a href="{{ route('skills.create') }}" class="cyber-button-alt px-6 py-2.5 rounded-lg font-bold text-sm inline-flex items-center gap-2">
            <i class="fa-solid fa-code"></i> INTEGRATE SKILL
        </a>
    </div>

    @if(session('success'))
    <div class="mb-4 p-3 bg-green-500 text-white rounded-md text-sm">
        {{ session('success') }}
    </div>
    @endif

    <div class="overflow-x-auto">
        <table class="w-full text-left cyber-table min-w-[600px]">
            <thead>
                <tr>
                    <th class="px-4 py-3 text-xs font-bold text-gray-400 uppercase tracking-wider border-b border-gray-700">SYS_ID</th>
                    <th class="px-4 py-3 text-xs font-bold text-gray-400 uppercase tracking-wider border-b border-gray-700">PROTO_NAME</th>
                    <th class="px-4 py-3 text-xs font-bold text-gray-400 uppercase tracking-wider border-b border-gray-700">CAPACITY</th>
                    <th class="px-4 py-3 text-pink-400 font-bold uppercase tracking-wider border-b border-gray-700 text-center">OVERRIDE</th>
                </tr>
            </thead>
            <tbody>
                @forelse($skills as $index => $skill)
                <tr class="cyber-row rounded-lg">
                    <td class="px-4 py-4 text-sm text-cyan-500 font-mono">0x{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}</td>
                    <td class="px-4 py-4 text-sm font-bold text-gray-100 tracking-wide">{{ $skill->name }}</td>
                    <td class="px-4 py-4 w-1/3">
                        <div class="flex items-center gap-3">
                            <div class="flex-1 bg-gray-800 rounded-full h-2.5 shadow-[inset_0_2px_4px_rgba(0,0,0,0.6)] border border-gray-700">
                                <div class="bg-gradient-to-r from-cyan-400 to-indigo-500 h-2.5 rounded-full shadow-[0_0_10px_rgba(34,211,238,0.5)] relative" style="width: {{ $skill->level }}%">
                                    <div class="absolute right-0 top-0 bottom-0 w-2 bg-white rounded-full animate-pulse blur-[1px]"></div>
                                </div>
                            </div>
                            <span class="text-xs font-bold text-cyan-400 w-10">{{ $skill->level }}%</span>
                        </div>
                    </td>
                    <td class="px-4 py-4">
                        <div class="flex justify-center gap-2">
                            <a href="{{ route('skills.edit', $skill->id) }}" class="border border-indigo-500 text-indigo-400 hover:bg-indigo-500 hover:text-white px-3 py-1 rounded text-xs transition duration-300 font-bold tracking-wide shadow-[0_0_8px_rgba(99,102,241,0.2)]">
                                TWEAK
                            </a>
                            <form action="{{ route('skills.destroy', $skill->id) }}" method="POST" onsubmit="return confirm('WARNING: Protocol deletion is irreversible. Confirm?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="border border-pink-500 text-pink-400 hover:bg-pink-500 hover:text-white px-3 py-1 rounded text-xs transition duration-300 font-bold tracking-wide shadow-[0_0_8px_rgba(236,72,153,0.2)]">
                                    ERASE
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="px-4 py-10 text-center text-gray-500 uppercase tracking-widest text-sm italic border-b border-gray-700 text-pink-500">
                        { NO MATRIX PROTOCOLS FOUND }
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
</div>
@endsection