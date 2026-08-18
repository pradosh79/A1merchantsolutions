<!DOCTYPE html>
<html>
<head><meta charset="UTF-8"><title>{{ $subject ?? config('company.name') }}</title></head>
<body style="font-family: Arial, sans-serif; background:#f5f5f5; padding:24px; margin:0;">
    <table role="presentation" width="100%" cellpadding="0" cellspacing="0">
        <tr><td align="center">
            <table role="presentation" width="560" cellpadding="0" cellspacing="0" style="background:#fff; border-radius:8px; overflow:hidden; box-shadow:0 1px 4px rgba(0,0,0,0.1);">
                <tr>
                    <td style="background:#1C3F94; padding:20px; text-align:center;">
                        <img src="{{ config('app.url').'/'.ltrim(config('company.logo'), '/') }}" alt="{{ config('company.name') }}" height="44" style="display:block; margin:0 auto; background:#fff; border-radius:50%; padding:4px;">
                    </td>
                </tr>
                <tr>
                    <td style="padding:24px; color:#333; line-height:1.6;">
                        {!! $bodyHtml !!}
                    </td>
                </tr>
                <tr>
                    <td style="background:#f0f0f0; padding:16px; text-align:center; font-size:12px; color:#999;">
                        &copy; {{ date('Y') }} {{ config('company.name') }} &middot;
                        <a href="{{ $unsubscribeUrl }}" style="color:#999;">Unsubscribe</a>
                    </td>
                </tr>
            </table>
        </td></tr>
    </table>
</body>
</html>
