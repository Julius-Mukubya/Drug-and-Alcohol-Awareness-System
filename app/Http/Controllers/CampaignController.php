<?php

namespace App\Http\Controllers;

use App\Models\{Campaign, CampaignParticipant};
use Illuminate\Http\Request;

class CampaignController extends Controller
{
    public function index()
    {
        $activeCampaigns = Campaign::active()
            ->withCount('participants')
            ->latest()
            ->paginate(9);

        $upcomingCampaigns = Campaign::upcoming()
            ->withCount('participants')
            ->latest('start_date')
            ->take(6)
            ->get();

        return view('public.campaigns.index', compact('activeCampaigns', 'upcomingCampaigns'));
    }

    public function show(Campaign $campaign)
    {
        $campaign->load('creator');
        $campaign->loadCount('participants');

        $isRegistered = auth()->check() && $campaign->isUserRegistered(auth()->id());

        return view('public.campaigns.show', compact('campaign', 'isRegistered'));
    }

    public function register(Campaign $campaign)
    {
        if (!auth()->check()) {
            return redirect()->route('login')
                ->with('error', 'Please login to register for campaigns.');
        }

        if ($campaign->isUserRegistered(auth()->id())) {
            return back()->with('error', 'You are already registered for this campaign.');
        }

        if ($campaign->isFull()) {
            return back()->with('error', 'This campaign is full.');
        }

        CampaignParticipant::create([
            'campaign_id' => $campaign->id,
            'user_id' => auth()->id(),
            'status' => 'registered',
            'registered_at' => now(),
        ]);

        return back()->with('success', 'Successfully registered for the campaign!');
    }

    public function unregister(Campaign $campaign)
    {
        if (!auth()->check()) {
            abort(403);
        }

        $participant = CampaignParticipant::where([
            'campaign_id' => $campaign->id,
            'user_id' => auth()->id(),
        ])->first();

        if (!$participant) {
            return back()->with('error', 'You are not registered for this campaign.');
        }

        $participant->update(['status' => 'cancelled']);

        return back()->with('success', 'Successfully unregistered from the campaign.');
    }
}