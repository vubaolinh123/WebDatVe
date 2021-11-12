<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Socialite;

class LoginGoogle extends Controller
{
    public function redirectToGoogle(){
        return Socialite::driver('google')->redirect('callback');
    }
 public function callback(){
        try {

            $user = (Socialite::driver('google'))->stateless()->user();
            $findId = User::where('google_id' , $user->id)->first();
            if($findId){
                dd(1);
                Auth::login($findId);
                return redirect('dashboard');
            }else{
                if($ac = User::where('email', $user->email)->first()){
                    $userLogin = $ac -> update([
                        'google_id' => $user->id,
                    ]);
                }else{

                    $userLogin = User::create([
                        'name' => $user->name,
                        'email' => $user->email,
                        'google_id' => $user->id,
                        'password' => password_hash($user->id , PASSWORD_DEFAULT),
                    ]);
                }
                 Auth::login($userLogin);
                 return redirect('/home');
            }
        } catch (\Throwable $th) {
            echo $th;
        }
   }

}
