<?php

namespace App\Http\Livewire;

use App\Models\Idea;
use Livewire\Component;
use Livewire\WithPagination;

class IdeaComments extends Component
{
    use WithPagination;
    public $idea;

    protected $listeners = ['commentWasAdded'];

    /**
     *
     */
    public function commentWasAdded()
    {
        $this->idea->refresh();
    }

    /**
     * @param Idea $idea
     */
    public function mount(Idea $idea)
    {
        $this->idea = $idea;
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function render()
    {
        return view('livewire.idea-comments', [
            'comments' => $this->idea->comments()->paginate()->withQueryString(),
        ]);
    }
}
