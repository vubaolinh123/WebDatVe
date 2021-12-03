<?php

namespace App\Http\Controllers;

use App\Models\Cinemaroom;
use App\Models\Film;
use App\Models\Showtime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ShowtimefilmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // start_time
        // time_ends
        // show_date
        // cinema_room_id
        $showtimeFilms = Showtime::join('tbl_film as film', 'film.id_film', 'tbl_showtime.film_id')
            ->select(
                'film.id_film as id_film',
                'film.avatar as imgFilm',
                'film.name as nameFilm',
                'tbl_showtime.start_time',
                'tbl_showtime.time_ends',
                'tbl_showtime.id_showtime',
                'tbl_showtime.show_date',
                'tbl_showtime.cinema_room_id',
            )->orderBy('id_film', 'desc')
            ->get();
        // dd($showtimeFilms);

        return view(
            'Backend.page.showtime_film.list',
            compact(
                'showtimeFilms'
            )
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $films = Film::all();
        $cinemarooms =  Cinemaroom::all();
        return view(
            'Backend.page.showtime_film.add',
            compact('films', 'cinemarooms')
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        Showtime::create([
            'start_time' => $request->start_time,
            'time_ends' => $request->time_ends,
            'show_date' => $request->show_date,
            'film_id' => $request->film_id,
            'cinema_room_id' => $request->cinema_room_id,
        ]);

        return Redirect::route('admin.timeshowfilm.list');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Showtime  $showtime
     * @return \Illuminate\Http\Response
     */
    public function show(Showtime $showtime)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Showtime  $showtime
     * @return \Illuminate\Http\Response
     */
    public function edit(Showtime $showtime)
    {
        $id_showtime = $_GET['id_showtime'];
        $films = Film::all();
        $cinemarooms =  Cinemaroom::all();
        $showtime = Showtime::find($id_showtime);
        return view(
            'Backend.page.showtime_film.edit',
            compact(
                'films',
                'cinemarooms',
                'showtime',
            )
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Showtime  $showtime
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Showtime $showtime)
    {
        $id_showtime = $_GET['id_showtime'];
        Showtime::find($id_showtime)->update([
            'start_time' => $request->start_time,
            'time_ends' => $request->time_ends,
            'show_date' => $request->show_date,
            'film_id' => $request->film_id,
            'cinema_room_id' => $request->cinema_room_id,
        ]);
        return Redirect::route('admin.timeshowfilm.list');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Showtime  $showtime
     * @return \Illuminate\Http\Response
     */
    public function destroy(Showtime $showtime)
    {
        $id_showtime = $_GET['id_showtime'];
        Showtime::destroy($id_showtime);
        return Redirect::back();
    }
}