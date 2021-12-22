<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DonatController extends Controller
{
    public function index(){
        return view('account.donat');
    }

    public function submit(Request $request){
        $sber = array();
        $sber['userName'] = env('SBER_USERNAME');
        $sber['password'] = env('SBER_PWD');
        $sber['orderNumber'] = 'Blagodarnost menagery zakaz #:'.$request->order;// Order number
        $sber['amount'] = $request->sum*100;// Amount
        $sber['returnUrl'] = 'https://beehappy24.ru/home';// Success redirect
        $sber['failUrl'] = "https://beehappy24.ru";// Failure redirect
        $ch = curl_init('https://securepayments.sberbank.ru/payment/rest/register.do?' . http_build_query($sber));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_HEADER, false);
        $response = curl_exec($ch);
        curl_close($ch);
        $response = json_decode($response, JSON_OBJECT_AS_ARRAY);

        if (empty($response['orderId'])){
            echo $response['errorMessage'];
        } else {
            return redirect($response['formUrl']);
        }
    }
}
