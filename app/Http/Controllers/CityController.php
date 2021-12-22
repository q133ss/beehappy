<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;
use Cookie;

class CityController extends Controller
{
    //
    public function index()
    {
        $cities = City::get();
        return view('city.index', compact('cities'));
    }
    public function setCity($id)
    {
        // Ставим город по умолчанию. а нужно показывать страницу выбора города.
        Cookie::queue('city_id', $id, 43800);
        return redirect()->route('home');
    }

    public function changeCity($name){
        $city = City::where('title', $name)->first();
        Cookie::forget('city_id');
        Cookie::queue('city_id', $city['id'], 43800);
        return redirect()->back();
    }

    public function cityFind(Request $request){
        $cities = City::where('title','LIKE', "%$request->city%")->get();
        return view('ajax.city.city', compact('cities'))->render();
    }
}
