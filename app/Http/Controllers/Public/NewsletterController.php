<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Http\Requests\Public\SubscribeNewsletterRequest;
use App\Mail\NewsletterWelcomeMail;
use App\Models\NewsletterSubscriber;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

/**
 * POST /newsletter/subscribe
 * Backs both newsletter forms on the homepage (hero + bottom banner).
 * Silently treats a repeat email as success (no need to leak whether an
 * address is already subscribed). Sends a welcome email on first subscribe.
 */
class NewsletterController extends Controller
{
    public function store(SubscribeNewsletterRequest $request): RedirectResponse
    {
        $subscriber = NewsletterSubscriber::firstOrCreate(
            ['email' => $request->validated('email')],
            [
                'source' => $request->validated('source', 'homepage'),
                'ip_address' => $request->ip(),
            ]
        );

        // Only email genuinely-new subscribers; never break the subscribe UX
        // if mail delivery fails (it's logged instead).
        if ($subscriber->wasRecentlyCreated) {
            try {
                Mail::to($subscriber->email)->send(new NewsletterWelcomeMail($subscriber));
            } catch (\Throwable $e) {
                Log::warning('Newsletter welcome email failed', [
                    'email' => $subscriber->email,
                    'error' => $e->getMessage(),
                ]);
            }
        }

        return back()->with('status', "You're subscribed! Watch your inbox for exclusive deals.");
    }

    /**
     * GET /newsletter/unsubscribe/{subscriber}  (signed URL from email footers)
     */
    public function unsubscribe(Request $request, NewsletterSubscriber $subscriber): RedirectResponse
    {
        if (! $request->hasValidSignature()) {
            abort(403, 'This unsubscribe link is invalid or has expired.');
        }

        if (is_null($subscriber->unsubscribed_at)) {
            $subscriber->update(['unsubscribed_at' => now()]);
        }

        return redirect()->route('home')
            ->with('status', 'You have been unsubscribed. Sorry to see you go!');
    }
}
