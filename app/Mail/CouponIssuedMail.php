<?php

namespace App\Mail;

use App\Models\Claim;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class CouponIssuedMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public Claim $claim)
    {
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Your coupon for '.$this->claim->offer->title,
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.coupon-issued',
            with: [
                'claim' => $this->claim,
                'offer' => $this->claim->offer,
                'advertiser' => $this->claim->offer->advertiser,
                'couponCode' => $this->claim->coupon_code,
                'expiresAt' => $this->claim->expires_at,
            ],
        );
    }

    public function attachments(): array
    {
        if ($this->claim->qr_code_path && \Illuminate\Support\Facades\Storage::disk('public')->exists($this->claim->qr_code_path)) {
            return [
                \Illuminate\Mail\Mailables\Attachment::fromStorageDisk('public', $this->claim->qr_code_path)
                    ->as('coupon-qr-'.$this->claim->uuid.'.svg')
                    ->withMime('image/svg+xml'),
            ];
        }

        return [];
    }
}
