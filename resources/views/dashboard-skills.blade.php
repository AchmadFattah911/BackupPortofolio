@extends('layouts.app')

@section('title', 'CRUD Skills')
@section('header', 'Skills Management')

@section('content')
<div class="p-6 bg-white dark:bg-gray-800 rounded-lg shadow-md">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200">My Skills</h2>
        <a href="{{ route('skills.create') }}" class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-lg transition shadow-md text-sm">
            + Add New Skill
        </a>
    </div>

    @if(session('success'))
    <div class="mb-4 p-3 bg-green-500 text-white rounded-md text-sm">
        {{ session('success') }}
    </div>
    @endif

    <div class="overflow-x-auto border border-gray-200 dark:border-gray-700 rounded-lg">
        <table class="w-full text-left border-collapse">
            <thead class="bg-gray-50 dark:bg-gray-700">
                <tr>
                    <th class="px-4 py-3 text-xs font-bold text-gray-500 dark:text-gray-300 uppercase">#</th>
                    <th class="px-4 py-3 text-xs font-bold text-gray-500 dark:text-gray-300 uppercase">Skill Name</th>
                    <th class="px-4 py-3 text-xs font-bold text-gray-500 dark:text-gray-300 uppercase">Level</th>
                    <th class="px-4 py-3 text-xs font-bold text-gray-500 dark:text-gray-300 uppercase text-center">Action</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                @forelse($skills as $index => $skill)
                <tr class="hover:bg-gray-50 dark:hover:bg-gray-700/50 transition">
                    <td class="px-4 py-4 text-sm text-gray-600 dark:text-gray-400">{{ $index + 1 }}</td>
                    <td class="px-4 py-4 text-sm font-bold text-gray-800 dark:text-white">{{ $skill->name }}</td>
                    <td class="px-4 py-4">
                        <div class="flex items-center gap-3">
                            <div class="flex-1 bg-gray-200 dark:bg-gray-600 rounded-full h-2">
                                <div class="bg-indigo-500 h-2 rounded-full" style="width: {{ $skill->level }}%"></div>
                            </div>
                            <span class="text-xs font-medium text-gray-500 dark:text-gray-400">{{ $skill->level }}%</span>
                        </div>
                    </td>
                    <td class="px-4 py-4">
                        <div class="flex justify-center gap-2">
                            <a href="{{ route('skills.edit', $skill->id) }}" class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded text-xs transition">
                                Edit
                            </a>
                            <form action="{{ route('skills.destroy', $skill->id) }}" method="POST" onsubmit="return confirm('Hapus skill ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded text-xs transition">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="px-4 py-8 text-center text-gray-500 dark:text-gray-400">Data skill masih kosong, Bro.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection