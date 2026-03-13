@extends('layouts.dashboard')

@section('title', 'Admin Profile Area')
@section('header')
<div class="flex items-center gap-3">
    <i class="fa-solid fa-user-shield text-cyan-400 text-3xl animate-pulse"></i>
    <span style="font-family: 'Courier New', Courier, monospace;" class="bg-clip-text text-transparent bg-gradient-to-r from-pink-400 to-cyan-400 tracking-widest uppercase shadow-cyan">
        SysAdmin Override
    </span>
</div>
@endsection

@section('content')

<style>
    /* CYBERPUNK PROFILE THEME */
    .cyber-card {
        background: rgba(15, 23, 42, 0.75);
        backdrop-filter: blur(15px);
        border: 1px solid rgba(34, 211, 238, 0.2);
        box-shadow: 0 0 20px rgba(34, 211, 238, 0.05), inset 0 0 15px rgba(236, 72, 153, 0.05);
        border-radius: 8px;
        position: relative;
        overflow: hidden;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .cyber-card::before {
        content: '';
        position: absolute;
        top: 0; left: 0; right: 0; height: 3px;
        background: linear-gradient(90deg, #ec4899, #8b5cf6, #22d3ee);
    }

    .cyber-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 30px rgba(34, 211, 238, 0.15), inset 0 0 20px rgba(236, 72, 153, 0.1);
        border-color: rgba(34, 211, 238, 0.5);
    }

    .cyber-entrance {
        animation: profileEntrance 0.8s cubic-bezier(0.16, 1, 0.3, 1) forwards;
        opacity: 0;
        transform: translateY(30px);
    }

    .delay-100 { animation-delay: 100ms; }
    .delay-200 { animation-delay: 200ms; }

    @keyframes profileEntrance {
        from { opacity: 0; transform: translateY(40px) scale(0.98); filter: blur(5px); }
        to { opacity: 1; transform: translateY(0) scale(1); filter: blur(0); }
    }
</style>

<div class="max-w-5xl mx-auto space-y-8 pb-10">
    <div class="flex items-center justify-between cyber-entrance">
        <div></div> <!-- Spacer -->
        <a href="{{ route('dashboard') }}" class="group relative inline-flex items-center justify-center px-6 py-2.5 font-mono text-sm font-bold tracking-widest text-white transition-all duration-300 ease-in-out border border-cyan-500 rounded-lg bg-gray-900 border-solid hover:bg-cyan-900 hover:text-cyan-300 shadow-[0_0_15px_rgba(34,211,238,0.2)] hover:shadow-[0_0_25px_rgba(34,211,238,0.5)] overflow-hidden">
            <span class="absolute inset-0 w-full h-full -mt-1 rounded-lg opacity-30 bg-gradient-to-b from-transparent via-transparent to-cyan-500"></span>
            <span class="relative flex items-center gap-2">
                <i class="fa-solid fa-arrow-left group-hover:-translate-x-1 transition-transform"></i>
                RETURN TO MATRIX
            </span>
        </a>
    </div>

    <div class="cyber-card p-8 cyber-entrance">
        @include('profile.partials.update-profile-information-form')
    </div>

    <div class="cyber-card p-8 cyber-entrance delay-100">
        @include('profile.partials.update-password-form')
    </div>

    <div class="cyber-card p-8 cyber-entrance delay-200 border-red-500/30 hover:border-red-400">
        @include('profile.partials.delete-user-form')
    </div>
</div>
@endsection