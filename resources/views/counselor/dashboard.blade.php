@extends('layouts.counselor')

@section('title', 'Counselor Dashboard')

@section('content')
<!-- Welcome Header -->
<div class="bg-gradient-to-br from-emerald-500 via-teal-600 to-cyan-700 rounded-3xl p-8 mb-8 text-white relative overflow-hidden">
    <div class="absolute inset-0 bg-black/10"></div>
    <div class="relative z-10">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-6">
            <div class="flex-1">
                <div class="flex items-center gap-4 mb-4">
                    <div class="w-16 h-16 bg-white/20 rounded-2xl flex items-center justify-center backdrop-blur-sm">
                        <span class="material-symbols-outlined text-3xl">support_agent</span>
                    </div>
                    <div>
                        <h1 class="text-3xl font-bold mb-2">Welcome back, {{ auth()->user()->name }}</h1>
                        <p class="text-emerald-100 text-lg">Ready to make a difference today</p>
                    </div>
                </div>
                <p class="text-white/90 max-w-2xl">
                    You have {{ $pendingSessions ?? 0 }} pending session requests and {{ $activeSessions ?? 0 }} active sessions. 
                    Your support makes a real impact on students' lives.
                </p>
            </div>
            <div class="flex flex-col sm:flex-row gap-3">
                <a href="{{ route('counselor.sessions.index') }}" class="bg-white text-emerald-600 px-6 py-3 rounded-xl font-semibold hover:bg-white/90 transition-all flex items-center gap-2 shadow-lg">
                    <span class="material-symbols-outlined">psychology</span>
                    View Sessions
                </a>
                <button onclick="document.getElementById('resourcesModal').classList.remove('hidden')" class="bg-emerald-600 text-white px-6 py-3 rounded-xl font-semibold hover:bg-emerald-700 transition-all flex items-center gap-2 shadow-lg">
                    <span class="material-symbols-outlined">library_books</span>
                    Resources
                </button>
            </div>
        </div>
    </div>
    <div class="absolute -top-10 -right-10 w-40 h-40 bg-white/10 rounded-full blur-3xl"></div>
    <div class="absolute -bottom-10 -left-10 w-32 h-32 bg-white/10 rounded-full blur-2xl"></div>
</div>

<!-- Quick Stats -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
    <div class="bg-gradient-to-br from-amber-500 to-orange-600 rounded-2xl p-6 text-white shadow-lg shadow-amber-500/30 hover:shadow-xl hover:shadow-amber-500/40 transition-all">
        <div class="flex items-center justify-between mb-4">
            <div class="w-12 h-12 bg-white/20 rounded-xl flex items-center justify-center backdrop-blur-sm">
                <span class="material-symbols-outlined text-2xl">pending</span>
            </div>
            <span class="text-amber-100 text-sm font-medium">Needs Attention</span>
        </div>
        <h3 class="text-3xl font-bold mb-1">{{ $pendingSessions ?? 0 }}</h3>
        <p class="text-amber-100 text-sm">Pending Requests</p>
    </div>

    <div class="bg-gradient-to-br from-emerald-500 to-teal-600 rounded-2xl p-6 text-white shadow-lg shadow-emerald-500/30 hover:shadow-xl hover:shadow-emerald-500/40 transition-all">
        <div class="flex items-center justify-between mb-4">
            <div class="w-12 h-12 bg-white/20 rounded-xl flex items-center justify-center backdrop-blur-sm">
                <span class="material-symbols-outlined text-2xl">psychology</span>
            </div>
            <span class="text-emerald-100 text-sm font-medium">In Progress</span>
        </div>
        <h3 class="text-3xl font-bold mb-1">{{ $activeSessions ?? 0 }}</h3>
        <p class="text-emerald-100 text-sm">Active Sessions</p>
    </div>

    <div class="bg-gradient-to-br from-blue-500 to-indigo-600 rounded-2xl p-6 text-white shadow-lg shadow-blue-500/30 hover:shadow-xl hover:shadow-blue-500/40 transition-all">
        <div class="flex items-center justify-between mb-4">
            <div class="w-12 h-12 bg-white/20 rounded-xl flex items-center justify-center backdrop-blur-sm">
                <span class="material-symbols-outlined text-2xl">check_circle</span>
            </div>
            <span class="text-blue-100 text-sm font-medium">This Week</span>
        </div>
        <h3 class="text-3xl font-bold mb-1">{{ $weeklyCompleted ?? 0 }}</h3>
        <p class="text-blue-100 text-sm">Completed Sessions</p>
    </div>

    <div class="bg-gradient-to-br from-purple-500 to-pink-600 rounded-2xl p-6 text-white shadow-lg shadow-purple-500/30 hover:shadow-xl hover:shadow-purple-500/40 transition-all">
        <div class="flex items-center justify-between mb-4">
            <div class="w-12 h-12 bg-white/20 rounded-xl flex items-center justify-center backdrop-blur-sm">
                <span class="material-symbols-outlined text-2xl">trending_up</span>
            </div>
            <span class="text-purple-100 text-sm font-medium">Total Impact</span>
        </div>
        <h3 class="text-3xl font-bold mb-1">{{ $totalSessions ?? 0 }}</h3>
        <p class="text-purple-100 text-sm">Students Helped</p>
    </div>
</div>

<!-- Quick Actions -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-8">
    <a href="{{ route('counselor.sessions.index') }}" class="bg-white dark:bg-gray-800 rounded-2xl p-6 border border-gray-200 dark:border-gray-700 hover:shadow-lg hover:shadow-emerald-500/10 transition-all group">
        <div class="w-12 h-12 bg-emerald-100 dark:bg-emerald-900/30 rounded-xl flex items-center justify-center mb-4 group-hover:bg-emerald-200 dark:group-hover:bg-emerald-900/50 transition-colors">
            <span class="material-symbols-outlined text-emerald-600 dark:text-emerald-400">psychology</span>
        </div>
        <h3 class="font-semibold text-gray-900 dark:text-white mb-2">Active Sessions</h3>
        <p class="text-sm text-gray-600 dark:text-gray-400">Manage ongoing counseling sessions</p>
    </a>

    <button onclick="document.getElementById('notesModal').classList.remove('hidden')" class="bg-white dark:bg-gray-800 rounded-2xl p-6 border border-gray-200 dark:border-gray-700 hover:shadow-lg hover:shadow-blue-500/10 transition-all group text-left">
        <div class="w-12 h-12 bg-blue-100 dark:bg-blue-900/30 rounded-xl flex items-center justify-center mb-4 group-hover:bg-blue-200 dark:group-hover:bg-blue-900/50 transition-colors">
            <span class="material-symbols-outlined text-blue-600 dark:text-blue-400">note_add</span>
        </div>
        <h3 class="font-semibold text-gray-900 dark:text-white mb-2">Quick Notes</h3>
        <p class="text-sm text-gray-600 dark:text-gray-400">Add session notes or reminders</p>
    </button>

    <a href="#" class="bg-white dark:bg-gray-800 rounded-2xl p-6 border border-gray-200 dark:border-gray-700 hover:shadow-lg hover:shadow-purple-500/10 transition-all group">
        <div class="w-12 h-12 bg-purple-100 dark:bg-purple-900/30 rounded-xl flex items-center justify-center mb-4 group-hover:bg-purple-200 dark:group-hover:bg-purple-900/50 transition-colors">
            <span class="material-symbols-outlined text-purple-600 dark:text-purple-400">analytics</span>
        </div>
        <h3 class="font-semibold text-gray-900 dark:text-white mb-2">Reports</h3>
        <p class="text-sm text-gray-600 dark:text-gray-400">View session analytics and trends</p>
    </a>

    <button onclick="document.getElementById('resourcesModal').classList.remove('hidden')" class="bg-white dark:bg-gray-800 rounded-2xl p-6 border border-gray-200 dark:border-gray-700 hover:shadow-lg hover:shadow-indigo-500/10 transition-all group text-left">
        <div class="w-12 h-12 bg-indigo-100 dark:bg-indigo-900/30 rounded-xl flex items-center justify-center mb-4 group-hover:bg-indigo-200 dark:group-hover:bg-indigo-900/50 transition-colors">
            <span class="material-symbols-outlined text-indigo-600 dark:text-indigo-400">library_books</span>
        </div>
        <h3 class="font-semibold text-gray-900 dark:text-white mb-2">Resources</h3>
        <p class="text-sm text-gray-600 dark:text-gray-400">Access counseling resources</p>
    </button>
</div>

<!-- Recent Activity -->
<div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
    <!-- Urgent Sessions -->
    @if(isset($urgentSessions) && $urgentSessions->count() > 0)
    <div class="bg-white dark:bg-gray-800 rounded-2xl border border-gray-200 dark:border-gray-700 shadow-lg overflow-hidden">
        <div class="p-6 border-b border-gray-200 dark:border-gray-700 bg-gradient-to-r from-red-50 to-orange-50 dark:from-red-900/20 dark:to-orange-900/20">
            <h2 class="text-xl font-bold text-gray-900 dark:text-white flex items-center gap-2">
                <span class="material-symbols-outlined text-red-600">priority_high</span>
                Urgent Sessions
            </h2>
        </div>
        <div class="divide-y divide-gray-200 dark:divide-gray-700">
            @foreach($urgentSessions as $session)
            <div class="p-6 hover:bg-gray-50 dark:hover:bg-gray-700/50 transition-colors">
                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-full bg-gradient-to-br from-red-500 to-orange-600 flex items-center justify-center text-white font-bold shadow-lg">
                            {{ substr($session->student->name, 0, 1) }}
                        </div>
                        <div>
                            <h3 class="font-semibold text-gray-900 dark:text-white">{{ $session->student->name }}</h3>
                            <p class="text-sm text-gray-600 dark:text-gray-400">{{ ucfirst(str_replace('_', ' ', $session->session_type)) }}</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-2">
                        <span class="px-2 py-1 bg-red-100 text-red-700 dark:bg-red-900/30 dark:text-red-300 text-xs font-semibold rounded-full">
                            {{ ucfirst($session->priority) }}
                        </span>
                        <a href="{{ route('counselor.sessions.show', $session) }}" class="bg-red-600 text-white px-3 py-1 rounded-lg hover:bg-red-700 text-sm font-medium">
                            Review
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    @endif

    <!-- Today's Schedule -->
    <div class="bg-white dark:bg-gray-800 rounded-2xl border border-gray-200 dark:border-gray-700 shadow-lg overflow-hidden">
        <div class="p-6 border-b border-gray-200 dark:border-gray-700 bg-gradient-to-r from-emerald-50 to-teal-50 dark:from-emerald-900/20 dark:to-teal-900/20">
            <h2 class="text-xl font-bold text-gray-900 dark:text-white flex items-center gap-2">
                <span class="material-symbols-outlined text-emerald-600">today</span>
                Today's Schedule
            </h2>
        </div>
        <div class="p-6">
            @if(isset($todaysSessions) && $todaysSessions->count() > 0)
            <div class="space-y-4">
                @foreach($todaysSessions as $session)
                <div class="flex items-center gap-4 p-4 bg-gray-50 dark:bg-gray-700 rounded-xl">
                    <div class="w-2 h-12 bg-emerald-500 rounded-full"></div>
                    <div class="flex-1">
                        <h3 class="font-semibold text-gray-900 dark:text-white">{{ $session->student->name }}</h3>
                        <p class="text-sm text-gray-600 dark:text-gray-400">{{ ucfirst(str_replace('_', ' ', $session->session_type)) }}</p>
                    </div>
                    <div class="text-right">
                        <p class="text-sm font-medium text-gray-900 dark:text-white">{{ $session->scheduled_at ? $session->scheduled_at->format('h:i A') : 'TBD' }}</p>
                        <p class="text-xs text-gray-500 dark:text-gray-400">{{ $session->duration ?? '50' }} min</p>
                    </div>
                </div>
                @endforeach
            </div>
            @else
            <div class="text-center py-8">
                <div class="w-16 h-16 bg-gray-100 dark:bg-gray-700 rounded-full flex items-center justify-center mx-auto mb-4">
                    <span class="material-symbols-outlined text-2xl text-gray-400">event_available</span>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">No sessions scheduled</h3>
                <p class="text-gray-500 dark:text-gray-400">You have a clear schedule for today.</p>
            </div>
            @endif
        </div>
    </div>
</div>

<!-- Resources Modal -->
<div id="resourcesModal" class="hidden fixed inset-0 bg-black/50 flex items-center justify-center z-50 p-4">
    <div class="bg-white dark:bg-gray-800 rounded-2xl p-8 max-w-4xl w-full shadow-2xl max-h-[90vh] overflow-y-auto">
        <div class="flex items-center justify-between mb-6">
            <h3 class="text-2xl font-bold text-gray-900 dark:text-white">Counseling Resources</h3>
            <button onclick="document.getElementById('resourcesModal').classList.add('hidden')" class="text-gray-400 hover:text-gray-600 dark:hover:text-gray-300">
                <span class="material-symbols-outlined text-2xl">close</span>
            </button>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <div class="bg-gradient-to-br from-blue-50 to-indigo-50 dark:from-blue-900/20 dark:to-indigo-900/20 border border-blue-200 dark:border-blue-800 rounded-xl p-6">
                <div class="w-12 h-12 bg-blue-100 dark:bg-blue-900/30 rounded-lg flex items-center justify-center mb-4">
                    <span class="material-symbols-outlined text-blue-600 dark:text-blue-400">psychology</span>
                </div>
                <h4 class="font-semibold text-blue-900 dark:text-blue-100 mb-2">Crisis Intervention</h4>
                <p class="text-sm text-blue-700 dark:text-blue-300 mb-4">Guidelines and protocols for handling crisis situations</p>
                <a href="#" class="text-blue-600 dark:text-blue-400 text-sm font-medium hover:underline">View Guide →</a>
            </div>

            <div class="bg-gradient-to-br from-emerald-50 to-teal-50 dark:from-emerald-900/20 dark:to-teal-900/20 border border-emerald-200 dark:border-emerald-800 rounded-xl p-6">
                <div class="w-12 h-12 bg-emerald-100 dark:bg-emerald-900/30 rounded-lg flex items-center justify-center mb-4">
                    <span class="material-symbols-outlined text-emerald-600 dark:text-emerald-400">groups</span>
                </div>
                <h4 class="font-semibold text-emerald-900 dark:text-emerald-100 mb-2">Group Therapy</h4>
                <p class="text-sm text-emerald-700 dark:text-emerald-300 mb-4">Best practices for facilitating group counseling sessions</p>
                <a href="#" class="text-emerald-600 dark:text-emerald-400 text-sm font-medium hover:underline">View Guide →</a>
            </div>

            <div class="bg-gradient-to-br from-purple-50 to-pink-50 dark:from-purple-900/20 dark:to-pink-900/20 border border-purple-200 dark:border-purple-800 rounded-xl p-6">
                <div class="w-12 h-12 bg-purple-100 dark:bg-purple-900/30 rounded-lg flex items-center justify-center mb-4">
                    <span class="material-symbols-outlined text-purple-600 dark:text-purple-400">school</span>
                </div>
                <h4 class="font-semibold text-purple-900 dark:text-purple-100 mb-2">Academic Counseling</h4>
                <p class="text-sm text-purple-700 dark:text-purple-300 mb-4">Supporting students with academic challenges and goals</p>
                <a href="#" class="text-purple-600 dark:text-purple-400 text-sm font-medium hover:underline">View Guide →</a>
            </div>

            <div class="bg-gradient-to-br from-orange-50 to-red-50 dark:from-orange-900/20 dark:to-red-900/20 border border-orange-200 dark:border-orange-800 rounded-xl p-6">
                <div class="w-12 h-12 bg-orange-100 dark:bg-orange-900/30 rounded-lg flex items-center justify-center mb-4">
                    <span class="material-symbols-outlined text-orange-600 dark:text-orange-400">contact_support</span>
                </div>
                <h4 class="font-semibold text-orange-900 dark:text-orange-100 mb-2">Referral Network</h4>
                <p class="text-sm text-orange-700 dark:text-orange-300 mb-4">External resources and specialist contacts</p>
                <a href="#" class="text-orange-600 dark:text-orange-400 text-sm font-medium hover:underline">View Directory →</a>
            </div>

            <div class="bg-gradient-to-br from-gray-50 to-slate-50 dark:from-gray-900/20 dark:to-slate-900/20 border border-gray-200 dark:border-gray-800 rounded-xl p-6">
                <div class="w-12 h-12 bg-gray-100 dark:bg-gray-900/30 rounded-lg flex items-center justify-center mb-4">
                    <span class="material-symbols-outlined text-gray-600 dark:text-gray-400">description</span>
                </div>
                <h4 class="font-semibold text-gray-900 dark:text-gray-100 mb-2">Documentation</h4>
                <p class="text-sm text-gray-700 dark:text-gray-300 mb-4">Session notes templates and reporting guidelines</p>
                <a href="#" class="text-gray-600 dark:text-gray-400 text-sm font-medium hover:underline">View Templates →</a>
            </div>

            <div class="bg-gradient-to-br from-yellow-50 to-amber-50 dark:from-yellow-900/20 dark:to-amber-900/20 border border-yellow-200 dark:border-yellow-800 rounded-xl p-6">
                <div class="w-12 h-12 bg-yellow-100 dark:bg-yellow-900/30 rounded-lg flex items-center justify-center mb-4">
                    <span class="material-symbols-outlined text-yellow-600 dark:text-yellow-400">self_improvement</span>
                </div>
                <h4 class="font-semibold text-yellow-900 dark:text-yellow-100 mb-2">Self-Care</h4>
                <p class="text-sm text-yellow-700 dark:text-yellow-300 mb-4">Resources for counselor wellbeing and burnout prevention</p>
                <a href="#" class="text-yellow-600 dark:text-yellow-400 text-sm font-medium hover:underline">View Resources →</a>
            </div>
        </div>
    </div>
</div>

<!-- Notes Modal -->
<div id="notesModal" class="hidden fixed inset-0 bg-black/50 flex items-center justify-center z-50 p-4">
    <div class="bg-white dark:bg-gray-800 rounded-2xl p-8 max-w-2xl w-full shadow-2xl">
        <div class="flex items-center justify-between mb-6">
            <h3 class="text-2xl font-bold text-gray-900 dark:text-white">Quick Notes</h3>
            <button onclick="document.getElementById('notesModal').classList.add('hidden')" class="text-gray-400 hover:text-gray-600 dark:hover:text-gray-300">
                <span class="material-symbols-outlined text-2xl">close</span>
            </button>
        </div>
        
        <form class="space-y-6">
            <div>
                <label class="block text-sm font-semibold text-gray-900 dark:text-white mb-3">Note Title</label>
                <input type="text" placeholder="Enter note title..." 
                    class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-xl focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 dark:bg-gray-700 dark:text-white transition-all">
            </div>
            
            <div>
                <label class="block text-sm font-semibold text-gray-900 dark:text-white mb-3">Note Content</label>
                <textarea rows="6" placeholder="Write your note here..." 
                    class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-xl focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 dark:bg-gray-700 dark:text-white resize-none transition-all"></textarea>
            </div>
            
            <div class="flex gap-3">
                <button type="submit" class="flex-1 bg-gradient-to-r from-emerald-500 to-teal-600 text-white px-6 py-3 rounded-xl font-semibold hover:shadow-lg hover:shadow-emerald-500/30 transition-all">
                    Save Note
                </button>
                <button type="button" onclick="document.getElementById('notesModal').classList.add('hidden')" 
                    class="px-6 py-3 bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-300 rounded-xl font-semibold hover:bg-gray-300 dark:hover:bg-gray-600 transition-all">
                    Cancel
                </button>
            </div>
        </form>
    </div>
</div>
@endsection