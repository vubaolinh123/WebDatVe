<?php
namespace App\Http\Controllers\Traits\Frontend;

use App\Models\Cinema;
use App\Models\Film;
use App\Models\Foods;
use App\Models\Ticket;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

trait AjaxSelect {

    public function select_film_ajax(Request $request)
    {
        $film = Film::where('id_film',$request->id)->first();
        $arr = [];

        $request->session()->forget('id_film');
        Session::put('id_film' , $request->id);
        Session::save();

        ?>
        <option value="">--Chon--</option>
        <?php
        foreach ($film -> showtime as $time){
            if(!in_array( $time -> cinema_room -> cinema -> id  , $arr)){
                array_push($arr , $time -> cinema_room -> cinema -> id );
            ?>
                <option value="<?= $time -> cinema_room -> cinema -> id ?>"><?=  $time -> cinema_room -> cinema -> name ?></option>
            <?php
            }
        }
    }
    public function select_cinema_ajax(Request $request)
    {
        $dt = Carbon::now('Asia/Ho_Chi_Minh');
        $cinema = Cinema::where('id' , $request->id)->first();
        $arrSave = [];
        foreach($cinema -> cinema_room as $cinema_r){
            foreach($cinema_r -> show_time as $showtime){
                if($showtime -> film_id == Session::get('id_film')
                && $showtime->show_date > $dt->toDateString()
                ||$showtime->show_date == $dt->toDateString()
                &&$showtime -> film_id == Session::get('id_film')
                && $showtime->start_time >= $dt->toTimeString()
                )
                {
                    array_push($arrSave , $showtime) ;
                    // if( $showtime->start_time >= $dt->toTimeString())  array_push($arrSave , $showtime)
                };
            }
        }
        foreach($arrSave as $showtime){
            // if()
            ?>
                <option value="<?= $showtime->id_showtime ?>"><?= $showtime -> show_date ?> - Thời gian :
                <?=  ($showtime -> start_time ) ?></option>
            <?php
        }
    }
}
