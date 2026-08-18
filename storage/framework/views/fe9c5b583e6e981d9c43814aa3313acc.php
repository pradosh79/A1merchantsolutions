<?php $__env->startSection('title', 'Add Subscriber'); ?>
<?php $__env->startSection('content'); ?>
    <h2 class="mb-3">Add Subscriber</h2>
    <div class="card">
        <div class="card-body">
            <form method="POST" action="<?php echo e(route('admin.newsletter.store')); ?>">
                <?php echo $__env->make('admin.newsletter._form', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                <button type="submit" class="btn btn-primary">Save</button>
                <a href="<?php echo e(route('admin.newsletter.index')); ?>" class="btn btn-outline-secondary">Cancel</a>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/u533806958/domains/a1merchantsolutions.triviio.com/public_html/resources/views/admin/newsletter/create.blade.php ENDPATH**/ ?>