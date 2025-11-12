<header class="flex items-center justify-between whitespace-nowrap border-b border-solid border-gray-200 dark:border-gray-800 px-4 sm:px-10 py-3 sticky top-0 bg-background-light/80 dark:bg-background-dark/80 backdrop-blur-sm z-50">
    <div class="flex items-center gap-4 text-[#111816] dark:text-white">
        <div class="size-6 text-primary">
            <svg fill="none" viewBox="0 0 48 48" xmlns="http://www.w3.org/2000/svg">
                <path d="M44 11.2727C44 14.0109 39.8386 16.3957 33.69 17.6364C39.8386 18.877 44 21.2618 44 24C44 26.7382 39.8386 29.123 33.69 30.3636C39.8386 31.6043 44 33.9891 44 36.7273C44 40.7439 35.0457 44 24 44C12.9543 44 4 40.7439 4 36.7273C4 33.9891 8.16144 31.6043 14.31 30.3636C8.16144 29.123 4 26.7382 4 24C4 21.2618 8.16144 18.877 14.31 17.6364C8.16144 16.3957 4 14.0109 4 11.2727C4 7.25611 12.9543 4 24 4C35.0457 4 44 7.25611 44 11.2727Z" fill="currentColor"></path>
            </svg>
        </div>
        <h2 class="text-[#111816] dark:text-white text-lg font-bold leading-tight tracking-[-0.015em]">MUBS D&A Awareness</h2>
    </div>
    
    <div class="hidden lg:flex flex-1 justify-end gap-8">
        <div class="flex items-center gap-9">
            <a class="text-[#111816] dark:text-gray-300 hover:text-primary dark:hover:text-primary text-sm font-medium leading-normal" href="{{ route('home') }}">Home</a>
            <a class="text-[#111816] dark:text-gray-300 hover:text-primary dark:hover:text-primary text-sm font-medium leading-normal" href="{{ route('content.index') }}">Learn</a>
            @auth
                @if(auth()->user()->role === 'student')
                    <a class="text-[#111816] dark:text-gray-300 hover:text-primary dark:hover:text-primary text-sm font-medium leading-normal" href="{{ route('student.assessments.index') }}">Self-Assessment</a>
                    <a class="text-[#111816] dark:text-gray-300 hover:text-primary dark:hover:text-primary text-sm font-medium leading-normal" href="{{ route('student.counseling.index') }}">Get Help</a>
                @else
                    <a class="text-[#111816] dark:text-gray-300 hover:text-primary dark:hover:text-primary text-sm font-medium leading-normal" href="{{ route('content.index') }}">Self-Assessment</a>
                    <a class="text-[#111816] dark:text-gray-300 hover:text-primary dark:hover:text-primary text-sm font-medium leading-normal" href="{{ route('content.index') }}">Get Help</a>
                @endif
            @else
                <a class="text-[#111816] dark:text-gray-300 hover:text-primary dark:hover:text-primary text-sm font-medium leading-normal" href="{{ route('register') }}">Self-Assessment</a>
                <a class="text-[#111816] dark:text-gray-300 hover:text-primary dark:hover:text-primary text-sm font-medium leading-normal" href="{{ route('register') }}">Get Help</a>
            @endauth
            <a class="text-[#111816] dark:text-gray-300 hover:text-primary dark:hover:text-primary text-sm font-medium leading-normal" href="#about">About Us</a>
        </div>
        
        <div class="flex gap-2">
            @guest
                <button onclick="openSignupModal()" class="flex min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-lg h-10 px-4 bg-primary text-[#111816] text-sm font-bold leading-normal tracking-[0.015em] hover:bg-primary/90 transition-colors">
                    <span class="truncate">Get Started</span>
                </button>
                <button onclick="openLoginModal()" class="flex min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-lg h-10 px-4 bg-gray-200 dark:bg-gray-800 text-[#111816] dark:text-white text-sm font-bold leading-normal tracking-[0.015em] hover:bg-gray-300 dark:hover:bg-gray-700 transition-colors">
                    <span class="truncate">Sign In</span>
                </button>
            @else
                <a href="{{ route('dashboard') }}" class="flex min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-lg h-10 px-4 bg-primary text-[#111816] text-sm font-bold leading-normal tracking-[0.015em]">
                    <span class="truncate">Dashboard</span>
                </a>
                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf
                    <button type="submit" class="flex min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-lg h-10 px-4 bg-gray-200 dark:bg-gray-800 text-[#111816] dark:text-white text-sm font-bold leading-normal tracking-[0.015em]">
                        <span class="truncate">Logout</span>
                    </button>
                </form>
            @endguest
        </div>
    </div>
    
    <!-- Mobile menu button -->
    <div class="lg:hidden">
        <button type="button" class="text-[#111816] dark:text-white" onclick="toggleMobileMenu()">
            <span class="material-symbols-outlined">menu</span>
        </button>
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