<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Offers') - {{ config('company.name') }}</title>
    <link rel="icon" href="{{ asset('favicon.ico') }}">
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

.custom-class{min-height:810px;position:relative;}
.display-6{font-size:4.5em;}
.align-center{margin-top:8rem;}
.custom-form{max-width:620px;}
.custom-form input[type="email"], .custom-newsletter input[type="email"]{background:#f8d1b4;border:1px solid #f8d1b4;}
.custom-form button, .custom-newsletter button{font-weight:400 !important;background:#fff;color:#000;transition:all 0.5s ease-in-out;border:1px solid #fff;}
.custom-form button:hover, .custom-newsletter button:hover{background:#000;color:#fff;border:1px solid #000;}
.custom-form button i{color:#f47820;}
.custom-list-item{display:flex;align-items:center;gap:5px;}
.custom-list-item i{font-size:8px;}
.custom-form + ul.list-inline{display:flex;margin-bottom:180px;}
.custom-gap span{display:flex;gap:8px;}
.custom-gap span i{font-size:16px;}
.custom-newsletter form{max-width:620px;}
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
.customdiv .custom-campaign h5{font-size:24px;font-weight:700;}
.customdiv .custom-campaign h5+p.text-muted{color:#1F2937 !important;font-weight:700;}
.customdiv{padding:10px; border-radius:15px; max-width:32%;}
.customdiv .card{background:transparent;}
.custom-gap{gap:10px;}
.customdiv:nth-child(odd){background:#f8d1b4;}
.customdiv:nth-child(even){background:#f47820;}
.customdiv .card p.customp{font-size: 12px;padding-left:38px;text-align: left;color:rgba(0,0,0,0.4);margin-bottom:0;}
.customdiv .col-6 .small.text-muted{color:#219BB4 !important;}
.customdiv .custom-text-muted{font-size:14px; color:rgba(0,0,0,0.4);}
.right-border{border-right:1px solid rgba(0,0,0,0.1);}
.get-coupon, .check-offer{height:60px;display:flex;align-items:center;text-align:center;font-size:19px;padding:0px;max-width:50%;border-radius:10px;box-shadow:4px 0 10px rgba(0,0,0,0.2);}
.check-offer{background:#fff;border:1px solid #fff;display:flex;justify-content:center;gap:5px;}
.check-offer:hover{background:rgba(255,255,255,0.5);color:#f47820;}
.get-coupon img{padding:4px 8px 4px 4px;display:flex;justify-content: flex-start;}
.customdiv:nth-child(even) h5{color:#fff;}
.customdiv:nth-child(even) .custom-campaign h5+p.text-muted{color:#fff !important;}
.customdiv:nth-child(even) .custom-campaign .text-secondary{color:rgba(255,255,255,0.6) !important; text-transform:capitalize;}
.customdiv:nth-child(even) .get-coupon{background:#fff;border:1px solid #fff;color:#f47820;}
.customdiv:nth-child(even) .get-coupon:hover{background:rgba(255,255,255,0.6);color:#f47820;border:1px solid rgba(255,255,255,0.1);}
.custom-right .text-brand-orange{font-size:3.1rem;line-height:1;}
.custom-filter-btn .rounded-pill{box-shadow:4px 0px 15px rgba(0,0,0,0.2); border-radius:10px !important};
.custom-filter-btn a.rounded-pill:nth-child(2){border:1px solid #219BB4;}

/* =========================================
   MOBILE
========================================= */
@media (max-width:1360px){
    .get-coupon, .check-offer{font-size:15px;}
}
@media (max-width:1280px){
    .display-6{font-size:3.5rem;}
    .lead{font-size:1.20rem;}
    .custom-form{max-width:530px;}
    .special-offer{width:404px !important;top:-8px !important;}
}

@media (max-width:1180px){
    .header-logo img{width: 138px;height:138px;}
    .header-contact, .category-link{font-size:16px};
    .lead{font-size:1.00rem;}
    .display-6{font-size:2.5rem;}
    .custom-form{max-width:434px;}
    .custom-form button, .custom-newsletter button{font-size:16px;}
    .custom-form .form-control-lg{font-size:1.00rem;}
    .custom-form + .me-4{margin-right:1 rem;}
    .customdiv .custom-campaign h5{font-size:20px;}
    .customdiv .custom-campaign h5+p.text-muted{font-size:16px;}
    .customdiv .card p.customp{font-size:11px;padding-left:22px;}
    .customdiv .col-6 .small.text-muted, .customdiv .custom-text-muted{font-size:12px;}
    .custom-campaign .d-flex.gap-2.mt-4{gap: 19px !important;flex-wrap: wrap;}
    .get-coupon, .check-offer{height:48px;max-width: 57%;justify-content: center;margin:auto;}
    .get-coupon img{width:30%;}
    .custom-design .custom-col{padding-left:45px;padding-right:45px;}
    .custom-class{min-height:720px;}
}

@media (max-width:1024px){
    .custom-form + ul.list-inline{margin-bottom:113px;}
    .custom-class{min-height:689px;}
    .check-offer img{max-width:17%;}
    .custom-gap + p{font-size:14px;}
    .custom-newsletter form{max-width:545px;}
    .custom-newsletter input[type="email"]{font-size:1rem;}
    .custom-newsletter h2{font-size:2rem;}
    .custom-newsletter p{font-size:17px;}
    footer .fs-3{font-size:calc(1rem + .6vw)!important;}
    .header-logo img{width:129px;height:129px;}
    .header-divider{display:none;}
    .header-left{flex-direction:column;align-items:flex-start;gap:0;}
    .custom-design .custom-col img{margin-left:157px;margin-top:-15px;}
}

@media (max-width:992px){
    .lead{font-size:0.80rem;}
    .custom-form + ul.list-inline{margin-bottom:91px;}
    .custom-class{min-height:651px;}
    .special-offer{width:313px !important; top:-3px !important;}
    .newsletter-banner .megasale{width:63% !important;}
}

@media (max-width:991px){
   .newsletter-banner .megasale{width:62% !important;} 
   .custom-design .custom-col img{display:none;}
    .lead{font-size:0.70rem;}
    .custom-form{max-width:407px;}
    .custom-list-item.me-4{margin-right:1rem !important;font-size:14px;}
    .customdiv{max-width:49%;}
}

@media (max-width:932px){
    .newsletter-banner .megasale{width:55% !important;}  
    .newsletter-banner{height:375px !important;}
}

@media (max-width:915px){
    .custom-newsletter form{max-width:500px;}
}

@media (max-width:896px){
   .display-6{font-size: 2rem;}
   .custom-form .form-control-lg{font-size:0.80rem;}
   .custom-form{width:358px;}
   .custom-form button, .custom-newsletter button{font-size:14px;}
   .custom-class{min-height:590px;}
   .custom-newsletter form{max-width:475px;}
}

@media (max-width:844px){
    .custom-list-item.me-4, .custom-list-item{font-size:13px;}
    .newsletter-banner .megasale{width:49% !important;}
    .newsletter-banner{height:340px !important;}
}

@media (max-width:820px){
   .newsletter-banner{height:330px !important;} 
   .newsletter-banner .megasale{width:46% !important;}
}

@media (max-width: 768px) {

    .site-header-inner {
        padding: 0 20px;
    }

    .header-left {
        gap: 0;
    }

    .header-divider {
        display: none;
    }

    .header-logo {
        width: 100px;
        height: 100px;
    }

    .header-logo img {
        width: 100px;
        height: 100px;
    }

    .category-link {
        margin-right: 5px;
    }

    .admin-navigation {
        right: 20px;
    }
}

@media (max-width:767px){
    .get-coupon, .check-offer{max-width:100%;}
    .get-coupon img{width:24%;}
}


@media (max-width:667px){
    .custom-col h2{font-size:calc(1.0rem + .9vw);}
    .custom-right .text-brand-orange{font-size:2.1rem;line-height:1.5;}
}

@media (max-width:580px){
    .custom-class::after{position:absolute; left:0; right:0; top:0; bottom:0; width:100%; content:''; background:rgba(0,0,0,0.4);}
    .custom-class .col-lg-7{z-index:9;}
    .header-contact i{font-size:15px;}
    .header-contact{font-size:12px;}
    .text-muted{font-size:16px;}
}

@media (max-width:540px){
    .newsletter-banner{height:278px !important;}
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
    
    .customdiv{max-width:94%; margin-left:auto; margin-right:auto;}
    .custom-newsletter p{font-size:15px;}
    .custom-design .custom-col{text-align: center;padding-left:30px;padding-right:30px;}

}

@media (max-width:440px){
    .custom-col h2{font-size:calc(0.90rem + .9vw);}
    .custom-right .text-brand-orange{font-size:2rem;}
    .lead{font-size:0.9rem;}
    .input-group-lg>.form-control{font-size:1rem;}
}

@media (max-width:390px){
    .custom-newsletter p{font-size:14px;}
    .custom-right .text-muted{font-size:14px;}
    .custom-right h5{font-size:1.1rem;}
    .custom-list-item.me-4{margin-right:0.5rem !important;}
}

    </style>
    @stack('styles')
</head>
<body class="bg-light d-flex flex-column min-vh-100">

<header class="site-header">

    <div class="site-header-inner">

        {{-- LEFT: Contact Information --}}
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


        {{-- CENTER: Logo --}}
        <a class="header-logo"
           href="{{ route('admin.login') }}">

            <img
                src="{{ asset('public/' . ltrim(config('company.logo'), '/')) }}"
                alt="{{ config('company.name') }}"
            >

        </a>


        {{-- RIGHT SIDE --}}
        <div class="header-right">

            {{-- Category --}}
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


            {{-- User --}}
            @auth

                <span class="header-icon-btn user-btn">
                    <img src="/images/user-square.png" alt="user">
                </span>

                {{-- Logout --}}
                <form
                    method="POST"
                    action="{{ route('admin.logout') }}"
                    class="logout-form"
                >
                    @csrf

                    <button
                        type="submit"
                        class="header-icon-btn logout-btn"
                        title="Logout"
                    >
                        <img src="/images/log-out.png" alt="log-out">
                    </button>
                </form>

            @endauth

        </div>

    </div>


    {{-- CATEGORY NAVIGATION - same categories as the homepage's
         "Browse Campaigns By CATEGORY" section, selecting one jumps to the
         homepage filtered by that category. --}}
    <div class="admin-navigation collapse" id="adminNav">

        <div class="admin-navigation-inner">

            <a href="{{ route('home') }}"
               class="{{ ! request('category') && request()->routeIs('home') ? 'active' : '' }}">
                All
            </a>

            @foreach (\App\Enums\CampaignCategory::options() as $cat)
                <a href="{{ route('home', ['category' => $cat['value']]) }}"
                   class="{{ request('category') === $cat['value'] ? 'active' : '' }}">
                    {{ $cat['label'] }}
                </a>
            @endforeach

        </div>

    </div>

</header>

<main class="flex-grow-1">
    @if (session('status'))
        <div class="container mt-3">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('status') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        </div>
    @endif
    @yield('content')
</main>

{{-- Centered, stacked footer: logo badge straddles the top edge of the
     navy band (half on the white section above, half on navy), then
     generously spaced phone / email / social icons / copyright, all
     centered - matching the approved design (large breathing room above
     the footer, bold contact text, orange-outlined square social icons). --}}
<footer class="bg-brand-navy text-white pt-5 pb-4 mt-5 text-center position-relative" style="padding-top:0;">
    <div class="position-absolute start-50 translate-middle-x" style="top:-70px;">
        <span class="logo-badge shadow d-inline-flex align-items-center justify-content-center" style="width:150px; height:150px;">
            <img src="{{ asset('public/' . ltrim(config('company.logo'), '/')) }}" alt="{{ config('company.name') }}" height="128">
        </span>
    </div>

    <div class="container" style="padding-top:96px; padding-bottom:12px;">
        <p class="mb-2 fs-3 fw-bold"><i class="bi bi-telephone-fill me-2"></i>{{ config('company.phone') }}</p>
        <p class="mb-4 fs-5 fw-semibold"><i class="bi bi-envelope-fill me-2"></i>{{ config('company.email') }}</p>

        {{-- Social links default to "#" until real profile URLs are added
             via COMPANY_FACEBOOK_URL / COMPANY_INSTAGRAM_URL /
             COMPANY_PINTEREST_URL in .env, so the icons always render to
             match the design rather than disappearing when unset. --}}
        <div class="mb-5">
            <a href="{{ config('company.social.facebook') ?: '#' }}" class="d-inline-flex align-items-center justify-content-center" style="width:35px; height:35px; border-radius:10px; color:var(--brand-orange); font-size:1.1rem;"><i class="bi bi-facebook"></i></a>
            <a href="{{ config('company.social.instagram') ?: '#' }}" class="d-inline-flex align-items-center justify-content-center" style="width:35px; height:35px; border-radius:10px; color:var(--brand-orange); font-size:1.1rem;"><i class="bi bi-instagram"></i></a>
            <a href="{{ config('company.social.pinterest') ?: '#' }}" class="d-inline-flex align-items-center justify-content-center" style="width:35px; height:35px; border-radius:50%; color:var(--brand-orange); font-size:1.1rem;"><i class="bi bi-pinterest"></i></a>
            @if (config('company.social.linkedin'))
                <a href="{{ config('company.social.linkedin') }}" class="d-inline-flex align-items-center justify-content-center" style="width:35px; height:35px;  border-radius:10px; color:var(--brand-orange); font-size:1.1rem;"><i class="bi bi-linkedin"></i></a>
            @endif
        </div>

        <hr class="border-light opacity-25">

        <p class="small text-white-50 mb-0 pt-2">
            &copy; {{ date('Y') }} by {{ str_replace(' ', '', config('company.name')) }} - All Rights Reserved
        </p>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
@stack('scripts')
</body>
</html>
