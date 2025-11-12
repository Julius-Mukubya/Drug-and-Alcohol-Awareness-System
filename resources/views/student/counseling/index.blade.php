@extends('layouts.student')

@section('title', 'Counseling - Student')
@section('page-title', 'Counseling Sessions')

@section('content')
<!-- Hero Section -->
<div class="bg-gradient-to-br from-emerald-500 via-teal-600 to-cyan-700 rounded-3xl p-8 mb-8 text-white relative overflow-hidden">
    <div class="absolute inset-0 bg-black/10"></div>
    <div class="relative z-10">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-6">
            <div class="flex-1">
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-12 h-12 bg-white/20 rounded-2xl flex items-center justify-center backdrop-blur-sm">
                        <span class="material-symbols-outlined text-2xl">support_agent</span>
                    </div>
                    <div>
                        <h1 class="text-3xl font-bold mb-2">Counseling Support</h1>
                        <p class="text-emerald-100 text-lg">Professional guidance when you need it most</p>
                    </div>
                </div>
                <p class="text-white/90 max-w-2xl">
                    Our trained counselors are here to provide confidential support for academic, personal, and mental health concerns. 
                    Take the first step towards better wellbeing.
                </p>
            </div>
            <div class="flex flex-col sm:flex-row gap-3">
                <a href="{{ route('student.counseling.create') }}" class="bg-white text-emerald-600 px-6 py-3 rounded-xl font-semibold hover:bg-white/90 transition-all flex items-center gap-2 shadow-lg">
                    <span class="material-symbols-outlined">add</span>
                    Request Session
                </a>
                <button onclick="document.getElementById('emergencyModal').classList.remove('hidden')" class="bg-red-500 text-white px-6 py-3 rounded-xl font-semibold hover:bg-red-600 transition-all flex items-center gap-2 shadow-lg">
                    <span class="material-symbols-outlined">emergency</span>
                    Crisis Support
                </button>
            </div>
        </div>
    </div>
    <div class="absolute -top-10 -right-10 w-40 h-40 bg-white/10 rounded-full blur-3xl"></div>
    <div class="absolute -bottom-10 -left-10 w-32 h-32 bg-white/10 rounded-full blur-2xl"></div>
</div>

<!-- Statistics Cards -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
    <div class="bg-gradient-to-br from-amber-500 to-orange-600 rounded-2xl p-6 text-white shadow-lg shadow-amber-500/30 hover:shadow-xl hover:shadow-amber-500/40 transition-all">
        <div class="flex items-center justify-between mb-4">
            <div class="w-12 h-12 bg-white/20 rounded-xl flex items-center justify-center backdrop-blur-sm">
                <span class="material-symbols-outlined text-2xl">pending</span>
            </div>
            <span class="text-amber-100 text-sm font-medium">Awaiting Response</span>
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
            <span class="text-blue-100 text-sm font-medium">Completed</span>
        </div>
        <h3 class="text-3xl font-bold mb-1">{{ $completedSessions ?? 0 }}</h3>
        <p class="text-blue-100 text-sm">Completed Sessions</p>
    </div>
</div>

<!-- Quick Actions -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-8">
    <a href="{{ route('student.counseling.create') }}" class="bg-white dark:bg-gray-800 rounded-2xl p-6 border border-gray-200 dark:border-gray-700 hover:shadow-lg hover:shadow-emerald-500/10 transition-all group">
        <div class="w-12 h-12 bg-emerald-100 dark:bg-emerald-900/30 rounded-xl flex items-center justify-center mb-4 group-hover:bg-emerald-200 dark:group-hover:bg-emerald-900/50 transition-colors">
            <span class="material-symbols-outlined text-emerald-600 dark:text-emerald-400">add_circle</span>
        </div>
        <h3 class="font-semibold text-gray-900 dark:text-white mb-2">New Session</h3>
        <p class="text-sm text-gray-600 dark:text-gray-400">Request a counseling session</p>
    </a>

    <a href="#" class="bg-white dark:bg-gray-800 rounded-2xl p-6 border border-gray-200 dark:border-gray-700 hover:shadow-lg hover:shadow-blue-500/10 transition-all group">
        <div class="w-12 h-12 bg-blue-100 dark:bg-blue-900/30 rounded-xl flex items-center justify-center mb-4 group-hover:bg-blue-200 dark:group-hover:bg-blue-900/50 transition-colors">
            <span class="material-symbols-outlined text-blue-600 dark:text-blue-400">schedule</span>
        </div>
        <h3 class="font-semibold text-gray-900 dark:text-white mb-2">Schedule</h3>
        <p class="text-sm text-gray-600 dark:text-gray-400">View upcoming appointments</p>
    </a>

    <a href="#" class="bg-white dark:bg-gray-800 rounded-2xl p-6 border border-gray-200 dark:border-gray-700 hover:shadow-lg hover:shadow-purple-500/10 transition-all group">
        <div class="w-12 h-12 bg-purple-100 dark:bg-purple-900/30 rounded-xl flex items-center justify-center mb-4 group-hover:bg-purple-200 dark:group-hover:bg-purple-900/50 transition-colors">
            <span class="material-symbols-outlined text-purple-600 dark:text-purple-400">library_books</span>
        </div>
        <h3 class="font-semibold text-gray-900 dark:text-white mb-2">Resources</h3>
        <p class="text-sm text-gray-600 dark:text-gray-400">Self-help materials</p>
    </a>

    <button onclick="document.getElementById('emergencyModal').classList.remove('hidden')" class="bg-white dark:bg-gray-800 rounded-2xl p-6 border border-gray-200 dark:border-gray-700 hover:shadow-lg hover:shadow-red-500/10 transition-all group text-left">
        <div class="w-12 h-12 bg-red-100 dark:bg-red-900/30 rounded-xl flex items-center justify-center mb-4 group-hover:bg-red-200 dark:group-hover:bg-red-900/50 transition-colors">
            <span class="material-symbols-outlined text-red-600 dark:text-red-400">emergency</span>
        </div>
        <h3 class="font-semibold text-gray-900 dark:text-white mb-2">Crisis Support</h3>
        <p class="text-sm text-gray-600 dark:text-gray-400">Immediate help available</p>
    </button>
</div>

<!-- Sessions List -->
@if(isset($sessions) && $sessions->count() > 0)
<div class="bg-white dark:bg-gray-800 rounded-2xl border border-gray-200 dark:border-gray-700 shadow-lg overflow-hidden">
    <div class="p-6 border-b border-gray-200 dark:border-gray-700">
        <h2 class="text-xl font-bold text-gray-900 dark:text-white flex items-center gap-2">
            <span class="material-symbols-outlined text-emerald-600">history</span>
            Your Sessions
        </h2>
    </div>
    <div class="divide-y divide-gray-200 dark:divide-gray-700">
        @foreach($sessions as $session)
        <div class="p-6 hover:bg-gray-50 dark:hover:bg-gray-700/50 transition-colors">
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 rounded-full bg-gradient-to-br 
                        @if($session->status === 'pending') from-amber-500 to-orange-600
                        @elseif($session->status === 'active') from-emerald-500 to-teal-600
                        @else from-blue-500 to-indigo-600
                        @endif
                        flex items-center justify-center text-white font-bold shadow-lg">
                        <span class="material-symbols-outlined">
                            @if($session->status === 'pending') pending
                            @elseif($session->status === 'active') psychology
                            @else check_circle
                            @endif
                        </span>
                    </div>
                    <div>
                        <h3 class="font-semibold text-gray-900 dark:text-white">{{ ucfirst(str_replace('_', ' ', $session->session_type)) }}</h3>
                        <p class="text-sm text-gray-600 dark:text-gray-400">{{ $session->created_at->format('M d, Y') }}</p>
                    </div>
                </div>
                <div class="flex items-center gap-3">
                    <span class="px-3 py-1 rounded-full text-xs font-semibold
                        @if($session->status === 'pending') bg-amber-100 text-amber-700 dark:bg-amber-900/30 dark:text-amber-300
                        @elseif($session->status === 'active') bg-emerald-100 text-emerald-700 dark:bg-emerald-900/30 dark:text-emerald-300
                        @else bg-blue-100 text-blue-700 dark:bg-blue-900/30 dark:text-blue-300
                        @endif">
                        {{ ucfirst($session->status) }}
                    </span>
                    @if($session->status === 'active')
                    <a href="{{ route('student.counseling.show', $session) }}" class="bg-primary text-white px-4 py-2 rounded-lg hover:opacity-90 text-sm font-medium">
                        Continue
                    </a>
                    @endif
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@else
<!-- Empty State -->
<div class="bg-gradient-to-br from-white to-gray-50/30 dark:from-gray-800 dark:to-gray-950/20 rounded-2xl border border-gray-200 dark:border-gray-700 p-12 text-center shadow-lg">
    <div class="w-24 h-24 mx-auto mb-6 rounded-full bg-gradient-to-br from-emerald-100 to-teal-100 dark:from-emerald-900/30 dark:to-teal-900/30 flex items-center justify-center">
        <span class="material-symbols-outlined text-5xl text-emerald-600 dark:text-emerald-400">support_agent</span>
    </div>
    <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-3">Ready to Start Your Journey?</h3>
    <p class="text-gray-600 dark:text-gray-400 mb-6 max-w-md mx-auto">
        You haven't requested any counseling sessions yet. Our professional counselors are here to support you through any challenges you're facing.
    </p>
    <div class="flex flex-col sm:flex-row gap-3 justify-center">
        <a href="{{ route('student.counseling.create') }}" class="bg-primary text-white px-8 py-3 rounded-xl font-semibold hover:opacity-90 transition-all flex items-center gap-2 shadow-lg">
            <span class="material-symbols-outlined">add</span>
            Request Your First Session
        </a>
        <button onclick="document.getElementById('infoModal').classList.remove('hidden')" class="bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300 px-8 py-3 rounded-xl font-semibold hover:bg-gray-200 dark:hover:bg-gray-600 transition-all flex items-center gap-2">
            <span class="material-symbols-outlined">info</span>
            Learn More
        </button>
    </div>
</div>
@endif

<!-- Emergency Support Modal -->
<div id="emergencyModal" class="hidden fixed inset-0 bg-black/50 flex items-center justify-center z-50 p-4">
    <div class="bg-white dark:bg-gray-800 rounded-2xl p-8 max-w-md w-full shadow-2xl">
        <div class="text-center mb-6">
            <div class="w-16 h-16 bg-red-100 dark:bg-red-900/30 rounded-full flex items-center justify-center mx-auto mb-4">
                <span class="material-symbols-outlined text-3xl text-red-600 dark:text-red-400">emergency</span>
            </div>
            <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-2">Crisis Support</h3>
            <p class="text-gray-600 dark:text-gray-400">If you're experiencing a mental health emergency, please reach out immediately.</p>
        </div>
        
        <div class="space-y-4 mb-6">
            <div class="bg-red-50 dark:bg-red-900/20 border border-red-200 dark:border-red-800 rounded-xl p-4">
                <h4 class="font-semibold text-red-800 dark:text-red-300 mb-2">Emergency Hotlines</h4>
                <div class="space-y-2 text-sm">
                    <p class="text-red-700 dark:text-red-400">National Suicide Prevention: <strong>988</strong></p>
                    <p class="text-red-700 dark:text-red-400">Crisis Text Line: Text <strong>HOME</strong> to <strong>741741</strong></p>
                    <p class="text-red-700 dark:text-red-400">Campus Security: <strong>(555) 123-4567</strong></p>
                </div>
            </div>
            
            <div class="bg-blue-50 dark:bg-blue-900/20 border border-blue-200 dark:border-blue-800 rounded-xl p-4">
                <h4 class="font-semibold text-blue-800 dark:text-blue-300 mb-2">Immediate Support</h4>
                <p class="text-sm text-blue-700 dark:text-blue-400">
                    You can also request an urgent counseling session, and we'll prioritize your request.
                </p>
            </div>
        </div>
        
        <div class="flex gap-3">
            <a href="{{ route('student.counseling.create') }}?priority=urgent" class="flex-1 bg-red-600 text-white px-4 py-3 rounded-xl font-semibold hover:bg-red-700 transition-all text-center">
                Request Urgent Session
            </a>
            <button onclick="document.getElementById('emergencyModal').classList.add('hidden')" class="px-6 py-3 bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-300 rounded-xl font-semibold hover:bg-gray-300 dark:hover:bg-gray-600 transition-all">
                Close
            </button>
        </div>
    </div>
</div>

<!-- Info Modal -->
<div id="infoModal" class="hidden fixed inset-0 bg-black/50 flex items-center justify-center z-50 p-4">
    <div class="bg-white dark:bg-gray-800 rounded-2xl p-8 max-w-2xl w-full shadow-2xl max-h-[90vh] overflow-y-auto">
        <div class="text-center mb-6">
            <div class="w-16 h-16 bg-emerald-100 dark:bg-emerald-900/30 rounded-full flex items-center justify-center mx-auto mb-4">
                <span class="material-symbols-outlined text-3xl text-emerald-600 dark:text-emerald-400">psychology</span>
            </div>
            <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-2">About Counseling Services</h3>
        </div>
        
        <div class="space-y-6 text-left">
            <div>
                <h4 class="font-semibold text-gray-900 dark:text-white mb-2">What We Offer</h4>
                <ul class="text-sm text-gray-600 dark:text-gray-400 space-y-1">
                    <li>• Individual counseling sessions</li>
                    <li>• Group therapy sessions</li>
                    <li>• Crisis intervention support</li>
                    <li>• Academic counseling and guidance</li>
                    <li>• Mental health assessments</li>
                </ul>
            </div>
            
            <div>
                <h4 class="font-semibold text-gray-900 dark:text-white mb-2">Confidentiality</h4>
                <p class="text-sm text-gray-600 dark:text-gray-400">
                    All counseling sessions are completely confidential. Information is only shared with your explicit consent or in cases where there's immediate danger.
                </p>
            </div>
            
            <div>
                <h4 class="font-semibold text-gray-900 dark:text-white mb-2">How It Works</h4>
                <ol class="text-sm text-gray-600 dark:text-gray-400 space-y-1">
                    <li>1. Submit a counseling request</li>
                    <li>2. A counselor reviews your request within 24-48 hours</li>
                    <li>3. You'll be contacted to schedule your session</li>
                    <li>4. Attend your session via video call or in-person</li>
                </ol>
            </div>
        </div>
        
        <div class="flex gap-3 mt-8">
            <a href="{{ route('student.counseling.create') }}" class="flex-1 bg-primary text-white px-4 py-3 rounded-xl font-semibold hover:opacity-90 transition-all text-center">
                Get Started
            </a>
            <button onclick="document.getElementById('infoModal').classList.add('hidden')" class="px-6 py-3 bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-300 rounded-xl font-semibold hover:bg-gray-300 dark:hover:bg-gray-600 transition-all">
                Close
            </button>
        </div>
    </div>
</div>
@endsection
