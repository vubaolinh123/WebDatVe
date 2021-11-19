<?php

use App\Events\Send;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware(['guest'])->group(function () {

    // Login admin
    Route::prefix('/admin')->group(function () {
        Route::get('/login', function () {
            return view('Backend.login.index');
        });
    });

    //Login user
    Route::get('/login', function () {
        return view('Frontend.login.login');
    })->name('login');

    /**
     * Google
     */

        Route::get('/loginToGoogle', [App\Http\Controllers\Socials\LoginGoogle::class, 'redirect']);
        Route::get('/callback', [App\Http\Controllers\Socials\LoginGoogle::class, 'callback']);
    /**
     * Github
     */
        Route::get('/loginToGithub', [App\Http\Controllers\Socials\LoginGithub::class, 'redirect']);
        Route::get('/callback-github', [App\Http\Controllers\Socials\LoginGithub::class, 'callback']);
});

Route::middleware(['auth','hasAdmin'])->group(function () {
        Route::prefix('/admin')->group(function () {
            Route::get('/dashboard', function () {
                return 'Dashboard';
            });

        });
});

Route::get('/logout', function () {
    Auth::logout();
    return redirect() -> back();
});

Route::get('/home', function () {
     echo 'Home';
});
