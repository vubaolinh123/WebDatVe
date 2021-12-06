<?php

namespace App\Http\Controllers;

use App\Models\Receipt;
use App\Models\Receipt_Detail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function dashboard()
    {
        $countBuy = Receipt_Detail::all();
         $sumPrice = (Receipt::all()->sum('total'));
        return view('Backend.page.dashboard.home_admin');
    }
    public function logoutAdmin()
    {
        Auth::logout();
        return redirect('/admin/login');
    }
}
