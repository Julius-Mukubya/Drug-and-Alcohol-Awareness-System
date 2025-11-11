@extends('layouts.counselor')

@section('title', 'Counselor Dashboard - MUBS Awareness')

@section('content')
<!-- Welcome Section -->
<div class="flex flex-wrap justify-between items-center gap-3 mb-8">
    <div class="flex flex-col gap-1">
        <p class="text-gray-900 dark:text-white text-3xl font-bold tracking-tight">Welcome, {{ auth()->user()->name }}!</p>
        <p class="text-gray-500 dark:text-gray-400 text-base font-normal leading-normal">Here's an overview of your counseling activities and pending sessions.</p>
    </div>
</div>

<!-- Performance Overview -->
<div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
    <!-- Main Stats -->
    <div class="lg:col-span-2 bg-gradient-to-r from-green-500 to-teal-600 rounded-xl p-6 text-white">
        <div class="flex items-center justify-between mb-4">
            <div>
                <h3 class="text-lg font-semibold">Counseling Performance</h3>
                <p class="text-green-100 text-sm">{{ $data['success_rate'] }}% success rate • {{ $data['unique_students_helped'] }} students helped</p>
            </div>
            <div class="bg-white/20 rounded-lg p-3">
                <span class="material-symbols-outlined text-2xl">psychology</span>
            </div>
        </div>
        <div class="grid grid-cols-4 gap-4">
            <div class="text-center">
                <p class="text-2xl font-bold">{{ $data['total_sessions'] }}</p>
                <p class="text-green-100 text-sm">Total</p>
            </div>
            <div class="text-center">
                <p class="text-2xl font-bold">{{ $data['active_sessions'] }}</p>
                <p class="text-green-100 text-sm">Active</p>
            </div>
            <div class="text-center">
                <p class="text-2xl font-bold">{{ $data['this_month_completed'] }}</p>
                <p class="text-green-100 text-sm">This Month</p>
            </div>
            <div class="text-center">
                <p class="text-2xl font-bold">{{ round($data['student_satisfaction'], 1) }}</p>
                <p class="text-green-100 text-sm">Rating</p>
            </div>
        </div>
    </div>

    <!-- Quick Metrics -->
    <div class="space-y-4">
        <div class="bg-white dark:bg-gray-800 rounded-xl p-4 border border-gray-200 dark:border-gray-700">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-600 dark:text-gray-400 text-sm">Response Time</p>
                    <p class="text-2xl font-bold text-gray-900 dark:text-white">{{ $data['response_time'] }}h</p>
                </div>
                <span class="material-symbols-outlined text-blue-500 text-2xl">schedule</span>
            </div>
        </div>

        <div class="bg-white dark:bg-gray-800 rounded-xl p-4 border border-gray-200 dark:border-gray-700">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-600 dark:text-gray-400 text-sm">This Week</p>
                    <p class="text-2xl font-bold text-gray-900 dark:text-white">{{ $data['this_week_sessions'] }}</p>
                </div>
                <span class="material-symbols-outlined text-green-500 text-2xl">trending_up</span>
            </div>
        </div>

        <div class="bg-white dark:bg-gray-800 rounded-xl p-4 border border-gray-200 dark:border-gray-700">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-600 dark:text-gray-400 text-sm">Unread Messages</p>
                    <p class="text-2xl font-bold text-gray-900 dark:text-white">{{ $data['unread_messages'] }}</p>
                </div>
                <span class="material-symbols-outlined text-orange-500 text-2xl">mail</span>
            </div>
        </div>
    </div>
</div>

<!-- Session Distribution -->
<div class="grid grid-cols-2 sm:grid-cols-4 gap-4 mb-8">
    <div class="bg-white dark:bg-gray-800 rounded-lg p-4 border border-gray-200 dark:border-gray-700 text-center">
        <span class="material-symbols-outlined text-yellow-500 text-2xl mb-2">priority_high</span>
        <p class="text-xl font-bold text-gray-900 dark:text-white">{{ $data['sessions_by_priority']['urgent'] }}</p>
        <p class="text-xs text-gray-600 dark:text-gray-400">Urgent</p>
    </div>

    <div class="bg-white dark:bg-gray-800 rounded-lg p-4 border border-gray-200 dark:border-gray-700 text-center">
        <span class="material-symbols-outlined text-orange-500 text-2xl mb-2">warning</span>
        <p class="text-xl font-bold text-gray-900 dark:text-white">{{ $data['sessions_by_priority']['high'] }}</p>
        <p class="text-xs text-gray-600 dark:text-gray-400">High Priority</p>
    </div>

    <div class="bg-white dark:bg-gray-800 rounded-lg p-4 border border-gray-200 dark:border-gray-700 text-center">
        <span class="material-symbols-outlined text-blue-500 text-2xl mb-2">info</span>
        <p class="text-xl font-bold text-gray-900 dark:text-white">{{ $data['sessions_by_priority']['medium'] }}</p>
        <p class="text-xs text-gray-600 dark:text-gray-400">Medium</p>
    </div>

    <div class="bg-white dark:bg-gray-800 rounded-lg p-4 border border-gray-200 dark:border-gray-700 text-center">
        <span class="material-symbols-outlined text-green-500 text-2xl mb-2">check_circle</span>
        <p class="text-xl font-bold text-gray-900 dark:text-white">{{ $data['sessions_by_priority']['low'] }}</p>
        <p class="text-xs text-gray-600 dark:text-gray-400">Low Priority</p>
    </div>
</div>

<!-- Main Content -->
<div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
    <!-- Pending Sessions -->
    <div class="bg-white dark:bg-gray-800 rounded-xl border border-gray-200 dark:border-gray-700 p-6">
        <div class="flex justify-between items-center mb-4">
            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Pending Session Requests</h3>
            <a href="{{ route('counselor.sessions.index') }}" class="text-sm font-medium text-primary hover:underline">View All</a>
        </div>
        <div class="space-y-4">
            @forelse($data['my_pending'] as $session)
            <div class="border border-gray-200 dark:border-gray-700 rounded-lg p-4">
                <div class="flex justify-between items-start mb-2">
                    <h4 class="text-sm font-medium text-gray-900 dark:text-white">{{ $session->subject }}</h4>
                    <span class="px-2 py-1 text-xs font-medium text-yellow-800 bg-yellow-100 rounded-full dark:bg-yellow-900 dark:text-yellow-300">
                        {{ ucfirst($session->priority) }}
                    </span>
                </div>
                <p class="text-sm text-gray-600 dark:text-gray-400 mb-3">{{ Str::limit($session->description, 100) }}</p>
                <div class="flex justify-between items-center">
                    <span class="text-xs text-gray-500 dark:text-gray-400">{{ $session->created_at->diffForHumans() }}</span>
                    <div class="flex space-x-2">
                        <a href="{{ route('counselor.sessions.show', $session) }}" class="text-xs bg-blue-600 text-white px-3 py-1 rounded hover:bg-blue-700">
                            View
                        </a>
                        <form action="{{ route('counselor.sessions.accept', $session) }}" method="POST" class="inline">
                            @csrf
                            <button type="submit" class="text-xs bg-green-600 text-white px-3 py-1 rounded hover:bg-green-700">
                                Accept
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            @empty
            <div class="text-center py-8">
                <span class="material-symbols-outlined text-4xl text-gray-400 mb-2">check_circle</span>
                <p class="text-gray-500 dark:text-gray-400">No pending session requests</p>
            </div>
            @endforelse
        </div>
    </div>

    <!-- Active Sessions -->
    <div class="bg-white dark:bg-gray-800 rounded-xl border border-gray-200 dark:border-gray-700 p-6">
        <div class="flex justify-between items-center mb-4">
            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Active Sessions</h3>
            <span class="text-sm text-gray-500 dark:text-gray-400">{{ count($data['my_active']) }} active</span>
        </div>
        <div class="space-y-4">
            @forelse($data['my_active'] as $session)
            <div class="border border-gray-200 dark:border-gray-700 rounded-lg p-4">
                <div class="flex justify-between items-start mb-2">
                    <h4 class="text-sm font-medium text-gray-900 dark:text-white">{{ $session->subject }}</h4>
                    <span class="px-2 py-1 text-xs font-medium text-blue-800 bg-blue-100 rounded-full dark:bg-blue-900 dark:text-blue-300">
                        Active
                    </span>
                </div>
                <p class="text-sm text-gray-600 dark:text-gray-400 mb-2">
                    Student: {{ $session->student->name }}
                </p>
                <div class="flex justify-between items-center">
                    <span class="text-xs text-gray-500 dark:text-gray-400">Started {{ $session->updated_at->diffForHumans() }}</span>
                    <div class="flex space-x-2">
                        <a href="{{ route('counselor.sessions.show', $session) }}" class="text-xs bg-primary text-white px-3 py-1 rounded hover:opacity-90">
                            Continue
                        </a>
                        <form action="{{ route('counselor.sessions.complete', $session) }}" method="POST" class="inline">
                            @csrf
                            <button type="submit" class="text-xs bg-green-600 text-white px-3 py-1 rounded hover:bg-green-700">
                                Complete
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            @empty
            <div class="text-center py-8">
                <span class="material-symbols-outlined text-4xl text-gray-400 mb-2">support_agent</span>
                <p class="text-gray-500 dark:text-gray-400">No active sessions</p>
            </div>
            @endforelse
        </div>
    </div>
</div>

<!-- Quick Actions -->
<div class="mt-8 bg-white dark:bg-gray-800 rounded-xl border border-gray-200 dark:border-gray-700 p-6">
    <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Quick Actions</h3>
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
        <a href="{{ route('counselor.sessions.index') }}" class="flex items-center justify-center p-4 bg-primary/10 text-primary rounded-lg hover:bg-primary/20 transition-colors">
            <span class="material-symbols-outlined mr-2">list</span>
            View All Sessions
        </a>
        <a href="{{ route('content.index') }}" class="flex items-center justify-center p-4 bg-blue-50 text-blue-600 rounded-lg hover:bg-blue-100 transition-colors dark:bg-blue-900/30 dark:text-blue-400 dark:hover:bg-blue-900/50">
            <span class="material-symbols-outlined mr-2">library_books</span>
            Browse Resources
        </a>
        <a href="{{ route('profile.show') }}" class="flex items-center justify-center p-4 bg-gray-50 text-gray-600 rounded-lg hover:bg-gray-100 transition-colors dark:bg-gray-700 dark:text-gray-400 dark:hover:bg-gray-600">
            <span class="material-symbols-outlined mr-2">person</span>
            Update Profile
        </a>
    </div>
</div>
@endsection