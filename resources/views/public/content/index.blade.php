@extends('layouts.public')

@section('title', 'Educational Resources - MUBS Wellness Hub')

@section('content')
<!-- Hero Section -->
<div class="relative bg-gradient-to-br from-primary/10 via-background-light to-primary/5 dark:from-primary/20 dark:via-background-dark dark:to-primary/10 py-16 sm:py-20">
    <div class="absolute inset-0 bg-[url('data:image/svg+xml,%3Csvg width="60" height="60" viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg"%3E%3Cg fill="none" fill-rule="evenodd"%3E%3Cg fill="%2314eba3" fill-opacity="0.05"%3E%3Ccircle cx="30" cy="30" r="2"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E')] opacity-50"></div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-4xl mx-auto">
            <div class="inline-flex items-center gap-2 bg-primary/20 dark:bg-primary/30 text-primary px-4 py-2 rounded-full text-sm font-semibold mb-6">
                <span class="material-symbols-outlined !text-lg">school</span>
                Educational Resources
            </div>
            <h1 class="text-4xl sm:text-5xl lg:text-6xl font-black text-[#111816] dark:text-white leading-tight tracking-tight mb-6">
                Learn, Grow, and 
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-primary to-green-600">Thrive</span>
            </h1>
            <p class="text-xl text-[#61897c] dark:text-gray-400 leading-relaxed max-w-2xl mx-auto mb-8">
                Discover evidence-based articles, engaging videos, and practical guides designed to support your journey toward wellness and informed decision-making.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
                <div class="flex items-center gap-2 text-[#61897c] dark:text-gray-400">
                    <span class="material-symbols-outlined !text-lg">library_books</span>
                    <span class="text-sm font-medium">{{ $contents->total() }} Resources Available</span>
                </div>
                <div class="hidden sm:block w-1 h-1 bg-[#61897c] dark:bg-gray-400 rounded-full"></div>
                <div class="flex items-center gap-2 text-[#61897c] dark:text-gray-400">
                    <span class="material-symbols-outlined !text-lg">category</span>
                    <span class="text-sm font-medium">{{ $categories->count() }} Categories</span>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <div class="flex flex-col flex-1 gap-10">

        <!-- Enhanced Filters Section -->
        <div class="bg-white dark:bg-gray-800/50 rounded-2xl p-6 shadow-sm border border-[#f0f4f3] dark:border-gray-800">
            <div class="flex flex-col lg:flex-row gap-6 items-start lg:items-center">
                <!-- Search Bar -->
                <div class="flex-1 w-full lg:w-auto">
                    <div class="relative">
                        <span class="material-symbols-outlined absolute left-3 top-1/2 transform -translate-y-1/2 text-[#61897c] dark:text-gray-400 !text-xl">search</span>
                        <input type="text" placeholder="Search resources..." 
                               class="w-full pl-12 pr-4 py-3 rounded-xl border border-[#f0f4f3] dark:border-gray-700 bg-background-light dark:bg-background-dark text-[#111816] dark:text-white placeholder-[#61897c] dark:placeholder-gray-400 focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all duration-200">
                    </div>
                </div>
                
                <!-- Category Filter -->
                <div class="flex items-center gap-3">
                    <label class="text-sm font-semibold text-[#111816] dark:text-gray-300 whitespace-nowrap">Filter by:</label>
                    <select class="rounded-xl h-12 pl-4 pr-10 border border-[#f0f4f3] dark:border-gray-700 bg-background-light dark:bg-background-dark text-[#111816] dark:text-white text-sm focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all duration-200 min-w-[160px]" id="category-select">
                        <option value="">All Categories</option>
                        @foreach($categories as $category)
                        <option value="{{ $category->slug }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            
            <!-- Content Type Filters -->
            <div class="flex flex-wrap gap-3 mt-6 pt-6 border-t border-[#f0f4f3] dark:border-gray-700">
                <span class="text-sm font-semibold text-[#111816] dark:text-gray-300 self-center">Content Type:</span>
                <button class="flex h-10 items-center justify-center gap-2 rounded-xl bg-primary text-white px-6 text-sm font-semibold shadow-sm hover:shadow-md transition-all duration-200 transform hover:scale-105">
                    <span class="material-symbols-outlined !text-lg">select_all</span>
                    All
                </button>
                <button class="flex h-10 items-center justify-center gap-2 rounded-xl bg-white dark:bg-gray-800 border border-[#f0f4f3] dark:border-gray-700 px-6 text-[#111816] dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700 text-sm font-medium transition-all duration-200 transform hover:scale-105">
                    <span class="material-symbols-outlined !text-lg">article</span>
                    Articles
                </button>
                <button class="flex h-10 items-center justify-center gap-2 rounded-xl bg-white dark:bg-gray-800 border border-[#f0f4f3] dark:border-gray-700 px-6 text-[#111816] dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700 text-sm font-medium transition-all duration-200 transform hover:scale-105">
                    <span class="material-symbols-outlined !text-lg">play_circle</span>
                    Videos
                </button>
                <button class="flex h-10 items-center justify-center gap-2 rounded-xl bg-white dark:bg-gray-800 border border-[#f0f4f3] dark:border-gray-700 px-6 text-[#111816] dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700 text-sm font-medium transition-all duration-200 transform hover:scale-105">
                    <span class="material-symbols-outlined !text-lg">image</span>
                    Infographics
                </button>
                <button class="flex h-10 items-center justify-center gap-2 rounded-xl bg-white dark:bg-gray-800 border border-[#f0f4f3] dark:border-gray-700 px-6 text-[#111816] dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700 text-sm font-medium transition-all duration-200 transform hover:scale-105">
                    <span class="material-symbols-outlined !text-lg">menu_book</span>
                    Guides
                </button>
            </div>
        </div>

        <!-- Enhanced Content Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-8">
            @forelse($contents as $content)
            <article class="group bg-white dark:bg-gray-800/50 rounded-2xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 border border-[#f0f4f3] dark:border-gray-800 transform hover:-translate-y-1">
                <!-- Image Container with Overlay -->
                <div class="relative w-full aspect-video bg-center bg-no-repeat bg-cover overflow-hidden" 
                     style="background-image: url('{{ $content->featured_image ? $content->featured_image_url : 'https://lh3.googleusercontent.com/aida-public/AB6AXuDuXoSapEBaja_kQ1hrYBGTGOGzYhm8hAs4J1cnbzKK5K4J3XnDAZgVzVLDrTSqsLKear5TspYM6ur2y5JoX9vXUlm6wR287hGWzn1-HvqOtuRpyVefLK8NtI5ORkjQFiB6MBqwd8fwMNkEHk84VAS-lbFQyOMpL7VoHohpIb_HpqXUYCS7bIDxZU8Xf5CN7riZcvzO2voJDsPEsy3bKcGBVfn1UoAm23rLIjMHroTlkiDHVGlaEGfPWH-OE908XwE3hynanLtD3w' }}')">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    
                    <!-- Content Type Badge -->
                    <div class="absolute top-4 left-4">
                        <div class="flex items-center gap-1 bg-white/90 dark:bg-gray-900/90 backdrop-blur-sm px-3 py-1.5 rounded-full text-xs font-semibold text-[#111816] dark:text-white">
                            <span class="material-symbols-outlined !text-sm">
                                @if($content->type === 'video') play_circle
                                @elseif($content->type === 'infographic') image
                                @elseif($content->type === 'guide') menu_book
                                @else article
                                @endif
                            </span>
                            {{ ucfirst($content->type) }}
                        </div>
                    </div>
                    
                    <!-- Reading Time Badge -->
                    <div class="absolute top-4 right-4">
                        <div class="flex items-center gap-1 bg-primary/90 backdrop-blur-sm px-3 py-1.5 rounded-full text-xs font-semibold text-white">
                            <span class="material-symbols-outlined !text-sm">schedule</span>
                            {{ $content->reading_time }} min
                        </div>
                    </div>
                    
                    <!-- Hover Play Button for Videos -->
                    @if($content->type === 'video')
                    <div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        <div class="bg-primary/90 backdrop-blur-sm rounded-full p-4 transform scale-75 group-hover:scale-100 transition-transform duration-300">
                            <span class="material-symbols-outlined text-white !text-2xl">play_arrow</span>
                        </div>
                    </div>
                    @endif
                </div>
                
                <!-- Content -->
                <div class="p-6 flex flex-col gap-4 flex-1">
                    <!-- Category Badge -->
                    <div class="flex items-center justify-between">
                        <span class="inline-flex items-center gap-1 text-xs font-bold uppercase tracking-wider px-3 py-1.5 rounded-full
                            @if($content->category->name === 'Mental Health') text-yellow-700 dark:text-yellow-300 bg-yellow-100 dark:bg-yellow-900/50
                            @elseif($content->category->name === 'Alcohol') text-blue-700 dark:text-blue-300 bg-blue-100 dark:bg-blue-900/50
                            @elseif($content->category->name === 'Drug Information') text-orange-700 dark:text-orange-300 bg-orange-100 dark:bg-orange-900/50
                            @elseif($content->category->name === 'Support') text-purple-700 dark:text-purple-300 bg-purple-100 dark:bg-purple-900/50
                            @else text-green-700 dark:text-green-300 bg-green-100 dark:bg-green-900/50
                            @endif">
                            <span class="material-symbols-outlined !text-sm">category</span>
                            {{ $content->category->name }}
                        </span>
                        
                        <!-- Bookmark Button -->
                        <button class="p-2 rounded-full hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors group/bookmark">
                            <span class="material-symbols-outlined !text-lg text-[#61897c] dark:text-gray-400 group-hover/bookmark:text-primary">bookmark_border</span>
                        </button>
                    </div>
                    
                    <!-- Title -->
                    <h3 class="text-[#111816] dark:text-white text-xl font-bold leading-tight group-hover:text-primary dark:group-hover:text-primary transition-colors duration-200 line-clamp-2">
                        <a href="{{ route('content.show', $content) }}" class="block">{{ $content->title }}</a>
                    </h3>
                    
                    <!-- Description -->
                    <p class="text-[#61897c] dark:text-gray-400 text-sm leading-relaxed line-clamp-3 flex-1">
                        {{ Str::limit($content->description, 140) }}
                    </p>
                    
                    <!-- Footer Stats -->
                    <div class="flex items-center justify-between pt-4 border-t border-[#f0f4f3] dark:border-gray-700">
                        <div class="flex items-center gap-4 text-xs text-[#61897c] dark:text-gray-500">
                            <div class="flex items-center gap-1">
                                <span class="material-symbols-outlined !text-base">visibility</span>
                                <span class="font-medium">{{ number_format($content->views) }}</span>
                            </div>
                            <div class="flex items-center gap-1">
                                <span class="material-symbols-outlined !text-base">calendar_today</span>
                                <span class="font-medium">{{ $content->created_at->format('M j') }}</span>
                            </div>
                        </div>
                        
                        <!-- Read More Button -->
                        <a href="{{ route('content.show', $content) }}" 
                           class="inline-flex items-center gap-1 text-primary hover:text-primary/80 text-sm font-semibold transition-colors group/read">
                            Read More
                            <span class="material-symbols-outlined !text-sm transform group-hover/read:translate-x-0.5 transition-transform">arrow_forward</span>
                        </a>
                    </div>
                </div>
            </article>
            @empty
            <!-- Enhanced Empty State -->
            <div class="col-span-full flex flex-col items-center justify-center gap-8 py-20 text-center">
                <div class="relative">
                    <div class="w-32 h-32 bg-gradient-to-br from-primary/20 to-primary/10 rounded-full flex items-center justify-center">
                        <span class="material-symbols-outlined text-primary !text-6xl">search_off</span>
                    </div>
                    <div class="absolute -top-2 -right-2 w-8 h-8 bg-yellow-400 rounded-full flex items-center justify-center">
                        <span class="material-symbols-outlined text-yellow-800 !text-lg">sentiment_dissatisfied</span>
                    </div>
                </div>
                <div class="flex max-w-lg flex-col items-center gap-4">
                    <h3 class="text-[#111816] dark:text-white text-2xl font-bold leading-tight">No Resources Found</h3>
                    <p class="text-[#61897c] dark:text-gray-400 text-base leading-relaxed">
                        We couldn't find any content matching your current filters. Try adjusting your search criteria or explore different categories to discover valuable resources.
                    </p>
                </div>
                <div class="flex flex-col sm:flex-row gap-4">
                    <button class="flex items-center justify-center gap-2 px-6 py-3 bg-primary text-white rounded-xl font-semibold hover:bg-primary/90 transition-colors transform hover:scale-105">
                        <span class="material-symbols-outlined !text-lg">refresh</span>
                        Clear All Filters
                    </button>
                    <button class="flex items-center justify-center gap-2 px-6 py-3 bg-white dark:bg-gray-800 border border-[#f0f4f3] dark:border-gray-700 text-[#111816] dark:text-gray-200 rounded-xl font-semibold hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors">
                        <span class="material-symbols-outlined !text-lg">explore</span>
                        Browse All Content
                    </button>
                </div>
            </div>
            @endforelse
        </div>

        <!-- Enhanced Pagination -->
        @if($contents->hasPages())
        <div class="bg-white dark:bg-gray-800/50 rounded-2xl p-6 shadow-sm border border-[#f0f4f3] dark:border-gray-800">
            <div class="flex flex-col sm:flex-row items-center justify-between gap-6">
                <!-- Results Info -->
                <div class="flex items-center gap-4">
                    <div class="flex items-center gap-2 text-sm text-[#61897c] dark:text-gray-400">
                        <span class="material-symbols-outlined !text-lg">info</span>
                        <span>
                            Showing <span class="font-bold text-[#111816] dark:text-gray-200">{{ $contents->firstItem() }}-{{ $contents->lastItem() }}</span> 
                            of <span class="font-bold text-[#111816] dark:text-gray-200">{{ $contents->total() }}</span> resources
                        </span>
                    </div>
                </div>
                
                <!-- Pagination Controls -->
                <nav class="flex items-center gap-2">
                    @if ($contents->onFirstPage())
                        <button disabled class="flex items-center justify-center w-10 h-10 rounded-xl border border-[#f0f4f3] dark:border-gray-700 bg-white dark:bg-gray-800 text-[#61897c] dark:text-gray-400 opacity-50 cursor-not-allowed">
                            <span class="material-symbols-outlined !text-xl">chevron_left</span>
                        </button>
                    @else
                        <a href="{{ $contents->previousPageUrl() }}" class="flex items-center justify-center w-10 h-10 rounded-xl border border-[#f0f4f3] dark:border-gray-700 bg-white dark:bg-gray-800 text-[#61897c] dark:text-gray-400 hover:bg-primary hover:text-white hover:border-primary transition-all duration-200 transform hover:scale-105">
                            <span class="material-symbols-outlined !text-xl">chevron_left</span>
                        </a>
                    @endif

                    @foreach ($contents->getUrlRange(1, $contents->lastPage()) as $page => $url)
                        @if ($page == $contents->currentPage())
                            <button class="flex items-center justify-center w-10 h-10 rounded-xl bg-primary text-white font-bold text-sm shadow-sm transform scale-105">{{ $page }}</button>
                        @else
                            <a href="{{ $url }}" class="flex items-center justify-center w-10 h-10 rounded-xl border border-[#f0f4f3] dark:border-gray-700 bg-white dark:bg-gray-800 text-[#111816] dark:text-gray-300 hover:bg-primary hover:text-white hover:border-primary transition-all duration-200 transform hover:scale-105 text-sm font-medium">{{ $page }}</a>
                        @endif
                    @endforeach

                    @if ($contents->hasMorePages())
                        <a href="{{ $contents->nextPageUrl() }}" class="flex items-center justify-center w-10 h-10 rounded-xl border border-[#f0f4f3] dark:border-gray-700 bg-white dark:bg-gray-800 text-[#111816] dark:text-gray-300 hover:bg-primary hover:text-white hover:border-primary transition-all duration-200 transform hover:scale-105">
                            <span class="material-symbols-outlined !text-xl">chevron_right</span>
                        </a>
                    @else
                        <button disabled class="flex items-center justify-center w-10 h-10 rounded-xl border border-[#f0f4f3] dark:border-gray-700 bg-white dark:bg-gray-800 text-[#61897c] dark:text-gray-400 opacity-50 cursor-not-allowed">
                            <span class="material-symbols-outlined !text-xl">chevron_right</span>
                        </button>
                    @endif
                </nav>
            </div>
        </div>
        @endif
    </div>
</div>
@endsection

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
    
    /* Smooth hover animations */
    .group:hover .group-hover\:scale-100 {
        transform: scale(1);
    }
    
    .group:hover .group-hover\:opacity-100 {
        opacity: 1;
    }
    
    /* Custom scrollbar for better UX */
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
    
    /* Loading animation */
    @keyframes pulse {
        0%, 100% { opacity: 1; }
        50% { opacity: 0.5; }
    }
    
    .animate-pulse {
        animation: pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite;
    }
</style>
@endpush

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Search functionality
    const searchInput = document.querySelector('input[placeholder="Search resources..."]');
    const categorySelect = document.getElementById('category-select');
    const contentTypeButtons = document.querySelectorAll('button[class*="rounded-xl"]');
    
    // Debounce function for search
    function debounce(func, wait) {
        let timeout;
        return function executedFunction(...args) {
            const later = () => {
                clearTimeout(timeout);
                func(...args);
            };
            clearTimeout(timeout);
            timeout = setTimeout(later, wait);
        };
    }
    
    // Search input handler
    if (searchInput) {
        const debouncedSearch = debounce(function(e) {
            // Add search functionality here
            console.log('Searching for:', e.target.value);
        }, 300);
        
        searchInput.addEventListener('input', debouncedSearch);
    }
    
    // Category filter handler
    if (categorySelect) {
        categorySelect.addEventListener('change', function(e) {
            console.log('Category changed to:', e.target.value);
            // Add category filtering logic here
        });
    }
    
    // Content type filter buttons
    contentTypeButtons.forEach(button => {
        if (button.textContent.trim().match(/^(All|Articles|Videos|Infographics|Guides)$/)) {
            button.addEventListener('click', function() {
                // Remove active state from all buttons
                contentTypeButtons.forEach(btn => {
                    if (btn.textContent.trim().match(/^(All|Articles|Videos|Infographics|Guides)$/)) {
                        btn.className = btn.className.replace(/bg-primary text-white/, 'bg-white dark:bg-gray-800 border border-[#f0f4f3] dark:border-gray-700 text-[#111816] dark:text-gray-300');
                    }
                });
                
                // Add active state to clicked button
                this.className = this.className.replace(/bg-white dark:bg-gray-800 border border-\[#f0f4f3\] dark:border-gray-700 text-\[#111816\] dark:text-gray-300/, 'bg-primary text-white');
                
                console.log('Content type changed to:', this.textContent.trim());
            });
        }
    });
    
    // Bookmark functionality
    const bookmarkButtons = document.querySelectorAll('.group\\/bookmark');
    bookmarkButtons.forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            const icon = this.querySelector('.material-symbols-outlined');
            
            if (icon.textContent === 'bookmark_border') {
                icon.textContent = 'bookmark';
                icon.classList.add('text-primary');
                // Add to bookmarks logic here
                showToast('Added to bookmarks!', 'success');
            } else {
                icon.textContent = 'bookmark_border';
                icon.classList.remove('text-primary');
                // Remove from bookmarks logic here
                showToast('Removed from bookmarks!', 'info');
            }
        });
    });
    
    // Toast notification function
    function showToast(message, type = 'info') {
        const toast = document.createElement('div');
        toast.className = `fixed top-20 right-4 z-50 px-6 py-3 rounded-xl shadow-lg transform translate-x-full transition-transform duration-300 ${
            type === 'success' ? 'bg-green-500 text-white' : 
            type === 'error' ? 'bg-red-500 text-white' : 
            'bg-primary text-white'
        }`;
        toast.textContent = message;
        
        document.body.appendChild(toast);
        
        // Slide in
        setTimeout(() => {
            toast.classList.remove('translate-x-full');
        }, 100);
        
        // Slide out and remove
        setTimeout(() => {
            toast.classList.add('translate-x-full');
            setTimeout(() => {
                document.body.removeChild(toast);
            }, 300);
        }, 3000);
    }
    
    // Smooth scroll for anchor links
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
    
    // Intersection Observer for fade-in animations
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
    
    // Observe all content cards
    document.querySelectorAll('article.group').forEach(card => {
        card.style.opacity = '0';
        card.style.transform = 'translateY(20px)';
        card.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
        observer.observe(card);
    });
});
</script>
@endpush