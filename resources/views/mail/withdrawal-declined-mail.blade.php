<x-mail::message>
# Dear {{ $full_name }},

Unfortunately we could not approve your withdrawal of USDT {{$amount}} therefore your withdrawal has been declined.

For more assistance kindly reach out to our support team via {{ config('custom.support_email') }}

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
