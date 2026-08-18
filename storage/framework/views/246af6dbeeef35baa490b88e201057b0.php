<?php $__env->startSection('title', $offer->title); ?>
<?php $__env->startSection('content'); ?>
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="mb-0"><?php echo e($offer->title); ?></h2>
        <a href="<?php echo e(route('admin.offers.edit', $offer)); ?>" class="btn btn-outline-primary">Edit</a>
    </div>
    <div class="row g-3">
        <div class="col-md-4">
            <div class="card">
                <img src="<?php echo e($offer->imageUrl() ?? 'https://placehold.co/400x250?text=Offer+Image'); ?>" class="card-img-top" alt="<?php echo e($offer->title); ?>">
                <div class="card-body">
                    <p><strong>Advertiser:</strong> <?php echo e($offer->advertiser->name); ?></p>
                    <p><strong>Category:</strong> <?php echo e($offer->categoryLabel() ?? '—'); ?></p>
                    <p><strong>Status:</strong> <span class="badge bg-<?php echo e($offer->status->badgeClass()); ?>"><?php echo e($offer->status->label()); ?></span></p>
                    <p><strong>Claims:</strong> <?php echo e($offer->claims_count); ?> <?php if($offer->max_claims): ?> / <?php echo e($offer->max_claims); ?> <?php endif; ?></p>
                    <p><strong>Redemptions:</strong> <?php echo e($offer->redemptions_count); ?> (<?php echo e($offer->conversionRate()); ?>%)</p>
                    <p><strong>Window:</strong> <?php echo e(optional($offer->starts_at)->format('M j, Y') ?? '—'); ?> &rarr; <?php echo e(optional($offer->ends_at)->format('M j, Y') ?? '—'); ?></p>
                    <p><strong>Public link:</strong><br><code class="small"><?php echo e(url('/o/'.$offer->uuid)); ?></code></p>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Recent Claims</div>
                <div class="table-responsive">
                    <table class="table table-sm mb-0">
                        <thead><tr><th>Name</th><th>Email</th><th>Status</th><th>Claimed</th></tr></thead>
                        <tbody>
                            <?php $__empty_1 = true; $__currentLoopData = $offer->claims; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $claim): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr>
                                    <td><?php echo e($claim->name); ?></td>
                                    <td><?php echo e($claim->email); ?></td>
                                    <td><span class="badge bg-<?php echo e($claim->status->badgeClass()); ?>"><?php echo e($claim->status->label()); ?></span></td>
                                    <td><?php echo e($claim->created_at->diffForHumans()); ?></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr><td colspan="4" class="text-muted">No claims yet.</td></tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH F:\xampp\htdocs\adcoupon-platform\resources\views/admin/offers/show.blade.php ENDPATH**/ ?>