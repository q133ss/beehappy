<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subscribe;

class SubscribeViewController extends Controller
{
    public function index(){
        $subscribs = Subscribe::get();
        return view('subscribe.index', compact('subscribs'));
    }
}
