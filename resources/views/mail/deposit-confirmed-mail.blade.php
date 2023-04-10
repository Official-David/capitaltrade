<x-mail::message>
# Dear {{ $full_name }},

Congratulations! your deposit of USDT {{$amount}} with hash of {{ $hash }} has been confirmed and approved.

You can now make your investment.

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
