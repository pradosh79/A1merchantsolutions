<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $__env->yieldContent('title', 'Admin'); ?> - <?php echo e(config('company.name')); ?></title>
    <link rel="icon" href="<?php echo e(asset('favicon.ico')); ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
   <style>
        .logo-badge{background:#fff;border-radius:50%;display:inline-flex;align-items:center;justify-content:center;}
        .btn-primary{border-radius:0;background-color:#f47820;border-color:#f47820;}
        .btn-primary:hover{background-color:#fe5901;border-color:#fe5901;}
        .btn-outline-light{border-radius:0px;border-color:#f47820;}
        .btn-outline-light:hover{border-color:#fe5901;}
        .btn-outline-secondary, .btn-outline-primary, .btn-outline-warning{border-radius:0;}
        .table-light tr th{background:#f5dccb;}
        .form-check-input[type=checkbox]{border-radius:0;}
        .form-check-input:focus{box-shadow:none;}
        .form-check-input:checked{background-color:#f47820;border-color:#f47820;box-shadow:none;}
        .form-label{font-weight:600;}
        .btn-outline-success{border-radius:0;}
        .homepage-design .card-header{background:#f5dccb;font-weight:600;}
        :not(.btn-check)+.btn:active{background:#fe5901;border-color:#fe5901;}
        nav[aria-label="Pagination Navigation"] svg {
            width: 20px !important;
            height: 20px !important;
            max-width: 20px !important;
            max-height: 20px !important;
            min-width: 20px !important;
            min-height: 20px !important;
            display: block !important;
            flex-shrink: 0 !important;
        }
        nav[aria-label="Pagination Navigation"] {
            width: 100%;
            margin-top: 20px;
        }
        
        /* Main pagination containers */
        nav[aria-label="Pagination Navigation"] > div {
            width: 100%;
        }
        
        /* Hide mobile pagination version */
        nav[aria-label="Pagination Navigation"] > div.sm\:hidden {
            display: none !important;
        }
        
        /* Desktop pagination */
        nav[aria-label="Pagination Navigation"] > div.hidden.sm\:flex {
            display: flex !important;
            align-items: center !important;
            justify-content: space-between !important;
            width: 100%;
        }
        
        /* Pagination links */
        nav[aria-label="Pagination Navigation"] a {
            display: inline-flex !important;
            align-items: center !important;
            justify-content: center !important;
            box-sizing: border-box !important;
            text-decoration: none !important;
        }
        
        /* Previous / Next links */
        nav[aria-label="Pagination Navigation"] a[rel="prev"],
        nav[aria-label="Pagination Navigation"] a[rel="next"] {
            min-width: 90px !important;
            height: 34px !important;
            padding: 0 12px !important;
            gap: 6px !important;
            border: 1px solid #d1d5db !important;
            border-radius: 4px !important;
            background: #fff !important;
            color: #374151 !important;
            font-size: 13px !important;
            line-height: 1 !important;
        }
        
        /* Previous / Next hover */
        nav[aria-label="Pagination Navigation"] a[rel="prev"]:hover,
        nav[aria-label="Pagination Navigation"] a[rel="next"]:hover {
            background: #f3f4f6 !important;
            color: #111827 !important;
        }
        
        /* Previous / Next SVG */
        nav[aria-label="Pagination Navigation"] a[rel="prev"] svg,
        nav[aria-label="Pagination Navigation"] a[rel="next"] svg {
            width: 16px !important;
            height: 16px !important;
            min-width: 16px !important;
            min-height: 16px !important;
            max-width: 16px !important;
            max-height: 16px !important;
            display: block !important;
        }
        
        /* Page number container */
        nav[aria-label="Pagination Navigation"] .inline-flex {
            display: inline-flex !important;
            align-items: center !important;
        }
        
        /* Page number links */
        nav[aria-label="Pagination Navigation"] .inline-flex a {
            min-width: 34px !important;
            height: 34px !important;
            padding: 0 10px !important;
            margin-left: -1px !important;
            border: 1px solid #d1d5db !important;
            background: #fff !important;
            color: #374151 !important;
            font-size: 13px !important;
        }
        
        /* First page */
        nav[aria-label="Pagination Navigation"] .inline-flex a:first-child {
            margin-left: 0 !important;
            border-radius: 4px 0 0 4px !important;
        }
        
        /* Last page */
        nav[aria-label="Pagination Navigation"] .inline-flex a:last-child {
            border-radius: 0 4px 4px 0 !important;
        }
        
        /* Current active page */
        nav[aria-label="Pagination Navigation"] .inline-flex span[aria-current="page"] {
            display: inline-flex !important;
            align-items: center !important;
            justify-content: center !important;
            min-width: 34px !important;
            height: 34px !important;
            background: #2563eb !important;
            color: #fff !important;
            font-size: 13px !important;
            font-weight: 500 !important;
        }
        
        /* Remove focus ring */
        nav[aria-label="Pagination Navigation"] a:focus {
            outline: none !important;
            box-shadow: none !important;
        }
        
        /* Prevent SVG from inheriting weird global sizing */
        nav[aria-label="Pagination Navigation"] svg {
            width: 20px !important;
            height: 20px !important;
            max-width: 20px !important;
            max-height: 20px !important;
            min-width: 20px !important;
            min-height: 20px !important;
            flex: 0 0 20px !important;
        }
    </style>
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
            <li class="nav-item"><a class="nav-link" href="<?php echo e(route('admin.homepage-settings.edit')); ?>">Homepage Settings</a></li>
        </ul>
        <?php if(auth()->guard()->check()): ?>
            <form method="POST" action="<?php echo e(route('admin.logout')); ?>" class="d-flex">
                <?php echo csrf_field(); ?>
                <span class="navbar-text text-light me-3"><?php echo e(auth()->user()->name); ?></span>
                <button class="btn btn-outline-light" type="submit"><i class="bi bi-box-arrow-right"></i> Logout</button>
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
<?php /**PATH /home/u533806958/domains/a1merchantsolutions.triviio.com/public_html/resources/views/layouts/app.blade.php ENDPATH**/ ?>