<?php

namespace Tests\Feature\Admin;

use App\Enums\CampaignCategory;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class HomepageSettingsTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_can_replace_the_hero_image(): void
    {
        Storage::fake('public');
        $admin = User::factory()->create();

        $response = $this->actingAs($admin)->post(route('admin.homepage-settings.update'), [
            'hero_image' => UploadedFile::fake()->image('hero.jpg', 1600, 900),
        ]);

        $response->assertRedirect(route('admin.homepage-settings.edit'));
        $this->assertDatabaseHas('site_settings', ['key' => 'hero_image']);
    }

    public function test_admin_can_replace_a_category_icon(): void
    {
        Storage::fake('public');
        $admin = User::factory()->create();

        $response = $this->actingAs($admin)->post(route('admin.homepage-settings.update'), [
            'category_icons' => [
                CampaignCategory::Sports->value => UploadedFile::fake()->image('sports.png', 64, 64),
            ],
        ]);

        $response->assertRedirect();
        $this->assertDatabaseHas('category_icons', ['category' => CampaignCategory::Sports->value]);
    }

    public function test_homepage_reflects_the_configured_hero_image(): void
    {
        Storage::fake('public');
        $admin = User::factory()->create();

        $this->actingAs($admin)->post(route('admin.homepage-settings.update'), [
            'hero_image' => UploadedFile::fake()->image('hero.jpg'),
        ]);

        $response = $this->get(route('home'));

        $response->assertOk();
        $response->assertSee('background-image', false);
    }
}
