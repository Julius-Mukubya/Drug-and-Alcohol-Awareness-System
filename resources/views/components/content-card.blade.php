@props(['content' => null, 'title', 'category' => 'General', 'description', 'image', 'type' => 'article', 'url' => '#'])

<div class="flex flex-col gap-4 rounded-xl border border-gray-200 dark:border-gray-800 bg-white dark:bg-gray-900/50 overflow-hidden group">
    <div class="relative">
        <img alt="{{ $title }}" class="w-full h-48 object-cover" src="{{ $image }}"/>
        @if($type === 'video')
        <div class="absolute inset-0 bg-black/40 flex items-center justify-center">
            <div class="bg-white/20 backdrop-blur-sm rounded-full p-4">
                <span class="material-symbols-outlined text-white text-4xl leading-none">play_arrow</span>
            </div>
        </div>
        @endif
    </div>
    <div class="p-6 flex flex-col flex-1">
        <span class="text-primary text-sm font-bold uppercase">{{ $category }}</span>
        <h3 class="text-[#111816] dark:text-white text-lg font-bold leading-tight mt-2">{{ Str::limit($title, 60) }}</h3>
        <p class="text-gray-600 dark:text-gray-400 text-sm font-normal leading-normal mt-2 flex-grow">{{ Str::limit($description, 100) }}</p>
        <a class="text-primary dark:text-primary hover:underline text-sm font-bold mt-4 self-start" href="{{ $url }}">
            @if($type === 'video')
                Watch Video →
            @else
                Read More →
            @endif
        </a>
    </div>
</div>