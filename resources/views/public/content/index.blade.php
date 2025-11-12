@extends('layouts.public')

@section('title', 'Educational Resources - MUBS Wellness Hub')

@section('content')
<div class="w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
    <div class="flex flex-col flex-1 gap-8">
        <!-- Page Header -->
        <div class="flex flex-wrap justify-between gap-4 items-center">
            <div class="flex min-w-72 flex-col gap-2">
                <p class="text-[#111816] dark:text-white text-4xl font-black leading-tight tracking-[-0.033em]">Educational Resources</p>
                <p class="text-[#61897c] dark:text-gray-400 text-base font-normal leading-normal">Explore articles, videos, and guides to learn more about substance awareness and mental wellness.</p>
            </div>
        </div>

        <!-- Filters Section -->
        <div class="flex flex-col sm:flex-row gap-4 items-center border-y border-[#f0f4f3] dark:border-gray-800 py-4">
            <div class="flex items-center gap-3 flex-wrap flex-1">
                <label class="text-sm font-medium text-[#111816] dark:text-gray-300" for="category-select">Category:</label>
                <select class="rounded-lg h-9 pl-3 pr-8 border-[#f0f4f3] dark:border-gray-700 bg-background-light dark:bg-background-dark text-sm focus:ring-primary focus:border-primary" id="category-select">
                    <option value="">All Categories</option>
                    @foreach($categories as $category)
                    <option value="{{ $category->slug }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="flex gap-2 p-1 flex-wrap justify-start">
                <button class="flex h-8 shrink-0 items-center justify-center gap-x-2 rounded-lg bg-primary/20 dark:bg-primary/30 px-4 text-primary text-sm font-bold">All</button>
                <button class="flex h-8 shrink-0 items-center justify-center gap-x-2 rounded-lg bg-[#f0f4f3] dark:bg-gray-800 px-4 text-[#111816] dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-gray-700 text-sm font-medium">Articles</button>
                <button class="flex h-8 shrink-0 items-center justify-center gap-x-2 rounded-lg bg-[#f0f4f3] dark:bg-gray-800 px-4 text-[#111816] dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-gray-700 text-sm font-medium">Videos</button>
                <button class="flex h-8 shrink-0 items-center justify-center gap-x-2 rounded-lg bg-[#f0f4f3] dark:bg-gray-800 px-4 text-[#111816] dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-gray-700 text-sm font-medium">Infographics</button>
                <button class="flex h-8 shrink-0 items-center justify-center gap-x-2 rounded-lg bg-[#f0f4f3] dark:bg-gray-800 px-4 text-[#111816] dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-gray-700 text-sm font-medium">Guides</button>
            </div>
        </div>

        <!-- Content Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($contents as $content)
            <div class="flex flex-col gap-4 bg-white dark:bg-gray-800/50 rounded-xl overflow-hidden shadow-sm hover:shadow-lg transition-shadow duration-300 border border-[#f0f4f3] dark:border-gray-800">
                <div class="w-full bg-center bg-no-repeat aspect-video bg-cover" 
                     style="background-image: url('{{ $content->featured_image ? $content->featured_image_url : 'https://lh3.googleusercontent.com/aida-public/AB6AXuDuXoSapEBaja_kQ1hrYBGTGOGzYhm8hAs4J1cnbzKK5K4J3XnDAZgVzVLDrTSqsLKear5TspYM6ur2y5JoX9vXUlm6wR287hGWzn1-HvqOtuRpyVefLK8NtI5ORkjQFiB6MBqwd8fwMNkEHk84VAS-lbFQyOMpL7VoHohpIb_HpqXUYCS7bIDxZU8Xf5CN7riZcvzO2voJDsPEsy3bKcGBVfn1UoAm23rLIjMHroTlkiDHVGlaEGfPWH-OE908XwE3hynanLtD3w' }}')">
                </div>
                <div class="p-5 flex flex-col gap-3">
                    <span class="text-xs font-bold uppercase tracking-wider 
                        @if($content->category->name === 'Mental Health') text-yellow-600 dark:text-yellow-400 bg-yellow-100 dark:bg-yellow-900/50
                        @elseif($content->category->name === 'Alcohol') text-blue-600 dark:text-blue-400 bg-blue-100 dark:bg-blue-900/50
                        @elseif($content->category->name === 'Drug Information') text-orange-600 dark:text-orange-400 bg-orange-100 dark:bg-orange-900/50
                        @elseif($content->category->name === 'Support') text-purple-600 dark:text-purple-400 bg-purple-100 dark:bg-purple-900/50
                        @else text-green-600 dark:text-green-400 bg-green-100 dark:bg-green-900/50
                        @endif
                        px-2 py-1 rounded-full self-start">
                        {{ $content->category->name }}
                    </span>
                    <h3 class="text-[#111816] dark:text-white text-lg font-bold leading-snug cursor-pointer hover:text-primary dark:hover:text-primary">
                        <a href="{{ route('content.show', $content) }}">{{ $content->title }}</a>
                    </h3>
                    <p class="text-[#61897c] dark:text-gray-400 text-sm font-normal leading-normal">{{ Str::limit($content->description, 120) }}</p>
                </div>
                <div class="px-5 pb-5 mt-auto">
                    <div class="flex items-center justify-between text-xs text-[#61897c] dark:text-gray-500 border-t border-[#f0f4f3] dark:border-gray-700 pt-3">
                        <div class="flex items-center gap-2">
                            <span class="material-symbols-outlined !text-base">
                                @if($content->type === 'video') play_circle @else schedule @endif
                            </span>
                            <span>
                                @if($content->type === 'video')
                                    {{ $content->reading_time }} min watch
                                @else
                                    {{ $content->reading_time }} min read
                                @endif
                            </span>
                        </div>
                        <div class="flex items-center gap-2">
                            <span class="material-symbols-outlined !text-base">visibility</span>
                            <span>{{ number_format($content->views) }} views</span>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-span-full flex flex-col items-center justify-center gap-6 py-16 text-center">
                <div class="text-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-24 w-24" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <div class="flex max-w-md flex-col items-center gap-2">
                    <p class="text-[#111816] dark:text-white text-xl font-bold leading-tight tracking-[-0.015em]">No Resources Found</p>
                    <p class="text-[#61897c] dark:text-gray-400 text-sm font-normal leading-normal">We couldn't find any content matching your filters. Try adjusting your search to discover new resources.</p>
                </div>
                <button class="flex min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-lg h-10 px-4 bg-[#f0f4f3] dark:bg-gray-800 text-[#111816] dark:text-gray-200 text-sm font-bold leading-normal tracking-[0.015em] hover:bg-gray-200 dark:hover:bg-gray-700">
                    <span class="truncate">Clear Filters</span>
                </button>
            </div>
            @endforelse
        </div>

        <!-- Pagination -->
        @if($contents->hasPages())
        <div class="flex flex-col sm:flex-row items-center justify-between gap-4 py-6 border-t border-[#f0f4f3] dark:border-gray-800">
            <p class="text-sm text-[#61897c] dark:text-gray-400">
                Showing <span class="font-bold text-[#111816] dark:text-gray-200">{{ $contents->firstItem() }}-{{ $contents->lastItem() }}</span> 
                of <span class="font-bold text-[#111816] dark:text-gray-200">{{ $contents->total() }}</span> results
            </p>
            <nav class="flex items-center gap-2">
                @if ($contents->onFirstPage())
                    <button disabled class="flex items-center justify-center size-9 rounded-lg border border-[#f0f4f3] dark:border-gray-700 bg-white dark:bg-gray-800 text-[#61897c] dark:text-gray-400 opacity-50 cursor-not-allowed">
                        <span class="material-symbols-outlined !text-xl">chevron_left</span>
                    </button>
                @else
                    <a href="{{ $contents->previousPageUrl() }}" class="flex items-center justify-center size-9 rounded-lg border border-[#f0f4f3] dark:border-gray-700 bg-white dark:bg-gray-800 text-[#61897c] dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors">
                        <span class="material-symbols-outlined !text-xl">chevron_left</span>
                    </a>
                @endif

                @foreach ($contents->getUrlRange(1, $contents->lastPage()) as $page => $url)
                    @if ($page == $contents->currentPage())
                        <button class="flex items-center justify-center size-9 rounded-lg border border-primary text-primary bg-primary/20 dark:bg-primary/30 font-bold text-sm">{{ $page }}</button>
                    @else
                        <a href="{{ $url }}" class="flex items-center justify-center size-9 rounded-lg border border-[#f0f4f3] dark:border-gray-700 bg-white dark:bg-gray-800 text-[#111816] dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors text-sm">{{ $page }}</a>
                    @endif
                @endforeach

                @if ($contents->hasMorePages())
                    <a href="{{ $contents->nextPageUrl() }}" class="flex items-center justify-center size-9 rounded-lg border border-[#f0f4f3] dark:border-gray-700 bg-white dark:bg-gray-800 text-[#111816] dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors">
                        <span class="material-symbols-outlined !text-xl">chevron_right</span>
                    </a>
                @else
                    <button disabled class="flex items-center justify-center size-9 rounded-lg border border-[#f0f4f3] dark:border-gray-700 bg-white dark:bg-gray-800 text-[#61897c] dark:text-gray-400 opacity-50 cursor-not-allowed">
                        <span class="material-symbols-outlined !text-xl">chevron_right</span>
                    </button>
                @endif
            </nav>
        </div>
        @endif
    </div>
</div>
@endsection