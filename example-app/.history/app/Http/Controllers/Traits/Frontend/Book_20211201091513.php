<?php
namespace App\Http\Controllers\Traits\Frontend;

use App\Models\Foods;
use App\Models\Showtime;
use App\Models\Ticket;
use Illuminate\Http\Request;

trait Book {

    public function book(Request $request,$id){
        $request->session()->forget('book1');
        $show_time = Showtime::find($id);
        $tickets = Ticket::all();
        $foods = Foods::where('status',0)->get();
        return view('Frontend.page.book',[
            'show_time' => $show_time,
            'tickets' => $tickets,
            'id' => $id,
            'foods' => $foods
        ]);
    }

    public function book_ghe(Request $request,$id) {
        $request->session()->forget('chair');
        $show_time = Showtime::find($id);
        $text = 'A|B|C|D|E|F|G|H|I|J|K|L|M|N|O|P|Q|R|S|T|U|V|W|X|Y|Z';
        $arr = explode("|", $text);
        $arrchair = [];
        foreach ($show_time -> receipt_details as $receipt_detail) {
            array_push($arrchair,$receipt_detail->chair_code);
        }
        return view('Frontend.page.bookGhe', [
            'show_time' => $show_time,
            'id' => $id,
            'arr' => $arr,
        ]);
    }
}
