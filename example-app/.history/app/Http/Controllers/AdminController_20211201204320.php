<?php

namespace App\Http\Controllers;

use App\Models\Receipt;
use App\Models\Receipt_Detail;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function dashboard()
    {
        $dt = Carbon::now('Asia/Ho_Chi_Minh');
        $countBuy = Receipt_Detail::all();
         $sumPrice = (Receipt::where('date_pay',$dt)->sum('total'));
        return view('Backend.page.dashboard.home_admin',['sumPrice' => $sumPrice]);
    }
    public function logoutAdmin()
    {
        Auth::logout();
        return redirect('/admin/login');
    }
}
