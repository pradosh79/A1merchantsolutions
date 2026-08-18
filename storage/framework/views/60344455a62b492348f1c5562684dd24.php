<?php $__env->startSection('title', 'Redemption Logs'); ?>
<?php $__env->startSection('content'); ?>
    <h2 class="mb-4">Redemption Logs</h2>
    <div class="card">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light"><tr><th>Type</th><th>Advertiser</th><th>Submitted Code</th><th>IP</th><th>When</th></tr></thead>
                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $logs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $log): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td>
                                <?php $badge = $log->type->value === 'redemption_success' ? 'success' : 'danger'; ?>
                                <span class="badge bg-<?php echo e($badge); ?>"><?php echo e($log->type->label()); ?></span>
                            </td>
                            <td><?php echo e($log->advertiser?->name ?? '—'); ?></td>
                            <td><code><?php echo e($log->meta['submitted_code'] ?? '—'); ?></code></td>
                            <td><?php echo e($log->ip_address ?? '—'); ?></td>
                            <td><?php echo e($log->created_at?->diffForHumans()); ?></td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr><td colspan="5" class="text-center text-muted py-4">No redemption activity yet.</td></tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="mt-3"><?php echo e($logs->links()); ?></div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/u533806958/domains/a1merchantsolutions.triviio.com/public_html/resources/views/admin/logs/redemptions.blade.php ENDPATH**/ ?>