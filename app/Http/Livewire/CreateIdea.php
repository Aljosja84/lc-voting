<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Idea;
use Illuminate\Http\Response;
use Livewire\Component;
use Illuminate\Support\Facades\Validator;

class CreateIdea extends Component
{
    public $title;
    public $category = 1;
    public $description;

    // everyone knows the rules Franky
    protected $rules = [
        'title' => 'required|min:5',
    ];

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function createIdea()
    {
        if(auth()->check()) {
            $this->validate();
            // create the idea
            Idea::create([
                'user_id' => auth()->id(),
                'category_id' => $this->category,
                'status_id' => 1,
                'title' => $this->title,
                'description' => $this->description
            ]);

            session()->flash('success_message', 'Your idea was added!');

            // reset the form
            $this->reset();

            // reload the page
            return redirect()->route('idea.index');
        }
        // in case user is not logged in
        abort(Response::HTTP_FORBIDDEN);
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function render()
    {
        return view('livewire.create-idea', [
            'categories' => Category::all()
        ]);
    }
}
