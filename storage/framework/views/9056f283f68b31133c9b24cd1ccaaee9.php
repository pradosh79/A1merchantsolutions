<div class="row g-3">
    <div class="col-md-6">
        <label class="form-label">Name</label>
        <input type="text" name="name" class="form-control" value="<?php echo e(old('name', $advertiser->name ?? '')); ?>" required>
    </div>
    <div class="col-md-6">
        <label class="form-label">Contact Email</label>
        <input type="email" name="contact_email" class="form-control" value="<?php echo e(old('contact_email', $advertiser->contact_email ?? '')); ?>" required>
    </div>
    <div class="col-md-6">
        <label class="form-label">Contact Phone</label>
        <input type="text" name="contact_phone" class="form-control" value="<?php echo e(old('contact_phone', $advertiser->contact_phone ?? '')); ?>">
    </div>
    <div class="col-md-6">
        <label class="form-label">Status</label>
        <select name="status" class="form-select">
            <?php $__currentLoopData = \App\Enums\AdvertiserStatus::options(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $opt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($opt['value']); ?>" <?php if(old('status', $advertiser->status->value ?? 'active') === $opt['value']): echo 'selected'; endif; ?>><?php echo e($opt['label']); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
    </div>
    <div class="col-12">
        <label class="form-label">Address</label>
        <textarea name="address" class="form-control" rows="2"><?php echo e(old('address', $advertiser->address ?? '')); ?></textarea>
    </div>
    <div class="col-md-6">
        <label class="form-label">Logo</label>
        <input type="file" name="logo" class="form-control">
        <?php if(!empty($advertiser?->logoUrl())): ?>
            <img src="<?php echo e($advertiser->logoUrl()); ?>" class="img-thumbnail mt-2" style="max-height:80px" alt="Current logo">
        <?php endif; ?>
    </div>
</div>
<hr class="my-4">
<?php /**PATH /home/u533806958/domains/a1merchantsolutions.triviio.com/public_html/resources/views/admin/advertisers/_form.blade.php ENDPATH**/ ?>