<?php

use App\Events\Send;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BackendController;
use App\Http\Controllers\ClusterCinema;
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
    Route::get('/detail/{id_film}', [FrontendController::class, 'detailFim'])->name('web.detailFim');
});






// back-end
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

Route::middleware(['hasAdmin'])->group(function () {
    Route::prefix('/admin')->group(function () {
        // Route::get('/', function () {
        //     return '<h1>Trọng</h1>';
        // });
        // Route::get('/logout', function () {
        //     Auth::logout();
        //     return redirect('/admin/login');
        // });
        Route::get('/', [AdminController::class, 'dashboard'])->name('admin.dashboard');
        Route::get('/logout', [AdminController::class, 'logoutAdmin'])->name('admin.logout');

        Route::prefix('type-film')->group(function () {
            Route::get('/', [FilmTypeController::class, 'index'])->name('admin.typefilm.list');
            Route::get('add-typefilm', [FilmTypeController::class, 'create'])->name('admin.typefilm.addForm');
            Route::post('save-add-typefilm', [FilmTypeController::class, 'store'])->name('admin.typefilm.addSave');
            Route::get('delete-typefilm/{id_film_type}', [FilmTypeController::class, 'destroy'])->name('admin.typefilm.delete');
            Route::get('edit-typefilm/{id_film_type}', [FilmTypeController::class, 'edit'])->name('admin.typefilm.editForm');
            Route::post('save-edit-typefilm/{id_film_type}', [FilmTypeController::class, 'update'])->name('admin.typefilm.editSave');
        });

        Route::prefix('film')->group(function () {
            Route::get('/', [FilmController::class, 'index'])->name('admin.film.list');
            Route::get('add-film', [FilmController::class, 'create'])->name('admin.film.addForm');
            Route::post('save-add-film', [FilmController::class, 'store'])->name('admin.film.addSave');
            Route::get('delete-film/{id_film}', [FilmController::class, 'destroy'])->name('admin.film.delete');
            Route::get('edit-film/{id_film}', [FilmController::class, 'edit'])->name('admin.film.editForm');
            Route::post('save-edit-film/{id_film}', [FilmController::class, 'update'])->name('admin.film.editSave');
        });

        Route::prefix('cinema')->group(function () {
            Route::get('/cluster', [ClusterCinema::class, 'index'])->name('cinema.cluster');
            Route::post('/cluster/created', [ClusterCinema::class, 'store'])->name('cinema.cluster.create');
            Route::delete('/cluster/delete/{id}', [ClusterCinema::class, 'destroy'])->name('cinema.cluster.delete');
            Route::put('/cluster/updated/{id}', [ClusterCinema::class, 'destroy'])->name('cinema.cluster.updated');
        });

    });
});
