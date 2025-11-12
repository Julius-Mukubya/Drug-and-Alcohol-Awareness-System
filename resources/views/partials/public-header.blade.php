<header class="fixed top-0 left-0 right-0 z-50 w-full bg-background-light/95 dark:bg-background-dark/95 backdrop-blur-md border-b border-[#f0f4f3] dark:border-gray-800 shadow-sm">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between py-3">
            <div class="flex items-center gap-3 text-[#111816] dark:text-white">
                <div class="size-6 text-primary flex-shrink-0">
                    <svg fill="none" viewBox="0 0 48 48" xmlns="http://www.w3.org/2000/svg">
                        <path d="M6 6H42L36 24L42 42H6L12 24L6 6Z" fill="currentColor"></path>
                    </svg>
                </div>
                <h2 class="text-[#111816] dark:text-white text-base sm:text-lg font-bold leading-tight tracking-[-0.015em] hidden xs:block">MUBS Wellness Hub</h2>
                <h2 class="text-[#111816] dark:text-white text-base font-bold leading-tight tracking-[-0.015em] xs:hidden">MUBS</h2>
            </div>
            
            <nav class="hidden lg:flex items-center gap-6 xl:gap-9">
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
                            @endauth
                        </div>
                    </div>
                </div>
                
                <a class="text-[#111816] dark:text-gray-300 hover:text-primary dark:hover:text-primary text-sm font-medium leading-normal" href="{{ route('campaigns.index') }}">Events</a>
                <a class="text-[#111816] dark:text-gray-300 hover:text-primary dark:hover:text-primary text-sm font-medium leading-normal" href="{{ route('public.about') }}">About Us</a>
                <a class="text-[#111816] dark:text-gray-300 hover:text-primary dark:hover:text-primary text-sm font-medium leading-normal" href="{{ route('public.contact') }}">Contact</a>
            </nav>
            
            <div class="flex items-center gap-2 sm:gap-3">
                @guest
                    <button onclick="openLoginModal()" class="hidden sm:flex items-center justify-center rounded-lg h-9 sm:h-10 px-3 sm:px-5 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-600 text-[#111816] dark:text-white text-sm font-medium hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors">
                        Sign In
                    </button>
                    <button onclick="openSignupModal()" class="hidden sm:flex items-center justify-center rounded-lg h-9 sm:h-10 px-3 sm:px-5 bg-primary text-white text-sm font-bold hover:bg-primary/90 transition-colors">
                        Sign Up
                    </button>
                @else
                    <!-- Profile Dropdown -->
                    <div class="hidden sm:block relative group">
                        <button class="flex items-center gap-2 hover:opacity-80 transition-opacity">
                            <div class="bg-center bg-no-repeat aspect-square bg-cover rounded-full size-9 sm:size-10 border-2 border-primary" 
                                 style="background-image: url('{{ auth()->user()->profile_photo_url }}')">
                            </div>
                            <span class="material-symbols-outlined text-sm text-[#111816] dark:text-white">expand_more</span>
                        </button>
                        
                        <!-- Dropdown Menu -->
                        <div class="absolute right-0 top-full mt-2 w-56 bg-white dark:bg-gray-800 rounded-xl shadow-lg border border-gray-200 dark:border-gray-700 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 z-50">
                            <div class="p-3 border-b border-gray-200 dark:border-gray-700">
                                <p class="text-sm font-semibold text-[#111816] dark:text-white truncate">{{ auth()->user()->name }}</p>
                                <p class="text-xs text-gray-500 dark:text-gray-400 truncate">{{ auth()->user()->email }}</p>
                            </div>
                            <div class="p-2">
                                <a href="{{ route('dashboard') }}" class="flex items-center gap-3 px-3 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg transition-colors">
                                    <span class="material-symbols-outlined text-primary">dashboard</span>
                                    <span>Dashboard</span>
                                </a>
                                <a href="{{ route('profile.edit') }}" class="flex items-center gap-3 px-3 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg transition-colors">
                                    <span class="material-symbols-outlined text-blue-600">person</span>
                                    <span>Profile</span>
                                </a>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="w-full flex items-center gap-3 px-3 py-2 text-sm text-red-600 dark:text-red-400 hover:bg-red-50 dark:hover:bg-red-900/20 rounded-lg transition-colors">
                                        <span class="material-symbols-outlined">logout</span>
                                        <span>Logout</span>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endauth
                
                <!-- Mobile Menu Toggle -->
                <button onclick="toggleMobileSidebar()" class="lg:hidden flex items-center justify-center w-10 h-10 text-[#111816] dark:text-white hover:bg-gray-100 dark:hover:bg-gray-800 rounded-lg transition-colors">
                    <span class="material-symbols-outlined">menu</span>
                </button>
            </div>
        </div>
    </div>
</header>

<!-- Mobile Sidebar Overlay -->
<div id="mobile-sidebar-overlay" class="fixed inset-0 bg-black/50 z-40 hidden lg:hidden transition-opacity" onclick="toggleMobileSidebar()"></div>

<!-- Mobile Sidebar -->
<div id="mobile-sidebar" class="fixed top-0 left-0 bottom-0 w-80 max-w-[85vw] bg-white dark:bg-gray-900 z-50 transform -translate-x-full transition-transform duration-300 ease-in-out lg:hidden shadow-2xl">
    <div class="flex flex-col h-full">
        <!-- Sidebar Header -->
        <div class="flex items-center justify-between p-4 border-b border-gray-200 dark:border-gray-800">
            <h3 class="text-lg font-bold text-[#111816] dark:text-white">Menu</h3>
            <button onclick="toggleMobileSidebar()" class="flex items-center justify-center w-10 h-10 text-[#111816] dark:text-white hover:bg-gray-100 dark:hover:bg-gray-800 rounded-lg transition-colors">
                <span class="material-symbols-outlined">close</span>
            </button>
        </div>
        
        <!-- Sidebar Content -->
        <div class="flex-1 overflow-y-auto p-4">
            <nav class="space-y-1">
                <a class="flex items-center gap-3 text-[#111816] dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800 hover:text-primary px-4 py-3 rounded-lg transition-colors" href="{{ route('home') }}">
                    <span class="material-symbols-outlined">home</span>
                    <span class="font-medium">Home</span>
                </a>
                
                <a class="flex items-center gap-3 text-[#111816] dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800 hover:text-primary px-4 py-3 rounded-lg transition-colors" href="{{ route('content.index') }}">
                    <span class="material-symbols-outlined">library_books</span>
                    <span class="font-medium">Educational Resources</span>
                </a>
                
                <!-- Counseling Section -->
                <div class="py-2">
                    <div class="flex items-center gap-3 text-[#111816] dark:text-white px-4 py-2 font-semibold">
                        <span class="material-symbols-outlined">psychology</span>
                        <span>Counseling</span>
                    </div>
                    <div class="ml-8 space-y-1 mt-1">
                        <a class="block text-[#111816] dark:text-gray-300 hover:text-primary px-4 py-2 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-800 transition-colors" href="{{ route('public.counseling.index') }}">Our Services</a>
                        <a class="block text-[#111816] dark:text-gray-300 hover:text-primary px-4 py-2 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-800 transition-colors" href="{{ route('public.counseling.counselors') }}">Our Counselors</a>
                        @auth
                            @if(auth()->user()->role === 'student')
                                <a class="block text-[#111816] dark:text-gray-300 hover:text-primary px-4 py-2 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-800 transition-colors" href="{{ route('student.counseling.index') }}">My Sessions</a>
                                <a class="block text-primary font-medium px-4 py-2 rounded-lg hover:bg-primary/10 transition-colors" href="{{ route('student.counseling.create') }}">Request Session</a>
                            @endif
                        @endauth
                    </div>
                </div>
                
                <a class="flex items-center gap-3 text-[#111816] dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800 hover:text-primary px-4 py-3 rounded-lg transition-colors" href="{{ route('campaigns.index') }}">
                    <span class="material-symbols-outlined">campaign</span>
                    <span class="font-medium">Events</span>
                </a>
                
                <a class="flex items-center gap-3 text-[#111816] dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800 hover:text-primary px-4 py-3 rounded-lg transition-colors" href="{{ route('public.about') }}">
                    <span class="material-symbols-outlined">info</span>
                    <span class="font-medium">About Us</span>
                </a>
                
                <a class="flex items-center gap-3 text-[#111816] dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800 hover:text-primary px-4 py-3 rounded-lg transition-colors" href="{{ route('public.contact') }}">
                    <span class="material-symbols-outlined">mail</span>
                    <span class="font-medium">Contact</span>
                </a>
            </nav>
        </div>
        
        <!-- Sidebar Footer -->
        <div class="p-4 border-t border-gray-200 dark:border-gray-800 space-y-2">
            @guest
                <button onclick="openSignupModal(); toggleMobileSidebar();" class="flex items-center justify-center gap-2 w-full bg-primary text-white py-3 px-4 rounded-lg font-bold hover:bg-primary/90 transition-colors">
                    <span class="material-symbols-outlined">person_add</span>
                    Sign Up
                </button>
                <button onclick="openLoginModal(); toggleMobileSidebar();" class="flex items-center justify-center gap-2 w-full bg-gray-200 dark:bg-gray-800 text-[#111816] dark:text-white py-3 px-4 rounded-lg font-bold hover:bg-gray-300 dark:hover:bg-gray-700 transition-colors">
                    <span class="material-symbols-outlined">login</span>
                    Sign In
                </button>
            @else
                <a href="{{ route('dashboard') }}" class="flex items-center justify-center gap-2 w-full bg-primary text-white py-3 px-4 rounded-lg font-bold hover:bg-primary/90 transition-colors">
                    <span class="material-symbols-outlined">dashboard</span>
                    Dashboard
                </a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="flex items-center justify-center gap-2 w-full bg-gray-200 dark:bg-gray-800 text-[#111816] dark:text-white py-3 px-4 rounded-lg font-bold hover:bg-gray-300 dark:hover:bg-gray-700 transition-colors">
                        <span class="material-symbols-outlined">logout</span>
                        Logout
                    </button>
                </form>
            @endguest
        </div>
    </div>
</div>

<script>
function toggleMobileSidebar() {
    const sidebar = document.getElementById('mobile-sidebar');
    const overlay = document.getElementById('mobile-sidebar-overlay');
    
    sidebar.classList.toggle('-translate-x-full');
    overlay.classList.toggle('hidden');
    
    // Prevent body scroll when sidebar is open
    document.body.classList.toggle('overflow-hidden');
}
</script>