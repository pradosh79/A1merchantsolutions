<?php

namespace App\Interfaces;

use App\Models\Offer;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection as EloquentCollection;
use Illuminate\Support\Collection;

interface OfferRepositoryInterface
{
    public function all(): EloquentCollection;

    public function paginate(int $perPage = 20, array $filters = []): LengthAwarePaginator;

    public function publicPaginate(int $perPage = 9, array $filters = []): LengthAwarePaginator;

    public function find(int $id): ?Offer;

    public function findActive(int $id): ?Offer;

    public function create(array $data): Offer;

    public function update(Offer $offer, array $data): Offer;

    public function delete(Offer $offer): bool;

    public function forScreen(int $screenId): EloquentCollection;

    public function performance(?string $from = null, ?string $to = null): Collection;
}
