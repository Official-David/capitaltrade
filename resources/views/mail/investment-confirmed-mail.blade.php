<x-mail::message>
# Dear {{ $full_name }},

Congratulations! your investment of USDT {{$amount}} has been confirmed and approved.

## Package Name: {{ $package }}

## Duration: {{ $duration }} day(s)

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
