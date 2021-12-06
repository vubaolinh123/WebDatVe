<?php

namespace App\Http\Controllers;

use App\Models\Foods;
use App\Models\Receipt;
use App\Models\Receipt_Detail;
use App\Models\Receipt_Food;
use App\Models\Showtime;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function dashboard()
    {
        $receipts = Receipt::all();

        $arr = [];
        $arrSave = [];
        $arrRender = [];

        $arrUser = [];
        $arrSaveUser = [];
        $iUser = 0;
        foreach ($receipts as $receipt ){
            if(!in_array($receipt -> showtime_id , $arr)){
                array_push($arr,$receipt -> showtime_id);
            }
            if(!in_array($receipt -> user_id,$arrUser)){
                array_push($arrUser,$receipt -> user_id);
            }else{
                $iUser = $iUser + 1 ;
                $arrSaveUser[$receipt -> user_id] = $iUser ;
            }
        }
        dd($arrSaveUser);
        for ($i=0; $i < count($arr) ; $i++) {
            $count = count(Receipt::where('showtime_id' , $arr[$i])->get());
            $arrSave[$arr[$i]] = $count;
        }

        arsort($arrSave);
        $count = 0;
        $countUser = 0;
        foreach($arrSave  as $k => $v){
            $count ++ ;
            if($count >= 3){
                $data = Showtime::where('id_showtime',$k)->first();
                array_push($arrRender,$data);
            }else{
                break ;
            }
        }
        foreach($arrSaveUser  as $k => $v){
            $countUser ++ ;
            if($countUser <= 3){
                $data = Showtime::where('id_showtime',$k)->first();
                array_push($arrRender,$data);
            }else{
                break ;
            }
        }
        $dt = Carbon::now('Asia/Ho_Chi_Minh');
        $countBuy = count(Receipt_Detail::all());
        $sumPriceOneDay = (Receipt::where('date_pay','>=',$dt->subDays(1))->sum('total'));
        $sumPriceMonth = (Receipt::where('date_pay','>=',$dt->subDays(30))->sum('total'));
        $countChair = (Receipt_Food::all()->sum('quantity'));
        $sumPrice = (Receipt::all()->sum('total'));
        return view('Backend.page.dashboard.home_admin',['arrRender' => $arrRender, 'countChair' => $countChair,'countBuy' => $countBuy,'sumPriceMonth' => $sumPriceMonth,'sumPrice' => $sumPrice,'sumPriceOneDay' => $sumPriceOneDay]);
    }
    public function logoutAdmin()
    {
        Auth::logout();
        return redirect('/admin/login');
    }
}
