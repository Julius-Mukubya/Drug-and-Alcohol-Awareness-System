@extends('layouts.admin')

@section('title', 'Create Content - Admin')

@section('content')
<div class="mb-6">
    <a href="{{ route('admin.contents.index') }}" class="text-primary hover:underline flex items-center gap-1">
        <span class="material-symbols-outlined text-sm">arrow_back</span>
        Back to Content
    </a>
</div>

<div class="bg-white dark:bg-gray-800 rounded-xl border border-gray-200 dark:border-gray-700 p-6">
    <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-6">Create New Content</h2>

    <form action="{{ route('admin.contents.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="md:col-span-2">
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Title *</label>
                <input type="text" name="title" value="{{ old('title') }}" required
                    class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-primary dark:bg-gray-700 dark:text-white">
                @error('title')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Category *</label>
                <select name="category_id" required class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-primary dark:bg-gray-700 dark:text-white">
                    <option value="">Select Category</option>
                    @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                    @endforeach
                </select>
                @error('category_id')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Type *</label>
                <select name="type" required class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-primary dark:bg-gray-700 dark:text-white">
                    <option value="article" {{ old('type') == 'article' ? 'selected' : '' }}>Article</option>
                    <option value="video" {{ old('type') == 'video' ? 'selected' : '' }}>Video</option>
                    <option value="infographic" {{ old('type') == 'infographic' ? 'selected' : '' }}>Infographic</option>
                    <option value="document" {{ old('type') == 'document' ? 'selected' : '' }}>Document</option>
                </select>
                @error('type')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
            </div>

            <div class="md:col-span-2">
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Description</label>
                <textarea name="description" rows="3" class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-primary dark:bg-gray-700 dark:text-white">{{ old('description') }}</textarea>
                @error('description')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
            </div>

            <div class="md:col-span-2">
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Content *</label>
                <textarea name="content" rows="10" required class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-primary dark:bg-gray-700 dark:text-white">{{ old('content') }}</textarea>
                @error('content')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Featured Image</label>
                <div class="space-y-3">
                    <input type="file" name="featured_image" accept="image/*" id="featured_image" onchange="previewImage(event)"
                        class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-primary dark:bg-gray-700 dark:text-white">
                    <div id="image_preview" class="hidden">
                        <div class="relative inline-block">
                            <img id="preview_img" src="" alt="Preview" class="max-w-full h-48 rounded-lg border-2 border-gray-300 dark:border-gray-600">
                            <button type="button" onclick="clearImage()" class="absolute top-2 right-2 bg-red-500 text-white rounded-full p-1 hover:bg-red-600">
                                <span class="material-symbols-outlined text-sm">close</span>
                            </button>
                        </div>
                    </div>
                </div>
                @error('featured_image')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Reading Time (minutes)</label>
                <input type="number" name="reading_time" value="{{ old('reading_time') }}" min="1" class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-primary dark:bg-gray-700 dark:text-white">
                @error('reading_time')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Video URL</label>
                <div class="space-y-3">
                    <input type="url" name="video_url" id="video_url" value="{{ old('video_url') }}" 
                        placeholder="https://youtube.com/watch?v=... or https://youtu.be/..." 
                        onchange="previewVideo()"
                        class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-primary dark:bg-gray-700 dark:text-white">
                    <div id="video_preview" class="hidden">
                        <div class="relative">
                            <div class="aspect-video bg-gray-100 dark:bg-gray-900 rounded-lg overflow-hidden">
                                <iframe id="preview_video" src="" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen class="w-full h-full"></iframe>
                            </div>
                            <button type="button" onclick="clearVideo()" class="absolute top-2 right-2 bg-red-500 text-white rounded-full p-1 hover:bg-red-600">
                                <span class="material-symbols-outlined text-sm">close</span>
                            </button>
                        </div>
                    </div>
                </div>
                @error('video_url')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Attachment</label>
                <input type="file" name="file_path" class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-primary dark:bg-gray-700 dark:text-white">
                @error('file_path')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
            </div>

            <div class="md:col-span-2 flex gap-4">
                <label class="flex items-center gap-2">
                    <input type="checkbox" name="is_published" value="1" {{ old('is_published') ? 'checked' : '' }} class="rounded">
                    <span class="text-sm text-gray-700 dark:text-gray-300">Publish immediately</span>
                </label>
                <label class="flex items-center gap-2">
                    <input type="checkbox" name="is_featured" value="1" {{ old('is_featured') ? 'checked' : '' }} class="rounded">
                    <span class="text-sm text-gray-700 dark:text-gray-300">Feature this content</span>
                </label>
            </div>
        </div>

        <div class="flex gap-3 mt-6">
            <button type="submit" class="bg-primary text-white px-6 py-2 rounded-lg hover:opacity-90">Create Content</button>
            <a href="{{ route('admin.contents.index') }}" class="bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-300 px-6 py-2 rounded-lg hover:opacity-90">Cancel</a>
        </div>
    </form>
</div>
@endsection

@push('scripts')
<script>
// Image Preview
function previewImage(event) {
    const file = event.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('preview_img').src = e.target.result;
            document.getElementById('image_preview').classList.remove('hidden');
        }
        reader.readAsDataURL(file);
    }
}

function clearImage() {
    document.getElementById('featured_image').value = '';
    document.getElementById('image_preview').classList.add('hidden');
    document.getElementById('preview_img').src = '';
}

// Video Preview
function previewVideo() {
    const url = document.getElementById('video_url').value;
    if (url) {
        let embedUrl = '';
        
        // YouTube URL patterns
        const youtubeRegex = /(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/\s]{11})/;
        const match = url.match(youtubeRegex);
        
        if (match && match[1]) {
            embedUrl = `https://www.youtube.com/embed/${match[1]}`;
        }
        // Vimeo URL pattern
        else if (url.includes('vimeo.com/')) {
            const vimeoId = url.split('vimeo.com/')[1].split(/[?&]/)[0];
            embedUrl = `https://player.vimeo.com/video/${vimeoId}`;
        }
        // Direct embed URL
        else if (url.includes('embed')) {
            embedUrl = url;
        }
        
        if (embedUrl) {
            document.getElementById('preview_video').src = embedUrl;
            document.getElementById('video_preview').classList.remove('hidden');
        } else {
            alert('Please enter a valid YouTube or Vimeo URL');
        }
    }
}

function clearVideo() {
    document.getElementById('video_url').value = '';
    document.getElementById('video_preview').classList.add('hidden');
    document.getElementById('preview_video').src = '';
}
</script>
@endpush
