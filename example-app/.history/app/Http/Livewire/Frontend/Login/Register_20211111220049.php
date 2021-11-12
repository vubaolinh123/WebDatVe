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
    public $messages = [
        'name.required' => 'Tên không được bỏ trống !',
        'name.min' => 'Tên không nhỏ hơn 3 ký tự !',
        'email.required' => 'Email không được bỏ trống !',
        'email.email' => 'Email không đúng định dạng !',
        'password.required' => 'Mật không được bỏ trống !',
        'confirmPassword.required' => 'Mật khẩu nhập lại không được bỏ trống !',
        'confirmPassword.same' => 'Mật khẩu không khớp !',
        'password.min' => 'Mật khẩu không được nhỏ hơn 4 ký tự !',
    ];
    public function render()
    {
        return view('livewire.frontend.login.register');
    }
}
