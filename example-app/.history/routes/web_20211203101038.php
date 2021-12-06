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
use App\Http\Controllers\Receipt;
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
        Route::get('/ordreFilm', [FrontendController::class, 'ordreFilm'])->name('web.ordreFilm');


        Route::post('/select-film-a' , [FrontendController::class, 'select_film_ajax'])->name('web.aj.select.f');
        Route::post('/select-cinema-a' , [FrontendController::class, 'select_cinema_ajax'])->name('web.aj.select.c');
    });
    Route::middleware(['auth'])->group(function () {
        // Route::get('/ordreFilm/detail/{id_receipt}', [FrontendController::class, 'detailOrderFilm'])->name('web.detailOrderFilm');
        Route::get('/cinema/{id}/{slug}', [FrontendController::class, 'showCinema'])->name('web.show.cinema');
        Route::get('/book/{id}', [FrontendController::class, 'book'])->name('web.book');
        Route::get('/book-ghe/{id}', [FrontendController::class, 'book_ghe'])->name('web.book_ghe');
        Route::post('/render-book', [FrontendController::class, 'render_book'])->name('web.render_book');
        Route::get('/check-render-book', [FrontendController::class, 'check_render_book'])->name('web.check_render_book');
        Route::get('/render-book-show', [FrontendController::class, 'render_book_show'])->name('web.render_book_show');

        Route::get('/check-chair', [FrontendController::class, 'check_chair'])->name('web.check_chair');
        Route::get('/render-check-chair', [FrontendController::class, 'render_check_chair'])->name('web.render_check_chair');
        Route::get('/pay-ticket/{id}', [FrontendController::class, 'pay_ticket'])->name('web.pay_ticket');
        Route::get('/pay-success/{id}', [FrontendController::class, 'pay_success'])->name('web.pay_success');
        Route::post('/get-chair', [FrontendController::class, 'get_chair'])->name('web.get_chair');

        Route::post('/change-name', [FrontendController::class, 'change_name'])->name('web.change.name');
        Route::post('/change-pass', [FrontendController::class, 'change_pass'])->name('web.change.pass');

        Route::post('/comment-cinema', [FrontendController::class, 'change_pass'])->name('web.comment.start');

    });
});



Route::redirect('/home', '/');


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
            Route::post('create-chair-vip', [ChairController::class, 'create_chair_vip'])->name('admin.chair.create_chair_vip');
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
        Route::prefix('receipt')->group(function () {
            Route::get('/list-receipt', [Receipt::class, 'index'])->name('admin.receipt.list');
            Route::get('/show-receipt/{id}', [Receipt::class, 'show'])->name('admin.receipt.show');
            Route::post('/render-list-receipt', [Receipt::class, 'render_list'])->name('admin.receipt.render');
            Route::post('/change-pay-receipt', [Receipt::class, 'change_pay'])->name('admin.receipt.change_pay');
            Route::delete('/remove-receipt/{id}', [Receipt::class, 'destroy'])->name('receipt.delete');
            // Route::get('/add', [Receipt::class, 'create'])->name('admin.category.add');
        });
    });
});

Route::get('/confirm/{links}', [Receipt::class, 'confirm'])->name('confirm.receipt.movie');
