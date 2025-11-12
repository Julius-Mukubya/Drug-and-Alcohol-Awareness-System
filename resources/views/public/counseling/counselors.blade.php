@extends('layouts.public')

@section('title', 'Our Counselors - MUBS Wellness Hub')

@section('content')
<!-- Hero Banner -->
<x-page-banner 
    title="Meet Our Professional Counselors" 
    subtitle="Our team of licensed mental health professionals brings years of experience and specialized training to support your wellbeing journey with compassion and confidentiality."
    badge="Our Counseling Team"
    badgeIcon="group"
/>

<!-- Filter Section -->
<div class="bg-white dark:bg-gray-800/50 border-b border-[#f0f4f3] dark:border-gray-800 sticky top-16 z-30">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
        <div class="flex flex-col sm:flex-row gap-4 items-center justify-between">
            <!-- Search Bar -->
            <div class="relative flex-1 max-w-md">
                <span class="material-symbols-outlined absolute left-3 top-1/2 transform -translate-y-1/2 text-[#61897c] dark:text-gray-400 !text-xl">search</span>
                <input type="text" placeholder="Search by name or specialization..." 
                       class="w-full pl-12 pr-4 py-3 rounded-xl border border-[#f0f4f3] dark:border-gray-700 bg-background-light dark:bg-background-dark text-[#111816] dark:text-white placeholder-[#61897c] dark:placeholder-gray-400 focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all duration-200">
            </div>
            
            <!-- Filter Buttons -->
            <div class="flex items-center gap-2 bg-gray-100 dark:bg-gray-800 p-1 rounded-xl">
                <button class="px-4 py-2 rounded-lg bg-primary text-white font-semibold text-sm transition-all duration-200 transform hover:scale-105 shadow-sm">
                    All Counselors
                </button>
                <button class="px-4 py-2 rounded-lg text-[#61897c] dark:text-gray-400 hover:text-[#111816] dark:hover:text-white font-medium text-sm transition-colors">
                    Available
                </button>
                <button class="px-4 py-2 rounded-lg text-[#61897c] dark:text-gray-400 hover:text-[#111816] dark:hover:text-white font-medium text-sm transition-colors">
                    By Specialty
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Counselors Grid -->
<div class="py-16 bg-background-light dark:bg-background-dark">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

            <!-- Counselor 1: Dr. Sarah Rodriguez -->
            <article class="group bg-white dark:bg-gray-800/50 rounded-3xl overflow-hidden shadow-sm hover:shadow-2xl transition-all duration-500 border border-[#f0f4f3] dark:border-gray-800 transform hover:-translate-y-2">
                <!-- Profile Header -->
                <div class="relative bg-gradient-to-br from-blue-500 to-indigo-600 p-8 text-white">
                    <div class="absolute top-4 right-4">
                        <div class="flex items-center gap-1.5 bg-white/20 backdrop-blur-sm px-3 py-1.5 rounded-full">
                            <span class="h-2 w-2 rounded-full bg-green-400 animate-pulse"></span>
                            <span class="text-xs font-semibold">Available</span>
                        </div>
                    </div>
                    
                    <div class="text-center">
                        <div class="w-24 h-24 bg-white/20 backdrop-blur-sm rounded-full flex items-center justify-center mx-auto mb-4 shadow-xl">
                            <span class="text-4xl font-bold text-white">DR</span>
                        </div>
                        <h3 class="text-2xl font-bold mb-1">Dr. Sarah Rodriguez</h3>
                        <p class="text-blue-100 text-sm font-medium">PhD, Clinical Psychologist</p>
                    </div>
                </div>
                
                <!-- Profile Content -->
                <div class="p-6 space-y-6">
                    <!-- Specializations -->
                    <div>
                        <h4 class="text-sm font-semibold text-[#111816] dark:text-white mb-3 flex items-center gap-2">
                            <span class="material-symbols-outlined !text-lg text-primary">psychology</span>
                            Specializations
                        </h4>
                        <div class="flex flex-wrap gap-2">
                            <span class="px-3 py-1 bg-blue-100 dark:bg-blue-900/30 text-blue-700 dark:text-blue-300 text-xs font-semibold rounded-full">Anxiety Disorders</span>
                            <span class="px-3 py-1 bg-blue-100 dark:bg-blue-900/30 text-blue-700 dark:text-blue-300 text-xs font-semibold rounded-full">Depression</span>
                            <span class="px-3 py-1 bg-blue-100 dark:bg-blue-900/30 text-blue-700 dark:text-blue-300 text-xs font-semibold rounded-full">Trauma Therapy</span>
                        </div>
                    </div>
                    
                    <!-- Experience -->
                    <div>
                        <h4 class="text-sm font-semibold text-[#111816] dark:text-white mb-2 flex items-center gap-2">
                            <span class="material-symbols-outlined !text-lg text-primary">work</span>
                            Experience
                        </h4>
                        <p class="text-sm text-[#61897c] dark:text-gray-400">8+ years in student counseling and mental health support</p>
                    </div>
                    
                    <!-- Approach -->
                    <div>
                        <h4 class="text-sm font-semibold text-[#111816] dark:text-white mb-2 flex items-center gap-2">
                            <span class="material-symbols-outlined !text-lg text-primary">lightbulb</span>
                            Approach
                        </h4>
                        <p class="text-sm text-[#61897c] dark:text-gray-400">Cognitive Behavioral Therapy (CBT) and mindfulness-based interventions</p>
                    </div>
                    
                    <!-- Action Buttons -->
                    <div class="flex gap-3 pt-4 border-t border-[#f0f4f3] dark:border-gray-700">
                        <a href="{{ route('public.counseling.counselor', 'sarah-rodriguez') }}" class="flex-1 bg-gradient-to-r from-primary to-emerald-500 text-white text-center py-3 rounded-xl font-bold hover:shadow-lg hover:shadow-primary/30 transition-all duration-200 transform hover:scale-105">
                            View Profile
                        </a>
                        <button class="px-4 py-3 bg-gray-100 dark:bg-gray-700 text-[#61897c] dark:text-gray-400 rounded-xl hover:bg-gray-200 dark:hover:bg-gray-600 transition-colors">
                            <span class="material-symbols-outlined !text-lg">bookmark_border</span>
                        </button>
                    </div>
                </div>
            </article>

            <!-- Counselor 2: Michael Johnson -->
            <article class="group bg-white dark:bg-gray-800/50 rounded-3xl overflow-hidden shadow-sm hover:shadow-2xl transition-all duration-500 border border-[#f0f4f3] dark:border-gray-800 transform hover:-translate-y-2">
                <!-- Profile Header -->
                <div class="relative bg-gradient-to-br from-emerald-500 to-teal-600 p-8 text-white">
                    <div class="absolute top-4 right-4">
                        <div class="flex items-center gap-1.5 bg-white/20 backdrop-blur-sm px-3 py-1.5 rounded-full">
                            <span class="h-2 w-2 rounded-full bg-green-400 animate-pulse"></span>
                            <span class="text-xs font-semibold">Available</span>
                        </div>
                    </div>
                    
                    <div class="text-center">
                        <div class="w-24 h-24 bg-white/20 backdrop-blur-sm rounded-full flex items-center justify-center mx-auto mb-4 shadow-xl">
                            <span class="text-4xl font-bold text-white">MJ</span>
                        </div>
                        <h3 class="text-2xl font-bold mb-1">Michael Johnson</h3>
                        <p class="text-emerald-100 text-sm font-medium">LCSW, Licensed Counselor</p>
                    </div>
                </div>
                
                <!-- Profile Content -->
                <div class="p-6 space-y-6">
                    <!-- Specializations -->
                    <div>
                        <h4 class="text-sm font-semibold text-[#111816] dark:text-white mb-3 flex items-center gap-2">
                            <span class="material-symbols-outlined !text-lg text-primary">psychology</span>
                            Specializations
                        </h4>
                        <div class="flex flex-wrap gap-2">
                            <span class="px-3 py-1 bg-emerald-100 dark:bg-emerald-900/30 text-emerald-700 dark:text-emerald-300 text-xs font-semibold rounded-full">Addiction</span>
                            <span class="px-3 py-1 bg-emerald-100 dark:bg-emerald-900/30 text-emerald-700 dark:text-emerald-300 text-xs font-semibold rounded-full">Peer Pressure</span>
                            <span class="px-3 py-1 bg-emerald-100 dark:bg-emerald-900/30 text-emerald-700 dark:text-emerald-300 text-xs font-semibold rounded-full">Academic Stress</span>
                        </div>
                    </div>
                    
                    <!-- Experience -->
                    <div>
                        <h4 class="text-sm font-semibold text-[#111816] dark:text-white mb-2 flex items-center gap-2">
                            <span class="material-symbols-outlined !text-lg text-primary">work</span>
                            Experience
                        </h4>
                        <p class="text-sm text-[#61897c] dark:text-gray-400">6+ years in academic and career counseling</p>
                    </div>
                    
                    <!-- Approach -->
                    <div>
                        <h4 class="text-sm font-semibold text-[#111816] dark:text-white mb-2 flex items-center gap-2">
                            <span class="material-symbols-outlined !text-lg text-primary">lightbulb</span>
                            Approach
                        </h4>
                        <p class="text-sm text-[#61897c] dark:text-gray-400">Solution-focused therapy and motivational interviewing</p>
                    </div>
                    
                    <!-- Action Buttons -->
                    <div class="flex gap-3 pt-4 border-t border-[#f0f4f3] dark:border-gray-700">
                        <a href="{{ route('public.counseling.counselor', 'michael-johnson') }}" class="flex-1 bg-gradient-to-r from-primary to-emerald-500 text-white text-center py-3 rounded-xl font-bold hover:shadow-lg hover:shadow-primary/30 transition-all duration-200 transform hover:scale-105">
                            View Profile
                        </a>
                        <button class="px-4 py-3 bg-gray-100 dark:bg-gray-700 text-[#61897c] dark:text-gray-400 rounded-xl hover:bg-gray-200 dark:hover:bg-gray-600 transition-colors">
                            <span class="material-symbols-outlined !text-lg">bookmark_border</span>
                        </button>
                    </div>
                </div>
            </article>

            <!-- Counselor 3: Dr. Aisha Chen -->
            <article class="group bg-white dark:bg-gray-800/50 rounded-3xl overflow-hidden shadow-sm hover:shadow-2xl transition-all duration-500 border border-[#f0f4f3] dark:border-gray-800 transform hover:-translate-y-2">
                <!-- Profile Header -->
                <div class="relative bg-gradient-to-br from-purple-500 to-pink-600 p-8 text-white">
                    <div class="absolute top-4 right-4">
                        <div class="flex items-center gap-1.5 bg-white/20 backdrop-blur-sm px-3 py-1.5 rounded-full">
                            <span class="h-2 w-2 rounded-full bg-gray-400"></span>
                            <span class="text-xs font-semibold">Booked</span>
                        </div>
                    </div>
                    
                    <div class="text-center">
                        <div class="w-24 h-24 bg-white/20 backdrop-blur-sm rounded-full flex items-center justify-center mx-auto mb-4 shadow-xl">
                            <span class="text-4xl font-bold text-white">AC</span>
                        </div>
                        <h3 class="text-2xl font-bold mb-1">Dr. Aisha Chen</h3>
                        <p class="text-purple-100 text-sm font-medium">M.A., Family Therapist</p>
                    </div>
                </div>
                
                <!-- Profile Content -->
                <div class="p-6 space-y-6">
                    <!-- Specializations -->
                    <div>
                        <h4 class="text-sm font-semibold text-[#111816] dark:text-white mb-3 flex items-center gap-2">
                            <span class="material-symbols-outlined !text-lg text-primary">psychology</span>
                            Specializations
                        </h4>
                        <div class="flex flex-wrap gap-2">
                            <span class="px-3 py-1 bg-purple-100 dark:bg-purple-900/30 text-purple-700 dark:text-purple-300 text-xs font-semibold rounded-full">Relationships</span>
                            <span class="px-3 py-1 bg-purple-100 dark:bg-purple-900/30 text-purple-700 dark:text-purple-300 text-xs font-semibold rounded-full">Group Therapy</span>
                            <span class="px-3 py-1 bg-purple-100 dark:bg-purple-900/30 text-purple-700 dark:text-purple-300 text-xs font-semibold rounded-full">Cultural Issues</span>
                        </div>
                    </div>
                    
                    <!-- Experience -->
                    <div>
                        <h4 class="text-sm font-semibold text-[#111816] dark:text-white mb-2 flex items-center gap-2">
                            <span class="material-symbols-outlined !text-lg text-primary">work</span>
                            Experience
                        </h4>
                        <p class="text-sm text-[#61897c] dark:text-gray-400">10+ years in family and group therapy</p>
                    </div>
                    
                    <!-- Approach -->
                    <div>
                        <h4 class="text-sm font-semibold text-[#111816] dark:text-white mb-2 flex items-center gap-2">
                            <span class="material-symbols-outlined !text-lg text-primary">lightbulb</span>
                            Approach
                        </h4>
                        <p class="text-sm text-[#61897c] dark:text-gray-400">Culturally responsive therapy and family systems approach</p>
                    </div>
                    
                    <!-- Action Buttons -->
                    <div class="flex gap-3 pt-4 border-t border-[#f0f4f3] dark:border-gray-700">
                        <a href="{{ route('public.counseling.counselor', 'aisha-chen') }}" class="flex-1 bg-gradient-to-r from-primary to-emerald-500 text-white text-center py-3 rounded-xl font-bold hover:shadow-lg hover:shadow-primary/30 transition-all duration-200 transform hover:scale-105">
                            View Profile
                        </a>
                        <button class="px-4 py-3 bg-gray-100 dark:bg-gray-700 text-[#61897c] dark:text-gray-400 rounded-xl hover:bg-gray-200 dark:hover:bg-gray-600 transition-colors">
                            <span class="material-symbols-outlined !text-lg">bookmark_border</span>
                        </button>
                    </div>
                </div>
            </article>
        </div>
    </div>
</div>

<!-- Call to Action Section -->
<div class="py-20 bg-gradient-to-r from-primary/10 via-background-light to-purple-500/10 dark:from-primary/20 dark:via-background-dark dark:to-purple-500/20">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl md:text-4xl font-black text-[#111816] dark:text-white mb-6">
            Ready to Connect with a Counselor?
        </h2>
        <p class="text-xl text-[#61897c] dark:text-gray-400 mb-8 max-w-2xl mx-auto">
            Take the first step towards better mental health. Request a session with one of our professional counselors today.
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            @auth
                @if(auth()->user()->role === 'student')
                    <a href="{{ route('student.counseling.create') }}" class="inline-flex items-center gap-2 bg-primary text-white px-8 py-4 rounded-xl font-bold hover:bg-primary/90 transition-all duration-200 transform hover:scale-105 shadow-lg">
                        <span class="material-symbols-outlined !text-xl">add_circle</span>
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
            
            <a href="{{ route('public.counseling.index') }}" class="inline-flex items-center gap-2 bg-white dark:bg-gray-800 border border-[#f0f4f3] dark:border-gray-700 text-[#111816] dark:text-white px-8 py-4 rounded-xl font-bold hover:bg-gray-50 dark:hover:bg-gray-700 transition-all duration-200 transform hover:scale-105">
                <span class="material-symbols-outlined !text-xl">arrow_back</span>
                Back to Services
            </a>
        </div>
    </div>
</div>

@include('components.login-modal')
@endsection

@push('styles')
<style>
    .animate-pulse {
        animation: pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite;
    }
    
    @keyframes pulse {
        0%, 100% { opacity: 1; }
        50% { opacity: 0.5; }
    }
</style>
@endpush

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Search functionality
    const searchInput = document.querySelector('input[placeholder*="Search"]');
    if (searchInput) {
        searchInput.addEventListener('input', function(e) {
            const searchTerm = e.target.value.toLowerCase();
            const counselorCards = document.querySelectorAll('article.group');
            
            counselorCards.forEach(card => {
                const text = card.textContent.toLowerCase();
                if (text.includes(searchTerm)) {
                    card.style.display = 'block';
                } else {
                    card.style.display = 'none';
                }
            });
        });
    }
    
    // Filter buttons
    const filterButtons = document.querySelectorAll('.flex.items-center.gap-2.bg-gray-100 button');
    filterButtons.forEach(button => {
        button.addEventListener('click', function() {
            // Remove active state from all buttons
            filterButtons.forEach(btn => {
                btn.className = btn.className.replace(/bg-primary text-white/, 'text-[#61897c] dark:text-gray-400 hover:text-[#111816] dark:hover:text-white');
            });
            
            // Add active state to clicked button
            this.className = this.className.replace(/text-\[#61897c\] dark:text-gray-400 hover:text-\[#111816\] dark:hover:text-white/, 'bg-primary text-white');
            
            const filterType = this.textContent.trim();
            const counselorCards = document.querySelectorAll('article.group');
            
            counselorCards.forEach(card => {
                if (filterType === 'All Counselors') {
                    card.style.display = 'block';
                } else if (filterType === 'Available') {
                    const badge = card.querySelector('.animate-pulse');
                    card.style.display = badge ? 'block' : 'none';
                }
            });
        });
    });
    
    // Bookmark functionality
    const bookmarkButtons = document.querySelectorAll('button .material-symbols-outlined');
    bookmarkButtons.forEach(icon => {
        if (icon.textContent === 'bookmark_border') {
            icon.parentElement.addEventListener('click', function(e) {
                e.preventDefault();
                if (icon.textContent === 'bookmark_border') {
                    icon.textContent = 'bookmark';
                    icon.classList.add('text-primary');
                } else {
                    icon.textContent = 'bookmark_border';
                    icon.classList.remove('text-primary');
                }
            });
        }
    });
    
    // Fade-in animation
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
            }
        });
    }, { threshold: 0.1 });
    
    document.querySelectorAll('article.group').forEach(card => {
        card.style.opacity = '0';
        card.style.transform = 'translateY(20px)';
        card.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
        observer.observe(card);
    });
});
</script>
@endpush