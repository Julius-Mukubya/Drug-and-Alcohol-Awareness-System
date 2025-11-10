<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\{CounselingSession, CounselingMessage};
use Illuminate\Http\Request;

class CounselingController extends Controller
{
    public function index()
    {
        $sessions = auth()->user()->counselingSessions()
            ->with('counselor')
            ->latest()
            ->paginate(10);

        return view('student.counseling.index', compact('sessions'));
    }

    public function create()
    {
        return view('student.counseling.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'subject' => 'required|string|max:255',
            'description' => 'required|string',
            'priority' => 'required|in:low,medium,high,urgent',
            'is_anonymous' => 'boolean',
            'scheduled_at' => 'nullable|date|after:now',
        ]);

        $session = CounselingSession::create([
            'student_id' => auth()->id(),
            'subject' => $validated['subject'],
            'description' => $validated['description'],
            'priority' => $validated['priority'],
            'is_anonymous' => $validated['is_anonymous'] ?? false,
            'scheduled_at' => $validated['scheduled_at'] ?? null,
            'status' => 'pending',
        ]);

        return redirect()->route('student.counseling.show', $session)
            ->with('success', 'Counseling request submitted successfully!');
    }

    public function show(CounselingSession $counseling)
    {
        if ($counseling->student_id !== auth()->id()) {
            abort(403);
        }

        $counseling->load(['counselor', 'messages.sender']);

        // Mark messages as read
        $counseling->messages()
            ->where('sender_id', '!=', auth()->id())
            ->where('is_read', false)
            ->each(fn($msg) => $msg->markAsRead());

        return view('student.counseling.show', compact('counseling'));
    }

    public function sendMessage(Request $request, CounselingSession $counseling)
    {
        if ($counseling->student_id !== auth()->id()) {
            abort(403);
        }

        $request->validate([
            'message' => 'required|string',
            'attachment' => 'nullable|file|max:5120', // 5MB
        ]);

        $attachmentPath = null;
        if ($request->hasFile('attachment')) {
            $attachmentPath = $request->file('attachment')->store('counseling-attachments', 'public');
        }

        CounselingMessage::create([
            'session_id' => $counseling->id,
            'sender_id' => auth()->id(),
            'message' => $request->message,
            'attachment_path' => $attachmentPath,
        ]);

        return back()->with('success', 'Message sent!');
    }
}