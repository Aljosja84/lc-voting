<?php

namespace App\Http\Livewire;

use App\Jobs\NotifyAllVoters;
use App\Mail\IdeaStatusUpdateMailable;
use App\Models\Comment;
use App\Models\Idea;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class SetStatus extends Component
{
    public $idea;
    public $status;
    public $comment;
    public $notifyAllVoters;
    public $data = [];

    public function mount(Idea $idea)
    {
        $this->idea = $idea;
        $this->status = $this->idea->status_id;
    }

    public function setStatus()
    {
        if(! auth()->check() || ! auth()->user()->isAdmin()) {
            abort(Response::HTTP_FORBIDDEN);
        }

        // we're logged in and we have admin priviledges
        $this->idea->status_id = $this->status;

        $this->idea->save();
        $this->idea->refresh();
        //$savedIdea = Idea::find($this->idea->id);

        $statusName = $this->idea->status->name;
        $statusColor = $this->idea->status->getStatusTextColor();



        // emit success notification
        $data = "Status changed to: <span class='$statusColor'>$statusName</span>";

        $this->emit('successNotify', $data);

        // let's notify all voters
        if($this->notifyAllVoters) {
            NotifyAllVoters::dispatch($this->idea);
        };

        // add a comment
        Comment::create([
            'user_id' => auth()->id(),
            'idea_id' => $this->idea->id,
            'status_id' => $this->status,
            'body' => $this->comment ?? 'status has changed',
            'is_status_update' => true,
        ]);
        // and reset the comment
        $this->reset('comment');

        //let parent component know status has changed
        $this->emit('statusChanged');
    }

    public function render()
    {
        return view('livewire.set-status');
    }
}
