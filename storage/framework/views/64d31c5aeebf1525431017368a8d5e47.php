<?php $__env->startSection('title', 'Edit Offer'); ?>
<?php $__env->startSection('content'); ?>
    <h2 class="mb-4">Edit Offer</h2>
    <div class="card"><div class="card-body">
        <form method="POST" action="<?php echo e(route('admin.offers.update', $offer)); ?>" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>
            <?php echo $__env->make('admin.offers._form', ['offer' => $offer], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
            <button type="submit" class="btn btn-primary">Update Offer</button>
            <a href="<?php echo e(route('admin.offers.show', $offer)); ?>" class="btn btn-outline-secondary">Cancel</a>
        </form>
    </div></div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH F:\xampp\htdocs\adcoupon-platform\resources\views/admin/offers/edit.blade.php ENDPATH**/ ?>