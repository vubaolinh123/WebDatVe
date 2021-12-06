<?php

namespace App\Http\Controllers;

use App\Models\TypeChair;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class TypeChairController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $typeChairs = TypeChair::all();
        return view(
            'Backend.page.type_chair.list_type_chair',
            compact('typeChairs')
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Backend.page.type_chair.add_type_chair');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        TypeChair::create($request->all());
        return Redirect::route('admin.typechair.addForm');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TypeChair  $typeChair
     * @return \Illuminate\Http\Response
     */
    public function show(TypeChair $typeChair)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TypeChair  $typeChair
     * @return \Illuminate\Http\Response
     */
    public function edit(TypeChair $typeChair)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TypeChair  $typeChair
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TypeChair $typeChair)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TypeChair  $typeChair
     * @return \Illuminate\Http\Response
     */
    public function destroy(TypeChair $typeChair)
    {
        $typeChair -> delete();
        return back();
    }
}
