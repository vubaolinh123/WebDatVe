<?php

namespace App\Http\Controllers;

use App\Models\Film;
use App\Models\FilmType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

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

        $citys = json_decode(Http::get('https://provinces.open-api.vn/api/'));

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
            'citys'
        ));
    }
    public function detailFim($id_film)
    {
        $film = Film::find($id_film);
        $type_films = FilmType::all();
        return view('Frontend.page.detail_film', compact('film', 'type_films'));
    }
    public function getCityAddress($code){

    }
}
