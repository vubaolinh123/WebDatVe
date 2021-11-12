<?php

namespace App\Http\Controllers\Traits;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Socialite;

trait Socail
{


    public function driver()
    {
    }
    public function redirect()
    {
        return Socialite::driver($this->driver())->redirect('callback');
    }
    public function callback()
    {
        try {

            $user = (Socialite::driver($this->driver()))->stateless()->user();
            $id_social = $this->driver() . '_id';
            $findId = User::where($id_social, $user->id)->first();
            if ($findId) {
                Auth::login($findId);
                if(Auth::user()->hasRoles(['admin','user'])) return redirect('admin/dashboard');
                return redirect('dashboard');
            } else {
                if ($ac = User::where('email', $user->email)->first()) {
                    $ac->$id_social = $user->id;
                    $ac->save();
                } else {

                    $userLogin = User::create([
                        'name' => $user->name,
                        'email' => $user->email,
                        $id_social => $user->id,
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
