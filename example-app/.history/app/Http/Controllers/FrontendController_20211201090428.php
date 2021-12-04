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
use App\Http\Controllers\Traits\Frontend\PayBook;

class FrontendController extends Controller
{
    use Book;
    use AjaxBook;
    use PayBook;

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

}
