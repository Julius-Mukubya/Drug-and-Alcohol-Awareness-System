@extends('layouts.student')

@section('title', 'Request Counseling - Student')

@section('content')
<div class="mb-6">
    <a href="{{ route('student.counseling.index') }}" class="text-primary hover:underline flex items-center gap-1">
        <span class="material-symbols-outlined text-sm">arrow_back</span>
        Back to Sessions
    </a>
</div>

<div class="max-w-2xl mx-auto">
    <div class="bg-white dark:bg-gray-800 rounded-xl border border-gray-200 dark:border-gray-700 p-6">
        <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-6">Request Counseling Session</h2>

        <form action="{{ route('student.counseling.store') }}" method="POST">
            @csrf

            <div class="space-y-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Session Type *</label>
                    <select name="session_type" required class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-primary dark:bg-gray-700 dark:text-white">
                        <option value="">Select Type</option>
                        <option value="individual">Individual Counseling</option>
                        <option value="group">Group Counseling</option>
                        <option value="crisis">Crisis Intervention</option>
                        <option value="academic">Academic Counseling</option>
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Priority *</label>
                    <select name="priority" required class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-primary dark:bg-gray-700 dark:text-white">
                        <option value="low">Low - Can wait a few days</option>
                        <option value="medium" selected>Medium - Within this week</option>
                        <option value="high">High - Within 24 hours</option>
                        <option value="urgent">Urgent - Immediate attention needed</option>
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Reason for Session *</label>
                    <textarea name="reason" rows="5" required placeholder="Please describe what you'd like to discuss..." class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-primary dark:bg-gray-700 dark:text-white"></textarea>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Preferred Date & Time</label>
                    <input type="datetime-local" name="preferred_datetime" class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-primary dark:bg-gray-700 dark:text-white">
                </div>

                <div class="bg-blue-50 dark:bg-blue-900/30 border border-blue-200 dark:border-blue-800 rounded-lg p-4">
                    <p class="text-sm text-blue-800 dark:text-blue-200">
                        <strong>Note:</strong> All counseling sessions are confidential. A counselor will review your request and contact you within 24-48 hours.
                    </p>
                </div>

                <div class="flex gap-3">
                    <button type="submit" class="bg-primary text-white px-6 py-2 rounded-lg hover:opacity-90">Submit Request</button>
                    <a href="{{ route('student.counseling.index') }}" class="bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-300 px-6 py-2 rounded-lg hover:opacity-90">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
