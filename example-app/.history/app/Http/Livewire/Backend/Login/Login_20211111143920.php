<?php

namespace App\Http\Livewire\Backend\Login;

use App\Events\SendMail;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{
    public $email ;
    public $password ;
    public $code ;
    public $count = 0;
    public $errorLoginVeri = false;
    public $rules = [
        'email' => 'required|email',
        'password' => 'required|min:4',

    ];
    public $messages = [
        'email.required' => 'Email không được bỏ trống !',
        'email.email' => 'Email không đúng định dạng !',
        'password.required' => 'Mật khẩu không được bỏ trống !',
        'password.min' => 'Mật khẩu trên 4 ký tự !',

    ];
    public function updated() {
        $this -> validate();
    }
    public function loginAdmin(){
        $this -> validate();

        if(Auth::attempt(['email' => $this -> email,'password' =>$this -> password])){
        }else{
            if( $user = User::where(['email' => $this -> email ] )->first()){
                unset($user -> password);
                $count = $user -> status + 1 ;
                if($count >= 5) $count = 5 ;
                $user -> status = $count ; //
                $user -> save();
                $this -> count ++;
                if($count >= 5){
                    $this -> errorLoginVeri = true;
                    return ;
                };
                $this -> addError('errorLogin' , 'Thông tin đăng nhập sai ! Vui lòng nhập lại \n Lần thứ '. $count);
                return ;
            }
            $this -> addError('errorLogin' , 'Email chưa được đăng ký ');
        }
    }
    public function clickSendCode(){
        event(new SendMail($this->email , '1212121'));
    }
    public function checkCode(){
        $this -> validate([
            'code' => 'required|min:6|max:6'
        ],[
            'code.required' => 'Mã code không được để trống !',
            'code.min' => 'Mã code 6 ký tự !',
            'code.max' => 'Mã code 6 ký tự !',
        ]);
    }
    public function resetD(){
        $this -> reset();
    }
    public function render()
    {
        return view('livewire.backend.login.login');
    }
}
