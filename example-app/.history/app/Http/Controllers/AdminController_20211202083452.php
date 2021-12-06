<?php

namespace App\Http\Controllers;

use App\Models\Foods;
use App\Models\Receipt;
use App\Models\Receipt_Detail;
use App\Models\Receipt_Food;
use App\Models\Showtime;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function dashboard()
    {
        $dt = Carbon::now('Asia/Ho_Chi_Minh');
        $receipts = Receipt::where('date_pay' , '>=' , $dt->subMonths(1))->get();

        $arr = [];
        $arrSave = [];
        $arrRender = [];

        $arrUser = [];
        $arrSaveUser = [];
        $arrRenderUser = [];
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
        for ($i=0; $i < count($arr) ; $i++) {
            $count = count(Receipt::where('showtime_id' , $arr[$i])->get());
            $arrSave[$arr[$i]] = $count;
        }

        arsort($arrSave);
        $count = 0;
        $countUser = 0;
        foreach($arrSave  as $k => $v){
            $count ++ ;
            if($count <= 3){
                $data = Showtime::where('id_showtime',$k)->first();
                array_push($arrRender,$data);
            }else{
                break ;
            }
        }
        foreach($arrSaveUser  as $k => $v){
            $countUser ++ ;
            if($countUser <= 3){
                $data = User::find($k,['name','email','id']);
                array_push($arrRenderUser,$data);
            }else{
                break ;
            }
        }


        $countBuy = count(Receipt_Detail::all());
        dump($dt->subDays(1));
        dd(Receipt::where('date_pay','>',$dt->subDay()->toDateTimeString())->get());
        $sumPriceOneDay = (Receipt::where('date_pay','>',$dt->subDay()->toDateTimeString())->sum('total'));
        $sumPriceMonth = (Receipt::where('date_pay','>=',$dt->subDays(30))->sum('total'));
        $countChair = (Receipt_Food::all()->sum('quantity'));
        $sumPrice = (Receipt::all()->sum('total'));
        return view('Backend.page.dashboard.home_admin',[ 'arrRenderUser' => $arrRenderUser,'arrRender' => $arrRender, 'countChair' => $countChair,'countBuy' => $countBuy,'sumPriceMonth' => $sumPriceMonth,'sumPrice' => $sumPrice,'sumPriceOneDay' => $sumPriceOneDay]);
    }
    public function logoutAdmin()
    {
        Auth::logout();
        return redirect('/admin/login');
    }
}
