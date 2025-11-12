<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisterController extends Controller
{
    /**
     * Handle an AJAX registration request.
     */
    public function ajaxRegister(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'terms' => ['required', 'accepted'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'student', // Default role for new registrations
        ]);

        // Log the user in
        Auth::login($user);

        // Determine redirect URL based on user role
        $redirectUrl = match($user->role) {
            'admin' => route('admin.dashboard'),
            'counselor' => route('counselor.dashboard'),
            'student' => route('student.dashboard'),
            default => route('dashboard')
        };

        return response()->json([
            'success' => true,
            'message' => 'Account created successfully! Welcome to MUBS D&A Awareness Platform.',
            'redirect' => $redirectUrl,
            'user' => [
                'name' => $user->name,
                'email' => $user->email,
                'role' => $user->role,
            ]
        ]);
    }
}