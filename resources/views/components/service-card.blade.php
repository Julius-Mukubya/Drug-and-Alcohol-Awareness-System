@props(['icon', 'title', 'description'])

<div class="flex flex-1 flex-col gap-4 rounded-xl border border-gray-200 dark:border-gray-800 bg-white dark:bg-gray-900/50 p-6 text-center items-center">
    <div class="text-primary">
        <span class="material-symbols-outlined text-5xl">{{ $icon }}</span>
    </div>
    <div class="flex flex-col gap-2">
        <h3 class="text-[#111816] dark:text-white text-xl font-bold leading-tight">{{ $title }}</h3>
        <p class="text-gray-600 dark:text-gray-400 text-sm font-normal leading-normal">{{ $description }}</p>
    </div>
</div>