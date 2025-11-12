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
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-16">
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

            <!-- Feedback Form -->
            <div class="max-w-3xl mx-auto">
                <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg border border-gray-200 dark:border-gray-700 p-8">
                    <div class="text-center mb-8">
                        <h2 class="text-3xl font-bold text-[#111816] dark:text-white mb-2">Send Us a Message</h2>
                        <p class="text-gray-600 dark:text-gray-400">We'd love to hear from you. Fill out the form below and we'll get back to you as soon as possible.</p>
                    </div>

                    <form id="contactForm" class="space-y-6">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="name" class="block text-sm font-medium text-[#111816] dark:text-white mb-2">
                                    Full Name <span class="text-red-500">*</span>
                                </label>
                                <input type="text" id="name" name="name" required
                                    class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-900 text-[#111816] dark:text-white focus:ring-2 focus:ring-primary focus:border-transparent transition-all"
                                    placeholder="John Doe">
                            </div>

                            <div>
                                <label for="email" class="block text-sm font-medium text-[#111816] dark:text-white mb-2">
                                    Email Address <span class="text-red-500">*</span>
                                </label>
                                <input type="email" id="email" name="email" required
                                    class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-900 text-[#111816] dark:text-white focus:ring-2 focus:ring-primary focus:border-transparent transition-all"
                                    placeholder="john@example.com">
                            </div>
                        </div>

                        <div>
                            <label for="subject" class="block text-sm font-medium text-[#111816] dark:text-white mb-2">
                                Subject <span class="text-red-500">*</span>
                            </label>
                            <select id="subject" name="subject" required
                                class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-900 text-[#111816] dark:text-white focus:ring-2 focus:ring-primary focus:border-transparent transition-all">
                                <option value="">Select a subject</option>
                                <option value="general">General Inquiry</option>
                                <option value="counseling">Counseling Services</option>
                                <option value="technical">Technical Support</option>
                                <option value="feedback">Feedback</option>
                                <option value="other">Other</option>
                            </select>
                        </div>

                        <div>
                            <label for="message" class="block text-sm font-medium text-[#111816] dark:text-white mb-2">
                                Message <span class="text-red-500">*</span>
                            </label>
                            <textarea id="message" name="message" rows="6" required
                                class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-900 text-[#111816] dark:text-white focus:ring-2 focus:ring-primary focus:border-transparent transition-all resize-none"
                                placeholder="Tell us how we can help you..."></textarea>
                        </div>

                        <div class="flex items-start">
                            <input type="checkbox" id="privacy" name="privacy" required
                                class="mt-1 w-4 h-4 text-primary border-gray-300 rounded focus:ring-primary">
                            <label for="privacy" class="ml-2 text-sm text-gray-600 dark:text-gray-400">
                                I agree to the privacy policy and understand that my information will be handled confidentially. <span class="text-red-500">*</span>
                            </label>
                        </div>

                        <div>
                            <button type="submit"
                                class="w-full bg-primary text-white py-4 px-6 rounded-lg font-bold text-lg hover:bg-primary/90 transition-all duration-200 transform hover:scale-[1.02] shadow-lg flex items-center justify-center gap-2">
                                <span class="material-symbols-outlined">send</span>
                                Send Message
                            </button>
                        </div>

                        <div id="formMessage" class="hidden p-4 rounded-lg"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
document.getElementById('contactForm').addEventListener('submit', function(e) {
    e.preventDefault();
    
    const formMessage = document.getElementById('formMessage');
    const submitButton = this.querySelector('button[type="submit"]');
    
    // Disable submit button
    submitButton.disabled = true;
    submitButton.innerHTML = '<span class="material-symbols-outlined animate-spin">refresh</span> Sending...';
    
    // Simulate form submission (replace with actual AJAX call)
    setTimeout(() => {
        formMessage.classList.remove('hidden', 'bg-red-100', 'text-red-700');
        formMessage.classList.add('bg-green-100', 'dark:bg-green-900/30', 'text-green-700', 'dark:text-green-400');
        formMessage.innerHTML = '<strong>Success!</strong> Your message has been sent. We\'ll get back to you soon.';
        
        // Reset form
        this.reset();
        
        // Re-enable submit button
        submitButton.disabled = false;
        submitButton.innerHTML = '<span class="material-symbols-outlined">send</span> Send Message';
        
        // Hide message after 5 seconds
        setTimeout(() => {
            formMessage.classList.add('hidden');
        }, 5000);
    }, 1500);
});
</script>
@endpush
@endsection