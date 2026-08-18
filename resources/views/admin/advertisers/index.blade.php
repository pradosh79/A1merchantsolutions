@extends('layouts.app')
@section('title', 'Advertisers')
@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="mb-0">Advertisers</h2>
        <a href="{{ route('admin.advertisers.create') }}" class="btn btn-primary"><i class="bi bi-plus-lg"></i> New Advertiser</a>
    </div>

    <div class="card">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th>Name</th><th>Contact Email</th><th>Status</th><th>Offers</th><th></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($advertisers as $advertiser)
                        <tr>
                            <td>{{ $advertiser->name }}</td>
                            <td>{{ $advertiser->contact_email }}</td>
                            <td><span class="badge bg-{{ $advertiser->status->badgeClass() }}">{{ $advertiser->status->label() }}</span></td>
                            <td>{{ $advertiser->offers_count }}</td>
                            <td class="text-end">
                                <a href="{{ route('admin.advertisers.show', $advertiser) }}" class="btn btn-sm btn-outline-secondary"><i class="bi bi-eye"></i></a>
                                <a href="{{ route('admin.advertisers.edit', $advertiser) }}" class="btn btn-sm btn-outline-primary"><i class="bi bi-pencil"></i></a>
                                <form action="{{ route('admin.advertisers.destroy', $advertiser) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete “{{ $advertiser->name }}”? This also deletes its offers and claims and cannot be undone.');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="5" class="text-center text-muted py-4">No advertisers yet.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="mt-3">{{ $advertisers->links() }}</div>
@endsection
