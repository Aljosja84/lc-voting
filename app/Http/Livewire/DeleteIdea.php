<?php

namespace App\Http\Livewire;

use App\Models\Idea;
use Illuminate\Http\Response;
use Livewire\Component;

class DeleteIdea extends Component
{
    public $idea;

    public function mount(Idea $idea)
    {
        $this->idea = $idea;
    }

    public function render()
    {
        return view('livewire.delete-idea');
    }

    public function deleteIdea()
    {
        // Authorize
        if(auth()->guest() || auth()->user()->cannot('delete', $this->idea)) {
            abort(Response::HTTP_FORBIDDEN);
        }

        Idea::destroy($this->idea->id);

        return redirect()->route('idea.index');
    }
}
