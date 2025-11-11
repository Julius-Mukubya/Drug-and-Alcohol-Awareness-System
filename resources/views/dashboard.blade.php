@extends('layouts.app')

@section('title', 'Dashboard - MUBS Awareness')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <!-- Welcome Section -->
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-900 dark:text-white mb-2">
            Welcome, {{ auth()->user()->name }}!
        </h1>
        <p class="text-lg text-gray-600 dark:text-gray-400">
            Your account is set up. Please contact an administrator to assign your role.
        </p>
    </div>

    <!-- Role Assignment Notice -->
    <div class="bg-yellow-50 dark:bg-yellow-900/20 border border-yellow-200 dark:border-yellow-800 rounded-lg p-6 mb-8">
        <div class="flex items-center">
            <span class="material-symbols-outlined text-yellow-600 dark:text-yellow-400 mr-3">info</span>
            <div>
                <h3 class="text-lg font-medium text-yellow-800 dark:text-yellow-200">Role Assignment Pending</h3>
                <p class="text-yellow-700 dark:text-yellow-300 mt-1">
                    Your account needs to be assigned a role (Student, Counselor, or Admin) to access the full platform features.
                    Please contact the system administrator.
                </p>
            </div>
        </div>
    </div>

    <!-- Available Actions -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <div class="bg-white dark:bg-gray-800 rounded-xl border border-gray-200 dark:border-gray-700 p-6">
            <div class="w-12 h-12 bg-primary/10 rounded-lg flex items-center justify-center mb-4">
                <span class="material-symbols-outlined text-primary text-2xl">library_books</span>
            </div>
            <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">Browse Resources</h3>
            <p class="text-gray-600 dark:text-gray-400 mb-4">
                Explore educational content and resources available to all users.
            </p>
            <a href="{{ route('content.index') }}" class="text-primary hover:underline font-medium">
                View Resources →
            </a>
        </div>

        <div class="bg-white dark:bg-gray-800 rounded-xl border border-gray-200 dark:border-gray-700 p-6">
            <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center mb-4">
                <span class="material-symbols-outlined text-green-600 text-2xl">person</span>
            </div>
            <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">Update Profile</h3>
            <p class="text-gray-600 dark:text-gray-400 mb-4">
                Complete your profile information and preferences.
            </p>
            <a href="{{ route('profile.show') }}" class="text-primary hover:underline font-medium">
                Edit Profile →
            </a>
        </div>

        <div class="bg-white dark:bg-gray-800 rounded-xl border border-gray-200 dark:border-gray-700 p-6">
            <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mb-4">
                <span class="material-symbols-outlined text-blue-600 text-2xl">campaign</span>
            </div>
            <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">View Campaigns</h3>
            <p class="text-gray-600 dark:text-gray-400 mb-4">
                Check out active awareness campaigns and events.
            </p>
            <a href="{{ route('campaigns.index') }}" class="text-primary hover:underline font-medium">
                View Campaigns →
            </a>
        </div>
    </div>

    <!-- Contact Information -->
    <div class="mt-12 bg-gray-50 dark:bg-gray-800 rounded-xl p-6">
        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Need Help?</h3>
        <p class="text-gray-600 dark:text-gray-400 mb-4">
            If you need assistance with your account or role assignment, please contact:
        </p>
        <div class="space-y-2">
            <div class="flex items-center text-gray-700 dark:text-gray-300">
                <span class="material-symbols-outlined mr-2">email</span>
                admin@mubs.ac.ug
            </div>
            <div class="flex items-center text-gray-700 dark:text-gray-300">
                <span class="material-symbols-outlined mr-2">phone</span>
                +256 XXX XXX XXX
            </div>
        </div>
    </div>
</div>
@endsection
