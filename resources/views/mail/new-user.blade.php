@component('mail::message')
# Welcome!

Hi {{ $user->name }}

@component('mail::button', ['url' => env('APP_URL') ])
Go to website...
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
