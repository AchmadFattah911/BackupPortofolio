@extends('layouts.dashboard')

@section('title', 'Dashboard')
@section('header', 'Project Management')

@section('content')

<style>
    /* CYBERPUNK THEME - DASHBOARD LANDING */
    .cyber-bg {
        position: relative;
        overflow: hidden;
        border: 1px solid rgba(236, 72, 153, 0.2);
        box-shadow: 0 0 20px rgba(124, 58, 237, 0.1), inset 0 0 20px rgba(34, 211, 238, 0.05);
        background: rgba(15, 23, 42, 0.7);
        backdrop-filter: blur(10px);
    }

    .cyber-text {
        background: linear-gradient(135deg, #f472b6, #22d3ee);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: 2px;
    }

    .cyber-button {
        background: linear-gradient(45deg, #ec4899, #8b5cf6, #06b6d4);
        background-size: 200% auto;
        color: white;
        text-transform: uppercase;
        letter-spacing: 1px;
        transition: 0.5s;
        box-shadow: 0 0 15px rgba(236, 72, 153, 0.4);
    }

    .cyber-button:hover {
        background-position: right center;
        box-shadow: 0 0 25px rgba(6, 182, 212, 0.6);
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
        border-color: #22d3ee;
        box-shadow: 0 0 15px rgba(34, 211, 238, 0.2), inset 0 0 10px rgba(34, 211, 238, 0.1);
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
        width: 100px;
        height: 100px;
        border-radius: 50%;
        background: radial-gradient(circle, rgba(236,72,153,0.2) 0%, transparent 70%);
        box-shadow: 0 0 30px rgba(236,72,153,0.3);
        top: 10%;
        left: 5%;
        animation-duration: 8s;
    }

    .obj-2 {
        width: 150px;
        height: 150px;
        border: 2px solid rgba(34,211,238,0.2);
        transform: rotate(45deg);
        box-shadow: 0 0 40px rgba(34,211,238,0.2) inset;
        bottom: 20%;
        right: 10%;
        animation-duration: 12s;
        animation-name: cyberFloatReverse;
    }

    .obj-3 {
        width: 60px;
        height: 60px;
        background: linear-gradient(135deg, rgba(139,92,246,0.2), rgba(34,211,238,0.2));
        filter: blur(5px);
        top: 40%;
        right: 30%;
        animation-duration: 6s;
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
<div class="floating-obj obj-3"></div>

<div class="dashboard-entrance">


<div class="bg-gray-900 cyber-bg rounded-xl mb-6 p-6 text-gray-100 flex items-center justify-between">
    <div class="text-lg">
        SYSTEM ACCESS: <span class="cyber-text">{{ auth()->user()->name }}</span>
    </div>
    <div class="text-xs text-pink-500 animate-pulse tracking-widest uppercase">
        Online
    </div>
</div>

<div class="bg-gray-900 cyber-bg rounded-xl p-8 text-gray-100">

    @if(session('success'))
    <div class="mb-6 p-4 bg-green-500 text-white rounded-lg shadow-sm">
        {{ session('success') }}
    </div>
    @endif

    <div class="flex justify-between items-center mb-8 border-b border-gray-700 pb-4">
        <h3 class="text-2xl cyber-text">PROJECT DATABASE</h3>
        <a href="{{ route('projects.create') }}" 
           class="px-6 py-2.5 rounded-lg font-bold text-sm cyber-button inline-flex items-center gap-2">
           <i class="fa-solid fa-plus"></i> INITIALIZE PROJECT
        </a>
    </div>

    <!-- Table Wrapper -->
    <div class="overflow-x-auto -mx-6 px-6">
        <table class="w-full text-left cyber-table min-w-[700px]">
            <thead>
                <tr>
                    <th class="py-3 px-4 text-gray-400 font-semibold tracking-wider uppercase text-sm border-b border-gray-700">ID</th>
                    <th class="py-3 px-4 text-gray-400 font-semibold tracking-wider uppercase text-sm border-b border-gray-700">Project Name</th>
                    <th class="py-3 px-4 text-gray-400 font-semibold tracking-wider uppercase text-sm border-b border-gray-700">Description</th>
                    <th class="py-3 px-4 text-cyan-400 font-semibold tracking-wider uppercase text-sm border-b border-gray-700 text-center">Execute Command</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($projects as $project)
                    <tr class="cyber-row rounded-lg">
                        <td class="py-4 px-4 text-pink-500 font-mono">#{{ str_pad($loop->iteration, 3, '0', STR_PAD_LEFT) }}</td>
                        <td class="py-4 px-4 font-bold text-gray-100">{{ $project->title }}</td>
                        <td class="py-4 px-4 text-gray-400 text-sm">{{ Str::limit($project->description, 50) }}</td>

                        <td class="py-4 px-4 text-center">
                            <div class="flex justify-center space-x-3">
                                <a href="{{ route('projects.edit', $project->id) }}" 
                                   class="px-4 py-1.5 border border-cyan-500 text-cyan-400 rounded hover:bg-cyan-500 hover:text-gray-900 transition-colors shadow-[0_0_10px_rgba(34,211,238,0.2)] text-xs font-bold uppercase tracking-wide">
                                   EDIT
                                </a>
                                <form action="{{ route('projects.destroy', $project->id) }}" method="POST" onsubmit="return confirm('WARNING: Data deletion is permanent. Proceed?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="px-4 py-1.5 border border-pink-500 text-pink-400 rounded hover:bg-pink-500 hover:text-white transition-colors shadow-[0_0_10px_rgba(236,72,153,0.2)] text-xs font-bold uppercase tracking-wide cursor-pointer flex items-center gap-1">
                                        <i class="fa-solid fa-trash-can"></i> PURGE
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center py-6">Belum ada project</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>
</div>

@endsection
