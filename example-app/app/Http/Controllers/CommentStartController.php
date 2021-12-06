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
                    if(request()->has('start')){
                        if($item -> start == request() -> start){
                            array_push($comment_starts , $item);
                        }
                    }else{
                        array_push($comment_starts , $item);
                    }
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
    public function destroy(StartCinema $startCiname){

        $startCiname -> delete();
        return back();
    }
}
