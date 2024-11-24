<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Show the registration form
     *
     * @return \Illuminate\View\View
     */
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    /**
     * Handle user registration
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'sometimes|string|in:user,admin'
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role' => $validated['role'] ?? 'user'
        ]);

        Auth::login($user);

        return redirect()->route('showDashboardPage')
            ->with('success', 'Registration successful! Welcome aboard!');
    }

    /**
     * Show the login form
     *
     * @return \Illuminate\View\View
     */
    public function showLoginForm()
    {
        return view('auth.login');
    }

    /**
     * Handle user login
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();

            return redirect()->intended(route('showDashboardPage'))
                ->with('success', 'Welcome back!');
        }

        $user = User::where('email', $credentials['email'])->first();

        if (!$user) {
            return back()
                ->withInput($request->only('email'))
                ->withErrors([
                    'email' => 'No account found with this email address.'
                ]);
        }

        return back()
            ->withInput($request->only('email'))
            ->withErrors([
                'password' => 'The provided password is incorrect.'
            ]);
    }

    /**
     * Show the dashboard page
     *
     * @return \Illuminate\View\View
     */
    public function showDashboardPage()
    {
        $user = Auth::user();
        return view('auth.dashboard', compact('user'));
    }

    /**
     * Handle user logout
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('showLoginForm')
            ->with('success', 'You have been successfully logged out.');
    }
}
