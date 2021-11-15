<?php

namespace App\Http\Controllers;

use App\Models\Film;
use App\Models\FilmType;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;

class FilmController extends Controller
{

    public function index()
    {
        //
    }


    public function create()
    {
        $typeFilms = FilmType::all();
        return view('Backend.page.film.add_film', compact('typeFilms'));
    }


    public function store(Request $request)
    {
        //
    }


    public function show(Film $film)
    {
        //
    }


    public function edit(Film $film)
    {
        //
    }


    public function update(Request $request, Film $film)
    {
        //
    }


    public function destroy(Film $film)
    {
        //
    }
}