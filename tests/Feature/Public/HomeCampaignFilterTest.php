<?php

namespace Tests\Feature\Public;

use App\Models\Advertiser;
use App\Models\Offer;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class HomeCampaignFilterTest extends TestCase
{
    use RefreshDatabase;

    public function test_ajax_request_returns_only_the_results_partial(): void
    {
        $advertiser = Advertiser::factory()->create();
        Offer::factory()->create([
            'advertiser_id' => $advertiser->id,
            'title' => 'Unique Pizza Deal',
            'status' => 'active',
        ]);

        // Normal request: full page (has the search control + layout nav).
        $full = $this->get(route('home'));
        $full->assertOk()->assertSee('Browse Campaigns By');

        // XHR request: just the swappable grid, no full layout/nav.
        $xhr = $this->get(route('home', ['search' => 'Unique Pizza']), [
            'X-Requested-With' => 'XMLHttpRequest',
        ]);
        $xhr->assertOk()
            ->assertSee('Unique Pizza Deal')
            ->assertDontSee('Browse Campaigns By'); // heading lives outside the partial
    }

    public function test_search_filters_results(): void
    {
        $advertiser = Advertiser::factory()->create();
        Offer::factory()->create(['advertiser_id' => $advertiser->id, 'title' => 'Taco Tuesday', 'status' => 'active']);
        Offer::factory()->create(['advertiser_id' => $advertiser->id, 'title' => 'Burger Bonanza', 'status' => 'active']);

        $this->get(route('home', ['search' => 'Taco']), ['X-Requested-With' => 'XMLHttpRequest'])
            ->assertOk()
            ->assertSee('Taco Tuesday')
            ->assertDontSee('Burger Bonanza');
    }
}
