@extends('layouts.dashboard')

@section('title', 'Dashboard')
@section('header', 'Dashboard')

@section('content')

<div class="bg-white dark:bg-gray-800 shadow-md rounded-xl mb-6 p-6 text-gray-900 dark:text-gray-100">
    Welcome back, <span class="font-semibold">{{ auth()->user()->name }}</span>
</div>

<div class="bg-white dark:bg-gray-800 shadow-md rounded-xl p-6 text-gray-900 dark:text-gray-100">

    <div class="flex justify-between items-center mb-6">
        <h3 class="text-lg font-semibold">Project Management</h3>
        <a href="{{ route('projects.create') }}" 
           class="px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition">
           Add Project
        </a>
    </div>

    <!-- Table Wrapper -->
    <div class="overflow-x-auto -mx-6 px-6">
        <table class="w-full border-collapse border border-gray-300 dark:border-gray-700 min-w-[700px]">
            <thead class="bg-gray-100 dark:bg-gray-900">
                <tr>
                    <th class="py-3 px-4 border border-gray-300 dark:border-gray-700 text-left">#</th>
                    <th class="py-3 px-4 border border-gray-300 dark:border-gray-700 text-left">Title</th>
                    <th class="py-3 px-4 border border-gray-300 dark:border-gray-700 text-left">Description</th>
                    <th class="py-3 px-4 border border-gray-300 dark:border-gray-700 text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($projects as $project)
                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                        <td class="py-3 px-4 border border-gray-300 dark:border-gray-700">{{ $loop->iteration }}</td>
                        <td class="py-3 px-4 border border-gray-300 dark:border-gray-700 font-medium text-gray-800 dark:text-gray-200">{{ $project->title }}</td>
                        <td class="py-3 px-4 border border-gray-300 dark:border-gray-700 text-gray-700 dark:text-gray-300">{{ $project->description }}</td>
                        <td class="py-3 px-4 border border-gray-300 dark:border-gray-700 text-center flex justify-center space-x-2">
                            <a href="{{ route('projects.edit', $project->id) }}" 
                               class="px-3 py-1 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition">
                               Edit
                            </a>
                            <form action="{{ route('projects.destroy', $project->id) }}" method="POST" onsubmit="return confirm('Yakin mau hapus project ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="px-3 py-1 bg-red-500 text-white rounded-lg hover:bg-red-600 transition">
                                    Delete
                                </button>
                            </form>
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

@endsection
