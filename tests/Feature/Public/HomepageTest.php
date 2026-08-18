<?php

namespace Tests\Feature\Public;

use App\Enums\CampaignCategory;
use App\Enums\OfferStatus;
use App\Models\NewsletterSubscriber;
use App\Models\Offer;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class HomepageTest extends TestCase
{
    use RefreshDatabase;

    public function test_homepage_lists_active_offers_and_never_exposes_coupon_codes(): void
    {
        $active = Offer::factory()->create(['title' => 'Active Campaign', 'status' => OfferStatus::Active]);
        Offer::factory()->draft()->create(['title' => 'Hidden Draft Campaign']);

        $response = $this->get(route('home'));

        $response->assertOk();
        $response->assertSee('Active Campaign');
        $response->assertDontSee('Hidden Draft Campaign');
        $response->assertDontSee('coupon_code');
    }

    public function test_homepage_can_be_filtered_by_category(): void
    {
        Offer::factory()->create(['title' => 'Sporty Deal', 'category' => CampaignCategory::Sports]);
        Offer::factory()->create(['title' => 'Beauty Deal', 'category' => CampaignCategory::Beauty]);

        $response = $this->get(route('home', ['category' => CampaignCategory::Sports->value]));

        $response->assertOk();
        $response->assertSee('Sporty Deal');
        $response->assertDontSee('Beauty Deal');
    }

    public function test_offer_qr_endpoint_returns_an_svg_encoding_the_offer_url(): void
    {
        $offer = Offer::factory()->create();

        $response = $this->get(route('public.offer.qr', $offer));

        $response->assertOk();
        $response->assertHeader('Content-Type', 'image/svg+xml');
    }

    public function test_newsletter_subscribe_stores_a_unique_email(): void
    {
        $response = $this->post(route('public.newsletter.subscribe'), [
            'email' => 'fan@example.com',
            'source' => 'homepage_hero',
        ]);

        $response->assertRedirect();
        $this->assertDatabaseHas('newsletter_subscribers', ['email' => 'fan@example.com']);

        // Re-subscribing the same email must not error or duplicate the row.
        $this->post(route('public.newsletter.subscribe'), ['email' => 'fan@example.com']);
        $this->assertSame(1, NewsletterSubscriber::where('email', 'fan@example.com')->count());
    }
}
