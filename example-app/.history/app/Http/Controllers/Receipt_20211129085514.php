<?php

namespace App\Http\Controllers;

use App\Jobs\SendConfirm;
use App\Mail\SendConfirm as MailSendConfirm;
use App\Models\Receipt as ModelsReceipt;
use App\Models\Receipt_Roles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use PDO;

class Receipt extends Controller
{
    public function confirm($links){
        if(Receipt_Roles::where('links' , $links)->exists()){
            $receipt_ros = Receipt_Roles::where('links' , $links)->first();
            dd($receipt_ros);
            $find = $this-> find($receipt_ros->receipt_id);
            $find->update([   'user_view_success' => 1]);
            $receipt_ros -> delete();
            return view('Backend.page.receipt.success',['id_receipt' => $find->id_receipt]);
        }
        return redirect('/home');
    }

    public function find($id){
        return ModelsReceipt::where('id_receipt' , $id)->first();
    }

    public function change_pay(Request $request){
        $find = $this-> find($request->id);
        if( $request->value == 1){
            $code = time() . uniqid();
            Receipt_Roles::create([
                'links' =>$code ,
                'receipt_id' => $request->id
            ]);
            $email = $find->user->email;
            $links = url()->signedRoute('confirm.receipt.movie' , ['links' => $code]);

            Mail::to($email)->send(new MailSendConfirm($links));
            // dispatch(new SendConfirm($email,$url));
            $find->update([ 'user_view_success' => 3]);
            return 1;
        }else{
            if($find ->user_view_success == 0)  $find->update([   'user_view_success' => $request->value]);
            return 1;
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $receipts = ModelsReceipt::orderBy('date_pay' , 'desc')->get();
        return view('Backend.page.receipt.index',['receipts' => $receipts]);
    }

    public function show($id)
    {
        $receipt =  $this-> find($id);
        return view('Backend.page.receipt.show' , ['receipt' => $receipt] );
    }

    public function destroy($id)
    {
        $find = $this-> find($id);

        foreach ($find ->receipt_food as $receipt_food) {
            $receipt_food->delete();
        }
        foreach ($find ->receipt_detail as $receipt_detail) {
            $receipt_detail->delete();
        }

        $find->delete();
        return redirect()->back();
    }
}
