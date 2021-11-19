<?php

namespace App\Http\Livewire\Cinema;

use App\Models\Cinema;
use Livewire\Component;

class Update extends Component
{
    public $id ;
    public function mount($id)
    {
        $this -> id  = $id;
    }
    public function render()
    {
        Cinema::all();
        return view('livewire.cinema.update');
    }
}
