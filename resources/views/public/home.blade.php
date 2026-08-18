@extends('layouts.public')
@section('title', 'One Destination, Endless Savings')

@section('content')

{{-- ============ HERO ============ --}}
{{-- Background image is fully backend-managed: Admin > Homepage Settings
     (HomepageContentService::heroImageUrl()). The image already ships with
     its own brand-orange field, so it tiles seamlessly with .bg-brand-orange
     as a fallback while it loads / if none is set. --}}
<section class="custom-class bg-brand-orange text-white position-relative overflow-hidden"
         style="background-image:url('{{ $heroImageUrl }}'); background-size:cover; background-position:center right;">
    <div class="container py-5">
        <div class="row align-center gy-4">
            <div class="col-lg-7">
                <h1 class="display-6 fw-bold">ONE DESTINATION,<br>ENDLESS SAVINGS!</h1>
                <p class="lead opacity-90">Explore exclusive discounts, limited-time offers, and<br/>
                exciting deals &mdash; all in one place. Browse by category and start saving today.</p>

                <form method="POST" action="{{ route('public.newsletter.subscribe') }}" class="custom-form d-flex gap-2 my-4">
                    @csrf
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

            {{-- Right column intentionally left empty on lg+ - the hero
                 background image itself supplies the artwork there. --}}
            <div class="col-lg-5 d-none d-lg-block" style="min-height:420px;"></div>
        </div>
    </div>
</section>

{{-- ============ BROWSE CAMPAIGNS ============ --}}
<section class="container py-5">
    <div class="text-center mb-4">
        <h2 class="fw-bold">Browse Campaigns By <span class="text-brand-orange">CATEGORY</span></h2>
        <p class="text-muted">Discover exclusive deals and limited-time offers from your favorite brands. Browse by category and save more.</p>
    </div>

    <form method="GET" action="{{ route('home') }}" class="mx-auto mb-4" style="max-width:640px;" data-campaign-search>
        @if ($activeCategory)
            <input type="hidden" name="category" value="{{ $activeCategory }}">
        @endif
        <div class="input-group input-group-lg">
            <input type="search" name="search" value="{{ $search }}" class="form-control" placeholder="Search for stores, brands or offers...">
            <button class="btn btn-brand-orange" type="submit"><i class="bi bi-search"></i></button>
        </div>
    </form>

    <div class="d-flex flex-wrap justify-content-center gap-2 mb-4">
        <a href="{{ route('home', array_filter(['search' => $search])) }}" data-category=""
           class="btn btn-outline-secondary rounded-pill category-pill {{ ! $activeCategory ? 'active' : '' }}">
            <i class="bi bi-grid-fill me-1"></i>All
        </a>
        @foreach ($categories as $cat)
            <a href="{{ route('home', array_filter(['category' => $cat['value'], 'search' => $search])) }}" data-category="{{ $cat['value'] }}"
               class="btn btn-outline-secondary rounded-pill category-pill {{ $activeCategory === $cat['value'] ? 'active' : '' }}">
                @if ($cat['icon_url'])
                    <img src="{{ $cat['icon_url'] }}" alt="" width="20" height="20" class="me-1" style="object-fit:contain;">
                @else
                    <i class="bi {{ $cat['icon'] }} me-1"></i>
                @endif
                {{ $cat['label'] }}
            </a>
        @endforeach
    </div>

    <div id="campaign-results">
        @include('public._campaigns')
    </div>
</section>

{{-- ============ NEWSLETTER BANNER ============ --}}
<section class="bg-brand-orange text-white py-5 position-relative newsletter-banner">

    {{-- Left decorative "MEGA SALE / UPTO 70% OFF" diagonal ribbon, matching the mockup --}}
    <div class="newsletter-ribbon-left d-none d-md-block" aria-hidden="true">
        <!--<span class="ribbon-tag ribbon-tag-gold">MEGA SALE</span>-->
        <!--<span class="ribbon-tag ribbon-tag-red">UPTO 70% OFF <em>SHOP NOW</em></span>-->
        <img src="/images/mega-sale.png" alt="mega-sale" class="megasale">
    </div>

    {{-- Right decorative "SPECIAL OFFER" folded ribbon, matching the mockup --}}
    <div class="newsletter-ribbon-right d-none d-md-block" aria-hidden="true">
       <img src="/images/special-offer.png" alt="special-offer" class="special-offer">
    </div>

    <div class="custom-newsletter container text-center position-relative">
        <h2 class="fw-bold text-white">Subscribe Newsletter</h2>
        <p class="opacity-70 mb-4">Join our newsletter for exclusive offers, fresh deals, and<br/> limited-time discounts delivered to your inbox.</p>
        <form method="POST" action="{{ route('public.newsletter.subscribe') }}" class="d-flex gap-2 mx-auto" >
            @csrf
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

@push('styles')
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
@endpush

{{-- ============ 3 SIMPLE STEPS ============ --}}
<section class="container pt-5" style="padding-bottom:2rem;">
    <div class="custom-design row align-items-start gy-5">
        <div class="custom-col col-lg-5">
            <h2 class="fw-bold">Get Amazing Deals in Just <span class="text-brand-orange">3 SIMPLE STEPS</span></h2>
            <p class="text-muted">Finding great deals has never been easier. Browse offers, choose your favorite promotions, and start saving in just a few clicks.</p>

            {{-- Decorative dashed flow-arrow pointing toward the steps list --}}
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

@endsection

@push('scripts')
<script>
(function () {
    var form = document.querySelector('[data-campaign-search]');
    var results = document.getElementById('campaign-results');
    if (!results) return;

    var pillWrap = document.querySelector('.category-pill') ? document.querySelector('.category-pill').parentElement : null;
    var searchInput = form ? form.querySelector('input[name="search"]') : null;
    var baseUrl = form ? form.getAttribute('action') : window.location.pathname;

    var state = {
        category: @json($activeCategory) || '',
        search: @json($search) || ''
    };
    var debounceTimer = null;
    var lastController = null;

    function buildUrl(overrideUrl) {
        if (overrideUrl) return overrideUrl;
        var params = new URLSearchParams();
        if (state.category) params.set('category', state.category);
        if (state.search) params.set('search', state.search);
        var qs = params.toString();
        return baseUrl + (qs ? ('?' + qs) : '');
    }

    function setActivePill() {
        document.querySelectorAll('.category-pill').forEach(function (pill) {
            var cat = pill.getAttribute('data-category') || '';
            pill.classList.toggle('active', cat === state.category);
        });
    }

    function fetchResults(url, push) {
        var target = buildUrl(url);
        if (lastController) lastController.abort();
        lastController = new AbortController();

        results.style.opacity = '0.5';
        fetch(target, {
            headers: { 'X-Requested-With': 'XMLHttpRequest', 'Accept': 'text/html' },
            signal: lastController.signal
        })
            .then(function (r) { return r.text(); })
            .then(function (html) {
                results.innerHTML = html;
                results.style.opacity = '';
                if (push !== false) window.history.pushState({ campaign: true }, '', target);
            })
            .catch(function (err) {
                if (err.name !== 'AbortError') { results.style.opacity = ''; }
            });
    }

    // Search: submit + live (debounced) — never reloads.
    if (form) {
        form.addEventListener('submit', function (e) {
            e.preventDefault();
            state.search = searchInput ? searchInput.value.trim() : '';
            fetchResults();
        });
    }
    if (searchInput) {
        searchInput.addEventListener('input', function () {
            clearTimeout(debounceTimer);
            debounceTimer = setTimeout(function () {
                state.search = searchInput.value.trim();
                fetchResults();
            }, 350);
        });
    }

    // Category pills.
    document.querySelectorAll('.category-pill').forEach(function (pill) {
        pill.addEventListener('click', function (e) {
            e.preventDefault();
            state.category = pill.getAttribute('data-category') || '';
            setActivePill();
            fetchResults();
        });
    });

    // "Load More" / pagination links rendered inside the results region.
    // Only these are intercepted — offer links (Get Coupon / Check Offer) must
    // navigate normally to the offer page.
    results.addEventListener('click', function (e) {
        var link = e.target.closest('a[href]');
        if (!link || !results.contains(link)) return;
        var isPagination = link.hasAttribute('data-page-link') || /[?&]page=\d+/.test(link.getAttribute('href') || '');
        if (isPagination) {
            e.preventDefault();
            fetchResults(link.getAttribute('href'));
        }
    });

    // Back/forward buttons.
    window.addEventListener('popstate', function () {
        var params = new URLSearchParams(window.location.search);
        state.category = params.get('category') || '';
        state.search = params.get('search') || '';
        if (searchInput) searchInput.value = state.search;
        setActivePill();
        fetchResults(window.location.href, false);
    });
})();
</script>
@endpush
