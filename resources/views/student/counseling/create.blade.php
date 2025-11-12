@extends('layouts.student')

@section('title', 'Request Counseling - Student')
@section('page-title', 'Request Counseling Session')

@section('content')
<!-- Breadcrumb -->
<div class="mb-8">
    <nav class="flex items-center gap-2 text-sm">
        <a href="{{ route('student.counseling.index') }}" class="text-gray-500 dark:text-gray-400 hover:text-primary transition-colors">Counseling</a>
        <span class="material-symbols-outlined text-gray-400 text-sm">chevron_right</span>
        <span class="text-gray-900 dark:text-white font-medium">Request Session</span>
    </nav>
</div>

<!-- Header -->
<div class="bg-gradient-to-br from-emerald-500 via-teal-600 to-cyan-700 rounded-3xl p-8 mb-8 text-white relative overflow-hidden">
    <div class="absolute inset-0 bg-black/10"></div>
    <div class="relative z-10">
        <div class="flex items-center gap-4 mb-4">
            <div class="w-16 h-16 bg-white/20 rounded-2xl flex items-center justify-center backdrop-blur-sm">
                <span class="material-symbols-outlined text-3xl">support_agent</span>
            </div>
            <div>
                <h1 class="text-3xl font-bold mb-2">Request Counseling Session</h1>
                <p class="text-emerald-100 text-lg">Take the first step towards getting the support you need</p>
            </div>
        </div>
        <p class="text-white/90 max-w-2xl">
            Our professional counselors are here to provide confidential, personalized support. 
            Please fill out this form with as much detail as you're comfortable sharing.
        </p>
    </div>
    <div class="absolute -top-10 -right-10 w-40 h-40 bg-white/10 rounded-full blur-3xl"></div>
    <div class="absolute -bottom-10 -left-10 w-32 h-32 bg-white/10 rounded-full blur-2xl"></div>
</div>

<div class="max-w-4xl mx-auto">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Main Form -->
        <div class="lg:col-span-2">
            <div class="bg-white dark:bg-gray-800 rounded-2xl border border-gray-200 dark:border-gray-700 shadow-lg overflow-hidden">
                <div class="p-8">
                    <form action="{{ route('student.counseling.store') }}" method="POST" id="counselingForm">
                        @csrf

                        <div class="space-y-8">
                            <!-- Session Type -->
                            <div>
                                <label class="block text-sm font-semibold text-gray-900 dark:text-white mb-4">Session Type *</label>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <label class="relative cursor-pointer">
                                        <input type="radio" name="session_type" value="individual" required class="sr-only peer">
                                        <div class="bg-gray-50 dark:bg-gray-700 border-2 border-gray-200 dark:border-gray-600 rounded-xl p-4 peer-checked:border-emerald-500 peer-checked:bg-emerald-50 dark:peer-checked:bg-emerald-900/20 transition-all hover:border-gray-300 dark:hover:border-gray-500">
                                            <div class="flex items-center gap-3">
                                                <div class="w-10 h-10 bg-emerald-100 dark:bg-emerald-900/30 rounded-lg flex items-center justify-center">
                                                    <span class="material-symbols-outlined text-emerald-600 dark:text-emerald-400">person</span>
                                                </div>
                                                <div>
                                                    <h3 class="font-semibold text-gray-900 dark:text-white">Individual</h3>
                                                    <p class="text-sm text-gray-600 dark:text-gray-400">One-on-one session</p>
                                                </div>
                                            </div>
                                        </div>
                                    </label>

                                    <label class="relative cursor-pointer">
                                        <input type="radio" name="session_type" value="group" required class="sr-only peer">
                                        <div class="bg-gray-50 dark:bg-gray-700 border-2 border-gray-200 dark:border-gray-600 rounded-xl p-4 peer-checked:border-emerald-500 peer-checked:bg-emerald-50 dark:peer-checked:bg-emerald-900/20 transition-all hover:border-gray-300 dark:hover:border-gray-500">
                                            <div class="flex items-center gap-3">
                                                <div class="w-10 h-10 bg-blue-100 dark:bg-blue-900/30 rounded-lg flex items-center justify-center">
                                                    <span class="material-symbols-outlined text-blue-600 dark:text-blue-400">groups</span>
                                                </div>
                                                <div>
                                                    <h3 class="font-semibold text-gray-900 dark:text-white">Group</h3>
                                                    <p class="text-sm text-gray-600 dark:text-gray-400">Group therapy session</p>
                                                </div>
                                            </div>
                                        </div>
                                    </label>

                                    <label class="relative cursor-pointer">
                                        <input type="radio" name="session_type" value="crisis" required class="sr-only peer">
                                        <div class="bg-gray-50 dark:bg-gray-700 border-2 border-gray-200 dark:border-gray-600 rounded-xl p-4 peer-checked:border-red-500 peer-checked:bg-red-50 dark:peer-checked:bg-red-900/20 transition-all hover:border-gray-300 dark:hover:border-gray-500">
                                            <div class="flex items-center gap-3">
                                                <div class="w-10 h-10 bg-red-100 dark:bg-red-900/30 rounded-lg flex items-center justify-center">
                                                    <span class="material-symbols-outlined text-red-600 dark:text-red-400">emergency</span>
                                                </div>
                                                <div>
                                                    <h3 class="font-semibold text-gray-900 dark:text-white">Crisis</h3>
                                                    <p class="text-sm text-gray-600 dark:text-gray-400">Immediate support</p>
                                                </div>
                                            </div>
                                        </div>
                                    </label>

                                    <label class="relative cursor-pointer">
                                        <input type="radio" name="session_type" value="academic" required class="sr-only peer">
                                        <div class="bg-gray-50 dark:bg-gray-700 border-2 border-gray-200 dark:border-gray-600 rounded-xl p-4 peer-checked:border-purple-500 peer-checked:bg-purple-50 dark:peer-checked:bg-purple-900/20 transition-all hover:border-gray-300 dark:hover:border-gray-500">
                                            <div class="flex items-center gap-3">
                                                <div class="w-10 h-10 bg-purple-100 dark:bg-purple-900/30 rounded-lg flex items-center justify-center">
                                                    <span class="material-symbols-outlined text-purple-600 dark:text-purple-400">school</span>
                                                </div>
                                                <div>
                                                    <h3 class="font-semibold text-gray-900 dark:text-white">Academic</h3>
                                                    <p class="text-sm text-gray-600 dark:text-gray-400">Study & career guidance</p>
                                                </div>
                                            </div>
                                        </div>
                                    </label>
                                </div>
                            </div>

                            <!-- Priority -->
                            <div>
                                <label class="block text-sm font-semibold text-gray-900 dark:text-white mb-4">Priority Level *</label>
                                <div class="space-y-3">
                                    <label class="relative cursor-pointer">
                                        <input type="radio" name="priority" value="low" required class="sr-only peer">
                                        <div class="bg-gray-50 dark:bg-gray-700 border-2 border-gray-200 dark:border-gray-600 rounded-xl p-4 peer-checked:border-green-500 peer-checked:bg-green-50 dark:peer-checked:bg-green-900/20 transition-all hover:border-gray-300 dark:hover:border-gray-500">
                                            <div class="flex items-center justify-between">
                                                <div class="flex items-center gap-3">
                                                    <div class="w-3 h-3 bg-green-500 rounded-full"></div>
                                                    <div>
                                                        <h3 class="font-semibold text-gray-900 dark:text-white">Low Priority</h3>
                                                        <p class="text-sm text-gray-600 dark:text-gray-400">Can wait a few days</p>
                                                    </div>
                                                </div>
                                                <span class="text-sm text-gray-500 dark:text-gray-400">3-5 days</span>
                                            </div>
                                        </div>
                                    </label>

                                    <label class="relative cursor-pointer">
                                        <input type="radio" name="priority" value="medium" required class="sr-only peer" {{ request('priority') !== 'urgent' ? 'checked' : '' }}>
                                        <div class="bg-gray-50 dark:bg-gray-700 border-2 border-gray-200 dark:border-gray-600 rounded-xl p-4 peer-checked:border-yellow-500 peer-checked:bg-yellow-50 dark:peer-checked:bg-yellow-900/20 transition-all hover:border-gray-300 dark:hover:border-gray-500">
                                            <div class="flex items-center justify-between">
                                                <div class="flex items-center gap-3">
                                                    <div class="w-3 h-3 bg-yellow-500 rounded-full"></div>
                                                    <div>
                                                        <h3 class="font-semibold text-gray-900 dark:text-white">Medium Priority</h3>
                                                        <p class="text-sm text-gray-600 dark:text-gray-400">Within this week</p>
                                                    </div>
                                                </div>
                                                <span class="text-sm text-gray-500 dark:text-gray-400">1-2 days</span>
                                            </div>
                                        </div>
                                    </label>

                                    <label class="relative cursor-pointer">
                                        <input type="radio" name="priority" value="high" required class="sr-only peer">
                                        <div class="bg-gray-50 dark:bg-gray-700 border-2 border-gray-200 dark:border-gray-600 rounded-xl p-4 peer-checked:border-orange-500 peer-checked:bg-orange-50 dark:peer-checked:bg-orange-900/20 transition-all hover:border-gray-300 dark:hover:border-gray-500">
                                            <div class="flex items-center justify-between">
                                                <div class="flex items-center gap-3">
                                                    <div class="w-3 h-3 bg-orange-500 rounded-full"></div>
                                                    <div>
                                                        <h3 class="font-semibold text-gray-900 dark:text-white">High Priority</h3>
                                                        <p class="text-sm text-gray-600 dark:text-gray-400">Within 24 hours</p>
                                                    </div>
                                                </div>
                                                <span class="text-sm text-gray-500 dark:text-gray-400">Same day</span>
                                            </div>
                                        </div>
                                    </label>

                                    <label class="relative cursor-pointer">
                                        <input type="radio" name="priority" value="urgent" required class="sr-only peer" {{ request('priority') === 'urgent' ? 'checked' : '' }}>
                                        <div class="bg-gray-50 dark:bg-gray-700 border-2 border-gray-200 dark:border-gray-600 rounded-xl p-4 peer-checked:border-red-500 peer-checked:bg-red-50 dark:peer-checked:bg-red-900/20 transition-all hover:border-gray-300 dark:hover:border-gray-500">
                                            <div class="flex items-center justify-between">
                                                <div class="flex items-center gap-3">
                                                    <div class="w-3 h-3 bg-red-500 rounded-full animate-pulse"></div>
                                                    <div>
                                                        <h3 class="font-semibold text-gray-900 dark:text-white">Urgent</h3>
                                                        <p class="text-sm text-gray-600 dark:text-gray-400">Immediate attention needed</p>
                                                    </div>
                                                </div>
                                                <span class="text-sm text-red-600 dark:text-red-400 font-semibold">ASAP</span>
                                            </div>
                                        </div>
                                    </label>
                                </div>
                            </div>

                            <!-- Reason -->
                            <div>
                                <label class="block text-sm font-semibold text-gray-900 dark:text-white mb-3">What would you like to discuss? *</label>
                                <textarea name="reason" rows="6" required 
                                    placeholder="Please share what's on your mind. The more details you provide, the better we can prepare to support you. Remember, everything you share is confidential."
                                    class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-xl focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 dark:bg-gray-700 dark:text-white resize-none transition-all"></textarea>
                                <p class="text-xs text-gray-500 dark:text-gray-400 mt-2">Your information is completely confidential and secure.</p>
                            </div>

                            <!-- Preferred Time -->
                            <div>
                                <label class="block text-sm font-semibold text-gray-900 dark:text-white mb-3">Preferred Date & Time (Optional)</label>
                                <input type="datetime-local" name="preferred_datetime" 
                                    class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-xl focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 dark:bg-gray-700 dark:text-white transition-all">
                                <p class="text-xs text-gray-500 dark:text-gray-400 mt-2">We'll do our best to accommodate your preferred time, but availability may vary.</p>
                            </div>

                            <!-- Additional Options -->
                            <div>
                                <label class="block text-sm font-semibold text-gray-900 dark:text-white mb-3">Additional Preferences</label>
                                <div class="space-y-3">
                                    <label class="flex items-center gap-3 cursor-pointer">
                                        <input type="checkbox" name="anonymous" value="1" class="w-4 h-4 text-emerald-600 border-gray-300 rounded focus:ring-emerald-500">
                                        <span class="text-sm text-gray-700 dark:text-gray-300">I prefer to remain anonymous initially</span>
                                    </label>
                                    <label class="flex items-center gap-3 cursor-pointer">
                                        <input type="checkbox" name="follow_up" value="1" class="w-4 h-4 text-emerald-600 border-gray-300 rounded focus:ring-emerald-500">
                                        <span class="text-sm text-gray-700 dark:text-gray-300">I'm interested in follow-up sessions</span>
                                    </label>
                                    <label class="flex items-center gap-3 cursor-pointer">
                                        <input type="checkbox" name="resources" value="1" class="w-4 h-4 text-emerald-600 border-gray-300 rounded focus:ring-emerald-500">
                                        <span class="text-sm text-gray-700 dark:text-gray-300">Send me relevant self-help resources</span>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <!-- Submit Buttons -->
                        <div class="flex flex-col sm:flex-row gap-4 mt-8 pt-6 border-t border-gray-200 dark:border-gray-700">
                            <button type="submit" class="flex-1 bg-gradient-to-r from-emerald-500 to-teal-600 text-white px-8 py-4 rounded-xl font-semibold hover:shadow-lg hover:shadow-emerald-500/30 transition-all flex items-center justify-center gap-2">
                                <span class="material-symbols-outlined">send</span>
                                Submit Request
                            </button>
                            <a href="{{ route('student.counseling.index') }}" class="flex-1 sm:flex-none bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300 px-8 py-4 rounded-xl font-semibold hover:bg-gray-200 dark:hover:bg-gray-600 transition-all text-center">
                                Cancel
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Sidebar -->
        <div class="lg:col-span-1 space-y-6">
            <!-- Confidentiality Notice -->
            <div class="bg-gradient-to-br from-blue-50 to-indigo-50 dark:from-blue-900/20 dark:to-indigo-900/20 border border-blue-200 dark:border-blue-800 rounded-2xl p-6">
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-10 h-10 bg-blue-100 dark:bg-blue-900/30 rounded-lg flex items-center justify-center">
                        <span class="material-symbols-outlined text-blue-600 dark:text-blue-400">security</span>
                    </div>
                    <h3 class="font-semibold text-blue-900 dark:text-blue-100">Confidentiality</h3>
                </div>
                <p class="text-sm text-blue-800 dark:text-blue-200 mb-3">
                    All counseling sessions are completely confidential. Your information is protected and will only be shared with your explicit consent.
                </p>
                <p class="text-xs text-blue-700 dark:text-blue-300">
                    A counselor will review your request and contact you within 24-48 hours.
                </p>
            </div>

            <!-- Emergency Support -->
            <div class="bg-gradient-to-br from-red-50 to-pink-50 dark:from-red-900/20 dark:to-pink-900/20 border border-red-200 dark:border-red-800 rounded-2xl p-6">
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-10 h-10 bg-red-100 dark:bg-red-900/30 rounded-lg flex items-center justify-center">
                        <span class="material-symbols-outlined text-red-600 dark:text-red-400">emergency</span>
                    </div>
                    <h3 class="font-semibold text-red-900 dark:text-red-100">Crisis Support</h3>
                </div>
                <p class="text-sm text-red-800 dark:text-red-200 mb-4">
                    If you're experiencing a mental health emergency, please reach out immediately:
                </p>
                <div class="space-y-2 text-sm text-red-700 dark:text-red-300">
                    <p><strong>National:</strong> 988</p>
                    <p><strong>Crisis Text:</strong> Text HOME to 741741</p>
                    <p><strong>Campus:</strong> (555) 123-4567</p>
                </div>
            </div>

            <!-- What to Expect -->
            <div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-2xl p-6">
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-10 h-10 bg-emerald-100 dark:bg-emerald-900/30 rounded-lg flex items-center justify-center">
                        <span class="material-symbols-outlined text-emerald-600 dark:text-emerald-400">info</span>
                    </div>
                    <h3 class="font-semibold text-gray-900 dark:text-white">What to Expect</h3>
                </div>
                <div class="space-y-3 text-sm text-gray-600 dark:text-gray-400">
                    <div class="flex items-start gap-3">
                        <div class="w-6 h-6 bg-emerald-100 dark:bg-emerald-900/30 rounded-full flex items-center justify-center flex-shrink-0 mt-0.5">
                            <span class="text-xs font-bold text-emerald-600 dark:text-emerald-400">1</span>
                        </div>
                        <p>Submit your request with as much detail as you're comfortable sharing</p>
                    </div>
                    <div class="flex items-start gap-3">
                        <div class="w-6 h-6 bg-emerald-100 dark:bg-emerald-900/30 rounded-full flex items-center justify-center flex-shrink-0 mt-0.5">
                            <span class="text-xs font-bold text-emerald-600 dark:text-emerald-400">2</span>
                        </div>
                        <p>A qualified counselor will review your request</p>
                    </div>
                    <div class="flex items-start gap-3">
                        <div class="w-6 h-6 bg-emerald-100 dark:bg-emerald-900/30 rounded-full flex items-center justify-center flex-shrink-0 mt-0.5">
                            <span class="text-xs font-bold text-emerald-600 dark:text-emerald-400">3</span>
                        </div>
                        <p>You'll be contacted to schedule your session</p>
                    </div>
                    <div class="flex items-start gap-3">
                        <div class="w-6 h-6 bg-emerald-100 dark:bg-emerald-900/30 rounded-full flex items-center justify-center flex-shrink-0 mt-0.5">
                            <span class="text-xs font-bold text-emerald-600 dark:text-emerald-400">4</span>
                        </div>
                        <p>Attend your session via secure video call or in-person</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
