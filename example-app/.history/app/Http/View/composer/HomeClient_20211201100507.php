<?php

namespace App\Http\View\Composer;

use App\Models\Film;
use Illuminate\View\View;
use Carbon\Carbon;

class HomeClient
{
    protected $film ;
    public function __construct(Film $film){
        $this -> film = $film ;
    }

    public function compose( View $view)
    {
        $now = Carbon::now('Asia/Ho_Chi_Minh');
        $arrFilm = [];
        $filmHomeDeleted0s = $this -> film::inRandomOrder()->where('status', 0)->where('deleted', 0)
            ->join('tbl_film_type', 'tbl_film_type.id_film_type', 'tbl_film.film_type_id')
            ->select(
                'tbl_film_type.name as nameTypeFilm',
                'tbl_film.name',
                'tbl_film.avatar',
                'tbl_film.id_film',
            )
            ->get();
        foreach ( $filmHomeDeleted0s  as   $valueByfilmHomeDeleted0s) {
            dump(count($filmHomeDeleted0s ));
            dump($valueByfilmHomeDeleted0s-> showtimeNow );
            if(count($valueByfilmHomeDeleted0s-> showtimeNow) > 1){
                array_push($arrFilm , $valueByfilmHomeDeleted0s);
            }
        }
        $filmHomeDeleted1s = $this -> film::inRandomOrder()->where('status', 0)->where('deleted', 1)
            ->join('tbl_film_type', 'tbl_film_type.id_film_type', 'tbl_film.film_type_id')
            ->select(
                'tbl_film_type.name as nameTypeFilm',
                'tbl_film.name',
                'tbl_film.avatar',
                'tbl_film.id_film',
            )
            ->get();
        return $view -> with(['filmHomeDeleted0s' => $arrFilm , 'filmHomeDeleted1s' => $filmHomeDeleted1s]);
    }
}
