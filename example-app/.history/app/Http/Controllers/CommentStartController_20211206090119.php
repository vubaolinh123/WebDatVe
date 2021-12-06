<?php

namespace App\Http\Controllers;

use App\Models\Cinema;
use App\Models\StartCinema;
use Illuminate\Http\Request;

class CommentStartController extends Controller
{
    public function index(){
        if(request()->has('name')){
            $comment_starts = [];
            $cinemas = Cinema::where('name' , 'like' , '%' . request() -> name. '%')->get();
            foreach ($cinemas as  $value) {
                foreach ($value -> start_cinema  as $item) {

                    array_push($comment_starts , $item);
                }
            }
        }else{
            $comment_starts = StartCinema::orderBy('id','desc')->paginate(5);
        }
        return view('Backend.page.comment.index',
                                    [
                                        'comment_starts' => $comment_starts
                                    ]
    );
    }
}
