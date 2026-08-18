<div class="row g-3">
    <div class="col-md-6">
        <label class="form-label">Name</label>
        <input type="text" name="name" class="form-control" value="{{ old('name', $screen->name ?? '') }}" required>
    </div>
    <div class="col-md-6">
        <label class="form-label">Location</label>
        <input type="text" name="location" class="form-control" value="{{ old('location', $screen->location ?? '') }}">
    </div>
    <div class="col-md-6">
        <label class="form-label">Status</label>
        <select name="status" class="form-select">
            @foreach (\App\Enums\ScreenStatus::options() as $opt)
                <option value="{{ $opt['value'] }}" @selected(old('status', $screen->status->value ?? 'active') === $opt['value'])>{{ $opt['label'] }}</option>
            @endforeach
        </select>
    </div>
    @if (!$screen)
        <div class="col-md-6">
            <label class="form-label">Code (optional, auto-generated if blank)</label>
            <input type="text" name="code" class="form-control" value="{{ old('code') }}">
        </div>
    @endif
</div>
<hr class="my-4">
