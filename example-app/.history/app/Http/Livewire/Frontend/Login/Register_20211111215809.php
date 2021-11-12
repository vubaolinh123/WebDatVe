<?php

namespace App\Http\Livewire\Frontend\Login;

use Livewire\Component;

class Register extends Component
{
    public $rules = [
        'name' => 'required|min:3',
        'email' => 'required|email',
        'password' => 'required|min:4',
        'confirmPassword' => 'required|same:password',
    ];
    public function render()
    {
        return view('livewire.frontend.login.register');
    }
}
