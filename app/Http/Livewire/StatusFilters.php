<?php

namespace App\Http\Livewire;

use App\Models\Idea;
use App\Models\Status;
use Illuminate\Support\Facades\Route;
use Livewire\Component;

class StatusFilters extends Component
{
    public $status = 'All';
    public $statusCount;

    protected $queryString = [
        'status',
    ];

    /**
     *
     */
    public function mount()
    {
        $this->statusCount = Status::getCount();

        if(Route::currentRouteName() === 'idea.show') {
            $this->status = null;
            $this->queryString = [];
        }
    }

    /**
     * @param $newStatus
     */
    public function setStatus($newStatus)
    {
        $this->status = $newStatus;

        //if(app('router')->getRoutes()->match(app('request')->create(url()->previous()))->getName() === 'idea.show') {
            return redirect()->route('idea.index', [
               'status' => $this->status
            ]);
        //}
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function render()
    {
        return view('livewire.status-filters');
    }
}
