<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\{Incident, User};
use Illuminate\Http\Request;

class IncidentController extends Controller
{
    public function index(Request $request)
    {
        $query = Incident::with(['reporter', 'assignee']);

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('severity')) {
            $query->where('severity', $request->severity);
        }

        if ($request->filled('search')) {
            $query->where(function($q) use ($request) {
                $q->where('incident_type', 'like', '%' . $request->search . '%')
                  ->orWhere('description', 'like', '%' . $request->search . '%');
            });
        }

        $incidents = $query->latest()->paginate(15);

        return view('admin.incidents.index', compact('incidents'));
    }

    public function show(Incident $incident)
    {
        $incident->load(['reporter', 'assignee']);
        $admins = User::where('role', 'admin')->get();

        return view('admin.incidents.show', compact('incident', 'admins'));
    }

    public function update(Request $request, Incident $incident)
    {
        $validated = $request->validate([
            'status' => 'required|in:pending,investigating,resolved,closed',
            'severity' => 'required|in:low,medium,high,critical',
            'assigned_to' => 'nullable|exists:users,id',
            'admin_notes' => 'nullable|string',
            'resolution' => 'nullable|string',
        ]);

        if ($request->status === 'resolved' && !$incident->resolved_at) {
            $validated['resolved_at'] = now();
        }

        $incident->update($validated);

        return back()->with('success', 'Incident updated successfully!');
    }

    public function destroy(Incident $incident)
    {
        $incident->delete();

        return redirect()->route('admin.incidents.index')
            ->with('success', 'Incident deleted successfully!');
    }
}