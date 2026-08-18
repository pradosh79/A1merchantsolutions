<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $__env->yieldContent('title', 'Offers'); ?> - <?php echo e(config('company.name')); ?></title>
    <link rel="icon" href="<?php echo e(asset('favicon.ico')); ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Hanken+Grotesk:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <!--
        Bootstrap 5 implementation of the approved homepage design. All copy
        below (offers, categories, counts) is rendered from backend data -
        see App\Http\Controllers\Public\HomeController. Brand colors/logo
        come from config/company.php, not hardcoded, so re-branding is a
        config/.env change, not a template edit.
    -->
    <style>
        :root {
            --brand-orange: #F47820;
            --brand-orange-dark: #DD5A02;
            --brand-red: #BA310C;
            --brand-navy: #1C3F94;
            --brand-navy-dark: #142B66;
        }
        body{ font-family: "Hanken Grotesk", sans-serif;}
        .bg-brand-orange { background-color: var(--brand-orange) !important; }
        .bg-brand-navy { background-color: var(--brand-navy) !important; }
        .text-brand-orange { color: var(--brand-orange) !important; }
        .btn-brand-orange { background-color: var(--brand-orange); border-color: var(--brand-orange); color: #fff; }
        .btn-brand-orange:hover { background-color: var(--brand-orange-dark); border-color: var(--brand-orange-dark); color: #fff; }
        .btn-outline-brand-orange { border-color: var(--brand-orange); color: var(--brand-orange); }
        .btn-outline-brand-orange:hover { background-color: var(--brand-orange); color: #fff; }
        .logo-badge { background: #fff; border-radius: 50%; display: inline-flex; align-items: center; justify-content: center; }
        .category-pill.active { background-color: var(--brand-orange) !important; color: #fff !important; border-color: var(--brand-orange) !important; }
        h2{color:#1f2937;}
        .text-muted{color:#797f87;font-weight:400;font-size:18px;}
        .input-group-lg>.form-control{border:1px solid #F47820;}
/* =========================================
   A-1 MERCHANT SOLUTIONS HEADER
========================================= */

.site-header {
    position: relative;
    width: 100%;
    height: 80px;
    background: #ffffff;
    border-bottom: 1px solid #eeeeee;
    z-index: 1000;
}


/* =========================================
   HEADER INNER
========================================= */

.site-header-inner {
    position: relative;
    width: 100%;
    height: 80px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 0 74px;
}


/* =========================================
   LEFT CONTACT AREA
========================================= */

.header-left {
    display: flex;
    align-items: center;
    gap: 12px;
}

.header-contact {
    display: inline-flex;
    align-items: center;
    gap: 12px;
    color: #797f87;
    font-size: 18px;
    font-weight: 500;
    text-decoration: none;
    white-space: nowrap;
}

.header-contact:hover {
    color: #ff6b00;
}

.header-contact i {
    font-size: 18px;
}

.header-divider {
    width: 1px;
    height: 13px;
    background: #d5d5d5;
}


/* =========================================
   CENTER LOGO
========================================= */

.header-logo {
    position: absolute;
    left: 50%;
    top: 41px;
    transform: translateX(-50%);
    width: 82px;
    height: 82px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: #ffffff;
    border-radius: 50%;
    z-index: 20;
    text-decoration: none;
}

.header-logo img {
    width: 170px;
    height: 170px;
    object-fit: contain;
    display: block;
}


/* =========================================
   RIGHT SIDE
========================================= */

.header-right {
    display: flex;
    align-items: center;
    gap: 7px;
}


/* Category */

.category-link {
    display: flex;
    align-items: flex-end;
    gap: 8px;
    margin-right: 15px;
    padding: 0;
    border: 0;
    background: transparent;
    color: #1F2937;
    font-size: 18px;
    font-weight: 400;
    cursor: pointer;
}

.category-link:hover {
    color: #ff6b00;
}

.category-link i {
    font-size: 16px;
}


/* =========================================
   USER / LOGOUT BUTTON
========================================= */

.header-icon-btn {
    width: 25px;
    height: 25px;
    display: flex;
    align-items: center;
    justify-content: center;
    border: 0;
    border-radius: 6px;
    background: #ff7620;
    color: #ffffff;
    text-decoration: none;
    cursor: pointer;
    transition: all 0.2s ease;
}

.header-icon-btn:hover {
    background: #f26108;
    color: #ffffff;
}

.header-icon-btn i {
    font-size: 11px;
}


/* Logout */

.logout-form {
    margin: 0;
    padding: 0;
}

.logout-btn {
    background: #ffe1ce;
    color: #444444;
}

.logout-btn:hover {
    background: #ffd0b2;
    color: #222222;
}


/* =========================================
   ADMIN NAVIGATION
========================================= */

.admin-navigation {
    position: absolute;
    top: 50px;
    right: 74px;
    min-width: 190px;
    background: #ffffff;
    border: 1px solid #eeeeee;
    border-radius: 8px;
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.12);
    z-index: 9999;
}

.admin-navigation-inner {
    display: flex;
    flex-direction: column;
    padding: 8px;
}

.admin-navigation-inner a {
    display: block;
    padding: 9px 12px;
    color: #273142;
    font-size: 12px;
    text-decoration: none;
    border-radius: 5px;
}

.admin-navigation-inner a:hover {
    background: #fff1e8;
    color: #ff6b00;
}

.custom-class{min-height:810px;}
.display-6{font-size:4.5em;}
.align-center{margin-top:8rem;}
.custom-form input[type="email"], .custom-newsletter input[type="email"]{background:#f8d1b4;border:1px solid #f8d1b4;}
.custom-form button, .custom-newsletter button{font-weight:400 !important;background:#fff;color:#000;transition:all 0.5s ease-in-out;border:1px solid #fff;}
.custom-form button:hover, .custom-newsletter button:hover{background:#000;color:#fff;border:1px solid #000;}
.custom-form button i{color:#f47820;}
.custom-list-item{display:flex;align-items:center;gap:5px;}
.custom-list-item i{font-size:8px;}
.custom-form + ul.list-inline{display:flex;margin-bottom:180px;}
.custom-gap span{display:flex;gap:8px;}
.custom-gap span i{font-size:16px;}
.custom-newsletter h2{font-size:3rem;}
.custom-newsletter p{font-size:18px;}
.custom-newsletter p.small{opacity:0.7; font-size:13px;}
.custom-newsletter .opacity-70{opacity:0.7;}
.custom-newsletter .input-group-text{background:#f8d1b4;padding-right:5px;}
.form-control:focus{box-shadow:none;}
.custom-design .custom-col{padding-left:75px;padding-right:75px;}
.custom-design .custom-col img{width:50%;margin-left:210px;}
.custom-design .custom-col .text-muted{font-size:15px;}
.custom-right img{width:46px;height:46px;}
.custom-right .text-muted{font-size:15px;}
.user-btn{width:40px;height:40px;}
.user-btn img{width:30px;height:30px;}
.logout-btn{width:40px;height:40px;}

/* =========================================
   MOBILE
========================================= */

@media (max-width: 768px) {

    .site-header-inner {
        padding: 0 20px;
    }

    .header-left {
        gap: 18px;
    }

    .header-contact span {
        display: none;
    }

    .header-divider {
        display: none;
    }

    .header-logo {
        width: 70px;
        height: 70px;
    }

    .header-logo img {
        width: 60px;
        height: 60px;
    }

    .category-link {
        margin-right: 5px;
    }

    .admin-navigation {
        right: 20px;
    }
}


@media (max-width: 480px) {

    .site-header-inner {
        padding: 0 12px;
    }

    .header-logo {
        width: 64px;
        height: 64px;
    }

    .header-logo img {
        width: 55px;
        height: 55px;
    }

    .header-right {
        gap: 5px;
    }

    .header-icon-btn {
        width: 28px;
        height: 28px;
    }

}

    </style>
    <?php echo $__env->yieldPushContent('styles'); ?>
</head>
<body class="bg-light d-flex flex-column min-vh-100">

<header class="site-header">

    <div class="site-header-inner">

        
        <div class="header-left">

            <a href="tel:1800000000" class="header-contact">
                <i class="bi bi-telephone"></i>
                <span>1800-000-000</span>
            </a>

            <span class="header-divider"></span>

            <a href="mailto:a1merchantsolutions@gmail.com" class="header-contact">
                <i class="bi bi-envelope"></i>
                <span>a1merchantsolutions@gmail.com</span>
            </a>

        </div>


        
        <a class="header-logo"
           href="<?php echo e(route('admin.dashboard')); ?>">

            <img
                src="<?php echo e(asset(ltrim(config('company.logo'), '/'))); ?>"
                alt="<?php echo e(config('company.name')); ?>"
            >

        </a>


        
        <div class="header-right">

            
            <div class="category-wrapper">

                <button
                    class="category-link"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#adminNav"
                    aria-expanded="false"
                    aria-controls="adminNav"
                >
                    <span>Category</span>
                    <i class="bi bi-chevron-down"></i>
                </button>

            </div>


            
            <?php if(auth()->guard()->check()): ?>

                <span class="header-icon-btn user-btn">
                    <img src="/images/user-square.png" alt="user">
                </span>

                
                <form
                    method="POST"
                    action="<?php echo e(route('admin.logout')); ?>"
                    class="logout-form"
                >
                    <?php echo csrf_field(); ?>

                    <button
                        type="submit"
                        class="header-icon-btn logout-btn"
                        title="Logout"
                    >
                        <img src="/images/log-out.png" alt="log-out">
                    </button>
                </form>

            <?php endif; ?>

        </div>

    </div>


    
    <div class="admin-navigation collapse" id="adminNav">

        <div class="admin-navigation-inner">

            <a href="<?php echo e(route('home')); ?>"
               class="<?php echo e(! request('category') && request()->routeIs('home') ? 'active' : ''); ?>">
                All
            </a>

            <?php $__currentLoopData = \App\Enums\CampaignCategory::options(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <a href="<?php echo e(route('home', ['category' => $cat['value']])); ?>"
                   class="<?php echo e(request('category') === $cat['value'] ? 'active' : ''); ?>">
                    <?php echo e($cat['label']); ?>

                </a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </div>

    </div>

</header>

<main class="flex-grow-1">
    <?php if(session('status')): ?>
        <div class="container mt-3">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?php echo e(session('status')); ?>

                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        </div>
    <?php endif; ?>
    <?php echo $__env->yieldContent('content'); ?>
</main>


<footer class="bg-brand-navy text-white pt-5 pb-4 mt-5 text-center position-relative" style="padding-top:0;">
    <div class="position-absolute start-50 translate-middle-x" style="top:-70px;">
        <span class="logo-badge shadow d-inline-flex align-items-center justify-content-center" style="width:150px; height:150px;">
            <img src="<?php echo e(asset(ltrim(config('company.logo'), '/'))); ?>" alt="<?php echo e(config('company.name')); ?>" height="128">
        </span>
    </div>

    <div class="container" style="padding-top:96px; padding-bottom:12px;">
        <p class="mb-2 fs-3 fw-bold"><i class="bi bi-telephone-fill me-2"></i><?php echo e(config('company.phone')); ?></p>
        <p class="mb-4 fs-5 fw-semibold"><i class="bi bi-envelope-fill me-2"></i><?php echo e(config('company.email')); ?></p>

        
        <div class="mb-5">
            <a href="<?php echo e(config('company.social.facebook') ?: '#'); ?>" class="d-inline-flex align-items-center justify-content-center" style="width:35px; height:35px; border-radius:10px; color:var(--brand-orange); font-size:1.1rem;"><i class="bi bi-facebook"></i></a>
            <a href="<?php echo e(config('company.social.instagram') ?: '#'); ?>" class="d-inline-flex align-items-center justify-content-center" style="width:35px; height:35px; border-radius:10px; color:var(--brand-orange); font-size:1.1rem;"><i class="bi bi-instagram"></i></a>
            <a href="<?php echo e(config('company.social.pinterest') ?: '#'); ?>" class="d-inline-flex align-items-center justify-content-center" style="width:35px; height:35px; border-radius:50%; color:var(--brand-orange); font-size:1.1rem;"><i class="bi bi-pinterest"></i></a>
            <?php if(config('company.social.linkedin')): ?>
                <a href="<?php echo e(config('company.social.linkedin')); ?>" class="d-inline-flex align-items-center justify-content-center" style="width:35px; height:35px;  border-radius:10px; color:var(--brand-orange); font-size:1.1rem;"><i class="bi bi-linkedin"></i></a>
            <?php endif; ?>
        </div>

        <hr class="border-light opacity-25">

        <p class="small text-white-50 mb-0 pt-2">
            &copy; <?php echo e(date('Y')); ?> by <?php echo e(str_replace(' ', '', config('company.name'))); ?> - All Rights Reserved
        </p>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<?php echo $__env->yieldPushContent('scripts'); ?>
</body>
</html>
<?php /**PATH F:\xampp\htdocs\adcoupon-platform\resources\views/layouts/public.blade.php ENDPATH**/ ?>