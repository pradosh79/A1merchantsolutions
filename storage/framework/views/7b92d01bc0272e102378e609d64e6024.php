<?php $__env->startSection('title', 'New Offer'); ?>
<?php $__env->startSection('content'); ?>
    <h2 class="mb-4">New Offer</h2>
    <div class="card"><div class="card-body">
        <form method="POST" action="<?php echo e(route('admin.offers.store')); ?>" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <?php echo $__env->make('admin.offers._form', ['offer' => null, 'selectedScreenIds' => []], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
            <button type="submit" class="btn btn-primary">Create Offer</button>
            <a href="<?php echo e(route('admin.offers.index')); ?>" class="btn btn-outline-secondary">Cancel</a>
        </form>
    </div></div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH F:\xampp\htdocs\adcoupon-platform\resources\views/admin/offers/create.blade.php ENDPATH**/ ?>