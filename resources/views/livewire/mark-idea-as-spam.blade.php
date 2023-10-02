<x-modal-confirm
    event-to-open-modal="custom-show-spam-modal"
    event-to-close-modal="ideaWasMarkedAsSpam"
    modal-title="Mark this Idea as Spam"
    modal-description="Are you sure you want to mark this idea as spam?"
    modal-confirm-button-text="This be spam"
    wire-click="markAsSpam"
/>
