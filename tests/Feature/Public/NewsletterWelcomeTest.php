<?php

namespace Tests\Feature\Public;

use App\Mail\NewsletterWelcomeMail;
use App\Models\NewsletterSubscriber;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class NewsletterWelcomeTest extends TestCase
{
    use RefreshDatabase;

    public function test_new_subscriber_gets_a_welcome_email(): void
    {
        Mail::fake();

        $this->post(route('public.newsletter.subscribe'), [
            'email' => 'NewFan@example.com',
            'source' => 'homepage_hero',
        ])->assertRedirect();

        $this->assertDatabaseHas('newsletter_subscribers', ['email' => 'newfan@example.com']);
        Mail::assertSent(NewsletterWelcomeMail::class, 1);
    }

    public function test_duplicate_subscribe_does_not_resend_welcome(): void
    {
        Mail::fake();
        NewsletterSubscriber::create(['email' => 'again@example.com']);

        $this->post(route('public.newsletter.subscribe'), ['email' => 'again@example.com'])
            ->assertRedirect();

        Mail::assertNotSent(NewsletterWelcomeMail::class);
    }

    public function test_signed_unsubscribe_link_works_and_unsigned_is_rejected(): void
    {
        $sub = NewsletterSubscriber::create(['email' => 'bye@example.com']);

        // Unsigned request is rejected.
        $this->get(route('public.newsletter.unsubscribe', $sub))->assertForbidden();

        // Signed URL unsubscribes.
        $url = \Illuminate\Support\Facades\URL::signedRoute('public.newsletter.unsubscribe', ['subscriber' => $sub->id]);
        $this->get($url)->assertRedirect(route('home'));
        $this->assertNotNull($sub->fresh()->unsubscribed_at);
    }
}
