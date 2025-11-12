@extends('layouts.public')

@section('title', 'MUBS D&A Awareness Platform - Your Wellbeing Matters')

@section('content')
<div class="w-full">
    <!-- Hero Section -->
    <div class="relative w-full py-20 sm:py-32">
        <img alt="Abstract green leaves background" class="absolute inset-0 h-full w-full object-cover" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBaei4zVm6LMjCzOVeGiCrhI7yoToYFSZ67NFRSOpSi2mS78a4OlW5SUWJ6pb6uehKbKJYkyLdYuWxLOLcYqgTxhJDdOV5-TGjhJGRIC6Mw6f0BpUtqOf2WUzvouDx1C-cX7IZq5sTR_0tZQY81G8hmA7w609vHtY53hIjl_Z7uKMuJtcfu9xj_w-h5h-tQzhnl1SKW4blx_rDkSirm7BB0IdRYU1p10v-DVIT3Qqi_xtXuBK_86-uuVTLeC4WFxj7_2DutIbO4XA"/>
        <div class="absolute inset-0 bg-gradient-to-br from-mubs-blue/80 to-primary/60 dark:from-mubs-blue/90 dark:to-background-dark/70"></div>
        <div class="relative max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col gap-6 items-center justify-center text-center text-white">
                <div class="flex flex-col gap-4 max-w-3xl">
                    <h1 class="text-4xl font-black leading-tight tracking-tighter sm:text-5xl md:text-6xl">Your Wellbeing Matters</h1>
                    <h2 class="text-gray-200 text-base font-normal leading-normal sm:text-lg">A confidential space for MUBS students to find support, information, and resources for drug and alcohol awareness.</h2>
                </div>
                <div class="flex flex-col sm:flex-row gap-4 mt-6">
                    @guest
                        <button onclick="openSignupModal()" class="flex min-w-[140px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-lg h-12 px-6 bg-primary text-mubs-blue text-base font-bold leading-normal tracking-[0.015em] hover:bg-white transition-colors">
                            <span class="truncate">Get Started</span>
                        </button>
                        <button onclick="openLoginModal()" class="flex min-w-[140px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-lg h-12 px-6 bg-white/20 text-white text-base font-bold leading-normal tracking-[0.015em] border border-white/50 hover:bg-white/30 transition-colors">
                            <span class="truncate">Sign In</span>
                        </button>
                    @else
                        <a class="flex min-w-[140px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-lg h-12 px-6 bg-primary text-mubs-blue text-base font-bold leading-normal tracking-[0.015em] hover:bg-white transition-colors" href="{{ route('dashboard') }}">
                            <span class="truncate">Go to Dashboard</span>
                        </a>
                    @endguest
                </div>
            </div>
        </div>
    </div>

    <!-- Services Section -->
    <div class="w-full bg-background-light dark:bg-background-dark py-16 sm:py-24">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                <x-service-card 
                    icon="quiz"
                    title="Self-Assessment Tools"
                    description="Understand your habits with confidential, easy-to-use assessment tools."
                />
                <x-service-card 
                    icon="health_and_safety"
                    title="Professional Counseling"
                    description="Connect with qualified counselors for private and supportive guidance."
                />
                <x-service-card 
                    icon="auto_stories"
                    title="Educational Resources"
                    description="Access a rich library of articles, videos, and guides to stay informed."
                />
            </div>
        </div>
    </div>
    
    <!-- Featured Content Section -->
    <div class="w-full bg-gray-50 dark:bg-black/20 py-16 sm:py-24">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <x-section-header 
                title="Featured Content"
                description="Stay informed with our latest articles, videos, and expert advice on substance awareness and wellbeing."
            />
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 mt-12">
                @if(isset($featuredContents) && $featuredContents->count() > 0)
                    @foreach($featuredContents->take(6) as $content)
                    <x-content-card 
                        :title="$content->title"
                        :category="$content->category->name ?? 'General'"
                        :description="$content->description"
                        :image="$content->featured_image ? $content->featured_image_url : 'https://lh3.googleusercontent.com/aida-public/AB6AXuDuXoSapEBaja_kQ1hrYBGTGOGzYhm8hAs4J1cnbzKK5K4J3XnDAZgVzVLDrTSqsLKear5TspYM6ur2y5JoX9vXUlm6wR287hGWzn1-HvqOtuRpyVefLK8NtI5ORkjQFiB6MBqwd8fwMNkEHk84VAS-lbFQyOMpL7VoHohpIb_HpqXUYCS7bIDxZU8Xf5CN7riZcvzO2voJDsPEsy3bKcGBVfn1UoAm23rLIjMHroTlkiDHVGlaEGfPWH-OE908XwE3hynanLtD3w'"
                        :type="$content->type"
                        :url="route('content.show', $content)"
                    />
                    @endforeach
                @else
                    <!-- Default sample content cards -->
                    <x-default-content-cards />
                @endif
            </div>
        </div>
    </div>

    <!-- Topics Section -->
    <div class="w-full py-16 sm:py-24 bg-background-light dark:bg-background-dark">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <x-section-header 
                title="Explore Topics"
                description="Find information and resources on topics that matter to you."
            />
            <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-4 mt-12 text-center">
                @if(isset($categories) && $categories->count() > 0)
                    @foreach($categories->take(8) as $category)
                    <x-topic-card 
                        :icon="$category->icon ?? 'category'"
                        :title="$category->name"
                        :url="route('content.index', ['category' => $category->slug])"
                    />
                    @endforeach
                @else
                    <!-- Default topic categories -->
                    <x-default-topic-cards />
                @endif
            </div>
        </div>
    </div>
    
    <!-- Active Campaigns Section -->
    <div class="w-full py-16 sm:py-24 bg-gray-50 dark:bg-black/20">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <x-section-header 
                title="Active Campaigns"
                description="Get involved in our latest initiatives to promote a healthy and safe campus environment."
            />
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mt-12">
                @if(isset($activeCampaigns) && $activeCampaigns->count() > 0)
                    @foreach($activeCampaigns->take(2) as $campaign)
                    <x-campaign-card 
                        :title="$campaign->title"
                        :description="$campaign->description"
                        :image="$campaign->banner_image ? $campaign->banner_url : 'https://lh3.googleusercontent.com/aida-public/AB6AXuAwMb1C6MtZohZ1eKj35TLv2GRwHxtebwwtcIyoiKVjFHFn_B9GvgNA4sAOEpEklaHgWJhvgYRFrxlrKsZYFL9EW7KMeKnDYhkx3SY2uLUF0PvOgmFKCJw2PZWnYEKqYydHlRUMP5uzn0tlgh57_Kdn8DD4cStq8lJxOdV2OVatvClqef6yur4lj7arsClsRFtvvwWDEj0VdbZpwtP76ebmYNeatBGOTQzbreTDo1BrztNhb3ruUgMB2GOgaUYgkKIFa_ybhunxUA'"
                        :url="route('campaigns.show', $campaign)"
                    />
                    @endforeach
                @else
                    <!-- Default campaign cards -->
                    <x-default-campaign-cards />
                @endif
            </div>
        </div>
    </div>

    <!-- Call to Action Section -->
    <div class="w-full py-16 sm:py-24 bg-background-light dark:bg-background-dark">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-gradient-to-r from-primary/80 to-primary rounded-xl p-8 md:p-12 text-center">
                <h2 class="text-3xl font-bold text-background-dark tracking-tight">Ready to Take the Next Step?</h2>
                <p class="mt-4 text-lg text-background-dark/80 max-w-2xl mx-auto">Create a free, confidential account to access personalized tools, save resources, and connect with counselors.</p>
                <div class="mt-8 grid grid-cols-1 sm:grid-cols-3 gap-8 text-background-dark">
                    <div class="flex flex-col">
                        <span class="text-4xl font-black">100%</span>
                        <span class="text-sm font-medium">Confidential</span>
                    </div>
                    <div class="flex flex-col">
                        <span class="text-4xl font-black">500+</span>
                        <span class="text-sm font-medium">Students Supported</span>
                    </div>
                    <div class="flex flex-col">
                        <span class="text-4xl font-black">24/7</span>
                        <span class="text-sm font-medium">Resource Access</span>
                    </div>
                </div>
                @guest
                    <button onclick="openSignupModal()" class="inline-block mt-10 rounded-lg bg-primary px-8 py-3 text-base font-bold text-background-dark hover:bg-opacity-80 transition-colors">Create Your Account</button>
                @else
                    <a class="inline-block mt-10 rounded-lg bg-primary px-8 py-3 text-base font-bold text-background-dark hover:bg-opacity-80 transition-colors" href="{{ route('dashboard') }}">Go to Dashboard</a>
                @endguest
            </div>
        </div>
    </div>
</div>
@endsection