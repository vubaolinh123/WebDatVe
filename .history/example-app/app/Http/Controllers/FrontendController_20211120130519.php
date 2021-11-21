<?php

namespace App\Http\Controllers;

use App\Models\Cinema;
use App\Models\Cinemaroom;
use App\Models\ClusterCinema;
use App\Models\Film;
use App\Models\FilmType;
use App\Models\Foods;
use App\Models\Showtime;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use Illuminate\Contracts\Session\Session as SessionSession;

class FrontendController extends Controller
{
    public function homeWeb()
    {
        $filmHomeDeleted0s = Film::inRandomOrder()->where('status', 0)->where('deleted', 0)
            ->join('tbl_film_type', 'tbl_film_type.id_film_type', 'tbl_film.film_type_id')
            ->select(
                'tbl_film_type.name as nameTypeFilm',
                'tbl_film.name',
                'tbl_film.avatar',
                'tbl_film.id_film',
            )
            ->get();


        $filmHomeDeleted1s = Film::inRandomOrder()->where('status', 0)->where('deleted', 1)
            ->join('tbl_film_type', 'tbl_film_type.id_film_type', 'tbl_film.film_type_id')
            ->select(
                'tbl_film_type.name as nameTypeFilm',
                'tbl_film.name',
                'tbl_film.avatar',
                'tbl_film.id_film',
            )
            ->get();

        return view('Frontend.page.home', compact(
            'filmHomeDeleted0s',
            'filmHomeDeleted1s',
        ));
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
    public function book($id){
        $show_time = Showtime::find($id);
        $tickets = Ticket::all();
        $foods = Foods::where('status',0)->get();
        return view('Frontend.page.book',[
            'show_time' => $show_time,
            'tickets' => $tickets,
            'id' => $id,
            'foods' => $foods
        ]);
    }
    public function book_ghe($id) {
        $show_time = Showtime::find($id);
        $text = 'A|B|C|D|E|F|G|H|I|J|K|L|M|N|O|P|Q|R|S|T|U|V|W|X|Y|Z';
        $arr = explode("|", $text);
        return view('Frontend.page.bookGhe', [
            'show_time' => $show_time,
            'id' => $id,
            'arr' => $arr,
        ]);
    }
    public function render_book(Request $request){

        $arr = [];
        $arr[$request -> type][$request -> id] = $request -> value ;
       if($request->session()->has('book1')){
            $dataOld = $request->session()->get('book1');
            $dataOld[$request -> type][$request -> id] = $request -> value ;
            $request->session()->put('book1', $dataOld);
       }else{
           $request->session()->put('book1', $arr);
       }
       $request->session()->save();
       dd($request->session()->get('book1'));

    }

    public function check_render_book(Request $request){

        if($request->session()->has('book1')){
            $dataOld = $request->session()->get('book1');
            if(array_key_exists('ticket',$dataOld)) return 1;
            return 0 ;
        }else{
            return 0 ;
        }
    }

    public function render_book_show(Request $request){
        if($request->session()->has('book1')){
            foreach($request->session()->get('book1') as $key => $value){
                if($key == 'ticket'){
                    foreach($value as $k => $v){

                        ?>
                            <p>Vé : <?php echo Ticket::where('id_price_ticket',$k)->first()->name ?></p>
                        <?php
                    }
                }
            }
        }else{
            ?>
                Hóa đơn ...
            <?php
        }
    }
}
