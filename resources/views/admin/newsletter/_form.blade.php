@csrf
<div class="mb-3">
    <label class="form-label">Email <span class="text-danger">*</span></label>
    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
           value="{{ old('email', $subscriber->email) }}" required>
    @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>

<div class="mb-3">
    <label class="form-label">Source</label>
    <input type="text" name="source" class="form-control @error('source') is-invalid @enderror"
           value="{{ old('source', $subscriber->source) }}" placeholder="e.g. homepage_footer, admin_manual">
    <div class="form-text">Where this email was captured. Optional.</div>
    @error('source') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>

<div class="form-check mb-3">
    <input class="form-check-input" type="checkbox" name="subscribed" id="subscribed" value="1"
           @checked(old('subscribed', $subscriber->exists ? is_null($subscriber->unsubscribed_at) : true))>
    <label class="form-check-label" for="subscribed">Subscribed (unchecked = unsubscribed)</label>
</div>
