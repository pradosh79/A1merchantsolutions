<?php $__env->startSection('title', 'Homepage Settings'); ?>
<?php $__env->startSection('content'); ?>
    <h2 class="mb-1">Homepage Settings</h2>
    <p class="text-muted">Replace the hero banner and category icons shown on the public homepage &mdash; no code changes needed.</p>

    <form method="POST" action="<?php echo e(route('admin.homepage-settings.update')); ?>" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>

        <div class="card mb-4">
            <div class="card-header">Hero Banner Image</div>
            <div class="card-body">
                <div class="row align-items-center g-3">
                    <div class="col-md-6">
                        <img src="<?php echo e($heroImageUrl); ?>" alt="Current hero image" class="img-fluid rounded border" style="max-height:220px; object-fit:cover;">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Replace hero image</label>
                        <input type="file" name="hero_image" class="form-control" accept="image/*">
                        <div class="form-text">Shown on the right side of the homepage hero section. Recommended: wide image (e.g. 1600&times;900), orange/brand-colored background works best.</div>
                        <?php $__errorArgs = ['hero_image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="text-danger small mt-1"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header">Category Icons</div>
            <div class="card-body">
                <p class="text-muted small">Each category pill on the homepage shows this icon. Leave blank to keep the current icon (falls back to a default icon if none has ever been uploaded).</p>
                <div class="row g-3">
                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-md-3 col-sm-6">
                            <div class="border rounded p-3 text-center h-100">
                                <div class="mb-2" style="height:48px;">
                                    <?php if($cat['icon_url']): ?>
                                        <img src="<?php echo e($cat['icon_url']); ?>" alt="<?php echo e($cat['label']); ?>" style="height:40px;">
                                    <?php else: ?>
                                        <i class="bi <?php echo e($cat['icon']); ?>" style="font-size:2rem;"></i>
                                    <?php endif; ?>
                                </div>
                                <div class="fw-semibold small mb-2"><?php echo e($cat['label']); ?></div>
                                <input type="file" name="category_icons[<?php echo e($cat['value']); ?>]" class="form-control form-control-sm" accept="image/*">
                                <?php $__errorArgs = ["category_icons.{$cat['value']}"];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="text-danger small mt-1"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                <?php if($cat['icon_url']): ?>
                                    <div class="form-check mt-2">
                                        <input class="form-check-input" type="checkbox" value="1" name="remove_category_icon[<?php echo e($cat['value']); ?>]" id="remove<?php echo e($cat['value']); ?>">
                                        <label class="form-check-label small text-danger" for="remove<?php echo e($cat['value']); ?>">Remove custom icon</label>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary mt-4">Save Changes</button>
    </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH F:\xampp\htdocs\adcoupon-platform\resources\views/admin/homepage-settings/edit.blade.php ENDPATH**/ ?>