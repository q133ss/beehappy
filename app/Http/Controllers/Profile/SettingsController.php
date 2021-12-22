<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class SettingsController extends Controller
{
    public function index(){
        $user = User::find(\Auth::user()->id);
        return view('account.settings', compact('user'));
    }

    public function edit(Request $request){
        $user = User::find(\Auth::user()->id);
        if($request->file('img') != NULL) {
            $img_path = $request->file('img')->store('uploads', 'public');
            $user->avatar_url = '/storage/' . $img_path;
        }
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->save();
        return redirect()->back();
    }
}
