<?php

namespace App\Http\Livewire\Frontend\Login;

use App\Models\Roles;
use App\Models\User;
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
        $us = User::find(1);
        $admin = Roles::where('name','admin')->first();
        $user = Roles::where('name','user')->first();
        // dd($us -> roles() -> sync($admin));
        dd($us -> hasRoles(['admin','user']));
        return view('livewire.frontend.login.login');
    }
}
