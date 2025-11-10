<?php

namespace App\Http\Controllers;

use App\Models\{EducationalContent, Category, ContentView};
use Illuminate\Http\Request;

class ContentController extends Controller
{
    public function index(Request $request)
    {
        $query = EducationalContent::published()->with(['category', 'author']);

        // Filter by category
        if ($request->filled('category')) {
            $query->where('category_id', $request->category);
        }

        // Filter by type
        if ($request->filled('type')) {
            $query->where('type', $request->type);
        }

        // Search
        if ($request->filled('search')) {
            $query->where(function($q) use ($request) {
                $q->where('title', 'like', '%' . $request->search . '%')
                  ->orWhere('description', 'like', '%' . $request->search . '%');
            });
        }

        $contents = $query->latest('published_at')->paginate(12);
        $categories = Category::active()->get();

        return view('content.index', compact('contents', 'categories'));
    }

    public function show(EducationalContent $content)
    {
        // Check if published or user is admin
        if (!$content->is_published && !auth()->user()?->isAdmin()) {
            abort(404);
        }

        // Track view
        ContentView::create([
            'content_id' => $content->id,
            'user_id' => auth()->id(),
            'ip_address' => request()->ip(),
            'user_agent' => request()->userAgent(),
            'viewed_at' => now(),
        ]);

        $content->incrementViews();
        $content->load('category', 'author');

        // Get related content
        $relatedContents = EducationalContent::published()
            ->where('category_id', $content->category_id)
            ->where('id', '!=', $content->id)
            ->latest()
            ->take(4)
            ->get();

        return view('content.show', compact('content', 'relatedContents'));
    }
}