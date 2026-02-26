@extends('layouts.app')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        Edit Skill: {{ $skill->name }}
    </h2>
@endsection

@section('content')
<div class="py-10">
    <div class="max-w-md mx-auto px-4 sm:px-6 lg:px-8" x-data="{ show: false }" x-init="setTimeout(() => show = true, 100)">

        <div
            x-show="show"
            x-transition:enter="transition ease-out duration-700"
            x-transition:enter-start="opacity-0 -translate-y-6"
            x-transition:enter-end="opacity-100 translate-y-0"
        >
            <div class="bg-white dark:bg-gray-800 shadow-xl rounded-2xl p-8 transform transition duration-300 hover:scale-105 border border-gray-100 dark:border-gray-700">

                @if($errors->any())
                    <div class="mb-6 p-4 bg-red-50 dark:bg-red-900 border border-red-200 dark:border-red-700 rounded-lg animate-pulse text-xs">
                        <ul class="list-disc pl-5 text-red-700 dark:text-red-300">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('skills.update', $skill->id) }}" method="POST" class="space-y-8">
                    @csrf
                    @method('PUT') 

                    <div>
                        <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2 uppercase tracking-wide">Skill Name</label>
                        <input
                            type="text"
                            name="name"
                            value="{{ old('name', $skill->name) }}"
                            class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-gray-700 bg-gray-50 dark:bg-gray-900 text-gray-900 dark:text-white focus:ring-2 focus:ring-indigo-500 focus:outline-none transition duration-300 shadow-sm"
                            required
                        >
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2 uppercase tracking-wide">Proficiency Level (%)</label>
                        <div class="relative">
                            <input
                                type="number"
                                name="level"
                                min="0"
                                max="100"
                                value="{{ old('level', $skill->level) }}"
                                class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-gray-700 bg-gray-50 dark:bg-gray-900 text-gray-900 dark:text-white focus:ring-2 focus:ring-indigo-500 focus:outline-none transition duration-300 shadow-sm"
                                required
                            >
                            <span class="absolute right-4 top-3 text-indigo-500 font-bold">%</span>
                        </div>
                    </div>

                    <div class="flex justify-between items-center pt-6">
                        <a href="{{ route('skills.index') }}"
                           class="px-5 py-2.5 border border-gray-300 dark:border-gray-600 rounded-xl text-gray-600 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 transition transform hover:scale-105 duration-300 text-sm font-medium">
                            Back
                        </a>

                        <button
                            type="submit"
                            class="px-8 py-3 bg-indigo-600 text-white font-bold rounded-xl shadow-md hover:bg-indigo-700 focus:ring-4 focus:ring-indigo-300 dark:focus:ring-indigo-700 transition transform hover:scale-105 duration-300 text-sm uppercase tracking-widest"
                        >
                            Update Skill
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection