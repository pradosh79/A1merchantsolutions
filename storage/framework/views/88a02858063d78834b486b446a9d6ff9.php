<?php $__env->startSection('title', 'Analytics'); ?>
<?php $__env->startSection('content'); ?>
    <h2 class="mb-4">Offer Conversion Analytics</h2>
    <div class="card">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr><th>Offer</th><th>Advertiser</th><th>Claims</th><th>Redemptions</th><th>Conversion Rate</th></tr>
                </thead>
                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $offerPerformance; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td><?php echo e($row['title']); ?></td>
                            <td><?php echo e($row['advertiser']); ?></td>
                            <td><?php echo e($row['claims_count']); ?></td>
                            <td><?php echo e($row['redemptions_count']); ?></td>
                            <td>
                                <div class="progress" style="height:20px;">
                                    <div class="progress-bar" style="width: <?php echo e($row['conversion_rate']); ?>%"><?php echo e($row['conversion_rate']); ?>%</div>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr><td colspan="5" class="text-center text-muted py-4">No data yet.</td></tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/u533806958/domains/a1merchantsolutions.triviio.com/public_html/resources/views/admin/analytics/index.blade.php ENDPATH**/ ?>