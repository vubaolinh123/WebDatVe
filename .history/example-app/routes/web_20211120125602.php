<?php

use App\Events\Send;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BackendController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ChairController;
use App\Http\Controllers\CinemaroomController;

use App\Http\Controllers\Cinema;
use App\Http\Controllers\ClusterCinema;

use App\Http\Controllers\FilmController;
use App\Http\Controllers\FilmTypeController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\TypeChairController;
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
Route::middleware(['cityAddress'])->group(function () {
    Route::prefix('')->group(function () {
        Route::get('/', [FrontendController::class, 'homeWeb'])->name('web.home');
        Route::get('/detail/{id_film}/{slug}', [FrontendController::class, 'detailFim'])->name('web.detailFim');
        Route::get('/getCityAddress/{code}', [FrontendController::class, 'getCityAddress'])->name('web.getCityAddress');
    });
    Route::middleware(['auth'])->group(function () {
        Route::get('/book/{id}', [FrontendController::class, 'book'])->name('web.book');
        Route::get('/book-ghe/{id}', [FrontendController::class, 'book_ghe'])->name('web.book_ghe');
        Route::post('/render-book', [FrontendController::class, 'render_book'])->name('web.render_book');
        Route::get('/render-book', [FrontendController::class, 'check_render_book'])->name('web.check_render_book');
        Route::get('/render-book-show', [FrontendController::class, 'render_book_show'])->name('web.render_book_show');
    });
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

Route::get('/logout', function () {
    Auth::logout();
    return redirect()->back();
});

Route::middleware(['hasAdmin'])->group(function () {
    Route::prefix('/admin')->group(function () {

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

        Route::prefix('cinemaroom')->group(function () {
            Route::get('/', [CinemaroomController::class, 'index'])->name('admin.cinemaroom.list');
            Route::get('add-cinemaroom', [CinemaroomController::class, 'create'])->name('admin.cinemaroom.addForm');
            Route::post('save-add-cinemaroom', [CinemaroomController::class, 'store'])->name('admin.cinemaroom.addSave');

            Route::get('get-row-cinemaroom', [CinemaroomController::class, 'getRowAjax'])->name('admin.cinemaroom.getRowAjax');
            Route::get('render-row-cinemaroom', [CinemaroomController::class, 'getRowAjax'])->name('admin.cinemaroom.render');
        });

        Route::prefix('typechair')->group(function () {
            Route::get('/', [TypeChairController::class, 'index'])->name('admin.typechair.list');
            Route::get('add-typechair', [TypeChairController::class, 'create'])->name('admin.typechair.addForm');
            Route::post('save-add-typechair', [TypeChairController::class, 'store'])->name('admin.typechair.addSave');
        });
        Route::prefix('chair')->group(function () {
            Route::get('/', [ChairController::class, 'index'])->name('admin.chair.list');
            Route::get('add-chair', [ChairController::class, 'create'])->name('admin.chair.addForm');
            Route::post('save-add-chair', [ChairController::class, 'store'])->name('admin.chair.addSave');
        });


        Route::prefix('cinema')->group(function () {
            Route::get('/cluster', [ClusterCinema::class, 'index'])->name('cinema.cluster');
            Route::post('/cluster/created', [ClusterCinema::class, 'store'])->name('cinema.cluster.create');
            Route::delete('/cluster/delete/{id}', [ClusterCinema::class, 'destroy'])->name('cinema.cluster.delete');
            Route::put('/cluster/updated/{id}', [ClusterCinema::class, 'update'])->name('cinema.cluster.updated');

            Route::get('/', [Cinema::class, 'index'])->name('cinema');
            Route::get('/created', [Cinema::class, 'create'])->name('cinema.create');
            Route::get('/updated/{id}', [Cinema::class, 'edit'])->name('cinema.update');
            Route::delete('/delete/{id}', [Cinema::class, 'destroy'])->name('cinema.delete');
            Route::put('/updated/{id}', [Cinema::class, 'update'])->name('cinema.updated');
        });
        Route::prefix('category')->group(function () {
            Route::get('/list', [CategoryController::class, 'index'])->name('admin.category.list');
            Route::get('/add', [CategoryController::class, 'create'])->name('admin.category.add');
        });
    });
});
