<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stock Alert — Action Required</title>
</head>
<body style="margin:0; padding:0; background-color:#fff7ed; font-family: 'Segoe UI', Arial, sans-serif;">
    <table width="100%" cellpadding="0" cellspacing="0" style="background-color:#fff7ed; padding: 40px 0;">
        <tr>
            <td align="center">
                <table width="600" cellpadding="0" cellspacing="0" style="background-color:#ffffff; border-radius:16px; overflow:hidden; box-shadow: 0 4px 24px rgba(0,0,0,0.08);">

                    <!-- Header -->
                    <tr>
                        <td style="background: linear-gradient(135deg, #16a34a, #0d9488); padding: 36px 40px; text-align:center;">
                            <h1 style="margin:0; color:#ffffff; font-size:28px; font-weight:800; letter-spacing:-0.5px;">YouZoo</h1>
                            <p style="margin:6px 0 0; color:rgba(255,255,255,0.85); font-size:14px;">Admin Stock Alert</p>
                        </td>
                    </tr>

                    <!-- Warning Banner -->
                    <tr>
                        <td style="background-color:#fef3c7; border-bottom:1px solid #fde68a; padding:14px 40px; text-align:center;">
                            <p style="margin:0; color:#92400e; font-size:14px; font-weight:700;">⚠️ Stock Level Critical — Action Required</p>
                        </td>
                    </tr>

                    <!-- Body -->
                    <tr>
                        <td style="padding: 40px;">
                            <h2 style="margin:0 0 16px; color:#166534; font-size:20px; font-weight:700;">Product Needs Restocking</h2>

                            <!-- Product Details Box -->
                            <div style="background-color:#f9fafb; border:1px solid #e5e7eb; border-radius:10px; padding:20px; margin-bottom:24px;">
                                <p style="margin:0 0 8px; color:#374151; font-size:15px;"><strong>Product:</strong> {{ $product->product_name }}</p>
                                <p style="margin:0; color:#374151; font-size:15px;"><strong>Product ID:</strong> #{{ $product->product_id }}</p>
                            </div>

                            <p style="margin:0 0 12px; color:#374151; font-size:15px; line-height:1.7;">The stock quantity for the above product has reached a critical low. Please log in to the admin dashboard and take action as soon as possible.</p>

                            <p style="margin:0; color:#9ca3af; font-size:13px; font-style:italic;">Please do not reply to this email — this is an automated notification.</p>
                        </td>
                    </tr>

                    <!-- Footer -->
                    <tr>
                        <td style="background-color:#f9fafb; border-top:1px solid #e5e7eb; padding:24px 40px; text-align:center;">
                            <p style="margin:0; color:#9ca3af; font-size:13px;">Sent automatically by <strong style="color:#374151;">YouZoo Systems</strong></p>
                            <p style="margin:8px 0 0; color:#d1d5db; font-size:12px;">© {{ date('Y') }} YouZoo. All rights reserved.</p>
                        </td>
                    </tr>

                </table>
            </td>
        </tr>
    </table>
</body>
</html>
