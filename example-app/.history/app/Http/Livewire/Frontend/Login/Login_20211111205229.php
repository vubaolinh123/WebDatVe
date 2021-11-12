<?php

namespace App\Http\Livewire\Frontend\Login;

use Livewire\Component;

class Login extends Component
{
    public $flag = false ;
    public function registUser(){
        dd(1);
    }
    public function registerD(){
        $this->flag = ! $this->flag ;
    }
    public function render()
    {
        return view('livewire.frontend.login.login');
    }
}
