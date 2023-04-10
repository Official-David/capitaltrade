<x-mail::message>
# Dear {{ $full_name }},

Unfortunately we could not confirm your deposit of USDT {{$amount}} with a hash of {{ $hash }} therefore your deposit has been declined.

For more assistance kindly reach out to our support team via {{ config('custom.support_email') }}

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
