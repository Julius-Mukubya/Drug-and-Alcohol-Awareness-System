@extends('layouts.public')

@section('title', $campaign->title . ' - MUBS D&A Awareness Platform')

@section('content')
<div class="w-full">
    <!-- Campaign Header -->
    <div class="relative">
        @if($campaign->banner_image)
            <img src="{{ $campaign->banner_url }}" alt="{{ $campaign->title }}" class="w-full h-64 md:h-96 object-cover">
            <div class="absolute inset-0 bg-black/50"></div>
        @else
            <div class="bg-gradient-to-r from-primary to-blue-600 h-64 md:h-96"></div>
        @endif
        
        <div class="absolute inset-0 flex items-center justify-center">
            <div class="text-center text-white max-w-4xl mx-auto px-4">
                <h1 class="text-3xl md:text-5xl font-bold mb-4">{{ $campaign->title }}</h1>
                <p class="text-lg md:text-xl text-gray-200 mb-6">{{ $campaign->description }}</p>
                
                <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
                    <div class="flex items-center text-white/90">
                        <span class="material-symbols-outlined mr-2">calendar_today</span>
                        <span>{{ $campaign->start_date->format('M d') }} - {{ $campaign->end_date->format('M d, Y') }}</span>
                    </div>
                    <div class="flex items-center text-white/90">
                        <span class="material-symbols-outlined mr-2">group</span>
                        <span>{{ $campaign->participants()->count() }} participants</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Campaign Content -->
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <!-- Status and Actions -->
        <div class="bg-white dark:bg-gray-800 rounded-xl border border-gray-200 dark:border-gray-700 p-6 mb-8">
            <div class="flex flex-col md:flex-row items-start md:items-center justify-between gap-4">
                <div>
                    <div class="flex items-center gap-3 mb-2">
                        <span class="px-3 py-1 text-sm font-medium rounded-full
                            @if($campaign->status === 'active') bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-300
                            @elseif($campaign->status === 'upcoming') bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-300
                            @else bg-gray-100 text-gray-800 dark:bg-gray-900 dark:text-gray-300
                            @endif">
                            {{ ucfirst($campaign->status) }}
                        </span>
                        <span class="text-sm text-gray-600 dark:text-gray-400">
                            {{ $campaign->type ? ucfirst($campaign->type) : 'General' }} Campaign
                        </span>
                    </div>
                    <p class="text-gray-600 dark:text-gray-400">
                        Created by {{ $campaign->creator->name }} • {{ $campaign->participants()->count() }} participants
                    </p>
                </div>
                
                @auth
                    @if($campaign->status === 'active')
                        @if($isRegistered)
                            <form method="POST" action="{{ route('campaigns.unregister', $campaign) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-gray-200 text-gray-800 px-6 py-3 rounded-lg font-medium hover:bg-gray-300 transition-colors">
                                    Leave Campaign
                                </button>
                            </form>
                        @else
                            <form method="POST" action="{{ route('campaigns.register', $campaign) }}">
                                @csrf
                                <button type="submit" class="bg-primary text-[#111816] px-6 py-3 rounded-lg font-bold hover:bg-primary/90 transition-colors">
                                    Join Campaign
                                </button>
                            </form>
                        @endif
                    @else
                        <div class="text-gray-500 dark:text-gray-400 text-sm">
                            @if($campaign->status === 'upcoming')
                                Campaign starts {{ $campaign->start_date->format('M d, Y') }}
                            @else
                                Campaign has ended
                            @endif
                        </div>
                    @endif
                @else
                    <button onclick="openLoginModal()" class="bg-primary text-[#111816] px-6 py-3 rounded-lg font-bold hover:bg-primary/90 transition-colors">
                        Login to Join
                    </button>
                @endauth
            </div>
        </div>

        <!-- Campaign Details -->
        <div class="prose prose-lg max-w-none dark:prose-invert mb-8">
            <h2>About This Campaign</h2>
            <p>{{ $campaign->description }}</p>
            
            @if($campaign->goals)
                <h3>Goals & Objectives</h3>
                <p>{{ $campaign->goals }}</p>
            @endif
            
            @if($campaign->target_audience)
                <h3>Target Audience</h3>
                <p>{{ $campaign->target_audience }}</p>
            @endif
        </div>

        <!-- Campaign Timeline -->
        <div class="bg-gray-50 dark:bg-gray-800/50 rounded-xl p-6 mb-8">
            <h3 class="text-xl font-bold text-[#111816] dark:text-white mb-4">Campaign Timeline</h3>
            <div class="space-y-4">
                <div class="flex items-center">
                    <div class="w-3 h-3 bg-primary rounded-full mr-4"></div>
                    <div>
                        <p class="font-medium text-[#111816] dark:text-white">Campaign Start</p>
                        <p class="text-sm text-gray-600 dark:text-gray-400">{{ $campaign->start_date->format('F d, Y') }}</p>
                    </div>
                </div>
                <div class="flex items-center">
                    <div class="w-3 h-3 bg-gray-300 rounded-full mr-4"></div>
                    <div>
                        <p class="font-medium text-[#111816] dark:text-white">Campaign End</p>
                        <p class="text-sm text-gray-600 dark:text-gray-400">{{ $campaign->end_date->format('F d, Y') }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Call to Action -->
        @if($campaign->status === 'active' && !$isRegistered)
        <div class="bg-primary/10 border border-primary/20 rounded-xl p-6 text-center">
            <h3 class="text-xl font-bold text-[#111816] dark:text-white mb-2">Ready to Make a Difference?</h3>
            <p class="text-gray-600 dark:text-gray-400 mb-4">
                Join {{ $campaign->participants()->count() }} other MUBS students in this important initiative.
            </p>
            @auth
                <form method="POST" action="{{ route('campaigns.register', $campaign) }}" class="inline">
                    @csrf
                    <button type="submit" class="bg-primary text-[#111816] px-8 py-3 rounded-lg font-bold hover:bg-primary/90 transition-colors">
                        Join Campaign Now
                    </button>
                </form>
            @else
                <button onclick="openSignupModal()" class="bg-primary text-[#111816] px-8 py-3 rounded-lg font-bold hover:bg-primary/90 transition-colors">
                    Sign Up to Join
                </button>
            @endauth
        </div>
        @endif
    </div>
</div>
@endsection