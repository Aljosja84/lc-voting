<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use Illuminate\Http\Response;
use Livewire\Component;

class DeleteComment extends Component
{
    public $comment;

    protected $listeners = ['setDeleteComment'];

    /**
     * @param Comment $comment
     */
    public function mount(Comment $comment)
    {
        $this->comment = $comment;
    }

    /**
     * @param $commentId
     */
    public function setDeleteComment($commentId)
    {
        $this->comment = Comment::findOrFail($commentId);

        $this->emit('deleteCommentWasSet');
    }

    public function deleteComment()
    {
        if(auth()->guest() || auth()->user()->cannot('delete', $this->comment)) {
            abort(Response::HTTP_FORBIDDEN);
        }

        $this->comment->delete();

        $this->emit('commentWasDeleted');
        $this->emit('successNotify', 'Comment deleted successfully!');
    }

    public function render()
    {
        return view('livewire.delete-comment');
    }
}
