<?php

namespace App\Repositories;

use App\Interfaces\OfferRepositoryInterface;
use App\Models\Offer;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection as EloquentCollection;
use Illuminate\Support\Collection;

class OfferRepository implements OfferRepositoryInterface
{
    public function __construct(protected Offer $model)
    {
    }

    public function all(): EloquentCollection
    {
        return $this->model->orderBy('title')->get();
    }

    public function paginate(int $perPage = 20, array $filters = []): LengthAwarePaginator
    {
        $query = $this->model->with('advertiser')->latest();

        if (! empty($filters['status'])) {
            $query->where('status', $filters['status']);
        }

        if (! empty($filters['advertiser_id'])) {
            $query->where('advertiser_id', $filters['advertiser_id']);
        }

        if (! empty($filters['search'])) {
            $query->where('title', 'like', '%'.$filters['search'].'%');
        }

        return $query->paginate($perPage);
    }

    /**
     * Public homepage listing: active + within-window offers only, with
     * optional category/search filters. Kept separate from paginate()
     * above (the admin listing, which intentionally shows every status).
     */
    public function publicPaginate(int $perPage = 9, array $filters = []): LengthAwarePaginator
    {
        $query = $this->model->active()->with('advertiser')->latest();

        if (! empty($filters['category'])) {
            $query->where('category', $filters['category']);
        }

        if (! empty($filters['search'])) {
            $query->where('title', 'like', '%'.$filters['search'].'%');
        }

        return $query->paginate($perPage)->withQueryString();
    }

    public function find(int $id): ?Offer
    {
        return $this->model->with(['advertiser', 'screens'])->find($id);
    }

    public function findActive(int $id): ?Offer
    {
        return $this->model->active()->find($id);
    }

    public function create(array $data): Offer
    {
        return $this->model->create($data);
    }

    public function update(Offer $offer, array $data): Offer
    {
        $offer->update($data);

        return $offer->refresh();
    }

    public function delete(Offer $offer): bool
    {
        return (bool) $offer->delete();
    }

    public function forScreen(int $screenId): EloquentCollection
    {
        return $this->model->active()
            ->whereHas('screens', fn ($q) => $q->where('screens.id', $screenId))
            ->with('advertiser')
            ->get();
    }

    public function performance(?string $from = null, ?string $to = null): Collection
    {
        $query = $this->model->with('advertiser')->withCount('claims');

        return $query->get()->map(function (Offer $offer) {
            return [
                'id' => $offer->id,
                'title' => $offer->title,
                'advertiser' => $offer->advertiser?->name,
                'claims_count' => $offer->claims_count,
                'redemptions_count' => $offer->redemptions_count,
                'conversion_rate' => $offer->conversionRate(),
            ];
        });
    }
}
