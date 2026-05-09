@extends('layouts.app')

@section('header')
    <div class="flex items-center gap-3">
        <i class="fa-solid fa-pen-to-square text-pink-400 text-2xl animate-pulse"></i>
        <h2 class="font-bold text-2xl text-transparent bg-clip-text bg-gradient-to-r from-pink-400 to-purple-500 tracking-widest uppercase" style="font-family: 'Courier New', Courier, monospace;">
            Override Project: <span class="text-gray-300">[{{ $project->title }}]</span>
        </h2>
    </div>
@endsection

@section('content')
<style>
    .cyber-bg {
        background: rgba(15, 23, 42, 0.85);
        backdrop-filter: blur(15px);
        box-shadow: 0 0 30px rgba(236, 72, 153, 0.15), inset 0 0 20px rgba(124, 58, 237, 0.1);
        border-radius: 4px;
        position: relative;
    }
    
    .cyber-bg::before {
        content: '';
        position: absolute;
        top: 0; left: 0; right: 0; height: 2px;
        background: linear-gradient(90deg, transparent, #ec4899, transparent);
    }

    .cyber-input {
        border: 1px solid rgba(236, 72, 153, 0.3);
        border-left: 4px solid #ec4899;
        box-shadow: inset 0 0 10px rgba(0,0,0,0.5);
    }

    .cyber-input:focus {
        border-color: #22d3ee;
        border-left-color: #22d3ee;
        box-shadow: 0 0 15px rgba(34, 211, 238, 0.2), inset 0 0 10px rgba(34, 211, 238, 0.1);
    }

    .cyber-button {
        background: linear-gradient(45deg, #ec4899, #8b5cf6);
        border: none;
        clip-path: polygon(10% 0, 100% 0, 100% 70%, 90% 100%, 0 100%, 0 30%);
    }

    .cyber-button:hover {
        background: linear-gradient(45deg, #8b5cf6, #ec4899);
        box-shadow: 0 0 20px rgba(236, 72, 153, 0.6);
    }
</style>

@section('content')
<div class="py-10">
    <div class="max-w-md mx-auto px-4 sm:px-6 lg:px-8" x-data="{ show: false }" x-init="setTimeout(() => show = true, 100)">

        <div
            x-show="show"
            x-transition:enter="transition ease-out duration-700"
            x-transition:enter-start="opacity-0 -translate-y-6"
            x-transition:enter-end="opacity-100 translate-y-0"
        >
            <div class="cyber-bg p-8 transform transition duration-300 border border-gray-700">

                @if($errors->any())
                    <div class="mb-6 p-4 bg-red-900 border border-red-500 rounded-lg animate-pulse text-xs relative overflow-hidden">
                        <div class="absolute inset-0 bg-red-500/20 z-0"></div>
                        <ul class="list-disc pl-5 text-red-200 relative z-10 font-mono tracking-wide">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('projects.update', $project->id) }}" method="POST" enctype="multipart/form-data" class="space-y-8">
                    @csrf
                    @method('PUT') 
                    <div>
                        <label class="block text-sm font-bold text-pink-400 mb-2 uppercase tracking-wide font-mono"><i class="fa-solid fa-terminal mr-2"></i>Project Title</label>
                        <input
                            type="text"
                            name="title"
                            value="{{ old('title', $project->title) }}"
                            placeholder="Enter project designation"
                            class="cyber-input w-full px-4 py-3 bg-gray-900 text-pink-300 placeholder-gray-600 focus:outline-none transition duration-300 font-mono text-sm"
                            required
                        >
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-pink-400 mb-2 uppercase tracking-wide font-mono"><i class="fa-solid fa-image mr-2"></i>Project Image (Optional)</label>
                        @if($project->image)
                            <div class="mb-4">
                                <img src="{{ asset('storage/' . $project->image) }}" alt="Current Project Image" class="h-32 object-cover rounded-lg border border-pink-500 shadow-[0_0_15px_rgba(236,72,153,0.3)]">
                            </div>
                        @endif
                        <input
                            type="file"
                            name="image"
                            accept="image/*"
                            class="cyber-input w-full px-4 py-3 bg-gray-900 text-pink-300 placeholder-gray-600 focus:outline-none transition duration-300 font-mono text-sm file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-pink-900 file:text-pink-300 hover:file:bg-pink-800"
                        >
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-pink-400 mb-2 uppercase tracking-wide font-mono"><i class="fa-solid fa-link mr-2"></i>Project URL</label>
                        <input
                            type="text"
                            name="url"
                            value="{{ old('url', $project->url) }}"
                            placeholder="Enter project URL (optional)"
                            class="cyber-input w-full px-4 py-3 bg-gray-900 text-pink-300 placeholder-gray-600 focus:outline-none transition duration-300 font-mono text-sm"
                        >
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-cyan-400 mb-2 uppercase tracking-wide font-mono"><i class="fa-solid fa-align-left mr-2"></i>Description Payload</label>
                        <textarea
                            name="description"
                            placeholder="Inject project parameters here..."
                            rows="5"
                            class="cyber-input w-full px-4 py-3 bg-gray-900 text-cyan-300 placeholder-gray-600 focus:outline-none transition duration-300 resize-none font-mono text-sm"
                        >{{ old('description', $project->description) }}</textarea>
                    </div>

                    <div class="flex justify-between items-center pt-6 border-t border-gray-700">
                        <a href="{{ route('dashboard') }}"
                           class="px-5 py-2.5 border border-gray-600 text-gray-400 hover:bg-gray-800 hover:text-white transition duration-300 text-sm font-bold font-mono tracking-widest uppercase">
                            <i class="fa-solid fa-xmark mr-1"></i> ABORT
                        </a>

                        <button
                            type="submit"
                            class="cyber-button px-8 py-3 text-white font-bold transition duration-300 text-sm uppercase tracking-widest flex items-center gap-2"
                        >
                            <i class="fa-solid fa-bolt"></i> FORCE UPDATE
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection