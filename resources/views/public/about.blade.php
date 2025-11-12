@extends('layouts.public')

@section('title', 'About Us - MUBS D&A Awareness Platform')

@section('content')
<div class="w-full">
    <!-- Hero Section -->
    <div class="relative w-full py-20 sm:py-32">
        <img alt="MUBS campus background" class="absolute inset-0 h-full w-full object-cover" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBaei4zVm6LMjCzOVeGiCrhI7yoToYFSZ67NFRSOpSi2mS78a4OlW5SUWJ6pb6uehKbKJYkyLdYuWxLOLcYqgTxhJDdOV5-TGjhJGRIC6Mw6f0BpUtqOf2WUzvouDx1C-cX7IZq5sTR_0tZQY81G8hmA7w609vHtY53hIjl_Z7uKMuJtcfu9xj_w-h5h-tQzhnl1SKW4blx_rDkSirm7BB0IdRYU1p10v-DVIT3Qqi_xtXuBK_86-uuVTLeC4WFxj7_2DutIbO4XA"/>
        <div class="absolute inset-0 bg-gradient-to-br from-mubs-blue/80 to-primary/60 dark:from-mubs-blue/90 dark:to-background-dark/70"></div>
        <div class="relative max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center text-white">
                <h1 class="text-4xl font-black leading-tight tracking-tighter sm:text-5xl md:text-6xl">About Our Platform</h1>
                <p class="mt-6 text-xl text-gray-200 max-w-3xl mx-auto">Supporting MUBS students with comprehensive drug and alcohol awareness resources, counseling services, and peer support.</p>
            </div>
        </div>
    </div>

    <!-- Mission Section -->
    <div class="w-full bg-background-light dark:bg-background-dark py-16 sm:py-24">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h2 class="text-3xl font-bold text-[#111816] dark:text-white mb-8">Our Mission</h2>
                <p class="text-lg text-gray-600 dark:text-gray-400 leading-relaxed">
                    To provide a safe, confidential, and supportive environment where MUBS students can access evidence-based information, professional counseling, and peer support for drug and alcohol awareness and mental health wellbeing.
                </p>
            </div>
        </div>
    </div>
</div>
@endsection