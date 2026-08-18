<?php $__env->startSection('title', 'Advertisers'); ?>
<?php $__env->startSection('content'); ?>
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="mb-0">Advertisers</h2>
        <a href="<?php echo e(route('admin.advertisers.create')); ?>" class="btn btn-primary"><i class="bi bi-plus-lg"></i> New Advertiser</a>
    </div>

    <div class="card">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th>Name</th><th>Contact Email</th><th>Status</th><th>Offers</th><th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $advertisers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $advertiser): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td><?php echo e($advertiser->name); ?></td>
                            <td><?php echo e($advertiser->contact_email); ?></td>
                            <td><span class="badge bg-<?php echo e($advertiser->status->badgeClass()); ?>"><?php echo e($advertiser->status->label()); ?></span></td>
                            <td><?php echo e($advertiser->offers_count); ?></td>
                            <td class="text-end">
                                <a href="<?php echo e(route('admin.advertisers.show', $advertiser)); ?>" class="btn btn-sm btn-outline-secondary"><i class="bi bi-eye"></i></a>
                                <a href="<?php echo e(route('admin.advertisers.edit', $advertiser)); ?>" class="btn btn-sm btn-outline-primary"><i class="bi bi-pencil"></i></a>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr><td colspan="5" class="text-center text-muted py-4">No advertisers yet.</td></tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

    <div class="mt-3"><?php echo e($advertisers->links()); ?></div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/u533806958/domains/a1merchantsolutions.triviio.com/public_html/resources/views/admin/advertisers/index.blade.php ENDPATH**/ ?>