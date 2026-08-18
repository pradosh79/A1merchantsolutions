<?php

namespace Tests\Feature\Admin;

use App\Mail\NewsletterBroadcastMail;
use App\Models\NewsletterSubscriber;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class NewsletterSendTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_can_send_to_all_subscribed_only(): void
    {
        Mail::fake();
        $admin = User::factory()->create();
        NewsletterSubscriber::create(['email' => 'a@example.com']);
        NewsletterSubscriber::create(['email' => 'b@example.com']);
        NewsletterSubscriber::create(['email' => 'gone@example.com', 'unsubscribed_at' => now()]);

        $this->actingAs($admin)->post(route('admin.newsletter.send'), [
            'subject' => 'Hello',
            'body' => '<b>Deals</b> inside',
            'recipients' => 'all',
        ])->assertRedirect(route('admin.newsletter.index'));

        // Sent to the 2 subscribed, not the unsubscribed one.
        Mail::assertSent(NewsletterBroadcastMail::class, 2);
    }

    public function test_test_send_requires_an_email(): void
    {
        $admin = User::factory()->create();

        $this->actingAs($admin)->post(route('admin.newsletter.send'), [
            'subject' => 'Hi',
            'body' => 'x',
            'recipients' => 'test',
        ])->assertSessionHasErrors('test_email');
    }
}
