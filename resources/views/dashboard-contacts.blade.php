@extends('layouts.dashboard')

@section('title', 'Admin Dashboard - Comms Log')

@section('header')
<div class="flex items-center gap-3">
    <i class="fa-solid fa-satellite-dish text-cyan-400 text-3xl animate-pulse"></i>
    <span style="font-family: 'Courier New', Courier, monospace;" class="bg-clip-text text-transparent bg-gradient-to-r from-pink-400 to-cyan-400 tracking-widest uppercase shadow-cyan">
        Comms Inbox Log
    </span>
</div>
@endsection

@section('content')
<style>
    /* CYBERPUNK THEME */
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

    /* ENTRANCE ANIMATION */
    .dashboard-entrance {
        animation: dashEntrance 0.8s cubic-bezier(0.16, 1, 0.3, 1) forwards;
        opacity: 0;
        transform: translateY(30px);
    }

    @keyframes dashEntrance {
        from { opacity: 0; transform: translateY(40px) scale(0.98); filter: blur(5px); }
        to { opacity: 1; transform: translateY(0) scale(1); filter: blur(0); }
    }

    /* FLOATING OBJECTS */
    .floating-obj {
        position: absolute;
        pointer-events: none;
        z-index: 0;
        opacity: 0.5;
    }

    .obj-1 { top: 10%; right: 5%; width: 300px; height: 300px; background: radial-gradient(circle, rgba(236,72,153,0.1) 0%, transparent 70%); animation: cyberFloat 15s infinite; }
    .obj-2 { bottom: -10%; left: -5%; width: 400px; height: 400px; background: radial-gradient(circle, rgba(34,211,238,0.05) 0%, transparent 70%); animation: cyberFloatReverse 20s infinite; }
    
    @keyframes cyberFloat { 0%, 100% { transform: translateY(0) rotate(0deg); } 50% { transform: translateY(-30px) rotate(180deg); } }
    @keyframes cyberFloatReverse { 0%, 100% { transform: translateY(0) rotate(0deg); } 50% { transform: translateY(30px) rotate(-180deg); } }
</style>

<!-- Floating Background Elements -->
<div class="floating-obj obj-1"></div>
<div class="floating-obj obj-2"></div>

<div class="relative z-10 dashboard-entrance">
    
    @if(session('success'))
        <div class="mb-6 p-4 bg-gray-900 border border-cyan-500 rounded-lg shadow-[0_0_15px_rgba(34,211,238,0.3)] animate-pulse flex items-center justify-between">
            <span class="text-cyan-400 font-bold tracking-widest uppercase font-mono"><i class="fa-solid fa-circle-check mr-2"></i> {{ session('success') }}</span>
        </div>
    @endif

    <div class="cyber-bg p-8">
        
        <div class="flex justify-between items-center mb-6 border-b border-gray-700 pb-4">
            <h2 class="text-xl font-bold text-gray-300 tracking-widest uppercase font-mono">
                <i class="fa-solid fa-envelope-open-text text-pink-500 mr-2"></i> INCOMING SIGNALS
            </h2>
        </div>

        <div class="cyber-table-container">
            <table class="cyber-table">
                <thead>
                    <tr>
                        <th class="cyber-th rounded-tl-lg">Sender Identity</th>
                        <th class="cyber-th">Comms Node</th>
                        <th class="cyber-th">Payload (Message)</th>
                        <th class="cyber-th">Timestamp</th>
                        <th class="cyber-th rounded-tr-lg text-center">Action</th>
                    </tr>
                </thead>
                <tbody class="space-y-4">
                    @forelse ($contacts as $contact)
                        <tr class="cyber-row">
                            <td class="cyber-td cyber-td-first font-bold text-cyan-300">
                                {{ $contact->nama }}
                            </td>
                            <td class="cyber-td text-gray-400 text-sm">
                                <a href="mailto:{{ $contact->email }}" class="hover:text-cyan-400 transition-colors">
                                    <i class="fa-regular fa-envelope"></i> {{ $contact->email }}
                                </a>
                            </td>
                            <td class="cyber-td text-gray-300 text-sm max-w-xs truncate" title="{{ $contact->deskripsi }}">
                                {{ $contact->deskripsi }}
                            </td>
                            <td class="cyber-td text-gray-500 text-xs text-nowrap">
                                {{ $contact->created_at->diffForHumans() }}
                            </td>
                            <td class="cyber-td cyber-td-last text-center">
                                <div class="flex justify-center items-center gap-3">
                                    <button onclick="document.getElementById('modal-{{ $contact->id }}').classList.remove('hidden')" class="cyber-button-alt border-cyan-500 text-cyan-400 hover:border-cyan-400 hover:bg-cyan-500/10 hover:shadow-[0_0_10px_rgba(34,211,238,0.4)]" title="View Payload">
                                        <i class="fa-solid fa-eye"></i> READ
                                    </button>

                                    <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST" onsubmit="return confirm('PERINGATAN: Pesan ini akan dihapus secara permanen dari sistem. Lanjutkan?');" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="cyber-button-alt border-red-500 text-red-500 hover:bg-red-500/10 hover:border-red-400 hover:text-red-400 hover:shadow-[0_0_10px_rgba(239,68,68,0.4)]">
                                            <i class="fa-solid fa-trash-can"></i> PURGE
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>

                        <!-- Modal Detail -->
                        <div id="modal-{{ $contact->id }}" class="fixed inset-0 z-50 hidden bg-black/80 flex items-center justify-center p-4">
                            <div class="cyber-bg p-8 max-w-2xl w-full cyber-entrance border-cyan-500">
                                <div class="flex justify-between items-center mb-6 border-b border-gray-700 pb-4">
                                    <h3 class="text-xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-cyan-400 to-pink-500 font-mono tracking-widest"><i class="fa-solid fa-envelope-open text-cyan-400"></i> DECRYPTED PAYLOAD</h3>
                                    <button onclick="document.getElementById('modal-{{ $contact->id }}').classList.add('hidden')" class="text-gray-400 hover:text-pink-500 transition-colors">
                                        <i class="fa-solid fa-xmark text-2xl"></i>
                                    </button>
                                </div>
                                
                                <div class="space-y-4 font-mono text-sm">
                                    <div>
                                        <span class="text-gray-500 block text-xs uppercase tracking-widest">Sender:</span>
                                        <span class="text-cyan-300 font-bold text-lg">{{ $contact->nama }}</span>
                                    </div>
                                    <div>
                                        <span class="text-gray-500 block text-xs uppercase tracking-widest">Comms Node:</span>
                                        <a href="mailto:{{ $contact->email }}" class="text-pink-400 hover:text-pink-300 hover:underline">{{ $contact->email }}</a>
                                    </div>
                                    <div>
                                        <span class="text-gray-500 block text-xs uppercase tracking-widest">Timestamp:</span>
                                        <span class="text-gray-400">{{ $contact->created_at->format('d M Y, H:i') }} ({{ $contact->created_at->diffForHumans() }})</span>
                                    </div>
                                    <div class="pt-4 border-t border-gray-700 mt-4">
                                        <span class="text-gray-500 block text-xs uppercase tracking-widest mb-2">Message Body:</span>
                                        <div class="bg-gray-900 p-4 rounded border border-gray-700 text-gray-300 leading-relaxed whitespace-pre-wrap">{{ $contact->deskripsi }}</div>
                                    </div>
                                </div>

                                <div class="mt-8 flex justify-end">
                                    <button onclick="document.getElementById('modal-{{ $contact->id }}').classList.add('hidden')" class="px-6 py-2 border border-cyan-500 text-cyan-400 hover:bg-cyan-500/20 rounded font-mono font-bold tracking-widest transition-all">
                                        CLOSE WINDOW
                                    </button>
                                </div>
                            </div>
                        </div>

                    @empty
                        <tr>
                            <td colspan="5" class="py-12 text-center text-gray-500 font-mono tracking-widest">
                                <div class="flex flex-col items-center justify-center opacity-50">
                                    <i class="fa-solid fa-satellite text-4xl mb-3 text-cyan-900 animate-pulse"></i>
                                    { NO INCOMING SIGNALS DETECTED }
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
