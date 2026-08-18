<?php $__env->startSection('title', 'Claim #'.$claim->id); ?>
<?php $__env->startSection('content'); ?>
    <h2 class="mb-4">Claim #<?php echo e($claim->id); ?></h2>
    <div class="row g-3">
        <div class="col-md-6">
            <div class="card"><div class="card-body">
                <p><strong>Name:</strong> <?php echo e($claim->name); ?></p>
                <p><strong>Email:</strong> <?php echo e($claim->email); ?></p>
                <p><strong>Phone:</strong> <?php echo e($claim->phone ?? '—'); ?></p>
                <p><strong>Offer:</strong> <?php echo e($claim->offer->title); ?> (<?php echo e($claim->offer->advertiser->name); ?>)</p>
                <p><strong>Screen:</strong> <?php echo e($claim->screen->name ?? '—'); ?></p>
                <p><strong>Status:</strong> <span class="badge bg-<?php echo e($claim->status->badgeClass()); ?>"><?php echo e($claim->status->label()); ?></span></p>
                <p><strong>Coupon Code:</strong> <code><?php echo e($claim->getRawOriginal('coupon_code')); ?></code></p>
                <p><strong>Claimed:</strong> <?php echo e($claim->created_at); ?></p>
                <p><strong>Expires:</strong> <?php echo e($claim->expires_at); ?></p>
                <p><strong>Redeemed:</strong> <?php echo e($claim->redeemed_at ?? 'Not yet redeemed'); ?></p>
            </div></div>
        </div>
        <div class="col-md-6">
            <div class="card"><div class="card-body text-center">
                <?php if($claim->qr_code_path): ?>
                    <p class="text-muted">QR Code</p>
                    <img src="<?php echo e(\Illuminate\Support\Facades\Storage::disk('public')->url($claim->qr_code_path)); ?>" style="max-width:220px" alt="Coupon QR">
                <?php else: ?>
                    <p class="text-muted">No QR generated.</p>
                <?php endif; ?>
            </div></div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/u533806958/domains/a1merchantsolutions.triviio.com/public_html/resources/views/admin/claims/show.blade.php ENDPATH**/ ?>