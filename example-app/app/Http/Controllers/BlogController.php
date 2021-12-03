<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Type_Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

class BlogController extends Controller
{
    private $URL_IMG_BLOG = 'images/blog';


    public function index()
    {
        $blogs = Blog::with('type_blogs')->get();
        // dd($blogs);
        $typeBlogs = Type_Blog::all();
        return view('Backend.page.blog.list', compact('blogs', 'typeBlogs'));
    }


    public function create()
    {
        $typeBlogs = Type_Blog::all();
        return view('Backend.page.blog.add', compact('typeBlogs'));
    }


    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'mainimg_blog' => "required|mimes:jpeg,png,jpg,gif,svg,webp,jfif|max:4048",
                'title_blog' => 'required',
                'view_blog' => 'required|integer',
                'conten_blog' => 'required',
            ],
            [
                'mainimg_blog.required' => 'Chưa nhập trường này !!',
                'title_blog.required' => 'Chưa nhập trường này !!',
                'view_blog.required' => 'Chưa nhập trường này !!',
                'conten_blog.required' => 'Chưa nhập trường này !!',
            ]
        );

        // dd($validator->errors()->toArray());
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        if ($request->hasFile('mainimg_blog')) {
            $image = $request->file('mainimg_blog');
            $filename = time() . '_' . rand(01, 99) . '_img.' . $image->getClientOriginalExtension();
            $request->mainimg_blog->move(public_path("$this->URL_IMG_BLOG"), $filename);
            $mainimg_blog = $filename;
        }

        // dd($request->mainimg_blog);
        Blog::create([
            'title_blog' => $request->title_blog,
            'mainimg_blog' => $mainimg_blog,
            'view_blog' => $request->view_blog,
            'conten_blog' => $request->conten_blog,
            'typeblog_id' => $request->typeblog_id,
        ]);
        return Redirect::route('admin.blog.list');
    }

    public function show(Blog $blog)
    {
        //
    }


    public function edit(Blog $blog)
    {
        $typeBlogs = Type_Blog::all();
        $id_blog = $_GET['id_blog'];
        $blog = Blog::find($id_blog);
        return view('Backend.page.blog.edit', compact('typeBlogs', 'blog'));
    }


    public function update(Request $request, Blog $blog)
    {
        $id_blog = $_GET['id_blog'];
        // dump($id_blog);
        // dd($request->all());
        $blog = Blog::find($id_blog);
        if ($request->hasFile('mainimg_blog')) {
            $oldFilename = $blog->mainimg_blog;
            if (File::exists(public_path("$this->URL_IMG_BLOG/$oldFilename"))) {
                File::delete(public_path("$this->URL_IMG_BLOG/$oldFilename"));
            }
            $image = $request->file('mainimg_blog');
            $filename = time() . '_' . rand(01, 99) . '_img.' . $image->getClientOriginalExtension();
            $request->mainimg_blog->move(public_path("$this->URL_IMG_BLOG"), $filename);
            $mainimg_blog = $filename;
        }
        Blog::find($id_blog)->update([
            'title_blog' => $request->title_blog,
            'mainimg_blog' => $mainimg_blog,
            'view_blog' => $request->view_blog,
            'conten_blog' => $request->conten_blog,
            'typeblog_id' => $request->typeblog_id,
        ]);
        return Redirect::route('admin.blog.list');
    }


    public function destroy(Blog $blog)
    {
        $id_blog = $_GET['id_blog'];
        $blog = Blog::find($id_blog);
        if ($blog) {
            if (File::exists(public_path("$this->URL_IMG_BLOG/$blog->mainimg_blog"))) {
                File::delete(public_path("$this->URL_IMG_BLOG/$blog->mainimg_blog"));
            }
            Blog::destroy($id_blog);
            return Redirect::route('admin.blog.list');
        }
    }
}