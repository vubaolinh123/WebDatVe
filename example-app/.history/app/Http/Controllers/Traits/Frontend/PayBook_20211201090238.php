<?php
namespace App\Http\Controllers\Traits\Frontend;

use App\Mail\PayMail;
use App\Models\Foods;
use App\Models\Receipt;
use App\Models\Receipt_Detail;
use App\Models\Receipt_Food;
use App\Models\Showtime;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

trait PayBook {
//
          /**
     * @param \App\Models\Showtime $show_time
     */
    public function pay_ticket(Showtime $showtimes,$id){
        $show_time = $showtimes::find($id);
        return view('Frontend.page.pay-ticket', [
           'show_time' => $show_time,
           'id' => $show_time->id_showtime
        ]);
    }

    /**
     * @param \App\Models\Ticket $tickets
     * @param \App\Models\Foods $foods
     * @param \App\Models\Receipt $receipt
     * @param \App\Models\Receipt_Detail $receipt_Detail
     * @param \App\Models\Receipt_Food $receipt_Food
     */
    public function pay_success(
                                Ticket $tickets ,
                                Foods $foods,
                                Receipt $receipt,
                                Receipt_Detail $receipt_Detail,
                                Receipt_Food $receipt_Food,
                                Request $request,
                                $id)
    {
        $prFoods = 0;
        $prTicket = 0 ;

        if($request->session()->has('book1')){

            foreach($request->session()->get('book1') as $key => $value){
                if($key == 'ticket'){
                    foreach($value as $k => $v){
                        $ticket = $tickets::where('id_price_ticket',$k)->first();
                        $prTicket += $ticket->unit_price * $v;
                    }
                }elseif($key == 'food'){
                    foreach($value as  $k => $v){
                        $food = $foods::where('id_food',$k)->first();
                        $prFoods += $food->price * $v;
                    }
                }
            };

        }

        $total = $prFoods + $prTicket;
        $token = uniqid() . time();
        $receipt::create([
            'id_receipt' => $token,
            'user_id' => Auth::user()->id,
            'date_pay' => Carbon::now('Asia/Ho_Chi_Minh'),
            'total' => $total,
            'showtime_id' => $id
        ]);

        foreach($request->session()->get('book1') as $key => $value){

            if($key == 'ticket'){

                foreach($value as $k => $v){

                    foreach($request->session()->get('chair') as $value){

                        $ticket = $tickets::where('id_price_ticket',$k)->first();
                        if($ticket->status == $value['status']){
                            $receipt_Detail::create([
                                'ticket_id' => $k,
                                'chair_code' => $value['chair'] ,
                                'showtime_id' => $id,
                                'receipt_id' =>$token
                            ]);
                        }

                    }

                }

            }elseif($key == 'food'){

                foreach($value as  $k => $v){
                        $receipt_Food::create([
                            'quantity' => $v,
                            'food_id' => $k,
                            'receipt_id' => $token
                        ]);
                    }

            }

        };

        Mail::to(Auth::user()->email)->send(new PayMail($id));
        $request->session()->forget('chair');
        $request->session()->forget('book1');
        return redirect('/');
    }
//
}
