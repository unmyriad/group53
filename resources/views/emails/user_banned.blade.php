<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Access Revoked — YouZoo</title>
</head>
<body style="margin:0; padding:0; background-color:#fef2f2; font-family: 'Segoe UI', Arial, sans-serif;">
    <table width="100%" cellpadding="0" cellspacing="0" style="background-color:#fef2f2; padding: 40px 0;">
        <tr>
            <td align="center">
                <table width="600" cellpadding="0" cellspacing="0" style="background-color:#ffffff; border-radius:16px; overflow:hidden; box-shadow: 0 4px 24px rgba(0,0,0,0.08);">

                    <!-- Header -->
                    <tr>
                        <td style="background: linear-gradient(135deg, #dc2626, #b91c1c); padding: 36px 40px; text-align:center;">
                            <h1 style="margin:0; color:#ffffff; font-size:28px; font-weight:800; letter-spacing:-0.5px;">YouZoo</h1>
                            <p style="margin:6px 0 0; color:rgba(255,255,255,0.85); font-size:14px;">Account Notification</p>
                        </td>
                    </tr>

                    <!-- Body -->
                    <tr>
                        <td style="padding: 40px;">
                            <h2 style="margin:0 0 16px; color:#991b1b; font-size:22px; font-weight:700;">Hello {{ $userName }},</h2>
                            <p style="margin:0 0 20px; color:#374151; font-size:15px; line-height:1.7;">This is a formal notification that your YouZoo account has been <strong>deactivated</strong> by an administrator.</p>

                            <!-- Reason Box -->
                            <div style="background-color:#fef2f2; border-left:4px solid #dc2626; border-radius:8px; padding:16px 20px; margin-bottom:24px;">
                                <p style="margin:0; color:#7f1d1d; font-size:14px; line-height:1.6;">This action was taken due to a violation of our platform policies, or upon an explicit request associated with your account. All associated active data has been removed from the platform.</p>
                            </div>

                            <p style="margin:0 0 12px; color:#374151; font-size:15px; line-height:1.7;">If you believe this was done in error, please <a href="{{ url('/contact') }}" style="color:#dc2626; text-decoration:underline;">contact our support team</a> and we will review your case.</p>
                        </td>
                    </tr>

                    <!-- Footer -->
                    <tr>
                        <td style="background-color:#f9fafb; border-top:1px solid #e5e7eb; padding:24px 40px; text-align:center;">
                            <p style="margin:0; color:#9ca3af; font-size:13px;">Best regards, <strong style="color:#374151;">The YouZoo Admin Team</strong></p>
                            <p style="margin:8px 0 0; color:#d1d5db; font-size:12px;">© {{ date('Y') }} YouZoo. All rights reserved.</p>
                        </td>
                    </tr>

                </table>
            </td>
        </tr>
    </table>
</body>
</html>
