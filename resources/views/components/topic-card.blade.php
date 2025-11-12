@props(['icon', 'title', 'url' => '#'])

<a class="flex flex-col items-center gap-3 p-4 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-800/50 transition-colors" href="{{ $url }}">
    <span class="material-symbols-outlined text-4xl text-primary">{{ $icon }}</span>
    <span class="text-[#111816] dark:text-white font-medium">{{ $title }}</span>
</a>