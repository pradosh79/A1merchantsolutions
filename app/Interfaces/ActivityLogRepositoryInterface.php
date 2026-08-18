<?php

namespace App\Interfaces;

use App\Models\ActivityLog;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface ActivityLogRepositoryInterface
{
    public function log(string $type, array $attributes = []): ActivityLog;

    public function paginateByType(array $types, int $perPage = 25): LengthAwarePaginator;

    public function countByType(string $type, ?string $from = null, ?string $to = null): int;

    public function dailySeries(string $type, int $days = 14): array;
}
