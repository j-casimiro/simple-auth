<?php

namespace App\Providers;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Policies\ProfilePolicy;

class AuthServiceProvider extends ServiceProvider
{
  protected $policies = [
    Profile::class => ProfilePolicy::class,
  ];

  public function boot(): void
  {
    $this->registerPolicies();

    Gate::define('view-any-profile', function (User $user) {
      return $user->role === 'admin';
    });

    Gate::define('view-profile', function (User $user, Profile $profile) {
      return $user->id === $profile->user_id || $user->role === 'admin';
    });

    Gate::define('create-profile', function (User $user) {
      return !$user->profile()->exists();
    });

    Gate::define('update-profile', function (User $user, Profile $profile) {
      return $user->id === $profile->user_id || $user->role === 'admin';
    });

    Gate::define('delete-profile', function (User $user, Profile $profile) {
      return $user->id === $profile->user_id || $user->role === 'admin';
    });
  }
}
