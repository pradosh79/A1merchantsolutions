<?php

namespace Tests\Feature\Public;

use App\Models\Offer;
use App\Models\Screen;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ScreenViewTest extends TestCase
{
    use RefreshDatabase;

    public function test_visiting_a_screen_records_both_qr_scan_and_arrival(): void
    {
        $screen = Screen::factory()->create(); // status active by default
        $offer = Offer::factory()->create();
        $offer->screens()->attach($screen);

        $response = $this->get('/s/'.$screen->code);

        $response->assertOk();

        // Both funnel facts must be logged for the same screen so the admin
        // dashboard's "QR Scans" and "Arrivals" widgets are each populated.
        $this->assertDatabaseHas('activity_logs', [
            'type' => 'qr_scan',
            'screen_id' => $screen->id,
        ]);

        $this->assertDatabaseHas('activity_logs', [
            'type' => 'screen_arrival',
            'screen_id' => $screen->id,
        ]);
    }

    public function test_inactive_screen_returns_404_and_logs_nothing(): void
    {
        $screen = Screen::factory()->create(['status' => 'inactive']);

        $this->get('/s/'.$screen->code)->assertNotFound();

        $this->assertDatabaseMissing('activity_logs', ['screen_id' => $screen->id]);
    }
}
