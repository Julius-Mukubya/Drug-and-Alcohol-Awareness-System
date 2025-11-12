@extends('layouts.public')

@section('title', 'Counseling Services - MUBS Wellness Hub')

@section('content')
<!-- Hero Banner -->
<x-page-banner 
    title="Your Mental Health Matters" 
    subtitle="Connect with licensed professional counselors who provide confidential, compassionate support for your mental health and wellbeing journey."
    badge="Professional Counseling"
    badgeIcon="support_agent"
>
    <x-slot name="actions">
        @auth
            @if(auth()->user()->role === 'student')
                <a href="{{ route('student.counseling.create') }}" class="inline-flex items-center justify-center gap-2 px-8 py-4 bg-primary text-white rounded-xl font-bold text-lg hover:bg-primary/90 transition-all duration-200 transform hover:scale-105 shadow-lg">
                    <span class="material-symbols-outlined !text-xl">add_circle</span>
                    Request Counseling Session
                </a>
            @else
                <button onclick="document.getElementById('loginModal').classList.remove('hidden')" class="inline-flex items-center justify-center gap-2 px-8 py-4 bg-primary text-white rounded-xl font-bold text-lg hover:bg-primary/90 transition-all duration-200 transform hover:scale-105 shadow-lg">
                    <span class="material-symbols-outlined !text-xl">login</span>
                    Login to Get Help
                </button>
            @endif
        @else
            <button onclick="document.getElementById('loginModal').classList.remove('hidden')" class="inline-flex items-center justify-center gap-2 px-8 py-4 bg-primary text-white rounded-xl font-bold text-lg hover:bg-primary/90 transition-all duration-200 transform hover:scale-105 shadow-lg">
                <span class="material-symbols-outlined !text-xl">login</span>
                Login to Get Help
            </button>
        @endauth
        
        <a href="{{ route('content.index') }}" class="inline-flex items-center justify-center gap-2 px-8 py-4 bg-white/20 backdrop-blur-sm border border-white/50 text-white rounded-xl font-bold text-lg hover:bg-white/30 transition-all duration-200 transform hover:scale-105">
            <span class="material-symbols-outlined !text-xl">library_books</span>
            Mental Health Resources
        </a>
    </x-slot>
</x-page-banner>

<!-- Stats Section -->
<div class="bg-white dark:bg-gray-800/50 border-y border-[#f0f4f3] dark:border-gray-800 py-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col sm:flex-row gap-8 justify-center items-center">
            <div class="flex items-center gap-3 text-[#61897c] dark:text-gray-400">
                <div class="w-12 h-12 bg-primary/20 rounded-full flex items-center justify-center">
                    <span class="material-symbols-outlined text-primary !text-xl">group</span>
                </div>
                <div class="text-left">
                    <div class="text-2xl font-bold text-[#111816] dark:text-white">3</div>
                    <div class="text-sm font-medium">Licensed Counselors</div>
                </div>
            </div>
            <div class="hidden sm:block w-1 h-12 bg-[#61897c]/20 dark:bg-gray-600"></div>
            <div class="flex items-center gap-3 text-[#61897c] dark:text-gray-400">
                <div class="w-12 h-12 bg-primary/20 rounded-full flex items-center justify-center">
                    <span class="material-symbols-outlined text-primary !text-xl">security</span>
                </div>
                <div class="text-left">
                    <div class="text-2xl font-bold text-[#111816] dark:text-white">100%</div>
                    <div class="text-sm font-medium">Confidential</div>
                </div>
            </div>
            <div class="hidden sm:block w-1 h-12 bg-[#61897c]/20 dark:bg-gray-600"></div>
            <div class="flex items-center gap-3 text-[#61897c] dark:text-gray-400">
                <div class="w-12 h-12 bg-primary/20 rounded-full flex items-center justify-center">
                    <span class="material-symbols-outlined text-primary !text-xl">schedule</span>
                </div>
                <div class="text-left">
                    <div class="text-2xl font-bold text-[#111816] dark:text-white">24/7</div>
                    <div class="text-sm font-medium">Crisis Support</div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Main Content Section -->
<div class="py-16 bg-background-light dark:bg-background-dark">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Main Content Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Left Column - Main Content -->
            <div class="lg:col-span-2 flex flex-col gap-6">

                <!-- Services Overview -->
                <div class="bg-white dark:bg-gray-800 rounded-2xl border border-gray-200 dark:border-gray-700 shadow-lg overflow-hidden">
                <div class="bg-gradient-to-r from-emerald-50 to-teal-50 dark:from-emerald-900/20 dark:to-teal-900/20 px-6 py-5 border-b border-gray-200 dark:border-gray-700">
                    <h2 class="text-2xl font-bold text-gray-900 dark:text-white flex items-center gap-2">
                        <span class="material-symbols-outlined text-emerald-600">psychology</span>
                        Our Counseling Services
                    </h2>
                    <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">Professional support tailored to your needs</p>
                </div>
                
                <div class="p-6 grid grid-cols-1 md:grid-cols-2 gap-4">
                    <!-- Service Items -->
                    <div class="group p-4 rounded-xl bg-gradient-to-br from-blue-50 to-indigo-50 dark:from-blue-900/10 dark:to-indigo-900/10 border border-blue-100 dark:border-blue-900/30 hover:shadow-lg hover:shadow-blue-500/10 transition-all cursor-pointer">
                        <div class="flex items-start gap-4">
                            <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-xl flex items-center justify-center flex-shrink-0 shadow-md group-hover:scale-110 transition-transform">
                                <span class="material-symbols-outlined text-white text-xl">person</span>
                            </div>
                            <div>
                                <h3 class="font-bold text-gray-900 dark:text-white mb-1">Individual Counseling</h3>
                                <p class="text-sm text-gray-600 dark:text-gray-400">One-on-one sessions for personal challenges.</p>
                            </div>
                        </div>
                    </div>

                    <div class="group p-4 rounded-xl bg-gradient-to-br from-emerald-50 to-teal-50 dark:from-emerald-900/10 dark:to-teal-900/10 border border-emerald-100 dark:border-emerald-900/30 hover:shadow-lg hover:shadow-emerald-500/10 transition-all cursor-pointer">
                        <div class="flex items-start gap-4">
                            <div class="w-12 h-12 bg-gradient-to-br from-emerald-500 to-teal-600 rounded-xl flex items-center justify-center flex-shrink-0 shadow-md group-hover:scale-110 transition-transform">
                                <span class="material-symbols-outlined text-white text-xl">groups</span>
                            </div>
                            <div>
                                <h3 class="font-bold text-gray-900 dark:text-white mb-1">Group Therapy</h3>
                                <p class="text-sm text-gray-600 dark:text-gray-400">Supportive sessions with peers.</p>
                            </div>
                        </div>
                    </div>

                    <div class="group p-4 rounded-xl bg-gradient-to-br from-red-50 to-pink-50 dark:from-red-900/10 dark:to-pink-900/10 border border-red-100 dark:border-red-900/30 hover:shadow-lg hover:shadow-red-500/10 transition-all cursor-pointer">
                        <div class="flex items-start gap-4">
                            <div class="w-12 h-12 bg-gradient-to-br from-red-500 to-pink-600 rounded-xl flex items-center justify-center flex-shrink-0 shadow-md group-hover:scale-110 transition-transform">
                                <span class="material-symbols-outlined text-white text-xl">emergency</span>
                            </div>
                            <div>
                                <h3 class="font-bold text-gray-900 dark:text-white mb-1">Crisis Intervention</h3>
                                <p class="text-sm text-gray-600 dark:text-gray-400">24/7 immediate emergency support.</p>
                            </div>
                        </div>
                    </div>

                    <div class="group p-4 rounded-xl bg-gradient-to-br from-purple-50 to-indigo-50 dark:from-purple-900/10 dark:to-indigo-900/10 border border-purple-100 dark:border-purple-900/30 hover:shadow-lg hover:shadow-purple-500/10 transition-all cursor-pointer">
                        <div class="flex items-start gap-4">
                            <div class="w-12 h-12 bg-gradient-to-br from-purple-500 to-indigo-600 rounded-xl flex items-center justify-center flex-shrink-0 shadow-md group-hover:scale-110 transition-transform">
                                <span class="material-symbols-outlined text-white text-xl">school</span>
                            </div>
                            <div>
                                <h3 class="font-bold text-gray-900 dark:text-white mb-1">Academic Counseling</h3>
                                <p class="text-sm text-gray-600 dark:text-gray-400">Support for academic stress.</p>
                            </div>
                        </div>
                    </div>

                    <div class="group p-4 rounded-xl bg-gradient-to-br from-orange-50 to-red-50 dark:from-orange-900/10 dark:to-red-900/10 border border-orange-100 dark:border-orange-900/30 hover:shadow-lg hover:shadow-orange-500/10 transition-all cursor-pointer">
                        <div class="flex items-start gap-4">
                            <div class="w-12 h-12 bg-gradient-to-br from-orange-500 to-red-600 rounded-xl flex items-center justify-center flex-shrink-0 shadow-md group-hover:scale-110 transition-transform">
                                <span class="material-symbols-outlined text-white text-xl">self_improvement</span>
                            </div>
                            <div>
                                <h3 class="font-bold text-gray-900 dark:text-white mb-1">Wellness Workshops</h3>
                                <p class="text-sm text-gray-600 dark:text-gray-400">Educational mental health seminars.</p>
                            </div>
                        </div>
                    </div>

                    <div class="group p-4 rounded-xl bg-gradient-to-br from-teal-50 to-cyan-50 dark:from-teal-900/10 dark:to-cyan-900/10 border border-teal-100 dark:border-teal-900/30 hover:shadow-lg hover:shadow-teal-500/10 transition-all cursor-pointer">
                        <div class="flex items-start gap-4">
                            <div class="w-12 h-12 bg-gradient-to-br from-teal-500 to-cyan-600 rounded-xl flex items-center justify-center flex-shrink-0 shadow-md group-hover:scale-110 transition-transform">
                                <span class="material-symbols-outlined text-white text-xl">diversity_3</span>
                            </div>
                            <div>
                                <h3 class="font-bold text-gray-900 dark:text-white mb-1">Peer Support</h3>
                                <p class="text-sm text-gray-600 dark:text-gray-400">Student-led support groups.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Emergency Contact Card -->
            <div class="bg-gradient-to-br from-red-50 to-pink-50 dark:from-red-900/20 dark:to-pink-900/20 rounded-2xl border-2 border-red-200 dark:border-red-800 p-6 shadow-lg">
                <div class="flex items-start gap-4">
                    <div class="w-12 h-12 bg-red-100 dark:bg-red-900/30 rounded-xl flex items-center justify-center flex-shrink-0">
                        <span class="material-symbols-outlined text-red-600 dark:text-red-400 text-2xl">emergency</span>
                    </div>
                    <div class="flex-1">
                        <h3 class="text-lg font-bold text-red-900 dark:text-red-100 mb-2">Need Immediate Help?</h3>
                        <p class="text-sm text-red-800 dark:text-red-200 mb-4">If you're experiencing a mental health emergency, please reach out immediately.</p>
                        <div class="flex flex-wrap gap-3">
                            <a href="tel:988" class="inline-flex items-center gap-2 px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition-colors font-medium text-sm">
                                <span class="material-symbols-outlined text-sm">phone</span>
                                Call 988
                            </a>
                            <a href="sms:741741" class="inline-flex items-center gap-2 px-4 py-2 bg-white dark:bg-gray-800 text-red-600 dark:text-red-400 rounded-lg hover:bg-red-50 dark:hover:bg-gray-700 transition-colors font-medium text-sm border border-red-200 dark:border-red-800">
                                <span class="material-symbols-outlined text-sm">sms</span>
                                Text HOME to 741741
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Column - Counselors Sidebar -->
        <aside class="space-y-6">
            <div class="bg-white dark:bg-gray-800 rounded-2xl border border-gray-200 dark:border-gray-700 shadow-lg overflow-hidden sticky top-24">
                <div class="bg-gradient-to-r from-purple-50 to-indigo-50 dark:from-purple-900/20 dark:to-indigo-900/20 px-6 py-5 border-b border-gray-200 dark:border-gray-700">
                    <h2 class="text-xl font-bold text-gray-900 dark:text-white flex items-center gap-2">
                        <span class="material-symbols-outlined text-purple-600">group</span>
                        Meet Our Counselors
                    </h2>
                    <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">
                        Licensed professionals ready to support you
                    </p>
                </div>
                
                <div class="p-6 space-y-5">
                    <!-- Counselor 1 -->
                    <div class="group p-4 rounded-xl bg-gradient-to-br from-blue-50 to-indigo-50 dark:from-blue-900/10 dark:to-indigo-900/10 border border-blue-100 dark:border-blue-900/30 hover:shadow-lg hover:shadow-blue-500/10 transition-all cursor-pointer">
                        <div class="flex items-start gap-4">
                            <div class="h-14 w-14 rounded-full bg-gradient-to-br from-blue-500 to-indigo-600 flex items-center justify-center flex-shrink-0 shadow-lg group-hover:scale-110 transition-transform">
                                <span class="text-xl font-bold text-white">DR</span>
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="font-bold text-gray-900 dark:text-white truncate">Dr. Sarah Rodriguez</p>
                                <p class="text-xs text-blue-600 dark:text-blue-400 font-medium">PhD, Clinical Psychologist</p>
                                <p class="text-xs text-gray-600 dark:text-gray-400 mt-1">Anxiety & depression specialist</p>
                                <div class="flex items-center gap-1.5 mt-2">
                                    <span class="h-2 w-2 rounded-full bg-green-500 animate-pulse"></span>
                                    <p class="text-xs font-medium text-green-700 dark:text-green-400">Available</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Counselor 2 -->
                    <div class="group p-4 rounded-xl bg-gradient-to-br from-emerald-50 to-teal-50 dark:from-emerald-900/10 dark:to-teal-900/10 border border-emerald-100 dark:border-emerald-900/30 hover:shadow-lg hover:shadow-emerald-500/10 transition-all cursor-pointer">
                        <div class="flex items-start gap-4">
                            <div class="h-14 w-14 rounded-full bg-gradient-to-br from-emerald-500 to-teal-600 flex items-center justify-center flex-shrink-0 shadow-lg group-hover:scale-110 transition-transform">
                                <span class="text-xl font-bold text-white">MJ</span>
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="font-bold text-gray-900 dark:text-white truncate">Michael Johnson</p>
                                <p class="text-xs text-emerald-600 dark:text-emerald-400 font-medium">LCSW, Licensed Counselor</p>
                                <p class="text-xs text-gray-600 dark:text-gray-400 mt-1">Addiction & peer pressure</p>
                                <div class="flex items-center gap-1.5 mt-2">
                                    <span class="h-2 w-2 rounded-full bg-green-500 animate-pulse"></span>
                                    <p class="text-xs font-medium text-green-700 dark:text-green-400">Available</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Counselor 3 -->
                    <div class="group p-4 rounded-xl bg-gradient-to-br from-purple-50 to-pink-50 dark:from-purple-900/10 dark:to-pink-900/10 border border-purple-100 dark:border-purple-900/30 hover:shadow-lg hover:shadow-purple-500/10 transition-all cursor-pointer">
                        <div class="flex items-start gap-4">
                            <div class="h-14 w-14 rounded-full bg-gradient-to-br from-purple-500 to-pink-600 flex items-center justify-center flex-shrink-0 shadow-lg group-hover:scale-110 transition-transform">
                                <span class="text-xl font-bold text-white">AC</span>
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="font-bold text-gray-900 dark:text-white truncate">Dr. Aisha Chen</p>
                                <p class="text-xs text-purple-600 dark:text-purple-400 font-medium">M.A., Family Therapist</p>
                                <p class="text-xs text-gray-600 dark:text-gray-400 mt-1">Academic & family issues</p>
                                <div class="flex items-center gap-1.5 mt-2">
                                    <span class="h-2 w-2 rounded-full bg-gray-400"></span>
                                    <p class="text-xs font-medium text-gray-600 dark:text-gray-400">Booked</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="px-6 pb-6">
                    <a href="{{ route('public.counseling.counselors') }}" class="block w-full text-center px-4 py-3 bg-gradient-to-r from-emerald-500 to-teal-600 text-white rounded-xl font-semibold hover:shadow-lg hover:shadow-emerald-500/30 transition-all">
                        View All Counselors
                    </a>
                </div>
            </div>
        </aside>
        </div>
    </div>
</div>

<!-- Call to Action Section -->
<div class="py-20 bg-gradient-to-r from-primary/10 via-background-light to-emerald-500/10 dark:from-primary/20 dark:via-background-dark dark:to-emerald-500/20">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl md:text-4xl font-black text-[#111816] dark:text-white mb-6">
            Ready to Take the First Step?
        </h2>
        <p class="text-xl text-[#61897c] dark:text-gray-400 mb-8 max-w-2xl mx-auto">
            Your mental health journey starts with a single step. Our counselors are here to support you every step of the way.
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            @auth
                @if(auth()->user()->role === 'student')
                    <a href="{{ route('student.counseling.create') }}" class="inline-flex items-center gap-2 bg-primary text-white px-8 py-4 rounded-xl font-bold hover:bg-primary/90 transition-all duration-200 transform hover:scale-105 shadow-lg">
                        <span class="material-symbols-outlined !text-xl">psychology</span>
                        Request Counseling Session
                    </a>
                @else
                    <button onclick="document.getElementById('loginModal').classList.remove('hidden')" class="inline-flex items-center gap-2 bg-primary text-white px-8 py-4 rounded-xl font-bold hover:bg-primary/90 transition-all duration-200 transform hover:scale-105 shadow-lg">
                        <span class="material-symbols-outlined !text-xl">login</span>
                        Student Login Required
                    </button>
                @endif
            @else
                <button onclick="document.getElementById('loginModal').classList.remove('hidden')" class="inline-flex items-center gap-2 bg-primary text-white px-8 py-4 rounded-xl font-bold hover:bg-primary/90 transition-all duration-200 transform hover:scale-105 shadow-lg">
                    <span class="material-symbols-outlined !text-xl">login</span>
                    Login to Get Started
                </button>
            @endauth
            
            <a href="{{ route('content.index') }}" class="inline-flex items-center gap-2 bg-white dark:bg-gray-800 border border-[#f0f4f3] dark:border-gray-700 text-[#111816] dark:text-white px-8 py-4 rounded-xl font-bold hover:bg-gray-50 dark:hover:bg-gray-700 transition-all duration-200 transform hover:scale-105">
                <span class="material-symbols-outlined !text-xl">library_books</span>
                Browse Resources
            </a>
        </div>
        <p class="text-[#61897c] dark:text-gray-400 text-sm mt-6">
            All counseling services are free and confidential for MUBS students
        </p>
    </div>
</div>

@include('components.login-modal')
@endsection

@push('styles')
<style>
    /* Smooth animations */
    .animate-pulse {
        animation: pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite;
    }
    
    @keyframes pulse {
        0%, 100% { opacity: 1; }
        50% { opacity: 0.5; }
    }
    
    /* Custom scrollbar */
    ::-webkit-scrollbar {
        width: 8px;
    }
    
    ::-webkit-scrollbar-track {
        background: #f1f1f1;
        border-radius: 4px;
    }
    
    ::-webkit-scrollbar-thumb {
        background: #14eba3;
        border-radius: 4px;
    }
    
    ::-webkit-scrollbar-thumb:hover {
        background: #12d494;
    }
</style>
@endpush

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Intersection Observer for fade-in animations
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };
    
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
            }
        });
    }, observerOptions);
    
    // Observe all cards for fade-in animation
    document.querySelectorAll('.group').forEach(card => {
        card.style.opacity = '0';
        card.style.transform = 'translateY(20px)';
        card.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
        observer.observe(card);
    });
});
</script>
@endpush