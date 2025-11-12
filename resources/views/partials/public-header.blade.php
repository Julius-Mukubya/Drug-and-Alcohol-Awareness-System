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
                
                <!-- Counseling Dropdown -->
                <div class="relative group">
                    <button class="text-[#111816] dark:text-gray-300 hover:text-primary dark:hover:text-primary text-sm font-medium leading-normal flex items-center gap-1 {{ request()->routeIs('public.counseling.*') || request()->routeIs('student.counseling.*') ? 'text-primary dark:text-primary font-bold' : '' }}">
                        Counseling
                        <span class="material-symbols-outlined text-sm">expand_more</span>
                    </button>
                    <div class="absolute top-full left-0 mt-2 w-64 bg-white dark:bg-gray-800 rounded-xl shadow-lg border border-gray-200 dark:border-gray-700 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 z-50">
                        <div class="p-2">
                            <a href="{{ route('public.counseling.index') }}" class="block px-4 py-3 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg transition-colors">
                                <div class="flex items-center gap-3">
                                    <span class="material-symbols-outlined text-emerald-600">support_agent</span>
                                    <div>
                                        <div class="font-medium">Our Services</div>
                                        <div class="text-xs text-gray-500 dark:text-gray-400">Professional counseling support</div>
                                    </div>
                                </div>
                            </a>
                            <a href="{{ route('public.counseling.counselors') }}" class="block px-4 py-3 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg transition-colors">
                                <div class="flex items-center gap-3">
                                    <span class="material-symbols-outlined text-blue-600">group</span>
                                    <div>
                                        <div class="font-medium">Our Counselors</div>
                                        <div class="text-xs text-gray-500 dark:text-gray-400">Meet our professional team</div>
                                    </div>
                                </div>
                            </a>
                            <a href="{{ route('content.index') }}" class="block px-4 py-3 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg transition-colors">
                                <div class="flex items-center gap-3">
                                    <span class="material-symbols-outlined text-purple-600">library_books</span>
                                    <div>
                                        <div class="font-medium">Educational Resources</div>
                                        <div class="text-xs text-gray-500 dark:text-gray-400">Mental health articles and guides</div>
                                    </div>
                                </div>
                            </a>
                            @auth
                                @if(auth()->user()->role === 'student')
                                    <div class="border-t border-gray-200 dark:border-gray-600 my-2"></div>
                                    <a href="{{ route('student.counseling.index') }}" class="block px-4 py-3 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg transition-colors">
                                        <div class="flex items-center gap-3">
                                            <span class="material-symbols-outlined text-blue-600">psychology</span>
                                            <div>
                                                <div class="font-medium">My Sessions</div>
                                                <div class="text-xs text-gray-500 dark:text-gray-400">View your counseling sessions</div>
                                            </div>
                                        </div>
                                    </a>
                                    <a href="{{ route('student.counseling.create') }}" class="block px-4 py-3 text-sm text-white bg-primary hover:bg-primary/90 rounded-lg transition-colors">
                                        <div class="flex items-center gap-3">
                                            <span class="material-symbols-outlined">add</span>
                                            <div class="font-medium">Request Session</div>
                                        </div>
                                    </a>
                                @endif
                            @else
                                <div class="border-t border-gray-200 dark:border-gray-600 my-2"></div>
                                <button onclick="document.getElementById('loginModal').classList.remove('hidden')" class="w-full text-left px-4 py-3 text-sm text-white bg-primary hover:bg-primary/90 rounded-lg transition-colors">
                                    <div class="flex items-center gap-3">
                                        <span class="material-symbols-outlined">login</span>
                                        <div class="font-medium">Login to Get Help</div>
                                    </div>
                                </button>
                            @endauth
                        </div>
                    </div>
                </div>
                
                <a class="text-[#111816] dark:text-gray-300 hover:text-primary dark:hover:text-primary text-sm font-medium leading-normal" href="{{ route('campaigns.index') }}">Events</a>
                <a class="text-[#111816] dark:text-gray-300 hover:text-primary dark:hover:text-primary text-sm font-medium leading-normal" href="{{ route('public.about') }}">About Us</a>
                <a class="text-[#111816] dark:text-gray-300 hover:text-primary dark:hover:text-primary text-sm font-medium leading-normal" href="{{ route('public.contact') }}">Contact</a>
            </nav>
            
            <div class="flex items-center gap-3">
                @guest
                    <button onclick="openLoginModal()" class="flex items-center justify-center rounded-lg h-10 px-5 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-600 text-[#111816] dark:text-white text-sm font-medium hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors">
                        Sign In
                    </button>
                    <button onclick="openSignupModal()" class="flex items-center justify-center rounded-lg h-10 px-5 bg-primary text-white text-sm font-bold hover:bg-primary/90 transition-colors">
                        Sign Up
                    </button>
                @else
                    <a href="{{ route('dashboard') }}" class="flex items-center justify-center rounded-lg h-10 px-5 bg-primary text-white text-sm font-bold hover:bg-primary/90 transition-colors">
                        Dashboard
                    </a>
                    <div class="bg-center bg-no-repeat aspect-square bg-cover rounded-full size-10 border-2 border-primary" 
                         style="background-image: url('{{ auth()->user()->profile_photo_url }}')">
                    </div>
                @endauth
            </div>
        </div>
    </div>
</header>

<!-- Mobile Menu -->
<div id="mobile-menu" class="hidden lg:hidden bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700">
    <div class="px-4 py-2 space-y-2">
        <a class="block text-[#111816] dark:text-gray-300 hover:text-primary dark:hover:text-primary text-sm font-medium py-2" href="{{ route('home') }}">Home</a>
        <a class="block text-[#111816] dark:text-gray-300 hover:text-primary dark:hover:text-primary text-sm font-medium py-2" href="{{ route('content.index') }}">Educational Resources</a>
        
        <!-- Counseling Section -->
        <div class="py-2">
            <div class="text-[#111816] dark:text-gray-300 text-sm font-semibold mb-2">Counseling</div>
            <div class="ml-4 space-y-1">
                <a class="block text-[#111816] dark:text-gray-300 hover:text-primary dark:hover:text-primary text-sm py-1" href="{{ route('public.counseling.index') }}">Our Services</a>
                <a class="block text-[#111816] dark:text-gray-300 hover:text-primary dark:hover:text-primary text-sm py-1" href="{{ route('public.counseling.counselors') }}">Our Counselors</a>
                <a class="block text-[#111816] dark:text-gray-300 hover:text-primary dark:hover:text-primary text-sm py-1" href="{{ route('content.index') }}">Educational Resources</a>
                @auth
                    @if(auth()->user()->role === 'student')
                        <a class="block text-[#111816] dark:text-gray-300 hover:text-primary dark:hover:text-primary text-sm py-1" href="{{ route('student.counseling.index') }}">My Sessions</a>
                        <a class="block text-primary dark:text-primary font-medium text-sm py-1" href="{{ route('student.counseling.create') }}">Request Session</a>
                    @endif
                @endauth
            </div>
        </div>
        
        <a class="block text-[#111816] dark:text-gray-300 hover:text-primary dark:hover:text-primary text-sm font-medium py-2" href="{{ route('campaigns.index') }}">Events</a>
        <a class="block text-[#111816] dark:text-gray-300 hover:text-primary dark:hover:text-primary text-sm font-medium py-2" href="{{ route('public.about') }}">About Us</a>
        <a class="block text-[#111816] dark:text-gray-300 hover:text-primary dark:hover:text-primary text-sm font-medium py-2" href="{{ route('public.contact') }}">Contact</a>
        
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