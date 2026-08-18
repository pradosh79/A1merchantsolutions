<div class="row g-3">
    <div class="col-md-6">
        <label class="form-label">Advertiser</label>
        <select name="advertiser_id" class="form-select" required>
            <option value="">Select advertiser</option>
            <?php $__currentLoopData = $advertisers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $adv): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($adv->id); ?>" <?php if(old('advertiser_id', $offer->advertiser_id ?? '') == $adv->id): echo 'selected'; endif; ?>><?php echo e($adv->name); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
    </div>
    <div class="col-md-6">
        <label class="form-label">Status</label>
        <select name="status" class="form-select">
            <?php $__currentLoopData = \App\Enums\OfferStatus::options(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $opt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($opt['value']); ?>" <?php if(old('status', $offer->status->value ?? 'draft') === $opt['value']): echo 'selected'; endif; ?>><?php echo e($opt['label']); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
    </div>
    <div class="col-md-6">
        <label class="form-label">Category <span class="text-muted small">(shown as a filter pill on the homepage)</span></label>
        <select name="category" class="form-select">
            <option value="">No category</option>
            <?php $__currentLoopData = \App\Enums\CampaignCategory::options(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $opt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($opt['value']); ?>" <?php if(old('category', $offer->category->value ?? '') === $opt['value']): echo 'selected'; endif; ?>><?php echo e($opt['label']); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
    </div>
    <div class="col-12">
        <label class="form-label">Title</label>
        <input type="text" name="title" class="form-control" value="<?php echo e(old('title', $offer->title ?? '')); ?>" required>
    </div>
    <div class="col-12">
        <label class="form-label">Description</label>
        <textarea name="description" class="form-control" rows="3"><?php echo e(old('description', $offer->description ?? '')); ?></textarea>
    </div>
    <div class="col-12">
        <label class="form-label">Terms</label>
        <textarea name="terms" class="form-control" rows="2"><?php echo e(old('terms', $offer->terms ?? '')); ?></textarea>
    </div>
    <div class="col-md-4">
        <label class="form-label">Max Claims (blank = unlimited)</label>
        <input type="number" name="max_claims" class="form-control" value="<?php echo e(old('max_claims', $offer->max_claims ?? '')); ?>">
    </div>
    <div class="col-md-4">
        <label class="form-label">Coupon Expiry (days, blank = default)</label>
        <input type="number" name="coupon_expiry_days" class="form-control" value="<?php echo e(old('coupon_expiry_days', $offer->coupon_expiry_days ?? '')); ?>">
    </div>
    <div class="col-md-4">
        <label class="form-label">Image</label>
        <input type="file" name="image" class="form-control">
    </div>
    <div class="col-md-6">
        <label class="form-label">Starts At</label>
        <input type="datetime-local" name="starts_at" class="form-control" value="<?php echo e(old('starts_at', optional($offer->starts_at ?? null)->format('Y-m-d\TH:i'))); ?>">
    </div>
    <div class="col-md-6">
        <label class="form-label">Ends At</label>
        <input type="datetime-local" name="ends_at" class="form-control" value="<?php echo e(old('ends_at', optional($offer->ends_at ?? null)->format('Y-m-d\TH:i'))); ?>">
    </div>
    <div class="col-12">
        <label class="form-label">Screens</label>
        <div class="border rounded p-2" style="max-height:160px; overflow-y:auto;">
            <?php $__currentLoopData = $screens; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="screen_ids[]" value="<?php echo e($s->id); ?>" id="screen<?php echo e($s->id); ?>"
                        <?php if(in_array($s->id, old('screen_ids', $selectedScreenIds ?? []))): echo 'checked'; endif; ?>>
                    <label class="form-check-label" for="screen<?php echo e($s->id); ?>"><?php echo e($s->name); ?> (<?php echo e($s->code); ?>)</label>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</div>
<hr class="my-4">
<?php /**PATH /home/u533806958/domains/a1merchantsolutions.triviio.com/public_html/resources/views/admin/offers/_form.blade.php ENDPATH**/ ?>