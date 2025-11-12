<header class="fixed top-0 left-0 right-0 z-50 w-full bg-background-light/95 dark:bg-background-dark/95 backdrop-blur-md border-b border-[#f0f4f3] dark:border-gray-800 shadow-sm">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between whitespace-nowrap py-3">
            <div class="flex items-center gap-4 text-[#111816] dark:text-white">
                <div class="size-6 text-primary">
                    <svg fill="none" viewBox="0 0 48 48" xmlns="http://www.w3.org/2000/svg">
                        <path d="M6 6H42L36 24L42 42H6L12 24L6 6Z" fill="currentColor"></path>
                    </svg>
                </div>
                <h2 class="text-[#111816] dark:text-white text-lg font-bold leading-tight tracking-[-0.015em]">MUBS Wellness Hub</h2>
            </div>
            
            <nav class="hidden md:flex items-center gap-9">
                <a class="text-[#111816] dark:text-gray-300 hover:text-primary dark:hover:text-primary text-sm font-medium leading-normal" href="{{ route('home') }}">Home</a>
                <a class="text-[#111816] dark:text-gray-300 hover:text-primary dark:hover:text-primary text-sm font-medium leading-normal {{ request()->routeIs('content.*') ? 'text-primary dark:text-primary font-bold' : '' }}" href="{{ route('content.index') }}">Educational Resources</a>
                @auth
                    @if(auth()->user()->role === 'student')
                        <a class="text-[#111816] dark:text-gray-300 hover:text-primary dark:hover:text-primary text-sm font-medium leading-normal" href="{{ route('student.counseling.index') }}">Counseling</a>
                    @else
                        <a class="text-[#111816] dark:text-gray-300 hover:text-primary dark:hover:text-primary text-sm font-medium leading-normal" href="{{ route('content.index') }}">Counseling</a>
                    @endif
                @else
                    <a class="text-[#111816] dark:text-gray-300 hover:text-primary dark:hover:text-primary text-sm font-medium leading-normal" href="{{ route('register') }}">Counseling</a>
                @endauth
                <a class="text-[#111816] dark:text-gray-300 hover:text-primary dark:hover:text-primary text-sm font-medium leading-normal" href="{{ route('campaigns.index') }}">Events</a>
                <a class="text-[#111816] dark:text-gray-300 hover:text-primary dark:hover:text-primary text-sm font-medium leading-normal" href="{{ route('public.about') }}">About Us</a>
            </nav>
            
            <div class="flex items-center gap-4">
                @guest
                    <button onclick="openSignupModal()" class="flex min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-lg h-10 px-4 bg-primary text-[#111816] text-sm font-bold leading-normal tracking-[0.015em] hover:opacity-90 transition-opacity">
                        <span class="truncate">Get Help</span>
                    </button>
                @else
                    <a href="{{ route('dashboard') }}" class="flex min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-lg h-10 px-4 bg-primary text-[#111816] text-sm font-bold leading-normal tracking-[0.015em] hover:opacity-90 transition-opacity">
                        <span class="truncate">Dashboard</span>
                    </a>
                @endguest
                
                @auth
                    <div class="bg-center bg-no-repeat aspect-square bg-cover rounded-full size-10" 
                         style="background-image: url('{{ auth()->user()->profile_photo_url }}')">
                    </div>
                @else
                    <button onclick="openLoginModal()" class="bg-center bg-no-repeat aspect-square bg-cover rounded-full size-10" 
                            style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuDUs_nyfdaTz1rJOsdjwzXUOMy7IAOmqw-i-GHI276f78l9Czx9WvEvtyrHOH1IF8HMo_5VacCxVMQPMI1mZL0f8-z__LnnTRscJxdFzy3GNmuUXntry7t0TmhRPD_oRmnB8YFshm69l7SF9MD4j_m7XwNlCkCCtOfEb5aptFg6uyf19_gXGjKCVo_z3eQ_rrT9tBZFEKA-ub3YOcJSOWbSguqrwNi2GJipxaCn3bKOvCGgB1E0ypjWf0U2-u7B7NS7MN0viV5JrA')">
                    </button>
                @endauth
            </div>
        </div>
    </div>
</header>

<!-- Mobile Menu -->
<div id="mobile-menu" class="hidden lg:hidden bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700">
    <div class="px-4 py-2 space-y-2">
        <a class="block text-[#111816] dark:text-gray-300 hover:text-primary dark:hover:text-primary text-sm font-medium py-2" href="{{ route('home') }}">Home</a>
        <a class="block text-[#111816] dark:text-gray-300 hover:text-primary dark:hover:text-primary text-sm font-medium py-2" href="{{ route('content.index') }}">Learn</a>
        @auth
            @if(auth()->user()->role === 'student')
                <a class="block text-[#111816] dark:text-gray-300 hover:text-primary dark:hover:text-primary text-sm font-medium py-2" href="{{ route('student.assessments.index') }}">Self-Assessment</a>
                <a class="block text-[#111816] dark:text-gray-300 hover:text-primary dark:hover:text-primary text-sm font-medium py-2" href="{{ route('student.counseling.index') }}">Get Help</a>
            @else
                <a class="block text-[#111816] dark:text-gray-300 hover:text-primary dark:hover:text-primary text-sm font-medium py-2" href="{{ route('content.index') }}">Self-Assessment</a>
                <a class="block text-[#111816] dark:text-gray-300 hover:text-primary dark:hover:text-primary text-sm font-medium py-2" href="{{ route('content.index') }}">Get Help</a>
            @endif
        @else
            <a class="block text-[#111816] dark:text-gray-300 hover:text-primary dark:hover:text-primary text-sm font-medium py-2" href="{{ route('register') }}">Self-Assessment</a>
            <a class="block text-[#111816] dark:text-gray-300 hover:text-primary dark:hover:text-primary text-sm font-medium py-2" href="{{ route('register') }}">Get Help</a>
        @endauth
        <a class="block text-[#111816] dark:text-gray-300 hover:text-primary dark:hover:text-primary text-sm font-medium py-2" href="#about">About Us</a>
        
        <div class="pt-4 border-t border-gray-200 dark:border-gray-700">
            @guest
                <button onclick="openSignupModal()" class="block w-full text-center bg-primary text-[#111816] text-sm font-bold py-2 px-4 rounded-lg mb-2 hover:bg-primary/90 transition-colors">Get Started</button>
                <button onclick="openLoginModal()" class="block w-full text-center bg-gray-200 dark:bg-gray-800 text-[#111816] dark:text-white text-sm font-bold py-2 px-4 rounded-lg hover:bg-gray-300 dark:hover:bg-gray-700 transition-colors">Sign In</button>
            @else
                <a href="{{ route('dashboard') }}" class="block w-full text-center bg-primary text-[#111816] text-sm font-bold py-2 px-4 rounded-lg mb-2">Dashboard</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="block w-full text-center bg-gray-200 dark:bg-gray-800 text-[#111816] dark:text-white text-sm font-bold py-2 px-4 rounded-lg">Logout</button>
                </form>
            @endguest
        </div>
    </div>
</div>

<script>
function toggleMobileMenu() {
    const menu = document.getElementById('mobile-menu');
    menu.classList.toggle('hidden');
}
</script>