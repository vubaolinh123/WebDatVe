<?php

use App\Events\Send;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BackendController;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\FilmTypeController;
use App\Http\Controllers\FrontendController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
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

// front-end
Route::prefix('')->group(function () {
    Route::get('/', [FrontendController::class, 'homeWeb'])->name('web.home');
    Route::get('/detail', [FrontendController::class, 'detailFim'])->name('web.detailFim');
});

//     // Login admin
//     Route::prefix('/admin')->group(function () {
//         Route::get('/login', function () {
//             return view('Backend.login.index');
//         });
//     });

//     //Login user
//     Route::get('/login', function () {
//         return view('Frontend.login.login');
//     })->name('login');

//     /**
//      * Google
//      */

//     Route::get('/loginToGoogle', [App\Http\Controllers\Socials\LoginGoogle::class, 'redirect']);
//     Route::get('/callback', [App\Http\Controllers\Socials\LoginGoogle::class, 'callback']);
//     /**
//      * Github
//      */
//     Route::get('/loginToGithub', [App\Http\Controllers\Socials\LoginGithub::class, 'redirect']);
//     Route::get('/callback-github', [App\Http\Controllers\Socials\LoginGithub::class, 'callback']);
// });

// Route::middleware(['auth'])->group(function () {
//     Route::middleware(['hasAdmin'])->group(function () {
//         Route::prefix('/admin')->group(function () {
//             Route::get('/dashboard', function () {
//                 return '';
//             });
//         });
//     });
// });

// Route::get('/logout', function () {
//     Auth::logout();
//     return Redirect::route('login');
// });

// Route::get('/home', function () {
//     echo 'Home';
        // });


        Route::prefix('type-film')->group(function () {
            Route::get('/', [FilmTypeController::class, 'index'])->name('admin.typefilm.list');
            Route::get('add-typefilm', [FilmTypeController::class, 'create'])->name('admin.typefilm.addForm');
            Route::post('save-add-typefilm', [FilmTypeController::class, 'store'])->name('admin.typefilm.addSave');
            Route::get('delete-typefilm/{id_film_type}', [FilmTypeController::class, 'destroy'])->name('admin.typefilm.delete');
            Route::get('edit-typefilm/{id_film_type}', [FilmTypeController::class, 'edit'])->name('admin.typefilm.editForm');
            Route::post('save-edit-typefilm/{id_film_type}', [FilmTypeController::class, 'update'])->name('admin.typefilm.editSave');
        });

Route::prefix('admin')->group(function () {
    Route::get('/', [BackendController::class, 'dashboard'])->name('admin.dashboard');
        });
=======
Route::middleware(['hasAdmin'])->group(function () {
        Route::prefix('/admin')->group(function () {
            Route::get('/', function () {
                return 'Dashboard';
            });
            Route::get('/logout', function () {
                Auth::logout();
                return redirect('/admin/login');
            });
        });
});

Route::get('/logout', function () {
    Auth::logout();
    return redirect('/login');
    });

Route::get('/home', function () {

     echo 'Home';
});
