<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Advertiser;

/**
 * Simple role-gate policy: any authenticated + active admin user may manage
 * Advertisers; only super_admin may delete. Extend with per-advertiser scoping
 * later if multi-tenant admin accounts are introduced.
 */
class AdvertiserPolicy
{
    public function viewAny(User $user): bool
    {
        return $user->is_active;
    }

    public function view(User $user, Advertiser $model): bool
    {
        return $user->is_active;
    }

    public function create(User $user): bool
    {
        return $user->is_active;
    }

    public function update(User $user, Advertiser $model): bool
    {
        return $user->is_active;
    }

    public function delete(User $user, Advertiser $model): bool
    {
        return $user->is_active && $user->isSuperAdmin();
    }
}
