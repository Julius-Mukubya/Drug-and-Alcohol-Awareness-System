@extends('layouts.public')

@section('title', 'Contact Us - MUBS D&A Awareness Platform')

@section('content')
<div class="w-full">
    <!-- Hero Section -->
    <div class="relative w-full py-20 sm:py-32">
        <img alt="Contact background" class="absolute inset-0 h-full w-full object-cover" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBaei4zVm6LMjCzOVeGiCrhI7yoToYFSZ67NFRSOpSi2mS78a4OlW5SUWJ6pb6uehKbKJYkyLdYuWxLOLcYqgTxhJDdOV5-TGjhJGRIC6Mw6f0BpUtqOf2WUzvouDx1C-cX7IZq5sTR_0tZQY81G8hmA7w609vHtY53hIjl_Z7uKMuJtcfu9xj_w-h5h-tQzhnl1SKW4blx_rDkSirm7BB0IdRYU1p10v-DVIT3Qqi_xtXuBK_86-uuVTLeC4WFxj7_2DutIbO4XA"/>
        <div class="absolute inset-0 bg-gradient-to-br from-mubs-blue/80 to-primary/60 dark:from-mubs-blue/90 dark:to-background-dark/70"></div>
        <div class="relative max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center text-white">
                <h1 class="text-4xl font-black leading-tight tracking-tighter sm:text-5xl md:text-6xl">Get in Touch</h1>
                <p class="mt-6 text-xl text-gray-200 max-w-3xl mx-auto">We're here to help. Reach out to us for support, questions, or feedback.</p>
            </div>
        </div>
    </div>

    <!-- Contact Information -->
    <div class="w-full bg-background-light dark:bg-background-dark py-16 sm:py-24">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="text-center">
                    <div class="bg-primary/10 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                        <span class="material-symbols-outlined text-primary text-2xl">phone</span>
                    </div>
                    <h3 class="text-lg font-bold text-[#111816] dark:text-white mb-2">Crisis Hotline</h3>
                    <p class="text-gray-600 dark:text-gray-400">24/7 Emergency Support</p>
                    <a href="tel:999" class="text-red-600 dark:text-red-400 font-bold text-lg">999</a>
                </div>
                <div class="text-center">
                    <div class="bg-primary/10 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                        <span class="material-symbols-outlined text-primary text-2xl">email</span>
                    </div>
                    <h3 class="text-lg font-bold text-[#111816] dark:text-white mb-2">Email Support</h3>
                    <p class="text-gray-600 dark:text-gray-400">General inquiries and support</p>
                    <a href="mailto:support@mubs-awareness.edu.ug" class="text-primary hover:text-primary/80">support@mubs-awareness.edu.ug</a>
                </div>
                <div class="text-center">
                    <div class="bg-primary/10 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                        <span class="material-symbols-outlined text-primary text-2xl">location_on</span>
                    </div>
                    <h3 class="text-lg font-bold text-[#111816] dark:text-white mb-2">Campus Location</h3>
                    <p class="text-gray-600 dark:text-gray-400">Student Wellness Center</p>
                    <p class="text-gray-600 dark:text-gray-400">MUBS Main Campus, Nakawa</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection