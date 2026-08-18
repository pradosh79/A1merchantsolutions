<?php $__env->startSection('title', $offer->title); ?>
<?php $__env->startSection('content'); ?>
<div class="container py-4">
    <div class="row g-4">
        <div class="col-md-6">
            <div class="card shadow-sm">
                <img src="<?php echo e($offer->imageUrl() ?? 'https://placehold.co/500x350?text=Offer+Image'); ?>" class="card-img-top" alt="<?php echo e($offer->title); ?>">
                <div class="card-body">
                    <h2 class="h4"><?php echo e($offer->title); ?></h2>
                    <p class="text-muted">By <?php echo e($offer->advertiser->name ?? ''); ?></p>
                    <p><?php echo e($offer->description); ?></p>
                    <?php if($offer->terms): ?>
                        <p class="small text-muted"><strong>Terms:</strong> <?php echo e($offer->terms); ?></p>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-header">Claim this offer</div>
                <div class="card-body">
                    <?php if(!$offer->isClaimable()): ?>
                        <div class="alert alert-warning">This offer is not currently available for claiming.</div>
                    <?php else: ?>
                        <form method="POST" action="<?php echo e(route('public.claim')); ?>">
                            <?php echo csrf_field(); ?>
                            <input type="hidden" name="offer_id" value="<?php echo e($offer->id); ?>">
                            <input type="hidden" name="screen_id" value="<?php echo e($screen->id ?? ''); ?>">

                            <div class="mb-3">
                                <label class="form-label">Full Name</label>
                                <input type="text" name="name" class="form-control" value="<?php echo e(old('name')); ?>" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Email (your coupon will be sent here)</label>
                                <input type="email" name="email" class="form-control" value="<?php echo e(old('email')); ?>" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Phone (optional)</label>
                                <input type="text" name="phone" class="form-control" value="<?php echo e(old('phone')); ?>">
                            </div>
                            <button type="submit" class="btn btn-brand-orange w-100">Get Coupon</button>
                        </form>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.public', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/u533806958/domains/a1merchantsolutions.triviio.com/public_html/resources/views/public/offer.blade.php ENDPATH**/ ?>