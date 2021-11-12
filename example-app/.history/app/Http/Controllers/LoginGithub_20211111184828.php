<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginGithub extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect('callback');
    }
    public function callback()
    {
        try {

            $user = (Socialite::driver('google'))->stateless()->user();
            $findId = User::where('google_id', $user->id)->first();
            if ($findId) {
                Auth::login($findId);
                return redirect('dashboard');
            } else {
                if ($ac = User::where('email', $user->email)->first()) {
                    $ac->google_id = $user->id;
                    $ac->save();
                } else {

                    $userLogin = User::create([
                        'name' => $user->name,
                        'email' => $user->email,
                        'google_id' => $user->id,
                        'password' => password_hash($user->id, PASSWORD_DEFAULT),
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
