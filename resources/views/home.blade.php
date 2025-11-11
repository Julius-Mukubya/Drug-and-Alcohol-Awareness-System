@extends('layouts.app')

@section('title', 'MUBS Student Awareness & Counseling Platform')

@section('content')
<!-- Hero Section -->
<div class="bg-gradient-to-r from-primary to-blue-600 text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24">
        <div class="text-center">
            <h1 class="text-4xl md:text-6xl font-bold mb-6">
                Your Wellbeing Matters
            </h1>
            <p class="text-xl md:text-2xl mb-8 text-blue-100">
                Access resources, take assessments, and get support at MUBS Student Awareness Platform
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                @auth
                    <a href="{{ route('dashboard') }}" class="bg-white text-primary px-8 py-3 rounded-lg font-semibold hover:bg-gray-100 transition-colors">
                        Go to Dashboard
                    </a>
                @else
                    <a href="{{ route('register') }}" class="bg-white text-primary px-8 py-3 rounded-lg font-semibold hover:bg-gray-100 transition-colors">
                        Get Started
                    </a>
                    <a href="{{ route('login') }}" class="border-2 border-white text-white px-8 py-3 rounded-lg font-semibold hover:bg-white hover:text-primary transition-colors">
                        Sign In
                    </a>
                @endauth
            </div>
        </div>
    </div>
</div>

<!-- Features Section -->
<div class="py-16 bg-gray-50 dark:bg-gray-900">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-4">
                Comprehensive Support Services
            </h2>
            <p class="text-lg text-gray-600 dark:text-gray-400">
                Everything you need for mental health awareness and support
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="bg-white dark:bg-gray-800 p-6 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700">
                <div class="w-12 h-12 bg-primary/10 rounded-lg flex items-center justify-center mb-4">
                    <span class="material-symbols-outlined text-primary text-2xl">psychology</span>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-2">Self-Assessment Tools</h3>
                <p class="text-gray-600 dark:text-gray-400">
                    Take AUDIT/DUDIT assessments to understand your relationship with substances and get personalized recommendations.
                </p>
            </div>

            <div class="bg-white dark:bg-gray-800 p-6 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700">
                <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center mb-4">
                    <span class="material-symbols-outlined text-green-600 text-2xl">support_agent</span>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-2">Professional Counseling</h3>
                <p class="text-gray-600 dark:text-gray-400">
                    Connect with qualified counselors for confidential support and guidance through difficult times.
                </p>
            </div>

            <div class="bg-white dark:bg-gray-800 p-6 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700">
                <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mb-4">
                    <span class="material-symbols-outlined text-blue-600 text-2xl">library_books</span>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-2">Educational Resources</h3>
                <p class="text-gray-600 dark:text-gray-400">
                    Access articles, videos, and interactive content about mental health, substance awareness, and wellbeing.
                </p>
            </div>
        </div>
    </div>
</div>

<!-- Featured Content -->
@if($featuredContents->count() > 0)
<div class="py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-4">
                Featured Resources
            </h2>
            <p class="text-lg text-gray-600 dark:text-gray-400">
                Latest articles and resources to support your wellbeing journey
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($featuredContents as $content)
            <article class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 overflow-hidden hover:shadow-md transition-shadow">
                @if($content->featured_image)
                <img src="{{ $content->featured_image_url }}" alt="{{ $content->title }}" class="w-full h-48 object-cover">
                @endif
                <div class="p-6">
                    <div class="flex items-center mb-2">
                        <span class="px-2 py-1 text-xs font-medium text-primary bg-primary/10 rounded-full">
                            {{ $content->category->name }}
                        </span>
                        <span class="ml-2 text-sm text-gray-500 dark:text-gray-400">
                            {{ $content->reading_time }} min read
                        </span>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">
                        <a href="{{ route('content.show', $content) }}" class="hover:text-primary">
                            {{ $content->title }}
                        </a>
                    </h3>
                    <p class="text-gray-600 dark:text-gray-400 text-sm mb-4">
                        {{ Str::limit($content->description, 120) }}
                    </p>
                    <div class="flex items-center justify-between">
                        <span class="text-sm text-gray-500 dark:text-gray-400">
                            By {{ $content->author->name }}
                        </span>
                        <a href="{{ route('content.show', $content) }}" class="text-primary hover:underline text-sm font-medium">
                            Read More →
                        </a>
                    </div>
                </div>
            </article>
            @endforeach
        </div>

        <div class="text-center mt-12">
            <a href="{{ route('content.index') }}" class="bg-primary text-white px-8 py-3 rounded-lg font-semibold hover:opacity-90 transition-opacity">
                View All Resources
            </a>
        </div>
    </div>
</div>
@endif

<!-- Categories -->
@if($categories->count() > 0)
<div class="py-16 bg-gray-50 dark:bg-gray-900">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-4">
                Explore Topics
            </h2>
            <p class="text-lg text-gray-600 dark:text-gray-400">
                Find resources organized by topic areas
            </p>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
            @foreach($categories as $category)
            <a href="{{ route('content.index', ['category' => $category->slug]) }}" class="bg-white dark:bg-gray-800 p-6 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 text-center hover:shadow-md transition-shadow group">
                <div class="w-12 h-12 bg-primary/10 rounded-lg flex items-center justify-center mx-auto mb-3 group-hover:bg-primary/20 transition-colors">
                    <span class="material-symbols-outlined text-primary text-2xl">{{ $category->icon ?? 'category' }}</span>
                </div>
                <h3 class="font-semibold text-gray-900 dark:text-white mb-1">{{ $category->name }}</h3>
                <p class="text-sm text-gray-500 dark:text-gray-400">{{ $category->contents_count }} resources</p>
            </a>
            @endforeach
        </div>
    </div>
</div>
@endif

<!-- Active Campaigns -->
@if($activeCampaigns->count() > 0)
<div class="py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-4">
                Active Campaigns
            </h2>
            <p class="text-lg text-gray-600 dark:text-gray-400">
                Join our awareness campaigns and make a difference
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach($activeCampaigns as $campaign)
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 overflow-hidden">
                @if($campaign->banner_image)
                <img src="{{ $campaign->banner_url }}" alt="{{ $campaign->title }}" class="w-full h-48 object-cover">
                @endif
                <div class="p-6">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">{{ $campaign->title }}</h3>
                    <p class="text-gray-600 dark:text-gray-400 text-sm mb-4">{{ Str::limit($campaign->description, 120) }}</p>
                    <div class="flex items-center justify-between mb-4">
                        <span class="text-sm text-gray-500 dark:text-gray-400">
                            {{ $campaign->start_date->format('M d') }} - {{ $campaign->end_date->format('M d, Y') }}
                        </span>
                        <span class="px-2 py-1 text-xs font-medium text-green-800 bg-green-100 rounded-full dark:bg-green-900 dark:text-green-300">
                            Active
                        </span>
                    </div>
                    <a href="{{ route('campaigns.show', $campaign) }}" class="w-full bg-primary text-white text-center py-2 rounded-lg hover:opacity-90 transition-opacity block">
                        Learn More
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endif

<!-- CTA Section -->
<div class="bg-primary text-white py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl font-bold mb-4">Ready to Start Your Wellbeing Journey?</h2>
        <p class="text-xl text-blue-100 mb-8">Join thousands of MUBS students taking control of their mental health</p>
        @guest
        <a href="{{ route('register') }}" class="bg-white text-primary px-8 py-3 rounded-lg font-semibold hover:bg-gray-100 transition-colors">
            Sign Up Today
        </a>
        @else
        <a href="{{ route('dashboard') }}" class="bg-white text-primary px-8 py-3 rounded-lg font-semibold hover:bg-gray-100 transition-colors">
            Continue Your Journey
        </a>
        @endguest
    </div>
</div>
@endsection