@extends('layouts.public')
@section('title', $offer->title)
@section('content')
<div class="container py-4">
    <div class="row g-4">
        <div class="col-md-6">
            <div class="card shadow-sm">
                <img src="{{ $offer->imageUrl() ?? 'https://placehold.co/500x350?text=Offer+Image' }}" class="card-img-top" alt="{{ $offer->title }}">
                <div class="card-body">
                    <h2 class="h4">{{ $offer->title }}</h2>
                    <p class="text-muted">By {{ $offer->advertiser->name ?? '' }}</p>
                    <p>{{ $offer->description }}</p>
                    @if ($offer->terms)
                        <p class="small text-muted"><strong>Terms:</strong> {{ $offer->terms }}</p>
                    @endif
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-header">Claim this offer</div>
                <div class="card-body">
                    @if (!$offer->isClaimable())
                        <div class="alert alert-warning">This offer is not currently available for claiming.</div>
                    @else
                        <form method="POST" action="{{ route('public.claim') }}">
                            @csrf
                            <input type="hidden" name="offer_id" value="{{ $offer->id }}">
                            <input type="hidden" name="screen_id" value="{{ $screen->id ?? '' }}">

                            <div class="mb-3">
                                <label class="form-label">Full Name</label>
                                <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Email (your coupon will be sent here)</label>
                                <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Phone (optional)</label>
                                <input type="text" name="phone" class="form-control" value="{{ old('phone') }}">
                            </div>
                            <button type="submit" class="btn btn-brand-orange w-100">Get Coupon</button>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
