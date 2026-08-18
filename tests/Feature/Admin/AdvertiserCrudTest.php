<?php

namespace Tests\Feature\Admin;

use App\Models\Advertiser;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdvertiserCrudTest extends TestCase
{
    use RefreshDatabase;

    public function test_guest_is_redirected_to_login(): void
    {
        $this->get(route('admin.advertisers.index'))->assertRedirect('/admin/login');
    }

    public function test_authenticated_admin_can_create_an_advertiser(): void
    {
        $admin = User::factory()->create();

        $response = $this->actingAs($admin)->post(route('admin.advertisers.store'), [
            'name' => 'Acme Corp',
            'contact_email' => 'acme@example.com',
            'status' => 'active',
        ]);

        $advertiser = Advertiser::first();
        $response->assertRedirect(route('admin.advertisers.show', $advertiser));
        $this->assertDatabaseHas('advertisers', ['name' => 'Acme Corp']);
        $this->assertNotEmpty($advertiser->redemption_token);
    }

    public function test_only_super_admin_can_delete_an_advertiser(): void
    {
        $admin = User::factory()->create(['role' => 'admin']);
        $advertiser = Advertiser::factory()->create();

        $this->actingAs($admin)
            ->delete(route('admin.advertisers.destroy', $advertiser))
            ->assertForbidden();

        $superAdmin = User::factory()->superAdmin()->create();

        $this->actingAs($superAdmin)
            ->delete(route('admin.advertisers.destroy', $advertiser))
            ->assertRedirect(route('admin.advertisers.index'));

        $this->assertSoftDeleted('advertisers', ['id' => $advertiser->id]);
    }
}
