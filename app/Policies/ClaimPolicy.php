<?php

namespace App\Policies;

use App\Models\Claim;
use App\Models\User;

class ClaimPolicy
{
    public function viewAny(User $user): bool
    {
        return $user->is_active;
    }

    public function view(User $user, Claim $claim): bool
    {
        return $user->is_active;
    }

    public function export(User $user): bool
    {
        return $user->is_active;
    }
}
