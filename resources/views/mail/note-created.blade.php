@component('mail::message')
# You've created a new Note : {{$note->title}}

{{$note->details}}

@component('mail::button', ['url' => url('/notes/'.$note->id)])
View Note
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
