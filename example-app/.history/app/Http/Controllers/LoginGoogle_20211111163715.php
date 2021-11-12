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
                Auth::login($findId);
                return redirect('dashboard');
            }else{
                 $userLogin = User::create([
                     'name' => $user->name,
                     'email' => $user->email,
                     'google_id' => $user->id,
                     'password' => password_hash($user->id , PASSWORD_DEFAULT),
                 ]);
                 Auth::login($userLogin);
                 return redirect('dashboard');
            }
        } catch (\Throwable $th) {
            echo $th;
        }
   }

}
