
<p class="text-left text-muted small">
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
                No active campaigns<?php echo e($activeCategory ? ' in this category' : ''); ?><?php echo e($search ? ' matching “'.$search.'”' : ''); ?> right now &mdash; check back soon!
            </div>
        </div>
    <?php endif; ?>
</div>

<p class="text-center text-muted mt-4">Explore more deals, discover bigger savings, and never miss an exclusive offer. New promotions are added regularly.</p>

<?php if($offers->hasMorePages()): ?>
    <div class="text-center">
        <a href="<?php echo e($offers->nextPageUrl()); ?>" class="btn btn-brand-orange px-4" data-page-link>Load More <i class="bi bi-arrow-repeat"></i></a>
    </div>
<?php endif; ?>
<?php /**PATH /home/u533806958/domains/a1merchantsolutions.triviio.com/public_html/resources/views/public/_campaigns.blade.php ENDPATH**/ ?>