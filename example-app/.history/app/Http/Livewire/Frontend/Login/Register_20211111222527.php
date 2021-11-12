<?php

namespace App\Http\Livewire\Frontend\Login;

use App\Events\SendMail;
use App\Models\TokenGmail;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Register extends Component
{
    public $name;
    public $email;
    public $password;
    public $confirmPassword;
    public $flag = false;
    public $idRes = 0 ;

    public $rules = [
        'name' => 'required|min:3',
        'email' => 'required|email|unique:users',
        'password' => 'required|min:4',
        'confirmPassword' => 'required|same:password',
    ];
    public $messages = [
        'name.required' => 'Tên không được bỏ trống !',
        'name.min' => 'Tên không nhỏ hơn 3 ký tự !',
        'email.required' => 'Email không được bỏ trống !',
        'email.email' => 'Email không đúng định dạng !',
        'email.unique' => 'Email đã tồn tại !',
        'password.required' => 'Mật không được bỏ trống !',
        'confirmPassword.required' => 'Mật khẩu nhập lại không được bỏ trống !',
        'confirmPassword.same' => 'Mật khẩu không khớp !',
        'password.min' => 'Mật khẩu không được nhỏ hơn 4 ký tự !',
    ];
    public function updated(){
        $this -> validate();
       if($check = TokenGmail::where('id_register' ,  $this -> idRes)->first()){
            $check -> delete();
       }
         $code = rand(111111, 999999);
        TokenGmail::created([
            'id_register' =>  $this -> idRes,
             'activation_code'  => Hash::make($code)
        ]);
        event(new SendMail($this->email, $code));
        $this -> flag = true;
    }
    public function registUser(){
        $this -> validate();
    }
    public function render()
    {   $this -> idRes = uniqid();
        return view('livewire.frontend.login.register');
    }
}
