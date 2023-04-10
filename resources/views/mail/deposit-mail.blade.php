<x-mail::message>
# Dear {{ $full_name }},

A deposit transaction of USDT{{ $amount }} with transaction hash of {{ $hash }} has been initiated on your account kindly allow us confirm the transaction.

Current transaction status is {{ $status }}

A mail will be sent to you when we update the transaction status.

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
