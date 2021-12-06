<?php

namespace App\Http\Controllers;


use App\Models\Blog;
use Carbon\Carbon;
use App\Models\Film;
use App\Models\Cinema;
use App\Models\FilmType;
use App\Models\Foods;
use App\Models\News;
use App\Models\Receipt_Detail;
use App\Models\Receipt_Food;
use App\Models\Showtime;
use App\Models\Ticket;
use Illuminate\Http\Request;
use App\Models\ClusterCinema;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Traits\Frontend\Book;
use App\Http\Controllers\Traits\Frontend\AjaxBook;
use App\Http\Controllers\Traits\Frontend\AjaxSelect;
use App\Http\Controllers\Traits\Frontend\PayBook;
use App\Models\Receipt;
use App\Models\StartCinema;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
// use Str;
use Illuminate\Support\Str;
use App\Models\Type_Blog;
use App\Models\ClusterCinema as ModelsClusterCinema;

class FrontendController extends Controller
{
    use Book, AjaxSelect, AjaxBook, PayBook;

    public function homeWeb()
    {
        $now = Carbon::now('Asia/Ho_Chi_Minh');
        $arrFilm = [];
        $arrFilm1s = [];
        $arrCount = [];
        $filmHomeDeleted0s = Film::inRandomOrder()->where('status', 0)->where('deleted', 0)
            ->join('tbl_film_type', 'tbl_film_type.id_film_type', 'tbl_film.film_type_id')
            ->select(
                'tbl_film_type.name as nameTypeFilm',
                'tbl_film.name',
                'tbl_film.cast',
                'tbl_film.avatar',
                'tbl_film.id_film',
                'tbl_film.trailer',
            )
            ->get();
        foreach ($filmHomeDeleted0s  as   $valueByfilmHomeDeleted0s) {
            if (count($valueByfilmHomeDeleted0s->showtimeNow) > 0 && !in_array($valueByfilmHomeDeleted0s->id_film, $arrCount)) {
                foreach ($valueByfilmHomeDeleted0s->showtimeNow as $showtime) {
                    if (
                        $showtime->cinema_room->cinema->cluster_cinema->city_id == Session::get('cityAddress')
                        && !in_array($valueByfilmHomeDeleted0s->id_film, $arrCount)
                    ) {
                        if ($showtime->show_date == $now->toDateString()) {
                            array_push($arrFilm, $valueByfilmHomeDeleted0s);
                        } else {
                            array_push($arrFilm1s, $valueByfilmHomeDeleted0s);
                        }
                        // array_push($arrFilm , $valueByfilmHomeDeleted0s);
                        array_push($arrCount, $valueByfilmHomeDeleted0s->id_film);
                    }
                }
            }
        }
        $typeBlogs = Type_Blog::where('active', 0)->get();
        $clusterCinema = ModelsClusterCinema::where('city_id', Session::get('cityAddress'))->get();
        $filmHomeDeleted1s = Film::inRandomOrder()->where('status', 0)->where('deleted', 1)
            ->join('tbl_film_type', 'tbl_film_type.id_film_type', 'tbl_film.film_type_id')
            ->select(
                'tbl_film_type.name as nameTypeFilm',
                'tbl_film.name',
                'tbl_film.avatar',
                'tbl_film.id_film',
            )
            ->get();
        return view('Frontend.page.home', [
            'typeBlogs' => $typeBlogs,
            'filmHomeDeleted0s' => $arrFilm,
            'clusterCinema' => $clusterCinema,
            'filmHomeDeleted1s' => $arrFilm1s
        ]);
    }

    public function detailFim(Request $request, $id_film, $slug)
    {

        $clusterCinemas = ClusterCinema::all();
        $cinemas = Cinema::all();
        $film = Film::find($id_film);

        $cinemaOfFilms = [];
        $cinemaRooms = [];
        $checkRoom = [];
        $checkDG  = [];
        ((($request->has('date'))) ?  $time = $request->date  : $time = Carbon::now('Asia/Ho_Chi_Minh')->toDateString());
        // dd($film->showtime->where('show_date',$time)->where('star_time'  , Carbon::now('Asia/Ho_Chi_Minh')->toTimeString() ) );

        foreach ($film->showtime->where('show_date', $time) as $room) {
            // if ($room->start_time < Carbon::now('Asia/Ho_Chi_Minh')->toTimeString()) continue;
            // dd($room);

            if (!in_array($room->cinema_room->id_cinema_room, $checkRoom)) {
                array_push($cinemaRooms, $room->cinema_room);
                array_push($checkRoom, $room->cinema_room->id_cinema_room);
            }
            if ($room->cinema_room->cinema->cluster_cinema->where('city_id', Session::get('cityAddress'))->exists()) {
                if (!in_array($room->cinema_room->cinema->id, $checkDG)) {
                    array_push($cinemaOfFilms, $room->cinema_room->cinema);
                    array_push($checkDG, $room->cinema_room->cinema->id);
                }
            }
        }

        // dd(1);
        $type_films = FilmType::all();

        $filmHomeDeleted0s = Film::where('status', 0)->where('deleted', 0)->take(3)
            ->get();
        return view(
            'Frontend.page.detail_film',
            compact(
                'filmHomeDeleted0s',
                'cinemas',
                'clusterCinemas',
                'film',
                'type_films',
                'cinemaOfFilms',
                'cinemaRooms'
                // 'showtimes',
            )
        );
    }
    public function getCityAddress($code)
    {
        Session::put('cityAddress', $code);
        return redirect()->back();
    }

    public function ordreFilm()
    {
        if (!isset(Auth::user()->id)) {
            $null = 'Bạn chưa đăng nhập tài khoản !!';
            return view('Frontend.page.ordreFilm', compact('null'));
        } else {
            $id_user = Auth::user()->id;
            $receipts = Receipt::where('user_id', $id_user)
                // ->with('showtime')
                // ->join('tbl_receipt_details as receiptDetail', 'receiptDetail.receipt_id', 'tbl_receipt.id_receipt')
                // ->leftJoin('tbl_showtime', 'tbl_showtime.id_showtime', 'receiptDetail.showtime_id')
                // ->join('tbl_film as film', 'film.id_film', 'tbl_showtime.film_id')
                // ->select(
                //     'film.avatar as img_film',
                //     'film.name as name_film',
                //     'tbl_showtime.show_date',
                //     'tbl_showtime.start_time',
                //     'receiptDetail.chair_code',
                //     'tbl_receipt.total',
                //     'tbl_receipt.id_receipt',
                //     'film.id_film',
                // )
                ->get();
            // dump($id_user);
            // dd($receipts);
            // $receiptsVl = [];

            // foreach ($receipts as $key => $receipt) {

            //     // echo  $receipt->show_date;
            //     // if (!in_array($receipt->name_film, $receiptsVl)) {
            //     //     array_push($receiptsVl, $receipt->name_film);
            //     // }
            //     // if (!in_array($receipt->id_film, $receiptsVl)) {
            //     //     array_push($receiptsVl, $receipt->id_film);
            //     // }
            //     // if (!in_array($receipt->total, $receiptsVl)) {
            //     //     array_push($receiptsVl, $receipt->total);
            //     // }
            //     // if (!in_array($receipt->img_film, $receiptsVl)) {
            //     //     array_push($receiptsVl, $receipt->img_film);
            //     // }
            //     // array_push($receiptsVl, $receipt->show_date);
            //     // if (!in_array($receipt->start_time, $receiptsVl)) {
            //     //     array_push($receiptsVl, $receipt->start_time);
            //     // }
            //     // if (!in_array($receipt->chair_code, $receiptsVl)) {
            //     //     array_push($receiptsVl, $receipt->chair_code);
            //     // }
            // }
            // // $receiptsVl = array_chunk($receiptsVl, 9);
            // dd($receiptsVl);
            // dd($receiptsVl);
            return view('Frontend.page.ordreFilm', compact('receipts'));
        }
    }
    public function detailBlog(Request $request)
    {
        $id_blog = $_GET['id_blog'];
        $blog = Blog::find($id_blog);
        $filmHomeDeleted0s = Film::where('status', 0)->where('deleted', 0)->take(3)
            ->get();
        return view('Frontend.page.detail_blog', compact('blog', 'filmHomeDeleted0s'));
    }

    public function change_name(Request $request)
    {
        if (Auth::check()) {
            User::find(Auth::user()->id)->update(['name' => $request->value]);
        }
    }
    public function showCinema(Request $request, $id, $slug)
    {
        $clusterCinema = ClusterCinema::where('city_id', Session::get('cityAddress'))->get();
        $cinema = Cinema::where('id', $id)->first();
        $countStart = StartCinema::where('cinema_id', $id)->count();
        $numStart = StartCinema::where('cinema_id', $id)->sum('start');

        return view('Frontend.page.show_cinema', [
            'cinema' => $cinema,
            'clusterCinema' => $clusterCinema,
            'countStart' => $countStart,
            'numStart' => $numStart
        ]);
    }


    public function change_pass(Request $request)
    {

        if (Auth::attempt(['email' => Auth::user()->email, 'password' => $request->passwordOld])) {
            User::find(Auth::user()->id)->update(['password' => Hash::make($request->passwordConfirm)]);
            return 'Đổi mật khẩu hoàn tất ';
        } else {
            return 'Mật khẩu không chính xác !';
        }
    }

    public function comment_cinema(Request $request)
    {
        if (Auth::check()) {
            if (StartCinema::where('user_id', auth()->user()->id)->where('cinema_id', $request->cinema_id)->exists()) {
                return 1;
            } else {
                $flag = false;
                $cinema = Cinema::where('id', $request->cinema_id)->first();
                foreach ($cinema->cinema_room as $ci) {
                    foreach ($ci->show_time as $show) {
                        foreach ($show->receipts as $receipt) {
                            if (auth()->user()->id == $receipt->user_id) {
                                $flag = true;
                                break;
                            }
                        }
                    }
                    if ($flag) break;
                }
                if ($flag == true) {
                    StartCinema::create([
                        'content' => $request->content,
                        'start' => $request->start,
                        'user_id' => auth()->user()->id,
                        'cinema_id' => $request->cinema_id
                    ]);
                    return 0;
                }
                return 3;
            }
        }
    }

    public function comment_cinema_show(Request $request)
    {
        $start_cinema = StartCinema::where('cinema_id', $request->id_cinema)->orderBy('id', 'desc')->get();
        foreach ($start_cinema as $key => $startCinemaItem) {
?>

            <div style="padding : 10px ; box-shadow : 2px 2px 2px black ;border-bottom-right-radius: 10px;" class="row">
                <div class="col-sm-10 ">
                    <h6 style="display:inline ; color : blue"> <?= $startCinemaItem->user->name ?></h6>
                    <p><small> Đã bình luận</small> : <strong><?= $startCinemaItem->content ?></strong> </p>
                    <span class="badge badge-secondary"><?= $startCinemaItem->created_at->diffForHumans() ?></span>
                </div>
                <div class="col-sm-2">
                    <p class="btn btn-success"><strong><?= $startCinemaItem->start ?></strong> <i class="fas fa-star"></i> </p>
                </div>
            </div>
            <hr>
        <?php
        }
    }

    public function search(Request $request)
    {
        if ($request->value == '') return;
        $dt = Carbon::now('Asia/Ho_Chi_Minh');
        $films = Film::where('name', 'like', '%' . $request->value . '%')->get();
        // $arrId = [];
        $arrSave = [];
        foreach ($films as $film) {
            foreach ($film->showtime as $showtime) {
                if ($showtime->show_date >= $dt->toDateString()) $arrSave[$film->id_film] = $film;
            }
        }
        $text = '<strong style="color : red">' . $request->value . '</strong>';
        if (count($arrSave) == 0) {
        ?>
            <p>Không có dữ liệu ...</p>
            <?php
        } else {
            foreach ($arrSave as $item) {
            ?>
                <a href="<?= route('web.detailFim', ['id_film' => $item->id_film, 'slug' => Str::slug($item->name)]) ?>" style=" list-style : none ">
                    <?= str_replace($request->value, $text,  $item->name)  ?>
                </a> <br>
<?php
            }
        }
    }

    public function news(){
        $id_news = $_GET['id_news'];
        $news = News::find($id_news);
        $filmHomeDeleted0s = Film::where('status', 0)->where('deleted', 0)->take(3)
            ->get();
        return view('Frontend.page.detail_news', compact('news', 'filmHomeDeleted0s'));
    }
}
