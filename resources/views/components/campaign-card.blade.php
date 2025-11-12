@props(['title', 'description', 'image', 'url' => '#'])

<div class="rounded-xl overflow-hidden bg-emerald-700/20 dark:bg-emerald-900/50 text-[#111816] dark:text-white flex flex-col sm:flex-row items-center border border-emerald-700/30 dark:border-emerald-900/80">
    <img alt="{{ $title }}" class="w-full sm:w-48 h-48 sm:h-full object-cover" src="{{ $image }}"/>
    <div class="p-8">
        <h3 class="text-2xl font-bold">{{ $title }}</h3>
        <p class="mt-2 text-gray-600 dark:text-gray-300">{{ Str::limit($description, 120) }}</p>
        <a class="inline-block mt-6 rounded-lg bg-primary px-5 py-3 text-sm font-bold text-[#111816] hover:bg-primary/80 transition-colors" href="{{ $url }}">Join Campaign</a>
    </div>
</div>