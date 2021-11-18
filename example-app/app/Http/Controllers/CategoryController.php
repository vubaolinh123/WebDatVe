<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {

        return view('Backend.page.category.list_cate');
    }
    public function create()
    {
        return view('Backend.page.category.add_cate');
    }
}