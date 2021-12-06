<?php

namespace App\Http\Controllers;

use App\Models\Foods;
use App\Models\Receipt;
use App\Models\Receipt_Detail;
use App\Models\Receipt_Food;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function dashboard()
    {
        $dt = Carbon::now('Asia/Ho_Chi_Minh');
        $countBuy = count(Receipt_Detail::all());
        $sumPriceOneDay = (Receipt::where('date_pay','>=',$dt->subDays(1))->sum('total'));
        $sumPriceMonth = (Receipt::where('date_pay','>=',$dt->subDays(30))->sum('total'));
        $countChair = (Receipt_Food::all()->sum('quantity'));
        $sumPrice = (Receipt::all()->sum('total'));
        return view('Backend.page.dashboard.home_admin',['countChair' => $countChair,'countBuy' => $countBuy,'sumPriceMonth' => $sumPriceMonth,'sumPrice' => $sumPrice,'sumPriceOneDay' => $sumPriceOneDay]);
    }
    public function logoutAdmin()
    {
        Auth::logout();
        return redirect('/admin/login');
    }
}
