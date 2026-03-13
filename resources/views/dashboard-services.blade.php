@extends('layouts.dashboard')

@section('title', 'Admin Dashboard - Specialized Services')

@section('header')
<div class="flex items-center gap-3">
    <i class="fa-solid fa-handshake text-cyan-400 text-3xl animate-pulse"></i>
    <span style="font-family: 'Courier New', Courier, monospace;" class="bg-clip-text text-transparent bg-gradient-to-r from-pink-400 to-cyan-400 tracking-widest uppercase shadow-cyan">
        Specializations
    </span>
</div>
@endsection

@section('content')
<style>
    .cyber-bg {
        background: rgba(15, 23, 42, 0.7);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(236, 72, 153, 0.2);
        box-shadow: 0 0 20px rgba(124, 58, 237, 0.1), inset 0 0 20px rgba(34, 211, 238, 0.05);
        border-radius: 8px;
        position: relative;
        overflow: hidden;
    }

    .cyber-bg::before {
        content: '';
        position: absolute;
        top: 0; left: 0; right: 0; height: 1px;
        background: linear-gradient(90deg, transparent, #ec4899, transparent);
    }

    .cyber-table-container {
        overflow-x: auto;
    }

    .cyber-table {
        width: 100%;
        border-collapse: separate;
        border-spacing: 0 8px;
    }

    .cyber-th {
        color: #f472b6;
        font-family: 'Courier New', Courier, monospace;
        text-transform: uppercase;
        letter-spacing: 2px;
        padding: 15px 20px;
        text-align: left;
        border-bottom: 1px solid rgba(236, 72, 153, 0.3);
        background: rgba(15, 23, 42, 0.8);
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

    .cyber-td {
        padding: 15px 20px;
        color: #e2e8f0;
        vertical-align: middle;
        font-family: 'Courier New', Courier, monospace;
    }

    .cyber-td-first {
        border-top-left-radius: 8px;
        border-bottom-left-radius: 8px;
        border-left: 2px solid transparent;
    }

    .cyber-row:hover .cyber-td-first {
        border-left-color: #22d3ee;
    }

    .cyber-td-last {
        border-top-right-radius: 8px;
        border-bottom-right-radius: 8px;
    }

    .cyber-button {
        background: linear-gradient(45deg, #06b6d4, #3b82f6);
        border: none;
        clip-path: polygon(10% 0, 100% 0, 100% 70%, 90% 100%, 0 100%, 0 30%);
        box-shadow: 0 0 15px rgba(34, 211, 238, 0.4);
    }

    .cyber-button-alt {
        background: transparent;
        border: 1px solid rgba(236, 72, 153, 0.5);
        color: #f472b6;
        padding: 5px 12px;
        border-radius: 4px;
        transition: all 0.3s ease;
        text-transform: uppercase;
        font-size: 0.75rem;
        letter-spacing: 1px;
    }

    .cyber-button-alt:hover {
        background: rgba(236, 72, 153, 0.1);
        border-color: #ec4899;
        box-shadow: 0 0 10px rgba(236, 72, 153, 0.4);
        transform: translateY(-2px);
    }

    .dashboard-entrance {
        animation: dashEntrance 0.8s cubic-bezier(0.16, 1, 0.3, 1) forwards;
        opacity: 0;
        transform: translateY(30px);
    }

    @keyframes dashEntrance {
        from { opacity: 0; transform: translateY(40px) scale(0.98); filter: blur(5px); }
        to { opacity: 1; transform: translateY(0) scale(1); filter: blur(0); }
    }
</style>

<div class="relative z-10 dashboard-entrance">
    @if(session('success'))
        <div class="mb-6 p-4 bg-gray-900 border border-cyan-500 rounded-lg shadow-[0_0_15px_rgba(34,211,238,0.3)] animate-pulse flex items-center justify-between">
            <span class="text-cyan-400 font-bold tracking-widest uppercase font-mono"><i class="fa-solid fa-circle-check mr-2"></i> {{ session('success') }}</span>
        </div>
    @endif

    <div class="cyber-bg p-8">
        <div class="flex justify-between items-center mb-6 border-b border-gray-700 pb-4">
            <h2 class="text-xl font-bold text-gray-300 tracking-widest uppercase font-mono">
                <i class="fa-solid fa-layer-group text-pink-500 mr-2"></i> SERVICES LOG
            </h2>
            <a href="{{ route('services.create') }}" class="cyber-button px-6 py-2 text-white font-bold transition duration-300 text-sm uppercase tracking-widest hover:scale-105 inline-block text-center flex items-center gap-2">
                <i class="fa-solid fa-plus"></i> COMPILE SERVICE
            </a>
        </div>

        <div class="cyber-table-container">
            <table class="cyber-table">
                <thead>
                    <tr>
                        <th class="cyber-th rounded-tl-lg">Designation</th>
                        <th class="cyber-th text-center">Icon Tag</th>
                        <th class="cyber-th">Payload (Description)</th>
                        <th class="cyber-th rounded-tr-lg text-center">Override</th>
                    </tr>
                </thead>
                <tbody class="space-y-4">
                    @forelse ($services as $service)
                        <tr class="cyber-row">
                            <td class="cyber-td cyber-td-first font-bold text-cyan-300">
                                {{ $service->title }}
                            </td>
                            <td class="cyber-td text-center text-pink-400 text-2xl">
                                <i class="{{ $service->icon }}"></i>
                            </td>
                            <td class="cyber-td text-gray-400 text-sm max-w-sm truncate" title="{{ $service->description }}">
                                {{ Str::limit($service->description, 50) }}
                            </td>
                            <td class="cyber-td cyber-td-last text-center">
                                <div class="flex justify-center items-center gap-3">
                                    <a href="{{ route('services.edit', $service->id) }}" class="cyber-button-alt border-cyan-500 text-cyan-400 hover:border-cyan-400 hover:bg-cyan-500/10 hover:shadow-[0_0_10px_rgba(34,211,238,0.4)]">
                                        <i class="fa-solid fa-pen-to-square"></i> TWEAK
                                    </a>

                                    <form action="{{ route('services.destroy', $service->id) }}" method="POST" onsubmit="return confirm('PERINGATAN: Layanan ini akan dihapus permanen. Lanjutkan?');" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="cyber-button-alt border-red-500 text-red-500 hover:bg-red-500/10 hover:border-red-400 hover:text-red-400 hover:shadow-[0_0_10px_rgba(239,68,68,0.4)]">
                                            <i class="fa-solid fa-trash-can"></i> ERASE
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="py-12 text-center text-gray-500 font-mono tracking-widest">
                                <div class="flex flex-col items-center justify-center opacity-50">
                                    <i class="fa-solid fa-ghost text-4xl mb-3 text-cyan-900 animate-pulse"></i>
                                    { NO SERVICES ESTABLISHED }
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
