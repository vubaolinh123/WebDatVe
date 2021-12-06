<?php

namespace App\Http\View\Composer;

use App\Http\Controllers\ClusterCinema;
use App\Models\Cinema;
use App\Models\ClusterCinema as ModelsClusterCinema;
use App\Models\Film;
use App\Models\Type_Blog;
use Illuminate\View\View;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;

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
        $arrCount = [];
        $filmHomeDeleted0s = $this -> film::inRandomOrder()->where('status', 0)->where('deleted', 0)
            ->join('tbl_film_type', 'tbl_film_type.id_film_type', 'tbl_film.film_type_id')
            ->select(
                'tbl_film_type.name as nameTypeFilm',
                'tbl_film.name',
                'tbl_film.cast',
                'tbl_film.avatar',
                'tbl_film.id_film',
                'tbl_film.trailer',
            )
            ->get();
        foreach ( $filmHomeDeleted0s  as   $valueByfilmHomeDeleted0s) {
            if(count($valueByfilmHomeDeleted0s-> showtimeNow) > 0 && !in_array($valueByfilmHomeDeleted0s -> id_film  , $arrCount)){
                foreach ($valueByfilmHomeDeleted0s-> showtimeNow as $showtime){
                    if($showtime -> cinema_room -> cinema -> cluster_cinema -> city_id == Session::get('cityAddress')
                    && !in_array($valueByfilmHomeDeleted0s -> id_film  , $arrCount)
                    ){
                        array_push($arrFilm , $valueByfilmHomeDeleted0s);
                        array_push($arrCount ,$valueByfilmHomeDeleted0s -> id_film );
                    }
                }
            }
        }
        $typeBlogs = Type_Blog::where('active', 0)->get();
        $clusterCinema = ModelsClusterCinema::where('city_id', Session::get('cityAddress'))->get();
        $filmHomeDeleted1s = $this -> film::inRandomOrder()->where('status', 0)->where('deleted', 1)
            ->join('tbl_film_type', 'tbl_film_type.id_film_type', 'tbl_film.film_type_id')
            ->select(
                'tbl_film_type.name as nameTypeFilm',
                'tbl_film.name',
                'tbl_film.avatar',
                'tbl_film.id_film',
            )
            ->get();
        return $view -> with(['typeBlogs' => $typeBlogs ,'filmHomeDeleted0s' => $arrFilm , 'clusterCinema' => $clusterCinema , 'filmHomeDeleted1s' => $filmHomeDeleted1s]);
    }
}
