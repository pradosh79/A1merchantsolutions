<?php

namespace App\Services;

use App\Events\ScreenViewed;
use App\Interfaces\ScreenRepositoryInterface;
use App\Models\Screen;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;

class ScreenService
{
    public function __construct(protected ScreenRepositoryInterface $screens)
    {
    }

    public function paginate(int $perPage = 20): LengthAwarePaginator
    {
        return $this->screens->paginate($perPage);
    }

    public function all(): Collection
    {
        return $this->screens->all();
    }

    public function find(int $id): ?Screen
    {
        return $this->screens->find($id);
    }

    public function findByCode(string $code): ?Screen
    {
        return $this->screens->findByCode($code);
    }

    public function create(array $data): Screen
    {
        return $this->screens->create($data);
    }

    public function update(Screen $screen, array $data): Screen
    {
        return $this->screens->update($screen, $data);
    }

    public function delete(Screen $screen): bool
    {
        return $this->screens->delete($screen);
    }

    public function recordView(Screen $screen, ?string $ip, ?string $ua): void
    {
        $screen->update(['last_ping_at' => now()]);

        ScreenViewed::dispatch($screen, $ip, $ua);
    }
}
