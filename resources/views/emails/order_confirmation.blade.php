<x-mail::message>
# Hi {{ $userName }},

Thank you for your order with **YouZoo**!

We've successfully received your order **#{{ $orderId }}** and our team is now preparing it for shipment.

<x-mail::button :url="config('app.url') . '/dashboard'">
View Order in Dashboard
</x-mail::button>

If you have any questions, feel free to reply to this email.

Thanks,<br>
The {{ config('app.name') }} Team
</x-mail::message>
