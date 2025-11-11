@extends('layouts.admin')

@section('title', 'Manage Users - Admin')

@section('content')
<div class="flex justify-between items-center mb-6">
    <div>
        <h2 class="text-2xl font-bold text-gray-900 dark:text-white">Users</h2>
        <p class="text-gray-500 dark:text-gray-400">Manage system users</p>
    </div>
    <a href="{{ route('admin.users.create') }}" class="bg-primary text-white px-4 py-2 rounded-lg flex items-center gap-2 hover:opacity-90">
        <span class="material-symbols-outlined text-sm">add</span>
        Add User
    </a>
</div>

@if(session('success'))
<div class="bg-green-50 dark:bg-green-900/30 border border-green-200 text-green-800 dark:text-green-200 px-4 py-3 rounded-lg mb-6">
    {{ session('success') }}
</div>
@endif

<div class="bg-white dark:bg-gray-800 rounded-xl border border-gray-200 dark:border-gray-700 overflow-hidden">
    <table class="w-full text-sm">
        <thead class="bg-gray-50 dark:bg-gray-700">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 dark:text-gray-300 uppercase">Name</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 dark:text-gray-300 uppercase">Email</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 dark:text-gray-300 uppercase">Role</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 dark:text-gray-300 uppercase">Status</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 dark:text-gray-300 uppercase">Joined</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 dark:text-gray-300 uppercase">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
            @forelse($users as $user)
            <tr class="hover:bg-gray-50 dark:hover:bg-gray-700">
                <td class="px-6 py-4">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-full bg-primary/20 flex items-center justify-center">
                            @if($user->avatar)
                            <img src="{{ asset('storage/' . $user->avatar) }}" alt="{{ $user->name }}" class="w-full h-full rounded-full object-cover">
                            @else
                            <span class="material-symbols-outlined text-primary">person</span>
                            @endif
                        </div>
                        <div>
                            <p class="font-medium text-gray-900 dark:text-white">{{ $user->name }}</p>
                            @if($user->registration_number)
                            <p class="text-xs text-gray-500">{{ $user->registration_number }}</p>
                            @endif
                        </div>
                    </div>
                </td>
                <td class="px-6 py-4 text-gray-600 dark:text-gray-400">{{ $user->email }}</td>
                <td class="px-6 py-4">
                    <span class="px-2 py-1 text-xs font-medium rounded-full
                        @if($user->role === 'admin') bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-300
                        @elseif($user->role === 'counselor') bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-300
                        @else bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-300
                        @endif">
                        {{ ucfirst($user->role) }}
                    </span>
                </td>
                <td class="px-6 py-4">
                    @if($user->is_active)
                    <span class="px-2 py-1 text-xs font-medium bg-green-100 text-green-800 rounded-full dark:bg-green-900 dark:text-green-300">Active</span>
                    @else
                    <span class="px-2 py-1 text-xs font-medium bg-gray-100 text-gray-800 rounded-full dark:bg-gray-900 dark:text-gray-300">Inactive</span>
                    @endif
                </td>
                <td class="px-6 py-4 text-gray-600 dark:text-gray-400">{{ $user->created_at->format('M d, Y') }}</td>
                <td class="px-6 py-4">
                    <div class="flex items-center gap-2">
                        <a href="{{ route('admin.users.edit', $user) }}" class="text-blue-600 hover:text-blue-800 dark:text-blue-400">
                            <span class="material-symbols-outlined text-sm">edit</span>
                        </a>
                        @if($user->id !== auth()->id())
                        <form action="{{ route('admin.users.destroy', $user) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-800 dark:text-red-400">
                                <span class="material-symbols-outlined text-sm">delete</span>
                            </button>
                        </form>
                        @endif
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" class="px-6 py-8 text-center text-gray-500">
                    <div class="flex flex-col items-center gap-2">
                        <span class="material-symbols-outlined text-4xl">person</span>
                        <p>No users found</p>
                    </div>
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
