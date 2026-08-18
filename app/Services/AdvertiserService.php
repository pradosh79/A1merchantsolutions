<?php

namespace App\Services;

use App\Interfaces\AdvertiserRepositoryInterface;
use App\Models\Advertiser;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AdvertiserService
{
    public function __construct(protected AdvertiserRepositoryInterface $advertisers)
    {
    }

    public function paginate(int $perPage = 20): LengthAwarePaginator
    {
        return $this->advertisers->paginate($perPage);
    }

    public function find(int $id): ?Advertiser
    {
        return $this->advertisers->find($id);
    }

    public function create(array $data, ?UploadedFile $logo = null): Advertiser
    {
        unset($data['logo']);

        if ($logo) {
            $data['logo_path'] = $logo->store('advertisers', 'public');
        }

        return $this->advertisers->create($data);
    }

    public function update(Advertiser $advertiser, array $data, ?UploadedFile $logo = null): Advertiser
    {
        unset($data['logo']);

        if ($logo) {
            if ($advertiser->logo_path) {
                Storage::disk('public')->delete($advertiser->logo_path);
            }
            $data['logo_path'] = $logo->store('advertisers', 'public');
        }

        return $this->advertisers->update($advertiser, $data);
    }

    public function delete(Advertiser $advertiser): bool
    {
        return $this->advertisers->delete($advertiser);
    }

    public function rotateRedemptionToken(Advertiser $advertiser): Advertiser
    {
        return $this->advertisers->update($advertiser, [
            'redemption_token' => Str::random(config('coupon.merchant_token_length', 40)),
            'redemption_token_rotated_at' => now(),
        ]);
    }

    public function topByClaims(int $limit = 5, ?string $from = null, ?string $to = null): Collection
    {
        return $this->advertisers->topByClaims($limit, $from, $to);
    }
}
