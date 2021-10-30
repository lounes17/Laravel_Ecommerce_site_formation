@component('mail::message')
# New user register admin

The body of your message.

User {{$user->formattedName() }} has registered.


Thanks,<br>
{{ config('app.name') }}
@endcomponent
