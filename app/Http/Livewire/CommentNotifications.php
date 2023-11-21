<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CommentNotifications extends Component
{
    public $notifications;
    public $notificationCount;
    public $isLoading;
    public $notification_threshold = 5;

    protected $listeners = ['getNotifications'];

    public function mount() {
        $this->notifications = collect([]);
        $this->isLoading = true;
        $this->getNotificationCount();
    }

    /**
     *
     */
    public function getNotificationCount()
    {
        $this->notificationCount = auth()->user()->unreadNotifications()->count();

        if($this->notificationCount > $this->notification_threshold) {
            $this->notificationCount = $this->notification_threshold.'+';
        }
    }

    /**
     *
     */
    public function getNotifications()
    {
        $this->notifications = auth()->user()->unreadNotifications()->latest()->take($this->notification_threshold)->get();
        $this->isLoading = false;
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function render()
    {
        return view('livewire.comment-notifications');
    }
}
