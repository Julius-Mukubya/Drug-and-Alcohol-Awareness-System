@extends('layouts.admin')

@section('title', 'Edit User - Admin')

@section('content')
<div class="mb-6">
    <a href="{{ route('admin.users.index') }}" class="text-primary hover:underline flex items-center gap-1">
        <span class="material-symbols-outlined text-sm">arrow_back</span>
        Back to Users
    </a>
</div>

<div class="max-w-3xl mx-auto bg-white dark:bg-gray-800 rounded-xl border border-gray-200 dark:border-gray-700 p-6">
    <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-6">Edit User</h2>

    <form action="{{ route('admin.users.update', $user) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="space-y-6">
            <!-- Avatar Preview -->
            <div class="flex items-center gap-6 p-4 bg-gray-50 dark:bg-gray-900/50 rounded-lg">
                <div class="relative">
                    <div class="w-24 h-24 rounded-full bg-gradient-to-br from-primary to-blue-600 flex items-center justify-center overflow-hidden ring-4 ring-white dark:ring-gray-800 relative">
                        @if($user->avatar)
                        <img id="avatar_current" src="{{ asset('storage/' . $user->avatar) }}" alt="{{ $user->name }}" class="w-full h-full object-cover absolute inset-0">
                        @else
                        <span class="material-symbols-outlined text-4xl text-white absolute inset-0 flex items-center justify-center" id="avatar_icon">person</span>
                        @endif
                        <img id="avatar_preview" src="" alt="Preview" class="w-full h-full object-cover absolute inset-0 hidden">
                    </div>
                    <div class="absolute bottom-0 right-0 bg-primary rounded-full p-2 shadow-lg">
                        <span class="material-symbols-outlined text-white text-sm">photo_camera</span>
                    </div>
                </div>
                <div class="flex-1">
                    <p class="text-sm font-semibold text-gray-900 dark:text-white mb-1">
                        @if($user->avatar)
                        Current Photo
                        @else
                        No Photo
                        @endif
                    </p>
                    <p class="text-xs text-gray-500 dark:text-gray-400 mb-3">Upload a new photo to replace. JPG, PNG or GIF. Max 2MB</p>
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Full Name *</label>
                <input type="text" name="name" value="{{ old('name', $user->name) }}" required
                    class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-primary dark:bg-gray-700 dark:text-white">
                @error('name')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Email Address *</label>
                <input type="email" name="email" value="{{ old('email', $user->email) }}" required
                    class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-primary dark:bg-gray-700 dark:text-white">
                @error('email')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Role *</label>
                <select name="role" required class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-primary dark:bg-gray-700 dark:text-white">
                    <option value="student" {{ old('role', $user->role) == 'student' ? 'selected' : '' }}>Student</option>
                    <option value="counselor" {{ old('role', $user->role) == 'counselor' ? 'selected' : '' }}>Counselor</option>
                    <option value="admin" {{ old('role', $user->role) == 'admin' ? 'selected' : '' }}>Admin</option>
                </select>
                @error('role')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Phone Number</label>
                <input type="tel" name="phone" value="{{ old('phone', $user->phone) }}"
                    class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-primary dark:bg-gray-700 dark:text-white">
                @error('phone')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Registration Number</label>
                <input type="text" name="registration_number" value="{{ old('registration_number', $user->registration_number) }}"
                    class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-primary dark:bg-gray-700 dark:text-white">
                @error('registration_number')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Upload New Photo</label>
                <input type="file" name="avatar" accept="image/*" id="avatar_input" onchange="previewAvatar(event)"
                    class="block w-full text-sm text-gray-500 dark:text-gray-400
                    file:mr-4 file:py-2 file:px-4
                    file:rounded-lg file:border-0
                    file:text-sm file:font-semibold
                    file:bg-primary file:text-white
                    hover:file:opacity-90 file:cursor-pointer">
                @error('avatar')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
            </div>

            <div class="border-t border-gray-200 dark:border-gray-700 pt-6">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Change Password</h3>
                <p class="text-sm text-gray-500 dark:text-gray-400 mb-4">Leave blank to keep current password</p>

                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">New Password</label>
                        <input type="password" name="password"
                            class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-primary dark:bg-gray-700 dark:text-white">
                        @error('password')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Confirm New Password</label>
                        <input type="password" name="password_confirmation"
                            class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-primary dark:bg-gray-700 dark:text-white">
                    </div>
                </div>
            </div>

            <div>
                <label class="flex items-center gap-2">
                    <input type="checkbox" name="is_active" value="1" {{ old('is_active', $user->is_active) ? 'checked' : '' }} class="rounded">
                    <span class="text-sm text-gray-700 dark:text-gray-300">Active Account</span>
                </label>
            </div>
        </div>

        <div class="flex gap-3 mt-8">
            <button type="submit" class="bg-primary text-white px-8 py-3 rounded-lg hover:opacity-90 font-semibold">Update User</button>
            <a href="{{ route('admin.users.index') }}" class="bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-300 px-8 py-3 rounded-lg hover:opacity-90 font-semibold">Cancel</a>
        </div>
    </form>
</div>
@endsection

@push('scripts')
<script>
function previewAvatar(event) {
    const file = event.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            const preview = document.getElementById('avatar_preview');
            const current = document.getElementById('avatar_current');
            const icon = document.getElementById('avatar_icon');
            
            preview.src = e.target.result;
            preview.classList.remove('hidden');
            
            if (current) current.classList.add('hidden');
            if (icon) icon.classList.add('hidden');
        }
        reader.readAsDataURL(file);
    }
}
</script>
@endpush
