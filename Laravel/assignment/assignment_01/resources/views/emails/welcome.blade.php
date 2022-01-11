@component('mail::message')
# Registration Complete for Student Management System

You have been successfully registered .

@component('mail::button', ['url' => 'http://localhost:8000'])
Visit..
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
