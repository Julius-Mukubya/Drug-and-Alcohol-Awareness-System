@props(['title', 'description', 'image', 'url' => '#', 'status' => 'sample', 'participants' => null])

<article class="group bg-white dark:bg-gray-800/50 rounded-2xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 border border-[#f0f4f3] dark:border-gray-800 transform hover:-translate-y-1">
    <!-- Image Container -->
    <div class="relative overflow-hidden">
        <img src="{{ $image }}" alt="{{ $title }}" 
             class="w-full h-48 object-cover transition-transform duration-500 group-hover:scale-105"
             onerror="this.src='https://images.unsplash.com/photo-1559757148-5c350d0d3c56?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80'">
        
        <!-- Overlay -->
        <div class="absolute inset-0 bg-gradient-to-t from-black/40 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
        
        <!-- Status Badge -->
        <div class="absolute top-4 left-4">
            <div class="flex items-center gap-2 
                @if($status === 'active') bg-green-500 
                @elseif($status === 'upcoming') bg-blue-500 
                @elseif($status === 'completed') bg-gray-500 
                @else bg-primary 
                @endif text-white px-3 py-1.5 rounded-full text-sm font-bold shadow-lg">
                @if($status === 'active')
                    <span class="w-2 h-2 bg-white rounded-full animate-pulse"></span>
                    Active
                @elseif($status === 'upcoming')
                    <span class="material-symbols-outlined !text-sm">schedule</span>
                    Upcoming
                @elseif($status === 'completed')
                    <span class="material-symbols-outlined !text-sm">check_circle</span>
                    Completed
                @else
                    <span class="material-symbols-outlined !text-sm">preview</span>
                    Preview
                @endif
            </div>
        </div>
        
        <!-- Participants Badge -->
        @if($participants)
        <div class="absolute top-4 right-4">
            <div class="flex items-center gap-1 bg-white/90 dark:bg-gray-900/90 backdrop-blur-sm px-3 py-1.5 rounded-full text-sm font-semibold text-[#111816] dark:text-white shadow-lg">
                <span class="material-symbols-outlined !text-sm">group</span>
                {{ $participants }}
            </div>
        </div>
        @endif
        
        <!-- Hover Action -->
        <div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
            <div class="bg-primary/90 backdrop-blur-sm rounded-full p-3 transform scale-75 group-hover:scale-100 transition-transform duration-300 shadow-2xl">
                <span class="material-symbols-outlined text-white !text-xl">
                    @if($status === 'sample')
                        preview
                    @else
                        arrow_forward
                    @endif
                </span>
            </div>
        </div>
        
        <!-- Sample Watermark -->
        @if($status === 'sample')
        <div class="absolute bottom-4 right-4 opacity-20 group-hover:opacity-40 transition-opacity duration-300">
            <div class="bg-white/80 dark:bg-gray-900/80 backdrop-blur-sm px-2 py-1 rounded text-xs font-bold text-[#111816] dark:text-white transform rotate-12">
                PREVIEW
            </div>
        </div>
        @endif
    </div>
    
    <!-- Content -->
    <div class="p-6">
        <!-- Title -->
        <h3 class="text-xl font-bold text-[#111816] dark:text-white mb-3 group-hover:text-primary dark:group-hover:text-primary transition-colors duration-200 line-clamp-2">
            {{ $title }}
        </h3>
        
        <!-- Description -->
        <p class="text-[#61897c] dark:text-gray-400 text-sm leading-relaxed mb-6 line-clamp-3">
            {{ Str::limit($description, 120) }}
        </p>
        
        <!-- Action Button -->
        <a href="{{ $url }}" 
           class="w-full 
           @if($status === 'active') bg-gradient-to-r from-primary to-green-500 text-white hover:from-primary/90 hover:to-green-500/90
           @elseif($status === 'upcoming') bg-blue-100 dark:bg-blue-900/30 text-blue-700 dark:text-blue-300 hover:bg-blue-200 dark:hover:bg-blue-900/50
           @elseif($status === 'completed') bg-gray-200 dark:bg-gray-700 text-gray-600 dark:text-gray-300 cursor-not-allowed
           @else bg-primary text-white hover:bg-primary/90
           @endif text-center py-3 rounded-xl font-semibold transition-all duration-200 transform hover:scale-105 shadow-sm hover:shadow-lg block">
            @if($status === 'active')
                Join Campaign Now
            @elseif($status === 'upcoming')
                Learn More
            @elseif($status === 'completed')
                View Details
            @else
                Preview Campaign
            @endif
        </a>
    </div>
</article>

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
</style>