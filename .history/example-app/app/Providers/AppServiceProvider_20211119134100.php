<?php

namespace App\Providers;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $citys = json_decode(Http::get('https://provinces.open-api.vn/api/'));
<<<<<<< HEAD
=======
        View::share([
            'citys' => $citys,
        ]);


>>>>>>> 2bc0e3c2fe00d67c1c5c8eccdbc87dcba6438213
        $URL_IMG_FILM = 'images/film';
        View::share([
            'URL_IMG_FILM' => $URL_IMG_FILM,
            'citys' => $citys,
        ]);
    }
}
