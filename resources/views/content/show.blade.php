@extends('layouts.app')

@section('title', $content->title . ' - MUBS Awareness')

@section('content')
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <!-- Breadcrumb -->
    <nav class="mb-8">
        <ol class="flex items-center space-x-2 text-sm text-gray-500 dark:text-gray-400">
            <li><a href="{{ route('home') }}" class="hover:text-primary">Home</a></li>
            <li><span class="material-symbols-outlined text-xs">chevron_right</span></li>
            <li><a href="{{ route('content.index') }}" class="hover:text-primary">Resources</a></li>
            <li><span class="material-symbols-outlined text-xs">chevron_right</span></li>
            <li class="text-gray-900 dark:text-white">{{ Str::limit($content->title, 50) }}</li>
        </ol>
    </nav>

    <!-- Article Header -->
    <header class="mb-8">
        <div class="flex items-center mb-4">
            <span class="px-3 py-1 text-sm font-medium text-primary bg-primary/10 rounded-full">
                {{ $content->category->name }}
            </span>
            <span class="ml-4 text-sm text-gray-500 dark:text-gray-400">
                {{ $content->published_at->format('M d, Y') }}
            </span>
        </div>
        
        <h1 class="text-3xl md:text-4xl font-bold text-gray-900 dark:text-white mb-4">
            {{ $content->title }}
        </h1>
        
        <p class="text-lg text-gray-600 dark:text-gray-400 mb-6">
            {{ $content->description }}
        </p>
        
        <div class="flex items-center justify-between py-4 border-t border-b border-gray-200 dark:border-gray-700">
            <div class="flex items-center space-x-4">
                <img src="{{ $content->author->profile_photo_url }}" alt="{{ $content->author->name }}" class="w-10 h-10 rounded-full">
                <div>
                    <p class="font-medium text-gray-900 dark:text-white">{{ $content->author->name }}</p>
                    <p class="text-sm text-gray-500 dark:text-gray-400">Author</p>
                </div>
            </div>
            <div class="flex items-center space-x-6 text-sm text-gray-500 dark:text-gray-400">
                <div class="flex items-center">
                    <span class="material-symbols-outlined text-sm mr-1">schedule</span>
                    {{ $content->reading_time }} min read
                </div>
                <div class="flex items-center">
                    <span class="material-symbols-outlined text-sm mr-1">visibility</span>
                    {{ $content->views }} views
                </div>
            </div>
        </div>
    </header>

    <!-- Featured Image -->
    @if($content->featured_image)
    <div class="mb-8">
        <img src="{{ $content->featured_image_url }}" alt="{{ $content->title }}" class="w-full h-64 md:h-96 object-cover rounded-xl">
    </div>
    @endif

    <!-- Article Content -->
    <article class="prose prose-lg max-w-none dark:prose-invert">
        {!! nl2br(e($content->content)) !!}
    </article>

    <!-- Video Content -->
    @if($content->video_url)
    <div class="mt-8">
        <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">Related Video</h3>
        <div class="aspect-w-16 aspect-h-9">
            <iframe src="{{ $content->video_url }}" class="w-full h-64 md:h-96 rounded-lg" frameborder="0" allowfullscreen></iframe>
        </div>
    </div>
    @endif

    <!-- File Download -->
    @if($content->file_path)
    <div class="mt-8 p-4 bg-gray-50 dark:bg-gray-800 rounded-lg">
        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">Additional Resources</h3>
        <a href="{{ $content->file_url }}" class="inline-flex items-center text-primary hover:underline" download>
            <span class="material-symbols-outlined mr-2">download</span>
            Download Resource File
        </a>
    </div>
    @endif

    <!-- Actions -->
    @auth
    <div class="mt-8 flex items-center justify-between py-6 border-t border-gray-200 dark:border-gray-700">
        <div class="flex items-center space-x-4">
            <button class="flex items-center text-gray-500 dark:text-gray-400 hover:text-primary">
                <span class="material-symbols-outlined mr-1">bookmark</span>
                Bookmark
            </button>
            <button class="flex items-center text-gray-500 dark:text-gray-400 hover:text-primary">
                <span class="material-symbols-outlined mr-1">share</span>
                Share
            </button>
        </div>
        <div class="text-sm text-gray-500 dark:text-gray-400">
            Was this helpful?
            <button class="ml-2 text-green-600 hover:text-green-700">
                <span class="material-symbols-outlined">thumb_up</span>
            </button>
            <button class="ml-1 text-red-600 hover:text-red-700">
                <span class="material-symbols-outlined">thumb_down</span>
            </button>
        </div>
    </div>
    @endauth

    <!-- Related Content -->
    <div class="mt-12">
        <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-6">Related Resources</h3>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- This would be populated with related content -->
            <div class="bg-gray-50 dark:bg-gray-800 p-6 rounded-lg text-center">
                <span class="material-symbols-outlined text-4xl text-gray-400 mb-2">library_books</span>
                <p class="text-gray-500 dark:text-gray-400">Related content coming soon</p>
            </div>
        </div>
    </div>
</div>
@endsection