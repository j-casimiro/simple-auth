<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ProfileController extends Controller
{
    use AuthorizesRequests;

    public function __construct()
    {
        Gate::define('view-any-profile', function ($user) {
            return $user->role === 'admin';
        });

        Gate::define('view-profile', function ($user, Profile $profile) {
            return $user->id === $profile->user_id || $user->role === 'admin';
        });

        Gate::define('update-profile', function ($user, Profile $profile) {
            return $user->id === $profile->user_id || $user->role === 'admin';
        });
    }

    public function showProfileForm()
    {
        return view('profile.show');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'address' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
        ]);

        Profile::create([
            'user_id' => Auth::id(),
            'address' => $validatedData['address'],
            'position' => $validatedData['position'],
            'phone' => $validatedData['phone'],
        ]);

        return redirect()->route('showDashboardPage')->with('success', 'Profile created successfully!');
    }

    public function index()
    {
        // Using Gate
        if (! Gate::allows('view-any-profile')) {
            abort(403);
        }

        // Or using Policy
        // $this->authorize('viewAny', Profile::class);

        $profiles = Profile::all();
        return view('profiles.index', compact('profiles'));
    }

    public function show(Profile $profile)
    {
        // Using Gate
        if (! Gate::allows('view-profile', $profile)) {
            abort(403);
        }

        // Or using Policy
        // $this->authorize('view', $profile);

        return view('profiles.show', compact('profile'));
    }

    public function edit(Profile $profile)
    {
        if (! Gate::allows('update-profile', $profile)) {
            abort(403);
        }

        return view('profile.edit', compact('profile'));
    }

    public function update(Request $request, Profile $profile)
    {
        if (! Gate::allows('update-profile', $profile)) {
            abort(403);
        }

        $validatedData = $request->validate([
            'address' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
        ]);

        $profile->update($validatedData);

        return redirect()->route('profile.show', $profile)
            ->with('success', 'Profile updated successfully!');
    }
}
