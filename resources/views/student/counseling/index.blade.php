@extends('layouts.student')

@section('title', 'Counseling - Student')

@section('content')
<div class="flex justify-between items-center mb-6">
    <div>
        <h2 class="text-2xl font-bold text-gray-900 dark:text-white">Counseling Sessions</h2>
        <p class="text-gray-500 dark:text-gray-400">Request and manage counseling sessions</p>
    </div>
    <a href="{{ route('student.counseling.create') }}" class="bg-primary text-white px-4 py-2 rounded-lg flex items-center gap-2 hover:opacity-90">
        <span class="material-symbols-outlined text-sm">add</span>
        Request Session
    </a>
</div>

<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
    <div class="bg-blue-50 dark:bg-blue-900/30 rounded-xl p-6 border border-blue-200 dark:border-blue-800">
        <p class="text-blue-600 dark:text-blue-400 text-sm font-medium mb-1">Pending</p>
        <p class="text-3xl font-bold text-blue-900 dark:text-blue-100">0</p>
    </div>

    <div class="bg-green-50 dark:bg-green-900/30 rounded-xl p-6 border border-green-200 dark:border-green-800">
        <p class="text-green-600 dark:text-green-400 text-sm font-medium mb-1">Active</p>
        <p class="text-3xl font-bold text-green-900 dark:text-green-100">0</p>
    </div>

    <div class="bg-purple-50 dark:bg-purple-900/30 rounded-xl p-6 border border-purple-200 dark:border-purple-800">
        <p class="text-purple-600 dark:text-purple-400 text-sm font-medium mb-1">Completed</p>
        <p class="text-3xl font-bold text-purple-900 dark:text-purple-100">0</p>
    </div>
</div>

<div class="bg-white dark:bg-gray-800 rounded-xl border border-gray-200 dark:border-gray-700 p-6 text-center">
    <span class="material-symbols-outlined text-4xl text-gray-400 mb-4">psychology</span>
    <p class="text-gray-500 dark:text-gray-400 mb-4">You haven't requested any counseling sessions yet</p>
    <a href="{{ route('student.counseling.create') }}" class="inline-block bg-primary text-white px-6 py-2 rounded-lg hover:opacity-90">Request Your First Session</a>
</div>
@endsection
