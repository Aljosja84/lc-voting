<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use App\Models\Idea;
use App\Notifications\CommentAdded;
use Illuminate\Http\Response;
use Livewire\Component;

class AddComment extends Component
{
    public $idea;
    public $comment;
    protected $rules = [
        'comment' => 'required|min:4',
    ];

    public function mount(Idea $idea)
    {
        $this->idea = $idea;
    }

    public function addComment()
    {
        if(auth()->guest()) {
            abort(Response::HTTP_FORBIDDEN);
        }

        // validate
        $this->validate();

        // save the comment
        $newComment = Comment::create([
            'user_id' => auth()->id(),
            'idea_id' => $this->idea->id,
            'body' => $this->comment,
        ]);

        $this->reset('comment');

        // notify the idea's creator
        $this->idea->user->notify(new CommentAdded($newComment));

        // emit the success message
        $this->emit('commentWasAdded');
        $this->emit('successNotify', 'Comment added successfully!');
    }

    public function render()
    {
        return view('livewire.add-comment');
    }
}
