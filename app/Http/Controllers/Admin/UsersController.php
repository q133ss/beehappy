<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UsersController extends Controller
{
    public function index(){
        $users = User::get();
        return view('admin.users.index', compact('users'));
    }

    public function edit($id){
        $user = User::find($id);
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request,$id){
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        if($request->file('avatar') != NULL) {
            $img_path = $request->file('avatar')->store('uploads', 'public');
            $user->avatar_url = '/storage/' . $img_path;
        }
        $user->phone = $request->phone;
        $user->date_of_birthday = $request->date_of_birthday;
        $user->scores = $request->scores;
        $user->save();
        return redirect()->back()->withSuccess('Пользователь изменен');
    }
}
