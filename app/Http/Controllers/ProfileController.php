<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function showProfileForm()
    {
        return view('profile.show');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'address' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
        ]);

        $profile = Profile::create([
            'user_id' => Auth::id(),
            'address' => $validated['address'],
            'position' => $validated['position'],
            'phone' => $validated['phone'],
        ]);

        return redirect()->route('showDashboardPage')->with('success', 'Profile created successfully!');
    }
}
