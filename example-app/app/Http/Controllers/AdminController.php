<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('Backend.page.dashboard.home_admin');
    }
    public function logoutAdmin()
    {
        Auth::logout();
        return redirect('/admin/login');
    }
}