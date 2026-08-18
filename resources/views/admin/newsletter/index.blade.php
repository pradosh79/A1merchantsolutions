@extends('layouts.app')
@section('title', 'Newsletter')
@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="mb-0">Newsletter Subscribers</h2>
        <div class="d-flex gap-2">
            <a href="{{ route('admin.newsletter.compose') }}" class="btn btn-brand-orange"><i class="bi bi-envelope-paper"></i> Send Newsletter</a>
            <a href="{{ route('admin.newsletter.export', request()->query()) }}" class="btn btn-outline-success">
                <i class="bi bi-download"></i> Export CSV
            </a>
            <a href="{{ route('admin.newsletter.create') }}" class="btn btn-primary"><i class="bi bi-plus-lg"></i> Add Subscriber</a>
        </div>
    </div>

    <div class="row g-3 mb-3">
        <div class="col-sm-4"><div class="card"><div class="card-body py-2"><div class="text-muted small">Total</div><div class="h4 mb-0">{{ number_format($stats['total']) }}</div></div></div></div>
        <div class="col-sm-4"><div class="card"><div class="card-body py-2"><div class="text-muted small">Subscribed</div><div class="h4 mb-0 text-success">{{ number_format($stats['subscribed']) }}</div></div></div></div>
        <div class="col-sm-4"><div class="card"><div class="card-body py-2"><div class="text-muted small">Unsubscribed</div><div class="h4 mb-0 text-secondary">{{ number_format($stats['unsubscribed']) }}</div></div></div></div>
    </div>

    <form method="GET" class="row g-2 mb-3">
        <div class="col-auto">
            <input type="text" name="search" class="form-control" placeholder="Search email/source" value="{{ $filters['search'] ?? '' }}">
        </div>
        <div class="col-auto">
            <select name="status" class="form-select">
                <option value="">All statuses</option>
                <option value="subscribed" @selected(($filters['status'] ?? '') === 'subscribed')>Subscribed</option>
                <option value="unsubscribed" @selected(($filters['status'] ?? '') === 'unsubscribed')>Unsubscribed</option>
            </select>
        </div>
        <div class="col-auto"><button class="btn btn-primary">Filter</button></div>
        @if (($filters['search'] ?? null) || ($filters['status'] ?? null))
            <div class="col-auto"><a href="{{ route('admin.newsletter.index') }}" class="btn btn-outline-secondary">Clear</a></div>
        @endif
    </form>

    <div class="card">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr><th>Email</th><th>Source</th><th>Status</th><th>Added</th><th class="text-end">Actions</th></tr>
                </thead>
                <tbody>
                    @forelse ($subscribers as $subscriber)
                        <tr>
                            <td>{{ $subscriber->email }}</td>
                            <td>{{ $subscriber->source ?? '—' }}</td>
                            <td>
                                @if ($subscriber->unsubscribed_at)
                                    <span class="badge bg-secondary">Unsubscribed</span>
                                @else
                                    <span class="badge bg-success">Subscribed</span>
                                @endif
                            </td>
                            <td>{{ $subscriber->created_at?->diffForHumans() ?? '—' }}</td>
                            <td class="text-end">
                                <form action="{{ route('admin.newsletter.toggle', $subscriber) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="btn btn-sm btn-outline-{{ $subscriber->unsubscribed_at ? 'success' : 'warning' }}" title="{{ $subscriber->unsubscribed_at ? 'Re-subscribe' : 'Unsubscribe' }}">
                                        <i class="bi bi-{{ $subscriber->unsubscribed_at ? 'arrow-clockwise' : 'bell-slash' }}"></i>
                                    </button>
                                </form>
                                <a href="{{ route('admin.newsletter.edit', $subscriber) }}" class="btn btn-sm btn-outline-primary"><i class="bi bi-pencil"></i></a>
                                <form action="{{ route('admin.newsletter.destroy', $subscriber) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete {{ $subscriber->email }}? This cannot be undone.');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="5" class="text-center text-muted py-4">No subscribers found.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    <div class="mt-3">{{ $subscribers->links() }}</div>
@endsection
