<?php

namespace App\Http\Controllers\Counselor;

use App\Http\Controllers\Controller;
use App\Models\{CounselingSession, CounselingMessage};
use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        
        // Admins can see all sessions, counselors only see their own
        if ($user->role === 'admin') {
            $pendingSessions = CounselingSession::pending()
                ->with('student')
                ->latest()
                ->get();

            $activeSessions = CounselingSession::active()
                ->with(['student', 'counselor'])
                ->latest()
                ->get();

            $completedSessions = CounselingSession::completed()
                ->with(['student', 'counselor'])
                ->latest()
                ->paginate(10);
        } else {
            $pendingSessions = CounselingSession::pending()
                ->with('student')
                ->latest()
                ->get();

            $activeSessions = $user->counselingAsProvider()
                ->active()
                ->with('student')
                ->latest()
                ->get();

            $completedSessions = $user->counselingAsProvider()
                ->completed()
                ->with('student')
                ->latest()
                ->paginate(10);
        }

        return view('counselor.sessions.index', compact('pendingSessions', 'activeSessions', 'completedSessions'));
    }

    public function show(CounselingSession $session)
    {
        $user = auth()->user();
        
        // Allow admins to view all sessions, counselors only their own or pending
        if ($user->role !== 'admin' && $session->counselor_id !== $user->id && $session->status !== 'pending') {
            abort(403);
        }

        $session->load(['student', 'counselor', 'messages.sender']);

        // Mark messages as read (only for counselors, not admins viewing)
        if ($user->role === 'counselor' && $session->counselor_id === $user->id) {
            $session->messages()
                ->where('sender_id', '!=', $user->id)
                ->where('is_read', false)
                ->each(fn($msg) => $msg->markAsRead());
        }

        return view('counselor.sessions.show', compact('session'));
    }

    public function accept(CounselingSession $session)
    {
        if ($session->status !== 'pending') {
            return back()->with('error', 'Session is not pending.');
        }

        $session->update([
            'counselor_id' => auth()->id(),
            'status' => 'active',
            'started_at' => now(),
        ]);

        return redirect()->route('counselor.sessions.show', $session)
            ->with('success', 'Session accepted!');
    }

    public function complete(Request $request, CounselingSession $session)
    {
        if ($session->counselor_id !== auth()->id()) {
            abort(403);
        }

        $request->validate([
            'outcome_notes' => 'required|string',
            'counselor_notes' => 'nullable|string',
        ]);

        $session->update([
            'status' => 'completed',
            'completed_at' => now(),
            'outcome_notes' => $request->outcome_notes,
            'counselor_notes' => $request->counselor_notes,
        ]);

        return redirect()->route('counselor.sessions.index')
            ->with('success', 'Session completed successfully!');
    }

    public function sendMessage(Request $request, CounselingSession $session)
    {
        if ($session->counselor_id !== auth()->id()) {
            abort(403);
        }

        $request->validate([
            'message' => 'required|string',
            'attachment' => 'nullable|file|max:5120',
        ]);

        $attachmentPath = null;
        if ($request->hasFile('attachment')) {
            $attachmentPath = $request->file('attachment')->store('counseling-attachments', 'public');
        }

        CounselingMessage::create([
            'session_id' => $session->id,
            'sender_id' => auth()->id(),
            'message' => $request->message,
            'attachment_path' => $attachmentPath,
        ]);

        return back()->with('success', 'Message sent!');
    }
}