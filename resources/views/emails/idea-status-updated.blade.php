@component('mail::message')
# Idea Status Updated

The idea '{{ $idea->title }}' has a new status.

The new status is: '{{ $idea->status->name }}'

@component('mail::button', ['url' => route('idea.show', $idea)])
Check it out!
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
