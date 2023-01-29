@component('mail::message')
# Verification OTP

Your One Time password is {{$otp}}.

Thanks,<br>
{{ config('app.name') }}
@endcomponent
