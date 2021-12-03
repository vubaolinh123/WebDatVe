<?php

namespace App\Http\Controllers;

use App\Models\Type_Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class TypeBlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $type_Blogs = Type_Blog::all();
        return view(
            'Backend.page.blog_type.list',
            compact('type_Blogs')
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Backend.page.blog_type.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        Type_Blog::create([
            'name' => $request->name,
            'active' => $request->active,
        ]);

        return Redirect::route('admin.type_blog.list');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Type_Blog  $type_Blog
     * @return \Illuminate\Http\Response
     */
    public function show(Type_Blog $type_Blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Type_Blog  $type_Blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Type_Blog $type_Blog)
    {
        $id_type_blog = $_GET['id_type_blog'];
        $type_Blog = Type_Blog::find($id_type_blog);
        return view('Backend.page.blog_type.edit', compact('type_Blog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Type_Blog  $type_Blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Type_Blog $type_Blog)
    {
        $id_type_blog = $_GET['id_type_blog'];
        Type_Blog::find($id_type_blog)->update([
            'name' => $request->name,
            'active' => $request->active,
        ]);
        return Redirect::route('admin.type_blog.list');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Type_Blog  $type_Blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Type_Blog $type_Blog)
    {
        $id_type_blog = $_GET['id_type_blog'];
        Type_Blog::destroy($id_type_blog);
        return Redirect::back();
    }
}