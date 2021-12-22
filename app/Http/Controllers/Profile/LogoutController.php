<?php

namespace App\Http\Controllers\profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;

class LogoutController extends Controller
{
    public function logout(){
        Session::flush();
        \Auth::logout();
        return redirect('/');
    }

}
