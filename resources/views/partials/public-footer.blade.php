<footer class="bg-gray-100 dark:bg-gray-900/50 border-t border-gray-200 dark:border-gray-800">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            <div class="col-span-1 md:col-span-2">
                <div class="flex items-center gap-3">
                    <div class="size-6 text-primary">
                        <svg fill="none" viewBox="0 0 48 48" xmlns="http://www.w3.org/2000/svg">
                            <path d="M44 11.2727C44 14.0109 39.8386 16.3957 33.69 17.6364C39.8386 18.877 44 21.2618 44 24C44 26.7382 39.8386 29.123 33.69 30.3636C39.8386 31.6043 44 33.9891 44 36.7273C44 40.7439 35.0457 44 24 44C12.9543 44 4 40.7439 4 36.7273C4 33.9891 8.16144 31.6043 14.31 30.3636C8.16144 29.123 4 26.7382 4 24C4 21.2618 8.16144 18.877 14.31 17.6364C8.16144 16.3957 4 14.0109 4 11.2727C4 7.25611 12.9543 4 24 4C35.0457 4 44 7.25611 44 11.2727Z" fill="currentColor"></path>
                        </svg>
                    </div>
                    <h2 class="text-[#111816] dark:text-white text-lg font-bold">MUBS D&A Awareness</h2>
                </div>
                <p class="mt-4 text-sm text-gray-600 dark:text-gray-400">Your confidential resource for support and information at Makerere University Business School.</p>
            </div>
            
            <div>
                <h3 class="text-sm font-bold uppercase tracking-wider dark:text-white">Quick Links</h3>
                <ul class="mt-4 space-y-2">
                    <li><a class="text-sm text-gray-600 dark:text-gray-400 hover:text-primary dark:hover:text-primary" href="#about">About Us</a></li>
                    <li><a class="text-sm text-gray-600 dark:text-gray-400 hover:text-primary dark:hover:text-primary" href="{{ route('content.index') }}">Resources</a></li>
                    @auth
                        @if(auth()->user()->role === 'student')
                            <li><a class="text-sm text-gray-600 dark:text-gray-400 hover:text-primary dark:hover:text-primary" href="{{ route('student.counseling.index') }}">Get Help</a></li>
                        @endif
                    @endauth
                    <li><a class="text-sm text-gray-600 dark:text-gray-400 hover:text-primary dark:hover:text-primary" href="#contact">Contact</a></li>
                    <li><a class="text-sm text-gray-600 dark:text-gray-400 hover:text-primary dark:hover:text-primary" href="#privacy">Privacy Policy</a></li>
                    <li><a class="text-sm text-gray-600 dark:text-gray-400 hover:text-primary dark:hover:text-primary" href="#terms">Terms of Service</a></li>
                </ul>
            </div>
            
            <div>
                <h3 class="text-sm font-bold uppercase tracking-wider dark:text-white">Follow Us</h3>
                <div class="flex mt-4 space-x-4">
                    <a class="text-gray-500 dark:text-gray-400 hover:text-primary dark:hover:text-primary" href="#" aria-label="Facebook">
                        <svg aria-hidden="true" class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                            <path clip-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" fill-rule="evenodd"></path>
                        </svg>
                    </a>
                    <a class="text-gray-500 dark:text-gray-400 hover:text-primary dark:hover:text-primary" href="#" aria-label="Twitter">
                        <svg aria-hidden="true" class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.71v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84"></path>
                        </svg>
                    </a>
                    <a class="text-gray-500 dark:text-gray-400 hover:text-primary dark:hover:text-primary" href="#" aria-label="Instagram">
                        <svg aria-hidden="true" class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12.017 0C5.396 0 .029 5.367.029 11.987c0 6.62 5.367 11.987 11.988 11.987s11.987-5.367 11.987-11.987C24.004 5.367 18.637.001 12.017.001zM8.449 16.988c-1.297 0-2.448-.49-3.323-1.297C4.198 14.895 3.708 13.744 3.708 12.447s.49-2.448 1.418-3.323c.875-.807 2.026-1.297 3.323-1.297s2.448.49 3.323 1.297c.928.875 1.418 2.026 1.418 3.323s-.49 2.448-1.418 3.244c-.875.807-2.026 1.297-3.323 1.297zm7.83-9.781c-.315 0-.595-.122-.807-.315-.21-.21-.315-.49-.315-.807 0-.315.105-.595.315-.807.21-.21.49-.315.807-.315.315 0 .595.105.807.315.21.21.315.49.315.807 0 .315-.105.595-.315.807-.21.193-.49.315-.807.315z"/>
                        </svg>
                    </a>
                </div>
                
                <div class="mt-6">
                    <h4 class="text-sm font-bold uppercase tracking-wider dark:text-white mb-2">Emergency</h4>
                    <p class="text-sm text-gray-600 dark:text-gray-400">Crisis Hotline:</p>
                    <a href="tel:+256-XXX-XXX-XXX" class="text-sm font-bold text-primary hover:underline">+256 XXX XXX XXX</a>
                </div>
            </div>
        </div>
        
        <div class="mt-8 border-t border-gray-200 dark:border-gray-800 pt-8 text-center text-sm text-gray-500 dark:text-gray-400">
            <p>© {{ date('Y') }} Makerere University Business School. All rights reserved.</p>
            <p class="mt-2">Confidential support for MUBS students • Available 24/7</p>
        </div>
    </div>
</footer>