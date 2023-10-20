<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use Illuminate\Http\Response;
use Livewire\Component;

class EditComment extends Component
{
    public $comment;
    public $body;

    protected $listeners = ['setEditComment'];
    protected $rules = [
        'body' => 'required|min:4'
    ];

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
    public function setEditComment($commentId)
    {
        $this->comment = Comment::findOrFail($commentId);
        $this->body = $this->comment->body;

        $this->emit('editCommentWasSet');
    }

    public function updateComment()
    {
        if(auth()->guest() || auth()->user()->cannot('update', $this->comment)) {
            abort(Response::HTTP_FORBIDDEN);
        }

        $this->validate();

        $this->comment->body = $this->body;
        $this->comment->save();

        $this->emit('commentWasUpdated');
        $this->emit('successNotify', 'Comment updated successfully!');
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function render()
    {
        return view('livewire.edit-comment');
    }
}
