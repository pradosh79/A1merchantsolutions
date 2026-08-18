@extends('layouts.app')
@section('title', 'New Advertiser')
@section('content')
    <h2 class="mb-4">New Advertiser</h2>
    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ route('admin.advertisers.store') }}" enctype="multipart/form-data">
                @csrf
                @include('admin.advertisers._form', ['advertiser' => null])
                <button type="submit" class="btn btn-primary">Create Advertiser</button>
                <a href="{{ route('admin.advertisers.index') }}" class="btn btn-outline-secondary">Cancel</a>
            </form>
        </div>
    </div>
@endsection
