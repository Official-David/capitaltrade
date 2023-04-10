<x-mail::message>
# Dear {{ $full_name }},

Unfortunately your investment of USDT {{$amount}} has been declined.

## Package Name: {{ $package }}

## Duration: {{ $duration }} day(s)

For more assistance kindly reach out to our support team via {{ config('custom.support_email') }}

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
