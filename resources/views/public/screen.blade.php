@extends('layouts.public')
@section('title', $screen->name)
@section('content')
<div class="container py-4">
    <div class="text-center mb-4">
        <h1 class="h3">{{ $screen->name }}</h1>
        <p class="text-muted">Scan complete &mdash; here's what's on offer near you.</p>
    </div>

    <div class="row g-4">
        @forelse ($offers as $offer)
            <div class="col-sm-6 col-lg-4">
                <div class="card h-100 shadow-sm">
                    <img src="{{ $offer->imageUrl() ?? 'https://placehold.co/400x220?text=Offer' }}" class="card-img-top" alt="{{ $offer->title }}">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{ $offer->title }}</h5>
                        <p class="card-text text-muted small flex-grow-1">{{ \Illuminate\Support\Str::limit($offer->description, 100) }}</p>
                        <p class="small text-secondary mb-2">By {{ $offer->advertiser->name ?? '' }}</p>
                        <a href="{{ route('public.offer', ['offer' => $offer->uuid, 'screen' => $screen->code]) }}" class="btn btn-primary mt-auto">View Offer</a>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-secondary text-center">No active offers on this screen right now. Check back soon!</div>
            </div>
        @endforelse
    </div>
</div>
@endsection
