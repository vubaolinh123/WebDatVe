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
    }
}
