<?php
namespace App\Http\Controllers\Traits\Frontend;

use App\Models\Foods;
use App\Models\Ticket;
use Illuminate\Http\Request;

trait AjaxBook {
    public function render_book(Request $request){

        $arr = [];
        $arr[$request -> type][$request -> id] = $request -> value ;
       if($request->session()->has('book1')){
            $dataOld = $request->session()->get('book1');
            $dataOld[$request -> type][$request -> id] = $request -> value ;
            $request->session()->put('book1', $dataOld);
       }else{
           $request->session()->put('book1', $arr);
       }
       $request->session()->save();
    //    dd($request->session()->get('book1'));

    }

    public function check_render_book(Request $request){

        if($request->session()->has('book1')){
            $dataOld = $request->session()->get('book1');
            if(array_key_exists('ticket',$dataOld)) return 1;
            return 0 ;
        }else{
            return 0 ;
        }
    }

    public function render_book_show(Request $request){
        $prFoods = 0;
        $prTicket = 0 ;
        if($request->session()->has('book1')){
            foreach($request->session()->get('book1') as $key => $value){
                if($key == 'ticket'){
                    foreach($value as $k => $v){
                        $ticket = Ticket::where('id_price_ticket',$k)->first();
                        $prTicket += $ticket->unit_price * $v;
                        ?>
                            <p> <?php echo $ticket->name ; ?> | Số lượng : <?= $v?> | Tổng : <?php echo $ticket->unit_price * $v; ?></p>
                        <?php
                    }
                }
            };
            foreach($request->session()->get('book1') as $key => $value){
                if($key == 'food'){

                    foreach($value as  $k => $v){
                            $food = Foods::where('id_food',$k)->first();
                            $prFoods += $food->price * $v;
                            ?>
                                <p> <?php echo $food -> name ?> | Số lượng : <?= $v?>| Tổng : <?php echo  $food->price * $v  ?>  </p>
                            <?php
                        }
                }
            }

        }else{
            ?>
                Hóa đơn ...
            <?php
        }
        ?>
            <h2>Tổng : <?= number_format( $prFoods + $prTicket) ?> VND</h2>
        <?php
    }

    public function get_chair(Request $request){
        // $request->session()->forget('chair');
        // dd(0);
        $flag = false;
        $arr = [
            'chair' => $request-> number_chair,
            'status' => $request-> number_vip,
        ];
        if($request->session()->has('chair')){

            $dataOld = $request->session()->get('chair');
            $arrLoc = [];
            foreach($dataOld as $val){
                if(($val['chair'] == $request->number_chair)){
                    $flag = true;
                }else{
                    array_push($arrLoc,$val);
                };
            }
            if(!$flag)array_push($arrLoc,$arr);

            $request->session()->put('chair', $arrLoc);
            $request->session()->save();
        }else{
            $request->session()->put('chair', []);
            $dataOld = $request->session()->get('chair');
            array_push($dataOld, $arr);
            $request->session()->put('chair', $dataOld);
        }
        $request->session()->save();
        dd($request->session()->get('chair'));
    }

    public function check_chair(Request $request){
        $data = $request->session()->get('chair');
        if($data == null || count($data) == 0){
            return 0;
        }else{
            return 1;
        }
    }

    public function render_check_chair(Request $request){

        if($request->session()->has('chair')){
            foreach($request->session()->get('chair') as $value){
                ?>
                    <p>Bạn đã đặt ghế <?php if($value['status'] == 1){ echo 'VIP';}else{ echo 'thường';} ?> : <?= $value['chair'] ?></p>
                <?php
            }
        }

    }

}
