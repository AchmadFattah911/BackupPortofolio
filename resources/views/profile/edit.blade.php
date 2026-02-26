@extends('layouts.app')

@section('header')
Profile
@endsection

@section('content')
<div class="max-w-5xl mx-auto space-y-6">
    <div class="p-6 bg-white dark:bg-gray-800 shadow rounded-lg">
        @include('profile.partials.update-profile-information-form')
    </div>

    <div class="p-6 bg-white dark:bg-gray-800 shadow rounded-lg">
        @include('profile.partials.update-password-form')
    </div>

    <div class="p-6 bg-white dark:bg-gray-800 shadow rounded-lg">
        @include('profile.partials.delete-user-form')
    </div>
</div>
@endsection