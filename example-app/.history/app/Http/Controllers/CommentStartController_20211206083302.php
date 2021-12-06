<?php

namespace App\Http\Controllers;

use App\Models\StartCinema;
use Illuminate\Http\Request;

class CommentStartController extends Controller
{
    public function index(){
        $comment_starts = StartCinema::paginate(5);
        return view('Backend.page.comment.index',
                                    [
                                        'comment_starts' => $comment_starts
                                    ]
    );
    }
}
