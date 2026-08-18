<?php

namespace Tests\Feature\Admin;

use App\Models\NewsletterSubscriber;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class NewsletterCrudTest extends TestCase
{
    use RefreshDatabase;

    public function test_guest_is_redirected_to_login(): void
    {
        $this->get(route('admin.newsletter.index'))->assertRedirect('/admin/login');
    }

    public function test_admin_can_create_subscriber(): void
    {
        $admin = User::factory()->create();

        $this->actingAs($admin)->post(route('admin.newsletter.store'), [
            'email' => 'JANE@Example.com ',
            'source' => 'admin_manual',
            'subscribed' => '1',
        ])->assertRedirect(route('admin.newsletter.index'));

        $this->assertDatabaseHas('newsletter_subscribers', [
            'email' => 'jane@example.com',
            'source' => 'admin_manual',
            'unsubscribed_at' => null,
        ]);
    }

    public function test_duplicate_email_is_rejected(): void
    {
        $admin = User::factory()->create();
        NewsletterSubscriber::create(['email' => 'dup@example.com']);

        $this->actingAs($admin)->post(route('admin.newsletter.store'), [
            'email' => 'dup@example.com',
        ])->assertSessionHasErrors('email');

        $this->assertSame(1, NewsletterSubscriber::where('email', 'dup@example.com')->count());
    }

    public function test_admin_can_update_and_toggle_and_delete(): void
    {
        $admin = User::factory()->create();
        $sub = NewsletterSubscriber::create(['email' => 'a@example.com']);

        // update (mark unsubscribed by omitting the subscribed checkbox)
        $this->actingAs($admin)->put(route('admin.newsletter.update', $sub), [
            'email' => 'a@example.com',
            'source' => 'edited',
        ])->assertRedirect(route('admin.newsletter.index'));
        $this->assertNotNull($sub->fresh()->unsubscribed_at);
        $this->assertSame('edited', $sub->fresh()->source);

        // toggle back to subscribed
        $this->actingAs($admin)->patch(route('admin.newsletter.toggle', $sub))
            ->assertRedirect(route('admin.newsletter.index'));
        $this->assertNull($sub->fresh()->unsubscribed_at);

        // delete
        $this->actingAs($admin)->delete(route('admin.newsletter.destroy', $sub))
            ->assertRedirect(route('admin.newsletter.index'));
        $this->assertDatabaseMissing('newsletter_subscribers', ['id' => $sub->id]);
    }

    public function test_export_returns_csv(): void
    {
        $admin = User::factory()->create();
        NewsletterSubscriber::create(['email' => 'csv@example.com', 'source' => 'x']);

        $res = $this->actingAs($admin)->get(route('admin.newsletter.export'));
        $res->assertOk();
        $this->assertStringContainsString('text/csv', $res->headers->get('content-type'));
    }
}
