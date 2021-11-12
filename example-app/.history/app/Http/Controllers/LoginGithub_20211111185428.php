<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Socialite;

class LoginGithub extends Controller
{
    public function redirectToGithub()
    {
        return Socialite::driver('github')->redirect('callback');
    }
    public function callback()
    {
        try {

            $user = (Socialite::driver('github'))->stateless()->user();

            $findId = User::where('github_id', $user->id)->first();
            dd($user);
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
                        'github_id' => $user->id,
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
