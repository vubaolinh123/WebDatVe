<?php

namespace App\Http\Controllers;

use App\Models\Film;
use App\Models\FilmType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;
use PhpParser\Node\Stmt\Return_;

class FilmController extends Controller
{
    private $URL_IMG_FILM = 'images/film';
    public function index()
    {
        $typeFilms = FilmType::all();
        $films = Film::all();
        return view('Backend.page.film.list_film', compact(
            'typeFilms',
            'films',
        ));
    }


    public function create()
    {
        $typeFilms = FilmType::all();
        return view('Backend.page.film.add_film', compact('typeFilms'));
    }


    public function store(Request $request)
    {
        // dd($request->all());
        $model = new Film();
        $model->name = $request->name;
        $model->trailer = $request->trailer;
        $model->file = $request->file;
        $model->time = $request->time;
        $model->age_limit = $request->age_limit;
        $model->premiere_date = $request->premiere_date;
        $model->language = $request->language;
        $model->cast = $request->cast;
        $model->nation = $request->nation;
        $model->producer = $request->producer;
        $model->summary = $request->summary;
        $model->status = $request->status;
        $model->deleted = $request->deleted;
        $model->film_type_id = $request->film_type_id;
        if ($request->hasFile('avatar')) {
            $image = $request->file('avatar');
            $filename = time() . '_' . rand(01, 99) . '_img.' . $image->getClientOriginalExtension();
            $request->avatar->move(public_path("$this->URL_IMG_FILM"), $filename);
            $model->avatar = $filename;
        }
        $model->save();
        return Redirect::route('admin.film.list');
    }


    public function show(Film $film)
    {
        //
    }


    public function edit($id_film)
    {
        $film = Film::find($id_film);
        $typeFilms = FilmType::all();
        return view('Backend.page.film.edit_film', compact('film', 'typeFilms'));
    }


    public function update(Request $request, $id_film, Film $film)
    {
        $model = Film::find($id_film);
        $model->name = $request->name;
        $model->file = $request->file;
        $model->time = $request->time;
        $model->age_limit = $request->age_limit;
        $model->premiere_date = $request->premiere_date;
        $model->language = $request->language;
        $model->cast = $request->cast;
        $model->nation = $request->nation;
        $model->producer = $request->producer;
        $model->summary = $request->summary;
        $model->status = $request->status;
        $model->deleted = $request->deleted;
        $model->film_type_id = $request->film_type_id;
        if ($request->hasFile('avatar')) {
            $oldFilename = $model->avatar;
            if (File::exists(public_path("$this->URL_IMG_FILM/$oldFilename"))) {
                File::delete(public_path("$this->URL_IMG_FILM/$oldFilename"));
            }
            $image = $request->file('avatar');
            $filename = time() . '_' . rand(01, 99) . '_img.' . $image->getClientOriginalExtension();
            $request->avatar->move(public_path("$this->URL_IMG_FILM"), $filename);
            $model->avatar = $filename;
        }
        $model->save();
        return Redirect::route('admin.film.list');
    }


    public function destroy($id_film)
    {
        $model = Film::find($id_film);
        if ($model) {
            if (File::exists(public_path("$this->URL_IMG_FILM/$model->avatar"))) {
                File::delete(public_path("$this->URL_IMG_FILM/$model->avatar"));
            }
            Film::destroy($id_film);
            return Redirect::route('admin.film.list');
        }
    }
}
