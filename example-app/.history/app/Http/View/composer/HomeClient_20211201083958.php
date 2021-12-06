<?php

namespace App\Http\View\Composer;

use App\Models\Film;
use Illuminate\View\View;

class HomeClient
{
    public function compose(Film $film, View $view)
    {
        $filmHomeDeleted0s = $film::inRandomOrder()->where('status', 0)->where('deleted', 0)
            ->join('tbl_film_type', 'tbl_film_type.id_film_type', 'tbl_film.film_type_id')
            ->select(
                'tbl_film_type.name as nameTypeFilm',
                'tbl_film.name',
                'tbl_film.avatar',
                'tbl_film.id_film',
            )
            ->get();

        $filmHomeDeleted1s = $film::inRandomOrder()->where('status', 0)->where('deleted', 1)
            ->join('tbl_film_type', 'tbl_film_type.id_film_type', 'tbl_film.film_type_id')
            ->select(
                'tbl_film_type.name as nameTypeFilm',
                'tbl_film.name',
                'tbl_film.avatar',
                'tbl_film.id_film',
            )
            ->get();
        return $view -> with(['filmHomeDeleted0s' => $filmHomeDeleted0s , 'filmHomeDeleted1s' => $filmHomeDeleted1s]);
    }
}
