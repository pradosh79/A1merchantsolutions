@extends('layouts.app')
@section('title', 'Claims')
@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="mb-0">Claims</h2>
        <a href="{{ route('admin.claims.export', request()->query()) }}" class="btn btn-outline-success">
            <i class="bi bi-download"></i> Export CSV
        </a>
    </div>

    <form method="GET" class="row g-2 mb-3">
        <div class="col-auto">
            <input type="text" name="search" class="form-control" placeholder="Search name/email/code" value="{{ $filters['search'] ?? '' }}">
        </div>
        <div class="col-auto">
            <select name="status" class="form-select">
                <option value="">All statuses</option>
                @foreach (\App\Enums\ClaimStatus::options() as $opt)
                    <option value="{{ $opt['value'] }}" @selected(($filters['status'] ?? '') === $opt['value'])>{{ $opt['label'] }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-auto"><input type="date" name="from" class="form-control" value="{{ $filters['from'] ?? '' }}"></div>
        <div class="col-auto"><input type="date" name="to" class="form-control" value="{{ $filters['to'] ?? '' }}"></div>
        <div class="col-auto"><button class="btn btn-primary">Filter</button></div>
    </form>

    <div class="card">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr><th>Name</th><th>Email</th><th>Offer</th><th>Screen</th><th>Status</th><th>Claimed</th><th></th></tr>
                </thead>
                <tbody>
                    @forelse ($claims as $claim)
                        <tr>
                            <td>{{ $claim->name }}</td>
                            <td>{{ $claim->email }}</td>
                            <td>{{ $claim->offer->title }}</td>
                            <td>{{ $claim->screen->name ?? '—' }}</td>
                            <td><span class="badge bg-{{ $claim->status->badgeClass() }}">{{ $claim->status->label() }}</span></td>
                            <td>{{ $claim->created_at->diffForHumans() }}</td>
                            <td class="text-end"><a href="{{ route('admin.claims.show', $claim) }}" class="btn btn-sm btn-outline-secondary"><i class="bi bi-eye"></i></a></td>
                        </tr>
                    @empty
                        <tr><td colspan="7" class="text-center text-muted py-4">No claims found.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    <div class="mt-3">{{ $claims->links() }}</div>
@endsection
