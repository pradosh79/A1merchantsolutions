<?php

namespace App\Repositories;

use App\Interfaces\ClaimRepositoryInterface;
use App\Models\Claim;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Carbon;

class ClaimRepository implements ClaimRepositoryInterface
{
    public function __construct(protected Claim $model)
    {
    }

    public function paginate(int $perPage = 20, array $filters = []): LengthAwarePaginator
    {
        $query = $this->model->with(['offer.advertiser', 'screen'])->latest();

        if (! empty($filters['status'])) {
            $query->where('status', $filters['status']);
        }

        if (! empty($filters['offer_id'])) {
            $query->where('offer_id', $filters['offer_id']);
        }

        if (! empty($filters['from'])) {
            $query->whereDate('created_at', '>=', $filters['from']);
        }

        if (! empty($filters['to'])) {
            $query->whereDate('created_at', '<=', $filters['to']);
        }

        if (! empty($filters['search'])) {
            $query->where(function ($q) use ($filters) {
                $q->where('email', 'like', '%'.$filters['search'].'%')
                    ->orWhere('name', 'like', '%'.$filters['search'].'%')
                    ->orWhere('coupon_code', 'like', '%'.$filters['search'].'%');
            });
        }

        return $query->paginate($perPage);
    }

    public function find(int $id): ?Claim
    {
        return $this->model->with(['offer.advertiser', 'screen'])->find($id);
    }

    public function findByUuid(string $uuid): ?Claim
    {
        return $this->model->with(['offer.advertiser', 'screen'])->where('uuid', $uuid)->first();
    }

    public function findByCouponCode(string $code): ?Claim
    {
        // Note: `coupon_code` is in Claim::$hidden, but that only affects
        // array/JSON serialization - querying and direct attribute access
        // both work normally here.
        return $this->model->with(['offer.advertiser'])
            ->where('coupon_code', strtoupper(trim($code)))
            ->first();
    }

    public function create(array $data): Claim
    {
        return $this->model->create($data);
    }

    public function update(Claim $claim, array $data): Claim
    {
        $claim->update($data);

        return $claim->refresh();
    }

    public function existingClaim(int $offerId, string $email, int $windowHours): ?Claim
    {
        return $this->model
            ->where('offer_id', $offerId)
            ->where('email', $email)
            ->where('created_at', '>=', Carbon::now()->subHours($windowHours))
            ->first();
    }

    public function countToday(): int
    {
        return $this->model->whereDate('created_at', Carbon::today())->count();
    }

    public function countRedeemedToday(): int
    {
        return $this->model->whereDate('redeemed_at', Carbon::today())->count();
    }

    public function forExport(array $filters = []): Collection
    {
        $query = $this->model->with(['offer.advertiser', 'screen']);

        if (! empty($filters['from'])) {
            $query->whereDate('created_at', '>=', $filters['from']);
        }

        if (! empty($filters['to'])) {
            $query->whereDate('created_at', '<=', $filters['to']);
        }

        if (! empty($filters['status'])) {
            $query->where('status', $filters['status']);
        }

        return $query->get();
    }
}
