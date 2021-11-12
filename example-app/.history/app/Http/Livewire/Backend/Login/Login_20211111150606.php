<?php

namespace App\Http\Livewire\Backend\Login;

use App\Events\SendMail;
use App\Models\TokenGmail;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Login extends Component
{
    public $email ;
    public $password ;
    public $passNew;
    public $code ;
    public $successCode  = false;
    public $count = 0;
    public $idTokenLogin = 0 ;
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
                $this -> idTokenLogin = $user -> id ;
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
        if($this -> idTokenLogin != 0 ){
            TokenGmail::where('user_id',$this -> idTokenLogin)->delete();
        }

        $code = rand(111111,999999);

        TokenGmail::created([
            'user_id' => $this -> idTokenLogin,
            'token'  => Hash::make($code)
        ]);
        event(new SendMail($this->email ,$code));
    }
    public function checkCode(){
        $this -> validate([
            'code' => 'required|min:6|max:6'
        ],[
            'code.required' => 'Mã code không được để trống !',
            'code.min' => 'Mã code 6 ký tự !',
            'code.max' => 'Mã code 6 ký tự !',
        ]);
        if($this -> idTokenLogin == 0 ) return ;
        if( $check =  TokenGmail::where('user_id' , $this -> idTokenLogin)->first()){
            if( Hash::check($check->tactivation_code, $this -> code)){
                $check -> delete();
                $this -> passNew  = uniqid();
                User::find($this -> idTokenLogin)->update(
                    [
                        'status' => 0,
                        'password' => bcrypt($this ->passNew)
                    ]
                );
                $this -> successCode = true ;
            }else{
                $this -> addError('errorLogin' , 'Token bạn đã nhập sai !');
            }
        }else{
            dd('lost');
        };
    }

    public function backLogin(){
        $this -> successCode = false ;
        $this -> errorLoginVeri = false;
    }
    public function resetD(){
        $this -> reset();
    }
    public function render()
    {
        return view('livewire.backend.login.login');
    }
}
