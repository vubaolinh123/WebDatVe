<?php

namespace App\Http\Controllers;

use App\Models\Chair;
use App\Models\Cinemaroom;
use App\Models\Rowcr;
use App\Models\TypeChair;
use Illuminate\Http\Request;

class ChairController extends Controller
{
    public function create_chair_vip(Request $request){

        $cinema = Cinemaroom::where('id_cinema_room' , $request->id)->first();

        if($request -> type == 'col'){
            if($request -> size == 'start'){
                if($cinema -> vip_col_end == 0){
                    $cinema->update([
                        'vip_col_start' => $request->value ,
                    ]);
                }elseif($request->value <= $cinema -> vip_col_end){
                    $cinema->update([
                        'vip_col_start' => $request->value ,
                    ]);
                }else{
                    return 0 ;
                }
            }else{
                if($cinema -> vip_col_start == 0){
                    $cinema->update([
                        'vip_col_end' => $request->value ,
                    ]);
                }elseif($request->value >= $cinema -> vip_col_start){
                    $cinema->update([
                        'vip_col_end' => $request->value ,
                    ]);
                }else{
                    return 0 ;
                }
            }
            return 1;
        }elseif($request -> type == 'row'){
            if($request -> size == 'start'){
                if($cinema -> vip_row_end == 0){
                    $cinema->update([
                        'vip_row_start' => $request->value ,
                    ]);
                }elseif($request->value <= $cinema -> vip_row_end){
                    $cinema->update([
                        'vip_row_start' => $request->value ,
                    ]);
                }else{
                    return 0 ;
                }
            }else{
                if($cinema -> vip_col_start == 0){
                    $cinema->update([
                        'vip_row_end' => $request->value ,
                    ]);
                }elseif($request->value >= $cinema -> vip_row_start){
                    $cinema->update([
                        'vip_row_end' => $request->value ,
                    ]);
                }else{
                    return 0 ;
                }
            }
            return 1;
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cinemarooms = Cinemaroom::all();
        return view('Backend.page.cinema_room.chair',['cinemarooms' => $cinemarooms]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cinemarooms = Cinemaroom::all();
        $rows = Rowcr::all();
        return view(
            'Backend.page.chair.add_chair',
            compact(
                'cinemarooms',
                'rows',
            )
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Chair  $chair
     * @return \Illuminate\Http\Response
     */
    public function show(Chair $chair)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Chair  $chair
     * @return \Illuminate\Http\Response
     */
    public function edit(Chair $chair)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Chair  $chair
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Chair $chair)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Chair  $chair
     * @return \Illuminate\Http\Response
     */
    public function destroy(Chair $chair)
    {
        //
    }
}
