<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Screen;

/**
 * Simple role-gate policy: any authenticated + active admin user may manage
 * Screens; only super_admin may delete. Extend with per-advertiser scoping
 * later if multi-tenant admin accounts are introduced.
 */
class ScreenPolicy
{
    public function viewAny(User $user): bool
    {
        return $user->is_active;
    }

    public function view(User $user, Screen $model): bool
    {
        return $user->is_active;
    }

    public function create(User $user): bool
    {
        return $user->is_active;
    }

    public function update(User $user, Screen $model): bool
    {
        return $user->is_active;
    }

    public function delete(User $user, Screen $model): bool
    {
        return $user->is_active && $user->isSuperAdmin();
    }
}
