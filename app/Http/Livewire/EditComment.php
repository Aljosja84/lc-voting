<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use Livewire\Component;

class EditComment extends Component
{
    public $comment;

    protected $listeners = ['setEditComment'];

    /**
     * @param Comment $comment
     */
    public function mount(Comment $comment)
    {
        $this->comment = $comment;
    }

    public function setEditComment($commentId)
    {
        $this->comment = Comment::findOrFail($commentId);
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function render()
    {
        return view('livewire.edit-comment');
    }
}
