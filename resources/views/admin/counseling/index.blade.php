@extends('layouts.admin')

@section('title', 'Counseling Management')

@section('content')
<!-- Header -->
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
                        <h1 class="text-3xl font-bold mb-2">Counseling Management</h1>
                        <p class="text-emerald-100 text-lg">Oversee counseling services and support</p>
                    </div>
                </div>
                <p class="text-white/90 max-w-2xl">
                    Monitor counseling sessions, manage counselors, and ensure quality mental health support for all students.
                </p>
            </div>
            <div class="flex flex-col sm:flex-row gap-3">
                <button onclick="document.getElementById('addCounselorModal').classList.remove('hidden')" class="bg-white text-emerald-600 px-6 py-3 rounded-xl font-semibold hover:bg-white/90 transition-all flex items-center gap-2 shadow-lg">
                    <span class="material-symbols-outlined">person_add</span>
                    Add Counselor
                </button>
                <button onclick="document.getElementById('reportsModal').classList.remove('hidden')" class="bg-emerald-600 text-white px-6 py-3 rounded-xl font-semibold hover:bg-emerald-700 transition-all flex items-center gap-2 shadow-lg">
                    <span class="material-symbols-outlined">analytics</span>
                    View Reports
                </button>
            </div>
        </div>
    </div>
    <div class="absolute -top-10 -right-10 w-40 h-40 bg-white/10 rounded-full blur-3xl"></div>
    <div class="absolute -bottom-10 -left-10 w-32 h-32 bg-white/10 rounded-full blur-2xl"></div>
</div>

<!-- Statistics Overview -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
    <div class="bg-gradient-to-br from-blue-500 to-indigo-600 rounded-2xl p-6 text-white shadow-lg shadow-blue-500/30 hover:shadow-xl hover:shadow-blue-500/40 transition-all">
        <div class="flex items-center justify-between mb-4">
            <div class="w-12 h-12 bg-white/20 rounded-xl flex items-center justify-center backdrop-blur-sm">
                <span class="material-symbols-outlined text-2xl">psychology</span>
            </div>
            <span class="text-blue-100 text-sm font-medium">Total Sessions</span>
        </div>
        <h3 class="text-3xl font-bold mb-1">{{ $totalSessions ?? 0 }}</h3>
        <p class="text-blue-100 text-sm">All Time</p>
    </div>

    <div class="bg-gradient-to-br from-emerald-500 to-teal-600 rounded-2xl p-6 text-white shadow-lg shadow-emerald-500/30 hover:shadow-xl hover:shadow-emerald-500/40 transition-all">
        <div class="flex items-center justify-between mb-4">
            <div class="w-12 h-12 bg-white/20 rounded-xl flex items-center justify-center backdrop-blur-sm">
                <span class="material-symbols-outlined text-2xl">trending_up</span>
            </div>
            <span class="text-emerald-100 text-sm font-medium">This Month</span>
        </div>
        <h3 class="text-3xl font-bold mb-1">{{ $monthlySessions ?? 0 }}</h3>
        <p class="text-emerald-100 text-sm">Active Sessions</p>
    </div>

    <div class="bg-gradient-to-br from-purple-500 to-pink-600 rounded-2xl p-6 text-white shadow-lg shadow-purple-500/30 hover:shadow-xl hover:shadow-purple-500/40 transition-all">
        <div class="flex items-center justify-between mb-4">
            <div class="w-12 h-12 bg-white/20 rounded-xl flex items-center justify-center backdrop-blur-sm">
                <span class="material-symbols-outlined text-2xl">group</span>
            </div>
            <span class="text-purple-100 text-sm font-medium">Active</span>
        </div>
        <h3 class="text-3xl font-bold mb-1">{{ $activeCounselors ?? 0 }}</h3>
        <p class="text-purple-100 text-sm">Counselors</p>
    </div>

    <div class="bg-gradient-to-br from-amber-500 to-orange-600 rounded-2xl p-6 text-white shadow-lg shadow-amber-500/30 hover:shadow-xl hover:shadow-amber-500/40 transition-all">
        <div class="flex items-center justify-between mb-4">
            <div class="w-12 h-12 bg-white/20 rounded-xl flex items-center justify-center backdrop-blur-sm">
                <span class="material-symbols-outlined text-2xl">star</span>
            </div>
            <span class="text-amber-100 text-sm font-medium">Average</span>
        </div>
        <h3 class="text-3xl font-bold mb-1">{{ $averageRating ?? '4.8' }}</h3>
        <p class="text-amber-100 text-sm">Satisfaction Rating</p>
    </div>
</div>

<!-- Main Content Grid -->
<div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
    <!-- Recent Sessions -->
    <div class="lg:col-span-2">
        <div class="bg-white dark:bg-gray-800 rounded-2xl border border-gray-200 dark:border-gray-700 shadow-lg overflow-hidden">
            <div class="p-6 border-b border-gray-200 dark:border-gray-700">
                <div class="flex items-center justify-between">
                    <h2 class="text-xl font-bold text-gray-900 dark:text-white flex items-center gap-2">
                        <span class="material-symbols-outlined text-emerald-600">history</span>
                        Recent Sessions
                    </h2>
                    <div class="flex gap-2">
                        <button class="px-3 py-1 bg-emerald-100 dark:bg-emerald-900/30 text-emerald-700 dark:text-emerald-300 text-sm font-medium rounded-lg">All</button>
                        <button class="px-3 py-1 text-gray-600 dark:text-gray-400 text-sm font-medium rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700">Active</button>
                        <button class="px-3 py-1 text-gray-600 dark:text-gray-400 text-sm font-medium rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700">Completed</button>
                    </div>
                </div>
            </div>
            
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-gray-50 dark:bg-gray-900/50 border-b border-gray-200 dark:border-gray-700">
                        <tr>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-700 dark:text-gray-300 uppercase tracking-wider">Student</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-700 dark:text-gray-300 uppercase tracking-wider">Counselor</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-700 dark:text-gray-300 uppercase tracking-wider">Type</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-700 dark:text-gray-300 uppercase tracking-wider">Status</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-700 dark:text-gray-300 uppercase tracking-wider">Date</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-700 dark:text-gray-300 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                        @forelse($recentSessions ?? [] as $session)
                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-700/50 transition-colors">
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <div class="w-8 h-8 rounded-full bg-gradient-to-br from-blue-500 to-indigo-600 flex items-center justify-center text-white font-bold text-sm shadow-lg">
                                        {{ substr($session->student->name ?? 'S', 0, 1) }}
                                    </div>
                                    <div>
                                        <p class="font-medium text-gray-900 dark:text-white">{{ $session->student->name ?? 'Student' }}</p>
                                        <p class="text-xs text-gray-500 dark:text-gray-400">{{ $session->student->email ?? 'student@example.com' }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-2">
                                    <div class="w-6 h-6 rounded-full bg-gradient-to-br from-emerald-500 to-teal-600 flex items-center justify-center text-white font-bold text-xs">
                                        {{ substr($session->counselor->name ?? 'C', 0, 1) }}
                                    </div>
                                    <span class="text-sm text-gray-700 dark:text-gray-300">{{ $session->counselor->name ?? 'Counselor' }}</span>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <span class="text-sm text-gray-700 dark:text-gray-300">{{ ucfirst(str_replace('_', ' ', $session->session_type ?? 'individual')) }}</span>
                            </td>
                            <td class="px-6 py-4">
                                <span class="px-2 py-1 text-xs font-semibold rounded-full
                                    @if(($session->status ?? 'pending') === 'pending') bg-amber-100 text-amber-700 dark:bg-amber-900/30 dark:text-amber-300
                                    @elseif(($session->status ?? 'pending') === 'active') bg-emerald-100 text-emerald-700 dark:bg-emerald-900/30 dark:text-emerald-300
                                    @else bg-blue-100 text-blue-700 dark:bg-blue-900/30 dark:text-blue-300
                                    @endif">
                                    {{ ucfirst($session->status ?? 'pending') }}
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                <span class="text-sm text-gray-600 dark:text-gray-400">{{ ($session->created_at ?? now())->format('M d, Y') }}</span>
                            </td>
                            <td class="px-6 py-4">
                                <button class="text-primary hover:text-primary/80 font-medium text-sm transition-colors">
                                    View Details
                                </button>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="px-6 py-12 text-center">
                                <div class="w-16 h-16 bg-gray-100 dark:bg-gray-700 rounded-full flex items-center justify-center mx-auto mb-4">
                                    <span class="material-symbols-outlined text-2xl text-gray-400">psychology</span>
                                </div>
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">No sessions yet</h3>
                                <p class="text-gray-500 dark:text-gray-400">Counseling sessions will appear here once students start requesting support.</p>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Sidebar -->
    <div class="space-y-6">
        <!-- Counselors List -->
        <div class="bg-white dark:bg-gray-800 rounded-2xl border border-gray-200 dark:border-gray-700 shadow-lg overflow-hidden">
            <div class="p-6 border-b border-gray-200 dark:border-gray-700">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white flex items-center gap-2">
                    <span class="material-symbols-outlined text-purple-600">group</span>
                    Active Counselors
                </h3>
            </div>
            <div class="divide-y divide-gray-200 dark:divide-gray-700">
                @forelse($counselors ?? [] as $counselor)
                <div class="p-4 hover:bg-gray-50 dark:hover:bg-gray-700/50 transition-colors">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-full bg-gradient-to-br from-purple-500 to-pink-600 flex items-center justify-center text-white font-bold shadow-lg">
                                {{ substr($counselor->name ?? 'C', 0, 1) }}
                            </div>
                            <div>
                                <h4 class="font-medium text-gray-900 dark:text-white">{{ $counselor->name ?? 'Counselor' }}</h4>
                                <p class="text-xs text-gray-500 dark:text-gray-400">{{ $counselor->specialization ?? 'General Counseling' }}</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-1 text-emerald-600 dark:text-emerald-400">
                            <div class="w-2 h-2 bg-emerald-500 rounded-full"></div>
                            <span class="text-xs font-medium">Online</span>
                        </div>
                    </div>
                </div>
                @empty
                <div class="p-6 text-center">
                    <div class="w-12 h-12 bg-gray-100 dark:bg-gray-700 rounded-full flex items-center justify-center mx-auto mb-3">
                        <span class="material-symbols-outlined text-xl text-gray-400">person_add</span>
                    </div>
                    <p class="text-sm text-gray-500 dark:text-gray-400 mb-3">No counselors added yet</p>
                    <button onclick="document.getElementById('addCounselorModal').classList.remove('hidden')" class="text-primary hover:text-primary/80 text-sm font-medium">
                        Add First Counselor
                    </button>
                </div>
                @endforelse
            </div>
        </div>

        <!-- Quick Stats -->
        <div class="bg-gradient-to-br from-indigo-50 to-purple-50 dark:from-indigo-900/20 dark:to-purple-900/20 border border-indigo-200 dark:border-indigo-800 rounded-2xl p-6">
            <h3 class="text-lg font-semibold text-indigo-900 dark:text-indigo-100 mb-4 flex items-center gap-2">
                <span class="material-symbols-outlined text-indigo-600 dark:text-indigo-400">insights</span>
                Quick Insights
            </h3>
            <div class="space-y-4">
                <div class="flex items-center justify-between">
                    <span class="text-sm text-indigo-700 dark:text-indigo-300">Response Time</span>
                    <span class="text-sm font-semibold text-indigo-900 dark:text-indigo-100">{{ $avgResponseTime ?? '2.4' }}h</span>
                </div>
                <div class="flex items-center justify-between">
                    <span class="text-sm text-indigo-700 dark:text-indigo-300">Completion Rate</span>
                    <span class="text-sm font-semibold text-indigo-900 dark:text-indigo-100">{{ $completionRate ?? '94' }}%</span>
                </div>
                <div class="flex items-center justify-between">
                    <span class="text-sm text-indigo-700 dark:text-indigo-300">Student Satisfaction</span>
                    <span class="text-sm font-semibold text-indigo-900 dark:text-indigo-100">{{ $satisfaction ?? '4.8' }}/5</span>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Add Counselor Modal -->
<div id="addCounselorModal" class="hidden fixed inset-0 bg-black/50 flex items-center justify-center z-50 p-4">
    <div class="bg-white dark:bg-gray-800 rounded-2xl p-8 max-w-2xl w-full shadow-2xl">
        <div class="flex items-center justify-between mb-6">
            <h3 class="text-2xl font-bold text-gray-900 dark:text-white">Add New Counselor</h3>
            <button onclick="document.getElementById('addCounselorModal').classList.add('hidden')" class="text-gray-400 hover:text-gray-600 dark:hover:text-gray-300">
                <span class="material-symbols-outlined text-2xl">close</span>
            </button>
        </div>
        
        <form class="space-y-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-semibold text-gray-900 dark:text-white mb-3">Full Name</label>
                    <input type="text" placeholder="Enter counselor's name..." 
                        class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-xl focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 dark:bg-gray-700 dark:text-white transition-all">
                </div>
                
                <div>
                    <label class="block text-sm font-semibold text-gray-900 dark:text-white mb-3">Email Address</label>
                    <input type="email" placeholder="counselor@example.com" 
                        class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-xl focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 dark:bg-gray-700 dark:text-white transition-all">
                </div>
            </div>
            
            <div>
                <label class="block text-sm font-semibold text-gray-900 dark:text-white mb-3">Specialization</label>
                <select class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-xl focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 dark:bg-gray-700 dark:text-white transition-all">
                    <option value="">Select specialization...</option>
                    <option value="general">General Counseling</option>
                    <option value="academic">Academic Counseling</option>
                    <option value="crisis">Crisis Intervention</option>
                    <option value="group">Group Therapy</option>
                    <option value="substance">Substance Abuse</option>
                    <option value="anxiety">Anxiety & Depression</option>
                </select>
            </div>
            
            <div>
                <label class="block text-sm font-semibold text-gray-900 dark:text-white mb-3">Bio</label>
                <textarea rows="4" placeholder="Brief description of counselor's background and approach..." 
                    class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-xl focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 dark:bg-gray-700 dark:text-white resize-none transition-all"></textarea>
            </div>
            
            <div class="flex gap-3">
                <button type="submit" class="flex-1 bg-gradient-to-r from-emerald-500 to-teal-600 text-white px-6 py-3 rounded-xl font-semibold hover:shadow-lg hover:shadow-emerald-500/30 transition-all">
                    Add Counselor
                </button>
                <button type="button" onclick="document.getElementById('addCounselorModal').classList.add('hidden')" 
                    class="px-6 py-3 bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-300 rounded-xl font-semibold hover:bg-gray-300 dark:hover:bg-gray-600 transition-all">
                    Cancel
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Reports Modal -->
<div id="reportsModal" class="hidden fixed inset-0 bg-black/50 flex items-center justify-center z-50 p-4">
    <div class="bg-white dark:bg-gray-800 rounded-2xl p-8 max-w-4xl w-full shadow-2xl max-h-[90vh] overflow-y-auto">
        <div class="flex items-center justify-between mb-6">
            <h3 class="text-2xl font-bold text-gray-900 dark:text-white">Counseling Reports</h3>
            <button onclick="document.getElementById('reportsModal').classList.add('hidden')" class="text-gray-400 hover:text-gray-600 dark:hover:text-gray-300">
                <span class="material-symbols-outlined text-2xl">close</span>
            </button>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="bg-gradient-to-br from-blue-50 to-indigo-50 dark:from-blue-900/20 dark:to-indigo-900/20 border border-blue-200 dark:border-blue-800 rounded-xl p-6">
                <div class="w-12 h-12 bg-blue-100 dark:bg-blue-900/30 rounded-lg flex items-center justify-center mb-4">
                    <span class="material-symbols-outlined text-blue-600 dark:text-blue-400">bar_chart</span>
                </div>
                <h4 class="font-semibold text-blue-900 dark:text-blue-100 mb-2">Session Analytics</h4>
                <p class="text-sm text-blue-700 dark:text-blue-300 mb-4">Detailed breakdown of counseling sessions by type, status, and outcomes</p>
                <button class="text-blue-600 dark:text-blue-400 text-sm font-medium hover:underline">Generate Report →</button>
            </div>

            <div class="bg-gradient-to-br from-emerald-50 to-teal-50 dark:from-emerald-900/20 dark:to-teal-900/20 border border-emerald-200 dark:border-emerald-800 rounded-xl p-6">
                <div class="w-12 h-12 bg-emerald-100 dark:bg-emerald-900/30 rounded-lg flex items-center justify-center mb-4">
                    <span class="material-symbols-outlined text-emerald-600 dark:text-emerald-400">trending_up</span>
                </div>
                <h4 class="font-semibold text-emerald-900 dark:text-emerald-100 mb-2">Usage Trends</h4>
                <p class="text-sm text-emerald-700 dark:text-emerald-300 mb-4">Monthly and yearly trends in counseling service utilization</p>
                <button class="text-emerald-600 dark:text-emerald-400 text-sm font-medium hover:underline">View Trends →</button>
            </div>

            <div class="bg-gradient-to-br from-purple-50 to-pink-50 dark:from-purple-900/20 dark:to-pink-900/20 border border-purple-200 dark:border-purple-800 rounded-xl p-6">
                <div class="w-12 h-12 bg-purple-100 dark:bg-purple-900/30 rounded-lg flex items-center justify-center mb-4">
                    <span class="material-symbols-outlined text-purple-600 dark:text-purple-400">star</span>
                </div>
                <h4 class="font-semibold text-purple-900 dark:text-purple-100 mb-2">Satisfaction Survey</h4>
                <p class="text-sm text-purple-700 dark:text-purple-300 mb-4">Student feedback and satisfaction ratings for counseling services</p>
                <button class="text-purple-600 dark:text-purple-400 text-sm font-medium hover:underline">View Feedback →</button>
            </div>

            <div class="bg-gradient-to-br from-orange-50 to-red-50 dark:from-orange-900/20 dark:to-red-900/20 border border-orange-200 dark:border-orange-800 rounded-xl p-6">
                <div class="w-12 h-12 bg-orange-100 dark:bg-orange-900/30 rounded-lg flex items-center justify-center mb-4">
                    <span class="material-symbols-outlined text-orange-600 dark:text-orange-400">schedule</span>
                </div>
                <h4 class="font-semibold text-orange-900 dark:text-orange-100 mb-2">Response Times</h4>
                <p class="text-sm text-orange-700 dark:text-orange-300 mb-4">Analysis of counselor response times and session scheduling efficiency</p>
                <button class="text-orange-600 dark:text-orange-400 text-sm font-medium hover:underline">View Analysis →</button>
            </div>
        </div>
    </div>
</div>
@endsection