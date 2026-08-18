<?php $__env->startSection('title', 'Claims'); ?>
<?php $__env->startSection('content'); ?>
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="mb-0">Claims</h2>
        <a href="<?php echo e(route('admin.claims.export', request()->query())); ?>" class="btn btn-outline-success">
            <i class="bi bi-download"></i> Export CSV
        </a>
    </div>

    <form method="GET" class="row g-2 mb-3">
        <div class="col-auto">
            <input type="text" name="search" class="form-control" placeholder="Search name/email/code" value="<?php echo e($filters['search'] ?? ''); ?>">
        </div>
        <div class="col-auto">
            <select name="status" class="form-select">
                <option value="">All statuses</option>
                <?php $__currentLoopData = \App\Enums\ClaimStatus::options(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $opt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($opt['value']); ?>" <?php if(($filters['status'] ?? '') === $opt['value']): echo 'selected'; endif; ?>><?php echo e($opt['label']); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
        <div class="col-auto"><input type="date" name="from" class="form-control" value="<?php echo e($filters['from'] ?? ''); ?>"></div>
        <div class="col-auto"><input type="date" name="to" class="form-control" value="<?php echo e($filters['to'] ?? ''); ?>"></div>
        <div class="col-auto"><button class="btn btn-primary">Filter</button></div>
    </form>

    <div class="card">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr><th>Name</th><th>Email</th><th>Offer</th><th>Screen</th><th>Status</th><th>Claimed</th><th></th></tr>
                </thead>
                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $claims; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $claim): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td><?php echo e($claim->name); ?></td>
                            <td><?php echo e($claim->email); ?></td>
                            <td><?php echo e($claim->offer->title); ?></td>
                            <td><?php echo e($claim->screen->name ?? '—'); ?></td>
                            <td><span class="badge bg-<?php echo e($claim->status->badgeClass()); ?>"><?php echo e($claim->status->label()); ?></span></td>
                            <td><?php echo e($claim->created_at->diffForHumans()); ?></td>
                            <td class="text-end"><a href="<?php echo e(route('admin.claims.show', $claim)); ?>" class="btn btn-sm btn-outline-secondary">View</a></td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr><td colspan="7" class="text-center text-muted py-4">No claims found.</td></tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="mt-3"><?php echo e($claims->links()); ?></div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH F:\xampp\htdocs\adcoupon-platform\resources\views/admin/claims/index.blade.php ENDPATH**/ ?>