@extends('layouts.app')
@section('title', 'Edit Offer')
@section('content')
    <h2 class="mb-4">Edit Offer</h2>
    <div class="card"><div class="card-body">
        <form method="POST" action="{{ route('admin.offers.update', $offer) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            @include('admin.offers._form', ['offer' => $offer])
            <button type="submit" class="btn btn-primary">Update Offer</button>
            <a href="{{ route('admin.offers.show', $offer) }}" class="btn btn-outline-secondary">Cancel</a>
        </form>
    </div></div>
@endsection
