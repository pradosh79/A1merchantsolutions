# AdCoupon Platform — Laravel 12 Backend

A production-ready backend for a digital-signage coupon platform: consumers scan a
QR code on a physical screen, claim an offer, receive a coupon by email, and a
merchant redeems it once via a secure scanner link. Admins manage advertisers,
offers, screens, and see full analytics.

**This is a backend-first build.** All frontend views are intentionally plain
Bootstrap 5 placeholders (CDN-loaded, no build step required) so a Figma design
can replace `resources/views/**` later without touching a single controller,
service, route, or migration.

## 0b. Update: backend-managed homepage images + design refinements

- **Hero image and category icons are now editable from the admin panel**
  (Admin > Homepage Settings, `Admin\HomepageSettingsController`,
  `HomepageContentService`) instead of being hardcoded in Blade/CSS. Two new
  tables back this: `site_settings` (currently just the hero image) and
  `category_icons` (one optional uploaded icon per `CampaignCategory`,
  falling back to a Bootstrap Icon if none is uploaded). Uploads go through
  the `public` disk exactly like offer/advertiser images already did.
- The hero section now renders the real supplied hero-banner artwork
  (`public/images/hero-default.png`, seeded via `HomepageDefaultsSeeder`) as
  a background image instead of a CSS/icon-built graphic.
- The "3 Simple Steps" section and the footer were rebuilt to match the
  approved mockup more closely (orange numerals + gray icon circles +
  dashed flow-arrow; centered stacked footer with the logo straddling the
  section boundary).
- **The public site header was intentionally left untouched** - it had
  already been custom-built (see `resources/views/layouts/public.blade.php`,
  the `.site-header` block) and works correctly; only the `<main>` content
  and `<footer>` below it were touched in that file.
- `config('company.email')` was corrected to match the address already
  hardcoded in the header (`a1merchantsolutions@gmail.com`) so the footer
  never contradicts it.

## 0. Update: approved homepage design is live

The client-approved homepage design is now implemented at `GET /`
(`resources/views/public/home.blade.php`, backed by
`App\Http\Controllers\Public\HomeController`), branded with the **A-1 Merchant
Solutions** logo (`public/images/logo.png`, wired into the public header/footer,
the admin navbar, the admin login page, and the coupon email). The admin panel
and merchant scanner remain the Bootstrap placeholder UI described below —
only the public homepage was redesigned.

Two deliberate deviations from the source design, both driven by the security
model already built into the backend:

- **No live coupon code or redemption QR on the homepage.** Coupon codes are
  only ever emailed after a real claim (see `ClaimService`) — showing one on
  a public card would defeat that. Each card instead shows a QR that links to
  the offer's own page (`GET /o/{offer}/qr.svg`, `OfferQrController`), i.e.
  "scan to view & claim," not "scan to redeem."
- **Category browsing is real, not decorative.** `offers.category` was added
  (`CampaignCategory` enum: Lifestyle, Sports, Food & Drinks, E-Commerce,
  Fashion, Beauty, Entertainment, Others) and the pills/search on the
  homepage actually filter `OfferRepository::publicPaginate()` — nothing is
  hardcoded HTML with fake counts.

Also added: a real newsletter capture (`newsletter_subscribers` table,
`NewsletterController`) behind both "Subscribe Now" forms, and
`config/company.php` centralizing brand name/phone/email/logo/social links so
rebranding is an `.env` change, not a template edit. Run
`php artisan db:seed --class=HomepageOffersSeeder` (included in
`DatabaseSeeder`) to populate the homepage with the 9 demo campaigns shown in
the approved mockup.

---

## 1. Requirements

- PHP 8.2+
- Composer 2.x
- MySQL 8 (or MariaDB 10.6+)
- Node.js 18+ (only needed later, for a real frontend build — not required today)

> **Note on this delivery:** this sandbox environment has no PHP/Composer/MySQL
> available, so the code here was hand-written to the Laravel 12 conventions
> and statically verified (PSR-4 class/namespace/file consistency, brace/paren
> balance, route-name cross-references) but has **not** been executed with
> `composer install` / `php artisan test`. Run the commands in section 2 on
> your machine to install dependencies and confirm everything boots — the
> commands below are exactly what you need.

## 2. Setup

```bash
composer install
cp .env.example .env        # already copied for you, edit DB_* credentials
php artisan key:generate

# create a MySQL database matching DB_DATABASE in .env, then:
php artisan migrate --seed
php artisan storage:link

php artisan serve            # http://127.0.0.1:8000
php artisan queue:work       # required: coupon emails are queued
```

Seeded admin login: **admin@adplatform.test / password** (`AdminUserSeeder`).

Run the test suite:

```bash
php artisan test
```

## 3. Architecture at a glance

```
app/
  Actions/        Single-purpose units (GenerateUniqueCouponCode, GenerateQrCode,
                   BurnCoupon, ExportClaimsToCsv)
  Services/        Orchestration + business rules (ClaimService, CouponService,
                   RedemptionService, OfferService, AdvertiserService,
                   ScreenService, AnalyticsService)
  Repositories/    Eloquent persistence, one per aggregate, bound to...
  Interfaces/      ...repository contracts (swap persistence without touching
                   services/controllers)
  DTO/             Immutable transport objects between layers (ClaimData,
                   CouponData, RedemptionData)
  Enums/            OfferStatus, ClaimStatus, AdvertiserStatus, ScreenStatus,
                   ActivityType, RedemptionResult
  Events/Listeners/ ClaimCreated -> SendCouponEmail (queued) + LogClaimActivity
                   RedemptionAttempted -> LogRedemptionActivity
                   OfferInteracted -> LogOfferInteraction
                   ScreenViewed -> LogScreenView
  Mail/             CouponIssuedMail (queued, attaches the QR)
  Notifications/    OfferNearingClaimLimitNotification (mail + database)
  Jobs/             ExpireStaleClaimsJob (hourly schedule)
  Models/           User, Advertiser, Screen, Offer, Claim, ActivityLog
  Http/
    Controllers/
      Admin/         Session-authenticated CRUD + dashboard + logs
      Public/         /s/{screen}, /o/{offer}, /claim, /confirmation
      Merchant/       /r/{advertiser_token} scanner + redeem
      Api/V1/         Headless mirror of Public/Merchant + a small Admin API
                       (Sanctum) — same Services, zero duplicated logic
    Requests/        Form Request validation (Admin/Public/Merchant)
    Resources/       API Resources (never leak coupon_code unless explicitly
                       opted in via ->withCouponCode())
  Policies/         Advertiser/Offer/Screen/Claim authorization
```

Controllers are intentionally thin: validate (Form Request) -> call a
Service -> return a response. All business rules live in `app/Services` and
`app/Actions`, which is also what the API controllers call — so the future
Figma frontend (whether Blade, a SPA, or a mobile app) never needs new backend
logic, only new routes/views/serializers if any.

## 4. Database

| Table | Purpose |
|---|---|
| `advertisers` | Brands; holds the rotatable `redemption_token` used in `/r/{token}` |
| `screens` | Physical signage displays; `code` is the public `/s/{code}` slug |
| `offers` | Belongs to an advertiser, many-to-many with `screens` via `offer_screen` |
| `claims` | One per consumer claim; holds `coupon_code` (hidden from serialization), `qr_code_path`, `status`, `expires_at` |
| `activity_logs` | Append-only funnel log: qr_scan, offer_click/tap, coupon_claim, coupon_email_sent/failed, redemption_success/failed, validation_failure |
| `users` | Admin accounts only (`role`: admin / super_admin) — consumers never get accounts |

Indexes are on every foreign key plus the columns used for filtering/analytics
(`claims.status + expires_at`, `claims.coupon_code + status`,
`activity_logs.type + created_at`, etc). See `database/migrations/`.

## 5. Core flows

**Claim flow** (`ClaimService::createClaim`): validate offer is claimable ->
block duplicate claims (same email/offer within a configurable window) ->
generate a unique coupon code + SVG QR (`CouponService`/Actions) -> persist
the claim in one DB transaction -> increment the offer's counter -> dispatch
`ClaimCreated`, which queues the coupon email and logs the claim. The coupon
code is **never** rendered on the public confirmation page or the default API
response — only emailed.

**Redemption flow** (`RedemptionService::redeem` -> `BurnCouponAction`): the
merchant token resolves to an `Advertiser` via middleware. The coupon lookup
+ status transition happens inside `DB::transaction` with
`lockForUpdate()`, so two simultaneous scans of the same coupon can never
both succeed — the loser gets `ALREADY_REDEEMED`. Results map to
`VALID / ALREADY_REDEEMED / NOT_FOUND / EXPIRED / INVALID_MERCHANT_TOKEN`.

**Analytics** (`AnalyticsService`): today's claims/redemptions/QR
scans/taps, offer conversion rate, top advertisers by claims, and 14-day
daily series — all driven from `activity_logs` + denormalized counters on
`offers`, with CSV export via `ExportClaimsToCsvAction` (streamed, not
loaded into memory).

## 6. Public / Merchant routes

| Route | Purpose |
|---|---|
| `GET /s/{screen_id}` | Offers on a screen (logs a QR scan) |
| `GET /o/{offer}` | Offer detail + claim form (logs a click) |
| `POST /claim` | Submits the claim form |
| `GET /confirmation/{claim}` | Post-claim confirmation (no coupon code shown) |
| `GET /r/{advertiser_token}` | Merchant scanner UI |
| `POST /r/{advertiser_token}/redeem` | Validates + burns a coupon (AJAX) |

Every one of these has a REST equivalent under `/api/v1/...` for a future
headless frontend — see `routes/api.php`.

## 7. Swapping in the real (Figma) frontend later

1. Do not touch `app/`, `routes/`, `database/`.
2. Replace files under `resources/views/public/**` and `resources/views/merchant/**`
   with the new design. Every value they need is already passed in from the
   controller (see each controller's docblock).
3. If the new design is a SPA instead of Blade, point it at `/api/v1/*`
   instead — the Services underneath are already REST-ready.
4. Same applies to `resources/views/admin/**` once an admin UI redesign is
   scoped.

## 8. What's intentionally NOT built

- No payment processing (out of scope).
- No multi-tenant admin scoping (all admins currently see all advertisers —
  policies are structured so per-advertiser scoping is a small follow-up).
- `maatwebsite/excel` was deliberately **not** added; CSV export is a
  hand-rolled streamed response (`ExportClaimsToCsvAction`) to avoid an
  unnecessary heavy dependency for a single feature.

## 9. Troubleshooting: uploaded images (hero / category icons) show as broken

Symptom: you upload a hero image or category icon on **Admin → Homepage
Settings**, the page flashes "Homepage images updated.", but the thumbnail
renders as a broken image. The upload actually succeeded (the row and file are
saved) — the browser just can't reach the file. Two causes, usually together:

1. **The `public/storage` symlink is missing.** Uploaded files live in
   `storage/app/public/...` and are exposed at the `/storage/...` URL only via
   a symlink. Create it once per environment:

   ```bash
   php artisan storage:link
   ```

2. **`APP_URL` doesn't match where the app is actually served.** Uploaded-file
   URLs are built as `APP_URL . '/storage/...'`. If `APP_URL` is your
   production domain but you're testing on `http://localhost/adcoupon-platform-public`,
   the icon is requested from production (where the just-uploaded file doesn't
   exist) and 404s. Set `APP_URL` to the exact base the app runs under, then
   clear config cache:

   ```bash
   # .env — match the real base URL, including any subfolder
   APP_URL=http://localhost/adcoupon-platform-public
   php artisan config:clear
   ```

   On the live server, keep `APP_URL=https://a1merchantsolutions.triviio.com`
   and run `php artisan storage:link` there too.

The service layer now degrades gracefully: if a stored image file is not
present on disk, `HomepageContentService` falls back to the default hero /
Bootstrap category icon instead of emitting a broken `<img>` — but the two
steps above are still required for uploaded images to actually display.
