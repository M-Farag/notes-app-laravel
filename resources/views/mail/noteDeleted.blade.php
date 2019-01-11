@component('mail::message')
# You Deleted note : {{$note->title}}

{{$note->details}}

@component('mail::button', ['url' => url('/notes')])
MyNotes
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
