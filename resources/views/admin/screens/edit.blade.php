@extends('layouts.app')
@section('title', 'Edit Screen')
@section('content')
    <h2 class="mb-4">Edit Screen</h2>
    <div class="card"><div class="card-body">
        <form method="POST" action="{{ route('admin.screens.update', $screen) }}">
            @csrf
            @method('PUT')
            @include('admin.screens._form', ['screen' => $screen])
            <button type="submit" class="btn btn-primary">Update Screen</button>
            <a href="{{ route('admin.screens.show', $screen) }}" class="btn btn-outline-secondary">Cancel</a>
        </form>
    </div></div>
@endsection
