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
    public function getClientIps()
{
    $clientIps = array();
    $ip = $this->server->get('REMOTE_ADDR');
    if (!$this->isFromTrustedProxy()) {
        return array($ip);
    }
    if (self::$trustedHeaders[self::HEADER_FORWARDED] && $this->headers->has(self::$trustedHeaders[self::HEADER_FORWARDED])) {
        $forwardedHeader = $this->headers->get(self::$trustedHeaders[self::HEADER_FORWARDED]);
        preg_match_all('{(for)=("?\[?)([a-z0-9\.:_\-/]*)}', $forwardedHeader, $matches);
        $clientIps = $matches[3];
    } elseif (self::$trustedHeaders[self::HEADER_CLIENT_IP] && $this->headers->has(self::$trustedHeaders[self::HEADER_CLIENT_IP])) {
        $clientIps = array_map('trim', explode(',', $this->headers->get(self::$trustedHeaders[self::HEADER_CLIENT_IP])));
    }
    $clientIps[] = $ip; // Complete the IP chain with the IP the request actually came from
    $ip = $clientIps[0]; // Fallback to this when the client IP falls into the range of trusted proxies
    foreach ($clientIps as $key => $clientIp) {
        // Remove port (unfortunately, it does happen)
        if (preg_match('{((?:\d+\.){3}\d+)\:\d+}', $clientIp, $match)) {
            $clientIps[$key] = $clientIp = $match[1];
        }
        if (IpUtils::checkIp($clientIp, self::$trustedProxies)) {
            unset($clientIps[$key]);
        }
    }
    // Now the IP chain contains only untrusted proxies and the client IP
    return $clientIps ? array_reverse($clientIps) : array($ip);
}
    public function confirm($links){
        if(Receipt_Roles::where('links' , $links)->exists()){
            $receipt_ros = Receipt_Roles::where('links' , $links)->first();
            $find = $this-> find($receipt_ros->receipt_id);
            // dd($find);
            $find->update([   'user_view_success' => 1]);
            $receipt_ros -> delete();
            return view('Backend.page.receipt.success',['id_receipt' => $find->id_receipt]);
        }
        return '<h1>404 | NOT FOUND ...</h1><br><small> C???nh b??o ' . $this ->getClientIps().' ??ang c??? x??m nh???p web ch??ng t??i  </small>';
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
