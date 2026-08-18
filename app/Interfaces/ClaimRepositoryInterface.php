<?php

namespace App\Interfaces;

use App\Models\Claim;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;

interface ClaimRepositoryInterface
{
    public function paginate(int $perPage = 20, array $filters = []): LengthAwarePaginator;

    public function find(int $id): ?Claim;

    public function findByUuid(string $uuid): ?Claim;

    public function findByCouponCode(string $code): ?Claim;

    public function create(array $data): Claim;

    public function update(Claim $claim, array $data): Claim;

    public function existingClaim(int $offerId, string $email, int $windowHours): ?Claim;

    public function countToday(): int;

    public function countRedeemedToday(): int;

    public function forExport(array $filters = []): Collection;
}
