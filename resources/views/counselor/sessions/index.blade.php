@extends('layouts.admin')

@section('title', 'Counseling Sessions')

@section('content')
<!-- Header -->
<div class="mb-6">
    <h1 class="text-3xl font-bold text-gray-900 dark:text-white">Counseling Sessions</h1>
    <p class="text-gray-500 dark:text-gray-400 mt-1">Manage and respond to counseling requests</p>
</div>

<!-- Statistics Cards -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
    <!-- Pending Sessions -->
    <div class="bg-gradient-to-br from-yellow-500 to-orange-600 rounded-2xl p-6 text-white shadow-lg shadow-yellow-500/30">
        <div class="flex items-center justify-between mb-4">
            <div class="w-12 h-12 bg-white/20 rounded-xl flex items-center justify-center">
                <span class="material-symbols-outlined text-2xl">pending</span>
            </div>
            <span class="text-yellow-100 text-sm font-medium">Awaiting Response</span>
        </div>
        <h3 class="text-3xl font-bold mb-1">{{ $pendingSessions->count() }}</h3>
        <p class="text-yellow-100 text-sm">Pending Requests</p>
    </div>

    <!-- Active Sessions -->
    <div class="bg-gradient-to-br from-emerald-500 to-teal-600 rounded-2xl p-6 text-white shadow-lg shadow-emerald-500/30">
        <div class="flex items-center justify-between mb-4">
            <div class="w-12 h-12 bg-white/20 rounded-xl flex items-center justify-center">
                <span class="material-symbols-outlined text-2xl">psychology</span>
            </div>
            <span class="text-emerald-100 text-sm font-medium">In Progress</span>
        </div>
        <h3 class="text-3xl font-bold mb-1">{{ $activeSessions->count() }}</h3>
        <p class="text-emerald-100 text-sm">Active Sessions</p>
    </div>

    <!-- Completed Sessions -->
    <div class="bg-gradient-to-br from-blue-500 to-indigo-600 rounded-2xl p-6 text-white shadow-lg shadow-blue-500/30">
        <div class="flex items-center justify-between mb-4">
            <div class="w-12 h-12 bg-white/20 rounded-xl flex items-center justify-center">
                <span class="material-symbols-outlined text-2xl">check_circle</span>
            </div>
            <span class="text-blue-100 text-sm font-medium">Finished</span>
        </div>
        <h3 class="text-3xl font-bold mb-1">{{ $completedSessions->total() }}</h3>
        <p class="text-blue-100 text-sm">Completed Sessions</p>
    </div>
</div>

<!-- Pending Sessions -->
@if($pendingSessions->count() > 0)
<div class="mb-6">
    <h2 class="text-xl font-bold text-gray-900 dark:text-white mb-4 flex items-center gap-2">
        <span class="material-symbols-outlined text-yellow-600">pending_actions</span>
        Pending Requests
    </h2>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        @foreach($pendingSessions as $session)
        <div class="bg-gradient-to-br from-white to-yellow-50/30 dark:from-gray-800 dark:to-yellow-950/20 rounded-2xl border border-yellow-100 dark:border-yellow-900/30 p-6 shadow-lg shadow-yellow-500/5 hover:shadow-xl transition-all">
            <div class="flex items-start justify-between mb-4">
                <div class="flex items-center gap-3">
                    <div class="w-12 h-12 rounded-full bg-gradient-to-br from-yellow-500 to-orange-600 flex items-center justify-center text-white font-bold text-lg shadow-lg">
                        {{ substr($session->student->name, 0, 1) }}
                    </div>
                    <div>
                        <h3 class="font-semibold text-gray-900 dark:text-white">{{ $session->student->name }}</h3>
                        <p class="text-sm text-gray-500 dark:text-gray-400">{{ $session->student->email }}</p>
                    </div>
                </div>
                <span class="px-3 py-1 bg-yellow-100 dark:bg-yellow-900/30 text-yellow-700 dark:text-yellow-300 text-xs font-semibold rounded-full">
                    {{ ucfirst($session->priority) }}
                </span>
            </div>

            <div class="mb-4">
                <p class="text-sm text-gray-600 dark:text-gray-400 mb-2">
                    <span class="font-semibold">Type:</span> {{ ucfirst(str_replace('_', ' ', $session->session_type)) }}
                </p>
                <p class="text-sm text-gray-700 dark:text-gray-300 line-clamp-2">{{ $session->reason }}</p>
            </div>

            <div class="flex items-center justify-between pt-4 border-t border-gray-200 dark:border-gray-700">
                <span class="text-xs text-gray-500 dark:text-gray-400 flex items-center gap-1">
                    <span class="material-symbols-outlined text-sm">schedule</span>
                    {{ $session->created_at->diffForHumans() }}
                </span>
                <form action="{{ route('counselor.sessions.accept', $session) }}" method="POST">
                    @csrf
                    <button type="submit" class="bg-gradient-to-r from-emerald-500 to-teal-600 text-white px-4 py-2 rounded-lg hover:shadow-lg hover:shadow-emerald-500/30 font-medium text-sm transition-all flex items-center gap-2">
                        <span class="material-symbols-outlined text-sm">check</span>
                        Accept Session
                    </button>
                </form>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endif

<!-- Active Sessions -->
@if($activeSessions->count() > 0)
<div class="mb-6">
    <h2 class="text-xl font-bold text-gray-900 dark:text-white mb-4 flex items-center gap-2">
        <span class="material-symbols-outlined text-emerald-600">support_agent</span>
        Active Sessions
    </h2>
    <div class="bg-gradient-to-br from-white to-emerald-50/30 dark:from-gray-800 dark:to-emerald-950/20 rounded-2xl border border-emerald-100 dark:border-emerald-900/30 shadow-lg shadow-emerald-500/5 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-emerald-50 dark:bg-emerald-900/20 border-b border-emerald-100 dark:border-emerald-900/30">
                    <tr>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-700 dark:text-gray-300 uppercase tracking-wider">Student</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-700 dark:text-gray-300 uppercase tracking-wider">Type</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-700 dark:text-gray-300 uppercase tracking-wider">Priority</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-700 dark:text-gray-300 uppercase tracking-wider">Started</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-700 dark:text-gray-300 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                    @foreach($activeSessions as $session)
                    <tr class="hover:bg-emerald-50/50 dark:hover:bg-emerald-900/10 transition-colors">
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-full bg-gradient-to-br from-emerald-500 to-teal-600 flex items-center justify-center text-white font-bold shadow-lg">
                                    {{ substr($session->student->name, 0, 1) }}
                                </div>
                                <div>
                                    <p class="font-semibold text-gray-900 dark:text-white">{{ $session->student->name }}</p>
                                    <p class="text-xs text-gray-500 dark:text-gray-400">{{ $session->student->email }}</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <span class="text-sm text-gray-700 dark:text-gray-300">{{ ucfirst(str_replace('_', ' ', $session->session_type)) }}</span>
                        </td>
                        <td class="px-6 py-4">
                            <span class="px-3 py-1 bg-{{ $session->priority === 'high' ? 'red' : ($session->priority === 'medium' ? 'yellow' : 'green') }}-100 dark:bg-{{ $session->priority === 'high' ? 'red' : ($session->priority === 'medium' ? 'yellow' : 'green') }}-900/30 text-{{ $session->priority === 'high' ? 'red' : ($session->priority === 'medium' ? 'yellow' : 'green') }}-700 dark:text-{{ $session->priority === 'high' ? 'red' : ($session->priority === 'medium' ? 'yellow' : 'green') }}-300 text-xs font-semibold rounded-full">
                                {{ ucfirst($session->priority) }}
                            </span>
                        </td>
                        <td class="px-6 py-4">
                            <span class="text-sm text-gray-600 dark:text-gray-400">{{ $session->started_at->diffForHumans() }}</span>
                        </td>
                        <td class="px-6 py-4">
                            <a href="{{ route('counselor.sessions.show', $session) }}" class="inline-flex items-center gap-2 bg-primary text-white px-4 py-2 rounded-lg hover:opacity-90 font-medium text-sm transition-all">
                                <span class="material-symbols-outlined text-sm">visibility</span>
                                View Session
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endif

<!-- Completed Sessions -->
@if($completedSessions->count() > 0)
<div class="mb-6">
    <h2 class="text-xl font-bold text-gray-900 dark:text-white mb-4 flex items-center gap-2">
        <span class="material-symbols-outlined text-blue-600">history</span>
        Completed Sessions
    </h2>
    <div class="bg-gradient-to-br from-white to-blue-50/30 dark:from-gray-800 dark:to-blue-950/20 rounded-2xl border border-blue-100 dark:border-blue-900/30 shadow-lg shadow-blue-500/5 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-blue-50 dark:bg-blue-900/20 border-b border-blue-100 dark:border-blue-900/30">
                    <tr>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-700 dark:text-gray-300 uppercase tracking-wider">Student</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-700 dark:text-gray-300 uppercase tracking-wider">Type</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-700 dark:text-gray-300 uppercase tracking-wider">Completed</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-700 dark:text-gray-300 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                    @foreach($completedSessions as $session)
                    <tr class="hover:bg-blue-50/50 dark:hover:bg-blue-900/10 transition-colors">
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-full bg-gradient-to-br from-blue-500 to-indigo-600 flex items-center justify-center text-white font-bold shadow-lg">
                                    {{ substr($session->student->name, 0, 1) }}
                                </div>
                                <div>
                                    <p class="font-semibold text-gray-900 dark:text-white">{{ $session->student->name }}</p>
                                    <p class="text-xs text-gray-500 dark:text-gray-400">{{ $session->student->email }}</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <span class="text-sm text-gray-700 dark:text-gray-300">{{ ucfirst(str_replace('_', ' ', $session->session_type)) }}</span>
                        </td>
                        <td class="px-6 py-4">
                            <span class="text-sm text-gray-600 dark:text-gray-400">{{ $session->completed_at->format('M d, Y') }}</span>
                        </td>
                        <td class="px-6 py-4">
                            <a href="{{ route('counselor.sessions.show', $session) }}" class="inline-flex items-center gap-2 text-primary hover:text-primary/80 font-medium text-sm transition-colors">
                                <span class="material-symbols-outlined text-sm">visibility</span>
                                View Details
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        
        <!-- Pagination -->
        @if($completedSessions->hasPages())
        <div class="px-6 py-4 bg-gray-50 dark:bg-gray-900/50 border-t border-gray-200 dark:border-gray-700">
            {{ $completedSessions->links() }}
        </div>
        @endif
    </div>
</div>
@endif

<!-- Empty State -->
@if($pendingSessions->count() === 0 && $activeSessions->count() === 0 && $completedSessions->count() === 0)
<div class="bg-gradient-to-br from-white to-gray-50/30 dark:from-gray-800 dark:to-gray-950/20 rounded-2xl border border-gray-200 dark:border-gray-700 p-12 text-center shadow-lg">
    <div class="w-24 h-24 mx-auto mb-4 rounded-full bg-gradient-to-br from-gray-100 to-gray-200 dark:from-gray-700 dark:to-gray-800 flex items-center justify-center">
        <span class="material-symbols-outlined text-5xl text-gray-400 dark:text-gray-500">support_agent</span>
    </div>
    <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-2">No Sessions Yet</h3>
    <p class="text-gray-500 dark:text-gray-400">You don't have any counseling sessions at the moment. New requests will appear here.</p>
</div>
@endif
@endsection
