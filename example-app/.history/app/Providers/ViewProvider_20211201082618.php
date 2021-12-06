<?php

namespace App\Providers;

use App\Models\Film;
use Illuminate\Support\ServiceProvider;

class ViewProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot(Film $film)
    {
        view()->composer('Frontend/page/home', function ($view) use ($film){
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

            $view -> with(['filmHomeDeleted0s' => $filmHomeDeleted0s , 'filmHomeDeleted1s' => $filmHomeDeleted1s]);
        });
    }
}
