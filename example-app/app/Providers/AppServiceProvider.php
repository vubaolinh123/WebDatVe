<?php

namespace App\Providers;

use App\Models\Type_Blog;
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



        View::share([
            'citys' => $citys,
        ]);
        $URL_IMG_FILM = 'images/film';
        $URL_IMG_BLOG = 'images/blog';
        View::share([
            'URL_IMG_FILM' => $URL_IMG_FILM,
            'URL_IMG_BLOG' => $URL_IMG_BLOG,
        ]);
        $type_blogs = Type_Blog::all();
        View::share([
            'type_blogs' => $type_blogs,
        ]);
    }
}