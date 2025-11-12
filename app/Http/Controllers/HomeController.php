<?php

namespace App\Http\Controllers;

use App\Models\{EducationalContent, Category, Campaign};
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $featuredContents = EducationalContent::published()
            ->featured()
            ->with('category', 'author')
            ->latest()
            ->take(6)
            ->get();

        $categories = Category::active()
            ->withCount('contents')
            ->ordered()
            ->get();

        $activeCampaigns = Campaign::active()
            ->latest()
            ->take(3)
            ->get();

        return view('public.home', compact('featuredContents', 'categories', 'activeCampaigns'));
    }
}