<?php

namespace App\Services;

use App\Events\OfferInteracted;
use App\Interfaces\OfferRepositoryInterface;
use App\Models\Offer;
use App\Models\Screen;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection as EloquentCollection;
use Illuminate\Support\Collection;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class OfferService
{
    public function __construct(protected OfferRepositoryInterface $offers)
    {
    }

    public function paginate(int $perPage = 20, array $filters = []): LengthAwarePaginator
    {
        return $this->offers->paginate($perPage, $filters);
    }

    /** Active offers for the public homepage, optionally filtered by category/search. */
    public function publicPaginate(int $perPage = 9, array $filters = []): LengthAwarePaginator
    {
        return $this->offers->publicPaginate($perPage, $filters);
    }

    public function find(int $id): ?Offer
    {
        return $this->offers->find($id);
    }

    public function create(array $data, ?UploadedFile $image = null): Offer
    {
        unset($data['image']);

        if ($image) {
            $data['image_path'] = $image->store('offers', 'public');
        }

        $screenIds = $data['screen_ids'] ?? [];
        unset($data['screen_ids']);

        $offer = $this->offers->create($data);

        if (! empty($screenIds)) {
            $offer->screens()->sync($screenIds);
        }

        return $offer;
    }

    public function update(Offer $offer, array $data, ?UploadedFile $image = null): Offer
    {
        unset($data['image']);

        if ($image) {
            if ($offer->image_path) {
                Storage::disk('public')->delete($offer->image_path);
            }
            $data['image_path'] = $image->store('offers', 'public');
        }

        $screenIds = $data['screen_ids'] ?? null;
        unset($data['screen_ids']);

        $offer = $this->offers->update($offer, $data);

        if ($screenIds !== null) {
            $offer->screens()->sync($screenIds);
        }

        return $offer;
    }

    public function delete(Offer $offer): bool
    {
        if ($offer->image_path) {
            Storage::disk('public')->delete($offer->image_path);
        }

        return $this->offers->delete($offer);
    }

    public function forScreen(Screen $screen): EloquentCollection
    {
        return $this->offers->forScreen($screen->id);
    }

    public function recordInteraction(Offer $offer, ?Screen $screen, string $interaction, ?string $ip, ?string $ua): void
    {
        OfferInteracted::dispatch($offer, $screen, $interaction, $ip, $ua);
    }

    public function performance(?string $from = null, ?string $to = null): Collection
    {
        return $this->offers->performance($from, $to);
    }
}
