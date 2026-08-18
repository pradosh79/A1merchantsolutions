<?php

namespace App\Repositories;

use App\Interfaces\AdvertiserRepositoryInterface;
use App\Models\Advertiser;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;

class AdvertiserRepository implements AdvertiserRepositoryInterface
{
    public function __construct(protected Advertiser $model)
    {
    }

    public function all(): Collection
    {
        return $this->model->orderBy('name')->get();
    }

    public function paginate(int $perPage = 20): LengthAwarePaginator
    {
        return $this->model->withCount('offers')->latest()->paginate($perPage);
    }

    public function find(int $id): ?Advertiser
    {
        return $this->model->find($id);
    }

    public function findByToken(string $token): ?Advertiser
    {
        return $this->model->where('redemption_token', $token)->first();
    }

    public function create(array $data): Advertiser
    {
        return $this->model->create($data);
    }

    public function update(Advertiser $advertiser, array $data): Advertiser
    {
        $advertiser->update($data);

        return $advertiser->refresh();
    }

    public function delete(Advertiser $advertiser): bool
    {
        return (bool) $advertiser->delete();
    }

    public function topByClaims(int $limit = 5, ?string $from = null, ?string $to = null): Collection
    {
        return $this->model
            ->withCount(['offers as claims_count' => function ($query) use ($from, $to) {
                $query->join('claims', 'claims.offer_id', '=', 'offers.id');
                if ($from) {
                    $query->where('claims.created_at', '>=', $from);
                }
                if ($to) {
                    $query->where('claims.created_at', '<=', $to);
                }
            }])
            ->orderByDesc('claims_count')
            ->limit($limit)
            ->get();
    }
}
