<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CommentNotifications extends Component
{
    public $notifications;
    public $notificationCount;
    public $notification_threshold = 3;

    protected $listeners = ['getNotifications'];

    public function mount() {
        $this->notifications = collect([]);
        $this->getNotificationCount();
    }

    public function getNotificationCount()
    {
        $this->notificationCount = auth()->user()->unreadNotifications()->count();

        if($this->notificationCount > $this->notification_threshold) {
            $this->notificationCount = $this->notification_threshold.'+';
        }
    }

    public function getNotifications()
    {
        $this->notifications = auth()->user()->unreadNotifications()->latest();
    }

    public function render()
    {
        return view('livewire.comment-notifications');
    }
}
