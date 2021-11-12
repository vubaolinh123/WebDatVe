<?php

use App\Events\Send;
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
});
