<?php

namespace Tests\Feature\Admin;

use App\Models\Advertiser;
use App\Models\Offer;
use App\Models\Screen;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminDeleteButtonsTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_can_delete_advertiser_offer_and_screen(): void
    {
        $admin = User::factory()->create();
        $advertiser = Advertiser::factory()->create();
        $offer = Offer::factory()->create(['advertiser_id' => $advertiser->id]);
        $screen = Screen::factory()->create();

        $this->actingAs($admin)->delete(route('admin.offers.destroy', $offer))
            ->assertRedirect(route('admin.offers.index'));
        $this->assertDatabaseMissing('offers', ['id' => $offer->id]);

        $this->actingAs($admin)->delete(route('admin.screens.destroy', $screen))
            ->assertRedirect(route('admin.screens.index'));
        $this->assertDatabaseMissing('screens', ['id' => $screen->id]);

        $this->actingAs($admin)->delete(route('admin.advertisers.destroy', $advertiser))
            ->assertRedirect(route('admin.advertisers.index'));
        $this->assertDatabaseMissing('advertisers', ['id' => $advertiser->id]);
    }

    public function test_delete_buttons_render_on_index_pages(): void
    {
        $admin = User::factory()->create();
        $advertiser = Advertiser::factory()->create();
        Offer::factory()->create(['advertiser_id' => $advertiser->id]);
        Screen::factory()->create();

        foreach (['advertisers', 'offers', 'screens'] as $section) {
            $this->actingAs($admin)->get(route("admin.$section.index"))
                ->assertOk()
                ->assertSee('bi-trash', false);
        }
    }
}
