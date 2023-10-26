<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use Illuminate\Http\Response;
use Livewire\Component;

class MarkCommentAsSpam extends Component
{
    public $comment;

    protected $listeners = ['setMarkAsSpamComment'];

    public function mount(Comment $comment)
    {
        $this->comment = $comment;
    }

    public function setMarkAsSpamComment($commentId)
    {
        $this->comment = Comment::findOrFail($commentId);

        $this->emit('markAsSpamCommentWasSet');
    }

    public function markAsSpam()
    {
        if(auth()->guest()) {
            abort(Response::HTTP_FORBIDDEN);
        }

        $this->comment->spam_reports++;
        $this->comment->save();

        $this->emit('commentWasMarkedAsSpam');
        $this->emit('successNotify', 'Comment was marked as Spam!');
    }

    public function render()
    {
        return view('livewire.mark-comment-as-spam');
    }
}
