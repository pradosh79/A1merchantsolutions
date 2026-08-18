<?php $__env->startSection('title', 'One Destination, Endless Savings'); ?>

<?php $__env->startSection('content'); ?>



<section class="custom-class bg-brand-orange text-white position-relative overflow-hidden"
         style="background-image:url('<?php echo e($heroImageUrl); ?>'); background-size:cover; background-position:center right;">
    <div class="container py-5">
        <div class="row align-center gy-4">
            <div class="col-lg-7">
                <h1 class="display-6 fw-bold">ONE DESTINATION,<br>ENDLESS SAVINGS!</h1>
                <p class="lead opacity-90">Explore exclusive discounts, limited-time offers, and<br/>
                exciting deals &mdash; all in one place. Browse by category and start saving today.</p>

                <form method="POST" action="<?php echo e(route('public.newsletter.subscribe')); ?>" class="custom-form d-flex gap-2 my-4">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="source" value="homepage_hero">
                    <input type="email" name="email" class="form-control form-control-lg" placeholder="Enter your E-mail Address" required>
                    <button type="submit" class="btn btn-dark btn-lg text-nowrap">Subscribe Now <i class="bi bi-bell-fill"></i></button>
                </form>

                <ul class="list-inline">
                    <li class="custom-list-item me-4"><i class="bi bi-circle-fill"></i>Coupons</li>
                    <li class="custom-list-item me-4"><i class="bi bi-circle-fill"></i>Promo Code</li>
                    <li class="custom-list-item me-4"><i class="bi bi-circle-fill"></i>QR Offers</li>
                    <li class="custom-list-item"><i class="bi bi-circle-fill"></i>Cashback Deals</li>
                </ul>

                <div class="custom-gap d-flex flex-wrap gap-4 small opacity-90">
                    <span><i class="bi bi-shield-check"></i>Secure</span>
                    <span><i class="bi bi-award"></i>Secure</span>
                    <span><i class="bi bi-headset"></i>24/7 Support</span>
                </div>
            </div>

            
            <div class="col-lg-5 d-none d-lg-block" style="min-height:420px;"></div>
        </div>
    </div>
</section>


<section class="container py-5">
    <div class="text-center mb-4">
        <h2 class="fw-bold">Browse Campaigns By <span class="text-brand-orange">CATEGORY</span></h2>
        <p class="text-muted">Discover exclusive deals and limited-time offers from your favorite brands. Browse by category and save more.</p>
    </div>

    <form method="GET" action="<?php echo e(route('home')); ?>" class="mx-auto mb-4" style="max-width:640px;">
        <?php if($activeCategory): ?>
            <input type="hidden" name="category" value="<?php echo e($activeCategory); ?>">
        <?php endif; ?>
        <div class="input-group input-group-lg">
            <input type="search" name="search" value="<?php echo e($search); ?>" class="form-control" placeholder="Search for stores, brands or offers...">
            <button class="btn btn-brand-orange" type="submit"><i class="bi bi-search"></i></button>
        </div>
    </form>

    <div class="d-flex flex-wrap justify-content-center gap-2 mb-4">
        <a href="<?php echo e(route('home', array_filter(['search' => $search]))); ?>"
           class="btn btn-outline-secondary rounded-pill category-pill <?php echo e(! $activeCategory ? 'active' : ''); ?>">
            <i class="bi bi-grid-fill me-1"></i>All
        </a>
        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <a href="<?php echo e(route('home', array_filter(['category' => $cat['value'], 'search' => $search]))); ?>"
               class="btn btn-outline-secondary rounded-pill category-pill <?php echo e($activeCategory === $cat['value'] ? 'active' : ''); ?>">
                <?php if($cat['icon_url']): ?>
                    <img src="<?php echo e($cat['icon_url']); ?>" alt="" width="20" height="20" class="me-1" style="object-fit:contain;">
                <?php else: ?>
                    <i class="bi <?php echo e($cat['icon']); ?> me-1"></i>
                <?php endif; ?>
                <?php echo e($cat['label']); ?>

            </a>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

    <p class="text-center text-muted small">
        Showing <?php echo e($offers->firstItem() ?? 0); ?>-<?php echo e($offers->lastItem() ?? 0); ?> of <?php echo e($offers->total()); ?> campaigns
    </p>

    <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 g-4 custom-gap">
        <?php $__empty_1 = true; $__currentLoopData = $offers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $offer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="col customdiv">
                <div class="card h-100 border-0">
                    <div class="position-relative">
                        <img src="<?php echo e($offer->imageUrl() ?? 'https://placehold.co/400x220/f96a09/ffffff?text='.urlencode($offer->title)); ?>"
                             class="card-img-top" style="height:234px; object-fit:cover; border-radius:15px;" alt="<?php echo e($offer->title); ?>">
                        <?php if($offer->category): ?>
                            <span class="badge bg-dark position-absolute top-0 start-0 m-2"><?php echo e($offer->categoryLabel()); ?></span>
                        <?php endif; ?>
                        <?php if($offer->advertiser?->logoUrl()): ?>
                            <img src="<?php echo e($offer->advertiser->logoUrl()); ?>" alt="<?php echo e($offer->advertiser->name); ?>"
                                 class="position-absolute top-0 end-0 m-2 bg-white rounded-circle p-1" style="width:36px; height:36px; object-fit:contain;">
                        <?php endif; ?>
                    </div>
                    <div class="card-body d-flex flex-column text-center custom-campaign">
                        <h5 class="card-title mb-1"><?php echo e($offer->title); ?></h5>
                        <p class="text-muted small mb-2">by <?php echo e($offer->advertiser->name ?? 'Partner Brand'); ?></p>
                        <p class="card-text small text-secondary mb-0"><?php echo e(\Illuminate\Support\Str::limit($offer->description, 90)); ?></p>

                        <div class="row g-2 mt-3 text-center rounded bg-light">
                            <div class="col-6 pb-2 ">
                                <div class="p-2 h-100 right-border">
                                    <div class="small text-muted mt-1"><i class="bi bi-qr-code-scan"></i> Scan &amp; Redeem</div>
                                    <p class="customp">Scan the QR code to reem this offer</p>
                                    <img src="<?php echo e(route('public.offer.qr', $offer)); ?>" alt="Scan to claim" width="64" height="64">
                                </div>
                            </div>
                            <div class="col-6 pb-2">
                                <div class="p-2 h-100 d-flex flex-column justify-content-center">
                                    <div class="small text-muted">Offered by</div>
                                    <div class="fw-semibold small text-truncate"><?php echo e($offer->advertiser->name ?? '—'); ?></div>
                                    <?php if($offer->ends_at): ?>
                                        <p class="small custom-text-muted mb-0"><i class="bi bi-clock"></i> Valid till <?php echo e($offer->ends_at->format('jS M Y')); ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>

                        

                        <div class="d-flex gap-2 mt-4">
                            <a href="<?php echo e(route('public.offer', $offer)); ?>" class="get-coupon btn btn-brand-orange btn-sm flex-fill">
                                <img src="/images/ticket2.png" alt="coupon">Get Coupon
                            </a>
                            <a href="<?php echo e(route('public.offer', $offer)); ?>" class="check-offer btn btn-outline-brand-orange btn-sm flex-fill">
                                Check Offer <img src="/images/bxs_offer.png" alt="offer">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <div class="col-12">
                <div class="alert alert-secondary text-center">
                    No active campaigns<?php echo e($activeCategory ? ' in this category' : ''); ?> right now &mdash; check back soon!
                </div>
            </div>
        <?php endif; ?>
    </div>

    <p class="text-center text-muted mt-4">Explore more deals, discover bigger savings, and never miss an exclusive offer. New promotions are added regularly.</p>

    <?php if($offers->hasMorePages()): ?>
        <div class="text-center">
            <a href="<?php echo e($offers->nextPageUrl()); ?>" class="btn btn-brand-orange px-4">Load More <i class="bi bi-arrow-repeat"></i></a>
        </div>
    <?php endif; ?>
</section>


<section class="bg-brand-orange text-white py-5 position-relative newsletter-banner">

    
    <div class="newsletter-ribbon-left d-none d-md-block" aria-hidden="true">
        <!--<span class="ribbon-tag ribbon-tag-gold">MEGA SALE</span>-->
        <!--<span class="ribbon-tag ribbon-tag-red">UPTO 70% OFF <em>SHOP NOW</em></span>-->
        <img src="/images/mega-sale.png" alt="mega-sale" class="megasale">
    </div>

    
    <div class="newsletter-ribbon-right d-none d-md-block" aria-hidden="true">
       <img src="/images/special-offer.png" alt="special-offer" class="special-offer">
    </div>

    <div class="custom-newsletter container text-center position-relative">
        <h2 class="fw-bold text-white">Subscribe Newsletter</h2>
        <p class="opacity-70 mb-4">Join our newsletter for exclusive offers, fresh deals, and<br/> limited-time discounts delivered to your inbox.</p>
        <form method="POST" action="<?php echo e(route('public.newsletter.subscribe')); ?>" class="d-flex gap-2 mx-auto" >
            <?php echo csrf_field(); ?>
            <input type="hidden" name="source" value="homepage_footer_banner">
            <div class="input-group input-group-lg">
                <span class="input-group-text border-0"><i class="bi bi-envelope text-secondary"></i></span>
                <input type="email" name="email" class="form-control border-0 newsletter-input" placeholder="Enter your E-mail Address" required>
            </div>
            <button type="submit" class="btn btn-light btn-lg text-nowrap fw-semibold">Subscribe Now <i class="bi bi-bell-fill text-brand-orange ms-1"></i></button>
        </form>
        <p class="small opacity-75 mt-2 mb-0">We respect your privacy. Unsubscribe anytime.</p>
    </div>
</section>

<?php $__env->startPush('styles'); ?>
<style>
    .newsletter-input { background-color: #fff; }
    .newsletter-input::placeholder { color: #9aa0ab; }
    .newsletter-banner{height:431px;display:flex;align-items:center;position:relative;}
    .newsletter-banner .megasale{width:66%;transform: rotate(11deg);padding-left: 21px;}
    .special-offer{width:480px;position:absolute;right:0;top:-12px;}
    .rounded-pill{display:flex;gap:3px;}
    .newsletter-ribbon-left {
        position: absolute;
        left: -40px;
        top: -42px;
        transform: rotate(-24deg);
        z-index: 1;
    }
    .ribbon-tag {
        display: block;
        padding: 10px 44px 10px 56px;
        font-weight: 800;
        letter-spacing: .03em;
        color: #fff;
        text-transform: uppercase;
        font-size: .95rem;
        white-space: nowrap;
    }
    .ribbon-tag-gold {
        background: linear-gradient(135deg, #ffd76a, #f5a623);
        margin-bottom: 4px;
    }
    .ribbon-tag-red {
        background: linear-gradient(135deg, #ff7a3d, #e8461f);
    }
    .ribbon-tag-red em { font-style: normal; font-weight: 600; font-size: .75rem; display: block; }

    .newsletter-ribbon-right {
        position: absolute;
        right: 32px;
        top: -14px;
        z-index: 1;
    }
    .ribbon-flag {
        position: relative;
        display: block;
        background: #d81f2a;
        color: #fff;
        font-weight: 800;
        text-align: center;
        line-height: 1.15;
        padding: 10px 26px 16px;
        border-radius: 4px 4px 0 0;
        box-shadow: 0 6px 10px rgba(0,0,0,.18);
    }
    .ribbon-flag::before,
    .ribbon-flag::after {
        content: "";
        position: absolute;
        bottom: -10px;
        border-style: solid;
        border-width: 10px 12px 0 12px;
    }
    .ribbon-flag::before { left: 0; border-color: #9c151d transparent transparent transparent; }
    .ribbon-flag::after { right: 0; border-color: #9c151d transparent transparent transparent; }
</style>
<?php $__env->stopPush(); ?>


<section class="container pt-5" style="padding-bottom:2rem;">
    <div class="custom-design row align-items-start gy-5">
        <div class="custom-col col-lg-5">
            <h2 class="fw-bold">Get Amazing Deals in Just <span class="text-brand-orange">3 SIMPLE STEPS</span></h2>
            <p class="text-muted">Finding great deals has never been easier. Browse offers, choose your favorite promotions, and start saving in just a few clicks.</p>

            
            <!--<svg width="140" height="90" viewBox="0 0 140 90" fill="none" class="d-none d-lg-block mt-4" aria-hidden="true">-->
            <!--    <path d="M4 4 C 4 60, 60 70, 128 70" stroke="#b9bec7" stroke-width="2.5" stroke-linecap="round" stroke-dasharray="2 10"/>-->
            <!--    <path d="M112 58 L130 70 L114 82" stroke="#b9bec7" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" fill="none"/>-->
            <!--</svg>-->
            <img src="/images/arrow-up1.png" alt="Arrow">
        </div>
        <div class="custom-right col-lg-7">
            <div class="d-flex align-items-start mb-4">
                <span class="text-brand-orange fw-bold flex-shrink-0 me-3">1.</span>
                <span class="bg-light text-secondary rounded-circle d-inline-flex align-items-center justify-content-center flex-shrink-0 me-3" style="width:56px; height:56px;">
                    <img src="/images/search.png" alt="search">
                </span>
                <div>
                    <h5 class="mb-1">Browse Offers</h5>
                    <p class="text-muted mb-0 small">Explore exclusive deals, coupons, and promotions across your favorite categories.</p>
                </div>
            </div>
            <div class="d-flex align-items-start mb-4">
                <span class="text-brand-orange fw-bold flex-shrink-0 me-3">2.</span>
                <span class="bg-light text-secondary rounded-circle d-inline-flex align-items-center justify-content-center flex-shrink-0 me-3" style="width:56px; height:56px;">
                    <img src="/images/qr.png" alt="qr">
                </span>
                <div>
                    <h5 class="mb-1">Click or Scan QR</h5>
                    <p class="text-muted mb-0 small">Select the offer that interests you and click to redeem or learn more.</p>
                </div>
            </div>
            <div class="d-flex align-items-start">
                <span class="text-brand-orange fw-bold flex-shrink-0 me-3">3.</span>
                <span class="bg-light text-secondary rounded-circle d-inline-flex align-items-center justify-content-center flex-shrink-0 me-3" style="width:56px; height:56px;">
                    <img src="/images/ticket.png" alt="ticket">
                </span>
                <div>
                    <h5 class="mb-1">Redeem &amp; Save</h5>
                    <p class="text-muted mb-0 small">Enjoy exclusive discounts and subscribe to stay updated on future deals.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.public', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/u533806958/domains/a1merchantsolutions.triviio.com/public_html/resources/views/public/home.blade.php ENDPATH**/ ?>