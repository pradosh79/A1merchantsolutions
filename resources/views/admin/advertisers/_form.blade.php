<div class="row g-3">
    <div class="col-md-6">
        <label class="form-label">Name</label>
        <input type="text" name="name" class="form-control" value="{{ old('name', $advertiser->name ?? '') }}" required>
    </div>
    <div class="col-md-6">
        <label class="form-label">Contact Email</label>
        <input type="email" name="contact_email" class="form-control" value="{{ old('contact_email', $advertiser->contact_email ?? '') }}" required>
    </div>
    <div class="col-md-6">
        <label class="form-label">Contact Phone</label>
        <input type="text" name="contact_phone" class="form-control" value="{{ old('contact_phone', $advertiser->contact_phone ?? '') }}">
    </div>
    <div class="col-md-6">
        <label class="form-label">Status</label>
        <select name="status" class="form-select">
            @foreach (\App\Enums\AdvertiserStatus::options() as $opt)
                <option value="{{ $opt['value'] }}" @selected(old('status', $advertiser->status->value ?? 'active') === $opt['value'])>{{ $opt['label'] }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-12">
        <label class="form-label">Address</label>
        <textarea name="address" class="form-control" rows="2">{{ old('address', $advertiser->address ?? '') }}</textarea>
    </div>
    <div class="col-md-6">
        <label class="form-label">Logo</label>
        <input type="file" name="logo" class="form-control">
        @if (!empty($advertiser?->logoUrl()))
            <img src="{{ $advertiser->logoUrl() }}" class="img-thumbnail mt-2" style="max-height:80px" alt="Current logo">
        @endif
    </div>
</div>
<hr class="my-4">
