<?php

namespace App\Notifications;

use App\Models\Offer;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

/**
 * Alerts admin users (database + mail channel) once an offer crosses 90%
 * of its max_claims cap so they can top up inventory or pause the offer.
 */
class OfferNearingClaimLimitNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public function __construct(public Offer $offer)
    {
    }

    public function via(object $notifiable): array
    {
        return ['mail', 'database'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject("Offer nearing claim limit: {$this->offer->title}")
            ->line("The offer \"{$this->offer->title}\" has reached {$this->offer->claims_count} of {$this->offer->max_claims} claims.")
            ->action('View Offer', url('/admin/offers/'.$this->offer->uuid))
            ->line('Consider raising the limit or pausing the offer.');
    }

    public function toArray(object $notifiable): array
    {
        return [
            'offer_id' => $this->offer->id,
            'offer_title' => $this->offer->title,
            'claims_count' => $this->offer->claims_count,
            'max_claims' => $this->offer->max_claims,
        ];
    }
}
