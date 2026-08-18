<?php $__env->startSection('title', 'Screens'); ?>
<?php $__env->startSection('content'); ?>
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="mb-0">Screens</h2>
        <a href="<?php echo e(route('admin.screens.create')); ?>" class="btn btn-primary"><i class="bi bi-plus-lg"></i> New Screen</a>
    </div>
    <div class="card">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr><th>Name</th><th>Code</th><th>Location</th><th>Status</th><th>Claims</th><th></th></tr>
                </thead>
                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $screens; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $screen): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td><?php echo e($screen->name); ?></td>
                            <td><code><?php echo e($screen->code); ?></code></td>
                            <td><?php echo e($screen->location ?? '—'); ?></td>
                            <td><span class="badge bg-<?php echo e($screen->status->badgeClass()); ?>"><?php echo e($screen->status->label()); ?></span></td>
                            <td><?php echo e($screen->claims_count); ?></td>
                            <td class="text-end">
                                <a href="<?php echo e(route('admin.screens.show', $screen)); ?>" class="btn btn-sm btn-outline-secondary"><i class="bi bi-eye"></i></a>
                                <a href="<?php echo e(route('admin.screens.edit', $screen)); ?>" class="btn btn-sm btn-outline-primary"><i class="bi bi-pencil"></i></a>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr><td colspan="6" class="text-center text-muted py-4">No screens yet.</td></tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="mt-3"><?php echo e($screens->links()); ?></div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/u533806958/domains/a1merchantsolutions.triviio.com/public_html/resources/views/admin/screens/index.blade.php ENDPATH**/ ?>