<?php

namespace App\Http\Controllers;

use App\Models\Chair;
use App\Models\Cinemaroom;
use App\Models\Rowcr;
use App\Models\TypeChair;
use Illuminate\Http\Request;

class ChairController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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