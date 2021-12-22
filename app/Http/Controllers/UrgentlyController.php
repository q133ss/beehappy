<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UrgentlyController extends Controller
{
    public function index(){
        return view('urgently.index');
    }
}
