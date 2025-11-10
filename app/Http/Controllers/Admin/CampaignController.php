<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Campaign;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CampaignController extends Controller
{
    public function index()
    {
        $campaigns = Campaign::with('creator')
            ->withCount('participants')
            ->latest()
            ->paginate(15);

        return view('admin.campaigns.index', compact('campaigns'));
    }

    public function create()
    {
        return view('admin.campaigns.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'content' => 'nullable|string',
            'banner_image' => 'nullable|image|max:2048',
            'type' => 'required|in:awareness,event,workshop,webinar',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'location' => 'nullable|string',
            'max_participants' => 'nullable|integer|min:1',
            'status' => 'required|in:draft,active,completed,cancelled',
            'is_featured' => 'boolean',
        ]);

        $validated['created_by'] = auth()->id();

        if ($request->hasFile('banner_image')) {
            $validated['banner_image'] = $request->file('banner_image')
                ->store('campaign-banners', 'public');
        }

        Campaign::create($validated);

        return redirect()->route('admin.campaigns.index')
            ->with('success', 'Campaign created successfully!');
    }

    public function edit(Campaign $campaign)
    {
        return view('admin.campaigns.edit', compact('campaign'));
    }

    public function update(Request $request, Campaign $campaign)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'content' => 'nullable|string',
            'banner_image' => 'nullable|image|max:2048',
            'type' => 'required|in:awareness,event,workshop,webinar',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'location' => 'nullable|string',
            'max_participants' => 'nullable|integer|min:1',
            'status' => 'required|in:draft,active,completed,cancelled',
            'is_featured' => 'boolean',
        ]);

        if ($request->hasFile('banner_image')) {
            if ($campaign->banner_image) {
                Storage::disk('public')->delete($campaign->banner_image);
            }
            $validated['banner_image'] = $request->file('banner_image')
                ->store('campaign-banners', 'public');
        }

        $campaign->update($validated);

        return redirect()->route('admin.campaigns.index')
            ->with('success', 'Campaign updated successfully!');
    }

    public function destroy(Campaign $campaign)
    {
        if ($campaign->banner_image) {
            Storage::disk('public')->delete($campaign->banner_image);
        }

        $campaign->delete();

        return redirect()->route('admin.campaigns.index')
            ->with('success', 'Campaign deleted successfully!');
    }
}