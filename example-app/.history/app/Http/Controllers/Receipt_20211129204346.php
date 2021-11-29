<?php

namespace App\Http\Controllers;

use App\Jobs\SendConfirm;
use App\Mail\SendConfirm as MailSendConfirm;
use App\Models\Receipt as ModelsReceipt;
use App\Models\Receipt_Roles;
use App\Models\Showtime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use PDO;
use Carbon\Carbon;
class Receipt extends Controller
{

    public function confirm(Request $request,$links){
        if(Receipt_Roles::where('links' , $links)->exists()){
            $receipt_ros = Receipt_Roles::where('links' , $links)->first();
            $find = $this-> find($receipt_ros->receipt_id);
            // dd($find);
            $find->update([   'user_view_success' => 1]);
            $receipt_ros -> delete();
            return view('Backend.page.receipt.success',['id_receipt' => $find->id_receipt]);
        }
        return '<h1>404 | NOT FOUND ...</h1><br><h2 style="color:red" > Cảnh báo ' . $request ->ip().' đang cố xâm nhập trang web   </h2>';
    }

    public function find($id){
        return ModelsReceipt::where('id_receipt' , $id)->first();
    }

    public function change_pay(Request $request){
        $find = $this-> find($request->id);
        if( $request->value == 1){
            $code = time() . uniqid();
            Receipt_Roles::create([
                'links' =>$code ,
                'receipt_id' => $request->id
            ]);
            $email = $find->user->email;
            $links = url()->signedRoute('confirm.receipt.movie' , ['links' => $code]);

            Mail::to($email)->send(new MailSendConfirm($links));
            $find->update([ 'user_view_success' => 3]);
            return 1;
        }else{
            if($find ->user_view_success == 0)  $find->update([   'user_view_success' => $request->value]);
            return 1;
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
        $now = Carbon::now('Asia/Ho_Chi_Minh');
        $showtimes = Showtime::where('show_date', $now ->toDateString())->get();
        return view('Backend.page.receipt.index',['showtimes' => $showtimes ,]);
    }

    public function render_list(Request $request)
    {
        $now = Carbon::now('Asia/Ho_Chi_Minh');

        $query = ModelsReceipt::query();

        $query -> when( $request -> has('data') , function ($query) use($request) {
            return $query -> where('id_receipt' , 'like' , '%' .  $request -> data  . '%')
                        ->orWhere('total' , 'like' , '%' .  $request -> data  . '%') ;
        } ) ;
        $receipts = $query ->orderBy('date_pay' , 'desc')->get();
        //
        $receiptsNew = [];
        if($request->has('type')){
            switch ($request -> type) {
                case 'now':
                        foreach ($receipts as  $value) {
                            if($value->showtime -> show_date == $now ->toDateString()){
                                array_push($receiptsNew, $value);
                            }
                        }
                    break;
                case 'sevent-day':
                        foreach ($receipts as  $value) {
                            if($value->showtime -> show_date >= $now ->subDays(7)){
                                array_push($receiptsNew, $value);
                            }
                        }
                    break;
                case 'month':
                        foreach ($receipts as  $value) {
                            if($value->showtime -> show_date >= $now ->subDays(30)){
                                array_push($receiptsNew, $value);
                            }
                        }
                    break;
                case 'all':
                    $receiptsNew = $receipts;
                    break;
                default:
                    # code...
                    break;
            }
        }else{
            $receiptsNew = $receipts;
        }
        //
        $render = view('Backend.page.receipt.render-list',['receipts' => $receiptsNew , 'data' => ( $request -> data ?? 0) ]) -> render();
        return $render;
    }

    public function show($id)
    {
        $receipt =  $this-> find($id);
        return view('Backend.page.receipt.show' , ['receipt' => $receipt] );
    }

    public function destroy($id)
    {
        $find = $this-> find($id);

        foreach ($find ->receipt_food as $receipt_food) {
            $receipt_food->delete();
        }
        foreach ($find ->receipt_detail as $receipt_detail) {
            $receipt_detail->delete();
        }

        $find->delete();
        return redirect()->back();
    }
}
