@extends('layouts.public')

@section('title', 'Awareness Campaigns - MUBS D&A Awareness Platform')

@section('content')
<div class="w-full">
    <!-- Header Section -->
    <div class="bg-gradient-to-r from-primary/10 to-blue-500/10 py-16">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-4xl font-bold text-[#111816] dark:text-white mb-4">Awareness Campaigns</h1>
            <p class="text-lg text-gray-600 dark:text-gray-400 max-w-3xl mx-auto">
                Join our initiatives to promote mental health awareness, substance education, and campus wellbeing. 
                Together, we can create a supportive community for all MUBS students.
            </p>
        </div>
    </div>

    <!-- Active Campaigns -->
    @if(isset($activeCampaigns) && $activeCampaigns->count() > 0)
    <div class="py-16 bg-background-light dark:bg-background-dark">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl font-bold text-[#111816] dark:text-white mb-8 text-center">Active Campaigns</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                @foreach($activeCampaigns as $campaign)
                <div class="bg-gradient-to-br from-primary/20 to-green-500/20 rounded-xl overflow-hidden border border-primary/30">
                    @if($campaign->banner_image)
                        <img src="{{ $campaign->banner_url }}" alt="{{ $campaign->title }}" class="w-full h-48 object-cover">
                    @endif
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-3">
                            <span class="px-3 py-1 bg-green-100 text-green-800 text-sm font-medium rounded-full dark:bg-green-900 dark:text-green-300">
                                Active
                            </span>
                            <span class="text-sm text-gray-600 dark:text-gray-400">
                                {{ $campaign->participants()->count() }} participants
                            </span>
                        </div>
                        <h3 class="text-xl font-bold text-[#111816] dark:text-white mb-2">{{ $campaign->title }}</h3>
                        <p class="text-gray-600 dark:text-gray-400 mb-4">{{ Str::limit($campaign->description, 150) }}</p>
                        <div class="flex items-center justify-between mb-4">
                            <span class="text-sm text-gray-500 dark:text-gray-400">
                                {{ $campaign->start_date->format('M d') }} - {{ $campaign->end_date->format('M d, Y') }}
                            </span>
                        </div>
                        <a href="{{ route('campaigns.show', $campaign) }}" class="w-full bg-primary text-[#111816] text-center py-3 rounded-lg font-bold hover:bg-primary/90 transition-colors block">
                            Join Campaign
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    @endif

    <!-- Upcoming Campaigns -->
    @if(isset($upcomingCampaigns) && $upcomingCampaigns->count() > 0)
    <div class="py-16 {{ isset($activeCampaigns) && $activeCampaigns->count() > 0 ? 'bg-gray-50 dark:bg-black/20' : 'bg-background-light dark:bg-background-dark' }}">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl font-bold text-[#111816] dark:text-white mb-8 text-center">Upcoming Campaigns</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($upcomingCampaigns as $campaign)
                <div class="bg-white dark:bg-gray-800 rounded-xl overflow-hidden border border-gray-200 dark:border-gray-700 hover:shadow-lg transition-shadow">
                    @if($campaign->banner_image)
                        <img src="{{ $campaign->banner_url }}" alt="{{ $campaign->title }}" class="w-full h-48 object-cover">
                    @endif
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-3">
                            <span class="px-3 py-1 bg-blue-100 text-blue-800 text-sm font-medium rounded-full dark:bg-blue-900 dark:text-blue-300">
                                Upcoming
                            </span>
                        </div>
                        <h3 class="text-lg font-bold text-[#111816] dark:text-white mb-2">{{ $campaign->title }}</h3>
                        <p class="text-gray-600 dark:text-gray-400 text-sm mb-4">{{ Str::limit($campaign->description, 120) }}</p>
                        <div class="flex items-center justify-between mb-4">
                            <span class="text-sm text-gray-500 dark:text-gray-400">
                                Starts {{ $campaign->start_date->format('M d, Y') }}
                            </span>
                        </div>
                        <a href="{{ route('campaigns.show', $campaign) }}" class="w-full bg-gray-200 dark:bg-gray-700 text-[#111816] dark:text-white text-center py-2 rounded-lg font-medium hover:bg-gray-300 dark:hover:bg-gray-600 transition-colors block text-sm">
                            Learn More
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    @endif

    <!-- Default State -->
    @if((!isset($activeCampaigns) || $activeCampaigns->count() === 0) && (!isset($upcomingCampaigns) || $upcomingCampaigns->count() === 0))
    <div class="py-16 bg-background-light dark:bg-background-dark">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <x-default-campaign-cards />
            </div>
        </div>
    </div>
    @endif
</div>
@endsection