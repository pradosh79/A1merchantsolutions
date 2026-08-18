<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Your Coupon</title>
</head>
<body style="font-family: Arial, sans-serif; background:#f5f5f5; padding:24px; margin:0;">
    <table role="presentation" width="100%" cellpadding="0" cellspacing="0">
        <tr>
            <td align="center">
                <table role="presentation" width="480" cellpadding="0" cellspacing="0" style="background:#fff; border-radius:8px; overflow:hidden; box-shadow:0 1px 4px rgba(0,0,0,0.1);">
                    <tr>
                        <td style="background:#1C3F94; padding:20px; text-align:center;">
                            <img src="{{ config('app.url').'/'.ltrim(config('company.logo'), '/') }}" alt="{{ config('company.name') }}" height="48" style="display:block; margin:0 auto; background:#fff; border-radius:50%; padding:4px;">
                        </td>
                    </tr>
                    <tr>
                        <td style="padding:24px;">
                            <h2 style="margin-top:0;">Hi {{ $claim->name }},</h2>
                            <p>Thanks for claiming <strong>{{ $offer->title }}</strong> from {{ $advertiser->name }}!</p>

                            <div style="background:#f8f9fa; border:1px dashed #ccc; border-radius:6px; padding:16px; text-align:center; margin:20px 0;">
                                <p style="margin:0 0 8px; color:#666; font-size:13px;">YOUR COUPON CODE</p>
                                <p style="margin:0; font-size:28px; font-weight:bold; letter-spacing:4px;">{{ $couponCode }}</p>
                            </div>

                            <p style="text-align:center; color:#666; font-size:13px;">
                                Your QR code is attached to this email &mdash; show it (or the code above) to the
                                merchant to redeem.
                            </p>

                            <p style="font-size:13px; color:#999;">
                                This coupon expires on {{ $expiresAt->format('F j, Y g:ia') }}. It can only be
                                redeemed once.
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="background:#f0f0f0; padding:16px; text-align:center; font-size:12px; color:#999;">
                            &copy; {{ date('Y') }} {{ config('company.name') }}
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
