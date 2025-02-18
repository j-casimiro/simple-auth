<?php

namespace App\Policies;

use App\Models\Profile;
use App\Models\User;

class ProfilePolicy
{
  /**
   * Determine whether the user can view any profiles.
   */
  public function viewAny(User $user): bool
  {
    return $user->role === 'admin';
  }

  /**
   * Determine whether the user can view the profile.
   */
  public function view(User $user, Profile $profile): bool
  {
    return $user->id === $profile->user_id || $user->role === 'admin';
  }

  /**
   * Determine whether the user can create a profile.
   */
  public function create(User $user): bool
  {
    return !$user->profile()->exists();
  }

  /**
   * Determine whether the user can update the profile.
   */
  public function update(User $user, Profile $profile): bool
  {
    return $user->id === $profile->user_id || $user->role === 'admin';
  }

  /**
   * Determine whether the user can delete the profile.
   */
  public function delete(User $user, Profile $profile): bool
  {
    return $user->id === $profile->user_id || $user->role === 'admin';
  }
}
