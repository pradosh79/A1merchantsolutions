<?php

namespace Tests\Feature\Api;

use App\Models\Offer;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class ClaimApiTest extends TestCase
{
    use RefreshDatabase;

    public function test_api_claim_endpoint_creates_a_claim_and_hides_coupon_code(): void
    {
        Mail::fake();

        $offer = Offer::factory()->create();

        $response = $this->postJson('/api/v1/claims', [
            'offer_id' => $offer->id,
            'name' => 'API User',
            'email' => 'api@example.com',
        ]);

        $response->assertCreated()
            ->assertJsonPath('success', true)
            ->assertJsonMissingPath('claim.coupon_code');
    }

    public function test_api_rejects_claim_for_inactive_offer(): void
    {
        $offer = Offer::factory()->draft()->create();

        $response = $this->postJson('/api/v1/claims', [
            'offer_id' => $offer->id,
            'name' => 'API User',
            'email' => 'blocked@example.com',
        ]);

        $response->assertStatus(422)->assertJsonPath('success', false);
    }
}
