<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserEventSetting;
use App\Models\UserEvent;
use App\Models\User;

class EventController extends Controller
{
    public function index(){
        $events = UserEventSetting::get();
        $user_events = UserEvent::where('user_id', \Auth::user()->id)->get();
        $user = User::find(\Auth::user()->id);
        return view('account.event', [
            'events' => $events,
            'user_events' => $user_events,
            'user' => $user
        ]);
    }

    public function create(Request $request){
        $event = new UserEvent();
        $event->user_id = \Auth::user()->id;
        $event->date = $request->date;
        $event->type = $request->type;
        $event->subject = $request->subject;
        $event->phone = $request->phone;
        $event->city = $request->city;
        $event->adress = $request->adress;
        $event->save();
        return redirect()->back()->withSuccess('Событие создано');
    }

    public function edit(Request $request, $id){
        $event = UserEvent::find($id);
        $event->date = $request->date;
        $event->subject = $request->subject;
        $event->phone = $request->phone;
        $event->city = $request->city;
        $event->adress = $request->adress;
        $event->save();
        return redirect()->back()->withSuccess('Событие изменено');
    }

    public function edit_date(Request $request){
        $user = User::find(\Auth::user()->id);
        $user->date_of_birthday = $request->date;
        $user->save();
        return redirect()->back()->withSuccess('Дата успешно изменена');
    }

}
