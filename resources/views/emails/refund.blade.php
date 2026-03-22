<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Refund Confirmation — YouZoo</title>
</head>
<body style="margin:0; padding:0; background-color:#f0fdf4; font-family: 'Segoe UI', Arial, sans-serif;">
    <table width="100%" cellpadding="0" cellspacing="0" style="background-color:#f0fdf4; padding: 40px 0;">
        <tr>
            <td align="center">
                <table width="600" cellpadding="0" cellspacing="0" style="background-color:#ffffff; border-radius:16px; overflow:hidden; box-shadow: 0 4px 24px rgba(0,0,0,0.08);">

                    <!-- Header -->
                    <tr>
                        <td style="background: linear-gradient(135deg, #16a34a, #0d9488); padding: 36px 40px; text-align:center;">
                            <h1 style="margin:0; color:#ffffff; font-size:28px; font-weight:800; letter-spacing:-0.5px;">YouZoo</h1>
                            <p style="margin:6px 0 0; color:rgba(255,255,255,0.85); font-size:14px;">Refund Confirmation</p>
                        </td>
                    </tr>

                    <!-- Body -->
                    <tr>
                        <td style="padding: 40px;">
                            <h2 style="margin:0 0 16px; color:#166534; font-size:22px; font-weight:700;">Hi {{ $user->name }}, your refund is on its way!</h2>
                            <p style="margin:0 0 24px; color:#374151; font-size:15px; line-height:1.7;">We're writing to let you know that a refund has been issued to your account.</p>

                            <!-- Refund Amount Box -->
                            <div style="background-color:#f0fdf4; border:2px solid #bbf7d0; border-radius:12px; padding:24px; margin-bottom:28px; text-align:center;">
                                <p style="margin:0 0 4px; color:#6b7280; font-size:13px; font-weight:700; text-transform:uppercase; letter-spacing:0.5px;">Refund Amount</p>
                                <p style="margin:0; color:#166534; font-size:36px; font-weight:800;">£{{ number_format($refund_amount, 2) }}</p>
                            </div>

                            <p style="margin:0 0 12px; color:#374151; font-size:15px; line-height:1.7;">This refund was issued because the quantity you ordered exceeded our available stock at the time of purchase. We sincerely apologise for any inconvenience caused.</p>
                            <p style="margin:0; color:#6b7280; font-size:14px; line-height:1.7;">If you have any questions, please don't hesitate to <a href="{{ url('/contact') }}" style="color:#16a34a; text-decoration:underline;">contact us</a>.</p>
                        </td>
                    </tr>

                    <!-- Footer -->
                    <tr>
                        <td style="background-color:#f9fafb; border-top:1px solid #e5e7eb; padding:24px 40px; text-align:center;">
                            <p style="margin:0; color:#9ca3af; font-size:13px;">Best regards, <strong style="color:#374151;">The YouZoo Team</strong></p>
                            <p style="margin:8px 0 0; color:#d1d5db; font-size:12px;">© {{ date('Y') }} YouZoo. All rights reserved.</p>
                        </td>
                    </tr>

                </table>
            </td>
        </tr>
    </table>
</body>
</html>
