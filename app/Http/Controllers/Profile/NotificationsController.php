<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;

class NotificationsController extends Controller
{
    public function index(){
        $notifications_current = \Auth::user()->notificationUsers->where('created_at',Carbon::today());
        $notifications_old = \Auth::user()->notificationUsers->where('created_at','<',Carbon::today());
        return view('account.notifications',[
            'notifications_current' => $notifications_current,
            'notifications_old' => $notifications_old
        ]);
    }
}
