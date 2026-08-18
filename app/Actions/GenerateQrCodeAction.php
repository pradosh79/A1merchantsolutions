<?php

namespace App\Actions;

use Illuminate\Support\Facades\Storage;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

/**
 * Renders a coupon code as an SVG QR image and stores it on the configured
 * disk. SVG is used (rather than PNG) to avoid a hard Imagick/GD dependency.
 */
class GenerateQrCodeAction
{
    public function __invoke(string $payload, string $filename): string
    {
        $disk = config('coupon.qr.disk', 'public');
        $directory = trim(config('coupon.qr.directory', 'qrcodes'), '/');
        $format = config('coupon.qr.format', 'svg');
        $path = "{$directory}/{$filename}.{$format}";

        $svg = QrCode::format($format)
            ->size(config('coupon.qr.size', 300))
            ->margin(config('coupon.qr.margin', 1))
            ->errorCorrection(config('coupon.qr.error_correction', 'H'))
            ->generate($payload);

        Storage::disk($disk)->put($path, $svg);

        return $path;
    }
}
