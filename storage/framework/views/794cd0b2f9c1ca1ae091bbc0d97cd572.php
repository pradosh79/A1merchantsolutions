<!DOCTYPE html>
<html>
<head><meta charset="UTF-8"><title>Welcome</title></head>
<body style="font-family: Arial, sans-serif; background:#f5f5f5; padding:24px; margin:0;">
    <table role="presentation" width="100%" cellpadding="0" cellspacing="0">
        <tr><td align="center">
            <table role="presentation" width="480" cellpadding="0" cellspacing="0" style="background:#fff; border-radius:8px; overflow:hidden; box-shadow:0 1px 4px rgba(0,0,0,0.1);">
                <tr>
                    <td style="background:#f96a09; padding:24px; text-align:center; color:#fff;">
                        <h1 style="margin:0; font-size:22px;">One Destination, Endless Savings!</h1>
                    </td>
                </tr>
                <tr>
                    <td style="padding:24px; color:#333;">
                        <h2 style="margin-top:0;">You're subscribed 🎉</h2>
                        <p>Thanks for joining the <?php echo e(config('company.name')); ?> deals list. You'll be the first to hear about exclusive discounts, limited-time offers, QR deals, and cashback.</p>
                        <p style="text-align:center; margin:28px 0;">
                            <a href="<?php echo e(config('app.url')); ?>" style="background:#f96a09; color:#fff; text-decoration:none; padding:12px 24px; border-radius:6px; font-weight:bold;">Browse Today's Deals</a>
                        </p>
                        <p style="font-size:13px; color:#999;">You're receiving this because <?php echo e($subscriber->email); ?> was subscribed on our website.</p>
                    </td>
                </tr>
                <tr>
                    <td style="background:#f0f0f0; padding:16px; text-align:center; font-size:12px; color:#999;">
                        &copy; <?php echo e(date('Y')); ?> <?php echo e(config('company.name')); ?> &middot;
                        <a href="<?php echo e($unsubscribeUrl); ?>" style="color:#999;">Unsubscribe</a>
                    </td>
                </tr>
            </table>
        </td></tr>
    </table>
</body>
</html>
<?php /**PATH F:\xampp\htdocs\adcoupon-platform\resources\views/emails/newsletter-welcome.blade.php ENDPATH**/ ?>