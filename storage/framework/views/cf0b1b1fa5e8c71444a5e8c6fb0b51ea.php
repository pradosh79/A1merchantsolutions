<?php $__env->startSection('title', 'Coupon Claimed'); ?>
<?php $__env->startSection('content'); ?>
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card shadow-sm text-center">
                <div class="card-body py-5">
                    <div class="display-4 text-success mb-3"><i class="bi bi-check-circle"></i></div>
                    <h2 class="h4">You're all set, <?php echo e($claim->name); ?>!</h2>
                    <p class="text-muted">We've emailed your coupon for <strong><?php echo e($claim->offer->title); ?></strong> to
                        <strong><?php echo e($claim->email); ?></strong>.</p>
                    <p class="small text-secondary">For your security, the coupon code and QR are only sent by email
                        &mdash; they are never shown on this page.</p>
                    <p class="small text-muted">Coupon expires: <?php echo e($claim->expires_at->format('M j, Y g:ia')); ?></p>
                    <a href="<?php echo e(route('home')); ?>" class="btn btn-outline-brand-orange mt-3">Back to Offers</a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.public', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/u533806958/domains/a1merchantsolutions.triviio.com/public_html/resources/views/public/confirmation.blade.php ENDPATH**/ ?>