@extends('layouts.app')
@section('title', 'Coupon Logs')
@section('content')
    <h2 class="mb-4">Coupon Logs</h2>
    <div class="card">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light"><tr><th>Type</th><th>Offer</th><th>Advertiser</th><th>IP</th><th>When</th></tr></thead>
                <tbody>
                    @forelse ($logs as $log)
                        <tr>
                            <td><span class="badge bg-secondary">{{ $log->type->label() }}</span></td>
                            <td>{{ $log->offer?->title ?? '—' }}</td>
                            <td>{{ $log->advertiser?->name ?? '—' }}</td>
                            <td>{{ $log->ip_address ?? '—' }}</td>
                            <td>{{ $log->created_at?->diffForHumans() }}</td>
                        </tr>
                    @empty
                        <tr><td colspan="5" class="text-center text-muted py-4">No coupon activity yet.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    <div class="mt-3">{{ $logs->links() }}</div>
@endsection
