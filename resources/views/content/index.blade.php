@extends('layouts.app')

@section('title', 'Educational Resources - MUBS Awareness')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <!-- Header -->
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-900 dark:text-white mb-2">Educational Resources</h1>
        <p class="text-lg text-gray-600 dark:text-gray-400">Explore articles, videos, and resources about mental health and wellbeing</p>
    </div>

    <!-- Filters -->
    <div class="mb-8 flex flex-wrap gap-4">
        <div class="flex items-center space-x-2">
            <label class="text-sm font-medium text-gray-700 dark:text-gray-300">Category:</label>
            <select class="border border-gray-300 dark:border-gray-600 rounded-lg px-3 py-2 bg-white dark:bg-gray-800 text-gray-900 dark:text-white">
                <option value="">All Categories</option>
                @foreach($categories as $category)
                <option value="{{ $category->slug }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="flex items-center space-x-2">
            <label class="text-sm font-medium text-gray-700 dark:text-gray-300">Type:</label>
            <select class="border border-gray-300 dark:border-gray-600 rounded-lg px-3 py-2 bg-white dark:bg-gray-800 text-gray-900 dark:text-white">
                <option value="">All Types</option>
                <option value="article">Articles</option>
                <option value="video">Videos</option>
                <option value="infographic">Infographics</option>
                <option value="guide">Guides</option>
            </select>
        </div>
    </div>

    <!-- Content Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @forelse($contents as $content)
        <article class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 overflow-hidden hover:shadow-md transition-shadow">
            @if($content->featured_image)
            <img src="{{ $content->featured_image_url }}" alt="{{ $content->title }}" class="w-full h-48 object-cover">
            @endif
            <div class="p-6">
                <div class="flex items-center justify-between mb-3">
                    <span class="px-2 py-1 text-xs font-medium text-primary bg-primary/10 rounded-full">
                        {{ $content->category->name }}
                    </span>
                    <div class="flex items-center text-gray-500 dark:text-gray-400 text-sm">
                        <span class="material-symbols-outlined text-sm mr-1">schedule</span>
                        {{ $content->reading_time }} min
                    </div>
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
                    <div class="flex items-center text-sm text-gray-500 dark:text-gray-400">
                        <span class="material-symbols-outlined text-sm mr-1">person</span>
                        {{ $content->author->name }}
                    </div>
                    <div class="flex items-center text-sm text-gray-500 dark:text-gray-400">
                        <span class="material-symbols-outlined text-sm mr-1">visibility</span>
                        {{ $content->views }}
                    </div>
                </div>
                
                <div class="mt-4">
                    <a href="{{ route('content.show', $content) }}" class="w-full bg-primary text-white text-center py-2 rounded-lg hover:opacity-90 transition-opacity block text-sm font-medium">
                        Read More
                    </a>
                </div>
            </div>
        </article>
        @empty
        <div class="col-span-full text-center py-12">
            <span class="material-symbols-outlined text-6xl text-gray-400 mb-4">library_books</span>
            <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-2">No content found</h3>
            <p class="text-gray-500 dark:text-gray-400">Try adjusting your filters or check back later for new content.</p>
        </div>
        @endforelse
    </div>

    <!-- Pagination -->
    @if($contents->hasPages())
    <div class="mt-12">
        {{ $contents->links() }}
    </div>
    @endif
</div>
@endsection