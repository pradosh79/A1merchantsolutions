<?php

namespace App\Interfaces;

use App\Models\Screen;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;

interface ScreenRepositoryInterface
{
    public function all(): Collection;

    public function paginate(int $perPage = 20): LengthAwarePaginator;

    public function find(int $id): ?Screen;

    public function findByCode(string $code): ?Screen;

    public function create(array $data): Screen;

    public function update(Screen $screen, array $data): Screen;

    public function delete(Screen $screen): bool;

    public function active(): Collection;
}
