@extends('layouts.app')
@section('title', 'Claim #'.$claim->id)
@section('content')
    <h2 class="mb-4">Claim #{{ $claim->id }}</h2>
    <div class="row g-3">
        <div class="col-md-6">
            <div class="card"><div class="card-body">
                <p><strong>Name:</strong> {{ $claim->name }}</p>
                <p><strong>Email:</strong> {{ $claim->email }}</p>
                <p><strong>Phone:</strong> {{ $claim->phone ?? '—' }}</p>
                <p><strong>Offer:</strong> {{ $claim->offer->title }} ({{ $claim->offer->advertiser->name }})</p>
                <p><strong>Screen:</strong> {{ $claim->screen->name ?? '—' }}</p>
                <p><strong>Status:</strong> <span class="badge bg-{{ $claim->status->badgeClass() }}">{{ $claim->status->label() }}</span></p>
                <p><strong>Coupon Code:</strong> <code>{{ $claim->getRawOriginal('coupon_code') }}</code></p>
                <p><strong>Claimed:</strong> {{ $claim->created_at }}</p>
                <p><strong>Expires:</strong> {{ $claim->expires_at }}</p>
                <p><strong>Redeemed:</strong> {{ $claim->redeemed_at ?? 'Not yet redeemed' }}</p>
            </div></div>
        </div>
        <div class="col-md-6">
            <div class="card"><div class="card-body text-center">
                @if ($claim->qr_code_path)
                    <p class="text-muted">QR Code</p>
                    <img src="{{ \Illuminate\Support\Facades\Storage::disk('public')->url($claim->qr_code_path) }}" style="max-width:220px" alt="Coupon QR">
                @else
                    <p class="text-muted">No QR generated.</p>
                @endif
            </div></div>
        </div>
    </div>
@endsection
