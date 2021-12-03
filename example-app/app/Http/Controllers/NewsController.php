<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\File;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $URL_IMG_NEWS = 'images/blog';
    public function index()
    {
        //
        $news = News::all();
        return view('Backend.page.news.list', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Backend.page.news.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //hàm này dùng để save add news
        //dd laf var_dump trong php
        // dd($request ->all());
        $news = new News();
        if ($request->hasFile('image_news')) {
            $image = $request->file('image_news');
            $filename = time() . '_' . rand(01, 99) . '_img.' . $image->getClientOriginalExtension();
            $request->image_news->move(public_path("$this->URL_IMG_NEWS"), $filename);
            $news->image_news = $filename;
        }
        $news -> title_news = $request ->title_news;
        $news -> content_news = $request ->content_news;
        $news -> save();
        return Redirect::back();
        }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function show(News $news)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {
        //
        $id_news = $_GET['id_news'];
        $news = News::find($id_news);
        return view('Backend.page.news.edit', compact('news'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, News $news)
    {
        //
        $id_news = $_GET['id_news'];
        $news = News::find($id_news);
        $news -> title_news = $request-> title_news;
        $news -> content_news = $request->content_news;
        if ($request->hasFile('image_news')) {
            $oldFilename = $news->image_news;
            if (File::exists(public_path("$this->URL_IMG_NEWS/$oldFilename"))) {
                File::delete(public_path("$this->URL_IMG_NEWS/$oldFilename"));
            }
            $image = $request->file('image_news');
            $filename = time() . '_' . rand(01, 99) . '_img.' . $image->getClientOriginalExtension();
            $request->image_news->move(public_path("$this->URL_IMG_NEWS"), $filename);
            $news->image_news = $filename;
        }
        $news -> save();
        return Redirect::route('admin.news.list');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news)
    {
        //
        $id_news = $_GET['id_news'];
        // find() tương đương select * from news where id=id
        $model = News::find($id_news);
        if ($model) {
            if (File::exists(public_path("$this->URL_IMG_NEWS/$model->image_news"))) {
                File::delete(public_path("$this->URL_IMG_NEWS/$model->image_news"));
            }
            News::destroy($id_news);
            return Redirect::route('admin.news.list');
        }
    }
}
