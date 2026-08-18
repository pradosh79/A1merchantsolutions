<?php

namespace App\Repositories;

use App\Interfaces\ScreenRepositoryInterface;
use App\Models\Screen;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;

class ScreenRepository implements ScreenRepositoryInterface
{
    public function __construct(protected Screen $model)
    {
    }

    public function all(): Collection
    {
        return $this->model->orderBy('name')->get();
    }

    public function paginate(int $perPage = 20): LengthAwarePaginator
    {
        return $this->model->withCount('claims')->latest()->paginate($perPage);
    }

    public function find(int $id): ?Screen
    {
        return $this->model->find($id);
    }

    public function findByCode(string $code): ?Screen
    {
        return $this->model->where('code', $code)->first();
    }

    public function create(array $data): Screen
    {
        return $this->model->create($data);
    }

    public function update(Screen $screen, array $data): Screen
    {
        $screen->update($data);

        return $screen->refresh();
    }

    public function delete(Screen $screen): bool
    {
        return (bool) $screen->delete();
    }

    public function active(): Collection
    {
        return $this->model->active()->orderBy('name')->get();
    }
}
