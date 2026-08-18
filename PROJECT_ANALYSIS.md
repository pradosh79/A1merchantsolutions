# Architecture & Delivery Analysis — AdCoupon Platform

## 1. Scope delivered

A complete Laravel 12 backend for: screen-triggered offer discovery, coupon
claiming, QR-coded coupon delivery by email, one-time merchant redemption,
and a full admin panel (CRUD + analytics + logs), with a REST API layer
mirroring every public/merchant flow. Frontend is deliberately a disposable
Bootstrap 5 placeholder layer, isolated from backend logic by design (see
README section 7).

**118 PHP source files** across Actions, Services, Repositories, Interfaces,
DTOs, Enums, Events, Listeners, Mail, Notifications, Jobs, Models, Http
(Controllers/Requests/Resources/Middleware), Policies, Providers, migrations,
factories, seeders, and tests.

## 2. Why this shape (Repository + Service + Action)

- **Repositories** isolate every Eloquent query behind an interface
  (`app/Interfaces/*RepositoryInterface`). Controllers and Services never
  build raw queries. Swapping MySQL for something else, or adding caching,
  touches only `app/Repositories/*` and the binding in
  `RepositoryServiceProvider`.
- **Services** hold business rules and orchestrate repositories + events
  (`ClaimService`, `RedemptionService`, `CouponService`, `AnalyticsService`,
  etc). They're the single reuse point for both Blade controllers and API
  controllers — this is what makes "backend first, frontend later" actually
  work: nothing about the claim/redemption/analytics logic is duplicated
  between the Bootstrap placeholder pages and `/api/v1/*`.
- **Actions** are single-method, single-purpose classes for things that are
  reused in more than one Service or are easiest to unit-test in isolation:
  coupon code generation, QR rendering, the atomic "burn a coupon" state
  transition, and CSV export.

## 3. Data model (ERD summary)

```
advertisers 1---* offers *---* screens   (offer_screen pivot)
offers      1---* claims
screens     1---* claims (nullable — a claim always has an offer, only
                            optionally a screen it was claimed from)
users        (admin accounts only — no relation to consumers)
activity_logs  -> nullable FKs to screen/offer/advertiser/claim + polymorphic
                  `subject` for anything else logged in the future
```

Key constraints:
- `claims.coupon_code` — unique, NOT NULL, hidden from default model
  serialization (`Claim::$hidden`). It is generated *before* the row is
  inserted (see `ClaimService::createClaim`), so there's no window where a
  claim exists without a redeemable code.
- `advertisers.redemption_token` — unique, rotatable (`AdvertiserService::
  rotateRedemptionToken`), acts as the sole credential for
  `/r/{advertiser_token}` (no merchant login system was requested/needed).
- Composite indexes on `claims(status, expires_at)` and
  `claims(coupon_code, status)` support the redemption hot path; on
  `activity_logs(type, created_at)` for the dashboard's time-series queries.

## 4. Concurrency safety on redemption

The most important correctness property in this system is "a coupon can be
redeemed at most once," even under concurrent scans (e.g., a customer shows
the same QR to two staff members at once, or a double-tap on the scan
button). `BurnCouponAction` wraps the read-check-write in
`DB::transaction()` with `->lockForUpdate()` on the claim row, so the second
concurrent request blocks until the first transaction commits, then sees the
already-updated `status = redeemed` and returns `ALREADY_REDEEMED` instead of
double-burning the coupon.

## 5. Security notes

- Coupon codes are **never** sent to the browser: not on the public
  confirmation page, not in the default `ClaimResource` API payload
  (`coupon_code` is only included when a caller explicitly calls
  `ClaimResource::withCouponCode()`, reserved for admin views and the
  authenticated `/api/v1/claims/{uuid}` lookup).
- The claim endpoint is rate-limited per IP (`throttle:claims`, default 5/min,
  configurable via `COUPON_CLAIM_RATE_LIMIT_PER_MINUTE`) to slow down
  coupon-farming bots; duplicate-claim detection additionally blocks the same
  email from re-claiming the same offer within a configurable window.
- Merchant redemption has no password — the long random `redemption_token`
  (default 40 chars) is the credential, validated on every request by
  `EnsureAdvertiserTokenIsValid` middleware, and can be rotated instantly from
  the admin panel if a link leaks (old links stop working immediately).
- Admin deletion actions require `super_admin` role (`*Policy::delete`);
  regular `admin` role can create/update but not delete, enforced via
  Policies, not ad-hoc controller checks.
- All Form Requests separate validation from authorization
  (`authorize()` vs `rules()`), and controllers never validate input inline.

## 6. Observability: the activity_logs table

Every meaningful funnel event writes one row to `activity_logs` via an
Event/Listener pair (not called directly from controllers, so the same
logging fires whether the request came from Blade or the API):
`qr_scan`, `screen_arrival`, `offer_click`, `offer_tap`, `coupon_claim`,
`coupon_email_sent`, `coupon_email_failed`, `redemption_success`,
`redemption_failed`, `validation_failure`. `AnalyticsService` and the two
admin "Coupon Logs" / "Redemption Logs" screens read exclusively from this
table plus the denormalized `offers.claims_count` /
`offers.redemptions_count` counters (kept in sync inside the same DB
transaction that creates a claim / burns a coupon, so counters can't drift
from the underlying rows under normal operation).

## 7. Known limitations / explicit non-goals

- **Not executed in this environment.** The sandbox that produced this code
  has no PHP/Composer/MySQL/network access to Packagist, so the code is
  hand-written to Laravel 12 conventions and statically checked (see
  section 8) rather than run through `composer install` + `php artisan test`.
  Please run the test suite locally before deploying — see README section 2.
- No multi-tenant admin scoping yet (any admin account can see/edit every
  advertiser). Policies are already the enforcement point, so adding
  `advertiser_id` scoping later is a contained change.
- No SMS/push notification channel — email is the only coupon delivery
  channel, matching the spec.
- Screen "arrival" vs "QR scan" are currently logged as the same event
  (`ActivityType::QrScan` fires on every `/s/{screen}` hit); a distinct
  "arrival" signal (e.g. dwell-time/beacon) would need new instrumentation,
  not just a new Enum case (the case already exists: `ScreenArrival`).

## 8. Static verification performed

Since the sandbox cannot run PHP, the following automated checks were run
against all 143 PHP files instead:

1. Every file starts with `<?php` and has balanced braces/parentheses.
2. Every `class`/`interface`/`enum`/`trait` name matches its filename
   (PSR-4), and every file's `namespace` matches its directory path.
3. Every `use App\...` import resolves to a real file at the expected path.
4. Every named route referenced via `route('...')` in controllers/views/tests
   is actually defined in `routes/*.php` (accounting for route-group name
   prefixes and `Route::resource()` auto-naming).

All checks passed. Manual review additionally traced the claim, redemption,
and analytics flows end-to-end for consistency between DTOs, repositories,
services, events/listeners, and views.

## 9. Suggested next steps

1. `composer install`, configure `.env`, `php artisan migrate --seed`,
   `php artisan test` — confirm green before anything else.
2. Point a real SMTP provider at `.env` (`MAIL_*`) and test the coupon email
   end-to-end, including the QR attachment.
3. Wire the Figma frontend into `resources/views/public/**` /
   `resources/views/merchant/**` (Blade) or `/api/v1/*` (headless) per
   README section 7.
4. Add per-advertiser admin scoping if multiple brands will have their own
   restricted admin logins later.

---

## 10. Update — pending backend work completed (session 2)

This section records the follow-up pass that turned the "hand-written but
never executed" delivery (see §7.1 and §8) into an executed-and-verified one,
as far as an offline environment allows, and closed the one real backend gap
found during review.

### 10.1 Verification actually performed (not just static checks)

- **PHP parse of every file.** All 200 backend PHP files were run through the
  real `php -l` parser (PHP 8.3): **0 syntax errors**. This is stronger than
  the brace/paren balancing done in §8.
- **The framework-independent core was executed**, not just read. A standalone
  harness (no Laravel, no DB) exercised every Enum, DTO, Exception,
  `MaskHelper`, and the coupon-code generator's algorithm — **59/59 assertions
  passed**. This catches classes of defect a static pass cannot, notably a
  missing `match` arm (which only throws `\UnhandledMatchError` at runtime),
  the coupon alphabet correctly excluding ambiguous `0/O/1/I`, `ClaimData`
  email lower-casing/trimming, and the `RedemptionResult` → HTTP-status map
  (200/409/404/410/403).
- **All referenced Blade views were confirmed to exist on disk** (25 controller
  views + the `emails.coupon-issued` mailable view) — a missing view is a
  runtime 500 that static class-name checks don't surface.

**Result of the review:** the core flows (claim, race-safe redemption,
analytics, events/listeners, repositories) are internally consistent, and
migration columns line up with every model's `$fillable`/casts and with the
factories. No crash-level bug was found in the core.

### 10.2 Gap closed: the `screen_arrival` funnel metric was dead

`AnalyticsService::dashboard()` reads a `todays_arrivals` figure from
`ActivityType::ScreenArrival`, but nothing ever wrote that log — only
`qr_scan` fired on a `/s/{screen}` hit — so the dashboard widget was
permanently `0` (the limitation noted in §7).

`App\Listeners\LogScreenView` now records **both** `qr_scan` and
`screen_arrival` for the same screen view, so the "Arrivals" widget reflects
reality. A `/s/{screen}` hit is genuinely both events for this product (there
is no separate beacon), so this is truthful, not double-counting across
distinct signals. It is a one-listener change and is reversible: if a distinct
arrival source (beacon / dwell-time) is added later, move the `ScreenArrival`
write there and drop it from the listener. A new test,
`tests/Feature/Public/ScreenViewTest.php`, asserts both rows are written on a
screen view (and that an inactive screen 404s and logs nothing).

### 10.3 Minor cleanup

- `App\Models\User` no longer imports `HasUuids` or the `MustVerifyEmail`
  contract — both were imported but never applied (UUIDs are set in
  `booted()`; the model does not implement `MustVerifyEmail`).

### 10.4 Still requires a networked machine (unchanged from §9)

A full `composer install` + live `php artisan test` could **not** be run in the
build sandbox: its egress allowlist blocks Packagist and getcomposer.org
(confirmed HTTP 403), so Laravel's dependency tree can't be fetched here. This
is the same class of constraint as the original delivery. Run, on a machine
with network:

```bash
composer install
php artisan key:generate
php artisan migrate --seed
php artisan test        # expect green; ScreenViewTest covers the §10.2 change
```

Everything else in §9 (wire SMTP and test the coupon email + QR attachment;
swap in the Figma frontend; optional per-advertiser admin scoping) remains as
previously scoped.

---

## Update — admin delete, newsletter CMS, and no-reload category search

Three requested changes, all additive and covered by new feature tests.

### 1. Delete functionality on admin lists

`destroy()` + resource routes already existed for advertisers, offers, and
screens; only the UI button was missing. Added a trash button (with a JS
`confirm()`) to each index view (`advertisers`, `offers`, `screens`). Foreign
keys are `cascadeOnDelete` (offers→claims, advertiser→offers) or `nullOnDelete`
(claims.screen_id, activity_logs.*), so deleting a row with dependents does not
raise a constraint error. `tests/Feature/Admin/AdminDeleteButtonsTest.php`
covers both the button rendering and the actual deletes.

### 2. Newsletter CMS (CRUD) in the admin

New `Admin\NewsletterSubscriberController` managing the emails captured by the
public homepage signup (`newsletter_subscribers`): searchable/filterable list
with subscribed/unsubscribed stats, add, edit, delete, a one-click
subscribe/unsubscribe **toggle**, and a **CSV export**. Backed by
`Store`/`UpdateNewsletterSubscriberRequest` (email normalised + unique,
ignoring self on update), four Blade views under `admin/newsletter/`, a
"Newsletter" nav link, and routes under the admin group (`export` and `toggle`
declared before the `Route::resource('newsletter', …)->except(['show'])`).
`unsubscribed_at` was added to the model's `$fillable` so the admin can set it.
`tests/Feature/Admin/NewsletterCrudTest.php` covers create/duplicate/update/
toggle/delete/export.

### 3. "Browse Campaigns By Category" no longer reloads the page

The search box, category pills, and "Load More" were plain GET links that
reloaded the whole homepage. The results region (count line + grid +
pagination) was extracted into `resources/views/public/_campaigns.blade.php`
and wrapped in `<div id="campaign-results">`. `HomeController::__invoke` now
returns just that partial for `$request->ajax()` requests. A small progressive-
enhancement script (pushed to the layout's `scripts` stack) intercepts the
search (with debounced live search), the category pills, "Load More", and
back/forward navigation — fetching the partial over XHR and swapping the grid
in place while updating the URL via `history.pushState`. With JS disabled the
original full-page GET behaviour still works. `tests/Feature/Public/
HomeCampaignFilterTest.php` asserts the XHR response is the partial only and
that search filters correctly.

All PHP files lint clean (`php -l`) and Blade directive nesting is balanced;
run `php artisan test` on a networked machine to execute the new feature tests.

---

## Update — newsletter emails (welcome + admin send)

- **Welcome email on subscribe.** `Public\NewsletterController::store` now sends
  `NewsletterWelcomeMail` to genuinely-new subscribers (`wasRecentlyCreated`),
  wrapped in try/catch so a mail failure never breaks the subscribe flow.
  Repeat subscribes don't re-send. Template: `emails/newsletter-welcome`.
- **Admin "Send Newsletter".** New `compose`/`send` actions on the admin
  newsletter controller, a "Send Newsletter" button on the list, and
  `admin/newsletter/compose.blade.php`. Sends an admin-authored subject/HTML
  body to all subscribed addresses (or a single test address), one isolated
  send per recipient (failures logged, run continues). Mailable:
  `NewsletterBroadcastMail` / `emails/newsletter-broadcast`.
- **One-click unsubscribe.** Both emails carry a signed unsubscribe link
  (`public.newsletter.unsubscribe`); unsigned requests are rejected (403).
- Delivery is inline because `QUEUE_CONNECTION=sync`; both mails go through the
  same SMTP account, so they only work once the mail config is valid on the
  server. Tests: `NewsletterWelcomeTest`, `NewsletterSendTest`.
