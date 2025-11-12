@extends('layouts.public')

@section('title', $content->title . ' - MUBS Wellness Hub')

@section('content')
<!-- Progress Bar -->
<div class="fixed top-16 left-0 right-0 z-40 h-1 bg-gray-200 dark:bg-gray-800">
    <div id="reading-progress" class="h-full bg-gradient-to-r from-primary to-green-500 transition-all duration-300 ease-out" style="width: 0%"></div>
</div>

<div class="w-full max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <!-- Enhanced Breadcrumb Navigation -->
    <nav class="mb-12">
        <div class="bg-white dark:bg-gray-800/50 rounded-2xl p-4 shadow-sm border border-[#f0f4f3] dark:border-gray-800">
            <ol class="flex items-center space-x-3 text-sm">
                <li>
                    <a href="{{ route('home') }}" class="flex items-center gap-2 text-[#61897c] dark:text-gray-400 hover:text-primary transition-colors group">
                        <span class="material-symbols-outlined !text-lg group-hover:scale-110 transition-transform">home</span>
                        Home
                    </a>
                </li>
                <li><span class="material-symbols-outlined !text-lg text-[#61897c] dark:text-gray-400">chevron_right</span></li>
                <li>
                    <a href="{{ route('content.index') }}" class="flex items-center gap-2 text-[#61897c] dark:text-gray-400 hover:text-primary transition-colors group">
                        <span class="material-symbols-outlined !text-lg group-hover:scale-110 transition-transform">library_books</span>
                        Educational Resources
                    </a>
                </li>
                <li><span class="material-symbols-outlined !text-lg text-[#61897c] dark:text-gray-400">chevron_right</span></li>
                <li class="text-[#111816] dark:text-white font-semibold flex items-center gap-2">
                    <span class="material-symbols-outlined !text-lg text-primary">article</span>
                    {{ Str::limit($content->title, 50) }}
                </li>
            </ol>
        </div>
    </nav>

    <!-- Enhanced Article Header -->
    <header class="mb-16">
        <!-- Category and Meta Tags -->
        <div class="flex flex-wrap items-center gap-4 mb-8">
            <div class="flex items-center gap-2">
                <span class="inline-flex items-center gap-2 text-sm font-bold uppercase tracking-wider px-4 py-2 rounded-full shadow-sm
                    @if($content->category->name === 'Mental Health') text-yellow-700 dark:text-yellow-300 bg-gradient-to-r from-yellow-100 to-yellow-200 dark:from-yellow-900/50 dark:to-yellow-800/50
                    @elseif($content->category->name === 'Alcohol') text-blue-700 dark:text-blue-300 bg-gradient-to-r from-blue-100 to-blue-200 dark:from-blue-900/50 dark:to-blue-800/50
                    @elseif($content->category->name === 'Drug Information') text-orange-700 dark:text-orange-300 bg-gradient-to-r from-orange-100 to-orange-200 dark:from-orange-900/50 dark:to-orange-800/50
                    @elseif($content->category->name === 'Support') text-purple-700 dark:text-purple-300 bg-gradient-to-r from-purple-100 to-purple-200 dark:from-purple-900/50 dark:to-purple-800/50
                    @else text-green-700 dark:text-green-300 bg-gradient-to-r from-green-100 to-green-200 dark:from-green-900/50 dark:to-green-800/50
                    @endif">
                    <span class="material-symbols-outlined !text-lg">category</span>
                    {{ $content->category->name }}
                </span>
            </div>
            
            <div class="flex items-center gap-4 text-sm text-[#61897c] dark:text-gray-400">
                <div class="flex items-center gap-2 bg-white dark:bg-gray-800/50 px-3 py-2 rounded-full border border-[#f0f4f3] dark:border-gray-700">
                    <span class="material-symbols-outlined !text-lg text-primary">calendar_today</span>
                    <span class="font-medium">{{ $content->published_at->format('M d, Y') }}</span>
                </div>
                
                <div class="flex items-center gap-2 bg-white dark:bg-gray-800/50 px-3 py-2 rounded-full border border-[#f0f4f3] dark:border-gray-700">
                    <span class="material-symbols-outlined !text-lg text-primary">
                        @if($content->type === 'video') play_circle @else schedule @endif
                    </span>
                    <span class="font-medium">
                        @if($content->type === 'video')
                            {{ $content->reading_time }} min watch
                        @else
                            {{ $content->reading_time }} min read
                        @endif
                    </span>
                </div>
                
                <div class="flex items-center gap-2 bg-white dark:bg-gray-800/50 px-3 py-2 rounded-full border border-[#f0f4f3] dark:border-gray-700">
                    <span class="material-symbols-outlined !text-lg text-primary">visibility</span>
                    <span class="font-medium">{{ number_format($content->views) }} views</span>
                </div>
            </div>
        </div>
        
        <!-- Enhanced Title -->
        <h1 class="text-4xl sm:text-5xl lg:text-6xl font-black leading-tight tracking-tight text-[#111816] dark:text-white mb-8 max-w-5xl">
            {{ $content->title }}
        </h1>
        
        <!-- Enhanced Description -->
        <div class="bg-gradient-to-r from-primary/5 via-transparent to-primary/5 rounded-2xl p-8 mb-10">
            <p class="text-xl md:text-2xl text-[#61897c] dark:text-gray-300 leading-relaxed max-w-4xl font-medium">
                {{ $content->description }}
            </p>
        </div>
        
        <!-- Enhanced Author and Meta Info -->
        <div class="bg-white dark:bg-gray-800/50 rounded-2xl p-6 shadow-sm border border-[#f0f4f3] dark:border-gray-800">
            <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-6">
                <!-- Author Info -->
                <div class="flex items-center space-x-4">
                    <div class="relative">
                        <img src="{{ $content->author->profile_photo_url }}" alt="{{ $content->author->name }}" 
                             class="w-16 h-16 rounded-full border-3 border-primary/20 shadow-lg">
                        <div class="absolute -bottom-1 -right-1 w-6 h-6 bg-green-500 rounded-full border-2 border-white dark:border-gray-800 flex items-center justify-center">
                            <span class="material-symbols-outlined !text-sm text-white">verified</span>
                        </div>
                    </div>
                    <div>
                        <p class="font-bold text-lg text-[#111816] dark:text-white">{{ $content->author->name }}</p>
                        <p class="text-sm text-[#61897c] dark:text-gray-400 mb-1">Content Author & Wellness Expert</p>
                        <div class="flex items-center gap-2 text-xs text-[#61897c] dark:text-gray-500">
                            <span class="material-symbols-outlined !text-sm">workspace_premium</span>
                            <span>Verified Professional</span>
                        </div>
                    </div>
                </div>
                
                <!-- Quick Actions -->
                <div class="flex items-center gap-3">
                    @auth
                        <button onclick="toggleBookmark()" class="flex items-center gap-2 px-4 py-2.5 bg-primary/10 text-primary rounded-xl hover:bg-primary/20 transition-all duration-200 transform hover:scale-105 font-semibold">
                            <span class="material-symbols-outlined !text-lg" id="bookmark-icon">bookmark_border</span>
                            <span id="bookmark-text">Save</span>
                        </button>
                        <button onclick="shareContent()" class="flex items-center gap-2 px-4 py-2.5 bg-blue-50 dark:bg-blue-900/30 text-blue-600 dark:text-blue-400 rounded-xl hover:bg-blue-100 dark:hover:bg-blue-900/50 transition-all duration-200 transform hover:scale-105 font-semibold">
                            <span class="material-symbols-outlined !text-lg">share</span>
                            Share
                        </button>
                    @else
                        <button onclick="openLoginModal()" class="flex items-center gap-2 px-4 py-2.5 bg-primary text-white rounded-xl hover:bg-primary/90 transition-all duration-200 transform hover:scale-105 font-semibold shadow-sm">
                            <span class="material-symbols-outlined !text-lg">login</span>
                            Login to Save
                        </button>
                    @endauth
                </div>
            </div>
        </div>
    </header>

    <!-- Enhanced Featured Hero Section -->
    <div class="mb-16">
        <div class="relative group overflow-hidden rounded-3xl shadow-2xl">
            <!-- Always show a beautiful background with content-specific styling -->
            <div class="w-full h-64 md:h-[600px] relative
                @if($content->type === 'video') bg-gradient-to-br from-blue-500 via-purple-600 to-blue-700
                @elseif($content->type === 'infographic') bg-gradient-to-br from-green-500 via-teal-600 to-green-700
                @elseif($content->type === 'guide') bg-gradient-to-br from-orange-500 via-red-600 to-orange-700
                @else bg-gradient-to-br from-primary via-green-600 to-primary
                @endif">
                
                <!-- Pattern Overlay -->
                <div class="absolute inset-0 opacity-20" style="background-image: url('data:image/svg+xml,%3Csvg width="60" height="60" viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg"%3E%3Cg fill="none" fill-rule="evenodd"%3E%3Cg fill="%23ffffff" fill-opacity="0.1"%3E%3Ccircle cx="30" cy="30" r="2"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E')"></div>
                
                <!-- Content Overlay -->
                <div class="absolute inset-0 flex items-center justify-center text-white">
                    <div class="text-center max-w-4xl px-8">
                        <!-- Large Icon -->
                        <div class="w-32 h-32 bg-white/20 backdrop-blur-sm rounded-full flex items-center justify-center mb-8 mx-auto group-hover:scale-110 transition-transform duration-500">
                            <span class="material-symbols-outlined !text-6xl">
                                @if($content->type === 'video') play_circle
                                @elseif($content->type === 'infographic') image
                                @elseif($content->type === 'guide') menu_book
                                @else article
                                @endif
                            </span>
                        </div>
                        
                        <!-- Content Info -->
                        <div class="space-y-4">
                            <div class="inline-flex items-center gap-2 bg-white/20 backdrop-blur-sm px-4 py-2 rounded-full text-sm font-semibold">
                                <span class="material-symbols-outlined !text-lg">
                                    @if($content->type === 'video') play_circle
                                    @elseif($content->type === 'infographic') image
                                    @elseif($content->type === 'guide') menu_book
                                    @else article
                                    @endif
                                </span>
                                {{ ucfirst($content->type) }} Content
                            </div>
                            
                            <h2 class="text-2xl md:text-4xl font-bold leading-tight opacity-90">
                                {{ $content->title }}
                            </h2>
                            
                            <div class="flex items-center justify-center gap-6 text-sm opacity-80">
                                <div class="flex items-center gap-2">
                                    <span class="material-symbols-outlined !text-lg">schedule</span>
                                    <span>{{ $content->reading_time }} min {{ $content->type === 'video' ? 'watch' : 'read' }}</span>
                                </div>
                                <div class="flex items-center gap-2">
                                    <span class="material-symbols-outlined !text-lg">visibility</span>
                                    <span>{{ number_format($content->views) }} views</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Gradient Overlay for better text readability -->
                <div class="absolute inset-0 bg-gradient-to-t from-black/40 via-transparent to-black/20"></div>
            </div>
            
            <!-- Floating Action Button (if video) -->
            @if($content->type === 'video' && $content->video_url)
            <div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                <button onclick="scrollToVideo()" class="bg-white/90 backdrop-blur-sm rounded-full p-6 transform scale-75 group-hover:scale-100 transition-transform duration-300 shadow-2xl">
                    <span class="material-symbols-outlined text-blue-600 !text-3xl">play_arrow</span>
                </button>
            </div>
            @endif
        </div>
    </div>

    <!-- Enhanced Article Content -->
    <div class="grid grid-cols-1 lg:grid-cols-4 gap-12 mb-16">
        <!-- Main Content -->
        <article class="lg:col-span-3">
            <div class="bg-white dark:bg-gray-800/30 rounded-3xl p-8 md:p-12 shadow-sm border border-[#f0f4f3] dark:border-gray-800">
                <div class="prose prose-lg md:prose-xl max-w-none dark:prose-invert 
                           prose-headings:font-bold prose-headings:text-[#111816] dark:prose-headings:text-white prose-headings:tracking-tight
                           prose-p:text-[#61897c] dark:prose-p:text-gray-300 prose-p:leading-relaxed prose-p:text-lg
                           prose-a:text-primary prose-a:no-underline hover:prose-a:underline prose-a:font-semibold
                           prose-strong:text-[#111816] dark:prose-strong:text-white prose-strong:font-bold
                           prose-blockquote:border-l-4 prose-blockquote:border-primary prose-blockquote:bg-primary/5 dark:prose-blockquote:bg-primary/10 
                           prose-blockquote:rounded-r-xl prose-blockquote:p-6 prose-blockquote:my-8 prose-blockquote:font-medium
                           prose-ul:text-[#61897c] dark:prose-ul:text-gray-300 prose-li:text-lg prose-li:leading-relaxed
                           prose-ol:text-[#61897c] dark:prose-ol:text-gray-300
                           prose-code:bg-gray-100 dark:prose-code:bg-gray-800 prose-code:px-2 prose-code:py-1 prose-code:rounded prose-code:text-sm
                           prose-pre:bg-gray-900 prose-pre:rounded-xl prose-pre:p-6">
                    {!! nl2br(e($content->content)) !!}
                </div>
            </div>
        </article>
        
        <!-- Sidebar -->
        <aside class="lg:col-span-1">
            <div class="sticky top-24 space-y-6">
                <!-- Table of Contents -->
                <div class="bg-white dark:bg-gray-800/50 rounded-2xl p-6 shadow-sm border border-[#f0f4f3] dark:border-gray-800">
                    <h3 class="text-lg font-bold text-[#111816] dark:text-white mb-4 flex items-center gap-2">
                        <span class="material-symbols-outlined text-primary">list</span>
                        Quick Navigation
                    </h3>
                    <nav class="space-y-2">
                        <a href="#content" class="block text-sm text-[#61897c] dark:text-gray-400 hover:text-primary transition-colors py-2 px-3 rounded-lg hover:bg-primary/5">
                            📖 Main Content
                        </a>
                        @if($content->video_url)
                        <a href="#video" class="block text-sm text-[#61897c] dark:text-gray-400 hover:text-primary transition-colors py-2 px-3 rounded-lg hover:bg-primary/5">
                            🎥 Related Video
                        </a>
                        @endif
                        @if($content->file_path)
                        <a href="#downloads" class="block text-sm text-[#61897c] dark:text-gray-400 hover:text-primary transition-colors py-2 px-3 rounded-lg hover:bg-primary/5">
                            📁 Downloads
                        </a>
                        @endif
                        <a href="#related" class="block text-sm text-[#61897c] dark:text-gray-400 hover:text-primary transition-colors py-2 px-3 rounded-lg hover:bg-primary/5">
                            🔗 Related Content
                        </a>
                    </nav>
                </div>
                
                <!-- Quick Stats -->
                <div class="bg-gradient-to-br from-primary/10 to-primary/5 rounded-2xl p-6 border border-primary/20">
                    <h3 class="text-lg font-bold text-[#111816] dark:text-white mb-4 flex items-center gap-2">
                        <span class="material-symbols-outlined text-primary">analytics</span>
                        Content Stats
                    </h3>
                    <div class="space-y-4">
                        <div class="flex items-center justify-between">
                            <span class="text-sm text-[#61897c] dark:text-gray-400">Views</span>
                            <span class="font-bold text-[#111816] dark:text-white">{{ number_format($content->views) }}</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="text-sm text-[#61897c] dark:text-gray-400">Reading Time</span>
                            <span class="font-bold text-[#111816] dark:text-white">{{ $content->reading_time }} min</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="text-sm text-[#61897c] dark:text-gray-400">Published</span>
                            <span class="font-bold text-[#111816] dark:text-white">{{ $content->published_at->format('M Y') }}</span>
                        </div>
                    </div>
                </div>
                
                <!-- Share Widget -->
                <div class="bg-white dark:bg-gray-800/50 rounded-2xl p-5 shadow-sm border border-[#f0f4f3] dark:border-gray-800">
                    <h3 class="text-base font-bold text-[#111816] dark:text-white mb-3 flex items-center gap-2">
                        <span class="material-symbols-outlined text-primary !text-lg">share</span>
                        Share This
                    </h3>
                    <div class="space-y-2">
                        <button onclick="shareToTwitter()" class="flex items-center gap-2 w-full p-2.5 bg-blue-50 dark:bg-blue-900/30 text-blue-600 dark:text-blue-400 rounded-lg hover:bg-blue-100 dark:hover:bg-blue-900/50 transition-colors text-xs font-medium">
                            <span class="material-symbols-outlined !text-base">share</span>
                            Twitter
                        </button>
                        <button onclick="shareToLinkedIn()" class="flex items-center gap-2 w-full p-2.5 bg-blue-50 dark:bg-blue-900/30 text-blue-600 dark:text-blue-400 rounded-lg hover:bg-blue-100 dark:hover:bg-blue-900/50 transition-colors text-xs font-medium">
                            <span class="material-symbols-outlined !text-base">business</span>
                            LinkedIn
                        </button>
                        <button onclick="copyLink()" class="flex items-center gap-2 w-full p-2.5 bg-gray-50 dark:bg-gray-700 text-gray-600 dark:text-gray-400 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-600 transition-colors text-xs font-medium">
                            <span class="material-symbols-outlined !text-base">link</span>
                            Copy Link
                        </button>
                        <button onclick="shareViaEmail()" class="flex items-center gap-2 w-full p-2.5 bg-gray-50 dark:bg-gray-700 text-gray-600 dark:text-gray-400 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-600 transition-colors text-xs font-medium">
                            <span class="material-symbols-outlined !text-base">mail</span>
                            Email
                        </button>
                    </div>
                </div>
            </div>
        </aside>
    </div>

    <!-- Enhanced Video Content -->
    @if($content->video_url || $content->type === 'video')
    <div id="video" class="mb-16">
        <div class="bg-gradient-to-br from-blue-50 to-indigo-50 dark:from-blue-900/20 dark:to-indigo-900/20 rounded-3xl p-8 border border-blue-200/50 dark:border-blue-800/50 shadow-lg">
            <div class="text-center mb-8">
                <div class="inline-flex items-center gap-3 bg-blue-100 dark:bg-blue-900/50 text-blue-700 dark:text-blue-300 px-6 py-3 rounded-full font-semibold mb-4">
                    <span class="material-symbols-outlined !text-xl">play_circle</span>
                    Watch Related Video
                </div>
                <h3 class="text-2xl md:text-3xl font-bold text-[#111816] dark:text-white mb-2">
                    Enhance Your Understanding
                </h3>
                <p class="text-[#61897c] dark:text-gray-400 max-w-2xl mx-auto">
                    Watch this complementary video to deepen your knowledge and get visual insights on the topic.
                </p>
            </div>
            
            <div class="relative group">
                <div class="aspect-video rounded-2xl overflow-hidden shadow-2xl border-4 border-white dark:border-gray-800">
                    @if($content->video_url)
                        @if(str_contains($content->video_url, 'youtube.com') || str_contains($content->video_url, 'youtu.be'))
                            @php
                                // Extract YouTube video ID and create embed URL
                                $videoId = '';
                                if (str_contains($content->video_url, 'youtube.com/watch?v=')) {
                                    $videoId = substr($content->video_url, strpos($content->video_url, 'v=') + 2);
                                    $videoId = substr($videoId, 0, strpos($videoId, '&') ?: strlen($videoId));
                                } elseif (str_contains($content->video_url, 'youtu.be/')) {
                                    $videoId = substr($content->video_url, strrpos($content->video_url, '/') + 1);
                                }
                                $embedUrl = "https://www.youtube.com/embed/{$videoId}";
                            @endphp
                            <iframe src="{{ $embedUrl }}" class="w-full h-full" frameborder="0" allowfullscreen allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"></iframe>
                        @elseif(str_contains($content->video_url, 'vimeo.com'))
                            @php
                                // Extract Vimeo video ID and create embed URL
                                $videoId = substr($content->video_url, strrpos($content->video_url, '/') + 1);
                                $embedUrl = "https://player.vimeo.com/video/{$videoId}";
                            @endphp
                            <iframe src="{{ $embedUrl }}" class="w-full h-full" frameborder="0" allowfullscreen allow="autoplay; fullscreen; picture-in-picture"></iframe>
                        @else
                            <!-- Direct video file or other embed -->
                            @if(str_contains($content->video_url, '.mp4') || str_contains($content->video_url, '.webm') || str_contains($content->video_url, '.ogg'))
                                <video class="w-full h-full object-cover" controls>
                                    <source src="{{ $content->video_url }}" type="video/mp4">
                                    Your browser does not support the video tag.
                                </video>
                            @else
                                <iframe src="{{ $content->video_url }}" class="w-full h-full" frameborder="0" allowfullscreen></iframe>
                            @endif
                        @endif
                    @else
                        <!-- Video placeholder when no URL is provided -->
                        <div class="w-full h-full bg-gradient-to-br from-blue-500 to-purple-600 flex items-center justify-center">
                            <div class="text-center text-white">
                                <div class="w-24 h-24 bg-white/20 rounded-full flex items-center justify-center mb-4 mx-auto">
                                    <span class="material-symbols-outlined !text-4xl">play_circle</span>
                                </div>
                                <h4 class="text-xl font-bold mb-2">Video Content</h4>
                                <p class="text-white/80">Video will be available soon</p>
                            </div>
                        </div>
                    @endif
                </div>
                
                <!-- Video Controls Overlay -->
                <div class="absolute bottom-4 left-4 right-4 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                    <div class="bg-black/80 backdrop-blur-sm rounded-xl p-4 flex items-center justify-between">
                        <div class="flex items-center gap-3 text-white">
                            <span class="material-symbols-outlined">video_library</span>
                            <span class="text-sm font-medium">Educational Video Content</span>
                        </div>
                        <div class="flex items-center gap-2 text-white text-sm">
                            <span class="material-symbols-outlined !text-lg">hd</span>
                            <span>HD Quality</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif

    <!-- Enhanced File Download -->
    @if($content->file_path)
    <div id="downloads" class="mb-16">
        <div class="bg-gradient-to-br from-green-50 to-emerald-50 dark:from-green-900/20 dark:to-emerald-900/20 rounded-3xl p-8 border border-green-200/50 dark:border-green-800/50 shadow-lg">
            <div class="text-center mb-8">
                <div class="inline-flex items-center gap-3 bg-green-100 dark:bg-green-900/50 text-green-700 dark:text-green-300 px-6 py-3 rounded-full font-semibold mb-4">
                    <span class="material-symbols-outlined !text-xl">download</span>
                    Downloadable Resources
                </div>
                <h3 class="text-2xl md:text-3xl font-bold text-[#111816] dark:text-white mb-2">
                    Take It With You
                </h3>
                <p class="text-[#61897c] dark:text-gray-400 max-w-2xl mx-auto mb-8">
                    Download supplementary materials, worksheets, and additional resources to continue your learning journey offline.
                </p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Main Download -->
                <div class="bg-white dark:bg-gray-800/50 rounded-2xl p-6 shadow-sm border border-[#f0f4f3] dark:border-gray-800 group hover:shadow-lg transition-all duration-300">
                    <div class="flex items-center gap-4 mb-4">
                        <div class="w-12 h-12 bg-primary/20 rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform">
                            <span class="material-symbols-outlined text-primary !text-2xl">
                                @php
                                    $fileExtension = strtolower(pathinfo($content->file_path ?? '', PATHINFO_EXTENSION));
                                @endphp
                                @if($fileExtension === 'pdf')
                                    picture_as_pdf
                                @elseif(in_array($fileExtension, ['doc', 'docx']))
                                    description
                                @elseif(in_array($fileExtension, ['xls', 'xlsx']))
                                    table_chart
                                @elseif(in_array($fileExtension, ['ppt', 'pptx']))
                                    slideshow
                                @elseif(in_array($fileExtension, ['jpg', 'jpeg', 'png', 'gif']))
                                    image
                                @elseif(in_array($fileExtension, ['zip', 'rar']))
                                    folder_zip
                                @else
                                    description
                                @endif
                            </span>
                        </div>
                        <div>
                            <h4 class="font-bold text-[#111816] dark:text-white">Resource File</h4>
                            <p class="text-sm text-[#61897c] dark:text-gray-400">
                                @php
                                    $fileExtension = pathinfo($content->file_path ?? '', PATHINFO_EXTENSION);
                                    $fileType = strtoupper($fileExtension) ?: 'FILE';
                                @endphp
                                {{ $fileType }} • Supplementary Material
                            </p>
                        </div>
                    </div>
                    <p class="text-sm text-[#61897c] dark:text-gray-400 mb-4">
                        Comprehensive guide with additional insights, exercises, and reference materials.
                    </p>
                    <a href="{{ $content->file_url ?? asset('storage/' . $content->file_path) }}" 
                       class="inline-flex items-center gap-2 bg-primary text-white px-6 py-3 rounded-xl font-semibold hover:bg-primary/90 transition-all duration-200 transform hover:scale-105 shadow-sm w-full justify-center" 
                       download
                       target="_blank">
                        <span class="material-symbols-outlined !text-lg">file_download</span>
                        Download Now
                    </a>
                </div>
                
                <!-- Quick Actions -->
                <div class="bg-white dark:bg-gray-800/50 rounded-2xl p-6 shadow-sm border border-[#f0f4f3] dark:border-gray-800">
                    <h4 class="font-bold text-[#111816] dark:text-white mb-4 flex items-center gap-2">
                        <span class="material-symbols-outlined text-primary">quick_reference</span>
                        Quick Actions
                    </h4>
                    <div class="space-y-3">
                        <button onclick="printContent()" class="flex items-center gap-3 w-full p-3 text-left text-[#61897c] dark:text-gray-400 hover:text-primary hover:bg-primary/5 rounded-xl transition-colors">
                            <span class="material-symbols-outlined !text-lg">print</span>
                            <span class="text-sm font-medium">Print This Article</span>
                        </button>
                        <button onclick="saveAsPDF()" class="flex items-center gap-3 w-full p-3 text-left text-[#61897c] dark:text-gray-400 hover:text-primary hover:bg-primary/5 rounded-xl transition-colors">
                            <span class="material-symbols-outlined !text-lg">picture_as_pdf</span>
                            <span class="text-sm font-medium">Save as PDF</span>
                        </button>
                        <button onclick="emailContent()" class="flex items-center gap-3 w-full p-3 text-left text-[#61897c] dark:text-gray-400 hover:text-primary hover:bg-primary/5 rounded-xl transition-colors">
                            <span class="material-symbols-outlined !text-lg">forward_to_inbox</span>
                            <span class="text-sm font-medium">Email to Friend</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif

    <!-- Enhanced Interactive Actions -->
    <div class="mb-16">
        <div class="bg-gradient-to-r from-purple-50 to-pink-50 dark:from-purple-900/20 dark:to-pink-900/20 rounded-3xl p-8 border border-purple-200/50 dark:border-purple-800/50 shadow-lg">
            <div class="text-center mb-8">
                <h3 class="text-2xl md:text-3xl font-bold text-[#111816] dark:text-white mb-2">
                    Your Feedback Matters
                </h3>
                <p class="text-[#61897c] dark:text-gray-400 max-w-2xl mx-auto">
                    Help us improve our content and support the community by sharing your thoughts and saving useful resources.
                </p>
            </div>
            
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <!-- Feedback Section -->
                <div class="bg-white dark:bg-gray-800/50 rounded-2xl p-6 shadow-sm border border-[#f0f4f3] dark:border-gray-800">
                    <h4 class="text-lg font-bold text-[#111816] dark:text-white mb-4 flex items-center gap-2">
                        <span class="material-symbols-outlined text-primary">feedback</span>
                        Rate This Content
                    </h4>
                    <p class="text-sm text-[#61897c] dark:text-gray-400 mb-6">
                        Your feedback helps us create better resources for the MUBS community.
                    </p>
                    
                    <div class="flex items-center justify-center gap-4 mb-6">
                        @auth
                            <button onclick="rateFeedback('positive')" 
                                    class="flex flex-col items-center gap-2 p-4 rounded-2xl bg-green-50 dark:bg-green-900/30 text-green-600 dark:text-green-400 hover:bg-green-100 dark:hover:bg-green-900/50 transition-all duration-200 transform hover:scale-105 group">
                                <span class="material-symbols-outlined !text-2xl group-hover:scale-110 transition-transform">thumb_up</span>
                                <span class="text-sm font-semibold">Helpful</span>
                            </button>
                            <button onclick="rateFeedback('negative')" 
                                    class="flex flex-col items-center gap-2 p-4 rounded-2xl bg-red-50 dark:bg-red-900/30 text-red-600 dark:text-red-400 hover:bg-red-100 dark:hover:bg-red-900/50 transition-all duration-200 transform hover:scale-105 group">
                                <span class="material-symbols-outlined !text-2xl group-hover:scale-110 transition-transform">thumb_down</span>
                                <span class="text-sm font-semibold">Not Helpful</span>
                            </button>
                        @else
                            <div class="text-center">
                                <button onclick="openLoginModal()" 
                                        class="inline-flex items-center gap-2 px-6 py-3 bg-primary text-white rounded-xl font-semibold hover:bg-primary/90 transition-all duration-200 transform hover:scale-105 shadow-sm">
                                    <span class="material-symbols-outlined !text-lg">login</span>
                                    Login to Rate Content
                                </button>
                                <p class="text-xs text-[#61897c] dark:text-gray-400 mt-2">Join our community to provide feedback</p>
                            </div>
                        @endauth
                    </div>
                    
                    <!-- Rating Display -->
                    <div class="text-center p-4 bg-gray-50 dark:bg-gray-700/50 rounded-xl">
                        <div class="flex items-center justify-center gap-2 mb-2">
                            <span class="text-2xl font-bold text-[#111816] dark:text-white">4.8</span>
                            <div class="flex items-center gap-1">
                                @for($i = 1; $i <= 5; $i++)
                                    <span class="material-symbols-outlined !text-lg {{ $i <= 4 ? 'text-yellow-400' : 'text-gray-300 dark:text-gray-600' }}">star</span>
                                @endfor
                            </div>
                        </div>
                        <p class="text-sm text-[#61897c] dark:text-gray-400">Based on 127 community ratings</p>
                    </div>
                </div>
                
                <!-- Actions Section -->
                <div class="bg-white dark:bg-gray-800/50 rounded-2xl p-6 shadow-sm border border-[#f0f4f3] dark:border-gray-800">
                    <h4 class="text-lg font-bold text-[#111816] dark:text-white mb-4 flex items-center gap-2">
                        <span class="material-symbols-outlined text-primary">bookmark</span>
                        Save & Share
                    </h4>
                    <p class="text-sm text-[#61897c] dark:text-gray-400 mb-6">
                        Keep this resource handy and share it with others who might benefit.
                    </p>
                    
                    <div class="space-y-4">
                        @auth
                            <button onclick="toggleBookmark()" 
                                    class="flex items-center gap-3 w-full p-4 bg-primary/10 text-primary rounded-xl hover:bg-primary/20 transition-all duration-200 transform hover:scale-105 font-semibold">
                                <span class="material-symbols-outlined !text-xl" id="bookmark-icon-main">bookmark_border</span>
                                <div class="text-left">
                                    <div id="bookmark-text-main">Save to My Library</div>
                                    <div class="text-xs opacity-75">Access anytime from your dashboard</div>
                                </div>
                            </button>
                            
                            <button onclick="shareContent()" 
                                    class="flex items-center gap-3 w-full p-4 bg-blue-50 dark:bg-blue-900/30 text-blue-600 dark:text-blue-400 rounded-xl hover:bg-blue-100 dark:hover:bg-blue-900/50 transition-all duration-200 transform hover:scale-105 font-semibold">
                                <span class="material-symbols-outlined !text-xl">share</span>
                                <div class="text-left">
                                    <div>Share with Others</div>
                                    <div class="text-xs opacity-75">Help spread awareness</div>
                                </div>
                            </button>
                        @else
                            <button onclick="openLoginModal()" 
                                    class="flex items-center gap-3 w-full p-4 bg-primary text-white rounded-xl hover:bg-primary/90 transition-all duration-200 transform hover:scale-105 font-semibold shadow-sm">
                                <span class="material-symbols-outlined !text-xl">login</span>
                                <div class="text-left">
                                    <div>Join to Save & Share</div>
                                    <div class="text-xs opacity-90">Create your free account</div>
                                </div>
                            </button>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Enhanced Related Content -->
    @if(isset($relatedContents) && $relatedContents->count() > 0)
    <div id="related" class="mb-16">
        <div class="text-center mb-12">
            <div class="inline-flex items-center gap-3 bg-primary/20 dark:bg-primary/30 text-primary px-6 py-3 rounded-full font-semibold mb-4">
                <span class="material-symbols-outlined !text-xl">explore</span>
                Continue Learning
            </div>
            <h3 class="text-3xl md:text-4xl font-black text-[#111816] dark:text-white mb-4 tracking-tight">
                You Might Also Like
            </h3>
            <p class="text-[#61897c] dark:text-gray-400 max-w-2xl mx-auto">
                Discover more valuable resources to expand your knowledge and support your wellness journey.
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-8">
            @foreach($relatedContents->take(3) as $related)
            <article class="group bg-white dark:bg-gray-800/50 rounded-2xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 border border-[#f0f4f3] dark:border-gray-800 transform hover:-translate-y-2">
                <!-- Enhanced Image Container -->
                <div class="relative w-full aspect-video bg-center bg-no-repeat bg-cover overflow-hidden" 
                     style="background-image: url('{{ $related->featured_image ? $related->featured_image_url : 'https://lh3.googleusercontent.com/aida-public/AB6AXuDuXoSapEBaja_kQ1hrYBGTGOGzYhm8hAs4J1cnbzKK5K4J3XnDAZgVzVLDrTSqsLKear5TspYM6ur2y5JoX9vXUlm6wR287hGWzn1-HvqOtuRpyVefLK8NtI5ORkjQFiB6MBqwd8fwMNkEHk84VAS-lbFQyOMpL7VoHohpIb_HpqXUYCS7bIDxZU8Xf5CN7riZcvzO2voJDsPEsy3bKcGBVfn1UoAm23rLIjMHroTlkiDHVGlaEGfPWH-OE908XwE3hynanLtD3w' }}')">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    
                    <!-- Content Type Badge -->
                    <div class="absolute top-4 left-4">
                        <div class="flex items-center gap-1 bg-white/95 dark:bg-gray-900/95 backdrop-blur-sm px-3 py-1.5 rounded-full text-xs font-semibold text-[#111816] dark:text-white shadow-sm">
                            <span class="material-symbols-outlined !text-sm">
                                @if($related->type === 'video') play_circle
                                @elseif($related->type === 'infographic') image
                                @elseif($related->type === 'guide') menu_book
                                @else article
                                @endif
                            </span>
                            {{ ucfirst($related->type) }}
                        </div>
                    </div>
                    
                    <!-- Reading Time -->
                    <div class="absolute top-4 right-4">
                        <div class="flex items-center gap-1 bg-primary/90 backdrop-blur-sm px-3 py-1.5 rounded-full text-xs font-semibold text-white shadow-sm">
                            <span class="material-symbols-outlined !text-sm">schedule</span>
                            {{ $related->reading_time }} min
                        </div>
                    </div>
                    
                    <!-- Hover Overlay -->
                    <div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        <div class="bg-primary/90 backdrop-blur-sm rounded-full p-3 transform scale-75 group-hover:scale-100 transition-transform duration-300">
                            <span class="material-symbols-outlined text-white !text-xl">arrow_forward</span>
                        </div>
                    </div>
                </div>
                
                <!-- Enhanced Content -->
                <div class="p-6 flex flex-col gap-4 flex-1">
                    <!-- Category and Actions -->
                    <div class="flex items-center justify-between">
                        <span class="inline-flex items-center gap-1 text-xs font-bold uppercase tracking-wider px-3 py-1.5 rounded-full
                            @if($related->category->name === 'Mental Health') text-yellow-700 dark:text-yellow-300 bg-yellow-100 dark:bg-yellow-900/50
                            @elseif($related->category->name === 'Alcohol') text-blue-700 dark:text-blue-300 bg-blue-100 dark:bg-blue-900/50
                            @elseif($related->category->name === 'Drug Information') text-orange-700 dark:text-orange-300 bg-orange-100 dark:bg-orange-900/50
                            @elseif($related->category->name === 'Support') text-purple-700 dark:text-purple-300 bg-purple-100 dark:bg-purple-900/50
                            @else text-green-700 dark:text-green-300 bg-green-100 dark:bg-green-900/50
                            @endif">
                            <span class="material-symbols-outlined !text-sm">category</span>
                            {{ $related->category->name }}
                        </span>
                        
                        <button class="p-2 rounded-full hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors opacity-0 group-hover:opacity-100">
                            <span class="material-symbols-outlined !text-lg text-[#61897c] dark:text-gray-400 hover:text-primary">bookmark_border</span>
                        </button>
                    </div>
                    
                    <!-- Title -->
                    <h4 class="text-[#111816] dark:text-white text-xl font-bold leading-tight group-hover:text-primary dark:group-hover:text-primary transition-colors duration-200 line-clamp-2">
                        <a href="{{ route('content.show', $related) }}" class="block">{{ $related->title }}</a>
                    </h4>
                    
                    <!-- Description -->
                    <p class="text-[#61897c] dark:text-gray-400 text-sm leading-relaxed line-clamp-3 flex-1">
                        {{ Str::limit($related->description, 120) }}
                    </p>
                    
                    <!-- Footer Stats -->
                    <div class="flex items-center justify-between pt-4 border-t border-[#f0f4f3] dark:border-gray-700">
                        <div class="flex items-center gap-3 text-xs text-[#61897c] dark:text-gray-500">
                            <div class="flex items-center gap-1">
                                <span class="material-symbols-outlined !text-base">visibility</span>
                                <span class="font-medium">{{ number_format($related->views) }}</span>
                            </div>
                            <div class="flex items-center gap-1">
                                <span class="material-symbols-outlined !text-base">calendar_today</span>
                                <span class="font-medium">{{ $related->created_at->format('M j') }}</span>
                            </div>
                        </div>
                        
                        <a href="{{ route('content.show', $related) }}" 
                           class="inline-flex items-center gap-1 text-primary hover:text-primary/80 text-sm font-semibold transition-colors group/read opacity-0 group-hover:opacity-100">
                            Read More
                            <span class="material-symbols-outlined !text-sm transform group-hover/read:translate-x-0.5 transition-transform">arrow_forward</span>
                        </a>
                    </div>
                </div>
            </article>
            @endforeach
        </div>
        
        <!-- View More Button -->
        <div class="text-center mt-12">
            <a href="{{ route('content.index') }}" 
               class="inline-flex items-center gap-2 px-8 py-4 bg-gradient-to-r from-primary to-green-500 text-white rounded-2xl font-semibold hover:from-primary/90 hover:to-green-500/90 transition-all duration-200 transform hover:scale-105 shadow-lg">
                <span class="material-symbols-outlined !text-xl">library_books</span>
                Explore All Resources
                <span class="material-symbols-outlined !text-xl">arrow_forward</span>
            </a>
        </div>
    </div>
    @endif

    <!-- Enhanced Back Navigation -->
    <div class="text-center">
        <div class="bg-white dark:bg-gray-800/50 rounded-2xl p-8 shadow-sm border border-[#f0f4f3] dark:border-gray-800">
            <div class="max-w-2xl mx-auto">
                <h3 class="text-xl font-bold text-[#111816] dark:text-white mb-4">
                    Continue Your Learning Journey
                </h3>
                <p class="text-[#61897c] dark:text-gray-400 mb-6">
                    Explore more educational resources and discover valuable content to support your wellness goals.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="{{ route('content.index') }}" 
                       class="inline-flex items-center gap-2 px-6 py-3 bg-primary text-white rounded-xl hover:bg-primary/90 transition-all duration-200 transform hover:scale-105 font-semibold shadow-sm">
                        <span class="material-symbols-outlined !text-lg">arrow_back</span>
                        Back to Resources
                    </a>
                    <a href="{{ route('home') }}" 
                       class="inline-flex items-center gap-2 px-6 py-3 bg-white dark:bg-gray-800 border border-[#f0f4f3] dark:border-gray-700 text-[#111816] dark:text-gray-300 rounded-xl hover:bg-gray-50 dark:hover:bg-gray-700 transition-all duration-200 transform hover:scale-105 font-semibold">
                        <span class="material-symbols-outlined !text-lg">home</span>
                        Return Home
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

@push('styles')
<style>
    .line-clamp-2 {
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
    
    .line-clamp-3 {
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
    
    /* Smooth scroll behavior */
    html {
        scroll-behavior: smooth;
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
    
    /* Reading progress animation */
    #reading-progress {
        transition: width 0.3s ease-out;
    }
    
    /* Toast animations */
    @keyframes slideInRight {
        from {
            transform: translateX(100%);
            opacity: 0;
        }
        to {
            transform: translateX(0);
            opacity: 1;
        }
    }
    
    @keyframes slideOutRight {
        from {
            transform: translateX(0);
            opacity: 1;
        }
        to {
            transform: translateX(100%);
            opacity: 0;
        }
    }
    
    .toast-enter {
        animation: slideInRight 0.3s ease-out;
    }
    
    .toast-exit {
        animation: slideOutRight 0.3s ease-out;
    }
</style>
@endpush

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Reading progress bar
    function updateReadingProgress() {
        const article = document.querySelector('article');
        if (!article) return;
        
        const articleTop = article.offsetTop;
        const articleHeight = article.offsetHeight;
        const windowHeight = window.innerHeight;
        const scrollTop = window.pageYOffset;
        
        const progress = Math.min(
            Math.max((scrollTop - articleTop + windowHeight * 0.3) / articleHeight, 0),
            1
        ) * 100;
        
        document.getElementById('reading-progress').style.width = progress + '%';
    }
    
    window.addEventListener('scroll', updateReadingProgress);
    updateReadingProgress();
    
    // Smooth scroll for navigation links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });
    
    // Intersection Observer for animations
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
    
    // Observe elements for fade-in animation
    document.querySelectorAll('article.group, .bg-gradient-to-br').forEach(element => {
        element.style.opacity = '0';
        element.style.transform = 'translateY(20px)';
        element.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
        observer.observe(element);
    });
});

// Enhanced bookmark functionality
function toggleBookmark() {
    const icons = document.querySelectorAll('#bookmark-icon, #bookmark-icon-main');
    const texts = document.querySelectorAll('#bookmark-text, #bookmark-text-main');
    
    icons.forEach(icon => {
        if (icon.textContent === 'bookmark_border' || icon.textContent === 'bookmark') {
            icon.textContent = 'bookmark';
            icon.classList.add('text-primary');
        } else {
            icon.textContent = 'bookmark_border';
            icon.classList.remove('text-primary');
        }
    });
    
    texts.forEach(text => {
        if (text.textContent.includes('Save')) {
            text.textContent = 'Saved to Library';
            showToast('Added to your library! 📚', 'success');
        } else {
            text.textContent = 'Save to My Library';
            showToast('Removed from library', 'info');
        }
    });
    
    // Here you would make an AJAX call to save/remove the bookmark
}

// Enhanced share functionality
function shareContent() {
    if (navigator.share) {
        navigator.share({
            title: '{{ $content->title }}',
            text: '{{ $content->description }}',
            url: window.location.href
        }).then(() => {
            showToast('Content shared successfully! 🎉', 'success');
        }).catch(() => {
            copyToClipboard();
        });
    } else {
        copyToClipboard();
    }
}

function shareToTwitter() {
    const text = encodeURIComponent('{{ $content->title }} - {{ $content->description }}');
    const url = encodeURIComponent(window.location.href);
    window.open(`https://twitter.com/intent/tweet?text=${text}&url=${url}`, '_blank');
    showToast('Opening Twitter...', 'info');
}

function shareToLinkedIn() {
    const url = encodeURIComponent(window.location.href);
    window.open(`https://www.linkedin.com/sharing/share-offsite/?url=${url}`, '_blank');
    showToast('Opening LinkedIn...', 'info');
}

function copyLink() {
    copyToClipboard();
}

function shareViaEmail() {
    const subject = encodeURIComponent('{{ $content->title }}');
    const body = encodeURIComponent(`I thought you might find this interesting:\n\n{{ $content->title }}\n{{ $content->description }}\n\n${window.location.href}`);
    window.location.href = `mailto:?subject=${subject}&body=${body}`;
    showToast('Opening email client...', 'info');
}

function copyToClipboard() {
    navigator.clipboard.writeText(window.location.href).then(() => {
        showToast('Link copied to clipboard! 📋', 'success');
    }).catch(() => {
        showToast('Failed to copy link', 'error');
    });
}

// Enhanced feedback functionality
function rateFeedback(type) {
    const message = type === 'positive' 
        ? 'Thank you for your positive feedback! 👍' 
        : 'Thanks for your feedback. We\'ll work to improve! 💪';
    
    showToast(message, type === 'positive' ? 'success' : 'info');
    
    // Disable buttons after rating
    const buttons = document.querySelectorAll('button[onclick*="rateFeedback"]');
    buttons.forEach(btn => {
        btn.disabled = true;
        btn.classList.add('opacity-50', 'cursor-not-allowed');
    });
    
    // Here you would make an AJAX call to save the feedback
}

// Utility functions
function printContent() {
    window.print();
    showToast('Opening print dialog...', 'info');
}

function saveAsPDF() {
    showToast('PDF generation coming soon! 📄', 'info');
    // Here you would implement PDF generation
}

function emailContent() {
    shareViaEmail();
}

// Enhanced toast notification system
function showToast(message, type = 'info') {
    const toast = document.createElement('div');
    const bgColor = {
        'success': 'bg-green-500',
        'error': 'bg-red-500',
        'info': 'bg-blue-500',
        'warning': 'bg-yellow-500'
    }[type] || 'bg-primary';
    
    toast.className = `fixed top-24 right-4 z-50 px-6 py-4 rounded-2xl shadow-2xl text-white font-semibold ${bgColor} toast-enter max-w-sm`;
    toast.innerHTML = `
        <div class="flex items-center gap-3">
            <span class="material-symbols-outlined !text-xl">
                ${type === 'success' ? 'check_circle' : 
                  type === 'error' ? 'error' : 
                  type === 'warning' ? 'warning' : 'info'}
            </span>
            <span>${message}</span>
        </div>
    `;
    
    document.body.appendChild(toast);
    
    // Auto remove after 4 seconds
    setTimeout(() => {
        toast.classList.remove('toast-enter');
        toast.classList.add('toast-exit');
        setTimeout(() => {
            if (document.body.contains(toast)) {
                document.body.removeChild(toast);
            }
        }, 300);
    }, 4000);
    
    // Click to dismiss
    toast.addEventListener('click', () => {
        toast.classList.remove('toast-enter');
        toast.classList.add('toast-exit');
        setTimeout(() => {
            if (document.body.contains(toast)) {
                document.body.removeChild(toast);
            }
        }, 300);
    });
}

// Scroll to video section
function scrollToVideo() {
    const videoSection = document.getElementById('video');
    if (videoSection) {
        videoSection.scrollIntoView({
            behavior: 'smooth',
            block: 'start'
        });
    }
}

// Initialize tooltips and other interactive elements
document.addEventListener('DOMContentLoaded', function() {
    // Add hover effects to buttons
    const buttons = document.querySelectorAll('button, a');
    buttons.forEach(button => {
        button.addEventListener('mouseenter', function() {
            this.style.transform = 'scale(1.02)';
        });
        button.addEventListener('mouseleave', function() {
            this.style.transform = 'scale(1)';
        });
    });
});
</script>
@endpush
@endsection