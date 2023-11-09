@component('mail::message')
# A comment was posted on your idea

{{ $comment->user->name }} replied to your idea:

**{{ $comment->idea->title }}**

They said: "{{ $comment->body }}"

@component('mail::button', ['url' => route('idea.show', $comment->idea)])
Go to idea
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
