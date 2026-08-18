<?php $__env->startSection('title', $advertiser->name); ?>
<?php $__env->startSection('content'); ?>
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="mb-0"><?php echo e($advertiser->name); ?></h2>
        <div>
            <a href="<?php echo e(route('admin.advertisers.edit', $advertiser)); ?>" class="btn btn-outline-primary">Edit</a>
            <form action="<?php echo e(route('admin.advertisers.rotate-token', $advertiser)); ?>" method="POST" class="d-inline" onsubmit="return confirm('Rotate the merchant redemption link? The old QR/link will stop working.');">
                <?php echo csrf_field(); ?>
                <button class="btn btn-outline-warning">Rotate Redemption Token</button>
            </form>
        </div>
    </div>

    <div class="row g-3">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <p><strong>Status:</strong> <span class="badge bg-<?php echo e($advertiser->status->badgeClass()); ?>"><?php echo e($advertiser->status->label()); ?></span></p>
                    <p><strong>Email:</strong> <?php echo e($advertiser->contact_email); ?></p>
                    <p><strong>Phone:</strong> <?php echo e($advertiser->contact_phone ?? '—'); ?></p>
                    <p><strong>Merchant Redemption URL:</strong><br>
                        <code class="small"><?php echo e(url('/r/'.$advertiser->redemption_token)); ?></code>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Recent Offers</div>
                <ul class="list-group list-group-flush">
                    <?php $__empty_1 = true; $__currentLoopData = $advertiser->offers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $offer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <li class="list-group-item d-flex justify-content-between">
                            <a href="<?php echo e(route('admin.offers.show', $offer)); ?>"><?php echo e($offer->title); ?></a>
                            <span class="badge bg-<?php echo e($offer->status->badgeClass()); ?>"><?php echo e($offer->status->label()); ?></span>
                        </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <li class="list-group-item text-muted">No offers yet.</li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/u533806958/domains/a1merchantsolutions.triviio.com/public_html/resources/views/admin/advertisers/show.blade.php ENDPATH**/ ?>