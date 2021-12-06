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
        Blade::if('hasAdmin', function ($name) {
             if(auth()->check()){
                $check = User::find(auth()->user()->id);
                // dd(1);
                if($check -> hasRole($name)){
                    return true;
                }else{
                    return false;
                }
             }
        });
    }
}
