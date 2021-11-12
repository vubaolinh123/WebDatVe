<?php

namespace App\Http\Livewire\Backend\Login;

use Livewire\Component;

class Login extends Component
{
    public $email ;
    public $password ;

    public $rules = [
        'email' => 'required|email',
        'password' => 'required|min:6'
    ];
    public $messages = [
        'email.required' => 'Email không được bỏ trống !',
        'email.email' => 'Email không đúng định dạng !',
        'password.required' => 'Mật khẩu không được bỏ trống !',
        'password.min' => 'Mật khẩu trên 6 ký tự !'
    ];
    public function updated() {
        $this -> validate();
    }
    public function loginAdmin(){
        $this -> validate();
    }
    public function render()
    {
        return view('livewire.backend.login.login');
    }
}
