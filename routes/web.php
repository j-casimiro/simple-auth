<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view('welcome');
});

// GUEST ROUTES (FOR UNAUTHENTICATED USERS)
Route::middleware('guest')->group(function () {
    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('showRegisterForm');
    Route::post('/register', [AuthController::class, 'register'])->name('register');

    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('showLoginForm');
    Route::post('/login', [AuthController::class, 'login'])->name('login');
});

// AUTHENTICATED ROUTES (FOR LOGGED-IN USERS)
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [AuthController::class, 'showDashboardPage'])->name('showDashboardPage');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Profile routes
    Route::get('/profile/create', [ProfileController::class, 'showProfileForm'])->name('profile.create');
    Route::post('/profile', [ProfileController::class, 'store'])->name('profile.store');
});
