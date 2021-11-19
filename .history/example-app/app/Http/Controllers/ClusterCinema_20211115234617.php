<?php

namespace App\Http\Controllers;

use App\Models\ClusterCinema as ModelsClusterCinema;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ClusterCinema extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $model = ModelsClusterCinema::find(1);
        $link = public_path('images') . "\\" . $model->logo;
        unset($link);
        $citys = json_decode(Http::get('https://provinces.open-api.vn/api/'));
        return view('Backend.page.cinema.cluster.cluster_cinema', [
            'citys' => $citys,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'logo' => 'required|image',
        ]);
        $name_logo = uniqid() . '.' .  $request->logo->getClientOriginalExtension();
        $request->logo->move(public_path('images'), $name_logo);
        ModelsClusterCinema::create([
            'name' => $request->name,
            'logo' => $name_logo,
            'city_id' => $request->city_id
        ]);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

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
    public function destroy(ModelsClusterCinema $model)
    {
        $link = public_path('images') . "\\" . $model->logo;
        unset($link);
        $model->delete();
        return redirect()->back();
    }
}
