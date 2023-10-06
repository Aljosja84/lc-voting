<?php

namespace App\Http\Livewire;

use App\Jobs\NotifyAllVoters;
use App\Mail\IdeaStatusUpdateMailable;
use App\Models\Idea;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class SetStatus extends Component
{
    public $idea;
    public $status;
    public $statusName;
    public $notifyAllVoters;

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

        $this->statusName = Idea::find($this->idea->id)->status->name;



        // emit success notification

        $this->emit('successNotify', "Status changed to: $this->statusName" );

        // let's notify all voters
        if($this->notifyAllVoters) {
            NotifyAllVoters::dispatch($this->idea);
        };

        //let parent component know status has changed
        $this->emit('statusChanged');
    }

    public function render()
    {
        return view('livewire.set-status');
    }
}
