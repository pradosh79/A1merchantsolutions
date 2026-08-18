@extends('layouts.app')
@section('title', 'New Offer')
@section('content')
    <h2 class="mb-4">New Offer</h2>
    <div class="card"><div class="card-body">
        <form method="POST" action="{{ route('admin.offers.store') }}" enctype="multipart/form-data">
            @csrf
            @include('admin.offers._form', ['offer' => null, 'selectedScreenIds' => []])
            <button type="submit" class="btn btn-primary">Create Offer</button>
            <a href="{{ route('admin.offers.index') }}" class="btn btn-outline-secondary">Cancel</a>
        </form>
    </div></div>
@endsection
