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
    Route::prefix('/admin')->group(function () {
        Route::get('/login', function () {
            return view('Backend.login.index');
        });
    });
    /**
     * Google
     */
    Route::get('/loginToGoogle', [App\Http\Controllers\LoginGoogle::class, 'redirect']);
    Route::get('/callback', [App\Http\Controllers\LoginGoogle::class, 'callback']);
    /**
     * Github
     */
    Route::get('/loginToGithub', [App\Http\Controllers\LoginGithub::class, 'redirect']);
    Route::get('/callback-github', [App\Http\Controllers\LoginGithub::class, 'callback']);
});
Route::get('/login', function () {
    return view('Frontend.login.login');
});
Route::get('/home', function () {
    Auth::logout();
});
