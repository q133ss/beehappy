<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function index(){
        $orders_current = \Auth::user()->orders->where('status',1);
        $orders_old = \Auth::user()->orders->where('status',4);
        return view('account.orders',[
            'orders_current' => $orders_current,
            'orders_old' => $orders_old
        ]);
    }
}
