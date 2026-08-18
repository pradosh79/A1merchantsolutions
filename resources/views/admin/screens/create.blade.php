@extends('layouts.app')
@section('title', 'New Screen')
@section('content')
    <h2 class="mb-4">New Screen</h2>
    <div class="card"><div class="card-body">
        <form method="POST" action="{{ route('admin.screens.store') }}">
            @csrf
            @include('admin.screens._form', ['screen' => null])
            <button type="submit" class="btn btn-primary">Create Screen</button>
            <a href="{{ route('admin.screens.index') }}" class="btn btn-outline-secondary">Cancel</a>
        </form>
    </div></div>
@endsection
