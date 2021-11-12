<?php

namespace App\Http\Livewire\Frontend\Login;

use Livewire\Component;

class Login extends Component
{
    public $flag = false ;
    public function registerD(){
        $this->flag = true ;
    }
    public function render()
    {
        return view('livewire.frontend.login.login');
    }
}
