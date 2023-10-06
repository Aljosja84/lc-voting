<?php

namespace App\Http\Livewire;

use App\Models\Idea;
use http\Client\Response;
use Livewire\Component;

class MarkIdeaAsNotSpam extends Component
{
    public $idea;

    public function mount(Idea $idea)
    {
        $this->idea = $idea;
    }

    public function markAsNotSpam()
    {
        if(auth()->guest() || ! auth()->user()->isAdmin()) {
            abort(\Illuminate\Http\Response::HTTP_FORBIDDEN);
        }

        $this->idea->spam_reports = 0;
        $this->idea->save();

        $this->emit('ideaWasNotSpam');
        // emit the success notification
        $this->emit('successNotify', 'Idea spam count has been reset to 0!');
    }

    public function render()
    {
        return view('livewire.mark-idea-as-not-spam');
    }
}
