@extends('layouts.public')

@section('title', 'Contact Us - MUBS D&A Awareness Platform')

@section('content')
<div class="w-full">
    <!-- Hero Banner -->
    <x-page-banner 
        title="Get in Touch" 
        subtitle="We're here to help. Reach out to us for support, questions, or feedback."
        badge="Contact Us"
        badgeIcon="mail"
    />

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