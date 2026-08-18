<div class="row g-3">
    <div class="col-md-6">
        <label class="form-label">Advertiser</label>
        <select name="advertiser_id" class="form-select" required>
            <option value="">Select advertiser</option>
            @foreach ($advertisers as $adv)
                <option value="{{ $adv->id }}" @selected(old('advertiser_id', $offer->advertiser_id ?? '') == $adv->id)>{{ $adv->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-md-6">
        <label class="form-label">Status</label>
        <select name="status" class="form-select">
            @foreach (\App\Enums\OfferStatus::options() as $opt)
                <option value="{{ $opt['value'] }}" @selected(old('status', $offer->status->value ?? 'draft') === $opt['value'])>{{ $opt['label'] }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-md-6">
        <label class="form-label">Category <span class="text-muted small">(shown as a filter pill on the homepage)</span></label>
        <select name="category" class="form-select">
            <option value="">No category</option>
            @foreach (\App\Enums\CampaignCategory::options() as $opt)
                <option value="{{ $opt['value'] }}" @selected(old('category', $offer->category->value ?? '') === $opt['value'])>{{ $opt['label'] }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-12">
        <label class="form-label">Title</label>
        <input type="text" name="title" class="form-control" value="{{ old('title', $offer->title ?? '') }}" required>
    </div>
    <div class="col-12">
        <label class="form-label">Description</label>
        <textarea name="description" class="form-control" rows="3">{{ old('description', $offer->description ?? '') }}</textarea>
    </div>
    <div class="col-12">
        <label class="form-label">Terms</label>
        <textarea name="terms" class="form-control" rows="2">{{ old('terms', $offer->terms ?? '') }}</textarea>
    </div>
    <div class="col-md-4">
        <label class="form-label">Max Claims (blank = unlimited)</label>
        <input type="number" name="max_claims" class="form-control" value="{{ old('max_claims', $offer->max_claims ?? '') }}">
    </div>
    <div class="col-md-4">
        <label class="form-label">Coupon Expiry (days, blank = default)</label>
        <input type="number" name="coupon_expiry_days" class="form-control" value="{{ old('coupon_expiry_days', $offer->coupon_expiry_days ?? '') }}">
    </div>
    <div class="col-md-4">
        <label class="form-label">Image</label>
        <input type="file" name="image" class="form-control">
    </div>
    <div class="col-md-6">
        <label class="form-label">Starts At</label>
        <input type="datetime-local" name="starts_at" class="form-control" value="{{ old('starts_at', optional($offer->starts_at ?? null)->format('Y-m-d\TH:i')) }}">
    </div>
    <div class="col-md-6">
        <label class="form-label">Ends At</label>
        <input type="datetime-local" name="ends_at" class="form-control" value="{{ old('ends_at', optional($offer->ends_at ?? null)->format('Y-m-d\TH:i')) }}">
    </div>
    <div class="col-12">
        <label class="form-label">Screens</label>
        <div class="border rounded p-2" style="max-height:160px; overflow-y:auto;">
            @foreach ($screens as $s)
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="screen_ids[]" value="{{ $s->id }}" id="screen{{ $s->id }}"
                        @checked(in_array($s->id, old('screen_ids', $selectedScreenIds ?? [])))>
                    <label class="form-check-label" for="screen{{ $s->id }}">{{ $s->name }} ({{ $s->code }})</label>
                </div>
            @endforeach
        </div>
    </div>
</div>
<hr class="my-4">
