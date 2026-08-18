@extends('layouts.app')
@section('title', $offer->title)
@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="mb-0">{{ $offer->title }}</h2>
        <a href="{{ route('admin.offers.edit', $offer) }}" class="btn btn-outline-primary">Edit</a>
    </div>
    <div class="row g-3">
        <div class="col-md-4">
            <div class="card">
                <img src="{{ $offer->imageUrl() ?? 'https://placehold.co/400x250?text=Offer+Image' }}" class="card-img-top" alt="{{ $offer->title }}">
                <div class="card-body">
                    <p><strong>Advertiser:</strong> {{ $offer->advertiser->name }}</p>
                    <p><strong>Category:</strong> {{ $offer->categoryLabel() ?? '—' }}</p>
                    <p><strong>Status:</strong> <span class="badge bg-{{ $offer->status->badgeClass() }}">{{ $offer->status->label() }}</span></p>
                    <p><strong>Claims:</strong> {{ $offer->claims_count }} @if($offer->max_claims) / {{ $offer->max_claims }} @endif</p>
                    <p><strong>Redemptions:</strong> {{ $offer->redemptions_count }} ({{ $offer->conversionRate() }}%)</p>
                    <p><strong>Window:</strong> {{ optional($offer->starts_at)->format('M j, Y') ?? '—' }} &rarr; {{ optional($offer->ends_at)->format('M j, Y') ?? '—' }}</p>
                    <p><strong>Public link:</strong><br><code class="small">{{ url('/o/'.$offer->uuid) }}</code></p>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Recent Claims</div>
                <div class="table-responsive">
                    <table class="table table-sm mb-0">
                        <thead><tr><th>Name</th><th>Email</th><th>Status</th><th>Claimed</th></tr></thead>
                        <tbody>
                            @forelse ($offer->claims as $claim)
                                <tr>
                                    <td>{{ $claim->name }}</td>
                                    <td>{{ $claim->email }}</td>
                                    <td><span class="badge bg-{{ $claim->status->badgeClass() }}">{{ $claim->status->label() }}</span></td>
                                    <td>{{ $claim->created_at->diffForHumans() }}</td>
                                </tr>
                            @empty
                                <tr><td colspan="4" class="text-muted">No claims yet.</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
