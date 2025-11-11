<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>@yield('title', 'MUBS Awareness - Student Portal')</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com" rel="preconnect"/>
    <link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect"/>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet"/>
    <script>
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "primary": "#10b77f",
                        "background-light": "#f6f8f7",
                        "background-dark": "#10221c",
                    },
                    fontFamily: {
                        "display": ["Inter", "sans-serif"]
                    },
                    borderRadius: {"DEFAULT": "0.25rem", "lg": "0.5rem", "xl": "0.75rem", "full": "9999px"},
                },
            },
        }
    </script>
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
            font-size: 24px;
        }
    </style>
    @stack('styles')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body class="bg-background-light dark:bg-background-dark font-display">
    <div class="relative flex min-h-screen w-full">
        <!-- Student Navigation -->
        <aside class="sticky top-0 h-screen flex-col bg-white dark:bg-background-dark dark:border-r dark:border-gray-700 w-64 hidden lg:flex">
            <div class="flex h-full flex-col justify-between p-4">
                <div class="flex flex-col gap-4">
                    <div class="flex items-center gap-3 px-3">
                        <div class="bg-center bg-no-repeat aspect-square bg-cover rounded-full size-10" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuDOlqqrnn7gUspf7G--ZfEAHfhFEmJb11poCmQ-Z4Zft45BLCVKpHj8Z31-CHMgkQcNe9ElWNbPm3X-593kkxtwcTHNIgMBzkAF6g-sEoJSy8Nv-8hIrnQthnN73ECoGjM7NBMhiQsRAHWYZzbtxEHIGfyIxZQHtYhjUOR4H8CASI3M-pOsBMKeP72jZ7Ude7mhcX7OfYRh8kMKavkZjjkB_vWiM2JmewfBrRt3-AZ-JKAlmx8crQT3_lUiarlATmnRdGR-OXMGXA");'></div>
                        <div class="flex flex-col">
                            <h1 class="text-gray-900 dark:text-white text-base font-medium leading-normal">MUBS Awareness</h1>
                            <p class="text-gray-500 dark:text-gray-400 text-sm font-normal leading-normal">Student Portal</p>
                        </div>
                    </div>
                    <nav class="flex flex-col gap-2 mt-4">
                        <a class="flex items-center gap-3 px-3 py-2 rounded-lg {{ request()->routeIs('student.dashboard') ? 'bg-primary/20 dark:bg-primary/30' : 'hover:bg-gray-100 dark:hover:bg-white/10' }}" href="{{ route('student.dashboard') }}">
                            <span class="material-symbols-outlined {{ request()->routeIs('student.dashboard') ? 'text-primary' : 'text-gray-700 dark:text-gray-300' }}">dashboard</span>
                            <p class="{{ request()->routeIs('student.dashboard') ? 'text-gray-900 dark:text-white' : 'text-gray-700 dark:text-gray-300' }} text-sm font-medium leading-normal">Dashboard</p>
                        </a>
                        <a class="flex items-center gap-3 px-3 py-2 rounded-lg {{ request()->routeIs('content.*') ? 'bg-primary/20 dark:bg-primary/30' : 'hover:bg-gray-100 dark:hover:bg-white/10' }}" href="{{ route('content.index') }}">
                            <span class="material-symbols-outlined {{ request()->routeIs('content.*') ? 'text-primary' : 'text-gray-700 dark:text-gray-300' }}">article</span>
                            <p class="{{ request()->routeIs('content.*') ? 'text-gray-900 dark:text-white' : 'text-gray-700 dark:text-gray-300' }} text-sm font-medium leading-normal">Educational Content</p>
                        </a>
                        <a class="flex items-center gap-3 px-3 py-2 rounded-lg {{ request()->routeIs('student.quizzes.*') ? 'bg-primary/20 dark:bg-primary/30' : 'hover:bg-gray-100 dark:hover:bg-white/10' }}" href="{{ route('student.quizzes.index') }}">
                            <span class="material-symbols-outlined {{ request()->routeIs('student.quizzes.*') ? 'text-primary' : 'text-gray-700 dark:text-gray-300' }}">quiz</span>
                            <p class="{{ request()->routeIs('student.quizzes.*') ? 'text-gray-900 dark:text-white' : 'text-gray-700 dark:text-gray-300' }} text-sm font-medium leading-normal">Quizzes</p>
                        </a>
                        <a class="flex items-center gap-3 px-3 py-2 rounded-lg {{ request()->routeIs('student.assessments.*') ? 'bg-primary/20 dark:bg-primary/30' : 'hover:bg-gray-100 dark:hover:bg-white/10' }}" href="{{ route('student.assessments.index') }}">
                            <span class="material-symbols-outlined {{ request()->routeIs('student.assessments.*') ? 'text-primary' : 'text-gray-700 dark:text-gray-300' }}">psychology</span>
                            <p class="{{ request()->routeIs('student.assessments.*') ? 'text-gray-900 dark:text-white' : 'text-gray-700 dark:text-gray-300' }} text-sm font-medium leading-normal">Assessments</p>
                        </a>
                        <a class="flex items-center gap-3 px-3 py-2 rounded-lg {{ request()->routeIs('student.forum.*') ? 'bg-primary/20 dark:bg-primary/30' : 'hover:bg-gray-100 dark:hover:bg-white/10' }}" href="{{ route('student.forum.index') }}">
                            <span class="material-symbols-outlined {{ request()->routeIs('student.forum.*') ? 'text-primary' : 'text-gray-700 dark:text-gray-300' }}">forum</span>
                            <p class="{{ request()->routeIs('student.forum.*') ? 'text-gray-900 dark:text-white' : 'text-gray-700 dark:text-gray-300' }} text-sm font-medium leading-normal">Forum</p>
                        </a>
                        <a class="flex items-center gap-3 px-3 py-2 rounded-lg {{ request()->routeIs('student.counseling.*') ? 'bg-primary/20 dark:bg-primary/30' : 'hover:bg-gray-100 dark:hover:bg-white/10' }}" href="{{ route('student.counseling.index') }}">
                            <span class="material-symbols-outlined {{ request()->routeIs('student.counseling.*') ? 'text-primary' : 'text-gray-700 dark:text-gray-300' }}">support_agent</span>
                            <p class="{{ request()->routeIs('student.counseling.*') ? 'text-gray-900 dark:text-white' : 'text-gray-700 dark:text-gray-300' }} text-sm font-medium leading-normal">Counseling</p>
                        </a>
                        <a class="flex items-center gap-3 px-3 py-2 rounded-lg {{ request()->routeIs('campaigns.*') ? 'bg-primary/20 dark:bg-primary/30' : 'hover:bg-gray-100 dark:hover:bg-white/10' }}" href="{{ route('campaigns.index') }}">
                            <span class="material-symbols-outlined {{ request()->routeIs('campaigns.*') ? 'text-primary' : 'text-gray-700 dark:text-gray-300' }}">campaign</span>
                            <p class="{{ request()->routeIs('campaigns.*') ? 'text-gray-900 dark:text-white' : 'text-gray-700 dark:text-gray-300' }} text-sm font-medium leading-normal">Campaigns</p>
                        </a>
                    </nav>
                </div>
                <div class="flex flex-col gap-2">
                    <a class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-gray-100 dark:hover:bg-white/10" href="{{ route('profile.edit') }}">
                        <span class="material-symbols-outlined text-gray-700 dark:text-gray-300">settings</span>
                        <p class="text-gray-700 dark:text-gray-300 text-sm font-medium leading-normal">Profile</p>
                    </a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="w-full flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-gray-100 dark:hover:bg-white/10">
                            <span class="material-symbols-outlined text-gray-700 dark:text-gray-300">logout</span>
                            <p class="text-gray-700 dark:text-gray-300 text-sm font-medium leading-normal">Logout</p>
                        </button>
                    </form>
                </div>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 flex flex-col">
            <!-- Header -->
            <header class="sticky top-0 z-10 flex justify-between items-center gap-2 px-4 md:px-8 py-3 bg-background-light/80 dark:bg-background-dark/80 backdrop-blur-sm border-b border-gray-200 dark:border-gray-700">
                <div class="flex items-center gap-4">
                    <button class="p-2 text-gray-700 dark:text-gray-300 lg:hidden" onclick="toggleSidebar()">
                        <span class="material-symbols-outlined">menu</span>
                    </button>
                    <h1 class="text-xl font-semibold text-gray-900 dark:text-white">@yield('page-title', 'Student Portal')</h1>
                </div>
                <div class="flex items-center gap-2">
                    <a href="{{ route('notifications.index') }}" class="p-2 text-gray-700 dark:text-gray-300 rounded-full hover:bg-gray-200 dark:hover:bg-white/10 relative">
                        <span class="material-symbols-outlined">notifications</span>
                        @if(auth()->user()->unreadNotificationsCount() > 0)
                            <span class="absolute -top-1 -right-1 bg-red-500 text-white text-xs rounded-full h-5 w-5 flex items-center justify-center">
                                {{ auth()->user()->unreadNotificationsCount() }}
                            </span>
                        @endif
                    </a>
                    <div class="relative group">
                        <button class="p-2 text-gray-700 dark:text-gray-300 rounded-full hover:bg-gray-200 dark:hover:bg-white/10">
                            <span class="material-symbols-outlined">account_circle</span>
                        </button>
                        <div class="absolute right-0 mt-2 w-48 bg-white dark:bg-gray-800 rounded-lg shadow-lg border border-gray-200 dark:border-gray-700 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200">
                            <div class="p-3 border-b border-gray-200 dark:border-gray-700">
                                <p class="text-sm font-medium text-gray-900 dark:text-white">{{ auth()->user()->name }}</p>
                                <p class="text-xs text-gray-500 dark:text-gray-400">{{ auth()->user()->email }}</p>
                            </div>
                            <a href="{{ route('profile.edit') }}" class="block px-3 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700">Profile</a>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="w-full text-left px-3 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700">Logout</button>
                            </form>
                        </div>
                    </div>
                </div>
            </header>

            <div class="flex-1 p-4 md:p-8 space-y-8 overflow-y-auto">
                @if(session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                        <span class="block sm:inline">{{ session('success') }}</span>
                    </div>
                @endif

                @if(session('error'))
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                        <span class="block sm:inline">{{ session('error') }}</span>
                    </div>
                @endif

                @yield('content')
            </div>
        </main>
    </div>

    <script>
        function toggleSidebar() {
            const sidebar = document.querySelector('aside');
            sidebar.classList.toggle('hidden');
        }
    </script>
    @stack('scripts')
</body>
</html>