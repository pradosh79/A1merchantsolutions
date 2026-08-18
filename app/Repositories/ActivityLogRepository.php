<?php

namespace App\Repositories;

use App\Interfaces\ActivityLogRepositoryInterface;
use App\Models\ActivityLog;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Carbon;

class ActivityLogRepository implements ActivityLogRepositoryInterface
{
    public function __construct(protected ActivityLog $model)
    {
    }

    public function log(string $type, array $attributes = []): ActivityLog
    {
        return $this->model->create(array_merge([
            'type' => $type,
            'created_at' => Carbon::now(),
        ], $attributes));
    }

    public function paginateByType(array $types, int $perPage = 25): LengthAwarePaginator
    {
        return $this->model
            ->whereIn('type', $types)
            ->with(['offer', 'advertiser', 'screen', 'claim'])
            ->latest('created_at')
            ->paginate($perPage);
    }

    public function countByType(string $type, ?string $from = null, ?string $to = null): int
    {
        $query = $this->model->where('type', $type);

        if ($from) {
            $query->where('created_at', '>=', $from);
        }

        if ($to) {
            $query->where('created_at', '<=', $to);
        }

        return $query->count();
    }

    public function dailySeries(string $type, int $days = 14): array
    {
        $from = Carbon::now()->subDays($days - 1)->startOfDay();

        $rows = $this->model
            ->selectRaw('DATE(created_at) as day, COUNT(*) as total')
            ->where('type', $type)
            ->where('created_at', '>=', $from)
            ->groupBy('day')
            ->orderBy('day')
            ->pluck('total', 'day');

        $series = [];
        for ($i = 0; $i < $days; $i++) {
            $day = $from->copy()->addDays($i)->toDateString();
            $series[$day] = (int) ($rows[$day] ?? 0);
        }

        return $series;
    }
}
