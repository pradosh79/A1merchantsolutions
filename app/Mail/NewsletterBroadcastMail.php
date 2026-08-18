<?php

namespace App\Mail;

use App\Models\NewsletterSubscriber;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class NewsletterBroadcastMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * @param  string  $subjectLine  Admin-authored subject
     * @param  string  $bodyHtml      Admin-authored HTML body
     */
    public function __construct(
        public string $subjectLine,
        public string $bodyHtml,
        public NewsletterSubscriber $subscriber,
    ) {
    }

    public function envelope(): Envelope
    {
        return new Envelope(subject: $this->subjectLine);
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.newsletter-broadcast',
            with: [
                'bodyHtml' => $this->bodyHtml,
                'subscriber' => $this->subscriber,
                'unsubscribeUrl' => $this->subscriber->getKey()
                    ? \Illuminate\Support\Facades\URL::signedRoute(
                        'public.newsletter.unsubscribe',
                        ['subscriber' => $this->subscriber->getKey()]
                    )
                    : config('app.url'),
            ],
        );
    }
}
