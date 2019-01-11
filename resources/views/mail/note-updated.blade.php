@component('mail::message')
# you have updated : {{$note->title}}

your note had been updated successfully.

@component('mail::button', ['url' => url('/notes/'.$note->id)])
View Note
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
