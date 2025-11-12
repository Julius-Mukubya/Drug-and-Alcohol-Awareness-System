@extends('layouts.public')

@section('title', 'About Us - MUBS D&A Awareness Platform')

@section('content')
<div class="w-full">
    <!-- Hero Banner -->
    <x-page-banner 
        title="About Our Platform" 
        subtitle="Supporting MUBS students with comprehensive drug and alcohol awareness resources, counseling services, and peer support."
        badge="About Us"
        badgeIcon="info"
    />

    <!-- Mission Section -->
    <div class="w-full bg-background-light dark:bg-background-dark py-16 sm:py-24">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-bold text-[#111816] dark:text-white mb-8">Our Mission</h2>
                <p class="text-lg text-gray-600 dark:text-gray-400 leading-relaxed">
                    To provide a safe, confidential, and supportive environment where MUBS students can access evidence-based information, professional counseling, and peer support for drug and alcohol awareness and mental health wellbeing.
                </p>
            </div>

            <!-- What We Offer -->
            <div class="mb-16">
                <h2 class="text-3xl font-bold text-[#111816] dark:text-white mb-8 text-center">What We Offer</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div class="bg-white dark:bg-gray-800 p-6 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700">
                        <div class="flex items-start gap-4">
                            <div class="w-12 h-12 bg-primary/20 rounded-lg flex items-center justify-center flex-shrink-0">
                                <span class="material-symbols-outlined text-primary">psychology</span>
                            </div>
                            <div>
                                <h3 class="text-xl font-bold text-[#111816] dark:text-white mb-2">Professional Counseling</h3>
                                <p class="text-gray-600 dark:text-gray-400">Access to licensed counselors who provide confidential support for mental health, substance use, and personal challenges.</p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white dark:bg-gray-800 p-6 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700">
                        <div class="flex items-start gap-4">
                            <div class="w-12 h-12 bg-primary/20 rounded-lg flex items-center justify-center flex-shrink-0">
                                <span class="material-symbols-outlined text-primary">library_books</span>
                            </div>
                            <div>
                                <h3 class="text-xl font-bold text-[#111816] dark:text-white mb-2">Educational Resources</h3>
                                <p class="text-gray-600 dark:text-gray-400">Evidence-based articles, videos, and guides on drug and alcohol awareness, mental health, and wellness.</p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white dark:bg-gray-800 p-6 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700">
                        <div class="flex items-start gap-4">
                            <div class="w-12 h-12 bg-primary/20 rounded-lg flex items-center justify-center flex-shrink-0">
                                <span class="material-symbols-outlined text-primary">campaign</span>
                            </div>
                            <div>
                                <h3 class="text-xl font-bold text-[#111816] dark:text-white mb-2">Awareness Campaigns</h3>
                                <p class="text-gray-600 dark:text-gray-400">Participate in campus-wide initiatives promoting mental health awareness and substance education.</p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white dark:bg-gray-800 p-6 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700">
                        <div class="flex items-start gap-4">
                            <div class="w-12 h-12 bg-primary/20 rounded-lg flex items-center justify-center flex-shrink-0">
                                <span class="material-symbols-outlined text-primary">diversity_3</span>
                            </div>
                            <div>
                                <h3 class="text-xl font-bold text-[#111816] dark:text-white mb-2">Peer Support</h3>
                                <p class="text-gray-600 dark:text-gray-400">Connect with fellow students through forums and support groups in a safe, moderated environment.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Our Values -->
            <div class="mb-16">
                <h2 class="text-3xl font-bold text-[#111816] dark:text-white mb-8 text-center">Our Core Values</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="text-center">
                        <div class="w-16 h-16 bg-primary/20 rounded-full flex items-center justify-center mx-auto mb-4">
                            <span class="material-symbols-outlined text-primary text-2xl">security</span>
                        </div>
                        <h3 class="text-lg font-bold text-[#111816] dark:text-white mb-2">Confidentiality</h3>
                        <p class="text-gray-600 dark:text-gray-400">Your privacy is our priority. All services are completely confidential.</p>
                    </div>

                    <div class="text-center">
                        <div class="w-16 h-16 bg-primary/20 rounded-full flex items-center justify-center mx-auto mb-4">
                            <span class="material-symbols-outlined text-primary text-2xl">favorite</span>
                        </div>
                        <h3 class="text-lg font-bold text-[#111816] dark:text-white mb-2">Compassion</h3>
                        <p class="text-gray-600 dark:text-gray-400">We provide non-judgmental support with empathy and understanding.</p>
                    </div>

                    <div class="text-center">
                        <div class="w-16 h-16 bg-primary/20 rounded-full flex items-center justify-center mx-auto mb-4">
                            <span class="material-symbols-outlined text-primary text-2xl">verified</span>
                        </div>
                        <h3 class="text-lg font-bold text-[#111816] dark:text-white mb-2">Evidence-Based</h3>
                        <p class="text-gray-600 dark:text-gray-400">All our resources and approaches are backed by research and best practices.</p>
                    </div>
                </div>
            </div>

            <!-- Call to Action -->
            <div class="bg-gradient-to-r from-primary/10 to-emerald-500/10 dark:from-primary/20 dark:to-emerald-500/20 rounded-2xl p-8 text-center">
                <h2 class="text-2xl font-bold text-[#111816] dark:text-white mb-4">Ready to Get Started?</h2>
                <p class="text-gray-600 dark:text-gray-400 mb-6">Join our community and take the first step towards wellness.</p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    @guest
                        <button onclick="openSignupModal()" class="inline-flex items-center gap-2 bg-primary text-white px-6 py-3 rounded-lg font-bold hover:bg-primary/90 transition-colors">
                            <span class="material-symbols-outlined">person_add</span>
                            Sign Up Now
                        </button>
                    @else
                        <a href="{{ route('dashboard') }}" class="inline-flex items-center gap-2 bg-primary text-white px-6 py-3 rounded-lg font-bold hover:bg-primary/90 transition-colors">
                            <span class="material-symbols-outlined">dashboard</span>
                            Go to Dashboard
                        </a>
                    @endguest
                    <a href="{{ route('public.contact') }}" class="inline-flex items-center gap-2 bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 text-[#111816] dark:text-white px-6 py-3 rounded-lg font-bold hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors">
                        <span class="material-symbols-outlined">mail</span>
                        Contact Us
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

@include('components.login-modal')
@endsection