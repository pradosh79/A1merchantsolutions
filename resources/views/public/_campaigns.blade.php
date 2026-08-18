{{-- AJAX-swappable results region for "Browse Campaigns By Category".
     Rendered server-side on first paint and returned on its own for XHR
     requests (see HomeController::__invoke) so filtering/paging never reloads. --}}
<p class="text-center text-muted small">
    Showing {{ $offers->firstItem() ?? 0 }}-{{ $offers->lastItem() ?? 0 }} of {{ $offers->total() }} campaigns
</p>

<div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 g-4 custom-gap">
    @forelse ($offers as $offer)
        <div class="col customdiv">
            <div class="card h-100 border-0">
                <div class="position-relative">
                    <img src="{{ $offer->imageUrl() ?? 'https://placehold.co/400x220/f96a09/ffffff?text='.urlencode($offer->title) }}"
                         class="card-img-top" style="height:234px; object-fit:cover; border-radius:15px;" alt="{{ $offer->title }}">
                    @if ($offer->category)
                        <span class="badge bg-dark position-absolute top-0 start-0 m-2">{{ $offer->categoryLabel() }}</span>
                    @endif
                    @if ($offer->advertiser?->logoUrl())
                        <img src="{{ $offer->advertiser->logoUrl() }}" alt="{{ $offer->advertiser->name }}"
                             class="position-absolute top-0 end-0 m-2 bg-white rounded-circle p-1" style="width:36px; height:36px; object-fit:contain;">
                    @endif
                </div>
                <div class="card-body d-flex flex-column text-center custom-campaign">
                    <h5 class="card-title mb-1">{{ $offer->title }}</h5>
                    <p class="text-muted small mb-2">by {{ $offer->advertiser->name ?? 'Partner Brand' }}</p>
                    <p class="card-text small text-secondary mb-0">{{ \Illuminate\Support\Str::limit($offer->description, 90) }}</p>

                    <div class="row g-2 mt-3 text-center rounded bg-light">
                        <div class="col-6 pb-2 ">
                            <div class="p-2 h-100 right-border">
                                <div class="small text-muted mt-1"><i class="bi bi-qr-code-scan"></i> Scan &amp; Redeem</div>
                                <p class="customp">Scan the QR code to reem this offer</p>
                                <img src="{{ route('public.offer.qr', $offer) }}" alt="Scan to claim" width="64" height="64">
                            </div>
                        </div>
                        <div class="col-6 pb-2">
                            <div class="p-2 h-100 d-flex flex-column justify-content-center">
                                <div class="small text-muted">Offered by</div>
                                <div class="fw-semibold small text-truncate">{{ $offer->advertiser->name ?? '—' }}</div>
                                @if ($offer->ends_at)
                                    <p class="small custom-text-muted mb-0"><i class="bi bi-clock"></i> Valid till {{ $offer->ends_at->format('jS M Y') }}</p>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="d-flex gap-2 mt-4">
                        <a href="{{ route('public.offer', $offer) }}" class="get-coupon btn btn-brand-orange btn-sm flex-fill">
                            <img src="/images/ticket2.png" alt="coupon">Get Coupon
                        </a>
                        <a href="{{ route('public.offer', $offer) }}" class="check-offer btn btn-outline-brand-orange btn-sm flex-fill">
                            Check Offer <img src="/images/bxs_offer.png" alt="offer">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    @empty
        <div class="col-12">
            <div class="alert alert-secondary text-center">
                No active campaigns{{ $activeCategory ? ' in this category' : '' }}{{ $search ? ' matching “'.$search.'”' : '' }} right now &mdash; check back soon!
            </div>
        </div>
    @endforelse
</div>

<p class="text-center text-muted mt-4">Explore more deals, discover bigger savings, and never miss an exclusive offer. New promotions are added regularly.</p>

@if ($offers->hasMorePages())
    <div class="text-center">
        <a href="{{ $offers->nextPageUrl() }}" class="btn btn-brand-orange px-4" data-page-link>Load More <i class="bi bi-arrow-repeat"></i></a>
    </div>
@endif
