@extends('layouts.app')
@section('title', 'Offers')
@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="mb-0">Offers</h2>
        <a href="{{ route('admin.offers.create') }}" class="btn btn-primary"><i class="bi bi-plus-lg"></i> New Offer</a>
    </div>
    <div class="card">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr><th>Title</th><th>Advertiser</th><th>Status</th><th>Claims</th><th>Redemptions</th><th></th></tr>
                </thead>
                <tbody>
                    @forelse ($offers as $offer)
                        <tr>
                            <td>{{ $offer->title }}</td>
                            <td>{{ $offer->advertiser->name }}</td>
                            <td><span class="badge bg-{{ $offer->status->badgeClass() }}">{{ $offer->status->label() }}</span></td>
                            <td>{{ $offer->claims_count }}@if($offer->max_claims) / {{ $offer->max_claims }}@endif</td>
                            <td>{{ $offer->redemptions_count }}</td>
                            <td class="text-end">
                                <a href="{{ route('admin.offers.show', $offer) }}" class="btn btn-sm btn-outline-secondary"><i class="bi bi-eye"></i></a>
                                <a href="{{ route('admin.offers.edit', $offer) }}" class="btn btn-sm btn-outline-primary"><i class="bi bi-pencil"></i></a>
                                <form action="{{ route('admin.offers.destroy', $offer) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete “{{ $offer->title }}”? This also deletes its claims and cannot be undone.');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="6" class="text-center text-muted py-4">No offers yet.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    <div class="mt-3">{{ $offers->links() }}</div>
@endsection
