<div class="comments_container relative space-y-6 ml-24 my-8">
    @foreach($comments as $comment)
        <livewire:idea-comment
            :key="$comment->id"
            :comment="$comment"
            :ideaUserId="$idea->user->id"
        />
    @endforeach
</div>

<div class="my-8">
    {{ $comments->onEachSide(1)->links() }}
</div>
