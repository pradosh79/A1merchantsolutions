<?php

namespace App\Actions;

use Illuminate\Database\Eloquent\Collection;
use Symfony\Component\HttpFoundation\StreamedResponse;

/**
 * Streams claims as a CSV download without loading the whole file into
 * memory. Coupon codes are intentionally omitted from bulk export by
 * default to reduce exposure; pass $includeCouponCode=true for admin-only
 * "full export".
 */
class ExportClaimsToCsvAction
{
    public function __invoke(Collection $claims, bool $includeCouponCode = false): StreamedResponse
    {
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="claims-export-'.now()->format('Ymd_His').'.csv"',
        ];

        $columns = ['ID', 'UUID', 'Offer', 'Advertiser', 'Screen', 'Name', 'Email', 'Phone', 'Status', 'Claimed At', 'Redeemed At', 'Expires At'];
        if ($includeCouponCode) {
            $columns[] = 'Coupon Code';
        }

        $callback = function () use ($claims, $columns, $includeCouponCode) {
            $out = fopen('php://output', 'w');
            fputcsv($out, $columns);

            foreach ($claims as $claim) {
                $row = [
                    $claim->id,
                    $claim->uuid,
                    $claim->offer?->title,
                    $claim->offer?->advertiser?->name,
                    $claim->screen?->name,
                    $claim->name,
                    $claim->email,
                    $claim->phone,
                    $claim->status->value,
                    optional($claim->created_at)->toDateTimeString(),
                    optional($claim->redeemed_at)->toDateTimeString(),
                    optional($claim->expires_at)->toDateTimeString(),
                ];

                if ($includeCouponCode) {
                    $row[] = $claim->getRawOriginal('coupon_code');
                }

                fputcsv($out, $row);
            }

            fclose($out);
        };

        return response()->stream($callback, 200, $headers);
    }
}
