@extends('layouts.counselor')

@section('title', 'My Sessions - Counselor')

@section('content')
<div class="mb-6">
    <h2 class="text-2xl font-bold text-gray-900 dark:text-white">Counseling Sessions</h2>
    <p class="text-gray-500 dark:text-gray-400">Manage your counseling sessions</p>
</div>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-6">
    <div class="bg-blue-50 dark:bg-blue-900/30 rounded-xl p-6 border border-blue-200 dark:border-blue-800">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-blue-600 dark:text-blue-400 text-sm font-medium">Pending Requests</p>
                <p class="text-3xl font-bold text-blue-900 dark:text-blue-100">0</p>
            </div>
            <span class="material-symbols-outlined text-blue-500 text-3xl">pending</span>
        </div>
    </div>

    <div class="bg-green-50 dark:bg-green-900/30 rounded-xl p-6 border border-green-200 dark:border-green-800">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-green-600 dark:text-green-400 text-sm font-medium">Active Sessions</p>
                <p class="text-3xl font-bold text-green-900 dark:text-green-100">0</p>
            </div>
            <span class="material-symbols-outlined text-green-500 text-3xl">psychology</span>
        </div>
    </div>

    <div class="bg-purple-50 dark:bg-purple-900/30 rounded-xl p-6 border border-purple-200 dark:border-purple-800">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-purple-600 dark:text-purple-400 text-sm font-medium">Completed</p>
                <p class="text-3xl font-bold text-purple-900 dark:text-purple-100">0</p>
            </div>
            <span class="material-symbols-outlined text-purple-500 text-3xl">check_circle</span>
        </div>
    </div>
</div>

<div class="bg-white dark:bg-gray-800 rounded-xl border border-gray-200 dark:border-gray-700 overflow-hidden">
    <div class="p-6 border-b border-gray-200 dark:border-gray-700">
        <div class="flex gap-4">
            <button class="px-4 py-2 bg-primary text-white rounded-lg text-sm">All Sessions</button>
            <button class="px-4 py-2 bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300 rounded-lg text-sm">Pending</button>
            <button class="px-4 py-2 bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300 rounded-lg text-sm">Active</button>
            <button class="px-4 py-2 bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300 rounded-lg text-sm">Completed</button>
        </div>
    </div>

    <table class="w-full text-sm">
        <thead class="bg-gray-50 dark:bg-gray-700">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 dark:text-gray-300 uppercase">Student</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 dark:text-gray-300 uppercase">Type</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 dark:text-gray-300 uppercase">Priority</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 dark:text-gray-300 uppercase">Status</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 dark:text-gray-300 uppercase">Date</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 dark:text-gray-300 uppercase">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
            <tr>
                <td colspan="6" class="px-6 py-8 text-center text-gray-500">No sessions found</td>
            </tr>
        </tbody>
    </table>
</div>
@endsection
