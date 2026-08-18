<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreNewsletterSubscriberRequest;
use App\Http\Requests\Admin\UpdateNewsletterSubscriberRequest;
use App\Models\NewsletterSubscriber;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\StreamedResponse;

/**
 * Admin CMS for the homepage newsletter: list / add / edit / delete the
 * emails captured by the public signup forms (Public\NewsletterController),
 * plus a one-click subscribe/unsubscribe toggle and a CSV export.
 */
class NewsletterSubscriberController extends Controller
{
    public function index(Request $request): View
    {
        $filters = [
            'search' => $request->string('search')->trim()->value() ?: null,
            'status' => $request->string('status')->value() ?: null,
        ];

        $subscribers = NewsletterSubscriber::query()
            ->when($filters['search'], fn ($q, $s) => $q->where('email', 'like', "%{$s}%")
                ->orWhere('source', 'like', "%{$s}%"))
            ->when($filters['status'] === 'subscribed', fn ($q) => $q->whereNull('unsubscribed_at'))
            ->when($filters['status'] === 'unsubscribed', fn ($q) => $q->whereNotNull('unsubscribed_at'))
            ->latest()
            ->paginate(20)
            ->withQueryString();

        $stats = [
            'total' => NewsletterSubscriber::count(),
            'subscribed' => NewsletterSubscriber::whereNull('unsubscribed_at')->count(),
            'unsubscribed' => NewsletterSubscriber::whereNotNull('unsubscribed_at')->count(),
        ];

        return view('admin.newsletter.index', compact('subscribers', 'filters', 'stats'));
    }

    public function create(): View
    {
        return view('admin.newsletter.create', ['subscriber' => new NewsletterSubscriber()]);
    }

    public function store(StoreNewsletterSubscriberRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $data['unsubscribed_at'] = $request->boolean('subscribed') ? null : now();
        unset($data['subscribed']);

        NewsletterSubscriber::create($data);

        return redirect()->route('admin.newsletter.index')
            ->with('status', 'Subscriber added.');
    }

    public function edit(NewsletterSubscriber $newsletter): View
    {
        return view('admin.newsletter.edit', ['subscriber' => $newsletter]);
    }

    public function update(UpdateNewsletterSubscriberRequest $request, NewsletterSubscriber $newsletter): RedirectResponse
    {
        $data = $request->validated();
        $data['unsubscribed_at'] = $request->boolean('subscribed')
            ? null
            : ($newsletter->unsubscribed_at ?? now());
        unset($data['subscribed']);

        $newsletter->update($data);

        return redirect()->route('admin.newsletter.index')
            ->with('status', 'Subscriber updated.');
    }

    public function toggle(NewsletterSubscriber $newsletter): RedirectResponse
    {
        $newsletter->update([
            'unsubscribed_at' => $newsletter->unsubscribed_at ? null : now(),
        ]);

        return redirect()->route('admin.newsletter.index')->with(
            'status',
            $newsletter->unsubscribed_at ? 'Subscriber marked as unsubscribed.' : 'Subscriber re-subscribed.'
        );
    }

    public function destroy(NewsletterSubscriber $newsletter): RedirectResponse
    {
        $newsletter->delete();

        return redirect()->route('admin.newsletter.index')->with('status', 'Subscriber deleted.');
    }

    public function export(Request $request): StreamedResponse
    {
        $search = $request->string('search')->trim()->value() ?: null;
        $status = $request->string('status')->value() ?: null;

        $filename = 'newsletter-subscribers-'.now()->format('Y-m-d').'.csv';

        return Response::streamDownload(function () use ($search, $status) {
            $out = fopen('php://output', 'w');
            fputcsv($out, ['Email', 'Source', 'Status', 'IP Address', 'Subscribed At', 'Unsubscribed At']);

            NewsletterSubscriber::query()
                ->when($search, fn ($q, $s) => $q->where('email', 'like', "%{$s}%")->orWhere('source', 'like', "%{$s}%"))
                ->when($status === 'subscribed', fn ($q) => $q->whereNull('unsubscribed_at'))
                ->when($status === 'unsubscribed', fn ($q) => $q->whereNotNull('unsubscribed_at'))
                ->latest()
                ->chunk(500, function ($rows) use ($out) {
                    foreach ($rows as $r) {
                        fputcsv($out, [
                            $r->email,
                            $r->source,
                            $r->unsubscribed_at ? 'Unsubscribed' : 'Subscribed',
                            $r->ip_address,
                            optional($r->created_at)->toDateTimeString(),
                            optional($r->unsubscribed_at)->toDateTimeString(),
                        ]);
                    }
                });

            fclose($out);
        }, $filename, ['Content-Type' => 'text/csv']);
    }
}
