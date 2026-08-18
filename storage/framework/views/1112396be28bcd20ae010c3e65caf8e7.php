<div class="row g-3">
    <div class="col-md-6">
        <label class="form-label">Name</label>
        <input type="text" name="name" class="form-control" value="<?php echo e(old('name', $screen->name ?? '')); ?>" required>
    </div>
    <div class="col-md-6">
        <label class="form-label">Location</label>
        <input type="text" name="location" class="form-control" value="<?php echo e(old('location', $screen->location ?? '')); ?>">
    </div>
    <div class="col-md-6">
        <label class="form-label">Status</label>
        <select name="status" class="form-select">
            <?php $__currentLoopData = \App\Enums\ScreenStatus::options(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $opt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($opt['value']); ?>" <?php if(old('status', $screen->status->value ?? 'active') === $opt['value']): echo 'selected'; endif; ?>><?php echo e($opt['label']); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
    </div>
    <?php if(!$screen): ?>
        <div class="col-md-6">
            <label class="form-label">Code (optional, auto-generated if blank)</label>
            <input type="text" name="code" class="form-control" value="<?php echo e(old('code')); ?>">
        </div>
    <?php endif; ?>
</div>
<hr class="my-4">
<?php /**PATH /home/u533806958/domains/a1merchantsolutions.triviio.com/public_html/resources/views/admin/screens/_form.blade.php ENDPATH**/ ?>