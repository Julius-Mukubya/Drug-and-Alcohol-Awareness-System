@extends('layouts.student')

@section('title', 'Forum - Student')

@section('content')
<div class="flex justify-between items-center mb-6">
    <div>
        <h2 class="text-2xl font-bold text-gray-900 dark:text-white">Community Forum</h2>
        <p class="text-gray-500 dark:text-gray-400">Connect with peers and share experiences</p>
    </div>
    <a href="{{ route('student.forum.create') }}" class="bg-primary text-white px-4 py-2 rounded-lg flex items-center gap-2 hover:opacity-90">
        <span class="material-symbols-outlined text-sm">add</span>
        New Post
    </a>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-6">
    <div class="bg-white dark:bg-gray-800 rounded-xl border border-gray-200 dark:border-gray-700 p-6">
        <div class="flex items-center gap-3 mb-3">
            <span class="material-symbols-outlined text-blue-500 text-2xl">psychology</span>
            <h3 class="font-semibold text-gray-900 dark:text-white">Mental Health</h3>
        </div>
        <p class="text-sm text-gray-500 dark:text-gray-400 mb-3">Discussions about mental health and well-being</p>
        <p class="text-xs text-gray-400">0 posts</p>
    </div>

    <div class="bg-white dark:bg-gray-800 rounded-xl border border-gray-200 dark:border-gray-700 p-6">
        <div class="flex items-center gap-3 mb-3">
            <span class="material-symbols-outlined text-green-500 text-2xl">school</span>
            <h3 class="font-semibold text-gray-900 dark:text-white">Academic Support</h3>
        </div>
        <p class="text-sm text-gray-500 dark:text-gray-400 mb-3">Study tips and academic challenges</p>
        <p class="text-xs text-gray-400">0 posts</p>
    </div>

    <div class="bg-white dark:bg-gray-800 rounded-xl border border-gray-200 dark:border-gray-700 p-6">
        <div class="flex items-center gap-3 mb-3">
            <span class="material-symbols-outlined text-purple-500 text-2xl">groups</span>
            <h3 class="font-semibold text-gray-900 dark:text-white">Peer Support</h3>
        </div>
        <p class="text-sm text-gray-500 dark:text-gray-400 mb-3">Connect and support each other</p>
        <p class="text-xs text-gray-400">0 posts</p>
    </div>
</div>

<div class="bg-white dark:bg-gray-800 rounded-xl border border-gray-200 dark:border-gray-700 p-6 text-center">
    <span class="material-symbols-outlined text-4xl text-gray-400 mb-4">forum</span>
    <p class="text-gray-500 dark:text-gray-400 mb-4">No posts yet. Be the first to start a discussion!</p>
    <a href="{{ route('student.forum.create') }}" class="inline-block bg-primary text-white px-6 py-2 rounded-lg hover:opacity-90">Create First Post</a>
</div>
@endsection
