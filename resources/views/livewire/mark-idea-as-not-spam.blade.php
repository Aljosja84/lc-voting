<x-modal-confirm
    event-to-open-modal="custom-show-not-spam-modal"
    event-to-close-modal="ideaWasNotSpam"
    modal-title="Mark this Idea as not Spam"
    modal-description="Are you sure you want to mark this idea as NOT spam? This will reset the spam counter to 0"
    modal-confirm-button-text="Reset Spam counter"
    wire-click="markAsNotSpam"
/>

