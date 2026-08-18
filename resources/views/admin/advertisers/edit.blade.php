@extends('layouts.app')
@section('title', 'Edit Advertiser')
@section('content')
    <h2 class="mb-4">Edit Advertiser</h2>
    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ route('admin.advertisers.update', $advertiser) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                @include('admin.advertisers._form', ['advertiser' => $advertiser])
                <button type="submit" class="btn btn-primary">Update Advertiser</button>
                <a href="{{ route('admin.advertisers.show', $advertiser) }}" class="btn btn-outline-secondary">Cancel</a>
            </form>
        </div>
    </div>
@endsection
