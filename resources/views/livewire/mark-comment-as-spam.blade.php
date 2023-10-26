<x-modal-confirm
    livewire-event-to-open-modal="markAsSpamCommentWasSet"
    event-to-close-modal="commentWasMarkedAsSpam"
    modal-title="Mark this comment as Spam?"
    modal-description="Are you certain that this comment is spam? You cannot undo this action."
    modal-confirm-button-text="This be spam"
    wire-click="markAsSpam"
/>
