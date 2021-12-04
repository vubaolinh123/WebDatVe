<?php

namespace App\Http\Controllers;

use App\Jobs\PayTicketEmail;
use App\Mail\PayMail;
use App\Models\Cinema;
use App\Models\Cinemaroom;
use App\Models\ClusterCinema;
use App\Models\Film;
use App\Models\FilmType;
use App\Models\Foods;
use App\Models\Receipt;
use App\Models\Receipt_Detail;
use App\Models\Receipt_Food;
use App\Models\Showtime;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use Illuminate\Contracts\Session\Session as SessionSession;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Traits\Frontend\Book;
use App\Http\Controllers\Traits\Frontend\AjaxBook;
class FrontendController extends Controller
{
    use Book;
    use AjaxBook;

    public function homeWeb()
    {
        return view('Frontend.page.home');
    }
    public function detailFim(Request $request,$id_film,$slug)
    {

        $clusterCinemas = ClusterCinema::all();
        $cinemas = Cinema::all();
        $film = Film::find($id_film);

        $cinemaOfFilms = [];
        $cinemaRooms = [];
        $checkRoom = [];
        $checkDG  = [];

        ( (($request->has('date'))) ?  $time = $request->date  : $time = Carbon::now('Asia/Ho_Chi_Minh')->toDateString());
        // dd($film->showtime->where('show_date',$time)->where('star_time'  , Carbon::now('Asia/Ho_Chi_Minh')->toTimeString() ) );

        foreach ($film->showtime->where('show_date',$time) as $room){

            if($room->start_time < Carbon::now('Asia/Ho_Chi_Minh')->toTimeString() ) continue ;

            if(!in_array($room->cinema_room->id_cinema_room,$checkRoom)){
                array_push($cinemaRooms , $room->cinema_room);
                array_push($checkRoom,$room->cinema_room->id_cinema_room);
            }
            if($room->cinema_room->cinema->cluster_cinema->where('city_id',Session::get('cityAddress'))->exists()){
                if(!in_array($room->cinema_room->cinema->id,$checkDG)){
                    array_push($cinemaOfFilms , $room->cinema_room->cinema);
                    array_push($checkDG,$room->cinema_room->cinema->id);
                }
            }

        }

        // dd(1);
        $type_films = FilmType::all();
        return view(
            'Frontend.page.detail_film',
            compact(
                'cinemas',
                'clusterCinemas',
                'film',
                'type_films',
                'cinemaOfFilms',
                'cinemaRooms'
                // 'showtimes',
            )
        );
    }
    public function getCityAddress($code)
    {
        Session::put('cityAddress', $code);
        return redirect()->back();
    }
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
}
