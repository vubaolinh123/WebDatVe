<?php

namespace App\Http\Livewire\Backend\Login;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{
    public $email ;
    public $password ;
    public $count = 0;
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
        if(Auth::attempt(['email' => $this -> email])){
            if(Auth::attempt(['email' => $this -> email, 'password' => $this -> password])){

                return redirect('/admin/dashboard');
            }else{
                $this -> count ++;
                if($this -> count >= 5){
                    User::where(['email' => $this -> email ] )->update([
                        'status' => 1,
                    ]);
                    return ;
                };
                $this -> addError('errorLogin' , 'Thông tin đăng nhập sai ! Vui lòng nhập lại \n Lần thứ '. $this -> count);
            }
        }else{
            $this -> addError('errorLogin' , 'Email chưa được đăng ký ');
        }
    }
    public function resetD(){
        $this -> reset();
    }
    public function render()
    {
        return view('livewire.backend.login.login');
    }
}
