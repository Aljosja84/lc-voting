<?php

namespace App\Notifications;

use App\Models\Comment;
use App\Models\Idea;
use App\Models\Status;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class statusChanged extends Notification
{
    use Queueable;

    public $status;
    public $comment;
    public $idea;

    /**
     * Create a new notification instance.
     *
     * @param Idea $idea
     * @param Comment $comment
     * @param Status $status
     */
    public function __construct(Idea $idea, Comment $comment)
    {
        $this->idea = $idea;
        $this->comment = $comment;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'idea_id' => $this->idea->id,
            'idea_status' => $this->idea->status->name,
            'idea_status_textcolor' => $this->idea->status->getStatusTextColor(),
            'idea_status_avatar_color' => $this->idea->status->getStatusClassesCircle(),
            'idea_title' => $this->idea->title,
            'idea_slug' => $this->idea->slug,
            'comment_id' => $this->comment->id,
            'comment_body' => $this->comment->body,
            'comment_user' => $this->comment->user->name,
        ];
    }
}
