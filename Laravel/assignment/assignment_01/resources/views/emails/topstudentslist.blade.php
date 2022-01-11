@component('mail::message')
# Top Ten Students List

@component('mail::table')
|First&nbsp;Name     |  Last&nbsp;Name  |   Email   |  Major  |
|:-----------   |:----------- | --------  | :-----: |
@for($index = 0; $index < 10; $index++)
| {{$students[$index]->first_name}} | {{$students[$index]->last_name}} | {{$students[$index]->email}} | {{$students[$index]->major}} |
@endfor
@endcomponent

@component('mail::button', ['url' => 'http://localhost:8000/'])
More Students
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent