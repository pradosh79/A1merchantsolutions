<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $__env->yieldContent('title', 'Admin'); ?> - <?php echo e(config('company.name')); ?></title>
    <link rel="icon" href="<?php echo e(asset('favicon.ico')); ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <style>.logo-badge{background:#fff;border-radius:50%;display:inline-flex;align-items:center;justify-content:center;}</style>
    <!--
        PLACEHOLDER UI NOTICE
        This entire admin theme is a temporary Bootstrap 5 scaffold.
        Every value below is rendered from backend Services/Controllers -
        nothing here is hardcoded content. When the Figma design is ready,
        only files under resources/views/** need to change.
    -->
    <?php echo $__env->yieldPushContent('styles'); ?>
</head>
<body class="bg-light">

<header class="navbar navbar-expand-lg navbar-dark bg-dark px-3">
    <a class="navbar-brand d-flex align-items-center" href="<?php echo e(route('admin.dashboard')); ?>">
        <span class="logo-badge p-1 me-2">
            <img src="<?php echo e(asset(ltrim(config('company.logo'), '/'))); ?>" alt="<?php echo e(config('company.name')); ?>" height="32">
        </span>
        <?php echo e(config('company.name')); ?>

    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#adminNav">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="adminNav">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item"><a class="nav-link" href="<?php echo e(route('admin.dashboard')); ?>">Dashboard</a></li>
            <li class="nav-item"><a class="nav-link" href="<?php echo e(route('admin.advertisers.index')); ?>">Advertisers</a></li>
            <li class="nav-item"><a class="nav-link" href="<?php echo e(route('admin.offers.index')); ?>">Offers</a></li>
            <li class="nav-item"><a class="nav-link" href="<?php echo e(route('admin.screens.index')); ?>">Screens</a></li>
            <li class="nav-item"><a class="nav-link" href="<?php echo e(route('admin.claims.index')); ?>">Claims</a></li>
            <li class="nav-item"><a class="nav-link" href="<?php echo e(route('admin.analytics.index')); ?>">Analytics</a></li>
            <li class="nav-item"><a class="nav-link" href="<?php echo e(route('admin.logs.coupons')); ?>">Coupon Logs</a></li>
            <li class="nav-item"><a class="nav-link" href="<?php echo e(route('admin.logs.redemptions')); ?>">Redemption Logs</a></li>
            <li class="nav-item"><a class="nav-link" href="<?php echo e(route('admin.homepage-settings.edit')); ?>"><i class="bi bi-image"></i> Homepage Settings</a></li>
        </ul>
        <?php if(auth()->guard()->check()): ?>
            <form method="POST" action="<?php echo e(route('admin.logout')); ?>" class="d-flex">
                <?php echo csrf_field(); ?>
                <span class="navbar-text text-light me-3"><?php echo e(auth()->user()->name); ?></span>
                <button class="btn btn-outline-light btn-sm" type="submit">Logout</button>
            </form>
        <?php endif; ?>
    </div>
</header>



<main class="container-fluid py-4">
    <?php if(session('status')): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?php echo e(session('status')); ?>

            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    <?php endif; ?>

    <?php if($errors->any()): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <ul class="mb-0">
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    <?php endif; ?>

    <?php echo $__env->yieldContent('content'); ?>
</main>

<footer class="border-top bg-white text-center text-muted py-3 mt-4">
    <small><?php echo e(config('company.name')); ?> Admin &middot; &copy; <?php echo e(date('Y')); ?></small>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<?php echo $__env->yieldPushContent('scripts'); ?>
</body>
</html>
<?php /**PATH F:\xampp\htdocs\adcoupon-platform\resources\views/layouts/app.blade.php ENDPATH**/ ?>