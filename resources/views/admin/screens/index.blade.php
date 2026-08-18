@extends('layouts.app')
@section('title', 'Screens')
@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="mb-0">Screens</h2>
        <a href="{{ route('admin.screens.create') }}" class="btn btn-primary"><i class="bi bi-plus-lg"></i> New Screen</a>
    </div>
    <div class="card">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr><th>Name</th><th>Code</th><th>Location</th><th>Status</th><th>Claims</th><th></th></tr>
                </thead>
                <tbody>
                    @forelse ($screens as $screen)
                        <tr>
                            <td>{{ $screen->name }}</td>
                            <td><code>{{ $screen->code }}</code></td>
                            <td>{{ $screen->location ?? '—' }}</td>
                            <td><span class="badge bg-{{ $screen->status->badgeClass() }}">{{ $screen->status->label() }}</span></td>
                            <td>{{ $screen->claims_count }}</td>
                            <td class="text-end">
                                <a href="{{ route('admin.screens.show', $screen) }}" class="btn btn-sm btn-outline-secondary"><i class="bi bi-eye"></i></a>
                                <a href="{{ route('admin.screens.edit', $screen) }}" class="btn btn-sm btn-outline-primary"><i class="bi bi-pencil"></i></a>
                                <form action="{{ route('admin.screens.destroy', $screen) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete “{{ $screen->name }}”? Claims from this screen will be kept but unlinked. This cannot be undone.');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="6" class="text-center text-muted py-4">No screens yet.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    <div class="mt-3">{{ $screens->links() }}</div>
@endsection
