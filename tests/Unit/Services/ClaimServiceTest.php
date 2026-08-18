<?php

namespace Tests\Unit\Services;

use App\DTO\ClaimData;
use App\Exceptions\DuplicateClaimException;
use App\Exceptions\OfferNotClaimableException;
use App\Models\Offer;
use App\Services\ClaimService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class ClaimServiceTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_throws_when_offer_is_not_active(): void
    {
        Storage::fake('public');
        $offer = Offer::factory()->draft()->create();

        $this->expectException(OfferNotClaimableException::class);

        $this->app->make(ClaimService::class)->createClaim(ClaimData::fromArray([
            'offer_id' => $offer->id,
            'name' => 'Test',
            'email' => 'test@example.com',
        ]));
    }

    public function test_it_throws_when_offer_reached_max_claims(): void
    {
        Storage::fake('public');
        $offer = Offer::factory()->create(['max_claims' => 1, 'claims_count' => 1]);

        $this->expectException(OfferNotClaimableException::class);

        $this->app->make(ClaimService::class)->createClaim(ClaimData::fromArray([
            'offer_id' => $offer->id,
            'name' => 'Test',
            'email' => 'test2@example.com',
        ]));
    }

    public function test_it_blocks_duplicate_claims_from_same_email_within_window(): void
    {
        Storage::fake('public');
        Mail::fake();
        $offer = Offer::factory()->create();

        $service = $this->app->make(ClaimService::class);

        $service->createClaim(ClaimData::fromArray([
            'offer_id' => $offer->id,
            'name' => 'Test',
            'email' => 'dup2@example.com',
        ]));

        $this->expectException(DuplicateClaimException::class);

        $service->createClaim(ClaimData::fromArray([
            'offer_id' => $offer->id,
            'name' => 'Test',
            'email' => 'dup2@example.com',
        ]));
    }
}
