<x-mail::message>
# Dear {{ $full_name }},

An investment of USDT{{ $amount }} has be initiated on your account kindly allow us confirm the investment.

## Package Name: {{ $package }}

## Duration: {{ $duration }} day(s)

A mail will be sent to you when we update the transaction status.

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
