@extends('layouts.app')
@section('title', $screen->name)
@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="mb-0">{{ $screen->name }}</h2>
        <a href="{{ route('admin.screens.edit', $screen) }}" class="btn btn-outline-primary">Edit</a>
    </div>
    <div class="row g-3">
        <div class="col-md-4">
            <div class="card"><div class="card-body">
                <p><strong>Code:</strong> <code>{{ $screen->code }}</code></p>
                <p><strong>Status:</strong> <span class="badge bg-{{ $screen->status->badgeClass() }}">{{ $screen->status->label() }}</span></p>
                <p><strong>Location:</strong> {{ $screen->location ?? '—' }}</p>
                <p><strong>Public URL:</strong><br><code class="small">{{ url('/s/'.$screen->code) }}</code></p>
                <p><strong>Last Ping:</strong> {{ optional($screen->last_ping_at)->diffForHumans() ?? 'Never' }}</p>
            </div></div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Assigned Offers</div>
                <ul class="list-group list-group-flush">
                    @forelse ($screen->offers as $offer)
                        <li class="list-group-item">{{ $offer->title }}</li>
                    @empty
                        <li class="list-group-item text-muted">No offers assigned.</li>
                    @endforelse
                </ul>
            </div>
        </div>
    </div>
@endsection
