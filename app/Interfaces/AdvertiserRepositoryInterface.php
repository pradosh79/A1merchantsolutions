<?php

namespace App\Interfaces;

use App\Models\Advertiser;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;

interface AdvertiserRepositoryInterface
{
    public function all(): Collection;

    public function paginate(int $perPage = 20): LengthAwarePaginator;

    public function find(int $id): ?Advertiser;

    public function findByToken(string $token): ?Advertiser;

    public function create(array $data): Advertiser;

    public function update(Advertiser $advertiser, array $data): Advertiser;

    public function delete(Advertiser $advertiser): bool;

    public function topByClaims(int $limit = 5, ?string $from = null, ?string $to = null): Collection;
}
