<?php

namespace App\Http\Controllers;

use App\Models\Cinema as ModelsCinema;
use App\Models\ClusterCinema;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class Cinema extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $citys = json_decode(Http::get('https://provinces.open-api.vn/api/'));
        $districts = json_decode(Http::get('https://provinces.open-api.vn/api/d/'));
        $cinemas = ModelsCinema::orderBy('id', 'desc') -> paginate(5);
        $cluster_cinemas = ClusterCinema::orderBy('id', 'desc') -> paginate(5);
        return view('Backend.page.cinema.cinema.cinema', [
            'citys' => $citys,
            'districts' => $districts,
            'cluster_cinemas' => $cluster_cinemas,
            'cinemas' => $cinemas
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Backend.page.cinema.cinema.create_cinema');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = ModelsCinema::find($id);
        $link = public_path('storage') . "\\" . $model->logo;
        (file_exists($link)) ? unlink($link) : '' ;
        $model->delete();
        return redirect()->back();
    }
}
