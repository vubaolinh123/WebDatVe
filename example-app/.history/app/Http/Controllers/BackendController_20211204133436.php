<?php

namespace App\Http\Controllers;

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

    }
}
