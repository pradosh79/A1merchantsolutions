@extends('layouts.app')
@section('title', $advertiser->name)
@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="mb-0">{{ $advertiser->name }}</h2>
        <div>
            <a href="{{ route('admin.advertisers.edit', $advertiser) }}" class="btn btn-outline-primary">Edit</a>
            <form action="{{ route('admin.advertisers.rotate-token', $advertiser) }}" method="POST" class="d-inline" onsubmit="return confirm('Rotate the merchant redemption link? The old QR/link will stop working.');">
                @csrf
                <button class="btn btn-outline-warning">Rotate Redemption Token</button>
            </form>
        </div>
    </div>

    <div class="row g-3">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <p><strong>Status:</strong> <span class="badge bg-{{ $advertiser->status->badgeClass() }}">{{ $advertiser->status->label() }}</span></p>
                    <p><strong>Email:</strong> {{ $advertiser->contact_email }}</p>
                    <p><strong>Phone:</strong> {{ $advertiser->contact_phone ?? '—' }}</p>
                    <p><strong>Merchant Redemption URL:</strong><br>
                        <code class="small">{{ url('/r/'.$advertiser->redemption_token) }}</code>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Recent Offers</div>
                <ul class="list-group list-group-flush">
                    @forelse ($advertiser->offers as $offer)
                        <li class="list-group-item d-flex justify-content-between">
                            <a href="{{ route('admin.offers.show', $offer) }}">{{ $offer->title }}</a>
                            <span class="badge bg-{{ $offer->status->badgeClass() }}">{{ $offer->status->label() }}</span>
                        </li>
                    @empty
                        <li class="list-group-item text-muted">No offers yet.</li>
                    @endforelse
                </ul>
            </div>
        </div>
    </div>
@endsection
