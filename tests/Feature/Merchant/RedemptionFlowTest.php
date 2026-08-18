<?php

namespace Tests\Feature\Merchant;

use App\Enums\ClaimStatus;
use App\Models\Advertiser;
use App\Models\Claim;
use App\Models\Offer;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RedemptionFlowTest extends TestCase
{
    use RefreshDatabase;

    public function test_merchant_can_redeem_a_valid_coupon_exactly_once(): void
    {
        $advertiser = Advertiser::factory()->create();
        $offer = Offer::factory()->create(['advertiser_id' => $advertiser->id]);
        $claim = Claim::factory()->create(['offer_id' => $offer->id, 'coupon_code' => 'ABCD1234']);

        $response = $this->postJson("/r/{$advertiser->redemption_token}/redeem", ['code' => 'ABCD1234']);

        $response->assertOk()->assertJson(['status' => 'VALID', 'success' => true]);

        $this->assertSame(ClaimStatus::Redeemed, $claim->fresh()->status);

        // Second scan of the same coupon must be rejected.
        $second = $this->postJson("/r/{$advertiser->redemption_token}/redeem", ['code' => 'ABCD1234']);
        $second->assertStatus(409)->assertJson(['status' => 'ALREADY_REDEEMED']);
    }

    public function test_unknown_code_returns_not_found(): void
    {
        $advertiser = Advertiser::factory()->create();

        $response = $this->postJson("/r/{$advertiser->redemption_token}/redeem", ['code' => 'NOPE0000']);

        $response->assertStatus(404)->assertJson(['status' => 'NOT_FOUND']);
    }

    public function test_expired_coupon_cannot_be_redeemed(): void
    {
        $advertiser = Advertiser::factory()->create();
        $offer = Offer::factory()->create(['advertiser_id' => $advertiser->id]);
        Claim::factory()->expired()->create([
            'offer_id' => $offer->id,
            'coupon_code' => 'OLD12345',
        ]);

        $response = $this->postJson("/r/{$advertiser->redemption_token}/redeem", ['code' => 'OLD12345']);

        $response->assertStatus(410)->assertJson(['status' => 'EXPIRED']);
    }

    public function test_invalid_advertiser_token_is_rejected(): void
    {
        $response = $this->postJson('/r/not-a-real-token/redeem', ['code' => 'ANYCODE1']);

        $response->assertStatus(403);
    }

    public function test_coupon_belonging_to_a_different_advertiser_is_not_found(): void
    {
        $advertiserA = Advertiser::factory()->create();
        $advertiserB = Advertiser::factory()->create();
        $offerB = Offer::factory()->create(['advertiser_id' => $advertiserB->id]);
        Claim::factory()->create(['offer_id' => $offerB->id, 'coupon_code' => 'CROSS001']);

        $response = $this->postJson("/r/{$advertiserA->redemption_token}/redeem", ['code' => 'CROSS001']);

        $response->assertStatus(404)->assertJson(['status' => 'NOT_FOUND']);
    }
}
