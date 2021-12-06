<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Film;
use App\Models\Cinema;
use App\Models\FilmType;
use Illuminate\Http\Request;
use App\Models\ClusterCinema;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Traits\Frontend\Book;
use App\Http\Controllers\Traits\Frontend\AjaxBook;
use App\Http\Controllers\Traits\Frontend\AjaxSelect;
use App\Http\Controllers\Traits\Frontend\PayBook;
use App\Models\Receipt;
use App\Models\StartCinema;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class FrontendController extends Controller
{
    use Book,AjaxSelect,AjaxBook,PayBook;

    public function homeWeb()
    {
        return view('Frontend.page.home');
    }
    public function detailFim(Request $request, $id_film, $slug)
    {

        $clusterCinemas = ClusterCinema::all();
        $cinemas = Cinema::all();
        $film = Film::find($id_film);

        $cinemaOfFilms = [];
        $cinemaRooms = [];
        $checkRoom = [];
        $checkDG  = [];
        ((($request->has('date'))) ?  $time = $request->date  : $time = Carbon::now('Asia/Ho_Chi_Minh')->toDateString());
        // dd($film->showtime->where('show_date',$time)->where('star_time'  , Carbon::now('Asia/Ho_Chi_Minh')->toTimeString() ) );

        foreach ($film->showtime->where('show_date', $time) as $room) {

            if ($room->start_time < Carbon::now('Asia/Ho_Chi_Minh')->toTimeString()) continue;

            if (!in_array($room->cinema_room->id_cinema_room, $checkRoom)) {
                array_push($cinemaRooms, $room->cinema_room);
                array_push($checkRoom, $room->cinema_room->id_cinema_room);
            }
            if ($room->cinema_room->cinema->cluster_cinema->where('city_id', Session::get('cityAddress'))->exists()) {
                if (!in_array($room->cinema_room->cinema->id, $checkDG)) {
                    array_push($cinemaOfFilms, $room->cinema_room->cinema);
                    array_push($checkDG, $room->cinema_room->cinema->id);
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

    public function ordreFilm()
    {
        if (!isset(Auth::user()->id)) {
            $null = 'Bạn chưa đăng nhập tài khoản !!';
            return view('Frontend.page.ordreFilm', compact('null'));
        } else {
            $id_user = Auth::user()->id;
            $receipts = Receipt::where('user_id', $id_user)
                // ->pluck(
                //     'id_receipt',
                //     'date_pay',
                //     'total',
                //     'user_view_success',
                //     'showtime_id'
                // );
                ->join('tbl_receipt_details as receiptDetail', 'receiptDetail.receipt_id', 'tbl_receipt.id_receipt')
                ->leftJoin('tbl_showtime', 'tbl_showtime.id_showtime', 'receiptDetail.showtime_id')
                ->join('tbl_film as film', 'film.id_film', 'tbl_showtime.film_id')
                ->select(
                    'film.avatar as img_film',
                    'film.name as name_film',
                    'tbl_showtime.show_date',
                    'tbl_showtime.start_time',
                    'receiptDetail.chair_code',
                    'tbl_receipt.total',
                    'film.id_film',
                )

                ->get();
            // dd($receipts);
            $receiptsVl = [];

            foreach ($receipts as $key => $receipt) {
                // echo  $receipt->show_date;
                if (!in_array($receipt->name_film, $receiptsVl)) {
                    array_push($receiptsVl, $receipt->name_film);
                }
                if (!in_array($receipt->id_film, $receiptsVl)) {
                    array_push($receiptsVl, $receipt->id_film);
                }
                if (!in_array($receipt->total, $receiptsVl)) {
                    array_push($receiptsVl, $receipt->total);
                }
                if (!in_array($receipt->img_film, $receiptsVl)) {
                    array_push($receiptsVl, $receipt->img_film);
                }
                array_push($receiptsVl, $receipt->show_date);
                if (!in_array($receipt->start_time, $receiptsVl)) {
                    array_push($receiptsVl, $receipt->start_time);
                }
                if (!in_array($receipt->chair_code, $receiptsVl)) {
                    array_push($receiptsVl, $receipt->chair_code);
                }
            }
            $receiptsVl = array_chunk($receiptsVl, 9);
            // dd($receiptsVl);
            dd($receiptsVl);
            return view('Frontend.page.ordreFilm', compact('receiptsVl'));
        }
    }

    public function showCinema(Request $request , $id, $slug)
    {
        $clusterCinema = ClusterCinema::where('city_id', Session::get('cityAddress'))->get();
        $cinema = Cinema::where('id',$id)->first();
        return view('Frontend.page.show_cinema',['cinema' => $cinema,'clusterCinema' => $clusterCinema]);
    }

    public function change_name(Request $request)
    {
        if(Auth::check()){
            User::find(Auth::user()->id)->update(['name' => $request->value]);
        }
    }
    public function change_pass(Request $request)
    {

        if(Auth::attempt([ 'email' => Auth::user()->email ,'password' => $request->passwordOld])){
            User::find(Auth::user()->id)->update(['password' => Hash::make($request->passwordConfirm) ]);
            return 'Đổi mật khẩu hoàn tất ';
        }else{
            return 'Mật khẩu không chính xác !';
        }
    }

    public function comment_cinema(Request $request)
    {
        if(Auth::check()){
            if(StartCinema::where('user_id' , auth() -> user() -> id)->exists()){
                return 1;
            }else{

                StartCinema::create([
                    'content' => $request->content ,
                    'start' => $request->start ,
                    'user_id' => auth() -> user()->id ,
                    'cinema_id' => $request -> cinema_id
                ]);
                return 0 ;
            }
        }


    }

    public function comment_cinema_show(Request $request){
        $start_cinema = StartCinema::where('cinema_id' , $request->id_cinema)->get();
        foreach ($start_cinema as $key => $startCinemaItem) {
            ?>
                <div class="row">
                    <div class="col-sm-10">
                       <h3> <?= $startCinemaItem -> user -> name ?></h3>
                        <p> Đã bình luận : <strong><?= $startCinemaItem -> content ?></strong> </p>
                    </div>
                    <div class="col-sm-2">
                        <p> Sao : <strong><?= $startCinemaItem -> start ?></strong> </p>
                    </div>
                </div>
            <?php
        }
    }
}
