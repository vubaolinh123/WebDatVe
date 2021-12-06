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
        if($request-> data == auth()->user()->id) return 1;
        $user = User::find($request-> data , ['id']);
        if(($user -> hasRole('admin'))) return -1;
        $admin = Roles::where('name' , 'admin')->first();
        $auth = Roles::where('name' , 'auth')->first();
        if($request->role == 'auth'){
            if($user -> hasRole('auth')){
                $user -> roles()->detach($auth) ;
            }else{
                $user -> roles()->attach($auth) ;
            }
            return 0;
        }else if($request->role == 'admin'){
            if($user -> hasRole('admin')){
                $user -> roles()->detach($admin) ;
            }else{
                $user -> roles()->attach($admin) ;
            }
            return 0;
        }else{
            return abort(404);
        }
    }
}
