<?php

namespace App\Http\Livewire\Frontend\Login;

use App\Events\SendMail;
use App\Models\TokenGmail;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Carbon\Carbon;

class Register extends Component
{
    public $name;
    public $email;
    public $password;
    public $code;
    public $confirmPassword;
    public $flag = false;
    public $idRes = 0;
    public $time;
    public $successCode = false;
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
    public function updated()
    {
        $this->validate();
    }
    public function timeHCode()
    {
        if ($this->time <= Carbon::now('Asia/Ho_Chi_Minh')) {
            $this->time = Carbon::now('Asia/Ho_Chi_Minh');
            if ($this->idRes != 0) {
                TokenGmail::where('id_register', $this->idRes)->delete();
                $this->backLogin();
            }
        }
    }
    public function backLogin()
    {
        $this->flag = false;
    }
    public function ruleCode()
    {
        $this->validate([
            'code' => 'required|min:6|max:6'
        ], [
            'code.required' => 'Mã code không được để trống !',
            'code.min' => 'Mã code 6 ký tự !',
            'code.max' => 'Mã code 6 ký tự !',
        ]);

        if ($check =  TokenGmail::where('id_register', $this->idRes)->first()) {
            if (Hash::check($this->code, $check->activation_code)) {
                $check->delete();
                User::create(
                    [
                        'name' => $this->name,
                        'email' => $this->email,
                        'password' => bcrypt($this->password),
                    ]
                );
                $this->successCode = true;
                $this-> reset();
            } else {
                $this->addError('errorLogin', 'Token bạn đã nhập sai !');
            }
        } else {
            dd('lost');
        };

    }
    public function registUser()
    {
        $this->validate();
        if ($check = TokenGmail::where('id_register',  $this->idRes)->first()) {
            $check->delete();
        }
        $code = rand(111111, 999999);
        $this->idRes = uniqid();
        TokenGmail::create([
            'id_register' =>  $this->idRes,
            'activation_code'  => Hash::make($code)
        ]);
        event(new SendMail($this->email, $code));
        $this -> time  = Carbon::now('Asia/Ho_Chi_Minh')->addMinutes(1);
        $this->flag = true;

    }
    public function render()
    {

        return view('livewire.frontend.login.register');
    }
}
