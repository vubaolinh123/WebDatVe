<?php

namespace App\Http\Controllers;

use App\Models\Receipt as ModelsReceipt;
use Illuminate\Http\Request;
use PDO;

class Receipt extends Controller
{
    public function find($id){
        return ModelsReceipt::where('id_receipt' , $id)->first();
    }

    public function change_pay(Request $request){
        $find = $this-> find($request->id);
        if($find ->user_view_success == 0)  $find->update([   'user_view_success' => $request->value]);
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
        $receipt = ModelsReceipt::where('id_receipt' , $id)->first();
        return view('Backend.page.receipt.show' , ['receipt' => $receipt] );
    }

    public function destroy($id)
    {
        $find = ModelsReceipt::where('id_receipt' , $id)->first();

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
