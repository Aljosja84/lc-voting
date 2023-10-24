<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use Livewire\Component;

class IdeaComment extends Component
{
    public $comment;
    public $ideaUserId;

    protected $listeners = ['commentWasUpdated'];

    /**
     *
     */
    public function commentWasUpdated()
    {
        $this->comment->refresh();
        $this->comment->idea->refresh();
    }

    /**
     * @param Comment $comment
     * @param $ideaUserId
     */
    public function mount(Comment $comment, $ideaUserId)
    {
        $this->comment = $comment;
        $this->ideaUserId = $ideaUserId;
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function render()
    {
        return view('livewire.idea-comment');
    }
}
