<?php

namespace App\Http\Livewire\Cinema;

use App\Models\Cinema;
use Livewire\Component;

class Update extends Component
{
    public $id_cinema ;
    public function mount($id)
    {
        $this -> id_cinema  = $id;
    }
    public function render()
    {
        $cinema = Cinema::find($this -> id_cinema );
        return view('livewire.cinema.update',['cinema' => $cinema]);
    }
}
