<?php

namespace App\Http\Controllers;

use App\Models\Roles;
use App\Models\User;
use Illuminate\Http\Request;

class BackendController extends Controller
{
    public function dashboard()
    {
        return view('Backend.layout_admin');
    }

    public function manage_user(User $user){
        $users = $user::all(['name' , 'email','id']);
        return view('Backend.page.manage.index',['users' => $users]);
    }
    public function change_role(Request $request)
    {
        $user = User::find($request-> data , ['id']);
        $admin = Roles::where('name' , 'admin')->first();
        $auth = Roles::where('name' , 'auth')->first();
        if($request->role == 'auth'){
            if($user -> hasRole('auth')){
                $user -> roles()->detach($auth) ;
            }else{
                $user -> roles()->attach($auth) ;
            }
        }else if($request->role == 'admin'){
            if($user -> hasRole('admin')){
                $user -> roles()->detach($admin) ;
            }else{
                $user -> roles()->attach($admin) ;
            }
        }else{
            return abort(404);
        }
    }
}
