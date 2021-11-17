<?php

namespace App\Http\Controllers;

use App\Models\Film;
use App\Models\FilmType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class FilmTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $typefilm = FilmType::all();
        return view('Backend.page.type_film.list_type_film', compact('typefilm'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Backend.page.type_film.add_type_film');
    }


    public function store(Request $request)
    {

        FilmType::create(
            $request->all()
        );
        return Redirect::route('admin.typefilm.list');
    }



    public function show(FilmType $filmType)
    {
        //
    }


    public function edit($id_film_type)
    {
        $typefilm = FilmType::find($id_film_type);
        return view('Backend.page.type_film.edit_type_film', compact('typefilm'));
    }


    public function update(Request $request, $id_film_type, FilmType $filmType)
    {
        FilmType::find($id_film_type)->update($request->all());
        return Redirect::route('admin.typefilm.list');
    }


    public function destroy($id_film_type)
    {
        FilmType::find($id_film_type)->delete();
        return Redirect::route('admin.typefilm.list');
    }
}