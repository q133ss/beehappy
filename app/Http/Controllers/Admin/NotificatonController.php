<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Notification;
use App\Models\NotificationUser;

class NotificatonController extends Controller
{
    public function index()
    {
        $notifications = Notification::get();
        return view('admin.notification.index', compact('notifications'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::get();
        return view('admin.notification.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $notification = new Notification();
        $notification->title = $request->title;
        $notification->text = $request->text;
        if(isset($request->all_users)){
            $notification->all_users = 1;
        }else{
            $notification->all_users = 0;
        }
        $notification->save();

        if(!isset($request->all_users)) {
            foreach ($request->users_id as $id) {
                $notification_user = new NotificationUser();
                $notification_user->notifications_id = $notification->id;
                $notification_user->user_id = $id;
                $notification_user->save();
            }
        }

        return redirect()->back()->withSuccess('Уведомление успешно добавлено');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Notification  $notification
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $notification = Notification::find($id);
        $users = User::get();
        return view('admin.notification.edit', [
            'notification' => $notification,
            'users' => $users
        ]);
    }

    public function update(Request $request, $id){
        $notification = Notification::find($id);
        $notification->title = $request->title;
        $notification->text = $request->text;
        if(isset($request->all_users)){
            $notification->all_users = 1;
        }else{
            $notification->all_users = 0;
        }
        $notification->save();

        if(!isset($request->all_users)) {
            foreach ($request->users_id as $id) {
                $notification_user = new NotificationUser();
                $notification_user->notifications_id = $notification->id;
                $notification_user->user_id = $id;
                $notification_user->save();
            }
        }

        return redirect()->back()->withSuccess('Уведомление успешно обновлено!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Notification  $notification
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $notification = Notification::find($id);
        $notification->delete();
        return redirect()->back()->withSuccess('Уведомление успешно удалено!');
    }
}
