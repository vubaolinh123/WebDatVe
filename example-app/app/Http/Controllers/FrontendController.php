<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function homeWeb()
    {
        return view('Frontend.page.home');
    }
    public function detailFim()
    {
        return view('Frontend.page.detail_fim');
    }
}