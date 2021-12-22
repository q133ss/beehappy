<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SberController extends Controller
{
    public function checkout($order_id, $sum)
    {
        // $payload = json_decode(base64_decode($request->data));
        $sber = array();
        $sber['userName'] = env('SBER_USERNAME');
        $sber['password'] = env('SBER_PWD');
        $sber['orderNumber'] = $order_id;// Order number
        $sber['amount'] = $sum*100;// Amount
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

    public function delivery(Request $request){
        $sber = array();
        $sber['userName'] = env('SBER_USERNAME');
        $sber['password'] = env('SBER_PWD');
        $sber['orderNumber'] = 'Oplata dostavki zakaz #:'.$request->number;// Order number
        $sber['amount'] = $request->km*3000;// Amount
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
