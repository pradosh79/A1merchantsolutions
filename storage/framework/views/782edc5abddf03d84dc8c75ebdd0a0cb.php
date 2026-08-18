<?php $__env->startSection('title', 'Dashboard'); ?>

<?php $__env->startSection('content'); ?>
    <h2 class="mb-4">Dashboard</h2>

    <div class="row g-3 mb-4">
        <div class="col-sm-6 col-lg-3">
            <div class="card text-bg-primary h-100">
                <div class="card-body">
                    <div class="text-uppercase small">Today's Claims</div>
                    <div class="fs-2 fw-bold"><?php echo e($widgets['todays_claims']); ?></div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-3">
            <div class="card text-bg-success h-100">
                <div class="card-body">
                    <div class="text-uppercase small">Today's Redemptions</div>
                    <div class="fs-2 fw-bold"><?php echo e($widgets['todays_redemptions']); ?></div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-3">
            <div class="card text-bg-info h-100">
                <div class="card-body">
                    <div class="text-uppercase small">QR Scans Today</div>
                    <div class="fs-2 fw-bold"><?php echo e($widgets['todays_qr_scans']); ?></div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-3">
            <div class="card text-bg-warning h-100">
                <div class="card-body">
                    <div class="text-uppercase small">Taps Today</div>
                    <div class="fs-2 fw-bold"><?php echo e($widgets['todays_taps']); ?></div>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-3">
        <div class="col-lg-6">
            <div class="card h-100">
                <div class="card-header">Top Advertisers (by claims)</div>
                <ul class="list-group list-group-flush">
                    <?php $__empty_1 = true; $__currentLoopData = $widgets['top_advertisers']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $advertiser): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <li class="list-group-item d-flex justify-content-between">
                            <span><?php echo e($advertiser->name); ?></span>
                            <span class="badge bg-primary rounded-pill"><?php echo e($advertiser->claims_count); ?></span>
                        </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <li class="list-group-item text-muted">No data yet.</li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card h-100">
                <div class="card-header">Offer Performance</div>
                <div class="table-responsive">
                    <table class="table table-sm mb-0">
                        <thead>
                            <tr><th>Offer</th><th>Claims</th><th>Redemptions</th><th>Conv.</th></tr>
                        </thead>
                        <tbody>
                            <?php $__empty_1 = true; $__currentLoopData = $widgets['offer_performance']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr>
                                    <td><?php echo e($row['title']); ?></td>
                                    <td><?php echo e($row['claims_count']); ?></td>
                                    <td><?php echo e($row['redemptions_count']); ?></td>
                                    <td><?php echo e($row['conversion_rate']); ?>%</td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr><td colspan="4" class="text-muted">No offers yet.</td></tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-3 mt-1">
        <div class="col-12">
            <div class="card">
                <div class="card-header">Last 14 Days &mdash; Claims / Redemptions / QR Scans</div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-sm text-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-start">Metric</th>
                                    <?php $__currentLoopData = array_keys($widgets['claims_series']); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $day): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <th><?php echo e(\Illuminate\Support\Carbon::parse($day)->format('M j')); ?></th>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-start fw-semibold">Claims</td>
                                    <?php $__currentLoopData = $widgets['claims_series']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $count): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <td><?php echo e($count); ?></td>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tr>
                                <tr>
                                    <td class="text-start fw-semibold">Redemptions</td>
                                    <?php $__currentLoopData = $widgets['redemptions_series']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $count): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <td><?php echo e($count); ?></td>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tr>
                                <tr>
                                    <td class="text-start fw-semibold">QR Scans</td>
                                    <?php $__currentLoopData = $widgets['qr_scans_series']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $count): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <td><?php echo e($count); ?></td>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/u533806958/domains/a1merchantsolutions.triviio.com/public_html/resources/views/admin/dashboard.blade.php ENDPATH**/ ?>