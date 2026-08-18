@extends('layouts.app')
@section('title', 'Add Subscriber')
@section('content')
    <h2 class="mb-3">Add Subscriber</h2>
    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ route('admin.newsletter.store') }}">
                @include('admin.newsletter._form')
                <button type="submit" class="btn btn-primary">Save</button>
                <a href="{{ route('admin.newsletter.index') }}" class="btn btn-outline-secondary">Cancel</a>
            </form>
        </div>
    </div>
@endsection
