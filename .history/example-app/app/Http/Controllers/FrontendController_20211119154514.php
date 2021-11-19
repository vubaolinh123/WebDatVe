<?php

namespace App\Http\Controllers;

use App\Models\Cinema;
use App\Models\Cinemaroom;
use App\Models\ClusterCinema;
use App\Models\Film;
use App\Models\FilmType;
use App\Models\Showtime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

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
    public function detailFim($id_film)
    {
        // $showtimes = Showtime::where('film_id', $id_film)
            // ->join('tbl_cinema_room', 'tbl_cinema_room.id_cinema_room', 'tbl_showtime.cinema_room_id')
            // ->join('tbl_cinema', 'tbl_cinema.id', 'tbl_showtime.cinema_id')
            // ->get();

        //dổi về mảng
        // $showtimes = json_decode(json_encode($showtimes), FALSE);

        $clusterCinemas = ClusterCinema::all();
        $cinemas = Cinema::all();
        $film = Film::find($id_film);
        // dump($film);
        // // dump($film->showtime->cinema_room);
        $arr = [];
        $checkDG  = [];
        foreach ($film->showtime as $room){
            // dd($room->cinema_room->cinema->id);
            (!in_array($room->cinema_room->cinema->id,$checkDG)) ? array_push($arr,$room->cinema_room->cinema)  : array_push($checkDG,$room->cinema_room->cinema->id);
        }
        dd($arr);
        // dd(1);
        $type_films = FilmType::all();
        return view(
            'Frontend.page.detail_film',
            compact(
                'cinemas',
                'clusterCinemas',
                'film',
                'type_films',
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
