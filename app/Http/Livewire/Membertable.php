<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Member;
use Livewire\WithPagination;

class Membertable extends Component
{
    use WithPagination;

    public $sortBy = 'id';

    public $sortDirection = 'asc';
    public $search = '';

    public function render()
    {
        $member = Member::query()
        ->search($this->search)
        ->orderBy($this->sortBy, $this->sortDirection)
        ->paginate(10);

        return view('livewire.membertable',['member'=>$member]);
    }

    public function sortBy($field)
    {
        if($this->sortDirection == 'asc'){
            $this->sortDirection = 'desc';
        }else {
            $this->sortDirection = 'asc';
        }

        return $this->sortBy = $field;
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }
}
