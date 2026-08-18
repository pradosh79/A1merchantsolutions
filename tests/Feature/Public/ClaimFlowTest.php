<?php

namespace Tests\Feature\Public;

use App\Enums\ClaimStatus;
use App\Mail\CouponIssuedMail;
use App\Models\ActivityLog;
use App\Models\Claim;
use App\Models\Offer;
use App\Models\Screen;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class ClaimFlowTest extends TestCase
{
    use RefreshDatabase;

    public function test_consumer_can_claim_an_active_offer_and_receives_coupon_email(): void
    {
        Storage::fake('public');
        Mail::fake();

        $screen = Screen::factory()->create();
        $offer = Offer::factory()->create(['max_claims' => 10, 'claims_count' => 0]);
        $offer->screens()->attach($screen);

        $response = $this->post('/claim', [
            'offer_id' => $offer->id,
            'screen_id' => $screen->id,
            'name' => 'Jane Doe',
            'email' => 'jane@example.com',
            'phone' => '5551234567',
        ]);

        $claim = Claim::withoutGlobalScopes()->where('email', 'jane@example.com')->first();

        $response->assertRedirect(route('public.confirmation', $claim->uuid));

        $this->assertNotNull($claim);
        $this->assertSame(ClaimStatus::Claimed, $claim->status);
        $this->assertNotEmpty($claim->getRawOriginal('coupon_code'));
        $this->assertNotEmpty($claim->qr_code_path);
        Storage::disk('public')->assertExists($claim->qr_code_path);

        $offer->refresh();
        $this->assertSame(1, $offer->claims_count);

        Mail::assertQueued(CouponIssuedMail::class, fn ($mail) => $mail->claim->id === $claim->id);

        $this->assertDatabaseHas('activity_logs', [
            'type' => 'coupon_claim',
            'claim_id' => $claim->id,
        ]);
    }

    public function test_duplicate_claim_within_window_is_rejected(): void
    {
        Mail::fake();

        $offer = Offer::factory()->create();

        $this->post('/claim', [
            'offer_id' => $offer->id,
            'name' => 'Jane Doe',
            'email' => 'dup@example.com',
        ]);

        $response = $this->post('/claim', [
            'offer_id' => $offer->id,
            'name' => 'Jane Doe',
            'email' => 'dup@example.com',
        ]);

        $response->assertSessionHasErrors('claim');
        $this->assertSame(1, Claim::withoutGlobalScopes()->where('email', 'dup@example.com')->count());
    }

    public function test_confirmation_page_never_exposes_the_coupon_code(): void
    {
        Mail::fake();

        $offer = Offer::factory()->create();

        $this->post('/claim', [
            'offer_id' => $offer->id,
            'name' => 'Jane Doe',
            'email' => 'secure@example.com',
        ]);

        $claim = Claim::withoutGlobalScopes()->where('email', 'secure@example.com')->first();

        $response = $this->get(route('public.confirmation', $claim->uuid));

        $response->assertOk();
        $response->assertDontSee($claim->getRawOriginal('coupon_code'));
    }
}
