<?php $__env->startSection('title', 'Newsletter'); ?>
<?php $__env->startSection('content'); ?>
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="mb-0">Newsletter Subscribers</h2>
        <div class="d-flex gap-2">
            <a href="<?php echo e(route('admin.newsletter.compose')); ?>" class="btn btn-brand-orange"><i class="bi bi-envelope-paper"></i> Send Newsletter</a>
            <a href="<?php echo e(route('admin.newsletter.export', request()->query())); ?>" class="btn btn-outline-success">
                <i class="bi bi-download"></i> Export CSV
            </a>
            <a href="<?php echo e(route('admin.newsletter.create')); ?>" class="btn btn-primary"><i class="bi bi-plus-lg"></i> Add Subscriber</a>
        </div>
    </div>

    <div class="row g-3 mb-3">
        <div class="col-sm-4"><div class="card"><div class="card-body py-2"><div class="text-muted small">Total</div><div class="h4 mb-0"><?php echo e(number_format($stats['total'])); ?></div></div></div></div>
        <div class="col-sm-4"><div class="card"><div class="card-body py-2"><div class="text-muted small">Subscribed</div><div class="h4 mb-0 text-success"><?php echo e(number_format($stats['subscribed'])); ?></div></div></div></div>
        <div class="col-sm-4"><div class="card"><div class="card-body py-2"><div class="text-muted small">Unsubscribed</div><div class="h4 mb-0 text-secondary"><?php echo e(number_format($stats['unsubscribed'])); ?></div></div></div></div>
    </div>

    <form method="GET" class="row g-2 mb-3">
        <div class="col-auto">
            <input type="text" name="search" class="form-control" placeholder="Search email/source" value="<?php echo e($filters['search'] ?? ''); ?>">
        </div>
        <div class="col-auto">
            <select name="status" class="form-select">
                <option value="">All statuses</option>
                <option value="subscribed" <?php if(($filters['status'] ?? '') === 'subscribed'): echo 'selected'; endif; ?>>Subscribed</option>
                <option value="unsubscribed" <?php if(($filters['status'] ?? '') === 'unsubscribed'): echo 'selected'; endif; ?>>Unsubscribed</option>
            </select>
        </div>
        <div class="col-auto"><button class="btn btn-primary">Filter</button></div>
        <?php if(($filters['search'] ?? null) || ($filters['status'] ?? null)): ?>
            <div class="col-auto"><a href="<?php echo e(route('admin.newsletter.index')); ?>" class="btn btn-outline-secondary">Clear</a></div>
        <?php endif; ?>
    </form>

    <div class="card">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr><th>Email</th><th>Source</th><th>Status</th><th>Added</th><th class="text-end">Actions</th></tr>
                </thead>
                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $subscribers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subscriber): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td><?php echo e($subscriber->email); ?></td>
                            <td><?php echo e($subscriber->source ?? '—'); ?></td>
                            <td>
                                <?php if($subscriber->unsubscribed_at): ?>
                                    <span class="badge bg-secondary">Unsubscribed</span>
                                <?php else: ?>
                                    <span class="badge bg-success">Subscribed</span>
                                <?php endif; ?>
                            </td>
                            <td><?php echo e($subscriber->created_at?->diffForHumans() ?? '—'); ?></td>
                            <td class="text-end">
                                <form action="<?php echo e(route('admin.newsletter.toggle', $subscriber)); ?>" method="POST" class="d-inline">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('PATCH'); ?>
                                    <button type="submit" class="btn btn-sm btn-outline-<?php echo e($subscriber->unsubscribed_at ? 'success' : 'warning'); ?>" title="<?php echo e($subscriber->unsubscribed_at ? 'Re-subscribe' : 'Unsubscribe'); ?>">
                                        <i class="bi bi-<?php echo e($subscriber->unsubscribed_at ? 'arrow-clockwise' : 'bell-slash'); ?>"></i>
                                    </button>
                                </form>
                                <a href="<?php echo e(route('admin.newsletter.edit', $subscriber)); ?>" class="btn btn-sm btn-outline-primary"><i class="bi bi-pencil"></i></a>
                                <form action="<?php echo e(route('admin.newsletter.destroy', $subscriber)); ?>" method="POST" class="d-inline" onsubmit="return confirm('Delete <?php echo e($subscriber->email); ?>? This cannot be undone.');">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button type="submit" class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr><td colspan="5" class="text-center text-muted py-4">No subscribers found.</td></tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="mt-3"><?php echo e($subscribers->links()); ?></div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH F:\xampp\htdocs\adcoupon-platform\resources\views/admin/newsletter/index.blade.php ENDPATH**/ ?>