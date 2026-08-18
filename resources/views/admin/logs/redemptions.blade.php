@extends('layouts.app')
@section('title', 'Redemption Logs')
@section('content')
    <h2 class="mb-4">Redemption Logs</h2>
    <div class="card">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light"><tr><th>Type</th><th>Advertiser</th><th>Submitted Code</th><th>IP</th><th>When</th></tr></thead>
                <tbody>
                    @forelse ($logs as $log)
                        <tr>
                            <td>
                                @php $badge = $log->type->value === 'redemption_success' ? 'success' : 'danger'; @endphp
                                <span class="badge bg-{{ $badge }}">{{ $log->type->label() }}</span>
                            </td>
                            <td>{{ $log->advertiser?->name ?? '—' }}</td>
                            <td><code>{{ $log->meta['submitted_code'] ?? '—' }}</code></td>
                            <td>{{ $log->ip_address ?? '—' }}</td>
                            <td>{{ $log->created_at?->diffForHumans() }}</td>
                        </tr>
                    @empty
                        <tr><td colspan="5" class="text-center text-muted py-4">No redemption activity yet.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    <div class="mt-3">{{ $logs->links() }}</div>
@endsection
