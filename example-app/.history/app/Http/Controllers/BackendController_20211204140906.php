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
        $users = $user::paginate(5,['name' , 'email','id']);
        dd($users -> links());
        $me = User::find( auth()->user()->id , ['id','name','email']);
        return view('Backend.page.manage.index',['users' => $users , 'me' => $me]);
    }
    public function change_role(Request $request)
    {
        if($request-> data == auth()->user()->id) return 1;
        $user = User::find($request-> data , ['id']);
        $me = User::find( auth()->user()->id , ['id']);

        $admin = Roles::where('name' , 'admin')->first();
        $auth = Roles::where('name' , 'auth')->first();
        if($request->role == 'auth'){
            if(!($me -> hasRole('admin'))) return -1;
            if($user -> hasRole('auth')){
                $user -> roles()->detach($auth) ;
            }else{
                $user -> roles()->attach($auth) ;
            }
            return 0;
        }else if($request->role == 'admin'){
            if(!($me -> hasRole('boss'))) return -1;
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
