<?php $__env->startSection('title', 'Coupon Logs'); ?>
<?php $__env->startSection('content'); ?>
    <h2 class="mb-4">Coupon Logs</h2>
    <div class="card">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light"><tr><th>Type</th><th>Offer</th><th>Advertiser</th><th>IP</th><th>When</th></tr></thead>
                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $logs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $log): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td><span class="badge bg-secondary"><?php echo e($log->type->label()); ?></span></td>
                            <td><?php echo e($log->offer?->title ?? '—'); ?></td>
                            <td><?php echo e($log->advertiser?->name ?? '—'); ?></td>
                            <td><?php echo e($log->ip_address ?? '—'); ?></td>
                            <td><?php echo e($log->created_at?->diffForHumans()); ?></td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr><td colspan="5" class="text-center text-muted py-4">No coupon activity yet.</td></tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="mt-3"><?php echo e($logs->links()); ?></div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/u533806958/domains/a1merchantsolutions.triviio.com/public_html/resources/views/admin/logs/coupons.blade.php ENDPATH**/ ?>