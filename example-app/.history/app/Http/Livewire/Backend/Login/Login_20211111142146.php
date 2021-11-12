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
    public $errorLoginVeri = false;
    public $rules = [
        'email' => 'required|email',
        'password' => 'required|min:4'
    ];
    public $messages = [
        'email.required' => 'Email không được bỏ trống !',
        'email.email' => 'Email không đúng định dạng !',
        'password.required' => 'Mật khẩu không được bỏ trống !',
        'password.min' => 'Mật khẩu trên 4 ký tự !'
    ];
    public function updated() {
        $this -> validate();
    }
    public function loginAdmin(){
        $this -> validate();

        if(Auth::attempt(['email' => $this -> email,'password' =>$this -> password])){

            // if(Auth::attempt(['email' => $this -> email,'password' =>$this -> password])){
            //     return redirect('/admin/dashboard');
            // }else{
            //     $user = User::where(['email' => $this -> email ] );
            //     unset($user['password']);
            //     $count = $user -> status + 1 ;
            //     if($count >= 5) $count = 5 ;
            //     $user -> status = $count ; //
            //     $user -> save();
            //     $this -> count ++;
            //     if($count >= 5){
            //         $this -> errorLoginVeri = true;
            //         $this -> addError('errorLogin' , 'Thông tin đăng nhập sai ! Vui lòng nhập lại \n Lần thứ '. $this -> count);
            //     };
            // }
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
    public function checkCode(){

    }
    public function resetD(){
        $this -> reset();
    }
    public function render()
    {
        return view('livewire.backend.login.login');
    }
}
