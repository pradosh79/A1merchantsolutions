@extends('layouts.app')
@section('title', 'Homepage Settings')
@section('content')
    <h2 class="mb-1">Homepage Settings</h2>
    <p class="text-muted">Replace the hero banner and category icons shown on the public homepage &mdash; no code changes needed.</p>

    <form method="POST" action="{{ route('admin.homepage-settings.update') }}" enctype="multipart/form-data" class="homepage-design">
        @csrf

        <div class="card mb-4">
            <div class="card-header">Hero Banner Image</div>
            <div class="card-body">
                <div class="row align-items-center g-3">
                    <div class="col-md-6">
                        <img src="{{ $heroImageUrl }}" alt="Current hero image" class="img-fluid rounded border" style="max-height:220px; object-fit:cover;">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Replace hero image</label>
                        <input type="file" name="hero_image" class="form-control" accept="image/*">
                        <div class="form-text">Shown on the right side of the homepage hero section. Recommended: wide image (e.g. 1600&times;900), orange/brand-colored background works best.</div>
                        @error('hero_image') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header">Category Icons</div>
            <div class="card-body">
                <p class="text-muted small">Each category pill on the homepage shows this icon. Leave blank to keep the current icon (falls back to a default icon if none has ever been uploaded).</p>
                <div class="row g-3">
                    @foreach ($categories as $cat)
                        <div class="col-md-3 col-sm-6">
                            <div class="border rounded p-3 text-center h-100">
                                <div class="mb-2" style="height:48px;">
                                    @if ($cat['icon_url'])
                                        <img src="{{ $cat['icon_url'] }}" alt="{{ $cat['label'] }}" style="height:40px;">
                                    @else
                                        <i class="bi {{ $cat['icon'] }}" style="font-size:2rem;"></i>
                                    @endif
                                </div>
                                <div class="fw-semibold small mb-2">{{ $cat['label'] }}</div>
                                <input type="file" name="category_icons[{{ $cat['value'] }}]" class="form-control form-control-sm" accept="image/*">
                                @error("category_icons.{$cat['value']}") <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                                @if ($cat['icon_url'])
                                    <div class="form-check mt-2">
                                        <input class="form-check-input" type="checkbox" value="1" name="remove_category_icon[{{ $cat['value'] }}]" id="remove{{ $cat['value'] }}">
                                        <label class="form-check-label small text-danger" for="remove{{ $cat['value'] }}">Remove custom icon</label>
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary mt-4">Save Changes</button>
    </form>
@endsection
