<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommentStartController extends Controller
{
    public function index(){
        return view('Backend.page.comment.index');
    }
}
