<?php

namespace App\Http\Livewire;

use App\Models\Idea;
use Illuminate\Http\Response;
use Livewire\Component;

class SetStatus extends Component
{
    public $idea;
    public $status;

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

        //let parent component know status has changed
        $this->emit('statusChanged');
    }

    public function render()
    {
        return view('livewire.set-status');
    }
}
