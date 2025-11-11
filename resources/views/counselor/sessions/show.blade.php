@extends('layouts.counselor')

@section('title', 'Session Details - Counselor')

@section('content')
<div class="mb-6">
    <a href="{{ route('counselor.sessions.index') }}" class="text-primary hover:underline flex items-center gap-1">
        <span class="material-symbols-outlined text-sm">arrow_back</span>
        Back to Sessions
    </a>
</div>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
    <!-- Session Info -->
    <div class="lg:col-span-1 space-y-6">
        <div class="bg-white dark:bg-gray-800 rounded-xl border border-gray-200 dark:border-gray-700 p-6">
            <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Session Information</h3>
            
            <div class="space-y-4">
                <div>
                    <p class="text-xs text-gray-500 dark:text-gray-400 mb-1">Student</p>
                    <p class="font-medium text-gray-900 dark:text-white">{{ $session->student->name }}</p>
                    <p class="text-sm text-gray-600 dark:text-gray-400">{{ $session->student->email }}</p>
                </div>

                <div>
                    <p class="text-xs text-gray-500 dark:text-gray-400 mb-1">Session Type</p>
                    <p class="font-medium text-gray-900 dark:text-white">{{ ucfirst(str_replace('_', ' ', $session->session_type)) }}</p>
                </div>

                <div>
                    <p class="text-xs text-gray-500 dark:text-gray-400 mb-1">Priority</p>
                    <span class="px-2 py-1 text-xs font-medium rounded-full
                        @if($session->priority === 'urgent') bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-300
                        @elseif($session->priority === 'high') bg-orange-100 text-orange-800 dark:bg-orange-900 dark:text-orange-300
                        @elseif($session->priority === 'medium') bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-300
                        @else bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-300
                        @endif">
                        {{ ucfirst($session->priority) }}
                    </span>
                </div>

                <div>
                    <p class="text-xs text-gray-500 dark:text-gray-400 mb-1">Status</p>
                    <span class="px-2 py-1 text-xs font-medium rounded-full
                        @if($session->status === 'active') bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-300
                        @elseif($session->status === 'completed') bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-300
                        @else bg-gray-100 text-gray-800 dark:bg-gray-900 dark:text-gray-300
                        @endif">
                        {{ ucfirst($session->status) }}
                    </span>
                </div>

                <div>
                    <p class="text-xs text-gray-500 dark:text-gray-400 mb-1">Requested</p>
                    <p class="text-sm text-gray-900 dark:text-white">{{ $session->created_at->format('M d, Y h:i A') }}</p>
                </div>
            </div>

            @if($session->status === 'active')
            <button onclick="document.getElementById('completeModal').classList.remove('hidden')" 
                class="w-full mt-6 bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700">
                Complete Session
            </button>
            @endif
        </div>

        <div class="bg-white dark:bg-gray-800 rounded-xl border border-gray-200 dark:border-gray-700 p-6">
            <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Reason for Session</h3>
            <p class="text-sm text-gray-700 dark:text-gray-300">{{ $session->reason }}</p>
        </div>
    </div>

    <!-- Chat Area -->
    <div class="lg:col-span-2">
        <div class="bg-white dark:bg-gray-800 rounded-xl border border-gray-200 dark:border-gray-700 flex flex-col h-[600px]">
            <div class="p-4 border-b border-gray-200 dark:border-gray-700">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Messages</h3>
            </div>

            <div class="flex-1 overflow-y-auto p-4 space-y-4">
                @forelse($session->messages as $message)
                <div class="flex {{ $message->sender_id === auth()->id() ? 'justify-end' : 'justify-start' }}">
                    <div class="max-w-[70%]">
                        <div class="flex items-center gap-2 mb-1">
                            <p class="text-xs text-gray-500 dark:text-gray-400">
                                {{ $message->sender->name }}
                            </p>
                            <p class="text-xs text-gray-400">
                                {{ $message->created_at->format('h:i A') }}
                            </p>
                        </div>
                        <div class="rounded-lg p-3 {{ $message->sender_id === auth()->id() ? 'bg-primary text-white' : 'bg-gray-100 dark:bg-gray-700 text-gray-900 dark:text-white' }}">
                            <p class="text-sm">{{ $message->message }}</p>
                            @if($message->attachment_path)
                            <a href="{{ asset('storage/' . $message->attachment_path) }}" target="_blank" class="text-xs underline mt-2 block">
                                View Attachment
                            </a>
                            @endif
                        </div>
                    </div>
                </div>
                @empty
                <div class="text-center py-8">
                    <span class="material-symbols-outlined text-4xl text-gray-400">chat</span>
                    <p class="text-gray-500 dark:text-gray-400 mt-2">No messages yet</p>
                </div>
                @endforelse
            </div>

            @if($session->status === 'active')
            <div class="p-4 border-t border-gray-200 dark:border-gray-700">
                <form action="{{ route('counselor.sessions.message', $session) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="flex gap-2">
                        <input type="text" name="message" required placeholder="Type your message..." 
                            class="flex-1 px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-primary dark:bg-gray-700 dark:text-white">
                        <button type="submit" class="bg-primary text-white px-6 py-2 rounded-lg hover:opacity-90">
                            Send
                        </button>
                    </div>
                </form>
            </div>
            @endif
        </div>
    </div>
</div>

<!-- Complete Session Modal -->
<div id="completeModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
    <div class="bg-white dark:bg-gray-800 rounded-xl p-6 max-w-2xl w-full mx-4">
        <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-4">Complete Session</h3>
        
        <form action="{{ route('counselor.sessions.complete', $session) }}" method="POST">
            @csrf
            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Outcome Notes *</label>
                    <textarea name="outcome_notes" rows="4" required 
                        class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-primary dark:bg-gray-700 dark:text-white"></textarea>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Private Notes (Optional)</label>
                    <textarea name="counselor_notes" rows="3" 
                        class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-primary dark:bg-gray-700 dark:text-white"></textarea>
                </div>
            </div>

            <div class="flex gap-3 mt-6">
                <button type="submit" class="bg-green-600 text-white px-6 py-2 rounded-lg hover:bg-green-700">
                    Complete Session
                </button>
                <button type="button" onclick="document.getElementById('completeModal').classList.add('hidden')" 
                    class="bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-300 px-6 py-2 rounded-lg hover:opacity-90">
                    Cancel
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
