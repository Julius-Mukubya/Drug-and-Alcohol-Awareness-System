@extends('layouts.public')

@section('title', $content->title . ' - MUBS Wellness Hub')

@section('content')
<div class="w-full max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <!-- Breadcrumb Navigation -->
    <nav class="mb-8">
        <ol class="flex items-center space-x-2 text-sm text-[#61897c] dark:text-gray-400">
            <li><a href="{{ route('home') }}" class="hover:text-primary transition-colors">Home</a></li>
            <li><span class="material-symbols-outlined !text-base">chevron_right</span></li>
            <li><a href="{{ route('content.index') }}" class="hover:text-primary transition-colors">Educational Resources</a></li>
            <li><span class="material-symbols-outlined !text-base">chevron_right</span></li>
            <li class="text-[#111816] dark:text-white font-medium">{{ Str::limit($content->title, 50) }}</li>
        </ol>
    </nav>

    <!-- Article Header -->
    <header class="mb-10">
        <!-- Category and Date -->
        <div class="flex items-center gap-4 mb-6">
            <span class="text-xs font-bold uppercase tracking-wider px-3 py-1.5 rounded-full
                @if($content->category->name === 'Mental Health') text-yellow-600 dark:text-yellow-400 bg-yellow-100 dark:bg-yellow-900/50
                @elseif($content->category->name === 'Alcohol') text-blue-600 dark:text-blue-400 bg-blue-100 dark:bg-blue-900/50
                @elseif($content->category->name === 'Drug Information') text-orange-600 dark:text-orange-400 bg-orange-100 dark:bg-orange-900/50
                @elseif($content->category->name === 'Support') text-purple-600 dark:text-purple-400 bg-purple-100 dark:bg-purple-900/50
                @else text-green-600 dark:text-green-400 bg-green-100 dark:bg-green-900/50
                @endif">
                {{ $content->category->name }}
            </span>
            <span class="text-sm text-[#61897c] dark:text-gray-400">
                {{ $content->published_at->format('M d, Y') }}
            </span>
        </div>
        
        <!-- Title -->
        <h1 class="text-3xl md:text-5xl font-black leading-tight tracking-[-0.033em] text-[#111816] dark:text-white mb-6">
            {{ $content->title }}
        </h1>
        
        <!-- Description -->
        <p class="text-lg md:text-xl text-[#61897c] dark:text-gray-400 leading-relaxed mb-8 max-w-4xl">
            {{ $content->description }}
        </p>
        
        <!-- Author and Meta Info -->
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 py-6 border-y border-[#f0f4f3] dark:border-gray-700">
            <div class="flex items-center space-x-4">
                <img src="{{ $content->author->profile_photo_url }}" alt="{{ $content->author->name }}" class="w-12 h-12 rounded-full border-2 border-primary/20">
                <div>
                    <p class="font-bold text-[#111816] dark:text-white">{{ $content->author->name }}</p>
                    <p class="text-sm text-[#61897c] dark:text-gray-400">Content Author</p>
                </div>
            </div>
            <div class="flex items-center gap-6 text-sm text-[#61897c] dark:text-gray-400">
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
    </header>

    <!-- Featured Image -->
    @if($content->featured_image)
    <div class="mb-10">
        <img src="{{ $content->featured_image_url }}" alt="{{ $content->title }}" class="w-full h-64 md:h-[500px] object-cover rounded-2xl shadow-lg">
    </div>
    @endif

    <!-- Article Content -->
    <article class="mb-12">
        <div class="prose prose-lg md:prose-xl max-w-none dark:prose-invert prose-headings:font-bold prose-headings:text-[#111816] dark:prose-headings:text-white prose-p:text-[#61897c] dark:prose-p:text-gray-300 prose-p:leading-relaxed prose-a:text-primary prose-a:no-underline hover:prose-a:underline prose-strong:text-[#111816] dark:prose-strong:text-white prose-blockquote:border-primary prose-blockquote:bg-primary/5 prose-blockquote:rounded-lg prose-blockquote:p-4">
            {!! nl2br(e($content->content)) !!}
        </div>
    </article>

    <!-- Video Content -->
    @if($content->video_url)
    <div class="mb-12">
        <div class="bg-white dark:bg-gray-800/50 rounded-2xl p-6 border border-[#f0f4f3] dark:border-gray-700">
            <h3 class="text-2xl font-bold text-[#111816] dark:text-white mb-4 flex items-center gap-2">
                <span class="material-symbols-outlined text-primary">play_circle</span>
                Related Video
            </h3>
            <div class="aspect-video rounded-xl overflow-hidden">
                <iframe src="{{ $content->video_url }}" class="w-full h-full" frameborder="0" allowfullscreen></iframe>
            </div>
        </div>
    </div>
    @endif

    <!-- File Download -->
    @if($content->file_path)
    <div class="mb-12">
        <div class="bg-gradient-to-r from-primary/10 to-primary/5 border border-primary/20 rounded-2xl p-6">
            <h3 class="text-xl font-bold text-[#111816] dark:text-white mb-3 flex items-center gap-2">
                <span class="material-symbols-outlined text-primary">download</span>
                Additional Resources
            </h3>
            <p class="text-[#61897c] dark:text-gray-400 mb-4">Download supplementary materials and resources related to this content.</p>
            <a href="{{ $content->file_url }}" class="inline-flex items-center gap-2 bg-primary text-[#111816] px-6 py-3 rounded-lg font-bold hover:bg-primary/90 transition-colors" download>
                <span class="material-symbols-outlined">file_download</span>
                Download Resource File
            </a>
        </div>
    </div>
    @endif

    <!-- Interactive Actions -->
    <div class="mb-12">
        <div class="bg-white dark:bg-gray-800/50 rounded-2xl p-6 border border-[#f0f4f3] dark:border-gray-700">
            <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-6">
                <!-- Action Buttons -->
                <div class="flex items-center gap-4">
                    @auth
                        <button onclick="toggleBookmark()" class="flex items-center gap-2 px-4 py-2 bg-[#f0f4f3] dark:bg-gray-700 text-[#111816] dark:text-gray-300 rounded-lg hover:bg-gray-200 dark:hover:bg-gray-600 transition-colors">
                            <span class="material-symbols-outlined !text-base" id="bookmark-icon">bookmark</span>
                            <span id="bookmark-text">Bookmark</span>
                        </button>
                        <button onclick="shareContent()" class="flex items-center gap-2 px-4 py-2 bg-[#f0f4f3] dark:bg-gray-700 text-[#111816] dark:text-gray-300 rounded-lg hover:bg-gray-200 dark:hover:bg-gray-600 transition-colors">
                            <span class="material-symbols-outlined !text-base">share</span>
                            Share
                        </button>
                    @else
                        <button onclick="openLoginModal()" class="flex items-center gap-2 px-4 py-2 bg-primary/20 text-primary rounded-lg hover:bg-primary/30 transition-colors">
                            <span class="material-symbols-outlined !text-base">bookmark</span>
                            Login to Bookmark
                        </button>
                    @endauth
                </div>

                <!-- Feedback -->
                <div class="flex items-center gap-4">
                    <span class="text-sm font-medium text-[#111816] dark:text-white">Was this helpful?</span>
                    <div class="flex items-center gap-2">
                        @auth
                            <button onclick="rateFeedback('positive')" class="flex items-center justify-center w-10 h-10 rounded-lg bg-green-100 dark:bg-green-900/30 text-green-600 dark:text-green-400 hover:bg-green-200 dark:hover:bg-green-900/50 transition-colors">
                                <span class="material-symbols-outlined !text-base">thumb_up</span>
                            </button>
                            <button onclick="rateFeedback('negative')" class="flex items-center justify-center w-10 h-10 rounded-lg bg-red-100 dark:bg-red-900/30 text-red-600 dark:text-red-400 hover:bg-red-200 dark:hover:bg-red-900/50 transition-colors">
                                <span class="material-symbols-outlined !text-base">thumb_down</span>
                            </button>
                        @else
                            <button onclick="openLoginModal()" class="flex items-center justify-center w-10 h-10 rounded-lg bg-gray-100 dark:bg-gray-700 text-gray-500 dark:text-gray-400 hover:bg-gray-200 dark:hover:bg-gray-600 transition-colors">
                                <span class="material-symbols-outlined !text-base">thumb_up</span>
                            </button>
                            <button onclick="openLoginModal()" class="flex items-center justify-center w-10 h-10 rounded-lg bg-gray-100 dark:bg-gray-700 text-gray-500 dark:text-gray-400 hover:bg-gray-200 dark:hover:bg-gray-600 transition-colors">
                                <span class="material-symbols-outlined !text-base">thumb_down</span>
                            </button>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Related Content -->
    @if(isset($relatedContents) && $relatedContents->count() > 0)
    <div class="mb-12">
        <h3 class="text-3xl font-black text-[#111816] dark:text-white mb-8 tracking-[-0.033em]">You Might Also Like</h3>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($relatedContents->take(3) as $related)
            <div class="flex flex-col gap-4 bg-white dark:bg-gray-800/50 rounded-xl overflow-hidden shadow-sm hover:shadow-lg transition-shadow duration-300 border border-[#f0f4f3] dark:border-gray-800">
                <div class="w-full bg-center bg-no-repeat aspect-video bg-cover" 
                     style="background-image: url('{{ $related->featured_image ? $related->featured_image_url : 'https://lh3.googleusercontent.com/aida-public/AB6AXuDuXoSapEBaja_kQ1hrYBGTGOGzYhm8hAs4J1cnbzKK5K4J3XnDAZgVzVLDrTSqsLKear5TspYM6ur2y5JoX9vXUlm6wR287hGWzn1-HvqOtuRpyVefLK8NtI5ORkjQFiB6MBqwd8fwMNkEHk84VAS-lbFQyOMpL7VoHohpIb_HpqXUYCS7bIDxZU8Xf5CN7riZcvzO2voJDsPEsy3bKcGBVfn1UoAm23rLIjMHroTlkiDHVGlaEGfPWH-OE908XwE3hynanLtD3w' }}')">
                </div>
                <div class="p-5 flex flex-col gap-3">
                    <span class="text-xs font-bold uppercase tracking-wider 
                        @if($related->category->name === 'Mental Health') text-yellow-600 dark:text-yellow-400 bg-yellow-100 dark:bg-yellow-900/50
                        @elseif($related->category->name === 'Alcohol') text-blue-600 dark:text-blue-400 bg-blue-100 dark:bg-blue-900/50
                        @elseif($related->category->name === 'Drug Information') text-orange-600 dark:text-orange-400 bg-orange-100 dark:bg-orange-900/50
                        @elseif($related->category->name === 'Support') text-purple-600 dark:text-purple-400 bg-purple-100 dark:bg-purple-900/50
                        @else text-green-600 dark:text-green-400 bg-green-100 dark:bg-green-900/50
                        @endif
                        px-2 py-1 rounded-full self-start">
                        {{ $related->category->name }}
                    </span>
                    <h3 class="text-[#111816] dark:text-white text-lg font-bold leading-snug cursor-pointer hover:text-primary dark:hover:text-primary">
                        <a href="{{ route('content.show', $related) }}">{{ $related->title }}</a>
                    </h3>
                    <p class="text-[#61897c] dark:text-gray-400 text-sm font-normal leading-normal">{{ Str::limit($related->description, 100) }}</p>
                </div>
                <div class="px-5 pb-5 mt-auto">
                    <div class="flex items-center justify-between text-xs text-[#61897c] dark:text-gray-500 border-t border-[#f0f4f3] dark:border-gray-700 pt-3">
                        <div class="flex items-center gap-2">
                            <span class="material-symbols-outlined !text-base">
                                @if($related->type === 'video') play_circle @else schedule @endif
                            </span>
                            <span>
                                @if($related->type === 'video')
                                    {{ $related->reading_time }} min watch
                                @else
                                    {{ $related->reading_time }} min read
                                @endif
                            </span>
                        </div>
                        <div class="flex items-center gap-2">
                            <span class="material-symbols-outlined !text-base">visibility</span>
                            <span>{{ number_format($related->views) }}</span>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    @endif

    <!-- Back to Resources -->
    <div class="text-center">
        <a href="{{ route('content.index') }}" class="inline-flex items-center gap-2 px-6 py-3 bg-[#f0f4f3] dark:bg-gray-800 text-[#111816] dark:text-gray-300 rounded-lg hover:bg-gray-200 dark:hover:bg-gray-700 transition-colors font-medium">
            <span class="material-symbols-outlined !text-base">arrow_back</span>
            Back to Educational Resources
        </a>
    </div>
</div>

@push('scripts')
<script>
function toggleBookmark() {
    const icon = document.getElementById('bookmark-icon');
    const text = document.getElementById('bookmark-text');
    
    if (icon.textContent === 'bookmark') {
        icon.textContent = 'bookmark_added';
        text.textContent = 'Bookmarked';
        // Here you would make an AJAX call to save the bookmark
    } else {
        icon.textContent = 'bookmark';
        text.textContent = 'Bookmark';
        // Here you would make an AJAX call to remove the bookmark
    }
}

function shareContent() {
    if (navigator.share) {
        navigator.share({
            title: '{{ $content->title }}',
            text: '{{ $content->description }}',
            url: window.location.href
        });
    } else {
        // Fallback: copy to clipboard
        navigator.clipboard.writeText(window.location.href).then(() => {
            alert('Link copied to clipboard!');
        });
    }
}

function rateFeedback(type) {
    // Here you would make an AJAX call to save the feedback
    const message = type === 'positive' ? 'Thank you for your feedback!' : 'Thanks for letting us know. We\'ll work to improve this content.';
    
    // Show a temporary success message
    const toast = document.createElement('div');
    toast.className = 'fixed top-4 right-4 bg-green-500 text-white px-4 py-2 rounded-lg shadow-lg z-50';
    toast.textContent = message;
    document.body.appendChild(toast);
    
    setTimeout(() => {
        toast.remove();
    }, 3000);
}
</script>
@endpush
@endsection