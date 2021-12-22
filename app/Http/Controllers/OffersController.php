<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OffersController extends Controller
{
    public function offer(){
        return view('offer');
    }

    public function policy(){
        return view('policy');
    }

    public function payment(){
        return view('payment');
    }
}
