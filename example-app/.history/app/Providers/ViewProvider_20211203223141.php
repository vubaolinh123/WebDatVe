<?php

namespace App\Providers;

use App\Models\Film;
use App\Models\User;
use Illuminate\Support\Facades\Blade;
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
        // No content
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot(Film $film)
    {
        view()->composer('Frontend.page.home', 'App\Http\View\Composer\HomeClient');
        view()->composer('Backend.layout_admin', 'App\Http\View\Composer\Admin');

        Blade::if('hasAdmin', function () {
             if(auth()->check()){
                $check = User::find(auth()->user()->id);

             }
        });
    }
}
