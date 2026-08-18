<?php $__env->startSection('title', 'Offers'); ?>
<?php $__env->startSection('content'); ?>
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="mb-0">Offers</h2>
        <a href="<?php echo e(route('admin.offers.create')); ?>" class="btn btn-primary"><i class="bi bi-plus-lg"></i> New Offer</a>
    </div>
    <div class="card">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr><th>Title</th><th>Advertiser</th><th>Status</th><th>Claims</th><th>Redemptions</th><th></th></tr>
                </thead>
                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $offers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $offer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td><?php echo e($offer->title); ?></td>
                            <td><?php echo e($offer->advertiser->name); ?></td>
                            <td><span class="badge bg-<?php echo e($offer->status->badgeClass()); ?>"><?php echo e($offer->status->label()); ?></span></td>
                            <td><?php echo e($offer->claims_count); ?><?php if($offer->max_claims): ?> / <?php echo e($offer->max_claims); ?><?php endif; ?></td>
                            <td><?php echo e($offer->redemptions_count); ?></td>
                            <td class="text-end">
                                <a href="<?php echo e(route('admin.offers.show', $offer)); ?>" class="btn btn-sm btn-outline-secondary"><i class="bi bi-eye"></i></a>
                                <a href="<?php echo e(route('admin.offers.edit', $offer)); ?>" class="btn btn-sm btn-outline-primary"><i class="bi bi-pencil"></i></a>
                                <form action="<?php echo e(route('admin.offers.destroy', $offer)); ?>" method="POST" class="d-inline" onsubmit="return confirm('Delete “<?php echo e($offer->title); ?>”? This also deletes its claims and cannot be undone.');">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button type="submit" class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr><td colspan="6" class="text-center text-muted py-4">No offers yet.</td></tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="mt-3"><?php echo e($offers->links()); ?></div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/u533806958/domains/a1merchantsolutions.triviio.com/public_html/resources/views/admin/offers/index.blade.php ENDPATH**/ ?>