<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Http\Requests\Public\SubscribeNewsletterRequest;
use App\Models\NewsletterSubscriber;
use Illuminate\Http\RedirectResponse;

/**
 * POST /newsletter/subscribe
 * Backs both newsletter forms on the homepage (hero + bottom banner).
 * Silently treats a repeat email as success (no need to leak whether an
 * address is already subscribed).
 */
class NewsletterController extends Controller
{
    public function store(SubscribeNewsletterRequest $request): RedirectResponse
    {
        NewsletterSubscriber::firstOrCreate(
            ['email' => $request->validated('email')],
            [
                'source' => $request->validated('source', 'homepage'),
                'ip_address' => $request->ip(),
            ]
        );

        return back()->with('status', "You're subscribed! Watch your inbox for exclusive deals.");
    }
}
