<?php

namespace App\Http\Controllers;

use App\Models\Cinemaroom;
use App\Models\Rowcr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CinemaroomController extends Controller
{

    public function index()
    {
        $cinemarooms = Cinemaroom::all();
        return view('Backend.page.cinema_room.list', compact('cinemarooms'));
    }


    public function create()
    {
        $rows = Rowcr::orderBy('name_row', 'asc')->get();
        $row_count = Rowcr::count();
        return view('Backend.page.cinema_room.add', compact('rows', 'row_count'));
    }


    public function store(Request $request)
    {
        $model = new Cinemaroom();
        $model->quantity_col = $request->quantity_col;
        $model->quantity_row = $request->quantity_row;
        $model->save();
        return Redirect::route('admin.cinemaroom.list');
    }


    public function show(Cinemaroom $cinemaroom)
    {
        //
    }


    public function edit(Cinemaroom $cinemaroom)
    {
        //
    }


    public function update(Request $request, Cinemaroom $cinemaroom)
    {
        //
    }


    public function destroy(Cinemaroom $cinemaroom)
    {
        //
    }


    public function getRowAjax(Request $request)
    {
        $quantity_col = $request->quantity_col;
        $rows = Rowcr::orderBy('name_row', 'asc')->get();
        $html = view('Backend.page.cinema_room.include.reder_row_col', compact('rows', 'quantity_col'))->render();
        return $html;
    }
}